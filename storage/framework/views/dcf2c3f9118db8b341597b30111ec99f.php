<?php $__env->startSection('title', 'shirt collection'); ?>



<?php $__env->startSection('content'); ?>

        <!-- main start -->
        <main id="main">

            <div class="breadcrumb-area ptb-100 text-center overflow-hidden"
                style="background-image: url('<?php echo e(asset('category_banners/1764587119_bannerofshirts.webp')); ?>');
                        background-size: cover;
                        background-position: center;
                        background-repeat: no-repeat;
                        height: 400px;">
                <div class="container">
                    <span class="d-block extra-color">
                        <a href="/" class="extra-color">Home</a> / Men-Collection
                    </span>
                    <h2 class="extra-color font-24 font-xl-32 mst-5 mst-xl-9">Shirts Collection</h2>
                </div>
            </div>



            <div class="section-capture text-center mt-5">
                            <div class="section-title" data-animate="animate__fadeIn">
                                <h2 class="section-heading mt-5">All Styles Shirts Are Here!</h2>
                            </div>
                        </div>

            <!-- shop-content start -->
             <section class="shop-content section-ptb">
                <div class="container">
                    <div class="row align-items-xl-start">
                        <!-- shop-sidebar end -->
                        <div class="col-12 p-xl-sticky top-0">
                            <!-- collection-info start -->
                            <div class="row row-mtm" data-animate="animate__fadeIn">
                                <div class="col-12">
                                    <div class="row row-mtm15">
                                        <!-- collection-title start -->
                                        <div class="collection-title">
                                            <h6 class="font-18">Collection left (12)</h6>
                                        </div>

                                        <div class="shop-top-bar">
                                            <div class="row row-mtm15 align-items-md-center">
                                                <div class="col-12 col-sm-6 col-md-7 col-lg-8">
                                                    <div class="shop-filter-view ul-mt15 align-items-center">
                                                        <!-- shop-filter start -->
                                                        <div class="shop-filter">
                                                            <button type="button" class="shop-filter-btn secondary-color d-flex align-items-center"><i class="ri-filter-line icon-16 mer-5"></i>Filter</button>
                                                        </div>
                                                        <!-- shop-filter end -->
                                                        <!-- shop-view-mode start -->
                                                        <div class="shop-view-mode">
                                                            <div class="ul-mt10">
                                                                <button type="button" class="shop-view-btn primary-color icon-16 opacity-100 disabled" data-view="grid" aria-label="Grid view"><i class="ri-layout-grid-line"></i></button>
                                                                <button type="button" class="shop-view-btn body-color icon-16 opacity-100" data-view="list" aria-label="List view"><i class="ri-list-unordered"></i></button>
                                                            </div>
                                                        </div>
                                                        <!-- shop-view-mode end -->
                                                        <!-- shop-show-product start -->
                                                        <div class="shop-show-product">Showing 12 of 12 products</div>
                                                        <!-- shop-show-product end -->
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-5 col-lg-4">
                                                    <!-- shop-short start -->
                                                    <div class="shop-short d-flex flex-wrap position-relative">
                                                        <label for="sortby" class="width-64 secondary-color heading-weight">Sort by:</label>
                                                        <select id="sortby" name="sortby" class="d-xl-none width-calc-64 h-auto ptb-0 bg-transparent border-0">
                                                            <option value="manual">Featured</option>
                                                            <option value="best-selling">Best selling</option>
                                                            <option value="title-ascending" selected>Alphabetically, A-Z</option>
                                                            <option value="title-descending">Alphabetically, Z-A</option>
                                                            <option value="price-ascending">Price, low to high</option>
                                                            <option value="price-descending">Price, high to low</option>
                                                            <option value="created-descending">Date, new to old</option>
                                                            <option value="created-ascending">Date, old to new</option>
                                                        </select>
                                                        <a href="javascript:void(0)" class="short-title width-calc-64 body-color d-none d-xl-flex align-items-xl-start justify-content-xl-between">
                                                            <span class="sort-title">Alphabetically, A-Z</span>
                                                            <span class="sort-icon heading-weight"><i class="ri-arrow-down-s-line d-block lh-1"></i></span>
                                                        </a>
                                                        <ul class="collapse position-absolute top-100 start-0 end-0 ptb-5 body-bg z-1 DropDownSlide br-hidden box-shadow" id="select-wrap">
                                                            <li><a href="javascript:void(0)" data-value="manual" class="d-block body-primary-color ptb-5 plr-15">Featured</a></li>
                                                            <li><a href="javascript:void(0)" data-value="best-selling" class="d-block body-primary-color ptb-5 plr-15">Best selling</a></li>
                                                            <li class="selected"><a href="javascript:void(0)" data-value="title-ascending" class="d-block secondary-color ptb-5 plr-15 extra-bg">Alphabetically, A-Z</a></li>
                                                            <li><a href="javascript:void(0)" data-value="title-descending" class="d-block body-primary-color ptb-5 plr-15">Alphabetically, Z-A</a></li>
                                                            <li><a href="javascript:void(0)" data-value="price-ascending" class="d-block body-primary-color ptb-5 plr-15">Price, low to high</a></li>
                                                            <li><a href="javascript:void(0)" data-value="price-descending" class="d-block body-primary-color ptb-5 plr-15">Price, high to low</a></li>
                                                            <li><a href="javascript:void(0)" data-value="created-descending" class="d-block body-primary-color ptb-5 plr-15">Date, new to old</a></li>
                                                            <li><a href="javascript:void(0)" data-value="created-ascending" class="d-block body-primary-color ptb-5 plr-15">Date, old to new</a></li>
                                                        </ul>
                                                    </div>
                                                    <!-- shop-short end -->
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                 <!-- shop-grid start -->
     <div class="col-12">
    <div class="shop-product-wrap data-grid">
        <div class="row row-mtm">
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-6 col-md-4 gap-3" data-animate="animate__fadeIn">
                    <div class="single-product">
                        <div class="row single-product-wrap">

                            <!-- Product Image Column -->
                            <div class="product-image-col">
                                <div class="product-image">
                                 <a href="<?php echo e(url('products/'.$product->p_id)); ?>" class="d-block ">
    <img src="<?php echo e(asset('storage/colors/' . $product->img_path)); ?>"
         alt="<?php echo e($product->img_alt_text ?? $product->p_name); ?>"
         class="img-fluid img1"
         style="height:400px; width:100%; object-fit:contain;">
</a>



                                </div>
                            </div>

                            <!-- Product Content Column -->
                            <div class="product-content mt-2">
                                <div class="pro-content">
                                    <div class="product-title mb-1">
                                        <a href="<?php echo e(url('products/'.$product->p_id)); ?>" class="primary-link"><?php echo e($product->p_name); ?></a>
                                    </div>
                                    <div class="product-price mb-1">
                                        <span class="new-price primary-color">$<?php echo e(number_format($product->p_price, 2)); ?></span>
                                        <?php if($product->p_old_price): ?>
                                            <span class="old-price text-decoration-line-through ms-3">$<?php echo e(number_format($product->p_old_price, 2)); ?></span>
                                        <?php endif; ?>
                                    </div>

                                     <div class=" align-items-center justify-content-center w-100 h-100 mt-3  transition-3 text-center d-flex">
                                        <div class="d-flex gap-2">
                                       <a href="javascript:void(0)"
                                            class="add-to-wishlist btn btn-light"
                                            
                                            data-product-id="<?php echo e($product->p_id); ?>"data-redirect="<?php echo e(route('whistlist')); ?>">
                                            <i class="ri-heart-line"></i>
                                        </a>


                                            <a href="javascript:void(0)" class="add-to-cart btn btn-light">
                                                <i class="ri-shopping-bag-3-line"></i>
                                            </a>
                                            <a href="<?php echo e(url('products/'.$product->p_id)); ?>" class="d-block quick-view btn btn-light">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p>No products found!</p>
            <?php endif; ?>
        </div>
    </div>
</div>
                                    <!-- shop-grid end -->


    </section>



        </main>


        

        <?php $__env->startPush('scripts'); ?>
<script>
           document.querySelectorAll('.add-to-wishlist').forEach(btn => {
    btn.addEventListener('click', function(e){
        e.preventDefault(); // stop default link

        const productId = this.dataset.productId;

        <?php if(!Auth::check()): ?>
            Swal.fire({
                icon: 'warning',
                title: 'Login Required',
                text: 'Please login first to add items to wishlist!',
                showCancelButton: true,
                confirmButtonText: 'Login',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if(result.isConfirmed){
                    const loginModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('loginModal'));
                    loginModal.show();
                }
            });
        <?php else: ?>
           fetch("<?php echo e(route('wishlist')); ?>", {
    method: "POST",
    headers: {
        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
        "Accept": "application/json",
        "Content-Type": "application/json"
    },
    body: JSON.stringify({ product_id: productId })
})
.then(res => res.json())
.then(data => {
    if(data.status){
        Swal.fire({
            icon: 'success',
            title: 'Added!',
            text: data.message,
            timer: 1500,
            showConfirmButton: false
        });
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: data.message
        });
    }
});
        <?php endif; ?>
    });
});

</script>

<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>
    Swal.fire({
    icon: 'success',
    title: 'Success!',
    text: data.message,
    timer: 1500,
    showConfirmButton: false
});

</script>


        <?php $__env->stopPush(); ?>


     <?php $__env->stopSection(); ?>








<?php echo $__env->make('layouts.frontend-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_git\ecommerce-web\resources\views/menshirtcollection.blade.php ENDPATH**/ ?>