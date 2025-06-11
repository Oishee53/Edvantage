<h2>Module {{ $resource->moduleId }} Resources</h2>

@if($resource->videos)
    <iframe width="560" height="315" src="{{ $resource->videos }}" frameborder="0" allowfullscreen></iframe>
@endif
<br>
@if($resource->pdf)
    <a href="{{ asset('storage/' . $resource->pdf) }}" target="_blank">View PDF</a>

@endif
