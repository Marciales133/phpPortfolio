<?php
declare(strict_types=1);
require_once __DIR__ . '/bootstrap.php';

/** Markup shared by Home, About, Projects, Resume and Contact. */
function navigationItems(bool $atRoot): array
{
    $root = $atRoot ? './' : '../../';
    $pages = $atRoot ? './assets/pages/' : './';
    return [
        ['id' => 'home', 'name' => 'Home', 'icon' => 'ri-home-5-line', 'href' => $root . 'index.php'],
        ['id' => 'about', 'name' => 'About', 'icon' => 'ri-user-3-line', 'href' => $pages . 'about.php'],
        ['id' => 'project', 'name' => 'Project', 'icon' => 'ri-folder-3-line', 'href' => $pages . 'project.php'],
        ['id' => 'resume', 'name' => 'Resume', 'icon' => 'ri-file-list-3-line', 'href' => $pages . 'resume.php'],
        ['id' => 'contact', 'name' => 'Contact', 'icon' => 'ri-chat-1-line', 'href' => $pages . 'contact.php'],
    ];
}

function renderNavigation(string $current, bool $atRoot = false): void
{
    $root = $atRoot ? './' : '../../';
    $media = $atRoot ? './assets/media/image/' : '../media/image/';
    ?>
    <nav>
        <div class="nav-maxer">
            <div class="mobile-nav">
                <header>
                    <span class="myLogo"><a href="<?= escapeHtml($root . 'index.php') ?>">Rushell</a></span>
                    <img id="dark" src="<?= escapeHtml($media . 'darkmode.png') ?>" alt="" role="button" aria-label="Switch theme" tabindex="0">
                    <img id="light" src="<?= escapeHtml($media . 'lightmode.png') ?>" alt="" role="button" aria-label="Switch theme" tabindex="0">
                </header>
                <i id="burger-nav" class="ri-menu-line"></i>
            </div>
            <ul class="main-nav">
                <?php foreach (navigationItems($atRoot) as $item): ?>
                    <li><a href="<?= escapeHtml($item['href']) ?>"<?= $item['id'] === $current ? ' aria-current="page"' : '' ?>><i class="<?= escapeHtml($item['icon']) ?>"></i><?= escapeHtml($item['name']) ?></a><div class="nav-hover-bar"></div></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </nav>
    <?php
}

function renderAsideNavigation(bool $atRoot = false): void
{
    ?>
    <ul class="aside-nav">
        <?php foreach (navigationItems($atRoot) as $item): ?>
            <li><a href="<?= escapeHtml($item['href']) ?>"><i class="<?= escapeHtml($item['icon']) ?>"></i><?= escapeHtml($item['name']) ?></a></li>
        <?php endforeach; ?>
    </ul>
    <?php
}
