<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $productsCount = Product::count();
        $ordersCount = Order::count();
        $usersCount = User::where('role', 'user')->count();
        $recentOrders = Order::latest()->take(5)->get();

        return view('admin.dashboard', compact('productsCount', 'ordersCount', 'usersCount', 'recentOrders'));
    }
}
