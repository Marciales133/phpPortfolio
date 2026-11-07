<?php
declare(strict_types=1);
require_once __DIR__ . '/bootstrap.php';

function projectPreview(array $project): string
{
    $text = preg_replace('/\s+/u', ' ', trim((string) ($project['details']['projectOverview'] ?? '')));
    if (!$text) {
        return 'Explore the project and how it came together.';
    }
    return preg_match_all('/./us', $text, $characters) > 270 ? implode('', array_slice($characters[0], 0, 267)) . '…' : $text;
}

function projectVideo(string $url, string $poster, string $class, string $label): void
{
    ?>
    <video class="<?= escapeHtml($class) ?>" src="<?= escapeHtml($url) ?>"<?= $poster !== '' ? ' poster="' . escapeHtml($poster) . '"' : '' ?> controls preload="metadata" playsinline aria-label="<?= escapeHtml($label) ?>"></video>
    <?php
}

function renderCurrentProject(): void
{
    $p = currentProject();
    if (!$p) { ?>
        <article class="featured-project featured-project--empty">
            <div class="featured-project__visual"><div class="featured-video-shell"><div class="featured-video-fallback"><i class="ri-video-line" aria-hidden="true"></i><span>The next project will be showcased here.</span></div></div></div>
            <div class="featured-project__copy"><span class="featured-project__label">WHAT'S NEXT</span><h3>Something new is taking shape.</h3><p class="featured-project__description">In the meantime, explore the projects I have worked on so far.</p><div class="featured-project__links"><a class="primary-project-link" href="#all-projects">Browse previous projects</a></div></div>
        </article>
    <?php return; }
    $d = $p['details'];
    $url = trim((string) ($d['overviewVideo'] ?? ''));
    ?>
    <article class="featured-project">
        <div class="featured-project__visual">
            <div class="featured-media-heading"><i class="ri-video-line" aria-hidden="true"></i><span>PROJECT VIDEO</span><span class="featured-media-heading__dots" aria-hidden="true"><b></b><b></b><b></b></span></div>
            <div class="featured-video-shell">
                <?php if ($url !== '' && $url !== '#'): ?>
                    <?php projectVideo($url, (string) ($p['thumbnail'] ?? ''), 'featured-video', $d['projectName'] . ' project overview video'); ?>
                <?php else: ?>
                    <div class="featured-video-fallback"><i class="ri-video-line" aria-hidden="true"></i><span>A project overview video will be available soon.</span></div>
                <?php endif; ?>
            </div>
            <div class="featured-visual-footer"><span><span class="featured-live-dot"></span> <?= escapeHtml(strtoupper($d['projectName']) . ' / ' . strtoupper($p['category'])) ?></span><i class="ri-film-line" aria-hidden="true"></i></div>
        </div>
        <div class="featured-project__copy">
            <span class="featured-project__label"><i class="ri-sparkling-line" aria-hidden="true"></i> CURRENT PROJECT / <?= escapeHtml(strtoupper($p['category'])) ?></span>
            <h3><?= escapeHtml($d['projectName']) ?></h3>
            <p class="featured-project__lead"><?= escapeHtml($p['cardDescription'] ?: $p['category']) ?></p>
            <p class="featured-project__description"><?= escapeHtml(projectPreview($p)) ?></p>
            <div class="featured-project__tags" aria-label="Technologies used">
                <?php $techs = array_values(array_filter(technologies($p), static fn (string $t): bool => strcasecmp($t, 'VSCode') !== 0)); foreach (array_slice($techs, 0, 4) as $tech): ?><span><?= escapeHtml($tech) ?></span><?php endforeach; ?>
            </div>
            <div class="featured-project__links">
                <a class="primary-project-link" href="<?= escapeHtml(projectDestination($p)) ?>">View case study <i class="ri-arrow-right-up-line" aria-hidden="true"></i></a>
                <?php if (projectDestination($p) !== projectDetailUrl($p)): ?><a class="secondary-project-link" href="<?= escapeHtml(projectDetailUrl($p)) ?>">Project details <i class="ri-file-list-3-line" aria-hidden="true"></i></a><?php endif; ?>
            </div>
        </div>
    </article>
    <?php
}

function projectCategoryIcon(string $category): string
{
    return [
        'Portfolio' => 'ri-layout-5-line',
        'E-commerce' => 'ri-shopping-bag-3-line',
        'Landing Page' => 'ri-layout-4-line',
        'Blog Page' => 'ri-article-line',
        'Web App' => 'ri-apps-2-line',
        'Desktop App' => 'ri-computer-line',
        '2D Games' => 'ri-gamepad-line',
    ][$category] ?? 'ri-code-line';
}

function renderProjectCard(array $p): void
{
    $details = $p['details'];
    $destination = projectDestination($p);
    $isLive = $destination !== projectDetailUrl($p);
    $isComingSoon = stripos((string) $details['projectName'], 'placeholder') !== false || str_ends_with(strtolower((string) ($p['thumbnail'] ?? '')), 'inproduction.png');
    $searchText = implode(' ', [$details['projectName'], $p['cardDescription'], $p['category'], is_array($details['techStack']) ? implode(' ', $details['techStack']) : $details['techStack']]);
    ?>
    <a class="project-card reveal reveal-bottom" href="<?= escapeHtml($destination) ?>" data-category="<?= escapeHtml($p['category']) ?>" data-search="<?= escapeHtml(strtolower($searchText)) ?>" aria-label="<?= escapeHtml(($isLive ? 'Visit ' : 'View ') . $details['projectName'] . ($isLive ? ' website' : ' case study')) ?>">
        <div class="project-card__image-link">
            <div class="project-card__fallback" aria-hidden="true"><i class="<?= escapeHtml(projectCategoryIcon($p['category'])) ?>"></i><span><?= escapeHtml($p['category']) ?></span></div>
            <img src="<?= escapeHtml($p['thumbnail'] ?? '') ?>" alt="<?= escapeHtml($details['projectName']) ?> project preview" loading="lazy" decoding="async">
            <span class="project-card__category"><?= escapeHtml($p['category']) ?></span>
        </div>
        <div class="project-card__body">
            <?php if ($isComingSoon): ?><span class="project-card__status">IN PROGRESS</span><?php endif; ?>
            <h3><?= escapeHtml($details['projectName']) ?></h3>
            <p class="project-card__description"><?= escapeHtml($p['cardDescription']) ?></p>
            <div class="project-card__tech" aria-label="Technologies">
                <?php $techs = array_values(array_filter(technologies($p), static fn (string $t): bool => strcasecmp($t, 'VSCode') !== 0)); foreach (array_slice($techs, 0, 3) as $tech): ?><span><?= escapeHtml($tech) ?></span><?php endforeach; ?>
            </div>
            <div class="project-card__bottom"><span class="project-card__action"><?= $isLive ? 'Visit website' : 'View case study' ?></span><i class="ri-arrow-right-up-line project-card__arrow" aria-hidden="true"></i></div>
        </div>
    </a>
    <?php
}
