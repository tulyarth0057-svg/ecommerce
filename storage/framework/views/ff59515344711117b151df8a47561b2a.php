 

 <?php $__env->startSection('title', 'View-product'); ?>

<?php $__env->startPush('styles'); ?>

<style>
body {
    background:#f5f7fb;
    font-family: 'Poppins', sans-serif;
}
h4{
    background-color: orangered;
}


</style>
<?php $__env->stopPush(); ?>






<?php $__env->startSection('content'); ?>
<div class="container my-5">

    <!-- PAGE TITLE -->
    <h1 class="mb-4 fw-bold border-start border-5 ps-3 border-primary">Product Details</h1>

    <!-- PRODUCT BANNER -->
    <?php if($product->category && $product->category->c_banner_img): ?>
  <div class="position-relative mb-4 shadow rounded overflow-hidden h-50">
    <img src="<?php echo e(asset($product->category->c_banner_img)); ?>"
         class="img-fluid w-100 "
         onclick="openPreview(this)">
    <span class="position-absolute bottom-0 start-0 bg-white px-3 py-1 rounded m-3 fw-semibold">Product Banner</span>
</div>


    <?php endif; ?>

    <!-- PRODUCT DETAILS CARD -->
    <div class="card mb-4 shadow">
        <div class="card-body row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">

            <div class="col">
                <div class="text-muted small">Product Name</div>
                <div class="fw-bold text-primary"><?php echo e($product->p_name); ?></div>
            </div>

            <div class="col">
                <div class="text-muted small">Main Category</div>
                <div class="fw-semibold text-danger"><?php echo e($product->mainCategory->cat_name ?? 'No Main Category'); ?></div>
            </div>

            <div class="col">
                <div class="text-muted small">Category</div>
                <div class="fw-semibold text-info"><?php echo e($product->category->c_name ?? $product->p_category_id); ?></div>
            </div>

            <div class="col">
                <div class="text-muted small">Price</div>
                <div class="fw-bold text-danger">₹<?php echo e($product->p_price); ?></div>
            </div>

            <div class="col">
                <div class="text-muted small">Visibility</div>
                <?php if($product->p_visibility_status): ?>
                    <span class="badge bg-success">Visible</span>
                <?php else: ?>
                    <span class="badge bg-secondary">Hidden</span>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <!-- COLORS / SIZES / IMAGES -->
    <h4 class="text-center  text-white rounded py-2 mb-3">Colors • Sizes • Images</h4>

    <?php $__currentLoopData = $product->colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card mb-3 shadow-sm">
        <div class="card-body">

            <!-- Color Info -->
            <div class="d-flex align-items-center mb-3">
                <span class="d-inline-block rounded me-3" style="width:30px; height:30px; background:<?php echo e($color->color_code); ?>; border:2px solid #ffb243;"></span>
                <div class="fw-bold me-3"><?php echo e($color->color_name); ?></div>
                <div>₹<?php echo e($color->color_price_adjustment); ?></div>
            </div>

            <!-- Images -->
            <div class="mb-2 fw-semibold">Images:</div>
            <div class="d-flex flex-wrap gap-2 mb-3">
                <?php $__currentLoopData = $color->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <img src="<?php echo e(asset('storage/colors/' . $img->img_path)); ?>" class="img-thumbnail" style="width:75px; height:75px; object-fit:cover; cursor:pointer;" onclick="openPreview(this)">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Sizes -->
            <div class="mb-2 fw-semibold">Sizes:</div>
            <div class="d-flex flex-wrap gap-2">
                <?php $__currentLoopData = $color->sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="border rounded px-2 py-1 d-flex align-items-center gap-2">
                        <?php echo e($size->size_name); ?>

                        <?php if($size->image): ?>
                            <img src="<?php echo e(asset('uploads/products/'.$size->image)); ?>" style="width:55px; height:40px; object-fit:cover; border-radius:5px;" onclick="openPreview(this)">
                        <?php endif; ?>
                        <span class="fw-semibold">₹<?php echo e($size->size_price_adjustment); ?></span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <!-- DESCRIPTION -->
    <h4 class="text-center  text-white rounded py-2 mb-3">Product Description</h4>
    <div class="card shadow mb-5">
        <div class="card-body">
            <div class="mb-3">
                <div class="fw-semibold">Short Description</div>
                <p><?php echo e(Str::limit($product->p_short_description, 400)); ?></p>
            </div>
             <hr>
            <div>
                <div class="fw-semibold">Long Description</div>
                <p><?php echo $product->p_long_description; ?></p>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>






<div id="imgPreviewModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); justify-content:center; align-items:center; z-index:1000; transition:all 1s;">
    <span style="position:absolute; top:20px; right:30px; color:white; font-size:30px; cursor:pointer; transition:all 1s;" onclick="closePreview()">&times;</span>
    <img id="previewImg" src="" style="max-width:90%; max-height:90%; border-radius:10px; box-shadow:0 0 15px white;">
</div>




<?php $__env->startPush('scripts'); ?>


<script>
function openPreview(img) {
    const modal = document.getElementById('imgPreviewModal');
    const preview = document.getElementById('previewImg');
    preview.src = img.src;  // set clicked image src
    modal.style.display = 'flex'; // show modal
}

function closePreview() {
    document.getElementById('imgPreviewModal').style.display = 'none';
}

// Optional: close modal if clicked outside image
document.getElementById('imgPreviewModal').addEventListener('click', function(e) {
    if(e.target.id === 'imgPreviewModal') {
        closePreview();
    }
});
</script>

<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_git\ecommerce-web\resources\views/admin/viewproduct.blade.php ENDPATH**/ ?>