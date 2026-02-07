<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    
    <!-- SweetAlert2 -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    
    <style>
       
        /* ==================== HEADER ==================== */
        .header {
            background:rgb(243, 84, 26);
            box-shadow: 0 2px 10px rgba(255, 107, 53, 0.2);
            /* position: sticky; */
            top: 0;
            z-index: 1000;
            border-radius: 10px;
        }

        .navbar {
            padding: 1rem 0 !important;
        }

        .header hr {
            margin: 0;
            border: none;
            height: 2px;
            background: linear-gradient(90deg, #ffa726 0%, #ff7043 50%, #ff5722 100%);
            opacity: 1;
        }

        /* ==================== NOTIFICATION ICONS ==================== */
        .notification-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid rgba(255, 255, 255, 0.3);
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .notification-icon:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        .notification-icon i {
            font-size: 1.3rem;
            color: white;
        }

        /* ==================== BADGE ==================== */
        .notification-badge {
            position: absolute;
            top: -6px;
            right: -6px;
            min-width: 20px;
            height: 20px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: 700;
            color: white;
            border: 2px solid white;
        }

        .badge-danger {
            background: #f44336;
        }

        .badge-success {
            background: #4caf50;
        }

        /* ==================== BELL RING ==================== */
        .bell-ring {
            animation: ring 0.8s ease-in-out;
            transform-origin: top center;
        }

        @keyframes ring {
            0%, 100% { transform: rotate(0deg); }
            10%, 30% { transform: rotate(-15deg); }
            20%, 40% { transform: rotate(15deg); }
            50% { transform: rotate(-10deg); }
            60% { transform: rotate(10deg); }
            70% { transform: rotate(-5deg); }
            80% { transform: rotate(5deg); }
        }

        /* ==================== PULSE ==================== */
        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }

        /* ==================== DROPDOWN ==================== */
        .dropdown-menu {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 0;
            margin-top: 12px;
            min-width: 320px;
            overflow: hidden;
        }

        /* ==================== NOTIFICATION HEADER ==================== */
        .notification-header {
            background: #fff3e0;
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #ffe0b2;
        }

        .notification-header h6 {
            margin: 0;
            font-weight: 600;
            font-size: 0.95rem;
            color: #e65100;
        }

        /* ==================== NOTIFICATION ITEMS ==================== */
        .dropdown-item {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #f5f5f5;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #333;
        }

        .dropdown-item:hover {
            background: #fff3e0;
            padding-left: 1.5rem;
        }

        .dropdown-item:last-child {
            border-bottom: none;
        }

        .text-center.text-muted {
            padding: 2rem 1.5rem;
            color: #999;
            font-size: 0.9rem;
        }

        /* ==================== USER INFO ==================== */
        .u-info {
            text-align: right;
            color: white;
            margin-right: 0.75rem;
        }

        .u-info p {
            margin: 0;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .u-info small {
            font-size: 0.75rem;
            opacity: 0.9;
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.4);
            transition: all 0.3s ease;
        }

        .avatar:hover {
            border-color: white;
            transform: scale(1.05);
        }

        /* ==================== PROFILE DROPDOWN ==================== */
        .w280 {
            width: 280px;
        }

        .card {
            border: none;
            border-radius: 12px;
        }

        .card-body {
            padding: 1.25rem;
        }

        .list-group-item {
            border: none !important;
            padding: 0.875rem 1.25rem;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .list-group-item:hover {
            background: #fff3e0;
            padding-left: 1.5rem;
            color: #ff6b35;
        }

        .list-group-item i {
            transition: all 0.3s ease;
        }

        .list-group-item:hover i {
            transform: scale(1.1);
        }

        #logoutBtn {
            background: linear-gradient(135deg, #ff6b35 0%, #ff5722 100%);
            border: none;
            padding: 0.875rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border-radius: 0 0 12px 12px;
        }

        #logoutBtn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 107, 53, 0.3);
        }

        /* ==================== SETTINGS ==================== */
        .setting .notification-icon:hover i {
            transform: rotate(45deg);
        }

        /* ==================== MENU TOGGLE ==================== */
        .menu-toggle {
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.3) !important;
            border-radius: 8px;
            padding: 0.6rem 0.9rem;
            transition: all 0.3s ease;
        }

        .menu-toggle:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .menu-toggle .fa-bars {
            color: white;
            font-size: 1.2rem;
        }

        /* ==================== SCROLLBAR ==================== */
        .dropdown-menu {
            max-height: 420px;
            overflow-y: auto;
        }

        .dropdown-menu::-webkit-scrollbar {
            width: 5px;
        }

        .dropdown-menu::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .dropdown-menu::-webkit-scrollbar-thumb {
            background: #ff9a56;
            border-radius: 10px;
        }

        .dropdown-menu::-webkit-scrollbar-thumb:hover {
            background: #ff6b35;
        }

        /* ==================== RESPONSIVE ==================== */
        @media (max-width: 768px) {
            .u-info {
                display: none;
            }
            
            .dropdown-menu {
                min-width: 280px;
            }
        }
    </style>
</head>

<body>
    <!-- Notification Sound -->
    <audio id="notificationSound"
           src="https://actions.google.com/sounds/v1/alarms/notification_simple-02.mp3"
           preload="auto"></audio>

    <div class="header">
        <nav class="navbar py-4">
            <div class="container-xxl">
                <!-- Header Right Section -->
                <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1 ms-auto">
                    <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover">

                        {{-- Courier Boy Notifications --}}
                        @php
                            $courierNotifications = auth()->user()
                                ->unreadNotifications
                                ->where('type','App\Notifications\NewCourierNotification');
                        @endphp

                        <div class="dropdown me-3">
                            <a class="notification-icon"
                               href="#"
                               id="courierBell"
                               data-bs-toggle="dropdown">
                                <i class="icofont-delivery-time" id="courierBellIcon"></i>
                                <span id="courierCount"
                                      class="notification-badge badge-success">
                                    {{ $courierNotifications->count() }}
                                </span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end shadow"
                                 id="courierList">
                                <div class="notification-header">
                                    <h6>🚚 Courier Registrations</h6>
                                </div>
                                @forelse($courierNotifications as $notification)
                                    <a href="{{ route('courierboys.view', $courier->id) }}"
                                       class="dropdown-item courier-item"
                                       data-id="{{ $notification->id }}">
                                        🚚 {{ $notification->data['message'] }}
                                    </a>
                                @empty
                                    <p class="text-center text-muted">
                                        No new courier registrations
                                    </p>
                                @endforelse
                            </div>
                        </div>

                        {{-- Order Notifications --}}
                        @php
                            $notifications = auth()->user()->unreadNotifications;
                        @endphp

                        <div class="dropdown me-3">
                            <a class="notification-icon pulse"
                               href="#"
                               id="notificationBell"
                               data-bs-toggle="dropdown">
                                <i class="icofont-notification" id="bellIcon"></i>
                                <span id="notificationCount"
                                      class="notification-badge badge-danger">
                                    {{ $notifications->count() }}
                                </span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end shadow"
                                 id="notificationList">
                                <div class="notification-header">
                                    <h6>🔔 New Orders</h6>
                                </div>
                                @forelse($notifications as $notification)
                                    {{-- <a href="{{ route('view.order', $notification->data['order_id']) }}"
                                       class="dropdown-item notification-item"
                                       data-id="{{ $notification->id }}">
                                        🔔 {{ $notification->data['message'] }}
                                    </a>  --}}
                                @empty
                                    <p class="text-center text-muted">
                                        No new notifications
                                    </p>
                                @endforelse
                            </div>
                        </div>

                        {{-- User Profile --}}
                        <div class="u-info me-2">
                            <p class="mb-0 text-end line-height-sm">
                                <span class="font-weight-bold">John Quinn</span>
                            </p>
                            <small>Admin Profile</small>
                        </div>

                        <a class="nav-link dropdown-toggle pulse p-0"
                           href="#"
                           role="button"
                           data-bs-toggle="dropdown"
                           data-bs-display="static">
                            <img class="avatar lg rounded-circle img-thumbnail"
                                 src="{{ asset('assetsofdash/images/profile_av.svg') }}"
                                 alt="profile">
                        </a>

                        <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                            <div class="card border-0 w280">
                                <div class="card-body pb-0">
                                    <div class="d-flex py-1">
                                        <img class="avatar rounded-circle"
                                             src="{{ asset('assetsofdash/images/profile_av.svg') }}"
                                             alt="profile">
                                        <div class="flex-fill ms-3">
                                            <p class="mb-0">
                                                <span class="font-weight-bold">John Quinn</span>
                                            </p>
                                            <small>Johnquinn@gmail.com</small>
                                        </div>
                                    </div>
                                    <div><hr class="dropdown-divider border-dark"></div>
                                </div>
                                <div class="list-group m-2">
                                    <a href="admin-profile.html"
                                       class="list-group-item list-group-item-action border-0">
                                        <i class="icofont-ui-user fs-5 me-3"></i>Profile Page
                                    </a>
                                    <a href="order-invoices.html"
                                       class="list-group-item list-group-item-action border-0">
                                        <i class="icofont-file-text fs-5 me-3"></i>Order Invoices
                                    </a>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button id="logoutBtn"
                                                type="submit"
                                                class="list-group-item list-group-item-action border-0 text-center text-white w-100">
                                            Signout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Settings --}}
                    <div class="setting ms-2">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#Settingmodal">
                            <div class="notification-icon">
                                <i class="icofont-gear-alt"></i>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Menu Toggle -->
                <button class="navbar-toggler p-0 border-0 menu-toggle order-3"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#mainHeader">
                    <span class="fa fa-bars"></span>
                </button>
            </div>
        </nav>
        <hr>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    // Logout Confirmation
    document.getElementById('logoutBtn').addEventListener('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You will be logged out!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ff6b35',
            cancelButtonColor: '#999',
            confirmButtonText: 'Yes, logout!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                this.closest('form').submit();
            }
        });
    });

    // Notification Variables
    let lastOrderCount = {{ $notifications->count() }};
    let lastCourierCount = {{ $courierNotifications->count() }};
    let orderBell = document.getElementById("bellIcon");
    let courierBell = document.getElementById("courierBellIcon");

    /* ===============================
       ORDER NOTIFICATIONS
    ================================= */
    setInterval(function(){
        fetch("{{ route('notifications.unread') }}")
        .then(res => res.json())
        .then(data => {
            let count = data.count;

            // NEW ORDER DETECTED
            if(count > lastOrderCount){
                document.getElementById("notificationSound").play();
                orderBell.classList.add("bell-ring");

                setTimeout(() => {
                    orderBell.classList.remove("bell-ring");
                }, 3000);
            }

            if(count === 0){
                orderBell.classList.remove("bell-ring");
            }

            lastOrderCount = count;
            document.getElementById("notificationCount").innerText = count;

            let html = '';
            if(data.notifications.length > 0){
                html = '<div class="notification-header"><h6>🔔 New Orders</h6></div>';
                data.notifications.forEach(n => {
                    html += `
                        <a href="/admin/view-order/${n.data.order_id}"
                           class="dropdown-item notification-item"
                           data-id="${n.id}">
                           🔔 ${n.data.message}
                        </a>
                    `;
                });
            } else {
                html = '<div class="notification-header"><h6>🔔 New Orders</h6></div>';
                html += `<p class="text-center text-muted">No new notifications</p>`;
            }

            document.getElementById("notificationList").innerHTML = html;
        });
    }, 5000);

    /* ===============================
       COURIER NOTIFICATIONS
    ================================= */
    setInterval(function(){
        fetch("{{ route('courier.notifications.unread') }}")
        .then(res => res.json())
        .then(data => {
            let count = data.count;

            // NEW COURIER REGISTERED
            if(count > lastCourierCount){
                document.getElementById("notificationSound").play();
                courierBell.classList.add("bell-ring");

                setTimeout(() => {
                    courierBell.classList.remove("bell-ring");
                }, 3000);
            }

            lastCourierCount = count;
            document.getElementById("courierCount").innerText = count;

            let html = '';
            if(data.notifications.length > 0){
                html = '<div class="notification-header"><h6>🚚 Courier Registrations</h6></div>';
                data.notifications.forEach(n => {
                    html += `
                        <a href="#"
                           class="dropdown-item courier-item"
                           data-id="${n.id}">
                           🚚 ${n.data.message}
                        </a>
                    `;
                });
            } else {
                html = '<div class="notification-header"><h6>🚚 Courier Registrations</h6></div>';
                html += `<p class="text-center text-muted">No new courier registrations</p>`;
            }

            document.getElementById("courierList").innerHTML = html;
        });
    }, 5000);

    /* ===============================
       MARK ORDER AS READ
    ================================= */
    document.addEventListener("click", function(e){
        if(e.target.closest('.notification-item')){
            let item = e.target.closest('.notification-item');
            let id = item.dataset.id;

            fetch(`/notifications/mark-read/${id}`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            }).then(() => {
                item.remove();

                let countSpan = document.getElementById("notificationCount");
                let newCount = parseInt(countSpan.innerText) - 1;
                countSpan.innerText = newCount;

                if(newCount <= 0){
                    orderBell.classList.remove("bell-ring");
                }
            });
        }
    });

    /* ===============================
       MARK COURIER AS READ
    ================================= */
    document.addEventListener("click", function(e){
        if(e.target.closest('.courier-item')){
            let item = e.target.closest('.courier-item');
            let id = item.dataset.id;

            fetch(`/notifications/mark-read/${id}`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            }).then(() => {
                item.remove();

                let countSpan = document.getElementById("courierCount");
                let newCount = parseInt(countSpan.innerText) - 1;
                countSpan.innerText = newCount;

                if(newCount <= 0){
                    courierBell.classList.remove("bell-ring");
                }
            });
        }
    });
    </script>

</body>
</html>