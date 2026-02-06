@extends('layouts.frontend-layout')

@section('title', 'Courier Boy Login')

@push('styles')

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>

/* ===== Wrapper ===== */
.login-page-wrapper{
    font-family:'Poppins',sans-serif;
    background:linear-gradient(135deg,#f16c3f,#f06f2f);
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:20px;
    overflow:hidden;
}

/* ===== Layout ===== */
.login-content{
    display:flex;
    gap:60px;
    align-items:center;
    width:100%;
    max-width:1200px;
}

/* ===== Courier Animation Section ===== */
.courier-animation{
    flex:1;
    position:relative;
    height:400px;
    overflow:hidden;
}

/* Road */
.road{
    position:absolute;
    bottom:50px;
    width:100%;
    height:6px;
    background:white;
}

/* Courier Boy */
.courier-boy{
    position:absolute;
    bottom:12px;
    width:220px;
    animation:ride 12s linear infinite;
}

@keyframes ride{
    0%{left:-250px;}
    100%{left:100%;}
}

/* Floating Icons */
.floating-icon{
    position:absolute;
    color:rgba(255,255,255,.2);
    animation:floatIcon 4s infinite ease-in-out;
}

.floating-icon:nth-child(1){top:10%; left:20%; font-size:40px;}
.floating-icon:nth-child(2){top:70%; left:10%; font-size:35px;}

@keyframes floatIcon{
    0%,100%{transform:translateY(0)}
    50%{transform:translateY(-25px)}
}

/* ===== Form Section ===== */
.login-container{
    flex:1;
    max-width:450px;
    background:white;
    padding:45px 40px;
    border-radius:20px;
    box-shadow:0 25px 60px rgba(0,0,0,.25);
}

/* ===== Header ===== */
.login-header{text-align:center;margin-bottom:30px;}

.login-icon{
    width:80px;
    height:80px;
    background:linear-gradient(135deg,#ff6633,#ff9966);
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    margin:0 auto 20px;
}

.login-icon i{
    color:white;
    font-size:30px;
}

/* ===== Inputs ===== */
.form-group{margin-bottom:22px;}

.input-wrapper{position:relative;}

.form-control{
    width:100%;
    padding:14px 45px;
    border-radius:10px;
    border:2px solid #eee;
    background:#fafafa;
    transition:.3s;
}

.form-control:focus{
    border-color:#ff6633;
    box-shadow:0 0 0 5px rgba(255,102,51,.2);
    outline:none;
    background:white;
}

/* Icons */
.input-wrapper i:not(.password-toggle){
    position:absolute;
    left:15px;
    top:50%;
    transform:translateY(-50%);
    color:#aaa;
}

.password-toggle{
    position:absolute;
    right:15px;
    top:50%;
    transform:translateY(-50%);
    cursor:pointer;
    color:#aaa;
}

/* ===== Button ===== */
.login-btn{
    width:100%;
    padding:16px;
    border:none;
    border-radius:12px;
    background:#f56c3e;
    color:white;
    font-weight:600;
    font-size:16px;
    cursor:pointer;
    transition:.3s;
}

.login-btn:hover{
    transform:translateY(-2px);
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

/* Responsive */
@media(max-width:992px){
    .login-content{
        flex-direction:column;
    }

    .courier-animation{
        display:none;
    }
}

</style>
@endpush



@section('content')

<div class="login-page-wrapper">

<div class="login-content">

<!-- ===== Courier Animation Side ===== -->
<div class="courier-animation">

    <i class="fas fa-box floating-icon"></i>
    <i class="fas fa-map-marker-alt floating-icon"></i>

    <img src="{{ asset('category_images/c-boy-img.png') }}" class="courier-boy">

    <div class="road"></div>

</div>


<!-- ===== Login Form ===== -->
<div class="login-container">

<div class="login-header">
    <div class="login-icon">
        <i class="fas fa-biking"></i>
    </div>
    <h2>Courier Login</h2>
    <p>Please login to continue</p>
</div>

<form id="courierLoginForm" >
@csrf

<div class="form-group">
<label>Email</label>
<div class="input-wrapper">
<input type="email" name="email" class="form-control" required>
<i class="fas fa-envelope"></i>
</div>
</div>

<div class="form-group">
<label>Password</label>
<div class="input-wrapper">
<input type="password" name="password" id="password" class="form-control" required>
<i class="fas fa-lock"></i>
<i class="fas fa-eye password-toggle" id="togglePassword"></i>
</div>
</div>

<button type="submit" class="login-btn" id="loginBtn">
Login <i class="fas fa-arrow-right"></i>
</button>

<hr>

<div class="extra-links"> <p>New courierboy? <a href="{{ route('courierboy.signup') }}">Create account</a></p> </div>

</form>



</div>
</div>
</div>

@endsection



@push('scripts')



<script>

/* Password Toggle */
document.getElementById('togglePassword').addEventListener('click',function(){

let input=document.getElementById('password');

if(input.type==="password"){
    input.type="text";
    this.classList.replace("fa-eye","fa-eye-slash");
}else{
    input.type="password";
    this.classList.replace("fa-eye-slash","fa-eye");
}

});


/* AJAX Login */
document.getElementById('courierLoginForm').addEventListener('submit',function(e){

e.preventDefault();

let btn=document.getElementById('loginBtn');
btn.disabled=true;
btn.innerHTML='Logging...';

fetch("{{ route('courier.login.submit') }}",{
    method:'POST',
    headers:{
        'X-CSRF-TOKEN':document.querySelector('input[name="_token"]').value,
        'Accept':'application/json'
    },
    body:new FormData(this)
})
.then(res=>res.json())
.then(data=>{

if(data.status){

Swal.fire({
    icon:'success',
    title:'Login Successful',
    timer:1500,
    showConfirmButton:false
}).then(()=>{
    window.location.href=data.redirect;
});

}else{
Swal.fire('Login Failed',data.message,'error');
}

})
.finally(()=>{
btn.disabled=false;
btn.innerHTML='Login <i class="fas fa-arrow-right"></i>';
});

});

</script>

@endpush
