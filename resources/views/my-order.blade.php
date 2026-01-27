@extends('layouts.frontend-layout')

@section('title', 'My Orders')

@push('styles')
<style>
/* ================= THEME VARIABLES ================= */
:root {
    --primary-color: #FF6B35;
    --secondary-color: #FF8C42;
    --yellow-color: #FFC107;
    --light-bg: #F9F9F9;
    --dark-gray: #2d3436;
    --text-gray: #666;
}

body {
    background-color: var(--light-bg);
}

/* ================= HEADER ================= */
.order-header {
    background:#FF6B35;
    padding: 1.5rem 0;
    margin-bottom: 2rem;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    color:white;
}

.order-header h1 {
    color:white;
    font-weight: 600;
    font-size: 1.5rem;
    margin: 0;
}

/* ================= ORDER CARD ================= */
.order-card {
    background: #fff;
    border-radius: 8px;
    padding: 0;
    margin-bottom: 20px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    overflow: hidden;
}

.order-card-inner {
    display: flex;
    gap: 30px;
    padding: 30px;
}

/* ================= PRODUCT IMAGE ================= */
.order-image-wrapper {
    position: relative;
    width: 280px;
    flex-shrink: 0;
}

.order-image-wrapper img {
    width: 100%;
    border-radius: 8px;
    object-fit: cover;
}

/* ================= STATUS BADGE ================= */
.status-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    padding: 6px 16px;
    font-size: 13px;
    font-weight: 600;
    border-radius: 4px;
    color: #fff;
    background: var(--yellow-color);
    text-transform: capitalize;
}

.status-badge.completed {
    background: #4CAF50;
}

.status-badge.cancelled {
    background: #f44336;
}

.status-badge.pending {
    background: var(--yellow-color);
}

/* ================= ORDER INFO ================= */
.order-info {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.order-id {
    font-size: 14px;
    color: var(--text-gray);
    margin-bottom: 8px;
}

.product-name {
    font-weight: 600;
    color: var(--primary-color);
    font-size: 1.5rem;
    margin-bottom: 20px;
}

/* ================= META ================= */
.order-meta {
    list-style: none;
    padding: 0;
    margin-bottom: 25px;
}

.order-meta li {
    margin-bottom: 10px;
    color: var(--text-gray);
    font-size: 15px;
}

.order-meta li i {
    color: #4CAF50;
    margin-right: 5px;
}

/* ================= VARIANTS ================= */


.size-box {
    padding: 4px 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 13px;
}

.color-dot {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    display: inline-block;
    vertical-align: middle;
    border: 1px solid #ccc;
}


.size-box {
    background: #f5f5f5;
    color: var(--dark-gray);
    padding: 8px 20px;
    border-radius: 4px;
    font-weight: 600;
    border: 1px solid #e0e0e0;
    display: inline-block;
}

.color-dot {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    border: 2px solid #e0e0e0;
    display: inline-block;
}

/* ================= ORDER SUMMARY ================= */
.order-summary {
    min-width: 280px;
    background: #fff;
    padding: 30px;
    display: flex;
    flex-direction: column;
    border-left: 1px solid #f0f0f0;
}

.price {
    color: var(--primary-color);
    font-weight: 700;
    font-size: 1.3rem;
    margin-bottom: 25px;
}

/* ================= PRICE BREAKUP ================= */
.price-breakup {
    margin-bottom: 20px;
}

.price-breakup p {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    font-size: 15px;
    color: var(--text-gray);
}

.price-breakup hr {
    margin: 15px 0;
    border-color: #e0e0e0;
}

.price-breakup strong {
    display: flex;
    justify-content: space-between;
    font-size: 16px;
    color: var(--dark-gray);
}

/* ================= BUTTONS ================= */
.btn-payment-status {
    padding: 12px;
    border-radius: 4px;
    font-weight: 600;
    border: none;
    cursor: default;
    margin-bottom: 15px;
    width: 100%;
    font-size: 15px;
    background: var(--yellow-color);
    color: var(--dark-gray);
}

.btn-payment-status.paid {
    background: #4CAF50;
    color: white;
}

.action-buttons {
    display: flex;
    gap: 5px;
    width: 100%;
}

.btn-action {
    border-radius: 4px;
    font-weight: 500;
    border: none;
    cursor: pointer;
    transition: all 0.2s ease;
    flex: 1;
    font-size: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    height: 50px;
    width: 100%;
}

.btn-dark-custom {
    background: var( --primary-color);
    color: white;
    width: 100%;
}

.btn-dark-custom:hover {
    background: #1a1d1f;
    color: white;
}

.btn-outline-custom {
    border: 1px solid var(--dark-gray);
    background: white;
    color: var(--dark-gray);
}

.btn-outline-custom:hover {
    background: #f5f5f5;
}

/* ================= RESPONSIVE ================= */
@media (max-width: 992px) {
    .order-card-inner {
        flex-direction: column;
        gap: 20px;
    }

    .order-image-wrapper {
        width: 100%;
    }

    .order-summary {
        border-left: none;
        border-top: 1px solid #f0f0f0;
        padding: 20px 0 0 0;
    }
}

@media (max-width: 576px) {
    .action-buttons {
        flex-direction: column;
    }

    .product-name {
        font-size: 1.25rem;
    }

}
</style>
@endpush

@section('content')

<!-- ================= HEADER ================= -->
<div class="order-header">
    <div class="container">
        <h1>My Orders</h1>
    </div>
</div>

<!-- ================= ORDER LIST ================= -->
<div class="container mb-5">

    @foreach($allOrders as $order)

        @php
            $items = $orderItems->where('o_i_order_id', $order->o_id);
        @endphp

        @foreach($items as $item)
        <div class="order-card">
            <div class="order-card-inner">
                
                <!-- LEFT SECTION: IMAGE + INFO -->
                <div style="display: flex; gap: 30px; flex: 1;">
                    <!-- IMAGE -->
                    <div class="order-image-wrapper">
                        <span class="status-badge {{ strtolower($order->o_order_status) }}">
                            {{ ucfirst($order->o_order_status) }}
                        </span>
                        <img src="{{ $item->img_path ? asset('storage/colors/'.$item->img_path) : asset('assets/no-image.png') }}"
                             alt="{{ $item->o_i_product_name }}">
                    </div>

                    <!-- INFO -->
                    <div class="order-info">
                        <p class="order-id">ORDER #{{ $order->o_order_number }}</p>
                        <h4 class="product-name">{{ $item->o_i_product_name }}</h4>

                        <ul class="order-meta">
                            <li><i class="ri-checkbox-circle-fill"></i> Payment: {{ ucfirst($order->o_payment_method) }}</li>
                            <li><i class="ri-checkbox-circle-fill"></i> Quantity: {{ $item->o_i_quantity }}</li>
                            <li><i class="ri-checkbox-circle-fill"></i> Status: {{ ucfirst($order->o_order_status) }}</li>
                        </ul>

                        <div class="variants-section">
                            <strong>Size:</strong>
                            <span class="size-box">{{ $item->o_i_size }}</span>

                            &nbsp;&nbsp;

                            <strong>Color:</strong>
                            @if($item->color_code)
                                <span class="color-dot" style="background: {{ $item->color_code }}"></span>
                            @else
                                <small style="color:red;">N/A</small>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- RIGHT SECTION: SUMMARY -->
                <div class="order-summary">
                    <div class="price-breakup">
                        <p><span>Subtotal:</span>
                            <span>₹{{ number_format($item->o_i_total_price, 2) }}</span>
                        </p>

                        <p><span>Shipping:</span>
                            <span>
                                ₹{{ number_format($order->o_shipping_cost / max(1, $items->count()), 2) }}
                            </span>
                        </p>

                        <p><span>Quantity:</span>
                            <span>{{ $item->o_i_quantity }}</span>
                        </p>

                        <hr>

                        <strong>
                            <span>Total:</span>
                            <span class="price">
                                ₹{{ number_format(
                                    $item->o_i_total_price + ($order->o_shipping_cost / max(1, $items->count())),
                                    2
                                ) }}
                            </span>
                        </strong>
                    </div>

                    <button class="btn-payment-status {{ strtolower($order->o_payment_status) }}">
                        Payment {{ ucfirst($order->o_payment_status) }}
                    </button>

                    <div class="action-buttons">
                        <a href="{{ route('view.details', ['orderId' => $order->o_id]) }}"
                           class="btn-action btn-dark-custom">
                            <i class="ri-shopping-bag-line"></i> View Details
                        </a>

                        <a href="{{ route('order.track', ['order_number' => $order->o_order_number]) }}"
                           class="btn-action btn-outline-custom">
                            <i class="ri-truck-line"></i> Track Order
                        </a>
                    </div>
                </div>

            </div>
        </div>
        @endforeach

    @endforeach

</div>



@endsection
