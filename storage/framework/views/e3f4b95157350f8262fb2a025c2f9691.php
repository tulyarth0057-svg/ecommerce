

<?php $__env->startSection('title', 'View Order'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    :root {
        --orange-primary: #f97316;
        --orange-dark: #ea580c;
    }

    .order-container { max-width:1200px; margin:0 auto; padding:2rem 1rem; }
    .order-header { background:linear-gradient(135deg,var(--orange-primary),var(--orange-dark)); border-radius:10px; padding:2rem; color:white; margin-bottom:2rem; }
    .order-card { border-radius:10px; box-shadow:0 10px 30px rgba(0,0,0,0.08); background:white; margin-bottom:2rem; }
    .info-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:1rem; padding:1.5rem; }
    .info-label { font-size:0.8rem; color:#6b7280; text-transform:uppercase; }
    .info-value { font-weight:600; }

    .product-card { display:flex; flex-wrap:wrap; border:1px solid #eee; border-radius:10px; margin-bottom:1.5rem; overflow:hidden; }
    .product-image { width:250px; height:200px; object-fit:cover; }
    .product-details { flex:1; padding:1rem 1.5rem; }

    .payment-paid { background:#16a34a; color:white; padding:1rem; border-radius:10px; text-align:center; }
    .payment-pending { background:#f59e0b; color:white; padding:1rem; border-radius:10px; text-align:center; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="order-container">

    
    

    
    

    
    

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
        <div class="product-card">
            <img class="product-image"
                 src="<?php echo e($item->img_path ? asset('storage/colors/'.$item->img_path) : asset('assets/no-image.png')); ?>">

            <div class="product-details">
                <h5><?php echo e($item->o_i_product_name); ?></h5>
                <p>Qty: <?php echo e($item->o_i_quantity); ?></p>
                <p>Price: ₹<?php echo e(number_format($item->o_i_total_price,2)); ?></p>
            </div>
        </div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

    
    

    
    <div style="margin-top:1rem">
        <a href="<?php echo e(route('order.list')); ?>">← Back to Orders</a>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel_git\ecommerce-web\resources\views/admin/view-order.blade.php ENDPATH**/ ?>