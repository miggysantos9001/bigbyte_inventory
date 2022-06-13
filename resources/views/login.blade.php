<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
		<title>Online Ordering System | Powered By BigByte</title>
		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('public/assets/vendor/bootstrap/css/bootstrap.css') }}" />
		<link rel="stylesheet" href="{{ asset('public/assets/vendor/animate/animate.compat.css') }}">
		<link rel="stylesheet" href="{{ asset('public/assets/vendor/font-awesome/css/all.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('public/assets/vendor/boxicons/css/boxicons.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('public/assets/vendor/magnific-popup/magnific-popup.css') }}" />
		<link rel="stylesheet" href="{{ asset('public/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css') }}" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{ asset('public/assets/css/theme.css') }}" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{ asset('public/assets/css/skins/default.css') }}" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ asset('public/assets/css/custom.css') }}">

		<!-- Head Libs -->
		<script src="{{ asset('public/assets/vendor/modernizr/modernizr.js') }}"></script>

	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<?php 
			    $setting = \App\Setting::orderBy('id','DESC')->first();
			?>
			<div class="center-sign">
				<a href="/" class="logo float-left">
					@if($setting == NULL)
					<img src="{{ asset('public/photo/samplelogo.png') }}" height="180px" width="180px" alt="" />
					@else
					<img src="{{ asset('public/photo/'.$setting->company_logo) }}" height="180px" width="180px" alt="" />
					@endif
					<!-- <img src="https://i.ibb.co/R3BNmxw/thumbnail.png" alt="" height="180px" width="180px"> -->
					<p class="text-center">Online Ordering System</p>
				</a>
				@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
				<div class="panel card-sign" style="margin-top:-80px;">
					<div class="card-title-sign mt-3 text-end">
						<h2 class="title text-uppercase font-weight-bold m-0"><i class="bx bx-user-circle me-1 text-6 position-relative top-5"></i> Sign In</h2>
					</div>
					<div class="card-body">
						<form action="{{ route('pasok') }}" method="POST">
							{{ csrf_field() }}
							<div class="form-group mb-3">
								<label>Username</label>
								<div class="input-group">
									<input name="name" type="text" class="form-control form-control-lg"/>
									<span class="input-group-text">
										<i class="bx bx-user text-4"></i>
									</span>
								</div>
							</div>

							<div class="form-group mb-3">
								<div class="clearfix">
									<label class="float-left">Password</label>
								</div>
								<div class="input-group">
									<input name="password" type="password" class="form-control form-control-lg"/>
									<span class="input-group-text">
										<i class="bx bx-lock text-4"></i>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-12">
									<button type="submit" class="form-control btn btn-primary mt-2">Sign In</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2022. Powered By: BigByte.</p>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="{{ asset('public/assets/vendor/jquery/jquery.js') }}"></script>
		<script src="{{ asset('public/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
		<script src="{{ asset('public/assets/vendor/popper/umd/popper.min.js') }}"></script>
		<script src="{{ asset('public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('public/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
		<script src="{{ asset('public/assets/vendor/common/common.js') }}"></script>
		<script src="{{ asset('public/assets/vendor/nanoscroller/nanoscroller.js') }}"></script>
		<script src="{{ asset('public/assets/vendor/magnific-popup/jquery.magnific-popup.js') }}"></script>
		<script src="{{ asset('public/assets/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>

		<!-- Specific Page Vendor -->

		<!-- Theme Base, Components and Settings -->
		<script src="{{ asset('public/assets/js/theme.js') }}"></script>

		<!-- Theme Custom -->
		<script src="{{ asset('public/assets/js/custom.js') }}"></script>

		<!-- Theme Initialization Files -->
		<script src="{{ asset('public/assets/js/theme.init.js') }}"></script>

	</body>
</html>