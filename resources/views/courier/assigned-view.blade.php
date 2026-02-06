@extends('layouts.courier-layout')

@section('title', 'Assigned-view-orders')

@section('content')

<div class="container">
    <h2>Order Details</h2>

    <div class="card p-3">
        <p><strong>Order Number :</strong> #{{ $order->o_order_number }}</p>
        <p><strong>Customer :</strong> {{ $order->o_name }}</p>
        <p><strong>Phone :</strong> {{ $order->o_phone }}</p>

        <p><strong>Address :</strong>
            {{ $order->o_street_address }},
            {{ $order->o_city }},
            {{ $order->o_state }},
            {{ $order->o_postcode }}
        </p>

        <p><strong>Status :</strong> {{ ucfirst($order->o_order_status) }}</p>

        <p><strong>Total :</strong> ₹{{ $order->o_total_amount }}</p>

    </div>

</div>

@endsection
