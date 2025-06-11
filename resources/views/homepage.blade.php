<!DOCTYPE html>
<html>
<head>
    <title>EDVANTAGE</title>

         @if(session('success'))
    <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border: 1px solid #c3e6cb;">
        {{ session('success') }}
    </div>
    @endif
    
</head>
<body>
     @php
        $lastName = explode(' ', $user->name);
        $lastName = end($lastName); 
    @endphp

    <h2>Welcome, {{ $lastName }} 👋</h2>

     <a href="{{ route('cart.all') }}"> 🛒 </a>
     <a href="{{ route('wishlist.all') }}">  🖤 </a> |




    <ul>
        <li><a href="{{ route('profile') }}">View Profile</a></li>
        <li><a href="{{ route('courses.enrolled') }}">Courses Enrolled</a></li>
        <li><a href="{{route('courses.all')}}">All Courses</a></li>
        <li><a href="/user/dashboard">Dashboard</a></li>
        <li><a href="/purchase_history">Purchase History</a></li>
    </ul>
<form action="{{ route('logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit">Logout</button>
</form>
</body>
</html>
