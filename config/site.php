<?php
declare(strict_types=1);

/** Public site settings. Use a PHP-enabled host; GitHub Pages cannot execute this site. */
return [
    'current_project_id' => 'dmc',
    'contact_recipient' => 'rushellmarciales720@gmail.com',
    // Set a real address from a domain you control before enabling mail delivery.
    // Prefer a MAIL_FROM environment variable provided by your PHP host.
    'mail_from' => getenv('MAIL_FROM') ?: '',
    // Leave blank until deploying, then supply a full https:// URL WITHOUT trailing slash.
    'site_url' => rtrim((string) (getenv('SITE_URL') ?: ''), '/'),
];
