<!DOCTYPE html>
<html>
<head>
    <title>EDVANTAGE</title>
</head>
<body>
     @php
        $lastName = explode(' ', $user->name);
        $lastName = end($lastName); 
    @endphp

    <h2>Welcome, {{ $lastName }} 👋</h2>

     <a href="#">Wishlist</a> |
     <a href="#">Cart</a>

    <ul>
        <li><a href="/user/details">My profile</a></li>
        <li><a href="/courses/enrolled">Courses Enrolled</a></li>
        <li><a href="/courses/all">All Courses</a></li>
        <li><a href="/user/dashboard">Dashboard</a></li>
        <li><a href="/purchase_history">Purchase History</a></li>
    </ul>
<form action="{{ route('logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit">Logout</button>
</form>
</body>
</html>
