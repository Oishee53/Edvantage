<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDVANTAGE - Your Virtual Classroom Redefined</title>
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
        font-family: 'Montserrat', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
        color: #333;
        }

        /* Header Styles */
        .header {
            background: #fff;
            backdrop-filter: blur(10px);
            padding: 0.5rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: none; /* Remove shadow */
        }
        .logo {
            margin-left: -1rem;
            margin-right:0.75rem;
        }

        .nav-container {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            
        }
        .nav-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            flex-shrink: 0;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 0.5rem;
            margin-right: 0.25rem; /* Reduce margin */
        }

        .nav-menu a {
            text-decoration: none;
            color: #374151;
            font-weight: 500;
            font-size: 0.95rem;
            transition: color 0.3s ease;
            margin-right:1rem;
        }

        
        .auth-buttons {
            display: flex;
            gap: 0.5rem;
            margin-left: auto;
            align-items: center;
        }

        .btn {
            padding: 0.2rem 0.75rem;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-outline {
            background: transparent;
            color: #0148ad;
            border: 2px solid #0148ad;
        }

        .btn-outline:hover {
            background: #ccdcf2;
            color: #0148ad;
        }

        .btn-primary {
            background: #0148ad;
            color: white;
            border: 2px solid #0148ad;
        }

        .btn-primary:hover {
            background: #015edf;
            
        }

        .category-bar {
            background: #0148ad;
            backdrop-filter: blur(10px);
            padding: 0.5rem 0 0.25rem 0; /* Slightly less bottom padding */
            position: fixed;
            width: 100%;
            top: 56px; /* Adjust to match your header height */
            z-index: 999;
            border: none; /* Remove border */
            box-shadow: 0 12px 32px 0 rgba(0,0,0,0.22), 0 2px 8px 0 rgba(0,0,0,0.12); /* Stronger dropdown shadow */
        }

        .category-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
            gap: 2.5rem;
            overflow-x: auto;
            scrollbar-width: none;
        }

        .category-container::-webkit-scrollbar {
            display: none;
        }
        .header-btn {
            position: relative;
            background: transparent;
            border: none;
            color: #0148ad;
            padding: 0.2rem 0.75rem;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
            font-weight: 600;
        }

        .header-btn:hover {
            background: transparent;
            color: #0148ad;
        }
        .header-btn i.fa-shopping-cart {
            font-size: 16px;
            color: #727272;
        }

        .cart-btn {
            position: relative;
        }

        .cart-btn .fas.fa-shopping-cart {
            font-size: 18px;
        }

        .cart-btn .badge {
            position: absolute;
            top: -6px;
            right: 1px;
            background: #0148ad;
            color: white;
            border-radius: 50%;
            width: 22px;
            height: 20px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2px;
            box-shadow: 0 0 3px rgba(0,0,0,0.2);
        }

        .category-link {
            color: #fff ;
            font-size: 0.9rem;
            text-decoration: none;
            font-weight: 300;
            transition: color 0.3s ease;
            white-space: nowrap;
            padding: 0.25rem 0;
            margin-right: 1rem;
            margin-left: 1rem;
        }

        .category-link:hover {
            color: #ccdcf2;
        }
        .search-form {
            flex: 0 0 auto;
            display: flex;
            align-items: center;
            margin-right: 1rem;
        }
        .search-input {
            width: 400px;
            padding: 0.5rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 24px;
            font-size: 1rem;
        }

        /* Hero Section */
        .hero {
    
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            background: url('/image/hero.png') center center/cover no-repeat;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
           /* background: url('https://plus.unsplash.com/premium_photo-1661368202259-0e9a21b5bbd3?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') center/cover;*/
            
        }

        .hero-content {
            max-width: 1200px;
            margin: 0;
            padding: 0 4.5rem;
            text-align: left;
            position: relative;
            z-index: 2;
            font-size: 1.2rem;
            color: #0148ad;
            left: 0;                /* Align to the left edge */
            top: 80px;              /* Move downwards (adjust as needed) */
            position: relative;     /* Ensure top/left works */
        }

        .hero h1,
        .hero p {
            text-align: left;       /* Ensure heading and paragraph are left-aligned */
            margin-left: 0;
            margin-right: auto;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: flex-start; /* Align buttons to the left */
            flex-wrap: wrap;
        }

        .btn-hero {
            font-size: 1rem;
            border-radius: 5px;
        }

        .btn-secondary {
            background: white;
            color: #0148ad;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .hero-subtitle {
            font-size: 1rem;           /* Smaller font */
            color: black;            /* Softer blue/gray color */
            margin-bottom: 1.5rem;
        }

        /* Courses Section */
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
            font-family: 'Montserrat', sans-serif;
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
            grid-template-columns: repeat(4, 1fr); /* 3 per row, adjust to 4 if you want */
            gap: 2.5rem 0.5rem;
            margin-top: 2rem;
        }

        .course-card {
            background: #fff;
            border-radius: 5px;
            overflow: hidden;
            border: 1px solid #e5e7eb;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            cursor: pointer;
            display: flex;
            flex-direction: column;
            height: 340px; /* Adjust height as needed */
            width: 280px;
            transition: box-shadow 0.2s;
            row-gap: 4rem
            position: relative;
            margin: 0 auto; /* Center the card */
            box-sizing: border-box;
            text-align: left;
        }

        .course-card:hover {
            box-shadow: 0 6px 24px rgba(0,0,0,0.10);
            border: #0148ad 1px solid;
        }

        .course-image {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-bottom: 1px solid #f1f1f1;
        }

        .course-content {
            padding: 18px 16px 12px 16px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex: 1;
        }

        .course-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 6px;
            line-height: 1.3;
            min-height: 2.4em;
        }

        .course-instructor,
        .course-category {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 4px;
        }

        .course-rating {
            display: flex;
            align-items: center;
            gap: 4px;
            margin-bottom: 8px;
        }

        .rating-number {
            font-size: 12px;
            font-weight: 600;
            color: #f59e0b;
        }

        .stars {
            color: #f59e0b;
            font-size: 12px;
        }
        

        .rating-count {
            font-size: 11px;
            color: #9ca3af;
        }

        .course-price {
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 8px;
        }

        .course-actions {
            display: flex;
            gap: 6px;
        }

        .btn-details {
            flex: 1;
            background: #f3f4f6;
            color: #374151;
            text-align: center;
            padding: 6px 8px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 11px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-details:hover {
            background: #e5e7eb;
        }

        .btn-cart {
            background: #6366f1;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 11px;
            font-weight: 600;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .btn-cart:hover {
            background: #4f46e5;
        }

        #loadMoreBtn {
            padding: 1rem 2rem;
            font-size: 1.2rem;
            border-radius: 5px;
            font-weight: 500;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .courses-grid {
                grid-template-columns: repeat(3, 1fr);
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
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .courses-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Place the category bar immediately after the header -->
    <div class="category-bar" style="top:56px;">
        @foreach($uniqueCategories as $category)
            <a href="#" class="category-link">{{$category}}</a>
        @endforeach
    </div>
   <!-- Main Navigation Bar -->
    <header class="header">
        <div class="nav-container">
            <a href="/" class="logo">
                <img src="/image/Edvantage.png" alt="EDVANTAGE Logo" style="height:40px; vertical-align:middle;">
            </a>
            <form class="search-form" action="" method="GET">
                <input type="text" name="q" placeholder="What do you want to learn?" class="search-input">
            </form>
            <nav>
                <ul class="nav-menu">
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                </ul>
            </nav>
           
            <div class="auth-buttons">
                <a href="/login" class="btn btn-outline">Login</a>
                <a href="/register" class="btn btn-primary">SignUp</a>
            </div>
        </div>
    </header>

    

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            
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
            
            <!-- Show only one row of courses and add a "Load More" button -->
            <div class="courses-grid" id="coursesGrid">
                @foreach($courses as $index => $course)
                    <div class="course-card" style="{{ $index >= 4 ? 'display:none;' : '' }}">
                        <!-- Course Image -->
                        @if($course->image)
                            <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" class="course-image">
                        @else
                            <img src="https://via.placeholder.com/300x140?text=Course+Image" alt="{{ $course->title }}" class="course-image">
                        @endif

                        <!-- Course Content -->
                        <div class="course-content">
                            <div>
                                <h3 class="course-title">{{ $course->title }}</h3>
                                @if(isset($course->instructor))
                                    <div class="course-instructor">{{ $course->instructor }}</div>
                                @endif
                                @if(isset($course->category))
                                    <div class="course-category" style="font-size:13px; color:#6b7280; margin-bottom:4px;">
                                        {{ $course->category }}
                                    </div>
                                @endif
                            </div>
                            <div>
                                <div class="course-price">${{ number_format($course->price ?? 0, 2) }}</div>
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

            @if($courses->count() > 4)
                <div style="text-align:center; margin-top:2rem;">
                    <button id="loadMoreBtn" class="btn btn-primary">Load More</button>
                </div>
            @endif
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
        // Load More functionality
        const loadMoreBtn = document.getElementById('loadMoreBtn');
        const cards = document.querySelectorAll('#coursesGrid .course-card');
        let visible = 4;
        const increment = 4;

        if (loadMoreBtn) {
            loadMoreBtn.addEventListener('click', function() {
                let shown = 0;
                for (let i = visible; i < cards.length && shown < increment; i++, shown++) {
                    cards[i].style.display = '';
                }
                visible += increment;
                if (visible >= cards.length) {
                    loadMoreBtn.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>
