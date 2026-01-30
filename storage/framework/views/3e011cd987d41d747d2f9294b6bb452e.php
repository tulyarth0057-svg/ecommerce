<h2>My Notifications</h2>

<form method="POST" action="<?php echo e(route('notifications.markAllRead')); ?>">
    <?php echo csrf_field(); ?>
    <button type="submit">Mark all as read</button>
</form>

<hr>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
    <div style="margin-bottom:15px;
        padding:10px;
        background: <?php echo e($notification->read_at ? '#f8f9fa' : '#e6f3ff'); ?>">

        <strong><?php echo e($notification->data['title'] ?? 'Notification'); ?></strong><br>
        <?php echo e($notification->data['message'] ?? ''); ?><br>

        <small><?php echo e($notification->created_at->diffForHumans()); ?></small>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$notification->read_at): ?>
            <form method="POST"
                  action="<?php echo e(route('notifications.markRead', $notification->id)); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit">Mark as read</button>
            </form>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    <p>No notifications found</p>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH E:\laravel_git\ecommerce-web\resources\views/notifications.blade.php ENDPATH**/ ?>