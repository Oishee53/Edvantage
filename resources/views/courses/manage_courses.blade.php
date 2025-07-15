<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manage Courses</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
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
        }
      }
    }
  </script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f9fafb;
    }
  </style>
</head>
<body class="flex min-h-screen">

  <!-- Sidebar - Consistent with admin_panel and course_list -->
  <aside class="w-64 bg-white border-r border-gray-200 flex flex-col">
    <div class="p-6 flex items-center gap-2">
      <img src="/image/Edvantage.png" class="h-10" alt="Edvantage Logo">
      <span class="text-primary font-bold text-xl">Edvantage</span>
    </div>
    <nav class="mt-8 flex-1">
      <a href="/admin_panel" class="block py-3 px-6 text-primary hover:bg-primaryLight font-semibold">
        Dashboard
      </a>
      <a href="/admin_panel/manage_courses" class="block py-3 px-6 text-primary bg-primaryLight font-semibold">
        Manage Course
      </a>
      <a href="/admin_panel/manage_user" class="block py-3 px-6 text-primary hover:bg-primaryLight font-semibold">
        Manage User
      </a>
      <a href="/admin_panel/manage_resources" class="block py-3 px-6 text-primary hover:bg-primaryLight font-semibold">
        Manage Resources
      </a>
    </nav>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 flex flex-col">
    <!-- Top bar - Consistent with admin_panel and course_list, adjusted title -->
    <header class="flex justify-between items-center px-8 py-4 bg-white border-b border-gray-200">
      <h1 class="text-2xl font-bold text-primary">Course Management</h1>
      <div class="flex items-center gap-4">
        <form action="/admin_panel/manage_courses/add" method="GET">
          <button type="submit" class="flex items-center gap-2 border border-primary text-primary px-4 py-2 rounded hover:bg-primaryLight">
            <span></span> Add Course
          </button>
        </form>
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
      </div>
    </header>

    <section class="p-8 flex-1">
      @auth
      <h2 class="text-center mb-6 text-2xl font-bold text-primary">Manage Courses</h2>

      <div class="flex gap-4 mb-8">
        <input type="text" placeholder="Search courses..." class="flex-1 border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary" />
        <button class="border border-gray-300 px-4 py-2 rounded hover:bg-gray-100 flex items-center gap-2">
          <span>🔍</span> Filter
        </button>
      </div>

      @if(isset($courses) && $courses->isEmpty())
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
                      <th class="py-3 px-6 text-left">Actions</th>
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
                      <td class="py-4 px-6">
                        <div class="flex gap-2">
                          <!-- Edit Button -->
                          <form action="/admin/manage_courses/courses/{{ $course->id }}/edit" method="GET">
                            <button type="submit" class="flex items-center gap-2 bg-editBg text-editText px-3 py-1 rounded-lg font-medium hover:bg-blue-100 text-xs">
                              <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 11l5-5m-5 5v5h5m-5-5H4m5 0L4 20l5-5"/>
                              </svg>
                              Edit
                            </button>
                          </form>

                          <!-- Delete Button -->
                          <form action="/admin_panel/manage_courses/delete-course/{{ $course->id }}" method="POST">
                            @csrf
                            @method('DELETE') {{-- Use DELETE method for deletion --}}
                            <button type="submit" class="flex items-center justify-center bg-deleteBg text-deleteIcon w-7 h-7 rounded-lg hover:bg-red-100" onclick="return confirm('Are you sure you want to delete this course?');">
                              <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-3h4a1 1 0 011 1v1H9V5a1 1 0 011-1z" />
                              </svg>
                            </button>
                          </form>
                        </div>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
      @endif
      @else
      <p class="text-center text-gray-700">You are not logged in. <a href="/" class="text-primary hover:underline">Go to Login</a></p>
      @endauth
    </section>
  </main>
</body>
</html>
