

<?php $__env->startSection('title', 'Update Profile'); ?>

<?php $__env->startPush('styles'); ?>
    


<style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Cabinet+Grotesk:wght@400;500;600;700&display=swap');

    :root {
        --bg-base:        #fff8f2;
        --bg-card:        #ffffff;
        --bg-input:       #fef6f0;
        --bg-input-focus: #fff3e6;
        --accent:         #f07800;
        --accent-soft:    #f59332;
        --accent-glow:    rgba(240, 120, 0, 0.22);
        --accent-light:   #fff0db;
        --accent-pale:    #fff7ee;
        --accent2:        #ff6a1a;
        --text-primary:   #1e1e1e;
        --text-secondary: #6b7080;
        --text-muted:     #a3a8b8;
        --border:         #ede8e1;
        --border-focus:   #f07800;
        --success:        #22c55e;
        --success-bg:     #eefbf2;
        --success-border: rgba(34,197,94,0.3);
        --error:          #ef4444;
        --error-bg:       #fef2f2;
        --error-border:   rgba(239,68,68,0.3);
        --error-glow:     rgba(239, 68, 68, 0.2);
        --radius:         14px;
        --radius-sm:      10px;
        --shadow-card:    0 4px 28px rgba(240,120,0,0.08);
        --shadow-card-hover: 0 8px 40px rgba(240,120,0,0.13);
        --transition:     0.3s cubic-bezier(.4,0,.2,1);
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
  
        color: var(--text-primary);
        font-family: 'Outfit', sans-serif;
        min-height: 100vh;
    }

    /* ─── Page ─── */
    .up-page {
        min-height: 100vh;
        padding: 56px 20px 100px;
        position: relative;
        overflow: hidden;
    }

    /* Soft decorative circles */
    .up-page .blob {
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
        z-index: 0;
    }
    .blob-1 {
        width: 420px; height: 420px;
        background: radial-gradient(circle, rgba(240,120,0,0.08) 0%, transparent 70%);
        top: -140px; left: -100px;
    }
    .blob-2 {
        width: 300px; height: 300px;
        background: radial-gradient(circle, rgba(255,106,26,0.07) 0%, transparent 70%);
        bottom: -80px; right: -60px;
    }
    .blob-3 {
        width: 180px; height: 180px;
        background: radial-gradient(circle, rgba(245,147,50,0.06) 0%, transparent 70%);
        top: 45%; left: 65%;
    }

    .up-container {
        position: relative;
        z-index: 1;
        max-width: 680px;
        margin: 0 auto;
    }

    /* ─── Header ─── */
    .up-header { margin-bottom: 28px; text-align: center; }
    .up-header h1 {
        font-family: 'Cabinet Grotesk', sans-serif;
        font-size: 1.9rem;
        font-weight: 700;
        letter-spacing: -0.6px;
        color: var(--text-primary);
    }
    .up-header h1 span {
        background: linear-gradient(135deg, var(--accent), var(--accent-soft));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    .up-header p {
        color: var(--text-secondary);
        font-size: 0.88rem;
        margin-top: 5px;
        font-weight: 300;
    }

    /* ─── Toast ─── */
    .up-toast {
        border-radius: var(--radius);
        padding: 14px 18px;
        margin-bottom: 22px;
        display: flex;
        align-items: center;
        gap: 12px;
        position: relative;
        overflow: hidden;
        animation: slideDown 0.35s ease;
    }
    .up-toast.success {
        background: var(--success-bg);
        border: 1px solid var(--success-border);
    }
    .up-toast.error {
        background: var(--error-bg);
        border: 1px solid var(--error-border);
    }
    .up-toast .toast-icon-success { color: var(--success); display: none; }
    .up-toast .toast-icon-error   { color: var(--error);   display: none; }
    .up-toast.success .toast-icon-success { display: block; }
    .up-toast.error   .toast-icon-error   { display: block; }
    .up-toast.success span { color: #166534; font-size: 0.87rem; font-weight: 500; }
    .up-toast.error   span { color: #991b1b; font-size: 0.87rem; font-weight: 500; }
    .up-toast svg { width: 20px; height: 20px; flex-shrink: 0; }

    /* countdown bar */
    .up-toast::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0;
        height: 3px;
        width: 100%;
        border-radius: 0 0 var(--radius) var(--radius);
        animation: toastBar 3.5s linear forwards;
    }
    .up-toast.success::after { background: var(--success); }
    .up-toast.error::after   { background: var(--error); }
    @keyframes toastBar { from { width:100%; } to { width:0%; } }
    @keyframes slideDown { from { opacity:0; transform:translateY(-10px); } to { opacity:1; transform:translateY(0); } }
    .up-toast.hidden { display: none; }

    /* ─── Card ─── */
    .up-card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: 22px;
        box-shadow: var(--shadow-card);
        overflow: hidden;
        transition: box-shadow var(--transition);
        animation: cardFadeUp 0.5s cubic-bezier(.4,0,.2,1) both;
    }
    .up-card:hover { box-shadow: var(--shadow-card-hover); }
    @keyframes cardFadeUp { from { opacity:0; transform:translateY(24px); } to { opacity:1; transform:translateY(0); } }

    /* ─── Avatar Section ─── */
    .up-avatar-section {
        background: linear-gradient(160deg, var(--accent-pale) 0%, var(--accent-light) 100%);
        border-bottom: 1px solid var(--border);
        padding: 38px 30px 34px;
        text-align: center;
        position: relative;
    }
    /* top accent stripe */
    .up-avatar-section::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        background: linear-gradient(90deg, transparent 5%, var(--accent) 35%, var(--accent-soft) 65%, transparent 95%);
    }

    .up-avatar-ring {
        width: 118px; height: 118px;
        margin: 0 auto 16px;
        position: relative;
        cursor: pointer;
        display: block;
    }
    /* gradient border ring */
    .up-avatar-ring::before {
        content: '';
        position: absolute;
        inset: -3px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--accent), var(--accent-soft), #ffb347);
        z-index: 0;
        transition: box-shadow var(--transition);
    }
    .up-avatar-ring:hover::before { box-shadow: 0 0 18px var(--accent-glow); }

    .up-avatar-ring img {
        position: relative;
        z-index: 1;
        width: 118px; height: 118px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid var(--bg-card);
    }
    .up-avatar-overlay {
        position: absolute; inset: 0;
        border-radius: 50%;
        background: rgba(240,120,0,0.55);
        z-index: 2;
        display: flex; align-items: center; justify-content: center;
        opacity: 0;
        transition: opacity var(--transition);
    }
    .up-avatar-ring:hover .up-avatar-overlay { opacity: 1; }
    .up-avatar-overlay svg { color: #fff; width: 26px; height: 26px; }

    .up-avatar-label {
        color: var(--text-secondary);
        font-size: 0.8rem;
    }
    .up-avatar-label span { color: var(--accent); font-weight: 600; }

    /* ─── Form Body ─── */
    .up-form-body { padding: 34px 36px 40px; }

    /* Section Label */
    .up-section-label {
        font-family: 'Cabinet Grotesk', sans-serif;
        font-size: 0.7rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1.8px;
        color: var(--accent);
        margin-bottom: 16px;
        margin-top: 32px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .up-section-label:first-child { margin-top: 0; }
    .up-section-label::after {
        content: '';
        flex: 1;
        height: 1.5px;
        background: linear-gradient(90deg, var(--border), transparent);
        border-radius: 2px;
    }
    .up-section-label .sl-dot {
        width: 7px; height: 7px;
        border-radius: 50%;
        background: var(--accent);
        box-shadow: 0 0 6px var(--accent-glow);
    }

    /* Grid */
    .up-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }
    @media (max-width: 580px) {
        .up-grid { grid-template-columns: 1fr; }
        .up-form-body { padding: 26px 20px 34px; }
    }

    /* ─── Input Group ─── */
    .up-group { display: flex; flex-direction: column; gap: 6px; }

    .up-group label {
        font-size: 0.82rem;
        font-weight: 600;
        color: var(--text-secondary);
        letter-spacing: 0.2px;
        transition: color var(--transition);
    }
    .up-group:focus-within label { color: var(--accent); }

    .up-input-wrap { position: relative; }
    .up-input-wrap .input-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        width: 18px; height: 18px;
        color: var(--text-muted);
        transition: color var(--transition);
        pointer-events: none;
    }
    .up-group:focus-within .input-icon { color: var(--accent); }

    .up-input {
        width: 100%;
        background: var(--bg-input);
        border: 1.5px solid var(--border);
        border-radius: var(--radius-sm);
        padding: 13px 16px 13px 42px;
        color: var(--text-primary);
        font-family: 'Outfit', sans-serif;
        font-size: 0.9rem;
        font-weight: 400;
        outline: none;
        transition: border-color var(--transition), background var(--transition), box-shadow var(--transition);
    }
    .up-input::placeholder { color: var(--text-muted); }
    .up-input:hover:not(:focus) { border-color: #e0d5cc; }
    .up-input:focus {
        border-color: var(--border-focus);
        background: var(--bg-input-focus);
        box-shadow: 0 0 0 3px var(--accent-glow);
    }

    /* errors */
    .up-error {
        font-size: 0.77rem;
        color: var(--error);
        min-height: 1em;
        display: none;
    }
    .up-error.visible { display: block; animation: fadeIn 0.22s ease; }
    .up-input.is-error { border-color: var(--error); background: #fff5f5; }
    .up-input.is-error:focus { box-shadow: 0 0 0 3px var(--error-glow); border-color: var(--error); }
    @keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

    /* ─── Submit Button ─── */
    .up-submit-wrap {
        margin-top: 36px;
        display: flex;
        justify-content: center;
    }
    .up-btn {
        position: relative;
        background: linear-gradient(135deg, var(--accent) 0%, var(--accent2) 100%);
        color: #fff;
        border: none;
        border-radius: 50px;
        padding: 14px 48px;
        font-family: 'Outfit', sans-serif;
        font-size: 0.92rem;
        font-weight: 600;
        letter-spacing: 0.4px;
        cursor: pointer;
        overflow: hidden;
        min-width: 195px;
        transition: transform var(--transition), box-shadow var(--transition);
        box-shadow: 0 4px 18px var(--accent-glow);
    }
    .up-btn::before {
        content: '';
        position: absolute; inset: 0;
        background: linear-gradient(135deg, rgba(255,255,255,0.18), transparent 55%);
        pointer-events: none;
    }
    .up-btn:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: 0 8px 28px rgba(240,120,0,0.35);
    }
    .up-btn:active:not(:disabled) { transform: translateY(0); }
    .up-btn:disabled { opacity: 0.6; cursor: not-allowed; }

    .up-btn .btn-inner {
        position: relative; z-index: 1;
        display: flex; align-items: center; justify-content: center;
        gap: 8px; min-height: 22px;
    }
    .up-btn .btn-inner svg { width: 18px; height: 18px; }

    /* Spinner */
    .btn-spinner {
        width: 20px; height: 20px;
        border: 2.5px solid rgba(255,255,255,0.3);
        border-top-color: #fff;
        border-radius: 50%;
        animation: spin 0.6s linear infinite;
        display: none;
    }
    .btn-spinner.visible { display: block; }
    @keyframes spin { to { transform:rotate(360deg); } }
    .btn-text { transition: opacity 0.2s; }
    .btn-text.hidden { opacity: 0; position: absolute; }

    /* ─── Staggered In ─── */
    .up-group { animation: groupIn 0.42s ease both; }
    .up-grid .up-group:nth-child(1) { animation-delay: 0.06s; }
    .up-grid .up-group:nth-child(2) { animation-delay: 0.12s; }
    .up-grid .up-group:nth-child(3) { animation-delay: 0.18s; }
    .up-grid .up-group:nth-child(4) { animation-delay: 0.24s; }
    .up-grid .up-group:nth-child(5) { animation-delay: 0.3s; }
    .up-grid .up-group:nth-child(6) { animation-delay: 0.36s; }
    @keyframes groupIn { from { opacity:0; transform:translateY(12px); } to { opacity:1; transform:translateY(0); } }
</style>


<style>
    /* ── SweetAlert2 custom styling — orange theme se match ── */
    .swal2-styled.swal2-confirm {
        background: linear-gradient(135deg, #f07800, #ff6a1a) !important;
        border-radius: 50px !important;
        font-family: 'Outfit', sans-serif !important;
        font-weight: 600 !important;
        box-shadow: 0 4px 14px rgba(240,120,0,0.35) !important;
    }
    .swal2-styled.swal2-confirm:hover {
        background: linear-gradient(135deg, #d96d00, #e05a10) !important;
    }
    .swal2-styled.swal2-deny {
        background: #f0f0f0 !important;
        color: #444 !important;
        border-radius: 50px !important;
        font-family: 'Outfit', sans-serif !important;
    }
    .swal2-popup {
        border-radius: 20px !important;
        font-family: 'Outfit', sans-serif !important;
        box-shadow: 0 10px 40px rgba(0,0,0,0.12) !important;
    }
    .swal2-title {
        font-family: 'Cabinet Grotesk', sans-serif !important;
        color: #1e1e1e !important;
        font-size: 1.3rem !important;
    }
    .swal2-html-container {
        color: #6b7080 !important;
        font-size: 0.9rem !important;
    }
    .swal2-icon.swal2-success {
        border-color: #22c55e !important;
        color: #22c55e !important;
    }
    .swal2-icon.swal2-error {
        border-color: #ef4444 !important;
        color: #ef4444 !important;
    }
    .swal2-icon.swal2-warning {
        border-color: #f07800 !important;
        color: #f07800 !important;
    }
    /* success icon animation color */
    .swal2-icon.swal2-success .swal2-success-ring {
        border-color: rgba(34,197,94,0.2) !important;
    }
    .swal2-icon.swal2-success .swal2-success-line-long,
    .swal2-icon.swal2-success .swal2-success-line-tip {
        background-color: #22c55e !important;
    }
    /* error icon */
    .swal2-icon.swal2-error .swal2-x-mark-line-left,
    .swal2-icon.swal2-error .swal2-x-mark-line-right {
        background-color: #ef4444 !important;
    }
</style>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<div class="up-page">
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>

    <div class="up-container">

        <!-- Header -->
        <div class="up-header">
            <h1>Update <span>Profile</span></h1>
            <p>Keep your information accurate and up to date</p>
        </div>

        <!-- Toast -->
        <div id="ajaxToast" class="up-toast hidden">
            <svg class="toast-icon-success" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
            </svg>
            <svg class="toast-icon-error" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/>
            </svg>
            <span id="ajaxToastMsg"></span>
        </div>

        <!-- Card -->
        <div class="up-card">

            <!-- Avatar -->
            <div class="up-avatar-section">
                <label for="profile_photo_input" class="up-avatar-ring">
                    <img id="avatarPreview"
                         src="<?php echo e($courier->profile_photo ? asset('storage/' . $courier->profile_photo) : asset('assetsofdash/images/profile_av.svg')); ?>"
                         alt="Profile Photo">
                    <div class="up-avatar-overlay">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>
                            <circle cx="12" cy="13" r="4"/>
                        </svg>
                    </div>
                </label>
                <p class="up-avatar-label">Click to change · <span>Upload photo</span></p>
                <input type="file" id="profile_photo_input" name="profile_photo" accept="image/*" style="display:none;">
            </div>

            <!-- Form -->
            <form id="profileForm" class="up-form-body" novalidate>
                <?php echo csrf_field(); ?>

                <!-- Personal Info -->
                <div class="up-section-label">
                    <div class="sl-dot"></div>
                    Personal Info
                </div>
                <div class="up-grid">

                    <div class="up-group">
                        <label for="name">Full Name</label>
                        <div class="up-input-wrap">
                            <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                            </svg>
                            <input type="text" id="name" name="name" value="<?php echo e(old('name', $courier->name)); ?>" class="up-input" placeholder="John Doe">
                        </div>
                        <span class="up-error" id="err-name"></span>
                    </div>

                    <div class="up-group">
                        <label for="email">Email Address</label>
                        <div class="up-input-wrap">
                            <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>
                            </svg>
                            <input type="email" id="email" name="email" value="<?php echo e(old('email', $courier->email)); ?>" class="up-input" placeholder="you@email.com">
                        </div>
                        <span class="up-error" id="err-email"></span>
                    </div>

                    <div class="up-group" style="grid-column: span 2;">
                        <label for="mobile">Mobile Number</label>
                        <div class="up-input-wrap">
                            <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/>
                            </svg>
                            <input type="text" id="mobile" name="mobile" value="<?php echo e(old('mobile', $courier->mobile)); ?>" class="up-input" placeholder="+91 XXXXXXXXXX">
                        </div>
                        <span class="up-error" id="err-mobile"></span>
                    </div>

                </div>

                <!-- Bank Details -->
                

                  

                <!-- Submit -->
                <div class="up-submit-wrap">
                    <button type="submit" id="submitBtn" class="up-btn">
                        <span class="btn-inner">
                            <div class="btn-spinner" id="btnSpinner"></div>
                            <svg id="btnIcon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
                            </svg>
                            <span class="btn-text" id="btnText">Save Changes</span>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    
<!-- ─── AJAX ─── -->

<script>

(function () {
    const form       = document.getElementById('profileForm');
    const submitBtn  = document.getElementById('submitBtn');
    const spinner    = document.getElementById('btnSpinner');
    const btnIcon    = document.getElementById('btnIcon');
    const btnText    = document.getElementById('btnText');
    const photoInput = document.getElementById('profile_photo_input');
    const avatar     = document.getElementById('avatarPreview');
    const fields     = ['name','email','mobile','account_holder_name','bank_account','ifsc_code'];

    /* ── original values store karo page load pe ── */
    const originalValues = {};
    fields.forEach(function (id) {
        const el = document.getElementById(id);
        if (el) originalValues[id] = el.value.trim();
    });
    let photoChanged = false;  // photo change hua hai ya nahi

    /* ── button disable styling ── */
    function setButtonDisabled(disabled) {
        submitBtn.disabled = disabled;
        if (disabled) {
            submitBtn.style.opacity   = '0.45';
            submitBtn.style.cursor    = 'not-allowed';
            submitBtn.style.boxShadow = 'none';
            btnText.textContent       = 'No Changes';
        } else {
            submitBtn.style.opacity   = '1';
            submitBtn.style.cursor    = 'pointer';
            submitBtn.style.boxShadow = '0 4px 18px rgba(240,120,0,0.35)';
            btnText.textContent       = 'Save Changes';
        }
    }

    /* ── check karo kuch change hua hai ya nahi ── */
    function checkChanges() {
        // agar photo change hua hai toh already changed
        if (photoChanged) {
            setButtonDisabled(false);
            return;
        }

        // har field compare karo original se
        for (let i = 0; i < fields.length; i++) {
            const el = document.getElementById(fields[i]);
            if (el && el.value.trim() !== originalValues[fields[i]]) {
                setButtonDisabled(false);   // kuch change hua — enable karo
                return;
            }
        }

        // kuch nahi change hua — disable karo
        setButtonDisabled(true);
    }

    /* ── page load pe button disable ── */
    setButtonDisabled(true);

    /* ── har input pe change check karo ── */
    fields.forEach(function (id) {
        const el = document.getElementById(id);
        if (el) {
            el.addEventListener('input', function () {
                clearError(id);
                checkChanges();   // har keystroke pe check
            });
        }
    });

    /* ── avatar preview + photo change detect ── */
    photoInput.addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;

        photoChanged = true;
        checkChanges();   // photo change hua — button enable

        const r = new FileReader();
        r.onload = function (ev) { avatar.src = ev.target.result; };
        r.readAsDataURL(file);
    });

    /* ── field errors ── */
    function showError(field, msg) {
        const input = document.getElementById(field);
        const err   = document.getElementById('err-' + field);
        if (input) input.classList.add('is-error');
        if (err)   { err.textContent = msg; err.classList.add('visible'); }
    }
    function clearError(field) {
        const input = document.getElementById(field);
        const err   = document.getElementById('err-' + field);
        if (input) input.classList.remove('is-error');
        if (err)   { err.textContent = ''; err.classList.remove('visible'); }
    }
    function clearAllErrors() { fields.forEach(clearError); }

    /* ── button loading state (submit time pe) ── */
    function setLoading(on) {
        submitBtn.disabled    = on;
        spinner.classList.toggle('visible', on);
        btnIcon.style.display = on ? 'none' : 'block';
        btnText.classList.toggle('hidden', on);
        submitBtn.style.opacity = on ? '0.6' : '1';
        submitBtn.style.cursor  = on ? 'not-allowed' : 'pointer';
        if (!on) btnText.textContent = 'Save Changes';
    }

    /* ── submit ── */
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        clearAllErrors();

        const data = new FormData(form);
        const meta = document.querySelector('meta[name="csrf-token"]');
        if (meta) data.set('_token', meta.getAttribute('content'));
        if (photoInput.files[0]) data.set('profile_photo', photoInput.files[0]);

        setLoading(true);

        fetch("<?php echo e(route('courier.profile.update')); ?>", {
            method:  'POST',
            headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' },
            body:    data
        })
        .then(function (res) {
            return res.json().then(function (body) { return { ok: res.ok, status: res.status, body: body }; });
        })
        .then(function (res) {
            setLoading(false);

            if (res.ok) {
                // ── Success ──
                Swal.fire({
                    icon:              'success',
                    title:             'Updated!',
                    text:              res.body.message || 'Profile updated successfully!',
                    timer:             2500,
                    timerProgressBar:  true,
                    showConfirmButton: false,
                    position:          'top-end',
                    toast:             true,
                    showClass:         { popup: 'swal2-show' },
                    hideClass:         { popup: 'swal2-hide' }
                });

                // ── success ke baad original values update karo ── 
                fields.forEach(function (id) {
                    const el = document.getElementById(id);
                    if (el) originalValues[id] = el.value.trim();
                });
                photoChanged = false;
                photoInput.value = '';

                // ── button dobara disable karo ──
                setButtonDisabled(true);

            } else if (res.status === 422) {
                // ── Validation errors ──
                const errors = res.body.errors || {};
                Object.keys(errors).forEach(function (f) { showError(f, errors[f][0]); });

                const firstField = Object.keys(errors)[0];
                Swal.fire({
                    icon:              'warning',
                    title:             'Validation Error',
                    text:              errors[firstField][0],
                    confirmButtonText: 'Got it',
                    position:          'top-end',
                    toast:             true,
                    showClass:         { popup: 'swal2-show' },
                    hideClass:         { popup: 'swal2-hide' }
                });

            } else {
                // ── Server error ──
                Swal.fire({
                    icon:   'error',
                    title:  'Oops!',
                    text:   res.body.message || 'Something went wrong.',
                    confirmButtonText: 'OK'
                });
            }
        })
        .catch(function () {
            setLoading(false);
            // ── Network error + Retry ──
            Swal.fire({
                icon:              'error',
                title:             'Network Error',
                text:              'Connection failed. Please try again.',
                confirmButtonText: 'Retry',
                showCancelButton:  true,
                cancelButtonText:  'Cancel'
            }).then(function (result) {
                if (result.isConfirmed) {
                    form.dispatchEvent(new Event('submit'));
                }
            });
        });
    });
})();
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.courier-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel_git\ecommerce-web\resources\views/courier/update-profile.blade.php ENDPATH**/ ?>