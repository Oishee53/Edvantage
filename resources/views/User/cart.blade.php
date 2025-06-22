<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Cart - EDVANTAGE</title>
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
      background: #f8f9fa;
      color: #5f6368;
      border: 1px solid #dadce0;
    }

    .cart-btn {
      background: #4285f4;
      color: white;
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

    .page-header {
      text-align: center;
      margin-bottom: 1.5rem;
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

    /* Cart Layout */
    .cart-wrapper {
      display: grid;
      grid-template-columns: 2fr 1fr;
      gap: 2rem;
      align-items: start;
    }

    .cart-container {
      background: white;
      padding: 2.5rem;
      border-radius: 8px;
      border: 1px solid #dadce0;
    }

    .summary-container {
      background: white;
      padding: 2rem;
      border-radius: 8px;
      border: 1px solid #dadce0;
      position: sticky;
      top: 120px;
    }

    .cart-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
      padding-bottom: 1rem;
      border-bottom: 1px solid #e8eaed;
    }

    .cart-title {
      font-size: 1.5rem;
      font-weight: 500;
      color: #202124;
    }

    .cart-count {
      color: #5f6368;
      font-size: 0.9rem;
    }

    /* Cart Items */
    .cart-items {
      list-style: none;
      padding: 0;
    }

    .cart-item {
      display: flex;
      gap: 1.5rem;
      padding: 1.5rem 0;
      border-bottom: 1px solid #f1f3f4;
      transition: all 0.3s ease;
    }

    .cart-item:last-child {
      border-bottom: none;
    }

    .cart-item:hover {
      background: #f8f9fa;
      margin: 0 -1rem;
      padding-left: 1rem;
      padding-right: 1rem;
      border-radius: 8px;
    }

    .cart-img {
      width: 120px;
      height: 80px;
      object-fit: cover;
      border-radius: 6px;
      flex-shrink: 0;
    }

    .cart-info {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }

    .course-title {
      font-size: 1.1rem;
      font-weight: 500;
      color: #202124;
      line-height: 1.4;
    }

    .course-description {
      font-size: 0.9rem;
      color: #5f6368;
      line-height: 1.5;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .course-price {
      font-size: 1.1rem;
      font-weight: 600;
      color: #4285f4;
      margin-top: auto;
    }

    .remove-btn {
      background: none;
      border: none;
      color: #ea4335;
      font-size: 0.9rem;
      cursor: pointer;
      padding: 0.25rem 0;
      transition: all 0.3s ease;
      align-self: flex-start;
    }

    .remove-btn:hover {
      text-decoration: underline;
      color: #d33b2c;
    }

    /* Summary Section */
    .summary-title {
      font-size: 1.25rem;
      font-weight: 500;
      color: #202124;
      margin-bottom: 1.5rem;
    }

    .summary-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.75rem 0;
      border-bottom: 1px solid #f1f3f4;
    }

    .summary-row:last-of-type {
      border-bottom: 2px solid #e8eaed;
      font-weight: 600;
      font-size: 1.1rem;
      color: #202124;
      margin-bottom: 1.5rem;
    }

    .summary-label {
      color: #5f6368;
    }

    .summary-value {
      color: #202124;
      font-weight: 500;
    }

    .checkout-btn {
      width: 100%;
      padding: 1rem;
      background: #4285f4;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 1rem;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-bottom: 1rem;
    }

    .checkout-btn:hover {
      background: #3367d6;
      box-shadow: 0 2px 8px rgba(66, 133, 244, 0.3);
    }

    .continue-shopping {
      display: block;
      text-align: center;
      color: #4285f4;
      text-decoration: none;
      font-size: 0.9rem;
      padding: 0.5rem;
      transition: all 0.3s ease;
    }

    .continue-shopping:hover {
      text-decoration: underline;
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
      border-radius: 6px;
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
        padding: 1rem 1rem;
      }

      .page-title {
        font-size: 2rem;
      }

      .cart-wrapper {
        grid-template-columns: 1fr;
        gap: 1.5rem;
      }

      .cart-container,
      .summary-container {
        padding: 1.5rem;
      }

      .cart-item {
        flex-direction: column;
        gap: 1rem;
      }

      .cart-img {
        width: 100%;
        height: 150px;
      }

      .summary-container {
        position: static;
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

    .cart-item {
      animation: fadeInUp 0.6s ease forwards;
    }

    .cart-item:nth-child(1) { animation-delay: 0.1s; }
    .cart-item:nth-child(2) { animation-delay: 0.2s; }
    .cart-item:nth-child(3) { animation-delay: 0.3s; }
    .cart-item:nth-child(4) { animation-delay: 0.4s; }
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

        <!-- Cart Button - Active -->
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
      <span>Shopping Cart</span>
    </div>

    <!-- Page Header -->
    <div class="page-header">
      <h1 class="page-title">Shopping Cart</h1>
      <p class="page-subtitle">Review your selected courses before checkout</p>
    </div>

    @if($cartItems->count())
      <div class="cart-wrapper">
        <!-- Cart Items -->
        <div class="cart-container">
          <div class="cart-header">
            <h2 class="cart-title">Cart Items</h2>
            <span class="cart-count">{{ $cartItems->count() }} {{ Str::plural('item', $cartItems->count()) }}</span>
          </div>

          <ul class="cart-items">
            @foreach ($cartItems as $item)
              <li class="cart-item">
                <img src="{{ asset('storage/' . $item->course->image) }}" alt="{{ $item->course->title }}" class="cart-img">
                
                <div class="cart-info">
                  <h3 class="course-title">{{ $item->course->title }}</h3>
                  <p class="course-description">{{ $item->course->description }}</p>
                  <div class="course-price">${{ number_format($item->course->price, 2) }}</div>
                  
                  <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="remove-btn">Remove</button>
                  </form>
                </div>
              </li>
            @endforeach
          </ul>
        </div>

        <!-- Order Summary -->
        <div class="summary-container">
          <h3 class="summary-title">Order Summary</h3>
          
          <div class="summary-row">
            <span class="summary-label">Subtotal ({{ $cartItems->count() }} items)</span>
            <span class="summary-value">${{ number_format($cartItems->sum('course.price'), 2) }}</span>
          </div>
          
          <div class="summary-row">
            <span class="summary-label">Taxes</span>
            <span class="summary-value">$0.00</span>
          </div>
          
          <div class="summary-row">
            <span class="summary-label">Total</span>
            <span class="summary-value">${{ number_format($cartItems->sum('course.price'), 2) }}</span>
          </div>

          <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <button type="submit" class="checkout-btn">Proceed to Checkout</button>
          </form>
          
          <a href="{{ route('courses.all') }}" class="continue-shopping">Continue Shopping</a>
        </div>
      </div>
    @else
      <div class="cart-container">
        <div class="empty-state">
          <div class="empty-icon">🛒</div>
          <h3>Your cart is empty</h3>
          <p>Looks like you haven't added any courses to your cart yet. Start exploring our course catalog and add courses you'd like to learn.</p>
          <a href="{{ route('courses.all') }}" class="browse-btn">Browse Courses</a>
        </div>
      </div>
    @endif
  </main>

  <script>
    // Smooth animations
    window.addEventListener('load', function() {
      const items = document.querySelectorAll('.cart-item');
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
        if (!confirm('Are you sure you want to remove this course from your cart?')) {
          e.preventDefault();
        }
      });
    });
  </script>

</body>
</html>