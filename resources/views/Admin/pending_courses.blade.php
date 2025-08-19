<h2>Pending Courses for Review</h2>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>Course ID</th>
            <th>Instructor ID</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pendingCourses as $notification)
            <tr>
                <td>{{ $notification->pending_course_id }}</td>
                <td>{{ $notification->instructor_id }}</td>
                <td>{{ ucfirst($notification->status) }}</td>
                <td>
                    <a href="{{ route('admin.courses.review', $notification->pending_course_id) }}">
                        View Resources
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No pending courses found</td>
            </tr>
        @endforelse
    </tbody>
</table>
