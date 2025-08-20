<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - EDVANTAGE</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
        * {
            font-family: 'Montserrat', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        i[class^="fa-"], i[class*=" fa-"] {
            font-family: "Font Awesome 6 Free" !important;
            font-style: normal;
            font-weight: 900 !important;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Montserrat', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
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
            box-shadow: none;
        }
        .logo {
            margin-left: -2rem;
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
            margin-left: 1rem;
            margin-right: -1rem;
        }
        .nav-menu a:hover{
            color: #8b8b8d;
        }
        .nav-menu a {
            font-family: 'Montserrat', sans-serif;
            text-decoration: none;
            color: #374151;
            font-weight: 500;
            font-size: 0.9rem;
            transition: color 0.3s ease;
            margin-right:1rem;
        }
        .btn {
            padding: 0.75rem 1.25rem; /* Unified and reduced padding for general buttons */
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 400;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .auth-buttons {
            font-family: 'Montserrat', sans-serif;
            display: flex;
            gap: 1rem;
            margin-left: 6rem;
            margin-right: -2rem;
            align-items: center;
        }
        .btn-login {
            background: #f9f9f9;
            color: #0E1B33;
            border: 2px solid #0E1B33 !important; /* Added !important */
            padding: 0.2rem 0.75rem !important;
        }
        .btn-login:hover {
            background: #dcdcdd;
            color: #0E1B33;
        } 
        .btn-signup {
            background: #0E1B33;
            color: white;
            border: 2px solid #0E1B33 !important; /* Added !important */
            padding: 0.2rem 0.75rem !important; 
        }
        .btn-signup:hover {
            background: #475569;
            border: 2px solid #475569 !important;
        }
        .btn-outline {
            background: transparent;
            color: #0E1B33;
            border: 2px solid #0E1B33;
        }
        .btn-outline:hover {
            background: #dcdcdd;
            color: #0E1B33;
        }
        .btn-primary {
            background: #0E1B33;
            color: white;
            border: 2px solid #0E1B33;
        }
        .btn-primary:hover {
            background: #475569;
            box-shadow: 0 2px 8px rgba(14, 27, 51, 0.3);
        }
        .top-icons {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-left: 2rem;
            margin-right: -2rem;
        }
        .icon-button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            font-size: 1.1rem;
            color: #0E1B33;
            background: rgba(14, 27, 51, 0.08);
            border: 1px solid rgba(14, 27, 51, 0.2);
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
        }
        .icon-button:hover {
            background: rgba(14, 27, 51, 0.15);
            border-color: rgba(14, 27, 51, 0.3);
            box-shadow: 0 4px 12px rgba(14, 27, 51, 0.2);
        }
        .icon-button:active {
            transform: translateY(0);
        }
        .user-menu-button {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #0E1B33 0%, #475569 100%);
            border: none;
            border-radius: 10px;
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(14, 27, 51, 0.3);
        }
        .user-menu-button:hover {
            background: linear-gradient(135deg, #475569 0%, #334155 100%);
            transform: translateY(-1px);
            box-shadow: 0 4px 16px rgba(14, 27, 51, 0.4);
        }
        .user-menu-button:active {
            transform: translateY(0);
        }
        .user-menu {
            position: relative;
        }
        .user-dropdown {
            position: absolute;
            top: 60px;
            right: 0;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            border: 1px solid #e2e8f0;
            min-width: 220px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1001;
        }
        .user-menu:hover .user-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        .user-dropdown a {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            text-decoration: none;
            color: #374151;
            font-size: 0.9rem;
            font-weight: 500;
            transition: background-color 0.2s ease;
            border-bottom: 1px solid #f3f4f6;
        }
        .user-dropdown a:last-child {
            border-bottom: none;
        }
        .user-dropdown a:hover {
            background: #f8fafc;
            color: #0E1B33;
        }
        .user-dropdown .icon {
            margin-right: 12px;
            font-size: 0.9rem;
            width: 16px;
            text-align: center;
            color: #0E1B33;
        }
        .user-dropdown .separator {
            height: 1px;
            background: #e5e7eb;
            margin: 8px 0;
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
        /* Username styling */
        .username {
            margin-left: 0.5rem;
            font-weight: 500;
            color: #374151;
        }
        .hero-course-image {
            width: 100%;
            height: 340px;
            object-fit: cover;
            display: block;
        }
        .hero-content {
            z-index: 2;
            max-width: 800px;
            padding: 40px 20px;
            position: relative;
        }
        .hero-title {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 15px;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.8);
        }
        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
        }
        .hero-stats {
            font-size: 2.5rem;
            font-weight: bold;
            color: #ffd700;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.8);
        }
        /* Main Content */
        .main-content {
            padding: 1.5rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        /* Breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            color: #5f6368;
        }
        .breadcrumb a {
            color: #4285f4;
            text-decoration: none;
        }
        .breadcrumb a:hover {
            text-decoration: underline;
        }
        /* Course Details Layout */
        .course-details-wrapper {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
            align-items: start;
        }
        .course-main {
            background: #f9f9f9;
            padding: 2.5rem;
            border: none;
        }
        .course-sidebar {
            background: white;
            padding: 0 0 2rem 0;
            border-radius: 0px;
            border: 1px solid #dadce0;
            position: sticky;
            top: 200px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.06);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .course-title {
            font-size: 2.5rem;
            font-weight: 400;
            color: #202124;
            margin-bottom: 1rem;
            line-height: 1.2;
        }
        .course-meta {
            display: flex;
            gap: 2rem;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e8eaed;
            flex-wrap: wrap;
        }
        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #5f6368;
            font-size: 0.9rem;
        }
        .course-description {
            font-size: 1.1rem;
            color: #202124;
            line-height: 1.6;
            margin-bottom: 2rem;
        }
        .course-stats {
            display: flex;
            gap: 2rem;
            margin-bottom: 2rem;
            background: none;
            border: none;
            box-shadow: none;
            padding: 0;
        }
        .stat-card {
            background: none;
            padding: 0;
            border-radius: 0;
            text-align: left;
            border: none;
            box-shadow: none;
        }
        .stat-number {
            font-size: 1.1rem;
            font-weight: 600;
            color: #0E1B33;
            margin-bottom: 0.2rem;
            display: inline;
        }
        .stat-label {
            color: #5f6368;
            font-size: 0.95rem;
            font-weight: 500;
            margin-left: 0.5rem;
            display: inline;
        }
        /* Sidebar */
        .price-section {
            text-align: center;
            margin-bottom: 2rem;
        }
        .course-price {
            font-size: 2.5rem;
            font-weight: 600;
            color: #0E1B33;
            margin-bottom: 0.5rem;
        }
        .price-label {
            color: #5f6368;
            font-size: 0.9rem;
        }
        /* MODIFIED: Action buttons layout */
        .action-buttons {
            display: flex;
            flex-direction: column; /* Default to column for mobile */
            gap: 1rem;
            margin-bottom: 2rem;
            padding: 0 2rem; /* Add padding to align with other sidebar content */
        }
        @media (min-width: 768px) { /* Apply row direction on larger screens */
            .action-buttons {
                flex-direction: row;
            }
        }
        .btn {
            padding: 0.75rem 1.25rem; /* Unified and reduced padding for general buttons */
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 400;
            transition: all 0.3s ease;
            cursor: pointer;
            display: block;
            text-align: center;
            flex: 1; /* Make buttons take equal width in flex container */
        }
        .btn-primary {
            background: #0E1B33;
            color: white;
            border: 2px solid #0E1B33;
        }
        .btn-primary:hover {
            background: #475569;
            box-shadow: 0 2px 8px rgba(14, 27, 51, 0.3);
        }
        .btn-secondary {
            background: white;
            color: #0E1B33;
            border: 1px solid #0E1B33;
        }
        .btn-secondary:hover {
            background: #475569;
            color: white;
        }
        .course-features {
            list-style: none;
            padding: 0;
        }
        .course-features li {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 0;
            border-bottom: 1px solid #f1f3f4;
            color: #5f6368;
            font-size: 0.9rem;
        }
        .course-features li:last-child {
            border-bottom: none;
        }
        .feature-icon {
            color: #0E1B33;
            font-size: 1.1rem;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .header-content {
                padding: 0 1rem;
            }
            .nav-menu {
                display: none;
            }
            .main-content {
                padding: 1rem 1rem;
            }
            .course-title {
                font-size: 2rem;
            }
            .course-details-wrapper {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            .course-main,
            .course-sidebar {
                padding: 1.5rem;
            }
            .course-sidebar {
                position: static;
            }
            .course-meta {
                flex-direction: column;
                gap: 1rem;
            }
            .course-stats {
                grid-template-columns: 1fr;
            }
        }
        /* Animations */
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
        .course-main,
        .course-sidebar {
            animation: fadeInUp 0.6s ease forwards;
        }
        .sidebar-course-image {
            width: 100%;
            height: 230px;
            border: 5px solid #ffffff;
            object-fit: cover;
            border-radius: 0px;
            margin-bottom: 1.5rem;
            display: block;
        }
        .course-image-section {
            margin-bottom: 2rem;
        }
        .course-hero-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 8px;
        }
        .course-quick-stats {
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: #f8f9fa;
            border-radius: 8px;
        }
        .stat-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 0;
            font-size: 0.9rem;
            color: #5f6368;
        }
        .instructor-section {
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e8eaed;
        }
        .instructor-info {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-top: 1rem;
        }
        .instructor-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        .instructor-name {
            font-weight: 500;
            color: #202124;
        }
        .materials-list {
            list-style: none;
            padding: 0;
        }
        .materials-list li {
            padding: 0.5rem 0;
            color: #5f6368;
            font-size: 0.9rem;
        }
        .materials-list li:before {
            content: "✓";
            color: #0E1B33;
            margin-right: 0.75rem;
            font-weight: bold;
        }
        .original-price {
            text-decoration: line-through;
            color: #5f6368;
            font-size: 1rem;
            margin-top: 0.25rem;
        }
        .course-hero-flex {
            height:400px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: linear-gradient(135deg, #0E1B33 0%, #475569 100%);
            padding: 2.5rem 2rem 2.5rem 2rem;
            border-radius: 0 0 0px 0px;
            margin-bottom: 2rem;
            color: #fff;
            gap: 2.5rem;
        }
        .course-hero-left {
            flex: 1.2;
            min-width: 0;
            margin-top:2rem;
            margin-left:1.25rem;
        }
        .course-hero-right {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top:2rem;
        }
        .course-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #fff;
        }
        .course-meta {
            margin-bottom: 1.2rem;
            font-size: 1.1rem;
            color: #ffd700;
        }
        .course-description {
            color: #e5e7eb;
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
        }
        /* New styles for instructor and prerequisites sections */
        .instructor-details {
            background: #f9f9f9;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid #d5d7da;
            box-shadow: #000000;
        }
        .instructor-details h3 {
            color: #202124;
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .instructor-profile {
            display: flex;
            align-items: flex-start;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .instructor-avatar-large {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #0E1B33;
        }
        .instructor-info-details {
            flex: 1;
        }
        .instructor-name-large {
            font-size: 1.2rem;
            font-weight: 600;
            color: #202124;
            margin-bottom: 0.5rem;
        }
        .instructor-title {
            color: #0E1B33;
            font-weight: 500;
            margin-bottom: 1rem;
        }
        .instructor-details-list {
            list-style: none;
            padding: 0;
        }
        .instructor-details-list li {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            padding: 0.5rem 0;
            color: #5f6368;
            font-size: 0.9rem;
            line-height: 1.5;
        }
        .instructor-details-list .detail-icon {
            color: #0E1B33;
            font-size: 1rem;
            margin-top: 0.1rem;
            flex-shrink: 0;
        }
        .prerequisites-section {
            background: #f9f9f9;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid #d5d7da;
            box-shadow: #000000;
        }
        .prerequisites-section h3 {
            color: #202124;
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .prerequisites-list {
            list-style: none;
            padding: 0;
        }
        .prerequisites-list li {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            padding: 0.75rem 0;
            color: #5f6368;
            font-size: 0.95rem;
            line-height: 1.5;
            border-bottom: 1px solid #f1f3f4;
        }
        .prerequisites-list li:last-child {
            border-bottom: none;
        }
        .prerequisites-list .prereq-icon {
            color: #0E1B33;
            font-size: 1rem;
            margin-top: 0.1rem;
            flex-shrink: 0;
        }
        /* Target Audience Section */
        .target-audience-section {
            background: #f9f9f9;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid #d5d7da;
            box-shadow: #000000;
        }
        .target-audience-section h3 {
            color: #202124;
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .target-audience-list {
            list-style: none;
            padding: 0;
        }
        .target-audience-list li {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            padding: 0.75rem 0;
            color: #5f6368;
            font-size: 0.95rem;
            line-height: 1.5;
            border-bottom: 1px solid #f1f3f4;
        }
        .target-audience-list li:last-child {
            border-bottom: none;
        }
        .target-audience-list .audience-icon {
            color: #0E1B33;
            font-size: 1rem;
            margin-top: 0.1rem;
            flex-shrink: 0;
        }
        /* MODIFIED: Button styling for consistency */
        .btn.btn-wishlist {
            background: #f9f9f9;
            color: #0E1B33;
            border: 2px solid #0E1B33;
            padding: 0.4rem 0.9rem;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn.btn-wishlist:hover {
            background: #dcdcdd;
            color: #0E1B33;
        }
        .btn.btn-cart {
            background: #0E1B33;
            color: white;
            border: 2px solid #0E1B33;
            padding: 0.4rem 0.9rem;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            margin: 0; /* Remove specific margin, let gap handle it */
        }
        .btn.btn-cart:hover {
            background: #475569;
            border: 2px solid #475569;
        }
        @media (max-width: 900px) {
            .course-hero-flex {
                flex-direction: column;
                align-items: flex-start;
                padding: 1.5rem 1rem;
            }
            .course-hero-right {
                width: 100%;
                justify-content: flex-start;
                margin-top: 1.5rem;
            }
            .course-hero-image {
                width: 100%;
                max-width: 350px;
                height: 200px;
            }
            .instructor-profile {
                flex-direction: column;
                text-align: center;
            }
            .instructor-details,
            .prerequisites-section,
            .target-audience-section {
                padding: 1.5rem;
                background: #f9f9f9;
                border-radius: 8px;
            }
        }
    </style>
</head>
<body>
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
            @auth
            <div class="top-icons">
                <a href="/wishlist" class="icon-button" title="Wishlist">
                    <i class="fa-solid fa-heart"></i>
                </a>
                <a href="/cart" class="icon-button" title="Shopping Cart">
                    <i class="fa-solid fa-shopping-bag"></i>
                </a>
                <div class="user-menu">
                    <button class="user-menu-button" title="User Menu">
                        <i class="fa-solid fa-user-circle"></i>
                    </button>
                    <div class="user-dropdown">
                        <a href="/profile"><i class="fa-solid fa-user icon"></i> My Profile</a>
                        <a href="{{ route('courses.enrolled') }}"><i class="fa-solid fa-graduation-cap icon"></i> My Courses</a>
                        <a href="{{ route('user.progress') }}"><i class="fa-solid fa-chart-line icon"></i> My Progress</a>
                        <a href="{{ route('courses.all') }}"><i class="fa-solid fa-book-open icon"></i> Course Catalog</a>
                        <a href="/purchase_history"><i class="fa-solid fa-receipt icon"></i> Purchase History</a>
                        <div class="separator"></div>
                        <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-right-from-bracket icon"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
            @else
            <div class="auth-buttons">
                <a href="/login" class="btn btn-login" >Login</a>
                <a href="/register" class="btn btn-signup">SignUp</a>
            </div>
            @endauth
            @auth
            <!-- Hidden logout form -->
            <form id="logout-form" action="/logout" method="POST" style="display: none;">
                @csrf
            </form>
            <p class="username">{{ explode(' ', $user->name)[0] }}</p>
            @endauth
        </div>
    </header>
    <!-- Hero Banner -->
    <div class="course-hero-flex" style="margin-top: 56px;">
        <div class="course-hero-left">
            <h1 class="course-title">{{ $course->title }}</h1>
            <div class="course-meta">
                <!-- Example: rating, enrolled, etc. -->
                <span class="stars">★★★★★</span>
                <span class="rating-number">4.8</span>
                <span class="rating-count">(120)</span>
            </div>
            <div class="course-description">
                {{ $course->description }}
            </div>
            <!-- Add more details/buttons here if needed -->
        </div>
    </div>
    <!-- Main Content -->
    <main class="main-content">
        <div class="course-details-wrapper">
            <!-- Main Course Content -->
            <div class="course-main">
                <!-- Instructor Details Section -->
                <div class="instructor-details">
                    <h3><i class="fa-solid fa-chalkboard-teacher"></i> Meet Your Instructor</h3>
                    <div class="instructor-profile">
                        <img src="/image/instructor.png" alt="Dr. Ahmed Rahman" class="instructor-avatar-large">
                        <div class="instructor-info-details">
                            <div class="instructor-name-large">Dr. Ahmed Rahman</div>
                            <div class="instructor-title">Senior Software Engineer & Tech Educator</div>
                            <ul class="instructor-details-list">
                                <li>
                                    <i class="fa-solid fa-graduation-cap detail-icon"></i>
                                    <span><strong>Education:</strong> Ph.D. in Computer Science from MIT, M.S. in Software Engineering from Stanford University</span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-briefcase detail-icon"></i>
                                    <span><strong>Experience:</strong> 12+ years in software development, Former Senior Engineer at Google and Microsoft</span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-award detail-icon"></i>
                                    <span><strong>Achievements:</strong> Published 25+ research papers, Speaker at 50+ tech conferences worldwide</span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-users detail-icon"></i>
                                    <span><strong>Students Taught:</strong> Over 50,000 students across various platforms with 4.9/5 average rating</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Prerequisites Section -->
                <div class="prerequisites-section">
                    <h3><i class="fa-solid fa-list-check"></i> Course Prerequisites</h3>
                    <ul class="prerequisites-list">
                        <li>
                            <i class="fa-solid fa-code prereq-icon"></i>
                            <span>Basic understanding of programming concepts (variables, functions, loops)</span>
                        </li>
                    </ul>
                </div>
                <!-- Target Audience Section -->
                <div class="target-audience-section">
                    <h3><i class="fa-solid fa-users"></i> Who This Course Is For</h3>
                    <ul class="target-audience-list">
                        <li>
                            <i class="fa-solid fa-user-graduate audience-icon"></i>
                            <span><strong>Beginner Developers:</strong> Students or professionals new to programming who want to build a solid foundation</span>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Enhanced Sidebar -->
            <div class="course-sidebar">
                <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" class="sidebar-course-image">
                <div class="price-section">
                    <div class="course-price">৳{{ number_format($course->price) }}</div>
                    @if(isset($course->original_price) && $course->original_price > $course->price)
                        <div class="original-price">৳{{ number_format($course->original_price) }}</div>
                    @endif
                </div>
                <!-- Course Stats -->
                <div class="course-quick-stats">
                    <div class="stat-item">
                        <span class="stat-icon">📊</span>
                        <span>All Levels</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-icon">👥</span>
                        <span>{{ $course->enrolled_count ?? 0 }} Total Enrolled</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-icon">⏱️</span>
                        <span>{{ $course->total_duration }} Hours Duration</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-icon">⏱️</span>
                        <span>{{ $course->approx_video_length }} min Avg Video Length</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-icon">📅</span>
                        <span>{{ $course->updated_at->format('M d, Y') }} Last Updated</span>
                    </div>
                </div>
                <!-- Enhanced Course Materials -->
                <div class="course-materials" style="padding: 0 2rem;">
                    <h4>Course Materials</h4>
                    <ul class="materials-list">
                        <li>{{ $course->video_count }} video lectures</li>
                        <li>Downloadable resources</li>
                        <li>Full lifetime access</li>
                        <li>Access on mobile and desktop</li>
                        <li>Certificate of completion</li>
                    </ul>
                </div>
                <div class="action-buttons">
                    @auth
                        @if(auth()->user()->enrolledCourses->contains($course->id))
                            <a href="{{ route('user.course.modules', $course->id) }}" class="btn btn-primary">
                                Continue Learning
                            </a>
                        @else
                            <form method="POST" action="{{ route('cart.add', $course->id) }}" class="cart-form">
                                @csrf
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                <button type="submit" class="btn btn-primary btn-cart">Add to Cart</button>
                            </form>
                            <form action="{{ route('wishlist.add', $course->id) }}" method="POST" class="wishlist-form">
                                @csrf
                                <button type="submit" class="btn btn-wishlist">
                                    Save to Wishlist
                                </button>
                            </form>
                        @endif
                    @else
                        @guest
                            <form method="POST" action="{{ route('cart.guest.add') }}">
                                @csrf
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                <button type="submit" class="btn btn-primary btn-cart">Add to Cart</button>
                            </form>
                        @endguest
                    @endauth
                </div>
            </div>
        </div>
    </main>
    <script>
        // Smooth animations
        window.addEventListener('load', function() {
            const elements = document.querySelectorAll('.course-main, .course-sidebar');
            elements.forEach((element, index) => {
                setTimeout(() => {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, index * 200);
            });
        });
        // Cart form submission - let it submit naturally without interference
        document.querySelectorAll('.cart-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                const btn = this.querySelector('.btn-cart');
                btn.textContent = 'Adding...';
                btn.disabled = true;
            });
        });
        // Tab functionality
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const tabId = this.dataset.tab;
                // Remove active class from all buttons and panes
                document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
                document.querySelectorAll('.tab-pane').forEach(p => p.classList.remove('active'));
                // Add active class to clicked button and corresponding pane
                this.classList.add('active');
                document.getElementById(tabId).classList.add('active');
            });
        });
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
        @if(session('cart_added'))
        if (confirm("{{ session('cart_added') }} Go to cart?")) {
            window.location.href = "{{ route('cart.all') }}";
        }
        @endif
    </script>
</body>
</html>
