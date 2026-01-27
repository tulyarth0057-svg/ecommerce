@extends('layouts.frontend-layout')

@section('title', 'View order')

@push('styles')
<style>
    /* ================= Custom Styles ================= */
    :root {
        --orange-primary: #f97316;
        --orange-dark: #ea580c;
        --orange-light: #ffedd5;
        --orange-50: #fff7ed;
    }

    .order-container { max-width: 1200px; margin: 0 auto; padding: 2rem 1rem; }
    .order-header { background: linear-gradient(135deg, var(--orange-primary) 0%, var(--orange-dark) 100%); border-radius:10px; padding: 2.5rem; margin-bottom: 2.5rem; box-shadow: 0 20px 40px rgba(249, 115, 22, 0.25); position: relative; overflow: hidden; }
    .order-header::before { content: ''; position: absolute; top: -50%; right: -10%; width: 300px; height: 300px; background: rgba(255, 255, 255, 0.1); border-radius: 50%; }
    .order-header h1 { font-size: 2rem; font-weight: 700; margin: 0; color: white; position: relative; z-index: 1; }
    .order-header p { color: rgba(255, 255, 255, 0.9); margin: 0.5rem 0 0 0; position: relative; z-index: 1; }

    .order-card { border: none;border-radius:10px; overflow: hidden; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08); transition: all 0.3s ease; background: white; }
    .order-card:hover { transform: translateY(-5px); box-shadow: 0 15px 40px rgba(249, 115, 22, 0.15); }

    .info-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; padding: 2rem; }
    .info-item { display: flex; flex-direction: column; gap: 0.5rem; }
    .info-label { font-size: 0.85rem; color: #6b7280; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px; display: flex; align-items: center; gap: 0.5rem; }
    .info-label i { color: var(--orange-primary); font-size: 1.1rem; }
    .info-value { font-size: 1.1rem; color: #1f2937; font-weight: 600; }
    .info-value.highlight { color: var(--orange-primary); font-size: 1.5rem; }

    .section-header { display: flex; align-items: center; gap: 0.75rem; padding: 1.5rem 2rem; background: linear-gradient(135deg, var(--orange-primary) 0%, var(--orange-dark) 100%); border-bottom: 2px solid #fed7aa; color:white; }
    .section-header i { font-size: 1.5rem; color:white; }
    .section-header h5 { margin: 0; font-size: 1.25rem; font-weight: 700; color:white; }

    .address-content { padding: 2rem; }
    .address-item { display: flex; align-items: start; gap: 1rem; padding: 0.75rem; margin-bottom: 0.75rem; background: var(--orange-50); border-radius: 0.75rem; transition: all 0.3s ease; }
    .address-item:hover { background: var(--orange-light); transform: translateX(5px); }
    .address-item i { color: var(--orange-primary); font-size: 1.25rem; margin-top: 0.25rem; }
    .address-text .name { font-weight: 700; color: #1f2937; font-size: 1.1rem; margin-bottom: 0.25rem; }
    .address-text .detail { color: #4b5563; line-height: 1.6; }

    .product-image-wrapper { position: relative; overflow: hidden; background: linear-gradient(135deg, var(--orange-50) 0%, #fef3c7 100%); height: 100%; min-height: 450px; display: flex; align-items: center; justify-content: center; }
    .product-image { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
    .order-card:hover .product-image { transform: scale(1.08); }

    .status-badge { position: absolute; top: 1.5rem; left: 1.5rem; padding: 0.75rem 1.5rem; border-radius: 3rem; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); z-index: 10; backdrop-filter: blur(10px); }
    .status-completed { background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; }
    .status-cancelled { background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); color: white; }
    .status-pending { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); color: white; }

    .card-body { padding: 2.5rem; }
    .product-title { font-size: 1.75rem; font-weight: 700; color: #1f2937; margin-bottom: 1.5rem; line-height: 1.3; }
    .product-info { display: flex; flex-wrap: wrap; gap: 1rem; margin-bottom: 2rem; }
    .info-badge { display: inline-flex; align-items: center; gap: 0.75rem; padding: 0.75rem 1.25rem; background: white; border: 2px solid var(--orange-light); border-radius: 1rem; color: var(--orange-dark); font-weight: 600; font-size: 0.95rem; transition: all 0.3s ease; }
    .info-badge:hover { background: var(--orange-light); transform: translateY(-2px); box-shadow: 0 4px 12px rgba(249, 115, 22, 0.2); }
    .info-badge i { font-size: 1.1rem; }
    .color-display { display: inline-block; width: 28px; height: 28px; border-radius: 50%; border: 3px solid white; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2); vertical-align: middle; }

    .price-summary { background: linear-gradient(135deg, var(--orange-50) 0%, white 100%); border: 2px solid var(--orange-light); border-radius: 1.25rem; padding: 2rem; margin: 2rem 0; box-shadow: 0 4px 15px rgba(249, 115, 22, 0.1); }
    .price-row { display: flex; justify-content: space-between; align-items: center; padding: 0.75rem 0; color: #4b5563; font-size: 1.05rem; }
    .price-divider { border: none; border-top: 2px dashed var(--orange-light); margin: 1rem 0; }
    .price-total { font-size: 1.5rem; font-weight: 700; color: var(--orange-primary); padding-top: 1rem; }

    .payment-status-btn { border: none; padding: 1rem 2rem;border-radius:10px; font-weight: 700; font-size: 1rem; margin-bottom: 2rem; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15); width: 100%; display: flex; align-items: center; justify-content: center; gap: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px; }
    .payment-paid { background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; }
    .payment-pending { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); color: white; }
    .payment-status-btn i { font-size: 1.3rem; }

    .action-buttons { display: flex; gap: 1rem; margin-bottom: 2rem; }
    .btn-orange-primary { background: linear-gradient(135deg, var(--orange-primary) 0%, var(--orange-dark) 100%); border: none; color: white; padding: 1rem 1.75rem; border-radius:10px; font-weight: 600; font-size: 1rem; transition: all 0.3s ease; display: flex; align-items: center; justify-content: center; gap: 0.5rem; }
    .btn-orange-primary:hover { background: linear-gradient(135deg, var(--orange-dark) 0%, #c2410c 100%); transform: translateY(-3px); }
    .btn-orange-outline { background: white; border: 2px solid var(--orange-primary); color: var(--orange-primary); padding: 1rem 1.75rem; border-radius:10px; font-weight: 600; font-size: 1rem; transition: all 0.3s ease; display: flex; align-items: center; justify-content: center; gap: 0.5rem; }
    .btn-orange-outline:hover { background: var(--orange-primary); color: white; transform: translateY(-3px); }

    .divider-section { margin: 2.5rem 0; }

    @media (max-width: 768px) {
        .product-image-wrapper { min-height: 300px; }
        .order-header h1 { font-size: 1.5rem; }
        .product-title { font-size: 1.35rem; }
        .action-buttons { flex-direction: column; }
        .card-body { padding: 1.5rem; }
        .info-grid { grid-template-columns: 1fr; padding: 1.5rem; }
        .address-content { padding: 1.5rem; }
        .section-header { padding: 1.25rem 1.5rem; }
    }
    .totalprice {
        color:#f97316;
    }
    .badge {
     background: #f97316;
    }
</style>
@endpush

@section('content')
<div class="order-container">

    <!-- Order Header -->
    <div class="order-header">
        <h1><i class="ri-file-text-line me-2"></i>Order #{{ $order->o_order_number }}</h1>
        <p><i class="ri-calendar-line me-2"></i>Placed on {{ \Carbon\Carbon::parse($order->created_at)->format('d M Y, h:i A') }}</p>
    </div>

    <!-- Order Info -->
    <div class="card order-card mb-4">
        <div class="section-header">
            <i class="ri-information-line"></i>
            <h5>Order Information</h5>
        </div>
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label"><i class="ri-hashtag"></i>Order Number</div>
                <div class="info-value">{{ $order->o_order_number }}</div>
            </div>
            <div class="info-item">
                <div class="info-label"><i class="ri-calendar-check-line"></i>Order Date</div>
                <div class="info-value">{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</div>
            </div>
            <div class="info-item">
                <div class="info-label"><i class="ri-bank-card-line"></i>Payment Method</div>
                <div class="info-value">{{ ucfirst($order->o_payment_method) }}</div>
            </div>
            <div class="info-item">
                <div class="info-label"><i class="ri-checkbox-circle-line"></i>Payment Status</div>
                <div class="info-value">{{ ucfirst($order->o_payment_status) }}</div>
            </div>
            <div class="info-item">
                <div class="info-label"><i class="ri-money-rupee-circle-line"></i>Total Amount</div>
                <div class="info-value highlight">₹{{ number_format($grandTotal,2) }}</div>
            </div>
            <div class="info-item">
                <div class="info-label"><i class="ri-truck-line"></i>Order Status</div>
                <div class="info-value" style="color: {{ strtolower($order->o_order_status) == 'completed' ? '#10b981' : (strtolower($order->o_order_status) == 'cancelled' ? '#ef4444' : '#f59e0b') }}">
                    {{ ucfirst($order->o_order_status) }}
                </div>
            </div>
        </div>
    </div>

    <!-- Shipping Address -->
    <div class="card order-card mb-4">
        <div class="section-header">
            <i class="ri-map-pin-line"></i>
            <h5>Shipping Address</h5>
        </div>
        <div class="address-content">
            <div class="address-item"><i class="ri-user-line"></i><div class="address-text"><div class="name">{{ $order->o_name }}</div></div></div>
            <div class="address-item"><i class="ri-mail-line"></i><div class="address-text"><div class="detail">{{ $order->o_email }}</div></div></div>
            <div class="address-item"><i class="ri-phone-line"></i><div class="address-text"><div class="detail">{{ $order->o_phone }}</div></div></div>
            <div class="address-item"><i class="ri-home-line"></i>
                <div class="address-text">
                    <div class="detail">{{ $order->o_street_address }}</div>
                    <div class="detail">{{ $order->o_city }}, {{ $order->o_state }} - {{ $order->o_postcode }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="divider-section"></div>

    <!-- Products -->
  @foreach($orderItems as $item)
<div class="card shadow-sm mb-3">
    <div class="row g-0">
        <!-- Product Image Section -->
        <div class="col-md-4">
            <div class="position-relative h-100 bg-light d-flex align-items-center justify-content-center p-3">
                <img src="{{ $item->img_path ? asset('storage/colors/'.$item->img_path) : asset('assets/no-image.png') }}" 
                     class="img-fluid rounded" 
                     style="max-height: 200px; object-fit: cover;"
                     alt="{{ $item->o_i_product_name }}">
                
                <span class="position-absolute top-0 end-0 m-2 badge 
                    {{ strtolower($order->o_order_status) == 'completed' ? 'bg-success' : 
                       (strtolower($order->o_order_status) == 'cancelled' ? 'bg-danger' : 
                       (strtolower($order->o_order_status) == 'processing' ? 'bg-primary' : 'bg-warning text-dark')) }}">
                    <i class="ri-checkbox-circle-fill me-1"></i>{{ ucfirst($order->o_order_status) }}
                </span>
            </div>
        </div>

        <!-- Product Details Section -->
        <div class="col-md-8">
            <div class="card-body p-3">
                <!-- Product Header -->
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <h5 class="card-title mb-0 fw-bold">{{ $item->o_i_product_name }}</h5>
               
                </div>

                <!-- Product Specifications -->
                <div class="row g-2 mb-3">
                    <div class="col-4">
                        <div class="border rounded p-2 text-center bg-light">
                            <div class="text-warning mb-1"><i class="ri-shopping-bag-3-line fs-5"></i></div>
                            <small class="text-muted d-block">Quantity</small>
                            <strong class="d-block">{{ $item->o_i_quantity }}</strong>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="border rounded p-2 text-center bg-light">
                            <div class="text-warning mb-1"><i class="ri-ruler-line fs-5"></i></div>
                            <small class="text-muted d-block">Size</small>
                            <strong class="d-block">{{ $item->o_i_size ?? 'N/A' }}</strong>
                        </div>
                    </div>

                    @if(!empty($item->color_code))
                    <div class="col-4">
                        <div class="border rounded p-2 text-center bg-light">
                            <div class="text-warning mb-1"><i class="ri-palette-line fs-5"></i></div>
                            <small class="text-muted d-block">Color</small>
                            <div class="d-flex justify-content-center mt-1">
                                <span class="rounded-circle border border-2 border-white shadow-sm" 
                                      style="width: 24px; height: 24px; background: {{ $item->color_code }}; display: inline-block;"></span>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Price Breakdown -->
                <div class="border overflow-hidden">
                    <div class="badge text-white w-100  rounded-0  bg-opacity-10 border-bottom px-3 py-2">
                        <strong class=" p-3 text-white"><i class="ri-file-list-3-line me-2"></i>Price Details</strong>
                    </div>
                    <div class="p-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Item Subtotal</span>
                            <strong>₹{{ number_format($item->o_i_total_price, 2) }}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Shipping Charges</span>
                            <strong class="text-success">₹{{ number_format($order->o_shipping_cost / max(count($orderItems), 1), 2) }}</strong>
                        </div>
                        <hr class="my-2">
                        <div class="d-flex justify-content-between">
                            <strong class="text-dark">Total Amount</strong>
                            <strong class=" totalprice fs-5">₹{{ number_format($item->o_i_total_price + ($order->o_shipping_cost / max(count($orderItems), 1)), 2) }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

    <!-- Payment Status -->
    <button class="payment-status-btn {{ strtolower($order->o_payment_status) == 'paid' ? 'payment-paid' : 'payment-pending' }}">
        <i class="ri-secure-payment-line"></i> Payment {{ ucfirst($order->o_payment_status) }}
    </button>

    <!-- Actions -->
    <div class="action-buttons">
        <a href="/" class="btn btn-orange-primary flex-fill"><i class="ri-file-list-3-line"></i> Continue Shopping</a>
        <a href="{{ route ('order.list') }}" class="btn btn-orange-outline flex-fill"><i class="ri-map-pin-time-line"></i>Back to order list</a>
    </div>

</div>
@endsection
