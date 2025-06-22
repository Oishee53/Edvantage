<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Wishlist</title>
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

    h2 {
      font-size: 1.8rem;
      font-weight: 700;
      margin-bottom: 30px;
      text-align: center;
    }

    .wishlist-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 25px;
      max-width: 1200px;
      margin: auto;
    }

    .wishlist-item {
      background-color: #fff;
      border-radius: 16px;
      padding: 20px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      display: flex;
      flex-direction: column;
    }

    .wishlist-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .course-image {
      width: 100%;
      aspect-ratio: 16 / 9;
      object-fit: contain;
      border-radius: 20px;
      background-color: #000;
      padding: 4px;
      margin-bottom: 15px;
    }

    .course-title {
      font-size: 1.1rem;
      font-weight: 600;
      color: #1c1c1c;
      margin-bottom: 6px;
    }

    .course-price {
      font-size: 1rem;
      font-weight: bold;
      margin-bottom: 6px;
    }

    .course-description {
      font-size: 0.85rem;
      color: #555;
      margin-bottom: 12px;
      flex: 1;
    }

    .remove-btn {
      background-color: #a435f0;
      color: #fff;
      border: none;
      padding: 8px 14px;
      border-radius: 8px;
      font-size: 0.9rem;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .remove-btn:hover {
      background-color: #861de1;
    }

    .empty-message {
      text-align: center;
      font-size: 1.2rem;
      color: #444;
      padding-top: 60px;
    }

    @media (max-width: 600px) {
      .course-description {
        font-size: 0.8rem;
      }
    }
  </style>
</head>
<body>

  <h2>Your Wishlist</h2>

  @if($wishlistItems->count())
    <div class="wishlist-grid">
      @foreach ($wishlistItems as $item)
        <div class="wishlist-item">
          <img src="{{ asset('storage/' . $item->course->image) }}" alt="Course Image" class="course-image">
          <div class="course-title">{{ $item->course->title }}</div>
          <div class="course-price">${{ number_format($item->course->price, 2) }}</div>
          <div class="course-description">{{ $item->course->description }}</div>
          <form action="{{ route('wishlist.remove', $item->id) }}" method="POST" style="margin-top: auto;">
            @csrf
            @method('DELETE')
            <button type="submit" class="remove-btn">Remove</button>
          </form>
        </div>
      @endforeach
    </div>
  @else
    <p class="empty-message">Your wishlist is empty.</p>
  @endif

</body>
</html>
