 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>frontend-header</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">


 </head>
    
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<body>

       <style>
                .modal-content {
                border: 3px solid orangered;
                }
                input{
                    border: 1px solid orangered;
                }
                .bi-box-arrow-right{
                    margin-left:60px;
                    color:orangered;
                }
                .form-control1{
                    
                }
              
.password-wrapper {
    position: relative;
    width: 100%;
}

.password-input {
    width: 100%;
    padding: 12px 45px 12px 15px;
    border: 1px solid #ced4da;
    border-radius: 6px;
    font-size: 16px;
    outline: none;
}

.password-input:focus {
    border-color: #6f42c1;
    box-shadow: 0 0 0 2px rgba(111,66,193,0.15);
}

.toggle-password {
    position: absolute;
    top: 50%;
    right: 15px;
    transform: translateY(-50%);
    cursor: pointer;
    color: #6c757d;
}

.toggle-password i {
    font-size: 1.1rem;
}


.notification-badge {
    position: absolute;
    top: -5px;
    right: -8px;
    background: red;
    color: #fff;
    font-size: 11px;
    padding: 2px 6px;
    border-radius: 50%;
}

.notification-dropdown {
    display: none;
    position: absolute;
    right: 0;
    top: 35px;
    width: 320px;
    background: #fff;
    border: 1px solid #eee;
    box-shadow: 0 5px 15px rgba(0,0,0,.15);
    z-index: 999;
}

.notification-dropdown .dropdown-item {
    padding: 10px;
    border-bottom: 1px solid #f1f1f1;
    text-decoration: none;
    color: #000;
}

.notification-dropdown .dropdown-item.unread {
    background: #f0f8ff;
}

.notification-dropdown p {
    margin: 0;
    font-size: 13px;
    color: #555;
}

.dropdown-header,
.dropdown-footer {
    padding: 10px;
    font-weight: bold;
    text-align: center;
}
.notification-bell-wrapper {
    position: relative;
}

.notification-dropdown {
    display: none;
    position: absolute;
    top: 35px;
    right: 0;
    width: 320px;
    background: #fff;
    border: 1px solid #eee;
    box-shadow: 0 5px 15px rgba(0,0,0,.15);
    z-index: 999;
}

.notification-bell-wrapper:hover .notification-dropdown {
    display: block;
}



        </style>


<!-- header start -->
        <header id="header" class="main-header">
            <!-- header-top start -->
            <div class="header-top-area">
                <!-- notification-bar start -->
                <div class="notification-bar ptb-11 primary-bg">
                    <div class="container-fluid d-none d-xl-block">
                        <div class="row">
                            <div class="col-xl-3">
                                <span class="d-inline-block extra-color">Order online : <a href="tel:(+00)123456789" class="d-inline-block extra-color">(+00)-123456789</a></span>
                            </div>
                            <div class="col-xl-6 text-center">
                                <div class="d-flex flex-wrap">
                                    <div class="width-16">
                                        <div class="swiper-buttons">
                                            <button type="button" class="swiper-prev swiper-prev-notification extra-color icon-16" aria-label="Arrow previous"><i class="ri-arrow-left-line d-block lh-1"></i></button>
                                        </div>
                                    </div>
                                    <div class="width-calc-32 plr-15 text-center">
                                        <div class="notification-slider swiper" id="notification-slider">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="text-white">Worldwide shipping + free return for above $78.00</div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="text-white">Fast delivery & hassle-free returns</div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="text-white">Easy exchanges + global delivery</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="width-16">
                                        <div class="swiper-buttons">
                                            <button type="button" class="swiper-next swiper-next-notification extra-color icon-16" aria-label="Arrow next"><i class="ri-arrow-right-line d-block lh-1"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 text-end">
                                <span class="d-inline-block extra-color">Email now : <a href="mailto:demo@demo.com" class="d-inline-block extra-color">demo@demo.com</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="notification-marquee d-flex d-xl-none overflow-hidden">
                        <div class="notification-marquee-row d-flex">
                            <div class="extra-color per-15 text-nowrap">Order online : <a href="tel:(+00)123456789" class="d-inline-block extra-color">(+00)-123456789</a></div>
                            <div class="extra-color per-15 text-nowrap">Worldwide shipping + free return for above $78.00</div>
                            <div class="extra-color per-15 text-nowrap">Fast delivery & hassle-free returns</div>
                            <div class="extra-color per-15 text-nowrap">Easy exchanges + global delivery</div>
                            <div class="extra-color per-15 text-nowrap">Email now : <a href="mailto:demo@demo.com" class="d-inline-block extra-color">(+00)-123456789</a></div>
                        </div>
                        <div class="notification-marquee-row d-flex">
                            <div class="extra-color per-15 text-nowrap">Order online : <a href="tel:(+00)123456789" class="d-inline-block extra-color">(+00)-123456789</a></div>
                            <div class="extra-color per-15 text-nowrap">Worldwide shipping + free return for above $78.00</div>
                            <div class="extra-color per-15 text-nowrap">Fast delivery & hassle-free returns</div>
                            <div class="extra-color per-15 text-nowrap">Easy exchanges + global delivery</div>
                            <div class="extra-color per-15 text-nowrap">Email now : <a href="mailto:demo@demo.com" class="d-inline-block extra-color">(+00)-123456789</a></div>
                        </div>
                    </div>
                </div>
                <!-- notification-bar end -->
                <!-- header-top-first start -->
                <div class="header-top-first ptb-10 position-relative body-bg">
                    <div class="container-fluid">
                        <div class="row align-items-center header-area">
                            <!-- header-logo start -->
                         <div class="col-6 col-xl-2 header-element header-logo">
                                <a href="{{ url('/') }}"> <div class="header-theme-logo">
                                 <img src="{{ asset('assetsofdash/images/Red and Black Modern Creative Agency Logo-old.png') }}" class="rounded-1" width="150px" height="60px">
                                </div></a>
                            </div>
                            <!-- header-logo end -->
                            <!-- header-menu start -->
                            <div class="col-xl-6 col-xxl-5 d-none d-xl-block header-element header-menu">
                                <div class="mainmenu-content">
                                    <div class="main-wrap">
                                        <ul class="menu-ul d-flex flex-wrap">
                                            <li class="menu-li">
                                                <a href="{{ url('/') }}" class="menu-link d-flex align-items-center ptb-5 plr-15">
                                                    <span class="menu-title text-uppercase heading-weight">Home</span>
                                                    <span class="icon-16 fw-normal"><i class="ri-arrow-down-s-line d-block lh-1"></i></span>
                                                </a>
                                                <div class="menu-dropdown collapse position-absolute top-auto start-0 end-0 body-bg z-2 DropDownSlide box-shadow">
                                                 <div class="container ptb-30 text-center">
                                                        <div class="row">
                                                            <div class="col-xl-2">
                                                                <div class="banner-hover">
                                                                    <a href="index.html" class="d-block banner-img br-hidden">
                                                                        <img src="assets/image/menu/menu-banner1.jpg" class="w-100 img-fluid" alt="menu-banner1">
                                                                    </a>
                                                                </div>
                                                                <a href="index.html" class="d-inline-block primary-link mst-15 heading-weight">01 Classic fashion</a>
                                                            </div>
                                                            <div class="col-xl-2">
                                                                <div class="banner-hover">
                                                                    <a href="index2.html" class="d-block banner-img br-hidden">
                                                                        <img src="assets/image/menu/menu-banner2.jpg" class="w-100 img-fluid" alt="menu-banner2">
                                                                    </a>
                                                                </div>
                                                                <a href="index2.html" class="d-inline-block primary-link mst-15 heading-weight">02 Modern fashion</a>
                                                            </div>
                                                            <div class="col-xl-2">
                                                                <div class="banner-hover">
                                                                    <a href="index3.html" class="d-block banner-img br-hidden">
                                                                        <img src="assets/image/menu/menu-banner3.jpg" class="w-100 img-fluid" alt="menu-banner3">
                                                                    </a>
                                                                </div>
                                                                <a href="index3.html" class="d-inline-block primary-link mst-15 heading-weight">03 Elegant boutique</a>
                                                            </div>
                                                            <div class="col-xl-2">
                                                                <div class="banner-hover">
                                                                    <a href="index4.html" class="d-block banner-img br-hidden">
                                                                        <img src="assets/image/menu/menu-banner4.jpg" class="w-100 img-fluid" alt="menu-banner4">
                                                                    </a>
                                                                </div>
                                                                <a href="index4.html" class="d-inline-block primary-link mst-15 heading-weight">04 Minimal clothing</a>
                                                            </div>
                                                            <div class="col-xl-2">
                                                                <div class="banner-hover">
                                                                    <a href="index5.html" class="d-block banner-img br-hidden">
                                                                        <img src="assets/image/menu/menu-banner5.jpg" class="w-100 img-fluid" alt="menu-banner5">
                                                                    </a>
                                                                </div>
                                                                <a href="index5.html" class="d-inline-block primary-link mst-15 heading-weight">05 Lifestyle & Support</a>
                                                            </div>
                                                            <div class="col-xl-2">
                                                                <div class="banner-hover">
                                                                    <a href="index6.html" class="d-block banner-img br-hidden">
                                                                        <img src="assets/image/menu/menu-banner6.jpg" class="w-100 img-fluid" alt="menu-banner6">
                                                                    </a>
                                                                </div>
                                                                <a href="index5.html" class="d-inline-block primary-link mst-15 heading-weight">06 Visual fashion</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="menu-li">
                                                <a href="/" class="menu-link d-flex align-items-center ptb-5 plr-15">
                                                    <span class="menu-title text-uppercase heading-weight">Product</span>
                                                    <span class="icon-16 fw-normal"><i class="ri-arrow-down-s-line d-block lh-1"></i></span>
                                                </a>
                                                <div class="menu-dropdown collapse position-absolute top-auto start-0 end-0 body-bg z-2 DropDownSlide box-shadow">
                                                    <div class="container ptb-25">
                                                        <div class="row">

                                                            <div class="col-4">
                                                           <a href="{{ route('Menmaincategorycollection') }}">
                                                           <div class="d-block heading-color ptb-5 heading-weight">MEN CATEGORY</div></a>
                                                                <div class="mst-11">
                                                                    <span class="d-block ptb-5"><a href="{{ route('menshirtcollection') }}" class="d-inline-block body-primary-color"> 01 shirts collections</a></span>
                                                                    <span class="d-block ptb-5"><a href="{{ route('menformalpantscollection')}}" class="d-inline-block body-primary-color">02 Formal pants & Jeans</a></span>
                                                                    <span class="d-block ptb-5"><a href="{{ route('menshoescollection')}}" class="d-inline-block body-primary-color">03 Shoes collection for men & boys</a></span>

                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                               <a href="{{ route('Womenmaincategorycollection')}}">
                                                     <div class="d-block heading-color ptb-5 heading-weight">WOMEN CATEGORY</div></a>
                                                                <div class="mst-11">
                                                                    <span class="d-block ptb-5"><a href="{{ route('womenkurtiscollection') }}" class="d-inline-block body-primary-color">01 Kurti's collection</a></span>
                                                                    <span class="d-block ptb-5"><a href="{{ route('womentops/t-shirtscollection')}}" class="d-inline-block body-primary-color">02 Tops & T-Shirts collection</a></span>
                                                                    <span class="d-block ptb-5"><a href="{{ route('womenjeanscollection')}}" class="d-inline-block body-primary-color">03 Jeans / Jeggings collection</a></span>

                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                               <a href="{{ route('Kidsmaincategorycollection')}}"> <div class="d-block heading-color ptb-5 heading-weight">KIDS CATEGORY</div></a>
                                                                <div class="mst-11">
                                                                    <span class="d-block ptb-5"><a href="{{ route('kidstoyscollection1') }}" class="d-inline-block body-primary-color">01 Toys & Games</a></span>
                                                                    <span class="d-block ptb-5"><a href="{{ route('kidsclothescollection2') }}" class="d-inline-block body-primary-color">02 Kids Clothing</a></span>
                                                                    <span class="d-block ptb-5"><a href="{{ route('kidsAccessoriescollection3') }}" class="d-inline-block body-primary-color">03 kids Accessories	</a></span>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="menu-li">
                                                <a href="collection.html" class="menu-link d-flex align-items-center ptb-5 plr-15">
                                                    <span class="menu-title text-uppercase heading-weight">Shop</span>
                                                    <span class="icon-16 fw-normal"><i class="ri-arrow-down-s-line d-block lh-1"></i></span>
                                                </a>
                                                <div class="menu-dropdown menu-mega collapse position-absolute top-auto start-0 end-0 body-bg z-2 DropDownSlide box-shadow">
                                                    <div class="container ptb-25">
                                                        <div class="menu-overview">
                                                            <div class="heading-color ptb-5 heading-weight">Account</div>
                                                            <span class="d-block ptb-5"><a href="login.html" class="d-inline-block body-primary-color">Login</a></span>
                                                            <span class="d-block ptb-5"><a href="forgot-password.html" class="d-inline-block body-primary-color">Forgot password</a></span>
                                                            <span class="d-block ptb-5"><a href="register.html" class="d-inline-block body-primary-color">Register</a></span>
                                                            <div class="heading-color ptb-5 heading-weight">Other</div>
                                                            <span class="d-block ptb-5"><a href="404.html" class="d-inline-block body-primary-color">404</a></span>
                                                            <span class="d-block ptb-5"><a href="cart-empty.html" class="d-inline-block body-primary-color">Cart empty</a></span>
                                                            <span class="d-block ptb-5"><a href="cart-page.html" class="d-inline-block body-primary-color">Cart</a></span>
                                                            <span class="d-block ptb-5"><a href="checkout.html" class="d-inline-block body-primary-color">Checkout</a></span>
                                                            <span class="d-block ptb-5"><a href="coming-soon.html" class="d-inline-block body-primary-color">Comingsoon</a></span>
                                                            <span class="d-block ptb-5"><a href="invoice.html" class="d-inline-block body-primary-color">Invoice</a></span>
                                                            <div class="heading-color ptb-5 heading-weight">Order</div>
                                                            <span class="d-block ptb-5"><a href="order-complete.html" class="d-inline-block body-primary-color">Order complete</a></span>
                                                            <span class="d-block ptb-5"><a href="order.html" class="d-inline-block body-primary-color">Order</a></span>
                                                            <span class="d-block ptb-5"><a href="order-info.html" class="d-inline-block body-primary-color">Order info</a></span>
                                                            <span class="d-block ptb-5"><a href="order-info-default.html" class="d-inline-block body-primary-color">Order default</a></span>
                                                            <span class="d-block ptb-5"><a href="order-info-unfulfilled.html" class="d-inline-block body-primary-color">Order unfulfilled</a></span>
                                                            <span class="d-block ptb-5"><a href="order-info-fulfilled.html" class="d-inline-block body-primary-color">Order fulfilled</a></span>
                                                            <span class="d-block ptb-5"><a href="order-info-inprogress.html" class="d-inline-block body-primary-color">Order inprogress</a></span>
                                                            <span class="d-block ptb-5"><a href="order-info-intransit.html" class="d-inline-block body-primary-color">Order intransit</a></span>
                                                            <span class="d-block ptb-5"><a href="order-info-indelivery.html" class="d-inline-block body-primary-color">Order indelivery</a></span>
                                                            <span class="d-block ptb-5"><a href="order-info-delivered.html" class="d-inline-block body-primary-color">Order delivered</a></span>
                                                            <span class="d-block ptb-5"><a href="order-info-pickup.html" class="d-inline-block body-primary-color">Order pickup</a></span>
                                                            <span class="d-block ptb-5"><a href="order-info-cancel.html" class="d-inline-block body-primary-color">Order cancel</a></span>
                                                            <div class="heading-color ptb-5 heading-weight">Profile</div>
                                                            <span class="d-block ptb-5"><a href="profile.html" class="d-inline-block body-primary-color">Profile</a></span>
                                                            <span class="d-block ptb-5"><a href="profile-address.html" class="d-inline-block body-primary-color">Profile address</a></span>
                                                            <span class="d-block ptb-5"><a href="profile-notification.html" class="d-inline-block body-primary-color">Profile notification</a></span>
                                                            <span class="d-block ptb-5"><a href="profile-order.html" class="d-inline-block body-primary-color">Profile order</a></span>
                                                            <span class="d-block ptb-5"><a href="profile-order-empty.html" class="d-inline-block body-primary-color">Profile order empty</a></span>
                                                            <span class="d-block ptb-5"><a href="profile-ticket.html" class="d-inline-block body-primary-color">Profile ticket</a></span>
                                                            <span class="d-block ptb-5"><a href="profile-ticket-empty.html" class="d-inline-block body-primary-color">Profile ticket empty</a></span>
                                                            <span class="d-block ptb-5"><a href="profile-wishlist.html" class="d-inline-block body-primary-color">Profile wishlist</a></span>
                                                            <span class="d-block ptb-5"><a href="profile-wishlist-empty.html" class="d-inline-block body-primary-color">Profile wishlist empty</a></span>
                                                            <div class="heading-color ptb-5 heading-weight">Ticket</div>
                                                            <span class="d-block ptb-5"><a href="ticket.html" class="d-inline-block body-primary-color">Ticket</a></span>
                                                            <span class="d-block ptb-5"><a href="ticket-create.html" class="d-inline-block body-primary-color">Ticket create</a></span>
                                                            <span class="d-block ptb-5"><a href="ticket-edit.html" class="d-inline-block body-primary-color">Ticket edit</a></span>
                                                            <span class="d-block ptb-5"><a href="ticket-info.html" class="d-inline-block body-primary-color">Ticket info</a></span>
                                                            <div class="heading-color ptb-5 heading-weight">Policies</div>
                                                            <span class="d-block ptb-5"><a href="cancellation.html" class="d-inline-block body-primary-color">Cancellation</a></span>
                                                            <span class="d-block ptb-5"><a href="cookie.html" class="d-inline-block body-primary-color">Cookie</a></span>
                                                            <span class="d-block ptb-5"><a href="legal.html" class="d-inline-block body-primary-color">Legal</a></span>
                                                            <span class="d-block ptb-5"><a href="payment-policy.html" class="d-inline-block body-primary-color">Payment policy</a></span>
                                                            <span class="d-block ptb-5"><a href="privacy-policy.html" class="d-inline-block body-primary-color">Privacy policy</a></span>
                                                            <span class="d-block ptb-5"><a href="return-policy.html" class="d-inline-block body-primary-color">Return policy</a></span>
                                                            <span class="d-block ptb-5"><a href="shipping-policy.html" class="d-inline-block body-primary-color">Shipping policy</a></span>
                                                            <span class="d-block ptb-5"><a href="terms-condition.html" class="d-inline-block body-primary-color">Terms & condition</a></span>
                                                            <div class="heading-color ptb-5 heading-weight">Features</div>
                                                            <span class="d-block ptb-5"><a href="button.html" class="d-inline-block body-primary-color">Button</a></span>
                                                            <span class="d-block ptb-5"><a href="cart-drawer-empty.html" class="d-inline-block body-primary-color">Cart drawer empty</a></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="menu-li">
                                                <a href="blog.html" class="menu-link d-flex align-items-center ptb-5 plr-15">
                                                    <span class="menu-title text-uppercase heading-weight">Blog</span>
                                                    <span class="icon-16 fw-normal"><i class="ri-arrow-down-s-line d-block lh-1"></i></span>
                                                </a>
                                                <div class="menu-dropdown menu-sub collapse position-absolute top-auto body-bg z-2 DropDownSlide box-shadow">
                                                    <ul class="menudrop-ul ptb-25">
                                                        <li class="menudrop-li">
                                                            <div class="ptb-5 plr-30"><a href="blog-without.html" class="d-inline-block body-primary-color">Blog</a></div>
                                                        </li>
                                                        <li class="menudrop-li">
                                                            <div class="ptb-5 plr-30"><a href="blog.html" class="d-inline-block body-primary-color">Blog left</a></div>
                                                        </li>
                                                        <li class="menudrop-li">
                                                            <div class="ptb-5 plr-30"><a href="blog-right.html" class="d-inline-block body-primary-color">Blog right</a></div>
                                                        </li>
                                                        <li class="menudrop-li">
                                                            <div class="ptb-5 plr-30"><a href="article-without.html" class="d-inline-block body-primary-color">Article</a></div>
                                                        </li>
                                                        <li class="menudrop-li">
                                                            <div class="ptb-5 plr-30"><a href="article.html" class="d-inline-block body-primary-color">Article left</a></div>
                                                        </li>
                                                        <li class="menudrop-li">
                                                            <div class="ptb-5 plr-30"><a href="article-right.html" class="d-inline-block body-primary-color">Article right</a></div>
                                                        </li>
                                                        <li class="menudrop-li">
                                                            <div class="ptb-5 plr-30"><a href="search-blog.html" class="d-inline-block body-primary-color">Search blog</a></div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="menu-li">
                                                <a href="javascript:void(0)" class="menu-link d-flex align-items-center ptb-5 plr-15">
                                                    <span class="menu-title text-uppercase heading-weight">signup</span>
                                                    <span class="icon-16 fw-normal"><i class="ri-arrow-down-s-line d-block lh-1"></i></span>
                                                </a>
                                                <div class="menu-dropdown menu-sub collapse position-absolute top-auto body-bg z-2 DropDownSlide box-shadow">
                                                    <ul class="menudrop-ul ptb-25">
                                                        <li class="menudrop-li position-relative">
                                                            <div class="menu-sublink ptb-5 plr-30">
                                                                <a href="{{ route('courierboy.signup') }}" class="d-flex flex-wrap align-items-center">
                                                                    <span class="menusub-title width-calc-16">courierboysignup</span>
                                                                    <span class="width-16 icon-16 fw-normal"><i class="ri-arrow-right-s-line d-block lh-1"></i></span>
                                                                </a>
                                                            </div>
                                                        
                                                        </li>
                                                        <li class="menudrop-li position-relative">
                                                            <div class="menu-sublink ptb-5 plr-30">
                                                                <a href="{{ route('courier.login') }}" class="d-flex flex-wrap align-items-center">
                                                                    <span class="menusub-title width-calc-16">Courierlogin</span>
                                                                    <span class="width-16 icon-16 fw-normal"><i class="ri-arrow-right-s-line d-block lh-1"></i></span>
                                                                </a>
                                                            </div>
                                                            <div class="menusub-dropdown collapse position-absolute w-100 body-bg DropDownSlide box-shadow">
                                                                <ul class="menusub-ul ptb-25">
                                                                    <li class="menusub-li">
                                                                        <span class="d-block ptb-5 plr-30"><a href="contact-us.html" class="d-inline-block body-primary-color">01 Creative contactus</a></span>
                                                                    </li>
                                                                    <li class="menusub-li">
                                                                        <span class="d-block ptb-5 plr-30"><a href="contact-us2.html" class="d-inline-block body-primary-color">02 Standard contactus</a></span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li class="menudrop-li position-relative">
                                                            <div class="menu-sublink ptb-5 plr-30"><a href="faqs.html" class="d-block">Faqs</a></div>
                                                        </li>
                                                        <li class="menudrop-li position-relative">
                                                            <div class="menu-sublink ptb-5 plr-30"><a href="sitemap.html" class="d-block">Sitemap</a></div>
                                                        </li>
                                                        <li class="menudrop-li position-relative">
                                                            <div class="menu-sublink ptb-5 plr-30"><a href="store.html" class="d-block">Store</a></div>
                                                        </li>
                                                        <li class="menudrop-li position-relative">
                                                            <div class="menu-sublink ptb-5 plr-30"><a href="track-order.html" class="d-block">Track order</a></div>
                                                        </li>
                                                        <li class="menudrop-li position-relative">
                                                            <div class="menu-sublink ptb-5 plr-30">
                                                                <a href="wishlist.html" class="d-flex flex-wrap align-items-center">
                                                                    <span class="menusub-title width-calc-16">Wishlist</span>
                                                                    <span class="width-16 icon-16 fw-normal"><i class="ri-arrow-right-s-line d-block lh-1"></i></span>
                                                                </a>
                                                            </div>
                                                            <div class="menusub-dropdown collapse position-absolute w-100 body-bg DropDownSlide box-shadow">
                                                                <ul class="menusub-ul ptb-25">
                                                                    <li class="menusub-li">
                                                                        <span class="d-block ptb-5 plr-30"><a href="wishlist.html" class="d-inline-block body-primary-color">Wishlist</a></span>
                                                                    </li>
                                                                    <li class="menusub-li">
                                                                        <span class="d-block ptb-5 plr-30"><a href="wishlist-empty.html" class="d-inline-block body-primary-color">Wishlist empty</a></span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            {{-- myorderli --}}
                                            @auth
<li class="menu-li">
    <a href="javascript:void(0)" class="menu-link d-flex align-items-center ptb-5 plr-15">
        <span class="menu-title text-uppercase heading-weight">Orders</span>
        <span class="icon-16 fw-normal"><i class="ri-arrow-down-s-line d-block lh-1"></i></span>
    </a>
    <div class="menu-dropdown menu-sub collapse position-absolute top-auto body-bg z-2 DropDownSlide box-shadow">
        <ul class="menudrop-ul ptb-25">
            @if($order)
                <li class="menudrop-li position-relative">
                    <div class="menu-sublink ptb-5 plr-30">
                        <a href="{{ route('my.order', ['orderId' => $order->o_id]) }}" class="d-flex flex-wrap align-items-center">
                            <span class="menusub-title width-calc-16">My order</span>
                            <span class="width-16 icon-16 fw-normal"><i class="ri-arrow-right-s-line d-block lh-1"></i></span>
                        </a>
                    </div>
                </li>
            @else
                <li class="menudrop-li position-relative">
                    <div class="menu-sublink ptb-5 plr-30">
                        <span class="menusub-title width-calc-16 text-muted">No orders yet</span>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</li>
@endauth


                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- header-menu end -->
                            <!-- header-icon start -->
                            <div class="col-6 col-xl-4 col-xxl-5 header-element header-icon">
                                <div class="header-icon-block d-flex justify-content-end">
                                    <!-- header-search start -->
                                    <div class="header-search w-100 d-none d-xxl-block per-15">
                                        <div class="header-theme-search w-100">
                                         {{-- <form class="search-form w-100" onsubmit="return false;">
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
                                        </form> --}}
                                        </div>
                                    </div>


                                    <!-- header-search end -->
                                    <ul class="ul-mt15 flex-nowrap align-items-center header-icon-element">
                                        <li class="header-icon-wrap toggler-wrap d-xl-none">
                                            <div class="header-icon-wrapper">
                                                <a href="javascript:void(0)" class="d-block header-icon-toggler toggler-btn" aria-label="Menu toggler button">
                                                    <span class="d-block header-block-icon primary-link font-16 font-xl-20"><i class="ri-menu-line"></i></span>
                                                </a>
                                            </div>
                                        </li>

                                        {{-- notification start  --}}

   @auth
<li class="header-icon-wrap wishlist-wrap position-relative">
    <a href="javascript:void(0)" id="notificationBell">
          <span class="d-block header-block-icon primary-link font-16 font-xl-20 fw-bold">
            <i class="bi bi-bell"></i>
           </span>

        @if(auth()->user()->unreadNotifications->count() > 0)
            <span class="notification-badge">
                {{ auth()->user()->unreadNotifications->count() }}
            </span>
        @endif
    </a>

    <!-- 🔔 Dropdown -->
    <div class="notification-dropdown" id="notificationDropdown">
        <div class="dropdown-header">
            Notifications
        </div>

        @forelse(auth()->user()->unreadNotifications->take(5) as $notification)
            <a href="{{ route('notifications.index', $notification->id) }}"
               class="dropdown-item unread">
                <strong>{{ $notification->data['title'] }}</strong>
                <p>{{ $notification->data['message'] }}</p>
            </a>
        @empty
            <div class="dropdown-item text-center text-muted">
                No new notifications
            </div>
        @endforelse

        <div class="dropdown-footer">
            <a href="{{ route('notifications.index') }}">View all</a>
        </div>
    </div>
</li>
@endauth

{{-- notification end here --}}

                                        <li class="header-icon-wrap search-wrap ">
                                            <div class="header-icon-wrapper">
                                                <a href="#searchmodal" class="d-block header-icon-search" data-bs-toggle="modal" aria-label="Search modal">
                                                    <span class="d-block header-block-icon primary-link font-16 font-xl-20"><i class="ri-search-line"></i></span>
                                                </a>
                                            </div>
                                        </li>

                                        
                                        <li class="header-icon-wrap user-wrap d-md-block d-none">
                                         <div class="header-icon-wrapper">
                                                @auth
                                                    {{-- LOGGED IN USER --}}
                                                    <div class="dropdown d-flex ">
                                                        <a href="#"
                                                        class="d-flex header-icon-user"
                                                        data-bs-toggle="dropdown"
                                                        aria-expanded="false">

                                                            <span class="d-block header-block-icon primary-link font-16 font-xl-20">
                                                                <i class="ri-user-line"></i>
                                                            </span>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li class="dropdown-item-text fw-semibold">
                                                                {{ Auth::user()->name }}
                                                            </li>

                                                            <li><hr class="dropdown-divider"></li>

                                                            <li>
                                                                <form id="logoutForm">
                                                                    @csrf
                                                                    <button type="submit" class="dropdown-item text-secondary">
                                                                        Logout <i class="bi bi-box-arrow-right"></i>
                                                                    </button>
                                                                </form>

                                                            </li>
                                                        </ul>
                                                    </div>
                                                @endauth


                                                @guest
                                                    {{-- GUEST USER --}}
                                                    <a href="javascript:void(0)"
                                                    class="d-block header-icon-user"
                                                    aria-label="Login user"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#loginModal">

                                                        <span class="d-block header-block-icon primary-link font-16 font-xl-20">
                                                            <i class="ri-user-line"></i>
                                                        </span>
                                                    </a>
                                                @endguest
                                            </div>

                                        </li>
                                        <li class="header-icon-wrap wishlist-wrap d-md-block d-none">
                                            <div class="header-icon-wrapper">
                                             <a href="{{ route('wishlist.index') }}"
                                                 class="d-block header-icon-wishlist" id="wishlistBtn">
                                                    <span class="primary-link ul-mt5 flex-nowrap align-items-center">
                                                        <span class="d-block">
                                                            <span class="d-block header-block-icon-wrap position-relative per-8">
                                                                <span class="d-block header-block-icon font-16 font-xl-20"><i class="ri-heart-line"></i></span>
                                                                <span class="header-block-counter wishlist-counter extra-color font-10 position-absolute end-0 d-flex align-items-center justify-content-center primary-bg rounded-circle" id="wishlist-count">{{ $wishlistCount }}</span>
                                                                
                                                            </span>
                                                        </span>
                                                        <span class="d-none d-xl-block header-text-content text-uppercase text-nowrap heading-weight">Wishlist</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="header-icon-wrap cart-wrap d-md-block d-none">
                                            <div class="header-icon-wrapper">
                                              <a href="{{ route('cart') }}" 
                                            class="d-block header-icon-cart check-login"
                                            data-redirect="{{ route('cart') }}">

                                                    <span class="primary-link ul-mt5 flex-nowrap align-items-center">
                                                        <span class="d-block">
                                                            <span class="d-block header-block-icon-wrap position-relative per-8">
                                                                <span class="d-block header-block-icon font-16 font-xl-20"><i class="ri-shopping-bag-3-line"></i></span>
                                                            <span class="header-block-counter cart-counter extra-color font-10 position-absolute end-0 d-flex align-items-center justify-content-center primary-bg rounded-circle" id="cart-count">{{ $cartCount }}</span>

                                                                 
                                                            </span>
                                                        </span>
                                                        <span class="d-none d-xl-block header-text-content text-uppercase text-nowrap heading-weight">Cart</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- header-icon end -->

   

                        </div>
                    </div>
                </div>
                <!-- header-top-first end -->
            </div>
            <!-- header-top end -->
        </header>
        <!-- header end -->


        {{-- start login form/popup --}}


           <!-- Login Modal -->

<div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
<form id="loginForm">
    @csrf
    <input type="hidden" name="redirect" value="{{ url()->current() }}">

      <div class="modal-content p-3">
            <div class="d-flex text-center justify-content-center">
           <img src="{{ asset('assetsofdash/images/Red and Black Modern Creative Agency Logo-old.png') }}" class="rounded-1 text-center" width="200px" height="80px">
              </div>
        <div class="modal-header text-center justify-content-center">
          <h5 class="modal-title text-warnings fs-3 fw-bold text-center">Login</h5>
          <button type="button" class="btn-close text-warning" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <label for="" class="mt-2">Enter your Email</label> <br>
          <input type="text" class="password-input mt-3" name="email" placeholder="email"/><br><br>
          <label for="" class="mt-2">Enter your password</label><br>

          <div class="password-wrapper mb-3 mt-3">
    <input 
        type="password" 
        name="password" 
        id="signinPassword"
        class="password-input"
        placeholder="Enter your password" >

    <span class="toggle-password" data-target="signinPassword">
        <i class="bi bi-eye-slash"></i>
    </span>
</div>

<p id="errorMsg" style="color:red;"></p>

        </div>
        
        <div class="text-center justify-content-center flex-column">
          <button class="btn btn-dark w-75 text-center" type="submit">Login</button>
        </div>
        <hr>
        <div class="text-center justify-content-center flex-column md-3">
          <h6 class="font-18">Don't have an account? <a href="javascript:void(0);" id="openSignup" class="text-secondary">  Create Account </a></h6>
      
           
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Signup Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="signupForm" id="registerForm" action="{{ route('signup') }}" method="POST" >
      @csrf
      <div class="modal-content p-3">
        <div class="d-flex text-center justify-content-center">
           <img src="{{ asset('assetsofdash/images/Red and Black Modern Creative Agency Logo-old.png') }}" class="rounded-1 text-center" width="200px" height="80px">
              </div>
        <div class="modal-header justify-content-center">
          <h5 class="modal-title">Sign Up</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <label>Name</label>
          <input type="text" name="name" class="password-input mt-3" placeholder="Enter your name" > <br><br>
          <label>Email</label><br>
          <input type="email" name="email" class="password-input mt-3" placeholder="Enter your email"><br><br>
            <label>Mobile Number</label>
          <input type="number" name="phone" class="password-input mt-3" placeholder="Enter your number"><br><br>
          <label>Password</label>
       <div class="input-group mb-3 mt-3">
         <input 
        type="password" 
        name="password" 
        id="signupPassword"
        class="password-input"
        placeholder="Enter your password"><br><br>
    <span class="input-group-text bg-white toggle-password" data-target="signupPassword">
        <i class="bi bi-eye-slash"></i>
    </span>
        </div>
          <div class="form-check mb-2 d-flex align-items-center">
            <input class="fs-3" type="checkbox" id="terms">
            <label class="form-check-label ms-3">I agree to the <a href="terms-condition.html">terms & guidelines</a></label>
          </div>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-dark w-75">Signup</button>
        </div>
        <hr>
         <div class="text-center justify-content-center flex-column mb-3">
          <h6 class="font-18">You have an account<a href="javascript:void(0);" id="openLogin" class="text-secondary"> signin  </a></h6>
        </div>
      </div>
    </form>
  </div>
</div>





<!-- starting scripts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


{{-- logout script --}}
<script>
$('#logoutForm').on('submit', function(e){
    e.preventDefault();

    $.ajax({
        url: "{{ route('logout') }}",
        type: "POST",
        data: $(this).serialize(),

        success: function(res){
            Swal.fire({
                icon: 'success',
                title: 'Logged Out',
                text: res.message,
                timer: 1200,
                showConfirmButton: false
            }).then(() => {
                window.location.href = "/";
            });
        },

        error: function(){
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: 'Logout failed, try again'
            });
        }
    });
});
</script>


{{-- login sscript --}}
<script>
$(document).on('submit', '#loginForm', function(e){
    e.preventDefault();

    $.ajax({
        url: "{{ route('signin.submit') }}",
        type: "POST",
        data: $(this).serialize(),

        success: function(res){

            Swal.fire({
                icon: 'success',
                title: 'Login Successful',
                text: res.message || 'Welcome back!',
                timer: 1500,
                showConfirmButton: false
            }).then(() => {

                $('#loginModal').modal('hide');

                if(res.role === 'admin'){
                    window.location.href = "{{ route('admin.dashboard') }}";
                }else{
                           window.location.reload(); 
                }
            });
        },

        error: function(xhr){
            Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                text: xhr.responseJSON?.message || 'Invalid email or password',
            });
        }
    });
});
</script>







<script>
document.querySelectorAll('.check-login').forEach(link => {

    link.addEventListener('click', function (e) {

        @if(!Auth::check())
            e.preventDefault(); 

            Swal.fire({
                icon: 'warning',
                title: 'Login Required',
                text: 'Please login to continue',
                showCancelButton: true,
                confirmButtonText: 'Login',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#ff5722'
            }).then((result) => {
                if (result.isConfirmed) {
                 
                    const loginModal = bootstrap.Modal.getOrCreateInstance(
                        document.getElementById('loginModal')
                    );
                    loginModal.show();
                }
            });
        @endif

    });

});
</script>






{{-- password eyeicon hide and show --}}

<script>

document.addEventListener('DOMContentLoaded', function() {
    // Saare toggle buttons select karo
    const toggleButtons = document.querySelectorAll('.toggle-password');
    
    toggleButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Data-target attribute se password field ka ID lo
            const targetId = this.getAttribute('data-target');
            const passwordField = document.getElementById(targetId);
            const icon = this.querySelector('i');
            
            // Password show/hide toggle karo
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            }
        });
    });
});

</script>

 {{--end script  --}}

<!-- Login ↔ Signup Modal Switching -->
<script>
    const loginModalEl  = document.getElementById('loginModal');
    const signupModalEl = document.getElementById('signupModal');

    // Open Signup from Login
    document.getElementById('openSignup')?.addEventListener('click', () => {
        const loginModal = bootstrap.Modal.getInstance(loginModalEl) || bootstrap.Modal.getOrCreateInstance(loginModalEl);
        
        loginModalEl.addEventListener('hidden.bs.modal', () => {
            bootstrap.Modal.getOrCreateInstance(signupModalEl).show();
        }, { once: true });

        loginModal.hide();
    });

    // Open Login from Signup
    document.getElementById('openLogin')?.addEventListener('click', () => {
        const signupModal = bootstrap.Modal.getInstance(signupModalEl) || bootstrap.Modal.getOrCreateInstance(signupModalEl);
        
        signupModalEl.addEventListener('hidden.bs.modal', () => {
            bootstrap.Modal.getOrCreateInstance(loginModalEl).show();
        }, { once: true });

        signupModal.hide();
    });

    // Clean up modal backdrop & body scroll on any modal hide
    [loginModalEl, signupModalEl].forEach(modalEl => {
        if (!modalEl) return;
        modalEl.addEventListener('hidden.bs.modal', () => {
            document.body.classList.remove('modal-open');
            document.body.style.overflow = '';
            document.body.style.paddingRight = '';
            document.querySelectorAll('.modal-backdrop').forEach(b => b.remove());
        });
    });
</script>

<!-- Signup Form AJAX Submission -->
<script>
    document.getElementById('signupForm')?.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);

        fetch("{{ route('signup') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]')?.value || '',
                "Accept": "application/json"
            },
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            const signupModal = bootstrap.Modal.getInstance(signupModalEl) || bootstrap.Modal.getOrCreateInstance(signupModalEl);

            if (data.status) {
                signupModal.hide();
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: data.message || 'Registration successful!',
                    timer: 2500,
                    showConfirmButton: false
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: data.message || 'Signup failed!',
                });
            }
        })
        .catch(err => {
            console.error(err);
            Swal.fire({
                icon: 'error',
                title: 'Server Error',
                text: 'Please try again later.',
            });
        });
    });
</script>

<!-- Session-based SweetAlert Messages -->
@if (session('success') || session('error'))
<script>
    Swal.fire({
        icon: '{{ session('success') ? 'success' : 'error' }}',
        title: '{{ session('success') ? 'Success!' : 'Oops...' }}',
        text: "{{ session('success') ?? session('error') }}",
        timer: 2500,
        showConfirmButton: false
    });
</script>
@endif

<!-- Wishlist Button – Show Login Modal if not authenticated -->
<script>
    document.getElementById('wishlistBtn')?.addEventListener('click', function(e) {
        @if (!Auth::check())
            e.preventDefault();
            Swal.fire({
                icon: 'warning',
                title: 'Login Required',
                text: 'Please login first to access your wishlist!',
                showCancelButton: true,
                confirmButtonText: 'Login',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    bootstrap.Modal.getOrCreateInstance(loginModalEl).show();
                }
            });
        @endif
    });
</script>

<!-- Client-side Registration Form Validation -->
<script>
    document.getElementById('registerForm')?.addEventListener('submit', function (e) {
        e.preventDefault();

        const name     = document.querySelector('[name="name"]')?.value.trim()     || '';
        const email    = document.querySelector('[name="email"]')?.value.trim()    || '';
        const phone    = document.querySelector('[name="phone"]')?.value.trim()    || '';
        const password = document.querySelector('[name="password"]')?.value.trim() || '';
        const terms    = document.getElementById('terms')?.checked || false;

        if (!name) {
            return Swal.fire('Error', 'Please enter your name', 'error');
        }

        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            return Swal.fire('Error', 'Please enter a valid email address', 'error');
        }

        if (phone.length !== 10 || !/^\d{10}$/.test(phone)) {
            return Swal.fire('Error', 'Mobile number must be exactly 10 digits', 'error');
        }

        if (password.length < 6) {
            return Swal.fire('Error', 'Password must be at least 6 characters', 'error');
        }

        if (!terms) {
            return Swal.fire('Error', 'Please accept terms & guidelines', 'error');
        }

        
        Swal.fire({
            title: 'Success 🎉',
            text: 'Registration successful',
            icon: 'success',
            confirmButtonText: 'OK'
        });
      
    });
</script>

{{-- Global Wishlist Update Listener --}}
<script>
document.addEventListener('wishlist-updated', function (e) {
    // Update all wishlist counters on the page
    document.querySelectorAll('.wishlist-counter').forEach(el => {
        el.textContent = e.detail.count;
    });
});
</script>

<script>
const bell = document.getElementById('notificationBell');
const dropdown = document.getElementById('notificationDropdown');

bell.addEventListener('click', () => {
    if (dropdown.style.display === 'block') {
        dropdown.style.display = 'none';
    } else {
        dropdown.style.display = 'block';
    }
});

document.addEventListener('click', (e) => {
    if (!bell.contains(e.target) && !dropdown.contains(e.target)) {
        dropdown.style.display = 'none';
    }
});

</script>


</body>

</html>



