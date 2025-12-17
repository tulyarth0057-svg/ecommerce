{{--
@extends('layouts.frontend-layout')

@section('title', 'Sign-up')

@section('content')

        <!-- breadcrumb-area start -->
        <div class="breadcrumb-area ptb-30 bg-img text-center" data-bgimg="assets/image/other/breadcrumb-bgimg.jpg">
            <div class="container">
                <span class="d-block extra-color"><a href="index.html" class="extra-color">Home</a> / signup</span>
                <h2 class="extra-color font-24 font-xl-32 mst-5 mst-xl-9">sign up</h2>
            </div>
        </div>


        <main id="main">
            <!-- register start -->
            <section class="customer-account section-ptb">
                <div class="container">
                    <div class="section-capture text-center">
                        <div class="section-title" data-animate="animate__fadeIn">
                            <h2 class="section-heading">Create an account</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-10 col-lg-7 col-xl-6 col-xxl-5 mx-md-auto">
                            <form action="/sign-up" method="POST">
                                @csrf
                                <div class="row field-row">
                                    <div class="col-12  field-col" data-animate="animate__fadeIn">
                                        <label for="fname" class="field-label"> Name</label>
                                        <div class="field-pwd w-100 d-flex">
                                            <input type="text" id="name" name="name" class=" w-100 h-auto p-0 bg-transparent border-0" placeholder="name" autocomplete="given-name">
                                            <button type="button" class="body-color icon-16" aria-label="User name"><i class="ri-user-line d-block lh-1"></i></button>
                                        </div>
                                    </div>



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
                                            <input type="password" id="password" name="password" class="w-100 h-auto p-0 bg-transparent border-0" placeholder="Password" autocomplete="new-password">
                                            <button type="button" class="field-pwd-btn body-color icon-16" aria-label="User password hidden"><i class="ri-eye-line d-block lh-1"></i></button>
                                        </div>
                                    </div>

                                </div>
                                <div class="customer-account-btn mst-20 mst-md-30">
                                    <div class="row">
                                        <div class="col-12 meb-11" data-animate="animate__fadeIn">
                                            <label class="cust-checkbox-label checkbox-agree">
                                                <input type="checkbox" class="cust-checkbox checkboxbtn">
                                                <span class="d-block cust-check"></span>
                                                <span class="login-read">By proceeding, I acknowledge and consent to the stated <a href="terms-condition.html" class="body-secondary-color text-decoration-underline">terms & guidelines</a>.</span>
                                            </label>
                                        </div>
                                        <div class="col-12" data-animate="animate__fadeIn">
                                            <button type="submit" class="w-100 btn-style quaternary-btn">Signup</button>
                                        </div>
                                    </div>

                                    <hr>

                                </div>
                            </form>
                            <div class="mst-30 text-center">
                                <h6 class="font-18" data-animate="animate__fadeIn">Already have an account?</h6>
                                <a href="{{ route('signin') }}" class="w-100 btn-style secondary-btn mst-25" data-animate="animate__fadeIn">Sign in</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- register end -->
        </main>
        <!-- main end -->

        <!-- bg-screen start -->
        <div class="bg-screen">
            <div class="bg-back position-fixed top-0 end-0 bottom-0 start-0 bg-black z-index-4 opacity-0 invisible"></div>
            <div class="bg-shop position-fixed top-0 end-0 bottom-0 start-0 bg-black z-index-4 opacity-0 invisible"></div>
        </div>


        @push('scripts')
        @if(session('success'))
<script>
    Swal.fire({
        title: 'Success!',
        text: "{{ session('success') }}",
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>


@endif
  @endpush

   @endsection --}}
