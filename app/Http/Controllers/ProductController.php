<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request) //Main Page with all products
    {
        $title = $request->input('title');

        $products = Product::whereAny([
            'name',
            'category',
            'brand'], 'ILike', "%{$title}%")->orderBy('updated_at', 'desc');

        $cacheKey = 'product:' . $title . ':' . ':page:' . $request->input('page', 1);

        $products = Cache::remember($cacheKey, 3600, function () use ($products) {
            return $products->paginate(52);
        });

        if (auth()->check() && auth()->user()->role === 'admin') {
            return view('admin.products.index', compact('products'));
        } else {
            return view('customer.index', compact('products'));
        }
    }

    public function show(Product $product)
    {
        if (auth()->check() && auth()->user()->role === 'admin') {
            return view('admin.products.show', compact('product'));

        } else {
            $inCart = $this->inCart($product);
            return view('products.show', compact('product', 'inCart'));
        }
    }

    public function create()
    {
        if (auth()->check() && auth()->user()->role === 'admin') {
            return view('admin.products.create');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function store(Request $request)
    {
        if (auth()->check() && auth()->user()->role === 'admin') {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'stock' => 'required|integer|min:0',
                'category' => 'required|string|max:255',
                'brand' => 'nullable|string|max:255',
                'country_of_origin' => 'nullable|string|max:255',
                'barcode' => 'nullable|string|max:255',
                'expiry_date' => 'nullable|date',
            ]);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('products', 'public');
                $validated['image'] = $imagePath;
            }

            Product::create($validated);
            return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function edit(Product $product) 
    {
        if (auth()->check() && auth()->user()->role === 'admin') {
            return view('admin.products.edit', compact('product'));
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function update(Product $product, Request $request)
    {
        if (auth()->check() && auth()->user()->role === 'admin') {

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'category' => 'required|string|max:255',
                'brand' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'country_of_origin' => 'nullable|string|max:255',
                'expiry_date' => 'nullable|date',
            ]);

            // إذا في صورة، خزنها بشكل دائم
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('products', 'public');
                $validated['image'] = $imagePath;
            }

            $product->update($validated);
            return redirect()->route('admin.products.show', $product)->with('success', 'Product updated successfully.');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    private function inCart(Product $product): bool
    {
        return auth()->check() ? auth()->user()->cartItems()->where('product_id', $product->id)->exists() : false;
    }
}
