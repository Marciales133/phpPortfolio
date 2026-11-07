<?php require_once __DIR__ . '/includes/navigation.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portfolio of Rushell Marciales, a web developer specializing in responsive websites, clean UI, and modern frontend development.">
    <meta property="og:title" content="Freelance Web Developer in the Philippines | Rushell Marciales">
    <meta property="og:description" content="I build responsive, modern websites for businesses and individuals.">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Freelance Web Developer in the Philippines | Rushell Marciales">
    <meta name="twitter:description" content="Modern, responsive websites built with clean code.">

    <title>Freelance Web Developer in the Philippines | Rushell Marciales</title>
    <?php siteCanonical(''); ?>
    <?php siteSocialImage('assets/media/image/Thumbnails/home.png'); ?>

    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/normalize.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"/>
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
</head>
<body id="home">
    <?php renderNavigation('home', true); ?>

    <main>
        <aside>
            <div class="in-page-content-navigation">
                <h2>Navigation</h2>
                <?php renderAsideNavigation(true); ?>
                <h4>Content Nav</h4>
                <ul>
                    <li class="reveal reveal-bottom-right"><a  href="#hero"><i class="ri-flashlight-line"></i>Hero</a></li>
                    <li class="reveal reveal-bottom-right"><a  href="#background"><i class="ri-stack-line"></i>Background</a></li>
                    <li class="reveal reveal-bottom-right"><a  href="#process"><i class="ri-flow-chart"></i>Process</a></li>
                    <li class="reveal reveal-bottom-right"><a  href="#responsiveness"><i class="ri-device-line"></i>Responsive</a></li>
                    <li class="reveal reveal-bottom-right"><a  href="#service"><i class="ri-tools-line"></i>Services</a></li>
                    <!--<li class="reveal reveal-bottom-right"><a  href="#testimonials"><i class="ri-double-quotes-l"></i>Testimonials</a></li>-->
                    <li class="reveal reveal-bottom-right"><a  href="#footer"><i class="ri-information-line"></i>Footer</a></li>
                </ul>
            </div>
            
        </aside>
        <div class="main-content">
            <section id="hero" class="reveal reveal-top hero-section">
                <div class="image-container">
                    <img src="./assets/media/image/hero.jpg" alt="Hero section that represents step by step of the web development">
                </div>
                <div class="preview-information">
                    <div class="preview-information-content">
                        <h1 class="reveal reveal-bottom-right">Lets Bring Your Idea To Life</h1>
                        <h3 class="reveal reveal-bottom-right">I Crafting Responsive and User Friendly Websites.</h3>
                        <a href="./assets/pages/project.php" class="reveal reveal-bottom-right btn">
                            Let's Build Yours — See My Work
                        </a>
                    </div>
                </div>
            </section>

            <section id="background" class="featured-container  student-background">
                <div class="reveal reveal-bottom-left feature-image image-container">
                    <img src="./assets/media/image/homeImg1.jpg" alt="">
                </div>
                <div class="feature-content">
                    <h2 class="reveal reveal-bottom-right">Passionate Student Web Developer Ready to Make Your Idea into Reality</h2>
                    <p class="reveal reveal-bottom-right">
                        With a solid foundation in Information Technology and a keen eye for design, 
                        I am eager to embark on my freelance journey in web development. My 
                        motivation stems from a desire to build engaging websites that 
                        enhance user experiences and solve real-world problems.
                    </p>
                </div>
            </section>

            <section id="process" class="deal-process">
                <h2 class="reveal reveal-bottom">Discover the Seamless Process of Colaborating With Me</h2>
                <div class="deal-process-card-container">
                    <div class="deal-process-card process1">
                        <div class="reveal reveal-bottom-left image-container card-image">
                            <img src="./assets/media/image/journeyImg1.jpg" alt="">
                        </div>
                        <h4 class="reveal reveal-bottom-left">From concept to completion, your project is in expert hands.</h4>
                        <p class="reveal reveal-bottom-left">Engage in a straightforward journey from the initial consultation to project delivery.</p>
                        <h6 class="reveal reveal-bottom-left">START</h6>
                    </div>

                    <div class="deal-process-card process2">
                        <div class="reveal reveal-bottom image-container card-image">
                            <img src="./assets/media/image/journeyImg2.jpg" alt="">
                        </div>
                        <h4 class="reveal reveal-bottom">Initial consultation to understand your vision and project requirements.</h4>
                        <p class="reveal reveal-bottom">We discuss your ideas and outline the project scope together.</p>
                        <h6 class="reveal reveal-bottom">DISCUSS</h6>
                    </div>  

                    <div class="deal-process-card process3">
                        <div class="reveal reveal-bottom-right image-container card-image">
                            <img src="./assets/media/image/journeyImg3.jpg" alt="">
                        </div>
                        <h4 class="reveal reveal-bottom-right">Design and development phase where your ideas come to life.</h4>
                        <p class="reveal reveal-bottom-right">Watch as your project transforms through our collaborative design process.</p>
                        <h6 class="reveal reveal-bottom-right">CREATE</h6>
                    </div>
                </div>
            </section>

            <section id="responsiveness" class="featured-container design-container">
                <div class="reveal reveal-bottom-left feature-image image-container">
                    <img src="./assets/media/image/homeImg2.jpg" alt="">
                </div>
                <div class="feature-content">
                    <i class="reveal reveal-bottom-right ri-layout-line"></i>
                    <h2 class="reveal reveal-bottom-right">Mastering Responsive Design for Modern Websites</h2>
                    <p class="reveal reveal-bottom-right">Responsive design is crucial in today's digital landscape, ensuring websites look great on any device. I excel in creating fluid layouts that enhance user experience and engagement.</p>
                    <a href="./assets/pages/contact.php" class="reveal reveal-bottom-right btn">Get Yours</a>
                </div>
            </section>

            <section id="service" class="services-container">
                <div class="headlines">
                    <h5 class="reveal reveal-bottom">Innovation</h5>
                    <h2 class="reveal reveal-bottom">Explore My Skills and Services</h2>
                    <p class="reveal reveal-bottom">I offer a range of services tailored to your needs. From web development to digital marketing, I ensure your project stands out.</p>
                </div>
                <div class="services-card-container">
                    <div class="services-card">
                        <div class="reveal reveal-bottom-left image-container">
                            <img src="./assets/media/image/service1.png" alt="">
                        </div>
                        <h4 class="reveal reveal-bottom-left">Custom Web Applications for Unique Needs</h4>
                        <small class="reveal reveal-bottom-left">I create tailored web applications that solve specific problems.</small>
                    </div>

                    <div class="services-card">
                        <div class="reveal reveal-bottom image-container">
                            <img src="./assets/media/image/service2.png" alt="">
                        </div>
                        <h4 class="reveal reveal-bottom">SEO Optimization to Boost Your Visibility</h4>
                        <small class="reveal reveal-bottom">Enhance your website's ranking with targeted SEO strategies.</small>
                    </div>

                    <div class="services-card">
                        <div class="reveal reveal-bottom-right image-container">
                            <img src="./assets/media/image/service3.png" alt="">
                        </div>
                        <h4 class="reveal reveal-bottom-right">E-commerce Solutions for Your Online Store</h4>
                        <small class="reveal reveal-bottom-right">I develop e-commerce platforms that drive sales and engagement.</small>
                    </div>
                </div>
            </section>
            <!--
            <section id="testimonials">
                <h2 class="reveal reveal-bottom-left">Testimonials</h2>
                <div class="reveal reveal-bottom-right">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="testimonial-cards">
                                    <div class="clientImage-name-company">
                                        <div class="clientImage image-container">
                                            <img src="./assets/media/image/prof (3).jpg" alt="">
                                        </div>
                                        <div class="name-company">
                                            <h4>John Doe</h4>
                                            <h6>Piatos Corporation</h6>
                                        </div>
                                    </div>
                                    <div class="testimony-content">
                                        <video src="#" class="img" controls poster="./assets/media/image/prof (3).jpg"></video>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-cards">
                                    <div class="clientImage-name-company">
                                        <div class="clientImage image-container">
                                            <img src="./assets/media/image/prof (1).jpg" alt="previous clients formal picture">
                                        </div>
                                        <div class="name-company">
                                            <h4>Donna Doe</h4>
                                            <h6>Samsung Corporation</h6>
                                        </div>
                                    </div>
                                    <div class="testimony-content withVM">
                                        <div class="testimony-test-area">
                                            <p>
                                                "I'm still at the projects creations stage but i the future i will grind for testimonials to broaden my credentials."
                                            </p>
                                        </div>
                                        <audio src="#" controls>
                                            🎵 Audio Coming Soon
                                        </audio>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-cards">
                                    <div class="clientImage-name-company">
                                        <div class="clientImage image-container">
                                            <img src="./assets/media/image/prof (2).jpg" alt="previous clients formal picture">
                                        </div>
                                        <div class="name-company">
                                            <h4>Jane Doe</h4>
                                            <h6>Nestle Corporation</h6>
                                        </div>
                                    </div>
                                    <div class="testimony-content">
                                        <div class="testimony-test-area">
                                            <p>
                                                "I'm still at the projects creations stage but i the future i will grind for testimonials to broaden my credentials."
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-cards">
                                    <div class="clientImage-name-company">
                                        <div class="clientImage image-container">
                                            <img src="./assets/media/image/prof (4).jpg" alt="previous clients formal picture">
                                        </div>
                                        <div class="name-company">
                                            <h4>Emma Doe</h4>
                                            <h6>Amazon Express</h6>
                                        </div>
                                    </div>
                                    <div class="testimony-content">
                                        <div class="testimony-test-area">
                                            <p>
                                                "I'm still at the projects creations stage but i the future i will grind for testimonials to broaden my credentials."
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-cards">
                                    <div class="clientImage-name-company">
                                        <div class="clientImage image-container">
                                            <img src="./assets/media/image/prof (5).jpg" alt="previous clients formal picture">
                                        </div>
                                        <div class="name-company">
                                            <h4>Nicolas Doe</h4>
                                            <h6>Jack&chill Corporation</h6>
                                        </div>
                                    </div>
                                    <div class="testimony-content withVM">
                                        <div class="testimony-test-area">
                                            <p>
                                                "I'm still at the projects creations stage but i the future i will grind for testimonials to broaden my credentials."
                                            </p>
                                        </div>
                                        <audio src="#" controls>
                                            🎵 Audio Coming Soon
                                        </audio>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination pagination"></div>
                        <div class="swiper-button-prev swiper-slide-button "></div>
                        <div class="swiper-button-next swiper-slide-button "></div>

                    </div>
                </div>
            </section>
            -->

            <section id="footer" class="featured-container get-your-own-container">
                <div class="reveal reveal-bottom-left feature-image image-container">
                    <img src="./assets/media/image/getYourOwn.png" alt="">
                </div>
                <div class="feature-content get-your-own-content">
                    <h2 class="reveal reveal-bottom-right">Start Your Freelance Journey Today</h2>
                    <p class="reveal reveal-bottom-right">Contact me for a free consultation and explore my portfolio of web development projects.</p>
                    <div class="get-in-touch-icons">
                        <a title="Link directed to my FaceBook" class="reveal reveal-bottom-right" href="https://web.facebook.com/rushellmarciales/"><i class="ri-facebook-circle-fill"></i></a>
                        <a title="Link directed to my X(Twitter)" class="reveal reveal-bottom-right" href="#"><i class="ri-twitter-x-fill"></i></a>
                        <a title="Link directed to my LinkedIn" class="reveal reveal-bottom-right" href="https://www.linkedin.com/in/rushell-marciales-665971375?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i class="ri-linkedin-box-fill"></i></a>
                        <a title="Link directed to my Instagram" class="reveal reveal-bottom-right" href="https://www.instagram.com/rushellmarciales/"><i class="ri-instagram-line"></i></a>
                        <a title="Link directed to my GitHub" class="reveal reveal-bottom-right" href="https://marciales133.github.io"><i class="ri-github-fill"></i></a>
                    </div>
                    <a href="./assets/pages/project.php" class="reveal reveal-bottom-right btn">View Projects</a>
                </div>
            </section>

            <div class="spacer"></div>

            <footer>
                <small>&copy;<span id="year"><?= date('Y') ?></span> Rushell Marciales. All rights reserved.</small>
            </footer>
        </div>
        
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="module" src="./assets/js/main.js"></script>
</body>
</html>