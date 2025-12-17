<?php $__env->startSection('title', 'Add-product'); ?>

    <?php $__env->startPush('styles'); ?>
<style>


     body{
          font-family: 'Poppins',sans-serif;
          background:rgb(245, 243, 241);
    }
           select, textarea {
            padding: 10px;
            margin: 7px 0;
            border-radius: 7px;
            align-items: center;
            width: 100%;
            border: 1px solid orangered;
        }
        input{
            padding: 10px;
            margin: 7px 0;
            border-radius: 7px;
            align-items: center;
             width: 100%;
             border:1px solid orangered;
        }
        form{
            border: 1px solid orangered;
            background: white;
            border-radius: 7px;
        }
        h1{
            color: orange;
            margin-top:-20px;
        }
        .color-option {
  display: flex;
  align-items: center;
  gap: 8px;
  cursor: pointer;
  margin: 6px;
}

.color-box {
  width: 22px;
  height: 22px;
  border-radius: 50%;
  border:1px solid grey;
  display: inline-block;
}



button{
    background-color: orange;
    border: 0;
      transition: all 0.3s;

}
button:hover{
    background-color: orangered;
    cursor: pointer;
    color: white;

}
  .form-section {
      background: white;
      padding: 20px;
      border-radius: 8px;
     border: 1px solid orangered;
      max-width: 650px;
      margin:20px auto;
    }
    .color-input {
      width: 70px;
      height: 38px;
      border: 1px solid #ced4da;
      border-radius: 4px;
    }
    .add-btn {
      background-color:orangered;
      color: white;
      width: 100%;
    }
    .form-control{
        border:1px solid orangered;
    }
</style>
<?php $__env->stopPush(); ?>



    <?php $__env->startSection('content'); ?>

   <div class="container w-75 p-3">
    <div class="row">

     <form action="<?php echo e(route('product.store')); ?>" method="POST" enctype="multipart/form-data" class="p-5">
        <?php echo csrf_field(); ?>
         <h1 class=" text-center">ADD PRODUCT DETAILS</h1>

        <label for="productName" class="p-1 mt-3">Product Name</label>
        <input type="text" id="productName" name="p_name" placeholder="Enter your product name" required>


     <label for="" class="mt-2">Main category</label>
   <select name="main_category_id" id="main_category" required>
    <option value="">Select Main Category</option>
    <?php $__currentLoopData = $mainCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mainCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($mainCat->cat_id); ?>"><?php echo e($mainCat->cat_name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>



<label class="mt-2">Category</label>
<select name="p_category_id" id="category" required>
    <option value="">Select Category</option>
</select>


                <label for="price" class="p-1 mt-3">Price</label>
        <input type="number" id="price" name="p_price" placeholder="Enter your product price" required>




        <div class="form-container">
    <div class="row mb-3 mt-4">

      <div class="col-md-4">
        <label>Old Price (Optional)</label>
        <input type="number" name="p_old_price" class="form-control textarea" placeholder="">
      </div>
      <div class="col-md-4">
        <label>Stock Quantity</label>
        <input type="number" name="p_stock" class="form-control textarea" value="0">
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <label>Visibility Status</label>
       <select class="form-control textarea" name="p_visibility_status">
          <option value="1" selected>Visible</option>
          <option value="0">Invisible</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Product Type</label>
        <input type="text" class="form-control textarea" name="p_type" placeholder="e.g. regular, featured">
      </div>
    </div>
  </div>





   <label class="form-label mt-4 ms-2">Select Product Colors</label>
  <div class="color-card">

    <div class=" mb-3 border border-warning rounded-0 " id="colorcontainer">
    </div>

    <button class="btn btn-warning  w-25 p-2" id="addcolorbtn">+ Add Color</button>
  </div>

       <label class="form-label mt-4 ms-2">Short Description</label>
       <textarea class="form-control textarea" rows="3" placeholder="Enter short description" name="p_short_description" required></textarea>


         <div class="container p-3">
    <div class="mb-1 mt-4">
      <label for="productDescription" class="form-label">Product Long Description</label>
      <textarea id="productDescription" name="p_long_description"></textarea>
    </div>
  </div>

        <div class="p-2 text-center rounded-2 ">
        <button class=" p-3 text-center text-white rounded-2 w-50" type="submit">Add Product in your web <i class="bi bi-arrow-right" class="g-3"></i></button>
        </div>
     </form>
    </div>
  </div>

  <?php $__env->stopSection(); ?>




  <?php $__env->startPush('scripts'); ?>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('#main_category').change(function() {
    var mainId = $(this).val();

    if(mainId) {
        $.ajax({
            url: '/admin/get-categories/' + mainId,
            type: 'GET',
            success: function(data) {
                var categorySelect = $('#category');
                categorySelect.empty();
                categorySelect.append('<option value="">Select Category</option>');
                $.each(data, function(key, category){
                    categorySelect.append('<option value="'+ category.c_id +'">'+ category.c_name +'</option>');
                });
            },
            error: function() {
                alert('Error fetching categories.');
            }
        });
    } else {
        $('#category').empty().append('<option value="">Select Category</option>');
    }
});

</script>







<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
 <script>
    $('#productDescription').summernote({
      placeholder: 'Type product description...',
      tabsize: 2,
      height: 200
    });
  </script>




                                    


<script>
$(document).ready(function() {
    let colorCount = 0;

    // Add Color
    $('#addcolorbtn').click(function(e) {
        e.preventDefault();
        let colorIndex = colorCount++;

        let newColorBox = $(`
            <div class="addcolor p-3 mb-3 border border-warning" data-color-index="${colorIndex}">
                <div class="d-flex align-items-center mb-2">
                    <h5>Color ${colorIndex+1}</h5>
                    <button type="button" class="btn btn-sm btn-danger ms-auto removeBtn">Remove Color</button>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <label>Color Name</label>
                        <input type="text" name="colorname[]" class="form-control" placeholder="Color Name" required>
                    </div>
                    <div class="col-md-4 mb-2">
                        <input type="hidden" name="color_id[]">
                        <label>Color Code</label>
                        <input type="text" name="colorcode[]" class="form-control" placeholder="#FF0000" required>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label>Price Adjustment</label>
                        <input type="text" name="priceadjustment[]" class="form-control" placeholder="Price Adjustment">
                    </div>
                </div>
                <div class="mb-3">
                    <label>Images for this color</label>
                    <input type="file" name="color_images[${colorIndex}][]" multiple>
                </div>
                <div class="size-section">
                    <label>Sizes</label>
                    <div class="sizeContainer"></div>
                    <button type="button" class="btn btn-warning add-size-btn mt-2 w-100">+ Add Size</button>
                </div>
            </div>
        `);

        $('#colorcontainer').append(newColorBox);

    });

    // Remove Color
    $('#colorcontainer').on('click', '.removeBtn', function() {
        $(this).closest('.addcolor').remove();
    });

    // Add Size inside respective color
    $('#colorcontainer').on('click', '.add-size-btn', function() {
        let colorIndex = $(this).closest('.addcolor').data('color-index');
        let sizeContainer = $(this).closest('.size-section').find('.sizeContainer');

        let newSizeBox = $(`
            <div class="row bg-light p-2 mb-2">
                <div class="col-md-6 mb-2">
                    <label>Size Name</label>
                    <input type="text" name="sizename[${colorIndex}][]" class="form-control" placeholder="Size Name">
                </div>
                <div class="col-md-6 mb-2">
                    <label>Price Adjustment</label>
                    <input type="number" name="sizepriceadjustment[${colorIndex}][]" class="form-control" placeholder="Price Adjustment">
                </div>
            </div>
        `);

        sizeContainer.append(newSizeBox);
    });
});
</script>


<!-- Add SweetAlert2 CSS & JS in your head or before closing body -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {
    <?php if(session('success')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Product Added!',
            text: '<?php echo e(session("success")); ?>',
            showConfirmButton: false,
            timer: 2000
        });
    <?php endif; ?>
});
</script>

<?php $__env->stopPush(); ?>



<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_git\ecommerce-web\resources\views/admin/add-product.blade.php ENDPATH**/ ?>