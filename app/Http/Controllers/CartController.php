<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function viewCart()
    {
        $cartItrems = Cart::with(['customer', 'product'])->where('customer_id', '7')->get();

        $totalPrice = 0;

        foreach ($cartItrems as $item) {
            $totalPrice += $item->product->price;
        }

        return view('customer.cart.view', [
            'cartItems' => $cartItrems,
            'totalPrice' => $totalPrice,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function add(Product $product)
    {
        Cart::create([
            'customer_id' => 7, // User ID should be dynamic, this is just a placeholder
            'product_id' => $product->id,
        ]);

        return redirect()->route('products.show', $product)->with('success', 'Item added to cart successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function remove(Cart $cart)
    {
        $cart->delete();

        return redirect()->route('cart.view')->with('success', 'Item removed from cart successfully.');
    }
}
