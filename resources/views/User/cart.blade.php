<h2>Your Cart</h2>

@if($cartItems->count())
    <ul>
        @foreach ($cartItems as $item)
            <li>
                <strong>{{ $item->course->title }}</strong> - {{ $item->course->price }}$
                <p>{{ $item->course->description }}</p>
            </li>
        @endforeach
    </ul>
@else
    <p>Your cart is empty.</p>
@endif
