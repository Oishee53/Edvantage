<h1>Your Purchase History</h1>

@if($enrollments->isEmpty())
    <p>You have not purchased any courses yet.</p>
@else
    <table>
        <thead>
            <tr>
                <th>Course Title</th>
                <th>Price</th>
                <th>Purchase Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($enrollments as $enrollment)
                <tr>
                    <td>{{ $enrollment->course->title }}</td>
                    <td>${{ number_format($enrollment->course->price, 2) }}</td>
                    <td>{{ $enrollment->created_at->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
