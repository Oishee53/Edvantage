<!DOCTYPE html>
<html>
<head>
    <title>Uploaded Resources</title>
</head>
<body>
    @auth
    <h2>PDF and Video List</h2>

    <h3>Course Title: {{ $course->title }}</h3>

    @foreach ($resources as $resource)
    <tr>
        <p><strong>Module:</strong> {{ $resource->moduleId ?? 'N/A' }}</p>
        <div style="margin-bottom: 30px;">
            {{-- Display YouTube Video --}}
            <h3>Video Lecture</h3>
            <a href="{{ route('video.view', ['filename' => basename($resource->videos)]) }}" target="_blank">🔗 Open video in New Tab</a>
           

            {{-- Display PDF --}}
            <h3>PDF File:</h3>
            <a href="{{ route('pdf.view', ['filename' => basename($resource->pdf)]) }}" target="_blank">🔗 Open PDF in New Tab</a>

        </div>
        <form action="/admin_panel/manage_resources/{{$course->id}}/module/{{$resource->moduleId}}/delete" method="post">
             @csrf
            <button type="submit">Delete</button>
        </form>
        <hr>
    </tr>
    @endforeach
    @else
    <p>You are not logged in. <a href="/">Go to Login</a></p>
@endauth
     

</body>
</html>
