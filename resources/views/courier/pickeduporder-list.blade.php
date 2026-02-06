@extends('layouts.courier-layout')

@section('title', 'Assigned-view-orders')


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
        <h1 class="mb-4">Picked Up Orders list</h1>
    </div>

    <div class="table-card">
        <div class="table-wrapper">
            <table id="pickedOrdersTable" class="display">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Order Number</th>
                        <th>Customer Name</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>#{{ $order->o_order_number }}</td>

                        <td>{{ $order->o_name }}</td>

                        <td>
                            {{ $order->o_street_address }},
                            {{ $order->o_city }},
                            {{ $order->o_state }},
                            {{ $order->o_postcode }}
                        </td>

                        <td>
                            <span class="badge bg-info">
                                Picked Up
                            </span>
                        </td>

                        <td class="d-flex gap-2">

                            {{-- View Order --}}
                            <a href="{{ route('courier.assigned.view', $order->o_id) }}"
                               class="btn btn-warning btn-sm text-white">
                                View
                            </a>

                            {{-- Mark Delivered --}}
                              @if($order->o_order_status == 'processing')

                                <button class="btn btn-success btn-sm deliverBtn"
                                        data-id="{{ $order->o_id }}">
                                    Delivered
                                </button>

                                @endif


                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            No picked up orders found
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

{{-- ajax-script-markdeliverybtn----}}
<script>
$(document).on('click', '.deliverBtn', function () {

    let orderId = $(this).data('id');
    let button = $(this);

    Swal.fire({
        title: 'Are you sure?',
        text: "Mark this order as Delivered?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delivered!'
    }).then((result) => {

        if (result.isConfirmed) {

            $.ajax({
                url: "/courier/delivered/" + orderId,
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}"
                },

                success: function (response) {

                    if (response.status) {

                        Swal.fire(
                            'Success!',
                            response.message,
                            'success'
                        );

                        // Button disable ya remove karna
                        button.closest("tr").fadeOut();

                    } else {
                        Swal.fire('Error', response.message, 'error');
                    }
                },

                error: function () {
                    Swal.fire('Error', 'Something went wrong', 'error');
                }

            });

        }

    });

});
</script>


<script>
$(document).ready(function () {

    $('#pickedOrdersTable').DataTable({
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        pageLength: 5,
        order: [[1, 'desc']]
    });

});
</script>

@endpush
