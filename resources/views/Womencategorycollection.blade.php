
@extends('layouts.frontend-layout')

@section('title', ' All Women-collection')



@section('content')

        <main id="main">


               <div class="breadcrumb-area ptb-100 text-center overflow-hidden"
     style="background-image: url('{{    asset('category_images/womenmaincategorybanner.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 400px;
            margin-top:10px;">
    <div class="container">
        <span class="d-block extra-color">
            <a href="/" class="extra-color">Home</a> / All categroy Women-Collection
        </span>
        <h2 class="extra-color font-24 font-xl-32 mst-5 mst-xl-9">All Women-Collection</h2>
    </div>
</div>





  <section class="category-slider section-ptb extra-bg">
                <div class="container-fluid">
                    <div class="cat-category">
                        <div class="section-capture text-center">
                            <div class="section-title" data-animate="animate__fadeIn">
                                <h2 class="section-heading">ALL WOMENS CATEGORY HERE !😘</h2>
                            </div>
                        </div>
                        <div class="cat-wrap">
                            <div class="cat-slider swiper" id="cat-slider">
                                <div class="swiper-wrapper">
                                   <div class="swiper-slide h-auto d-flex" data-animate="animate__fadeIn">
                                        <div class="cat-block banner-hover w-100 ptb-15 plr-15 body-bg border-radius">
                                            <a href="{{ route('womenkurtiscollection') }}" class="d-none d-xl-block position-relative banner-img br-hidden">
                                                <span class="btn-style tertiary-btn banner-btn position-absolute top-50 start-50 translate-middle z-1 text-nowrap">Shop now</span>
                                                <img src="category_images/1764590994_Anarkali-Kurtis-for-women.webp" class="w-100 img-fluid" alt="collection-5">
                                            </a>
                                            <a href="collection.html" class="d-block d-xl-none banner-img br-hidden">
                                                <img src="assets/image/collection/collection-5.jpg" class="w-100 img-fluid" alt="collection-5">
                                            </a>
                                            <div class="cat-content pst-15">
                                                <div class="ul-mtm15 justify-content-between heading-weight">
                                                    <span class="heading-color text-truncate">Kurti's collection</span>
                                                    <span class="primary-color text-uppercase">10+ item</span>
                                                </div>
                                                <div class="d-xl-none mst-7">
                                                    <a href="{{ route('womenkurtiscollection') }}" class="link-btn">Shop now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide h-auto d-flex" data-animate="animate__fadeIn">
                                        <div class="cat-block banner-hover w-100 ptb-15 plr-15 body-bg border-radius">
                                            <a href="{{ route('womentops/t-shirtscollection') }}" class="d-none d-xl-block position-relative banner-img br-hidden">
                                                <span class="btn-style tertiary-btn banner-btn position-absolute top-50 start-50 translate-middle z-1 text-nowrap">Shop now</span>
                                                  <img src="category_images/1764652565_topspinkimg.webp" class="w-100 img-fluid" alt="collection-5">
                                            </a>
                                            <a href="{{ route('womentops/t-shirtscollection') }}" class="d-block d-xl-none banner-img br-hidden">
                                                <img src="assets/image/collection/collection-2.jpg" class="w-100 img-fluid" alt="collection-2">
                                            </a>
                                            <div class="cat-content pst-15">
                                                <div class="ul-mtm15 justify-content-between heading-weight">
                                                    <span class="heading-color text-truncate">Tops &T-shirts</span>
                                                    <span class="primary-color text-uppercase">9+ item</span>
                                                </div>
                                                <div class="d-xl-none mst-7">
                                                    <a href="{{ route('womentops/t-shirtscollection') }}" class="link-btn">Shop now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide h-auto d-flex" data-animate="animate__fadeIn">
                                        <div class="cat-block banner-hover w-100 ptb-15 plr-15 body-bg border-radius">
                                            <a href="{{ route('womenjeanscollection') }}" class="d-none d-xl-block position-relative banner-img br-hidden">
                                                <span class="btn-style tertiary-btn banner-btn position-absolute top-50 start-50 translate-middle z-1 text-nowrap">Shop now</span>
                                                   <img src="category_images/1764653883_womenjeansimmg.jpg" class="w-100 img-fluid" alt="collection-5">
                                            </a>
                                            <a href="{{ route('womenjeanscollection') }}" class="d-block d-xl-none banner-img br-hidden">
                                                <img src="category_images/1764653883_womenjeansimg.jpg" class="w-100 img-fluid" alt="collection-5">
                                            </a>
                                            <div class="cat-content pst-15">
                                                <div class="ul-mtm15 justify-content-between heading-weight">
                                                    <span class="heading-color text-truncate">Jeans & Jeggings</span>
                                                    <span class="primary-color text-uppercase">2+ item</span>
                                                </div>
                                                <div class="d-xl-none mst-7">
                                                    <a href="{{ route('womenjeanscollection') }}" class="link-btn">Shop now</a>
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

    @endsection

