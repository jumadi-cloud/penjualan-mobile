<!DOCTYPE html>
<!-- 
Template Name: Mintos - Responsive Bootstrap 4 Admin Dashboard Template
Author: Hencework
Contact: support@hencework.com

License: You must have a valid license purchased only from templatemonster to legally use the template for your project.
-->
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Register IMA</title>
		<meta name="description" content="IMA CRM" />
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		
		<!-- Toggles CSS -->
		<link href="{{ asset('vendors/jquery-toggles/css/toggles.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('vendors/jquery-toggles/css/themes/toggles-light.css') }}" rel="stylesheet" type="text/css">
		
		<!-- Custom CSS -->
		<link href="{{ asset('dist/css/style.css') }}" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!-- Preloader -->
		<div class="preloader-it">
			<div class="loader-pendulums"></div>
		</div>
		<!-- /Preloader -->
		
		<!-- HK Wrapper -->
		<div class="hk-wrapper">

            <!-- Main Content -->
            <div class="hk-pg-wrapper hk-auth-wrapper">
                {{-- <header class="d-flex justify-content-end align-items-center">
                    <div class="btn-group btn-group-sm">
                        <a href="#" class="btn btn-outline-secondary">Help</a>
                        <a href="#" class="btn btn-outline-secondary">About Us</a>
                    </div>
                </header> --}}
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12 pa-0">
                            <div class="auth-form-wrap pt-xl-0 pt-70">
                                <div class="auth-form w-xl-30 w-lg-55 w-sm-75 w-100">
                                    <a class="auth-brand text-center d-block mb-20" href="#">
                                        {{-- <img class="brand-img" src="dist/img/logo-light.png" alt="brand" /> --}}
                                    </a>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <h1 class="display-4 mb-10 text-center">Sign up for free</h1>
                                        <p class="mb-30 text-center">Create your account and start your free trial today</p>
                                        <div class="form-row">
                                            <div class="col-md-12 form-group">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nama" required autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password" autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password" autocomplete="new-password">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><span class="feather-icon"><i data-feather="eye-off"></i></span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-25">
                                            <input class="custom-control-input" id="same-address" type="checkbox" checked>
                                            <label class="custom-control-label font-14" for="same-address">I have read and agree to the <a href=""><u>term and conditions</u></a></label>
                                        </div>
                                        <button class="btn btn-primary btn-block" type="submit">Register</button>
                                        <p class="text-center">Already have an account? <a href="#">Sign In</a></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Main Content -->
    
        </div>
		<!-- /HK Wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="{{ asset('vendors/popper.js/dist/umd/popper.min.js') }}"></script>
		<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>
	
		<!-- Fancy Dropdown JS -->
		<script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}dist/js/dropdown-bootstrap-extended.js"></script>
		
		<!-- FeatherIcons JavaScript -->
		<script src="{{ asset('dist/js/feather.min.js') }}"></script>
		
		<!-- Init JavaScript -->
		<script src="{{ asset('dist/js/init.js') }}"></script>
	</body>
</html>

