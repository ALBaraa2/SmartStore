@extends('layouts.app')

@section('title', 'Customer Dashboard')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Welcome, Customer!</h1>
        <p class="text-gray-600 mb-6">Browse and purchase products from our latest collection.</p>
        
        @if ($products->count() > 0)
            <p class="text-gray-700 mb-4">{{ $products->total() }} products found.</p>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div class="bg-white rounded-lg shadow p-4">
                        <h2 class="text-lg font-semibold mb-2">{{ $product->name }}</h2>
                        <p class="text-gray-500 text-sm mb-4">{{ $product->description }}</p>
                        <p class="text-blue-600 font-bold mb-4">${{ number_format($product->price, 2) }}</p>
                        <a href="/products/{{ $product->id }}" class="btn bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            View Details
                        </a>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-6">
                {{ $products->links('pagination::tailwind') }}
            </div>
        @else
            <p class="text-gray-500">No products found. Try searching for something else!</p>
        @endif
    </div>
@endsection
