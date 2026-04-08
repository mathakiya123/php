@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Products</h2>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary shadow-sm"><i class="bi bi-plus-lg"></i> Add New</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td class="ps-4">
                                @if($product->image)
                                    <img src="{{ asset('storage/'.$product->image) }}" width="40" height="40" class="rounded object-fit-cover shadow-sm">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center border" style="width: 40px; height: 40px;"><i class="bi bi-image text-muted"></i></div>
                                @endif
                            </td>
                            <td class="fw-medium">{{ str($product->name)->limit(30) }}</td>
                            <td><span class="badge bg-light text-dark border">{{ $product->category->name }}</span></td>
                            <td class="fw-bold text-success">${{ number_format($product->price, 2) }}</td>
                            <td>
                                @if($product->stock_quantity > 0)
                                    <span class="badge bg-success-subtle text-success border border-success-subtle">{{ $product->stock_quantity }}</span>
                                @else
                                    <span class="badge bg-danger">Out of Stock</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-outline-info me-1"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this product?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center py-4 text-muted">No products found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="mt-3">{{ $products->links() }}</div>
@endsection
