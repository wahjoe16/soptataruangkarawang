<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dinas Tata Ruang Kab. Karawang | {{ $title }} </title>
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('/favicon.ico') }}" type="image/png" sizes="16x16">
    <link href="{{ asset('/focus/css/style.css') }}" rel="stylesheet">

    {{-- MDI icons --}}
    <link rel="stylesheet" href="{{ asset('/public/focus/vendor/mdi/css/materialdesignicons.min.css') }}">

    <style>
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #fff;
            z-index: 9999;
        }

        .loader {
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            position: absolute;
        }
    </style>

    @stack('top_css')

</head>

<body>

    <div class="preloader">
        <div class="loader">
            <img src="{{ asset('/login_page/images/loading.gif') }}" alt="" width="200px">
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
                <img class="brand-title" src="{{ asset('/focus/images/logo_pupr.jpg') }}" alt="">
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

    {{-- Jquery --}}
    <script src="{{ asset('/focus/js/jquery-3.7.1.min.js') }}"></script>    

    <!-- Required vendors -->
    <script src="{{ asset('/focus/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('/focus/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('/focus/js/custom.min.js') }}"></script>

    <script>
        // Wait for the entire page to load
        $(document).ready(function() {
            $('.preloader').delay('200').fadeOut();
        });
    </script>

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