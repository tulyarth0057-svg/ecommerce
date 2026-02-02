<div class="sidebar px-4 py-4 py-md-4 me-0">
    <div class="d-flex flex-column h-100">

        <!-- Logo -->
        <a href="{{ route('courier.dashboard') }}" class="mb-0 brand-icon">
            <img src="{{ asset('assetsofdash/images/Red and Black Modern Creative Agency Logo.png') }}"
                 class="rounded-4" width="200px">
        </a>

        <!-- Menu -->
        <ul class="menu-list flex-grow-1 mt-3">

            <!-- Dashboard -->
            <li>
                <a class="m-link active" href="{{ route('courier.dashboard') }}">
                    <i class="icofont-home fs-5"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- My Deliveries -->
            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#my-deliveries" href="#">
                    <i class="icofont-truck-loaded fs-5"></i>
                    <span>My Deliveries</span>
                    <span class="arrow icofont-rounded-down ms-auto fs-5"></span>
                </a>

                <ul class="sub-menu collapse" id="my-deliveries">
                    <li><a class="ms-link" href="{{ route('courier.courier.assigned') }}">Assigned Orders</a></li>
                    <li><a class="ms-link" href="{{ route('courier.courier.pending') }}">Pending Deliveries</a></li>
                    <li><a class="ms-link" href="{{ route('courier.courier.completed') }}">Completed Deliveries</a></li>
                </ul>
            </li>

            <!-- Update Status -->
            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#update-status" href="#">
                    <i class="icofont-refresh fs-5"></i>
                    <span>Update Status</span>
                    <span class="arrow icofont-rounded-down ms-auto fs-5"></span>
                </a>

                <ul class="sub-menu collapse" id="update-status">
                    <li><a class="ms-link" href="#">Picked Up</a></li>
                    <li><a class="ms-link" href="#">Out for Delivery</a></li>
                    <li><a class="ms-link" href="#">Delivered</a></li>
                </ul>
            </li>

            <!-- COD / Earnings -->
            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#cod" href="#">
                    <i class="icofont-money fs-5"></i>
                    <span>COD / Earnings</span>
                    <span class="arrow icofont-rounded-down ms-auto fs-5"></span>
                </a>

                <ul class="sub-menu collapse" id="cod">
                    <li><a class="ms-link" href="#">Today’s COD</a></li>
                    <li><a class="ms-link" href="#">COD History</a></li>
                </ul>
            </li>

            <!-- Notifications -->
            <li>
                <a class="m-link" href="#">
                    <i class="icofont-notification fs-5"></i>
                    <span>Notifications</span>
                </a>
            </li>

            <!-- Profile -->
            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#profile" href="#">
                    <i class="icofont-user fs-5"></i>
                    <span>My Profile</span>
                    <span class="arrow icofont-rounded-down ms-auto fs-5"></span>
                </a>

                <ul class="sub-menu collapse" id="profile">
                    <li><a class="ms-link" href="#">View Profile</a></li>
                    <li><a class="ms-link" href="#">Change Password</a></li>
                </ul>
            </li>

            <!-- Logout -->
            <li>
                <a class="m-link" href="{{ route('logout') }}">
                    <i class="icofont-logout fs-5"></i>
                    <span>Logout</span>
                </a>
            </li>

        </ul>

        <!-- Collapse Button -->
        <button type="button" class="btn btn-link sidebar-mini-btn text-light">
            <span class="ms-2"><i class="icofont-bubble-right"></i></span>
        </button>

    </div>
</div>

<style>
.sidebar{
    background: rgb(236, 75, 17);
}
</style>
