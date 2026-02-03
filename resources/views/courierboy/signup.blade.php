@extends('layouts.frontend-layout')

@section('title', 'Courier Boy Signup Form')

@push('styles')
<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<style>
    .signup-container {
        min-height: 100vh;
        padding: 40px 20px;
    }

    .signup-form-wrapper {
        max-width: 700px;
        margin: 0 auto;
        background: #fff;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    }

    .form-header {
        text-align: center;
        margin-bottom: 35px;
    }

    .form-header h2 {
        color: #333;
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .form-header p {
        color: #666;
        font-size: 16px;
    }

    .form-section {
        margin-bottom: 30px;
    }

    .section-title {
        font-size: 18px;
        font-weight: 600;
        color: #db3700;
        margin-bottom: 15px;
        padding-bottom: 8px;
        border-bottom: 2px solid #f0f0f0;
    }

    .form-group {
        margin-bottom: 20px;
        position: relative;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #333;
        font-weight: 500;
        font-size: 14px;
    }

    .required {
        color: #db3700;
        margin-left: 3px;
    }

    .form-control {
        width: 100%;
        padding: 14px 16px;
        border-radius: 10px;
        border: 2px solid #e0e0e0;
        font-size: 15px;
        transition: all 0.3s ease;
        background-color: #f9f9f9;
    }

    .form-control:focus {
        border-color: #db3700;
        background-color: #fff;
        box-shadow: 0 0 0 4px rgba(219, 55, 0, 0.1);
        outline: none;
    }

    .form-control:hover {
        border-color: #bbb;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
        font-family: inherit;
    }

    .file-input-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
        width: 100%;
    }

    .file-input-wrapper input[type=file] {
        position: absolute;
        left: -9999px;
    }

    .file-input-label {
        display: flex;
        align-items: center;
        padding: 14px 16px;
        background-color: #f9f9f9;
        border: 2px dashed #e0e0e0;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .file-input-label:hover {
        border-color: #db3700;
        background-color: #fff5f2;
    }

    .file-input-label svg {
        width: 24px;
        height: 24px;
        margin-right: 10px;
        color: #db3700;
    }

    .file-name {
        font-size: 14px;
        color: #666;
    }

    .file-name.has-file {
        color: #27ae60;
        font-weight: 500;
    }

    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .submit-btn {
        width: 100%;
        padding: 16px;
        background: #db3700;
        color: white;
        font-size: 18px;
        font-weight: 600;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        margin-top: 20px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(219, 55, 0, 0.4);
    }

    .submit-btn:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(219, 55, 0, 0.5);
        background: #c23000;
    }

    .submit-btn:active {
        transform: translateY(0);
    }

    .submit-btn:disabled {
        background: #ccc;
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
    }

    .error-message {
        color: #db3700;
        font-size: 13px;
        margin-top: 5px;
        display: none;
    }

    .form-group.error .form-control,
    .form-group.error .file-input-label {
        border-color: #db3700;
        background-color: #fff5f2;
    }

    .form-group.error .error-message {
        display: block;
    }

    .helper-text {
        font-size: 12px;
        color: #999;
        margin-top: 5px;
    }

    .password-strength {
        height: 4px;
        background: #e0e0e0;
        border-radius: 2px;
        margin-top: 8px;
        overflow: hidden;
    }

    .password-strength-bar {
        height: 100%;
        width: 0;
        transition: all 0.3s ease;
    }

    .strength-weak { background: #e74c3c; width: 33%; }
    .strength-medium { background: #f39c12; width: 66%; }
    .strength-strong { background: #27ae60; width: 100%; }

    /* Custom SweetAlert2 Styling */
    .swal2-popup {
        border-radius: 20px;
        font-family: inherit;
    }

    .swal2-title {
        font-size: 28px;
        font-weight: 700;
    }

    .swal2-html-container {
        font-size: 16px;
    }

    .swal2-confirm {
        background: #db3700 !important;
        border-radius: 10px;
        padding: 12px 30px;
        font-size: 16px;
        font-weight: 600;
    }

    .swal2-confirm:hover {
        background: #c23000 !important;
    }

    .swal2-cancel {
        border-radius: 10px;
        padding: 12px 30px;
        font-size: 16px;
    }

    @media (max-width: 768px) {
        .signup-form-wrapper {
            padding: 30px 20px;
        }

        .form-header h2 {
            font-size: 26px;
        }

        .grid-2 {
            grid-template-columns: 1fr;
        }
    }
     .extra-links {
        margin-top: 20px;
        text-align: center;
        font-size: 14px;
    }

    .extra-links a {
        color: #db3700;
        text-decoration: none;
        font-weight: 500;
    }
    .extra-links a:hover {
        text-decoration: underline;
    }
       
</style>
@endpush

@section('content')

<div class="signup-container">
    <div class="signup-form-wrapper">
        <div class="form-header">
            <h2>🚴 Courier Boy Registration</h2>
            <p>Join our delivery team and start earning today</p>
        </div>

        <form id="courierSignupForm" enctype="multipart/form-data">
            @csrf

            <!-- Personal Information -->
            <div class="form-section">
                <h3 class="section-title">Personal Information</h3>
                
                <div class="form-group">
                    <label for="name">Full Name <span class="required">*</span></label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter your full name" required>
                    <span class="error-message">Please enter your full name</span>
                </div>

                <div class="grid-2">
                    <div class="form-group">
                        <label for="mobile">Mobile Number <span class="required">*</span></label>
                        <input type="tel" id="mobile" name="mobile" class="form-control" placeholder="10-digit mobile number" pattern="[0-9]{10}" required>
                        <span class="error-message">Please enter valid 10-digit mobile number</span>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address <span class="required">*</span></label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="your@email.com" required>
                        <span class="error-message">Please enter a valid email address</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="address">Residential Address <span class="required">*</span></label>
                    <textarea id="address" name="address" class="form-control" placeholder="Enter your complete address" required></textarea>
                    <span class="error-message">Please enter your address</span>
                </div>

                <div class="form-group">
    <label for="profile_photo">Profile Photo <span class="required">*</span></label>
    <div class="file-input-wrapper">
        <input type="file"
               id="profile_photo"
               name="profile_photo"
               accept="image/*"
               required>

        <label for="profile_photo" class="file-input-label">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z"/>
            </svg>
            <span class="file-name" data-default="Choose profile photo">
                Choose profile photo
            </span>
        </label>
    </div>
    <p class="helper-text">JPG or PNG only (Max 2MB)</p>
    <span class="error-message">Please upload profile photo</span>
</div>

            </div>

            <!-- Account Security -->
            <div class="form-section">
                <h3 class="section-title">Account Security</h3>
                
                <div class="grid-2">
                    <div class="form-group">
                        <label for="password">Password <span class="required">*</span></label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Create strong password" required>
                        <div class="password-strength">
                            <div class="password-strength-bar" id="strengthBar"></div>
                        </div>
                        <p class="helper-text">Min. 8 characters with letters and numbers</p>
                        <span class="error-message">Password must be at least 8 characters</span>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password <span class="required">*</span></label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Re-enter password" required>
                        <span class="error-message">Passwords do not match</span>
                    </div>
                </div>
            </div>

            <!-- ID Verification -->
            <div class="form-section">
                <h3 class="section-title">ID Verification</h3>
                
                <div class="grid-2">
                    <div class="form-group">
                        <label for="id_type">ID Proof Type <span class="required">*</span></label>
                        <select id="id_type" name="id_type" class="form-control" required>
                            <option value="">Select ID Type</option>
                            <option value="Aadhaar">Aadhaar Card</option>
                            <option value="DL">Driving License</option>
                            <option value="Passport">Passport</option>
                            <option value="VoterID">Voter ID</option>
                        </select>
                        <span class="error-message">Please select an ID type</span>
                    </div>

                    <div class="form-group">
                        <label for="id_proof">Upload ID Proof <span class="required">*</span></label>
                        <div class="file-input-wrapper">
                            <input type="file" id="id_proof" name="id_proof" accept="image/*,.pdf" required>
                            <label for="id_proof" class="file-input-label">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <span class="file-name" data-default="Choose file">Choose file</span>
                            </label>
                        </div>
                        <p class="helper-text">JPG, PNG or PDF (Max 5MB)</p>
                        <span class="error-message">Please upload ID proof</span>
                    </div>
                </div>
            </div>

            <!-- Vehicle Information -->
            <div class="form-section">
                <h3 class="section-title">Vehicle Information</h3>
                
                <div class="grid-2">
                    <div class="form-group">
                        <label for="vehicle_type">Vehicle Type <span class="required">*</span></label>
                        <select id="vehicle_type" name="vehicle_type" class="form-control" required>
                            <option value="">Select Vehicle</option>
                            <option value="Bike">🏍️ Bike/Scooter</option>
                            <option value="Car">🚗 Car</option>
                            <option value="Van">🚐 Van</option>
                            <option value="Bicycle">🚲 Bicycle</option>
                        </select>
                        <span class="error-message">Please select vehicle type</span>
                    </div>

                    <div class="form-group">
                        <label for="vehicle_number">Vehicle Number <span class="required">*</span></label>
                        <input type="text" id="vehicle_number" name="vehicle_number" class="form-control" placeholder="e.g., DL01AB1234" style="text-transform: uppercase;" required>
                        <span class="error-message">Please enter vehicle number</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="vehicle_rc">Vehicle RC (Registration Certificate) <span class="required">*</span></label>
                    <div class="file-input-wrapper">
                        <input type="file" id="vehicle_rc" name="vehicle_rc" accept="image/*,.pdf" required>
                        <label for="vehicle_rc" class="file-input-label">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                            <span class="file-name" data-default="Choose RC file">Choose RC file</span>
                        </label>
                    </div>
                    <p class="helper-text">JPG, PNG or PDF (Max 5MB)</p>
                    <span class="error-message">Please upload vehicle RC</span>
                </div>
            </div>

            <!-- Bank Details -->
            <div class="form-section">
                <h3 class="section-title">Bank Details</h3>
                
                <div class="form-group">
                    <label for="bank_account">Bank Account Number <span class="required">*</span></label>
                    <input type="text" id="bank_account" name="bank_account" class="form-control" placeholder="Enter your bank account number" required>
                    <p class="helper-text">Your earnings will be transferred to this account</p>
                    <span class="error-message">Please enter valid bank account number</span>
                </div>

                <div class="grid-2">
                    <div class="form-group">
                        <label for="ifsc_code">IFSC Code <span class="required">*</span></label>
                        <input type="text" id="ifsc_code" name="ifsc_code" class="form-control" placeholder="e.g., SBIN0001234" style="text-transform: uppercase;" required>
                        <span class="error-message">Please enter valid IFSC code</span>
                    </div>

                    <div class="form-group">
                        <label for="account_holder_name">Account Holder Name <span class="required">*</span></label>
                        <input type="text" id="account_holder_name" name="account_holder_name" class="form-control" placeholder="As per bank records" required>
                        <span class="error-message">Please enter account holder name</span>
                    </div>
                </div>
            </div>

            <button type="submit" class="submit-btn" id="submitBtn">Complete Registration 🚀</button>
        </form>

        {{-- btnfor login --}}

        <div class="extra-links">
            <p>Already have an account ? <a href="{{ route('courier.login') }}">Login</a></p>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('courierSignupForm');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('password_confirmation');
    const strengthBar = document.getElementById('strengthBar');
    const submitBtn = document.getElementById('submitBtn');

    // FILE INPUT HANDLING
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function() {
            const label = this.nextElementSibling;
            const fileName = label.querySelector('.file-name');
            const defaultText = fileName.getAttribute('data-default');
            
            if (this.files.length > 0) {
                const file = this.files[0];
                const maxSize = 5 * 1024 * 1024; // 5MB
                
                if (file.size > maxSize) {
                    Swal.fire({
                        icon: 'error',
                        title: 'File Too Large!',
                        text: 'Please upload a file smaller than 5MB',
                        confirmButtonText: 'Okay'
                    });
                    this.value = '';
                    fileName.textContent = defaultText;
                    fileName.classList.remove('has-file');
                    return;
                }
                
                fileName.textContent = file.name;
                fileName.classList.add('has-file');
            } else {
                fileName.textContent = defaultText;
                fileName.classList.remove('has-file');
            }
        });
    });

    // PASSWORD STRENGTH METER
    password.addEventListener('input', function() {
        const value = this.value;
        let strength = 0;

        if (value.length >= 8) strength++;
        if (/[a-z]/.test(value) && /[A-Z]/.test(value)) strength++;
        if (/[0-9]/.test(value)) strength++;
        if (/[^a-zA-Z0-9]/.test(value)) strength++;

        strengthBar.className = 'password-strength-bar';
        if (strength >= 3) {
            strengthBar.classList.add('strength-strong');
        } else if (strength >= 2) {
            strengthBar.classList.add('strength-medium');
        } else if (strength >= 1) {
            strengthBar.classList.add('strength-weak');
        } else {
            strengthBar.style.width = '0';
        }
    });

    // REAL-TIME PASSWORD MATCH VALIDATION
    confirmPassword.addEventListener('input', function() {
        const group = this.closest('.form-group');
        if (this.value !== password.value && this.value.length > 0) {
            group.classList.add('error');
        } else {
            group.classList.remove('error');
        }
    });

    // AUTO UPPERCASE FOR SPECIFIC FIELDS
    document.querySelectorAll('[style*="text-transform: uppercase"]').forEach(input => {
        input.addEventListener('input', function() {
            this.value = this.value.toUpperCase();
        });
    });

    // AJAX FORM SUBMISSION
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        let isValid = true;

        // Clear previous errors
        document.querySelectorAll('.form-group.error').forEach(el => {
            el.classList.remove('error');
        });

        // Validate required fields
        const requiredFields = form.querySelectorAll('[required]');
        requiredFields.forEach(field => {
            if (field.type === 'file') {
                if (!field.files.length) {
                    field.closest('.form-group').classList.add('error');
                    isValid = false;
                }
            } else if (!field.value.trim()) {
                field.closest('.form-group').classList.add('error');
                isValid = false;
            }
        });

        // Validate mobile number
        const mobile = document.getElementById('mobile');
        if (!/^[0-9]{10}$/.test(mobile.value)) {
            mobile.closest('.form-group').classList.add('error');
            isValid = false;
        }

        // Validate email
        const email = document.getElementById('email');
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
            email.closest('.form-group').classList.add('error');
            isValid = false;
        }

        // Validate password match
        if (password.value !== confirmPassword.value) {
            confirmPassword.closest('.form-group').classList.add('error');
            isValid = false;
        }

        // Validate password strength
        if (password.value.length < 8) {
            password.closest('.form-group').classList.add('error');
            isValid = false;
        }

        if (!isValid) {
            Swal.fire({
                icon: 'error',
                title: 'Validation Error!',
                text: 'Please fill all required fields correctly',
                confirmButtonText: 'Okay'
            });
            
            const firstError = document.querySelector('.form-group.error');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
            return false;
        }

        // Disable submit button
        submitBtn.disabled = true;
        submitBtn.innerHTML = '⏳ Submitting...';

        // Show loading alert
        Swal.fire({
            title: 'Processing...',
            text: 'Please wait while we submit your application',
            allowOutsideClick: false,
            allowEscapeKey: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        // Prepare FormData
        const formData = new FormData(form);

        // AJAX Request
        fetch("{{ route('courierboy.signup.store') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Accept': 'application/json',
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(data => {
                    throw data;
                });
            }
            return response.json();
        })
        .then(data => {
            // Success SweetAlert
            Swal.fire({
                icon: 'success',
                title: 'Registration Successful! 🎉',
                text: data.message || 'Your application has been submitted successfully. We will contact you soon!',
                confirmButtonText: 'Great!',
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    // Reset form
                    form.reset();
                    
                    // Reset file inputs display
                    document.querySelectorAll('.file-name').forEach(el => {
                        el.textContent = el.dataset.default;
                        el.classList.remove('has-file');
                    });
                    
                    // Reset password strength bar
                    strengthBar.className = 'password-strength-bar';
                    
                    // Optional: Redirect to success page
                    // window.location.href = '/success-page';
                }
            });
        })
        .catch(error => {
            // Error handling with SweetAlert
            if (error.errors) {
                // Laravel validation errors
                let errorMessages = [];
                Object.keys(error.errors).forEach(key => {
                    const field = document.getElementById(key);
                    if (field) {
                        const group = field.closest('.form-group');
                        group.classList.add('error');
                        const errorMsg = group.querySelector('.error-message');
                        if (errorMsg) {
                            errorMsg.textContent = error.errors[key][0];
                            errorMsg.style.display = 'block';
                        }
                    }
                    errorMessages.push(`• ${error.errors[key][0]}`);
                });
                
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Failed!',
                    html: errorMessages.join('<br>'),
                    confirmButtonText: 'Fix Errors'
                });
                
                // Scroll to first error
                const firstError = document.querySelector('.form-group.error');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Submission Failed!',
                    text: error.message || 'Something went wrong. Please try again later.',
                    confirmButtonText: 'Retry'
                });
            }
        })
        .finally(() => {
            // Re-enable submit button
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Complete Registration 🚀';
        });
    });
});
</script>
@endpush