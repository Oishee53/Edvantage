<h2>Your Wishlist</h2>

@if($wishlistItems->count())
    <ul>
        @foreach ($wishlistItems as $item)
            <li>
                <strong>{{ $item->course->title }}</strong> - {{ $item->course->price }}$
                <p>{{ $item->course->description }}</p>
            </li>
        @endforeach
    </ul>
@else
    <p>Your wishlist is empty.</p>
@endif
