<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $__env->yieldContent('title', 'My Laravel App'); ?></title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="<?php echo e(asset('assetsofdash/images/Red and Black Modern Creative Agency Logo-old.png')); ?>" type="image/x-icon">

    <!-- Local CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/plugin.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/theme.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/collection.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/blog.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/style.css')); ?>">

    <?php echo $__env->yieldPushContent('styles'); ?>

    <style>
        .preloader-img{
            height: 80px;
            width: 200px;
        }
    </style>
</head>

<body>

    
    <?php echo $__env->make('partials.frontheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="preloader position-fixed top-0 start-0 w-100 h-100 body-bg z-index-5">
        <div class="loader-img position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
            <img src="<?php echo e(asset('assetsofdash/images/Red and Black Modern Creative Agency Logo-old.png')); ?>" class="width-88 width-xl-112 img-fluid preloader-img" alt="logo">
        </div>
    </div>

    
    <?php echo $__env->yieldContent('content'); ?>

    
    <?php echo $__env->make('partials.extra', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php echo $__env->make('partials.frontfooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- JS Files -->

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Core JS -->
    <script src="<?php echo e(asset('assets/js/plugin.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/theme.js')); ?>"></script>

    <!-- Dashboard libs -->
    <script src="<?php echo e(asset('assetsofdash/bundles/libscripts.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/bundles/apexcharts.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/bundles/dataTables.bundle.js')); ?>"></script>

    <!-- Template JS -->
    <script src="<?php echo e(asset('js/template.js')); ?>"></script>
    <script src="<?php echo e(asset('js/page/index.js')); ?>"></script>

    <!-- Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1Jr7axGGkwvHRnNfoOzoVRFV3yOPHJEU&callback=myMap"></script>

   
    <!-- SweetAlert2 JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
    <?php echo $__env->yieldPushContent('scripts'); ?>

</body>
</html>
<?php /**PATH C:\laravel_git\ecommerce-web\resources\views/layouts/frontend-layout.blade.php ENDPATH**/ ?>