<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - EDVANTAGE</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
            overflow-x: hidden;
        }

        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 2rem;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 100;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .hamburger-menu {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            width: 45px;
            height: 45px;
            border-radius: 10px;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 4px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .hamburger-menu:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .hamburger-line {
            width: 20px;
            height: 2px;
            background: white;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .hamburger-menu.active .hamburger-line:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .hamburger-menu.active .hamburger-line:nth-child(2) {
            opacity: 0;
        }

        .hamburger-menu.active .hamburger-line:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -6px);
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #667eea;
            text-decoration: none;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .icon-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: #667eea;
            color: white;
            border-radius: 50%;
            text-decoration: none;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .icon-link:hover {
            background: #764ba2;
            transform: translateY(-2px);
        }

        .logout-btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: -350px;
            width: 350px;
            height: 100vh;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            box-shadow: 5px 0 25px rgba(0, 0, 0, 0.15);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar-header {
            padding: 2rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .sidebar-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .sidebar-subtitle {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .sidebar-menu {
            padding: 1rem 0;
        }

        .sidebar-item {
            display: flex;
            align-items: center;
            padding: 1rem 2rem;
            text-decoration: none;
            color: #333;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .sidebar-item:hover {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            border-left-color: #667eea;
            color: #667eea;
        }

        .sidebar-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-right: 1rem;
            font-size: 1.1rem;
        }

        .sidebar-text {
            flex: 1;
        }

        .sidebar-item-title {
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 0.2rem;
        }

        .sidebar-item-description {
            font-size: 0.8rem;
            color: #666;
            line-height: 1.3;
        }

        .sidebar-arrow {
            color: #999;
            font-size: 0.8rem;
        }

        /* Overlay */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }

        .sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            transition: all 0.4s ease;
        }

        .alert {
            background: linear-gradient(135deg, #4CAF50, #45a049);
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            border: none;
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
        }

        /* My Courses Content - Styled version of your original code */
        .courses-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .courses-container h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .courses-container h2::before {
            content: "🎓";
            font-size: 2rem;
        }

        .courses-container ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .courses-container > ul > div {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(102, 126, 234, 0.1);
            display: flex;
            align-items: flex-start;
            gap: 1.5rem;
        }

        .courses-container > ul > div:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
            border-color: rgba(102, 126, 234, 0.3);
        }

        .courses-container img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            flex-shrink: 0;
        }

        .course-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .courses-container li {
            margin: 0;
            padding: 0;
        }

        .courses-container li a {
            font-size: 1.4rem;
            font-weight: 600;
            color: #333;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            margin-bottom: 0.5rem;
        }

        .courses-container li a:hover {
            color: #667eea;
            transform: translateX(5px);
        }

        .courses-container p {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
            margin: 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-content {
                flex-wrap: wrap;
                gap: 1rem;
            }

            .main-content {
                padding: 1rem;
            }

            .courses-container h2 {
                font-size: 2rem;
            }

            .courses-container > ul > div {
                flex-direction: column;
                text-align: center;
            }

            .courses-container img {
                width: 100%;
                max-width: 200px;
                height: auto;
            }

            .sidebar {
                width: 100%;
                left: -100%;
            }
        }

        /* Empty state */
        .no-courses {
            text-align: center;
            padding: 3rem;
            color: #666;
        }

        .no-courses-icon {
            font-size: 4rem;
            color: #ccc;
            margin-bottom: 1rem;
        }

        .no-courses-text {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        .no-courses-subtext {
            font-size: 0.9rem;
            color: #999;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-title">Navigation</div>
            <div class="sidebar-subtitle">Choose your destination</div>
        </div>
        <div class="sidebar-menu">
            <a href="{{ route('profile') }}" class="sidebar-item">
                <div class="sidebar-icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="sidebar-text">
                    <div class="sidebar-item-title">My Profile</div>
                    <div class="sidebar-item-description">View and update your personal information</div>
                </div>
                <div class="sidebar-arrow">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </a>
            
            <a href="{{ route('courses.enrolled') }}" class="sidebar-item">
                <div class="sidebar-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="sidebar-text">
                    <div class="sidebar-item-title">My Courses</div>
                    <div class="sidebar-item-description">Access your enrolled courses and track progress</div>
                </div>
                <div class="sidebar-arrow">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </a>
            
            <a href="{{ route('courses.all') }}" class="sidebar-item">
                <div class="sidebar-icon">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="sidebar-text">
                    <div class="sidebar-item-title">Course Catalog</div>
                    <div class="sidebar-item-description">Explore our complete catalog of courses</div>
                </div>
                <div class="sidebar-arrow">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </a>
            
            <a href="/user/dashboard" class="sidebar-item">
                <div class="sidebar-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="sidebar-text">
                    <div class="sidebar-item-title">Dashboard</div>
                    <div class="sidebar-item-description">View your learning analytics and progress</div>
                </div>
                <div class="sidebar-arrow">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </a>
            
            <a href="/purchase_history" class="sidebar-item">
                <div class="sidebar-icon">
                    <i class="fas fa-receipt"></i>
                </div>
                <div class="sidebar-text">
                    <div class="sidebar-item-title">Purchase History</div>
                    <div class="sidebar-item-description">Review your past purchases and invoices</div>
                </div>
                <div class="sidebar-arrow">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </a>
        </div>
    </nav>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="header-left">
                <button class="hamburger-menu" id="hamburgerMenu">
                    <div class="hamburger-line"></div>
                    <div class="hamburger-line"></div>
                    <div class="hamburger-line"></div>
                </button>
                <a href="/" class="logo">EDVANTAGE</a>
            </div>
            <div class="header-actions">
                <a href="{{ route('cart.all') }}" class="icon-link" title="Shopping Cart">
                    <i class="fas fa-shopping-cart"></i>
                </a>
                <a href="{{ route('wishlist.all') }}" class="icon-link" title="Wishlist">
                    <i class="fas fa-heart"></i>
                </a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Success Alert -->
        @if(session('success'))
        <div class="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
        @endif

        <!-- My Courses Content - Your Original Code with Styling -->
        <div class="courses-container">
            <h2>My Courses</h2>
            
            @if(isset($enrolledCourses) && $enrolledCourses->count() > 0)
                <ul>
                    @foreach ($enrolledCourses as $course)
                        <div>
                            <img src="{{ asset('storage/' . $course->image) }}" alt="Course Image" width="120">
                            <div class="course-content">
                                <li><a href="{{ route('user.course.modules', $course->id) }}">{{ $course->title }}</a></li>
                                <p>{{ $course->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </ul>
            @else
                <div class="no-courses">
                    <div class="no-courses-icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="no-courses-text">No courses enrolled yet</div>
                    <div class="no-courses-subtext">Start your learning journey by exploring our course catalog</div>
                </div>
            @endif
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hamburgerMenu = document.getElementById('hamburgerMenu');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');

            function toggleSidebar() {
                const isActive = sidebar.classList.contains('active');
                
                if (isActive) {
                    sidebar.classList.remove('active');
                    sidebarOverlay.classList.remove('active');
                    hamburgerMenu.classList.remove('active');
                } else {
                    sidebar.classList.add('active');
                    sidebarOverlay.classList.add('active');
                    hamburgerMenu.classList.add('active');
                }
            }

            function closeSidebar() {
                sidebar.classList.remove('active');
                sidebarOverlay.classList.remove('active');
                hamburgerMenu.classList.remove('active');
            }

            hamburgerMenu.addEventListener('click', toggleSidebar);
            sidebarOverlay.addEventListener('click', closeSidebar);

            // Close sidebar on escape key
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    closeSidebar();
                }
            });

            // Handle sidebar link clicks
            const sidebarLinks = document.querySelectorAll('.sidebar-item');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    setTimeout(closeSidebar, 100);
                });
            });
        });
    </script>
</body>
</html>