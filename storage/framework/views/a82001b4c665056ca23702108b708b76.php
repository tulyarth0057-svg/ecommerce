

<?php $__env->startSection('title', 'Order Details'); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* ================= THEME VARIABLES ================= */
:root {
    --primary-color: #FF6B35;
    --secondary-color: #FF8C42;
    --yellow-color: #FFC107;
    --light-bg: #F9F9F9;
    --dark-gray: #2d3436;
    --text-gray: #666;
}

body {
    background-color: var(--light-bg);
}

/* ================= HEADER ================= */
.order-header {
    background:#FF6B35;
    padding: 1.5rem 0;
    margin-bottom: 2rem;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    color:white;
}

.order-header h1 {
    color:white;
    font-weight: 600;
    font-size: 1.5rem;
    margin: 0;
}

/* ================= ORDER CARD ================= */
.order-card {
    background: #fff;
    border-radius: 8px;
    padding: 0;
    margin-bottom: 20px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    overflow: hidden;
}

.order-card-inner {
    display: flex;
    gap: 30px;
    padding: 30px;
}

/* ================= PRODUCT IMAGE ================= */
.order-image-wrapper {
    position: relative;
    width: 280px;
    flex-shrink: 0;
}

.order-image-wrapper img {
    width: 100%;
    border-radius: 8px;
    object-fit: cover;
}

/* ================= STATUS BADGE ================= */
.status-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    padding: 6px 16px;
    font-size: 13px;
    font-weight: 600;
    border-radius: 4px;
    color: #fff;
    background: var(--yellow-color);
    text-transform: capitalize;
}

.status-badge.completed {
    background: #4CAF50;
}

.status-badge.cancelled {
    background: #f44336;
}

.status-badge.pending {
    background: var(--yellow-color);
}

/* ================= ORDER INFO ================= */
.order-info {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.order-id {
    font-size: 14px;
    color: var(--text-gray);
    margin-bottom: 8px;
}

.product-name {
    font-weight: 600;
    color: var(--primary-color);
    font-size: 1.5rem;
    margin-bottom: 20px;
}

/* ================= META ================= */
.order-meta {
    list-style: none;
    padding: 0;
    margin-bottom: 25px;
}

.order-meta li {
    margin-bottom: 10px;
    color: var(--text-gray);
    font-size: 15px;
}

.order-meta li i {
    color: #4CAF50;
    margin-right: 5px;
}

/* ================= VARIANTS ================= */


.variants-section h6 {
    font-size: 14px;
    font-weight: 600;
    color: var(--dark-gray);
    margin-bottom: 10px;
}

.variants {
    display: flex;
    gap: 30px;
}

.variant-item {
    display: flex;
    flex-direction: column;
}

.variant-item small {
    color: var(--text-gray);
    margin-bottom: 8px;
    font-size: 13px;
}

.size-box {
    background: #f5f5f5;
    color: var(--dark-gray);
    padding: 8px 20px;
    border-radius: 4px;
    font-weight: 600;
    border: 1px solid #e0e0e0;
    display: inline-block;
}

.color-dot {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    border: 2px solid #e0e0e0;
    display: inline-block;
}

/* ================= ORDER SUMMARY ================= */
.order-summary {
    min-width: 280px;
    background: #fff;
    padding: 30px;
    display: flex;
    flex-direction: column;
    border-left: 1px solid #f0f0f0;
}

.price {
    color: var(--primary-color);
    font-weight: 700;
    font-size: 1.3rem;
    margin-bottom: 25px;
}

/* ================= PRICE BREAKUP ================= */
.price-breakup {
    margin-bottom: 20px;
}

.price-breakup p {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    font-size: 15px;
    color: var(--text-gray);
}

.price-breakup hr {
    margin: 15px 0;
    border-color: #e0e0e0;
}

.price-breakup strong {
    display: flex;
    justify-content: space-between;
    font-size: 16px;
    color: var(--dark-gray);
}

/* ================= BUTTONS ================= */
.btn-payment-status {
    padding: 12px;
    border-radius: 4px;
    font-weight: 600;
    border: none;
    cursor: default;
    margin-bottom: 15px;
    width: 100%;
    font-size: 15px;
    background: var(--yellow-color);
    color: var(--dark-gray);
}

.btn-payment-status.paid {
    background: #4CAF50;
    color: white;
}

.action-buttons {
    display: flex;
    gap: 5px;
    width: 100%;
}

.btn-action {
    border-radius: 4px;
    font-weight: 500;
    border: none;
    cursor: pointer;
    transition: all 0.2s ease;
    flex: 1;
    font-size: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    height: 50px;
    width: 100%;
}

.btn-dark-custom {
    background: var( --primary-color);
    color: white;
    width: 100%;
}

.btn-dark-custom:hover {
    background: #1a1d1f;
    color: white;
}

.btn-outline-custom {
    border: 1px solid var(--dark-gray);
    background: white;
    color: var(--dark-gray);
}

.btn-outline-custom:hover {
    background: #f5f5f5;
}

/* ================= RESPONSIVE ================= */
@media (max-width: 992px) {
    .order-card-inner {
        flex-direction: column;
        gap: 20px;
    }

    .order-image-wrapper {
        width: 100%;
    }

    .order-summary {
        border-left: none;
        border-top: 1px solid #f0f0f0;
        padding: 20px 0 0 0;
    }
}

@media (max-width: 576px) {
    .action-buttons {
        flex-direction: column;
    }

    .product-name {
        font-size: 1.25rem;
    }

}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<!-- ================= HEADER ================= -->
<div class="order-header">
    <div class="container">
        <h1>MY ORDERS</h1>
    </div>
</div>

<!-- ================= ORDER LIST ================= -->
<div class="container mb-5">
    <?php $__currentLoopData = $orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="order-card">
        <div class="order-card-inner">
            
            <!-- LEFT SECTION: IMAGE + INFO -->
            <div style="display: flex; gap: 30px; flex: 1;">
                <!-- IMAGE -->
                <div class="order-image-wrapper">
                    <span class="status-badge <?php echo e(strtolower($order->o_order_status)); ?>">
                        <?php echo e(ucfirst($order->o_order_status)); ?>

                    </span>
                    <img src="<?php echo e($item->img_path ? asset('storage/colors/'.$item->img_path) : asset('assets/no-image.png')); ?>"
                         alt="<?php echo e($item->o_i_product_name); ?>">
                </div>

                <!-- INFO -->
                <div class="order-info">
                    <p class="order-id">ORDER #<?php echo e($order->o_order_number); ?></p>
                    <h4 class="product-name"><?php echo e($item->o_i_product_name); ?></h4>

                    <ul class="order-meta">
                        <li><i class="ri-checkbox-circle-fill"></i> Payment: <?php echo e(ucfirst($order->o_payment_method)); ?></li>
                        <li><i class="ri-checkbox-circle-fill"></i> Quantity: <?php echo e($item->o_i_quantity); ?></li>
                        <li><i class="ri-checkbox-circle-fill"></i> Status: <?php echo e(ucfirst($order->o_order_status)); ?></li>
                    </ul>

                    <div class="variants-section">
                        <h6> Sizes:</h6>
                        <div class="variants">
                            <div class="variant-item">
                                <span class="size-box"><?php echo e($item->o_i_size); ?></span>
                            </div>
                        </div>

                        <h6 class="mt-3"> Colors:</h6>
                    

                        <div class="variants">
                            <div class="variant-item">
                           <?php if($item->color_code): ?>
    <span class="color-dot"
          style="background: <?php echo e($item->color_code); ?>">
    </span>
<?php else: ?>
    <small style="color:red;">Color not available</small>
<?php endif; ?>

</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT SECTION: SUMMARY -->
            <div class="order-summary">
                
                <div class="price-breakup">
                    <p><span>Subtotal:</span><span>₹<?php echo e(number_format($item->o_i_total_price, 2)); ?></span></p>
                    <p><span>Shipping:</span><span>₹<?php echo e(number_format($order->o_shipping_cost / count($orderItems), 2)); ?></span></p>
                    <p><span>Quantity:</span><span><?php echo e($item->o_i_quantity); ?></span></p>
                    <hr>
                    <strong><span>Total:</span><span class="price">₹<?php echo e(number_format($item->o_i_total_price + ($order->o_shipping_cost / count($orderItems)), 2)); ?></span></strong>
                </div>

                

                <button class="btn-payment-status <?php echo e(strtolower($order->o_payment_status)); ?>">
                    Payment <?php echo e(ucfirst($order->o_payment_status)); ?>

                </button>

                <div class="action-buttons">
                    <a href="#" class="btn-action btn-dark-custom">
                        <i class="ri-shopping-bag-line"></i> View Details
                    </a>
                    <a href="#" class="btn-action btn-outline-custom">
                        <i class="ri-truck-line"></i> Track Order
                    </a>
                </div>
            </div>

        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel_git\ecommerce-web\resources\views/order-view.blade.php ENDPATH**/ ?>