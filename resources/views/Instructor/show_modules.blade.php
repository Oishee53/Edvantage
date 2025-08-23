<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Modules - {{ $course->title }}</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet" />
    <style>
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
            --delete-icon: #DC2626;
            --green-600: #059669;
            --success-color: #059669;
            --warning-color: #f59e0b;
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

        .sidebar-nav a:hover,
        .sidebar-nav a.active {
            background-color: #E3E6F3;
            color: var(--primary-color);
        }

        /* Main Wrapper */
        .main-wrapper {
            margin-left: 16rem;
            flex: 1;
        }

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

        .logout-button {
            background-color: var(--primary-color);
            color: white;
            padding: 0.5rem 0.75rem;
            border-radius: 0.25rem;
            border: none;
            cursor: pointer;
            font-weight: 500;
        }

        .logout-button:hover {
            opacity: 0.9;
        }

        .main-content {
            padding: 2rem;
        }

        /* Course Header */
        .course-header {
            background-color: var(--card-background);
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .course-header h2 {
            color: var(--primary-color);
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .course-title {
            color: var(--text-gray-600);
            font-size: 1.1rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            background: var(--edit-bg);
            border-radius: 4px;
            margin: 1rem 0;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: var(--success-color);
            border-radius: 4px;
            transition: width 0.3s ease;
        }

        .progress-text {
            font-size: 0.9rem;
            color: var(--text-gray-600);
            margin-top: 0.5rem;
        }

        /* Modules */
        .modules-section {
            background-color: var(--card-background);
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .modules-section-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-color);
            background-color: var(--edit-bg);
        }

        .modules-section-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-color);
            margin: 0;
        }

        .modules-list {
            display: flex;
            flex-direction: column;
        }

        .module-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-color);
            transition: background-color 0.2s ease-in-out;
        }

        .module-item:last-child {
            border-bottom: none;
        }

        .module-item:hover {
            background-color: var(--body-background);
        }

        .module-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .module-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .upload-status {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .status-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
        }

        .status-uploaded {
            background-color: var(--success-color);
            color: white;
        }

        .status-pending {
            background-color: var(--warning-color);
            color: white;
        }

        .module-link {
            display: inline-block;
            background-color: var(--primary-color);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease-in-out;
        }

        .module-link:hover {
            background-color: var(--primary-light-hover-bg);
            transform: translateY(-1px);
        }

        /* Actions */
        .actions-section {
            background-color: var(--card-background);
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            text-align: center;
            margin-bottom: 2rem;
        }

        .submit-btn {
            background-color: var(--success-color);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 0.375rem;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .submit-btn:hover:not(:disabled) {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        .submit-btn:disabled {
            background-color: var(--text-gray-500);
            cursor: not-allowed;
            opacity: 0.6;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            border: 2px solid var(--primary-color);
            border-radius: 0.375rem;
            transition: all 0.2s ease-in-out;
            margin-top: 1rem;
        }

        .back-link:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-1px);
        }

        .not-logged-in {
            text-align: center;
            color: var(--text-gray-700);
            padding: 2rem;
        }
    </style>
</head>
<body>
    @auth
        <aside class="sidebar">
            <div class="sidebar-header">
                <img src="/image/Edvantage.png" alt="Edvantage Logo">
            </div>
            <nav class="sidebar-nav">
                @if(auth()->user()->role === 2)
                    <a href="/admin_panel">Dashboard</a>
                    <a href="/admin_panel/manage_courses">Manage Courses</a>
                    <a href="/admin_panel/manage_user">Manage Users</a>
                    <a href="/admin_panel/manage_resources" class="active">Manage Resources</a>
                @elseif(auth()->user()->role === 3)
                    <a href="/instructor_homepage">Dashboard</a>
                    <a href="/instructor/manage_courses">Manage Courses</a>
                    <a href="/instructor/manage_user">Manage Users</a>
                    <a href="/instructor/manage_resources" class="active">Manage Resources</a>
                @endif
            </nav>
        </aside>

        <div class="main-wrapper">
            <header class="top-bar">
                <h1 class="top-bar-title">Course Modules</h1>
                <div class="user-info">
                    <span>{{ auth()->user()->name }}</span>
                    <form action="/logout" method="POST" style="display: inline;">
                        @csrf
                        <button class="logout-button">Logout</button>
                    </form>
                </div>
            </header>

            <section class="main-content">
                <div class="course-header">
                    <h2>Course Modules</h2>
                    <div class="course-title">{{ $course->title }}</div>
                    
                    @php
                        $uploadedCount = collect($modules)->where('uploaded', true)->count();
                        $totalModules = count($modules);
                        $progressPercentage = $totalModules > 0 ? ($uploadedCount / $totalModules) * 100 : 0;
                    @endphp
                    
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: {{ $progressPercentage }}%"></div>
                    </div>
                    <div class="progress-text">
                        {{ $uploadedCount }} of {{ $totalModules }} modules completed
                    </div>
                </div>

                <div class="modules-section">
                    <div class="modules-section-header">
                        <h3 class="modules-section-title">Module List</h3>
                    </div>
                    <div class="modules-list">
                        @foreach ($modules as $module)
                            @php
                                $route = route('module.instructor.create', [
                                    'course' => $course->id,
                                    'module' => $module['id']
                                ]);
                            @endphp

                          <div class="module-item">
                            <div class="module-info">
                                <div class="module-title">Module {{ $module['id'] }}</div>
                                <div class="upload-status">
                                    @if($module['uploaded'])
                                        <div class="status-icon status-uploaded">✓</div>
                                        <div class="status-text">Uploaded</div>
                                    @else
                                        <div class="status-icon status-pending">!</div>
                                        <div class="status-text">Pending</div>
                                    @endif
                                </div>
                            </div>

                            <a href="/instructor/manage_resources/{{ $course->id }}/modules/{{ $module['id'] }}/edit" class="module-link">
                                @if($module['uploaded'])
                                    Edit Module
                                @else
                                    Upload Resources
                                @endif
                            </a>
                        </div>

                        @endforeach
                    </div>
                </div>
                <div class="actions-section">
                    @if($allUploaded)
                        <a href="{{ $alreadySubmitted ? '#' : route('instructor.manage_resources', ['course' => $course->id]) }}" 
                        class="submit-btn" 
                        id="submit-review-btn">
                            Submit For Review
                        </a>
                    @else
                        <button class="submit-btn" disabled>
                            Submit For Review (Upload all modules first)
                        </button>
                    @endif
                </div>
            </section>
        </div>
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            const submitBtn = document.getElementById('submit-review-btn');
            
            @if($alreadySubmitted)
                submitBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    alert('This course has already been submitted for review!');
                });
            @endif
        });
</script>

    @else
        <div style="width: 100%; display: flex; align-items: center; justify-content: center; min-height: 100vh;">
            <p class="not-logged-in">You are not logged in. <a href="/" class="login-link">Go to Login</a></p>
        </div>
    @endauth
</body>
</html>
