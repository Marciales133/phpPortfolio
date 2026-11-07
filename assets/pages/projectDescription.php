<?php
require_once __DIR__ . '/../../includes/project-detail-view.php';
$requestedId = $_GET['project'] ?? null;
if (!is_string($requestedId)) $requestedId = null;
if ($requestedId === null) {
    $legacy = $_GET['tab'] ?? null;
    $requestedId = is_string($legacy) ? preg_replace('/NewTab$/', '', $legacy) : null;
}
$record = projectById($requestedId);
if ($record === null) http_response_code(404);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= escapeHtml($record ? 'Project overview and video explanations for ' . $record['details']['projectName'] . '.' : 'Portfolio project details and video walkthroughs by Rushell Marciales.') ?>">
  <title><?= escapeHtml($record ? $record['details']['projectName'] : 'Project not found') ?> | Rushell Marciales</title>
  <?php if ($record !== null) { siteCanonical('assets/pages/projectDescription.php?project=' . rawurlencode($record['id'])); $thumb = (string) ($record['thumbnail'] ?? ''); if (str_starts_with($thumb, '../media/')) siteSocialImage('assets/media/' . substr($thumb, 9)); } ?>
  <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/contact.css">
  <link rel="stylesheet" href="../css/projectDescription.css">
</head>
<body id="project-detail">
  <header class="detail-header">
    <div class="detail-header-inner">
      <a class="detail-brand" href="../../index.php">Rushell</a>
      <div class="detail-header-actions">
        <button id="dark" class="detail-theme-toggle" type="button" aria-label="Switch to dark theme"><i class="ri-moon-line" aria-hidden="true"></i></button>
        <button id="light" class="detail-theme-toggle" type="button" aria-label="Switch to light theme"><i class="ri-sun-line" aria-hidden="true"></i></button>
        <a href="./project.php" class="detail-back"><i class="ri-arrow-left-line" aria-hidden="true"></i> All projects</a>
      </div>
    </div>
  </header>

  <main class="detail-layout">
    <p class="detail-eyebrow" id="projectCategory"><?= escapeHtml($record['category'] ?? 'Project') ?></p>
    <h1 id="projectTitle"><?= escapeHtml($record['details']['projectName'] ?? 'Project not found') ?></h1>
    <p id="projectNotFound"<?= $record ? ' hidden' : '' ?>>This project is not in the catalog. <a href="./project.php">Return to all projects.</a></p>

    <div id="projectDetail"<?= !$record ? ' hidden' : '' ?>>
      <div class="detail-summary">
        <div class="detail-media-column">
          <section class="detail-panel demo-container" aria-labelledby="overviewMediaHeading">
            <h2 id="overviewMediaHeading">Overview video</h2>
            <div id="overviewMedia" class="overview-media"><?php if ($record) renderOverviewMedia($record); ?></div>
          </section>

          <!-- This original animated sticker/box section stays immediately BELOW the overview video. -->
          <section class="animation-container detail-animation" aria-label="Animated project decoration">
            <div class="stickers-container">
              <img src="../media/image/contact_pngs/contact1.png" alt="">
              <img src="../media/image/contact_pngs/contact2.png" alt="">
              <img src="../media/image/contact_pngs/contact3.png" alt="">
              <img src="../media/image/contact_pngs/contact4.png" alt="">
              <img src="../media/image/contact_pngs/contact5.png" alt="">
              <img src="../media/image/contact_pngs/contact6.png" alt="">
            </div>
            <div class="animated-box-coontainer">
              <div class="animated-inner-box-container">
                <div class="circle-wrapper circle-top">
                  <div class="circle"></div>
                  <div class="circle"></div>
                  <div class="circle"></div>
                  <div class="circle"></div>
                  <div class="circle"></div>
                  <div class="circle"></div>
                  <div class="circle"></div>
                  <div class="circle"></div>
                  <div class="circle"></div>
                  <div class="circle"></div>
                </div>
                <div class="circle-wrapper circle-bottom">
                  <div class="circle"></div>
                  <div class="circle"></div>
                  <div class="circle"></div>
                  <div class="circle"></div>
                  <div class="circle"></div>
                  <div class="circle"></div>
                  <div class="circle"></div>
                  <div class="circle"></div>
                  <div class="circle"></div>
                  <div class="circle"></div>
                </div>
              </div>
            </div>
          </section>
        </div>

        <div class="detail-description-column">
          <section class="detail-panel" aria-labelledby="overviewHeading">
            <h2 id="overviewHeading">Project overview</h2>
            <p id="projectOverview" class="detail-overview-text"><?= escapeHtml($record['details']['projectOverview'] ?? 'Project details are coming soon.') ?></p>
          </section>
          <section class="detail-panel" aria-labelledby="techHeading">
            <h2 id="techHeading">Tech stack</h2>
            <ul id="technologiesList" class="technologies-list">
              <?php if ($record): foreach (technologies($record) as $tech): ?><li><?= escapeHtml($tech) ?></li><?php endforeach; else: ?><li>To be added</li><?php endif; ?>
            </ul>
          </section>
        </div>
      </div>

      <section class="detail-parts-section" aria-labelledby="partsHeading">
        <div class="parts-heading">
          <p class="detail-eyebrow">Behind the project</p>
          <h2 id="partsHeading">Step-by-step video explanations</h2>
        </div>
        <div id="projectParts" class="project-parts"><?php if ($record) renderProjectParts($record); ?></div>
      </section>
    </div>
  </main>

  <footer class="detail-footer"><small>&copy; <span id="year"><?= date('Y') ?></span> Rushell Marciales. All rights reserved.</small></footer>
  <script type="module" src="../js/main.js"></script>
</body>
</html>
