

<?php $__env->startSection('title', 'checkout'); ?>

<?php $__env->startPush('styles'); ?>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.notifications-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 24px;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
}

.notifications-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
    padding-bottom: 16px;
    border-bottom: 1px solid #e5e7eb;
}

.notifications-title {
    font-size: 28px;
    font-weight: 700;
    color: #111827;
}

.mark-all-form {
    display: inline-block;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 16px;
    border: none;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
}

.btn-text {
    background: transparent;
    color: #3b82f6;
}

.btn-text:hover {
    background: #eff6ff;
}

.btn-mark-read {
    padding: 8px;
    background: #f3f4f6;
    color: #6b7280;
}

.btn-mark-read:hover {
    background: #e5e7eb;
    color: #374151;
}

.icon {
    flex-shrink: 0;
}

.notifications-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.notification-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 16px;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
    background: #ffffff;
    transition: all 0.2s ease;
}

.notification-item:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    border-color: #d1d5db;
}

.notification-item.unread {
    background: #eff6ff;
    border-color: #bfdbfe;
}

.notification-indicator {
    width: 8px;
    padding-top: 8px;
}

.unread-dot {
    display: block;
    width: 8px;
    height: 8px;
    background: #3b82f6;
    border-radius: 50%;
}

.notification-content {
    display: flex;
    gap: 12px;
    flex: 1;
}

.notification-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #dbeafe;
    border-radius: 10px;
    color: #3b82f6;
    flex-shrink: 0;
}

.notification-item.read .notification-icon {
    background: #f3f4f6;
    color: #6b7280;
}

.notification-body {
    flex: 1;
    min-width: 0;
}

.notification-title {
    font-size: 16px;
    font-weight: 600;
    color: #111827;
    margin-bottom: 4px;
    line-height: 1.5;
}

.notification-message {
    font-size: 14px;
    color: #6b7280;
    margin-bottom: 8px;
    line-height: 1.5;
}

.notification-time {
    font-size: 13px;
    color: #9ca3af;
}

.mark-read-form {
    display: inline-block;
}

.empty-state {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 64px 24px;
    text-align: center;
}

.empty-icon {
    color: #d1d5db;
    margin-bottom: 16px;
}

.empty-title {
    font-size: 18px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 8px;
}

.empty-description {
    font-size: 14px;
    color: #9ca3af;
}

/* Responsive */
@media (max-width: 640px) {
    .notifications-container {
        padding: 16px;
    }

    .notifications-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }

    .notifications-title {
        font-size: 24px;
    }

    .notification-item {
        padding: 12px;
    }

    .notification-icon {
        width: 36px;
        height: 36px;
    }

    .notification-title {
        font-size: 15px;
    }

    .notification-message {
        font-size: 13px;
    }
}
</style>

<?php $__env->stopPush(); ?>



<?php $__env->startSection('content'); ?>


<div class="notifications-container">
    <div class="notifications-header">
        <h2 class="notifications-title">Notifications</h2>
        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($notifications->count() > 0): ?>
            <form method="POST" action="<?php echo e(route('notifications.markAllRead')); ?>" class="mark-all-form">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-text">
                    <svg class="icon" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M13.5 4L6 11.5L2.5 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Mark all as read
                </button>
            </form>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    <div class="notifications-list">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <div class="notification-item <?php echo e($notification->read_at ? 'read' : 'unread'); ?>">
                <div class="notification-indicator">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$notification->read_at): ?>
                        <span class="unread-dot"></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                
                <div class="notification-content">
                    <div class="notification-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 0 1-3.46 0" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    
                    <div class="notification-body">
                        <h3 class="notification-title"><?php echo e($notification->data['title'] ?? 'Notification'); ?></h3>
                        <p class="notification-message"><?php echo e($notification->data['message'] ?? ''); ?></p>
                        <span class="notification-time"><?php echo e($notification->created_at->diffForHumans()); ?></span>
                    </div>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$notification->read_at): ?>
                    <form method="POST" action="<?php echo e(route('notifications.markRead', $notification->id)); ?>" class="mark-read-form">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-mark-read" title="Mark as read">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M13.5 4L6 11.5L2.5 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </form>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            <div class="empty-state">
                <svg class="empty-icon" width="64" height="64" viewBox="0 0 64 64" fill="none">
                    <path d="M48 21.33A16 16 0 0 0 16 21.33c0 18.67-8 24-8 24h48s-8-5.33-8-24M36.61 56a5.33 5.33 0 0 1-9.22 0" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <h3 class="empty-title">No notifications yet</h3>
                <p class="empty-description">When you receive notifications, they'll appear here</p>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.frontend-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel_git\ecommerce-web\resources\views/notifications/index.blade.php ENDPATH**/ ?>