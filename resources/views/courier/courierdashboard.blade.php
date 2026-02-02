@extends('layouts.courier-layout')

@section('title', 'Courier Dashboard')



@push('styles')
<style>
/* Same styling as other courier pages for consistency */
body {
    font-family: 'Poppins', sans-serif;

}

</style>
@endpush

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">Courier Dashboard</h2>

    <div class="row g-4">
        <!-- Assigned Orders Card -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-center p-4">
                <div class="mb-2">
                    <i class="bi bi-bag-fill display-4 text-primary"></i>
                </div>
                <h5 class="card-title">Assigned Orders</h5>
                <p class="display-6 fw-bold">{{ $assigned ?? 0 }}</p>
            </div>
        </div>

        <!-- Pending Deliveries Card -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-center p-4">
                <div class="mb-2">
                    <i class="bi bi-clock-fill display-4 text-warning"></i>
                </div>
                <h5 class="card-title">Pending Deliveries</h5>
                <p class="display-6 fw-bold">{{ $pending ?? 0 }}</p>
            </div>
        </div>

        <!-- Completed Orders Card -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-center p-4">
                <div class="mb-2">
                    <i class="bi bi-check-circle-fill display-4 text-success"></i>
                </div>
                <h5 class="card-title">Completed</h5>
                <p class="display-6 fw-bold">{{ $completed ?? 0 }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
