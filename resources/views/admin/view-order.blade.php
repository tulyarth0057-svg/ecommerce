@extends('layouts.frontend-layout')

@section('title', 'View Order')

@push('styles')
<style>
    :root {
        --orange-primary: #f97316;
        --orange-dark: #ea580c;
    }

    .order-container { max-width:1200px; margin:0 auto; padding:2rem 1rem; }
    .order-header { background:linear-gradient(135deg,var(--orange-primary),var(--orange-dark)); border-radius:10px; padding:2rem; color:white; margin-bottom:2rem; }
    .order-card { border-radius:10px; box-shadow:0 10px 30px rgba(0,0,0,0.08); background:white; margin-bottom:2rem; }
    .info-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:1rem; padding:1.5rem; }
    .info-label { font-size:0.8rem; color:#6b7280; text-transform:uppercase; }
    .info-value { font-weight:600; }

    .product-card { display:flex; flex-wrap:wrap; border:1px solid #eee; border-radius:10px; margin-bottom:1.5rem; overflow:hidden; }
    .product-image { width:250px; height:200px; object-fit:cover; }
    .product-details { flex:1; padding:1rem 1.5rem; }

    .payment-paid { background:#16a34a; color:white; padding:1rem; border-radius:10px; text-align:center; }
    .payment-pending { background:#f59e0b; color:white; padding:1rem; border-radius:10px; text-align:center; }
</style>
@endpush

@section('content')
<div class="order-container">

    {{-- ORDER HEADER --}}
    {{-- <div class="order-header">
        <h1>Order #{{ $order->o_order_number }}</h1>
        <p>Placed on {{ $order->o_created_at?->format('d M Y, h:i A') }}</p>
    </div> --}}

    {{-- ORDER INFO --}}
    {{-- <div class="order-card">
        <div class="info-grid">
            <div><div class="info-label">Order ID</div><div class="info-value">{{ $order->o_id }}</div></div>
            <div><div class="info-label">User ID</div><div class="info-value">{{ $order->o_user_id }}</div></div>
            <div><div class="info-label">Payment</div><div class="info-value">{{ ucfirst($order->o_payment_method) }}</div></div>
            <div><div class="info-label">Status</div><div class="info-value">{{ ucfirst($order->o_order_status) }}</div></div>
            <div><div class="info-label">Total</div><div class="info-value">₹{{ number_format($order->o_total_amount,2) }}</div></div>
        </div>
    </div> --}}

    {{-- SHIPPING ADDRESS --}}
    {{-- <div class="order-card">
        <div class="info-grid">
            <div><div class="info-label">Name</div><div class="info-value">{{ $order->o_name }}</div></div>
            <div><div class="info-label">Email</div><div class="info-value">{{ $order->o_email }}</div></div>
            <div><div class="info-label">Phone</div><div class="info-value">{{ $order->o_phone }}</div></div>
            <div>
                <div class="info-label">Address</div>
                <div class="info-value">
                    {{ $order->o_street_address }},
                    {{ $order->o_city }},
                    {{ $order->o_state }} - {{ $order->o_postcode }}
                </div>
            </div>
        </div>
    </div> --}}

    {{-- PRODUCTS LOOP (ONLY HERE) --}}
    @foreach($orderItems as $item)
        <div class="product-card">
            <img class="product-image"
                 src="{{ $item->img_path ? asset('storage/colors/'.$item->img_path) : asset('assets/no-image.png') }}">

            <div class="product-details">
                <h5>{{ $item->o_i_product_name }}</h5>
                <p>Qty: {{ $item->o_i_quantity }}</p>
                <p>Price: ₹{{ number_format($item->o_i_total_price,2) }}</p>
            </div>
        </div>
    @endforeach

    {{-- PAYMENT STATUS --}}
    {{-- <div class="{{ $order->o_payment_status === 'paid' ? 'payment-paid' : 'payment-pending' }}">
        Payment {{ ucfirst($order->o_payment_status) }}
    </div> --}}

    {{-- ACTIONS --}}
    <div style="margin-top:1rem">
        <a href="{{ route('order.list') }}">← Back to Orders</a>
    </div>

</div>
@endsection
