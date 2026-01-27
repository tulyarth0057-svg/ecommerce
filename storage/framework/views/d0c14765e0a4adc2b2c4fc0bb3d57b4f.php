

<?php $__env->startSection('title', 'Order list'); ?>

<?php $__env->startPush('styles'); ?>
<style>
     body{
          font-family: 'Poppins',sans-serif;
          background:rgb(245, 243, 241);
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

    .table-header {
        background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
        padding: 1.5rem;
        color: white;
    }

    .table-header h2 {
        margin: 0;
        font-size: 1.25rem;
        font-weight: 600;
    }

    .table-wrapper {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background:#ff6600;
    }

    thead th {
        padding: 1rem;
        text-align: left;
        font-weight: 600;
        color:white;
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

    .badge {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .badge-pending {
        background: #fed7aa;
        color: #c2410c;
    }

    .badge-processing {
        background: #dbeafe;
        color: #1e40af;
    }

    .badge-completed {
        background: #d1fae5;
        color: #065f46;
    }

    .badge-cancelled {
        background: #fee2e2;
        color: #991b1b;
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

    .btn-edit {
        background: #fed7aa;
        color: #c2410c;
    }

    .btn-edit:hover {
        background: #fdba74;
    }

    
/* ============================
   DATATABLES WRAPPER
============================ */
.dataTables_wrapper {
    padding: 1rem 1.5rem;
    font-family: 'Poppins', sans-serif;
   
}

/* ============================
   SHOW ENTRIES + SEARCH
============================ */
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

/* Select & search input */
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

/* ============================
   TABLE STYLING
============================ */
table.dataTable {
    border-collapse: collapse !important;
}

table.dataTable thead th {
    background: #ff6600;
    color: #fff;
    font-weight: 600;
    font-size: 0.85rem;
    text-transform: uppercase;
    border-bottom: none;
}

table.dataTable tbody tr {
    transition: background 0.2s ease;
}

table.dataTable tbody tr:hover {
    background: #ffedd5;
}

/* ============================
   PAGINATION
============================ */


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

/* ============================
   INFO TEXT
============================ */
.dataTables_info {
    font-size: 0.85rem;
    color: #666;
  
}

/* ============================
   SORT ICONS FIX
============================ */
table.dataTable thead .sorting:after,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_desc:after {
    color: #fff;
    opacity: 0.8;
}

/* ============================
   RESPONSIVE FIX
============================ */
@media (max-width: 768px) {
    .dataTables_length,
    .dataTables_filter {
        text-align: left;
        width: 100%;
    }

    .dataTables_filter input {
        width: 100% !important;
        margin-top: 6px;
    }
}
/* ==============================
   DATATABLE TOP CONTROLS FIX
============================== */

/* Wrapper */
.dataTables_wrapper .dataTables_length,
.dataTables_wrapper .dataTables_filter {
    display: inline-flex;
    align-items: center;
    margin-top: 10px;
    padding: 5px 0px;
}

/* Put both in same row */
.dataTables_wrapper .dataTables_length {
    float: left;
}

.dataTables_wrapper .dataTables_filter {
    float: right;
    text-align: right;
}

/* Remove extra gap above table */
.dataTables_wrapper .dataTables_filter,
.dataTables_wrapper .dataTables_length {
    margin-bottom: 8px;
}

/* Input & select styling */
.dataTables_length select,
.dataTables_filter input {
    margin-left: 6px;
    padding: 6px 10px;
    border-radius: 6px;
    border: 1px solid #ff6600;
    width: auto !important;
}

/* Clear floats */
.dataTables_wrapper::after {
    content: "";
    display: block;
    clear: both;
}





 
   
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="order-container">
    <div class="page-header">
        <h1>All Order List</h1>
    </div>

    <div class="table-card">
      

        <div class="table-wrapper">
            <table id="productTable">
                <thead>
                    <tr>
                        <th>S:No</th>
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
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $orders ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <tr>
                       <td><?php echo e($loop->iteration); ?></td>
                        <td>#<?php echo e($order->o_order_number ?? 'N/A'); ?></td>
                        <td><?php echo e($order->o_name ?? 'Guest'); ?></td>
                        <td><?php echo e($order->o_created_at ? $order->o_created_at->format('M d, Y') : 'N/A'); ?></td>
                        <td>₹<?php echo e(number_format($order->o_total_amount ?? 0, 2)); ?></td>

                       <td><?php echo e($order->o_payment_method ?? 'N/A'); ?></td>

                        <td>
                            <?php
                                $statusClass = match($order->o_order_status ?? 'pending') {
                                    'completed' => 'badge-completed',
                                    'processing' => 'badge-processing',
                                    'cancelled' => 'badge-cancelled',
                                    default => 'badge-pending'
                                };
                            ?>
                            <span class="badge <?php echo e($statusClass); ?>">
                                <?php echo e(ucfirst($order->status ?? 'Pending')); ?>

                            </span>
                        </td>
                        <td>
                    <button class="action-btn btn-view" onclick="window.location='<?php echo e(route('view.order', $order->o_id ?? '#')); ?>'">View</button>
                           
                        </td>
                    </tr>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 2rem; color: #78716c;">
                            No orders found
                        </td>
                    </tr>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>

   
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>


<script>
$(document).ready(function () {

    if ($.fn.DataTable.isDataTable('#productTable')) {
        $('#productTable').DataTable().destroy();
    }

    $('#productTable').DataTable({
        dom: 'lfrtip',                // length + filter + table + pagination
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        lengthMenu: [5, 10, 25, 50, 100],
        pageLength: 5,
              // Order by Date column
       
    });

});
</script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel_git\ecommerce-web\resources\views/admin/order-list.blade.php ENDPATH**/ ?>