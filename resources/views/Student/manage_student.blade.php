<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Management</title>
    
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
            <a href="/admin_pane" class="block py-3 px-6 text-primary hover:bg-primaryLight font-semibold">Dashboard</a>
            <a href="/admin_panel/manage_courses" class="block py-3 px-6 text-primary hover:bg-primaryLight font-semibold">Manage Course</a>
            <a href="/admin_panel/manage_user" class="block py-3 px-6 text-primary bg-primaryLight font-semibold">Manage User</a>
            <a href="#" class="block py-3 px-6 text-primary hover:bg-primaryLight font-semibold">Manage Resources</a>
        </nav>
    </aside>

    <!-- Main content -->
    <main class="flex-1 flex flex-col">
        <!-- Top bar -->
        <header class="flex justify-between items-center px-8 py-4 bg-white border-b border-gray-200">
            <h1 class="text-2xl font-bold text-primary">User Management</h1>
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
        <section class="flex flex-1 flex-col gap-4 p-4 md:gap-8 md:p-6">
            <!-- Page Title and Description -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-primary mb-2">Student Management</h2>
                <p class="text-gray-600">Manage and view student information and enrollments</p>
            </div>

            <!-- Action Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- View Enrolled Students Card -->
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition-shadow">
                    <div class="flex items-center mb-4">
                        <div class="bg-viewBg p-3 rounded-lg mr-4">
                            <i class="fas fa-user-graduate text-viewIcon text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-primary">Enrolled Students</h3>
                            <p class="text-gray-600 text-sm">View students who are enrolled in courses</p>
                        </div>
                    </div>
                    <form action="/admin_panel/manage_user/view_enrolled_student" method="GET">
                        <button type="submit" class="w-full bg-primary text-white px-4 py-3 rounded-lg hover:bg-opacity-90 transition-colors font-medium flex items-center justify-center gap-2">
                            <i class="fas fa-eye"></i>
                            View Enrolled Students
                        </button>
                    </form>
                </div>

                <!-- View All Students Card -->
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition-shadow">
                    <div class="flex items-center mb-4">
                        <div class="bg-editBg p-3 rounded-lg mr-4">
                            <i class="fas fa-users text-editText text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-primary">All Students</h3>
                            <p class="text-gray-600 text-sm">View complete list of all registered students</p>
                        </div>
                    </div>
                    <form action="/admin_panel/manage_user/view_all_student" method="GET">
                        <button type="submit" class="w-full bg-primary text-white px-4 py-3 rounded-lg hover:bg-opacity-90 transition-colors font-medium flex items-center justify-center gap-2">
                            <i class="fas fa-list"></i>
                            View All Students
                        </button>
                    </form>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-gray-600 text-sm">Total Students</div>
                            <div class="text-2xl font-bold text-primary">{{ $totalStudents ?? 156 }}</div>
                        </div>
                        <div class="bg-primaryLight p-3 rounded-lg">
                            <i class="fas fa-users text-primary text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-gray-600 text-sm">Enrolled Students</div>
                            <div class="text-2xl font-bold text-primary">{{ $enrolledStudents ?? 89 }}</div>
                        </div>
                        <div class="bg-viewBg p-3 rounded-lg">
                            <i class="fas fa-user-graduate text-viewIcon text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-gray-600 text-sm">New This Month</div>
                            <div class="text-2xl font-bold text-primary">{{ $newStudents ?? 12 }}</div>
                        </div>
                        <div class="bg-editBg p-3 rounded-lg">
                            <i class="fas fa-user-plus text-editText text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</body>
</html>