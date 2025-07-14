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

  <!-- Sidebar -->
  <aside class="w-64 bg-white border-r border-gray-200 flex flex-col">
    <div class="p-6 flex items-center gap-2">
      <img src="/image/Edvantage.png" class="h-10" alt="Edvantage Logo">
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
    <!-- Top bar -->
    <header class="flex justify-between items-center px-8 py-4 bg-white border-b border-gray-200">
      <h1 class="text-2xl font-bold text-primary">Course Management</h1>
      <form action="/admin_panel/manage_courses/add" method="GET">
        <button type="submit" class="flex items-center gap-2 border border-primary text-primary px-4 py-2 rounded hover:bg-primaryLight">
          <span>➕</span> Add Course
        </button>
      </form>
    </header>

    @auth
    <section class="p-8">
      <p class="text-gray-500 mb-6">Manage all courses and their details</p>

      <div class="flex gap-4 mb-8">
        <input type="text" placeholder="Search courses..." class="flex-1 border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary" />
        <button class="border border-gray-300 px-4 py-2 rounded hover:bg-gray-100 flex items-center gap-2">
          <span>🔍</span> Filter
        </button>
      </div>

      <!-- Cards grid -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Example Course Card -->
        <div class="bg-white rounded-lg shadow p-4">
          <img src="https://via.placeholder.com/400x200" class="w-full h-40 object-cover rounded mb-4" alt="React Dev">
          <div class="flex justify-between items-center mb-2">
            <div class="text-lg font-semibold text-primary">React Development Masterclass</div>
            <span class="text-green-700 bg-green-100 text-xs font-medium px-2 py-1 rounded-full">active</span>
          </div>
          <p class="text-gray-500 text-sm mb-3">Complete guide to modern React development with hooks, context, and more.</p>
          <div class="flex justify-between text-sm mb-1">
            <span class="text-gray-600">Instructor:</span>
            <span class="text-primary font-medium">John Smith</span>
          </div>
          <div class="flex justify-between text-sm mb-1">
            <span class="text-gray-600">Students:</span>
            <span class="text-primary">156</span>
          </div>
          <div class="flex justify-between text-sm mb-4">
            <span class="text-gray-600">Price:</span>
            <span class="text-green-600 font-bold">$99.99</span>
          </div>

          <!-- Action buttons like your screenshot -->
          <div class="flex gap-2">
            <!-- Edit Button -->
            <form action="/admin_panel/manage_courses/edit-list" method="GET">
              <button type="submit" class="flex items-center gap-2 bg-editBg text-editText px-4 py-2 rounded-lg font-medium hover:bg-blue-100">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 11l5-5m-5 5v5h5m-5-5H4m5 0L4 20l5-5"/>
                </svg>
                Edit
              </button>
            </form>

            <!-- View Button -->
            <form action="/admin_panel/manage_courses/view-list" method="GET">
              <button type="submit" class="flex items-center justify-center bg-viewBg text-viewIcon w-10 h-10 rounded-lg hover:bg-green-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                </svg>
              </button>
            </form>

            <!-- Delete Button -->
            <form action="/admin_panel/manage_courses/delete-course" method="GET">
              <button type="submit" class="flex items-center justify-center bg-deleteBg text-deleteIcon w-10 h-10 rounded-lg hover:bg-red-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-3h4a1 1 0 011 1v1H9V5a1 1 0 011-1z" />
                </svg>
              </button>
            </form>
          </div>
        </div>

        <!-- Repeat similar cards as needed... -->

      </div>
    </section>
    @else
      <p class="p-8 text-gray-700">You are not logged in. <a href="/" class="text-primary hover:underline">Go to Login</a></p>
    @endauth

  </main>
</body>
</html>
