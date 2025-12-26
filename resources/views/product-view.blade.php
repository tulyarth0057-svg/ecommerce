
@extends('layouts.frontend-layout')

@section('title', 'product-page')


@push('styles')
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
            width: 550px;
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

    </style>

    @endpush


@section('content')

<div class="container-fluid my-5 px-5">

    <div class="row g-4 product-box">

        <!-- LEFT: Images -->
        <div class="col-md-6 ">
           <div class="row g-3">

                <!-- Thumbnails -->
            <div class="col-2 thumb-img ">
                   @foreach($images as $image)
             <img src="{{ asset('storage/colors/'.$image->img_path) }}"
             alt="{{ $image->img_alt_text ?? $product->p_name }}"
             class="img-fluid thumb mb-2"
             onclick="changeImage(this)">
                  @endforeach
                </div>

                <!-- Main Image -->
                <div class="col-10 main-img">
                    <a href="{{ url('product-view/'.$product->p_id) }}" class="d-block">
                        <img id="mainImage"
                             src="{{ asset('storage/colors/'.$product->img_path) }}"
                             alt="{{ $product->img_alt_text ?? $product->p_name }}"
                             class="img-fluid img1">
                    </a>

                        <!-- Zoom result -->
                  <div id="zoomResult" class="zoom-result"></div>

                </div>

            </div>
        </div>

        <!-- RIGHT : Product Info -->
        <div class="col-md-6">

            <h2 class="fw-bold" >{{ $product->p_name }}</h2>

            <span class="badge bg-success mb-3 mt-2">In Stock</span>

            <!-- Price -->
            <div class="mb-3">
                <span class="price" id="productPrice" data-base-price="{{ $product->p_price }}">₹{{ number_format($product->p_price, 2) }}</span>
                <span class="old-price text-decoration-line-through ms-3 fs-5">
                    ₹{{ number_format($product->p_old_price, 2) }}
                </span>
                <span class="discount fs-6 text-success ms-2">28% OFF</span>
            </div>

            <!-- Colors -->
            <div class="mb-3">
                <label class="fw-semibold d-block mb-2">Color</label>

                @foreach($product->colors as $color)
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <span class="color-dot"
                              style="background-color: {{ $color->color_code }};"
                              title="{{ $color->color_name }}">
                        </span>
                        <span>{{ $color->color_name }}</span>
                    </div>
                @endforeach
            </div>

            <!-- Sizes -->
         <div class="mb-3">
    <label class="fw-semibold d-block mb-3">Sizes</label>

    <div id="sizeWrapper">
          @foreach($product->colors as $color)
        @foreach($color->sizes as $size)
            <span 
                class="custom-border p-2 me-2 size-btn"
                data-price="{{ $size->size_price_adjustment }}">
                {{ $size->size_name }}
            </span>
        @endforeach
    @endforeach
    </div>

    <!-- hidden input to store selected size -->
    <input type="hidden" id="selectedSize" name="size">
</div>


            <!-- Quantity -->
           <div class="mb-4">
    <label class="fw-semibold d-block mb-3">Quantity</label>
    <div class="d-inline-flex align-items-center border rounded px-2 qty-box">
        <button class="btn btn-sm qty-minus">−</button>
        <input type="text" id="qtyInput" value="1" readonly>
        <button class="btn btn-sm qty-plus">+</button>
    </div>
</div>


            <div class="d-flex gap-2 ">
            <!-- Add to Cart -->
          
            <button class="btn btn-cart mb-3 w-50 h-100 rounded-4"
             data-product-id="{{ $product->p_id }}"
             data-redirect="{{ route('add-to-cart') }}">  
            <i class="bi bi-cart"></i> Add to Cart
            </button>
        

            <!-- Wishlist -->
             
            <button class="btn btn-outline-danger mb-3 w-50  h-100 rounded-4 add-to-wishlist"
        data-product-id="{{ $product->p_id }}"
        data-redirect="{{ route('wishlist.index') }}">
    <i class="bi bi-heart"></i> Add to Wishlist
</button>


            </div>

            <!-- Trust -->
            <ul class="list-unstyled mt-4 text-muted gap-3 d-flex flex-column">
                <li>🚚 Free Delivery</li>
                <li>🔁 7 Days Easy Return</li>
                <li>💳 Secure Payment</li>
            </ul>

<!-- Accordion -->
<div class="accordion mt-4" id="productAccordion">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#details"
                    aria-expanded="false"
                    aria-controls="details">
                Product Details
            </button>
        </h2>

        <div id="details"
             class="accordion-collapse collapse"
             aria-labelledby="headingOne"
             data-bs-parent="#productAccordion">
            <div class="accordion-body">
                <p>{{ $product->p_short_description }}</p>
                <br>
           <p>{!! ($product->p_long_description) !!}</p>
            </div>
        </div>
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
            @forelse($relatedProducts as $related)
                <div class="col-6 col-md-4 gap-3" data-animate="animate__fadeIn">
                    <div class="single-product">
                        <div class="row single-product-wrap">

                            <!-- Product Image Column -->
                            <div class="product-image-col">
                                <div class="product-image">
                                    <a href="{{ url('product-view/'.$related->p_id) }}" class="d-block">
                                        <img src="{{ asset('storage/colors/' . $related->img_path) }}"
                                             alt="{{ $related->img_alt_text ?? $related->p_name }}"
                                             class="img-fluid img1"
                                             style="height:400px; width:100%; object-fit:contain;">
                                    </a>
                                </div>
                            </div>

                            <!-- Product Content Column -->
                            <div class="product-content mt-2">
                                <div class="pro-content">
                                    <div class="product-title mb-1">
                                        <a href="{{ url('product-view/'.$related->p_id) }}" class="primary-link">{{ $related->p_name }}</a>
                                    </div>
                                    <div class="product-price mb-1">
                                        <span class="new-price primary-color">₹{{ number_format($related->p_price, 2) }}</span>
                                        @if($related->p_old_price)
                                            <span class="old-price text-decoration-line-through ms-3">₹{{ number_format($related->p_old_price, 2) }}</span>
                                        @endif
                                    </div>

                                    <div class="align-items-center justify-content-center w-100 h-100 mt-3 transition-3 text-center d-flex">
                                        <div class="d-flex gap-2">
                                            <a href="javascript:void(0)"
                                               class="add-to-wishlist btn btn-light"
                                               data-product-id="{{ $related->p_id }}"
                                               data-redirect="{{ route('wishlist.index') }}">
                                               <i class="ri-heart-line"></i>
                                            </a>

                                            <a href="javascript:void(0)" class="add-to-cart btn btn-light">
                                                <i class="ri-shopping-bag-3-line"></i>
                                            </a>

                                            <a href="{{ url('product-view/'.$related->p_id) }}" class="d-block quick-view btn btn-light">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No related products found!</p>
            @endforelse
        </div>
    </div>
    </div>
</div>


     @endsection

  @push('scripts')


  <script>
document.addEventListener('DOMContentLoaded', function() {
    const cartButtons = document.querySelectorAll('.btn-cart');

    cartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.productId;
            const url = this.dataset.redirect;

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    p_id: productId,
                    size_id: 1,
                    color_id: 1,
                    qty: 1
                })
            })
            .then(res => res.json())
            .then(result => {
                if(result.status) {
                    alert(result.message);
                    // Optional: update navbar cart count
                    document.querySelector('#cart-count').innerText = result.cart_count;
                } else {
                    alert('Failed to add to cart');
                }
            })
            .catch(err => {
                console.error(err);
                alert('Something went wrong!');
            });
        });
    });
});
</script>


  

  <!-- script of whistlist -->
        <!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
<script>
           document.querySelectorAll('.add-to-wishlist').forEach(btn => {
    btn.addEventListener('click', function(e){
        e.preventDefault(); // stop default link

        const productId = this.dataset.productId;

        @if(!Auth::check())
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
        @else
           fetch("{{ route('wishlist.index') }}", {
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
        @endif
    });
});

</script>

<!-- size and quantity-->
<script>
let productPriceEl = document.getElementById('productPrice');
let basePrice = parseFloat(productPriceEl.dataset.basePrice);
let selectedSizePrice = 0;
let qtyInput = document.getElementById('qtyInput');

function updateTotalPrice() {
    let qty = parseInt(qtyInput.value) || 1;
    let total = (basePrice + selectedSizePrice) * qty;

    productPriceEl.innerText = '₹' + total.toFixed(2);
}

// size click
document.querySelectorAll('.size-btn').forEach(btn => {
    btn.addEventListener('click', function () {

        document.querySelectorAll('.size-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');

        selectedSizePrice = parseFloat(this.dataset.price) || 0;
        updateTotalPrice();
    });
});

// qty plus
document.querySelector('.qty-plus').addEventListener('click', function () {
    qtyInput.value = parseInt(qtyInput.value) + 1;
    updateTotalPrice();
});

// qty minus
document.querySelector('.qty-minus').addEventListener('click', function () {
    let current = parseInt(qtyInput.value);
    if (current > 1) {
        qtyInput.value = current - 1;
        updateTotalPrice();
    }
});
</script>



<!-- script of change image -->

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

    @endpush

