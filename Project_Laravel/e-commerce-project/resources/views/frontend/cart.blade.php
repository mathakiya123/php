@extends('layouts.app')

@section('title', 'Shopping Cart - LaraShop')

@section('content')
<div class="container my-5">
    <h2 class="fw-bold mb-4">Your Shopping Cart</h2>

    @if(count($cartItems) > 0)
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" class="border-0">Product</th>
                                        <th scope="col" class="border-0">Price</th>
                                        <th scope="col" class="border-0 text-center">Quantity</th>
                                        <th scope="col" class="border-0 text-end">Total</th>
                                        <th scope="col" class="border-0 text-end"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartItems as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if($item['image'])
                                                        <img src="{{ asset('storage/'.$item['image']) }}" alt="{{ $item['name'] }}" class="rounded shadow-sm me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                                    @else
                                                        <div class="bg-light rounded d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
                                                            <i class="bi bi-image text-muted"></i>
                                                        </div>
                                                    @endif
                                                    <div>
                                                        <h6 class="mb-0 fw-bold">{{ $item['name'] }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>${{ number_format($item['price'], 2) }}</td>
                                            <td>
                                                <form action="{{ route('cart.update') }}" method="POST" class="d-flex justify-content-center">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                                                    <div class="input-group input-group-sm" style="width: 100px;">
                                                        <input type="number" name="quantity" class="form-control text-center bg-light border-0" value="{{ $item['quantity'] }}" min="1" onchange="this.form.submit()">
                                                    </div>
                                                </form>
                                            </td>
                                            <td class="text-end fw-bold">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                            <td class="text-end">
                                                <form action="{{ route('cart.remove') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                                                    <button type="submit" class="btn btn-sm text-danger btn-link p-0"><i class="bi bi-trash fs-5"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 position-sticky top-0" style="top: 100px !important;">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-4">Order Summary</h4>
                        <div class="d-flex justify-content-between mb-3 text-muted">
                            <span>Subtotal</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3 text-muted">
                            <span>Shipping</span>
                            <span>Free</span>
                        </div>
                        <hr class="my-4 border-light">
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="fw-bold mb-0">Total</h5>
                            <h5 class="fw-bold text-primary mb-0">${{ number_format($total, 2) }}</h5>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <a href="{{ route('checkout.index') }}" class="btn btn-primary btn-lg rounded-pill shadow-sm">Proceed to Checkout <i class="bi bi-lock text-white ms-1"></i></a>
                            <a href="{{ route('shop') }}" class="btn btn-outline-dark btn-lg rounded-pill mt-2">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-5 bg-white rounded-4 shadow-sm border-0">
            <i class="bi bi-cart-x text-muted" style="font-size: 5rem;"></i>
            <h3 class="fw-bold mt-4">Your cart is empty</h3>
            <p class="text-muted mb-4">Looks like you haven't added anything to your cart yet.</p>
            <a href="{{ route('shop') }}" class="btn btn-primary btn-lg rounded-pill px-5">Start Shopping</a>
        </div>
    @endif
</div>
@endsection
