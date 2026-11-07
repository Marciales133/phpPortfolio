<?php
declare(strict_types=1);
require_once __DIR__ . '/bootstrap.php';

// The contact page uses a server-side form instead of opening the visitor's email app.
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start([
        'cookie_httponly' => true,
        'cookie_samesite' => 'Lax',
        'use_strict_mode' => true,
    ]);
}
if (empty($_SESSION['contact_token'])) {
    $_SESSION['contact_token'] = bin2hex(random_bytes(32));
}
$contactErrors = [];
$contactSuccess = !empty($_SESSION['contact_success']);
unset($_SESSION['contact_success']);
$contactValues = ['name' => '', 'email' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Limit intake; do not retain submissions on disk.
    $size = (int) ($_SERVER['CONTENT_LENGTH'] ?? 0);
    if ($size > 16000) {
        http_response_code(413);
        $contactErrors[] = 'Message too large. Please shorten it.';
    } else {
        $token = $_POST['csrf_token'] ?? null;
        if (!is_string($token) || !hash_equals($_SESSION['contact_token'], $token)) {
            http_response_code(400);
            $contactErrors[] = 'Your form session expired. Reload this page and try again.';
        } else {
            foreach ($contactValues as $key => $_) {
                $input = $_POST[$key] ?? '';
                $contactValues[$key] = is_string($input) ? trim($input) : '';
            }
            $name = $contactValues['name'];
            $email = $contactValues['email'];
            $message = $contactValues['message'];
            if (!preg_match('/^.{2,50}$/us', $name)) {
                $contactErrors[] = 'Name must be between 2 and 50 characters.';
            }
            if (strlen($email) > 100 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $contactErrors[] = 'Enter a valid email address.';
            }
            if (!preg_match('/^.{10,1000}$/us', $message)) {
                $contactErrors[] = 'Message must be between 10 and 1000 characters.';
            }
            $honeypot = $_POST['company'] ?? '';
            if (!is_string($honeypot) || $honeypot !== '') {
                $contactErrors[] = 'Your message could not be sent.';
            }
            if (isset($_SESSION['contact_sent_at']) && time() - (int) $_SESSION['contact_sent_at'] < 60) {
                $contactErrors[] = 'Please allow a minute between messages.';
            }
            if (!$contactErrors) {
                $config = siteConfig();
                $from = trim((string) ($config['mail_from'] ?? ''));
                $to = trim((string) ($config['contact_recipient'] ?? ''));
                if (!filter_var($from, FILTER_VALIDATE_EMAIL) || !filter_var($to, FILTER_VALIDATE_EMAIL) || preg_match('/[\r\n]/', $from . $to)) {
                    $contactErrors[] = 'Email delivery is not configured on this server. Please use the listed contact information.';
                } else {
                    $safeName = preg_replace('/[\r\n]+/', ' ', $name);
                    $subject = 'Portfolio Inquiry from ' . $safeName;
                    $body = "Portfolio contact request\n\nName: {$safeName}\nEmail: {$email}\n\nMessage:\n{$message}\n";
                    $headers = [
                        'From' => $from,
                        'Reply-To' => $email,
                        'Content-Type' => 'text/plain; charset=UTF-8',
                        'X-Mailer' => 'PHP portfolio contact',
                    ];
                    if (@mail($to, $subject, $body, $headers)) {
                        $_SESSION['contact_sent_at'] = time();
                        $_SESSION['contact_success'] = true;
                        $_SESSION['contact_token'] = bin2hex(random_bytes(32));
                        header('Location: contact.php#contact-form', true, 303);
                        exit;
                    }
                    $contactErrors[] = 'The email service is currently unavailable. Please contact me using one of the links provided.';
                }
            }
        }
    }
}
