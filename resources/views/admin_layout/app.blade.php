<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dinas Tata Ruang Kab. Karawang | {{ $title }} </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/focus/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('/focus/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/focus/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('/focus/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/focus/css/style.css') }}" rel="stylesheet">

    @stack('top_css')

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('/focus/images/logo.png') }}" alt="">
                <img class="logo-compact" src="{{ asset('/focus/images/logo-text.png') }}" alt="">
                <img class="brand-title" src="{{ asset('/focus/images/logo-text.png') }}" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        @include('admin_layout.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('admin_layout.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        @include('admin_layout.footer')
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('/focus/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('/focus/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('/focus/js/custom.min.js') }}"></script>


    <!-- Vectormap -->
    <script src="{{ asset('/focus/vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('/focus/vendor/morris/morris.min.js') }}"></script>


    <script src="{{ asset('/focus/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('/focus/vendor/chart.js/Chart.bundle.min.js') }}"></script>

    <script src="{{ asset('/focus/vendor/gaugeJS/dist/gauge.min.js') }}"></script>

    <!--  flot-chart js -->
    <script src="{{ asset('/focus/vendor/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('/focus/vendor/flot/jquery.flot.resize.js') }}"></script>

    <!-- Owl Carousel -->
    <script src="{{ asset('/focus/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

    <!-- Counter Up -->
    <script src="{{ asset('/focus/vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('/focus/vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('/focus/vendor/jquery.counterup/jquery.counterup.min.js') }}"></script>


    <script src="{{ asset('/focus/js/dashboard/dashboard-1.js') }}"></script>

    {{-- sweet alert 2 --}}
    <script src="{{ asset('/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

    @stack('bottom_scripts')

    @session('success')
		<script>
			Swal.fire({
				title: "Sukses",
				text: "{{ session('success') }}",
				icon: "success",
			});
		</script>
	@endsession

	@session('error')
		<script>
			Swal.fire({
				title: "Error",
				text: "{{ session('error') }}",
				icon: "error",
			});
		</script>
	@endsession

</body>

</html>