<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Resources</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    
    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9fafb;
        }
    </style>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0E1B33',
                        primaryLight: '#E3E6F3',
                        editBg: '#EDF2FC',
                        editText: '#0E1B33',
                        viewBg: '#ECFDF5',
                        viewIcon: '#16A34A',
                        deleteBg: '#FEF2F2',
                        deleteIcon: '#DC2626',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    }
                },
            },
        }
    </script>
</head>
<body class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-gray-200 flex flex-col">
        <div class="p-6 flex items-center gap-2">
            <img src="/image/Edvantage.png" class="h-10" alt="Edvantage Logo">
        </div>
        <nav class="mt-8 flex-1">
            <a href="/admin_panel/dashboard" class="block py-3 px-6 text-primary hover:bg-primaryLight font-semibold">Dashboard</a>
            <a href="/admin_panel/manage_courses" class="block py-3 px-6 text-primary hover:bg-primaryLight font-semibold">Manage Course</a>
            <a href="/admin_panel/manage_user" class="block py-3 px-6 text-primary hover:bg-primaryLight font-semibold">Manage User</a>
            <a href="/admin_panel/manage_resources" class="block py-3 px-6 text-primary bg-primaryLight font-semibold">Manage Resources</a>
        </nav>
    </aside>

    <!-- Main content -->
    <main class="flex-1 flex flex-col">
        <!-- Top bar -->
        <header class="flex justify-between items-center px-8 py-4 bg-white border-b border-gray-200">
            <h1 class="text-2xl font-bold text-primary">Manage Resources</h1>
            @auth
                <div class="flex items-center space-x-4">
                    <span class="text-primary font-medium">{{ auth()->user()->name }}</span>
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="bg-primary text-white px-3 py-2 rounded hover:bg-opacity-90">
                            Logout
                        </button>
                    </form>
                </div>
            @else
                <div class="flex gap-2">
                    <a href="/login" class="border border-primary text-primary px-4 py-2 rounded hover:bg-primaryLight">Login</a>
                    <a href="/register" class="bg-primary text-white px-4 py-2 rounded hover:bg-opacity-90">Sign Up</a>
                </div>
            @endauth
        </header>

        <!-- Main Content Area -->
        @auth
        <section class="flex flex-1 flex-col gap-4 p-4 md:gap-8 md:p-6">
            <!-- Page Header -->
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center gap-3 mb-2">
                    <div class="bg-editBg p-2 rounded-lg">
                        <i class="fas fa-folder-open text-editText text-lg"></i>
                    </div>
                    <h2 class="text-xl font-semibold text-primary">Resource Management</h2>
                </div>
                <p class="text-gray-600">Manage and organize learning resources for your courses</p>
            </div>

            <!-- Action Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Add Resources Card -->
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="bg-primary p-4 rounded-lg mr-4">
                                <i class="fas fa-plus text-white text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-primary">Add Resources</h3>
                                <p class="text-gray-600 text-sm">Upload new learning materials and resources</p>
                            </div>
                        </div>
                        
                        <div class="space-y-3 mb-6">
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-check text-primary mr-2"></i>
                                Upload documents, videos, and images
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-check text-primary mr-2"></i>
                                Organize resources by categories
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-check text-primary mr-2"></i>
                                Set access permissions
                            </div>
                        </div>
                        
                        <a href="/admin_panel/manage_resources/add" 
                           class="w-full bg-primary text-white px-4 py-3 rounded-lg hover:bg-opacity-90 transition-colors font-medium flex items-center justify-center gap-2">
                            <i class="fas fa-plus"></i>
                            Add New Resources
                        </a>
                    </div>
                </div>

                <!-- View Resources Card -->
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="bg-viewBg p-4 rounded-lg mr-4">
                                <i class="fas fa-eye text-viewIcon text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-primary">View Resources</h3>
                                <p class="text-gray-600 text-sm">Browse and manage existing resources</p>
                            </div>
                        </div>
                        
                        <div class="space-y-3 mb-6">
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-check text-viewIcon mr-2"></i>
                                View all uploaded resources
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-check text-viewIcon mr-2"></i>
                                Edit and update materials
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-check text-viewIcon mr-2"></i>
                                Delete outdated content
                            </div>
                        </div>
                        
                        <a href="/admin_panel/manage_resources/view" 
                           class="w-full bg-viewBg text-viewIcon px-4 py-3 rounded-lg hover:bg-green-100 transition-colors font-medium flex items-center justify-center gap-2">
                            <i class="fas fa-eye"></i>
                            View All Resources
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-gray-600 text-sm">Total Resources</div>
                            <div class="text-2xl font-bold text-primary">{{ $totalResources ?? 45 }}</div>
                        </div>
                        <div class="bg-primaryLight p-3 rounded-lg">
                            <i class="fas fa-folder text-primary text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-gray-600 text-sm">Documents</div>
                            <div class="text-2xl font-bold text-primary">{{ $totalDocuments ?? 28 }}</div>
                        </div>
                        <div class="bg-editBg p-3 rounded-lg">
                            <i class="fas fa-file-alt text-editText text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-gray-600 text-sm">Videos</div>
                            <div class="text-2xl font-bold text-primary">{{ $totalVideos ?? 12 }}</div>
                        </div>
                        <div class="bg-viewBg p-3 rounded-lg">
                            <i class="fas fa-video text-viewIcon text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-gray-600 text-sm">Images</div>
                            <div class="text-2xl font-bold text-primary">{{ $totalImages ?? 5 }}</div>
                        </div>
                        <div class="bg-deleteBg p-3 rounded-lg">
                            <i class="fas fa-image text-deleteIcon text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Resources -->
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-primary">Recent Resources</h3>
                    <a href="/admin_panel/manage_resources/view" class="text-primary hover:underline text-sm">View All</a>
                </div>
                
                <div class="space-y-3">
                    <div class="flex items-center justify-between py-3 border-b border-gray-100">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-editBg rounded-lg flex items-center justify-center">
                                <i class="fas fa-file-pdf text-editText"></i>
                            </div>
                            <div>
                                <div class="font-medium text-gray-900">React Fundamentals Guide</div>
                                <div class="text-sm text-gray-500">PDF • 2.5 MB • 2 hours ago</div>
                            </div>
                        </div>
                        <span class="text-xs bg-primaryLight text-primary px-2 py-1 rounded-full">New</span>
                    </div>
                    
                    <div class="flex items-center justify-between py-3 border-b border-gray-100">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-viewBg rounded-lg flex items-center justify-center">
                                <i class="fas fa-video text-viewIcon"></i>
                            </div>
                            <div>
                                <div class="font-medium text-gray-900">Laravel Tutorial Series</div>
                                <div class="text-sm text-gray-500">Video • 45 min • 1 day ago</div>
                            </div>
                        </div>
                        <span class="text-xs bg-viewBg text-viewIcon px-2 py-1 rounded-full">Updated</span>
                    </div>
                    
                    <div class="flex items-center justify-between py-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-deleteBg rounded-lg flex items-center justify-center">
                                <i class="fas fa-image text-deleteIcon"></i>
                            </div>
                            <div>
                                <div class="font-medium text-gray-900">Database Schema Diagram</div>
                                <div class="text-sm text-gray-500">Image • 1.2 MB • 3 days ago</div>
                            </div>
                        </div>
                        <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">Archived</span>
                    </div>
                </div>
            </div>
        </section>
        @else
        <section class="flex flex-1 items-center justify-center">
            <div class="bg-white p-8 rounded-lg shadow text-center">
                <div class="bg-deleteBg p-4 rounded-full w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-lock text-deleteIcon text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Access Denied</h3>
                <p class="text-gray-600 mb-4">You are not logged in. Please log in to access resource management.</p>
                <a href="/" class="bg-primary text-white px-4 py-2 rounded hover:bg-opacity-90 inline-flex items-center gap-2">
                    <i class="fas fa-sign-in-alt"></i>
                    Go to Login
                </a>
            </div>
        </section>
        @endauth
    </main>

</body>
</html>