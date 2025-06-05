@foreach($courses as $course)
    <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 15px;">
        <h3>{{ $course->title }}</h3>
        <p>{{ $course->description }}</p>
      

        <a href="{{ route('courses.details', $course->id) }}">🔍 Details</a> 
        |
        <form action="{{ route('cart.add', $course->id) }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit">🛒 Add to Cart</button>
</form> |
        <form action="{{ route('wishlist.add', $course->id) }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit">❤️ Add to Wishlist</button>
        </form> 
    </div>
@endforeach
