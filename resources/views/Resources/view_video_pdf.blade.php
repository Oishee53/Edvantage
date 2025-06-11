<!DOCTYPE html>
<html>
<head>
    <title>Uploaded Resources</title>
</head>
<body>
    <h2>PDF and Video List</h2>

    <h3>Course Title: {{ $course->title }}</h3>
    @auth

    @foreach ($resources as $resource)
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
            <embed src="{{ route('pdf.view', ['filename' => basename($resource->pdf)]) }}" type="application/pdf" width="560" height="315" />
            <br>
            <a href="{{ route('pdf.view', ['filename' => basename($resource->pdf)]) }}" target="_blank">🔗 Open PDF in New Tab</a>

        </div>
        <hr>
    @endforeach
    @else
    <p>Please <a href="{{ route('login') }}">log in</a> to access course materials.</p>
@endauth
     

</body>
</html>
