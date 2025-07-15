<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Students</title>
    
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
                <h1 class="text-2xl font-bold text-primary">All Students</h1>
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
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="bg-editBg p-2 rounded-lg">
                            <i class="fas fa-users text-editText text-lg"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-primary">All Registered Students</h2>
                            <p class="text-gray-600">Complete list of all students in the system</p>
                        </div>
                    </div>
                    <div class="bg-primaryLight px-4 py-2 rounded-lg">
                        <span class="text-primary font-semibold">{{ count($students) }} Students</span>
                    </div>
                </div>
            </div>

            <!-- Search and Filter Bar -->
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <div class="relative">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" 
                                   placeholder="Search students by name, email, or phone..." 
                                   class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                                   id="searchInput">
                        </div>
                    </div>
                    <button class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 flex items-center gap-2">
                        <i class="fas fa-download"></i>
                        Export List
                    </button>
                </div>
            </div>

            <!-- Students Grid -->
            @if($students->isEmpty())
                <div class="bg-white p-12 rounded-lg shadow text-center">
                    <div class="bg-gray-100 p-6 rounded-full w-20 h-20 mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-user-slash text-gray-400 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">No Students Found</h3>
                    <p class="text-gray-500">There are no registered students in the system yet.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="studentsGrid">
                    @foreach($students as $student)
                        <div class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow student-card" 
                             data-name="{{ strtolower($student->name) }}" 
                             data-email="{{ strtolower($student->email) }}" 
                             data-phone="{{ $student->phone }}">
                            <!-- Student Header -->
                            <div class="p-6 border-b border-gray-100">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center text-lg font-semibold">
                                        {{ strtoupper(substr($student->name, 0, 1)) }}
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="font-semibold text-gray-900 text-lg">{{ $student->name }}</h3>
                                        <span class="bg-primaryLight text-primary px-2 py-1 rounded text-xs font-medium">
                                            ID: #{{ $student->id }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Student Details -->
                            <div class="p-6 space-y-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-envelope text-gray-500 text-sm"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-500">Email</p>
                                        <p class="font-medium text-gray-900">{{ $student->email }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-phone text-gray-500 text-sm"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-500">Phone</p>
                                        <p class="font-medium text-gray-900">{{ $student->phone ?? 'Not provided' }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-calendar text-gray-500 text-sm"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-500">Joined</p>
                                        <p class="font-medium text-gray-900">{{ $student->created_at ? $student->created_at->format('M d, Y') : 'Unknown' }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Student Actions -->
                            <div class="px-6 pb-6">
                                <div class="flex gap-2">
                                    <button class="flex-1 bg-viewBg text-viewIcon px-3 py-2 rounded text-sm font-medium hover:bg-green-100 transition-colors flex items-center justify-center gap-1">
                                        <i class="fas fa-eye text-xs"></i>
                                        View Details
                                    </button>
                                    <button class="flex-1 bg-editBg text-editText px-3 py-2 rounded text-sm font-medium hover:bg-blue-100 transition-colors flex items-center justify-center gap-1">
                                        <i class="fas fa-edit text-xs"></i>
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination or Load More (if needed) -->
                <div class="bg-white p-4 rounded-lg shadow text-center">
                    <p class="text-gray-600">Showing {{ count($students) }} students</p>
                </div>
            @endif
        </section>
    </main>

    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const studentCards = document.querySelectorAll('.student-card');
            
            studentCards.forEach(card => {
                const name = card.getAttribute('data-name');
                const email = card.getAttribute('data-email');
                const phone = card.getAttribute('data-phone');
                
                if (name.includes(searchTerm) || email.includes(searchTerm) || phone.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>

</body>
</html>