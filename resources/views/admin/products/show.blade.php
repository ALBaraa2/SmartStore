@extends('layouts.admin')

@section('title', 'Product Details')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.products.index') }}"
            class="inline-flex items-center gap-2 px-4 py-2 bg-white text-gray-700 text-sm font-medium border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Products
        </a>
    </div>

    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">🛒 Product Details</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Product Image --}}
            @if ($product->image)
                <div class="col-span-2 flex justify-center">
                    <img src="{{ asset('storage/' . $product->image) }}"
                         alt="{{ $product->name }}"
                         class="max-w-xs rounded border border-gray-300 shadow-sm">
                </div>
            @endif

            <div>
                <p class="text-sm text-gray-500">Product Name</p>
                <p class="text-lg font-semibold">{{ $product->name }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Category</p>
                <p class="text-lg font-semibold">{{ $product->category }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Price</p>
                <p class="text-lg font-semibold">${{ number_format($product->price, 2) }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Stock Quantity</p>
                <p class="text-lg font-semibold">{{ $product->stock }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Brand</p>
                <p class="text-lg font-semibold">{{ $product->brand ?? '-' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Country of Origin</p>
                <p class="text-lg font-semibold">{{ $product->country_of_origin ?? '-' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Barcode</p>
                <p class="text-lg font-semibold">{{ $product->barcode ?? '-' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Expiry Date</p>
                <p class="text-lg font-semibold">{{ \Carbon\Carbon::parse($product->expiry_date)->format('Y-m-d') }}</p>
            </div>

            <div class="col-span-2">
                <p class="text-sm text-gray-500">Description</p>
                <p class="text-gray-700 mt-2 whitespace-pre-line">{{ $product->description ?? 'No description.' }}</p>
            </div>

        </div>

        {{-- Action buttons --}}
        <div class="mt-8 flex gap-4">
            <a href="{{ route('admin.products.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
                ← Back
            </a>

            <a href="{{ route('admin.products.edit', $product) }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                ✏️ Edit
            </a>
        </div>
    </div>
@endsection
