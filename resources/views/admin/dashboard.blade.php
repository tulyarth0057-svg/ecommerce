@extends('layouts.admin-layout')

@section('title', 'Admin-Home')

@push('styles')
<style>
  body { background-color: #f8f9fa;font-family: 'Poppins',sans-serif }

    .category-card {
        transition: transform 0.3s, box-shadow 0.3s;
        border-radius: 1rem;
    }
    .category-card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
    .category-img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border: 3px solid #e65c00;
    }
    .product-list {
        max-height: 150px;
        overflow-y: auto;
        margin-top: 0.5rem;
    }
     h1 {
        color: black;
        font-size: 2rem;
        font-weight: 700;
        margin: 0;
      
    }
    .card-footer{
        background: #e65c00;
    }
    /* .card-title{
        color: #e65c00;
    } */
    .btn-main-category{
        background: #e65c00;
        color: white;
       &:hover{
        border: 1px solid #e65c00;
        color:#e65c00;
       }
    }
    .card-body-1{
        background: #e65c00;
        color: white;
        padding: 10px 0px;
        border-radius: 10px;
        
    }

</style>


@endpush

   @section('content')

   {{-- home-dashboard-content --}}

<div class="container">

    {{-- show categroy-products-counts --}}


    <h1>Site Information</h1>

    <div class="row mb-4 mt-4">
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body-1">
                    <h5 class="card-title">Main Categories</h5>
                    <p class="card-text display-4">{{ $mainCategoriesCount }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body-1">
                    <h5 class="card-title">Total Categories</h5>
                    <p class="card-text display-4">{{ $categories->count() }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body-1">
                    <h5 class="card-title">Total Products</h5>
                    <p class="card-text display-4">{{ $categories->sum(fn($cat) => $cat->products->count()) }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body-1">
                        <h5 class="card-title">Total Orders</h5>
                        <p class="card-text display-4">{{ $ordersCount }}</p>
                    </div>
                </div>
            </div>

    </div>

    {{-- 2 section cards start --}}

     <div class="row mb-4 mt-4">

             <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body-1">
                        <h5 class="card-title">Total Revenue</h5>
                        <p class="card-text display-4">₹ {{ number_format($totalRevenue, 2) }}</p>
                    </div>
                </div>
            </div>

            
            <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body-1">
                        <h5 class="card-title">Total Sale (qty)</h5>
                        <p class="card-text display-4">{{ $itemsSold }}</p>
                    </div>
                </div>
            </div>

                <div class="col-md-3">
                    <div class="card text-center shadow-sm">
                        <div class="card-body-1">
                            <h5 class="card-title">New Customers</h5>
                            <p class="card-text display-4">
                                {{ $newCustomersToday ?? 0 }}
                            </p>
                        </div>
                    </div>
                </div>

            <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body-1">
                        <h5 class="card-title">Total Customer</h5>
                        <p class="card-text display-4">{{ $customersCount }}</p>
                    </div>
                </div>
            </div>



    </div>

<hr>
     {{-- 3 section cards start --}}

     <div class="row mb-4 mt-4">

        <h2>Top Product</h2>
             <div class="col-md-12">
                <div class="card text-center shadow-sm">
                    <div class="card-body-1">
                        <h5 class="card-title">Top Selling Item</h5>
                      @if($topSellingItem && $topSellingItem->product)

                                <h5>{{ $topSellingItem->product->p_name }}</h5>

                                <p>
                                    Sold Quantity:
                                    <strong>{{ $topSellingItem->total_qty }}</strong>
                                </p>

                            @else
                                <p class="text-muted">No sales yet</p>
                            @endif

                    </div>
                </div>
            </div>

    </div>
<hr>

 {{-- 4 section cards start --}}

    <div class="row mb-4 mt-4">

        <h2>Least Product</h2>

             <div class="col-md-12">
                <div class="card text-center shadow-sm">
                    <div class="card-body-1">
                        <h5 class="fw-bold text-white mb-3">Least Selling Products</h5>

                        <ul class="list-group list-group-flush">
                            @forelse($leastSellingProducts as $item)
                                @if($item->product)
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>{{ $item->product->p_name }}</span>
                                        <span class="badge bg-warning text-dark">
                                            Sold: {{ $item->total_qty }}
                                        </span>
                                    </li>
                                @endif
                            @empty
                                <li class="list-group-item text-muted">No data</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

    </div>


    <hr>


     {{-- 5 section cards start --}}

    <div class="row mb-4 mt-4">

        <h2>Orders</h2>

            {{-- total order --}}
             <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body-1">
                        <h5 class="card-title">Total Orders</h5>
                        <p class="card-text display-4">{{ $ordersCount }}</p>
                    </div>
                </div>
            </div>
           

           {{-- Pending Orders --}}
    <div class="col-md-3">
        <div class="card shadow-sm text-center">
            <div class="card-body-1">
                <h6 class="card-title">⏳ Pending Orders</h6>
                <p class="display-5">{{ $pendingOrders }}</p>
            </div>
        </div>
    </div>

    {{-- Shipped Orders --}}
    <div class="col-md-3">
        <div class="card shadow-sm text-center">
            <div class="card-body-1">
                <h6 class="card-title">🚚 Shipped Orders</h6>
                <p class="display-5">{{ $shippedOrders }}</p>
            </div>
        </div>
    </div>

    {{-- Delivered Orders --}}
    <div class="col-md-3">
        <div class="card shadow-sm text-center">
            <div class="card-body-1">
                <h6 class="card-title">✅ Delivered Orders</h6>
                <p class="display-5 ">{{ $deliveredOrders }}</p>
            </div>
        </div>
    </div>

             

    </div>
    
    <hr>

     {{-- 6 section cards start --}}

    <div class="row mb-4 mt-4">

        <h2>Product</h2>

           <div class="col-md-4">
    <div class="card text-center shadow-sm">
        <div class="card-body-1">
            <h5 class="card-title">Low Stock Products</h5>
            <p class="card-text display-4">
                {{ $lowStockCount }}
            </p>
        </div>
    </div>
</div>


<div class="col-md-4">
    <div class="card text-center shadow-sm">
        <div class="card-body-1">
            <h5 class="card-title">Today’s Sales</h5>
            <p class="card-text display-6">
                ₹ {{ number_format($todaySales, 2) }}
            </p>
            <small class="text-white">{{ $todayOrders }} Orders</small>
        </div>
    </div>
</div>

 <div class="col-md-4">
    <div class="card text-center shadow-sm">
        <div class="card-body-1">
            <h5 class="card-title">Orders per day</h5>
            <p class="card-text display-6">
                {{$todayOrders}}
            </p>
           
        </div>
    </div>
</div>


    </div>

    {{-- end counters --}}

<hr>

    {{-- sales trend charts start --}}

<div class="card">
    <div class="card-header">
        <h5>Sales Trend (Last 7 Days)</h5>
    </div>

    <div class="card-body">
        @if($salesTrend->count() > 0)
            <canvas id="salesTrendChart" height="120"></canvas>
        @else
            <p class="text-center text-muted mb-0">
                No sales data available
            </p>
        @endif
    </div>
</div>


<hr>
        {{-- charts end here --}}


        {{-- order charts start --}}

        <div class="col-md-12">
    <div class="card shadow-sm">
        <div class="card-header text-center">
            <h5 class="mb-0">Orders Per Day (Last 7 Days)</h5>
        </div>

        <div class="card-body">
            @if($ordersPerDay->count() > 0)
                <canvas id="ordersPerDayChart" height="120"></canvas>
            @else
                <p class="text-center text-muted mb-0">
                    No order data available
                </p>
            @endif
        </div>
    </div>
</div>

{{-- charts end --}}



    <hr>

    {{-- start cards --}}
    
        
    <h2 class="mt-4 mb-4">Categories & Products</h2>

        {{-- Main Category Buttons --}}
    <div class="text-center mb-4">
        <button class="btn btn-main-category me-2 mb-4" data-id="0">All</button>
        @foreach(\App\Models\MainCategory::where('status',1)->get() as $main)
            <button class="btn btn-main-category me-2 mb-4" data-id="{{ $main->cat_id }}">{{ $main->cat_name }}</button>
        @endforeach
    </div>



    {{-- Category Cards --}}
    <div class="row g-4 mt-4" id="category-cards">
        @foreach($categories as $category)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 category-card-item" data-main="{{ $category->main_category_id }}">
                <div class="card shadow-sm h-100 category-card">

                    {{-- Image --}}
                    <div class="card-img-top d-flex justify-content-center align-items-center p-3 bg-light">
                        @if($category->c_image)
                            <img src="{{ asset($category->c_image) }}" alt="{{ $category->c_name }}" class="rounded-circle category-img">
                        @else
                            <div class="rounded-circle bg-secondary d-flex justify-content-center align-items-center category-img">
                                <span class="text-white">No Image</span>
                            </div>
                        @endif
                    </div>

                    {{-- Info --}}
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $category->c_name }}</h5>
                        <p class="text-muted mb-2">Main: {{ $category->mainCategory->cat_name ?? '-' }}</p>
                        <h6>Products:</h6>
                        <ul class="list-group list-group-flush product-list">
                            @forelse($category->products as $product)
                                <li class="list-group-item">{{ $product->p_name }}</li>
                            @empty
                                <li class="list-group-item text-muted">No Products</li>
                            @endforelse
                        </ul>
                    </div>

                    {{-- Footer --}}
                    <div class="card-footer text-center text-white fw-bold ">
                        Total Products: {{ $category->products->count() }}
                    </div>

                </div>
            </div>
        @endforeach
    </div>


</div>





   @endsection
    
   
  


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

{{-- script of per day order --}}
<script>
    @if($ordersPerDay->count() > 0)

    const ordersData = @json($ordersPerDay);

    const orderLabels = ordersData.map(item => item.date);
    const orderCounts = ordersData.map(item => item.total_orders);

    const ctxOrders = document.getElementById('ordersPerDayChart').getContext('2d');

    new Chart(ctxOrders, {
        type: 'bar',
        data: {
            labels: orderLabels,
            datasets: [{
                label: 'Orders',
                data: orderCounts,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endif


{{-- script of sales-chart --}}
<script>
    const salesTrend = @json($salesTrend);

    const salesLabels = salesTrend.map(item => item.date);
    const salesData = salesTrend.map(item => item.total_sales);

    const ctx = document.getElementById('salesTrendChart').getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: salesLabels,
            datasets: [{
                label: 'Total Sales (₹)',
                data: salesData,
                tension: 0.4,
                fill: true,
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


{{-- script of sweetalert --}}
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
        timer: 2000,
        showConfirmButton: false
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "{{ session('error') }}",
        timer: 2000,
        showConfirmButton: false
    });
</script>
@endif

{{-- trendsales --}}
<script>
const salesData = @json($salesTrend);
</script>


{{-- script of category btn --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const buttons = document.querySelectorAll('.btn-main-category');
    const cards   = document.querySelectorAll('.category-card-item');

    buttons.forEach(button => {
        button.addEventListener('click', function () {

            const mainId = this.dataset.id;

            // filter cards
            cards.forEach(card => {
                if (mainId == 0 || card.dataset.main == mainId) {
                    card.style.display = '';   // IMPORTANT
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

});
</script>


@endpush





{{-- old code of dashoard --}}

 {{-- <div class="container-xxl">

                    <div class="row g-3 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
                        <div class="col">
                            <div class="alert-success alert mb-0">
                                <div class="d-flex align-items-center">
                                    <div class="avatar rounded no-thumbnail bg-success text-light"><i class="fa fa-dollar fa-lg"></i></div>
                                    <div class="flex-fill ms-3 text-truncate">
                                        <div class="h6 mb-0">Revenue</div>
                                        <span class="small">$18,925</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="alert-danger alert mb-0">
                                <div class="d-flex align-items-center">
                                    <div class="avatar rounded no-thumbnail bg-danger text-light"><i class="fa fa-credit-card fa-lg"></i></div>
                                    <div class="flex-fill ms-3 text-truncate">
                                        <div class="h6 mb-0">Expense</div>
                                        <span class="small">$11,024</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="alert-warning alert mb-0">
                                <div class="d-flex align-items-center">
                                    <div class="avatar rounded no-thumbnail bg-warning text-light"><i class="fa fa-smile-o fa-lg"></i></div>
                                    <div class="flex-fill ms-3 text-truncate">
                                        <div class="h6 mb-0">Happy Clients</div>
                                        <span class="small">8,925</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="alert-info alert mb-0">
                                <div class="d-flex align-items-center">
                                    <div class="avatar rounded no-thumbnail bg-info text-light"><i class="fa fa-shopping-bag" aria-hidden="true"></i></div>
                                    <div class="flex-fill ms-3 text-truncate">
                                        <div class="h6 mb-0">New StoreOpen</div>
                                        <span class="small">8,925</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row end  -->

                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12">
                            <div class="tab-filter d-flex align-items-center justify-content-between mb-3 flex-wrap">
                                <ul class="nav nav-tabs tab-card tab-body-header rounded  d-inline-flex w-sm-100">
                                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#summery-today" >Today</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#summery-week" >Week</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#summery-month" >Month</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#summery-year" >Year</a></li>
                                </ul>
                                <div class="date-filter d-flex align-items-center mt-2 mt-sm-0 w-sm-100">
                                    <div class="input-group">
                                        <input type="date" class="form-control">
                                        <button class="btn btn-primary" type="button"><i class="icofont-filter fs-5"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content mt-1">
                                <div class="tab-pane fade show active" id="summery-today">
                                    <div class="row g-1 g-sm-3 mb-3 row-deck">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Customers</span>
                                                        <div><span class="fs-6 fw-bold me-2">14,208</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-student-alt fs-3 color-light-orange"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Order</span>
                                                        <div><span class="fs-6 fw-bold me-2">2314</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-shopping-cart fs-3 color-lavender-purple"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Avg Sale</span>
                                                        <div><span class="fs-6 fw-bold me-2">$1770</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-sale-discount fs-3 color-santa-fe"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Avg Item Sale</span>
                                                        <div><span class="fs-6 fw-bold me-2">185</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-calculator-alt-2 fs-3 color-danger"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Total Sale</span>
                                                        <div><span class="fs-6 fw-bold me-2">$35000</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-calculator-alt-1 fs-3 color-lightblue"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Visitors</span>
                                                        <div><span class="fs-6 fw-bold me-2">11452</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-users-social fs-3 color-light-success"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Total Products</span>
                                                        <div><span class="fs-6 fw-bold me-2">184511</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-bag fs-3 color-light-orange"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Top Selling Item</span>
                                                        <div><span class="fs-6 fw-bold me-2">122</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-star fs-3 color-lightyellow"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Dealership</span>
                                                        <div><span class="fs-6 fw-bold me-2">32</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-handshake-deal fs-3 color-lavender-purple"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- row end -->
                                </div>
                                <div class="tab-pane fade" id="summery-week">
                                    <div class="row g-3 mb-4 row-deck">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Customers</span>
                                                        <div><span class="fs-6 fw-bold me-2">54,208</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-student-alt fs-3 color-light-orange"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Order</span>
                                                        <div><span class="fs-6 fw-bold me-2">12314</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-shopping-cart fs-3 color-lavender-purple"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Avg Sale</span>
                                                        <div><span class="fs-6 fw-bold me-2">$11770</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-sale-discount fs-3 color-santa-fe"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Avg Item Sale</span>
                                                        <div><span class="fs-6 fw-bold me-2">1185</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-calculator-alt-2 fs-3 color-danger"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Total Sale</span>
                                                        <div><span class="fs-6 fw-bold me-2">$135000</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-calculator-alt-1 fs-3 color-lightblue"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Visitors</span>
                                                        <div><span class="fs-6 fw-bold me-2">111452</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-users-social fs-3 color-light-success"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Total Products</span>
                                                        <div><span class="fs-6 fw-bold me-2">194511</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-bag fs-3 color-light-orange"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Top Selling Item</span>
                                                        <div><span class="fs-6 fw-bold me-2">1122</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-star fs-3 color-lightyellow"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Dealership</span>
                                                        <div><span class="fs-6 fw-bold me-2">132</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-handshake-deal fs-3 color-lavender-purple"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- row end -->
                                </div>
                                <div class="tab-pane fade" id="summery-month">
                                    <div class="row g-3 mb-4 row-deck">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Customers</span>
                                                        <div><span class="fs-6 fw-bold me-2">74,208</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-student-alt fs-3 color-light-orange"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Order</span>
                                                        <div><span class="fs-6 fw-bold me-2">22314</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-shopping-cart fs-3 color-lavender-purple"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Avg Sale</span>
                                                        <div><span class="fs-6 fw-bold me-2">$21770</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-sale-discount fs-3 color-santa-fe"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Avg Item Sale</span>
                                                        <div><span class="fs-6 fw-bold me-2">2185</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-calculator-alt-2 fs-3 color-danger"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Total Sale</span>
                                                        <div><span class="fs-6 fw-bold me-2">$235000</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-calculator-alt-1 fs-3 color-lightblue"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Visitors</span>
                                                        <div><span class="fs-6 fw-bold me-2">211452</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-users-social fs-3 color-light-success"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Total Products</span>
                                                        <div><span class="fs-6 fw-bold me-2">284511</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-bag fs-3 color-light-orange"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Top Selling Item</span>
                                                        <div><span class="fs-6 fw-bold me-2">222</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-star fs-3 color-lightyellow"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Dealership</span>
                                                        <div><span class="fs-6 fw-bold me-2">232</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-handshake-deal fs-3 color-lavender-purple"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- row end -->
                                </div>
                                <div class="tab-pane fade" id="summery-year">
                                    <div class="row g-3 mb-4 row-deck">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Customers</span>
                                                        <div><span class="fs-6 fw-bold me-2">104,208</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-student-alt fs-3 color-light-orange"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Order</span>
                                                        <div><span class="fs-6 fw-bold me-2">252314</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-shopping-cart fs-3 color-lavender-purple"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Avg Sale</span>
                                                        <div><span class="fs-6 fw-bold me-2">$852770</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-sale-discount fs-3 color-santa-fe"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Avg Item Sale</span>
                                                        <div><span class="fs-6 fw-bold me-2">75885</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-calculator-alt-2 fs-3 color-danger"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Total Sale</span>
                                                        <div><span class="fs-6 fw-bold me-2">$350000</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-calculator-alt-1 fs-3 color-lightblue"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Visitors</span>
                                                        <div><span class="fs-6 fw-bold me-2">114521452</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-users-social fs-3 color-light-success"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Total Products</span>
                                                        <div><span class="fs-6 fw-bold me-2">884511</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-bag fs-3 color-light-orange"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Top Selling Item</span>
                                                        <div><span class="fs-6 fw-bold me-2">7522</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-star fs-3 color-lightyellow"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">Dealership</span>
                                                        <div><span class="fs-6 fw-bold me-2">1832</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-handshake-deal fs-3 color-lavender-purple"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- row end -->
                                </div>
                            </div>
                        </div>
                    </div><!-- Row end  -->

                    <div class="row g-3 mb-3">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Sales Status</h6>
                                </div>
                                <div class="card-body">
                                    <div id="apex-GenderOverview"></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row end  -->

                    <div class="row g-3 mb-3">
                        <div class="col-xxl-8 col-xl-8">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Shopping Status</h6>
                                </div>
                                <div class="card-body">
                                    <div class="ac-line-transparent" id="apex-shoppingstatus"></div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Top Selling Product</h6>
                                </div>
                                <div class="card-body">
                                    <div id="topselling"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4">
                            <div class="card">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Our Branch Location & Revenue</h6>
                                </div>
                                <div class="card-body">
                                    <div id="googleMap" style="width:100%;height:397px;"></div>
                                    <div class="location-revenue mt-5">
                                        <label class="fw-bold">India</label>
                                        <div class="progress mb-4" style="height: 8px;">
                                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 30%" aria-valuenow="30"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <label class="fw-bold">Mauritius</label>
                                        <div class="progress mb-4" style="height: 8px;">
                                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 45%" aria-valuenow="45"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <label class="fw-bold">Colombia</label>
                                        <div class="progress mb-4" style="height: 8px;">
                                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 60%" aria-valuenow="60"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <label class="fw-bold">Russia</label>
                                        <div class="progress mb-4" style="height: 8px;">
                                            <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <label class="fw-bold">France</label>
                                        <div class="progress mb-3" style="height: 8px;">
                                            <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 98%" aria-valuenow="98"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row end  -->

                    <div class="row g-3 mb-3 row-deck">
                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Active Users Status</h6>
                                </div>
                                <div class="card-body">
                                    <div class="p-4 active-user bg-lightblue rounded-2 mb-2">
                                        <span class="fw-bold d-flex justify-content-center fs-3">1345</span>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">Active pages</th>
                                                <th scope="col">Users</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><a href="#">/dist/product.html</a></td>
                                                <td>245</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">/dist/product-cart.html</a></td>
                                                <td>455</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">/dist/admin-profile.html</a></td>
                                                <td>45</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">/dist/order-history.html</a></td>
                                                <td>545</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">/dist/product-detail.html</a></td>
                                                <td>55</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="card">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Avg Expense Costs</h6>
                                </div>
                                <div class="card-body">
                                    <div class="h2 mb-0">$1105.5</div>
                                    <span class="text-muted small">Avg Expense Costs All Month</span>
                                    <div id="apex-expense"></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row end  -->

                    <div class="row g-3 mb-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Recent Transactions</h6>
                                </div>
                                <div class="card-body">
                                    <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Item</th>
                                                <th>Customer Name</th>
                                                <th>Payment Info</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>#Order-78414</strong></td>
                                                <td><img src="assetsofdash/images/product/product-1.jpg" class="avatar lg rounded me-2" alt="profile-image"><span> Oculus VR </span></td>
                                                <td>Molly</td>
                                                <td>Credit Card</td>
                                                <td>
                                                    $420
                                                </td>
                                                <td><span class="badge bg-warning">Progress</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>#Order-58414</strong></td>
                                                <td><img src="assetsofdash/images/product/product-2.jpg" class="avatar lg rounded me-2" alt="profile-image"><span>Wall Clock</span></td>
                                                <td>Brian</td>
                                                <td>Debit Card</td>
                                                <td>
                                                    $220
                                                </td>
                                                <td><span class="badge bg-success">Complited</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>#Order-48414</strong></td>
                                                <td><img src="assetsofdash/images/product/product-3.jpg" class="avatar lg rounded me-2" alt="profile-image"><span>Note Diaries</span></td>
                                                <td>Julia</td>
                                                <td>Debit Card</td>
                                                <td>
                                                    $250
                                                </td>
                                                <td><span class="badge bg-success">Complited</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>#Order-38414</strong></td>
                                                <td><img src="assetsofdash/images/product/product-4.jpg" class="avatar lg rounded me-2" alt="profile-image"><span>Flower Port</span></td>
                                                <td>Sonia</td>
                                                <td>Credit Card</td>
                                                <td>
                                                    $320
                                                </td>
                                                <td><span class="badge bg-warning">Progress</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>#Order-28414</strong></td>
                                                <td><img src="assetsofdash/images/product/product-1.jpg" class="avatar lg rounded me-2" alt="profile-image"><span>Oculus VR</span></td>
                                                <td>Adam H</td>
                                                <td>Debit Card</td>
                                                <td>
                                                    $20
                                                </td>
                                                <td><span class="badge bg-warning">Progress</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>#Order-18414</strong></td>
                                                <td><img src="assetsofdash/images/product/product-2.jpg" class="avatar lg rounded me-2" alt="profile-image"><span>Wall Clock</span></td>
                                                <td>Alexander</td>
                                                <td>Debit Card</td>
                                                <td>
                                                    $820
                                                </td>
                                                <td><span class="badge bg-success">Complited</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>#Order-11414</strong></td>
                                                <td><img src="assetsofdash/images/product/product-3.jpg" class="avatar lg rounded me-2" alt="profile-image"><span>Note Diaries</span></td>
                                                <td>Gabrielle</td>
                                                <td>Bank Emi</td>
                                                <td>
                                                    $620
                                                </td>
                                                <td><span class="badge bg-success">Complited</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row end  -->

                </div> --}}