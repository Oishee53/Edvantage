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

    <h2>{{ $course->title }}</h2>
    <p>Module ID: {{ $module_id }}</p>

    <form id="resourceForm" action="{{ url('admin_panel/manage_resources/' . $course->id . '/module/' . $module_id . '/add') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Video</label><br>
        <div id="videoDrop" style="border: 2px dashed #ccc; padding: 20px; width: 300px; text-align: center; cursor: pointer;">
            Drop or click to select video
        </div>
        <input type="hidden" name="video" id="videoPath"> {{-- Will hold uploaded video path --}}

        <br><br>
        <label>Lecture Note (PDF only):</label>
        <input type="file" name="lecture_note" id="lecture_note" accept="application/pdf" required><br><br>

        <button type="submit">Submit Resource</button>
    </form>

    <br>
    <a href="/admin_panel">← Back to Home Page</a>

    {{-- Resumable.js --}}
    <script src="https://cdn.jsdelivr.net/npm/resumablejs/resumable.js"></script>
    <script>
    let r = new Resumable({
        target: '/upload-chunk',
        chunkSize: 1 * 1024 * 1024, // 1MB
        query: {_token: '{{ csrf_token() }}'},
        fileType: ['mp4', 'mov'],
        headers: {'Accept': 'application/json'},
        testChunks: false
    });

    const dropArea = document.getElementById('videoDrop');
    r.assignDrop(dropArea);
    r.assignBrowse(dropArea);

    r.on('fileAdded', function(file) {
        dropArea.innerHTML = 'Uploading...';
        r.upload();
    });

    r.on('fileSuccess', function(file, message) {
        const response = JSON.parse(message);
        document.getElementById('videoPath').value = response.filePath;
        dropArea.innerHTML = 'Upload complete: ' + file.fileName;
    });

    r.on('fileError', function(file, message) {
        alert('Video upload failed.');
    });
</script>

    {{-- Resource existence check & submit --}}
    <script>
        document.getElementById('resourceForm').addEventListener('submit', function (event) {
            event.preventDefault();

            // Prevent submission if video not uploaded yet
            if (!document.getElementById('videoPath').value) {
                alert('Please wait for the video to finish uploading.');
                return;
            }

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

@else
    <p>You are not logged in. <a href="/">Go to Login</a></p>
@endauth
</body>
</html>
