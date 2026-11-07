# Rushell Portfolio — PHP + vanilla JavaScript

This version converts the server-side responsibilities of the original HTML/JavaScript portfolio to **PHP**, without turning visual interactions into server requests or changing the design. It retains the **12 original projects**, current project selection, reusable project detail page, all five site sections, theme switching, navigation, filters, Swiper sliders, and existing relative media references. Large media files were intentionally excluded from the supplied ZIP; **none were deleted or renamed by this conversion**.

## Requirements and quick start

- PHP **8.2 or newer** (no Composer dependency or database needed).
- An HTTP server that **executes PHP** (PHP built-in server for development; Apache or nginx/PHP-FPM in production).
- A modern browser; JavaScript is used for instant filters, theme, navigation, animations, and sliders.
- Optional: Node.js **18+** for tests (Node 22 recommended).

From the project root:

```bash
php -S localhost:8000 -t .
```

Open **http://localhost:8000/index.php**. You can also use http://localhost:8000/ on servers configured to serve `index.php` by default.

**GitHub Pages cannot execute PHP**. The previous GitHub Pages deployment workflow was replaced with a CI verification workflow. Deploy this site to a PHP-enabled host (not a static-files-only service), and upload the project directory plus the omitted `assets/media/` files. Configure your host's document root to the portfolio root, or adjust paths if you deploy into a subdirectory.

## What was converted

| Responsibility | Implementation | Rationale |
| --- | --- | --- |
| All six page entry points | `index.php`, `assets/pages/*.php` | PHP can render content before JS runs. |
| Navigation and shared sidebar links | `includes/navigation.php` | Keep routes and active menu state in one place. |
| Project data loader and business rules | `includes/bootstrap.php` | Server-side lookup, current/previous separation, and allowlisted external links. |
| Project spotlight/cards | `includes/projects-view.php` | Search-engine-readable HTML; first load works without JavaScript. |
| Reusable project detail | `includes/project-detail-view.php` and `assets/pages/projectDescription.php` | Page title, descriptions, videos, screenshots, and stages are rendered server-side. |
| Contact form | `includes/contact-handler.php` | Server-side validation, CSRF token, honeypot, throttling, and mail submission. |
| Initial SEO metadata/year | PHP | Configurable canonical URLs/preview thumbnails and current copyright year. |
| Live filters, theme, burger, reveal, Swiper | `assets/js/` | These are browser interactions and **should stay JavaScript**. |
| Responsive styles | `assets/css/` | CSS is the appropriate tool; existing styles retained with minimal additions. |

The old JS data and DOM-rendering modules were removed to avoid maintaining two divergent copies of the project catalog. `assets/js/pages/projects.js` now filters the cards rendered by PHP using `hidden`, while URL query params `?category=` and `?search=` still work. Media is rendered through standard HTML5 video/image tags, with the original failure placeholders.

## Update the project collection

**Add or edit a project** in `data/projects.json`. Each project supports:

```json
{
  "id": "my-new-project",
  "category": "Web App",
  "cardDescription": "A short description",
  "thumbnail": "../media/image/project_icons/new.png",
  "websiteUrl": "",
  "overviewGallery": [],
  "details": {
    "projectName": "My New Project",
    "overviewVideo": "../media/video/new.mp4",
    "projectOverview": "An overview of what I built.",
    "techStack": "PHP, HTML, CSS, JavaScript",
    "byPartVideoExplanation": [
      {"videoUrl": "", "partExplanation": "Planning..."},
      {"videoUrl": "", "partExplanation": "Development..."},
      {"videoUrl": "", "partExplanation": "Testing..."}
    ]
  }
}
```

Set the current featured project in `config/site.php`:

```php
'current_project_id' => 'dmc', // set to '' for a coming-soon spotlight
```

The featured item is automatically excluded from previous projects. Set `websiteUrl` to a valid `http`/`https` URL to make its primary CTA go to the live website; otherwise the CTA goes to `./projectDescription.php?project=ID`. The featured item also has a secondary detail link when a live URL exists. Old bookmarks using `?tab=IDNewTab` still work.

Large media were not included in the source ZIP. Add media files under the **same original paths**, such as `assets/media/video/dmc.mp4` and `assets/media/image/project_icons/dmc.png`. Paths in the JSON are relative to `assets/pages/`, just as in the original project. You do not need to rename them because of PHP.

## Configure contact form delivery

Unlike the original form that opened an email client through `mailto:`, the PHP form attempts to submit a message **from the server**. It validates inputs, escapes redisplayed content, verifies session CSRF tokens, uses a honeypot, and limits repeated submissions within the same session. No database is required and it does not save a public message history.

1. Open `config/site.php` and verify `contact_recipient` (the address already listed on the original site).
2. Configure your PHP host's outgoing mail transport (`mail()` with sendmail or an SMTP relay configured by the host).
3. Set a sender belonging to your domain, for example by configuring the `MAIL_FROM` environment variable to `noreply@your-domain.example`.
4. Send a real test message and confirm receipt. An accepted `mail()` call alone cannot guarantee inbox delivery; check hosting logs/SPF/DKIM as needed.

Without `MAIL_FROM` and functional outgoing mail, the form **reports an error rather than claiming to have sent the email**. This is intentional. If your host supports SMTP-only delivery and not PHP `mail()`, you'll need to connect an SMTP library/service before production use. **Never paste real SMTP credentials into public files.**

Set the `SITE_URL` environment variable (for example `https://portfolio.example.com`) once deployed to enable absolute canonical and social-preview image metadata. Leave it empty in development to avoid publishing an incorrect GitHub Pages URL.

## Structure

```text
index.php                         Homepage
assets/pages/                    About, Contact, Project, Project Detail, Resume (.php)
assets/css/                      Existing CSS and two small visibility/status additions
assets/js/                       Client-side UI behavior (no duplicate project dataset)
data/projects.json               Central list of 12 projects and media paths
config/site.php                  Featured project, contact address, mail sender, canonical origin
includes/bootstrap.php          PHP helpers: catalog, safe HTML, links and metadata
includes/navigation.php         Shared navbar and sidebar navigation
includes/projects-view.php      Featured project and project card templates
includes/project-detail-view.php Detail videos, screenshots and stage templates
includes/contact-handler.php   Server-side contact submission and validation
tests/verify.mjs                 PHP page, project, safety and JS checks
.github/workflows/checks.yml    CI validation; **not a deployment**
```

## Test

```bash
node tests/verify.mjs
```

The tests check PHP and JS syntax, all six rendered pages, 12 project records and selected feature, project cards, old links, 404 behavior, media URLs, and contact session/validation behavior. They do **not** require large media or a working email service. A real browser check after copying the missing media is still recommended, especially for responsive layouts and actual message deliverability.

## Known preserved placeholders

Original links such as the blank résumé download link and "coming soon" project content have not been replaced with invented files or text. The omitted images/videos will show existing fallbacks until uploaded. The original color/theme conventions (including their unconventional `data-theme` labels) are unchanged.
