@extends('layouts.courier-layout')

@section('title', 'Courier Profile')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:wght@300;400;500&display=swap');

    :root {
        --orange-deep:    #d95f00;
        --orange-primary: #f07800;
        --orange-mid:     #f59e3e;
        --orange-light:   #fcd5a6;
        --orange-pale:    #fff3e0;
        --text-dark:      #1a1a1a;
        --text-mid:       #5a5a5a;
        --text-light:     #999999;
        --white:          #ffffff;
        --shadow:         0 8px 30px rgba(240,120,0,0.15);
        --shadow-hover:   0 14px 40px rgba(240,120,0,0.25);
    }

    .profile-page-wrap {
        font-family: 'DM Sans', sans-serif;
        min-height: 100vh;
        padding: 40px 20px 60px;
        position: relative;
        overflow: hidden;
    }

    /* Decorative blobs */
    .profile-page-wrap::before,
    .profile-page-wrap::after {
        content: '';
        position: absolute;
        border-radius: 50%;
        filter: blur(90px);
        opacity: 0.25;
        pointer-events: none;
        z-index: 0;
    }
    .profile-page-wrap::before {
        width: 380px; height: 380px;
        background: var(--orange-primary);
        top: -100px; left: -120px;
    }
    .profile-page-wrap::after {
        width: 280px; height: 280px;
        background: var(--orange-mid);
        bottom: -60px; right: -80px;
    }

    .profile-container {
        position: relative;
        z-index: 1;
        max-width: 780px;
        margin: 0 auto;
    }

    /* ─── Header Banner ─── */
    .profile-banner {
        background: linear-gradient(135deg, var(--orange-deep) 0%, var(--orange-primary) 60%, var(--orange-mid) 100%);
        border-radius: 24px 24px 0 0;
        height: 180px;
        position: relative;
        overflow: hidden;
    }
    .profile-banner::after {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at 80% 50%, rgba(255,255,255,0.12) 0%, transparent 55%),
            radial-gradient(circle at 20% 80%, rgba(255,255,255,0.07) 0%, transparent 50%);
    }
    /* subtle pattern dots */
    .profile-banner::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(255,255,255,0.15) 1.5px, transparent 1.5px);
        background-size: 28px 28px;
        background-position: 12px 12px;
    }

    /* ─── Avatar ─── */
    .avatar-wrap {
        position: relative;
        width: 140px; height: 140px;
        margin: -70px auto 0;
        z-index: 2;
    }
    .avatar-wrap img {
        width: 140px; height: 140px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid var(--white);
        box-shadow: var(--shadow);
    }
    .avatar-badge {
        position: absolute;
        bottom: 6px; right: 6px;
        width: 36px; height: 36px;
        background: linear-gradient(135deg, var(--orange-primary), var(--orange-deep));
        border: 3px solid var(--white);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        box-shadow: 0 3px 10px rgba(217,95,0,0.35);
    }
    .avatar-badge svg { width: 17px; height: 17px; }

    /* ─── Card Body ─── */
    .profile-card {
        background: var(--white);
        border-radius: 0 0 24px 24px;
        box-shadow: var(--shadow);
        padding: 10px 40px 40px;
        text-align: center;
        transition: box-shadow 0.3s;
    }
    .profile-card:hover { box-shadow: var(--shadow-hover); }

    .profile-name {
        font-family: 'Syne', sans-serif;
        font-size: 1.7rem;
        font-weight: 700;
        color: var(--text-dark);
        margin: 18px 0 2px;
        letter-spacing: -0.5px;
    }
    .profile-role {
        display: inline-block;
        background: linear-gradient(135deg, var(--orange-primary), var(--orange-mid));
        color: var(--white);
        font-size: 0.78rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1.4px;
        padding: 5px 18px;
        border-radius: 30px;
        margin-bottom: 6px;
    }
    .profile-email-text {
        color: var(--text-light);
        font-size: 0.88rem;
        margin-bottom: 22px;
    }

    /* ─── Stats Row ─── */
    .stats-row {
        display: flex;
        justify-content: center;
        gap: 12px;
        margin-bottom: 30px;
        flex-wrap: wrap;
    }
    .stat-box {
        background: var(--orange-pale);
        border-radius: 16px;
        padding: 16px 24px;
        min-width: 130px;
        flex: 1 1 120px;
        max-width: 180px;
        transition: transform 0.25s, box-shadow 0.25s;
    }
    .stat-box:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 18px rgba(240,120,0,0.18);
    }
    .stat-number {
       font-weight: bold;
       font-size: 16px;
        color: var(--orange-deep);
    }
    .stat-label {
        font-size: 0.78rem;
        color: var(--text-mid);
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin-top: 2px;
    }

    /* ─── Divider ─── */
    .profile-divider {
        border: none;
        border-top: 2px dashed var(--orange-light);
        margin: 8px 0 28px;
    }

    /* ─── Details Grid ─── */
    .details-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
        text-align: left;
    }
    @media (max-width: 540px) {
        .details-grid { grid-template-columns: 1fr; }
        .profile-card { padding: 10px 22px 32px; }
    }

    .detail-item {
        background: #fafafa;
        border: 1px solid #f0f0f0;
        border-radius: 14px;
        padding: 16px 18px;
        display: flex;
        align-items: flex-start;
        gap: 14px;
        transition: border-color 0.25s, box-shadow 0.25s;
    }
    .detail-item:hover {
        border-color: var(--orange-light);
        box-shadow: 0 4px 14px rgba(240,120,0,0.1);
    }

    .detail-icon-wrap {
        width: 42px; height: 42px;
        min-width: 42px;
        background: linear-gradient(135deg, var(--orange-pale), var(--orange-light));
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
    }
    .detail-icon-wrap svg { width: 20px; height: 20px; color: var(--orange-deep); }

    .detail-label {
        font-size: 0.73rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--text-light);
        margin-bottom: 3px;
    }
    .detail-value {
        font-size: 0.92rem;
        font-weight: 500;
        color: var(--text-dark);
        word-break: break-all;
    }

    /* ─── Section Title ─── */
    .section-title {
        font-family: 'Syne', sans-serif;
        font-size: 1rem;
        font-weight: 700;
        color: var(--orange-deep);
        text-align: left;
        margin-bottom: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .section-title::after {
        content: '';
        flex: 1;
        height: 2px;
        background: linear-gradient(90deg, var(--orange-light), transparent);
        border-radius: 2px;
    }

    /* ─── Edit Button ─── */
    .edit-btn-wrap {
        margin-top: 32px;
        text-align: center;
    }
    .edit-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, var(--orange-primary), var(--orange-deep));
        color: var(--white);
        text-decoration: none;
        font-family: 'DM Sans', sans-serif;
        font-weight: 600;
        font-size: 0.92rem;
        padding: 13px 34px;
        border-radius: 50px;
        border: none;
        cursor: pointer;
        letter-spacing: 0.4px;
        box-shadow: 0 5px 18px rgba(217,95,0,0.35);
        transition: transform 0.22s, box-shadow 0.22s;
    }
    .edit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(217,95,0,0.45);
        color: var(--white);
        text-decoration: none;
    }
    .edit-btn svg { width: 17px; height: 17px; }

    /* ─── Animations ─── */
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(22px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .profile-container { animation: fadeUp 0.5s ease both; }
    .stat-box          { animation: fadeUp 0.5s ease both; }
    .stat-box:nth-child(1) { animation-delay: 0.08s; }
    .stat-box:nth-child(2) { animation-delay: 0.16s; }
    .stat-box:nth-child(3) { animation-delay: 0.24s; }
    .detail-item       { animation: fadeUp 0.45s ease both; }
    .detail-item:nth-child(1) { animation-delay: 0.1s; }
    .detail-item:nth-child(2) { animation-delay: 0.17s; }
    .detail-item:nth-child(3) { animation-delay: 0.24s; }
    .detail-item:nth-child(4) { animation-delay: 0.31s; }
    .detail-item:nth-child(5) { animation-delay: 0.38s; }
    .detail-item:nth-child(6) { animation-delay: 0.45s; }
</style>

<div class="profile-page-wrap">
    <div class="profile-container">

        <!-- Banner -->
        <div class="profile-banner"></div>

        <!-- Avatar -->
        <div class="avatar-wrap">
            <img src="{{ $courier->profile_photo
                ? asset('storage/' . $courier->profile_photo)
                : asset('assetsofdash/images/profile_av.svg') }}"
                 alt="Profile Photo">
            <div class="avatar-badge">
                <!-- checkmark icon -->
                <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
            </div>
        </div>

        <!-- Card Body -->
        <div class="profile-card">

            <span class="profile-role">Courier boy</span>
            <h2 class="profile-name">{{ $courier->name }}</h2>
            <p class="profile-email-text">{{ $courier->email }}</p>

            <!-- Stats -->
            <div class="stats-row">
                <div class="stat-box">
                    <div class="stat-number">{{ $courier->total_deliveries ?? '0' }}</div>
                    <div class="stat-label">Deliveries</div>
                </div>
                <div class="stat-box">
                    <div class="stat-number">{{ $courier->rating ?? '—' }}</div>
                    <div class="stat-label">Rating</div>
                </div>
                <div class="stat-box">
                    <div class="stat-number">{{ $courier->total_earnings ?? '₹0' }}</div>
                    <div class="stat-label">Earnings</div>
                </div>
            </div>

            <hr class="profile-divider">

            <!-- Contact Info -->
            <div class="section-title">Contact Details</div>
            <div class="details-grid">

                <div class="detail-item">
                    <div class="detail-icon-wrap">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.79 19.79 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="detail-label">Mobile</div>
                        <div class="detail-value">{{ $courier->mobile }}</div>
                    </div>
                </div>

                <div class="detail-item">
                    <div class="detail-icon-wrap">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                    </div>
                    <div>
                        <div class="detail-label">Email</div>
                        <div class="detail-value">{{ $courier->email }}</div>
                    </div>
                </div>

            </div>

            <hr class="profile-divider" style="margin-top:24px;">

            <!-- Bank Info -->
            <div class="section-title">Bank Details</div>
            <div class="details-grid">

                <div class="detail-item">
                    <div class="detail-icon-wrap">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                    </div>
                    <div>
                        <div class="detail-label">Account Holder</div>
                        <div class="detail-value">{{ $courier->account_holder_name }}</div>
                    </div>
                </div>

                <div class="detail-item">
                    <div class="detail-icon-wrap">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"/>
                            <line x1="1" y1="10" x2="23" y2="10"/>
                        </svg>
                    </div>
                    <div>
                        <div class="detail-label">Bank Account</div>
                        <div class="detail-value">
                            @if($courier->bank_account)
                                 •••• •••• {{ substr($courier->bank_account, -4) }}
                            @else
                                Not provided
                            @endif
                        </div>
                    </div>
                </div>

                <div class="detail-item" style="grid-column: span 2;">
                    <div class="detail-icon-wrap">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="12" y1="8" x2="12" y2="12"/>
                            <line x1="12" y1="16" x2="12.01" y2="16"/>
                        </svg>
                    </div>
                    <div>
                        <div class="detail-label">IFSC Code</div>
                        <div class="detail-value">{{ $courier->ifsc_code }}</div>
                    </div>
                </div>

            </div>

            <!-- Edit Button -->
            <div class="edit-btn-wrap">
                <a href="{{ route('courier.profile.update') }}" class="edit-btn">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                    </svg>
                    Edit Profile
                </a>
            </div>

        </div>
    </div>
</div>

@endsection