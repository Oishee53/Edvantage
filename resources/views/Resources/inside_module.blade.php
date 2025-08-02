<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module Resources - Edvantage</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar-item {
            transition: all 0.2s ease;
        }
        .sidebar-item:hover {
            background-color: #f3f4f6;
        }
        .sidebar-item.active {
            background-color: #e2e8f0;
            color: #1e293b;
        }
        .resource-card {
            transition: all 0.2s ease;
        }
        .resource-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50 flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-gray-200 flex flex-col">
        <div class="p-6 flex items-center gap-2">
            <img src="/image/Edvantage.png" class="h-10" alt="Edvantage Logo">
        </div>
        <nav class="mt-8 flex-1">
            <a href="/dashboard" class="block py-3 px-6 text-primary hover:bg-primaryLight font-semibold">Dashboard</a>
            <a href="/courses" class="block py-3 px-6 text-primary bg-primaryLight font-semibold">My Courses</a>
            <a href="/profile" class="block py-3 px-6 text-primary hover:bg-primaryLight font-semibold">Profile</a>
            <a href="/settings" class="block py-3 px-6 text-primary hover:bg-primaryLight font-semibold">Settings</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="bg-slate-800 text-white px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-xl font-semibold">Module Resources</h1>
                    <p class="text-sm text-gray-300 mt-1">Course: {{ $course->name ?? 'Web Development Fundamentals' }}</p>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-sm">Student</span>
                    <a href="/logout" class="bg-slate-700 hover:bg-slate-600 px-3 py-1 rounded text-sm transition-colors">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Logout
                    </a>
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="flex-1 p-6">
            <div class="max-w-4xl mx-auto">
                <!-- Breadcrumb -->
                <nav class="flex mb-6" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="/courses" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                                <i class="fas fa-home mr-2"></i>
                                Courses
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                                <a href="/course/{{ $course->id ?? '1' }}" class="text-sm font-medium text-gray-700 hover:text-blue-600">
                                    {{ $course->name ?? 'Web Development Fundamentals' }}
                                </a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                                <span class="text-sm font-medium text-gray-500">Module {{ $moduleNumber ?? '1' }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <!-- Module Info Card -->
                <div class="bg-white rounded-lg shadow-sm border mb-6">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="p-3 bg-blue-100 rounded-lg">
                                    <i class="fas fa-book-open text-blue-600 text-xl"></i>
                                </div>
                                <div>
                                    <h2 class="text-2xl font-bold text-gray-900">Module {{ $moduleNumber ?? '1' }}</h2>
                                    <p class="text-gray-600">{{ $course->name ?? 'Web Development Fundamentals' }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    Active
                                </span>
                            </div>
                        </div>
                        <p class="text-gray-600">
                            Access your learning materials, resources, and assessments for this module.
                        </p>
                    </div>
                </div>

                <!-- Resources Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    <!-- Quiz Card -->
                    <?php if(isset($quiz) && $quiz): ?>
                    <div class="resource-card bg-white rounded-lg shadow-sm border">
                        <div class="p-6">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="p-2 bg-purple-100 rounded-lg">
                                    <i class="fas fa-question-circle text-purple-600 text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">Module Quiz</h3>
                                    <p class="text-gray-600 text-sm">Test your knowledge</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm mb-4">
                                Complete the quiz to assess your understanding of this module's content.
                            </p>
                            <a href="{{ route('user.quiz.start', ['course' => $course->id ?? '1', 'module' => $moduleNumber ?? '1']) }}" 
                               class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded transition-colors inline-block text-center">
                                <i class="fas fa-play mr-2"></i>
                                Take Quiz
                            </a>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="resource-card bg-white rounded-lg shadow-sm border">
                        <div class="p-6">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="p-2 bg-gray-100 rounded-lg">
                                    <i class="fas fa-question-circle text-gray-400 text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">Module Quiz</h3>
                                    <p class="text-gray-600 text-sm">Not available</p>
                                </div>
                            </div>
                            <p class="text-gray-500 text-sm mb-4">
                                No quiz is currently available for this module.
                            </p>
                            <button disabled class="w-full bg-gray-300 text-gray-500 py-2 px-4 rounded cursor-not-allowed">
                                <i class="fas fa-lock mr-2"></i>
                                Quiz Unavailable
                            </button>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Study Materials Card -->
                    <div class="resource-card bg-white rounded-lg shadow-sm border">
                        <div class="p-6">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="p-2 bg-green-100 rounded-lg">
                                    <i class="fas fa-file-alt text-green-600 text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">Study Materials</h3>
                                    <p class="text-gray-600 text-sm">Reading materials</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm mb-4">
                                Access lecture notes, PDFs, and other study materials for this module.
                            </p>
                            <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded transition-colors">
                                <i class="fas fa-download mr-2"></i>
                                View Materials
                            </button>
                        </div>
                    </div>

                    <!-- Video Lectures Card -->
                    <div class="resource-card bg-white rounded-lg shadow-sm border">
                        <div class="p-6">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="p-2 bg-red-100 rounded-lg">
                                    <i class="fas fa-play-circle text-red-600 text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">Video Lectures</h3>
                                    <p class="text-gray-600 text-sm">Watch and learn</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm mb-4">
                                Watch video lectures and tutorials related to this module's topics.
                            </p>
                            <button class="w-full bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded transition-colors">
                                <i class="fas fa-play mr-2"></i>
                                Watch Videos
                            </button>
                        </div>
                    </div>

                    <!-- Assignments Card -->
                    <div class="resource-card bg-white rounded-lg shadow-sm border">
                        <div class="p-6">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="p-2 bg-orange-100 rounded-lg">
                                    <i class="fas fa-tasks text-orange-600 text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">Assignments</h3>
                                    <p class="text-gray-600 text-sm">Practice exercises</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm mb-4">
                                Complete assignments and practical exercises to reinforce your learning.
                            </p>
                            <button class="w-full bg-orange-600 hover:bg-orange-700 text-white py-2 px-4 rounded transition-colors">
                                <i class="fas fa-edit mr-2"></i>
                                View Assignments
                            </button>
                        </div>
                    </div>

                    <!-- Discussion Forum Card -->
                    <div class="resource-card bg-white rounded-lg shadow-sm border">
                        <div class="p-6">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="p-2 bg-blue-100 rounded-lg">
                                    <i class="fas fa-comments text-blue-600 text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">Discussion Forum</h3>
                                    <p class="text-gray-600 text-sm">Ask questions</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm mb-4">
                                Join discussions, ask questions, and collaborate with other students.
                            </p>
                            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded transition-colors">
                                <i class="fas fa-comment mr-2"></i>
                                Join Discussion
                            </button>
                        </div>
                    </div>

                    <!-- Progress Tracking Card -->
                    <div class="resource-card bg-white rounded-lg shadow-sm border">
                        <div class="p-6">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="p-2 bg-indigo-100 rounded-lg">
                                    <i class="fas fa-chart-line text-indigo-600 text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">Progress Tracking</h3>
                                    <p class="text-gray-600 text-sm">Monitor your progress</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm mb-4">
                                Track your learning progress and see your performance analytics.
                            </p>
                            <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded transition-colors">
                                <i class="fas fa-chart-bar mr-2"></i>
                                View Progress
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Back to Course Button -->
                <div class="flex justify-center">
                    <a href="/course/{{ $course->id ?? '1' }}" class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-6 rounded transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Course
                    </a>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Add some interactive functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Add hover effects for sidebar
            const sidebarItems = document.querySelectorAll('.sidebar-item');
            sidebarItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    if (!this.classList.contains('active')) {
                        this.style.backgroundColor = '#f3f4f6';
                    }
                });
                
                item.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('active')) {
                        this.style.backgroundColor = 'transparent';
                    }
                });
            });

            // Add click animation for resource cards
            const resourceCards = document.querySelectorAll('.resource-card');
            resourceCards.forEach(card => {
                card.addEventListener('click', function(e) {
                    if (e.target.tagName !== 'BUTTON' && e.target.tagName !== 'A') {
                        const button = this.querySelector('button, a');
                        if (button && !button.disabled) {
                            button.click();
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>