@extends('layouts.courier-layout')

@section('title', 'Pending Deliveries')

@push('styles')
<style>
/* Same styling as assigned orders for consistency */
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
        <h1>Pending Deliveries</h1>
    </div>

    <div class="table-card">
        <div class="table-wrapper">
            <table id="pendingOrdersTable" class="display">
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

                    @forelse($orders ?? [] as $order)

                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>#{{ $order->o_order_number }}</td>

                        <td>{{ $order->o_name ?? 'Guest' }}</td>

                        <td>
                            {{ $order->o_street_address }},
                            {{ $order->o_city }},
                            {{ $order->o_state }},
                            {{ $order->o_postcode }}
                        </td>

                        <td>
                            <span class="badge badge-pending">
                                Out For Delivery
                            </span>
                        </td>

                        <td>
                            {{-- <a href="{{ route('courier.view-order', $order->o_id) }}"
                               class="action-btn btn-view">
                                View
                            </a> --}}
                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="6" class="text-center p-4">
                            No pending deliveries found
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

    if ($.fn.DataTable.isDataTable('#pendingOrdersTable')) {
        $('#pendingOrdersTable').DataTable().destroy();
    }

    $('#pendingOrdersTable').DataTable({
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50],
        order: [[1, 'desc']]
    });

});
</script>
@endpush
