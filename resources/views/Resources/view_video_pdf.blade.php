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

        @php
            preg_match('/(?:v=|\/)([0-9A-Za-z_-]{11})/', $resource->videos, $matches);
            $videoId = $matches[1] ?? null;
        @endphp

        <div style="margin-bottom: 30px;">
            {{-- Display YouTube Video --}}
            @if ($videoId)
                <p><strong>YouTube Link:</strong></p>
                <iframe width="560" height="315"
                        src="https://www.youtube.com/embed/{{ $videoId }}"
                        frameborder="0" allowfullscreen>
                </iframe>
            @else
                <p>❌ Invalid YouTube URL</p>
            @endif

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
