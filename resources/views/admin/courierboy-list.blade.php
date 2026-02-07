@extends('layouts.admin-layout')

@section('title', 'Courier Boys List')

@push('styles')
<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Poppins', sans-serif;
    }

    /* CARD HEADER */
    .card-header {
        background: #ff6600;
        color: #fff;
        font-weight: 600;
    }

    /* DATATABLE HEADER */
    #productTable thead th {
        background-color: #ff6600 !important;
        color: #fff !important;
        text-align: center;
        padding: 15px;
        white-space: nowrap;
    }

    /* TABLE BODY */
    #productTable tbody td {
        vertical-align: middle;
        text-align: center;
        padding: 14px;
        font-size: 14px;
        white-space: nowrap;
    }

    #productTable tbody tr:hover {
        background-color: #fff1e6;
    }

    /* IMAGE */
    .profile-img {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #ff6600;
    }

    /* SEARCH */
    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #ff6600;
        border-radius: 6px;
        padding: 6px 10px;
    }

    /* LENGTH DROPDOWN */
    .dataTables_wrapper .dataTables_length select {
        border: 1px solid #ff6600;
        border-radius: 6px;
        padding: 5px 25px;
    }

    /* PAGINATION */
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #ff6600 !important;
        color: #fff !important;
        border-radius: 6px;
        font-weight: 600;
    }

    /* BADGES */
    .badge-status {
        padding: 6px 12px;
        border-radius: 12px;
        font-size: 12px;
    }

    /* ACTION BUTTON */
    .btn-view {
        background: #6f42c1;
        color: #fff;
        border-radius: 4px;
        font-size: 12px;
        padding: 4px 10px;
    }
    .btn-view:hover {
        background: #59339d;
        color: #fff;
    }
</style>
@endpush

@section('content')
<div class="container-fluid mt-4">
        <h3 class="mb-3 fw-bold">Courier boy List</h3>
    <div class="card shadow border-0">
        <div class="card-header">
           
        </div>

        <div class="card-body">

            {{-- ALERTS --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table id="productTable" class="table table-bordered table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Image</th>
                            <th>Action</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Vehicle</th>
                            <th>Vehicle No.</th>
                            <th>Verified</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courierboys as $index => $courier)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td>
                                <img src="{{ $courier->profile_photo 
                                    ? asset('storage/'.$courier->profile_photo) 
                                    : asset('assetsofdash/images/profile_av.svg') }}"
                                    class="profile-img">
                            </td>

                            <td>
                                <a href="{{ route('courierboys.view', $courier->id) }}" class="btn btn-view btn-sm"> View</a>
                               
                                 <a href="{{ route('courierboy.edit', $courier->id) }}" class="btn btn-view btn-sm bg-warning">Edit</a>
                            </td>

                            <td>{{ $courier->name ?? '-' }}</td>
                            <td>{{ $courier->mobile ?? '-' }}</td>
                            <td>{{ $courier->email ?? '-' }}</td>
                            <td>{{ $courier->vehicle_type ?? '-' }}</td>
                            <td>{{ $courier->vehicle_number ?? '-' }}</td>

                            <td>
                                @if($courier->is_verified == 0)

                                    <button class="btn btn-success btn-sm approveCourier"
                                        data-id="{{ $courier->id }}">
                                        Approve
                                    </button>

                                    <button class="btn btn-danger btn-sm rejectCourier"
                                        data-id="{{ $courier->id }}">
                                        Reject
                                    </button>

                                @elseif($courier->is_verified == 1)

                                    <span class="badge bg-success">Approved</span>

                                @elseif($courier->is_verified == 2)

                                    <span class="badge bg-danger">Rejected</span>

                                @endif

                                </td>


                            <td>{{ $courier->created_at->format('d M Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function () {
    $('#productTable').DataTable({
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50, 100],
        order: [[0, "asc"]],
        responsive: true,
        language: {
            search: "Search Courier-boy:",
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            paginate: {
                previous: "Previous",
                next: "Next"
            }
        }
    });
});
</script>


{{-- script=of-courier-boy-aproved/rejected --}}
<script>

$(document).on('click', '.approveCourier', function(){

    let id = $(this).data('id');

    Swal.fire({
        title: 'Approve Courier?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, Approve'
    }).then((result) => {

        if(result.isConfirmed){

            $.post(`courier/approve/${id}`, {
                _token: "{{ csrf_token() }}"
            }, function(res){

                Swal.fire('Approved!', res.message, 'success')
                .then(() => location.reload());

            });

        }

    });

});



$(document).on('click', '.rejectCourier', function(){

    let id = $(this).data('id');

    Swal.fire({
        title: 'Reject Courier?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Reject'
    }).then((result) => {

        if(result.isConfirmed){

            $.post(`courier/reject/${id}`, {
                _token: "{{ csrf_token() }}"
            }, function(res){

                Swal.fire('Rejected!', res.message, 'success')
                .then(() => location.reload());

            });

        }

    });

});

</script>

@endpush
