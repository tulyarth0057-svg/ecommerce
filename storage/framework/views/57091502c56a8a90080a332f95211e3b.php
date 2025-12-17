<?php $__env->startSection('title', 'category-list'); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<style>
    body { background:#f8f9fa;font-family: 'Poppins',sans-serif;  }
    .btn-orange { background-color: #ff6600; color:white; }
    .btn-orange:hover { background-color: #e65c00; }
    table img { height:80px; width:auto; border-radius:5px; }


         /*********** DATATABLE GLOBAL ************/
.dataTables_wrapper {
    font-family: 'Poppins', sans-serif;
    padding: 5px;

}

#productTable thead th {
    background-color: #ff6600 !important;
    color: white !important;
     text-align: center;
     align-items: center;
     padding: 15px;

}




/* Table rows */
#productTable tbody tr td {
    vertical-align: middle;
    font-size: 14px;
    padding: 20px;

}

/* Hover Effect */
#productTable tbody tr:hover {
    background-color: #fff1e6 !important;
}

/*********** SEARCH BOX ************/
.dataTables_wrapper .dataTables_filter {
    margin-bottom: 10px;
}

.dataTables_wrapper .dataTables_filter label {
    font-weight: 500;

}

.dataTables_wrapper .dataTables_filter input {
    border: 1px solid #ff6600;
    border-radius: 5px;
    padding: 6px 12px;
    outline: none;
    transition: all 0.2s ease-in-out;
}

.dataTables_wrapper .dataTables_filter input:focus {
    border-color: #e65c00;
    box-shadow: 0 0 0 0.1rem rgba(255,102,0,0.25);

}

/*********** LENGTH DROPDOWN ************/
.dataTables_wrapper .dataTables_length label {

    font-weight: 500;
}

.dataTables_wrapper .dataTables_length select {
    border: 1px solid #ff6600;
    border-radius: 6px;
    padding: 5px 30px;

}

/*********** PAGINATION ************/
.dataTables_wrapper .dataTables_paginate {
    margin-top: 15px;
    text-align: center !important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button {
    padding: 5px 10px !important;
    margin: px;
    cursor: pointer;
    font-size: 14px;
    transition: 0.3s ease;
}

/* .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background: #ff6600 !important;
    color: white !important;
} */

.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background: #ff6600 !important;
    color: white !important;
    border-radius: 8px;
    font-weight: bold;
}

/* .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
    /* background: #f1f1f1 !important;
    color: #aaa !important;
    border: 1px solid #ddd !important;
} */ */

/*********** TABLE INFO TEXT ************/
.dataTables_wrapper .dataTables_info {
    color: #444;
    font-size: 14px;
    margin-top: 8px;

}

/*********** TABLE BORDER + SHADOW ************/
#productTable {
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);

}



</style>
<?php $__env->stopPush(); ?>



<?php $__env->startSection('content'); ?>

<div class="container-fluid w-100 p-4 d-flex flex-wrap justify-content-center align-items-center">
    <h1 class=" fs-3 fw-bold w-100 py-3 ">Category List</h1>

    <div class="table-responsive  w-100" >
        <table class="table table-bordered table-striped text-center">
            <thead class="text-white bg-warning">
            <tr>
                <th class="text-center text-white"style="background:#ff6600;">>S:no</th>
                 <th class="text-center text-white"style="background:#ff6600;">> Main Category </th>
                <th class="text-center text-white"style="background:#ff6600;">>Category name</th>
                <th class="text-center text-white"style="background:#ff6600;">>Banner</th>
                <th class="text-center text-white"style="background:#ff6600;">>Image</th>
                <th class="text-center text-white"style="background:#ff6600;">>Description</th>
                <th class="text-center text-white"style="background:#ff6600;">>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
              <td><?php echo e($category->mainCategory->cat_name ?? 'No Main Category'); ?></td>
                <td><?php echo e($category->c_name); ?></td>

                <td>
                    <?php if($category->c_banner_img): ?>

                          <img src="<?php echo e(asset($category->c_banner_img)); ?>" alt="<?php echo e($category->c_name); ?>" class="preview-img" onclick="openPreview(this)">
                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($category->c_image): ?>
                      <img src="<?php echo e(asset($category->c_image)); ?>" alt="<?php echo e($category->c_name); ?>" class="preview-img" onclick="openPreview(this)">                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
                <td><?php echo e(Str::limit($category->c_description, 50)); ?></td>
                <td>
                    <a href="<?php echo e(route('category.edit', $category->c_id)); ?>" class="btn btn-sm btn-orange">Edit</a>
                    <form action="<?php echo e(route('category.destroy', $category->c_id)); ?>" method="POST" class="d-inline" onsubmit="return confirmDelete(this)">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="6">No categories found.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<div id="imgPreviewModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); justify-content:center; align-items:center; z-index:1000; transition:all 1s;">
    <span style="position:absolute; top:20px; right:30px; color:white; font-size:30px; cursor:pointer; transition:all 1s;" onclick="closePreview()">&times;</span>
    <img id="previewImg" src="" style="max-width:90%; max-height:90%; border-radius:10px; box-shadow:0 0 15px white;">
</div>


<?php $__env->stopSection(); ?>



<?php $__env->startPush('scripts'); ?>




     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function confirmDelete(form) {
    event.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "This will delete the category!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ff6600',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
}
</script>

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


<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('.table').DataTable({
        "pageLength": 5,
        "lengthMenu": [5, 10, 25, 50, 100],
        "ordering": true,
        "searching": true,
        "responsive": true
    });
});
</script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_git\ecommerce-web\resources\views/admin/categorylist.blade.php ENDPATH**/ ?>