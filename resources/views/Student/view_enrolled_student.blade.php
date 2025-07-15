<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enrolled Students</title>
    
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
            <a href="/admin_panel/manage_user" class="block py-3 px-6 text-primary bg-primaryLight font-semibold">Manage User</a>
            <a href="/admin_panel/manage_resources" class="block py-3 px-6 text-primary hover:bg-primaryLight font-semibold">Manage Resources</a>
        </nav>
    </aside>

    <!-- Main content -->
    <main class="flex-1 flex flex-col">
        <!-- Top bar -->
        <header class="flex justify-between items-center px-8 py-4 bg-white border-b border-gray-200">
            <div class="flex items-center gap-4">
                <h1 class="text-2xl font-bold text-primary">Enrolled Students</h1>
                <a href="/admin_panel/manage_user" class="text-sm text-primary hover:underline flex items-center gap-1">
                    <i class="fas fa-arrow-left"></i>
                    Back to User Management
                </a>
            </div>
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
            <!-- Page Header -->
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center gap-3 mb-2">
                    <div class="bg-viewBg p-2 rounded-lg">
                        <i class="fas fa-user-graduate text-viewIcon text-lg"></i>
                    </div>
                    <h2 class="text-xl font-semibold text-primary">Enrolled Students Per Course</h2>
                </div>
                <p class="text-gray-600">View and manage students enrolled in each course</p>
            </div>

            <!-- Course Cards -->
            @foreach($courses as $course)
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow">
                    <!-- Course Header -->
                    <div class="bg-primary text-white p-4 rounded-t-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-semibold">{{ $course->title }}</h3>
                                <div class="flex items-center gap-4 mt-1 text-sm opacity-90">
                                    <span class="flex items-center gap-1">
                                        <i class="fas fa-users"></i>
                                        {{ $course->students->count() }} Students Enrolled
                                    </span>
                                </div>
                            </div>
                            <div class="bg-white bg-opacity-20 px-3 py-1 rounded-full">
                                <span class="text-sm font-medium">{{ $course->students->count() }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Course Content -->
                    <div class="p-6">
                        @if($course->students->isEmpty())
                            <div class="text-center py-8">
                                <div class="bg-gray-100 p-4 rounded-full w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                                    <i class="fas fa-user-slash text-gray-400 text-xl"></i>
                                </div>
                                <p class="text-gray-500 font-medium">No students enrolled in this course</p>
                                <p class="text-gray-400 text-sm mt-1">Students will appear here once they enroll</p>
                            </div>
                        @else
                            <!-- Students Table -->
                            <div class="overflow-x-auto">
                                <table class="min-w-full">
                                    <thead>
                                        <tr class="border-b border-gray-200">
                                            <th class="text-left py-3 px-4 font-semibold text-primary">Student ID</th>
                                            <th class="text-left py-3 px-4 font-semibold text-primary">Name</th>
                                            <th class="text-left py-3 px-4 font-semibold text-primary">Email</th>
                                            <th class="text-left py-3 px-4 font-semibold text-primary">Phone</th>
                                            <th class="text-left py-3 px-4 font-semibold text-primary">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($course->students as $student)
                                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                                <td class="py-3 px-4 text-gray-700">
                                                    <span class="bg-primaryLight text-primary px-2 py-1 rounded text-sm font-medium">
                                                        #{{ $student->id }}
                                                    </span>
                                                </td>
                                                <td class="py-3 px-4">
                                                    <div class="flex items-center gap-3">
                                                        <div class="w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center text-sm font-medium">
                                                            {{ strtoupper(substr($student->name, 0, 1)) }}
                                                        </div>
                                                        <span class="font-medium text-gray-900">{{ $student->name }}</span>
                                                    </div>
                                                </td>
                                                <td class="py-3 px-4 text-gray-700">{{ $student->email }}</td>
                                                <td class="py-3 px-4 text-gray-700">{{ $student->phone }}</td>
                                                <td class="py-3 px-4">
                                                    <form action="/admin_panel/manage_user/unenroll_student/{{$course->id}}/{{$student->id}}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="bg-deleteBg text-deleteIcon px-3 py-1 rounded text-sm font-medium hover:bg-red-100 transition-colors flex items-center gap-1"
                                                                onclick="return confirm('Are you sure you want to unenroll {{ $student->name }} from {{ $course->title }}?')">
                                                            <i class="fas fa-user-minus text-xs"></i>
                                                            Unenroll
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach

            @if($courses->isEmpty())
                <div class="bg-white p-12 rounded-lg shadow text-center">
                    <div class="bg-gray-100 p-6 rounded-full w-20 h-20 mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-book-open text-gray-400 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">No Courses Available</h3>
                    <p class="text-gray-500 mb-4">There are no courses created yet.</p>
                    <a href="/admin_panel/manage_courses" class="bg-primary text-white px-4 py-2 rounded hover:bg-opacity-90 inline-flex items-center gap-2">
                        <i class="fas fa-plus"></i>
                        Create Course
                    </a>
                </div>
            @endif
        </section>
    </main>

</body>
</html>