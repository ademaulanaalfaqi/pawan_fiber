<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $title }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link rel="icon" type="image/png" href="{{ url('public/assets') }}/loginassets/images/icons/company.png" />

    <!-- Favicons -->
    <link href="{{ url('public') }}/" rel="icon">
    <link href="{{ url('public') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('public') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('public') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ url('public') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ url('public') }}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="{{ url('public') }}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="{{ url('public') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ url('public') }}/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ url('public') }}/assets/css/style.css" rel="stylesheet">

    {{-- leaflet --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-draw/dist/leaflet.draw.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    {{-- <link rel="stylesheet" href="{{url('public')}}/assets/leaflet/leaflet.css"> --}}


    @stack('style')

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body onload="getLocation()">>

    <!-- ======= Header ======= -->
    <x-layout.header />
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <x-layout.sidebar :menu="$menu" />
    <!-- End Sidebar-->

    <main id="main" class="main">
        <section class="section dashboard">
            <x-template.alert />
            {{$slot}}
            <br><br><br>
        </section>
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <x-layout.footer />
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ url('public') }}/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="{{ url('public') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('public') }}/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="{{ url('public') }}/assets/vendor/echarts/echarts.min.js"></script>
    <script src="{{ url('public') }}/assets/vendor/quill/quill.min.js"></script>
    <script src="{{ url('public') }}/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="{{ url('public') }}/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="{{ url('public') }}/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ url('public') }}/assets/js/main.js"></script>

    {{-- leaflet --}}
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-draw/dist/leaflet.draw.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    {{-- <script src="{{url('public')}}/assets/leaflet/leaflet.js"></script> --}}

    {{-- modal image --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('script')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                "order": [[0, "desc"]]
            });
        });
    </script>


</body>

</html>
