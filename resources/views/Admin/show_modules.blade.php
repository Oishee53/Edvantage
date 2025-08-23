<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Course Review - {{ $course->title ?? 'Course Title' }}</title>
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
      --success-bg: #F0FDF4;
      --success-color: #059669;
      --danger-bg: #FEF2F2;
      --danger-color: #DC2626;
      --warning-bg: #FFFBEB;
      --warning-color: #D97706;
    }

    body {
      font-family: 'Montserrat', sans-serif;
      background-color: var(--body-background);
      margin: 0;
      display: flex;
      min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
      width: 16rem;
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

    /* Main Content Wrapper */
    .main-wrapper {
      margin-left: 15rem;
      flex: 1;
    }

    /* Top bar */
    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 2rem;
      background-color: var(--card-background);
      border-bottom: 1px solid var(--border-color);
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
      transition: opacity 0.2s ease-in-out;
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
      background-color: var(--primary-light-hover-bg);
      color: var(--primary-color);
    }

    .auth-buttons {
      display: flex;
      gap: 0.5rem;
    }

    /* Main Content */
    .main-content {
      padding: 2rem;
    }

    /* Course Info Card */
    .course-info-card {
      background-color: var(--card-background);
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      padding: 2rem;
      margin-bottom: 2rem;
    }

    .course-title {
      font-size: 1.75rem;
      font-weight: 600;
      color: var(--primary-color);
      margin-bottom: 1rem;
    }

    .course-status {
      display: inline-block;
      padding: 0.25rem 0.75rem;
      border-radius: 9999px;
      font-size: 0.875rem;
      font-weight: 500;
      background-color: var(--warning-bg);
      color: var(--warning-color);
    }

    /* Modules Section */
    .modules-section {
      background-color: var(--card-background);
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      padding: 2rem;
      margin-bottom: 2rem;
    }

    .modules-title {
      font-size: 1.25rem;
      font-weight: 600;
      color: var(--primary-color);
      margin-bottom: 1.5rem;
    }

    .modules-list {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      margin-bottom: 1.5rem;
    }

    .module-card {
      background-color: var(--body-background);
      border: 1px solid var(--border-color);
      border-radius: 0.5rem;
      padding: 1.5rem;
      transition: all 0.2s ease-in-out;
      text-decoration: none;
      color: inherit;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .module-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      text-decoration: none;
      color: inherit;
    }

    .module-number {
      font-size: 1.125rem;
      font-weight: 600;
      color: var(--primary-color);
      margin-bottom: 0.5rem;
    }

    .module-description {
      font-size: 0.875rem;
      color: var(--text-gray-600);
    }

    /* Action Buttons Section */
    .actions-section {
      background-color: var(--card-background);
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      padding: 2rem;
      margin-bottom: 2rem;
    }

    .actions-title {
      font-size: 1.25rem;
      font-weight: 600;
      color: var(--primary-color);
      margin-bottom: 1.5rem;
    }

    .actions-buttons {
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
    }

    .btn-approve {
      background-color: var(--success-color);
      color: white;
      border: none;
      padding: 0.75rem 1.5rem;
      border-radius: 0.25rem;
      font-weight: 500;
      cursor: pointer;
      transition: opacity 0.2s ease-in-out;
      font-family: 'Montserrat', sans-serif;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .btn-approve:hover {
      opacity: 0.9;
    }

    .btn-reject {
      background-color: var(--danger-color);
      color: white;
      border: none;
      padding: 0.75rem 1.5rem;
      border-radius: 0.25rem;
      font-weight: 500;
      cursor: pointer;
      transition: opacity 0.2s ease-in-out;
      font-family: 'Montserrat', sans-serif;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .btn-reject:hover {
      opacity: 0.9;
    }

    /* Back Navigation */
    .back-navigation {
      background-color: var(--card-background);
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      padding: 1.5rem;
    }

    .back-link {
      color: var(--primary-color);
      text-decoration: none;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      transition: color 0.2s ease-in-out;
    }

    .back-link:hover {
      color: var(--text-gray-700);
    }

    .back-arrow {
      font-size: 1.25rem;
    }

    .not-logged-in {
      text-align: center;
      color: var(--text-gray-700);
    }

    .login-link {
      color: var(--primary-color);
      text-decoration: none;
      transition: text-decoration 0.2s ease-in-out;
    }

    .login-link:hover {
      text-decoration: underline;
    }

    /* Empty State */
    .empty-state {
      text-align: center;
      padding: 3rem;
      color: var(--text-gray-500);
    }

    .empty-state-icon {
      font-size: 3rem;
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <aside class="sidebar">
    <div class="sidebar-header">
      <img src="/image/Edvantage.png" alt="Edvantage Logo">
      <span></span>
    </div>
    <nav class="sidebar-nav">
      <a href="/admin_panel">Dashboard</a>
      <a href="/admin_panel/manage_courses">Manage Course</a>
      <a href="/admin_panel/manage_user">Manage User</a>
      <a href="/admin_panel/manage_resources">Manage Resources</a>
      <a href="/pending-courses" class="active">Manage Pending Courses</a>
    </nav>
  </aside>

  <!-- Main Content Wrapper -->
  <div class="main-wrapper">
    <!-- Top bar -->
    <header class="top-bar">
      <h1 class="top-bar-title">Course Review</h1>
      @auth
        <div class="user-info">
          <span>{{ auth()->user()->name }}</span>
          <form action="/logout" method="POST">
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
    </header>

    <!-- Main Content -->
    <section class="main-content">
      @auth
        <!-- Course Information Card -->
        <div class="course-info-card">
          <h2 class="course-title">{{ $course->title ?? 'Sample Course Title' }}</h2>
          <span class="course-status">Pending Review</span>
          <div style="margin-top: 1rem; color: var(--text-gray-600);">
            <p><strong>Instructor:</strong> {{ $course->instructor->name ?? 'John Doe' }}</p>
            <p><strong>Category:</strong> {{ $course->category ?? 'Programming' }}</p>
            <p><strong>Price:</strong> ${{ number_format($course->price ?? 99.99, 2) }}</p>
          </div>
        </div>

        <!-- Modules Section -->
        <div class="modules-section">
          <h3 class="modules-title">Course Modules</h3>
          
          @if(isset($modules) && count($modules) > 0)
            <div class="modules-list">
              @foreach ($modules as $index)
                <a href="##" class="module-card">
                  <div>
                    <div class="module-number">Module {{ $index }}</div>
                    <div class="module-description">Click to view module content and materials</div>
                  </div>
                  <div style="color: var(--text-gray-500);">→</div>
                </a>
              @endforeach
            </div>
          @else
            <div class="empty-state">
              <div class="empty-state-icon">📚</div>
              <p>No modules found for this course</p>
            </div>
          @endif
        </div>

        <!-- Action Buttons Section -->
        <div class="actions-section">
          <h3 class="actions-title">Course Review Actions</h3>
          <div class="actions-buttons">
            <form action="{{ route('admin.courses.approve', $course->id ?? 1) }}" method="POST" style="display:inline;">
              @csrf
              <button type="submit" class="btn-approve">
                ✓ Approve Course
              </button>
            </form>

            <form action="{{ route('admin.courses.reject', $course->id ?? 1) }}" method="POST" style="display:inline;">
              @csrf
              <button type="submit" class="btn-reject">
                ✗ Reject Course
              </button>
            </form>
          </div>
        </div>

        <!-- Back Navigation -->
        <div class="back-navigation">
          <a href="/instructor_homepage" class="back-link">
            <span class="back-arrow">←</span>
            Back to Home Page
          </a>
        </div>

      @else
        <p class="not-logged-in">You are not logged in. <a href="/" class="login-link">Go to Login</a></p>
      @endauth
    </section>
  </div>

</body>
</html>
