<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = [];
        $total = 0;

        if (Auth::check()) {
            $items = Cart::with('product')->where('user_id', Auth::id())->get();
            foreach ($items as $item) {
                $price = $item->product->discount_price ?? $item->product->price;
                $cartItems[] = [
                    'id' => $item->id,
                    'product_id' => $item->product_id,
                    'name' => $item->product->name,
                    'price' => $price,
                    'quantity' => $item->quantity,
                    'image' => $item->product->image,
                ];
                $total += $price * $item->quantity;
            }
        } else {
            $sessionCart = session()->get('cart', []);
            foreach ($sessionCart as $id => $details) {
                $cartItems[] = [
                    'id' => $id, // Use product_id as identifier for session
                    'product_id' => $id,
                    'name' => $details['name'],
                    'price' => $details['price'],
                    'quantity' => $details['quantity'],
                    'image' => $details['image'],
                ];
                $total += $details['price'] * $details['quantity'];
            }
        }

        return view('frontend.cart', compact('cartItems', 'total'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);
        $quantity = $request->quantity ?? 1;

        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->where('product_id', $product->id)->first();
            if ($cart) {
                $cart->increment('quantity', $quantity);
            } else {
                Cart::create([
                    'user_id' => Auth::id(),
                    'product_id' => $product->id,
                    'quantity' => $quantity
                ]);
            }
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$product->id])) {
                $cart[$product->id]['quantity'] += $quantity;
            } else {
                $cart[$product->id] = [
                    'name' => $product->name,
                    'price' => $product->discount_price ?? $product->price,
                    'image' => $product->image,
                    'quantity' => $quantity
                ];
            }
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'quantity' => 'required|integer|min:1'
        ]);

        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->where('id', $request->id)->firstOrFail();
            $cart->update(['quantity' => $request->quantity]);
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$request->id])) {
                $cart[$request->id]['quantity'] = $request->quantity;
                session()->put('cart', $cart);
            }
        }

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    public function remove(Request $request)
    {
        $request->validate(['id' => 'required']);

        if (Auth::check()) {
            Cart::where('user_id', Auth::id())->where('id', $request->id)->delete();
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
        }

        return redirect()->back()->with('success', 'Product removed from cart!');
    }
}
