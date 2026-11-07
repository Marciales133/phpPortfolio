<?php require_once __DIR__ . '/../../includes/navigation.php'; require_once __DIR__ . '/../../includes/contact-handler.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Contact information and form for Rushell Marciales, a freelance web developer in the Philippines.">
    <meta property="og:title" content="Ways to Contact Me | Rushell Marciales">
    <meta property="og:description" content="Get in touch with Rushell Marciales, a freelance web developer in the Philippines.">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Ways to Contact Me | Rushell Marciales">
    <meta name="twitter:description" content="Reach out to Rushell Marciales for freelance web development projects in the Philippines.">

    <title>Ways to Contact Me | Rushell Marciales</title>
    <?php siteCanonical('assets/pages/contact.php'); ?>
    <?php siteSocialImage('assets/media/image/Thumbnails/contact.png'); ?>

    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"/>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/contact.css">
</head>
<body id="contact">
    <?php renderNavigation('contact', false); ?>

    <main>
        <aside>
            <div class="in-page-content-navigation">
                <h2>Navigation</h2>
                <?php renderAsideNavigation(false); ?>
                <h4>Content Nav</h4>
                <ul>
                    <li class="reveal reveal-bottom-right"><a style="font-size: .8rem;" href="#contact-&-form"><i class="ri-mail-send-line"></i>Contact & Form</a></li>
                    <li class="reveal reveal-bottom-right"><a href="#map"><i class="ri-map-pin-2-line"></i>Map</a></li>
                </ul>
            </div>
            
        </aside>
        <div class="main-content">

            <section class="contact-header">
                <h1 class="reveal reveal-bottom">Let's work together!</h1>
                <p class="reveal reveal-bottom">Whether You have a project in mind or just want to say hi, I love to hear from You.</p>
            </section>

            <section class="reveal reveal-bottom animation-container">
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
            
            <section id="contact-&-form" class="reveal reveal-bottom socials-send-email-container">
                <div class="socials-container">
                    <h2 class="reveal reveal-bottom-left">CONTACT ME</h2>
                    <div class="reveal reveal-left socials-wrapper">

                        <div class="socials-card">
                            <i class="ri-smartphone-line"></i>
                            <small>09613198589</small>
                        </div>

                        <a title="Link directed to my Facebook" href="https://web.facebook.com/rushellmarciales/" class=" socials-card">
                            <i class="ri-facebook-fill"></i>
                            <small>FaceBook</small>
                        </a>

                        <a title="Link directed to my Instagram" href="https://www.instagram.com/rushellmarciales/" class=" socials-card">
                            <i class="ri-instagram-fill"></i>
                            <small>Instagram</small>
                        </a>

                        <a title="Link directed to my Twitter(Currently Unavailable)" href="#" class=" socials-card">
                            <i class="ri-twitter-x-fill"></i>
                            <small>X(Twitter)</small>
                        </a>

                        <a title="Link directed to my LinkedIn" href="https://www.linkedin.com/in/rushell-marciales-665971375?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" class=" socials-card">
                            <i class="ri-linkedin-fill"></i>
                            <small>LinkedIn</small>
                        </a>

                        <a title="Link directed to my GitHub" href="https://github.com/Marciales133" class=" socials-card">
                            <i class="ri-github-fill"></i>
                            <small>Github</small>
                        </a>

                    </div>
                </div>
                <div class="reveal reveal-right send-email-wrapper">
                    <form id="contact-form" method="post" action="contact.php#contact-form">
                        <h2>Send Email</h2>
                        <?php if ($contactSuccess): ?><p class="contact-alert contact-alert--success" role="status">Your message was submitted to the mail service. Thanks for reaching out!</p><?php endif; ?>
                        <?php if ($contactErrors): ?><div class="contact-alert contact-alert--error" role="alert"><strong>Could not send your message.</strong><ul><?php foreach ($contactErrors as $error): ?><li><?= escapeHtml($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
                        <input type="hidden" name="csrf_token" value="<?= escapeHtml($_SESSION['contact_token']) ?>">

                        <label>
                            <h4>NAME:</h4>
                            <input type="text" class="form-input" id="client-name" name="name" value="<?= escapeHtml($contactValues['name']) ?>" placeholder="Senders Name..." required minlength="2" maxlength="50">
                        </label>

                        <label>
                            <h4>EMAIL:</h4>
                            <input type="email" class="form-input" id="client-email" name="email" value="<?= escapeHtml($contactValues['email']) ?>" placeholder="Senders Email..." required maxlength="100">
                        </label>

                        <label>
                            <h4>MESSAGE:</h4>
                            <textarea class="form-textarea" id="client-message" name="message" required minlength="10" maxlength="1000"><?= escapeHtml($contactValues['message']) ?></textarea>
                        </label>

                        <!-- Honeypot bot trap -->
                        <input type="text" id="company" name="company" style="display:none" tabindex="-1" autocomplete="off" aria-hidden="true">

                        <button type="submit" class="btn btn-submit">
                            <i style="font-size: 1.4rem;" class="ri-mail-send-line"></i> Send
                        </button>
                    </form>

                </div>
            </section>

            <section id="map" class="map-and-respond-time">
                <div class="reveal reveal-bottom-left map-wrapper">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61743.731398960415!2d120.97518419999999!3d14.713541199999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b3f2c352666b%3A0x9af8d2dfa797d58!2sValenzuela%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1759070317277!5m2!1sen!2sph"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="reveal reveal-bottom-right respond-time-wrapper">
                    <h2>I usually respond within 24-48 hours.</h2>
                </div>
            </section>

            <div class="spacer"></div>

            <footer>
                <small>&copy;<span id="year"><?= date('Y') ?></span> Rushell Marciales. All rights reserved.</small>
            </footer>
        </div>
        
    </main>
    <script type="module" src="../js/main.js"></script>
</body>
</html>