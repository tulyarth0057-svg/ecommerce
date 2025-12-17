<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>@yield('title', 'My Laravel App')</title>
   {{-- favicon icon link --}}
    <link rel="icon" href="favicon.ico" type="image/x-icon">

       {{-- links of other cdn --}}
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- plugin css file  -->
    <link rel="stylesheet" href="{{ asset('assetsofdash/plugin/datatables/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsofdash/plugin/datatables/dataTables.bootstrap5.min.css') }}">

    <!-- project css file  -->
    <link rel="stylesheet" href="{{ asset('assetsofdash/css/ebazar.style.min.css') }}">
    @stack('styles')
</head>
<body>
    <div id="ebazar-layout" class="theme-blue">

        <!-- sidebar -->
        @include('partials.sidebar')
        <!-- sidebar -->


        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">

            <!-- Body: Header -->
            @include('partials.header')
            <!-- Body: Header -->


            <!-- Body: Body -->
            <div class="body d-flex py-3">
                @yield('content')

                @include('partials.extra')
            </div>



        </div>

    </div>

    <!-- Jquery Core Js -->
    <script src="{{ asset('assetsofdash/bundles/libscripts.bundle.js') }}"></script>

    <!-- Plugin Js -->
    <script src="{{ asset('assetsofdash/bundles/apexcharts.bundle.js') }}"></script>
    <script src="{{ asset('assetsofdash/bundles/dataTables.bundle.js') }}"></script>

    <!-- Jquery Page Js -->
    <script src="{{ asset('../js/template.js') }}"></script>
    <script src="{{ asset('../js/page/index.js') }}"></script>
    <script src="{{ asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyB1Jr7axGGkwvHRnNfoOzoVRFV3yOPHJEU&amp;callback=myMap') }}"></script>
    <script>
        $('#myDataTable')
        .addClass( 'nowrap')
        .dataTable( {
            responsive: true,
            columnDefs: [
                { targets: [-1, -3], className: 'dt-body-right' }
            ]
        });
    </script>
    @stack('scripts')


</body>
</html>

