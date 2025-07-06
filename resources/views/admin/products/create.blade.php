@extends('layouts.admin') {{-- assuming you’re using an admin layout --}}

@section('title', 'Create Product')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6">Add New Product</h2>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-medium">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="form-input w-full">
            </div>

            <div>
                <label class="block font-medium">Price</label>
                <input type="number" name="price" value="{{ old('price') }}" step="0.01" min="0" required class="form-input w-full">
            </div>

            <div>
                <label class="block font-medium">Stock</label>
                <input type="number" name="stock" value="{{ old('stock', 0) }}" min="0" required class="form-input w-full">
            </div>

            <div>
                <label class="block font-medium">Category</label>
                <select name="category" class="form-select w-full" required>
                    <option value="">-- Select Category --</option>
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
                        <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-medium">Brand</label>
                <input type="text" name="brand" value="{{ old('brand') }}" class="form-input w-full">
            </div>

            <div>
                <label class="block font-medium">Country of Origin</label>
                <input type="text" name="country_of_origin" value="{{ old('country_of_origin') }}" class="form-input w-full">
            </div>

            <div>
                <label class="block font-medium">Barcode</label>
                <input type="text" name="barcode" value="{{ old('barcode') }}" class="form-input w-full">
            </div>

            <div>
                <label class="block font-medium">Expiry Date</label>
                <input type="date" name="expiry_date" value="{{ old('expiry_date') }}" class="form-input w-full" required>
            </div>

            <div class="md:col-span-2">
                <label class="block font-medium">Description</label>
                <textarea name="description" rows="4" class="form-textarea w-full">{{ old('description') }}</textarea>
            </div>

            <div class="md:col-span-2">
                <label class="block font-medium">Product Image</label>
                <input type="file" name="image" accept="image/*" class="form-input w-full">
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create Product</button>
            <a href="{{ route('admin.products.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
        </div>
    </form>
</div>
@endsection
