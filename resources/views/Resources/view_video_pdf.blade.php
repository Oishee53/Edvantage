<!DOCTYPE html>
<html>
<head>
    <title>Uploaded Resources</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        .resource-container {
            background: white;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .video-container {
            margin: 20px 0;
            text-align: center;
        }
        .video-player {
            width: 100%;
            max-width: 800px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .pdf-container {
            margin: 20px 0;
        }
        .pdf-embed {
            width: 100%;
            height: 600px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .link-button {
            display: inline-block;
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin: 5px;
        }
        .link-button:hover {
            background-color: #0056b3;
        }
        .delete-button {
            background-color: #dc3545;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        .delete-button:hover {
            background-color: #c82333;
        }
        .module-header {
            background-color: #f8f9fa;
            padding: 15px;
            border-left: 4px solid #007bff;
            margin-bottom: 20px;
        }
        .toggle-button {
            background-color: #6c757d;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            margin-left: 10px;
        }
        .toggle-button:hover {
            background-color: #545b62;
        }
        .pdf-toggle {
            display: none;
        }
    </style>
</head>
<body>
    @auth
    <h2>PDF and Video List</h2>
    <h3>Course Title: {{ $course->title }}</h3>

    @foreach ($resources as $resource)
    <div class="resource-container">
        <div class="module-header">
            <h3>Module: {{ $resource->moduleId ?? 'N/A' }}</h3>
        </div>

        {{-- Display Video Player --}}
        <div class="video-container">
            <h4>Video Lecture</h4>
            <video class="video-player" controls preload="metadata">
                <source src="{{ route('video.view', ['filename' => basename($resource->videos)]) }}" type="video/mp4">
                <source src="{{ route('video.view', ['filename' => basename($resource->videos)]) }}" type="video/webm">
                <source src="{{ route('video.view', ['filename' => basename($resource->videos)]) }}" type="video/ogg">
                Your browser does not support the video tag.
            </video>
            
            {{-- Fallback link for unsupported browsers --}}
            <div style="margin-top: 10px;">
                <a href="{{ route('video.view', ['filename' => basename($resource->videos)]) }}" class="link-button" target="_blank">
                    🔗 Open video in New Tab (Fallback)
                </a>
            </div>
        </div>

        {{-- Display PDF --}}
        <div class="pdf-container">
            <h4>PDF Lecture Notes 
                <button class="toggle-button" onclick="togglePdf('pdf-{{ $loop->index }}')">
                    Show/Hide PDF
                </button>
            </h4>
            
            {{-- PDF Embed (hidden by default) --}}
            <div id="pdf-{{ $loop->index }}" class="pdf-toggle">
                <iframe 
                    src="{{ route('pdf.view', ['filename' => basename($resource->pdf)]) }}" 
                    class="pdf-embed"
                    title="PDF Viewer">
                </iframe>
            </div>
            
            <div style="margin-top: 10px;">
                <a href="{{ route('pdf.view', ['filename' => basename($resource->pdf)]) }}" class="link-button" target="_blank">
                    📄 Open PDF in New Tab
                </a><!DOCTYPE html>
<html>
<head>
    <title>Uploaded Resources</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        .resource-container {
            background: white;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .video-container {
            margin: 20px 0;
            text-align: center;
        }
        .video-player {
            width: 100%;
            max-width: 800px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .pdf-container {
            margin: 20px 0;
        }
        .pdf-embed {
            width: 100%;
            height: 600px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .link-button {
            display: inline-block;
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin: 5px;
        }
        .link-button:hover {
            background-color: #0056b3;
        }
        .delete-button {
            background-color: #dc3545;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        .delete-button:hover {
            background-color: #c82333;
        }
        .module-header {
            background-color: #f8f9fa;
            padding: 15px;
            border-left: 4px solid #007bff;
            margin-bottom: 20px;
        }
        .toggle-button {
            background-color: #6c757d;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            margin-left: 10px;
        }
        .toggle-button:hover {
            background-color: #545b62;
        }
        .pdf-toggle {
            display: none;
        }
    </style>
</head>
<body>
    @auth
    <h2>PDF and Video List</h2>
    <h3>Course Title: {{ $course->title }}</h3>

    @foreach ($resources as $resource)
    <div class="resource-container">
        <div class="module-header">
            <h3>Module: {{ $resource->moduleId ?? 'N/A' }}</h3>
        </div>

        {{-- Display Video Player --}}
        <div class="video-container">
            <h4>Video Lecture</h4>
            <video class="video-player" controls preload="metadata">
                <source src="{{ route('video.view', ['filename' => basename($resource->videos)]) }}" type="video/mp4">
                <source src="{{ route('video.view', ['filename' => basename($resource->videos)]) }}" type="video/webm">
                <source src="{{ route('video.view', ['filename' => basename($resource->videos)]) }}" type="video/ogg">
                Your browser does not support the video tag.
            </video>
            
            {{-- Fallback link for unsupported browsers --}}
            <div style="margin-top: 10px;">
                <a href="{{ route('video.view', ['filename' => basename($resource->videos)]) }}" class="link-button" target="_blank">
                    🔗 Open video in New Tab (Fallback)
                </a>
            </div>
        </div>

        {{-- Display PDF --}}
        <div class="pdf-container">
            <h4>PDF Lecture Notes 
                <button class="toggle-button" onclick="togglePdf('pdf-{{ $loop->index }}')">
                    Show/Hide PDF
                </button>
            </h4>
            
            {{-- PDF Embed (hidden by default) --}}
            <div id="pdf-{{ $loop->index }}" class="pdf-toggle">
                <iframe 
                    src="{{ route('pdf.view', ['filename' => basename($resource->pdf)]) }}" 
                    class="pdf-embed"
                    title="PDF Viewer">
                </iframe>
            </div>
            
            <div style="margin-top: 10px;">
                <a href="{{ route('pdf.view', ['filename' => basename($resource->pdf)]) }}" class="link-button" target="_blank">
                    📄 Open PDF in New Tab
                </a>
                <a href="{{ route('pdf.view', ['filename' => basename($resource->pdf)]) }}" class="link-button" download>
                    💾 Download PDF
                </a>
            </div>
        </div>

        {{-- Delete Form --}}
        <form action="/admin_panel/manage_resources/{{$course->id}}/module/{{$resource->moduleId}}/delete" method="post" style="margin-top: 20px;">
            @csrf
            <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this resource?')">
                🗑️ Delete Resource
            </button>
        </form>
    </div>
    @endforeach

    <script>
        function togglePdf(pdfId) {
            const pdfElement = document.getElementById(pdfId);
            if (pdfElement.style.display === 'none' || pdfElement.style.display === '') {
                pdfElement.style.display = 'block';
            } else {
                pdfElement.style.display = 'none';
            }
        }

        // Optional: Add video error handling
        document.addEventListener('DOMContentLoaded', function() {
            const videos = document.querySelectorAll('.video-player');
            videos.forEach(video => {
                video.addEventListener('error', function() {
                    console.error('Video failed to load:', this.src);
                    const fallbackDiv = document.createElement('div');
                    fallbackDiv.innerHTML = `
                        <p style="color: red; text-align: center; padding: 20px;">
                            ⚠️ Video could not be loaded. 
                            <a href="${this.src}" target="_blank" style="color: blue;">Click here to open in new tab</a>
                        </p>
                    `;
                    this.parentNode.replaceChild(fallbackDiv, this);
                });
            });
        });
    </script>

    @else
    <p>You are not logged in. <a href="/">Go to Login</a></p>
    @endauth
</body>
</html>
            </div>
        </div>

        {{-- Delete Form --}}
        <form action="/admin_panel/manage_resources/{{$course->id}}/module/{{$resource->moduleId}}/delete" method="post" style="margin-top: 20px;">
            @csrf
            <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this resource?')">
                🗑️ Delete Resource
            </button>
        </form>
    </div>
    @endforeach

    <script>
        function togglePdf(pdfId) {
            const pdfElement = document.getElementById(pdfId);
            if (pdfElement.style.display === 'none' || pdfElement.style.display === '') {
                pdfElement.style.display = 'block';
            } else {
                pdfElement.style.display = 'none';
            }
        }

        // Optional: Add video error handling
        document.addEventListener('DOMContentLoaded', function() {
            const videos = document.querySelectorAll('.video-player');
            videos.forEach(video => {
                video.addEventListener('error', function() {
                    console.error('Video failed to load:', this.src);
                    const fallbackDiv = document.createElement('div');
                    fallbackDiv.innerHTML = `
                        <p style="color: red; text-align: center; padding: 20px;">
                            ⚠️ Video could not be loaded. 
                            <a href="${this.src}" target="_blank" style="color: blue;">Click here to open in new tab</a>
                        </p>
                    `;
                    this.parentNode.replaceChild(fallbackDiv, this);
                });
            });
        });
    </script>

    @else
    <p>You are not logged in. <a href="/">Go to Login</a></p>
    @endauth
</body>
</html>