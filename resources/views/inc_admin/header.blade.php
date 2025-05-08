<!doctype html>
<html lang="en" dir="ltr">

<head>
	<!-- Meta data -->
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	<meta content="TagNCash - Rewards for Referrals" name="description">
	<meta content="" name="author">
	<meta name="keywords" content="" />

	<!--favicon -->

	<!-- TITLE -->
	<title>Tag n Cash</title>

	<!-- DASHBOARD CSS -->
	<link href="/assets_adb/css/style.css" rel="stylesheet" />
	<link href="/assets_adb/css/style-modes.css" rel="stylesheet" />

	<!-- SIDEMENU CSS-->
	<link href="/assets_adb/css/sidemenu/sidemenu.css" rel="stylesheet" />

	<!-- SIDEMENU-Responsive-TABS-->
	<link href="/assets_adb/css/sidemenu/sidemenu-responsive-tabs.css" rel="stylesheet">

	<!--C3.JS CHARTS PLUGIN -->
	<link href="/assets_adb/plugins/charts-c3/c3-chart.css" rel="stylesheet" />

	<!-- PERFECT SCROLL BAR CSS-->
	<link href="/assets_adb/plugins/pscrollbar/perfect-scrollbar.css" rel="stylesheet" />

	<!-- ION-RANGESLIDER CSS -->
	<link href="/assets_adb/plugins/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
	<link href="/assets_adb/plugins/ion.rangeSlider/css/ion.rangeSlider.skinSimple.css" rel="stylesheet">

	<!--- FONT-ICONS CSS -->
	<link href="/assets_adb/css/icons.css" rel="stylesheet" />

	<!-- Skin css-->
	<link href="/assets_adb/skins/skins-modes/color1.css" id="theme" rel="stylesheet" type="text/css" media="all" />

</head>

<body class="app default-header">

	<!-- GLOBAL-LOADER -->
	<div id="global-loader">
		<img src="/assets_adb/images/svgs/loader.svg" class="loader-img" alt="Loader">
	</div>

	<div class="page">
		<div class="page-main">

			<!-- Sidebar menu-->
			<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

			@include('inc_admin.navbar')

			<!-- CONTAINER -->
			<div class="app-content" style="margin:10px 10px !important;">

				<!-- HEADER -->
				<div class="header app-header">
					<div class="container-fluid">
						<div class="d-flex">
							<a class="header-brand" href="index.html">
								<img src="/assets_app/images/logo.png" class="header-brand-img desktop-logo" alt="AdBrovz">
								<img src="/assets_app/images/logo.png" class="header-brand-img mobile-view-logo" alt="AdBrovz">
							</a><!-- LOGO -->
							<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
							<div class="d-flex order-lg-2 ml-auto header-right-icons header-search-icon">
								<a href="#" data-toggle="search" class="nav-link nav-link-lg d-md-none navsearch"><i class="fa fa-search"></i></a>
								<div class="">
									<form class="form-inline">
										<div class="search-element">
											<input type="search" class="form-control header-search" placeholder="Search…" aria-label="Search" tabindex="1">
											<button class="btn btn-primary-color" type="submit"><i class="fa fa-search"></i></button>
										</div>
									</form>
								</div><!-- SEARCH -->
								<div class="dropdown d-md-flex">
									<a class="nav-link icon full-screen-link nav-link-bg" id="fullscreen-button">
										<i class="fe fe-maximize-2"></i>
									</a>
								</div><!-- FULL-SCREEN -->

								{{-- <div class="dropdown d-md-flex notifications">
									<a class="nav-link icon" data-toggle="dropdown">
										<i class="fe fe-bell"></i>
										<span class="pulse bg-warning"></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<div class="drop-heading">
											<div class="d-flex">
												<h5 class="mb-0 text-dark">Notifications</h5>
												<span class="badge badge-danger ml-auto  brround">4</span>
											</div>
										</div>
										<div class="dropdown-divider mt-0"></div>

										<a href="#" class="dropdown-item d-flex pb-3">
											<div class="notifyimg bg-danger-transparent">
												<i class="fa fa-cogs text-danger"></i>
											</div>
											<div>
												<strong> New Order</strong>
												<div class="small text-muted">45 mintues ago</div>
											</div>
										</a>
										<div class="dropdown-divider mb-0"></div>
										<div class=" text-center p-2">
											<a href="#" class="text-dark pt-0">View All Notifications</a>
										</div>
									</div>
								</div><!-- NOTIFICATIONS --> --}}

								<div class="dropdown d-md-flex header-settings">
									<a href="#" class="nav-link " data-toggle="dropdown">
										<span><img src="/assets_adb/images/users/male/32.jpg" alt="profile-user" class="avatar brround cover-image mb-0 ml-0"></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<div class="drop-heading  text-center border-bottom pb-3">
											<h5 class="text-dark mb-1"><?php
																		if (null !== (Session('rexkod_admin_id'))) {
																			echo Session('rexkod_admin_name');
																		} else {
																			echo Session('rexkod_vendor_name');
																		}
																		?></h5>
											<small class="text-muted"><?php echo ucfirst(Session('rexkod_login_type')); ?></small>
										</div>
										{{-- <a class="dropdown-item" href="#"><i class="mdi mdi-account-outline mr-2"></i> <span>My profile</span></a>
										<a class="dropdown-item" href="#"><i class="mdi mdi-settings mr-2"></i> <span>Settings</span></a>

										<a class="dropdown-item" href="#"><i class="mdi mdi-compass-outline mr-2"></i> <span>Support</span></a> --}}
										<a class="dropdown-item" href="/admin/logout"><i class="mdi  mdi-logout-variant mr-2"></i> <span>Logout</span></a>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
				<!-- HEADER END -->