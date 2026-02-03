        <!-- SweetAlert2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

<div class="header">
                <nav class="navbar py-4">
                    <div class="container-xxl">

                        <!-- header rightbar icon -->
                        <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1 ms-auto">
                            <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover ">
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



<?php /**PATH E:\laravel_git\ecommerce-web\resources\views/partials/courierheader.blade.php ENDPATH**/ ?>