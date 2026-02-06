@extends('layouts.courier-layout')

@section('title', 'Assigned Orders')

@push('styles')
<style>

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
    padding: 15px 20px;
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
                        <th>payments</th>
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
                         
                         <td>{{ $order->o_payment_method ?? 'NoPayment' }}</td>
                         
                        <td>
                            @php
                                $status = $order->o_order_status;

                                $badgeClass = match($status) {
                                    'confirmed' => 'badge-assigned',
                                    'processing' => 'badge-pending',
                                    'shipped' => 'badge-delivered',
                                    default => 'badge-assigned'
                                };

                                $statusText = match($status) {
                                    'confirmed' => 'Assigned',
                                    'processing' => 'Out For Delivery',
                                    'shipped' => 'Delivered',
                                    default => ucfirst($status)
                                };
                            @endphp

                            <span class="badge {{ $badgeClass }}">
                                {{ $statusText }}
                            </span>
                        </td>

                       <td>
                            <div class="d-flex align-items-center gap-2">

                                {{-- View Button --}}
                                <a href="{{ route('courier.assigned.view', $order->o_id) }}"
                                class="btn btn-warning text-white btn-sm">
                                    View
                                </a>

                                {{-- Pickup Button --}}
                             
                                   @if($order->o_order_status == 'confirmed')
                                        <button 
                                            class="btn btn-info text-white btn-sm pickup-btn"
                                            data-id="{{ $order->o_id }}">
                                            Picked
                                        </button>
                                    @endif

                         

                            </div>
                        </td>


                    </tr>

                    @empty

                    <tr>
                        <td colspan="6" class="text-center p-4">
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

{{-- ajax srcipt of pickedup --}}
<script>
$(document).on('click', '.pickup-btn', function () {

    let button = $(this);
    let orderId = button.data('id');

    $.ajax({
        url: "/courier/picked-up/" + orderId,
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}"
        },

        success: function (response) {

            alert(response.message);

            // Button replace after pickup
            button.replaceWith('<span class="badge bg-success">Picked Up</span>');
        },

        error: function () {
            alert("Something went wrong");
        }
    });

});
</script>



<script>
$(document).ready(function () {

    if ($.fn.DataTable.isDataTable('#assignedOrdersTable')) {
        $('#assignedOrdersTable').DataTable().destroy();
    }

    $('#assignedOrdersTable').DataTable({
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
