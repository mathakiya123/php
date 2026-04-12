@extends('layouts.app')

@section('title', isset($category) ? $category->name . ' -' : 'Electronic-ecommerce')

@section('content')
<div class="container my-5">
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <h2 class="fw-bold mb-0">{{ isset($category) ? $category->name : 'All Products' }}</h2>
            <nav aria-label="breadcrumb mt-2">
                <ol class="breadcrumb bg-transparent p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ isset($category) ? $category->name : 'Shop' }}</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 text-md-end mt-3 mt-md-0 d-none d-md-block">
            <p class="text-muted mb-0">Showing {{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }} of {{ $products->total() }} results</p>
        </div>
    </div>

    @if($products->isEmpty())
        <div class="text-center py-5 bg-white rounded-4 shadow-sm border-0">
            <i class="bi bi-box-seam fs-1 text-muted mb-3"></i>
            <h4 class="fw-bold">No Products Found</h4>
            <p class="text-muted">We couldn't find any products in this category.</p>
            <a href="{{ route('shop') }}" class="btn btn-outline-dark rounded-pill px-4 mt-2">View All Products</a>
        </div>
    @else
        <div class="row g-4 mb-5">
            @foreach($products as $product)
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
                            <div class="card-body d-flex flex-column">
                                <span class="badge bg-light text-dark mb-2 border align-self-start">{{ $product->category->name }}</span>
                                <h6 class="card-title fw-bold text-truncate">{{ $product->name }}</h6>
                                <div class="mt-auto pt-3 border-top border-light mt-3 d-flex justify-content-between align-items-center">
                                    <div class="price">
                                        @if($product->discount_price)
                                            <span class="text-danger fw-bold fs-5">${{ number_format($product->discount_price, 2) }}</span>
                                        @else
                                            <span class="text-dark fw-bold fs-5">${{ number_format($product->price, 2) }}</span>
                                        @endif
                                    </div>
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="btn btn-primary rounded-circle shadow-sm" style="width: 40px; height: 40px; padding: 0;" title="Add to Cart">
                                            <i class="bi bi-bag-plus"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
