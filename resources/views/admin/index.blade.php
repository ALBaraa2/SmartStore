@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<h1>Welcome, Admin!</h1>
<p>Manage users, orders, and products from here.</p>
<ul>
    <li><a href="/admin/users">Manage Users</a></li>
    <li><a href="/admin/orders">Manage Orders</a></li>
    <li><a href="/admin/products">Manage Products</a></li>
</ul>
@endsection
