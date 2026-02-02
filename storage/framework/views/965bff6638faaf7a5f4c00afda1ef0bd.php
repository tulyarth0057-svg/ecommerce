

<?php $__env->startSection('title', 'Track Order'); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
    /* ------------------ Container ------------------ */
    .tracking-main {
        min-height: 100vh;
        padding: 40px 20px;
    }

    .container {
        max-width: 900px;
        margin: 0 auto;
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    }

    .header {
        background: linear-gradient(135deg, #ff6633  100%);
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

    .status-pending { background: #e3f2fd; color: #1976d2; }
    .status-processing { background: #fff3e0; color: #f57c00; }
    .status-shipped { background: #ffe4d6; color: #ff6b35; }
    .status-out_for_delivery { background: #fff8e1; color: #f9a825; }
    .status-delivered { background: #e8f5e9; color: #388e3c; }
    .status-cancelled { background: #ffebee; color: #d32f2f; }

    .checkmark { 
        display: inline-block; 
        width: 20px; 
        height: 20px; 
    }

    /* Map container */
    #map { 
        height: 300px; 
        margin-top: 30px; 
        border-radius: 10px; 
        overflow: hidden;
        border: 2px solid #ffe4d6;
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
            padding: 6px 16px;
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
            left: 30px;
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
            width: 50px;
            height: 50px;
            font-size: 20px;
        }
        
        .step-info {
            text-align: left;
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
        
        #map {
            height: 250px;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="tracking-main">
    <div class="container-fluid">
        <div class="header">
            <h1>Track Your Order</h1>
            <div class="order-id">Order #<?php echo e($order->o_order_number); ?></div>
        </div>

        <div class="content">
            <div class="tracking-container">

                
                <div class="tracking-progress">
                    <?php
                        $statuses = ['pending' => 1, 'processing' => 2, 'shipped' => 3, 'out_for_delivery' => 4, 'delivered' => 5];
                        $currentStep = $statuses[$order->o_order_status] ?? 1;
                    ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status => $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <div class="step <?php echo e($currentStep >= $step ? 'completed' : ''); ?> <?php echo e($currentStep == $step ? 'active' : ''); ?>" data-step="<?php echo e($step); ?>">
                            <div class="step-circle <?php echo e($currentStep == $step ? 'pulse' : ''); ?>">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($currentStep > $step): ?>
                                    <svg class="checkmark" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                <?php else: ?>
                                    <span><?php echo e($step); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <div class="step-info">
                                <div class="step-label"><?php echo e(ucfirst(str_replace('_', ' ', $status))); ?></div>
                                <div class="step-date">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($currentStep >= $step): ?>
                                        <?php echo e(\Carbon\Carbon::parse($order->o_updated_at)->format('d M Y, h:i A')); ?>

                                    <?php else: ?>
                                        Pending
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div> 
                            </div>
                        </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

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
                        <span class="detail-value"><?php echo e(\Carbon\Carbon::parse($order->o_created_at)->format('d M Y, h:i A')); ?></span>
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const orderNumber = '<?php echo e($order->o_order_number); ?>';
    const statusMap = {
        'pending': 1,
        'processing': 2,
        'shipped': 3,
        'out_for_delivery': 4,
        'delivered': 5
    };

    // Initialize map
    let map = L.map('map').setView([28.6139, 77.2090], 13); // Default to Delhi
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);
    let marker;

    function updateLocation(lat, lng) {
        if(lat && lng){
            const latNum = parseFloat(lat);
            const lngNum = parseFloat(lng);
            
            if(!isNaN(latNum) && !isNaN(lngNum)){
                if(!marker){
                    marker = L.marker([latNum, lngNum]).addTo(map);
                    map.setView([latNum, lngNum], 13);
                } else {
                    marker.setLatLng([latNum, lngNum]);
                    map.setView([latNum, lngNum], 13);
                }
            }
        }
    }

    function updateOrderStatus(data) {
        if(!data || !data.status) return;
        
        const currentStep = statusMap[data.status] || 1;

        // Update progress line
        const progressFill = document.querySelector('.progress-line-fill');
        if(progressFill){
            const progressPercentage = ((currentStep - 1) / (Object.keys(statusMap).length - 1)) * 100;
            progressFill.style.width = progressPercentage + '%';
        }

        // Update step circles
        document.querySelectorAll('.step').forEach(stepEl => {
            const stepNum = parseInt(stepEl.dataset.step);
            stepEl.classList.remove('active', 'completed');
            
            const stepCircle = stepEl.querySelector('.step-circle');
            if(stepCircle){
                stepCircle.classList.remove('pulse');
            }
            
            if(stepNum < currentStep) {
                stepEl.classList.add('completed');
            }
            if(stepNum === currentStep) {
                stepEl.classList.add('active');
                if(stepCircle){
                    stepCircle.classList.add('pulse');
                }
            }
        });

        // Update status badge
        const badge = document.querySelector('.status-badge');
        if(badge){
            badge.className = 'status-badge status-' + data.status;
            badge.innerText = data.status.replace(/_/g, ' ').toUpperCase();
        }

        // Update step dates
        document.querySelectorAll('.step').forEach(stepEl => {
            const stepNum = parseInt(stepEl.dataset.step);
            const stepDateEl = stepEl.querySelector('.step-date');
            
            if(stepDateEl){
                if(stepNum <= currentStep && data.updated_at){
                    const date = new Date(data.updated_at);
                    stepDateEl.innerText = date.toLocaleString('en-IN', {
                        day: '2-digit',
                        month: 'short',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit',
                        hour12: true
                    });
                } else {
                    stepDateEl.innerText = 'Pending';
                }
            }
        });

        // Update map
        if(data.latitude && data.longitude){
            updateLocation(data.latitude, data.longitude);
        }
    }

    function fetchOrderStatus() {
        fetch(`/api/order/${orderNumber}/track`)
            .then(res => {
                if(!res.ok) throw new Error('Network response was not ok');
                return res.json();
            })
            .then(data => {
                updateOrderStatus(data);
            })
            .catch(err => {
                console.error('Error fetching order status:', err);
            });
    }

    // Initial fetch
    fetchOrderStatus();

    // Poll every 10 seconds
    setInterval(fetchOrderStatus, 10000);
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.frontend-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel_git\ecommerce-web\resources\views/track-order.blade.php ENDPATH**/ ?>