@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="container mx-auto p-6">
        <!-- Product Card -->
        <div class="bg-white border border-gray-200 rounded-2xl shadow-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Product Image -->
                <div class="relative">
                    <img 
                        src="{{ $product->image ? asset($product->image) : asset('icons/noImage.png') }}" 
                        alt="{{ $product->name }}" 
                        class="rounded-xl shadow-md w-full h-auto"
                    >
                </div>

                <!-- Product Details -->
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>
                    <p class="text-gray-600 text-lg mb-4">{{ $product->description }}</p>
                    <p class="text-green-600 font-bold text-2xl mb-4">${{ number_format($product->price, 2) }}</p>

                    <!-- Features -->
                    <ul class="space-y-3">
                        <li class="flex items-center">
                            <img 
                                src="{{ asset('icons/category.svg') }}" 
                                alt="Category Icon" 
                                class="h-5 w-5 mr-2"
                            >
                            <span>Category: <strong>{{ $product->category->name ?? 'N/A' }}</strong></span>
                        </li>
                        <li class="flex items-center">
                            <img 
                                src="{{ asset('icons/stock.png') }}"
                                alt="stock Icon" 
                                class="h-5 w-5 mr-2"
                            >
                            <span>Stock: <strong>{{ $product->stock > 0 ? $product->stock : 'Out of Stock' }}</strong></span>
                        </li>
                        <li class="flex items-center">
                            <img 
                                src="{{ asset('icons/sku.png') }}"
                                alt="SKU Icon" 
                                class="h-5 w-5 mr-2"
                            >
                            <span>SKU: <strong>{{ $product->sku ?? 'N/A' }}</strong></span>
                        </li>
                    </ul>

                    <!-- Purchase Button -->
                    @can('add-to-cart')
                        @if ($inCart)
                            <div class="mt-6">
                                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-sm mb-4" role="alert">
                                    <span class="font-semibold">Great choice!</span> This product is already in your cart.
                                </div>
                                
                                <a href="{{ route('cart.view') }}"
                                class="inline-block w-full text-center bg-gray-500 hover:bg-green-600 text-white font-semibold py-3 rounded-lg shadow-md transition duration-300">
                                    View Your Cart
                                </a>
                            </div>
                        @else
                            <div class="mt-6">
                                <form action="{{ route('cart.add', $product) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-3 rounded-lg shadow-md transition duration-300">
                                        Add to Cart
                                    </button>
                                </form>
                            </div>
                        @endif
                    @endcan

                    @cannot('add-to-cart')
                        <div class="mt-6">
                            <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded-lg shadow-sm mb-4" role="alert">
                                <span class="font-semibold">Notice:</span> You need to be logged in to add products to your cart.
                            </div>
                            
                            <a href="{{ route('login') }}"
                            class="inline-flex justify-center items-center gap-2 w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg shadow-md transition duration-300">
                                <img class="filter invert sepia saturate-500 hue-rotate-180 w-5" src="{{ asset('icons/login.png') }}" alt="Customer Profile" />
                                Login to Add to Cart
                            </a>
                        </div>
                    @endcannot
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-10 text-center">
                <a href="{{ route('home') }}" class="inline-flex items-center text-blue-500 hover:text-blue-600 font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back to Products
                </a>
            </div>
        </div>
    </div>
@endsection
