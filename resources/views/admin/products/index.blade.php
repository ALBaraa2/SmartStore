@extends('layouts.admin')

@section('title', 'Products')

@section('content')
    <div class="container mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">All Products</h1>
            <a href="{{ route('admin.products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Add Product
            </a>
        </div>

        <form method="GET" action="{{ route('admin.products.index') }}" class="mb-6">
            <div class="flex gap-2">
                <input
                    type="text"
                    name="title"
                    value="{{ request('title') }}"
                    placeholder="Search products..."
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2"
                >
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                    Search
                </button>
            </div>
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="text-left px-4 py-2">#</th>
                        <th class="text-left px-4 py-2">Name</th>
                        <th class="text-left px-4 py-2">Price</th>
                        <th class="text-left px-4 py-2">Stock</th>
                        <th class="text-left px-4 py-2">Category</th>
                        <th class="text-left px-4 py-2">Brand</th>
                        <th class="text-left px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $product->name }}</td>
                            <td class="px-4 py-2">${{ $product->price }}</td>
                            <td class="px-4 py-2">{{ $product->stock }}</td>
                            <td class="px-4 py-2">{{ $product->category }}</td>
                            <td class="px-4 py-2">{{ $product->brand }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('admin.products.show', $product) }}" class="text-blue-600 hover:underline">View</a> |
                                <a href="{{ route('admin.products.edit', $product) }}" class="text-yellow-600 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-4 text-center text-gray-500">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>
@endsection
