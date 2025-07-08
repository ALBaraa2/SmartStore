@extends('layouts.admin')

@section('title', 'Orders')

@section('content')
    <div class="container mx-auto">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-2">
                <img src="{{ asset('icons/orders.png') }}" alt="Order Icon" class="w-8 h-8">
                <h1 class="text-2xl font-bold">All Orders</h1>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="text-left px-4 py-2">#</th>
                        <th class="text-left px-4 py-2">Customer</th>
                        <th class="text-left px-4 py-2">Products</th>
                        <th class="text-left px-4 py-2">Qty</th>
                        <th class="text-left px-4 py-2">Total Price</th>
                        <th class="text-left px-4 py-2">Status</th>
                        <th class="text-left px-4 py-2">Delivery</th>
                        <th class="text-left px-4 py-2">Placed At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $order->customer->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2">
                                {{ $order->purchases->count() }} items
                            </td>
                            <td class="px-4 py-2">{{ $order->Quantity($order->id) }}</td>
                            <td class="px-4 py-2">${{ number_format($order->total_price, 2) }}</td>
                            <td class="px-4 py-2">
                                <span class="inline-block px-2 py-1 text-sm rounded-full 
                                    @if($order->status === 'delivered') bg-green-100 text-green-700
                                    @elseif($order->status === 'cancelled') bg-red-100 text-red-700
                                    @elseif($order->status === 'returned') bg-yellow-100 text-yellow-800
                                    @else bg-blue-100 text-blue-700 @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-2">{{ $order->deliveryPersonnel->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2 text-sm text-gray-600">{{ $order->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-4 py-4 text-center text-gray-500">No orders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    </div>
@endsection
