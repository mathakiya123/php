@extends('layouts.app')

@section('title', $product->name . ' - LaraShop')

@section('content')
<div class="container my-5">
    <nav aria-label="breadcrumb mb-4">
        <ol class="breadcrumb bg-transparent p-0 m-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('shop') }}" class="text-decoration-none text-muted">Shop</a></li>
            <li class="breadcrumb-item"><a href="{{ route('category.products', $product->category->slug) }}" class="text-decoration-none text-muted">{{ $product->category->name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="row border-0 bg-white rounded-4 shadow-sm align-items-center g-0 overflow-hidden mb-5">
        <div class="col-md-6 bg-light text-center">
            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid" alt="{{ $product->name }}" style="max-height: 600px; object-fit: contain;">
            @else
                <div class="d-flex align-items-center justify-content-center" style="height: 500px;">
                    <i class="bi bi-image text-muted" style="font-size: 8rem;"></i>
                </div>
            @endif
        </div>
        <div class="col-md-6 p-4 p-md-5">
            @if($product->discount_price)
                <span class="badge bg-danger rounded-pill px-3 py-2 mb-3 shadow-sm">SALE</span>
            @endif
            <h1 class="fw-bold display-6 mb-3">{{ $product->name }}</h1>
            
            <div class="price mb-4">
                @if($product->discount_price)
                    <span class="text-danger fw-bold fs-2">${{ number_format($product->discount_price, 2) }}</span>
                    <span class="text-muted text-decoration-line-through fs-4 ms-2">${{ number_format($product->price, 2) }}</span>
                @else
                    <span class="text-dark fw-bold fs-2">${{ number_format($product->price, 2) }}</span>
                @endif
            </div>

            <p class="lead text-muted mb-4">{{ $product->description ?? 'No description available for this product.' }}</p>

            <div class="mb-4">
                <span class="text-muted"><i class="bi bi-check-circle-fill text-success me-2"></i> {{ $product->stock_quantity > 0 ? $product->stock_quantity . ' in stock' : 'Out of stock' }}</span>
            </div>

            <form action="{{ route('cart.add') }}" method="POST" class="d-flex align-items-center mb-4">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="input-group me-3" style="width: 130px;">
                    <button class="btn btn-outline-secondary px-3" type="button" onclick="document.getElementById('quantity').value = Math.max(1, parseInt(document.getElementById('quantity').value) - 1)">-</button>
                    <input type="number" name="quantity" id="quantity" class="form-control text-center text-dark fw-bold" value="1" min="1" max="{{ $product->stock_quantity }}">
                    <button class="btn btn-outline-secondary px-3" type="button" onclick="document.getElementById('quantity').value = Math.min({{ $product->stock_quantity }}, parseInt(document.getElementById('quantity').value) + 1)">+</button>
                </div>
                <button type="submit" class="btn btn-primary btn-lg px-5 py-3 rounded-pill shadow-sm" {{ $product->stock_quantity <= 0 ? 'disabled' : '' }}>
                    <i class="bi bi-bag-plus me-2"></i> Add to Cart
                </button>
            </form>
            
            <hr class="text-light my-4">
            
            <div class="text-muted small">
                <p class="mb-1"><strong>Category:</strong> <a href="{{ route('category.products', $product->category->slug) }}" class="text-decoration-none">{{ $product->category->name }}</a></p>
                @if($product->subcategory)
                    <p class="mb-0"><strong>Subcategory:</strong> {{ $product->subcategory->name }}</p>
                @endif
            </div>
        </div>
    </div>

    @if($relatedProducts->count() > 0)
        <h3 class="fw-bold mb-4 mt-5 pt-3">Related Products</h3>
        <div class="row g-4">
            @foreach($relatedProducts as $related)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card product-card h-100">
                        <a href="{{ route('product.details', $related->slug) }}" class="text-decoration-none text-dark">
                            @if($related->image)
                                <img src="{{ asset('storage/'.$related->image) }}" class="card-img-top" alt="{{ $related->name }}">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                                    <i class="bi bi-image text-muted fs-1"></i>
                                </div>
                            @endif
                            <div class="card-body">
                                <h6 class="card-title fw-bold text-truncate">{{ $related->name }}</h6>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="text-dark fw-bold fs-6">${{ number_format($related->discount_price ?? $related->price, 2) }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
