

<?php $__env->startSection('title', 'Track Order'); ?>

<?php $__env->startPush('styles'); ?>
<style>
  

    .container {
        max-width: 900px;
        margin: 0 auto;
        background: white;
        border-radius: 10px;
      
        overflow: hidden;
    }

    .header {
        background: #ff6633;
        padding: 40px 30px;
        color: white;
        text-align: center;
    }

    .header h1 {
        font-size: 32px;
        margin-bottom: 10px;
        font-weight: 700;
        color: white;
    }

    .order-id {
        font-size: 18px;
        opacity: 0.95;
        font-weight: 500;
        background: rgba(255,255,255,0.2);
        padding: 8px 20px;
        border-radius: 20px;
        display: inline-block;
        margin-top: 10px;
    }

    .content {
        padding: 50px 30px;
    }

    .tracking-container {
        position: relative;
        padding: 20px 0;
    }

    .tracking-progress {
        display: flex;
        justify-content: space-between;
        position: relative;
        margin-bottom: 20px;
    }

    .progress-line {
        position: absolute;
        top: 30px;
        left: 0;
        right: 0;
        height: 4px;
        background: #ffe4d6;
        z-index: 1;
    }

    .progress-line-fill {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        background: linear-gradient(90deg, #ff6b35 0%, #f7931e 100%);
        transition: width 1s ease;
        border-radius: 2px;
    }

    .step {
        position: relative;
        z-index: 2;
        text-align: center;
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .step-circle {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: white;
        border: 4px solid #ffe4d6;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 15px;
        transition: all 0.4s ease;
        position: relative;
    }

    .step.active .step-circle {
        border-color: #ff6b35;
        background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
        color: white;
        transform: scale(1.1);
        box-shadow: 0 5px 15px rgba(255, 107, 53, 0.4);
    }

    .step.completed .step-circle {
        border-color: #ff6b35;
        background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
        color: white;
    }

    .step-label {
        font-size: 14px;
        font-weight: 600;
        color: #999;
        transition: color 0.3s ease;
        max-width: 120px;
    }

    .step.active .step-label,
    .step.completed .step-label {
        color: #333;
    }

    .step-date {
        font-size: 12px;
        color: #999;
        margin-top: 5px;
    }

    .step.active .step-date,
    .step.completed .step-date {
        color: #ff6b35;
    }

    .pulse {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% {
            box-shadow: 0 5px 15px rgba(255, 107, 53, 0.4);
        }
        50% {
            box-shadow: 0 5px 25px rgba(255, 107, 53, 0.8);
        }
    }

    .order-details {
        margin-top: 50px;
        background: #fff8f5;
        padding: 30px;
        border-radius: 15px;
        border: 1px solid #ffe4d6;
    }

    .order-details h3 {
        font-size: 20px;
        margin-bottom: 20px;
        color: #ff6b35;
        font-weight: 700;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid #ffe4d6;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-label {
        color: #666;
        font-weight: 500;
    }

    .detail-value {
        color: #333;
        font-weight: 600;
        text-align: right;
    }

    .status-badge {
        display: inline-block;
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
    }

    .status-placed {
        background: #e3f2fd;
        color: #1976d2;
    }

    .status-processing {
        background: #fff3e0;
        color: #f57c00;
    }

    .status-shipped {
        background: #ffe4d6;
        color: #ff6b35;
    }

    .status-out_for_delivery {
        background: #fff8e1;
        color: #f9a825;
    }

    .status-delivered {
        background: #e8f5e9;
        color: #388e3c;
    }

    .status-cancelled {
        background: #ffebee;
        color: #d32f2f;
    }

    .checkmark {
        display: inline-block;
        width: 20px;
        height: 20px;
    }

    @media (max-width: 768px) {
        .tracking-main {
            padding: 20px 10px;
        }

        .header h1 {
            font-size: 24px;
        }

        .order-id {
            font-size: 14px;
        }

        .content {
            padding: 30px 20px;
        }

        .tracking-progress {
            flex-direction: column;
            align-items: center;
        }

        .progress-line {
            width: 4px;
            height: 100%;
            left: 50%;
            transform: translateX(-50%);
            top: 0;
        }

        .progress-line-fill {
            width: 100% !important;
            height: 0%;
            transition: height 1s ease;
        }

        .step {
            width: 100%;
            flex-direction: row;
            justify-content: flex-start;
            margin: 20px 0;
        }

        .step-circle {
            margin-bottom: 0;
            margin-right: 20px;
        }

        .step-label {
            text-align: left;
        }

        .detail-row {
            flex-direction: column;
            gap: 5px;
        }

        .detail-value {
            text-align: left;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="tracking-main">

     <div class="header">
            <h1>Track Your Order</h1>
            <div class="order-id">Order #<?php echo e($order->o_order_number); ?></div>
        </div>
    <div class="container">
       

       <div class="content">
    <div class="tracking-container">

        
        <div class="tracking-progress">
            <?php
                $statuses = ['pending' => 1, 'processing' => 2, 'shipped' => 3, 'out_for_delivery' => 4, 'delivered' => 5];
                $currentStep = $statuses[$order->o_order_status] ?? 1;
            ?>

            <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status => $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="step <?php echo e($currentStep >= $step ? 'completed' : ''); ?> <?php echo e($currentStep == $step ? 'active' : ''); ?>" data-step="<?php echo e($step); ?>">
                    <div class="step-circle <?php echo e($currentStep == $step ? 'pulse' : ''); ?>">
                        <?php if($currentStep > $step): ?>
                            
                            <svg class="checkmark" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                            </svg>
                        <?php else: ?>
                            
                            <span><?php echo e($step); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="step-info">
                        <div class="step-label"><?php echo e(ucfirst(str_replace('_', ' ', $status))); ?></div>
                        <div class="step-date">
                            <?php if($currentStep >= $step): ?>
                                <?php echo e($order->o_updated_at ? $order->o_updated_at->format('M d, Y') : 'Completed'); ?>

                            <?php else: ?>
                                Pending
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <div class="progress-line">
                <div class="progress-line-fill" style="width: <?php echo e(($currentStep - 1) / (count($statuses) - 1) * 100); ?>%;"></div>
            </div>
        </div>

        
        <div class="order-details">
            <h3>Order Details</h3>
            <div class="detail-row">
                <span class="detail-label">Status</span>
                <span class="detail-value">
                    <span class="status-badge status-<?php echo e($order->o_order_status); ?>">
                        <?php echo e(ucfirst(str_replace('_', ' ', $order->o_order_status))); ?>

                    </span>
                </span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Order Date</span>
                <span class="detail-value"><?php echo e($order->o_created_at ? $order->o_created_at->format('M d, Y h:i A') : 'N/A'); ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Total Amount</span>
                <span class="detail-value">₹<?php echo e(number_format($order->o_total_amount, 2)); ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Shipping Address</span>
                <span class="detail-value"><?php echo e($order->o_street_address); ?>, <?php echo e($order->o_city); ?>, <?php echo e($order->o_state); ?>, <?php echo e($order->o_postcode); ?></span>
            </div>
        </div>
    </div>
</div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get order status from Laravel
        const orderStatus = '<?php echo e($order->o_order_status); ?>';
        
        // Map status to step number
        const statusMap = {
            'placed': 1,
            'processing': 2,
            'shipped': 3,
            'out_for_delivery': 4,
            'delivered': 5
        };
        
        const currentStep = statusMap[orderStatus] || 1;
        const progressFill = document.getElementById('progressFill');
        const isMobile = window.innerWidth <= 768;
        
        // Calculate progress percentage
        const progressPercentage = ((currentStep - 1) / 4) * 100;
        
        // Animate progress bar
        setTimeout(() => {
            if (isMobile) {
                progressFill.style.height = progressPercentage + '%';
            } else {
                progressFill.style.width = progressPercentage + '%';
            }
        }, 300);

        // Handle window resize
        window.addEventListener('resize', () => {
            const nowMobile = window.innerWidth <= 768;
            if (nowMobile) {
                progressFill.style.width = '100%';
                progressFill.style.height = progressPercentage + '%';
            } else {
                progressFill.style.height = '100%';
                progressFill.style.width = progressPercentage + '%';
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel_git\ecommerce-web\resources\views/track-order.blade.php ENDPATH**/ ?>