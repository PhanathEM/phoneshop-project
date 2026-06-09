<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart');

        if (!$cart || count($cart) == 0) {
            return redirect('/')->with('error', 'Cart is empty');
        }

        return view('checkout.index', compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'city' => 'required',
            'district' => 'required',
            'village' => 'required',
        ]);

        $cart = session('cart');
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $total,
            'status' => 'pending',
            'city' => $request->city,
            'district' => $request->district,
            'village' => $request->village,
        ]);

        foreach ($cart as $phoneId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'phone_id' => $phoneId,
                'phone_name' => $item['name'],
                'price' => $item['price'],
                'qty' => $item['qty'],
            ]);
        }

        session()->forget('cart');

        return redirect('/')->with('success', 'Order placed successfully!');
    }
}