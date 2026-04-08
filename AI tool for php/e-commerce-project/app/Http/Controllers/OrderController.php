<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function adminIndex()
    {
        $orders = Order::with('user')->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate(['status' => 'required|in:pending,processing,completed']);
        $order->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Order status updated to ' . ucfirst($request->status));
    }

    
}
