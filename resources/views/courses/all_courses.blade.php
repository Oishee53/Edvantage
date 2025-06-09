@if(session('success'))
    <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border: 1px solid #c3e6cb;">
        {{ session('success') }}
    </div>
@endif


@foreach($courses as $course)
    <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 15px;">
        <h3>{{ $course->title }}</h3>
        <p>{{ $course->description }}</p>
      

        <a href="{{ route('courses.details', $course->id) }}">🔍 Details</a> 
        |
        <form action="{{ route('cart.add', $course->id) }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit">🛒</button>
</form> |
        <form action="{{ route('wishlist.add', $course->id) }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit">🖤</button>
        </form> 
        <form action="{{ route('enroll', $course->id) }}" method="POST">
    @csrf
    <button type="submit">📘 Enroll</button>
    
</form>

    </div>
@endforeach
