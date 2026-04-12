@extends('layouts.app')

@section('title', ' Electronics ecommerce- Your Premium Store')

@section('content')
<div class="container">
    <!-- Hero Section -->
    <div class="hero mb-5 px-4 text-center text-lg-start">
        <div class="row align-items-center">
            <div class="col-lg-6 px-lg-5 mb-4 mb-lg-0">
                <h1 class="display-4 fw-bold mb-3">Discover Premium Products</h1>
                <p class="lead text-white-  50 mb-4">Shop the latest trends in our curated collection. High quality, excellent design, delivered to your door.</p>
                <a href="{{ route('shop') }}" class="btn btn-primary btn-lg rounded-pill px-5 py-3 shadow-lg">Shop Now <i class="bi bi-arrow-right ms-2"></i></a>
            </div>
            <div class="col-lg-6 text-center">
                <!-- Using a visually appealing illustration placeholder or product group -->
                <i class="bi bi-bag-heart fw-light" style="font-size: 15rem; color: rgba(255,255,255,0.1);"></i>
            </div>
        </div>
    </div>

    <!-- Categories Section -->
    <div class="mb-5 mt-5">
        <h3 class="fw-bold mb-4">Shop by Category</h3>
        <div class="row g-4">
            @foreach($categories as $category)
            <div class="col-md-3 col-6">
                <a href="{{ route('category.products', $category->slug) }}" class="text-decoration-none">
                    <div class="card bg-white border-0 shadow-sm text-center py-4 rounded-4 category-card" style="transition: transform 0.3s;">
                        <div class="card-body">
                            <i class="bi bi-grid text-primary fs-1 mb-3"></i>
                            <h5 class="text-dark fw-bold mb-0">{{ $category->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Featured Products -->
    <div class="mt-5">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <h3 class="fw-bold mb-0">Featured Products</h3>
            <a href="{{ route('shop') }}" class="text-primary text-decoration-none fw-medium">View All <i class="bi bi-chevron-right"></i></a>
        </div>
        <div class="row g-4">
            @foreach($featuredProducts as $product)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card product-card h-100">
                        <a href="{{ route('product.details', $product->slug) }}" class="text-decoration-none text-dark">
                            @if($product->image)
                                <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                                    <i class="bi bi-image text-muted fs-1"></i>
                                </div>
                            @endif
                            <div class="card-body">
                                <span class="badge bg-light text-dark mb-2 border">{{ $product->category->name }}</span>
                                <h6 class="card-title fw-bold text-truncate">{{ $product->name }}</h6>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div class="price">
                                        @if($product->discount_price)
                                            <span class="text-danger fw-bold fs-5">${{ number_format($product->discount_price, 2) }}</span>
                                            <small class="text-muted text-decoration-line-through">${{ number_format($product->price, 2) }}</small>
                                        @else
                                            <span class="text-dark fw-bold fs-5">${{ number_format($product->price, 2) }}</span>
                                        @endif
                                    </div>
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="btn btn-sm btn-outline-dark rounded-circle" style="width: 35px; height: 35px;" title="Add to Cart">
                                            <i class="bi bi-cart-plus"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    .category-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important; }
</style>
@endsection
