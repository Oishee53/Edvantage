<h2>{{ $course->title }} - Modules</h2>

<ul>
@forelse ($modules as $moduleNumber )
    <li>
        <a href="{{ route('inside.module', ['courseId' => $course->id, 'moduleNumber' => $moduleNumber]) }}">
            Module {{ $moduleNumber  }}
        </a>
    </li>
@empty
    <p>No modules found.</p>
@endforelse
</ul>


