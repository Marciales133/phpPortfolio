<?php
declare(strict_types=1);

function siteConfig(): array
{
    static $config = null;
    return $config ??= require dirname(__DIR__) . '/config/site.php';
}

function escapeHtml(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** @return array<int,array<string,mixed>> */
function allProjects(): array
{
    static $projects = null;
    if ($projects !== null) {
        return $projects;
    }
    $data = file_get_contents(dirname(__DIR__) . '/data/projects.json');
    if ($data === false) {
        throw new RuntimeException('Missing project data.');
    }
    $decoded = json_decode($data, true, 512, JSON_THROW_ON_ERROR);
    if (!is_array($decoded)) {
        throw new RuntimeException('Invalid project catalog.');
    }
    return $projects = $decoded;
}

function projectById(?string $id): ?array
{
    if ($id === null || $id === '') {
        return null;
    }
    foreach (allProjects() as $project) {
        if ($project['id'] === $id) {
            return $project;
        }
    }
    return null;
}

function currentProject(): ?array
{
    return projectById((string) siteConfig()['current_project_id']);
}

function previousProjects(): array
{
    $current = currentProject();
    return array_values(array_filter(allProjects(), static fn (array $p): bool => $p['id'] !== ($current['id'] ?? null)));
}

function projectDetailUrl(array $project): string
{
    return './projectDescription.php?project=' . rawurlencode((string) $project['id']);
}

/** Only permit genuine HTTP(S) live-site links. Never put unsafe schemes in href. */
function projectDestination(array $project): string
{
    $url = trim((string) ($project['websiteUrl'] ?? ''));
    if ($url !== '' && filter_var($url, FILTER_VALIDATE_URL)) {
        $parts = parse_url($url);
        if (is_array($parts) && in_array(strtolower($parts['scheme'] ?? ''), ['https', 'http'], true) && !empty($parts['host'])) {
            return $url;
        }
    }
    return projectDetailUrl($project);
}

/** Render a valid absolute canonical URL only if a deployment origin is configured. */
function siteCanonical(string $relative): void
{
    $base = siteConfig()['site_url'];
    if (!is_string($base) || !preg_match('~^https://[^\s/]+(?:/[^\s]*)?$~', $base)) {
        return;
    }
    $url = $base . '/' . ltrim($relative, '/');
    echo '<link rel="canonical" href="' . escapeHtml($url) . '">' . "\n";
    echo '<meta property="og:url" content="' . escapeHtml($url) . '">' . "\n";
}

function technologies(array $project, int $max = PHP_INT_MAX): array
{
    $stack = $project['details']['techStack'] ?? '';
    $names = is_array($stack) ? $stack : explode(',', (string) $stack);
    $names = array_values(array_filter(array_map('trim', $names), static fn (string $name): bool => $name !== ''));
    return array_slice($names, 0, $max);
}

/** SEO card images must come from the PHP deployment, not the old static host. */
function siteSocialImage(string $relative): void
{
    $base = siteConfig()['site_url'];
    if (!is_string($base) || !preg_match('~^https://[^\s/]+(?:/[^\s]*)?$~', $base)) {
        return;
    }
    // Only use local relative paths configured by the site itself.
    if (str_contains($relative, '..') || str_starts_with($relative, '/')) {
        return;
    }
    $url = $base . '/' . $relative;
    echo '<meta property="og:image" content="' . escapeHtml($url) . '">' . "\n";
    echo '<meta name="twitter:image" content="' . escapeHtml($url) . '">' . "\n";
}
