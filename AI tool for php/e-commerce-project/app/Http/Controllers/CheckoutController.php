<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('shop')->with('error', 'Your cart is empty.');
        }

        $total = 0;
        foreach ($cartItems as $item) {
            $price = $item->product->discount_price ?? $item->product->price;
            $total += $price * $item->quantity;
        }

        return view('frontend.checkout', compact('cartItems', 'total'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
        ]);

        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('shop')->with('error', 'Your cart is empty.');
        }

        $total = 0;
        foreach ($cartItems as $item) {
            $price = $item->product->discount_price ?? $item->product->price;
            $total += $price * $item->quantity;
            
            // Deduct stock
            if ($item->product->stock_quantity >= $item->quantity) {
                 $item->product->decrement('stock_quantity', $item->quantity);
            }
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'total_price' => $total,
            'status' => 'pending',
            'payment_method' => 'COD',
        ]);

        foreach ($cartItems as $item) {
            $price = $item->product->discount_price ?? $item->product->price;
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'price' => $price,
                'quantity' => $item->quantity,
            ]);
        }

        // Clear user cart
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('user.orders')->with('success', 'Order placed successfully using Cash on Delivery.');
    }
}
