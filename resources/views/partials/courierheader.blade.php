        <!-- SweetAlert2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<audio id="notificationSound"
src="https://actions.google.com/sounds/v1/alarms/notification_simple-02.mp3"
preload="auto"></audio>

<style>
.bell-ring {
    animation: ring 1s infinite;
}

@keyframes ring {
    0% { transform: rotate(0); }
    25% { transform: rotate(15deg); }
    50% { transform: rotate(-15deg); }
    75% { transform: rotate(10deg); }
    100% { transform: rotate(0); }
}
</style>

@php
$courier = auth('courier')->user();
$notifications = $courier->unreadNotifications;
@endphp

<div class="header">
                <nav class="navbar py-4">
                    <div class="container-xxl">

                        <!-- header rightbar icon -->
                        <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1 ms-auto">
                            <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover ">
                    
                                    <!-- 🔔 COURIER NOTIFICATION BELL -->
                                    <div class="dropdown me-3">

                                    <a class="nav-link position-relative"
                                    id="courierBell"
                                    data-bs-toggle="dropdown">

                                    <i class="icofont-notification fs-4"></i>

                                    <span id="courierNotificationCount"
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                                    {{ $notifications->count() }}

                                    </span>

                                    </a>


                                    <div class="dropdown-menu dropdown-menu-end shadow p-2"
                                      
                                        id="courierNotificationList">

                                    @forelse($notifications as $notification)

                                    <a href="{{ route('courier.assigned.view', $notification->data['order_id']) }}"
                                    class="dropdown-item courier-notification"
                                    data-id="{{ $notification->id }}">

                                    🚚 {{ $notification->data['message'] }}

                                    </a>

                                    @empty

                                    <p class="text-center text-muted p-2">
                                    No new notifications
                                    </p>

                                    @endforelse

                                    </div>
                                    </div>


                                <div class="u-info me-2">
                                    @php
                                        $courier = auth('courier')->user();
                                    @endphp

                                    <p class="mb-0 text-end line-height-sm">
                                        <span class="font-weight-bold">{{ $courier->name }}</span>
                                    </p>
                                    <small>Courier Profile</small>

                                </div>
                                <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static">
                              <img class="avatar lg rounded-circle img-thumbnail"
                                src="{{ $courier->profile_photo 
                                    ? asset('storage/'.$courier->profile_photo) 
                                    : asset('assetsofdash/images/profile_av.svg') }}"
                                alt="profile">

                                </a>
                                <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                                    <div class="card border-0 w280">
                                        <div class="card-body pb-0">
                                           <div class="flex-fill ms-3">
                                                <p class="mb-0">
                                                    <span class="font-weight-bold">{{ $courier->name }}</span>
                                                </p>
                                                <small>{{ $courier->email }}</small>
                                            </div>

                                            <div><hr class="dropdown-divider border-dark"></div>
                                        </div>
                                        <div class="list-group m-2 ">
                                            <a href="{{ route('courier.courierboy.profile') }}" class="list-group-item list-group-item-action border-0 "><i class="icofont-ui-user fs-5 me-3"></i>Profile Page</a>
                                            <a href="order-invoices.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-file-text fs-5 me-3"></i>Order Invoices</a>
                                            <form action="{{ route('courier.logout') }}" method="POST">
                                                @csrf
                                              <button id="logoutBtn" type="submit" class="list-group-item list-group-item-action border-0 bg-primary text-center text-white w-100" >logout</button>
                                    {{-- <a href="{{ route('logout') }}" class="list-group-item list-group-item-action border-0 "><i class="icofont-logout fs-5 me-3"></i>Signout</a> --}}

                                               </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="setting ms-2">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#Settingmodal"><i class="icofont-gear-alt fs-5"></i></a>
                            </div>
                        </div>
                        <!-- menu toggler -->
                        <button class="navbar-toggler p-0 border-0 menu-toggle order-3" type="button" data-bs-toggle="collapse" data-bs-target="#mainHeader">
                            <span class="fa fa-bars"></span>
                        </button>
                    </div>
                </nav>
                <hr>

                <style>
                    hr{
                        color:orangered;
                    }
                </style>
            </div>



<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.getElementById('logoutBtn').addEventListener('click', function(e) {
    e.preventDefault(); // Form submit stop
    Swal.fire({
        title: 'Are you sure?',
        text: "You will be logged out!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, logout!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit the parent form
            this.closest('form').submit();
        }
    });
});
</script>


{{-- realtime-bell-notification-script --}}

<script>

let lastCount = {{ $notifications->count() }};
let bell = document.getElementById("courierBell");

setInterval(function(){

fetch("{{ route('courier.notifications.unread') }}")

.then(res => res.json())
.then(data => {

let count = data.count;

if(count > lastCount){
    document.getElementById("notificationSound").play();
    bell.classList.add("bell-ring");
}

if(count === 0){
    bell.classList.remove("bell-ring");
}

lastCount = count;

document.getElementById("courierNotificationCount").innerText = count;

let html = '';

if(data.notifications.length > 0){

data.notifications.forEach(n => {

html += `
<a href="/courier/assigned-view/${n.data.order_id}"
   class="dropdown-item courier-notification"
   data-id="${n.id}">
   🚚 ${n.data.message}
</a>
`;

});

}else{

html = `<p class="text-center text-muted p-2">No new notifications</p>`;
}

document.getElementById("courierNotificationList").innerHTML = html;

});

}, 5000);



/* MARK AS READ */
document.addEventListener("click", function(e){

if(e.target.classList.contains("courier-notification")){

let id = e.target.dataset.id;

fetch(`/courier/notifications/mark-read/${id}`,{
method:"POST",
headers:{
"X-CSRF-TOKEN":"{{ csrf_token() }}"
}
}).then(()=>{

e.target.remove();

let countSpan = document.getElementById("courierNotificationCount");
let newCount = parseInt(countSpan.innerText) - 1;

countSpan.innerText = newCount;

if(newCount <= 0){
bell.classList.remove("bell-ring");
}

});

}

});
</script>




