@extends('layouts.frontend-layout')

@section('title', 'checkout')

@push('styles')
<style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    .checkout-container { max-width: 1200px; margin: 0 auto; padding: 20px; }
    .checkout-breadcrumb { color: #ff6b35; margin-bottom: 20px; font-size: 14px; }
    .checkout-title { color: #ff6b35; font-size: 36px; margin-bottom: 30px; }
    .checkout-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 20px; }
    .checkout-box { background: white; padding: 25px; border-radius: 8px; height: auto; }
    .order-box { border: 2px solid #ff6b35;  }
    .order{height: auto;}
    .checkout-h2 { color: #ff6b35; font-size: 22px; margin-bottom: 20px; }
    .checkout-input, .checkout-btn { width: 100%; padding: 12px; margin: 8px 0; border: 2px solid #ffb380; border-radius: 20px; font-size: 14px; }
    .checkout-input:focus { outline: none; border-color: #ff6b35; }
    .checkout-row { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
    .order-item { display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid #ffe4cc; }
    .order-total { font-weight: bold; color: #ff6b35; font-size: 18px; padding-top: 10px; border-top: 2px solid #ff6b35; margin-top: 10px; }
    .payment-option { padding: 12px; border: 2px solid #ffe4cc; border-radius: 8px; margin: 10px 0; cursor: pointer; }
    .payment-option:hover, .payment-selected { background: #fff5eb; border-color: #ff6b35; }
    .checkout-btn { background: #ff6b35; color: white; border: none; font-weight: bold; cursor: pointer; margin-top: 15px; }
    .checkout-btn:hover { background: #ff5722; }
    @media(max-width: 768px) { .checkout-grid { grid-template-columns: 1fr; } .checkout-row { grid-template-columns: 1fr; } }
    .product-name{
        color:#ff6b35;
    }
</style>
@endpush

@section('content')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area ptb-30 bg-img text-center" data-bgimg="assets/image/other/breadcrumb-bgimg.jpg">
    <div class="container">
        <span class="d-block extra-color"><a href="/" class="extra-color">Home</a> / Checkout</span>
        <h2 class="extra-color font-24 font-xl-32 mst-5 mst-xl-9">Checkout</h2>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- main start -->
<main id="main">
    <div class="checkout-container">
        <div class="checkout-grid">
    <div class="checkout-box">
        <h2 class="checkout-h2">Billing details</h2>
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <label>Email address *</label>
            <input type="email" name="email" class="checkout-input" 
                   value="{{ auth()->user()->email ?? old('email') }}" 
                   placeholder="Enter your email" required>
            
            <label>Name *</label>
            <input type="text" name="name" class="checkout-input" 
                   value="{{ auth()->user()->name ?? old('name') }}" 
                   placeholder="Enter your name" required>
            
            <label>Street address *</label>
            <input type="text" name="address" class="checkout-input" 
                   value="{{ old('address') }}" 
                   placeholder="House number and street name" required>
            
            <div class="checkout-row">
                <div>
                    <label>Town / City *</label>
                    <input type="text" name="city" class="checkout-input" 
                           value="{{ old('city') }}" required>
                </div>
                <div>
                    <label>Postcode *</label>
                    <input type="text" name="postcode" class="checkout-input" 
                           value="{{ old('postcode') }}" required>
                </div>
            </div>
            
            <label>State</label>
            <input type="text" name="state" class="checkout-input" value="{{ old('state') }}">
            
            <label>Location</label>
            <input type="text" name="location" class="checkout-input" 
                   id="locationInput" value="{{ old('location') }}"
                   placeholder="📍 Click here to auto-fill GPS location" 
                   readonly onclick="getLocation()">
            
            <label>Phone *</label>
            <input type="tel" name="phone" class="checkout-input" 
                    value="{{ auth()->user()->phone ?? old('phone') }}"
                   placeholder="1234567890" required>
            
    </div>

    <div class="checkout-box order-box order">
        <h2 class="checkout-h2 text-center">Your order</h2>
      <div class="d-flex justify-content-between align-items-center">
    <label class="fw-bold fs-5 product-name">Product Name</label>
    <label class="fw-bold fs-5 product-name">Price</label>
    </div>
        @forelse($cartItems as $item)

        <div class="order-item col-md-12 gap-4"> 
                <div class="col-md-9">
                    <strong>{{ $item->p_name }} x{{ $item->p_quantity }}</strong><br>
                    <small>Size: {{ $item->size_name }} <br> Color: {{ $item->color_name }}<br>Price: ₹{{ number_format($item->final_price, 2) }}</small>
                </div>

                 <div class="col-md-3">
                <strong>₹{{ number_format($item->final_price * $item->p_quantity, 2) }}</strong>
            </div>
        </div>

        @empty
            <div class="alert alert-warning">Your cart is empty!</div>
        @endforelse
        
   
        <h5 class="text-center mb-3 mt-3">Total price with taxes</h5>
           
        <div class="order-item">
            <span>Subtotal</span>
            <span>₹{{ number_format($subtotal, 2) }}</span>
        </div>
        
        @if($discount > 0)
        <div class="order-item text-danger">
            <span>Discount</span>
            <span>- ₹{{ number_format($discount, 2) }}</span>
        </div>
        @endif
        
        <div class="order-item">
            <span>Shipping</span>
            <span>₹{{ number_format($shipping, 2) }}</span>
        </div>
        
        <div class="order-item order-total">
            <span>Total</span>
            <span>₹{{ number_format($total, 2) }}</span>
        </div>
    </div>
</div>
 </div>

            <div class=" card container p-3 mb-5">
                <h2 class="checkout-h2" style="margin-top: 20px;">Payment Method</h2>
                
                <div class="payment-option payment-selected" onclick="selectPayment(this)">
                    <input type="radio" name="payment" value="cod" checked> <strong>Cash on Delivery</strong><br>
                    <small>Pay with cash upon delivery</small>
                </div>
                
                <div class="payment-option" onclick="selectPayment(this)">
                    <input type="radio" name="payment" value="online"> <strong>Online Payment (Razorpay)</strong><br>
                    <small>Pay securely using Card, UPI, Net Banking</small>
                </div>
                
                <div style="margin-top: 15px;">
                    <input type="checkbox" style="width: auto; margin-right: 5px;" required> 
                    <small>I have read and agree to the website terms and conditions *</small>
                </div>
                
                <button type="submit" class="checkout-btn">Place Order</button>
             

            </div>
    </form>
   
   
</main>
<!-- main end -->

@push('scripts')

<script>
function getLocation() {
    const locationInput = document.getElementById('locationInput');
    
    if (navigator.geolocation) {
        locationInput.value = 'Fetching location...';
        
        navigator.geolocation.getCurrentPosition(
            function(position) {
                const lat = position.coords.latitude.toFixed(6); // 6 decimals
                const lon = position.coords.longitude.toFixed(6);
                
                // Google Maps friendly format
                locationInput.value = `${lat}, ${lon}`;
            },
            function(error) {
                let errorMsg = 'Unable to retrieve location';
                
                switch(error.code) {
                    case error.PERMISSION_DENIED:
                        errorMsg = 'Location permission denied. Please allow location access.';
                        break;
                    case error.POSITION_UNAVAILABLE:
                        errorMsg = 'Location information unavailable';
                        break;
                    case error.TIMEOUT:
                        errorMsg = 'Location request timed out';
                        break;
                }
                
                alert(errorMsg);
                locationInput.value = '';
            },
            {
                enableHighAccuracy: true,
                timeout: 10000,
                maximumAge: 0
            }
        );
    } else {
        alert('Geolocation is not supported by this browser');
    }
}

</script>

@endpush

@endsection