<!DOCTYPE html>
<html>
<head>
    <title>Module Resources</title>
</head>
<body>


@if(session('error'))
       <div style="background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
        {{ session('error') }}
    </div>
@endif

    <h2>Module Resources for Course: {{ $course->name }}</h2>
    <p>Module Number: {{ $moduleNumber }}</p>

    {{-- Video Section --}}
    @auth
    @if($resource->videos)
        <div style="margin: 20px 0;">
            <div><strong>Video Content</strong></div>

            <button onclick="toggleVideo()">View Video</button>

            <div id="videoPlayer" style="margin-top: 20px; display: none;">
    <mux-player 
        id="mux-player"
        playback-id="{{ $resource->videos }}"
        stream-type="on-demand"
        controls
        style="width: 100%; max-width: 720px;">
    </mux-player>
<script src="https://cdn.jsdelivr.net/npm/@mux/mux-player"></script>
<script>
    function toggleVideo() {
        const playerWrapper = document.getElementById('videoPlayer');
        const player = document.getElementById('mux-player');
        playerWrapper.style.display = (playerWrapper.style.display === 'none') ? 'block' : 'none';
    }

    document.addEventListener('DOMContentLoaded', function () {
        const player = document.getElementById('mux-player');
        if (!player) return;

        let lastSavedProgress = 0;

        player.addEventListener('timeupdate', async function () {
            const progressPercent = (player.currentTime / player.duration) * 100;

            if (progressPercent - lastSavedProgress >= 10) {
                lastSavedProgress = progressPercent;

                await fetch('{{ route("video.progress.save") }}', {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        course_id: {{ $course->id }},
                        resource_id: {{ $resource->id }},
                        progress_percent: progressPercent
                    })
                });
            }
        });

        player.addEventListener('ended', async function () {
            await fetch('{{ route("video.progress.save") }}', {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    course_id: {{ $course->id }},
                    resource_id: {{ $resource->id }},
                    progress_percent: 100
                })
            });
        });
    });
</script>

</div>

        </div>

     
    @endif
    @if($resource->pdf)
        <div style="margin: 20px 0;">
            <div><strong>PDF Document</strong></div>
            <a href="{{ route('secure.pdf.view', ['id' => $resource->id]) }}" 
               target="_blank" 
               rel="noopener noreferrer">
                <button>View PDF</button>
            </a>
        </div>
    @endif
   

    @if($quiz)
        <a href="{{ route('user.quiz.start', ['course' => $course->id, 'module' => $moduleNumber]) }}">
            <button>Take Quiz</button>
        </a>
    @else
        <p>No quiz available for this module.</p>
    @endif

    <form action="{{ route('questions.store') }}" method="POST">
    @csrf
    <label for="question">Ask Questions</label>
    <input type="text" id="question" name="question">

    {{-- Hidden fields --}}
    <input type="hidden" name="course_id" value="{{ $course->id }}">
    <input type="hidden" name="module_number" value="{{ $moduleNumber }}">

    <button type="submit">Post</button>
    </form>


     @else
        <p><em>Please log in to access course material</em></p>
    @endif

</body>
</html>