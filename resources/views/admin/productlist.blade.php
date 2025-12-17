
@extends('layouts.admin-layout')

@section('title', 'Product-list')

@push('styles')
<style>
    body { background-color: #f8f9fa;font-family: 'Poppins',sans-serif }
    h1 { color: #ff6600; margin-bottom: 25px; text-align: center; }
    .btn-orange { background-color: #ff6600; color: white; }
    .btn-orange:hover { background-color: #e65c00; }
    .badge-color { display:inline-block; width:20px; height:20px; border-radius:50%; margin:2px; border:1px solid #ccc; }
    .preview-img { cursor:pointer; border:1px solid #ddd; padding:2px; border-radius:3px; }

    /*********** DATATABLE GLOBAL ************/
.dataTables_wrapper {
    font-family: 'Poppins', sans-serif;
    padding: 5px;


}

#productTable thead th {
    background-color: #ff6600 !important;
    color: white !important;
     text-align: center;
     align-items: center;
     padding:15px;


}




/* Table rows */
#productTable tbody tr td {
    vertical-align: middle;
    font-size: 14px;
    width: auto;
    padding: 20px;

}

/* Hover Effect */
#productTable tbody tr:hover {
    background-color: #fff1e6 !important;
}

/*********** SEARCH BOX ************/
.dataTables_wrapper .dataTables_filter {
    margin-bottom: auto 10px ;
}

.dataTables_wrapper .dataTables_filter label {
    font-weight: 500;

}

.dataTables_wrapper .dataTables_filter input {
    border: 1px solid #ff6600;
    border-radius: 5px;
    padding: 6px 12px;
    outline: none;
    transition: all 0.2s ease-in-out;
}

.dataTables_wrapper .dataTables_filter input:focus {
    border-color: #e65c00;
    box-shadow: 0 0 0 0.1rem rgba(255,102,0,0.25);

}

/*********** LENGTH DROPDOWN ************/
.dataTables_wrapper .dataTables_length label {

    font-weight: 500;
}

.dataTables_wrapper .dataTables_length select {
    border: 1px solid #ff6600;
    border-radius: 6px;
    padding: 5px 30px;

}

/*********** PAGINATION ************/
.dataTables_wrapper .dataTables_paginate {
    margin-top: 15px;
    text-align: center !important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button {
    padding: 5px 10px !important;
    margin: px;
    cursor: pointer;
    font-size: 14px;
    transition: 0.3s ease;
}

/* .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background: #ff6600 !important;
    color: white !important;
} */

.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background: #ff6600 !important;
    color: white !important;
    border-radius: 8px;
    font-weight: bold;
}

/* .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
    /* background: #f1f1f1 !important;
    color: #aaa !important;
    border: 1px solid #ddd !important;
} */ */

/*********** TABLE INFO TEXT ************/
.dataTables_wrapper .dataTables_info {
    color: #444;
    font-size: 14px;
    margin-top: 8px;

}

/*********** TABLE BORDER + SHADOW ************/
#productTable {
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
      table-layout: auto !important;
    width: 100%;
    white-space: nowrap;

}

#productTable th,
#productTable td {
    width: auto !important; /* हर कॉलम auto width */
    white-space: nowrap;
}






</style>
@endpush


@section('content')
<div class="container p-4">
    <h3 class="mb-3 fw-bold">Product List</h3>

    <div class="table-responsive shadow-sm rounded bg-white p-3">
        <table id="productTable" class="table align-middle text-center table-hover">
            <thead class="table-light">
                <tr class="w-100">
                    <th>S:NO</th>
                    <th>ACTION</th>
                    <th>NAME</th>
                    <th>MAIN CATEGORY</th>
                    <th>CATEGORY</th>
                    <th>PRICE</th>
                    <th>OLD PRICE</th>
                    <th >STOCK</th>
                    <th>TYPE</th>

                </tr>
            </thead>

            <tbody>
                @foreach($products as $index => $p)
                <tr>

                    <!-- Sr No -->
                    <td>{{ $index + 1 }}</td>

                    <!-- Action -->
                    <td class="">
                        <a href="{{ route('product.edit', $p->p_id) }}" class="btn btn-sm btn-edit bg-primary text-white">Edit</a>
                        <a href="{{ route('product.view', $p->p_id) }}" class="btn btn-sm btn-view bg-warning text-white">View</a>
                 {{-- <form action="{{ route('product.destroy', $p->p_id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-view deleteBtn bg-danger text-white">
        Delete
    </button>
</form> --}}



                    </td>

                    <!-- Name -->
                    <td class="fw-semibold">{{ $p->p_name }}</td>

                    <td>{{ $p->mainCategory->cat_name ?? 'No Main Category' }}</td>


                    <td>
    @if($p->category)
        {{ $p->category->c_name }}
    @else
        <span style="color:red;">No Category Found</span>
    @endif
</td>




                    <!-- Price -->
                    <td>₹{{($p->p_price ) }}</td>

                    <!-- Old Price -->
                    <td>
                        @if($p->p_old_price)
                            ₹{{($p->p_old_price) }}
                        @else
                            -
                        @endif
                    </td>




                    <!-- Stock -->
                   <td class="stock-cell">
    @if($p->p_stock > 0)
        <span class="badge badge-stock bg-info p-2">{{ $p->p_stock }}</span>
    @else
        <span class="badge badge-out">0</span>
    @endif
</td>




                    <!-- Type -->
                    <td>{{ ucfirst($p->p_type) }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection


<!-- Scripts -->

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function () {

    $('#productTable').DataTable({
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50, 100, "All"],
        order: [[0, "asc"]],
        language: {
            search: "Search Product:",
            lengthMenu: "Show _MENU_ entries"
        }
    });

    $('#productTable tbody tr').hover(
        function () { $(this).css('background-color', '#ffe6cc'); },
        function () { $(this).css('background-color', ''); }
    );

    $('.deleteBtn').on('click', function(e){
        e.preventDefault();
        let form = $(this).closest('form');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#f97316',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if(result.isConfirmed){
                form.submit();
            }
        });
    });

});
</script>
@endpush


