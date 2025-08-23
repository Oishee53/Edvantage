<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Instructor Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Updated font weights to match dashboard exactly (400, 600, 700) -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <style>
        /* Updated CSS variables to match dashboard exactly */
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
        }
        
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        /* Updated body to use flex layout like dashboard */
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--body-background);
            margin: 0;
            display: flex;
            min-height: 100vh;
        }

        /* Updated sidebar to match dashboard exactly - removed fixed positioning */
        .sidebar {
            width: 17.5rem;
            background-color: var(--card-background);
            min-height: 100vh;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
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

        /* Updated sidebar nav spacing to match dashboard */
        .sidebar-nav {
            margin-top: 2.5rem;
        }

        .sidebar-nav a {
            display: block;
            padding: 0.75rem 1.5rem;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
        }

        .sidebar-nav a:hover {
            background-color: var(--primary-light-hover-bg);
            color: #0E1B33;
        }

        .sidebar-nav a.active {
            background-color: var(--primary-light-hover-bg);
            color: #0E1B33;
            font-weight: 600;
        }

        /* Updated main content to use flex-1 like dashboard, removed margin-left */
        .main-content {
            flex: 1;
            padding: 2rem;
            display: flex;
            flex-direction: column;
        }

        /* Updated top header to match dashboard top-bar styling */
        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .top-header h1 {
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

        /* Added notification icon and badge styling */
        .notification-container {
            position: relative;
            display: flex;
            align-items: center;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.375rem;
            transition: background-color 0.2s ease-in-out;
        }

        .notification-container:hover {
            background-color: var(--primary-light-hover-bg);
        }

        .notification-icon {
            font-size: 1.25rem;
            color: var(--primary-color);
        }

        .notification-badge {
            position: absolute;
            top: -2px;
            right: -2px;
            background: linear-gradient(135deg, #10B981, #34D399);
            color: white;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.125rem 0.375rem;
            border-radius: 9999px;
            min-width: 1.25rem;
            height: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 4px rgba(16, 185, 129, 0.3);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.8;
                transform: scale(1.05);
            }
        }

        /* Added notification dropdown styling */
        .notification-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            background: var(--card-background);
            border-radius: 0.5rem;
            box-shadow: 0 10px 25px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            width: 320px;
            max-height: 400px;
            overflow-y: auto;
            z-index: 1000;
            border: 1px solid var(--border-color);
            display: none;
        }

        .notification-dropdown.show {
            display: block;
        }

        .notification-header {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .notification-header h3 {
            font-size: 1rem;
            font-weight: 600;
            color: var(--primary-color);
            margin: 0;
        }

        .mark-all-read {
            font-size: 0.75rem;
            color: var(--text-gray-500);
            cursor: pointer;
            text-decoration: none;
        }

        .mark-all-read:hover {
            color: var(--primary-color);
        }

        .notification-item {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid #f3f4f6;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
        }

        .notification-item:hover {
            background-color: #f9fafb;
        }

        .notification-item:last-child {
            border-bottom: none;
        }

        .notification-item.unread {
            background-color: #f0f9ff;
            border-left: 3px solid #10B981;
        }

        .notification-content {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .notification-icon-wrapper {
            width: 2rem;
            height: 2rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            flex-shrink: 0;
        }

        .notification-icon-wrapper.course {
            background-color: #dbeafe;
            color: #1d4ed8;
        }

        .notification-icon-wrapper.user {
            background-color: #dcfce7;
            color: #16a34a;
        }

        .notification-icon-wrapper.system {
            background-color: #fef3c7;
            color: #d97706;
        }

        .notification-text {
            flex: 1;
        }

        .notification-title {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-default);
            margin-bottom: 0.25rem;
        }

        .notification-time {
            font-size: 0.75rem;
            color: var(--text-gray-500);
        }

        .no-notifications {
            padding: 2rem 1rem;
            text-align: center;
            color: var(--text-gray-500);
            font-size: 0.875rem;
        }

        .logout-btn {
            background-color: var(--primary-color);
            color: white;
            padding: 0.5rem 0.75rem;
            border-radius: 0.25rem;
            border: none;
            cursor: pointer;
            transition: opacity 0.2s ease-in-out;
        }

        .logout-btn:hover {
            opacity: 0.9;
        }
          .student {
          display: inline-block;
          padding: 8px 16px;
          background-color: #f9fafb;;
          color: #0E1B33;
          text-decoration: none;
          border-radius: 6px;
          transition: background-color 0.3s ease;
        }

        /* Form Content */
        .content-area {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .form-card {
            background: var(--card-background);
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 1.5rem;
            min-width: 400px;
            max-width: 520px;
            width: 100%;
            font-size: 0.9rem;
        }

        .form-card h2 {
            font-size: 1.125rem;
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            justify-content: center;
        }

        .form-group {
            margin-bottom: 18px;
        }
       

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .required {
            color: #DC2626;
            font-size: 1em;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea,
        select {
            width: 100%;
            padding: 8px 10px;
            border-radius: 8px;
            border: 1.5px solid #E3E6F3;
            background: #f8fafc;
            font-size: 0.85rem;
            color: var(--text-default);
            font-family: inherit;
            transition: border 0.18s, box-shadow 0.18s;
            box-shadow: 0 1.5px 8px rgba(14, 27, 51, 0.03);
        }

        input[type="file"] {
            background: var(--card-background);
            font-size: 0.85rem;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border: 1.5px solid #0E1B33;
            outline: 2px solid #0E1B33;
            background: var(--card-background);
            box-shadow: 0 0 0 2px rgba(14, 27, 51, 0.07);
        }

        textarea {
            min-height: 56px;
            resize: vertical;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px 0;
            font-size: 0.9rem;
            background: var(--primary-color);
            color: #fff;
            font-weight: 700;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(14, 27, 51, 0.07);
            transition: background 0.2s, transform 0.18s;
            margin-top: 10px;
            letter-spacing: 0.2px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        button[type="submit"]:hover,
        button[type="submit"]:focus {
            background: #0A1426;
            transform: translateY(-1px) scale(1.01);
        }

        .back-link {
            display: inline-block;
            margin-top: 14px;
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            text-align: center;
            transition: color 0.18s;
        }

        .back-link:hover {
            color: #0A1426;
            text-decoration: underline;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                min-height: auto;
                order: 2;
                transform: translateY(100%);
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                z-index: 1000;
                transition: transform 0.3s;
            }
            
            .sidebar.open {
                transform: translateY(0);
            }
            
            .main-content {
                order: 1;
                padding: 1rem;
            }
            
            .mobile-menu-btn {
                display: block;
                background: none;
                border: none;
                font-size: 1.2rem;
                color: var(--primary-color);
                cursor: pointer;
            }
            
            .form-card {
                padding: 1rem;
                min-width: 0;
                max-width: 98vw;
                font-size: 0.85rem;
            }
            
            .form-card h2 { font-size: 1rem; }
            label, input, select, textarea, .back-link { font-size: 0.8rem; }
            button[type="submit"] { font-size: 0.85rem; }
            
            .top-header {
                padding: 0;
                margin-bottom: 1rem;
            }
        }

        .mobile-menu-btn {
            display: none;
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
            @if(auth()->user() && auth()->user()->role === 2)
                <a href="/admin_panel">Dashboard</a>
                <a href="/admin_panel/manage_courses">Manage Courses</a>
                <a href="/admin_panel/manage_courses" class="active">Manage Courses</a>
                <a href="/admin_panel/manage_user">Manage User</a>
                <a href="/admin_panel/manage_resources">Manage Resources</a>
            @elseif(auth()->user() && auth()->user()->role === 3)
                <a href="/instructor_homepage">Dashboard</a>
                <a href="/instructor/manage_courses">Manage Course</a>
                <a href="/instructor/manage_user">Manage User</a>
                <a href="/instructor/manage_resources">Manage Resources</a>
            @endif
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Top Header -->
        <header class="top-header">
            <div style="display: flex; align-items: center; gap: 16px;">
                <button class="mobile-menu-btn" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Instructor Dashboard</h1>
            </div>
            @auth
                <div class="user-info">
                  <a href="/homepage" class="student">Student</a>
                    <!-- Made notification container clickable with dropdown -->
                    <div class="notification-container" onclick="toggleNotifications()" title="Notifications">
                        <i class="fas fa-bell notification-icon"></i>
                        @if(auth()->user()->unreadNotifications->count() > 0)
                            <span class="notification-badge" id="notificationCount">{{ auth()->user()->unreadNotifications->count() }}</span>
                        @endif
                        
                        <!-- Added notification dropdown -->
                        <div class="notification-dropdown" id="notificationDropdown">
                            <div class="notification-header">
                                <h3>Notifications</h3>
                                @if(auth()->user()->unreadNotifications->count() > 0)
                                    <a href="#" class="mark-all-read" onclick="markAllAsRead(event)">Mark all as read</a>
                                @endif
                            </div>
                            <div id="notificationList">
                                @forelse(auth()->user()->unreadNotifications as $notification)
                                    <div class="notification-item unread">
                                        <div class="notification-content">
                                            <div class="notification-icon-wrapper course">
                                                <i class="fas fa-question-circle"></i>
                                            </div>
                                            <div class="notification-text">
                                                <div class="notification-title">
                                                    <strong>New Question:</strong> {{ $notification->data['content'] }}
                                                </div>
                                                <div class="notification-time">{{ $notification->created_at->diffForHumans() }}</div>
                                                <a href="{{ route('instructor.notifications.view', $notification->id) }}" style="font-size: 0.75rem; color: var(--primary-color); text-decoration: none;">View</a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="no-notifications">
                                        <i class="fas fa-bell-slash" style="font-size: 2rem; color: var(--text-gray-500); margin-bottom: 0.5rem;"></i>
                                        <p>No new notifications</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <span>{{ auth()->user()->name }}</span>
                    <form action="/logout" method="POST" style="margin: 0;">
                        @csrf
                        <button class="logout-btn">Logout</button>
                    </form>
                </div>
            @else
                <div style="display: flex; gap: 8px;">
                    <a href="/login" style="border: 1px solid var(--primary-color); color: var(--primary-color); padding: 8px 16px; border-radius: 4px; text-decoration: none;">Login</a>
                    <a href="/register" style="background: var(--primary-color); color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none;">Sign Up</a>
                </div>
            @endauth
        </header>
    </main>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('open');
        }

        function toggleNotifications() {
            const dropdown = document.getElementById('notificationDropdown');
            dropdown.classList.toggle('show');
        }

        function markAllAsRead(event) {
            event.preventDefault();
            event.stopPropagation();
            
            // This would typically make an AJAX call to mark notifications as read
            // For now, just hide the badge visually
            const badge = document.getElementById('notificationCount');
            if (badge) {
                badge.style.display = 'none';
            }
            
            const notificationItems = document.querySelectorAll('.notification-item.unread');
            notificationItems.forEach(item => {
                item.classList.remove('unread');
            });
        }

        // Close notification dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const notificationContainer = document.querySelector('.notification-container');
            const dropdown = document.getElementById('notificationDropdown');
            
            if (!notificationContainer.contains(event.target)) {
                dropdown.classList.remove('show');
            }
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const menuBtn = document.querySelector('.mobile-menu-btn');
            
            if (window.innerWidth <= 768 && 
                !sidebar.contains(event.target) && 
                !menuBtn.contains(event.target)) {
                sidebar.classList.remove('open');
            }
        });
    </script>
</body>
</html>
