<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist - EDVANTAGE</title>
    <style>
        /* Global Styles */
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

        /* Wishlist Container */
        .wishlist-container {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
            text-align: center;
            color: #fff;
            background: rgba(255, 255, 255, 0.2); /* Slight transparent background */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(15px);
        }

        /* Header Style */
        h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 30px;
            color: #fff;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            font-family: 'Segoe UI', Arial, sans-serif;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        /* Wishlist Items Grid */
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
        }

        /* Individual Wishlist Item */
li {
    background: #C0C9EE; /* Updated to light purple #C0C9EE */
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
        .wishlist-img {
            max-width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        /* Course Title */
        .wishlist-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: #7C3AED; /* Light Blue-Purple */
            margin-bottom: 8px;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .wishlist-title:hover {
            color: #ffffff;
        }

        /* Course Description */
        .wishlist-description {
            font-size: 0.9rem;
            color: #ffffff; /* Light Grey */
            margin-bottom: 15px;
            line-height: 1.5;
        }

        /* Remove Button */
        .remove-btn {
            background: #7C3AED; /* Purple button */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }

        .remove-btn:hover {
            background: #6D28D9;
            transform: scale(1.05);
        }

        /* Empty Wishlist Message */
        .empty-wishlist {
            font-size: 1.2rem;
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
                font-size: 2rem;
            }

            .wishlist-container {
                padding: 20px;
                width: 100%;
            }

            ul {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            li {
                padding: 20px;
            }

            .wishlist-title {
                font-size: 1.2rem;
            }

            .wishlist-description {
                font-size: 0.85rem;
            }
        }

    </style>
</head>
<body>

    <div class="wishlist-container">
        <h2>Your Wishlist</h2>

        <ul>
            @foreach ($wishlistItems as $item)
                <li>
                    <img src="{{ asset('storage/' . $item->course->image) }}" alt="Course Image" class="wishlist-img">
                    <a href="{{ route('user.course.modules', $item->course->id) }}" class="wishlist-title">{{ $item->course->title }}</a>
                    <p class="wishlist-description">{{ $item->course->description }}</p>
                    <form action="{{ route('wishlist.remove', $item->id) }}" method="POST" style="width: 100%;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="remove-btn">Remove</button>
                    </form>
                </li>
            @endforeach
        </ul>

        @if($wishlistItems->count() == 0)
            <p class="empty-wishlist">Your wishlist is empty.</p>
        @endif
    </div>

</body>
</html>
