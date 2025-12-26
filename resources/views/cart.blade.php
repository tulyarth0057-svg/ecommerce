@extends('layouts.frontend-layout')

@section('title', 'Add to cart')

@section('content')

        <!-- breadcrumb-area start -->
        <div class="breadcrumb-area ptb-30 bg-img text-center" data-bgimg="assets/image/other/breadcrumb-bgimg.jpg">
            <div class="container">
                <span class="d-block extra-color"><a href="/" class="extra-color">Home</a> / Add To Cart</span>
                <h2 class="extra-color font-24 font-xl-32 mst-5 mst-xl-9"> Add To Cart</h2>
            </div>
        </div>
        <!-- breadcrumb-area end -->

        <!-- main start -->
        <main id="main">
            <!-- cart start -->
            <section class="cart-area section-pt">
                <form method="post" action="javascript:void(0)">
                    <div class="container">
                        <div class="row row-mtm align-items-lg-start">
                            <div class="col-12 col-lg-8 p-lg-sticky top-0">
                                <div class="cart-itemview">
                                    <div class="cart-title d-flex align-items-center justify-content-between peb-30 beb" data-animate="animate__fadeIn">
                                        <h6 class="font-18">Shopping cart</h6>
                                        <span class="cart-count"><span class="cart-counter">2</span> Items</span>
                                    </div>
                                    <div class="cart-table">
                                        <div class="cart-table-heading d-none d-md-block ptb-30 beb" data-animate="animate__fadeIn">
                                            <div class="row">
                                                <div class="col-md-5 heading-color heading-weight">Product</div>
                                                <div class="col-md-3 heading-color heading-weight">Qty</div>
                                                <div class="col-md-2 heading-color heading-weight">Total</div>
                                                <div class="col-md-2 heading-color heading-weight text-end">Option</div>
                                            </div>
                                        </div>
                                        <div class="cart-table-data">
                                            <div class="cart-table-info ptb-30 beb" data-animate="animate__fadeIn">
                                                <div class="row row-mtm30">
                                                   
                                                   
                                                   
                                                </div>
                                            </div>
                                           
                                            
                                          <div class="container py-4">

    <h3 class="mb-4">My Cart</h3>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Cart Items --}}
    @forelse($cartItems as $item)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">

                <div class="row align-items-center">

                    {{-- PRODUCT --}}
                    <div class="col-md-5 d-flex">
                        <img src="{{ asset('storage/products/'.$item->product->p_image) }}"
                             class="img-fluid rounded"
                             style="width:80px"
                             alt="{{ $item->product->p_name }}">

                        <div class="ms-3">
                            <h6 class="mb-1">{{ $item->product->p_name }}</h6>
                            <small class="text-muted">
                                Size: {{ $item->size->size_name }} |
                                Color: {{ $item->color->color_name }}
                            </small>
                            <div class="fw-bold mt-1">
                                ₹{{ number_format($item->price, 2) }}
                            </div>
                        </div>
                    </div>

                    {{-- QTY --}}
                    <div class="col-md-3 text-center">
                        <form method="POST" action="{{ route('cart.update') }}" class="d-inline">
                            @csrf
                            <input type="hidden" name="cart_id" value="{{ $item->cart_id }}">
                            <input type="hidden" name="type" value="minus">
                            <button class="btn btn-sm btn-outline-secondary">-</button>
                        </form>

                        <span class="mx-2 fw-semibold">{{ $item->qty }}</span>

                        <form method="POST" action="{{ route('cart.update') }}" class="d-inline">
                            @csrf
                            <input type="hidden" name="cart_id" value="{{ $item->cart_id }}">
                            <input type="hidden" name="type" value="plus">
                            <button class="btn btn-sm btn-outline-secondary">+</button>
                        </form>
                    </div>

                    {{-- TOTAL --}}
                    <div class="col-md-2 text-center fw-bold">
                        ₹{{ number_format($item->price * $item->qty, 2) }}
                    </div>

                    {{-- REMOVE --}}
                    <div class="col-md-2 text-end">
                        <form method="POST" action="{{ route('cart.remove', $item->cart_id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                Remove
                            </button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    @empty
        <div class="alert alert-info text-center">
            Your cart is empty
        </div>
    @endforelse

                                        </div>
                                        <div class="cart-table-button d-flex flex-wrap justify-content-sm-between mst-30" data-animate="animate__fadeIn">
                                            <a href="/" class="width-100 width-sm-auto btn-style quaternary-btn">Continue shopping</a>
                                            <a href="cart-empty.html" class="width-100 width-sm-auto btn-style secondary-btn mst-15 mst-sm-0">Clear cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 p-lg-sticky top-0" data-animate="animate__fadeIn">
                                <div class="row row-mtm">
                                    <div class="col-12">
                                        <div class="cart-coupan ptb-30 plr-15 plr-md-30 body-bg border-full border-radius">
                                            <div class="cart-orderview">
                                                <h6 class="font-18 meb-21">Have a coupan code?</h6>
                                                <div class="cart-info">
                                                    <div class="cart-discount-title d-flex align-items-center justify-content-between">
                                                        <span>Use discount code</span>
                                                        <button type="button" class="cart-code-edit d-none body-secondary-color icon-16" aria-label="Edit"><i class="ri-edit-2-line d-block lh-1"></i></button>
                                                        <button type="button" class="cart-code-close body-secondary-color icon-16" aria-label="Close"><i class="ri-close-large-line d-block lh-1"></i></button>
                                                    </div>
                                                    <div class="cart-detail mst-12">
                                                        <div class="cart-detail-info d-none">
                                                            <!-- cart-info discount-code start -->
                                                            <div class="ul-mt5 align-items-center heading-weight">
                                                                <span class="text-danger"><i class="ri-price-tag-3-line d-block icon-16 lh-1"></i></span>
                                                                <span class="text-danger">11%OFF</span>
                                                                <span class="heading-color">applied</span>
                                                            </div>
                                                            <!-- cart-info discount-code end -->
                                                        </div>
                                                        <div class="cart-detail-form">
                                                            <div class="cart-detail-field">
                                                                <div class="row field-row">
                                                                    <div class="col-12 field-col">
                                                                        <label for="cart-discount" class="field-label">Discount code</label>
                                                                        <div class="d-md-flex">
                                                                            <input type="text" id="cart-discount" name="cart-discount" class="cart-dis-input width-100 height-md-auto text-center text-md-start" value="11%OFF" placeholder="Discount code" autocomplete="off" required>
                                                                            <button type="submit" class="cart-dis-btn cart-dis-apply-btn width-100 width-md-auto btn-style secondary-btn mst-15 mst-md-0 text-nowrap">Apply</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="cart-summary ptb-30 plr-15 plr-md-30 extra-bg border-radius">
                                            <div class="cart-costview">
                                                <h6 class="font-18 meb-21">Order summary</h6>
                                                <div class="cart-cost">
                                                    <div class="row row-mtm20">
                                                        <div class="col-12 d-flex justify-content-between">
                                                            <span>Subtotal</span>
                                                            <span class="heading-color heading-weight">$246.00</span>
                                                        </div>
                                                        <div class="col-12 d-flex justify-content-between">
                                                            <span>Discount</span>
                                                            <span class="text-danger heading-weight">$11.00</span>
                                                        </div>
                                                        <div class="col-12 d-flex justify-content-between">
                                                            <span>Shipping</span>
                                                            <span class="text-success heading-weight">$0.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cart-cost mst-30 pst-30 bst">
                                                    <div class="row row-mtm20">
                                                        <div class="col-12 d-flex justify-content-between">
                                                            <span>Total</span>
                                                            <span class="heading-color heading-weight">$235.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cart-button mst-30">
                                                <a href="checkout.html" class="w-100 btn-style secondary-btn">Checkout</a>
                                                <span class="d-block font-12 mst-13">Taxes excluded at checkout*</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
            <!-- cart end -->
            <!-- cart-collection start -->
            <section class="cart-collection section-ptb">
                <div class="container">
                    <div class="collection-category">
                        <div class="section-capture text-center">
                            <div class="section-title" data-animate="animate__fadeIn">
                                <h2 class="section-heading">You may also like</h2>
                            </div>
                        </div>
                        <div class="collection-wrap">
                            <div class="cart-slider swiper" id="cart-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide" data-animate="animate__fadeIn">
                                        <div class="single-product">
                                            <div class="row single-product-wrap">
                                                <div class="product-image-col">
                                                    <div class="product-image">
                                                        <a href="product.html" class="pro-img">
                                                            <img src="assets/image/product/p-1.jpg" class="w-100 img-fluid img1" alt="p-1">
                                                            <img src="assets/image/product/p-2.jpg" class="w-100 img-fluid img2" alt="p-2">
                                                        </a>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="pro-content">
                                                        <div class="product-title">
                                                            <span class="d-block meb-7">Polyester / Chic</span>
                                                            <span class="d-block heading-weight"><a href="product.html" class="primary-link">Pleated skater skirt</a></span>
                                                        </div>
                                                        <div class="product-price">
                                                            <div class="price-box heading-weight">
                                                                <span class="new-price primary-color">$79.00</span>
                                                                <span class="old-price"><span class="mer-3">~</span><span class="text-decoration-line-through">$89.00</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-ratting">
                                                            <span class="review-ratting">
                                                                <span class="review-star">
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-line"></i>
                                                                </span>
                                                                <span class="review-average">4.0<span class="review-caption">2 reviews</span></span>
                                                            </span>
                                                        </div>
                                                        <div class="product-description">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry It is a long established fact that a will be distracted by the readable of at</p>
                                                        </div>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" data-animate="animate__fadeIn">
                                        <div class="single-product">
                                            <div class="row single-product-wrap">
                                                <div class="product-image-col">
                                                    <div class="product-image">
                                                        <a href="product.html" class="pro-img">
                                                            <img src="assets/image/product/p-3.jpg" class="w-100 img-fluid img1" alt="p-3">
                                                            <img src="assets/image/product/p-4.jpg" class="w-100 img-fluid img2" alt="p-4">
                                                            <span class="product-label product-label-new product-label-left">New</span>
                                                        </a>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="pro-content">
                                                        <div class="product-title">
                                                            <span class="d-block meb-7">Wool blend / Business</span>
                                                            <span class="d-block heading-weight"><a href="product.html" class="primary-link">Tailored blazer jacket</a></span>
                                                        </div>
                                                        <div class="product-price">
                                                            <div class="price-box heading-weight">
                                                                <span class="new-price primary-color">$49.00</span>
                                                                <span class="old-price"><span class="mer-3">~</span><span class="text-decoration-line-through">$59.00</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-ratting">
                                                            <span class="review-ratting">
                                                                <span class="review-star">
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                </span>
                                                                <span class="review-average">No reviews<span class="review-caption">0 reviews</span></span>
                                                            </span>
                                                        </div>
                                                        <div class="product-description">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry It is a long established fact that a will be distracted by the readable of at</p>
                                                        </div>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" data-animate="animate__fadeIn">
                                        <div class="single-product">
                                            <div class="row single-product-wrap">
                                                <div class="product-image-col">
                                                    <div class="product-image">
                                                        <a href="product.html" class="pro-img">
                                                            <img src="assets/image/product/p-5.jpg" class="w-100 img-fluid img1" alt="p-5">
                                                            <img src="assets/image/product/p-6.jpg" class="w-100 img-fluid img2" alt="p-6">
                                                        </a>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="pro-content">
                                                        <div class="product-title">
                                                            <span class="d-block meb-7">Cotton / Playful</span>
                                                            <span class="d-block heading-weight"><a href="product.html" class="primary-link">Girls floral ruffle top</a></span>
                                                        </div>
                                                        <div class="product-price">
                                                            <div class="price-box heading-weight">
                                                                <span class="new-price primary-color">$69.00</span>
                                                                <span class="old-price"><span class="mer-3">~</span><span class="text-decoration-line-through">$79.00</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-ratting">
                                                            <span class="review-ratting">
                                                                <span class="review-star">
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                </span>
                                                                <span class="review-average">No reviews<span class="review-caption">0 reviews</span></span>
                                                            </span>
                                                        </div>
                                                        <div class="product-description">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry It is a long established fact that a will be distracted by the readable of at</p>
                                                        </div>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" data-animate="animate__fadeIn">
                                        <div class="single-product">
                                            <div class="row single-product-wrap">
                                                <div class="product-image-col">
                                                    <div class="product-image">
                                                        <a href="product.html" class="pro-img">
                                                            <img src="assets/image/product/p-7.jpg" class="w-100 img-fluid img1" alt="p-7">
                                                            <img src="assets/image/product/p-8.jpg" class="w-100 img-fluid img2" alt="p-8">
                                                            <span class="product-label product-label-discount product-label-left">5% Off</span>
                                                        </a>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="pro-content">
                                                        <div class="product-title">
                                                            <span class="d-block meb-7">Cotton / Casual</span>
                                                            <span class="d-block heading-weight"><a href="product.html" class="primary-link">Classic cotton t-shirt</a></span>
                                                        </div>
                                                        <div class="product-price">
                                                            <div class="price-box heading-weight">
                                                                <span class="new-price primary-color">$49.00</span>
                                                                <span class="old-price"><span class="mer-3">~</span><span class="text-decoration-line-through">$54.00</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-ratting">
                                                            <span class="review-ratting">
                                                                <span class="review-star">
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                </span>
                                                                <span class="review-average">No reviews<span class="review-caption">0 reviews</span></span>
                                                            </span>
                                                        </div>
                                                        <div class="product-description">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry It is a long established fact that a will be distracted by the readable of at</p>
                                                        </div>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" data-animate="animate__fadeIn">
                                        <div class="single-product">
                                            <div class="row single-product-wrap">
                                                <div class="product-image-col">
                                                    <div class="product-image">
                                                        <a href="product.html" class="pro-img">
                                                            <img src="assets/image/product/p-9.jpg" class="w-100 img-fluid img1" alt="p-9">
                                                            <img src="assets/image/product/p-10.jpg" class="w-100 img-fluid img2" alt="p-10">
                                                        </a>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="pro-content">
                                                        <div class="product-title">
                                                            <span class="d-block meb-7">Linen blend / formal</span>
                                                            <span class="d-block heading-weight"><a href="product.html" class="primary-link">Slim fit linen shirt</a></span>
                                                        </div>
                                                        <div class="product-price">
                                                            <div class="price-box heading-weight">
                                                                <span class="new-price primary-color">$89.00</span>
                                                                <span class="old-price"><span class="mer-3">~</span><span class="text-decoration-line-through">$99.00</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-ratting">
                                                            <span class="review-ratting">
                                                                <span class="review-star">
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                </span>
                                                                <span class="review-average">No reviews<span class="review-caption">0 reviews</span></span>
                                                            </span>
                                                        </div>
                                                        <div class="product-description">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry It is a long established fact that a will be distracted by the readable of at</p>
                                                        </div>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" data-animate="animate__fadeIn">
                                        <div class="single-product">
                                            <div class="row single-product-wrap">
                                                <div class="product-image-col">
                                                    <div class="product-image">
                                                        <a href="product.html" class="pro-img">
                                                            <img src="assets/image/product/p-11.jpg" class="w-100 img-fluid img1" alt="p-11">
                                                            <img src="assets/image/product/p-12.jpg" class="w-100 img-fluid img2" alt="p-12">
                                                            <span class="product-label product-label-sale product-label-left">Sale</span>
                                                        </a>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="pro-content">
                                                        <div class="product-title">
                                                            <span class="d-block meb-7">Viscose / Sleeveless</span>
                                                            <span class="d-block heading-weight"><a href="product.html" class="primary-link">Flowy midi dress</a></span>
                                                        </div>
                                                        <div class="product-price">
                                                            <div class="price-box heading-weight">
                                                                <span class="new-price primary-color">$79.00</span>
                                                                <span class="old-price"><span class="mer-3">~</span><span class="text-decoration-line-through">$84.00</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-ratting">
                                                            <span class="review-ratting">
                                                                <span class="review-star">
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                </span>
                                                                <span class="review-average">No reviews<span class="review-caption">0 reviews</span></span>
                                                            </span>
                                                        </div>
                                                        <div class="product-description">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry It is a long established fact that a will be distracted by the readable of at</p>
                                                        </div>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-buttons">
                                <div class="swiper-buttons-wrap">
                                    <button type="button" class="swiper-prev swiper-prev-cart" aria-label="Arrow previous"><i class="ri-arrow-left-line d-block lh-1"></i></button>
                                    <button type="button" class="swiper-next swiper-next-cart" aria-label="Arrow next"><i class="ri-arrow-right-line d-block lh-1"></i></button>
                                </div>
                            </div>
                            <div class="swiper-dots">
                                <div class="swiper-pagination swiper-pagination-cart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- cart-collection end -->
        </main>
        <!-- main end -->
      
                            
        
        <!-- bg-screen start -->
        <div class="bg-screen">
            <div class="bg-back position-fixed top-0 end-0 bottom-0 start-0 bg-black z-index-4 opacity-0 invisible"></div>
            <div class="bg-shop position-fixed top-0 end-0 bottom-0 start-0 bg-black z-index-4 opacity-0 invisible"></div>
        </div>
        <!-- bg-screen end -->
      
@endsection
      

