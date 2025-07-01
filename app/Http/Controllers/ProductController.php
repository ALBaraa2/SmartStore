<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index(Request $request)
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
        return view('products.show', compact('product'));
    }
}
