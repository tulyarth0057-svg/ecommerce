@extends('layouts.frontend-layout')

@section('title', 'My Cart')




@push('styles')

<style>
.cart-box, .summary-box {
    background:#fff;
    border-radius:8px;
    padding:20px;
    box-shadow:0 4px 12px rgba(0,0,0,.06);
}

.cart-item {
    display:flex;
    gap:15px;
    padding:15px 0;
    border-bottom:1px solid #eee;
}

.cart-img img {
    width:90px;
    height:90px;
    object-fit:cover;
    border-radius:6px;
}

.cart-info h6 {
    margin:0;
    font-size:15px;
}

.cart-info small {
    color:#777;
}

.price {
    font-weight:600;
    margin-top:5px;
}

.cart-action {
    margin-left:auto;
    text-align:right;
}

.remove-btn {
    background:none;
    border:none;
    color:#dc3545;
    font-size:18px;
    cursor:pointer;
}

.summary-row {
    display:flex;
    justify-content:space-between;
    margin-bottom:10px;
}

.summary-row.total {
    font-size:18px;
    font-weight:700;
}
.qty-wrapper {
    border: 1px solid #ddd;
    border-radius: 6px;
    overflow: hidden;
    height:50px;
}

.qty-btn {
    border: none;
    background: #f5f5f5;
    padding: 4px 7px;
    font-size: 16px;
    cursor: pointer;
   
}

.qty-input {
    width: 70px;
    border: none;
    text-align: center;
    font-size: 14px;
    background-color:white;


}

.qty-input:focus {
    outline: none;
}



</style>

@endpush

@section('content')

        <!-- breadcrumb-area start -->
        <div class="breadcrumb-area ptb-30 bg-img text-center" data-bgimg="assets/image/other/breadcrumb-bgimg.jpg">
            <div class="container">
                <span class="d-block extra-color"><a href="/" class="extra-color">Home</a> / My Cart</span>
                <h2 class="extra-color font-24 font-xl-32 mst-5 mst-xl-9"> My Cart</h2>
            </div>
        </div>
        <!-- breadcrumb-area end -->

        <!-- main start -->
        <main id="main">

    
            <!-- cart start -->
           <section class="cart-area py-5">
        <form method="post" action="javascript:void(0)">
        <div class="container">
        <div class="row g-4 align-items-start">

    <!-- LEFT : CART ITEMS -->

    <div class="col-lg-8">

          <div class="cart-title d-flex mb-3">
                    <h5>Shopping Cart</h5>
                <span class="ms-auto">{{ count($cartItems) }} Items</span>
            </div>
            <hr>

        <div class=" d-none d-md-block  ptb-30 beb" data-animate="animate__fadeIn">
        <div class="container">
        <div class="row justify-content-start align-item-start">
        <div class="col-md-5 heading-color heading-weight">Product</div>
         <div class="col-md-3 heading-color heading-weight">Qty</div>
        <div class="col-md-2 heading-color heading-weight">Total</div>
        <div class="col-md-2 heading-color heading-weight text-end">Option</div>
        </div>
        </div>
    </div>

        <div class="cart-box">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @forelse($cartItems as $item)
                <div class="cart-item">
                    
                    <!-- IMAGE -->
                    <div class="cart-img">
                        <img 
                          src="{{ $item->img_path ? asset('storage/colors/'.$item->img_path) : asset('assets/no-image.png') }}"
                          alt="{{ $item->img_alt_text ?? $item->p_name }}">
                    </div>

                    <!-- INFO -->
                    <div class="cart-info">
                        <h6>{{ $item->p_name }}</h6>
                        <small>
                            Size: {{ $item->size_name }} <br>
                            Color: {{ $item->color_name }}
                        </small>
                     <div class="price">
                    ₹{{ number_format($item->p_price, 2, '.', ',') }}
                </div>
                    </div>

                    {{-- quantity --}}
                   <div class="mb-4 ms-4 col-md-3">
    <div class="d-inline-flex align-items-center border rounded px-2">
        <button type="button" class="btn btn-sm qty-minus">−</button>
        <input type="text" id="qtyInput" value="1" readonly style="width:50px;text-align:center;border:none" >
        <button type="button" class="btn btn-sm qty-plus">+</button>
        </div>
    </div>

                      {{-- total --}}
                      <div class="ms-5">
                       <strong>₹{{ number_format($item->p_price,2) }}</strong>
                      </div>
                    <!-- remove -->
                    <div class="cart-action">
                     

                        <form method="POST" action="{{ route('cart.remove', $item->cart_id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="remove-btn">
                                <i class="ri-close-large-line"></i>
                            </button>
                        </form>
                    </div>

                </div>
            @empty
                <div class="alert alert-info text-center">Your cart is empty</div>
            @endforelse

            <div class="d-flex justify-content-between mt-4">
                <a href="/" class="btn btn-outline-secondary">Continue shopping</a>
                <a href="#" class="btn btn-outline-danger">Clear cart</a>
            </div>

        </div>
    </div>

    <!-- RIGHT : CHECKOUT / SUMMARY -->
    <div class="col-lg-4">
        <div class="summary-box sticky-top">

            <h5 class="mb-3">Order Summary</h5>

            <div class="summary-row">
                <span>Subtotal</span>
                <span>₹{{ number_format($subtotal ?? 0) }}</span>
            </div>

            <div class="summary-row text-danger">
                <span>Discount</span>
                <span>- ₹{{ number_format($discount ?? 0) }}</span>
            </div>

            <div class="summary-row">
                <span>Shipping</span>
                <span class="text-success">Free</span>
            </div>

            <hr>

            <div class="summary-row total">
                <span>Total</span>
                <span>₹{{ number_format($total ?? 0) }}</span>
            </div>
            
                  <small class="d-block text-center mt-2">
                Taxes calculated at checkout
            </small>
            
            <a href="{{ route('cart') }}" class="btn btn-dark w-100 mt-3">
                Proceed to Checkout
            </a>

      

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
      

