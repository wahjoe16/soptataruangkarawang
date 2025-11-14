<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ ('/login_page/fonts/icomoon/style.css') }}">

        <link rel="stylesheet" href="{{ ('/login_page/css/owl.carousel.min.css') }}">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ ('/login_page/css/bootstrap.min.css') }}">
        
        <!-- Style -->
        <link rel="stylesheet" href="{{ ('/login_page/css/style.css') }}">

        <title>Dinas Tata Ruang Kabupaten Karawang</title>
    </head>
    <body>

        <div class="d-lg-flex half">
            <div class="bg order-1 order-md-2" style="background-image: url('/login_page/images/alun2.png');"></div>
            <div class="contents order-2 order-md-1">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7">
                            <h3>Login <strong>Sistem</strong></h3>
                            <p class="mb-4">Dinas Tata Ruang Kabupaten Karawang</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group first">
                                    <label for="username">Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="your-email@gmail.com" id="username">
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Your Password" id="password">
                                </div>
                            
                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                        <input type="checkbox" name="remember" id="remember_me"/>
                                        <div class="control__indicator"></div>
                                    </label>
                                    {{-- <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>  --}}
                                </div>

                                <button type="submit" value="Log In" class="btn btn-block btn-info">Login</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ ('/login_page/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ ('/login_page/js/popper.min.js') }}"></script>
        <script src="{{ ('/login_page/js/bootstrap.min.js') }}"></script>
        <script src="{{ ('/login_page/js/main.js') }}"></script>
    </body>
</html>
