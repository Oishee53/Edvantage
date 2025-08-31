<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Rejected Courses</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet" />
  <style>
    /* Custom CSS Variables */
    :root {
      --primary-color: #0E1B33;
      --primary-light-hover-bg: #E3E6F3;
      --body-background: #f9fafb;
      --card-background: #ffffff;
      --text-default: #333;
      --text-gray-600: #4b5563;
      --text-gray-700: #374151;
      --text-gray-500: #6b7280;
      --border-color: #e5e7eb;
      --edit-bg: #EDF2FC;
      --edit-text: #0E1B33;
      --delete-bg: #FEF2F2;
      --delete-icon: #DC2626;
      --green-600: #059669;
      --success-color: #059669;
      --warning-color: #f59e0b;
      --rejected-color: #DC2626;
      --rejected-bg: #FEF2F2;
    }

    body {
      font-family: 'Montserrat', sans-serif;
      background-color: var(--body-background);
      margin: 0;
      display: flex;
      min-height: 100vh;
      overflow-x: hidden;
    }

    /* Sidebar - Matching Dashboard Style */
    .sidebar {
      width: 17.5rem;
      background-color: var(--card-background);
      min-height: 100vh;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      position: fixed;
      left: 0;
      top: 0;
    }

    .sidebar-header {
      padding: 1.5rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      color: var(--primary-color);
      font-weight: 700;
      font-size: 1.25rem;
    }

    .sidebar-header img {
      height: 2.5rem;
    }

    .sidebar-nav {
      margin-top: 2.5rem;
      display: flex;
      flex-direction: column;
    }

    .sidebar-nav a {
      display: block;
      padding: 0.75rem 1.5rem;
      color: var(--primary-color);
      font-weight: 500;
      text-decoration: none;
      transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
    }

    .sidebar-nav a:hover {
      background-color: var(--primary-light-hover-bg);
      color: var(--primary-color);
    }

    .sidebar-nav a.active {
      background-color: var(--primary-light-hover-bg);
      color: var(--primary-color);
    }

    /* Main Content Wrapper - Matching Dashboard Style */
    .main-wrapper {
      margin-left: 17.5rem;
      flex: 1;
      max-width: calc(100vw - 17.5rem);
      overflow-x: hidden;
    }

    .main-content {
      flex: 1;
      padding: 2rem;
      max-width: 100%;
      box-sizing: border-box;
    }

    /* Top bar - Matching Dashboard Style */
    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
      flex-wrap: wrap;
      gap: 1rem;
    }

    .top-bar-title {
      font-size: 1.5rem;
      font-weight: 400;
      color: var(--primary-color);
    }

    .user-info {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .user-info span {
      color: var(--primary-color);
      font-weight: 500;
    }

    .logout-button, .login-button, .signup-button {
      padding: 0.5rem 0.75rem;
      border-radius: 0.25rem;
      border: none;
      cursor: pointer;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.2s ease-in-out;
    }

    .logout-button, .signup-button {
      background-color: var(--primary-color);
      color: white;
    }

    .logout-button:hover, .signup-button:hover {
      opacity: 0.9;
    }

    .login-button {
      border: 1px solid var(--primary-color);
      color: var(--primary-color);
      background-color: transparent;
    }

    .login-button:hover {
      background-color: var(--primary-color);
      color: white;
    }

    .auth-buttons {
      display: flex;
      gap: 0.5rem;
    }

    /* Section Headers */
    .section-header {
      font-size: 1.25rem;
      font-weight: 600;
      color: var(--primary-color);
      margin: 2rem 0 1rem 0;
      padding-left: 0.5rem;
      border-left: 4px solid var(--primary-color);
    }

    .section-header:first-of-type {
      margin-top: 1rem;
    }

    /* Course Cards */
    .course-card {
      background-color: var(--card-background);
      border-radius: 0.75rem;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      overflow: hidden;
      margin-bottom: 1.5rem;
      transition: all 0.2s ease-in-out;
      border-left: 4px solid var(--rejected-color);
    }

    .course-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    .course-card-body {
      padding: 1.5rem;
    }

    .course-title {
      font-size: 1.125rem;
      font-weight: 600;
      color: var(--primary-color);
      margin: 0 0 0.75rem 0;
    }

    .course-description {
      color: var(--text-gray-700);
      line-height: 1.5;
      margin-bottom: 1rem;
    }

    /* Rejection Reason Section */
    .rejection-section {
      background-color: var(--rejected-bg);
      border-radius: 0.5rem;
      padding: 1rem;
      margin-top: 1rem;
      border: 1px solid #fecaca;
    }

    .rejection-header {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      margin-bottom: 0.75rem;
    }

    .rejection-title {
      font-weight: 600;
      color: var(--rejected-color);
      font-size: 0.9rem;
    }

    .rejection-icon {
      width: 1rem;
      height: 1rem;
      color: var(--rejected-color);
    }

    .rejection-message {
      color: var(--rejected-color);
      line-height: 1.5;
      font-size: 0.875rem;
    }

    /* No courses message */
    .no-courses {
      text-align: center;
      color: var(--text-gray-500);
      font-style: italic;
      padding: 3rem 2rem;
      background-color: var(--card-background);
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      margin-bottom: 2rem;
    }

    /* Not logged in state */
    .not-logged-in-container {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      background-color: var(--body-background);
    }

    .not-logged-in {
      text-align: center;
      color: var(--text-gray-700);
      padding: 2rem;
      background-color: var(--card-background);
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .login-link {
      color: var(--primary-color);
      text-decoration: none;
      transition: text-decoration 0.2s ease-in-out;
      font-weight: 500;
    }

    .login-link:hover {
      text-decoration: underline;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
      .sidebar {
        width: 16rem;
      }
      
      .main-wrapper {
        margin-left: 16rem;
        max-width: calc(100vw - 16rem);
      }
    }

    @media (max-width: 768px) {
      .sidebar {
        display: none;
      }
      
      .main-wrapper {
        margin-left: 0;
        max-width: 100vw;
      }
      
      .main-content {
        padding: 1rem;
      }

      .top-bar {
        flex-direction: column;
        align-items: stretch;
      }

      .user-info {
        justify-content: space-between;
      }
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
      <img src="/image/Edvantage.png" alt="Edvantage Logo">
    </div>
    <nav class="sidebar-nav">
      <a href="/instructor_homepage">Dashboard</a>
      <a href="/instructor/manage_courses">Manage Courses</a>
      <a href="/instructor/rejected_courses" class="active">Rejected Courses</a>
    </nav>
  </aside>

  <!-- Main Content Wrapper -->
  <div class="main-wrapper">
    <!-- Main Content -->
    <main class="main-content">
      <!-- Top bar -->
      <div class="top-bar">
        <div class="top-bar-title">Rejected Courses</div>
        @auth
          <div class="user-info">
            <span>{{ auth()->user()->name }}</span>
            <form action="/logout" method="POST" style="display: inline;">
              @csrf
              <button class="logout-button">Logout</button>
            </form>
          </div>
        @else
          <div class="auth-buttons">
            <a href="/login" class="login-button">Login</a>
            <a href="/register" class="signup-button">Sign Up</a>
          </div>
        @endauth
      </div>

      @auth
      <!-- Rejected Courses Section -->
      <p class="section-header">Rejected Courses</p>
      
      @if(isset($rejectedCourses) && $rejectedCourses->isEmpty())
          <div class="no-courses">No rejected courses found.</div>
      @else
          @foreach($rejectedCourses as $course)
          <div class="course-card">
              <div class="course-card-body">
                  <h4 class="course-title">{{ $course->title }}</h4>
                  <p class="course-description">{{ $course->description }}</p>
                  
                  <div class="rejection-section">
                      <div class="rejection-header">
                          <svg class="rejection-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                              <circle cx="12" cy="12" r="10"/>
                              <line x1="15" y1="9" x2="9" y2="15"/>
                              <line x1="9" y1="9" x2="15" y2="15"/>
                          </svg>
                          <span class="rejection-title">Rejection Reason:</span>
                      </div>
                      <div class="rejection-message">
                          {{ $course->rejection_message }}
                      </div>
                  </div>
              </div>
          </div>
          @endforeach
      @endif

      @else
      <div class="not-logged-in-container">
        <div class="not-logged-in">
          <p>You are not logged in. <a href="/" class="login-link">Go to Login</a></p>
        </div>
      </div>
      @endauth
    </main>
  </div>
</body>
</html>