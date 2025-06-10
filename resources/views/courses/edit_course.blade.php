<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Course</title>
</head>
<body>
    <form action="/admin/manage_courses/courses/{{ $course->id }}/edit" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="image">Course Image</label>
                @if($course->image)
                    <div class="current-image">
                        <p><strong>Current Image:</strong></p>
                        <img src="{{ asset('storage/' . $course->image) }}" 
                             alt="{{ $course->title }}">
                        <p style="margin-top: 10px; font-size: 14px; color: #666;">
                            Choose a new image to replace the current one
                        </p>
                    </div>
                @endif
                <input type="file" id="image" name="image" accept="image/*">
            </div>
            
            <div class="form-group">
                <label for="title">Course Title <span class="required">*</span></label>
                <input type="text" id="title" name="title" value="{{ $course->title }}" required>
            </div>
            
            <div class="form-group">
                <label for="description">Course Description</label>
                <textarea id="description" name="description">{{ $course->description }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="category">Category <span class="required">*</span></label>
                <select id="category" name="category" required>
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
            </div>
            
            <div class="form-group">
                <label for="video_count">Number of Videos <span class="required">*</span></label>
                <input type="number" id="video_count" name="video_count" value="{{ $course->video_count }}" min="1" required>
            </div>
            
            <div class="form-group">
                <label for="approx_video_length">Approx Video Length (minutes) <span class="required">*</span></label>
                <input type="number" id="approx_video_length" name="approx_video_length" value="{{ $course->approx_video_length }}" min="1" required>
            </div>
            
            <div class="form-group">
                <label for="total_duration">Total Duration (hours) <span class="required">*</span></label>
                <input type="number" id="total_duration" name="total_duration" value="{{ $course->total_duration }}" step="0.1" min="0.1" required>
            </div>
            
            <div class="form-group">
                <label for="price">Price (৳) <span class="required">*</span></label>
                <input type="number" id="price" name="price" value="{{ $course->price }}" step="0.01" min="0" required>
            </div>
            
            <button type="submit">💾 Update Course</button>
        </form>
    
</body>
</html>