<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
    rel="stylesheet"
  />

  <!-- TailwindCSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Chart.js CDN -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
            // Updated primary colors to match manage_courses
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
      <a href="/admin_panel/dashboard" class="block py-3 px-6 text-primary bg-primaryLight font-semibold">Dashboard</a>
      <a href="/admin_panel/manage_courses" class="block py-3 px-6 text-primary hover:bg-primaryLight font-semibold">Manage Course</a>
      <a href="/admin_panel/manage_user" class="block py-3 px-6 text-primary hover:bg-primaryLight font-semibold">Manage User</a>
      <a href="/admin_panel/manage_resources" class="block py-3 px-6 text-primary hover:bg-primaryLight font-semibold">Manage Resources</a>
    </nav>
  </aside>

  <!-- Main content -->
  <main class="flex-1 flex flex-col">
    <!-- Top bar -->
    <header class="flex justify-between items-center px-8 py-4 bg-white border-b border-gray-200">
      <h1 class="text-2xl font-bold text-primary">Dashboard</h1>
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

    <!-- Stats cards -->
    <section class="flex flex-1 flex-col gap-4 p-4 md:gap-8 md:p-6">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow">
          <div class="text-gray-600">Total Courses</div>
          <div class="text-2xl font-bold text-primary">{{ $totalCourses ?? 6 }}</div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
          <div class="text-gray-600">Total Earn</div>
          <div class="text-2xl font-bold text-primary">৳{{ $totalEarn ?? 3835 }}</div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
          <div class="text-gray-600">Total Students</div>
          <div class="text-2xl font-bold text-primary">{{ $totalStudents ?? 3 }}</div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
          <div class="text-gray-600">Total Instructors</div>
          <div class="text-2xl font-bold text-primary">{{ $totalInstructors ?? 4 }}</div>
        </div>
      </div>

      <!-- Graph -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow col-span-3">
          <div class="text-primary text-lg font-semibold mb-4">
            Total Student Enrollments
          </div>
          <canvas id="enrollmentsChart" height="100"></canvas>
        </div>
      </div>

      <!-- Contact List -->
      <div class="bg-white mt-8 p-6 rounded-lg shadow">
        <div class="text-primary text-lg font-semibold mb-4">Contact List</div>
        <table class="min-w-full text-sm text-gray-700">
          <thead class="text-gray-500 border-b">
            <tr>
              <th class="py-2 text-left">Name</th>
              <th class="py-2 text-left">Email</th>
              <th class="py-2 text-left">Course</th>
              <th class="py-2 text-left">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b">
              <td class="py-2">John Smith</td>
              <td class="py-2">john@example.com</td>
              <td class="py-2">React Development</td>
              <td class="py-2 text-primary hover:underline cursor-pointer">View Details</td>
            </tr>
            <tr class="border-b">
              <td class="py-2">Sarah Johnson</td>
              <td class="py-2">sarah@example.com</td>
              <td class="py-2">Laravel Framework</td>
              <td class="py-2 text-primary hover:underline cursor-pointer">View Details</td>
            </tr>
            <tr>
              <td class="py-2">Mike Chen</td>
              <td class="py-2">mike@example.com</td>
              <td class="py-2">Database Design</td>
              <td class="py-2 text-primary hover:underline cursor-pointer">View Details</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
  </main>

  <script>
    const ctx = document.getElementById('enrollmentsChart').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
          label: 'Student Enrollments',
          data: [120, 150, 180, 100, 90, 160],
          backgroundColor: '#0E1B33' // Updated to new primary color
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: { beginAtZero: true }
        }
      }
    });
  </script>

</body>
</html>
