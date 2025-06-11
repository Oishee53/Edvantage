<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Course</title>
</head>
<body>
    @auth
    <h2>➕ Add New Course</h2>

     <form action="/admin_panel/manage_courses/create" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="image">Course Image <span class="required">*</span></label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>
            
            <div class="form-group">
                <label for="title">Course Title <span class="required">*</span></label>
                <input type="text" id="title" name="title" placeholder="Enter course title" required>
            </div>
            
            <div class="form-group">
                <label for="description">Course Description</label>
                <textarea id="description" name="description" placeholder="Enter course description"></textarea>
            </div>
            
            <div class="form-group">
                <label for="category">Category <span class="required">*</span></label>
                <select id="category" name="category" required>
                    <option value="">Select Category</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Mobile Development">Mobile Development</option>
                    <option value="Data Science">Data Science</option>
                    <option value="Machine Learning">Machine Learning</option>
                    <option value="Design">Design</option>
                    <option value="Business">Business</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="video_count">Number of Videos <span class="required">*</span></label>
                <input type="number" id="video_count" name="video_count" placeholder="e.g., 25" min="1" required>
            </div>
            
            <div class="form-group">
                <label for="approx_video_length">Approx Video Length (minutes) <span class="required">*</span></label>
                <input type="number" id="approx_video_length" name="approx_video_length" placeholder="e.g., 15" min="1" required>
            </div>
            
            <div class="form-group">
                <label for="total_duration">Total Duration (hours) <span class="required">*</span></label>
                <input type="number" id="total_duration" name="total_duration" placeholder="e.g., 6.5" step="0.1" min="0.1" required>
            </div>
            
            <div class="form-group">
                <label for="price">Price (৳) <span class="required">*</span></label>
                <input type="number" id="price" name="price" placeholder="e.g., 2500" step="0.01" min="0" required>
            </div>
            
            <button type="submit">💾 Save Course</button>
        </form>

    <br>
    <a href="/admin_panel/manage_courses">← Back to Manage Courses</a>
    @else
    <p>You are not logged in. <a href="/">Go to Login</a></p>
@endauth
</body>
</html>
