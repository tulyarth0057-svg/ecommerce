@extends('layouts.frontend-layout')

@section('title', 'Order Details')

@section('content')
<div class="order-container">

    <!-- Order Header -->
    <div class="order-header">
        <h1>Order #{{ optional($order)->o_order_number }}</h1>
        <p>Placed on {{ \Carbon\Carbon::parse($order->o_created_at)->format('d M Y') }}</p>
    </div>

    <!-- Order Info -->
    <div class="card order-card mb-4">
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Order Number</div>
                <div class="info-value">{{ optional($order)->o_order_number }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Order Date</div>
                <div class="info-value">{{ \Carbon\Carbon::parse($order->o_created_at)->format('d M Y') }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Payment Method</div>
                <div class="info-value">{{ ucfirst(optional($order)->o_payment_method) }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Payment Status</div>
                <div class="info-value">{{ ucfirst(optional($order)->o_payment_status) }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Order Status</div>
                <div class="info-value">{{ ucfirst(optional($order)->o_order_status) }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Total Amount</div>
                <div class="info-value highlight">₹{{ number_format($grandTotal, 2) }}</div>
            </div>
        </div>
    </div>

    <!-- Shipping Address -->
    <div class="card order-card mb-4">
        <h5>Shipping Address</h5>
        <div class="address-content">
            <p>Name: {{ optional($order)->o_name }}</p>
            <p>Email: {{ optional($order)->o_email }}</p>
            <p>Phone: {{ optional($order)->o_phone }}</p>
            <p>Address: {{ optional($order)->o_street_address }}, {{ optional($order)->o_city }}, {{ optional($order)->o_state }} - {{ optional($order)->o_postcode }}</p>
        </div>
    </div>

    <!-- Products -->
    <div class="card order-card mb-4">
        <h5>Products</h5>
        @foreach($orderItems as $item)
        <div class="card mb-3">
            <div class="row g-0">
                <!-- Image -->
                <div class="col-md-4">
                    <img src="{{ $item->img_path ? asset('storage/colors/'.$item->img_path) : asset('assets/no-image.png') }}"
                         class="w-100" alt="{{ $item->o_i_product_name }}">
                </div>
                <!-- Info -->
                <div class="col-md-8">
                    <div class="card-body">
                        <h5>{{ $item->o_i_product_name }}</h5>
                        <p>Quantity: {{ $item->o_i_quantity }}</p>
                        <p>Size: {{ $item->o_i_size ?? 'N/A' }}</p>
                        @if($item->color_code)
                        <p>Color: <span style="display:inline-block;width:20px;height:20px;background:{{ $item->color_code }}"></span></p>
                        @endif
                        <p>Subtotal: ₹{{ number_format($item->o_i_total_price,2) }}</p>
                        <p>Shipping: ₹{{ number_format(optional($order)->o_shipping_cost / max(count($orderItems),1),2) }}</p>
                        <p>Total: ₹{{ number_format($item->o_i_total_price + (optional($order)->o_shipping_cost / max(count($orderItems),1)),2) }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Payment Status -->
    <div class="mb-4">
        <button class="payment-status-btn {{ strtolower(optional($order)->o_payment_status)=='paid'?'payment-paid':'payment-pending' }}">
            Payment {{ ucfirst(optional($order)->o_payment_status) }}
        </button>
    </div>

</div>
@endsection
