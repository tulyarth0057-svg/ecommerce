<?php $__env->startSection('title', 'whistlist'); ?>


<?php $__env->startSection('content'); ?>


<?php $__env->startPush('styles'); ?>

<style>
.whistlist-img{
     height:200px;
      width:300px;
       object-fit:contain;
       border:1px solid #ddd;
}
.custom-border {
    border: 1px solid grey;
    height: 40px;
    width: 40px; 
         
    border-radius: 0.25rem;

}
.wish-table-info {
    background: #fff;
    transition: box-shadow 0.2s;
}

.wish-table-info:hover {
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
}

.whistlist-img {
    width: 80px;
    height: 80px;
    object-fit: cover;
}

@media (max-width: 575px) {
    .wish-item-content {
        flex-direction: row !important;
        align-items: center !important;
    }
    
    .wish-remove {
        font-size: 1.4rem;
    }
}

/* section whisltist */

/* Professional Wishlist Styling */
.wish-area {
    padding: 3rem 0;    
}

.wish-card {
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
}

.wish-card:hover {
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1) !important;
    transform: translateY(-2px);
}

.wish-img {
    border: 1px solid #e9ecef;
    transition: transform 0.3s ease;
}

.wish-img:hover {
    transform: scale(1.05);
}

.product-title {
    font-size: 1rem;
    line-height: 1.4;
    transition: color 0.2s ease;
}

.product-title:hover,
.hover-primary:hover {
    color: #0d6efd !important;
}

.price-display {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.badge {
    font-weight: 500;
    letter-spacing: 0.3px;
    color: white;
    background-color: #f86335;
}

.bg-success-subtle {
    background-color: #d1e7dd !important;
}

.btn-primary {
    background-color: #0d6efd;
    border: none;
    padding: 0.625rem 1.25rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: #0b5ed7;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(13, 110, 253, 0.3);
}

.wish-remove {
    transition: all 0.2s ease;
}

.wish-remove:hover {
    transform: scale(1.1);
    color: #dc3545 !important;
}

.shadow-sm {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
}

.hover-shadow {
    transition: box-shadow 0.3s ease;
}

/* Responsive adjustments */
@media (max-width: 991px) {
    .wish-card {
        padding: 0.5rem;
    }
    
    .wish-img {
        width: 80px !important;
        height: 80px !important;
    }
}

/* Animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

[data-animate] {
    animation: fadeIn 0.6s ease-out;
}
.cart-button{
    background-color:#f86335;
    border: none;
    padding: 0.625rem 1.25rem;
    font-weight: 500;
    transition: all 0.3s ease;
    color: white;

    &:hover{
        background-color: grey;
        color:white;

    }

}

</style>
<?php $__env->stopPush(); ?>

        <!-- breadcrumb-area start -->
        <div class="breadcrumb-area ptb-30 bg-img text-center" data-bgimg="assets/image/other/breadcrumb-bgimg.jpg">
            <div class="container">
                <span class="d-block extra-color mt-3 fs-4"><a href="index.html" class="extra-color">Home</a> / Wishlist</span>
                <h2 class="extra-color font-24 font-xl-32 mst-5 mst-xl-9">Wishlist</h2>
            </div>
        </div>
        <!-- breadcrumb-area end -->
        <!-- main start -->


        <main id="main">


            <!-- wishlist-page strat -->






<section class="wish-area bg-light">
    <div class="container">
        <!-- Wishlist Header -->
        <div class="wish-itemview section-pt">
            <div class="wish-header mb-4 p-4 bg-white rounded-3 shadow-sm" data-animate="animate__fadeIn">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div>
                        <h4 class="mb-1 fw-bold text-dark">My Wishlist</h4>
                        <p class="text-muted mb-0 small">Save items you love for later</p>
                    </div>
                    <div class="wish-count">
                        <span class="badge rounded-pill px-3 py-2">
                            <span class="wish-counter fw-semibold"> <?php echo e($wishlistCount); ?> Items</span>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Desktop Table Header -->
            <div class="wish-table-heading d-none d-lg-block mb-3 px-3" data-animate="animate__fadeIn">
                <div class="row align-items-center text-uppercase small fw-semibold text-muted">
                    <div class="col-lg-5">Product Details</div>
                    <div class="col-lg-2 text-center">Unit Price</div>
                    <div class="col-lg-2 text-center">Stock Status</div>
                    <div class="col-lg-2 text-center">Action</div>
                    <div class="col-lg-1 text-center">Remove</div>
                </div>
            </div>

            <!-- Wishlist Items -->
            <div class="wish-table-data">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $wishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <div class="wish-card mb-3 bg-white rounded-3 shadow-sm overflow-hidden hover-shadow transition" data-animate="animate__fadeIn">
                        <div class="p-3 p-md-4">
                            <div class="row align-items-center g-3">

                                <!-- Product Image & Info -->
                                <div class="col-12 col-lg-5">
                                    <div class="d-flex align-items-center gap-3">
                                        <!-- Image -->
                                        <div class="wish-image-wrapper position-relative flex-shrink-0">
                                            <a href="<?php echo e(url('product-view/'.$wishlist->p_id)); ?>" class="d-block">
                                                <img src="<?php echo e(asset('storage/colors/' . $wishlist->product->colors->first()->images->first()->img_path)); ?>"
                                                     alt="<?php echo e($wishlist->product->img_alt_text ?? $wishlist->product->p_name); ?>"
                                                     class="wish-img rounded-3"
                                                     style="width: 100px; height: 100px; object-fit: cover;">
                                            </a>
                                        </div>

                                        <!-- Product Info -->
                                        <div class="wish-info flex-grow-1">
                                            <a href="<?php echo e(url('product-view/'.$wishlist->p_id)); ?>"
                                               class="product-title text-dark text-decoration-none fw-semibold d-block mb-2 hover-primary">
                                                <?php echo e($wishlist->product->p_name); ?>

                                            </a>
                                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                                <span class="badge bg-light text-dark small">
                                                    <i class="ri-star-fill text-warning me-1"></i>4.5
                                                </span>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Unit Price -->
                                <div class="col-6 col-lg-2 text-lg-center">
                                    <small class="d-block d-lg-none text-muted mb-1">Price</small>
                                    <div class="price-display">
                                        <span class="h5 fw-bold text-dark mb-0">₹<?php echo e(number_format($wishlist->product->p_price)); ?></span>
                                    </div>
                                </div>

                                <!-- Stock Status -->
                                <div class="col-6 col-lg-2 text-lg-center">
                                    <small class="d-block d-lg-none text-muted mb-1">Status</small>
                                    <span class="badge bg-success-subtle text-success px-3 py-2">
                                        <i class="ri-checkbox-circle-fill me-1"></i>In Stock
                                    </span>
                                </div>

                                <!-- Add to Cart -->
                                <div class="col-12 col-lg-2 text-lg-center">
                                    <button class="btn w-100 cart-button add-wishlist-to-cart"
                                            data-product-id="<?php echo e($wishlist->product->p_id); ?>">
                                        <i class="ri-shopping-cart-line me-2"></i>Add to Cart
                                    </button>
                                </div>

                                <!-- Remove Button -->
                                <div class="col-12 col-lg-1 text-lg-center">
                                    <form action="<?php echo e(route('wishlist.remove', $wishlist->w_id)); ?>"
                                          method="POST"
                                          class="delete-wishlist-form d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button type="button"
                                                class="btn btn-link text-danger p-0 wish-remove"
                                                title="Remove from wishlist">
                                            <i class="ri-delete-bin-line fs-5"></i>
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>

            <!-- Empty State (if no items) -->
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($wishlists) === 0): ?>
                <div class="text-center py-5 bg-white rounded-3 shadow-sm">
                    <div class="empty-wishlist-icon mb-3">
                        <i class="ri-heart-line" style="font-size: 4rem; color: #ddd;"></i>
                    </div>
                    <h5 class="mb-2">Your wishlist is empty</h5>
                    <p class="text-muted mb-4">Save your favorite items to buy them later</p>
                    <a href="/" class="btn btn-secondary px-4">
                        Continue Shopping
                    </a>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        </div>
    </div>
</section>
            <!-- wishlist-page end -->
        </main>
        <!-- main end -->

        <!-- mobile-menu start -->
        <div class="mobile-menu d-xl-none position-fixed top-0 bottom-0 body-bg z-index-5 invisible box-shadow" id="mobile-menu">
            <div class="mobile-contents d-flex flex-column">
                <div class="menu-close ptb-10 plr-15 beb">
                    <button type="button" class="menu-close-btn d-block body-secondary-color icon-16 ms-auto" aria-label="Menu close"><i class="ri-close-large-line d-block lh-1"></i></button>
                </div>
                <div class="mobilemenu-content beb">
                    <div class="main-wrap">
                        <ul class="menu-ul">
                            <li class="menu-li bst">
                                <div class="menu-btn d-flex flex-row-reverse">
                                    <button type="button" class="width-48 icon-16 ptb-10 bsl" data-bs-toggle="collapse" data-bs-target="#menu-home" aria-expanded="false" aria-label="Menu accordion"><i class="ri-add-line d-block lh-1"></i></button>
                                    <span class="width-calc-48 ptb-10 plr-15"><a href="index.html" class="d-inline-block body-color">Home</a></span>
                                </div>
                                <div class="menu-dropdown collapse" id="menu-home">
                                    <ul class="menudrop-ul">
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="index.html" class="d-inline-block body-color">01 Classic fashion</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="index2.html" class="d-inline-block body-color">02 Modern fashion</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="index3.html" class="d-inline-block body-color">03 Elegant boutique</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="index4.html" class="d-inline-block body-color">04 Minimal clothing</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="index5.html" class="d-inline-block body-color">05 Lifestyle & Support</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="index6.html" class="d-inline-block body-color">06 Visual fashion</a></span>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="menu-li bst">
                                <div class="menu-btn d-flex flex-row-reverse">
                                    <button type="button" class="width-48 icon-16 ptb-10 bsl" data-bs-toggle="collapse" data-bs-target="#menu-product" aria-expanded="false" aria-label="Menu accordion"><i class="ri-add-line d-block lh-1"></i></button>
                                    <span class="width-calc-48 ptb-10 plr-15"><a href="product.html" class="d-inline-block body-color">Product</a></span>
                                </div>
                                <div class="menu-dropdown collapse" id="menu-product">
                                    <ul class="menudrop-ul">
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="collection.html" class="d-inline-block body-color">01 Classic card style</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="collection2.html" class="d-inline-block body-color">02 Modern card style</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="collection3.html" class="d-inline-block body-color">03 Elegant card style</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="collection4.html" class="d-inline-block body-color">04 Minimal card style</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="collection5.html" class="d-inline-block body-color">05 Lifestyle card style</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="collection6.html" class="d-inline-block body-color">06 Visual card style</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="collections.html" class="d-inline-block body-color">Collections</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="collection-category.html" class="d-inline-block body-color">Collection category</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="collection-without.html" class="d-inline-block body-color">Collection full</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="collection.html" class="d-inline-block body-color">Collection left</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="collection-right.html" class="d-inline-block body-color">Collection right</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="collection-list-without.html" class="d-inline-block body-color">Collection-list full</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="collection-list.html" class="d-inline-block body-color">Collection-list left</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="collection-list-right.html" class="d-inline-block body-color">Collection-list right</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="search-empty.html" class="d-inline-block body-color">Search empty</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="search-product.html" class="d-inline-block body-color">Search product</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <div class="menu-btn d-flex flex-row-reverse">
                                                <button type="button" class="width-48 icon-16 ptb-10 bsl" data-bs-toggle="collapse" data-bs-target="#menu-productlayout1" aria-expanded="false" aria-label="Menu accordion"><i class="ri-add-line d-block lh-1"></i></button>
                                                <span class="width-calc-48 ptb-10 psl-20 per-15"><a href="collection.html" class="d-inline-block body-color">Product layout</a></span>
                                            </div>
                                            <div class="menusub-dropdown collapse" id="menu-productlayout1">
                                                <ul class="menusub-ul">
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product.html" class="d-inline-block body-color">01 Bottom thumbnail details</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product2.html" class="d-inline-block body-color">02 Left thumbnail accordion</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product3.html" class="d-inline-block body-color">03 Right thumbnail simple layout</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product4.html" class="d-inline-block body-color">04 Single grid thumbnail details</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product5.html" class="d-inline-block body-color">05 Two grid thumbnail accordion</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product6.html" class="d-inline-block body-color">06 Solo thumbnail tab details</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product7.html" class="d-inline-block body-color">07 Creative template</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product8.html" class="d-inline-block body-color">08 Classic full layout</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product9.html" class="d-inline-block body-color">09 Modern full layout</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product-comparison.html" class="d-inline-block body-color">Product comparision</a></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <div class="menu-btn d-flex flex-row-reverse">
                                                <button type="button" class="width-48 icon-16 ptb-10 bsl" data-bs-toggle="collapse" data-bs-target="#menu-productfeatures" aria-expanded="false" aria-label="Menu accordion"><i class="ri-add-line d-block lh-1"></i></button>
                                                <span class="width-calc-48 ptb-10 psl-20 per-15"><a href="product.html" class="d-inline-block body-color">Product features</a></span>
                                            </div>
                                            <div class="menusub-dropdown collapse" id="menu-productfeatures">
                                                <ul class="menusub-ul">
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product.html" class="d-inline-block body-color">Special promotions offers</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product.html" class="d-inline-block body-color">Size guide</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product9.html" class="d-inline-block body-color">Back in stock</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product.html" class="d-inline-block body-color">Quick buy now button</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product.html" class="d-inline-block body-color">Product wishlist</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product.html" class="d-inline-block body-color">Product compare option</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product.html" class="d-inline-block body-color">Ask a question</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product.html" class="d-inline-block body-color">Top social buzz</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product8.html" class="d-inline-block body-color">Pre-order</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product.html" class="d-inline-block body-color">Pincode service availability</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product.html" class="d-inline-block body-color">Frequently bought together</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product.html" class="d-inline-block body-color">Pickup availability option</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product.html" class="d-inline-block body-color">Product warranty info</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product.html" class="d-inline-block body-color">Delivery options details</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product.html" class="d-inline-block body-color">Trusted payment badge</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product.html" class="d-inline-block body-color">Recommended product</a></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <div class="menu-btn d-flex flex-row-reverse">
                                                <button type="button" class="width-48 icon-16 ptb-10 bsl" data-bs-toggle="collapse" data-bs-target="#menu-productdetails" aria-expanded="false" aria-label="Menu accordion"><i class="ri-add-line d-block lh-1"></i></button>
                                                <span class="width-calc-48 ptb-10 psl-20 per-15"><a href="product.html" class="d-inline-block body-color">Product details</a></span>
                                            </div>
                                            <div class="menusub-dropdown collapse" id="menu-productdetails">
                                                <ul class="menusub-ul">
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product.html" class="d-inline-block body-color">Currently views count</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product.html" class="d-inline-block body-color">Deal count down timer</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product.html" class="d-inline-block body-color">Stock count down</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product.html" class="d-inline-block body-color">Items sold count</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product.html" class="d-inline-block body-color">Product short description</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product.html" class="d-inline-block body-color">Color swatch option</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product2.html" class="d-inline-block body-color">Image swatch option</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product3.html" class="d-inline-block body-color">Dropdown select option</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product.html" class="d-inline-block body-color">Product sku code</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product.html" class="d-inline-block body-color">Product flat inline description</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product2.html" class="d-inline-block body-color">Accordian description</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product3.html" class="d-inline-block body-color">Product detailed inline description</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product6.html" class="d-inline-block body-color">Tab description</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product7.html" class="d-inline-block body-color">Vertical-tab description</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product.html" class="d-inline-block body-color">Product video</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="product.html" class="d-inline-block body-color">Product review</a></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="menu-li bst">
                                <div class="menu-btn d-flex flex-row-reverse">
                                    <button type="button" class="width-48 icon-16 ptb-10 bsl" data-bs-toggle="collapse" data-bs-target="#menu-shop" aria-expanded="false" aria-label="Menu accordion"><i class="ri-add-line d-block lh-1"></i></button>
                                    <span class="width-calc-48 ptb-10 plr-15"><a href="collection.html" class="d-inline-block body-color">Shop</a></span>
                                </div>
                                <div class="menu-dropdown collapse" id="menu-shop">
                                    <ul class="menudrop-ul">
                                        <li class="menudrop-li bst">
                                            <div class="menu-btn d-flex flex-row-reverse">
                                                <button type="button" class="width-48 icon-16 ptb-10 bsl" data-bs-toggle="collapse" data-bs-target="#menu-account" aria-expanded="false" aria-label="Menu accordion"><i class="ri-add-line d-block lh-1"></i></button>
                                                <span class="width-calc-48 ptb-10 psl-20 per-15"><a href="javascript:void(0)" class="d-inline-block body-color">Account</a></span>
                                            </div>
                                            <div class="menusub-dropdown collapse" id="menu-account">
                                                <ul class="menusub-ul">
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="login.html" class="d-inline-block body-color">Login</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="forgot-password.html" class="d-inline-block body-color">Forgot password</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="register.html" class="d-inline-block body-color">Register</a></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <div class="menu-btn d-flex flex-row-reverse">
                                                <button type="button" class="width-48 icon-16 ptb-10 bsl" data-bs-toggle="collapse" data-bs-target="#menu-other" aria-expanded="false" aria-label="Menu accordion"><i class="ri-add-line d-block lh-1"></i></button>
                                                <span class="width-calc-48 ptb-10 psl-20 per-15"><a href="cart-page.html" class="d-inline-block body-color">Other</a></span>
                                            </div>
                                            <div class="menusub-dropdown collapse" id="menu-other">
                                                <ul class="menusub-ul">
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="cancellation.html" class="d-inline-block body-color">404</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="cart-empty.html" class="d-inline-block body-color">Cart empty</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="cart-page.html" class="d-inline-block body-color">Cart</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="checkout.html" class="d-inline-block body-color">Checkout</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="coming-soon.html" class="d-inline-block body-color">Comingsoon</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="invoice.html" class="d-inline-block body-color">Invoice</a></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <div class="menu-btn d-flex flex-row-reverse">
                                                <button type="button" class="width-48 icon-16 ptb-10 bsl" data-bs-toggle="collapse" data-bs-target="#menu-order" aria-expanded="false" aria-label="Menu accordion"><i class="ri-add-line d-block lh-1"></i></button>
                                                <span class="width-calc-48 ptb-10 psl-20 per-15"><a href="order.html" class="d-inline-block body-color">Order</a></span>
                                            </div>
                                            <div class="menusub-dropdown collapse" id="menu-order">
                                                <ul class="menusub-ul">
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="order-complete.html" class="d-inline-block body-color">Order complete</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="order.html" class="d-inline-block body-color">Order</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="order-info.html" class="d-inline-block body-color">Order info</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="order-info-default.html" class="d-inline-block body-color">Order default</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="order-info-unfulfilled.html" class="d-inline-block body-color">Order unfulfilled</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="order-info-fulfilled.html" class="d-inline-block body-color">Order fulfilled</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="order-info-inprogress.html" class="d-inline-block body-color">Order inprogress</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="order-info-intransit.html" class="d-inline-block body-color">Order intransit</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="order-info-indelivery.html" class="d-inline-block body-color">Order indelivery</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="order-info-delivered.html" class="d-inline-block body-color">Order delivered</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="order-info-pickup.html" class="d-inline-block body-color">Order pickup</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="order-info-cancel.html" class="d-inline-block body-color">Order cancel</a></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <div class="menu-btn d-flex flex-row-reverse">
                                                <button type="button" class="width-48 icon-16 ptb-10 bsl" data-bs-toggle="collapse" data-bs-target="#menu-profile" aria-expanded="false" aria-label="Menu accordion"><i class="ri-add-line d-block lh-1"></i></button>
                                                <span class="width-calc-48 ptb-10 psl-20 per-15"><a href="profile.html" class="d-inline-block body-color">Profile</a></span>
                                            </div>
                                            <div class="menusub-dropdown collapse" id="menu-profile">
                                                <ul class="menusub-ul">
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="profile.html" class="d-inline-block body-color">Profile</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="profile-address.html" class="d-inline-block body-color">Profile address</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="profile-notification.html" class="d-inline-block body-color">Profile notification</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="profile-order.html" class="d-inline-block body-color">Profile order</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="profile-order-empty.html" class="d-inline-block body-color">Profile order empty</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="profile-ticket.html" class="d-inline-block body-color">Profile ticket</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="profile-ticket-empty.html" class="d-inline-block body-color">Profile ticket empty</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="profile-wishlist.html" class="d-inline-block body-color">Profile wishlist</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="profile-wishlist-empty.html" class="d-inline-block body-color">Profile wishlist empty</a></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <div class="menu-btn d-flex flex-row-reverse">
                                                <button type="button" class="width-48 icon-16 ptb-10 bsl" data-bs-toggle="collapse" data-bs-target="#menu-ticket" aria-expanded="false" aria-label="Menu accordion"><i class="ri-add-line d-block lh-1"></i></button>
                                                <span class="width-calc-48 ptb-10 psl-20 per-15"><a href="ticket.html" class="d-inline-block body-color">Ticket</a></span>
                                            </div>
                                            <div class="menusub-dropdown collapse" id="menu-ticket">
                                                <ul class="menusub-ul">
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="ticket.html" class="d-inline-block body-color">Ticket</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="ticket-create.html" class="d-inline-block body-color">Ticket create</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="ticket-edit.html" class="d-inline-block body-color">Ticket edit</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="ticket-info.html" class="d-inline-block body-color">Ticket info</a></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <div class="menu-btn d-flex flex-row-reverse">
                                                <button type="button" class="width-48 icon-16 ptb-10 bsl" data-bs-toggle="collapse" data-bs-target="#menu-policies" aria-expanded="false" aria-label="Menu accordion"><i class="ri-add-line d-block lh-1"></i></button>
                                                <span class="width-calc-48 ptb-10 psl-20 per-15"><a href="javascript:void(0)" class="d-inline-block">Policies</a></span>
                                            </div>
                                            <div class="menusub-dropdown collapse" id="menu-policies">
                                                <ul class="menusub-ul">
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="cancellation.html" class="d-inline-block body-color">Cancellation</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="cookie.html" class="d-inline-block body-color">Cookie</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="legal.html" class="d-inline-block body-color">Legal</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="payment-policy.html" class="d-inline-block body-color">Payment policy</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="privacy-policy.html" class="d-inline-block body-color">Privacy policy</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="return-policy.html" class="d-inline-block body-color">Return policy</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="shipping-policy.html" class="d-inline-block body-color">Shipping policy</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="terms-condition.html" class="d-inline-block body-color">Terms & condition</a></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <div class="menu-btn d-flex flex-row-reverse">
                                                <button type="button" class="width-48 icon-16 ptb-10 bsl" data-bs-toggle="collapse" data-bs-target="#menu-features" aria-expanded="false" aria-label="Menu accordion"><i class="ri-add-line d-block lh-1"></i></button>
                                                <span class="width-calc-48 ptb-10 psl-20 per-15"><a href="javascript:void(0)" class="d-inline-block body-color">Features</a></span>
                                            </div>
                                            <div class="menusub-dropdown collapse" id="menu-features">
                                                <ul class="menusub-ul">
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="button.html" class="d-inline-block body-color">Button</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="cart-drawer-empty.html" class="d-inline-block body-color">Cart drawer empty</a></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="menu-li bst">
                                <div class="menu-btn d-flex flex-row-reverse">
                                    <button type="button" class="width-48 icon-16 ptb-10 bsl" data-bs-toggle="collapse" data-bs-target="#menu-blog" aria-expanded="false" aria-label="Menu accordion"><i class="ri-add-line d-block lh-1"></i></button>
                                    <span class="width-calc-48 ptb-10 plr-15"><a href="blog.html" class="d-inline-block body-color">Blog</a></span>
                                </div>
                                <div class="menu-dropdown collapse" id="menu-blog">
                                    <ul class="menudrop-ul">
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="blog-without.html" class="d-inline-block body-color">Blog</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="blog.html" class="d-inline-block body-color">Blog left</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="blog-right.html" class="d-inline-block body-color">Blog right</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="article-without.html" class="d-inline-block body-color">Article</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="article.html" class="d-inline-block body-color">Article left</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="article-right.html" class="d-inline-block body-color">Article right</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="search-blog.html" class="d-inline-block body-color">Search blog</a></span>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="menu-li bst">
                                <div class="menu-btn d-flex flex-row-reverse">
                                    <button type="button" class="width-48 icon-16 ptb-10 bsl" data-bs-toggle="collapse" data-bs-target="#menu-page" aria-expanded="false" aria-label="Menu accordion"><i class="ri-add-line d-block lh-1"></i></button>
                                    <span class="width-calc-48 ptb-10 plr-15"><a href="javascript:void(0)" class="d-inline-block body-color">Page</a></span>
                                </div>
                                <div class="menu-dropdown collapse" id="menu-page">
                                    <ul class="menudrop-ul">
                                        <li class="menudrop-li bst">
                                            <div class="menu-btn d-flex flex-row-reverse">
                                                <button type="button" class="width-48 icon-16 ptb-10 bsl" data-bs-toggle="collapse" data-bs-target="#menu-about" aria-expanded="false" aria-label="Menu accordion"><i class="ri-add-line d-block lh-1"></i></button>
                                                <span class="width-calc-48 ptb-10 psl-20 per-15"><a href="about-us.html" class="d-inline-block body-color">About us</a></span>
                                            </div>
                                            <div class="menusub-dropdown collapse" id="menu-about">
                                                <ul class="menusub-ul">
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="about-us.html" class="d-inline-block body-color">01 Modern aboutus</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="about-us2.html" class="d-inline-block body-color">02 Creative aboutus</a></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <div class="menu-btn d-flex flex-row-reverse">
                                                <button type="button" class="width-48 icon-16 ptb-10 bsl" data-bs-toggle="collapse" data-bs-target="#menu-contact" aria-expanded="false" aria-label="Menu accordion"><i class="ri-add-line d-block lh-1"></i></button>
                                                <span class="width-calc-48 ptb-10 psl-20 per-15"><a href="contact-us.html" class="d-inline-block body-color">Contact us</a></span>
                                            </div>
                                            <div class="menusub-dropdown collapse" id="menu-contact">
                                                <ul class="menusub-ul">
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="contact-us.html" class="d-inline-block body-color">01 Creative contactus</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="contact-us2.html" class="d-inline-block body-color">02 Standard contactus</a></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="faqs.html" class="d-inline-block body-color">Faqs</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="sitemap.html" class="d-inline-block body-color">Sitemap</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="store.html" class="d-inline-block body-color">Store</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <span class="d-block ptb-10 psl-20 per-15"><a href="track-order.html" class="d-inline-block body-color">Track order</a></span>
                                        </li>
                                        <li class="menudrop-li bst">
                                            <div class="menu-btn d-flex flex-row-reverse">
                                                <button type="button" class="width-48 icon-16 ptb-10 bsl" data-bs-toggle="collapse" data-bs-target="#menu-wishlist" aria-expanded="false" aria-label="Menu accordion"><i class="ri-add-line d-block lh-1"></i></button>
                                                <span class="width-calc-48 ptb-10 psl-20 per-15"><a href="wishlist.html" class="d-inline-block body-color">Wishlist</a></span>
                                            </div>
                                            <div class="menusub-dropdown collapse" id="menu-wishlist">
                                                <ul class="menusub-ul">
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="wishlist.html" class="d-inline-block body-color">Wishlist</a></span>
                                                    </li>
                                                    <li class="menusub-li bst">
                                                        <span class="d-block ptb-10 psl-25 per-15"><a href="wishlist-empty.html" class="d-inline-block body-color">Wishlist empty</a></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile-menu end -->
        <!-- search-modal start -->
        <div class="search-modal modal fade" id="searchmodal">
            <div class="modal-dialog mw-100 m-0">
                <div class="modal-content body-bg border-0 rounded-0">
                    <div class="modal-body p-0">
                        <div class="container">
                            <div class="search-content ptb-30">
                                <div class="search-box d-flex flex-row-reverse">
                                    <button type="button" class="d-block search-close body-secondary-color icon-16" data-bs-dismiss="modal" aria-label="Close"><i class="ri-close-large-line d-block lh-1"></i></button>
                                    <form method="get" action="javascript:void(0)" class="search-form w-100">
                                        <div class="search-bar position-relative">
                                            <div class="form-search d-flex flex-row-reverse">
                                                <input type="search" name="search-input" class="search-input w-100 h-auto ptb-0 plr-15 bg-transparent border-0" value="" placeholder="Search here" required>
                                                <button type="submit" onclick="window.location.href='search-product.html'" class="d-block search-btn body-secondary-color icon-16" aria-label="Go to search" disabled><i class="ri-search-line d-block lh-1"></i></button>
                                            </div>
                                            <div class="d-none search-results position-absolute top-100 start-0 end-0 body-bg z-1 border-full border-radius box-shadow">
                                                <div class="search-for ptb-10 plr-15 beb">Search for <span class="search-text">a</span></div>
                                                <ul class="search-ul">
                                                    <li class="search-li ptb-5 plr-15 bst">
                                                        <a href="product.html" class="body-primary-color d-flex flex-wrap align-items-center">
                                                            <span class="width-48"><img src="assets/image/search/search-product1.jpg" class="w-100 img-fluid border-radius" alt="search-product1"></span>
                                                            <span class="width-calc-48 psl-15 text-truncate">Pleated skater skirt</span>
                                                        </a>
                                                    </li>
                                                    <li class="search-li ptb-5 plr-15 bst">
                                                        <a href="product.html" class="body-primary-color d-flex flex-wrap align-items-center">
                                                            <span class="width-48"><img src="assets/image/search/search-product2.jpg" class="w-100 img-fluid border-radius" alt="search-product2"></span>
                                                            <span class="width-calc-48 psl-15 text-truncate">Tailored blazer jacket</span>
                                                        </a>
                                                    </li>
                                                    <li class="search-li ptb-5 plr-15 bst">
                                                        <a href="product.html" class="body-primary-color d-flex flex-wrap align-items-center">
                                                            <span class="width-48"><img src="assets/image/search/search-product3.jpg" class="w-100 img-fluid border-radius" alt="search-product3"></span>
                                                            <span class="width-calc-48 psl-15 text-truncate">Girls floral ruffle top</span>
                                                        </a>
                                                    </li>
                                                    <li class="search-li ptb-5 plr-15 bst">
                                                        <a href="product.html" class="body-primary-color d-flex flex-wrap align-items-center">
                                                            <span class="width-48"><img src="assets/image/search/search-product4.jpg" class="w-100 img-fluid border-radius" alt="search-product4"></span>
                                                            <span class="width-calc-48 psl-15 text-truncate">Classic cotton t-shirt</span>
                                                        </a>
                                                    </li>
                                                    <li class="search-li ptb-5 plr-15 bst">
                                                        <a href="product.html" class="body-primary-color d-flex flex-wrap align-items-center">
                                                            <span class="width-48"><img src="assets/image/search/search-product5.jpg" class="w-100 img-fluid border-radius" alt="search-product5"></span>
                                                            <span class="width-calc-48 psl-15 text-truncate">Slim fit linen shirt</span>
                                                        </a>
                                                    </li>
                                                    <li class="search-li ptb-5 plr-15 bst">
                                                        <a href="product.html" class="body-primary-color d-flex flex-wrap align-items-center">
                                                            <span class="width-48"><img src="assets/image/search/search-product6.jpg" class="w-100 img-fluid border-radius" alt="search-product6"></span>
                                                            <span class="width-calc-48 psl-15 text-truncate">Flowy midi dress</span>
                                                        </a>
                                                    </li>
                                                    <li class="search-li ptb-5 plr-15 bst">
                                                        <a href="product.html" class="body-primary-color d-flex flex-wrap align-items-center">
                                                            <span class="width-48"><img src="assets/image/search/search-product7.jpg" class="w-100 img-fluid border-radius" alt="search-product7"></span>
                                                            <span class="width-calc-48 psl-15 text-truncate">Distressed skinny jeans</span>
                                                        </a>
                                                    </li>
                                                    <li class="search-li ptb-5 plr-15 bst">
                                                        <a href="product.html" class="body-primary-color d-flex flex-wrap align-items-center">
                                                            <span class="width-48"><img src="assets/image/search/search-product8.jpg" class="w-100 img-fluid border-radius" alt="search-product8"></span>
                                                            <span class="width-calc-48 psl-15 text-truncate">Hooded puffer jacket</span>
                                                        </a>
                                                    </li>
                                                    <li class="search-li ptb-5 plr-15 bst">
                                                        <a href="product.html" class="body-primary-color d-flex flex-wrap align-items-center">
                                                            <span class="width-48"><img src="assets/image/search/search-product9.jpg" class="w-100 img-fluid border-radius" alt="search-product9"></span>
                                                            <span class="width-calc-48 psl-15 text-truncate">Chunky sole sneakers</span>
                                                        </a>
                                                    </li>
                                                    <li class="search-li ptb-5 plr-15 bst">
                                                        <a href="product.html" class="body-primary-color d-flex flex-wrap align-items-center">
                                                            <span class="width-48"><img src="assets/image/search/search-product10.jpg" class="w-100 img-fluid border-radius" alt="search-product10"></span>
                                                            <span class="width-calc-48 psl-15 text-truncate">Quilted crossbody bag</span>
                                                        </a>
                                                    </li>
                                                    <li class="search-li ptb-5 plr-15 bst">
                                                        <a href="product.html" class="body-primary-color d-flex flex-wrap align-items-center">
                                                            <span class="width-48"><img src="assets/image/search/search-product11.jpg" class="w-100 img-fluid border-radius" alt="search-product11"></span>
                                                            <span class="width-calc-48 psl-15 text-truncate">Stretch active leggings</span>
                                                        </a>
                                                    </li>
                                                    <li class="search-li ptb-5 plr-15 bst">
                                                        <a href="product.html" class="body-primary-color d-flex flex-wrap align-items-center">
                                                            <span class="width-48"><img src="assets/image/search/search-product12.jpg" class="w-100 img-fluid border-radius" alt="search-product12"></span>
                                                            <span class="width-calc-48 psl-15 text-truncate">Relaxed fit joggers</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="search-more ptb-10 plr-15 bst"><a href="search-product.html" class="body-secondary-color text-decoration-underline">See all results (12)</a></div>
                                                <div class="search-fail ptb-10 plr-15">Search not found</div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="search-example-text mst-15">Trending search: a, e, cotton...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- search-modal end -->


        <!-- Add to card drawer start -->
        
        <!-- cart-drawer end -->
        <!-- bottom-menu start -->
        <div class="bottom-menu d-md-none position-sticky bottom-0 body-bg z-1 box-shadow">
            <div class="bottom-menu-element d-flex flex-wrap align-items-center">
                <div class="col">
                    <a href="index.html" class="d-flex flex-column align-items-center ptb-10 text-center">
                        <span class="bottom-menu-icon heading-color icon-16"><i class="ri-home-8-line d-block lh-1"></i></span>
                        <span class="bottom-menu-title body-color font-10 mst-4 text-uppercase lh-1">Home</span>
                    </a>
                </div>
                <div class="col">
                    <a href="account.html" class="d-flex flex-column align-items-center ptb-10 text-center">
                        <span class="bottom-menu-icon heading-color icon-16"><i class="ri-user-line d-block lh-1"></i></span>
                        <span class="bottom-menu-title body-color font-10 mst-4 text-uppercase lh-1">Account</span>
                    </a>
                </div>
                <div class="col">
                    <a href="collection.html" class="d-flex flex-column align-items-center ptb-10 text-center">
                        <span class="bottom-menu-icon heading-color icon-16"><i class="ri-layout-grid-line d-block lh-1"></i></span>
                        <span class="bottom-menu-title body-color font-10 mst-4 text-uppercase lh-1">Shop</span>
                    </a>
                </div>
                <div class="col">
                    <a href="wishlist.html" class="d-flex flex-column align-items-center ptb-10 text-center">
                        <span class="bottom-menu-icon-wrap position-relative per-8">
                            <span class="d-block bottom-menu-icon heading-color icon-16"><i class="ri-heart-line d-block lh-1"></i></span>
                            <span class="bottom-menu-counter wishlist-counter extra-color font-10 position-absolute end-0 primary-bg d-flex align-items-center justify-content-center rounded-circle">5</span>
                        </span>
                        <span class="bottom-menu-title body-color font-10 mst-4 text-uppercase lh-1">Wishlist</span>
                    </a>
                </div>
                <div class="col">
                    <a href="javascript:void(0)" class="js-cart-drawer d-flex flex-column align-items-center ptb-10 text-center">
                        <span class="bottom-menu-icon-wrap position-relative per-8">
                            <span class="d-block bottom-menu-icon heading-color icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                            <span class="bottom-menu-counter cart-counter extra-color font-10 position-absolute end-0 primary-bg d-flex align-items-center justify-content-center rounded-circle">4</span>
                        </span>
                        <span class="bottom-menu-title body-color font-10 mst-4 text-uppercase lh-1">Cart</span>
                    </a>
                </div>
            </div>
        </div>

    
<?php $__env->startPush('scripts'); ?>

<script>
document.querySelectorAll('.add-wishlist-to-cart').forEach(btn => {

    btn.addEventListener('click', function () {

        const productId = this.dataset.productId;

        Swal.fire({
            icon: 'info',
            title: 'Select Size & Color',
            text: 'Please select size & color on product page',
            confirmButtonText: 'Continue',
            showCancelButton: true,
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                // Navigate to the product page
                window.location.href = `/product-view/${productId}`;
            }
        });

    });

});
</script>




<script>

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-wishlist-form .wish-remove').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault(); // Prevent form submission

            let form = this.closest('form');
            let wishlistItem = form.closest('.wish-card'); // adjust if using .wish-table-info

            Swal.fire({
                title: 'Are you sure?',
                text: "This item will be removed from wishlist!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e65c00',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // AJAX request
                    fetch(form.action, {
                        method: 'POST', // Laravel expects POST + _method
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ _method: 'DELETE' }) // Laravel DELETE spoofing
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            // Remove from DOM
                            wishlistItem.remove();

                            // Update wishlist counter
                            let counter = document.querySelector('.wish-counter');
                            if (counter) {
                                let count = parseInt(counter.textContent) - 1;
                                counter.textContent = count + ' Items';
                            }

                            // Show SweetAlert success
                            Swal.fire({
                                icon: 'success',
                                text: data.message,
                                timer: 1500,
                                showConfirmButton: false
                            });
                        } else {
                            Swal.fire('Error', data.message, 'error');
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        Swal.fire('Error', 'Something went wrong!', 'error');
                    });
                }
            });
        });
    });
});

</script>




<script>
function addToWishlist(productId) {
    fetch("<?php echo e(route('wishlist.store')); ?>", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ product_id: productId })
    })
    .then(res => res.json())
   .then(data => {

    console.log(data);

    if (data.wishlistCount !== undefined) {

        // 🔥 FIRE GLOBAL EVENT
        document.dispatchEvent(
            new CustomEvent('wishlist-updated', {
                detail: { count: data.wishlistCount }
            })
        );
    }

    if (data.message) {
        Swal.fire({
            icon: 'success',
            text: data.message,
            timer: 1500,
            showConfirmButton: false
        });
    }
});
}
</script>


 <?php $__env->stopPush(); ?>


 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel_git\ecommerce-web\resources\views/whistlist.blade.php ENDPATH**/ ?>