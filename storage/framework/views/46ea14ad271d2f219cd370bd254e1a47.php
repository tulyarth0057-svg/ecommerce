<?php $__env->startSection('title', ' All kids-collection'); ?>



<?php $__env->startSection('content'); ?>



 <!-- search-modal start -->
        <div class="search-modal modal fade" id="searchmodal">
            <div class="modal-dialog mw-100 m-0">
                <div class="modal-content body-bg border-0 rounded-0">
                    <div class="modal-body p-0">
                        <div class="container">
                            <div class="search-content ptb-30">
                                <div class="search-box d-flex flex-row-reverse">
                                    <button type="button" class="d-block search-close body-secondary-color icon-16" data-bs-dismiss="modal" aria-label="Close"><i class="ri-close-large-line d-block lh-1"></i></button>
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

        <main id="main">

               <div class="breadcrumb-area ptb-100 text-center overflow-hidden"
     style="background-image: url('<?php echo e(asset('category_banners/kidsmainbanner.jpg')); ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 400px;
            margin-top:10px;">
    <div class="container">
        <span class="d-block extra-color">
            <a href="/" class="extra-color">Home</a> / All categroy kids-Collection
        </span>
        <h2 class="extra-color font-24 font-xl-32 mst-5 mst-xl-9">All kids-Collection</h2>
    </div>
</div>





  <section class="category-slider section-ptb extra-bg">
                <div class="container-fluid">
                    <div class="cat-category">
                        <div class="section-capture text-center">
                            <div class="section-title" data-animate="animate__fadeIn">
                                <h2 class="section-heading">ALL KIDS CATEGORY HERE !😘</h2>
                            </div>
                        </div>
                        <div class="cat-wrap">
                            <div class="cat-slider swiper" id="cat-slider">
                                <div class="swiper-wrapper">
                                   <div class="swiper-slide h-auto d-flex" data-animate="animate__fadeIn">
                                        <div class="cat-block banner-hover w-100 ptb-15 plr-15 body-bg border-radius">
                                            <a href="<?php echo e(route('kidstoyscollection1')); ?>" class="d-none d-xl-block position-relative banner-img br-hidden">
                                                <span class="btn-style tertiary-btn banner-btn position-absolute top-50 start-50 translate-middle z-1 text-nowrap">Shop now</span>
                                                <img src="category_images/1764654522_toyimg.webp" class="w-100 img-fluid" alt="collection-5">
                                            </a>
                                            <a href="<?php echo e(route('kidstoyscollection1')); ?>" class="d-block d-xl-none banner-img br-hidden">
                                                <img src="assets/image/collection/collection-5.jpg" class="w-100 img-fluid" alt="collection-5">
                                            </a>
                                            <div class="cat-content pst-15">
                                                <div class="ul-mtm15 justify-content-between heading-weight">
                                                    <span class="heading-color text-truncate">toys collection</span>
                                                    <span class="primary-color text-uppercase">10+ item</span>
                                                </div>
                                                <div class="d-xl-none mst-7">
                                                    <a href="<?php echo e(route('kidstoyscollection1')); ?>" class="link-btn">Shop now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide h-auto d-flex" data-animate="animate__fadeIn">
                                        <div class="cat-block banner-hover w-100 ptb-15 plr-15 body-bg border-radius">
                                            <a href="<?php echo e(route('kidsclothescollection2')); ?>" class="d-none d-xl-block position-relative banner-img br-hidden">
                                                <span class="btn-style tertiary-btn banner-btn position-absolute top-50 start-50 translate-middle z-1 text-nowrap">Shop now</span>
                                                  <img src="category_images/1764657243_kurta-pajama-pink-1.webp" class="w-100 img-fluid" alt="collection-5">
                                            </a>
                                            <a href="<?php echo e(route('kidsclothescollection2')); ?>" class="d-block d-xl-none banner-img br-hidden">
                                                <img src="assets/image/collection/collection-2.jpg" class="w-100 img-fluid" alt="collection-2">
                                            </a>
                                            <div class="cat-content pst-15">
                                                <div class="ul-mtm15 justify-content-between heading-weight">
                                                    <span class="heading-color text-truncate">kids Clothings</span>
                                                    <span class="primary-color text-uppercase">9+ item</span>
                                                </div>
                                                <div class="d-xl-none mst-7">
                                                    <a href="<?php echo e(route('kidsclothescollection2')); ?>" class="link-btn">Shop now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide h-auto d-flex" data-animate="animate__fadeIn">
                                        <div class="cat-block banner-hover w-100 ptb-15 plr-15 body-bg border-radius">
                                            <a href="<?php echo e(route('kidsAccessoriescollection3')); ?>" class="d-none d-xl-block position-relative banner-img br-hidden">
                                                <span class="btn-style tertiary-btn banner-btn position-absolute top-50 start-50 translate-middle z-1 text-nowrap">Shop now</span>
                                                   <img src="category_images/1764658050_bag image.webp" class="w-100 img-fluid" alt="collection-5">
                                            </a>
                                            <a href="<?php echo e(route('kidsAccessoriescollection3')); ?>" class="d-block d-xl-none banner-img br-hidden">
                                                <img src="category_images/1764653883_womenjeansimg.jpg" class="w-100 img-fluid" alt="collection-5">
                                            </a>
                                            <div class="cat-content pst-15">
                                                <div class="ul-mtm15 justify-content-between heading-weight">
                                                    <span class="heading-color text-truncate">Kids Accessories</span>
                                                    <span class="primary-color text-uppercase">2+ item</span>
                                                </div>
                                                <div class="d-xl-none mst-7">
                                                    <a href="<?php echo e(route('kidsAccessoriescollection3')); ?>" class="link-btn">Shop now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                </div>
                            </div>
                            <div class="swiper-buttons">
                                <div class="swiper-buttons-wrap">
                                    <button type="button" class="swiper-prev swiper-prev-cat" aria-label="Arrow previous"><i class="ri-arrow-left-line d-block lh-1"></i></button>
                                    <button type="button" class="swiper-next swiper-next-cat" aria-label="Arrow next"><i class="ri-arrow-right-line d-block lh-1"></i></button>
                                </div>
                            </div>
                            <div class="swiper-dots" data-animate="animate__fadeIn">
                                <div class="swiper-pagination swiper-pagination-cat"></div>
                            </div>
                            <div class="view-button d-none" data-animate="animate__fadeIn">
                                <a href="collections.html" class="btn-style tertiary-btn">See more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>

           <?php $__env->startPush('scripts'); ?>


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
            ? products.map(p => `<li><a href="/product-view/${p.p_id}">${p.p_name}</a></li>`).join('')
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

<?php $__env->stopPush(); ?>

 <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.frontend-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel_git\ecommerce-web\resources\views/Kidscategorycollection.blade.php ENDPATH**/ ?>