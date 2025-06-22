<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Cart</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, sans-serif;
      background: linear-gradient(to bottom, #FFF2E0, #C0C9EE, #A2AADB, #898AC4, #6B6CA8);
      padding: 40px;
      color: #1c1c1c;
      min-height: 100vh;
    }

    .cart-wrapper {
      display: flex;
      flex-wrap: wrap;
      max-width: 1200px;
      margin: auto;
      gap: 30px;
    }

    .cart-container {
      flex: 2;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .summary-container {
      flex: 1;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      height: fit-content;
    }

    h2 {
      font-size: 2rem;
      margin-bottom: 20px;
      font-weight: bold;
    }

    ul {
      list-style: none;
      padding: 0;
    }

    li {
      padding: 20px 0;
      border-bottom: 1px solid #eee;
      display: flex;
      gap: 20px;
      align-items: flex-start;
    }

    .cart-img {
      width: 140px;
      height: 100px;
      object-fit: cover;
      border-radius: 8px;
      flex-shrink: 0;
    }

    .cart-info {
      flex: 1;
    }

    strong {
      font-size: 1.1rem;
      color: #1c1c1c;
    }

    p {
      color: #555;
      font-size: 0.95rem;
      margin-top: 5px;
      margin-bottom: 10px;
    }

    .remove-btn {
      background: none;
      border: none;
      color: #a435f0;
      font-weight: 600;
      cursor: pointer;
      padding: 0;
      font-size: 0.95rem;
    }

    .checkout-btn {
      width: 100%;
      padding: 14px;
      font-size: 1rem;
      border-radius: 8px;
      border: none;
      margin-top: 15px;
      cursor: pointer;
      font-weight: 600;
      background-color: #a435f0;
      color: #fff;
    }

    .total {
      font-size: 1.2rem;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .empty-cart {
      font-size: 1.1rem;
      color: #666;
    }

    @media (max-width: 768px) {
      .cart-wrapper {
        flex-direction: column;
      }

      li {
        flex-direction: column;
        align-items: center;
      }

      .cart-img {
        width: 100%;
        height: auto;
      }

      .cart-info {
        width: 100%;
        text-align: center;
      }
    }
  </style>
</head>
<body>

<div class="cart-wrapper">
  <div class="cart-container">
    <h2>Your Cart</h2>

    @if($cartItems->count())
      <ul>
        @foreach ($cartItems as $item)
          <li>
            <img src="{{ asset('storage/' . $item->course->image) }}" alt="Course Image" class="cart-img">
            <div class="cart-info">
              <strong>{{ $item->course->title }}</strong> - {{ $item->course->price }}$
              <p>{{ $item->course->description }}</p>

              <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="remove-btn">Remove from Cart</button>
              </form>
            </div>
          </li>
        @endforeach
      </ul>
    @else
      <p class="empty-cart">Your cart is empty.</p>
    @endif
  </div>

  <div class="summary-container">
    @if($cartItems->count())
      <div class="total">
        Total: ${{ number_format($cartItems->sum('course.price'), 2) }}
      </div>

      <form action="{{ route('cart.checkout') }}" method="POST">
        @csrf
        <button type="submit" class="checkout-btn">Proceed to Checkout</button>
      </form>
    @endif
  </div>
</div>

</body>
</html>