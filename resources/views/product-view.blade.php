
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

    </style>

    @endpush


@section('content')

  
<div class="container my-5">


    <div class="row g-4 product-box">

        <!-- LEFT: Images -->
        <div class="col-md-6">
           <div class="row g-3">

    <!-- Thumbnails -->
    <div class="col-2 thumb-img">
        @foreach($product->images as $image)
            <img src="{{ asset('storage/colors/'.$image->img_path) }}"
                 alt="{{ $image->img_alt_text ?? $product->p_name }}"
                 class="img-fluid thumb"
                 onclick="changeImage(this)">
        @endforeach
    </div>

    <!-- Main Image -->
    <div class="col-10 main-img">
        <a href="{{ url('product-view/'.$product->p_id) }}" class="d-block">
            <img 
                 src="{{ asset('storage/colors/' . $product->img_path) }}"
                 alt="{{ $product->img_alt_text ?? $product->p_name }}"
                 class="img-fluid"
                 style="height:400px; width:100%; object-fit:contain;">
        </a>
    </div>

</div>

        </div>

        <!-- RIGHT: Product Info -->
        <div class="col-md-6">

            <h2 class="fw-bold">{{ $product->p_name }}</h2>

            <span class="badge bg-success mb-3 mt-2">In Stock</span>

            <!-- Price -->
            <div class="mb-3">
                <span class="price">₹{{ number_format($product->p_price, 2) }}
                <span class="old-price text-decoration-line-through ms-3 fw-bold-none fs-5">₹{{ number_format($product->p_old_price, 2) }}</span>
                <span class="discount fs-6 ">28% OFF</span>
            </div>

            <!-- Color -->
            <div class="mb-3">
                <label class="fw-semibold d-block mb-2 d-flex align-items-center gap-2 ">Color</label>
                 @foreach($product->colors as $color)
                 <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="color-dot"
                        style="background-color: {{ $color->color_code }};"
                        title="{{ $color->color_name }}">
                         
                    </span>
                    <span class="" >{{ $color->color_name }}</span>
                </div>
                   
                    
                @endforeach
            </div>

            <!-- Size -->
            <div class="mb-3">
                <label class="fw-semibold d-block mb-3"> Sizes</label>
                                @foreach($color->sizes as $size)
                        <span class="custom-border mt-3 p-2 fs-3 size-btn">
                            {{ $size->size_name }}
                        </span>
                    @endforeach
          
            </div>

                
            

            <!-- Quantity -->
            <div class="mb-4">
                <label class="fw-semibold d-block mb-3">Quantity</label>
                <div class="d-inline-flex align-items-center border rounded px-2 qty-box">
                    <button class="btn btn-sm">−</button>
                    <input type="text" value="1">
                    <button class="btn btn-sm">+</button>
                </div>
            </div>

            <div class="d-flex gap-2 ">
            <!-- Add to Cart -->
            <button class="btn btn-cart mb-3 w-50 h-100 rounded-4">
                <i class="bi bi-cart"></i> Add to Cart
            </button>

            <!-- Wishlist -->
             
            <button class="wishlist w-50 btn btn-outline-danger rounded-4 mb-3 " id="whishlistBtn">
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
                {{ $product->p_short_description }}
            </div>

              <div class="accordion-body">
                {{ $product->p_long_description }}
            </div>
        </div>
    </div>
</div>
</div>


        </div>
    </div>
</div>




     @endsection


