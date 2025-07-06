@php
    use App\Models\Product;
    use App\Models\User;
    use App\Models\Order;
@endphp

@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Welcome, {{ auth()->user()->name }} 👋</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Total Products</h2>
            <p class="text-3xl font-bold text-blue-600">{{ Product::count() }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Users Registered</h2>
            <p class="text-3xl font-bold text-green-600">{{ User::totalCustomers() }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Orders Delivered</h2>
            <p class="text-3xl font-bold text-yellow-600">{{ Order::DeliveredOrders() }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Pending Orders</h2>
            <p class="text-3xl font-bold text-red-600">{{ Order::PendingOrders() }}</p>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4">Quick Actions</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="#" class="bg-blue-500 text-white text-center py-3 rounded-lg hover:bg-blue-600 transition">+ Add New Product</a>
            <a href="#" class="bg-green-500 text-white text-center py-3 rounded-lg hover:bg-green-600 transition">View All Users</a>
            <a href="#" class="bg-yellow-500 text-white text-center py-3 rounded-lg hover:bg-yellow-600 transition">Manage Orders</a>
        </div>
    </div>
@endsection
