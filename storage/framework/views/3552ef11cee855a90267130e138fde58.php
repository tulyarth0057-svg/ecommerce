

<?php $__env->startSection('title', 'Courier Boys List'); ?>

<?php $__env->startPush('styles'); ?>
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
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid mt-4">
        <h3 class="mb-3 fw-bold">Courier boy List</h3>
    <div class="card shadow border-0">
        <div class="card-header">
           
        </div>

        <div class="card-body">

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

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
                            <th>Status</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $courierboys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $courier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>

                            <td>
                                <img src="<?php echo e($courier->profile_photo 
                                    ? asset('storage/'.$courier->profile_photo) 
                                    : asset('assetsofdash/images/profile_av.svg')); ?>"
                                    class="profile-img">
                            </td>

                            <td>
                                <a href="<?php echo e(route('courierboys.view', $courier->id)); ?>" class="btn btn-view btn-sm"> View</a>

                            </td>

                            <td><?php echo e($courier->name ?? '-'); ?></td>
                            <td><?php echo e($courier->mobile ?? '-'); ?></td>
                            <td><?php echo e($courier->email ?? '-'); ?></td>
                            <td><?php echo e($courier->vehicle_type ?? '-'); ?></td>
                            <td><?php echo e($courier->vehicle_number ?? '-'); ?></td>

                            <td>
                                <span class="badge badge-status <?php echo e($courier->is_verified ? 'bg-success' : 'bg-warning'); ?>">
                                    <?php echo e($courier->is_verified ? 'Verified' : 'Pending'); ?>

                                </span>
                            </td>

                            <td><?php echo e($courier->created_at->format('d M Y')); ?></td>
                        </tr>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel_git\ecommerce-web\resources\views/admin/courierboy-list.blade.php ENDPATH**/ ?>