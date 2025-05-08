<!doctype html>
<html lang="en" dir="ltr">
  <head>
		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	

	

		<!-- TITLE -->
		<title>Tag n Cash</title>

		<!-- DASHBOARD CSS -->
		<link href="/assets_adb/css/style.css" rel="stylesheet"/>
		<link href="/assets_adb/css/style-modes.css" rel="stylesheet"/>

		<!-- SINGLE-PAGE CSS -->
		<link href="/assets_adb/plugins/single-page/css/main.css" rel="stylesheet" type="text/css">

		<!--C3.JS CHARTS PLUGIN -->
		<link href="/assets_adb/plugins/charts-c3/c3-chart.css" rel="stylesheet"/>

		<!-- CUSTOM SCROLL BAR CSS-->
		<link href="/assets_adb/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet"/>

		<!--- FONT-ICONS CSS -->
		<link href="/assets_adb/css/icons.css" rel="stylesheet"/>

		<!-- Skin css-->
		<link href="/assets_adb/skins/skins-modes/color1.css"  id="theme" rel="stylesheet" type="text/css" media="all" />

	</head>

	<body>

		<!-- BACKGROUND-IMAGE -->
		<div class="login-img">

			<!-- GLOABAL LOADER -->
			<div id="global-loader">
				<img src="/assets_adb/images/svgs/loader.svg" class="loader-img" alt="Loader">
			</div>

			<div class="page">
				<div class="">
				    <!-- CONTAINER OPEN -->
					<div class="col col-login mx-auto">
						<div class="text-center">
							<img src="/assets_adb/logo_white.png" class="header-brand-img" alt=""><br><br>
						</div>
					</div>
					<div class="container-login100">
						<div class="wrap-login100 p-6">
						<form method="post" action="/admin/login" autocomplete="off">
							@csrf
								<span class="login100-form-title">
									Member Login
								</span>
								
								<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
									<input class="input100" type="text" placeholder="Email" name="username" required>
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="zmdi zmdi-email" aria-hidden="true"></i>
									</span>
								</div>
								<div class="wrap-input100 validate-input" data-validate = "Password is required">
									<input class="input100" type="password" name="password" placeholder="Password" required>
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="zmdi zmdi-lock" aria-hidden="true"></i>
									</span>
								</div>
								
								<div class="container-login100-form-btn">
									<button type="submit" class="login100-form-btn btn-primary">
										Login
									</button>
								</div>

								<div class="text-center pt-3">
									<p class="text-dark mb-0">Not a member?<a href="#" class="text-primary ml-1">Contact Admin.</a></p>
								</div>
								<div class=" flex-c-m text-center mt-3">
								   
								</div>
							</form>
						</div>
					</div>
					<!-- CONTAINER CLOSED -->
				</div>
			</div>
		</div>
		<!-- BACKGROUND-IMAGE CLOSED -->

		<!-- JQUERY SCRIPTS -->
		<script src="/assets_adb/js/vendors/jquery-3.2.1.min.js"></script>

		<!-- BOOTSTRAP SCRIPTS -->
		<script src="/assets_adb/js/vendors/bootstrap.bundle.min.js"></script>

		<!-- SPARKLINE -->
		<script src="/assets_adb/js/vendors/jquery.sparkline.min.js"></script>

		<!-- CHART-CIRCLE -->
		<script src="/assets_adb/js/vendors/circle-progress.min.js"></script>

		<!-- RATING STAR -->
		<script src="/assets_adb/plugins/rating/jquery.rating-stars.js"></script>

		<!-- SELECT2 JS -->
		<script src="/assets_adb/plugins/select2/select2.full.min.js"></script>
		<script src="/assets_adb/js/select2.js"></script>

		<!-- INPUT MASK PLUGIN-->
		<script src="/assets_adb/plugins/input-mask/jquery.mask.min.js"></script>

		<!-- CUSTOM SCROLL BAR JS-->
		<script src="/assets_adb/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!-- CUSTOM JS-->
		<script src="/assets_adb/js/custom.js"></script>

	</body>
</html>


<script src="/cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(!empty(session()->get('success'))) { ?>
<script type="text/javascript">
Swal.fire({
  icon: 'success',
  title: '{{ session()->get('success') }}',
  showConfirmButton: false,
  timer: 2000,
  
})
</script>
<?php } session()->forget('success'); ?>


<?php if(!empty(session()->get('failed'))) { ?>
  <script type="text/javascript">
  Swal.fire({
  icon: 'warning',
  title: '{{ session()->get('failed') }}',
  showConfirmButton: false,
  timer: 2000
})
  </script>
<?php } session()->forget('failed'); ?>


 
  				@include('inc_admin.footer')

