<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Courses</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // Updated primary colors to match admin_panel
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
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9fafb; /* Consistent background with admin_panel */
        }
    </style>
</head>
<body class="flex min-h-screen">

    <!-- Sidebar - Copied from admin_panel.blade.php -->
    <aside class="w-64 bg-white border-r border-gray-200 flex flex-col">
        <div class="p-6 flex items-center gap-2">
            <img src="/image/Edvantage.png" class="h-10" alt="Edvantage Logo">
            <span class="text-primary font-bold text-xl">Edvantage</span>
        </div>
        <nav class="mt-8 flex-1">
            <a href="/admin_panel/dashboard" class="block py-3 px-6 text-primary hover:bg-primaryLight font-semibold">Dashboard</a>
            <a href="/admin_panel/manage_courses" class="block py-3 px-6 text-primary bg-primaryLight font-semibold">Manage Course</a>
            <a href="/admin_panel/manage_user" class="block py-3 px-6 text-primary hover:bg-primaryLight font-semibold">Manage User</a>
            <a href="/admin_panel/manage_resources" class="block py-3 px-6 text-primary hover:bg-primaryLight font-semibold">Manage Resources</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col">
        <!-- Top bar - Copied from admin_panel.blade.php, adjusted title -->
        <header class="flex justify-between items-center px-8 py-4 bg-white border-b border-gray-200">
            <h1 class="text-2xl font-bold text-primary">Edit Courses</h1>
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

        <section class="p-8 flex-1">
            @auth
            <h2 class="text-center mb-6 text-2xl font-bold text-primary">Edit Courses</h2>

            @if($courses->isEmpty())
                <p class="text-center text-gray-500 italic">No courses available.</p>
            @else
            <div class="table-wrapper bg-white rounded-lg shadow overflow-hidden">
                <table class="min-w-full text-sm text-gray-700">
                    <thead class="text-gray-500 border-b">
                        <tr>
                            <th class="py-3 px-6 text-left">Image</th>
                            <th class="py-3 px-6 text-left">Title</th>
                            <th class="py-3 px-6 text-left">Description</th>
                            <th class="py-3 px-6 text-left">Category</th>
                            <th class="py-3 px-6 text-left">Videos</th>
                            <th class="py-3 px-6 text-left">Video Length</th>
                            <th class="py-3 px-6 text-left">Total Duration</th>
                            <th class="py-3 px-6 text-left">Price (৳)</th>
                            <th class="py-3 px-6 text-left">Added</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr class="border-b last:border-b-0">
                            <td class="py-4 px-6">
                                @if($course->image)
                                    <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" class="w-24 h-16 object-cover rounded-md shadow-sm">
                                @else
                                    <span class="text-gray-400 italic">No image</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 font-medium text-primary">
                                <a href="/admin/manage_courses/courses/{{ $course->id }}/edit" class="text-primary hover:underline">{{ $course->title }}</a>
                            </td>
                            <td class="py-4 px-6">{{ $course->description }}</td>
                            <td class="py-4 px-6">{{ $course->category }}</td>
                            <td class="py-4 px-6">{{ $course->video_count }}</td>
                            <td class="py-4 px-6">{{ $course->approx_video_length }} mins</td>
                            <td class="py-4 px-6">{{ $course->total_duration }} hrs</td>
                            <td class="py-4 px-6 text-green-600 font-bold">{{ $course->price }}</td>
                            <td class="py-4 px-6">{{ $course->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif

            <a class="block text-center mt-8 text-primary hover:underline font-medium" href="/admin_panel/manage_courses">← Back to Manage Courses</a>
            @else
            <p class="text-center text-gray-700">You are not logged in. <a href="/" class="text-primary hover:underline">Go to Login</a></p>
            @endauth
        </section>
    </main>
</body>
</html>
