<?php require_once __DIR__ . '/../../includes/navigation.php'; require_once __DIR__ . '/../../includes/projects-view.php'; $previous = previousProjects(); $all = allProjects(); $categories = array_count_values(array_column($previous, 'category')); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Web Development Projects and Case Studies of Rushell Marciales.">
    <meta property="og:title" content="Web Development Projects and Case Studies | Rushell Marciales">
    <meta property="og:description" content="Explore my web development projects and case studies.">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Web Development Projects and Case Studies | Rushell Marciales">
    <meta name="twitter:description" content="Explore my web development projects and case studies.">

    <title>Web Development Projects and Case Studies | Rushell Marciales</title>
    <?php siteCanonical('assets/pages/project.php'); ?>
    <?php siteSocialImage('assets/media/image/Thumbnails/project.png'); ?>

    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"/>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/project.css">
</head>
<body id="project">
    <?php renderNavigation('project', false); ?>

    <main id="main-content">
        <div class="main-content">
            <section class="projects-page" aria-labelledby="projects-heading">
                <!-- Intro / hero -->
                <header class="projects-hero">
                    <div class="projects-hero__copy">
                        <span class="section-eyebrow"><span class="eyebrow-dot" aria-hidden="true"></span> PORTFOLIO / SELECTED WORK</span>
                        <h1 id="projects-heading">Projects made with<br><em>curiosity &amp; code.</em></h1>
                        <p>A collection of experiments, interfaces, and applications I've brought to life. Explore the work, discover the process, and see what I've been building.</p>
                        <a class="hero-scroll-link" href="#all-projects">Browse the projects <i class="ri-arrow-down-line" aria-hidden="true"></i></a>
                    </div>
                    <div class="projects-hero__aside" aria-label="Portfolio overview">
                        <span class="hero-orbit hero-orbit--one" aria-hidden="true"></span>
                        <span class="hero-orbit hero-orbit--two" aria-hidden="true"></span>
                        <div class="hero-counter"><strong id="projectTotalCount"><?= count($all) ?></strong><span>Projects<br>in the collection</span></div>
                        <span class="hero-aside-caption"><i class="ri-code-s-slash-line" aria-hidden="true"></i> Designed, built, refined.</span>
                    </div>
                </header>

                <!-- Featured project is rendered by PHP using data/projects.json. -->
                <section class="featured-section" aria-labelledby="featured-heading">
                    <div class="section-title-row">
                        <div><span class="section-eyebrow">01 / IN THE SPOTLIGHT</span><h2 id="featured-heading">Current project<span class="accent-dot">.</span></h2></div>
                        <span class="section-supplement"><span class="status-pulse" aria-hidden="true"></span> WHAT I'M BUILDING</span>
                    </div>
                    <div id="currentProject"><?php renderCurrentProject(); ?></div>
                </section>

                <!-- Catalog -->
                <section class="project-library" id="all-projects" aria-labelledby="library-heading">
                    <div class="section-title-row library-heading-row">
                        <div><span class="section-eyebrow">02 / THE ARCHIVE</span><h2 id="library-heading">Previous projects<span class="accent-dot">.</span></h2><p>Past builds, experiments, and finished interfaces. Browse previous work.</p></div>
                        <span class="project-count" id="projectResultCount" role="status" aria-live="polite"><?= count($previous) ?> projects</span>
                    </div>
                    <div class="project-toolbar">
                        <label class="project-search" for="projectSearch"><i class="ri-search-2-line" aria-hidden="true"></i><input id="projectSearch" type="search" placeholder="Search projects or technologies..." autocomplete="off" aria-label="Search projects"><kbd>/</kbd></label>
                        <div class="project-filter-bar" id="projectFilters" role="group" aria-label="Filter projects by category">
                            <button type="button" class="project-filter is-active" data-category="" aria-pressed="true">All work <span><?= count($previous) ?></span></button>
                            <?php foreach ($categories as $category => $count): ?><button type="button" class="project-filter" data-category="<?= escapeHtml($category) ?>" aria-pressed="false"><?= escapeHtml($category) ?> <span><?= $count ?></span></button><?php endforeach; ?>
                        </div>
                    </div>
                    <div class="project-grid" id="projectGrid" aria-live="off">
                        <?php foreach ($previous as $project): renderProjectCard($project); endforeach; ?>
                    </div>
                    <div class="projects-empty" id="projectsEmpty" hidden>
                        <i class="ri-search-eye-line" aria-hidden="true"></i>
                        <h3>Nothing matched that search.</h3>
                        <p>Try another keyword or browse the full collection.</p>
                        <button type="button" id="resetProjectFilters">Clear filters <i class="ri-refresh-line" aria-hidden="true"></i></button>
                    </div>
                    <noscript><p class="projects-noscript">All project cards are available without JavaScript. Enable JavaScript to use instant search and category filters.</p></noscript>
                </section>
                <div class="projects-end"><span class="projects-end__line" aria-hidden="true"></span><span>THAT'S THE COLLECTION — FOR NOW <i class="ri-sparkling-line" aria-hidden="true"></i></span><span class="projects-end__line" aria-hidden="true"></span></div>
            </section>
            <footer><small>&copy; <span id="year"><?= date('Y') ?></span> Rushell Marciales. All rights reserved.</small></footer>
        </div>
    </main>

    <script type="module" src="../js/main.js"></script>
</body>
</html>