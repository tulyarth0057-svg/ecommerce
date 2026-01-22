<?php $__env->startSection('title', 'Order Confirmation'); ?>

<?php $__env->startSection('content'); ?>

    <!-- Custom Styles -->
    <?php $__env->startPush('styles'); ?>
      

        <style>
            :root {
                --orange-primary: #ff6b35;
                --orange-dark: #e55a2b;
                --orange-light: #fff3e0;
                --pink-light: #fce7f3;
                --gray-light: #f3f4f6;
                --gray: #6b7280;
                --dark: #1f2937;
            }

            .order-page-wrapper {
                min-height: 100vh;
                padding: 3rem 1rem;
                background: var(--gray-light);
            }

            .order-success-card {
                max-width: 760px;
                margin: 0 auto;
                background: white;
                border-radius: 20px;
                box-shadow: 0 10px 40px rgba(0,0,0,0.12);
                border: 3px dashed var(--orange-primary);
                padding: 2.5rem 2rem;
                position: relative;
                overflow: hidden;
            }

            .success-icon {
                width: 90px;
                height: 90px;
                background: linear-gradient(135deg, var(--orange-primary), var(--orange-dark));
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 1.5rem;
                box-shadow: 0 8px 25px rgba(255,107,53,0.35);
                animation: successPulse 2s infinite ease-in-out;
            }

            @keyframes successPulse {
                0%, 100% { transform: scale(1); }
                50% { transform: scale(1.12); }
            }

            .success-icon i {
                color: white;
                font-size: 3.2rem;
            }

            .success-title {
                text-align: center;
                font-size: 2.4rem;
                font-weight: 800;
                color: var(--orange-primary);
                margin-bottom: 0.8rem;
            }

            .success-subtitle {
                text-align: center;
                color: var(--gray);
                font-size: 1.15rem;
                margin-bottom: 2.5rem;
                line-height: 1.6;
            }

            .order-details-section {
                background: var(--gray-light);
                border-radius: 12px;
                padding: 1.5rem;
                margin-bottom: 2rem;
            }

            .detail-row {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 12px 0;
                border-bottom: 1px solid #e5e7eb;
            }

            .detail-row:last-child {
                border-bottom: none;
            }

            .detail-label {
                color: var(--gray);
                font-weight: 500;
                font-size: 1rem;
            }

            .order-number {
                font-weight: 700;
                color: var(--dark);
                font-size: 1.15rem;
            }

            .detail-value,
            .total-amount {
                font-weight: 700;
                color: var(--dark);
            }

            .total-amount {
                font-size: 1.4rem;
                color: var(--orange-dark);
            }

            .payment-badge {
                padding: 6px 16px;
                border-radius: 999px;
                font-size: 0.9rem;
                font-weight: 600;
                text-transform: capitalize;
            }

            .order-items-header {
                font-size: 1.5rem;
                font-weight: 700;
                color: var(--dark);
                margin: 2.5rem 0 1.2rem;
                text-align: center;
            }

            .order-item-card {
                background: var(--gray-light);
                border: 1px solid #e5e7eb;
                border-radius: 12px;
                padding: 1.2rem;
                margin-bottom: 1rem;
                transition: all 0.2s ease;
            }

            .order-item-card:hover {
                transform: translateY(-3px);
                box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            }

            .item-name {
                margin: 0 0 0.6rem;
                font-size: 1.15rem;
                font-weight: 600;
                color: var(--dark);
            }

            .item-meta {
                margin: 0 0 0.6rem;
                color: var(--gray);
                font-size: 0.95rem;
            }

            .item-price {
                font-size: 1.25rem;
                font-weight: 700;
                color: var(--dark);
                text-align: right;
            }

            .shipping-section {
                background: white;
                border-radius: 12px;
                padding: 1.5rem;
                border: 1px solid #e5e7eb;
                margin: 2rem 0;
            }

            .shipping-header {
                display: flex;
                align-items: center;
                gap: 10px;
                font-size: 1.4rem;
                font-weight: 700;
                color: var(--dark);
                margin-bottom: 1.2rem;
            }

            .shipping-header i {
                font-size: 1.6rem;
                color: var(--orange-dark);
            }

            .shipping-address {
                line-height: 1.8;
                color: #374151;
                font-size: 1rem;
            }

            .shipping-address strong {
                color: var(--dark);
            }

            .action-buttons {
                display: flex;
                gap: 1rem;
                margin: 2.5rem 0;
            }

            .action-buttons .btn {
                padding: 0.9rem 1.8rem;
                font-weight: 600;
                border-radius: 50px;
                transition: all 0.25s ease;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                flex: 1;
            }

            .bg-secondary {
                background: var(--gray);
                border: none;
                color: white;
            }

            .bg-secondary:hover {
                background: #4b5563;
            }

            .btn-outline-pink {
                border: 2px solid var(--orange-light);
                color: var(--orange-light);
                background: var(--orange-dark);
            }

            .btn-outline-pink:hover {
                background: var(--orange-dark);
                color: white;
            }

            .info-box {
                background: var(--orange-light);
                border-left: 5px solid var(--orange-dark);
                border-radius: 10px;
                padding: 1.2rem 1.5rem;
                margin-top: 1.5rem;
                color: #374151;
                font-size: 0.98rem;
            }

            .info-box i {
                color: var(--orange-light);
            }

            @media (max-width: 576px) {
                .detail-row {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 6px;
                }
                .action-buttons {
                    flex-direction: column;
                }
                .order-success-card {
                    padding: 1.8rem 1.2rem;
                }
                .ri-truck-line{
                    background:orangered;
                }
                .view-btn{
                    background: orangered;
                }
            }
        </style>
    <?php $__env->stopPush(); ?>

    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area ptb-100 text-center overflow-hidden"
     style="background-image: url('<?php echo e(asset('category_banners/shopping-cart-icon-order-confirmation-banner.webp')); ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 400px;">
        <div class="container">
            <span class="d-block extra-color mt-3 fs-4">
                <a href="/" class="extra-color">Home</a> / Order Confirmation
            </span>
            <h2 class="extra-color font-24 font-xl-32 mst-5 mst-xl-9">Order Confirmation</h2>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <!-- main start -->
    <main id="main">
        <div class="order-page-wrapper">
            <div class="container">
                <div class="order-success-card">

                    <!-- Success Icon -->
                    <div class="success-icon">
                        <i class="ri-check-line"></i>
                    </div>

                    <!-- Success Message -->
                    <h1 class="success-title">Order Placed Successfully!</h1>
                    <p class="success-subtitle">Thank you for your order. We've received your order and will process it soon.</p>

                    <!-- Order Details -->
                    <div class="order-details-section">
                        <div class="detail-row">
                            <span class="detail-label">Order Number:</span>
                            <span class="order-number"><?php echo e($order->o_order_number); ?></span>
                        </div>

                        <div class="detail-row">
                            <span class="detail-label">Order Date:</span>
                            <span class="detail-value">
                                <?php echo e(\Carbon\Carbon::parse($order->o_created_at)->format('d M Y, h:i A')); ?>

                            </span>
                        </div>

                        <div class="detail-row">
                            <span class="detail-label">Payment Method:</span>
                            <span class="payment-badge"><?php echo e($order->o_payment_method); ?></span>
                        </div>

                        <div class="detail-row">
                            <span class="detail-label">Payment Status:</span>
                            <span class="payment-badge"><?php echo e(ucfirst($order->o_payment_status)); ?></span>
                        </div>

                        <div class="detail-row">
                            <span class="detail-label">Total Amount:</span>
                            <span class="total-amount">₹<?php echo e(number_format($order->o_total_amount, 2)); ?></span>
                        </div>
                    </div>

                    <!-- Order Items -->
                    <h3 class="order-items-header">Order Items</h3>

                                        <?php $__empty_1 = true; $__currentLoopData = $orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="order-item-card">
                                <h4 class="item-name"><?php echo e($item->o_i_product_name); ?></h4>

                                <p class="item-meta">
                                  Size: <?php echo e($item->o_i_size ?? '-'); ?> |
                                    Qty: <?php echo e($item->o_i_quantity); ?> |
                                    Product Price: ₹<?php echo e(number_format($item->o_i_product_price, 2)); ?> |
                                    Size Price: ₹<?php echo e(number_format($item->o_i_size_price, 2)); ?>

                                </p>

                                <div class="item-price">
                                    ₹<?php echo e(number_format($item->o_i_total_price, 2)); ?>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p class="text-center text-muted">No items found in this order.</p>
                        <?php endif; ?>



                    <!-- Shipping Address -->
                    <div class="shipping-section">
                        <div class="shipping-header">
                            <i class="ri-truck-line"></i> Shipping Address
                        </div>
                        <div class="shipping-address">
                            <strong><?php echo e($order->o_name); ?></strong><br>
                            <?php echo e($order->o_email); ?> | <?php echo e($order->o_phone); ?><br>
                            <?php echo e($order->o_street_address); ?><br>
                            <?php echo e($order->o_city); ?>, <?php echo e($order->o_state); ?> <?php echo e($order->o_postcode); ?>

                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <a href="<?php echo e(url('/')); ?>" class="btn text-white bg-secondary rounded-5 flex-fill">
                            <i class="ri-shopping-bag-3-line me-2"></i>
                            Continue Shopping
                        </a>

                        <a href="<?php echo e(route('my.order', ['orderId' => $order->o_id])); ?>">
                            <button type="button" class="btn btn-outline-orange text-white flex-fill bg-warning">
                                <i class="ri-eye-line me-2"></i>
                                View Order
                            </button>
                        </a> 

 

                    </div>
                    
                    

                    <!-- Info Box -->
                    <div class="info-box">
                        <p>
                            <i class="ri-information-line me-2"></i>
                            <strong>Payment on Delivery:</strong> Please keep exact amount ready. Our delivery person will collect payment when delivering your order.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </main>


    <?php $__env->startPush('scripts'); ?>
 

<?php if(session('order_placed')): ?>
<script>
Swal.fire({
    title: 'Order Placed Successfully!',
    text: 'Thank you for your purchase.',
    icon: 'success',
    confirmButtonText: 'Continue Shopping'
});
</script>
<?php endif; ?>

<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel_git\ecommerce-web\resources\views/order.blade.php ENDPATH**/ ?>