@extends('layouts.frontend-layout')

@section('title', 'notifications')

@push('styles')
<style>


.notifications-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 32px;
    background: #ffffff;
    border-radius: 24px;
    box-shadow: 0 10px 40px rgba(251, 146, 60, 0.15);
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
}

.notifications-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 28px;
    padding-bottom: 20px;
    border-bottom: 2px solid #fed7aa;
}

.notifications-title {
    font-size: 32px;
    font-weight: 700;
    background: linear-gradient(135deg, #fb923c 0%, #f97316 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.mark-all-form {
    display: inline-block;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    border: none;
    border-radius: 12px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-text {
    background: linear-gradient(135deg, #fb923c 0%, #f97316 100%);
    color: #ffffff;
    box-shadow: 0 4px 12px rgba(251, 146, 60, 0.3);
}

.btn-text:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(251, 146, 60, 0.4);
}

.btn-text:active {
    transform: translateY(0);
}

.btn-mark-read {
    padding: 8px 16px;
    background: #ffedd5;
    color: #ea580c;
    font-size: 13px;
    border-radius: 10px;
    margin-top: 12px;
}

.btn-mark-read:hover {
    background: #fed7aa;
    color: #c2410c;
}

.icon {
    flex-shrink: 0;
}

.notifications-list {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.notification-item {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    padding: 20px;
    border-radius: 16px;
    border: 2px solid #fed7aa;
    background: #fffbf5;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.notification-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background: linear-gradient(180deg, #fb923c 0%, #f97316 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.notification-item:hover {
    box-shadow: 0 8px 24px rgba(251, 146, 60, 0.15);
    border-color: #fdba74;
    transform: translateY(-2px);
}

.notification-item:hover::before {
    opacity: 1;
}

.notification-item.unread {
    background: linear-gradient(135deg, #fff7ed 0%, #ffedd5 100%);
    border-color: #fb923c;
    box-shadow: 0 4px 16px rgba(251, 146, 60, 0.1);
}

.notification-item.unread::before {
    opacity: 1;
}

.notification-indicator {
    width: 12px;
    padding-top: 10px;
}

.unread-dot {
    display: block;
    width: 12px;
    height: 12px;
    background: linear-gradient(135deg, #fb923c 0%, #f97316 100%);
    border-radius: 50%;
    box-shadow: 0 2px 8px rgba(251, 146, 60, 0.4);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(1.1);
        opacity: 0.8;
    }
}

.notification-content {
    display: flex;
    gap: 16px;
    flex: 1;
}

.notification-icon {
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #fed7aa 0%, #fdba74 100%);
    border-radius: 14px;
    color: #ea580c;
    flex-shrink: 0;
    font-size: 24px;
    box-shadow: 0 4px 12px rgba(251, 146, 60, 0.2);
}

.notification-item.read .notification-icon {
    background: #ffedd5;
    color: #fb923c;
    box-shadow: none;
}

.notification-body {
    flex: 1;
    min-width: 0;
}

.notification-title {
    font-size: 17px;
    font-weight: 700;
    color: #9a3412;
    margin-bottom: 6px;
    line-height: 1.5;
}

.notification-message {
    font-size: 15px;
    color: #7c2d12;
    margin-bottom: 10px;
    line-height: 1.6;
}

.notification-time {
    font-size: 13px;
    color: #fb923c;
    font-weight: 500;
}

.mark-read-form {
    display: inline-block;
}

.empty-state {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 80px 24px;
    text-align: center;
}

.empty-icon {
    font-size: 64px;
    color: #fdba74;
    margin-bottom: 20px;
    opacity: 0.6;
}

.empty-title {
    font-size: 20px;
    font-weight: 700;
    color: #9a3412;
    margin-bottom: 10px;
}

.empty-description {
    font-size: 15px;
    color: #fb923c;
}

.notification-badge {
    display: inline-block;
    padding: 4px 10px;
    background: linear-gradient(135deg, #fb923c 0%, #f97316 100%);
    color: white;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
    margin-left: 8px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Responsive */
@media (max-width: 640px) {
    .notifications-container {
        padding: 24px;
        border-radius: 20px;
    }

    .notifications-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 16px;
    }

    .notifications-title {
        font-size: 26px;
    }

    .notification-item {
        padding: 16px;
        gap: 12px;
    }

    .notification-icon {
        width: 40px;
        height: 40px;
        font-size: 20px;
    }

    .notification-title {
        font-size: 16px;
    }

    .notification-message {
        font-size: 14px;
    }
}
</style>

@endpush



@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="notifications-container">
    <div class="notifications-header">
        <h2 class="notifications-title">Notifications</h2>

        @if($notifications->count() > 0)
            <button id="markAllReadBtn" class="btn btn-text">
                Mark all as read
            </button>
        @endif
    </div>

    <div class="notifications-list">
        @forelse($notifications as $notification)

        <div class="notification-item {{ $notification->read_at ? 'read' : 'unread' }}"
             data-id="{{ $notification->id }}">

            @if(!$notification->read_at)
                <span class="unread-dot"></span>
            @endif

            <h4>{{ $notification->data['title'] ?? 'Notification' }}</h4>
            <p>{{ $notification->data['message'] ?? '' }}</p>

            <small>{{ $notification->created_at->diffForHumans() }}</small>

            @if(!$notification->read_at)
                <button class="markSingleReadBtn">Mark Read</button>
            @endif

        </div>

        @empty
            <p>No notifications</p>
        @endforelse
    </div>
</div>


@endsection


@push('scripts')


<script>

const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

const markAllBtn = document.getElementById('markAllReadBtn');

/* -------- Function to check unread notifications -------- */

function checkUnreadNotifications() {

    const unreadExists = document.querySelectorAll('.notification-item.unread').length > 0;

    if (!unreadExists && markAllBtn) {
        markAllBtn.disabled = true;
    } else if (markAllBtn) {
        markAllBtn.disabled = false;
    }
}

/* Run on page load */
checkUnreadNotifications();


/* ---------------- Mark All Read ---------------- */

markAllBtn?.addEventListener('click', function () {

    const unreadExists = document.querySelectorAll('.notification-item.unread').length > 0;

    if (!unreadExists) {
        alert("No new notifications available.");
        return;
    }

    fetch("{{ route('notifications.markAllRead') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": csrfToken,
            "Content-Type": "application/json"
        }
    })
    .then(res => res.json())
    .then(data => {

        if (data.success) {

            document.querySelectorAll('.notification-item').forEach(item => {

                item.classList.remove('unread');
                item.classList.add('read');

                item.querySelector('.unread-dot')?.remove();
                item.querySelector('.markSingleReadBtn')?.remove();
            });

            checkUnreadNotifications(); // 🔥 disable button after update
        }

    });

});


/* ---------------- Single Notification Read ---------------- */

document.querySelectorAll('.markSingleReadBtn').forEach(button => {

    button.addEventListener('click', function () {

        let parent = this.closest('.notification-item');
        let notificationId = parent.dataset.id;

        fetch(`/notifications/${notificationId}/mark-read`, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
                "Content-Type": "application/json"
            }
        })
        .then(res => res.json())
        .then(data => {

            if (data.success) {

                parent.classList.remove('unread');
                parent.classList.add('read');

                parent.querySelector('.unread-dot')?.remove();
                this.remove();

                checkUnreadNotifications(); // 🔥 re-check after single read
            }

        });

    });

});





</script>
    
@endpush


