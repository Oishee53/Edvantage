<h2>{{ $course->title }} - Modules</h2>

<ul>
@forelse ($modules as $moduleId)
    <li>
        <a href="{{ route('user.module.resource', [$course->id, $moduleId]) }}">
            Module {{ $moduleId }}
        </a>
    </li>
@empty
    <p>No modules found.</p>
@endforelse
</ul>


