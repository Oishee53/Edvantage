<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beautiful Cart Page</title>
    <style>
        /* Global Style */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, rgba(106, 76, 156, 0.8), rgba(78, 42, 132, 0.8)),
                        url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=2071&q=80') center/cover no-repeat fixed;
            color: #fff;
            min-height: 100vh;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Cart Container */
        .cart-container {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
            text-align: center;
            color: #fff;
            background: rgba(255, 255, 255, 0.2); /* Slight transparent background */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(15px);
        }

        /* Header Style */
        h2 {
            font-size: 2rem;  /* Smaller font size */
            font-weight: 700;
            margin-bottom: 30px;
            color: #fff;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            font-family: 'Segoe UI', Arial, sans-serif;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* Cart Items Grid */
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px; /* Slightly smaller gap */
        }

        /* Individual Cart Item */
li {
    background: #C0C9EE; /* Changed to light purple #C0C9EE */
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    position: relative;
    overflow: hidden;
}


        li:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        /* Course Image */
        .cart-img {
            max-width: 90px; /* Smaller image size */
            height: 90px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 12px; /* Slightly reduced margin */
        }

        /* Course Title */
        .cart-title {
            font-size: 1.2rem;  /* Smaller title font size */
            font-weight: 600;
            color: #7C3AED; 
            margin-bottom: 6px;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .cart-title:hover {
            color: #ffffff;
        }

        /* Course Description */
        .cart-description {
            font-size: 0.85rem;  /* Smaller description font size */
            color: #7C3AED; 
            margin-bottom: 12px;
            line-height: 1.4;  /* Slightly reduced line height */
        }

        /* Remove Button */
        .remove-btn {
            background: #7C3AED; /* Purple button */
            color: white;
            border: none;
            padding: 8px 18px; /* Slightly smaller padding */
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.85rem;  /* Smaller button font size */
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }

        .remove-btn:hover {
            background: #6D28D9;
            transform: scale(1.05);
        }

        /* Checkout Button */
        .checkout-btn {
            background: #34D399; /* Green */
            color: white;
            border: none;
            padding: 12px 24px; /* Smaller padding */
            border-radius: 12px;
            font-weight: 700;
            font-size: 1rem;  /* Adjusted font size */
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 30px;
            width: 100%;
        }

        .checkout-btn:hover {
            background: #10B981;
            transform: scale(1.05);
        }

        /* Empty Cart Message */
        .empty-cart {
            font-size: 1.2rem;  /* Smaller empty cart font size */
            color: #ffffff;
            text-align: center;
            margin-top: 50px;
            font-weight: 500;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            body {
                padding: 20px;
            }

            h2 {
                font-size: 1.8rem;  /* Smaller font size for mobile */
            }

            .cart-container {
                padding: 20px;
                width: 100%;
            }

            ul {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            li {
                padding: 15px;
            }

            .cart-title {
                font-size: 1.2rem;  /* Mobile title size */
            }

            .cart-description {
                font-size: 0.9rem;  /* Mobile description size */
            }
        }

    </style>
</head>
<body>

    <div class="cart-container">
        <h2>Your Cart</h2>

        <ul>
            @foreach ($cartItems as $item)
                <li>
                    <img src="{{ asset('storage/' . $item->course->image) }}" alt="Course Image" class="cart-img">
                    <a href="{{ route('user.course.modules', $item->course->id) }}" class="cart-title">{{ $item->course->title }}</a>
                    <p class="cart-description">{{ $item->course->description }}</p>
                    <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="width: 100%;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="remove-btn">Remove from Cart</button>
                    </form>
                </li>
            @endforeach
        </ul>

        @if($cartItems->count() == 0)
            <p class="empty-cart">Your cart is empty.</p>
        @else
            <form action="{{ route('cart.checkout') }}" method="POST">
                @csrf
                <button type="submit" class="checkout-btn">Proceed to Checkout</button>
            </form>
        @endif
    </div>

</body>
</html>
