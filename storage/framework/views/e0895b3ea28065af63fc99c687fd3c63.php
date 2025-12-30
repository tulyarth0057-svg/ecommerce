<?php $__env->startSection('title', 'checkout'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    .checkout-container { max-width: 1200px; margin: 0 auto; padding: 20px; }
    .checkout-breadcrumb { color: #ff6b35; margin-bottom: 20px; font-size: 14px; }
    .checkout-title { color: #ff6b35; font-size: 36px; margin-bottom: 30px; }
    .checkout-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 20px; }
    .checkout-box { background: white; padding: 25px; border-radius: 8px; }
    .order-box { border: 2px solid #ff6b35; }
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

<!-- main start -->
<main id="main">
    <div class="checkout-container">
        <div class="checkout-grid">
            <div class="checkout-box">
                <h2 class="checkout-h2">Billing details</h2>
                
                    <?php echo csrf_field(); ?>
                    <label>Email address *</label>
                    <input type="email" name="email" class="checkout-input" placeholder="user@gmail.com" required>
                    
                    <label>Name *</label>
                    <input type="text" name="name" class="checkout-input" placeholder="user" required>
                    
                    <label>Street address *</label>
                    <input type="text" name="address" class="checkout-input" placeholder="House number and street name" required>
                    
                    <div class="checkout-row">
                        <div>
                            <label>Town / City *</label>
                            <input type="text" name="city" class="checkout-input" required>
                        </div>
                        <div>
                            <label>Postcode *</label>
                            <input type="text" name="postcode" class="checkout-input" required>
                        </div>
                    </div>
                    
                    <label>State</label>
                    <input type="text" name="state" class="checkout-input">
                    
                    <label>Location</label>
                    <input type="text" name="location" class="checkout-input" id="locationInput" placeholder="📍 Click here to auto-fill GPS location" readonly onclick="getLocation()">
                    
                    <label>Phone *</label>
                    <input type="tel" name="phone" class="checkout-input" placeholder="1234567890" required>
                </form>
            </div>

            <div class="checkout-box order-box">
                <h2 class="checkout-h2">Your order</h2>
                
                <div class="order-item">
                    <div>
                        <strong>Mehndi georgette suit x 5</strong><br>
                        <small>Size: XL | Price: ₹0.00</small>
                    </div>
                    <strong>₹0.00</strong>
                </div>
                
                <div class="order-item">
                    <div>
                        <strong>Green Lehenga x 5</strong><br>
                        <small>Size: M | Price: ₹0.00</small>
                    </div>
                    <strong>₹0.00</strong>
                </div>
                
                <div class="order-item">
                    <span>Subtotal</span>
                    <span>₹0.00</span>
                </div>
                
                <div class="order-item">
                    <span>Shipping</span>
                    <span>₹10.00</span>
                </div>
                
                <div class="order-item order-total">
                    <span>Total</span>
                    <span>₹10.00</span>
                </div>
                
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
        </div>
    </div>
</main>
<!-- main end -->

<?php $__env->startPush('scripts'); ?>
<script>
    function selectPayment(element) {
        document.querySelectorAll('.payment-option').forEach(p => p.classList.remove('payment-selected'));
        element.classList.add('payment-selected');
        element.querySelector('input').checked = true;
    }

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                document.getElementById('locationInput').value = position.coords.latitude + ', ' + position.coords.longitude;
            }, function() {
                alert('Unable to retrieve location');
            });
        } else {
            alert('Geolocation is not supported by this browser');
        }
    }
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel_git\ecommerce-web\resources\views/checkout.blade.php ENDPATH**/ ?>