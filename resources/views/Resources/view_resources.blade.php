<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Courses - Edvantage</title>
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
        .table-row {
            transition: all 0.2s ease;
        }
        .table-row:hover {
            background-color: #f8fafc;
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50 flex">
    @auth
    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-gray-200 flex flex-col">
        <div class="p-6 flex items-center gap-2">
            <img src="/image/Edvantage.png" class="h-10" alt="Edvantage Logo">
        </div>
        <nav class="mt-8 flex-1">
            <a href="/admin_panel" class="block py-3 px-6 text-primary hover:bg-primaryLight font-semibold">Dashboard</a>
            <a href="/admin_panel/manage_courses" class="block py-3 px-6 text-primary hover:bg-primaryLight font-semibold">Manage Course</a>
            <a href="/admin_panel/manage_user" class="block py-3 px-6 text-primary hover:bg-primaryLight font-semibold">Manage User</a>
            <a href="/admin_panel/manage_resources" class="block py-3 px-6 text-primary bg-primaryLight font-semibold">Manage Resources</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="bg-slate-800 text-white px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-xl font-semibold">Manage Resources</h1>
                    <p class="text-sm text-gray-300 mt-1">View and manage all course resources</p>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-sm">Admin</span>
                    <a href="/admin_panel/logout" class="bg-slate-700 hover:bg-slate-600 px-3 py-1 rounded text-sm transition-colors">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Logout
                    </a>
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="flex-1 p-6">
            <div class="max-w-7xl mx-auto">
                <!-- Page Header -->
                <div class="mb-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">Course Resources</h2>
                            <p class="text-gray-600 mt-1">Manage and view all available courses</p>
                        </div>
                        <div class="flex space-x-3">
                            <a href="/admin_panel/manage_resources/add" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors">
                                <i class="fas fa-plus mr-2"></i>
                                Add New Course
                            </a>
                        </div>
                    </div>
                </div>

                @if($courses->isEmpty())
                <!-- Empty State -->
                <div class="bg-white rounded-lg shadow-sm border">
                    <div class="p-12 text-center">
                        <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-book-open text-gray-400 text-3xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">No courses available</h3>
                        <p class="text-gray-600 mb-6">Get started by creating your first course.</p>
                        <a href="/admin_panel/manage_resources/add" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition-colors inline-flex items-center">
                            <i class="fas fa-plus mr-2"></i>
                            Add New Course
                        </a>
                    </div>
                </div>
                @else
                <!-- Courses Table -->
                <div class="bg-white rounded-lg shadow-sm border overflow-hidden">
                    <!-- Table Header -->
                    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-900">All Courses</h3>
                            <div class="flex items-center space-x-3">
                                <div class="relative">
                                    <input type="text" id="searchInput" placeholder="Search courses..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Table Content -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Videos</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Video Length</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Duration</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price (৳)</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Added</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200" id="courseTableBody">
                                @foreach($courses as $course)
                                <tr class="table-row">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-lg bg-blue-100 flex items-center justify-center">
                                                    <i class="fas fa-book text-blue-600"></i>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="/admin_panel/manage_resources/{{ $course->id }}/view" class="hover:text-blue-600 transition-colors">
                                                        {{ $course->title }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900 max-w-xs">
                                            <p class="truncate">{{ $course->description }}</p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <i class="fas fa-play-circle text-red-500 mr-2"></i>
                                            <span class="text-sm text-gray-900">{{ $course->video_count }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <i class="fas fa-clock text-orange-500 mr-2"></i>
                                            <span class="text-sm text-gray-900">{{ $course->approx_video_length }} mins</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <i class="fas fa-hourglass-half text-purple-500 mr-2"></i>
                                            <span class="text-sm text-gray-900">{{ $course->total_duration }} hrs</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <i class="fas fa-tag text-green-500 mr-2"></i>
                                            <span class="text-sm font-medium text-gray-900">{{ $course->price }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">{{ $course->created_at->format('Y-m-d') }}</div>
                                        <div class="text-xs text-gray-500">{{ $course->created_at->format('H:i') }}</div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif

                <!-- Back Button -->
                <div class="mt-6">
                    <a href="/admin_panel" class="inline-flex items-center text-gray-600 hover:text-gray-800 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Home Page
                    </a>
                </div>
            </div>
        </main>
    </div>

    @else
    <!-- Not Authenticated -->
    <div class="min-h-screen flex items-center justify-center bg-gray-50">
        <div class="max-w-md w-full bg-white rounded-lg shadow-md p-8">
            <div class="text-center">
                <div class="mx-auto w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-lock text-red-600 text-2xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Access Denied</h2>
                <p class="text-gray-600 mb-6">You are not logged in. Please log in to access this page.</p>
                <a href="/" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded transition-colors inline-block text-center">
                    Go to Login
                </a>
            </div>
        </div>
    </div>
    @endauth

    <script>
        // Add interactive functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar hover effects
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

            // Search functionality
            const searchInput = document.getElementById('searchInput');
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const tableRows = document.querySelectorAll('#courseTableBody tr');
                    
                    tableRows.forEach(row => {
                        const title = row.cells[0].textContent.toLowerCase();
                        const description = row.cells[1].textContent.toLowerCase();
                        
                        if (title.includes(searchTerm) || description.includes(searchTerm)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                });
            }
        });
    </script>
</body>
</html>