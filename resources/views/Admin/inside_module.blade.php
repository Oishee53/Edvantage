<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ $moduleName }} - {{ $course->title }}</title>
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
            --success-bg: #4CAF50;
            --warning-bg: #FFF3CD;
            --warning-color: #856404;
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
            position: fixed;
            top: 0;
            left: 0;
            width: 17.5rem;
            height: 100vh;
            background-color: var(--card-background);
            border-right: 1px solid var(--border-color);
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.25rem;
            border-bottom: 1px solid var(--border-color);
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
            margin-left: 17.5rem;
            flex: 1;
            width: calc(100% - 17.5rem);
        }

        .main-content {
            flex: 1;
            padding: 2rem;
            max-width: 100%;
        }

        /* Top bar */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
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
            padding: 0.5rem 0.75rem;
            border-radius: 0.25rem;
            border: none;
            cursor: pointer;
            text-decoration: none;
            font-weight: 500;
            transition: opacity 0.2s ease-in-out;
            background-color: var(--primary-color);
            color: white;
        }

        .logout-button:hover {
            opacity: 0.9;
        }

        /* Course Info Section */
        .course-info {
            background-color: var(--card-background);
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .course-info h2 {
            color: var(--primary-color);
            font-size: 1.75rem;
            font-weight: 600;
            margin: 0 0 0.5rem 0;
        }

        .module-info {
            color: var(--text-gray-600);
            font-size: 1.125rem;
            margin: 0;
        }

        /* Lectures Section */
        .lectures-section {
            background-color: var(--card-background);
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .lectures-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .lecture-card {
            background-color: var(--body-background);
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: all 0.2s ease-in-out;
        }

        .lecture-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .lecture-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .lecture-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--primary-color);
            margin: 0;
        }

        .lecture-number {
            background-color: var(--primary-color);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .lecture-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-top: 1rem;
        }

        .content-item {
            padding: 1rem;
            border: 1px solid var(--border-color);
            border-radius: 0.375rem;
            background-color: var(--card-background);
        }

        .content-label {
            font-weight: 600;
            color: var(--text-gray-700);
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            border: none;
            cursor: pointer;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease-in-out;
            font-size: 0.875rem;
            font-family: 'Montserrat', sans-serif;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: #1a2645;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(14, 27, 51, 0.2);
        }

        .btn-outline {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            background-color: transparent;
        }

        .btn-outline:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(14, 27, 51, 0.2);
        }

        .btn-success {
            background-color: var(--green-600);
            color: white;
        }

        .btn-success:hover {
            background-color: #047857;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(5, 150, 105, 0.2);
        }

        /* Video Player Container */
        .video-container {
            margin-top: 1rem;
            display: none;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        #mux-player {
            width: 100%;
            max-width: 720px;
            border-radius: 0.5rem;
        }

        /* Quiz Section */
        .quiz-section {
            background-color: var(--card-background);
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .quiz-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .quiz-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-color);
            margin: 0;
        }

        .quiz-info {
            color: var(--text-gray-600);
            font-style: italic;
            margin: 0;
        }

        .quiz-details {
            background-color: var(--body-background);
            border: 1px solid var(--border-color);
            border-radius: 0.375rem;
            padding: 1.5rem;
            margin-bottom: 1rem;
        }

        .quiz-meta {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .meta-item {
            font-size: 0.875rem;
        }

        .meta-label {
            font-weight: 600;
            color: var(--text-gray-700);
        }

        .meta-value {
            color: var(--text-gray-600);
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

        /* Back Link */
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
            font-size: 0.875rem;
        }

        .back-link:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(14, 27, 51, 0.2);
        }

        /* Icons */
        .icon {
            width: 20px;
            height: 20px;
        }

        /* Alert Messages */
        .alert {
            background-color: var(--warning-bg);
            color: var(--warning-color);
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            font-weight: 500;
            border: 1px solid #F59E0B20;
        }

        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 1001;
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem;
            border-radius: 0.375rem;
            cursor: pointer;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .sidebar {
                width: 16rem;
            }
            
            .main-wrapper {
                margin-left: 16rem;
                width: calc(100% - 16rem);
            }
        }

        @media (max-width: 768px) {
            .mobile-menu-toggle {
                display: block;
            }

            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
            }
            
            .sidebar.open {
                transform: translateX(0);
            }

            .main-wrapper {
                margin-left: 0;
                width: 100%;
            }
            
            .main-content {
                padding: 1rem;
                padding-top: 4rem; /* Account for mobile menu button */
            }

            .lecture-content {
                grid-template-columns: 1fr;
            }

            .quiz-meta {
                grid-template-columns: 1fr;
            }

            .top-bar {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .top-bar-title {
                font-size: 1.25rem;
            }
        }

        @media (max-width: 480px) {
            .main-content {
                padding: 0.5rem;
                padding-top: 4rem;
            }

            .course-info,
            .lectures-section,
            .quiz-section {
                padding: 1rem;
            }

            .lecture-card {
                padding: 1rem;
            }

            .lecture-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
        }

        /* Overlay for mobile menu */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        @media (max-width: 768px) {
            .sidebar-overlay.open {
                display: block;
            }
        }
    </style>
</head>
<body>
    @auth
        <!-- Mobile Menu Toggle -->
        <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">
            <svg class="icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </button>

        <!-- Sidebar Overlay -->
        <div class="sidebar-overlay" onclick="closeMobileMenu()"></div>

        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <img src="/image/Edvantage.png" alt="Edvantage Logo">
                <span></span>
            </div>
            <aside class="sidebar">
    <div class="sidebar-header">
      <img src="/image/Edvantage.png" alt="Edvantage Logo">
      <span></span>
    </div>
    <nav class="sidebar-nav">
      @if($user->role ==2)
        <a href="/admin_panel">Dashboard</a>
          @if($course->status==='pending')
        <a href="/admin_panel/manage_courses">Manage Course</a>
          @else
        <a href="/admin_panel/manage_courses" class='active'>Manage Course</a>
          @endif
        <a href="/admin_panel/manage_user">Manage User</a>
          @if($course->status==='pending')
        <a href="/pending-courses" class="active">Manage Pending Courses ({{ $pendingCoursesCount ?? 0 }})</a>
          @else
        <a href="/pending-courses" >Manage Pending Courses ({{ $pendingCoursesCount ?? 0 }})</a>
          @endif
      @else
      <a href="/instructor_homepage">Dashboard</a>
      <a href="/instructor/manage_courses" class='active'>Manage Course</a>
      @endif
    </nav>
  </aside>

        </aside>

        <!-- Main Content Wrapper -->
        <div class="main-wrapper">
            <!-- Main Content -->
            <main class="main-content">
                <!-- Top bar -->
                <div class="top-bar">
                    @if($course->status=='pending' && $user->role==2)
                    <div class="top-bar-title">Module Content Review</div>
                    @else
                    <div class="top-bar-title">Module Content Overview</div>
                    @endif
                    <div class="user-info">
                        <span>{{ auth()->user()->name }}</span>
                        <form action="/logout" method="POST" style="display: inline;">
                            @csrf
                            <button class="logout-button">Logout</button>
                        </form>
                    </div>
                </div>

                <!-- Alert Message -->
                @if(session('error'))
                    <div class="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Course Information -->
                <div class="course-info">
                    <h2>{{ $course->title }}</h2>
                    <p class="module-info">{{ $moduleName }} (Module {{ $moduleNumber }})</p>
                </div>

                <!-- Lectures Section -->
                <div class="lectures-section">
                    <h3 class="lectures-title">
                        <svg class="icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        Module Lectures
                    </h3>

                    @if($resources && count($resources) > 0)
                        @foreach($resources as $index => $resource)
                            <div class="lecture-card">
                                <div class="lecture-header">
                                    <h4 class="lecture-title">{{ $resource->lectureName }}</h4>
                                    <span class="lecture-number">Lecture {{ $resource->lectureNumber }}</span>
                                </div>
                                
                                <div class="lecture-content">
                                    <!-- Video Content -->
                                    <div class="content-item">
                                        <div class="content-label">
                                            <svg class="icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <polygon points="23 7 16 12 23 17 23 7"></polygon>
                                                <rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect>
                                            </svg>
                                            Video Content
                                        </div>
                                        @if($resource->videos)
                                            <button class="btn btn-primary" onclick="toggleVideo('video{{ $resource->lectureNumber }}')">
                                                <svg class="icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <polygon points="5 3 19 12 5 21 5 3"></polygon>
                                                </svg>
                                                Play Video
                                            </button>
                                            <div id="video{{ $resource->lectureNumber }}" class="video-container">
                                                <mux-player 
                                                    id="mux-player-{{ $resource->lectureNumber }}" 
                                                    playback-id="{{ $resource->videos }}" 
                                                    stream-type="on-demand" 
                                                    controls 
                                                    style="width: 100%; max-width: 720px;">
                                                </mux-player>
                                            </div>
                                        @else
                                            <p style="color: var(--text-gray-500); font-size: 0.875rem; margin: 0;">No video available</p>
                                        @endif
                                    </div>

                                    <!-- PDF Content -->
                                    <div class="content-item">
                                        <div class="content-label">
                                            <svg class="icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                <polyline points="14,2 14,8 20,8"></polyline>
                                            </svg>
                                            Course Materials
                                        </div>
                                        @if($resource->pdf)
                                            <a href="{{ $resource->pdf }}" target="_blank" class="btn btn-outline">
                                                <svg class="icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>
                                                View PDF
                                            </a>
                                        @else
                                            <p style="color: var(--text-gray-500); font-size: 0.875rem; margin: 0;">No PDF available</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="empty-state">
                            <div class="empty-state-icon">📚</div>
                            <p>No lectures found for this module</p>
                        </div>
                    @endif
                </div>

                <!-- Module Quiz Section -->
                <div class="quiz-section">
                    <div class="quiz-header">
                        <svg class="icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="quiz-title">Module Assessment</h3>
                    </div>

                    @if($quiz)
                        <div class="quiz-details">
                            <div class="quiz-meta">
                                <div class="meta-item">
                                    <span class="meta-label">Title:</span>
                                    <span class="meta-value">{{ $quiz->title }}</span>
                                </div>
                                <div class="meta-item">
                                    <span class="meta-label">Questions:</span>
                                    <span class="meta-value">{{ $questions->count() }} Questions</span>
                                </div>
                                <div class="meta-item">
                                    <span class="meta-label">Total Marks:</span>
                                    <span class="meta-value">{{ $quiz->total_marks }} Points</span>
                                </div>
                                <div class="meta-item">
                                    <span class="meta-label">Description:</span>
                                    <span class="meta-value">{{ $quiz->description ?: 'No description provided' }}</span>
                                </div>
                            </div>

                            <a href="/admin/quiz/{{ $quiz->id }}/review" class="btn btn-success">
                                <svg class="icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                </svg>
                                Review Quiz Questions ({{ $questions->count() }})
                            </a>
                        </div>
                    @else
                        <div class="quiz-details">
                            <p class="quiz-info">No quiz available for this module.</p>
                        </div>
                    @endif
                </div>

                <!-- Back Link -->
                <a href="javascript:history.back()" class="back-link">
                    Back
                </a>
            </main>
        </div>

    @else
        <!-- Not logged in state -->
        <div style="width: 100%; display: flex; align-items: center; justify-content: center; min-height: 100vh; background-color: var(--body-background);">
            <div style="text-align: center; color: var(--text-gray-700); padding: 2rem; background-color: var(--card-background); border-radius: 0.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);">
                <p>You are not logged in. <a href="/" style="color: var(--primary-color); text-decoration: none; font-weight: 500;">Go to Login</a></p>
            </div>
        </div>
    @endauth

    <!-- Mux Player Script -->
    <script src="https://cdn.jsdelivr.net/npm/@mux/mux-player"></script>
    <script>
        function toggleVideo(videoId) {
            const videoContainer = document.getElementById(videoId);
            const isVisible = videoContainer.style.display !== 'none';
            
            // Hide all other videos first
            document.querySelectorAll('.video-container').forEach(container => {
                container.style.display = 'none';
            });
            
            // Toggle the selected video
            if (!isVisible) {
                videoContainer.style.display = 'block';
            }
        }

        // Mobile menu functionality
        function toggleMobileMenu() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.querySelector('.sidebar-overlay');
            
            sidebar.classList.toggle('open');
            overlay.classList.toggle('open');
        }

        function closeMobileMenu() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.querySelector('.sidebar-overlay');
            
            sidebar.classList.remove('open');
            overlay.classList.remove('open');
        }

        // Video progress tracking
        document.addEventListener('DOMContentLoaded', function() {
            const players = document.querySelectorAll('mux-player');
            
            players.forEach((player, index) => {
                if (!player) return;

                let lastSavedProgress = 0;

                player.addEventListener('timeupdate', async function() {
                    const progressPercent = (player.currentTime / player.duration) * 100;
                    
                    if (progressPercent - lastSavedProgress >= 10) {
                        lastSavedProgress = progressPercent;
                        
                        // Save progress to your backend
                        try {
                            await fetch('/api/video-progress', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                                },
                                body: JSON.stringify({
                                    course_id: {{ $course->id }},
                                    module_id: {{ $moduleNumber }},
                                    lecture_number: player.id.split('-').pop(),
                                    progress_percent: progressPercent
                                })
                            });
                        } catch (error) {
                            console.log('Progress save failed:', error);
                        }
                    }
                });

                player.addEventListener('ended', async function() {
                    console.log(`Lecture ${player.id} completed`);
                    // Handle video completion
                });
            });
        });
    </script>
</body>
</html>