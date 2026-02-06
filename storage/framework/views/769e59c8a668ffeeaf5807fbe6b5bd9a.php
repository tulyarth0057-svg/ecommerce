<?php $__env->startSection('title', 'add-category'); ?>

<?php $__env->startPush('styles'); ?>

<style>
    body {
    background:#f8f9fa;
    font-family: 'Poppins',sans-serif;
    }

    h1 {
        color: #ff6600;
        margin-bottom: 25px;
        text-align: center;
    }
    .form-label {
        color: #ff6600;
        font-weight: 600;
    }
    .btn-orange {
        background-color: #ff6600;
        color: white;
    }
    .btn-orange:hover {
        background-color: #e65c00;
    }
    button{
        background: #ff6600;
        border:none;
        padding: 10px;
        color: white;
        border-radius: 5px;

    }
    .card{
        max-width: 750px;

    }
      select, textarea {
            padding: 10px;
            margin: 7px 0;
            border-radius: 7px;
            align-items: center;
            width: 100%;
            border: 1px solid rgb(235, 234, 234);
        }
        input{
            padding: 10px;
            margin: 7px 0;
            border-radius: 7px;
            align-items: center;
             width: 100%;
             border:1px solid orangered;
        }

</style>
 <?php $__env->stopPush(); ?>

<body>

       <?php $__env->startSection('content'); ?>

       <div class="card w-100 mx-auto mt-4">
        <div class="card-header text-center bg-warning text-white">
            <h4>Add Category</h4>
        </div>

        <div class="card-body">

            <form action="<?php echo e(route('category.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>



                 
        <div class="mb-3">
        <label>Main Category:</label>
    <select name="main_category_id" required>
        <option value="">Select Main Category</option>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $mainCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mainCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <option value="<?php echo e($mainCat->cat_id); ?>"><?php echo e($mainCat->cat_name); ?></option>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </select><br><br>
        </div>




                 <div class="mb-3">
  <label>Category Name</label>
        <input type="text" name="c_name" id="category" class="form-control" required>


        </div>



                <!-- Banner Image -->
                <div class="mb-3">
                    <label class="form-label">Banner Image</label>
                    <input type="file" name="c_banner_img" class="form-control" accept="image/*" onchange="previewBanner(event)">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['c_banner_img'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <img id="bannerPreview" src="#" style="display:none; height: 120px; margin-top:10px;" />
                </div>

                <!-- Category Image -->
                <div class="mb-3">
                    <label class="form-label">Category Image</label>
                    <input type="file" name="c_image" class="form-control" >

                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="c_description" class="form-control" rows="4" required><?php echo e(old('c_description')); ?></textarea>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['c_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                 <div class="text-center p-2">
                <button type="submit" class="button text-center">Save Category</button>
                  </div>
            </form>

        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>




<?php $__env->startPush('scripts'); ?>


<script>
    const categories = {
        men: ["Shirts", "Pants", "Caps", "Shoes"],
        women: ["Dresses", "Bags", "Heels", "Jewelry"],
        kids: ["Books", "Toys", "Kids Clothes", "School Bags"]
    };

    const mainCategory = document.getElementById("main_category");
    const category = document.getElementById("category");

    mainCategory.addEventListener("change", function () {
        const selected = this.value;

        // Reset dropdown
        category.innerHTML = '<option value="">Select Category</option>';

        if (categories[selected]) {
            categories[selected].forEach(item => {
                const option = document.createElement("option");
                option.value = item.toLowerCase();
                option.textContent = item;
                category.appendChild(option);
            });
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    <?php if(session('success')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '<?php echo e(session('success')); ?>',
            confirmButtonColor: '#ff6600',
        });
    <?php endif; ?>
</script>

<?php $__env->stopPush(); ?>

</body>
</html>
<?php $__env->startSection('content'); ?>

  



<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel_git\ecommerce-web\resources\views/admin/addcategory.blade.php ENDPATH**/ ?>