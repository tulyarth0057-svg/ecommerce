<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>order-invoice-pgf</title>
    </head>

     <style>
        body { font-family: sans-serif; }
        .invoice-box { max-width: 800px; margin:auto; padding:30px; border:1px solid #eee; }
        table { width:100%; border-collapse: collapse; margin-top: 20px;}
        table th, table td { border: 1px solid #ddd; padding:8px; text-align:left; }
        table th { background:#f5f5f5; }
        h2,h3 { margin: 0; padding: 5px 0; }
    </style>

    <body>
        

    <div class="invoice-box">
        <h2>Invoice</h2>
        <p>Order #: <?php echo e($order->o_order_number); ?></p>
        <p>Date: <?php echo e(\Carbon\Carbon::parse($order->o_created_at)->format('d-m-Y H:i')); ?></p>

        <h3>Customer Details</h3>
        <p>Name: <?php echo e($order->o_name); ?></p>
        <p>Email: <?php echo e($order->o_email); ?></p>
        <p>Phone: <?php echo e($order->o_phone); ?></p>
        <p>Address: <?php echo e($order->o_street_address); ?>, <?php echo e($order->o_city); ?>, <?php echo e($order->o_state); ?>, <?php echo e($order->o_postcode); ?></p>

        <h3>Order Items</h3>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Size</th>
                    <th>Qty</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <tr>
                    <td><?php echo e($item->o_i_product_name); ?></td>
                    <td><?php echo e($item->o_i_size); ?></td>
                    <td><?php echo e($item->o_i_quantity); ?></td>
                    <td><?php echo e(number_format($item->o_i_product_price + $item->o_i_size_price,2)); ?></td>
                    <td><?php echo e(number_format($item->o_i_total_price,2)); ?></td>
                </tr>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </tbody>
        </table>

        <h3>Summary</h3>
        <p>Subtotal: <?php echo e(number_format($order->o_subtotal,2)); ?></p>
        <p>Shipping: <?php echo e(number_format($order->o_shipping_cost,2)); ?></p>
        <p><strong>Total: <?php echo e(number_format($order->o_total_amount,2)); ?></strong></p>
    </div>

</body>
 </html><?php /**PATH E:\laravel_git\ecommerce-web\resources\views/invoice.blade.php ENDPATH**/ ?>