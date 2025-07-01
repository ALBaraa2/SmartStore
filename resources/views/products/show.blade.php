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
                        src="{{ $product->image ?? 'https://via.placeholder.com/600x400.png?text=No+Image' }}" 
                        alt="{{ $product->name }}" 
                        class="rounded-xl shadow-md w-full h-auto"
                    >
                    <div class="absolute top-4 right-4 bg-blue-500 text-white rounded-full p-2 shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h11M9 21V3M21 10H13m0 0l-4 4m4-4l4-4" />
                        </svg>
                    </div>
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

                    <!-- Quantity Selector -->
                    <div class="mt-6">
                        <label for="quantity" class="block text-gray-700 font-medium mb-2 flex items-center">
                            <img 
                                src="{{ asset('icons/quantity.png') }}" 
                                alt="Quantity Icon" 
                                class="h-6 w-6 mr-2"
                            >
                            Quantity
                        </label>
                        <div class="flex items-center space-x-2">
                            <button 
                                type="button" 
                                id="decrement" 
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg transition-colors duration-200"
                            >
                                -
                            </button>
                            <input 
                                type="number" 
                                id="quantity" 
                                name="quantity" 
                                value="1" 
                                min="1" 
                                max="{{ $product->stock }}" 
                                class="w-16 text-center border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2"
                            >
                            <button 
                                type="button" 
                                id="increment" 
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg transition-colors duration-200"
                            >
                                +
                            </button>
                        </div>
                    </div>

                    <!-- JavaScript for Quantity Controls -->
                    <script>
                        const decrementButton = document.getElementById('decrement');
                        const incrementButton = document.getElementById('increment');
                        const quantityInput = document.getElementById('quantity');

                        decrementButton.addEventListener('click', () => {
                            if (quantityInput.value > 1) {
                                quantityInput.value--;
                            }
                        });

                        incrementButton.addEventListener('click', () => {
                            if (quantityInput.value < {{ $product->stock }}) {
                                quantityInput.value++;
                            }
                        });

                        quantityInput.addEventListener('input', () => {
                            if (quantityInput.value < 1) {
                                quantityInput.value = 1;
                            } else if (quantityInput.value > {{ $product->stock }}) {
                                quantityInput.value = {{ $product->stock }};
                            }
                        });
                    </script>

                    <!-- Purchase Button -->
                    <div class="mt-6">
                        <form action="#" method="POST">
                            @csrf
                            <input type="hidden" name="quantity" id="form-quantity" value="1">
                            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-3 rounded-lg shadow-md transition-all duration-300">
                                Add to Cart
                            </button>
                        </form>
                    </div>
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

    <script>
        document.getElementById('quantity').addEventListener('input', function (e) {
            document.getElementById('form-quantity').value = e.target.value;
        });
    </script>
@endsection
