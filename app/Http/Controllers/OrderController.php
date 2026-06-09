<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // List orders
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    // Order details
    public function show(Order $order)
    {
        // Security check (important)
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $order->load('items');

        return view('orders.show', compact('order'));
    }
}