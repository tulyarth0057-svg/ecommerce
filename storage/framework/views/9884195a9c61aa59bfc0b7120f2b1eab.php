<?php $__env->startSection('title', 'Admin-Home'); ?>

<?php $__env->startPush('styles'); ?>
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


<?php $__env->stopPush(); ?>

   <?php $__env->startSection('content'); ?>

   

<div class="container">

    


    <h1>Site Information</h1>

    <div class="row mb-4 mt-4">
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body-1">
                    <h5 class="card-title">Main Categories</h5>
                    <p class="card-text display-4"><?php echo e($mainCategoriesCount); ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body-1">
                    <h5 class="card-title">Total Categories</h5>
                    <p class="card-text display-4"><?php echo e($categories->count()); ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body-1">
                    <h5 class="card-title">Total Products</h5>
                    <p class="card-text display-4"><?php echo e($categories->sum(fn($cat) => $cat->products->count())); ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body-1">
                        <h5 class="card-title">Total Orders</h5>
                        <p class="card-text display-4"><?php echo e($ordersCount); ?></p>
                    </div>
                </div>
            </div>

    </div>

    

     <div class="row mb-4 mt-4">

             <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body-1">
                        <h5 class="card-title">Total Revenue</h5>
                        <p class="card-text display-4">₹ <?php echo e(number_format($totalRevenue, 2)); ?></p>
                    </div>
                </div>
            </div>

            
            <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body-1">
                        <h5 class="card-title">Total Sale (qty)</h5>
                        <p class="card-text display-4"><?php echo e($itemsSold); ?></p>
                    </div>
                </div>
            </div>

                <div class="col-md-3">
                    <div class="card text-center shadow-sm">
                        <div class="card-body-1">
                            <h5 class="card-title">New Customers</h5>
                            <p class="card-text display-4">
                                <?php echo e($newCustomersToday ?? 0); ?>

                            </p>
                        </div>
                    </div>
                </div>

            <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body-1">
                        <h5 class="card-title">Total Customer</h5>
                        <p class="card-text display-4"><?php echo e($customersCount); ?></p>
                    </div>
                </div>
            </div>



    </div>

<hr>
     

     <div class="row mb-4 mt-4">

        <h2>Top Product</h2>
             <div class="col-md-12">
                <div class="card text-center shadow-sm">
                    <div class="card-body-1">
                        <h5 class="card-title">Top Selling Item</h5>
                      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($topSellingItem && $topSellingItem->product): ?>

                                <h5><?php echo e($topSellingItem->product->p_name); ?></h5>

                                <p>
                                    Sold Quantity:
                                    <strong><?php echo e($topSellingItem->total_qty); ?></strong>
                                </p>

                            <?php else: ?>
                                <p class="text-muted">No sales yet</p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    </div>
                </div>
            </div>

    </div>
<hr>

 

    <div class="row mb-4 mt-4">

        <h2>Least Product</h2>

             <div class="col-md-12">
                <div class="card text-center shadow-sm">
                    <div class="card-body-1">
                        <h5 class="fw-bold text-white mb-3">Least Selling Products</h5>

                        <ul class="list-group list-group-flush">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $leastSellingProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->product): ?>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span><?php echo e($item->product->p_name); ?></span>
                                        <span class="badge bg-warning text-dark">
                                            Sold: <?php echo e($item->total_qty); ?>

                                        </span>
                                    </li>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                <li class="list-group-item text-muted">No data</li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>

    </div>


    <hr>


     

    <div class="row mb-4 mt-4">

        <h2>Orders</h2>

            
             <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body-1">
                        <h5 class="card-title">Total Orders</h5>
                        <p class="card-text display-4"><?php echo e($ordersCount); ?></p>
                    </div>
                </div>
            </div>
           

           
    <div class="col-md-3">
        <div class="card shadow-sm text-center">
            <div class="card-body-1">
                <h6 class="card-title">⏳ Pending Orders</h6>
                <p class="display-5"><?php echo e($pendingOrders); ?></p>
            </div>
        </div>
    </div>

    
    <div class="col-md-3">
        <div class="card shadow-sm text-center">
            <div class="card-body-1">
                <h6 class="card-title">🚚 Shipped Orders</h6>
                <p class="display-5"><?php echo e($shippedOrders); ?></p>
            </div>
        </div>
    </div>

    
    <div class="col-md-3">
        <div class="card shadow-sm text-center">
            <div class="card-body-1">
                <h6 class="card-title">✅ Delivered Orders</h6>
                <p class="display-5 "><?php echo e($deliveredOrders); ?></p>
            </div>
        </div>
    </div>

             

    </div>
    
    <hr>

     

    <div class="row mb-4 mt-4">

        <h2>Product</h2>

           <div class="col-md-4">
    <div class="card text-center shadow-sm">
        <div class="card-body-1">
            <h5 class="card-title">Low Stock Products</h5>
            <p class="card-text display-4">
                <?php echo e($lowStockCount); ?>

            </p>
        </div>
    </div>
</div>


<div class="col-md-4">
    <div class="card text-center shadow-sm">
        <div class="card-body-1">
            <h5 class="card-title">Today’s Sales</h5>
            <p class="card-text display-6">
                ₹ <?php echo e(number_format($todaySales, 2)); ?>

            </p>
            <small class="text-white"><?php echo e($todayOrders); ?> Orders</small>
        </div>
    </div>
</div>

 <div class="col-md-4">
    <div class="card text-center shadow-sm">
        <div class="card-body-1">
            <h5 class="card-title">Orders per day</h5>
            <p class="card-text display-6">
                <?php echo e($todayOrders); ?>

            </p>
           
        </div>
    </div>
</div>


    </div>

    

<hr>

    

<div class="card">
    <div class="card-header">
        <h5>Sales Trend (Last 7 Days)</h5>
    </div>

    <div class="card-body">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($salesTrend->count() > 0): ?>
            <canvas id="salesTrendChart" height="120"></canvas>
        <?php else: ?>
            <p class="text-center text-muted mb-0">
                No sales data available
            </p>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>


<hr>
        


        

        <div class="col-md-12">
    <div class="card shadow-sm">
        <div class="card-header text-center">
            <h5 class="mb-0">Orders Per Day (Last 7 Days)</h5>
        </div>

        <div class="card-body">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ordersPerDay->count() > 0): ?>
                <canvas id="ordersPerDayChart" height="120"></canvas>
            <?php else: ?>
                <p class="text-center text-muted mb-0">
                    No order data available
                </p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</div>





    <hr>

    
    
        
    <h2 class="mt-4 mb-4">Categories & Products</h2>

        
    <div class="text-center mb-4">
        <button class="btn btn-main-category me-2 mb-4" data-id="0">All</button>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = \App\Models\MainCategory::where('status',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $main): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <button class="btn btn-main-category me-2 mb-4" data-id="<?php echo e($main->cat_id); ?>"><?php echo e($main->cat_name); ?></button>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>



    
    <div class="row g-4 mt-4" id="category-cards">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 category-card-item" data-main="<?php echo e($category->main_category_id); ?>">
                <div class="card shadow-sm h-100 category-card">

                    
                    <div class="card-img-top d-flex justify-content-center align-items-center p-3 bg-light">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($category->c_image): ?>
                            <img src="<?php echo e(asset($category->c_image)); ?>" alt="<?php echo e($category->c_name); ?>" class="rounded-circle category-img">
                        <?php else: ?>
                            <div class="rounded-circle bg-secondary d-flex justify-content-center align-items-center category-img">
                                <span class="text-white">No Image</span>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo e($category->c_name); ?></h5>
                        <p class="text-muted mb-2">Main: <?php echo e($category->mainCategory->cat_name ?? '-'); ?></p>
                        <h6>Products:</h6>
                        <ul class="list-group list-group-flush product-list">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                <li class="list-group-item"><?php echo e($product->p_name); ?></li>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                <li class="list-group-item text-muted">No Products</li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                    </div>

                    
                    <div class="card-footer text-center text-white fw-bold ">
                        Total Products: <?php echo e($category->products->count()); ?>

                    </div>

                </div>
            </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>


</div>





   <?php $__env->stopSection(); ?>
    
   
  


<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
    <?php if($ordersPerDay->count() > 0): ?>

    const ordersData = <?php echo json_encode($ordersPerDay, 15, 512) ?>;

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
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>



<script>
    const salesTrend = <?php echo json_encode($salesTrend, 15, 512) ?>;

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



<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "<?php echo e(session('success')); ?>",
        timer: 2000,
        showConfirmButton: false
    });
</script>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "<?php echo e(session('error')); ?>",
        timer: 2000,
        showConfirmButton: false
    });
</script>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<script>
const salesData = <?php echo json_encode($salesTrend, 15, 512) ?>;
</script>



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


<?php $__env->stopPush(); ?>







 
<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel_git\ecommerce-web\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>