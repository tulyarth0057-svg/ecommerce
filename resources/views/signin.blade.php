{{-- @extends('layouts.frontend-layout')

@section('title', 'login ')

@section('content')


        <!-- breadcrumb-area start -->
        <div class="breadcrumb-area ptb-30 bg-img text-center" data-bgimg="assets/image/other/breadcrumb-bgimg.jpg">
            <div class="container">
                <span class="d-block extra-color"><a href="index.html" class="extra-color">Home</a> / Login</span>
                <h2 class="extra-color font-24 font-xl-32 mst-5 mst-xl-9">Login</h2>
            </div>
        </div>
        <!-- breadcrumb-area end -->
        <!-- main start -->
        <main id="main">
            <!-- login start -->
            <section class="customer-account section-ptb">
                <div class="container">
                    <div class="section-capture text-center">
                        <div class="section-title" data-animate="animate__fadeIn">
                            <h2 class="section-heading">Signin account</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-10 col-lg-7 col-xl-6 col-xxl-5 mx-md-auto">
                            <form method="POST" action="{{ url('signin') }}">
                                @csrf
                                <div class="row field-row">
                                    <div class="col-12 field-col" data-animate="animate__fadeIn">
                                        <label for="email" class="field-label">Email</label>
                                        <div class="field-pwd d-flex">
                                            <input type="email" id="email" name="email" class="w-100 h-auto p-0 bg-transparent border-0" placeholder="Email" autocomplete="email">
                                            <button type="button" class="body-color icon-16" aria-label="User email"><i class="ri-mail-line d-block lh-1"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-12 field-col" data-animate="animate__fadeIn">
                                        <label for="password" class="field-label">Password</label>
                                        <div class="field-pwd d-flex">
                                            <input type="password" id="password" name="password" class="w-100 h-auto p-0 bg-transparent border-0" placeholder="Password" autocomplete="current-password">
                                            <button type="button" class="field-pwd-btn body-color icon-16" aria-label="User password hidden"><i class="ri-eye-line d-block lh-1"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="customer-account-btn mst-20 mst-md-30">
                                    <div class="row align-items-md-center">
                                        <div class="col-12 col-md-6" data-animate="animate__fadeIn">
                                            <button type="submit" class="width-100 width-md-auto btn-style quaternary-btn">Sign in</button>
                                        </div>
                                        <div class="col-12 col-md-6 mst-11 mst-md-0 text-center text-md-end" data-animate="animate__fadeIn">
                                            <a href="forgot-password.html" class="d-inline-block body-secondary-color text-decoration-underline">Forgot your password?</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="mst-30 text-center">
                                <h6 class="font-18" data-animate="animate__fadeIn">Don't have an account?</h6>
                                <a href="{{route('signup')}}" class="w-100 btn-style secondary-btn mst-25" data-animate="animate__fadeIn">Create an account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- login end -->
        </main>


        <!-- bg-screen start -->
        <div class="bg-screen">
            <div class="bg-back position-fixed top-0 end-0 bottom-0 start-0 bg-black z-index-4 opacity-0 invisible"></div>
            <div class="bg-shop position-fixed top-0 end-0 bottom-0 start-0 bg-black z-index-4 opacity-0 invisible"></div>
        </div>


        @push('scripts')




@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
        timer: 2000,
        showConfirmButton: false
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "{{ session('error') }}",
        timer: 2000,
        showConfirmButton: false
    });
</script>

@endif

 @endpush

 @endsection --}}
