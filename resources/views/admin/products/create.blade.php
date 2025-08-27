@extends('layouts.admin')

@section('title', 'Create Product')

@section('content')
<div class="max-w-5xl mx-auto bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-lg">
    <h2 class="text-3xl font-bold mb-6 text-gray-800 dark:text-gray-100">➕ Add New Product</h2>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200 text-red-700 dark:bg-red-900/30 dark:border-red-800 dark:text-red-300">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Name --}}
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300">Name <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="mt-2 w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-3">
            </div>

            {{-- Price --}}
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300">Price <span class="text-red-500">*</span></label>
                <input type="number" name="price" value="{{ old('price') }}" step="0.01" min="0" required
                    class="mt-2 w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-3">
            </div>

            {{-- Stock --}}
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300">Stock <span class="text-red-500">*</span></label>
                <input type="number" name="stock" value="{{ old('stock', 0) }}" min="0" required
                    class="mt-2 w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-3">
            </div>

            {{-- Category --}}
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300">Category <span class="text-red-500">*</span></label>
                <select name="category" required
                    class="mt-2 w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-3">
                    <option value="">-- Select Category --</option>
                    @foreach([
                        'Groceries','Dairy & Eggs','Bakery & Snacks','Beverages',
                        'Household Essentials','Personal Care','Health & Wellness',
                        'Meat & Seafood','Frozen Foods','Baby Care','Others'
                    ] as $category)
                        <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Brand --}}
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300">Brand</label>
                <input type="text" name="brand" value="{{ old('brand') }}"
                    class="mt-2 w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-3">
            </div>

            {{-- Country of Origin --}}
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300">Country of Origin</label>
                <input type="text" name="country_of_origin" value="{{ old('country_of_origin') }}"
                    class="mt-2 w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-3">
            </div>

            {{-- Barcode --}}
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300">Barcode</label>
                <input type="text" name="barcode" value="{{ old('barcode') }}"
                    class="mt-2 w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-3">
            </div>

            {{-- Expiry Date --}}
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300">Expiry Date <span class="text-red-500">*</span></label>
                <input type="date" name="expiry_date" value="{{ old('expiry_date') }}" required
                    class="mt-2 w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-3">
            </div>
        </div>

        {{-- Description --}}
        <div>
            <label class="block font-medium text-gray-700 dark:text-gray-300">Description</label>
            <textarea name="description" rows="4"
                class="mt-2 w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-3">{{ old('description') }}</textarea>
        </div>

        {{-- Image --}}
        <div>
            <label class="block font-medium text-gray-700 dark:text-gray-300">Product Image</label>
            <input type="file" name="image" accept="image/*"
                class="mt-2 w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-3">
        </div>

        {{-- Actions --}}
        <div class="flex items-center justify-between pt-6 border-t border-gray-200 dark:border-gray-700">
            <a href="{{ route('admin.products.index') }}"
               class="px-4 py-2 rounded-xl bg-gray-200 text-gray-700 hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 transition">
               Cancel
            </a>
            <button type="submit"
               class="px-6 py-2 rounded-xl bg-blue-600 text-white font-medium shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 transition">
               Create Product
            </button>
        </div>
    </form>
</div>
@endsection
