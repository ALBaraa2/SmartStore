@extends('layouts.app')

@section('title', 'Customer Dashboard')

@section('content')
    <div class="container mx-auto p-6 bg-gray-100 rounded-lg shadow">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-6 text-center">Welcome, Customer!</h1>
        <p class="text-gray-600 text-lg text-center mb-8">Discover our exclusive collection of products and find your next favorite item.</p>

        @if ($products->count() > 0)
            <p class="text-gray-700 text-center text-lg mb-6">{{ $products->total() }} products found.</p>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div class="bg-gray-200 rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-200">
                        <img 
                            src="{{ $product->image ?? 'https://via.placeholder.com/300x200.png?text=No+Image' }}" 
                            alt="{{ $product->name }}" 
                            class="w-full h-48 object-cover"
                        >
                        <div class="p-4">
                            <h2 class="text-lg font-semibold text-gray-800 truncate mb-2">{{ $product->name }}</h2>
                            <p class="text-gray-600 text-sm line-clamp-2 mb-4">{{ $product->description }}</p>
                            <p class="text-green-500 font-bold text-lg mb-4">${{ number_format($product->price, 2) }}</p>
                            <a href="{{ route('products.show', $product) }}" class="block text-center bg-blue-500 text-white font-medium py-2 rounded hover:bg-blue-600 transition-colors duration-200">
                                View Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-8">
                {{ $products->links('pagination::tailwind') }}
            </div>
        @else
            <p class="text-gray-500 text-center text-lg">No products found. Try searching for something else!</p>
        @endif
    </div>
@endsection
