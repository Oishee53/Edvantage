<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Course | Admin Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <!-- TailwindCSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      background-color: #f9fafb; /* Matches admin_panel body background */
    }
  </style>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#0E1B33', /* Your requested darker blue */
            primaryLight: '#2D336B', /* Your requested lighter blue for hover */
            grayText: '#4b5563', /* Equivalent to Tailwind's gray-600 */
            grayText700: '#374151', /* Equivalent to Tailwind's gray-700 */
            grayText500: '#6b7280', /* Equivalent to Tailwind's gray-500 */
            borderColor: '#e5e7eb', /* Equivalent to Tailwind's gray-200 */
            danger: '#ef4444', /* From original edit_course */
            muted: '#64748b', /* From original edit_course */
          },
        },
      },
    }
  </script>
</head>
<body class="flex">
  @auth
  <!-- Sidebar -->
  <aside class="w-64 bg-white min-h-screen shadow-md">
    <div class="p-6 flex items-center gap-2 text-primary font-bold text-xl">
      <img src="/image/Edvantage.png" class="h-10" alt="Edvantage Logo">
    </div>
    <nav class="mt-10">
      <a href="/admin_panel" class="block py-3 px-6 text-primary hover:bg-primaryLight hover:text-white font-medium">Dashboard</a>
      <a href="/admin_panel/manage_courses" class="block py-3 px-6 text-primary hover:bg-primaryLight hover:text-white font-medium">Manage Course</a>
      <a href="/admin_panel/manage_user" class="block py-3 px-6 text-primary hover:bg-primaryLight hover:text-white font-medium">Manage User</a>
      <a href="#" class="block py-3 px-6 text-primary hover:bg-primaryLight hover:text-white font-medium">Manage Resources</a>
    </nav>
  </aside>

  <!-- Main content -->
  <main class="flex-1 p-8">
    <!-- Top bar -->
    <div class="flex justify-between items-center mb-8">
      <div class="text-2xl font-normal text-primary">Edit Course</div>
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
      @endauth
    </div>

    <div class="bg-white max-w-md mx-auto p-10 rounded-xl shadow-md border-2 border-primary relative overflow-hidden md:max-w-lg lg:max-w-xl">
      <div class="w-full h-1.5 bg-gradient-to-r from-primary to-borderColor rounded-t-md absolute top-0 left-0"></div>
      <h2 class="text-xl font-semibold text-primary mb-6 flex items-center gap-2">
        <i class="fas fa-pen-to-square"></i> Edit Course
      </h2>
      <form action="/admin/manage_courses/courses/{{ $course->id }}/edit" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5">
        @csrf
        @method('PUT')

        <div class="flex flex-col gap-1.5 relative">
          <label class="text-base font-medium text-grayText700">Course Image</label>
          @if($course->image)
            <small class="text-muted text-sm">Current Image:</small>
            <img src="{{ asset('storage/' . $course->image) }}" class="w-24 h-24 object-cover rounded-lg my-2 border border-borderColor block" alt="{{ $course->title }}">
            <small class="text-muted text-sm">Choose new image to replace:</small>
          @else
            <small class="text-muted text-sm">No image uploaded.</small>
          @endif
          <input type="file" name="image" accept="image/*" class="py-2 px-3 border border-borderColor rounded-md text-base bg-gray-100 text-grayText700 focus:border-primary focus:bg-blue-50 outline-none transition-colors" />
        </div>

        <div class="flex flex-col gap-1.5 relative">
          <label for="title" class="text-base font-medium text-grayText700">Course Title <span class="text-danger text-base">*</span></label>
          <input type="text" id="title" name="title" value="{{ old('title', $course->title) }}" required class="py-2 px-3 border border-borderColor rounded-md text-base bg-gray-100 text-grayText700 focus:border-primary focus:bg-blue-50 outline-none transition-colors" />
        </div>

        <div class="flex flex-col gap-1.5 relative">
          <label for="description" class="text-base font-medium text-grayText700">Course Description</label>
          <textarea id="description" name="description" class="py-2 px-3 border border-borderColor rounded-md text-base bg-gray-100 text-grayText700 focus:border-primary focus:bg-blue-50 outline-none transition-colors min-h-[80px] max-h-[180px]">{{ old('description', $course->description) }}</textarea>
        </div>

        <div class="flex flex-col gap-1.5 relative">
          <label for="category" class="text-base font-medium text-grayText700">Category <span class="text-danger text-base">*</span></label>
          <select id="category" name="category" required class="py-2 px-3 border border-borderColor rounded-md text-base bg-gray-100 text-grayText700 focus:border-primary focus:bg-blue-50 outline-none transition-colors">
            <option value="">Select Category</option>
            <option value="Web Development" {{ old('category', $course->category) == 'Web Development' ? 'selected' : '' }}>Web Development</option>
            <option value="Mobile Development" {{ old('category', $course->category) == 'Mobile Development' ? 'selected' : '' }}>Mobile Development</option>
            <option value="Data Science" {{ old('category', $course->category) == 'Data Science' ? 'selected' : '' }}>Data Science</option>
            <option value="Machine Learning" {{ old('category', $course->category) == 'Machine Learning' ? 'selected' : '' }}>Machine Learning</option>
            <option value="Design" {{ old('category', $course->category) == 'Design' ? 'selected' : '' }}>Design</option>
            <option value="Business" {{ old('category', $course->category) == 'Business' ? 'selected' : '' }}>Business</option>
            <option value="Marketing" {{ old('category', $course->category) == 'Marketing' ? 'selected' : '' }}>Marketing</option>
            <option value="Other" {{ old('category', $course->category) == 'Other' ? 'selected' : '' }}>Other</option>
          </select>
        </div>

        <div class="flex flex-col gap-1.5 relative">
          <label for="video_count" class="text-base font-medium text-grayText700">Number of Videos <span class="text-danger text-base">*</span></label>
          <input type="number" id="video_count" name="video_count" value="{{ old('video_count', $course->video_count) }}" min="1" required class="py-2 px-3 border border-borderColor rounded-md text-base bg-gray-100 text-grayText700 focus:border-primary focus:bg-blue-50 outline-none transition-colors" />
        </div>

        <div class="flex flex-col gap-1.5 relative">
          <label for="approx_video_length" class="text-base font-medium text-grayText700">Approx. Video Length (minutes) <span class="text-danger text-base">*</span></label>
          <input type="number" id="approx_video_length" name="approx_video_length" value="{{ old('approx_video_length', $course->approx_video_length) }}" min="1" required class="py-2 px-3 border border-borderColor rounded-md text-base bg-gray-100 text-grayText700 focus:border-primary focus:bg-blue-50 outline-none transition-colors" />
        </div>

        <div class="flex flex-col gap-1.5 relative">
          <label for="total_duration" class="text-base font-medium text-grayText700">Total Duration (hours) <span class="text-danger text-base">*</span></label>
          <input type="number" id="total_duration" name="total_duration" value="{{ old('total_duration', $course->total_duration) }}" step="0.1" min="0.1" required class="py-2 px-3 border border-borderColor rounded-md text-base bg-gray-100 text-grayText700 focus:border-primary focus:bg-blue-50 outline-none transition-colors" />
        </div>

        <div class="flex flex-col gap-1.5 relative">
          <label for="price" class="text-base font-medium text-grayText700">Price (৳) <span class="text-danger text-base">*</span></label>
          <input type="number" id="price" name="price" value="{{ old('price', $course->price) }}" step="0.1" min="0" required class="py-2 px-3 border border-borderColor rounded-md text-base bg-gray-100 text-grayText700 focus:border-primary focus:bg-blue-50 outline-none transition-colors" />
        </div>

        <hr class="border-t-2 border-dashed border-borderColor my-4 w-full" />

        <button type="submit" class="bg-primary text-white font-semibold text-lg py-3 rounded-md cursor-pointer mt-3 shadow-sm hover:bg-primaryLight transition-colors flex items-center justify-center gap-2">
          Update Course
        </button>
      </form>

       @if(auth()->user()->role === 2)
          <a class="back-link" href="/admin_panel/manage_courses"><i class="fas fa-arrow-left"></i> Back to Manage Courses</a>
        @elseif(auth()->user()->role === 3)
          <a class="back-link" href="/instructor/manage_courses"><i class="fas fa-arrow-left"></i> Back to Manage Courses</a>
        @endif
      @else
        <p class="text-danger bg-red-50 p-4 rounded-lg text-center mt-8 text-lg">You are not logged in.<a href="/" class="text-primary underline ml-1 font-medium hover:text-primaryLight transition-colors">Go to Login</a></p>
      @endauth
    </div>
  </main>
</body>
</html>