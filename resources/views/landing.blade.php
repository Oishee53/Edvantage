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

        /* Courses Section - Smaller Square Grid Layout */
        .courses-section {
            padding: 5rem 0;
            background: #f8fafc;
        }

        .container {
            max-width: 1400px;
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

        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .course-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            position: relative;
            aspect-ratio: 1;
            display: flex;
            flex-direction: column;
        }

        .course-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .course-image-container {
            position: relative;
            height: 45%;
            overflow: hidden;
        }

        .course-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .course-card:hover .course-image {
            transform: scale(1.05);
        }

        .course-content {
            padding: 1rem;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .course-category {
            background: #6366f1;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-block;
            margin-bottom: 0.75rem;
            width: fit-content;
        }

        .course-title {
            font-size: 1rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.75rem;
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .course-bottom {
            margin-top: auto;
        }

        .course-price {
            font-size: 1.25rem;
            font-weight: bold;
            color: #10b981;
            margin-bottom: 0.75rem;
        }

        .course-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-details {
            flex: 1;
            background: #f1f5f9;
            color: #475569;
            text-align: center;
            padding: 0.6rem 0.5rem;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-details:hover {
            background: #e2e8f0;
            color: #334155;
        }

        .btn-cart {
            background: #6366f1;
            color: white;
            border: none;
            padding: 0.6rem 0.75rem;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.8rem;
            font-weight: 600;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .btn-cart:hover {
            background: #4f46e5;
            transform: scale(1.02);
        }

        /* Category Colors */
        .category-programming {
            background: #6366f1;
        }

        .category-design {
            background: #ec4899;
        }

        .category-business {
            background: #10b981;
        }

        .category-marketing {
            background: #f59e0b;
        }

        .category-data {
            background: #06b6d4;
        }

        .category-science {
            background: #8b5cf6;
        }

        .category-language {
            background: #ef4444;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .courses-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            }
        }

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

            .courses-grid {
                grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
                gap: 1rem;
            }

            .course-actions {
                flex-direction: column;
                gap: 0.5rem;
            }
        }

        @media (max-width: 480px) {
            .courses-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* Animation */
        @keyframes fadeInUp {
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
            animation: fadeInUp 0.6s ease forwards;
        }

        .course-card:nth-child(2) { animation-delay: 0.1s; }
        .course-card:nth-child(3) { animation-delay: 0.2s; }
        .course-card:nth-child(4) { animation-delay: 0.3s; }
        .course-card:nth-child(5) { animation-delay: 0.4s; }
        .course-card:nth-child(6) { animation-delay: 0.5s; }
        .course-card:nth-child(7) { animation-delay: 0.6s; }
        .course-card:nth-child(8) { animation-delay: 0.7s; }
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
                    <li><a href="#blog">Blog</a></li>
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
            <h1>Your virtual<br>classroom redefined</h1>
            <p>Elevate your knowledge with interactive learning anytime, anywhere through our online courses.</p>
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
            
            <div class="courses-grid">
                @foreach($courses as $index => $course)
                <div class="course-card">
                    <div class="course-image-container">
                        <img src="{{ asset('storage/' . $course->image) }}" alt="Course Image" style="width: 100%; height: 100%; object-fit: contain;">
                    </div>
                    <div class="course-content">
                        <div class="course-category category-{{ strtolower(str_replace(' ', '-', $course->category ?? 'programming')) }}">
                            {{ $course->category ?? 'Programming' }}
                        </div>
                        <h3 class="course-title">{{ $course->title }}</h3>
                        <div class="course-bottom">
                            <div class="course-price">${{ $course->price ?? '49' }}</div>
                            <div class="course-actions">
                                <a href="{{ route('courses.details', $course->id) }}" class="btn-details">
                                    Details
                                </a>
                                <form action="{{ route('cart.add', $course->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn-cart">Add to Cart</button>
                                </form>
                            </div>
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