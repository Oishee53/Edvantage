<h2>Modules for {{ $course->title }}</h2>

<ul>
    @foreach ($modules as $index)
        <li>
            @php
                $route = route('module.instructor.create', [
                    'course' => $course->id,
                    'module' => $index
                ]);
            @endphp
            <a href="{{ $route }}">Module {{ $index }}</a>
        </li>
    @endforeach
</ul>

<br>

@if($allUploaded)
    <a href="{{ route('instructor.manage_resources', ['course' => $course->id]) }}">
        Submit For Review
    </a>
@else
    <button disabled>
        Submit For Review (Upload all modules first)
    </button>
@endif

<br>
<a href="/instructor_homepage">Back to Home Page</a>
