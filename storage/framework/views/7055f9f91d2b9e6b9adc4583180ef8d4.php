<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


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

        <!-- search-modal start -->
        <div class="search-modal modal fade" id="searchmodal">
            <div class="modal-dialog mw-100 m-0">
                <div class="modal-content body-bg border-0 rounded-0">
                    <div class="modal-body p-0">
                        <div class="container">
                            <div class="search-content ptb-30">
                                <div class="search-box d-flex flex-row-reverse">
                                    <button type="button" class="d-block search-close body-secondary-color icon-16" data-bs-dismiss="modal" aria-label="Close"><i class="ri-close-large-line d-block lh-1 ms-5 fs-3 text-danger"></i></button>
                                       <form class="search-form w-100" onsubmit="return false;">
                                        <div class="search-bar position-relative">
                                            <div class="form-search d-flex">
                                                <input 
                                                    type="search"  
                                                    class="w-100 search-input"    
                                                    id="searchInput" 
                                                    placeholder="Search product..."
                                                    autocomplete="off"
                                                >
                                                <button type="button" class="d-block tertiary-btn plr-15 text-uppercase text-nowrap heading-weight">
                                                    Search
                                                </button>
                                            </div>
                                            <div id="searchResults" class="d-none search-results position-absolute top-auto start-0 end-0 body-bg z-2 border-full border-radius box-shadow">
                                                <div class="search-for ptb-10 plr-15 beb">Search for <span class="search-text"></span></div>
                                                <ul class="search-ul"></ul>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- search-modal end -->
     

    
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

     
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
     


    <script>
        // CSRF Token setup for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    
    
<script>
    const searchInput = document.getElementById('searchInput');
    const searchResults = document.getElementById('searchResults');
    const searchTextSpan = searchResults.querySelector('.search-text');
    const searchList = searchResults.querySelector('.search-ul');
    const searchButton = document.querySelector('.search-form button');

    async function fetchProducts(query) {
        if (!query) {
            searchResults.classList.add('d-none');
            return;
        }

        const url = `<?php echo e(route('products.search')); ?>?query=${encodeURIComponent(query)}`;
        const response = await fetch(url);
        const products = await response.json();

        searchList.innerHTML = products.length
            ? products.map(p => `<li class="p-2"><a href="/product-view/${p.p_id}">${p.p_name}</a></li>`).join('')
            : '<li>No results found</li>';

        searchTextSpan.textContent = query;
        searchResults.classList.remove('d-none');
    }

    searchInput.addEventListener('input', () => {
        fetchProducts(searchInput.value.trim());
    });

    searchButton.addEventListener('click', () => {
        fetchProducts(searchInput.value.trim());
    });

    document.addEventListener('click', (e) => {
        if (!searchResults.contains(e.target) && e.target !== searchInput) {
            searchResults.classList.add('d-none');
        }
    });
</script>

    

    <?php echo $__env->yieldPushContent('scripts'); ?>

</body>
</html>
<?php /**PATH E:\laravel_git\ecommerce-web\resources\views/layouts/frontend-layout.blade.php ENDPATH**/ ?>