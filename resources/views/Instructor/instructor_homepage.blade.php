<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet" />
  <style>
    /* Custom CSS Variables */
    :root {
      --primary-color:  #0E1B33;
      --primary-light-hover-bg:#2D336B; 
      --body-background: #f9fafb;
      --card-background: #ffffff;
      --text-default: #333;
      --text-gray-600: #4b5563; /* Equivalent to Tailwind's gray-600 */
      --text-gray-700: #374151; /* Equivalent to Tailwind's gray-700 */
      --text-gray-500: #6b7280; /* Equivalent to Tailwind's gray-500 */
      --border-color: #e5e7eb; /* Equivalent to Tailwind's gray-200 */
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
      width: 16rem; /* w-64 */
      background-color: var(--card-background);
      min-height: 100vh;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); /* shadow-md */
    }

    .sidebar-header {
      padding: 1.5rem; /* p-6 */
      display: flex;
      align-items: center;
      gap: 0.5rem; /* gap-2 */
      color: var(--primary-color);
      font-weight: 700; /* font-bold */
      font-size: 1.25rem; /* text-xl */
    }

    .sidebar-header img {
      height: 2.5rem; /* h-10 */
    }

    .sidebar-nav {
      margin-top: 2.5rem; /* mt-10 */
    }

    .sidebar-nav a {
      display: block;
      padding: 0.75rem 1.5rem; /* py-3 px-6 */
      color: var(--primary-color);
      font-weight: 500; /* font-medium */
      text-decoration: none;
      transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
    }

    .sidebar-nav a:hover {
      background-color: var(--primary-light-hover-bg); /* Changed hover background */
      color: var(--card-background); /* Text color on hover */
    }

    /* Main content */
    .main-content {
      flex: 1; /* flex-1 */
      padding: 2rem; /* p-8 */
    }

    /* Top bar */
    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem; /* mb-8 */
    }

    .top-bar-title {
      font-size: 1.5rem; /* text-2xl */
      font-weight: 400; /* font-semibold */
      color: var(--primary-color);
    }

    .user-info {
      display: flex;
      align-items: center;
      gap: 1rem; /* space-x-4 */
    }

    .user-info span {
      color: var(--primary-color);
      font-weight: 500; /* font-medium */
    }

    .logout-button {
      background-color: var(--primary-color);
      color: white;
      padding: 0.5rem 0.75rem; /* px-3 py-2 */
      border-radius: 0.25rem; /* rounded */
      border: none;
      cursor: pointer;
      transition: opacity 0.2s ease-in-out;
    }

    .logout-button:hover {
      opacity: 0.9; /* hover:bg-opacity-90 */
    }
    }
  </style>
  <!-- Chart.js CDN -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="flex">
  <!-- Sidebar -->
  <aside class="sidebar">
    <div class="sidebar-header">
      <img src="/image/Edvantage.png" class="h-10" alt="Edvantage Logo">
    </div>
    <nav class="sidebar-nav">
      <a href="/instructor_homepage">Dashboard</a>
      <a href="/instructor/manage_courses">Manage Course</a>
      <a href="/instructor/manage_user">Manage User</a>
      <a href="/instructor/manage_resources">Manage Resources</a>
    </nav>
  </aside>

  <!-- Main content -->
  <main class="main-content">
    <!-- Top bar -->
    <div class="top-bar">
      <div class="top-bar-title">Dashboard</div>
      @auth
      @foreach (auth()->user()->unreadNotifications as $notification)
        <div>
            <strong>New Question:</strong> {{ $notification->data['content'] }}
            <a href="{{ route('instructor.notifications.view', $notification->id) }}">View</a>
        </div>
      @endforeach
        <div class="user-info">
          <span class="text-primary font-medium">{{ auth()->user()->name }}</span>
          <form action="/logout" method="POST">
            @csrf
            <button class="logout-button">
              Logout
            </button>
          </form>
        </div>
      @endauth
    </div>
</body>
</html>