<?php require_once __DIR__ . '/../../includes/navigation.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portfolio of Rushell Marciales, a web developer specializing in responsive websites, clean UI, and modern frontend development.">
    <meta property="og:title" content="Rushell Marciales | Web Developer">
    <meta property="og:description" content="I build responsive, modern websites for businesses and individuals.">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Rushell Marciales | Web Developer">
    <meta name="twitter:description" content="Modern, responsive websites built with clean code.">

    <title>Know a Little Bit More About Me | Rushell Marciales</title>
    <?php siteCanonical('assets/pages/about.php'); ?>
    <?php siteSocialImage('assets/media/image/Thumbnails/about.png'); ?>

    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"/>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/aboutStyle.css">
</head>
<body>
    <?php renderNavigation('about', false); ?>

    <main>
        <aside>
            <div class="in-page-content-navigation">
                <h2>Navigation</h2>
                <?php renderAsideNavigation(false); ?>
                <h4>Content Nav</h4>
                <ul>
                    <li class="reveal reveal-bottom-right"><a href="#knowMe"><i class="ri-emotion-happy-line"></i>Know Me</a></li>
                    <li class="reveal reveal-bottom-right"><a href="#journey"><i class="ri-road-map-line"></i>Journey</a></li>
                    <li class="reveal reveal-bottom-right"><a href="#believe"><i class="ri-lightbulb-line"></i>Belief</a></li>
                    <li class="reveal reveal-bottom-right"><a href="#process"><i class="ri-brain-line"></i>Process</a></li>
                    <li class="reveal reveal-bottom-right"><a style="font-size: .85rem;" href="#whatMatters"><i class="ri-heart-3-line"></i>What Matters</a></li>
                    <li class="reveal reveal-bottom-right"><a href="#interest"><i class="ri-star-line"></i>Interest</a></li>
                    <li class="reveal reveal-bottom-right"><a href="#skills"><i class="ri-code-s-slash-line"></i>Skills</a></li>
                </ul>
            </div>
            
        </aside>
        <div class="main-content">

            <div class="about-me-container">
                <section id="knowMe" class="home-header">
                    <div class="reveal reveal-bottom-left image-container">
                        <img src="../media/image/aboutimage.jpg" alt="">
                    </div>
                    <div class="page-header-content">
                        <div class="page-header-description">
                            <h5 class="reveal reveal-bottom-right">Know Me</h5>
                            <h2 class="reveal reveal-bottom-right">I'm Rushell,</h2>
                            <h4 class="reveal reveal-bottom-right">A <span></span></h4>
                        </div>
                        <p class="reveal reveal-bottom-right">
                            Hello! I'm Rushell Marciales, a student developer who enjoys building
                            full-stack websites and web applications. I'm comfortable with HTML,
                            CSS, JavaScript, and React, including Tailwind and UI/animation libraries.
                            I'm continuing to grow my backend, database, and deployment skills.
                        </p>
                        <div class="reveal reveal-bottom-right simple-info">
                            <small><span>Phone: </span><span>+63-961-319-8589</span></small>
                            <small><span>City: </span><span>Valenzuela City, Metro Manila.</span></small>
                            <small><span>Focus: </span>Full-Stack Web Development</small>
                            <small><span>College Level: </span><span>3nd Year College </span></small>
                            <small><span>Email: </span><span>rushellmarciales720@gmail.com</span></small>
                        </div>
                    </div>
                </section>

                <section id="journey" class="short-story-journey order-right">
                    <div class="reveal reveal-bottom-right image-container">
                        <img src="../media/image/journey.png" alt="">
                    </div>
                    <div class="short-story-content">
                        <h2 class="reveal reveal-bottom-left">My Journey</h2>
                        <p class="reveal reveal-bottom-left">
                            Ever since I was young, I’ve loved creating and fixing things. 
                            From drawing to gaming, I thrived on trial and error — the kind 
                            of repetition that builds mastery. When I discovered programming, 
                            I was ecstatic at the idea of making my own games. That spark grew 
                            into a dream of becoming a well-rounded programmer, and for the 
                            past two years I’ve been committed to continuous learning and 
                            building projects.
                        </p>
                    </div>
                </section>

                <section id="believe" class="short-story-belief">
                    <div class="reveal reveal-bottom-left image-container">
                        <img src="../media/image/belief.png" alt="">
                    </div>
                    <div class="short-story-content">
                        <h2 class="reveal reveal-bottom-right">What I Believe</h2>
                        <ul>
                            <li class="reveal reveal-bottom-right">A bad website can hurt more than having none.</li>
                            <li class="reveal reveal-bottom-right">A good one can transform your business.</li>
                            <li class="reveal reveal-bottom-right">A thoughtful one unlocks opportunity.</li>
                        </ul>
                        <p class="reveal reveal-bottom-right">
                            I’ve learned that great ideas can go unseen without action. 
                            That’s why I design and build with clarity, purpose, and flexibility.
                        </p>
                    </div>
                </section>

                <section id="process" class="short-story-work order-right">
                    <div class="reveal reveal-bottom-right image-container">
                        <img src="../media/image/works.png" alt="">
                    </div>
                    <div class="short-story-content">
                        <h2 class="reveal reveal-bottom-left">How I Work</h2>
                        <p class="reveal reveal-bottom-left">
                            I plan in Figma, then build with clean, responsive code — no clutter,
                            no fluff. Just digital spaces that work well and communicate clearly.
                        </p>
                        <ul>
                            <li class="reveal reveal-bottom-left">📐 Design first, code second (clarity before complexity).</li>
                            <li class="reveal reveal-bottom-left">🔄 Responsive & flexible (built for all screens).</li>
                            <li class="reveal reveal-bottom-left">🧩 Logical and scalable (easy to maintain, easy to grow).</li>
                        </ul>
                    </div>
                </section>

                <section id="whatMatters" class="short-story-matters">
                    <div class="reveal reveal-bottom-left image-container">
                        <img src="../media/image/matters.png" alt="">
                    </div>
                    <div class="short-story-content">
                        <h2 class="reveal reveal-bottom-right">Why It Matters for You</h2>
                        <p class="reveal reveal-bottom-right">
                            You won’t find ego here. Just someone who listens, builds with logic, 
                            and cares about doing the job right.
                        </p>
                        <p class="reveal reveal-bottom-right">
                            Whether it’s a small brand trying to reach its audience or a local 
                            business hoping to grow, I create websites that turn ideas into opportunities.
                        </p>
                    </div>
                </section>
            </div>

            <section id="interest" class="interest-container">
                <h2 class="reveal reveal-bottom">Interest</h2>
                <ul>
                    <li class="reveal reveal-bottom YouTube"><i class="ri-youtube-fill"></i><span>YouTube</span></li>
                    <li class="reveal reveal-bottom TikTok"><i class="ri-music-fill"></i><span>TikTok</span></li>
                    <li class="reveal reveal-bottom FaceBook"><i class="ri-facebook-fill"></i><span>FaceBook</span></li>
                    <li class="reveal reveal-bottom Spotify"><i class="ri-spotify-fill"></i><span>Spotify</span></li>
                    <li class="reveal reveal-bottom Chrome"><i class="ri-chrome-fill"></i><span>Chrome</span></li>
                    <li class="reveal reveal-bottom github"><i class="ri-github-fill"></i></i><span>GitHub</span></li>
                    <li class="reveal reveal-bottom VScode"><i class="ri-code-box-fill"></i><span>VScode</span></li>
                    <li class="reveal reveal-bottom Figma"><i class="ri-paint-brush-fill"></i><span>Figma</span></li>
                    <li class="reveal reveal-bottom ChatGPPT"><i class="ri-robot-2-fill"></i><span>ChatGPPT</span></li>
                    <li class="reveal reveal-bottom Valorant"><i class="ri-gamepad-fill"></i><span>Valorant</span></li>
                </ul>
            </section>

            <section id="skills" class="skills-container">
                <h2 class="reveal reveal-bottom">SKILLS</h2>
                <div>
                    <h3 class="reveal reveal-bottom">SOFTWARE SKILLS</h3>
                    <div class="sub-skills-containers">
                        <div class="skill-wrapper">
                            <div class="reveal reveal-bottom skill-label">HTML</div>
                            <div class="reveal reveal-bottom progress-contaiiner">
                                <div class="progress-bar html" style="--skill-level: 90%" role="progressbar" aria-label="HTML" aria-valuemin="0" aria-valuemax="100" aria-valuenow="90"></div>
                                <div class="bookmark-on-language">
                                    <h5>Semantic & responsive pages</h5>
                                </div>
                            </div>
                        </div>
                        <div class="skill-wrapper">
                            <div class="reveal reveal-bottom skill-label">CSS & Tailwind</div>
                            <div class="reveal reveal-bottom progress-contaiiner">
                                <div class="progress-bar css" style="--skill-level: 88%" role="progressbar" aria-label="CSS & Tailwind" aria-valuemin="0" aria-valuemax="100" aria-valuenow="88"></div>
                                <div class="bookmark-on-language">
                                    <h5>Responsive UI & styling</h5>
                                </div>
                            </div>
                        </div>
                        <div class="skill-wrapper">
                            <div class="reveal reveal-bottom skill-label">JavaScript</div>
                            <div class="reveal reveal-bottom progress-contaiiner">
                                <div class="progress-bar js" style="--skill-level: 88%" role="progressbar" aria-label="JavaScript" aria-valuemin="0" aria-valuemax="100" aria-valuenow="88"></div>
                                <div class="bookmark-on-language">
                                    <h5>Full-stack apps & APIs</h5>
                                </div>
                            </div>
                        </div>
                        <div class="skill-wrapper">
                            <div class="reveal reveal-bottom skill-label">React</div>
                            <div class="reveal reveal-bottom progress-contaiiner">
                                <div class="progress-bar react" style="--skill-level: 85%" role="progressbar" aria-label="React" aria-valuemin="0" aria-valuemax="100" aria-valuenow="85"></div>
                                <div class="bookmark-on-language">
                                    <h5>Components & animations</h5>
                                </div>
                            </div>
                        </div>
                        <div class="skill-wrapper">
                            <div class="reveal reveal-bottom skill-label">Java</div>
                            <div class="reveal reveal-bottom progress-contaiiner">
                                <div class="progress-bar java" style="--skill-level: 55%" role="progressbar" aria-label="Java" aria-valuemin="0" aria-valuemax="100" aria-valuenow="55"></div>
                                <div class="bookmark-on-language">
                                    <h5>Framework fundamentals</h5>
                                </div>
                            </div>
                        </div>
                        <div class="skill-wrapper">
                            <div class="reveal reveal-bottom skill-label">C#</div>
                            <div class="reveal reveal-bottom progress-contaiiner">
                                <div class="progress-bar csharp" style="--skill-level: 60%" role="progressbar" aria-label="C#" aria-valuemin="0" aria-valuemax="100" aria-valuenow="60"></div>
                                <div class="bookmark-on-language">
                                    <h5>Framework fundamentals</h5>
                                </div>
                            </div>
                        </div>
                        <div class="skill-wrapper">
                            <div class="reveal reveal-bottom skill-label">Database Design</div>
                            <div class="reveal reveal-bottom progress-contaiiner">
                                <div class="progress-bar databases" style="--skill-level: 75%" role="progressbar" aria-label="Database Design" aria-valuemin="0" aria-valuemax="100" aria-valuenow="75"></div>
                                <div class="bookmark-on-language">
                                    <h5>MongoDB & SQL databases</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="development-experience" aria-label="Development experience">
                    <h3 class="reveal reveal-bottom">DEVELOPMENT EXPERIENCE</h3>
                    <p class="reveal reveal-bottom experience-intro">
                        Hands-on practice creating full-stack websites, working with several database
                        systems, and deploying projects to the web. My Git and GitHub skills are
                        still at a beginner level.
                    </p>
                    <div class="experience-grid">
                        <article class="reveal reveal-bottom experience-card">
                            <strong class="experience-stat">3</strong>
                            <h4>Full-Stack Websites</h4>
                            <p>Built three end-to-end website projects.</p>
                        </article>
                        <article class="reveal reveal-bottom experience-card">
                            <strong class="experience-stat">7</strong>
                            <h4>Databases Created</h4>
                            <p>4 SQL Server (SSMS), 1 MongoDB, 1 PostgreSQL, and 1 MySQL.</p>
                        </article>
                        <article class="reveal reveal-bottom experience-card">
                            <strong class="experience-stat">1</strong>
                            <h4>Vercel Deployment</h4>
                            <p>Deployed a web project using Vercel.</p>
                        </article>
                        <article class="reveal reveal-bottom experience-card">
                            <strong class="experience-stat experience-stat--text">Learning</strong>
                            <h4>Git & GitHub</h4>
                            <p>Very basic Git and GitHub experience, including GitHub Pages.</p>
                        </article>
                    </div>
                </div>
                <div>
                    <h3 class="reveal reveal-bottom">SOFT SKILLS</h3>
                    <div class="sub-skills-containers">
                        <div class="skill-wrapper">
                            <div class="reveal reveal-bottom skill-label">
                                Problem Solving
                            </div>
                            <div class="reveal reveal-bottom progress-contaiiner">
                                <div class="progress-bar problem-solving" style="--skill-level: 70%" role="progressbar" aria-label="Problem Solving" aria-valuemin="0" aria-valuemax="100" aria-valuenow="70"></div>
                                <div class="bookmark-on-language">
                                    <h5>DSA</h5>
                                </div>
                            </div>
                        </div>
                        <div class="skill-wrapper">
                            <div class="reveal reveal-bottom skill-label">
                                Communication
                            </div>
                            <div class="reveal reveal-bottom progress-contaiiner">
                                <div class="progress-bar communication" style="--skill-level: 55%" role="progressbar" aria-label="Communication" aria-valuemin="0" aria-valuemax="100" aria-valuenow="55"></div>
                                <div class="bookmark-on-language">
                                    <h5>1on1 Communication</h5>
                                </div>
                            </div>
                        </div>
                    </div>
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