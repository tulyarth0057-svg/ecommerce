

<?php $__env->startSection('title', 'Courier Profile - ' . $courier->name); ?>

<?php $__env->startPush('styles'); ?>
<style>

     body {
        background-color: #f8f9fa;
        font-family: 'Poppins', sans-serif;
    }
    :root {
        --primary-orange:  #ff6600;
        --dark-orange:  #ff6600;
        --light-orange: #fff5eb;
        --text-main: #2d3436;
        --text-muted: #636e72;
    }

    .container-fluid {
        background: #fdfdfd;
        padding: 30px;
    }

    /* Card Styling */
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        margin-bottom: 24px;
        overflow: hidden;
    }

    .card-header-orange {
        background: linear-gradient(45deg, var(--primary-orange), var(--dark-orange));
        color: white;
        padding: 15px 20px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* Profile Sidebar */
    .profile-card {
        text-align: center;
        padding: 30px 20px;
    }

    .profile-img-container {
        position: relative;
        display: inline-block;
        margin-bottom: 15px;
    }

    .profile-img-container img {
        width: 140px;
        height: 140px;
        object-fit: cover;
        border-radius: 50%;
        border: 5px solid var(--light-orange);
        box-shadow: 0 5px 15px rgba(255, 159, 67, 0.3);
    }

    /* Data Grid */
    .info-group {
        padding: 10px;
        border-radius: 8px;
        transition: 0.2s;
    }

    .info-group:hover {
        background: var(--light-orange);
    }

    .info-label {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--text-muted);
        margin-bottom: 4px;
        font-weight: 700;
    }

    .info-value {
        font-size: 0.95rem;
         border-color: var(--primary-orange);
        font-weight: 600;
    }

    /* Image Proofs */
    .proof-container {
        position: relative;
        border-radius: 10px;
        overflow: hidden;
        border: 2px solid #eee;
        transition: 0.3s;
    }

    .proof-container:hover {
        border-color: var(--primary-orange);
        transform: translateY(-3px);
    }

    .proof-label {
        background: rgba(0,0,0,0.6);
        color: white;
        position: absolute;
        bottom: 0;
        width: 100%;
        font-size: 12px;
        padding: 5px;
        text-align: center;
    }

    /* Buttons */
    .btn-back {
        background: white;
        color: var(--dark-orange);
        border: 2px solid var(--primary-orange);
        border-radius: 8px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-back:hover {
        background: var(--primary-orange);
        color: white;
    }

    .status-badge {
        padding: 8px 16px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 13px;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-3 fw-bold">Courier boy Details</h3>
        </div>
        <a href="<?php echo e(route('courierboy.list')); ?>" class="btn btn-back">
            <i class="fas fa-arrow-left me-2"></i> Back to List
        </a>
    </div>

    <div class="row">
        
        <div class="col-xl-4 col-lg-5">
            <div class="card profile-card">
                <div class="profile-img-container">
                    <img src="<?php echo e($courier->profile_photo ? asset('storage/'.$courier->profile_photo) : asset('assetsofdash/images/profile_av.svg')); ?>" alt="Profile">
                </div>
                <h4 class="mt-3 mb-1"><?php echo e($courier->name); ?></h4>
                <p class="text-muted mb-3"><i class="fas fa-envelope me-1"></i> <?php echo e($courier->email); ?></p>
                
                <div class="d-flex justify-content-center gap-2 mb-4">
                    <span class="status-badge <?php echo e($courier->is_verified ? 'bg-success text-white' : 'bg-warning text-dark'); ?>">
                        <i class="fas <?php echo e($courier->is_verified ? 'fa-check-circle' : 'fa-clock'); ?> me-1"></i>
                        <?php echo e($courier->is_verified ? 'Verified Partner' : 'Verification Pending'); ?>

                    </span>
                </div>

                <hr class="my-4" style="opacity: 0.1;">

                <div class="row text-start">
                    <div class="col-6 mb-3">
                        <div class="info-label">Member Since</div>
                        <div class="info-value"><?php echo e($courier->created_at->format('M d, Y')); ?></div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="info-label">Last Updated</div>
                        <div class="info-value"><?php echo e($courier->updated_at->diffForHumans()); ?></div>
                    </div>
                </div>
            </div>

            
            <div class="card p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle bg-light-orange p-3" style="background: var(--light-orange); color: var(--dark-orange);">
                        <i class="fas fa-phone-alt fa-lg"></i>
                    </div>
                    <div>
                        <div class="info-label">Primary Contact</div>
                        <div class="info-value" style="font-size: 1.2rem;"><?php echo e($courier->mobile); ?></div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-xl-8 col-lg-7">
            
            
            <div class="card">
                <div class="card-header-orange">
                    <i class="fas fa-info-circle"></i> General Information
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-6 info-group">
                            <div class="info-label">Full Residential Address</div>
                            <div class="info-value"><?php echo e($courier->address); ?></div>
                        </div>
                        <div class="col-md-3 info-group">
                            <div class="info-label">Identity Type</div>
                            <div class="info-value"><span class="badge bg-light text-dark border"><?php echo e($courier->id_type); ?></span></div>
                        </div>
                        <div class="col-md-3 info-group">
                            <div class="info-label">Courier ID</div>
                            <div class="info-value text-primary">#CR-<?php echo e(str_pad($courier->id, 4, '0', STR_PAD_LEFT)); ?></div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header-orange">
                            <i class="fas fa-id-card"></i> Identity Proof
                        </div>
                        <div class="card-body p-3">
                            <div class="proof-container">
                                <img src="<?php echo e(asset('storage/' . $courier->id_proof)); ?>" class="img-fluid w-100" style="height: 200px; object-fit: cover;">
                                <div class="proof-label">Official ID Document</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header-orange">
                            <i class="fas fa-motorcycle"></i> Vehicle RC
                        </div>
                        <div class="card-body p-3">
                            <div class="proof-container">
                                <img src="<?php echo e(asset('storage/' . $courier->vehicle_rc)); ?>" class="img-fluid w-100" style="height: 200px; object-fit: cover;">
                                <div class="proof-label">Vehicle: <?php echo e($courier->vehicle_type); ?> (<?php echo e($courier->vehicle_number); ?>)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="card">
                <div class="card-header-orange">
                    <i class="fas fa-university"></i> Settlement Bank Details
                </div>
                <div class="card-body" style="background: #fdfaf7;">
                    <div class="row">
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="info-label">Account Holder</div>
                            <div class="info-value"><?php echo e($courier->account_holder_name); ?></div>
                        </div>
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="info-label">Account Number</div>
                            <div class="info-value" style="letter-spacing: 1px;"><?php echo e($courier->bank_account); ?></div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-label">IFSC Code</div>
                            <div class="info-value text-uppercase"><?php echo e($courier->ifsc_code); ?></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel_git\ecommerce-web\resources\views/admin/courierboy-view.blade.php ENDPATH**/ ?>