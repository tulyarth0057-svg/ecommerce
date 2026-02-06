

<?php $__env->startSection('title', 'Assigned-view-orders'); ?>


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
        <h1 class="mb-4">Picked Up Orders list</h1>
    </div>

    <div class="table-card">
        <div class="table-wrapper">
            <table id="pickedOrdersTable" class="display">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Order Number</th>
                        <th>Customer Name</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>

                        <td>#<?php echo e($order->o_order_number); ?></td>

                        <td><?php echo e($order->o_name); ?></td>

                        <td>
                            <?php echo e($order->o_street_address); ?>,
                            <?php echo e($order->o_city); ?>,
                            <?php echo e($order->o_state); ?>,
                            <?php echo e($order->o_postcode); ?>

                        </td>

                        <td>
                            <span class="badge bg-info">
                                Picked Up
                            </span>
                        </td>

                        <td class="d-flex gap-2">

                            
                            <a href="<?php echo e(route('courier.assigned.view', $order->o_id)); ?>"
                               class="btn btn-warning btn-sm text-white">
                                View
                            </a>

                            
                              <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($order->o_order_status == 'processing'): ?>

                                <button class="btn btn-success btn-sm deliverBtn"
                                        data-id="<?php echo e($order->o_id); ?>">
                                    Delivered
                                </button>

                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


                        </td>

                    </tr>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            No picked up orders found
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
$(document).on('click', '.deliverBtn', function () {

    let orderId = $(this).data('id');
    let button = $(this);

    Swal.fire({
        title: 'Are you sure?',
        text: "Mark this order as Delivered?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delivered!'
    }).then((result) => {

        if (result.isConfirmed) {

            $.ajax({
                url: "/courier/delivered/" + orderId,
                type: "POST",
                data: {
                    _token: "<?php echo e(csrf_token()); ?>"
                },

                success: function (response) {

                    if (response.status) {

                        Swal.fire(
                            'Success!',
                            response.message,
                            'success'
                        );

                        // Button disable ya remove karna
                        button.closest("tr").fadeOut();

                    } else {
                        Swal.fire('Error', response.message, 'error');
                    }
                },

                error: function () {
                    Swal.fire('Error', 'Something went wrong', 'error');
                }

            });

        }

    });

});
</script>


<script>
$(document).ready(function () {

    $('#pickedOrdersTable').DataTable({
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        pageLength: 5,
        order: [[1, 'desc']]
    });

});
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.courier-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel_git\ecommerce-web\resources\views/courier/pickeduporder-list.blade.php ENDPATH**/ ?>