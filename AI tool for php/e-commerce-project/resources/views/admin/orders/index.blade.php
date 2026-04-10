@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Order Management</h2>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Order ID</th>
                        <th>products</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Update Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td class="ps-4 fw-bold">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</td>
                            <td>
    @foreach($order->orderItems as $item)
        <div>
            {{ $item->product->name ?? 'Deleted Product' }} 
            (x{{ $item->quantity }})
        </div>
    @endforeach
</td>
                            <td>
                                <div class="fw-medium">{{ $order->name }}</div>
                                <div class="text-muted small">{{ $order->user->email ?? 'N/A' }}</div>
                            </td>
                            <td>{{ $order->created_at->format('M d, Y') }}</td>
                            <td class="fw-bold text-primary">${{ number_format($order->total_price, 2) }}</td>
                            <td>
                                @if($order->status == 'pending')<span class="badge bg-warning text-dark">Pending</span>
                                @elseif($order->status == 'processing')<span class="badge bg-info text-dark">Processing</span>
                                @else<span class="badge bg-success">Completed</span>@endif
                            </td>
                            <td class="text-end pe-4">
                                <form action="{{ route('admin.orders.status', $order->id) }}" method="POST" class="d-flex justify-content-end">
                                    @csrf
                                    <select name="status" class="form-select form-select-sm border-0 bg-light w-auto d-inline me-2" onchange="this.form.submit()">
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center py-4 text-muted">No orders found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="mt-3">{{ $orders->links() }}</div>
@endsection
