<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About MIEL | MIEL - Multiple Intelligence Experiential Learning</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="mobile.css" media="screen">

    <style>
        /* ===== KID-FRIENDLY THEME ===== */
        :root {
            --primary-blue: #4A90E2;
            --secondary-green: #50C878;
            --accent-yellow: #FFD166;
            --background-light: #F8F9FF;
            --text-dark: #2C3E50;
            --shadow: 0 4px 12px rgba(0,0,0,0.1);
            --border-radius: 20px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Comic Sans MS', 'Chalkboard SE', 'Arial Rounded MT Bold', sans-serif;
            color: var(--text-dark);
            padding: 0px;
            min-height: 100vh;
            position: relative;
            background: linear-gradient(135deg, #E3F2FD 0%, #F3E5F5 100%);
        }
        
        /* Tiled semi-opaque image background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('background-tile.jpg');
            background-repeat: repeat;
            background-size: 1980px 1080px;
            opacity: 0.9;
            z-index: -1;
        }

        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(248, 249, 255, 0.3);
            z-index: -3;
        }
        
        .container {
            max-width: 800px; /* Fixed to 800px */
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }
        
        .navbar {
            margin-bottom: 30px;
        }
        
        .navbar {
            font-family: 'Arial', sans-serif !important;
            font-weight: 300 !important;
        }

        .navbar-nav .nav-link {
            font-size: 1.0rem !important;
            color: #333 !important;
            transition: color 0.3s ease !important;
        }

        .navbar-nav .nav-link:hover {
            color: #4A90E2 !important;
        }
        
        .navbar .container {
            width: 100%;
            max-width: 100%;
            padding-left: 300px;
            padding-right: 300px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .navbar-collapse {
            flex-grow: 0;
        }
        
        /* ===== MIEL BANNER ===== */
        .miel-banner-container {
            text-align: center;
            margin-bottom: 40px;
            padding: 0;
            border-radius: var(--border-radius);
            position: relative;
            overflow: hidden;
            max-width: 500px; /* Fixed to match login.php (500px) */
            margin-left: auto;
            margin-right: auto;
        }
        
        .miel-banner {
            width: 100%;
            height: auto;
            display: block;
            border-radius: var(--border-radius);
            /* Removed blue border - matches login.php */
        }
        
        /* ===== MAIN CONTENT CARD ===== */
        .main-content-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: var(--border-radius);
            padding: 40px;
            box-shadow: var(--shadow);
            width: 100%;
            backdrop-filter: blur(5px);
            border: 2px solid rgba(255, 255, 255, 0.8);
            margin-bottom: 40px;
        }
        
        /* ===== TYPOGRAPHY ===== */
        h1 {
            color: var(--primary-blue);
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.2rem;
            text-shadow: 2px 2px 0 rgba(0,0,0,0.1);
        }
        
        h2 {
            color: var(--secondary-green);
            text-align: center;
            margin: 30px 0 20px 0;
            padding-bottom: 10px;
            border-bottom: 3px solid var(--accent-yellow);
            font-size: 1.8rem;
        }
        
        h3 {
            color: var(--primary-blue);
            margin: 20px 0 15px 0;
            font-size: 1.4rem;
        }
        
        p {
            line-height: 1.6;
            margin-bottom: 15px;
            font-size: 1.1rem;
        }
        
        .lead {
            font-size: 1.3rem;
            font-weight: bold;
            color: var(--secondary-green);
            text-align: center;
            margin-bottom: 30px;
        }
        
        /* ===== SECTIONS ===== */
        /* REMOVED BORDER-LEFT ACCENTS */
        .section {
            margin-bottom: 40px;
            padding: 25px;
            background: rgba(248, 249, 255, 0.7);
            border-radius: 15px;
            /* border-left: 5px solid var(--primary-blue); REMOVED */
        }
        
        .highlight-section {
            background: linear-gradient(135deg, #E8F5E9 0%, #E3F2FD 100%);
            /* border-left: 5px solid var(--secondary-green); REMOVED */
        }
        
        /* ===== LISTS ===== */
        .intelligence-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
            margin: 20px 0;
        }
        
        .intelligence-item {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            /* border-left: 4px solid var(--primary-blue); REMOVED */
            transition: transform 0.3s;
        }
        
        .intelligence-item:hover {
            transform: translateY(-5px);
        }
        
        .intelligence-icon {
            color: var(--secondary-green);
            margin-right: 10px;
            font-size: 1.2rem;
        }
        
        /* ===== DASHBOARD HEADER ===== */
        .dashboard-header {
            text-align: center;
            margin-bottom: 15px;
            padding: 20px;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }
        
        .worlds-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
            margin: 20px 0;
        }
        
        .world-item {
            background: white;
            padding: 12px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }
        
        .world-item:hover {
            background: var(--accent-yellow);
            transform: scale(1.05);
        }
        
        /* ===== BENEFITS & FEATURES ===== */
        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin: 25px 0;
        }
        
        .benefit-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-align: center;
            /* border-top: 4px solid var(--secondary-green); REMOVED */
        }
        
        .benefit-card i {
            font-size: 2rem;
            color: var(--primary-blue);
            margin-bottom: 15px;
        }
        
        .feature-list {
            list-style: none;
            padding-left: 0;
        }
        
        .feature-list li {
            padding: 10px 0;
            border-bottom: 1px dashed #ddd;
            position: relative;
            padding-left: 30px;
        }
        
        .feature-list li:before {
            color: var(--secondary-green);
            font-weight: bold;
            position: absolute;
            left: 0;
            top: 10px
        }
        
	.checkmark {
	    color: var(--secondary-green);
	    font-weight: bold;
	    position: absolute;
	    left: 0;
	    top: 10px;
	    font-size: 1.2rem;
		}        

        /* ===== CALL TO ACTION ===== */
.cta-section {
    text-align: center;
    padding: 20px;
    background: rgba(248, 249, 255, 0.9); /* Lighter background */
    color: var(--text-dark); /* Same font color as other sections */
    border-radius: var(--border-radius);
    margin-top: 0px;
    border: 1px solid rgba(74, 144, 226, 0.2); /* Subtle border */
}

.cta-title {
    color: var(--primary-blue); /* Blue for the title */
    margin-top: 15px;
    margin-bottom: 20px;
}

.cta-button {
    display: inline-block;
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-green) 100%);
    color: white;
    padding: 15px 40px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: bold;
    font-size: 1.2rem;
    margin-top: 20px;
    margin-bottom: 20px;
    transition: all 0.3s;
    border: 2px solid transparent;
}

.cta-button:hover {
    background: white;
    color: var(--primary-blue);
    border-color: var(--primary-blue);
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}
        
        /* ===== RESPONSIVE DESIGN ===== */
        @media (max-width: 992px) {
            .navbar .container {
                padding-left: 50px;
                padding-right: 50px;
            }
            
            .miel-banner-container {
                max-width: 90%;
            }
            
            .main-content-card {
                padding: 30px;
            }
            
            .intelligence-list,
            .worlds-grid,
            .benefits-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
        }
        
        @media (max-width: 800px) {
            .container {
                padding: 10px;
            }
            
            .main-content-card {
                padding: 20px;
            }
        }
        
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
            
            h2 {
                font-size: 1.5rem;
            }
            
            .section {
                padding: 20px;
            }
            
            .intelligence-list,
            .worlds-grid {
                grid-template-columns: 1fr;
            }
            
            .benefits-grid {
                grid-template-columns: 1fr;
            }
            
            .cta-section {
                padding: 30px 20px;
            }
        }
        
        @media (max-width: 480px) {
            h1 {
                font-size: 1.8rem;
            }
            
            .lead {
                font-size: 1.1rem;
            }
            
            .miel-banner-container {
                max-width: 100%;
            }
        }
        
        /* ===== ANIMATIONS ===== */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in {
            animation: fadeInUp 0.8s ease-out;
        }
    </style>
</head>
<body class="about-page">
    <!-- ARVILLE NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <img src="../images/logo.jpg" alt="ARville Network" width="200" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="about-miel.htm">About MIEL</a></li>
                    <li class="nav-item"><a class="nav-link" href="miel-join.php">Join MIEL</a></li>
                    <li class="nav-item"><a class="nav-link" href="../contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- MIEL BANNER IMAGE -->
    <div class="miel-banner-container fade-in">
        <img src="miel-banner.png" alt="MIEL - Multiple Intelligence Experiential Learning System" class="miel-banner">
    </div>

    <!-- MAIN CONTENT -->
    <div class="container">
    
        <!-- DASHBOARD HEADER -->
        <header class="dashboard-header fade-in">
            <div class="logo">
                <div>
                    <img src="images/about.jpg" alt="Create Quiz for Arville Metaverse" style="max-width: 450px; height: auto; margin-bottom: 10px;">
                    <p class="subtitle">Transforming Education Through Multiple Intelligence Experiential Learning</p>
                </div>
            </div>
        </header>

        <div class="main-content-card fade-in">
            
            <div class="section">
                <p>Welcome to the MIEL (Multiple Intelligence Experiential Learning) system, an innovative educational platform that revolutionizes how students learn by recognizing and nurturing their individual strengths. Founded on Dr. Howard Gardner's groundbreaking theory of multiple intelligences, MIEL creates personalized learning journeys that make education engaging, meaningful, and effective for every child.</p>
            </div>
            
            <h2>Our Educational Philosophy</h2>
            
            <div class="section">
                <h3>The Problem with Traditional Education</h3>
                <p>Traditional classrooms often focus on just two types of intelligence: linguistic (reading/writing) and logical-mathematical (math/science). But what about the student who thinks in images, learns through movement, understands patterns through music, or connects deeply with nature? These students are often left behind in conventional systems.</p>
                
                <h3>Our Solution: 8 Pathways to Learning</h3>
                <p>MIEL embraces all eight intelligences:</p>
                
                <div class="intelligence-list">
                    <div class="intelligence-item">
                        <i class="fas fa-book intelligence-icon"></i> <strong>Linguistic</strong> - Word Smart
                    </div>
                    <div class="intelligence-item">
                        <i class="fas fa-calculator intelligence-icon"></i> <strong>Logical-Mathematical</strong> - Number/Reasoning Smart
                    </div>
                    <div class="intelligence-item">
                        <i class="fas fa-paint-brush intelligence-icon"></i> <strong>Spatial</strong> - Picture Smart
                    </div>
                    <div class="intelligence-item">
                        <i class="fas fa-running intelligence-icon"></i> <strong>Bodily-Kinesthetic</strong> - Body Smart
                    </div>
                    <div class="intelligence-item">
                        <i class="fas fa-music intelligence-icon"></i> <strong>Musical</strong> - Music Smart
                    </div>
                    <div class="intelligence-item">
                        <i class="fas fa-users intelligence-icon"></i> <strong>Interpersonal</strong> - People Smart
                    </div>
                    <div class="intelligence-item">
                        <i class="fas fa-user-check intelligence-icon"></i> <strong>Intrapersonal</strong> - Self Smart
                    </div>
                    <div class="intelligence-item">
                        <i class="fas fa-leaf intelligence-icon"></i> <strong>Naturalist</strong> - Nature Smart
                    </div>
                </div>
            </div>
            
            <h2>The MIEL Experience:<br/>Virtual Worlds, Real Learning</h2>
            
            <div class="section highlight-section">
                <h3>Step Into Immersive Learning Environments</h3>
                <p>Our platform transports students to carefully crafted 3D virtual worlds where learning comes alive. Students can explore realistic environments, interact with objects and characters, and experience concepts firsthand through immersive simulations.</p>
                
                <p>Examples of our rich learning environments include:</p>
                
                <div class="worlds-grid">
                    <div class="world-item">&#127795; Virtual Zoos</div>
                    <div class="world-item">&#127963;&#65039; Interactive Museums</div>
                    <div class="world-item">&#127794; Virtual Ecosystems</div>
                </div>
                
                <p>These are just a sample of the diverse virtual spaces available. Each environment is meticulously designed to align with curriculum standards while providing engaging, hands-on learning experiences that cater to all eight intelligence types.</p>
                
                <p>From exploring historical artifacts in virtual museums to observing wildlife behavior in simulated ecosystems, students gain practical understanding through experiential learning that traditional classrooms cannot provide.</p>
            </div>
            
            <h2><br/>How It Works</h2>
            
            <div class="benefits-grid">
                <div class="benefit-card">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <h3>For Teachers:</h3>
<ul class="feature-list">
    <li><span class="checkmark">&#x2713;</span> Create Customized Activities</li>
    <li><span class="checkmark">&#x2713;</span> Choose Virtual Worlds</li>
    <li><span class="checkmark">&#x2713;</span> Track Student Progress</li>
    <li><span class="checkmark">&#x2713;</span> Differentiate Instruction</li>
</ul>                </div>
                
                <div class="benefit-card">
                    <i class="fas fa-user-graduate"></i>
                    <h3>For Students:</h3>
<ul class="feature-list">
    <li><span class="checkmark">&#x2713;</span> Discover Your Strengths</li>
    <li><span class="checkmark">&#x2713;</span> Learn Things Your Way</li>
    <li><span class="checkmark">&#x2713;</span> Build Confidence</li>
    <li><span class="checkmark">&#x2713;</span> Develop All Intelligences</li>
</ul>                </div>

            </div>
            
            <h2><br/>Research-Based Benefits</h2>
            
            <div class="section">
                <h3>Proven Educational Outcomes:</h3>
                <ul class="feature-list">
                    <li><span class="checkmark">&#x2713;</span> <strong>28% Higher Engagement</strong> - Students are more motivated in virtual environments</li>
                    <li><span class="checkmark">&#x2713;</span> <strong>42% Better Retention</strong> - Experiential learning improves memory</li>
                    <li><span class="checkmark">&#x2713;</span> <strong>Improved Self-Esteem</strong> - Every student discovers areas where they excel</li>
                    <li><span class="checkmark">&#x2713;</span> <strong>Reduced Learning Anxiety</strong> - Multiple pathways reduce pressure</li>
                    <li><span class="checkmark">&#x2713;</span> <strong>Enhanced Critical Thinking</strong> - Problems approached from multiple angles</li>
                </ul>
                
                <h3>Alignment with Educational Standards:</h3>
                <p>MIEL activities align with:</p>
                <ul class="feature-list">
                    <li><span class="checkmark">&#x2713;</span> Common Core State Standards</li>
                    <li><span class="checkmark">&#x2713;</span> Next Generation Science Standards</li>
                    <li><span class="checkmark">&#x2713;</span> International Baccalaureate</li>
                    <li><span class="checkmark">&#x2713;</span> National Curriculum Standards</li>
                </ul>
            </div>
            
            <h2>Our Technology Platform</h2>
            
            <div class="section">
                <h3>Key Features:</h3>
                <ul class="feature-list">
                    <li><span class="checkmark">&#x2713;</span> <strong>Responsive Design</strong> - Works on tablets, computers, and interactive whiteboards</li>
                    <li><span class="checkmark">&#x2713;</span> <strong>Kid-Friendly Interface</strong> - Colorful, intuitive design for ages 6-16</li>
                    <li><span class="checkmark">&#x2713;</span> <strong>Auto-Graded Assessments</strong> - Instant feedback for students</li>
                    <li><span class="checkmark">&#x2713;</span> <strong>Teacher Dashboard</strong> - Comprehensive analytics and reporting</li>
                    <li><span class="checkmark">&#x2713;</span> <strong>Safe Virtual Environments</strong> - COPPA-compliant spaces with age-appropriate educational product placements</li>
                    <li><span class="checkmark">&#x2713;</span> <strong>Accessibility Features</strong> - Supports diverse learning needs</li>
                </ul>
            </div>
            
            <h2>The MIEL Difference</h2>
            
            <div class="section highlight-section">
                <h3>Why Choose MIEL?</h3>
                <div class="benefits-grid">
                    <div class="benefit-card">
                        <i class="fas fa-user-cog"></i>
                        <h4>Personalized Learning</h4>
                        <p>We tailor each student's learning journey to their unique strengths.</p>
                    </div>
                    <div class="benefit-card">
                        <i class="fas fa-gamepad"></i>
                        <h4>Gamified Experience</h4>
                        <p>We transform learning into an engaging exploration adventure.</p>
                    </div>
                    <div class="benefit-card">
                        <i class="fas fa-chart-bar"></i>
                        <h4>Data-Driven Insights</h4>
                        <p>We provide teachers with comprehensive understanding of student needs.</p>
                    </div>
                    <div class="benefit-card">
                        <i class="fas fa-globe-americas"></i>
                        <h4>Global Perspective</h4>
                        <p>We connect local learning experiences to global issues.</p>
                    </div>
                    <div class="benefit-card">
                        <i class="fas fa-lightbulb"></i>
                        <h4>Future-Ready Skills</h4>
                        <p>We develop students' creativity, collaboration, and critical thinking.</p>
                    </div>
                </div>
            </div>
            
            <h2><br/>Our Vision for the Future</h2>
            
            <div class="section">
                <p>We believe every child is intelligent - we just need to discover how they're smart. MIEL is more than a platform; it's a movement toward inclusive, engaging, and effective education that honors the unique gifts of every learner.</p>
            </div>
            
            <div class="cta-section">
                <h2 class="cta-title">Join the Educational Revolution</h2>
                <p>Whether you're a teacher looking to transform your classroom, a school seeking innovative solutions, or a parent wanting to support your child's unique learning style - MIEL offers a pathway to educational excellence that celebrates every type of intelligence.</p>
                <p>Discover the MIEL difference today - where every student finds their path to success.</p>
                <a href="miel-join.php" class="cta-button">
                    <i class="fas fa-rocket"></i> Get Started with MIEL
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Add interactivity to intelligence items
        document.querySelectorAll('.intelligence-item').forEach(item => {
            item.addEventListener('click', function() {
                const type = this.querySelector('strong').textContent;
                alert(`This student learns best through: ${type}\n\nMIEL creates activities specifically designed for this intelligence type!`);
            });
        });
        
        // Add interactivity to world items
        document.querySelectorAll('.world-item').forEach(item => {
            item.addEventListener('click', function() {
                const world = this.textContent;
                alert(`Virtual World: ${world}\n\nStudents can explore and learn in this immersive environment!`);
            });
        });
        
        // Animate elements on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeInUp 0.8s ease-out';
                }
            });
        }, observerOptions);
        
        // Observe sections
        document.querySelectorAll('.section, .benefit-card').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>