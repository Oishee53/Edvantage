<h2>Your Cart</h2>

@if($cartItems->count())
    <ul>
        @foreach ($cartItems as $item)
            <li>
                <strong>{{ $item->course->title }}</strong> - {{ $item->course->price }}$
                <p>{{ $item->course->description }}</p>

            </li>
            <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit">Remove from Cart</button>
</form>

        @endforeach
    </ul>

    <form action="{{ route('cart.checkout') }}" method="POST">
    @csrf
    <button type="submit">Proceed to Checkout</button>
</form>

@else
    <p>Your cart is empty.</p>
@endif
