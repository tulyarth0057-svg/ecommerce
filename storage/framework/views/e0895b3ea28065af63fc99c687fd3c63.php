<?php $__env->startSection('title', 'checkout'); ?>

<?php $__env->startPush('styles'); ?>
<style>
   * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

/* Page background */
body {
    background: #f9fafb;
}

/* Container */
.checkout-container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 20px;
     
}

/* Grid */
.checkout-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 24px;
}

/* Card */
.checkout-box {
    background: #ffffff;
    padding: 28px;
    border-radius: 14px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
     border: 2px solid #ff6b35;
}

/* Order box highlight */
.order-box {
    border: 2px solid #ff6b35;
}

/* Headings */
.checkout-h2 {
    color: #ff6b35;
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 20px;
    border-bottom: 1px solid #ffe4cc;
    padding-bottom: 10px;
}

/* Labels */
label {
    font-size: 14px;
    font-weight: 500;
    color: #374151;
    margin-top: 10px;
    display: block;
}

/* Inputs */
.checkout-input {
    width: 100%;
    padding: 12px 16px;
    margin-top: 6px;
    border-radius:10px;
    border: 1.8px solid #ffb380;
    font-size: 14px;
    background: #fff;
    transition: all 0.25s ease;
}

.checkout-input-textarea{
  width: 100%;
    height: 150px;
    margin-top: 6px;
    border-radius: 10px;
    border: 1.8px solid #ffb380;
    font-size: 14px;
    background: #fff;
    transition: all 0.25s ease;
}

.checkout-input:focus {
    border-color: #ff6b35;
    box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.15);
    outline: none;
}

/* Textarea */
textarea.checkout-input {
    border-radius: 18px;
    resize: none;
}

/* Two column row */
.checkout-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
}

/* Order items */
.order-item {
    display: flex;
    justify-content: space-between;
    padding: 14px 0;
    border-bottom: 1px dashed #ffe4cc;
    font-size: 14px;
}

.order-item strong {
    color: #111827;
}

.product-name {
    color: #ff6b35;
    font-weight: 600;
}

/* Totals */
.order-item.total {
    border-top: 2px solid #ff6b35;
    margin-top: 12px;
    padding-top: 14px;
    font-size: 16px;
    font-weight: 600;
}

/* Payment options */
.payment-option {
    padding: 5px;
    border: 2px solid #e5e7eb;
    border-radius: 10px;
    margin-bottom: 12px;
    cursor: pointer;
    transition: all 0.25s ease;
    background: #fff;
}

.payment-option input {
    margin-right: 8px;
}

.payment-option:hover {
    border-color: #ff6b35;
    background: #fff5eb;
}

.payment-selected {
    border-color: #ff6b35;
    background: #fff5eb;
}

/* Button */
.checkout-btn {
    width: 100%;
    background: linear-gradient(135deg, #ff6b35, #ff5722);
    color: #ffffff;
    border: none;
    padding: 14px;
    border-radius: 999px;
    font-size: 16px;
    font-weight: 600;
    margin-top: 18px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.checkout-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 8px 18px rgba(255, 107, 53, 0.4);
}

/* Alerts */
.alert {
    border-radius: 12px;
    padding: 14px;
    font-size: 14px;
}

/* Mobile */
@media (max-width: 768px) {
    .checkout-grid {
        grid-template-columns: 1fr;
    }

    .checkout-container {
        padding: 12px;
    }
}

</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<!-- breadcrumb-area start -->
<div class="breadcrumb-area ptb-30 bg-img text-center" data-bgimg="assets/image/other/breadcrumb-bgimg.jpg">
    <div class="container">
        <span class="d-block extra-color"><a href="/" class="extra-color">Home</a> / Checkout</span>
        <h2 class="extra-color font-24 font-xl-32 mst-5 mst-xl-9">Checkout</h2>
    </div>
</div>
<!-- breadcrumb-area end -->
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <div><?php echo e($error); ?></div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<!-- main start -->
<main id="main">
    <div class="checkout-container">
        <div class="checkout-grid">
    <div class="checkout-box">
        <h2 class="checkout-h2">Billing details</h2>
       <form id="checkoutForm" action="<?php echo e(route('checkout.process')); ?>" method="POST">

            <?php echo csrf_field(); ?>
            <label>Email address *</label>
            <input type="email" name="email" class="checkout-input" 
                   value="<?php echo e(auth()->user()->email ?? old('email')); ?>" 
                   placeholder="Enter your email" required>
            
            <label>Name *</label>
            <input type="text" name="name" class="checkout-input" 
                   value="<?php echo e(auth()->user()->name ?? old('name')); ?>" 
                   placeholder="Enter your name" required>
            
            <label>Street address *</label>
            <input type="text" name="address" class="checkout-input" 
                   value="<?php echo e(old('address')); ?>" 
                   placeholder="House number and street name" required>
            
            <div class="checkout-row">
                <div>
                    <label>Town / City *</label>
                    <input type="text" name="city" class="checkout-input" 
                           value="<?php echo e(old('city')); ?>" placeholder="Enter your city name" required>
                </div>
                <div>
                    <label>Pincode *</label>
                    <input type="text" name="postcode" class="checkout-input" 
                           value="<?php echo e(old('postcode')); ?>" placeholder="Enter your pincode" required>
                </div>
            </div>
            
            <label>State</label>
            <input type="text" name="state" class="checkout-input" value="<?php echo e(old('state')); ?>" placeholder="Enter your state" required>
            
            <label>Location</label>

                   <input type="text" name="location" class="checkout-input" 
       id="locationInput" value="<?php echo e(old('location')); ?>"
       placeholder="📍 Click here to get your current location" 
       readonly onclick="getLocation()" required>

<div  style="margin-top: 10px; color: #666;"></div>

<input type="hidden" name="latitude" id="latitude">
<input type="hidden" name="longitude" id="longitude">

            
            <label>Phone *</label>
            <input type="tel" name="phone" class="checkout-input" 
                    value="<?php echo e(auth()->user()->phone ?? old('phone')); ?>"
                   placeholder="Enter your Number" required>

                  
            <label class="mt-3" for="message">Message (optional) </label>
            <textarea name="o_order_notes" class="checkout-input-textarea" placeholder=" leave a message"></textarea>
            <small>500 words maximum</small>

    </div>

    

    <div class="checkout-box order-box order">
        <h2 class="checkout-h2 text-center">Your order</h2>
      <div class="d-flex justify-content-between align-items-center">
    <label class="fw-bold fs-5 product-name">Product Name</label>
    <label class="fw-bold fs-5 product-name">Price</label>
    </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>

        <div class="order-item col-md-12 gap-4"> 
                <div class="col-md-9">
                    <strong><?php echo e($item->p_name); ?> x<?php echo e($item->p_quantity); ?></strong><br>
                    <small>Size: <?php echo e($item->size_name); ?> <br> Color: <?php echo e($item->color_name); ?><br>Price: ₹<?php echo e(number_format($item->final_price, 2)); ?></small>
                </div>

                 <div class="col-md-3">
                <strong>₹<?php echo e(number_format($item->final_price * $item->p_quantity, 2)); ?></strong>
            </div>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            <div class="alert alert-warning">Your cart is empty!</div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        
   
        <h5 class="text-center mb-3 mt-3">Total price with taxes</h5>
           
        <div class="order-item">
            <span>Subtotal</span>
            <span>₹<?php echo e(number_format($subtotal, 2)); ?></span>
        </div>
        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($discount > 0): ?>
        <div class="order-item text-danger">
            <span>Discount</span>
            <span>- ₹<?php echo e(number_format($discount, 2)); ?></span>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        
       <div class="order-item">
                <span>Shipping</span>
                <span id="shippingInfo">₹0.00</span>
            </div>
            
            <div class="order-item total">
                <span><strong>Total</strong></span>
                <span id="totalAmount" data-subtotal="<?php echo e($subtotal); ?>">
                    ₹<?php echo e(number_format($subtotal, 2)); ?>

                </span>
            </div>

            
<hr class="divider">

<h2 class="checkout-h2 text-center">Payment Method</h2>

<div class="payment-option payment-selected" onclick="selectPayment(this)">
    <input type="radio" name="payment" value="cash" checked>
    <strong>Cash on Delivery</strong><br>
    <small>Pay with cash upon delivery</small>
</div>

<div class="payment-option" onclick="selectPayment(this)">
    <input type="radio" id="onlinePayment" name="payment" value="online">
    <strong>Online Payment (Razorpay)</strong><br>
    <small>Pay securely using Card, UPI, Net Banking</small>
</div>

<!-- Pay Now button, hidden by default -->
<button type="button" id="payNowBtn" class="checkout-btn" style="display:none;">
    Pay Now
</button>

<!-- Place Order for COD -->
<button type="submit" id="placeOrderBtn" class="checkout-btn">
    Place Order
</button>





        </div>

        
    <input type="hidden" name="shipping_charge" id="shippingCharge" value="0">
     <input type="hidden" name="distance_km" id="distanceKm" value="0">

</form>

</div>

 </div>

</main>

<?php $__env->stopSection(); ?>
<!-- main end -->

<?php $__env->startPush('scripts'); ?>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>



<script>
document.addEventListener('DOMContentLoaded', function () {

    const form = document.querySelector('#checkoutForm');
    const payNowBtn = document.getElementById('payNowBtn');
    const placeOrderBtn = document.getElementById('placeOrderBtn');

    function resetPayBtn() {
        payNowBtn.disabled = false;
        payNowBtn.innerText = 'Pay Now';
    }

    window.selectPayment = function(el) {
        document.querySelectorAll('.payment-option')
            .forEach(opt => opt.classList.remove('payment-selected'));

        el.classList.add('payment-selected');

        const method = el.querySelector('input').value;
        el.querySelector('input').checked = true;

        payNowBtn.style.display = method === 'online' ? 'block' : 'none';
        placeOrderBtn.style.display = method === 'cash' ? 'block' : 'none';
    };

    payNowBtn.addEventListener('click', async function () {
        payNowBtn.disabled = true;
        payNowBtn.innerText = 'Processing...';

        try {
            // Total amount को सही से parse करो (comma या space भी handle कर सकता है)
            const totalText = document.getElementById('totalAmount').innerText;
            const total = parseFloat(totalText.replace(/[^0-9.]/g, '')); 
            if (isNaN(total) || total <= 0) {
                throw new Error("Invalid amount");
            }

            const amountInPaise = Math.round(total * 100);

            const res = await fetch("<?php echo e(route('razorpay.create')); ?>", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                    "Accept": "application/json"
                },
                body: JSON.stringify({ amount: total })  // rupees में भेजो, backend paise में convert करेगा
            });

            if (!res.ok) {
                const errData = await res.json();
                throw new Error(errData.message || "Failed to create order");
            }

            const data = await res.json();

            if (!data.razorpay_order_id) {
                throw new Error("No order ID received");
            }

            const options = {
                key: "<?php echo e(config('services.razorpay.key')); ?>",
                amount: amountInPaise,
                currency: "INR",
                name: "Rimberio",
                description: "Order Payment",  // optional लेकिन अच्छा लगता है
                order_id: data.razorpay_order_id,

                // Theme customize (तुम्हारा favorite color डाल सकती हो)
                theme: {
                    color: "#e91e63"   // pinkish, या जो चाहो
                },

                // Prefill ज्यादा info → बेहतर UX
                prefill: {
                    name: "<?php echo e(auth()->user()->name ?? ''); ?>",
                    email: "<?php echo e(auth()->user()->email ?? ''); ?>",
                    contact: "<?php echo e(auth()->user()->phone ?? auth()->user()->mobile ?? ''); ?>"  // अगर phone field है तो add करो
                },

               handler: async function (response) {
    try {
        const formData = Object.fromEntries(new FormData(form));

        const verifyRes = await fetch("<?php echo e(route('razorpay.verify')); ?>", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                "Accept": "application/json"
            },
            body: JSON.stringify({
                razorpay_payment_id: response.razorpay_payment_id,
                razorpay_order_id: response.razorpay_order_id,
                razorpay_signature: response.razorpay_signature,
                formData: formData
            })
        });

        const result = await verifyRes.json();

        if (result.success) {
            Swal.fire({
                title: 'Order Placed Successfully!',
                text: 'Thank you for shopping with us.',
                icon: 'success',
                confirmButtonText: 'View Order',
                allowOutsideClick: false
            }).then(() => {
                window.location.href = "/order/success/" + result.order_id;
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Payment Failed',
                text: result.message || 'Something went wrong!'
            });
            resetPayBtn();
        }
    } catch (err) {
        console.error(err);
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Payment processed but verification failed. Please contact support.'
        });
        resetPayBtn();
    }
},


                modal: {
                    ondismiss: function () {
                        resetPayBtn();
                        // alert("Payment popup closed");  // optional
                    }
                },

                // Optional: notes add कर सकते हो backend verification के लिए
                // notes: { address: "some info" }
            };

            const rzp = new Razorpay(options);

            rzp.on('payment.failed', function (response) {
                alert(response.error.description || "Payment failed");
                resetPayBtn();
            });

            rzp.open();

        } catch (e) {
            console.error("Payment init error:", e);
            alert(e.message || "Something went wrong. Please try again.");
            resetPayBtn();
        }
    });
});
</script>



<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success_order')): ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        title: 'Order Placed Successfully!',
        text: 'Thank you for shopping with us.',
        icon: 'success',
        confirmButtonText: 'View Order',
        allowOutsideClick: false
    }).then(() => {
        window.location.href = "<?php echo e(route('order.success', session('success_order'))); ?>";
    });
});
</script>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>





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
                
                // ✅ Fill hidden inputs for database
                document.getElementById('latitude').value = latitude;
                document.getElementById('longitude').value = longitude;
                
                // Fill location display
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
                
                // ✅ Debug - check values
                console.log('Location captured:', {
                    latitude: latitude,
                    longitude: longitude,
                    distance: distance.toFixed(2) + ' km',
                    shipping: '₹' + shippingCharge.toFixed(2)
                });
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

// ✅ UPDATE SHIPPING CHARGE AND TOTAL
function updateShippingCharge(charge, distance) {
    // Update shipping charge hidden input
    document.getElementById('shippingCharge').value = charge.toFixed(2);
    
    // Update distance hidden input
    document.getElementById('distanceKm').value = distance.toFixed(2);
    
    // Update shipping display
    document.getElementById('shippingInfo').innerHTML = `₹${charge.toFixed(2)}`;
    
    // Update total amount
    const totalElement = document.getElementById('totalAmount');
    const subtotal = parseFloat(totalElement.dataset.subtotal);
    const newTotal = subtotal + charge;
    
    totalElement.textContent = `₹${newTotal.toFixed(2)}`;
    
    // ✅ If you have bottom total element too
    const totalElementBottom = document.getElementById('totalAmountBottom');
    if (totalElementBottom) {
        totalElementBottom.textContent = `₹${newTotal.toFixed(2)}`;
    }
    
    console.log('Shipping Updated:', {
        distance: distance.toFixed(2) + ' km',
        shipping: '₹' + charge.toFixed(2),
        subtotal: '₹' + subtotal.toFixed(2),
        total: '₹' + newTotal.toFixed(2)
    });
}

// ✅ Form submit validation
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function(e) {
        const latitude = document.getElementById('latitude').value;
        const longitude = document.getElementById('longitude').value;
        
        // Check if location is filled
        if (!latitude || !longitude) {
            e.preventDefault();
            alert('Please click on the location field to get your current location!');
            return false;
        }
        
        const btn = document.getElementById('placeOrderBtn');
        if (btn) {
            btn.disabled = true;
            btn.innerText = 'Processing...';
        }
    });
});
</script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.frontend-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel_git\ecommerce-web\resources\views/checkout.blade.php ENDPATH**/ ?>