@extends('layouts.frontend-layout')

@section('title', 'Order status')


<h3>Order Number: {{ $order->order_number }}</h3>
<p>Status: <strong>{{ ucfirst($order->status) }}</strong></p>

@endsection