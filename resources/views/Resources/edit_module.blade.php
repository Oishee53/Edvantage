<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Module</title>
</head>
<body>
    @auth
    {{$course->title}}
    {{$module_id}}
    <form id="resourceForm" action="{{ url('admin_panel/manage_resources/' . $course->id . '/module/' . $module_id . '/add') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Video</label>
    <input type="file" name="video" id="video" required><br>

    <label>Lecture Note (PDF only):</label>
    <input type="file" name="lecture_note" id="lecture_note" accept="application/pdf" required><br>

    <button type="submit">Submit Resource</button>
</form>

<script>
    document.getElementById('resourceForm').addEventListener('submit', function (event) {
        event.preventDefault(); 

        let courseId = "{{ $course->id }}";
        let moduleId = "{{ $module_id }}";

        fetch("{{ route('check.resource.exists') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                course_id: courseId,
                module_id: moduleId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.exists) {
                if (confirm("Resources already exist for this module. Do you want to update them?")) {
                    event.target.submit();
                }
            } else {
                event.target.submit(); 
            }
        })
        .catch(error => {
            console.error('Error checking resource:', error);
            alert('Something went wrong. Please try again.');
        });
    });
</script>

    <a href="/admin_panel">← Back to Home Page</a>
    @else
        <p>You are not logged in. <a href="/">Go to Login</a></p>
@endauth
</body>
</html>

