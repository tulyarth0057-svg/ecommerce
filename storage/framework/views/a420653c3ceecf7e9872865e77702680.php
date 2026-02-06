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

<?php
$courier = auth('courier')->user();
$notifications = $courier->unreadNotifications;
?>

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

                                    <?php echo e($notifications->count()); ?>


                                    </span>

                                    </a>


                                    <div class="dropdown-menu dropdown-menu-end shadow p-2"
                                      
                                        id="courierNotificationList">

                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>

                                    <a href="<?php echo e(route('courier.assigned.view', $notification->data['order_id'])); ?>"
                                    class="dropdown-item courier-notification"
                                    data-id="<?php echo e($notification->id); ?>">

                                    🚚 <?php echo e($notification->data['message']); ?>


                                    </a>

                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

                                    <p class="text-center text-muted p-2">
                                    No new notifications
                                    </p>

                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                    </div>
                                    </div>


                                <div class="u-info me-2">
                                    <?php
                                        $courier = auth('courier')->user();
                                    ?>

                                    <p class="mb-0 text-end line-height-sm">
                                        <span class="font-weight-bold"><?php echo e($courier->name); ?></span>
                                    </p>
                                    <small>Courier Profile</small>

                                </div>
                                <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static">
                              <img class="avatar lg rounded-circle img-thumbnail"
                                src="<?php echo e($courier->profile_photo 
                                    ? asset('storage/'.$courier->profile_photo) 
                                    : asset('assetsofdash/images/profile_av.svg')); ?>"
                                alt="profile">

                                </a>
                                <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                                    <div class="card border-0 w280">
                                        <div class="card-body pb-0">
                                           <div class="flex-fill ms-3">
                                                <p class="mb-0">
                                                    <span class="font-weight-bold"><?php echo e($courier->name); ?></span>
                                                </p>
                                                <small><?php echo e($courier->email); ?></small>
                                            </div>

                                            <div><hr class="dropdown-divider border-dark"></div>
                                        </div>
                                        <div class="list-group m-2 ">
                                            <a href="<?php echo e(route('courier.courierboy.profile')); ?>" class="list-group-item list-group-item-action border-0 "><i class="icofont-ui-user fs-5 me-3"></i>Profile Page</a>
                                            <a href="order-invoices.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-file-text fs-5 me-3"></i>Order Invoices</a>
                                            <form action="<?php echo e(route('courier.logout')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                              <button id="logoutBtn" type="submit" class="list-group-item list-group-item-action border-0 bg-primary text-center text-white w-100" >logout</button>
                                    

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




<script>

let lastCount = <?php echo e($notifications->count()); ?>;
let bell = document.getElementById("courierBell");

setInterval(function(){

fetch("<?php echo e(route('courier.notifications.unread')); ?>")

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
"X-CSRF-TOKEN":"<?php echo e(csrf_token()); ?>"
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




<?php /**PATH E:\laravel_git\ecommerce-web\resources\views/partials/courierheader.blade.php ENDPATH**/ ?>