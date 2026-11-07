# PHP conversion — October 2026

- Converted all six HTML page entry points to PHP without changing media paths.
- Centralized navbar and sidebar links in a reusable PHP view.
- Migrated the original 12 project records to `data/projects.json`; `config/site.php` controls the current feature.
- Server-renders the featured project, all project cards, detail title/meta, media, gallery and walkthrough stages.
- Kept live search and filtering, theme, navigation, animations and Swiper in browser-side JavaScript.
- Replaced mailto-only contact submission with PHP CSRF validation, honeypot, rate limiting and configurable mail service.
- Replaced GitHub Pages deployment workflow (unsupported for PHP) with checks in GitHub Actions.
- Updated smoke/integration tests for PHP 8.2+ and Node 18+.
- Media references are unchanged; intentionally omitted large media are not treated as missing source code.

---

# Projects page — site-wide visual consistency

- Removed the independent blue-black/mint scheme from the Projects page.
- Reused the site-wide background, green-toned sections, neutral cards, text,
  border, shadows, green accents, and purple CTA colors from `main.css`.
- Returned the logo, navigation bar, and theme switch to shared `main.css`
  styling. The Project tab retains the existing `#4338CA` active-tab styling.
- Kept responsive grid behavior, filters, data-driven current and previous
  projects, video rendering, asset references, and same-tab navigation.
- No changes to project content or project IDs.

---

# Projects page — current / previous architecture

## What changed

- Replaced the old hardcoded CarSell hero with a dynamically rendered **Current Project**.
- Removed the project page's Swiper dependency entirely. The current feature displays one HTML5 video from `details.overviewVideo`.
- Moved CarSell into the **Previous Projects** catalog. The public CarSell URL was preserved from the original hardcoded hero.
- Rendered all previous-project cards and filters from `projects` data, excluding the active current project automatically.
- Centralized case-study CTA destination: `websiteUrl` (if a valid HTTP(S) address) or the reusable project-details HTML (if empty).
- Added a pleasant placeholder state if no current project ID is set, because no replacement project was specified.
- Preserved all existing details, card filtering, old project bookmark support, and external asset paths.
- Expanded JS tests to cover current/previous switching, CarSell status, video renderer and link fallback.

## Where to edit

Only `assets/js/data/projects.js`:

1. Set `portfolioSettings.currentProjectId` to the ID of the project you are currently showcasing (empty by default).
2. Add more records to the `projects` array whenever needed.
3. Use `websiteUrl: 'https://...'` for deployed sites, or leave it blank for detail-page navigation.
4. Set `details.overviewVideo` to a direct video file URL for the featured player.

See `README.md` for complete examples and caveats.

## About and Resume skills refresh — October 2026

- Updated About technical bars to HTML, CSS/Tailwind, JavaScript, React, Java, C#, and databases.
- Added an About development-experience summary including database technology counts.
- Replaced the existing five Resume technical skill labels and levels, preserving the five technical plus two language bar layout.
- Consolidated skill animations; retained the About soft-skill and Resume language animations.
- Refreshed outdated project test expectations to use current data and added skill inventory checks.
- Preserved project catalog, current project selection, navigation, and other pages.
