

<?php $__env->startSection('title', 'Pending Deliveries'); ?>

<?php $__env->startPush('styles'); ?>
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
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
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
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td>#<?php echo e($order->o_order_number ?? 'N/A'); ?></td>
                        <td><?php echo e($order->o_name ?? 'Guest'); ?></td>
                        <td><?php echo e($order->o_delivery_address ?? 'N/A'); ?></td>
                        <td>
                            <?php
                                $status = $order->o_order_status;
                                $badgeClass = match($status) {
                                    'assigned' => 'badge-assigned',
                                    'pending' => 'badge-pending',
                                    'delivered' => 'badge-delivered',
                                    default => 'badge-pending'
                                };
                            ?>
                            <span class="badge <?php echo e($badgeClass); ?>"><?php echo e(ucfirst($status)); ?></span>
                        </td>
                        <td>
                            <button onclick="window.location='<?php echo e(route('courier.view-order', $order->id)); ?>'"
                                    class="action-btn btn-view">
                                View
                            </button>
                        </td>
                    </tr>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <tr>
                        <td colspan="6" style="text-align:center; padding:2rem; color:#78716c;">
                            No pending deliveries found
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
    $('#pendingOrdersTable').DataTable({
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.courier-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel_git\ecommerce-web\resources\views/courier/pending-deliveries.blade.php ENDPATH**/ ?>