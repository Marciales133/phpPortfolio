/** PHP portfolio integration/smoke checks. Run: node tests/verify.mjs */
import assert from 'node:assert/strict';
import { readFileSync, readdirSync, existsSync } from 'node:fs';
import { spawn, execFileSync } from 'node:child_process';
import { dirname, join, resolve } from 'node:path';
import { fileURLToPath } from 'node:url';
import { createServer } from 'node:net';

const root = resolve(dirname(fileURLToPath(import.meta.url)), '..');
const read = (path) => readFileSync(join(root, path), 'utf8');
const projects = JSON.parse(read('data/projects.json'));
const pages = ['index.php', 'assets/pages/about.php', 'assets/pages/contact.php',
  'assets/pages/project.php', 'assets/pages/projectDescription.php', 'assets/pages/resume.php'];
assert.equal(projects.length, 12, 'All original projects must be preserved.');
assert.equal(new Set(projects.map((p) => p.id)).size, projects.length, 'Project IDs must be unique.');
for (const p of projects) {
  assert.ok(p.id && p.category && p.thumbnail && p.details?.projectName);
  assert.ok(Array.isArray(p.details.byPartVideoExplanation));
}
for (const file of pages) {
  assert.ok(existsSync(join(root, file)));
  const text = read(file);
  const matches = text.match(/<script type="module" src="([^\"]+)"/);
  assert.ok(matches, `${file} must retain modular JavaScript for UI behavior`);
  assert.ok(existsSync(resolve(dirname(join(root, file)), matches[1])), 'Page script should exist');
  assert.ok(!/href="[^\"]*(?:about|contact|project|resume)\.html/.test(text), 'No stale HTML routes.');
}
for (const file of ['includes/bootstrap.php', 'includes/navigation.php', 'includes/projects-view.php',
  'includes/project-detail-view.php', 'includes/contact-handler.php', 'config/site.php', ...pages]) {
  execFileSync('php', ['-l', join(root, file)], { stdio: 'pipe' });
}
for (const file of ['assets/js/main.js', 'assets/js/common/navigation.js', 'assets/js/common/reveal.js',
  'assets/js/common/theme.js', 'assets/js/pages/projects.js', 'assets/js/features/swipers.js']) {
  execFileSync('node', ['--check', join(root, file)], { stdio: 'pipe' });
}
assert.ok(!existsSync(join(root, 'assets/js/data/projects.js')), 'Duplicate JS catalog was removed.');
assert.equal((read('assets/pages/about.php').match(/role="progressbar"/g) ?? []).length, 9,
  'All original About skill and soft-skill bars must remain');
assert.equal((read('assets/pages/resume.php').match(/role="progressbar"/g) ?? []).length, 8,
  'All original Resume technical skill bars must remain');
assert.ok(read('index.php').includes('swiper@11'), 'Homepage Swiper stylesheet preserved');
assert.ok(read('assets/pages/resume.php').includes('swiper@12'), 'Résumé Swiper stylesheet preserved');
assert.ok(read('assets/js/main.js').includes('initTheme()'), 'Client-side theme stays JS');
assert.ok(read('assets/css/project.css').includes('#projectGrid > .project-card[hidden]'));
assert.ok(read('assets/pages/projectDescription.php').indexOf('id="overviewMedia"') < read('assets/pages/projectDescription.php').indexOf('detail-animation'));

const probe = createServer();
await new Promise((done) => probe.listen(0, '127.0.0.1', done));
const port = probe.address().port;
await new Promise((done) => probe.close(done));
const address = `http://127.0.0.1:${port}`;
const server = spawn('php', ['-S', `127.0.0.1:${port}`, '-t', root], { stdio: ['ignore','ignore','pipe'] });
let logs = '';
server.stderr.on('data', (data) => { logs += String(data); });
try {
  let ready = false;
  for (let attempt = 0; attempt < 50; attempt++) {
    try {
      const ping = await fetch(`${address}/index.php`);
      if (ping.ok) { ready = true; break; }
    } catch { /* listener not ready yet */ }
    await new Promise((done) => setTimeout(done, 50));
  }
  assert.ok(ready, `PHP server failed to start: ${logs}`);
  for (const page of pages) {
    const response = await fetch(`${address}/${page}${page.endsWith('projectDescription.php') ? '?project=dmc' : ''}`);
    assert.equal(response.status, 200, `Page ${page} should work; error: ${logs}`);
    const html = await response.text();
    assert.ok(html.includes('Rushell'), `${page} has page content`);
    assert.ok(!html.includes('Fatal error'), `${page} should have no PHP fatal error`);
  }

  const projectsHtml = await (await fetch(`${address}/assets/pages/project.php`)).text();
  assert.equal((projectsHtml.match(/class="project-card reveal reveal-bottom"/g) ?? []).length, projects.length - 1, 'All previous cards SSR');
  assert.ok(projectsHtml.includes('DMC E-Shop'), 'Featured project should SSR');
  assert.ok(projectsHtml.includes('data-category='), 'Filter data preserved');
  assert.ok(projectsHtml.includes('../media/video/dmc.mp4'), 'Media URL preserved without files');
  assert.ok(projectsHtml.includes('projectDescription.php?project='), 'PHP detail URLs emitted');

  const detail = await (await fetch(`${address}/assets/pages/projectDescription.php?project=proj-webapp`)).text();
  assert.ok(detail.includes('CarSell'));
  assert.ok(detail.includes('../media/video/CarsellDemo.mp4'));
  assert.equal((detail.match(/class="project-part"/g) ?? []).length, 3);
  const galleryDetail = await (await fetch(`${address}/assets/pages/projectDescription.php?project=proj-desktop1`)).text();
  assert.ok(galleryDetail.includes('class="detail-gallery"'), 'Original screenshot-only project gallery is retained');
  const legacy = await (await fetch(`${address}/assets/pages/projectDescription.php?tab=proj-webappNewTab`)).text();
  assert.ok(legacy.includes('<h1 id="projectTitle">CarSell</h1>'), 'Old bookmark compatibility');
  const notFound = await fetch(`${address}/assets/pages/projectDescription.php?project=unknown`);
  assert.equal(notFound.status, 404);
  assert.ok((await notFound.text()).includes('Project not found'));
  const injection = await fetch(`${address}/assets/pages/projectDescription.php?project=%3Cscript%3E`);
  assert.equal(injection.status, 404);
  assert.ok(!(await injection.text()).includes('<script>alert'));

  const contact = await fetch(`${address}/assets/pages/contact.php`);
  const cookie = contact.headers.get('set-cookie')?.split(';')[0] || '';
  const contactHtml = await contact.text();
  const csrf = contactHtml.match(/name="csrf_token" value="([a-f0-9]+)"/)?.[1];
  assert.ok(csrf && cookie, 'CSRF session token and cookie supplied');
  const badCsrf = await fetch(`${address}/assets/pages/contact.php`, {
    method: 'POST', headers: { 'Content-Type': 'application/x-www-form-urlencoded', Cookie: cookie },
    body: new URLSearchParams({csrf_token: 'wrong', name:'Test User',email:'test@example.com',message:'Hello from tests'}),
  });
  assert.equal(badCsrf.status, 400, 'Reject bad CSRF tokens');
  const badInput = await fetch(`${address}/assets/pages/contact.php`, {
    method: 'POST', headers: { 'Content-Type': 'application/x-www-form-urlencoded', Cookie: cookie },
    body: new URLSearchParams({csrf_token:csrf,name:'<x>',email:'bad',message:'short'}),
  });
  assert.ok((await badInput.text()).includes('Enter a valid email address.'), 'Server-side validation works');
  const unconfigured = await fetch(`${address}/assets/pages/contact.php`, {
    method: 'POST', headers: { 'Content-Type': 'application/x-www-form-urlencoded', Cookie: cookie },
    body: new URLSearchParams({csrf_token:csrf,name:'Tester User',email:'tester@example.com',message:'This is a legitimate sample message.',company:''}),
  });
  const unconfiguredHtml = await unconfigured.text();
  assert.ok(unconfiguredHtml.includes('Email delivery is not configured'), 'No silent success when mail is not configured');
  console.log(`PASS: ${projects.length} projects, ${pages.length} PHP pages, legacy links, contact security, media paths, and syntax.`);
} finally {
  server.kill('SIGTERM');
}
