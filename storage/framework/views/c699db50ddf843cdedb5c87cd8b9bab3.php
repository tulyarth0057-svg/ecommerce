

<?php $__env->startSection('title', 'Contact List'); ?>

<?php $__env->startPush('styles'); ?>
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">

<style>
    body{
        font-family: 'Poppins', sans-serif;
        background: rgb(245, 243, 241);
    }

    .page-header {
        margin-bottom: 2rem;
    }

    .page-header h1 {
        color: black;
        font-size: 2rem;
        font-weight: 700;
        margin: 0;
    }
    
    .table-card {
        background: white;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(234, 88, 12, 0.1);
        overflow: hidden;
    }

    .table-header {
        background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
        padding: 1.5rem;
        color: white;
    }

    .table-header h2 {
        margin: 0;
        font-size: 1.25rem;
        font-weight: 600;
    }

    .table-wrapper {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background:#ff6600;
    }

    thead th {
        padding: 1rem;
        text-align: left;
        font-weight: 600;
        color:white;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    tbody tr {
        border-bottom: 1px solid #fed7aa;
        transition: background-color 0.2s;
    }

    tbody tr:hover {
        background: #ffedd5;
    }

    tbody td {
        padding: 1rem;
        color: #292524;
    }

    .badge {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .badge-pending {
        background: #fed7aa;
        color: #c2410c;
    }

    .badge-processing {
        background: #dbeafe;
        color: #1e40af;
    }

    .badge-completed {
        background: #d1fae5;
        color: #065f46;
    }

    .badge-cancelled {
        background: #fee2e2;
        color: #991b1b;
    }

    .action-btn {
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 6px;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.2s;
        margin-right: 0.5rem;
    }

    .btn-view {
        background: #f97316;
        color: white;
    }

    .btn-view:hover {
        background: #ea580c;
        transform: translateY(-1px);
    }

    .btn-edit {
        background: #fed7aa;
        color: #c2410c;
    }

    .btn-edit:hover {
        background: #fdba74;
    }

    
/* ============================
   DATATABLES WRAPPER
============================ */
.dataTables_wrapper {
    padding: 1rem 1.5rem;
    font-family: 'Poppins', sans-serif;
   
}

/* ============================
   SHOW ENTRIES + SEARCH
============================ */
.dataTables_length,
.dataTables_filter {
    margin-bottom: 1rem;
}

.dataTables_length label,
.dataTables_filter label {
    font-size: 0.85rem;
    font-weight: 600;
    color: #444;
}

/* Select & search input */
.dataTables_length select,
.dataTables_filter input {
    width: auto !important;
    min-width: 80px;
    padding: 6px 10px;
    margin: 0 6px;
    border-radius: 6px;
    border: 1px solid #ff6600;
    outline: none;
}

/* ============================
   TABLE STYLING
============================ */
table.dataTable {
    border-collapse: collapse !important;
}

table.dataTable thead th {
    background: #ff6600;
    color: #fff;
    font-weight: 600;
    font-size: 0.85rem;
    text-transform: uppercase;
    border-bottom: none;
}

table.dataTable tbody tr {
    transition: background 0.2s ease;
}

table.dataTable tbody tr:hover {
color: #ffedd5;
background: #ea580c;
}

    
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="contact-container">
    <div class="page-header">
        <h1>Contact List</h1>
    </div>

    <div class="container mt-4">
        <table class="table table-bordered table-hover" id="contactTable">
            <thead class="table-thead">
                <tr>
                    <th>S:No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <tr>
                        <td><?php echo e($key + 1); ?></td>
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td><?php echo e($user->phone); ?></td>
                        <td class="text-center">
                            
                          <form action="<?php echo e(route('admin.user.delete', $user->id)); ?>" method="POST" class="d-inline delete-form">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <button type="button" class="btn btn-sm btn-danger delete-btn">
        Delete
    </button>
</form>


                        </td>
                    </tr>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <tr>
                        <td colspan="5" class="text-center">No Users Found</td>
                    </tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function () {
    $('#contactTable').DataTable({
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50],
        searching: true,
        ordering: true,
        info: true
    });
});
</script>


<script>
$(document).on('click', '.delete-btn', function () {

    let form = $(this).closest('form');

    Swal.fire({
        title: 'Are you sure?',
        text: "This user will be deleted!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e65c00',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});



</script>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Deleted!',
    text: '<?php echo e(session('success')); ?>',
    confirmButtonColor: '#e65c00'
});
</script>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel_git\ecommerce-web\resources\views/admin/contact-list.blade.php ENDPATH**/ ?>