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
            border-bottom: 1px solid #e2e8f0;
            margin-bottom: 2rem;
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
            margin-right: 0.25rem;
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
            padding: 0.2rem 0.75rem;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 400;
            transition: all 0.3s ease;
            cursor: pointer;
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
        }
        .top-icons {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-left: 2rem; /* Add this line to move all icons (including heart) to the right */
            margin-right: -1rem;
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
            transform: translateY(-1px);
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
        .user-menu-button i {
            font-size: 1rem;
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
            color: #0E1B33;
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
            padding: 2rem;
            border-radius: 8px;
            border: 1px solid #dadce0;
            position: sticky;
            top: 120px;
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
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .btn {
            padding: 1rem;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: block;
            text-align: center;
        }
        .btn-primary {
            background: #0E1B33;
            color: white;
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
            background: #dbdbdb;
            color: #0E1B33;
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
        .course-sidebar {
            margin-top: -20rem;
            background: white;
            padding: 0 0 2rem 0;
            border-radius: 0px;
            border: 1px solid #dadce0;
            position: sticky;
            top: 120px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.06);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .sidebar-course-image {
            width: 100%;
            height: 250px;
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
            background: linear-gradient(120deg, #0E1B33 0%, #475569 100%);
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
            padding-left:2rem;
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
            border: 1px solid #777777;
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
        /* Make Add to Cart and Wishlist buttons smaller and add gap */
        .course-actions {
            display: flex;
            gap: 0.75rem; /* Space between buttons */
            margin-top: 0.5rem;
        }
        .cart-btn,
        .wishlist-btn {
            padding: 0.5rem 1.2rem;
            font-size: 0.95rem;
            border-radius: 5px;
            min-width: 110px;
            /* You can adjust min-width or remove for auto sizing */
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
                    <a href="/user/dashboard"><i class="fa-solid fa-tachometer-alt icon"></i> Dashboard</a>
                    <a href="{{ route('courses.all') }}"><i class="fa-solid fa-book-open icon"></i> Course Catalog</a>
                    <a href="/purchase_history"><i class="fa-solid fa-receipt icon"></i> Purchase History</a>
                    <div class="separator"></div>
                    <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket icon"></i> Logout
                    </a>
                </div>
            </div>
        </div>
        <!-- Hidden logout form -->
        <form id="logout-form" action="/logout" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</header>
<!-- Hero Banner -->
<div class="course-hero-flex">
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
            <div class="course-materials">
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
                        <div class="course-actions">
                            <!-- Cart Button -->
                            <form method="POST" action="{{ route('cart.add', $course->id) }}" class="cart-form">
                                @csrf
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                <button type="submit" class="btn btn-primary cart-btn">Add to Cart</button>
                            </form>
                            <!-- Wishlist Button -->
                            <form action="{{ route('wishlist.add', $course->id) }}" method="POST" style="flex: 1;" class="wishlist-form">
                                @csrf
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                <button type="submit" class="btn btn-secondary wishlist-btn">
                                    Save to Wishlist
                                </button>
                            </form>
                        </div>
                    @endif
                @else
                   @guest
                        <form method="POST" action="{{ route('cart.guest.add') }}">
                            @csrf
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <button type="submit" class="btn btn-primary" >Add to Cart</button>
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

    // FIXED: Add to cart/wishlist feedback - Only for wishlist buttons, not cart buttons
    document.querySelectorAll('.wishlist-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            const btn = this.querySelector('.wishlist-btn');
            const originalText = btn.textContent;
            btn.textContent = 'Adding...';
            btn.disabled = true;

            // The form will submit naturally. The feedback will come from Laravel's session flash.
            // We'll re-enable the button after a short delay or based on a successful flash message.
            // For now, we'll re-enable after a timeout if no flash message is detected immediately.
            setTimeout(() => {
                if (!sessionStorage.getItem('wishlist_added_flash')) { // Check if a flash message was processed
                    btn.textContent = originalText;
                    btn.disabled = false;
                }
            }, 3000); // Give Laravel some time to redirect and set flash
        });
    });

    // Cart form submission - let it submit naturally without interference
    document.querySelectorAll('.cart-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            const btn = this.querySelector('.cart-btn');
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

    // Display cart added message
    @if(session('cart_added'))
        if (confirm("{{ session('cart_added') }} Go to cart?")) {
            window.location.href = "{{ route('cart.all') }}";
        }
    @endif

    // NEW: Display wishlist added message
    @if(session('wishlist_added'))
        // Store a flag in session storage to indicate flash message was processed
        sessionStorage.setItem('wishlist_added_flash', 'true');
        if (confirm("{{ session('wishlist_added') }} Go to wishlist?")) {
            window.location.href = "{{ route('wishlist.all') }}"; // Assuming you have a wishlist.all route
        }
        // Remove the flag after processing
        sessionStorage.removeItem('wishlist_added_flash');
    @endif

    // Clear the flag if the page is loaded without a flash message (e.g., direct navigation)
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) { // Check if page was loaded from cache (bfcache)
            sessionStorage.removeItem('wishlist_added_flash');
        }
    });
</script>
</body>
</html>