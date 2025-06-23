<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Wishlist - EDVANTAGE</title>
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
      background: #4285f4;
      color: white;
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

    /* Breadcrumb */
   .breadcrumb {
  margin-bottom: 1rem;
}

    .breadcrumb a {
      color: #4285f4;
      text-decoration: none;
    }

    .breadcrumb a:hover {
      text-decoration: underline;
    }

    /* Wishlist Container */
    .wishlist-container {
      background: white;
      padding: 2.5rem;
      border-radius: 8px;
      border: 1px solid #dadce0;
    }

    .wishlist-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
      padding-bottom: 1rem;
      border-bottom: 1px solid #e8eaed;
    }

    .wishlist-title {
      font-size: 1.5rem;
      font-weight: 500;
      color: #202124;
    }

    .wishlist-count {
      color: #5f6368;
      font-size: 0.9rem;
    }

    .wishlist-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
      gap: 2rem;
      padding: 0;
      list-style-type: none;
    }

    .wishlist-item {
      background: white;
      padding: 0;
      border-radius: 8px;
      border: 1px solid #dadce0;
      transition: all 0.3s ease;
      overflow: hidden;
      position: relative;
    }

    .wishlist-item:hover {
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      transform: translateY(-2px);
    }

    .course-image {
      width: 100%;
      height: 200px;
      object-fit: cover;
      transition: transform 0.3s ease;
    }

    .wishlist-item:hover .course-image {
      transform: scale(1.02);
    }

    .course-content {
      padding: 1.5rem;
    }

    .course-title {
      font-size: 1.25rem;
      font-weight: 500;
      color: #202124;
      margin-bottom: 0.75rem;
      line-height: 1.4;
    }

    .course-description {
      font-size: 0.9rem;
      color: #5f6368;
      line-height: 1.6;
      margin-bottom: 1rem;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .course-price {
      font-size: 1.1rem;
      font-weight: 600;
      color: #4285f4;
      margin-bottom: 1rem;
    }

    .course-actions {
      display: flex;
      gap: 0.75rem;
    }

    .btn {
      padding: 0.75rem 1rem;
      border: none;
      border-radius: 4px;
      font-weight: 500;
      font-size: 0.9rem;
      cursor: pointer;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-block;
      text-align: center;
      flex: 1;
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
      color: #5f6368;
      border: 1px solid #dadce0;
    }

    .btn-secondary:hover {
      background: #f8f9fa;
      border-color: #4285f4;
      color: #4285f4;
    }

    .remove-btn {
      position: absolute;
      top: 1rem;
      right: 1rem;
      width: 32px;
      height: 32px;
      border-radius: 50%;
      background: rgba(234, 67, 53, 0.1);
      color: #ea4335;
      border: none;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1rem;
      transition: all 0.3s ease;
    }

    .remove-btn:hover {
      background: #ea4335;
      color: white;
      transform: scale(1.1);
    }

    /* Empty State */
    .empty-state {
      text-align: center;
      padding: 4rem 2rem;
    }

    .empty-icon {
      font-size: 4rem;
      color: #dadce0;
      margin-bottom: 1rem;
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
      max-width: 400px;
      margin-left: auto;
      margin-right: auto;
    }

    .browse-btn {
      display: inline-block;
      padding: 0.75rem 2rem;
      background: #4285f4;
      color: white;
      text-decoration: none;
      border-radius: 4px;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .browse-btn:hover {
      background: #3367d6;
      box-shadow: 0 2px 8px rgba(66, 133, 244, 0.3);
      text-decoration: none;
      color: white;
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

      .wishlist-container {
        padding: 1.5rem;
      }

      .wishlist-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
      }

      .wishlist-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
      }

      .course-actions {
        flex-direction: column;
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
    .icon-remove::before { content: "×"; }

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

    .wishlist-item {
      animation: fadeInUp 0.6s ease forwards;
    }

    .wishlist-item:nth-child(1) { animation-delay: 0.1s; }
    .wishlist-item:nth-child(2) { animation-delay: 0.2s; }
    .wishlist-item:nth-child(3) { animation-delay: 0.3s; }
    .wishlist-item:nth-child(4) { animation-delay: 0.4s; }
  </style>
</head>
<body>

  <!-- Header matching the profile theme -->
  <header class="header">
    <div class="header-content">
      <a href="/" class="logo">
        <img src="/image/Edvantage.png" alt="EDVANTAGE Logo" style="height:32px; display:inline-block; vertical-align:middle;">
      </a>
      
      <nav>
        <ul class="nav-menu">
          <li><a href="{{ url('/about') }}">About Us</a></li>
          <li><a href="{{ url('/courses') }}">Courses</a></li>
          <li><a href="{{ url('/blog') }}">Blog</a></li>
          <li><a href="{{ url('/contact') }}">Contact Us</a></li>
        </ul>
      </nav>

      <div class="header-actions">
        <!-- Wishlist Button - Active -->
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
      <span>Wishlist</span>
    </div>

    <!-- Page Header -->
    <div class="page-header">
      <h1 class="page-title">My Wishlist</h1>
      <p class="page-subtitle">Save courses for later and never miss out on learning opportunities</p>
    </div>

    <!-- Wishlist Container -->
    <div class="wishlist-container">
      @if($wishlistItems->count())
        <div class="wishlist-header">
          <h2 class="wishlist-title">Saved Courses</h2>
          <span class="wishlist-count">{{ $wishlistItems->count() }} {{ Str::plural('course', $wishlistItems->count()) }}</span>
        </div>

        <div class="wishlist-grid">
          @foreach ($wishlistItems as $item)
            <div class="wishlist-item">
              <!-- Remove Button -->
              <form action="{{ route('wishlist.remove', $item->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="remove-btn" title="Remove from wishlist">
                  <span class="icon-remove"></span>
                </button>
              </form>

              <img src="{{ asset('storage/' . $item->course->image) }}" alt="{{ $item->course->title }}" class="course-image">
              
              <div class="course-content">
                <h3 class="course-title">{{ $item->course->title }}</h3>
                <p class="course-description">{{ $item->course->description }}</p>
                <div class="course-price">${{ number_format($item->course->price, 2) }}</div>
                
                <div class="course-actions">
                  <a href="{{ route('courses.details', $item->course->id) }}" class="btn btn-primary">
                    View Course
                  </a>
                  <form action="{{ route('cart.add', $item->course->id) }}" method="POST" style="flex: 1;">
                    @csrf
                    <button type="submit" class="btn btn-secondary" style="width: 100%;">
                      Add to Cart
                    </button>
                  </form>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @else
        <div class="empty-state">
          <div class="empty-icon">♡</div>
          <h3>Your wishlist is empty</h3>
          <p>Start building your learning journey by adding courses to your wishlist. You can save courses for later and get notified about price changes.</p>
          <a href="{{ route('courses.all') }}" class="browse-btn">Browse Courses</a>
        </div>
      @endif
    </div>
  </main>

  <script>
    // Smooth animations
    window.addEventListener('load', function() {
      const items = document.querySelectorAll('.wishlist-item');
      items.forEach((item, index) => {
        setTimeout(() => {
          item.style.opacity = '1';
          item.style.transform = 'translateY(0)';
        }, index * 100);
      });
    });

    // Confirm removal
    document.querySelectorAll('.remove-btn').forEach(btn => {
      btn.addEventListener('click', function(e) {
        if (!confirm('Are you sure you want to remove this course from your wishlist?')) {
          e.preventDefault();
        }
      });
    });

  @if(session('cart_added'))
    
        if (confirm("{{ session('cart_added') }} Go to cart?")) {
        window.location.href = "{{ route('cart.all') }}";
        }
    
        @endif


  </script>

</body>
</html>
