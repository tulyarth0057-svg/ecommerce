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
            <section class="wish-area section-ptb">
                <div class="container">
                       
                        <!-- add product to whistlist -->

                        <div class="wish-itemview section-pt">
                            <div class="wish-title d-flex align-items-center justify-content-between peb-30 beb" data-animate="animate__fadeIn">
                                <h6 class="font-18">My favorites</h6>
                                <span class="wish-count"><span class="wish-counter">4</span>Items</span>
                            </div>
                            <div class="wish-table">
                                <div class="wish-table-heading d-none d-md-block ptb-30 beb" data-animate="animate__fadeIn">
                                    <div class="row">
                                        <div class="col-md-5 heading-color heading-weight">Product</div>
                                        <div class="col-md-3 heading-color heading-weight">Qty</div>
                                        <div class="col-md-2 heading-color heading-weight">Total</div>
                                        <div class="col-md-2 heading-color heading-weight text-end">Option</div>
                                    </div>
                                </div>
                                <div class="wish-table-data">
                                    <div class="wish-table-info ptb-30 beb" data-animate="animate__fadeIn">
                                        <?php $__currentLoopData = $wishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                               
                                    <div class="row row-mtm w-750 m-auto mb-4 p-4 border">
                                        <div class="wish-table-item">
                                            <div class="row row-mtm30">

                                                <!-- Product -->
                                                <div class="col-12 col-md-8">
                                                    <div class="wish-item-content d-flex flex-wrap">
                                                        <div class="wish-item-image ">
                                                                <a href="<?php echo e(url('product-view/'.$wishlist->p_id)); ?>" class="d-block" class="d-block br-hidden">
                                                            <img src="<?php echo e(asset('storage/colors/' . $wishlist->product->colors->first()->images->first()->img_path)); ?>"
                                                            alt="<?php echo e($wishlist->product->img_alt_text ?? $wishlist->product->p_name); ?>" class="whistlist-img"
                                                            >
                                                            </a>
                                                        </div>

                                                        <div class="wish-item-info p-2 ms-3 ">
                                                            <a href="<?php echo e(url('product-view/'.$wishlist->p_id)); ?>" class="primary-link heading-weight">
                                    
                                                                <label for="">Product name:</label><br>
                                                                <?php echo e($wishlist->product->p_name); ?>

                                                            </a>

                                                            <div class="wish-item-price heading-color heading-weight mst-7 ">
                                                                <label for="">Price :</label><br>
                                                                <span>₹<?php echo e($wishlist->product->p_price); ?></span>
                                                                
                                                            </div>

                                            
                                                        </div>
                                                    </div>
                                                </div>

                                               <!-- Total -->
                                                    <div class="col-3 col-md-2">
                                                        <div class="wish-total-price heading-color heading-weight">
                                                        <label for="">total price :</label>
                                                            <span class="text-danger"> ₹<?php echo e($wishlist->product->p_price); ?></span>
                                                        </div>
                                                    </div>

                                                    <!-- Remove -->
                                                <div class="col-3 col-md-2 text-end">
                                                    <form action="<?php echo e(route('wishlist.remove', $wishlist->w_id)); ?>" 
                                                        method="POST" 
                                                        class="delete-wishlist-form">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>

                                                        <button type="button" class="wish-remove text-danger icon-16">
                                                            <i class="ri-close-large-line"></i>
                                                        </button>
                                                    </form>
                                                </div>


                                                </div>
                                            </div>

                                            <!-- Add to Cart -->
                                            <div class="wish-note-cart">
                                    <button class="btn btn-cart bg-dark p-2 text-white w-100 add-wishlist-to-cart"
                                        data-product-id="<?php echo e($wishlist->product->p_id); ?>">
                                        Add to Cart
                                    </button>


                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </div>
                                        </div>
                                    </div>
                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </form>
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
            confirmButtonText: 'Continue'
        }).then(() => {
            window.location.href = `/product-view/${productId}`;
        });

    });

});
</script>

      


<script>
document.querySelectorAll('.delete-wishlist-form .wish-remove').forEach(button => {
    button.addEventListener('click', function () {
        let form = this.closest('form');

        Swal.fire({
            title: 'Are you sure?',
            text: "This item will be removed from wishlist!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>





        <?php $__env->stopPush(); ?>


 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel_git\ecommerce-web\resources\views/whistlist.blade.php ENDPATH**/ ?>