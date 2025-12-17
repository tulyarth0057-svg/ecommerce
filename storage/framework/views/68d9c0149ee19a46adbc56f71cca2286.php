 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<body>

       <style>
                .modal-content {
                border: 3px solid orangered;
                }
                input{
                    border: 1px solid orangered;
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
                                <a href="<?php echo e(url('/')); ?>"> <div class="header-theme-logo">
                                 <img src="<?php echo e(asset('assetsofdash/images/Red and Black Modern Creative Agency Logo-old.png')); ?>" class="rounded-1" width="150px" height="60px">
                                </div></a>
                            </div>
                            <!-- header-logo end -->
                            <!-- header-menu start -->
                            <div class="col-xl-6 col-xxl-5 d-none d-xl-block header-element header-menu">
                                <div class="mainmenu-content">
                                    <div class="main-wrap">
                                        <ul class="menu-ul d-flex flex-wrap">
                                            <li class="menu-li">
                                                <a href="<?php echo e(url('/')); ?>" class="menu-link d-flex align-items-center ptb-5 plr-15">
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
                                                <a href="collection.html" class="menu-link d-flex align-items-center ptb-5 plr-15">
                                                    <span class="menu-title text-uppercase heading-weight">Product</span>
                                                    <span class="icon-16 fw-normal"><i class="ri-arrow-down-s-line d-block lh-1"></i></span>
                                                </a>
                                                <div class="menu-dropdown collapse position-absolute top-auto start-0 end-0 body-bg z-2 DropDownSlide box-shadow">
                                                    <div class="container ptb-25">
                                                        <div class="row">

                                                            <div class="col-4">
                                                           <a href="<?php echo e(route('Menmaincategorycollection')); ?>">
                                                           <div class="d-block heading-color ptb-5 heading-weight">MEN CATEGORY</div></a>
                                                                <div class="mst-11">
                                                                    <span class="d-block ptb-5"><a href="<?php echo e(route('menshirtcollection')); ?>" class="d-inline-block body-primary-color"> 01 shirts collections</a></span>
                                                                    <span class="d-block ptb-5"><a href="<?php echo e(route('menformalpantscollection')); ?>" class="d-inline-block body-primary-color">02 Formal pants & Jeans</a></span>
                                                                    <span class="d-block ptb-5"><a href="<?php echo e(route('menshoescollection')); ?>" class="d-inline-block body-primary-color">03 Shoes collection for men & boys</a></span>

                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                               <a href="<?php echo e(route('Womenmaincategorycollection')); ?>">
                                                     <div class="d-block heading-color ptb-5 heading-weight">WOMEN CATEGORY</div></a>
                                                                <div class="mst-11">
                                                                    <span class="d-block ptb-5"><a href="<?php echo e(route('womenkurtiscollection')); ?>" class="d-inline-block body-primary-color">01 Kurti's collection</a></span>
                                                                    <span class="d-block ptb-5"><a href="<?php echo e(route('womentops/t-shirtscollection')); ?>" class="d-inline-block body-primary-color">02 Tops & T-Shirts collection</a></span>
                                                                    <span class="d-block ptb-5"><a href="<?php echo e(route('womenjeanscollection')); ?>" class="d-inline-block body-primary-color">03 Jeans / Jeggings collection</a></span>

                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                               <a href="<?php echo e(route('Kidsmaincategorycollection')); ?>"> <div class="d-block heading-color ptb-5 heading-weight">KIDS CATEGORY</div></a>
                                                                <div class="mst-11">
                                                                    <span class="d-block ptb-5"><a href="<?php echo e(route('kidstoyscollection1')); ?>" class="d-inline-block body-primary-color">01 Toys & Games</a></span>
                                                                    <span class="d-block ptb-5"><a href="<?php echo e(route('kidsclothescollection2')); ?>" class="d-inline-block body-primary-color">02 Kids Clothing</a></span>
                                                                    <span class="d-block ptb-5"><a href="<?php echo e(route('kidsAccessoriescollection3')); ?>" class="d-inline-block body-primary-color">03 kids Accessories	</a></span>

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
                                                    <span class="menu-title text-uppercase heading-weight">Page</span>
                                                    <span class="icon-16 fw-normal"><i class="ri-arrow-down-s-line d-block lh-1"></i></span>
                                                </a>
                                                <div class="menu-dropdown menu-sub collapse position-absolute top-auto body-bg z-2 DropDownSlide box-shadow">
                                                    <ul class="menudrop-ul ptb-25">
                                                        <li class="menudrop-li position-relative">
                                                            <div class="menu-sublink ptb-5 plr-30">
                                                                <a href="about-us.html" class="d-flex flex-wrap align-items-center">
                                                                    <span class="menusub-title width-calc-16">About us</span>
                                                                    <span class="width-16 icon-16 fw-normal"><i class="ri-arrow-right-s-line d-block lh-1"></i></span>
                                                                </a>
                                                            </div>
                                                            <div class="menusub-dropdown collapse position-absolute w-100 body-bg DropDownSlide box-shadow">
                                                                <ul class="menusub-ul ptb-25">
                                                                    <li class="menusub-li">
                                                                        <span class="d-block ptb-5 plr-30"><a href="about-us.html" class="d-inline-block body-primary-color">01 Modern aboutus</a></span>
                                                                    </li>
                                                                    <li class="menusub-li">
                                                                        <span class="d-block ptb-5 plr-30"><a href="about-us2.html" class="d-inline-block body-primary-color">02 Creative aboutus</a></span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li class="menudrop-li position-relative">
                                                            <div class="menu-sublink ptb-5 plr-30">
                                                                <a href="contact-us.html" class="d-flex flex-wrap align-items-center">
                                                                    <span class="menusub-title width-calc-16">Contact us</span>
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
                                            <form method="get" action="javascript:void(0)" class="search-form w-100">
                                                <div class="search-bar position-relative">
                                                    <div class="form-search d-flex">
                                                        <input type="search" name="search-input" class="w-100 search-input" value="" placeholder="Search product..." required>
                                                        <button type="submit" onclick="window.location.href='search-product.html'" class="d-block tertiary-btn plr-15 text-uppercase text-nowrap heading-weight" disabled>Search</button>
                                                    </div>
                                                    <div class="d-none search-results position-absolute top-auto start-0 end-0 body-bg z-2 border-full border-radius box-shadow">
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
                                        <li class="header-icon-wrap search-wrap d-xxl-none">
                                            <div class="header-icon-wrapper">
                                                <a href="#searchmodal" class="d-block header-icon-search" data-bs-toggle="modal" aria-label="Search modal">
                                                    <span class="d-block header-block-icon primary-link font-16 font-xl-20"><i class="ri-search-line"></i></span>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="header-icon-wrap user-wrap d-md-block d-none">
                                            <div class="header-icon-wrapper">
                                                <a href="<?php echo e(route('signin')); ?>" class="d-block header-icon-user" aria-label="Login user" data-bs-toggle="modal" data-bs-target="#loginModal">
                                                    <span class="d-block header-block-icon primary-link font-16 font-xl-20"><i class="ri-user-line"></i></span>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="header-icon-wrap wishlist-wrap d-md-block d-none">
                                            <div class="header-icon-wrapper">
                                                <a href="<?php echo e(url('/whistlist')); ?>" class="d-block header-icon-wishlist" id="wishlistBtn">
                                                    <span class="primary-link ul-mt5 flex-nowrap align-items-center">
                                                        <span class="d-block">
                                                            <span class="d-block header-block-icon-wrap position-relative per-8">
                                                                <span class="d-block header-block-icon font-16 font-xl-20"><i class="ri-heart-line"></i></span>
                                                                <span class="header-block-counter wishlist-counter extra-color font-10 position-absolute end-0 d-flex align-items-center justify-content-center primary-bg rounded-circle">4</span>
                                                            </span>
                                                        </span>
                                                        <span class="d-none d-xl-block header-text-content text-uppercase text-nowrap heading-weight">Wishlist</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="header-icon-wrap cart-wrap d-md-block d-none">
                                            <div class="header-icon-wrapper">
                                                <a href="javascript:void(0)" class="d-block header-icon-cart js-cart-drawer">
                                                    <span class="primary-link ul-mt5 flex-nowrap align-items-center">
                                                        <span class="d-block">
                                                            <span class="d-block header-block-icon-wrap position-relative per-8">
                                                                <span class="d-block header-block-icon font-16 font-xl-20"><i class="ri-shopping-bag-3-line"></i></span>
                                                                <span class="header-block-counter cart-counter extra-color font-10 position-absolute end-0 d-flex align-items-center justify-content-center primary-bg rounded-circle">4</span>
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


        


           <!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">



    <form method="POST" action="<?php echo e(url('signin')); ?>">
      <?php echo csrf_field(); ?>
      <input type="hidden" name="redirect" value="<?php echo e(url()->current()); ?>">
      <div class="modal-content p-3">
            <div class="d-flex text-center justify-content-center">
           <img src="<?php echo e(asset('assetsofdash/images/Red and Black Modern Creative Agency Logo-old.png')); ?>" class="rounded-1 text-center" width="200px" height="80px">
              </div>
        <div class="modal-header text-center justify-content-center">
          <h5 class="modal-title text-warnings fs-3 fw-bold text-center">Login</h5>
          <button type="button" class="btn-close text-warning" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <label for="" class="mt-2">Enter your Email</label>
          <input type="text" class="form-control mb-3 mt-3" name="email" placeholder="Username"/>
          <label for="" class="mt-2">Enter your password</label>
          <input type="password" name="password" class="form-control mb-3 mt-3" placeholder="Password" />
        </div>
        <div class="text-center justify-content-center flex-column">
          <button class="btn btn-dark w-75 text-center" type="submit">Login</button>
        </div>
        <hr>
        <div class="text-center justify-content-center flex-column">
          <h6 class="font-18">Don't have an account? 👇</h6>
          <a href="javascript:void(0);" class="btn btn-dark text-white mt-3 w-75" id="openSignup">
            Create Account
          </a>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Signup Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="signupForm" action="<?php echo e(route('signup')); ?>" method="POST" >
      <?php echo csrf_field(); ?>
      <div class="modal-content p-3">
        <div class="d-flex text-center justify-content-center">
           <img src="<?php echo e(asset('assetsofdash/images/Red and Black Modern Creative Agency Logo-old.png')); ?>" class="rounded-1 text-center" width="200px" height="80px">
              </div>
        <div class="modal-header justify-content-center">
          <h5 class="modal-title">Sign Up</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <label>Name</label>
          <input type="text" name="name" class="form-control mb-3 mt-3" placeholder="Enter your name" required>
          <label>Email</label>
          <input type="email" name="email" class="form-control mb-3 mt-3" placeholder="Enter your email" required>
          <label>Password</label>
          <input type="password" name="password" class="form-control mb-3 mt-3" placeholder="Enter your password" required>
          <div class="form-check mb-2 d-flex align-items-center">
            <input class="fs-3" type="checkbox" required>
            <label class="form-check-label ms-3">I agree to the <a href="terms-condition.html">terms & guidelines</a></label>
          </div>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-dark w-75">Signup</button>
        </div>
        <hr>
         <div class="text-center justify-content-center flex-column">
          <h6 class="font-18">You have an account signin 👇</h6>
          <a href="javascript:void(0);" class="btn btn-dark text-white mt-3 w-75 " id="openLogin">
            Sign In
          </a>
        </div>
      </div>
    </form>
  </div>
</div>





<script>
const loginModalEl  = document.getElementById('loginModal');
const signupModalEl = document.getElementById('signupModal');


document.getElementById('openSignup').addEventListener('click', function () {
    const loginModal = bootstrap.Modal.getOrCreateInstance(loginModalEl);

    loginModalEl.addEventListener('hidden.bs.modal', function () {
        bootstrap.Modal.getOrCreateInstance(signupModalEl).show();
    }, { once: true });

    loginModal.hide();
});


document.getElementById('openLogin')?.addEventListener('click', function () {
    const signupModal = bootstrap.Modal.getOrCreateInstance(signupModalEl);

    signupModalEl.addEventListener('hidden.bs.modal', function () {
        bootstrap.Modal.getOrCreateInstance(loginModalEl).show();
    }, { once: true });

    signupModal.hide();
});

[loginModalEl, signupModalEl].forEach(modal => {
    modal.addEventListener('hidden.bs.modal', () => {
        document.body.classList.remove('modal-open');
        document.body.style.overflow = '';   // ⭐ ADD THIS LINE
        document.querySelectorAll('.modal-backdrop').forEach(b => b.remove());
    });
});

</script>





<script>document.getElementById('signupForm').addEventListener('submit', function(e){
    e.preventDefault();

    const formData = new FormData(this);

    fetch("<?php echo e(route('signup')); ?>", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
            "Accept": "application/json"
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if(data.status){
            // Close signup modal
            const signupModal = bootstrap.Modal.getInstance(document.getElementById('signupModal'))
                                 || bootstrap.Modal.getOrCreateInstance(document.getElementById('signupModal'),500);
            // signupModal.hide();

            // SweetAlert success
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: data.message,
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
    .catch(err=>{
        console.error(err);
        Swal.fire({
            icon: 'error',
            title: 'Server Error',
            text: 'Please try again later.',
        });
    });
});

</script>






<?php if(session('success')): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "<?php echo e(session('success')); ?>",
        timer: 2000,
        showConfirmButton: false
    });
</script>
<?php endif; ?>

<?php if(session('error')): ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "<?php echo e(session('error')); ?>",
        timer: 2000,
        showConfirmButton: false
    });
</script>
<?php endif; ?>

        <?php if(session('success')): ?>
<script>
    Swal.fire({
        title: 'Success!',
        text: "<?php echo e(session('success')); ?>",
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>


<?php endif; ?>



<script>document.getElementById('wishlistBtn').addEventListener('click', function(e){
    <?php if(!Auth::check()): ?>
        e.preventDefault(); // prevent redirect

        Swal.fire({
            icon: 'warning',
            title: 'Login Required',
            text: 'Please login first to access your wishlist!',
            showCancelButton: true,
            confirmButtonText: 'Login',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if(result.isConfirmed){
                // Open Login Modal
                const loginModalEl = document.getElementById('loginModal');
                const loginModal = bootstrap.Modal.getOrCreateInstance(loginModalEl);
                loginModal.show();
            }
        });
    <?php endif; ?>
});
loginModalEl.addEventListener('hidden.bs.modal', () => {
    document.body.classList.remove('modal-open');
    document.body.style.overflow = '';
    document.body.style.paddingRight = '';
    document.querySelectorAll('.modal-backdrop').forEach(b => b.remove());
});

</script>




</body>

                







<?php /**PATH C:\laravel_git\ecommerce-web\resources\views/partials/frontheader.blade.php ENDPATH**/ ?>