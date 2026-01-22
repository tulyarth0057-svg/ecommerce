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
@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif


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
                    <label>Pincode *</label>
                    <input type="text" name="postcode" class="checkout-input" 
                           value="{{ old('postcode') }}" required>
                </div>
            </div>
            
            <label>State</label>
            <input type="text" name="state" class="checkout-input" value="{{ old('state') }}">
            
            <label>Location</label>

                   <input type="text" name="location" class="checkout-input" 
       id="locationInput" value="{{ old('location') }}"
       placeholder="📍 Click here to get your current location" 
       readonly onclick="getLocation()">

<div  style="margin-top: 10px; color: #666;"></div>
            
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
                <span id="shippingInfo">₹0.00</span>
            </div>
            
            <div class="order-item total">
                <span><strong>Total</strong></span>
                <span id="totalAmount" data-subtotal="{{ $subtotal }}">
                    ₹{{ number_format($subtotal, 2) }}
                </span>
            </div>
        </div>

        {{-- Hidden Inputs --}}
        <input type="hidden" name="shipping_charge" id="shippingCharge" value="0">
        <input type="hidden" name="distance_km" id="distanceKm" value="0">



</div>
 </div>

            <div class=" card container p-3 mb-5">
                <h2 class="checkout-h2" style="margin-top: 20px;">Payment Method</h2>
                
                <div class="payment-option payment-selected" onclick="selectPayment(this)">
                    <input type="radio" name="payment" value="cash" checked> <strong>Cash on Delivery</strong><br>
                    <small>Pay with cash upon delivery</small>
                </div>
                
                <div class="payment-option" onclick="selectPayment(this)">
                    <input type="radio" name="payment" value="online"> <strong>Online Payment (Razorpay)</strong><br>
                    <small>Pay securely using Card, UPI, Net Banking</small>
                </div>
                
                <button type="submit" class="checkout-btn" id="placeOrderBtn">
    Place Order
</button>


             

            </div>
    </form>
   
   
</main>
<!-- main end -->

@push('scripts')


@if(session('success_order'))
<script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        title: 'Order Placed Successfully!',
        text: 'Thank you for shopping with us.',
        icon: 'success',
        confirmButtonText: 'View Order',
        allowOutsideClick: false
    }).then(() => {
        window.location.href = "{{ route('order.success', session('success_order')) }}";
    });
});
</script>
@endif




<label>Location</label>


<script>
// Your shop/warehouse location (Dehradun coordinates)
const SHOP_LAT = 30.3165;
const SHOP_LON = 78.0322;

// Shipping rates
const BASE_CHARGE = 50; // Base shipping charge
const RATE_PER_KM = 10; // Rs 10 per km

function getLocation() {
    const locationInput = document.getElementById('locationInput');
    const shippingInfo = document.getElementById('shippingInfo');
    
    if (navigator.geolocation) {
        locationInput.placeholder = "🔄 Getting your location...";
        shippingInfo.innerHTML = "🔄 Calculating shipping...";
        
        navigator.geolocation.getCurrentPosition(
            function(position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                
                // Fill location
                locationInput.value = `${latitude}, ${longitude}`;
                
                // Calculate distance
                const distance = calculateDistance(SHOP_LAT, SHOP_LON, latitude, longitude);
                
                // Calculate shipping charges
                const shippingCharge = BASE_CHARGE + (distance * RATE_PER_KM);
                
                // Update UI
                locationInput.placeholder = "📍 Location filled";
                shippingInfo.innerHTML = `₹${shippingCharge.toFixed(2)}`;
                
                // Update hidden inputs and total
                updateShippingCharge(shippingCharge, distance);
            },
            function(error) {
                switch(error.code) {
                    case error.PERMISSION_DENIED:
                        alert("Please allow location access in your browser.");
                        break;
                    case error.POSITION_UNAVAILABLE:
                        alert("Location unavailable. Please check your GPS.");
                        break;
                    case error.TIMEOUT:
                        alert("Request timed out. Please try again.");
                        break;
                }
                locationInput.placeholder = "📍 Click here to get your current location";
                shippingInfo.innerHTML = "₹0.00";
            },
            {
                enableHighAccuracy: true,
                timeout: 30000,
                maximumAge: 60000
            }
        );
    } else {
        alert("Your browser doesn't support geolocation.");
    }
}

// Calculate distance using Haversine formula
function calculateDistance(lat1, lon1, lat2, lon2) {
    const R = 6371; // Earth's radius in km
    const dLat = toRad(lat2 - lat1);
    const dLon = toRad(lon2 - lon1);
    
    const a = Math.sin(dLat/2) * Math.sin(dLat/2) +
              Math.cos(toRad(lat1)) * Math.cos(toRad(lat2)) *
              Math.sin(dLon/2) * Math.sin(dLon/2);
    
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
    const distance = R * c;
    
    return distance;
}

function toRad(degrees) {
    return degrees * (Math.PI / 180);
}


// ✅ UPDATE SHIPPING CHARGE AND TOTAL (BOTH PLACES)
function updateShippingCharge(charge, distance) {
    // Update shipping charge hidden input
    document.getElementById('shippingCharge').value = charge.toFixed(2);
    
    // Update distance hidden input
    document.getElementById('distanceKm').value = distance.toFixed(2);
    
    // ✅ UPDATE BOTH TOTAL ELEMENTS
    const totalElement = document.getElementById('totalAmount');
    const totalElementBottom = document.getElementById('totalAmountBottom');
    
    const subtotal = parseFloat(totalElement.dataset.subtotal);
    const newTotal = subtotal + charge;
    
    // Update top total
    totalElement.textContent = `₹${newTotal.toFixed(2)}`;
    
    // ✅ Update bottom total
    totalElementBottom.textContent = `₹${newTotal.toFixed(2)}`;
    
    console.log('Shipping Updated:', {
        distance: distance.toFixed(2) + ' km',
        shipping: '₹' + charge.toFixed(2),
        subtotal: '₹' + subtotal.toFixed(2),
        total: '₹' + newTotal.toFixed(2)
    });
}
</script>

<script>
document.querySelector('form').addEventListener('submit', function () {
    const btn = document.getElementById('placeOrderBtn');
    btn.disabled = true;
    btn.innerText = 'Processing...';
});
</script>



@endpush

@endsection