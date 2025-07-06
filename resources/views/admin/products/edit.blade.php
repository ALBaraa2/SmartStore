@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">✏️ Edit Product</h1>

        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Product Name</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" required
                    class="w-full rounded border-gray-300 focus:ring focus:ring-blue-200" />
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" rows="4"
                    class="w-full rounded border-gray-300 focus:ring focus:ring-blue-200">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">Price ($)</label>
                    <input type="number" name="price" value="{{ old('price', $product->price) }}" step="0.01" required
                        class="w-full rounded border-gray-300 focus:ring focus:ring-blue-200" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">Stock</label>
                    <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" required
                        class="w-full rounded border-gray-300 focus:ring focus:ring-blue-200" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">Brand</label>
                    <input type="text" name="brand" value="{{ old('brand', $product->brand) }}"
                        class="w-full rounded border-gray-300 focus:ring focus:ring-blue-200" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">Country of Origin</label>
                    <input type="text" name="country_of_origin" value="{{ old('country_of_origin', $product->country_of_origin) }}"
                        class="w-full rounded border-gray-300 focus:ring focus:ring-blue-200" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">Expiry Date</label>
                    <input type="date" name="expiry_date" value="{{ old('expiry_date', \Carbon\Carbon::parse($product->expiry_date)->format('Y-m-d')) }}"
                        class="w-full rounded border-gray-300 focus:ring focus:ring-blue-200" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">Category</label>
                    <select name="category" class="w-full rounded border-gray-300 focus:ring focus:ring-blue-200">
                        @foreach([
                            'Groceries',
                            'Dairy & Eggs',
                            'Bakery & Snacks',
                            'Beverages',
                            'Household Essentials',
                            'Personal Care',
                            'Health & Wellness',
                            'Meat & Seafood',
                            'Frozen Foods',
                            'Baby Care',
                            'Others'
                        ] as $category)
                            <option value="{{ $category }}" {{ old('category', $product->category) === $category ? 'selected' : '' }}>
                                {{ $category }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Product Image</label>
                @if ($product->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Product image" class="w-32 rounded shadow" />
                    </div>
                @endif
                <input type="file" name="image" class="w-full border-gray-300 rounded" />
            </div>

            <div class="flex gap-4">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    💾 Save Changes
                </button>
                <a href="{{ route('admin.products.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
