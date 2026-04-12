@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">{{ isset($product) ? 'Edit Product' : 'Create Product' }}</h2>
    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">Cancel</a>
</div>

<div class="card border-0 shadow-sm" style="max-width: 800px;">
    <div class="card-body p-4">
        <form action="{{ isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($product)) @method('PUT') @endif
            
            <div class="row g-3">
                <div class="col-md-12 mb-2">
                    <label class="form-label fw-medium text-muted">Product Name</label>
                    <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name', $product->name ?? '') }}" required>
                </div>
                
                <div class="col-md-6 mb-2">
                    <label class="form-label fw-medium text-muted">Category</label>
                    <select class="form-select border-0 bg-light @error('category_id') is-invalid @enderror" name="category_id" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ (old('category_id', $product->category_id ?? '') == $cat->id) ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-2">
                    <label class="form-label fw-medium text-muted">Subcategory (Optional)</label>
                    <select class="form-select border-0 bg-light @error('subcategory_id') is-invalid @enderror" name="subcategory_id">
                        <option value="">None</option>
                        @foreach($subcategories as $scat)
                            <option value="{{ $scat->id }}" {{ (old('subcategory_id', $product->subcategory_id ?? '') == $scat->id) ? 'selected' : '' }}>{{ $scat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-2">
                    <label class="form-label fw-medium text-muted">Price ($)</label>
                    <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price', $product->price ?? '') }}" required>
                </div>

                <div class="col-md-4 mb-2">
                    <label class="form-label fw-medium text-muted">Discount Price ($)</label>
                    <input type="number" step="0.01" class="form-control" name="discount_price" value="{{ old('discount_price', $product->discount_price ?? '') }}">
                </div>

                <div class="col-md-4 mb-2">
                    <label class="form-label fw-medium text-muted">Stock</label>
                    <input type="number" class="form-control" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity ?? 0) }}" required>
                </div>

                <div class="col-md-12 mb-2">
                    <label class="form-label fw-medium text-muted">Product Image</label>
                    <input type="file" class="form-control border-0 bg-light" name="image">
                    @if(isset($product) && $product->image)
                        <img src="{{ asset('storage/'.$product->image) }}" class="mt-2 rounded" width="100">
                    @endif
                </div>

                <div class="col-md-12 mb-4">
                    <label class="form-label fw-medium text-muted">Description</label>
                    <textarea class="form-control border-0 bg-light" name="description" rows="4">{{ old('description', $product->description ?? '') }}</textarea>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5">{{ isset($product) ? 'Update Product' : 'Save Product' }}</button>
        </form>
    </div>
</div>
@endsection
