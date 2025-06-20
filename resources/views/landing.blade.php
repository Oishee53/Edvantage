 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDVANTAGE - Your Virtual Classroom Redefined</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* Header Styles */
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #6366f1;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-menu a {
            text-decoration: none;
            color: #64748b;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-menu a:hover {
            color: #6366f1;
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-outline {
            background: transparent;
            color: #6366f1;
            border: 2px solid #6366f1;
        }

        .btn-outline:hover {
            background: #6366f1;
            color: white;
        }

        .btn-primary {
            background: #6366f1;
            color: white;
        }

        .btn-primary:hover {
            background: #4f46e5;
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80') center/cover;
            opacity: 0.3;
        }

        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: bold;
            color: white;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero p {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-hero {
            padding: 1rem 2rem;
            font-size: 1.1rem;
            border-radius: 50px;
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Courses Section - Horizontal Banner Style */
        .courses-section {
            padding: 4rem 0;
            background: #f8fafc;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: #1e293b;
            margin-bottom: 1rem;
        }

        .section-title p {
            font-size: 1.1rem;
            color: #64748b;
        }

        .courses-list {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .course-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            position: relative;
            min-height: 180px;
        }

        .course-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .course-banner {
            position: relative;
            height: 180px;
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #f59e0b 100%);
            display: flex;
            align-items: center;
            padding: 2rem;
            overflow: hidden;
        }

        .course-banner::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 60%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%);
            border-radius: 50% 0 0 50%;
        }

        .course-content {
            position: relative;
            z-index: 2;
            flex: 1;
        }

        .course-title {
            font-size: 1.8rem;
            font-weight: bold;
            color: white;
            margin-bottom: 0.5rem;
        }

        .course-description {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .course-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .course-rating {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #fbbf24;
            font-weight: 600;
        }

        .course-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #10b981;
        }

        .course-actions {
            position: absolute;
            bottom: 1.5rem;
            right: 2rem;
            display: flex;
            gap: 1rem;
            z-index: 3;
        }

        .btn-details {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .btn-details:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
        }

        .btn-cart {
            background: #10b981;
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-cart:hover {
            background: #059669;
            transform: scale(1.05);
        }

        /* Different gradient colors for variety */
        .course-card:nth-child(1) .course-banner {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #f59e0b 100%);
        }

        .course-card:nth-child(2) .course-banner {
            background: linear-gradient(135deg, #06b6d4 0%, #3b82f6 50%, #8b5cf6 100%);
        }

        .course-card:nth-child(3) .course-banner {
            background: linear-gradient(135deg, #10b981 0%, #059669 50%, #0d9488 100%);
        }

        .course-card:nth-child(4) .course-banner {
            background: linear-gradient(135deg, #f59e0b 0%, #f97316 50%, #ef4444 100%);
        }

        .course-card:nth-child(5) .course-banner {
            background: linear-gradient(135deg, #8b5cf6 0%, #a855f7 50%, #ec4899 100%);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1.1rem;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .course-banner {
                padding: 1.5rem;
                height: 160px;
            }

            .course-title {
                font-size: 1.4rem;
            }

            .course-actions {
                position: static;
                margin-top: 1rem;
                justify-content: center;
            }

            .course-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
        }

        /* Animation */
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .course-card {
            animation: slideInUp 0.6s ease forwards;
        }

        .course-card:nth-child(2) { animation-delay: 0.1s; }
        .course-card:nth-child(3) { animation-delay: 0.2s; }
        .course-card:nth-child(4) { animation-delay: 0.3s; }
        .course-card:nth-child(5) { animation-delay: 0.4s; }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="nav-container">
            <div class="logo">EDVANTAGE</div>
            <nav>
                <ul class="nav-menu">
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#courses">Courses</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                </ul>
            </nav>
            <div class="auth-buttons">
                <a href="/login" class="btn btn-outline">Log In</a>
                <a href="/register" class="btn btn-primary">Sign Up</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Experience Learning<br>Like Never Before</h1>
            <p>Elevate your knowledge with interactive learning anytime, anywhere through our online courses. Your virtual classroom redefined.</p>
            <div class="hero-buttons">
                <a href="/register" class="btn btn-primary btn-hero">Get Started for FREE</a>
                <a href="#courses" class="btn btn-secondary btn-hero">Learn More</a>
            </div>
        </div>
    </section>

    <!-- Courses Section -->
    <section class="courses-section" id="courses">
        <div class="container">
            <div class="section-title">
                <h2>Featured Courses</h2>
                <p>Discover our most popular courses designed to help you achieve your learning goals</p>
            </div>
            
            <div class="courses-list">
                @foreach($courses as $course)
                <div class="course-card">
                    <div class="course-banner">
                        <div class="course-content">
                            <h3 class="course-title">{{ $course->title }}</h3>
                            <p class="course-description">{{ $course->description }}</p>
                            <div class="course-meta">
                                <div class="course-price">{{ $course->price }}</div>
                            </div>
                        </div>
                        <div class="course-actions">
                            <a href="{{ route('courses.details', $course->id) }}" class="btn-details">
                                Details
                            </a>
                            <form action="{{ route('cart.add', $course->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn-cart">Add Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Header background on scroll
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header');
            if (window.scrollY > 100) {
                header.style.background = 'rgba(255, 255, 255, 0.98)';
            } else {
                header.style.background = 'rgba(255, 255, 255, 0.95)';
            }
        });
    </script>
</body>
</html>