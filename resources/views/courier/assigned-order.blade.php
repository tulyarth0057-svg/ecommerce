@extends('layouts.courier-layout')

@section('title', 'Assigned Orders')

@push('styles')
<style>
/* Copy your Admin styles here or keep basic table styling */
body {
    font-family: 'Poppins', sans-serif;
    background: rgb(245, 243, 241);
}

.page-header h1 {
    color: black;
    font-size: 1.75rem;
    font-weight: 700;
}

.table-card {
    background: white;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(234, 88, 12, 0.1);
}

table {
    width: 100%;
    border-collapse: collapse;
}

thead {
    background: #ff6600;
}

thead th {
    padding: 0.75rem;
    text-align: left;
    color: white;
    font-size: 0.875rem;
}

tbody td {
    padding: 0.75rem;
}

.badge {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 600;
    color: white;
}

.badge-assigned { background: #f97316; }
.badge-pending { background: #3b82f6; }
.badge-delivered { background: #22c55e; }
</style>
@endpush

@section('content')
<div class="order-container">
    <div class="page-header">
        <h1>Assigned Orders</h1>
    </div>

    <div class="table-card">
        <div class="table-wrapper">
            <table id="assignedOrdersTable" class="display">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Order Number</th>
                        <th>Customer Name</th>
                        <th>Delivery Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>#{{ $order->o_order_number ?? 'N/A' }}</td>
                        <td>{{ $order->o_name ?? 'Guest' }}</td>
                        <td>{{ $order->o_delivery_address ?? 'N/A' }}</td>
                        <td>
                            @php
                                $status = $order->o_order_status;
                                $badgeClass = match($status) {
                                    'assigned' => 'badge-assigned',
                                    'pending' => 'badge-pending',
                                    'delivered' => 'badge-delivered',
                                    default => 'badge-assigned'
                                };
                            @endphp
                            <span class="badge {{ $badgeClass }}">{{ ucfirst($status) }}</span>
                        </td>
                        <td>
                            <button onclick="window.location='{{ route('courier.view-order', $order->id) }}'"
                                    class="action-btn btn-view">
                                View
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align:center; padding:2rem; color:#78716c;">
                            No assigned orders found
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {
    $('#assignedOrdersTable').DataTable({
        dom: 'lfrtip',
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        lengthMenu: [5, 10, 25, 50],
        pageLength: 5,
        order: [[1, 'desc']] // Order by Order Number
    });
});
</script>
@endpush
