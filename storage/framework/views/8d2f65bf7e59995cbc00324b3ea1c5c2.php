

<?php $__env->startSection('title', 'Courier Dashboard'); ?>



<?php $__env->startPush('styles'); ?>
<style>
/* Same styling as other courier pages for consistency */
body {
    font-family: 'Poppins', sans-serif;

}

</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2 class="mb-4 text-center">Courier Dashboard</h2>

    <div class="row g-4">
        <!-- Assigned Orders Card -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-center p-4">
                <div class="mb-2">
                    <i class="bi bi-bag-fill display-4 text-primary"></i>
                </div>
                <h5 class="card-title">Assigned Orders</h5>
                <p class="display-6 fw-bold"><?php echo e($assigned ?? 0); ?></p>
            </div>
        </div>

        <!-- Pending Deliveries Card -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-center p-4">
                <div class="mb-2">
                    <i class="bi bi-clock-fill display-4 text-warning"></i>
                </div>
                <h5 class="card-title">Pending Deliveries</h5>
                <p class="display-6 fw-bold"><?php echo e($pending ?? 0); ?></p>
            </div>
        </div>

        <!-- Completed Orders Card -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-center p-4">
                <div class="mb-2">
                    <i class="bi bi-check-circle-fill display-4 text-success"></i>
                </div>
                <h5 class="card-title">Completed</h5>
                <p class="display-6 fw-bold"><?php echo e($completed ?? 0); ?></p>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.courier-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel_git\ecommerce-web\resources\views/courier/courierdashboard.blade.php ENDPATH**/ ?>