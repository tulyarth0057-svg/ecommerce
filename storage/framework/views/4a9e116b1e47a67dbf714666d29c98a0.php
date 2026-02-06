

<?php $__env->startSection('title', 'Assigned-view-orders'); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
    <h2>Order Details</h2>

    <div class="card p-3">
        <p><strong>Order Number :</strong> #<?php echo e($order->o_order_number); ?></p>
        <p><strong>Customer :</strong> <?php echo e($order->o_name); ?></p>
        <p><strong>Phone :</strong> <?php echo e($order->o_phone); ?></p>

        <p><strong>Address :</strong>
            <?php echo e($order->o_street_address); ?>,
            <?php echo e($order->o_city); ?>,
            <?php echo e($order->o_state); ?>,
            <?php echo e($order->o_postcode); ?>

        </p>

        <p><strong>Status :</strong> <?php echo e(ucfirst($order->o_order_status)); ?></p>

        <p><strong>Total :</strong> ₹<?php echo e($order->o_total_amount); ?></p>

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.courier-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel_git\ecommerce-web\resources\views/courier/assigned-view.blade.php ENDPATH**/ ?>