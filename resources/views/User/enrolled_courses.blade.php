<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Courses - EDVANTAGE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f8f9fa;
      color: #202124;
      min-height: 100vh;
    }

    /* Header - Matching Profile Theme */
    .header {
      background: white;
      padding: 1rem 0;
      position: sticky;
      top: 0;
      z-index: 1000;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
      border-bottom: 1px solid #e8eaed;
    }



    .user-menu {
  position: relative;
}

.user-menu-button {
  width: 48px;
  height: 48px;
  background: #6366f1;
  border: none;
  border-radius: 50%;
  color: white;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.2rem;
  transition: all 0.3s ease;
}

.user-menu-button:hover {
  background: #4f46e5;
  transform: scale(1.05);
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
  padding: 12px 16px;
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
  color: #6366f1;
}

.user-dropdown .icon {
  margin-right: 12px;
  font-size: 1rem;
  width: 16px;
  text-align: center;
}

.user-dropdown .separator {
  height: 1px;
  background: #e5e7eb;
  margin: 4px 0;
}

    .header-content {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 2rem;
    }


    .logo {
      font-size: 2rem;
      font-weight: 700;
      color: #4285f4;
      text-decoration: none;
    }

    .nav-menu {
      display: flex;
      list-style: none;
      gap: 2rem;
    }

    .nav-menu a {
      color: #5f6368;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    .nav-menu a:hover {
      color: #4285f4;
    }

    .header-actions {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .action-btn {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;
      font-size: 1.1rem;
      transition: all 0.3s ease;
    }

    .heart-btn {
      background: #f8f9fa;
      color: #5f6368;
      border: 1px solid #dadce0;
    }

    .cart-btn {
      background: #4285f4;
      color: white;
    }

    .profile-btn {
      background: #4285f4;
      color: white;
    }

    .action-btn:hover {
      transform: translateY(-1px);
      box-shadow: 0 2px 8px rgba(66, 133, 244, 0.2);
    }

    /* Main Content */
    .main-content {
      padding: 3rem 2rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    .page-header {
      text-align: center;
      margin-bottom: 3rem;
    }

    .page-title {
      font-size: 2.5rem;
      font-weight: 400;
      color: #202124;
      margin-bottom: 1rem;
    }

    .page-subtitle {
      font-size: 1.1rem;
      color: #5f6368;
      margin-bottom: 2rem;
    }

    /* Stats Cards - Google Style */
    .stats-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 1.5rem;
      margin-bottom: 3rem;
    }

    .stat-card {
      background: white;
      padding: 1.5rem;
      border-radius: 8px;
      text-align: center;
      border: 1px solid #dadce0;
      transition: all 0.3s ease;
    }

    .stat-card:hover {
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      transform: translateY(-2px);
    }

    .stat-number {
      font-size: 2.5rem;
      font-weight: 400;
      color: #4285f4;
      margin-bottom: 0.5rem;
    }

    .stat-label {
      color: #5f6368;
      font-size: 0.9rem;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    /* Courses Container - Clean Google Style */
    .courses-container {
      background: white;
      padding: 2.5rem;
      border-radius: 8px;
      border: 1px solid #dadce0;
    }

    .courses-title {
      font-size: 1.875rem;
      font-weight: 400;
      color: #202124;
      margin-bottom: 2rem;
      text-align: center;
    }

    .course-list {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
      gap: 2rem;
      padding: 0;
      list-style-type: none;
    }

    .course-card {
      background: white;
      padding: 0;
      border-radius: 8px;
      border: 1px solid #dadce0;
      transition: all 0.3s ease;
      overflow: hidden;
    }

    .course-card:hover {
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      transform: translateY(-2px);
    }

    .course-image {
      width: 100%;
      height: 200px;
      object-fit: cover;
      transition: transform 0.3s ease;
    }

    .course-card:hover .course-image {
      transform: scale(1.02);
    }

    .course-content {
      padding: 1.5rem;
    }

    .course-title {
      font-size: 1.25rem;
      font-weight: 500;
      color: #202124;
      text-decoration: none;
      margin-bottom: 0.75rem;
      display: block;
      transition: color 0.3s ease;
      line-height: 1.4;
    }

    .course-title:hover {
      color: #4285f4;
      text-decoration: none;
    }

    .course-description {
      font-size: 0.9rem;
      color: #5f6368;
      line-height: 1.6;
      margin-bottom: 1.5rem;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    /* Progress Bar - Google Style */
    .progress-container {
      margin-bottom: 1rem;
    }

    .progress-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 0.5rem;
    }

    .progress-label {
      font-size: 0.8rem;
      color: #5f6368;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .progress-percentage {
      font-size: 0.8rem;
      color: #4285f4;
      font-weight: 500;
    }

    .progress-bar {
      width: 100%;
      height: 4px;
      background: #f1f3f4;
      border-radius: 2px;
      overflow: hidden;
    }

    .progress-fill {
      height: 100%;
      background: #4285f4;
      border-radius: 2px;
      transition: width 0.8s ease;
    }

    /* Course Stats */
    .course-stats {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1rem;
      font-size: 0.8rem;
      color: #5f6368;
    }

    .continue-btn {
      width: 100%;
      padding: 0.75rem;
      background: #4285f4;
      color: white;
      border: none;
      border-radius: 4px;
      font-weight: 500;
      font-size: 0.9rem;
      cursor: pointer;
      transition: all 0.3s ease;
      text-decoration: none;
      display: block;
      text-align: center;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .continue-btn:hover {
      background: #3367d6;
      box-shadow: 0 2px 8px rgba(66, 133, 244, 0.3);
      text-decoration: none;
      color: white;
    }

    /* Empty State */
    .empty-state {
      grid-column: 1 / -1;
      text-align: center;
      padding: 3rem;
    }

    .empty-state h3 {
      color: #202124;
      font-size: 1.5rem;
      font-weight: 400;
      margin-bottom: 1rem;
    }

    .empty-state p {
      color: #5f6368;
      margin-bottom: 2rem;
    }

    .browse-btn {
      display: inline-block;
      padding: 0.75rem 2rem;
      background: white;
      color: #4285f4;
      text-decoration: none;
      border: 1px solid #4285f4;
      border-radius: 4px;
      font-weight: 500;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .browse-btn:hover {
      background: #4285f4;
      color: white;
      box-shadow: 0 2px 8px rgba(66, 133, 244, 0.3);
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
        padding: 2rem 1rem;
      }

      .page-title {
        font-size: 2rem;
      }

      .courses-container {
        padding: 1.5rem;
      }

      .course-list {
        grid-template-columns: 1fr;
        gap: 1.5rem;
      }

      .stats-container {
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
      }
    }

    /* Icons */
    .icon-heart::before { content: "♡"; }
    .icon-cart::before { content: "🛒"; }
    .icon-user::before { content: "👤"; }
    .icon-book::before { content: "📚"; }
    .icon-clock::before { content: "⏰"; }

    /* Subtle Google-style animations */
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

    .course-card {
      animation: fadeInUp 0.6s ease forwards;
    }

    .course-card:nth-child(1) { animation-delay: 0.1s; }
    .course-card:nth-child(2) { animation-delay: 0.2s; }
    .course-card:nth-child(3) { animation-delay: 0.3s; }
    .course-card:nth-child(4) { animation-delay: 0.4s; }
  </style>
</head>
<body>

  <!-- Header matching profile theme -->
  <header class="header">
    <div class="header-content">
      <a href="{{ url('/') }}" class="logo">EDVANTAGE</a>
      
      <nav>
        <ul class="nav-menu">
          <li><a href="{{ url('/about') }}">About Us</a></li>
          <li><a href="{{ url('/courses') }}">Courses</a></li>
          <li><a href="{{ url('/blog') }}">Blog</a></li>
          <li><a href="{{ url('/contact') }}">Contact Us</a></li>
        </ul>
      </nav>


      <div class="header-actions">
        <a href="{{ route('wishlist.all') }}" class="action-btn heart-btn">
          <span class="icon-heart"></span>
        </a>
        <a href="{{ route('cart.all') }}" class="action-btn cart-btn">
          <span class="icon-cart"></span>
        </a>
       <!-- User Menu -->
<div class="user-menu">
  <button class="user-menu-button">👤</button>
  <div class="user-dropdown">
    <a href="{{ url('/profile') }}"><span class="icon"></span> My Profile</a>
    <a href="{{ route('courses.enrolled') }}"><span class="icon"></span> My Courses</a>
    <a href="{{ url('/user/dashboard') }}"><span class="icon"></span> Dashboard</a>
    <a href="{{ route('courses.all') }}"><span class="icon"></span> Course Catalog</a>
    <a href="{{ url('/purchase_history') }}"><span class="icon"></span> Purchase History</a>
    <div class="separator"></div>
    <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <span class="icon"></span> Logout
    </a>
  </div>
</div>

<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
  @csrf
</form>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="main-content">
    <!-- Page Header -->
    <div class="page-header">
      <h1 class="page-title">My Learning Dashboard</h1>
      <p class="page-subtitle">Track your progress and continue your professional development</p>
    </div>

    <!-- Stats Cards -->
    <div class="stats-container">
      <div class="stat-card">
        <div class="stat-number">{{ $enrolledCourses->count() }}</div>
        <div class="stat-label">Courses Enrolled</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">{{ $completedCourses ?? 0 }}</div>
        <div class="stat-label">Completed</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">{{ $totalHours ?? '24' }}h</div>
        <div class="stat-label">Learning Hours</div>
      </div>
    </div>

    <!-- Courses Container -->
    <div class="courses-container">
      <h2 class="courses-title">My Courses</h2>

      <div class="course-list">
        @forelse ($enrolledCourses as $course)
          <div class="course-card">
            <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" class="course-image">
            
            <div class="course-content">
              <a href="{{ route('user.course.modules', $course->id) }}" class="course-title">
                {{ $course->title }}
              </a>
              
              <p class="course-description">{{ $course->description }}</p>
              
              <!-- Progress Bar -->
              <div class="progress-container">
                <div class="progress-header">
                  <span class="progress-label">Progress</span>
                  <span class="progress-percentage">{{ $course->progress ?? 0 }}%</span>
                </div>
                <div class="progress-bar">
                  <div class="progress-fill" style="width: {{ $course->progress ?? 0 }}%"></div>
                </div>
              </div>
              
              <!-- Course Stats -->
              <div class="course-stats">
                <span><span class="icon-book"></span> {{ $course->total_modules ?? 10 }} modules</span>
                <span><span class="icon-clock"></span> {{ $course->estimated_time ?? '2h' }} remaining</span>
              </div>
              
              <a href="{{ route('user.course.modules', $course->id) }}" class="continue-btn">
                Continue Learning
              </a>
            </div>
          </div>
        @empty
          <div class="empty-state">
            <h3>Begin Your Learning Journey</h3>
            <p>Explore our comprehensive course catalog to advance your skills</p>
            <a href="{{ url('/courses') }}" class="browse-btn">Browse Courses</a>
          </div>
        @endforelse
      </div>
    </div>
  </main>

  <script>
    // Smooth progress bar animation
    window.addEventListener('load', function() {
      const progressBars = document.querySelectorAll('.progress-fill');
      progressBars.forEach(bar => {
        const width = bar.style.width;
        bar.style.width = '0%';
        setTimeout(() => {
          bar.style.width = width;
        }, 500);
      });
    });
  </script>

</body>
</html>