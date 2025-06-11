<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
</head>
<body>
    <h2>Edit Course</h2>

    <form action="/admin/manage_courses/courses/{{ $course->id }}/edit" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <p><strong>Course Image:</strong></p>
        @if($course->image)
            <p>Current Image:</p>
            <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" width="200">
            <p>Choose a new image to replace the current one:</p>
        @else
            <p>No image uploaded.</p>
        @endif
        <input type="file" name="image" accept="image/*">
        <br><br>

        <p><strong>Course Title *</strong></p>
        <input type="text" name="title" value="{{ $course->title }}" required>
        <br><br>

        <p><strong>Course Description</strong></p>
        <textarea name="description" rows="4" cols="50">{{ $course->description }}</textarea>
        <br><br>

        <p><strong>Category *</strong></p>
        <select name="category" required>
            <option value="">Select Category</option>
            <option value="Web Development" {{ $course->category == 'Web Development' ? 'selected' : '' }}>Web Development</option>
            <option value="Mobile Development" {{ $course->category == 'Mobile Development' ? 'selected' : '' }}>Mobile Development</option>
            <option value="Data Science" {{ $course->category == 'Data Science' ? 'selected' : '' }}>Data Science</option>
            <option value="Machine Learning" {{ $course->category == 'Machine Learning' ? 'selected' : '' }}>Machine Learning</option>
            <option value="Design" {{ $course->category == 'Design' ? 'selected' : '' }}>Design</option>
            <option value="Business" {{ $course->category == 'Business' ? 'selected' : '' }}>Business</option>
            <option value="Marketing" {{ $course->category == 'Marketing' ? 'selected' : '' }}>Marketing</option>
            <option value="Other" {{ $course->category == 'Other' ? 'selected' : '' }}>Other</option>
        </select>
        <br><br>

        <p><strong>Number of Videos *</strong></p>
        <input type="number" name="video_count" value="{{ $course->video_count }}" min="1" required>
        <br><br>

        <p><strong>Approx Video Length (minutes) *</strong></p>
        <input type="number" name="approx_video_length" value="{{ $course->approx_video_length }}" min="1" required>
        <br><br>

        <p><strong>Total Duration (hours) *</strong></p>
        <input type="number" name="total_duration" value="{{ $course->total_duration }}" step="0.1" min="0.1" required>
        <br><br>

        <p><strong>Price (৳) *</strong></p>
        <input type="number" name="price" value="{{ $course->price }}" step="0.1" min="0" required>
        <br><br>

        <button type="submit">💾 Update Course</button>
    </form>
    <br>
    <a href="/admin_panel">Back to Home Page</a>

</body>
</html>
