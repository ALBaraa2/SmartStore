<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index(Request $request) //Main Page with all products
    {
        $title = $request->input('title');

        $products = Product::whereAny([
            'name',
            'category',
            'brand'], 'like', "%{$title}%");

        $cacheKey = 'product:' . $title . ':' . ':page:' . $request->input('page', 1);

        $products = Cache::remember($cacheKey, 10, function () use ($products) {
            return $products->paginate(32);
        });

        return view('customer.index', compact('products'));
    }

    public function show(Product $product)
    {
        $user = 7;
        $user = User::findOrFail($user); //This is for testing purposes, replace with auth()->user() in production
        // dd($product->id);
        // $inCart = auth()->check() ? auth()->user()->cart->contains('product_id', $product->id) : false;
        $inCart = $user->cartItems()->where('product_id', $product->id)->exists();
        return view('products.show', compact('product', 'inCart'));
    }
}
