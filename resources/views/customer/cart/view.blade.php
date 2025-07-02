@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Your Cart</h1>
        @if (@isset($info))
            <p class="text-gray-500 text-lg text-center">{{ $info }} Start adding some items!</p>
            <div class="text-center mt-6">
                <a href="{{ route('home') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg">Browse Products</a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg shadow-lg">
                    <thead>
                        <tr class="bg-gray-800 text-white">
                            <th class="py-3 px-6 text-center">Pay Now</th>
                            <th class="py-3 px-6 text-left">Product</th>
                            <th class="py-3 px-6 text-center">Quantity</th>
                            <th class="py-3 px-6 text-right">Price</th>
                            <th class="py-3 px-6 text-right">Subtotal</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                            @php $subtotal = $item->product->price * $item->quantity; @endphp
                            @php $totalPrice += $subtotal; @endphp
                            <tr class="border-b">
                                <td class="py-3 px-6 text-center">
                                    <div class="inline-flex items-center">
                                        <label class="flex items-center cursor-pointer relative">
                                            <input 
                                                type="checkbox" 
                                                class="pay-now-checkbox peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-blue-600 checked:border-blue-600" 
                                                data-id="{{ $item->id }}" 
                                                data-price="{{ $item->product->price }}" 
                                                data-quantity="{{ $item->quantity }}"
                                                checked
                                            >
                                            <span class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor" stroke-width="1">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            </span>
                                        </label>
                                    </div>
                                </td>
                                <td class="py-3 px-6">
                                    <div class="flex items-center">
                                        <img 
                                            src="{{ $item->product->image ?? asset('icons/noImage.png') }}" 
                                            alt="{{ $item->product->name }}"
                                            class="w-16 h-16 rounded-lg mr-4"
                                        >
                                        <span class="text-gray-800">{{ $item->product->name }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center space-x-2">
                                        <button 
                                            type="button" 
                                            class="decrement bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg transition-colors duration-200"
                                        >
                                            -
                                        </button>
                                        <input 
                                            type="number" 
                                            class="quantity w-16 text-center border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2"
                                            value="1" 
                                            min="1" 
                                            data-stock="{{ $item->product->stock }}" 
                                            data-id="{{ $item->id }}"
                                            data-price="{{ $item->product->price }}"
                                        >
                                        <button 
                                            type="button" 
                                            class="increment bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg transition-colors duration-200"
                                        >
                                            +
                                        </button>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-right">${{ number_format($item->product->price, 2) }}</td>
                                <td class="py-3 px-6 text-right subtotal">
                                    ${{ number_format($subtotal == 0 ? $item->product->price : $subtotal, 2) }}
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="customer_id" value="{{ $item->customer_id }}">
                                        <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                        <button 
                                            type="submit" 
                                            class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-lg"
                                        >
                                            Remove
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 text-right">
                <p class="text-xl font-bold text-gray-800">Total: <span id="total-price">${{ number_format($totalPrice, 2) }}</span></p>
                <a href="#" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg mt-4 inline-block">
                    Proceed to Checkout
                </a>
            </div>
        @endif
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const cartRows = document.querySelectorAll('tbody tr');
        const totalPriceElement = document.getElementById('total-price');

        function updateTotalPrice() {
            let totalPrice = 0;

            document.querySelectorAll('.pay-now-checkbox').forEach(checkbox => {
                if (checkbox.checked) { // فقط العناصر المحددة
                    const quantity = parseInt(checkbox.dataset.quantity) || 0;
                    const price = parseFloat(checkbox.dataset.price) || 0;
                    totalPrice += quantity * price;
                }
            });

            totalPriceElement.textContent = `$${totalPrice.toFixed(2)}`;
        }

        cartRows.forEach(row => {
            const decrementButton = row.querySelector('.decrement');
            const incrementButton = row.querySelector('.increment');
            const quantityInput = row.querySelector('.quantity');
            const subtotalElement = row.querySelector('.subtotal');
            const checkbox = row.querySelector('.pay-now-checkbox');
            const price = parseFloat(quantityInput.dataset.price) || 0;
            const stock = parseInt(quantityInput.dataset.stock) || 0;

            function updateSubtotal() {
                let quantity = parseInt(quantityInput.value);

                if (isNaN(quantity) || quantity < 1) {
                    quantity = 1;
                    quantityInput.value = 1;
                } else if (quantity > stock) {
                    quantity = stock;
                    quantityInput.value = stock;
                }

                const subtotal = quantity * price;
                subtotalElement.textContent = `$${subtotal.toFixed(2)}`;

                // مزامنة كمية الدفع مع التشيك بوكس
                checkbox.dataset.quantity = quantity;

                // حدث السعر الكلي
                updateTotalPrice();
            }

            decrementButton.addEventListener('click', () => {
                let currentQty = parseInt(quantityInput.value);
                if (currentQty > 1) {
                    quantityInput.value = currentQty - 1;
                    updateSubtotal();
                }
            });

            incrementButton.addEventListener('click', () => {
                let currentQty = parseInt(quantityInput.value);
                if (currentQty < stock) {
                    quantityInput.value = currentQty + 1;
                    updateSubtotal();
                } else {
                    alert("You can't add more than the available stock.");
                }
            });

            quantityInput.addEventListener('change', () => {
                updateSubtotal();
            });

            checkbox.addEventListener('change', () => {
                updateTotalPrice();
            });

            // ضبط القيمة الأولية
            updateSubtotal();
        });
    });
</script>

@endsection
