@extends('layouts.admin')

@section('content')
<h2 class="fw-bold mb-4">Dashboard Overview</h2>

<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card bg-primary text-white h-100">
            <div class="card-body d-flex justify-content-between p-4">
                <div>
                    <h5 class="fw-normal opacity-75">Total Products</h5>
                    <h2 class="display-5 fw-bold mb-0">{{ $productsCount }}</h2>
                </div>
                <div class="opacity-50">
                    <i class="bi bi-box fs-1"></i>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0 px-4 pb-3">
                <a href="{{ route('admin.products.index') }}" class="text-white text-decoration-none small">View details <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-success text-white h-100">
            <div class="card-body d-flex justify-content-between p-4">
                <div>
                    <h5 class="fw-normal opacity-75">Total Orders</h5>
                    <h2 class="display-5 fw-bold mb-0">{{ $ordersCount }}</h2>
                </div>
                <div class="opacity-50">
                    <i class="bi bi-cart-check fs-1"></i>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0 px-4 pb-3">
                <a href="{{ route('admin.orders.index') }}" class="text-white text-decoration-none small">View details <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-info text-white h-100">
            <div class="card-body d-flex justify-content-between p-4">
                <div>
                    <h5 class="fw-normal opacity-75">Registered Users</h5>
                    <h2 class="display-5 fw-bold mb-0">{{ $usersCount }}</h2>
                </div>
                <div class="opacity-50">
                    <i class="bi bi-people fs-1"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Recent Orders</h5>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">View All</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Order ID</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentOrders as $order)
                        <tr>
                            <td class="ps-4 fw-bold">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->created_at->format('M d, Y') }}</td>
                            <td class="text-primary fw-bold">${{ number_format($order->total_price, 2) }}</td>
                            <td>
                                @if($order->status == 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($order->status == 'processing')
                                    <span class="badge bg-info text-dark">Processing</span>
                                @else
                                    <span class="badge bg-success">Completed</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">No orders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
