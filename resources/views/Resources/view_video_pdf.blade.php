<!DOCTYPE html>
<html>
<head>
    <title>Uploaded Resources</title>
</head>
<body>
    @auth

<div class="container mt-4">
    <h2>PDF and Video List</h2>
    <h3>Course Title: {{ $course->title }}</h3>

    @auth
        @foreach ($resources as $resource)
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Module: {{ $resource->moduleId ?? 'N/A' }}</h5>
                </div>
                <div class="card-body">
                    
                    {{-- Video Section --}}
                    <h6>Video Lecture</h6>
                    <video width="70%" height="auto" controls 
                           controlsList="nodownload nofullscreen noremoteplayback"
                           disablepictureinpicture
                           oncontextmenu="return false;">
                        <source src="{{ route('video.view', ['filename' => basename($resource->videos)]) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>

                    {{-- PDF Section --}}
                    <div class="mt-4">
                        <h6>
                            PDF Lecture Notes
                            <button class="btn btn-secondary btn-sm" type="button" onclick="togglePdf('pdf-{{ $loop->index }}')">
                                Show/Hide PDF
                            </button>
                        </h6>

                        <div id="pdf-{{ $loop->index }}" style="display: none;">
                            <iframe src="{{ route('pdf.view', ['filename' => basename($resource->pdf)]) }}" width="100%" height="500px" frameborder="0"></iframe>
                        </div>

                        <div class="mt-2">
                            <a href="{{ route('pdf.view', ['filename' => basename($resource->pdf)]) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                📄 Open PDF in New Tab
                            </a>
                            <a href="{{ route('pdf.view', ['filename' => basename($resource->pdf)]) }}" download class="btn btn-outline-success btn-sm">
                                💾 Download PDF
                            </a>
                        </div>
                    </div>

                    {{-- Delete Resource --}}
                    <form action="/admin_panel/manage_resources/{{$course->id}}/module/{{$resource->moduleId}}/delete" method="POST" class="mt-4">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this resource?')">
                            🗑️ Delete Resource
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    @else
        <p>You are not logged in. <a href="/">Go to Login</a></p>
    @endauth
</div>

<script>
    function togglePdf(id) {
        const pdf = document.getElementById(id);
        if (pdf.style.display === 'none' || pdf.style.display === '') {
            pdf.style.display = 'block';
        } else {
            pdf.style.display = 'none';
        }
    }
</script>



    @else
    <p>You are not logged in. <a href="/">Go to Login</a></p>
    @endauth
</body>
</html>