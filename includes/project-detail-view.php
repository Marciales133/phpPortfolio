<?php
declare(strict_types=1);
require_once __DIR__ . '/projects-view.php';

function renderOverviewMedia(array $p): void
{
    $d = $p['details'];
    $video = trim((string) ($d['overviewVideo'] ?? ''));
    $poster = (string) ($p['thumbnail'] ?? '');
    if ($video !== '' && $video !== '#') {
        projectVideo($video, $poster, 'project-video', $d['projectName'] . ' overview video');
        return;
    }
    if (!empty($p['overviewGallery']) && is_array($p['overviewGallery'])) {
        echo '<div class="detail-gallery" aria-label="' . escapeHtml($d['projectName']) . ' screenshots">';
        foreach ($p['overviewGallery'] as $index => $source) {
            echo '<img src="' . escapeHtml($source) . '" alt="' . escapeHtml($d['projectName']) . ' screenshot ' . ((int) $index + 1) . '" loading="' . ($index ? 'lazy' : 'eager') . '">';
        }
        echo '</div>';
        return;
    }
    echo '<div class="video-placeholder">';
    if ($poster !== '') echo '<img src="' . escapeHtml($poster) . '" alt="" loading="lazy">';
    echo '<span>Overview video coming soon</span></div>';
}

function renderProjectParts(array $p): void
{
    $parts = $p['details']['byPartVideoExplanation'] ?? [];
    if (!$parts || !is_array($parts)) {
        echo '<p>Part-by-part explanations will be added soon.</p>';
        return;
    }
    $titles = ['Planning & Setup', 'Development', 'Testing & Delivery'];
    foreach ($parts as $index => $part) {
        $idx = (int) $index + 1;
        $url = trim((string) ($part['videoUrl'] ?? ''));
        ?>
        <article class="project-part" id="part-<?= $idx ?>">
            <div class="part-media">
                <?php if ($url !== '' && $url !== '#'): ?>
                    <?php projectVideo($url, '', 'project-video', 'Part ' . $idx . ' explanation video'); ?>
                <?php else: ?>
                    <div class="video-placeholder"><span>Part <?= $idx ?> video coming soon</span></div>
                <?php endif; ?>
            </div>
            <div class="part-copy">
                <span class="part-index">PART <?= str_pad((string) $idx, 2, '0', STR_PAD_LEFT) ?></span>
                <h3><?= escapeHtml($titles[$index] ?? ('Part ' . $idx)) ?></h3>
                <p><?= escapeHtml(trim((string) ($part['partExplanation'] ?? '')) ?: 'Explanation coming soon.') ?></p>
            </div>
        </article>
        <?php
    }
}
