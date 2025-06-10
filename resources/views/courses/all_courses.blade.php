<head>
</head>
<body>
    

@if(session('success'))
    <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border: 1px solid #c3e6cb;">
        {{ session('success') }}
    </div>
@endif


<h2>All courses<h2>

@foreach($courses as $course)
   
        <img src="{{ $course->image }}" alt="Course Image" style="width: 100px; height: auto; display: block; margin-bottom: 10px;">

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
       

    </div>
@endforeach

@if(session('cart_added'))
    <script>
        if (confirm("{{ session('cart_added') }} Go to cart?")) {
            window.location.href = "{{ route('cart.all') }}";
        }
    </script>
@endif

</body>
