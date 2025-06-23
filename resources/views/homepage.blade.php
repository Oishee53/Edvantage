<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>EDVANTAGE - Your Virtual Classroom Redefined</title>
  <style>
    /* Hero Section - Adjusted to match screenshot proportions */
.hero {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  height: 70vh; /* Changed to viewport height to match screenshot */
  min-height: 500px; /* Minimum height for smaller screens */
  display: flex;
  align-items: center;
  position: relative;
  overflow: hidden;
  padding: 0 3rem;
  margin: 80px 2rem 0 2rem; /* Changed from margin-top: 80px; to add left/right margins */
  border-radius: 8px; /* Add rounded corners for a more contained look */
}

.hero::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2071&q=80') center/cover;
  opacity: 0.3;
}

.hero-content {
  max-width: 1000px; /* Changed from 1200px */
  margin: 0 auto;
  padding: 0 4rem; /* Changed from 0 3rem */
  text-align: center;
  position: relative;
  z-index: 2;
}

.hero h1 {
  font-size: 3.5rem; /* Increased back to original size for impact */
  font-weight: bold;
  color: white;
  margin-bottom: 2rem; /* Increased spacing */
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
  line-height: 1.2;
}

.hero p {
  font-size: 1.3rem;
  color: rgba(255, 255, 255, 0.9);
  margin-bottom: 2.5rem;
  max-width: 600px; /* Changed from 700px */
  margin-left: auto;
  margin-right: auto;
  line-height: 1.5;
}

.hero-buttons {
  display: flex;
  gap: 1.5rem;
  justify-content: center;
  flex-wrap: wrap;
}

.btn-hero {
  padding: 1.3rem 2.5rem; /* Increased padding for prominence */
  font-size: 1.1rem;
  border-radius: 50px;
  transition: all 0.3s ease;
}

.btn-secondary {
  background: rgba(255, 255, 255, 0.2);
  color: white;
  border: 2px solid rgba(255, 255, 255, 0.3);
  text-decoration: none;
  display: inline-block;
}

.btn-secondary:hover {
  background: rgba(255, 255, 255, 0.3);
  transform: translateY(-2px);
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

/* Courses Section */
.courses-section {
  padding: 6rem 0;
  background: #f8fafc;
}

.container {
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 3rem;
}

.section-title {
  text-align: center;
  margin-bottom: 4rem;
}

.section-title h2 {
  font-size: 2.5rem;
  color: #1e293b;
  margin-bottom: 1.5rem;
}

.section-title p {
  font-size: 1.1rem;
  color: #64748b;
}

.courses-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  gap: 2rem;
  margin-top: 3rem;
}

.course-card {
  background: white;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease;
  display: flex;
  flex-direction: column;
  height: 420px;
}

.course-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
}

.course-image-container {
  position: relative;
  height: 240px;
  overflow: hidden;
  background: linear-gradient(135deg, #4285f4 0%, #3367d6 100%);
  display: flex;
  align-items: center;
  justify-content: center;
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

/* Fallback for courses without images */
.course-image-placeholder {
  color: white;
  font-size: 2rem;
  font-weight: bold;
  text-align: center;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  background: linear-gradient(135deg, #4285f4 0%, #3367d6 100%);
}

.course-content {
  padding: 1.5rem;
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.course-header {
  margin-bottom: 1rem;
}

.course-category {
  background: rgba(66, 133, 244, 0.1);
  color: #4285f4;
  padding: 0.4rem 0.8rem;
  border-radius: 20px;
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  display: inline-block;
  margin-bottom: 0.75rem;
  width: fit-content;
}

.course-title {
  font-size: 1.25rem;
  font-weight: 700;
  color: #1e293b;
  margin-bottom: 0.5rem;
  line-height: 1.4;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.course-description {
  font-size: 0.9rem;
  color: #64748b;
  line-height: 1.5;
  margin-bottom: 1rem;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.course-bottom {
  margin-top: auto;
}

.course-price {
  font-size: 1.5rem;
  font-weight: bold;
  color: #10b981;
  margin-bottom: 1rem;
}

.course-actions {
  display: flex;
  gap: 0.75rem;
}

.btn-details {
  flex: 1;
  background: #f1f5f9;
  color: #475569;
  text-align: center;
  padding: 0.75rem 1rem;
  border-radius: 8px;
  text-decoration: none;
  font-size: 0.9rem;
  font-weight: 600;
  transition: all 0.3s ease;
  border: none;
  cursor: pointer;
}

.btn-details:hover {
  background: #e2e8f0;
  color: #334155;
  transform: translateY(-1px);
}

.btn-cart {
  background: #4285f4;
  color: white;
  border: none;
  padding: 0.75rem 1rem;
  border-radius: 8px;
  cursor: pointer;
  font-size: 0.9rem;
  font-weight: 600;
  transition: all 0.3s ease;
  white-space: nowrap;
  min-width: 120px;
}

.btn-cart:hover {
  background: #3367d6;
  transform: translateY(-1px);
  box-shadow: 0 4px 12px rgba(66, 133, 244, 0.3);
}

/* Responsive Design */
@media (max-width: 1200px) {
  .courses-grid {
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  }
}

@media (max-width: 768px) {
  .hero {
    height: 60vh;
    min-height: 400px;
    padding: 0 2rem;
    margin: 70px 1rem 0 1rem; /* Reduced margins for mobile */
    border-radius: 16px;
  }
  
  .hero h1 {
    font-size: 2.5rem;
    margin-bottom: 1.5rem;
  }
  
  .hero p {
    font-size: 1.1rem;
    margin-bottom: 2rem;
  }
  
  .btn-hero {
    padding: 1.1rem 2rem;
    font-size: 1rem;
  }
  
  .courses-grid {
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.5rem;
  }
  .container {
    padding: 0 2rem;
  }
  .course-card {
    height: 380px;
  }
  .course-image-container {
    height: 200px;
  }
}

@media (max-width: 480px) {
  .hero {
    height: 50vh;
    min-height: 350px;
    margin: 70px 1rem 0 1rem; /* Even smaller margins for small mobile */
    border-radius: 6px;
  }
  
  .hero h1 {
    font-size: 2rem;
  }
  
  .hero p {
    font-size: 1rem;
  }
  
  .courses-grid {
    grid-template-columns: 1fr;
  }
}

    /* Reset & Base Styles */
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
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      z-index: 1000;
      padding: 1rem 0;
      transition: all 0.3s ease;
    }
    
    .nav-container {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 3rem;
    }
    .header-content {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 3rem;
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
      gap: 2.5rem;
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

    .top-icons {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .icon-button {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 44px;
      height: 44px;
      font-size: 1.1rem;
      color: #4285f4;
      background: rgba(66, 133, 244, 0.08);
      border: 1px solid rgba(66, 133, 244, 0.2);
      border-radius: 10px;
      text-decoration: none;
      transition: all 0.3s ease;
      position: relative;
    }

    .icon-button:hover {
      background: rgba(66, 133, 244, 0.15);
      border-color: rgba(66, 133, 244, 0.3);
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(66, 133, 244, 0.2);
    }

    .icon-button:active {
      transform: translateY(0);
    }

    .user-menu-button {
      width: 44px;
      height: 44px;
      background: linear-gradient(135deg, #4285f4 0%, #3367d6 100%);
      border: none;
      border-radius: 10px;
      color: white;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.1rem;
      transition: all 0.3s ease;
      box-shadow: 0 2px 8px rgba(66, 133, 244, 0.3);
    }

    .user-menu-button:hover {
      background: linear-gradient(135deg, #3367d6 0%, #2851a3 100%);
      transform: translateY(-1px);
      box-shadow: 0 4px 16px rgba(66, 133, 244, 0.4);
    }

    .user-menu-button:active {
      transform: translateY(0);
    }

    .user-menu-button i {
      font-size: 1rem;
    }

    .btn {
      padding: 0.75rem 1.25rem;
      border: none;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
      cursor: pointer;
      font-size: 0.9rem;
    }

    .btn-outline {
      background: transparent;
      color: #4285f4;
      border: 2px solid #4285f4;
    }

    .btn-outline:hover {
      background: #4285f4;
      color: white;
    }

    .btn-primary {
      background: #4285f4;
      color: white;
    }

    .btn-primary:hover {
      background: #3367d6;
      transform: translateY(-2px);
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
      color: #4285f4;
    }

    .user-dropdown .icon {
      margin-right: 12px;
      font-size: 0.9rem;
      width: 16px;
      text-align: center;
      color: #4285f4;
    }

    .user-dropdown .separator {
      height: 1px;
      background: #e5e7eb;
      margin: 8px 0;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .nav-menu {
        display: none;
      }

      .header-buttons {
        display: none;
      }
      
      .header-content {
        padding: 0 2rem;
      }
      
      .top-icons {
        gap: 1rem;
      }
    }
  </style>
</head>
<body>
  <!-- Header -->
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

     <div class="top-icons">
  <a href="/wishlist" class="icon-button" title="Wishlist">
    <i class="fas fa-heart"></i>
  </a>
  <a href="/cart" class="icon-button" title="Shopping Cart">
    <i class="fas fa-shopping-bag"></i>
  </a>

  <div class="user-menu">
    <button class="user-menu-button" title="User Menu">
      <i class="fas fa-user-circle"></i>
    </button>
    <div class="user-dropdown">
      <a href="/profile"><i class="fas fa-user icon"></i> My Profile</a>
      <a href="{{ route('courses.enrolled') }}"><i class="fas fa-graduation-cap icon"></i> My Courses</a>
      <a href="/user/dashboard"><i class="fas fa-tachometer-alt icon"></i> Dashboard</a>
      <a href="{{ route('courses.all') }}"><i class="fas fa-book-open icon"></i> Course Catalog</a>
      <a href="/purchase_history"><i class="fas fa-receipt icon"></i> Purchase History</a>
      <div class="separator"></div>
      <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt icon"></i> Logout
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

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Your virtual<br>classroom redefined</h1>
            <p>Elevate your knowledge with interactive learning anytime, anywhere through our online courses.</p>
            <div class="hero-buttons">
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
                        @if($course->image)
                            <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" class="course-image">
                        @else
                            <div class="course-image-placeholder">
                                <div>
                                    <div style="font-size: 1.5rem; margin-bottom: 0.5rem;">EDVANTAGE</div>
                                    <div style="font-size: 0.9rem; opacity: 0.8;">{{ $course->category ?? 'Course' }}</div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="course-content">
                        <div class="course-header">
                            <div class="course-category">
                                {{ $course->category ?? 'Programming' }}
                            </div>
                            <h3 class="course-title">{{ $course->title }}</h3>
                            <p class="course-description">{{ $course->description ?? 'Learn the fundamentals and advance your skills with this comprehensive course.' }}</p>
                        </div>
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
        
        @if(session('cart_added'))
        if (confirm("{{ session('cart_added') }} Go to cart?")) {
            window.location.href = "{{ route('cart.all') }}";
        }
        @endif
    </script>
</body>
</html>
