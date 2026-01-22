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
    padding:10px 0;
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



.remove-btn {
    background:none;
    border:none;
    color:orangered;
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
.remove-icon{
 
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
        <div class="row align-items-start">

    <!-- LEFT : CART ITEMS -->

    <div class="col-lg-8">

          <div class="cart-title d-flex mb-3">
                    <h5>Shopping Cart</h5>
                <span class="ms-auto">{{ count($cartItems) }} Items</span>
            </div>
            <hr>

        <div class=" d-none d-md-block  ptb-30 beb gap-2" data-animate="animate__fadeIn">
        <div class="container">
        <div class="row justify-content-start align-item-start">
        <div class="col-md-5 heading-color heading-weight">Product</div>
         <div class="col-md-3 heading-color heading-weight">Qty</div>
        <div class="col-md-2 heading-color heading-weight">Total <p>(color+size)</p></div>
        <div class="col-md-2 heading-color heading-weight text-end">Option</div>
        </div>
        </div>
    </div>

                        <div class="cart-box container-fluid px-0 px-sm-3">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @forelse($cartItems as $item)
        <div class="cart-item d-flex flex-column flex-sm-row align-items-sm-center gap-2 gap-sm-2 py-3 border-bottom"
             data-cart-id="{{ $item->cart_id }}"
             data-unit-price="{{ $item->final_price }}"
             data-price="{{ $item->final_price }}">

            <!-- Image -->
            <div class="cart-img flex-shrink-0 text-center">
                <a href="{{ url('product-view/'.$item->p_id) }}" class="d-block">
                    <img src="{{ $item->img_path ? asset('storage/colors/'.$item->img_path) : asset('assets/no-image.png') }}"
                         alt="{{ $item->img_alt_text ?? $item->p_name }}"
                         class="img-fluid rounded" style="max-height: 120px; max-width: 120px; object-fit: contain;">
                </a>
            </div>

            <!-- Main content (name + variant + price) -->
            <div class="flex-grow-1">
                <h6 class="mb-1">{{ $item->p_name }}</h6>
                <small class="text-muted d-block">
                    Size: {{ $item->size_name }} • Color: {{ $item->color_name }}
                </small>
                <div class="price fw-bold mt-1">
                    ₹{{ number_format($item->p_price, 2, '.', ',') }}
                </div>
            </div>

            <!-- Quantity + Total + Remove (stack on mobile, inline on sm+) -->
            <div class="d-flex flex-wrap align-items-center gap-2 gap-sm-3 justify-content-between justify-content-sm-end w-100 w-sm-auto">

                <!-- Quantity -->
                <div class="d-inline-flex align-items-center border rounded px-1"
                     data-cart-id="{{ $item->cart_id }}"
                     data-price="{{ $item->p_price }}">
                    <button type="button" class="btn btn-sm qty-minus px-2" data-cart-id="{{ $item->cart_id }}">−</button>
                    <input type="number"
                           class="qty-input text-center bg-transparent border-0"
                           id="qtyInput-{{ $item->cart_id }}"
                           value="{{ $item->p_quantity }}"
                           min="1"
                           style="width: 60px;">
                    <button type="button" class="btn btn-sm qty-plus px-2" data-cart-id="{{ $item->cart_id }}">+</button>
                </div>

                <!-- Item Total -->
                <div class="text-center text-sm-end" style="min-width: 100px;">
                    <strong class="item-total fs-5" id="itemTotal-{{ $item->cart_id }}">
                        ₹{{ number_format($item->final_price * ($item->p_quantity ?? 1), 2, '.', ',') }}
                    </strong>
                </div>

                <!-- Remove -->
                <div>
                    <button type="button"
                            class="btn btn-sm text-danger remove-btn delete-cart-item"
                            data-cart-id="{{ $item->cart_id }}"
                            data-product-name="{{ $item->p_name }}">
                        <i class="ri-close-large-line"></i> 
                    </button>

                    <form id="delete-form-{{ $item->cart_id }}"
                          action="{{ route('cart.remove', $item->cart_id) }}"
                          method="POST"
                          style="display:none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>

            </div>

        </div>
    @empty
        <div class="alert alert-info text-center py-5 my-4">
            Your cart is empty
        </div>
    @endforelse

    <!-- Bottom buttons -->
    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-between mt-4 pt-3 border-top">
        <a href="/" class="btn btn-outline-secondary w-100 w-sm-auto">Continue shopping</a>

        <form action="{{ route('cart.clear') }}" method="POST" class="w-100 w-sm-auto">
            @csrf
            <button type="submit" class="btn btn-outline-danger w-100"
                    onclick="return confirm('Are you sure you want to clear the cart?')">
                Clear cart
            </button>
        </form>
    </div>

</div>
    </div>

    <!-- RIGHT : CHECKOUT / SUMMARY -->
    <div class="col-lg-4">
        <div class="summary-box ">

            <h5 class="mb-3">Order Summary</h5>

            <div class="summary-row">
                <span>Subtotal</span>
          <strong id="cartSubtotal">₹{{ number_format($subtotal ?? 0, 2) }}</strong>
            </div>

            <div class="summary-row text-danger">
                <span>Discount</span>
                <span>- ₹{{ number_format($discount ?? 0) }}</span>
            </div>

            <hr>

            <div class="summary-row total">
                <span>Total</span>
              <strong id="cartTotal">₹{{ number_format($total ?? 0, 2) }}</strong>
            </div>
            
                  <small class="d-block text-center mt-2">
                Taxes calculated at checkout
            </small>
            
            <a href="{{ route('checkout') }}" class="btn btn-dark w-100 mt-3">
                Proceed to Checkout
            </a>

      

        </div>
    </div>

</div>
</div>
</form>
</section>

            <!-- cart end -->
           
        </main>
        <!-- main end -->



        @push('scripts')

@push('scripts')

@if(session('order_placed'))
<script>
    Swal.fire({
        title: 'Order Placed Successfully!',
        text: 'Thank you for shopping with us.',
        icon: 'success',
        confirmButtonText: 'View Order',
        allowOutsideClick: false
    }).then((result) => {
        if (result.isConfirmed) {
            // page already loaded hai, kuch extra nahi
        }
    });
</script>
@endif


<script>
// Delete cart item
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.delete-cart-item').forEach(button => {
        button.addEventListener('click', function() {
            const cartId = this.dataset.cartId;
            const productName = this.dataset.productName;
            
            Swal.fire({
                title: 'Are you sure?',
                text: `Remove "${productName}" from cart?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, remove it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + cartId).submit();
                }
            });
        });
    });
});
</script>

<script>
// Subtotal update function
function updateSubtotal() {
    let subtotal = 0;

    document.querySelectorAll('.cart-item').forEach(item => {
        const price = parseFloat(item.dataset.price) || 0;  // ✅ p_price from data-price
        const qty = parseInt(item.querySelector('.qty-input').value) || 1;
        
        const itemTotal = price * qty;
        subtotal += itemTotal;
        
        // Update individual item total
        const itemTotalEl = item.querySelector('.item-total');
        if (itemTotalEl) {
            itemTotalEl.innerHTML = '₹' + itemTotal.toLocaleString('en-IN', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }
    });

    // Update subtotal
    const subtotalEl = document.getElementById('cartSubtotal');
    if (subtotalEl) {
        subtotalEl.innerHTML = '₹' + subtotal.toLocaleString('en-IN', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }
    
    // Update total (subtotal - discount)
    const totalEl = document.getElementById('cartTotal');
    if (totalEl) {
        const discount = {{ $discount ?? 0 }};
        const finalTotal = subtotal - discount;
        
        totalEl.textContent = '₹' + finalTotal.toLocaleString('en-IN', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }
}

// Quantity button handler
document.addEventListener('click', function (e) {

    if (!e.target.classList.contains('qty-plus') &&
        !e.target.classList.contains('qty-minus')) {
        return;
    }

    const cartId = e.target.dataset.cartId;
    const input = document.getElementById('qtyInput-' + cartId);

    if (!input) {
        console.error('Input not found for cart:', cartId);
        return;
    }

    let qty = parseInt(input.value) || 1;

    if (e.target.classList.contains('qty-plus')) {
        qty++;
    }

    if (e.target.classList.contains('qty-minus')) {
        if (qty <= 1) {
            Swal.fire({
                icon: 'warning',
                title: 'Minimum Quantity',
                text: 'Quantity cannot be less than 1',
                confirmButtonColor: '#3085d6'
            });
            return;
        }
        qty--;
    }

    // Update UI
    input.value = qty;

    // Update subtotal immediately
    updateSubtotal();

    // Save to backend
    fetch("{{ route('cart.setQuantity') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            cart_id: cartId,
            quantity: qty
        })
    })
    .then(res => {
        if (!res.ok) throw new Error('HTTP ' + res.status);
        return res.json();
    })
    .then(data => {
        console.log('✅ Cart updated:', data);
        if (!data.success) {
            alert('Failed to update cart');
            // Revert changes on error
            location.reload();
        }
    })
    .catch(error => {
        console.error('❌ Error:', error);
        alert('Network error. Please try again.');
        location.reload();
    });

});

// Initial calculation on page load
updateSubtotal();
</script>

@endpush



@endpush
      
      
@endsection


      

