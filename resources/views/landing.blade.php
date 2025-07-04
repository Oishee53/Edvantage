<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDVANTAGE - Your Virtual Classroom Redefined</title>
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&display=swap" rel="stylesheet">
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
            gap: 1rem; /* Reduce gap for tighter layout */
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
            margin-right:1rem;
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
        }

        .btn-primary:hover {
            background: #015edf
            
        }

        .category-bar {
            background: #fff;
            backdrop-filter: blur(10px);
            padding: 0.5rem 0 0.25rem 0; /* Slightly less bottom padding */
            position: fixed;
            width: 100%;
            top: 56px; /* Adjust to match your header height */
            z-index: 999;
            border: none; /* Remove border */
            box-shadow: none; /* Remove shadow */
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
            background: rgba(66, 133, 244, 0.1);
            border: 1px solid rgba(66, 133, 244, 0.3);
            color: #4285f4;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
        }

            .header-btn:hover {
            background: rgba(66, 133, 244, 0.2);
            color: #4285f4;
            }
            .header-btn i.fa-shopping-cart {
                font-size: 20px;
                color: var(--action-blue);
            }

            .cart-btn {
  position: relative;
}

.cart-btn .fas.fa-shopping-cart {
  font-size: 22px;
}

.cart-btn .badge {
  position: absolute;
  top: -6px;
  right: -10px;
  background: #e74c3c;
  color: white;
  border-radius: 50%;
  width: 20px;
  height: 20px;
  font-size: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 2px;
  box-shadow: 0 0 3px rgba(0,0,0,0.2);
}



        .category-link {
            color: #374151;
            font-size: 0.95rem;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            white-space: nowrap;
            padding: 0.25rem 0;
            margin-right: 1rem;
            margin-left: 1rem;
        }

        .category-link:hover {
            color: #2563eb;
        }
        .search-form {
            flex: 0 0 auto;
            display: flex;
            align-items: center;
            margin-right: 1rem;
        }
        .search-input {
            width: 250px;
            padding: 0.5rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 24px;
            font-size: 1rem;
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
            font-family:'Montserrat', sans-serif;
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
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
            margin-top: 2rem;
        }

        .course-card {
            background: #f8fafc;;
            border-radius: 2px;
            overflow: hidden;
            border: none;
            cursor: pointer;
            height: 280px;
            display: flex;
            flex-direction: column;
            /* Remove shadow and hover effect for flat look */
            box-shadow: none;
            transition: none;
            }lex-direction: column;
        }
        .course-card:hover {
            /* Remove any hover effect */
            box-shadow: none;
            transform: none;
        }

        .course-image {
            width: 100%;
            height: 140px;
            object-fit: cover;
        }

        .course-content {
            padding: 12px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .course-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 18px; /* Increased font size */
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 4px;
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }


        .course-instructor {
            font-size: 12px;
            color: #6b7280;
            margin-bottom: 4px;
        }
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

    <!-- Place the category bar immediately after the header -->
    <div class="category-bar" style="top:56px;">
        @foreach($uniqueCategories as $category)
            <a href="#" class="category-link">{{$category}}</a>
        @endforeach
    </div>

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
                @forelse($courses as $index => $course)
                <div class="course-card">
                    <!-- Course Image -->
                    @if($course->image)
                        <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" class="course-image">
                    @else
                        <img src="https://via.placeholder.com/300x140?text=Course+Image" alt="{{ $course->title }}" class="course-image">
                    @endif
                    
                    <!-- Course Content -->
                    <div class="course-content">
                        <div>
                            <!-- Course Title -->
                            <h3 class="course-title">{{ $course->title }}</h3>
                            
                            <!-- Course Instructor (if available) -->
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
                            <!-- Course Price -->
                            <div class="course-price">${{ number_format($course->price ?? 0, 2) }}</div>
                            
                            <!-- Action Buttons -->
                            <div class="course-actions">
                                <a href="{{ route('courses.details', $course->id) }}" class="btn-details">
                                    Details
                                </a>
                               @guest
                     <form method="POST" action="{{ route('cart.guest.add') }}">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                    @endguest

                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 3rem;">
                    <h3 style="font-size: 1.25rem; font-weight: 600; color: #6b7280; margin-bottom: 0.5rem;">No courses available</h3>
                    <p style="color: #9ca3af;">Check back later for new courses!</p>
                </div>
                @endforelse
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