<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $orders = Order::with(['customer', 'product', 'deliveryPersonnel'])->latest()->paginate(52);
            return view('admin.orders.index', compact('orders'));
        } else {
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }
    }
}
