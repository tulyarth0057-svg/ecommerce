@extends('layouts.frontend-layout')

@section('title', 'Courier Boy Login')

@push('styles')
<style>
    .login-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .login-card {
        width: 100%;
        max-width: 420px;
        background: #fff;
        padding: 35px;
        border-radius: 20px;
        box-shadow: 0 20px 50px rgba(0,0,0,.25);
    }

    .login-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .login-header h2 {
        font-size: 28px;
        font-weight: 700;
        color: #333;
    }

    .login-header p {
        font-size: 15px;
        color: #777;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        font-weight: 500;
        margin-bottom: 6px;
        display: block;
        color: #333;
    }

    .form-control {
        width: 100%;
        padding: 14px;
        border-radius: 10px;
        border: 2px solid #e0e0e0;
        font-size: 15px;
        transition: .3s;
    }

    .form-control:focus {
        border-color: #db3700;
        outline: none;
        box-shadow: 0 0 0 4px rgba(219,55,0,.1);
    }

    .login-btn {
        width: 100%;
        padding: 15px;
        background: #db3700;
        color: #fff;
        border: none;
        border-radius: 10px;
        font-size: 17px;
        font-weight: 600;
        cursor: pointer;
        transition: .3s;
    }

    .login-btn:hover {
        background: #c23000;
        transform: translateY(-2px);
    }

    .login-btn:disabled {
        background: #ccc;
        cursor: not-allowed;
        transform: none;
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

<div class="login-container">
    <div class="login-card">
        <div class="login-header">
            <h2>🚴 Courier Login</h2>
            <p>Login to access your dashboard</p>
        </div>

        <form id="courierLoginForm">
            @csrf

            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
            </div>

            <button type="submit" class="login-btn" id="loginBtn">
                Login 🔐
            </button>
        </form>

        <div class="extra-links">
            <p>New courierboy? <a href="{{ route('courierboy.signup') }}">Create account</a></p>
        </div>
    </div>
</div>

@endsection

@push('scripts')


<script>
document.getElementById('courierLoginForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const btn = document.getElementById('loginBtn');
    btn.disabled = true;
    btn.innerText = 'Logging in...';

    fetch("{{ route('courier.login.submit') }}", {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            'Accept': 'application/json'
        },
        body: new FormData(this)
    })
    .then(res => res.json())
    .then(data => {
        if (data.status) {
            Swal.fire({
                icon: 'success',
                title: 'Login Successful 🎉',
                text: 'Redirecting to dashboard...',
                timer: 1500,
                showConfirmButton: false
            }).then(() => {
                window.location.href = data.redirect;
            });
        } else {
            Swal.fire('Login Failed', data.message, 'error');
        }
    })
    .catch(() => {
        Swal.fire('Error', 'Something went wrong!', 'error');
    })
    .finally(() => {
        btn.disabled = false;
        btn.innerText = 'Login 🔐';
    });
});
</script>
@endpush
