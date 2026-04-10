<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::latest()->take(8)->get();
        $categories = Category::with('subcategories')->get();
        return view('frontend.home', compact('featuredProducts', 'categories'));

        
    }

    public function shop()
    {
        $products = Product::latest()->paginate(12);
        $categories = Category::all();
        return view('frontend.shop', compact('products','categories'));
    }

    public function productDetails($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $relatedProducts = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->take(4)->get();
        return view('frontend.product', compact('product', 'relatedProducts'));
    }

    public function categoryProducts($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = Product::where('category_id', $category->id)->paginate(12);
        return view('frontend.shop', compact('products', 'category'));
    }

    public function myOrders()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->get();
        return view('frontend.orders', compact('orders'));
    }
}
