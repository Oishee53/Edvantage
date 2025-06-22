<h2>Module {{ $resource->moduleId }} Resources</h2>

<video width="70%" height="auto" controls 
                           controlsList="nodownload"
                           disablepictureinpicture
                           oncontextmenu="return false;">
                        <source src="{{ route('video.view', ['filename' => basename($resource->videos)]) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
<br>
@if($resource->pdf)
    <a href="{{ route('resources.showPdf', ['filename' => basename($resource->pdf)]) }}" target="_blank">View PDF</a>


@endif
