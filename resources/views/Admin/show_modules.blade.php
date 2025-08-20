<h2>Modules for {{ $course->title }}</h2>

<ul>
    @foreach ($modules as $index)
        <li>
            @php
            @endphp
            <a href="##">Module {{ $index }}</a>
        </li>
    @endforeach
</ul>

<br>

<form action="{{ route('admin.courses.approve', $course->id) }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit">Approve</button>
</form>

<form action="{{ route('admin.courses.reject', $course->id) }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" style="color:red;">Reject</button>
</form>

<br>
<a href="/instructor_homepage">Back to Home Page</a>
