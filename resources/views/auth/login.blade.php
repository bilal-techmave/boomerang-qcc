<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <title>QCC | Quality Commercial Cleaning</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('images/new-images/favicon-new.png')}}">

		<!-- App css -->
		<link href="{{asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="{{asset('css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

		<link href="{{asset('css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
		<link href="{{asset('css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

		<!-- icons -->
		<link href="{{asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">

        <div class="account-pages my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <div class="col-lg-6 p-4">
                                        <div class="mx-auto">
                                            <a href="#">
                                                <img src="{{asset('images/new-images/boomerang-logo.png') }}" alt="" height="50" />
                                            </a>
                                        </div>

                                        <h6 class="h5 mb-0 mt-2">Welcome back!</h6>
                                        <p class="text-muted mt-1 mb-4">
                                            Enter your email address and password to access admin panel.
                                        </p>

                                        <form action="{{ route('login') }}" method="POST" class="authentication-form">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">Email Address</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="mail"></i>
                                                    </span>
                                                    <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}" placeholder="hello@boomerang_qcc.com">

                                                </div>
                                                @error('email')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <a href="{{route('forgotpwd')}}" class="float-end text-muted text-unline-dashed ms-1">Forgot your password?</a>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="lock"></i>
                                                    </span>
                                                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">

                                                </div>
                                                @error('password')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                            </div>

                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input type="checkbox" name="remember_me" class="form-check-input" id="checkbox-signin" checked>
                                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                                </div>
                                            </div>

                                            <div class="mb-3 text-center d-grid">
                                                <button class="btn btn-primary" type="submit">Log In</button>
                                            </div>
                                        </form>


                                    </div>
                                    <div class="col-lg-6 d-none d-md-inline-block">
                                        <div class="auth-page-sidebar">
                                            <div class="overlay"></div>
                                            <div class="auth-user-testimonial">
                                                {{-- <p class="fs-24 fw-bold text-white mb-1">Welcome Back!</p>
                                                <p class="lead">Clock-in/Clock-out: Cleaning staff can log their working hours by clocking in and out through the app</p> --}}
                                                <!-- <p>- Admin User</p> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                {{-- <p class="text-muted">Don't have an account? <a href="{{route('regester')}}" class="text-primary fw-bold ms-1">Sign Up</a></p> --}}
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="{{asset('js/vendor.min.js') }}"></script>

        <!-- App js -->
        <script src="{{asset('js/app.min.js') }}"></script>

    </body>


</html>
