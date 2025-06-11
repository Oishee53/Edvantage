<h2>My Courses</h2>
<ul>
   
@foreach ($enrolledCourses as $course)
     <div>
    <img src="{{ asset('storage/' . $course->image) }}" alt="Course Image" width="120">
    <li><a href="{{ route('user.course.modules', $course->id) }}">{{ $course->title }}</a></li>
     <p>{{ $course->description }}</p>
     </div>
@endforeach

</ul>