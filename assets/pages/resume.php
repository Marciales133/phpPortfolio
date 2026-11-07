<?php require_once __DIR__ . '/../../includes/navigation.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Resume of Rushell Marciales, a web developer specializing in responsive websites, clean UI, and modern frontend development.">
    <meta property="og:title" content="Expertise, Education, and Certificates | Rushell Marciales">
    <meta property="og:description" content="Explore the expertise, education, and certificates of Rushell Marciales.">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Expertise, Education, and Certificates | Rushell Marciales">
    <meta name="twitter:description" content="Explore the expertise, education, and certificates of Rushell Marciales.">

    <title>Expertise, Education, and Certificates | Rushell Marciales</title>
    <?php siteCanonical('assets/pages/resume.php'); ?>
    <?php siteSocialImage('assets/media/image/Thumbnails/resume.png'); ?>

    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"/>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/resume.css">
</head>
<body id="resume">
    <?php renderNavigation('resume', false); ?>

    <main>
        <aside>
            <div class="in-page-content-navigation">
                <h2>Navigation</h2>
                <?php renderAsideNavigation(false); ?>
                <h4>Content Nav</h4>
                <ul>
                    <li class="reveal reveal-bottom-left"><a href="#essentials"><i class="ri-checkbox-multiple-line"></i>Essentials</a></li>
                    <li class="reveal reveal-bottom-left"><a href="#certificates"><i class="ri-medal-line"></i>Certificates</a></li>
                </ul>
            </div>

        </aside>
        <div class="main-content">

            <div id="essentials" class="resume-container">
                <section class="reveal reveal-bottom-left myself-container">
                    <div class="image-container">
                        <img src="../media/image/properPic.jpg" alt="">
                        <h2>Rushell Marciales</h2>
                    </div>

                    <div class="some-information-container">
                        <small><i class="ri-briefcase-line"></i> Web Developer</small>
                        <small><i class="ri-map-pin-line"></i> Valenzuela, Philippines</small>
                        <small><i class="ri-mail-line"></i> rushellmarciales720@gmail.com</small>
                        <small><i class="ri-smartphone-line"></i> 09613198589</small>
                    </div>

                    <div class="skills-container">
                        <div class="sub-skills-containers">
                            <h3><i class="ri-star-line"></i> Skills</h3>
                            <div class="skill-wrapper">
                                <div class="skill-label">Frontend Development</div>
                                <div class="progress-contaiiner">
                                    <div class="progress-bar frontend-development" style="--skill-level: 90%" role="progressbar" aria-label="Frontend Development" aria-valuemin="0" aria-valuemax="100" aria-valuenow="90"></div>
                                    <div class="bookmark-on-progress">
                                        <h5><small>HTML · CSS · JS</small></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="skill-wrapper">
                                <div class="skill-label">React & UI Integration</div>
                                <div class="progress-contaiiner">
                                    <div class="progress-bar react-ui" style="--skill-level: 85%" role="progressbar" aria-label="React & UI Integration" aria-valuemin="0" aria-valuemax="100" aria-valuenow="85"></div>
                                    <div class="bookmark-on-progress">
                                        <h5><small>React · Tailwind</small></h5>
                                    </div>
                                </div>
                            </div>

                            <div class="skill-wrapper">
                                <div class="skill-label">Backend &amp; REST APIs</div>
                                <div class="progress-contaiiner">
                                    <div class="progress-bar backend-api" style="--skill-level: 78%" role="progressbar" aria-label="Backend and REST APIs" aria-valuemin="0" aria-valuemax="100" aria-valuenow="78"></div>
                                    <div class="bookmark-on-progress"><h5><small>Node · Express</small></h5></div>
                                </div>
                            </div>
                            <div class="skill-wrapper">
                                <div class="skill-label">Full-Stack Projects</div>
                                <div class="progress-contaiiner">
                                    <div class="progress-bar fullstack-development" style="--skill-level: 82%" role="progressbar" aria-label="Full-Stack Projects" aria-valuemin="0" aria-valuemax="100" aria-valuenow="82"></div>
                                    <div class="bookmark-on-progress">
                                        <h5><small>3 Websites</small></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="skill-wrapper">
                                <div class="skill-label">Database Development</div>
                                <div class="progress-contaiiner">
                                    <div class="progress-bar database-development" style="--skill-level: 75%" role="progressbar" aria-label="Database Development" aria-valuemin="0" aria-valuemax="100" aria-valuenow="75"></div>
                                    <div class="bookmark-on-progress">
                                        <h5><small>MongoDB · SQL</small></h5>
                                    </div>
                                </div>
                            </div>

                            <div class="skill-wrapper">
                                <div class="skill-label">C# &amp; .NET</div>
                                <div class="progress-contaiiner">
                                    <div class="progress-bar csharp-dotnet" style="--skill-level: 60%" role="progressbar" aria-label="C sharp and .NET" aria-valuemin="0" aria-valuemax="100" aria-valuenow="60"></div>
                                    <div class="bookmark-on-progress"><h5><small>Forms · .NET</small></h5></div>
                                </div>
                            </div>
                            <div class="skill-wrapper">
                                <div class="skill-label">Java Development</div>
                                <div class="progress-contaiiner">
                                    <div class="progress-bar java-development" style="--skill-level: 55%" role="progressbar" aria-label="Java Development" aria-valuemin="0" aria-valuemax="100" aria-valuenow="55"></div>
                                    <div class="bookmark-on-progress"><h5><small>Java · OOP</small></h5></div>
                                </div>
                            </div>
                            <div class="skill-wrapper">
                                <div class="skill-label">Git & Deployment</div>
                                <div class="progress-contaiiner">
                                    <div class="progress-bar git-deployment" style="--skill-level: 35%" role="progressbar" aria-label="Git & Deployment" aria-valuemin="0" aria-valuemax="100" aria-valuenow="35"></div>
                                    <div class="bookmark-on-progress">
                                        <h5><small>Git basics</small></h5>
                                    </div>
                                </div>
                            </div>

                            <h3><i class="ri-translate"></i> Language</h3>
                            <div class="skill-wrapper">
                                <div class="skill-label">
                                    Tagalog
                                </div>
                                <div class="progress-contaiiner">
                                    <div class="progress-bar tagalog"></div>
                                </div>
                            </div>
                            <div class="skill-wrapper">
                                <div class="skill-label">
                                    English
                                </div>
                                <div class="progress-contaiiner">
                                    <div class="progress-bar english"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="download-resume-container">
                        <a href="" class="btn">DOWNLOAD RESUME</a>
                    </div>
                </section>

                <section class="reveal reveal-bottom-right project-experience-container">
                    <h2><i class="ri-briefcase-line"></i> Project Experience</h2>
                    <div class="resume-card">
                        <h4 class="resume-card-title">
                            DMC E-Shop — Full-Stack E-Commerce Application
                        </h4>
                        <h5 class="date-or-school"><i class="ri-calendar-line"></i>
                            React · Tailwind CSS · JavaScript · Node.js · Express.js · MySQL
                        </h5>
                        <p>
                            Developing a full-stack e-commerce platform for merchandise, focusing on 
                            responsive user interfaces, product management, and backend integration. 
                            The project involves building reusable React components, developing REST 
                            APIs, and connecting frontend functionality with a relational database.
                        </p>
                    </div>
                    <div class="resume-card">
                        <h4 class="resume-card-title">
                            Street Flex — Full-Stack E-Commerce Website
                        </h4>
                        <h5 class="date-or-school"><i class="ri-calendar-line"></i> 
                            HTML · CSS · JavaScript · Node.js · Express.js · MongoDB · Mongoose
                        </h5>
                        <p>
                            Developed a streetwear e-commerce website using JavaScript technologies for 
                            frontend and backend development. Gained practical experience in integrating 
                            a NoSQL database, organizing server-side functionality, and deploying the 
                            website through Vercel.
                        </p>
                    </div>
                    <div class="resume-card">
                        <h4 class="resume-card-title">
                            CarSell — Car Dealership Management System
                        </h4>
                        <h5 class="date-or-school"><i class="ri-calendar-line"></i> 
                            HTML · CSS · JavaScript · Node.js · Express.js · PostgreSQL · Supabase
                        </h5>
                        <p>
                            Developed a web-based car dealership system that expanded from a frontend design 
                            exercise into a management application. Worked on features for vehicle inventory, 
                            sales transactions, customer records, and human resource management while gaining 
                            experience with relational databases and full-stack development.
                        </p>
                    </div>
                </section>

                <section class="reveal reveal-bottom-right education-container">
                    <h2><i class="ri-briefcase-line"></i> Education</h2>
                    <div class="resume-card">
                        <h4 class="resume-card-title">Pamantasan ng Lungsod ng Valenzuela</h4>
                        <h5 class="date-or-school"><i class="ri-calendar-line"></i> Aug 24, 2024 / <span>Present</span></h5>
                        <p>
                            Currently at second year in my first semester.
                        </p>
                    </div>
                    <div class="resume-card">
                        <h4 class="resume-card-title">W3Schools.com</h4>
                        <h5 class="date-or-school"><i class="ri-calendar-line"></i> Aug 7, 2025 / <span>Present</span></h5>
                        <p>
                            Currently at introduction of search and sort.
                        </p>
                    </div>
                    <div class="resume-card">
                        <h4 class="resume-card-title">Cisco Packet Tracer</h4>
                        <h5 class="date-or-school"><i class="ri-calendar-line"></i> Aug 7, 2025 / Sept 12, 2025</h5>
                        <p>
                            Learned all about netwrking through simulation of Cisco 
                            Packet Tracer with its simulations.
                        </p>
                    </div>
                    <div class="resume-card">
                        <h4 class="resume-card-title">Electron College of Technical Education</h4>
                        <h5 class="date-or-school"><i class="ri-calendar-line"></i> 2022 / 2024</h5>
                        <p>
                            Information And Communication Technology: K11 & k12
                        </p>
                    </div>
                </section>
            </div>

            <section id="certificates" class="cerificate-container">
                <h2 class="reveal reveal-bottom">Certificates</h2>
                <div class="reveal reveal-bottom swiper">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="cisco-cert certificate-card">
                                <div class="image-container">
                                    <img src="../media/image/certificates/Exploring IoT with Cisco Packet Tracer.jpg" alt="Cisco Packet Tracer Certificate">
                                </div>
                                <div class="certificate-tite">
                                    <h4>BY: Cisco Packet Tracer</h4>
                                    <h5>Exploring IoT with Cisco Packet Tracer</h5>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="cisco-cert certificate-card">
                                <div class="image-container">
                                    <img src="../media/image/certificates/Exploring Networking Cisco Packet Tracer.jpg" alt="Cisco Packet Tracer Certificate">
                                </div>
                                <div class="certificate-tite">
                                    <h4>BY: Cisco Packet Tracer</h4>
                                    <h5>Exploring Networking with Cisco Packet Tracer</h5>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="cisco-cert certificate-card">
                                <div class="image-container">
                                    <img src="../media/image/certificates/Getting Started With Cisco Packet Tracer.jpg" alt="Cisco Packet Tracer Certificate">
                                </div>
                                <div class="certificate-tite">
                                    <h4>BY: Cisco Packet Tracer</h4>
                                    <h5>Getting Started With Cisco Packet Tracer</h5>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="cisco-cert certificate-card">
                                <div class="image-container">
                                    <img src="../media/image/certificates/introduction to packet tracer exam.jpg" alt="Cisco Packet Tracer Certificate">
                                </div>
                                <div class="certificate-tite">
                                    <h4>BY: Cisco Packet Tracer</h4>
                                    <h5>introduction to packet tracer exam</h5>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div style="background-color: rgb(91, 132, 30);" class="certificate-card">
                                <div class="image-container">
                                    <img src="../media/image/certificates/Mastering project management.jpg" alt="Mastering Project Management Certificate">
                                </div>
                                <div class="certificate-tite">
                                    <h4>BSIT 4-4 at PLV</h4>
                                    <h5>Mastering Project Management: Essential Skills for IT Success</h5>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div style="background-color: rgb(69, 69, 190);" class="certificate-card">
                                <div class="image-container">
                                    <img src="../media/image/certificates/engineering the speed of thought.jpg" alt="Engineering the Speed of Thought Certificate">
                                </div>
                                <div class="certificate-tite">
                                    <h4>BSIT 4-4 at PLV</h4>
                                    <h5>Engineering the Speed of Thought: Maximizing Developer Efficiency with LLMs</h5>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div style="background-color: rgb(174, 148, 4);" class="certificate-card">
                                <div class="image-container">
                                    <img src="../media/image/certificates/cybersecurity fundamentals.jpg" alt="Cybersecurity Fundamentals Certificate">
                                </div>
                                <div class="certificate-tite">
                                    <h4>BSIT 4-4 at PLV</h4>
                                    <h5>Cybersecurity Fundamentals</h5>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div style="background-color: crimson;" class="certificate-card">
                                <div class="image-container">
                                    <img src="../media/image/certificates/open source inovation.jpg" alt="Open Source Innovation Certificate">
                                </div>
                                <div class="certificate-tite">
                                    <h4>BSIT 4-4 at PLV</h4>
                                    <h5>Open Source Innovation: How Red Hat Is Driving Real-World Technology</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </section>

            <div class="spacer"></div>

            <footer>
                <small>©<span id="year"><?= date('Y') ?></span> Rushell Marciales. All rights reserved.</small>
            </footer>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    <script type="module" src="../js/main.js"></script>
</body>
</html>

<!--
            <section class="education-experience">
                <div class="education">
                    <h3>Academic Records</h3>
                    <div class="school">
                        <div class="dots-lines">
                            <div class="dot"></div>
                            <div class="line"></div>
                        </div>
                        <div class="education-content">
                            <p>Pamantasan ng Lungsod ng Valenzuela</p>
                            <small>2024-2025 YEAR 1: 1st Sem = 1.57</small>
                            <small>2024-2025 YEAR 1: 2st Sem = 1.49</small>
                            <small>2025-2026 YEAR 2: 1st Sem = _.__</small>
                        </div>
                    </div>

                    <div class="school">
                        <div class="dots-lines">
                            <div class="dot"></div>
                            <div class="line"></div>
                        </div>
                        <div class="education-content">
                            <p>Electron College of Technical Education</p>
                            <small>2022-2023 YEAR 1: 1st Sem = 1.75</small>
                            <small>2023-2024 YEAR 1: 2st Sem = 1.88</small>
                        </div>
                    </div>

                </div>
                <div class="education">
                    <h3>Experince Records</h3>
                    <div class="school">
                        <div class="dots-lines">
                            <div class="dot"></div>
                            <div class="line"></div>
                        </div>
                        <div class="education-content">
                            <p>Myrna's Karinderya</p>
                            <small>2018-2019: Tendant</small>
                        </div>
                    </div>
                </div>
            </section>

            <section class="download-resume">
                <div>
                    <h2>Up to Date Resume</h2>
                    <p>All essential informations</p>
                </div>
                <a href="#" class="btn">DOWNLOAD</a>
            </section>
-->
