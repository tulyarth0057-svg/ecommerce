@extends('layouts.admin-layout')

@section('title', 'Order List')

@push('styles')
<style>
body {
    font-family: 'Poppins', sans-serif;
    background: rgb(245, 243, 241);
}

.page-header {
    margin-bottom: 2rem;
}

.page-header h1 {
    color: black;
    font-size: 2rem;
    font-weight: 700;
    margin: 0;
}

.table-card {
    background: white;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(234, 88, 12, 0.1);
    overflow: hidden;
}

.table-wrapper {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
}

thead {
    background: #ff6600;
}

thead th {
    padding: 1rem;
    text-align: left;
    font-weight: 600;
    color: white;
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

tbody tr {
    border-bottom: 1px solid #fed7aa;
    transition: background-color 0.2s;
}

tbody tr:hover {
    background: #ffedd5;
}

tbody td {
    padding: 1rem;
    color: #292524;
}

.action-btn {
    padding: 0.5rem 1rem;
    border: none;
    border-radius: 6px;
    font-size: 0.875rem;
    cursor: pointer;
    transition: all 0.2s;
    margin-right: 0.5rem;
}

.btn-view {
    background: #f97316;
    color: white;
}

.btn-view:hover {
    background: #ea580c;
    transform: translateY(-1px);
}

/* =====================
   Badge styles
===================== */
.badge {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 600;
    color: white;
}

.badge-pending {
    background: #f97316; /* orange */
}

.badge-processing {
    background: #3b82f6; /* blue */
}

.badge-completed {
    background: #22c55e; /* green */
}

.badge-cancelled {
    background: #ef4444; /* red */
}

/* =====================
   DataTables styling
===================== */
.dataTables_wrapper {
    padding: 1rem 1.5rem;
    font-family: 'Poppins', sans-serif;
}

.dataTables_length,
.dataTables_filter {
    margin-bottom: 1rem;
}

.dataTables_length label,
.dataTables_filter label {
    font-size: 0.85rem;
    font-weight: 600;
    color: #444;
}

.dataTables_length select,
.dataTables_filter input {
    width: auto !important;
    min-width: 80px;
    padding: 6px 10px;
    margin: 0 6px;
    border-radius: 6px;
    border: 1px solid #ff6600;
    outline: none;
}

table.dataTable thead .sorting:after,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_desc:after {
    color: #fff;
    opacity: 0.8;
}

.dataTables_paginate .paginate_button {
    background: #ffedd5 !important;
    color: #c2410c !important;
    border-radius: 6px;
    border: none !important;
}

.dataTables_paginate .paginate_button:hover {
    background: #ff6600 !important;
    color: #fff !important;
}

.dataTables_paginate .paginate_button.current {
    background: #ff6600 !important;
    color: #fff !important;
}
</style>
@endpush

@section('content')
<div class="order-container">
    <div class="page-header">
        <h1>All Order List</h1>
    </div>

    <div class="table-card">
        <div class="table-wrapper">
            <table id="productTable" class="display">
                <thead>
                    <tr>
                        <th>S:No</th>
                        <th>courier</th>
                        <th>Order Number</th>
                        <th>Customer Name</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders ?? [] as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                     
                        <td>
                           <form method="POST" class="assign-courier-form" action="{{ route('assign.courier') }}">
    @csrf
    <input type="hidden" name="order_id" value="{{ $order->o_id }}">
    <select name="courier_id" class="form-control">
        <option value="">Select Courier</option>
        @foreach($couriers as $courier)
            <option value="{{ $courier->id }}" {{ $order->courier_id == $courier->id ? 'selected' : '' }}>
                {{ $courier->name }} ({{ $courier->mobile }})
            </option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-success mt-2">Assign Courier</button>
</form>

                        </td>


                        <td>#{{ $order->o_order_number ?? 'N/A' }}</td>
                        <td>{{ $order->o_name ?? 'Guest' }}</td>
                        <td>{{ $order->o_created_at ? \Carbon\Carbon::parse($order->o_created_at)->format('M d, Y') : 'N/A' }}</td>
                        <td>₹{{ number_format($order->o_total_amount ?? 0, 2) }}</td>
                        <td>{{ ucfirst($order->o_payment_method ?? 'N/A') }}</td>
                        <td>
                            @php
                                $status = $order->o_order_status ?? 'pending';
                                $statusClass = match($status) {
                                    'completed' => 'badge-completed',
                                    'processing' => 'badge-processing',
                                    'cancelled' => 'badge-cancelled',
                                    default => 'badge-pending'
                                };
                            @endphp
                            <span class="badge {{ $statusClass }}">
                                {{ ucfirst($status) }}
                            </span>
                        </td>
                        <td>
                           
                       <a href="{{ route('view.order', $order->o_id) }}" class="btn btn-primary">View Order</a>


                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" style="text-align:center; padding:2rem; color:#78716c;">
                            No orders found
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

{{-- axjax of asign-courierboy --}}
<script>
$(document).ready(function(){

    // AJAX submit for all forms with class 'assign-courier-form'
    $(document).on('submit', '.assign-courier-form', function(e){
        e.preventDefault(); // Prevent page refresh

        let form = $(this);
        let url = form.attr('action');
        let data = form.serialize();

        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            success: function(res){
                if(res.status){
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: res.message,
                        timer: 1500,
                        showConfirmButton: false
                    });
                } else {
                    Swal.fire('Error', res.message, 'error');
                }
            },
            error: function(xhr, status, error){
                Swal.fire('Error', 'Something went wrong', 'error');
                console.error(error);
            }
        });
    });

});

</script>


<script>
$(document).ready(function () {
    if ($.fn.DataTable.isDataTable('#productTable')) {
        $('#productTable').DataTable().destroy();
    }

    $('#productTable').DataTable({
        dom: 'lfrtip',
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        lengthMenu: [5, 10, 25, 50, 100],
        pageLength: 5,
        order: [[3, 'desc']] // Order by Date column
    });
});
</script>



@endpush
