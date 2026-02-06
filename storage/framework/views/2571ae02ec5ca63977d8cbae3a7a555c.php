

<?php $__env->startSection('title', 'Assigned Orders'); ?>

<?php $__env->startPush('styles'); ?>
<style>

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
    padding: 15px 20px;
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
        <h1>Assigned Orders</h1>
    </div>

    <div class="table-card">
        <div class="table-wrapper">

            <table id="assignedOrdersTable" class="display">

                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Order Number</th>
                        <th>Customer Name</th>
                        <th>Delivery Address</th>
                        <th>payments</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $orders ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>

                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>

                        <td>#<?php echo e($order->o_order_number); ?></td>

                        <td><?php echo e($order->o_name ?? 'Guest'); ?></td>

                        <td>
                            <?php echo e($order->o_street_address); ?>,
                            <?php echo e($order->o_city); ?>,
                            <?php echo e($order->o_state); ?>,
                            <?php echo e($order->o_postcode); ?>

                        </td>
                         
                         <td><?php echo e($order->o_payment_method ?? 'NoPayment'); ?></td>
                         
                        <td>
                            <?php
                                $status = $order->o_order_status;

                                $badgeClass = match($status) {
                                    'confirmed' => 'badge-assigned',
                                    'processing' => 'badge-pending',
                                    'shipped' => 'badge-delivered',
                                    default => 'badge-assigned'
                                };

                                $statusText = match($status) {
                                    'confirmed' => 'Assigned',
                                    'processing' => 'Out For Delivery',
                                    'shipped' => 'Delivered',
                                    default => ucfirst($status)
                                };
                            ?>

                            <span class="badge <?php echo e($badgeClass); ?>">
                                <?php echo e($statusText); ?>

                            </span>
                        </td>

                       <td>
                            <div class="d-flex align-items-center gap-2">

                                
                                <a href="<?php echo e(route('courier.assigned.view', $order->o_id)); ?>"
                                class="btn btn-warning text-white btn-sm">
                                    View
                                </a>

                                
                             
                                   <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($order->o_order_status == 'confirmed'): ?>
                                        <button 
                                            class="btn btn-info text-white btn-sm pickup-btn"
                                            data-id="<?php echo e($order->o_id); ?>">
                                            Picked
                                        </button>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                         

                            </div>
                        </td>


                    </tr>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

                    <tr>
                        <td colspan="6" class="text-center p-4">
                            No assigned orders found
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
$(document).on('click', '.pickup-btn', function () {

    let button = $(this);
    let orderId = button.data('id');

    $.ajax({
        url: "/courier/picked-up/" + orderId,
        type: "POST",
        data: {
            _token: "<?php echo e(csrf_token()); ?>"
        },

        success: function (response) {

            alert(response.message);

            // Button replace after pickup
            button.replaceWith('<span class="badge bg-success">Picked Up</span>');
        },

        error: function () {
            alert("Something went wrong");
        }
    });

});
</script>



<script>
$(document).ready(function () {

    if ($.fn.DataTable.isDataTable('#assignedOrdersTable')) {
        $('#assignedOrdersTable').DataTable().destroy();
    }

    $('#assignedOrdersTable').DataTable({
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50],
        order: [[1, 'desc']]
    });

});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.courier-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel_git\ecommerce-web\resources\views/courier/assigned-order.blade.php ENDPATH**/ ?>