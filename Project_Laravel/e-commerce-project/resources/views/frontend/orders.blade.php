@extends('layouts.app')

@section('title', 'My Orders - LaraShop')

@section('content')
<div class="container my-5">
    <h2 class="fw-bold mb-4">My Orders</h2>

    @if($orders->isEmpty())
        <div class="text-center py-5 bg-white rounded-4 shadow-sm border-0">
            <i class="bi bi-box-seam text-muted" style="font-size: 5rem;"></i>
            <h3 class="fw-bold mt-4">No Orders Yet</h3>
            <p class="text-muted mb-4">You haven't placed any orders with us.</p>
            <a href="{{ route('shop') }}" class="btn btn-primary btn-lg rounded-pill px-5">Start Shopping</a>
        </div>
    @else
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="border-0">Order ID</th>
                                <th scope="col" class="border-0">Date</th>
                                <th scope="col" class="border-0">Total</th>
                                <th scope="col" class="border-0">Status</th>
                                <th scope="col" class="border-0">Payment Method</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td class="fw-bold">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</td>
                                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                                    <td class="fw-bold text-primary">${{ number_format($order->total_price, 2) }}</td>
                                    <td>
                                        @if($order->status == 'pending')
                                            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">Pending</span>
                                        @elseif($order->status == 'processing')
                                            <span class="badge bg-info text-dark px-3 py-2 rounded-pill">Processing</span>
                                        @elseif($order->status == 'completed')
                                            <span class="badge bg-success px-3 py-2 rounded-pill">Completed</span>
                                        @else
                                            <span class="badge bg-secondary px-3 py-2 rounded-pill">{{ ucfirst($order->status) }}</span>
                                        @endif
                                    </td>
                                    <td>
    @if($order->payment_method == 'Razorpay')
        <span class="badge bg-primary">Razorpay</span>
    @else
        <span class="badge bg-secondary">COD</span>
    @endif
</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
