<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $course->title }} - EDVANTAGE</title>
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

    .course-actions {
  display: flex;
  gap: 0.5rem;
  margin-top: 1rem;
}

.btn-cart,
.btn-wishlist {
  padding: 0.6rem 1rem;
  border-radius: 6px;
  font-size: 0.9rem;
  font-weight: 600;
  white-space: nowrap;
  cursor: pointer;
  border: none;
  transition: all 0.3s ease;
}

.btn-cart {
  background-color: #6366f1;
  color: white;
}

.btn-cart:hover {
  background-color: #4f46e5;
}

.btn-wishlist {
  background-color: #f1f5f9;
  color: #475569;
  border: 1px solid #d1d5db;
}

.btn-wishlist:hover {
  background-color: #e2e8f0;
  color: #334155;
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
      position: relative;
    }

    .wishlist-btn {
      background: #f8f9fa;
      color: #5f6368;
      border: 1px solid #dadce0;
    }

    .cart-btn {
      background: #f8f9fa;
      color: #5f6368;
      border: 1px solid #dadce0;
    }

    .action-btn:hover {
      transform: translateY(-1px);
      box-shadow: 0 2px 8px rgba(66, 133, 244, 0.2);
    }

    /* Badge */
    .badge {
      position: absolute;
      top: -5px;
      right: -5px;
      background: #ea4335;
      color: white;
      border-radius: 50%;
      width: 18px;
      height: 18px;
      font-size: 0.7rem;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 600;
    }

    /* User Menu Dropdown */
    .user-menu {
      position: relative;
    }

    .user-menu-button {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: #4285f4;
      color: white;
      border: none;
      font-size: 1.1rem;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .user-menu-button:hover {
      transform: translateY(-1px);
      box-shadow: 0 2px 8px rgba(66, 133, 244, 0.3);
    }

    .user-dropdown {
      position: absolute;
      top: 100%;
      right: 0;
      background: white;
      border: 1px solid #dadce0;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      min-width: 200px;
      opacity: 0;
      visibility: hidden;
      transform: translateY(-10px);
      transition: all 0.3s ease;
      margin-top: 0.5rem;
    }

    .user-menu:hover .user-dropdown {
      opacity: 1;
      visibility: visible;
      transform: translateY(0);
    }

    .user-dropdown a {
      display: flex;
      align-items: center;
      padding: 0.75rem 1rem;
      color: #202124;
      text-decoration: none;
      font-size: 0.9rem;
      transition: background-color 0.2s ease;
      gap: 0.75rem;
    }

    .user-dropdown a:hover {
      background: #f8f9fa;
    }

    .separator {
      height: 1px;
      background: #e8eaed;
      margin: 0.5rem 0;
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
      background: white;
      padding: 2.5rem;
      border-radius: 8px;
      border: 1px solid #dadce0;
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
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 1rem;
      margin-bottom: 2rem;
    }

    .stat-card {
      background: #f8f9fa;
      padding: 1.5rem;
      border-radius: 8px;
      text-align: center;
      border: 1px solid #e8eaed;
    }

    .stat-number {
      font-size: 2rem;
      font-weight: 600;
      color: #4285f4;
      margin-bottom: 0.5rem;
    }

    .stat-label {
      color: #5f6368;
      font-size: 0.9rem;
      font-weight: 500;
    }

    /* Sidebar */
    .price-section {
      text-align: center;
      margin-bottom: 2rem;
    }

    .course-price {
      font-size: 2.5rem;
      font-weight: 600;
      color: #4285f4;
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
      background: #4285f4;
      color: white;
    }

    .btn-primary:hover {
      background: #3367d6;
      box-shadow: 0 2px 8px rgba(66, 133, 244, 0.3);
    }

    .btn-secondary {
      background: white;
      color: #4285f4;
      border: 1px solid #4285f4;
    }

    .btn-secondary:hover {
      background: #4285f4;
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
      color: #4285f4;
      font-size: 1.1rem;
    }

    .back-link {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      color: #4285f4;
      text-decoration: none;
      font-size: 0.9rem;
      margin-bottom: 1rem;
      transition: all 0.3s ease;
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

    /* Icons */
    .icon-heart::before { content: "♡"; }
    .icon-cart::before { content: "🛒"; }
    .icon-profile::before { content: "👤"; }
    .icon-courses::before { content: "📚"; }
    .icon-dashboard::before { content: "📊"; }
    .icon-catalog::before { content: "📖"; }
    .icon-history::before { content: "🛍️"; }
    .icon-logout::before { content: "🚪"; }
    .icon-video::before { content: "🎥"; }
    .icon-time::before { content: "⏱️"; }
    .icon-duration::before { content: "⏰"; }
    .icon-check::before { content: "✓"; }
    .icon-arrow-left::before { content: "←"; }

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
      animation-delay: 0.2s;
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

    .course-tabs {
      margin-top: 2rem;
    }

    .tab-buttons {
      display: flex;
      border-bottom: 1px solid #e8eaed;
      margin-bottom: 2rem;
    }

    .tab-btn {
      padding: 1rem 2rem;
      border: none;
      background: none;
      color: #5f6368;
      cursor: pointer;
      border-bottom: 2px solid transparent;
      transition: all 0.3s ease;
    }

    .tab-btn.active {
      color: #4285f4;
      border-bottom-color: #4285f4;
    }

    .tab-pane {
      display: none;
    }

    .tab-pane.active {
      display: block;
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
      color: #4285f4;
      margin-right: 0.75rem;
      font-weight: bold;
    }

    .original-price {
      text-decoration: line-through;
      color: #5f6368;
      font-size: 1rem;
      margin-top: 0.25rem;
    }
  </style>
</head>
<body>

  <!-- Header matching the profile theme -->
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
        <!-- Wishlist Button -->
        <a href="{{ route('wishlist.all') }}" class="action-btn wishlist-btn" title="Wishlist">
          <span class="icon-heart"></span>
          @if(isset($wishlistCount) && $wishlistCount > 0)
            <span class="badge">{{ $wishlistCount }}</span>
          @endif
        </a>

        <!-- Cart Button -->
        <a href="{{ route('cart.all') }}" class="action-btn cart-btn" title="Cart">
          <span class="icon-cart"></span>
          @if(isset($cartCount) && $cartCount > 0)
            <span class="badge">{{ $cartCount }}</span>
          @endif
        </a>

        <!-- User Menu -->
        <div class="user-menu">
          <button class="user-menu-button">👤</button>
          <div class="user-dropdown">
            <a href="{{ route('profile') }}">
              <span class="icon-profile"></span> My Profile
            </a>
            <a href="{{ route('courses.enrolled') }}">
              <span class="icon-courses"></span> My Courses
            </a>
            <a href="#">
              <span class="icon-dashboard"></span> Dashboard
            </a>
            <a href="{{ route('courses.all') }}">
              <span class="icon-catalog"></span> Course Catalog
            </a>
            <a href="#">
              <span class="icon-history"></span> Purchase History
            </a>
            <div class="separator"></div>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <span class="icon-logout"></span> Logout
            </a>
          </div>
        </div>

        <!-- Hidden logout form -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="main-content">
    <!-- Breadcrumb -->
    <div class="breadcrumb">
      <a href="{{ url('/') }}">Home</a>
      <span>›</span>
      <a href="{{ route('courses.all') }}">Courses</a>
      <span>›</span>
      <span>{{ $course->title }}</span>
    </div>

    <!-- Back Link -->
    <a href="{{ route('courses.all') }}" class="back-link">
      <span class="icon-arrow-left"></span>
      Back to All Courses
    </a>

    <div class="course-details-wrapper">
      <!-- Main Course Content -->
      <div class="course-main">
        <!-- Course Image Section -->
        <div class="course-image-section">
          <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" class="course-hero-image">
        </div>

        <h1 class="course-title">{{ $course->title }}</h1>
        
        <div class="course-meta">
          <div class="meta-item">
            <span class="icon-video"></span>
            <span>{{ $course->video_count }} Videos</span>
          </div>
          <div class="meta-item">
            <span class="icon-time"></span>
            <span>{{ $course->approx_video_length }} min per video</span>
          </div>
          <div class="meta-item">
            <span class="icon-duration"></span>
            <span>{{ $course->total_duration }} min total</span>
          </div>
        </div>

        <div class="course-description">
          {{ $course->description }}
        </div>

        <!-- Course Tabs -->
        <div class="course-tabs">
          <div class="tab-buttons">
            <button class="tab-btn active" data-tab="info">Course Info</button>
            <button class="tab-btn" data-tab="reviews">Reviews</button>
          </div>
          
          <div class="tab-content">
            <div class="tab-pane active" id="info">
              <h3>About this course</h3>
              <p>{{ $course->description }}</p>
            </div>
            <div class="tab-pane" id="reviews">
              <h3>Student Reviews</h3>
              <p>No reviews yet. Be the first to review this course!</p>
            </div>
          </div>
        </div>

        <div class="course-stats">
          <div class="stat-card">
            <div class="stat-number">{{ $course->video_count }}</div>
            <div class="stat-label">Total Videos</div>
          </div>
          <div class="stat-card">
            <div class="stat-number">{{ number_format($course->total_duration / 60, 1) }}h</div>
            <div class="stat-label">Total Duration</div>
          </div>
          <div class="stat-card">
            <div class="stat-number">{{ $course->approx_video_length }}</div>
            <div class="stat-label">Avg Video Length</div>
          </div>
        </div>
      </div>

      <!-- Enhanced Sidebar -->
      <div class="course-sidebar">
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
  <form action="{{ route('cart.add', $course->id) }}" method="POST" style="flex: 1;">
    @csrf
    <button type="submit" class="btn btn-cart">
      🛒 Add to Cart
    </button>
  </form>

  <!-- Wishlist Button -->
  <form action="{{ route('wishlist.add', $course->id) }}" method="POST" style="flex: 1;">
    @csrf
    <button type="submit" class="btn btn-wishlist">
      ♡ Save to Wishlist
    </button>
  </form>
</div>

            @endif
          @else
            <a href="{{ route('login') }}" class="btn btn-primary">Login to Enroll</a>
          @endauth
       
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

    // Add to cart/wishlist feedback
    document.querySelectorAll('form button').forEach(btn => {
      btn.addEventListener('click', function() {
        const originalText = this.textContent;
        this.textContent = 'Adding...';
        this.disabled = true;
        
        setTimeout(() => {
          this.textContent = originalText;
          this.disabled = false;
        }, 2000);
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
  </script>

</body>
</html>
