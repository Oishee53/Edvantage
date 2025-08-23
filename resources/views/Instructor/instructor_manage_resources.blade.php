<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manage Modules</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet" />
  <style>
    /* Custom CSS Variables */
    :root {
      --primary-color: #0E1B33;
      --primary-light-hover-bg: #2D336B;
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
      background-color: #E3E6F3;
      color: var(--primary-color);
    }

    .sidebar-nav a.active {
      background-color: #E3E6F3;
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
      color: white;
    }

    .auth-buttons {
      display: flex;
      gap: 0.5rem;
    }

    /* Main Content */
    .main-content {
      padding: 2rem;
    }

    /* Action Buttons Section */
    .action-buttons-section {
      display: flex;
      gap: 1rem;
      margin-bottom: 2rem;
    }

    .add-module-button, .view-modules-button {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.75rem 1.5rem;
      border-radius: 0.375rem;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.2s ease-in-out;
      cursor: pointer;
      border: none;
    }

    .add-module-button {
      background-color: var(--primary-color);
      color: white;
    }

    .add-module-button:hover {
      background-color: var(--primary-light-hover-bg);
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(14, 27, 51, 0.3);
    }

    .view-modules-button {
      border: 2px solid var(--primary-color);
      color: var(--primary-color);
      background-color: transparent;
    }

    .view-modules-button:hover {
      background-color: var(--primary-color);
      color: white;
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(14, 27, 51, 0.2);
    }

    /* Module Stats Cards */
    .stats-section {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 1.5rem;
      margin-bottom: 2rem;
    }

    .stat-card {
      background-color: var(--card-background);
      padding: 1.5rem;
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      border-left: 4px solid var(--primary-color);
    }

    .stat-card h3 {
      margin: 0 0 0.5rem 0;
      color: var(--text-gray-500);
      font-size: 0.875rem;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    .stat-card .stat-number {
      font-size: 2rem;
      font-weight: 700;
      color: var(--primary-color);
      margin: 0;
    }

    /* Recent Activity Section */
    .recent-activity {
      background-color: var(--card-background);
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      overflow: hidden;
    }

    .section-header {
      font-size: 1.125rem;
      font-weight: 600;
      color: var(--primary-color);
      margin: 0 0 1.5rem 0;
      padding: 1.5rem 1.5rem 0 1.5rem;
    }

    .activity-list {
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .activity-item {
      padding: 1rem 1.5rem;
      border-bottom: 1px solid var(--border-color);
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .activity-item:last-child {
      border-bottom: none;
    }

    .activity-icon {
      width: 2.5rem;
      height: 2.5rem;
      border-radius: 50%;
      background-color: var(--edit-bg);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--primary-color);
    }

    .activity-content {
      flex: 1;
    }

    .activity-title {
      font-weight: 500;
      color: var(--text-gray-700);
      margin: 0 0 0.25rem 0;
    }

    .activity-time {
      font-size: 0.875rem;
      color: var(--text-gray-500);
      margin: 0;
    }

    /* Welcome Message */
    .welcome-message {
      background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light-hover-bg) 100%);
      color: white;
      padding: 2rem;
      border-radius: 0.5rem;
      margin-bottom: 2rem;
      text-align: center;
    }

    .welcome-message h2 {
      margin: 0 0 0.5rem 0;
      font-size: 1.5rem;
      font-weight: 600;
    }

    .welcome-message p {
      margin: 0;
      opacity: 0.9;
    }

    .not-logged-in {
      text-align: center;
      color: var(--text-gray-700);
      padding: 2rem;
    }

    .login-link {
      color: var(--primary-color);
      text-decoration: none;
      transition: text-decoration 0.2s ease-in-out;
    }

    .login-link:hover {
      text-decoration: underline;
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
      <a href="/instructor_homepage">Dashboard</a>
      <a href="/instructor/manage_courses">Manage Course</a>
      <a href="/instructor/manage_user">Manage User</a>
      <a href="/instructor/manage_resources" class="active">Manage Resources</a>
    </nav>
  </aside>

  <!-- Main Content Wrapper -->
  <div class="main-wrapper">
    <!-- Top bar -->
    <header class="top-bar">
      <h1 class="top-bar-title">Module Management</h1>
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
        <!-- Action Buttons -->
        <div class="action-buttons-section">
          <a href="/instructor/manage_resources/add" class="add-module-button">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            Add New Module
          </a>
          <a href="/manage_resources/view" class="view-modules-button">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            View All Modules
          </a>
        </div>

        <!-- Module Statistics -->
        <div class="stats-section">
          <div class="stat-card">
            <h3>Total Modules</h3>
            <p class="stat-number">{{ $totalModules ?? '0' }}</p>
          </div>
          <div class="stat-card">
            <h3>Active Modules</h3>
            <p class="stat-number">{{ $activeModules ?? '0' }}</p>
          </div>
          <div class="stat-card">
            <h3>Draft Modules</h3>
            <p class="stat-number">{{ $draftModules ?? '0' }}</p>
          </div>
        </div>

      @else
        <p class="not-logged-in">You are not logged in. <a href="/" class="login-link">Go to Login</a></p>
      @endauth
    </section>
  </div>

</body>
</html>
