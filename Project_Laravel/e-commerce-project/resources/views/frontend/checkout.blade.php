@extends('layouts.app')

@section('title', 'Checkout - LaraShop')

@section('content')
<div class="container my-5">
    <h2 class="fw-bold mb-4">Secure Checkout</h2>

    <div class="row g-5">
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-md-5">
                    <h4 class="fw-bold border-bottom pb-3 mb-4">Shipping Details</h4>
                    
                    <form action="{{ route('checkout.process') }}" method="POST" id="checkoutForm">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="form-label fw-medium text-muted">Full Name</label>
                            <input type="text" class="form-control form-control-lg bg-light border-0 @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                         <div class="mb-4">
                            <label for="phone" class="form-label fw-medium text-muted">Phone Number</label>
                            <input type="text" class="form-control form-control-lg bg-light border-0 @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="address" class="form-label fw-medium text-muted">Delivery Address</label>
                            <textarea class="form-control form-control-lg bg-light border-0 @error('address') is-invalid @enderror" id="address" name="address" rows="3" required>{{ old('address') }}</textarea>
                            @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        
                        <h4 class="fw-bold border-bottom pb-3 mb-4 mt-5">Payment Method</h4>
                        <div class="form-check mb-4 p-3 bg-light rounded-3 border">
                            <input class="form-check-input ms-2" type="radio" name="payment_method" id="paymentCOD" value="COD" checked>
                            <label class="form-check-label fw-bold ms-2" for="paymentCOD">
                                Cash on Delivery (COD)
                            </label>
                            <div class="text-muted small ms-2 mt-1">Pay with cash upon delivery.</div>
                        </div>


                            <div class="form-check mb-4 p-3 bg-light rounded-3 border">
    <input class="form-check-input ms-2" type="radio" name="payment_method" id="paymentRazor" value="Razorpay">
    <label class="form-check-label fw-bold ms-2" for="paymentRazor">
        Pay Online (Razorpay)
    </label>
    <div class="text-muted small ms-2 mt-1">Pay securely using Razorpay.</div>
</div>
                        <div class="d-grid mt-5">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow">Place Order Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm rounded-4 bg-light">
                <div class="card-body p-4 p-md-5">
                    <h4 class="fw-bold mb-4">Order Summary</h4>
                    
                    <div class="mb-4">
                        @foreach($cartItems as $item)
                            <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom border-white">
                                <div class="d-flex align-items-center">
                                    <div class="position-relative me-3">
                                        @if($item->product->image)
                                            <img src="{{ asset('storage/'.$item->product->image) }}" class="rounded shadow-sm" style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <div class="bg-white rounded d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                                                <i class="bi bi-image text-muted"></i>
                                            </div>
                                        @endif
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark border border-light">
                                            {{ $item->quantity }}
                                        </span>
                                    </div>
                                    <span class="fw-medium text-dark">{{ $item->product->name }}</span>
                                </div>
                                <span class="fw-bold">${{ number_format(($item->product->discount_price ?? $item->product->price) * $item->quantity, 2) }}</span>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="d-flex justify-content-between mb-3 text-muted">
                        <span>Subtotal</span>
                        <span>${{ number_format($total, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3 text-muted">
                        <span>Shipping</span>
                        <span>Free</span>
                    </div>
                    
                    <hr class="border-secondary my-4">
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fs-5 fw-bold text-dark">Total</span>
                        <span class="fs-4 fw-bold text-primary">${{ number_format($total, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
