


<?php $__env->startSection('title', 'product-page'); ?>


<?php $__env->startPush('styles'); ?>
 <style>
        body { background:#f8f8f8; }

        .product-box { background:#fff; border-radius:14px; padding:25px; }

        .thumb-img img {
            width:100%;
            border-radius:10px;
            cursor:pointer;
            border:2px solid transparent;
        }
        .thumb-img img:hover { border-color:#000; }

        .main-img img {
            width:100%;
            border-radius:16px;
        }

        .price { font-size:26px; font-weight:700; }
        .mrp { text-decoration:line-through; color:#999; margin-left:10px; }
        .discount { color:green; font-weight:600; margin-left:10px; }

        .color-dot {
            width:28px;
            height:28px;
            border-radius:50%;
            display:inline-block;
            border:2px solid #ddd;
            cursor:pointer;
        }

        .size-btn {
            border:1px solid #ccc;
            padding:8px 14px;
            background:#fff;
            border-radius:6px;
            margin-right:8px;
        }
        .size-btn.active {
            border-color:#000;
            font-weight:600;
        }

        .qty-box input {
            width:50px;
            text-align:center;
            border:none;
        }

        .btn-cart{
            background-color:#ff5722;
            color:white;
            font-weight:600;
            &:hover{
                background-color:#e64a19;
                color:white;
            }
        }
        .thumb-img {
        display: flex;
        flex-direction: column;
        gap: 10px;
        }


        /* zoom effect */
         .zoom-img {
            width: 100%;
            height: 800px;
            object-fit: contain;
            cursor: zoom-in;
        }

        .zoom-result {
            position: absolute;
            top: 5%;
            left: 100%;
            width: 400px;
            height: 400px;
            border: 1px solid #ddd;
            background-repeat: no-repeat;
            background-size: 200%;
            display: none;
            z-index: 100;
        }
        .main-img {
            position: relative;
        }
       
       .accordion-collapse{
       max-height: 300px;
        overflow-y: auto;
       }
       .related-product{
        color:#ff5722;
        font-weight:700;
       }

        .size-btn.active {
            border: 2px solid #000;
            background: #f1f1f1;
        }
        #flip {
            padding: 10px;
            border-radius:5px;
            border: solid 1px #db3700;
            }

        #panel {
            padding: 10px;
            display: none;
             border: solid 1px #c3c3c3;

        }
        .desc-scroll{
            max-height: 250px;   
            overflow-y: auto;
            padding-right: 8px;
        }
          .desc-scroll::-webkit-scrollbar{
            width: 6px;
        }
        .desc-scroll::-webkit-scrollbar-thumb{
            background: #ccc;
            border-radius: 10px;
        }
        
      .product-image a {
    overflow: hidden;
    display: block;
   
}

.product-img-hover {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    transition: opacity 0.4s ease;
 
}

.product-image a:hover .product-img-hover {
    opacity: 1;
}

.product-image a:hover .product-img-main {
    opacity: 0;
}

.product-img-main {
    transition: opacity 0.4s ease;
 
}

.product-image {
    position: relative;
    overflow: hidden;

}

.product-actions {
    transition: opacity 0.3s ease;
    pointer-events: none;
    z-index: 10;
}

.product-actions a {
    pointer-events: all;
  
}

.product-image:hover .product-actions {
    opacity: 1 !important;
}







    </style>

    <?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

<div class="container-fluid my-5 px-5">

    <div class="row g-4 product-box">

        <!-- LEFT: Images -->
        <div class="col-md-6 ">
           <div class="row g-3">
            
                <!-- Thumbnails -->
            <div class="col-2 thumb-img ">
                   <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
              <img src="<?php echo e(asset('storage/colors/'.$image->img_path)); ?>"
             alt="<?php echo e($image->img_alt_text ?? $product->p_name); ?>"
             class="img-fluid thumb mb-2 d-none"
             data-color-id="<?php echo e($image->color_id); ?>"
             onclick="changeImage(this)">
                  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>

                <!-- Main Image -->
                <div class="col-10 main-img">
                    <a href="<?php echo e(url('product-view/'.$product->p_id)); ?>" class="d-block">
                        <img id="mainImage"
                             src="<?php echo e(asset('storage/colors/'.$product->img_path)); ?>"
                             alt="<?php echo e($product->img_alt_text ?? $product->p_name); ?>"
                             class="img-fluid img1 rounded-2 w-100"
                              style="height:500px; object-fit:contain;">
                          
                    </a>

                        <!-- Zoom result -->
                  <div id="zoomResult" class="zoom-result"></div>

                </div>

            </div>
        </div>

        <!-- RIGHT : Product Info -->
        <div class="col-md-6">

            <h2 class="fw-bold" ><?php echo e($product->p_name); ?></h2>

            <span class="badge bg-success mb-3 mt-2">In Stock</span>

            <!-- Price -->
            <div class="mb-3">
                <span class="price" id="productPrice" data-base-price="<?php echo e($product->p_price); ?>">₹<?php echo e(number_format($product->p_price, 2)); ?></span>
                <span class="old-price text-decoration-line-through ms-3 fs-5">
                    ₹<?php echo e(number_format($product->p_old_price, 2)); ?>

                </span>
                <span class="discount fs-6 text-success ms-2">28% OFF</span>
            </div>

            <!-- Colors -->

            <div class="mb-3" id="colorsWrapper">
    <label class="fw-semibold d-block mb-2">Color</label>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $product->colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
        <div class="d-flex align-items-center gap-2 mb-2 color-item"
             data-color-id="<?php echo e($color->color_id); ?>"
             style="cursor:pointer">
             
            <span class="color-dot"
                  style="background-color: <?php echo e($color->color_code); ?>;"
                  title="<?php echo e($color->color_name); ?>">
            </span>

            <span><?php echo e($color->color_name); ?></span>
        </div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
</div>


            <!-- Sizes -->
         <div class="mb-3">
    <label class="fw-semibold d-block mb-3">Sizes</label>

    <div id="sizeWrapper">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $product->colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $color->sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <span 
                    class="custom-border p-2 me-2 size-btn d-none"
                    data-color-id="<?php echo e($color->color_id); ?>"
                    data-size-id="<?php echo e($size->size_id); ?>"
                    data-price="<?php echo e($size->size_price_adjustment); ?>"
                    style="cursor:pointer">
                    <?php echo e($size->size_name); ?>

                </span>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>

    
    <input type="hidden" name="size_id" id="selectedSize">
    <input type="hidden" name="color_id" id="selectedColor">
    <input type="hidden" id="selectedSizePrice" name="size_price" value="0">

</div>


            <div class="d-flex gap-2">
            <!-- Add to Cart -->
           <button
                type="button"
                class="btn btn-cart mb-1 w-50 h-100 mt-3 rounded-4"
                data-product-id="<?php echo e($product->p_id); ?>"
                data-url="<?php echo e(route('add-to-cart')); ?>"
                data-redirect-after="<?php echo e(route('cart')); ?>">
                <i class="bi bi-cart"></i> Add to Cart
            </button>
            <!-- Wishlist -->
             
            <button class="btn btn-outline-danger mb-3 w-50 mt-3 h-100 rounded-4 add-to-wishlist"
            data-product-id="<?php echo e($product->p_id); ?>"
            data-redirect="<?php echo e(route('wishlist.index')); ?>">
            <i class="bi bi-heart"></i> Add to Wishlist
           </button>
           
            </div>

            <!-- Trust -->
            <ul class="list-unstyled mt-4 text-muted gap-3 d-flex flex-column">
                <li>🚚 Free Delivery</li>
                <li>🔁 7 Days Easy Return</li>
                <li>💳 Secure Payment</li>
            </ul>

            <!-- product description  -->
            <div class="mt-3 mb-2">
         <div id="flip" class="desc-header d-flex">
        <span>Product description</span>
        <i class="bi bi-chevron-down ms-auto" id="descIcon"></i>
    </div>
            <div id="panel" class="desc-scroll"><p><?php echo e($product->p_short_description); ?></p>
                <br><hr>
            <p><?php echo ($product->p_long_description); ?></p>
            </div>
            </div>


           </div>


        </div>
    </div>
</div>


   <!-- related all products sections -->

                    <div class="container-fluid px-3 mt-5">
                        <div class="row product-box">
                            <div class="section-capture text-center mt-5">
                            <div class="section-title" data-animate="animate__fadeIn">
                                <h2 class="section-heading mt-5 related-product ">Discover more products!</h2>
                            </div>
                        </div>

                     <div class="shop-product-wrap data-grid">


                        <div class="row row-mtm">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                <div class="col-6 col-md-4 gap-3" data-animate="animate__fadeIn">
                                    <div class="single-product">
                                        <div class="row single-product-wrap">

                            <!-- Product Image Column -->
                           <div class="product-image-col">
                                 <div class="product-image position-relative ">
                          <a href="<?php echo e(url('product-view/'.$related->p_id)); ?>" class="d-block pro-img">

                                        <!-- Main Image -->
                                        <img src="<?php echo e(asset('storage/colors/' . $related->img_path)); ?>"
                                            alt="<?php echo e($related->img_alt_text ?? $related->p_name); ?>"
                                            class="img-fluid img1 w-100"
                                            style="height:300px; object-fit:contain;">

                                        <!-- Hover Image -->
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($related->hover_img_path)): ?>
                                            <img src="<?php echo e(asset('storage/colors/' . $related->hover_img_path)); ?>"
                                                alt="<?php echo e($related->img_alt_text ?? $related->p_name); ?>"
                                                class="img-fluid img2 w-100 position-absolute top-0 start-0"
                                                style="height:300px; object-fit:contain;">
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                    </a>
                                    
                                <div class="product-actions position-absolute top-0 start-0 mx-4 mb-3 opacity-0 transition-3">
                                <div class="d-flex gap-2 mx-5 mt-1 whistlist-icon">
                                    <a href="javascript:void(0)"
                                        class="add-to-wishlist btn btn-light"
                                        data-product-id="<?php echo e($product->p_id); ?>"
                                        data-redirect="<?php echo e(route('wishlist.index')); ?>">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </div>
                            </div>
                                </div>

                                
                            </div>


                            <!-- Product Content Column -->
                            <div class="product-content mt-2">
                                <div class="pro-content">
                                    <div class="product-title mb-1">
                                        <a href="<?php echo e(url('product-view/'.$related->p_id)); ?>" class="primary-link"><?php echo e($related->p_name); ?></a>
                                    </div>
                                    <div class="product-price mb-1">
                                        <span class="new-price primary-color">₹<?php echo e(number_format($related->p_price, 2)); ?></span>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($related->p_old_price): ?>
                                            <span class="old-price text-decoration-line-through ms-3">₹<?php echo e(number_format($related->p_old_price, 2)); ?></span>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>

                                        

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <p class="text-center">No related products found!</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>


    </div>
    </div>
</div>



     <?php $__env->stopSection(); ?>

  <?php $__env->startPush('scripts'); ?>


  
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle();
  });
});
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.btn-cart').forEach(button => {

        button.addEventListener('click', function (e) {
            e.preventDefault();

            const productId = this.dataset.productId;
            const url = this.dataset.url; 
            const redirectUrl = this.dataset.redirectAfter || '/cart';

            // Get values
            const colorId = document.getElementById('selectedColor').value;
            const sizeId = document.getElementById('selectedSize').value;
            const sizePrice = document.getElementById('selectedSizePrice').value || '0';

            // Validation
            if (!colorId) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Color Required',
                    text: 'Please select a color',
                    confirmButtonColor: '#3085d6'
                });
                return;
            }

            if (!sizeId) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Size Required',
                    text: 'Please select a size',
                    confirmButtonColor: '#3085d6'
                });
                return;
            }

            // Console check
            console.log('ADD TO CART DATA:', {
                p_id: productId,
                color_id: colorId,
                size_id: sizeId,
                size_price: sizePrice
            });

            // FormData
            let formData = new FormData();
            formData.append('p_id', productId);
            formData.append('color_id', colorId);
            formData.append('size_id', sizeId);
            formData.append('size_price', sizePrice);

            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>', 
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(res => res.json())
            .then(result => {
                if(result.status){
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: result.message ?? 'Product added to cart',
                        confirmButtonColor: '#28a745'
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: result.message ?? 'Failed to add product',
                        confirmButtonColor: '#d33'
                    });
                }
            })
            .catch(err => {
                console.error(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'JS / Network error',
                    confirmButtonColor: '#d33'
                });
            });

        });

    });

});
</script>

//   <!-- script of whistlist -->

        
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
           fetch("<?php echo e(route('wishlist.index')); ?>", {
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






<script>
let selectedSizePrice = 0;

document.addEventListener('DOMContentLoaded', function () {

    const colors    = document.querySelectorAll('.color-item');
    const sizes     = document.querySelectorAll('.size-btn');
    const thumbs    = document.querySelectorAll('.thumb');
    const mainImage = document.getElementById('mainImage');

    const priceEl   = document.getElementById('productPrice');
    const basePrice = parseFloat(priceEl.dataset.basePrice);

    /* 💰 PRICE UPDATE FUNCTION */
    function updateTotalPrice() {
     
        let total = (basePrice + selectedSizePrice);
        priceEl.innerText = '₹' + total.toFixed(2);
    }

    /* 🎨 COLOR CLICK */
   colors.forEach(color => {

    console.log('hidden color value =', document.getElementById('selectedColor').value);

    color.addEventListener('click', function () {

        const colorId = this.getAttribute('data-color-id');

        // active
        colors.forEach(c => c.classList.remove('active'));
        this.classList.add('active');

        // 👇 hidden input (MOST IMPORTANT)
        document.getElementById('selectedColor').value = colorId;

        /* SIZE FILTER */
        sizes.forEach(size => {
            size.classList.add('d-none');
            size.classList.remove('active');
        });

        document
            .querySelectorAll('.size-btn[data-color-id="' + colorId + '"]')
            .forEach(size => size.classList.remove('d-none'));

        document.getElementById('selectedSize').value = '';

        selectedSizePrice = 0;
        updateTotalPrice();

        /* IMAGE FILTER */
        thumbs.forEach(img => img.classList.add('d-none'));

        const colorImages = document.querySelectorAll(
            '.thumb[data-color-id="' + colorId + '"]'
        );

        colorImages.forEach(img => img.classList.remove('d-none'));

        if (colorImages.length > 0) {
            mainImage.src = colorImages[0].src;
        }

        console.log('color_id sent:', colorId); 
    });
});


    /* 🔥 AUTO SELECT FIRST COLOR */
    if (colors.length > 0) {
        colors[0].click();
    }

 
   /* 📏 SIZE CLICK */
sizes.forEach(size => {
    size.addEventListener('click', function () {

        sizes.forEach(s => s.classList.remove('active'));
        this.classList.add('active');

        document.getElementById('selectedSize').value = this.dataset.sizeId;

        /* 💰 SIZE PRICE */
        selectedSizePrice = parseFloat(this.dataset.price) || 0;

        // 👇 ADD THIS LINE
        document.getElementById('selectedSizePrice').value = selectedSizePrice;

        updateTotalPrice();
    });
});


});

</script>
// <!-- script of change image -->

  <script>
function changeImage(el) {
    document.getElementById('mainImage').src = el.src;
}
</script>


<!-- script of zoom effect -->
<script>
const img = document.getElementById("mainImage");
const result = document.getElementById("zoomResult");

img.addEventListener("mouseenter", () => {
    result.style.display = "block";
    result.style.backgroundImage = `url(${img.src})`;
});

img.addEventListener("mouseleave", () => {
    result.style.display = "none";
});

img.addEventListener("mousemove", moveZoom);

function moveZoom(e) {
    const rect = img.getBoundingClientRect();
    const x = ((e.clientX - rect.left) / rect.width) * 100;
    const y = ((e.clientY - rect.top) / rect.height) * 100;

    result.style.backgroundPosition = `${x}% ${y}%`;
}
</script>




    <?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.frontend-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel_git\ecommerce-web\resources\views/product-view.blade.php ENDPATH**/ ?>