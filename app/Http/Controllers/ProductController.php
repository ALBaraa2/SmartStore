<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

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
        $inCart = $this->inCart($product);
        return view('products.show', compact('product', 'inCart'));
    }

    private function inCart(Product $product): bool
    {
        return auth()->check() ? auth()->user()->cartItems()->where('product_id', $product->id)->exists() : false;
    }
}
