@extends('layouts.app')

@section('title', 'Customer Dashboard')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-extrabold text-gray-800 mb-6 text-center">Welcome, Customer!</h1>
        <p class="text-gray-600 text-lg text-center mb-8">Discover our exclusive collection of products and find your next favorite item.</p>

        @if ($products->count() > 0)
            <p class="text-gray-700 text-center text-xl mb-6">{{ $products->total() }} products found.</p>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($products as $product)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <img 
                            src="{{ $product->image ?? 'https://via.placeholder.com/300x200.png?text=No+Image' }}" 
                            alt="{{ $product->name }}" 
                            class="w-full h-48 object-cover"
                        >
                        <div class="p-4">
                            <h2 class="text-xl font-semibold text-gray-800 truncate mb-2">{{ $product->name }}</h2>
                            <p class="text-gray-600 text-sm line-clamp-2 mb-4">{{ $product->description }}</p>
                            <p class="text-blue-600 font-bold text-lg mb-4">${{ number_format($product->price, 2) }}</p>
                            <a href="/products/{{ $product->id }}" class="block text-center bg-blue-500 text-white font-medium py-2 rounded hover:bg-blue-600 transition-colors duration-300">
                                View Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-10">
                {{ $products->links('pagination::tailwind') }}
            </div>
        @else
            <p class="text-gray-500 text-center text-xl">No products found. Try searching for something else!</p>
        @endif
    </div>
@endsection
