/** Shared client-only behavior; HTML and project content are rendered by PHP. */
import { initNavigation } from './common/navigation.js';
import { initTheme } from './common/theme.js';
import { observeReveals } from './common/reveal.js';
import { initPageSwiper } from './features/swipers.js';
import { initProjectsPage } from './pages/projects.js';

initTheme();
initNavigation();
observeReveals();

const page = document.body.id;
if (page === 'home' || page === 'resume') initPageSwiper(page);
if (page === 'project') initProjectsPage();

// Videos are rendered server-side. Keep the original unavailable-media fallback.
document.querySelectorAll('.featured-video, .project-video').forEach((video) => {
  function showUnavailable() {
    if (video.classList.contains('is-unavailable')) return;
    video.classList.add('is-unavailable');
    const message = document.createElement('div');
    message.className = video.classList.contains('featured-video') ? 'featured-video-fallback' : 'video-placeholder';
    message.textContent = 'The video is unavailable right now.';
    video.parentElement?.append(message);
  }
  video.addEventListener('error', showUnavailable, { once: true });
  if (video.error) showUnavailable();
});

// Some media files are intentionally excluded from the lightweight ZIP.
document.querySelectorAll('.project-card__image-link img').forEach((img) => {
  img.addEventListener('error', () => img.classList.add('is-unavailable'), { once: true });
  if (img.complete && img.naturalWidth === 0) img.classList.add('is-unavailable');
});
