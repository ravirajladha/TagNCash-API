@include('inc_admin.header')


<!-- CONTAINER -->
<div class="app-content">

	<!-- PAGE-HEADER -->
	<div class="page-header">
		<h4 class="page-title"><?php echo strtoupper(Session('rexkod_login_type')); ?> - #01</h4>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="">Home</a></li>
		</ol>
	</div>
	<!-- PAGE-HEADER END -->

	<!-- ROW-1 -->
	<div class="row">

		<div class="col-sm-6 col-lg-6 col-xl-3">
			<div class="card">
				<div class="card-body iconfont text-left">
					<h6 class="mb-3">Users</h6>
					<h2 class="mb-1 text-dark display-4 font-weight-bold">{{$data['usercount']}}</h2>
					<!-- <p class="mb-3">Overview of Last month</p> -->
					<div class="progress h-1 mb-2">
						<div class="progress-bar bg-primary w-40 " role="progressbar"></div>
					</div>
					<small class="mb-0  text-muted"><span class="float-right text-muted"></span></small>
				</div>
			</div>
		</div>

		<div class="col-sm-6 col-lg-6 col-xl-3">
			<div class="card">
				<div class="card-body iconfont text-left">
					<h6 class="mb-3">Vendors</h6>
					<h2 class="mb-1 text-dark display-4 font-weight-bold">{{$data['vendor_count']}}
						<!-- <span class="text-success fs-13 ml-2">(+0%)</span> -->
					</h2>
					<!-- <p class="mb-3">Overview of Last month</p> -->
					<div class="progress h-1 mb-2">
						<div class="progress-bar bg-secondary w-60 " role="progressbar"></div>
					</div>
					<small class="mb-0 text-muted"><span class="float-right text-muted"></span></small>
				</div>
			</div>
		</div>

		<div class="col-sm-6 col-lg-6 col-xl-3">
			<div class="card">
				<div class="card-body iconfont text-left">
					<h6 class="mb-3">Coupons</h6>
					<h2 class="mb-1 text-dark display-4 font-weight-bold">
						<!-- <i class='fa fa-inr'></i> -->
						{{$data['coupon_count']}}
						<!-- <span class="text-success fs-13 ml-2">(0)</span> -->
					</h2>
					<!-- <p class="mb-3">Overview of Last month</p> -->
					<div class="progress h-1 mb-2">
						<div class="progress-bar bg-warning w-50 " role="progressbar"></div>
					</div>
					<small class="mb-0 text-muted"><span class="float-right text-muted"></span></small>
				</div>
			</div>
		</div>

		<div class="col-sm-6 col-lg-6 col-xl-3">
			<div class="card">
				<div class="card-body iconfont text-left">
					<h6 class="mb-3">Transactions</h6>
					<h2 class="mb-1 text-dark display-4 font-weight-bold">{{$data['transaction_count']}}
						<!-- <span class="text-success fs-13 ml-2">(+0%)</span> -->
					</h2>
					<!-- <p class="mb-3">Overview of Last month</p> -->
					<div class="progress h-1 mb-2">
						<div class="progress-bar bg-primary w-40 " role="progressbar"></div>
					</div>
					<small class="mb-0  text-muted"><span class="float-right text-muted"></span></small>
				</div>
			</div>
		</div>
		
	</div>
	<!-- ROW-1 END -->

	<!-- ROW-2 -->
	<div class="row">
		<div class="col-sm-6 col-lg-6 col-xl-3">
			<div class="card">
				<div class="card-body iconfont text-left">
					<h6 class="mb-3">Reedeemed Coupons</h6>
					<h2 class="mb-1 text-dark display-4 font-weight-bold">{{$data['redeemed_coupons_count']}}
						<!-- <span class="text-success fs-13 ml-2">(+0%)</span> -->
					</h2>
					<!-- <p class="mb-3">Overview of Last month</p> -->
					<div class="progress h-1 mb-2">
						<div class="progress-bar bg-primary w-40 " role="progressbar"></div>
					</div>
					<small class="mb-0  text-muted"><span class="float-right text-muted"></span></small>
				</div>
			</div>
		</div>

		<div class="col-sm-6 col-lg-6 col-xl-3">
			<div class="card">
				<div class="card-body iconfont text-left">
					<h6 class="mb-3">Total Reward Gained</h6>
					<h2 class="mb-1 text-dark display-4 font-weight-bold"><i class='fa fa-inr'></i>{{$data['total_reward_gained']}}
						<!-- <span class="text-success fs-13 ml-2">(+0%)</span> -->
					</h2>
					<!-- <p class="mb-3">Overview of Last month</p> -->
					<div class="progress h-1 mb-2">
						<div class="progress-bar bg-primary w-40 " role="progressbar"></div>
					</div>
					<small class="mb-0  text-muted"><span class="float-right text-muted"></span></small>
				</div>
			</div>
		</div>
	</div>
	<!-- <div class="row">
		<div class="col-lg-6">
			<div class="row">
				<div class="col-xl-6 col-md-12">
					<div class="card">
						<div class="card-body">
							<div class="d-flex">
								<div class="">
									<p class="mb-1 font-weight-semibold">
										Total Orders
									</p>
									<h2 class="mt-2 mb-2 display-6 font-weight-bold"><i class='fa fa-inr'></i>0</h2>
									<span class="mb-0 text-muted"><i class="fa fa-caret-down text-danger mr-1"></i> 0% last month</span>
								</div>
								<div class="ml-auto mt-3">
									<span class="pie" data-peity='{ "fill": ["#564ec1", "#e2e1ea"]}'>0/0</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-md-12">
					<div class="card">
						<div class="card-body">
							<div class="d-flex">
								<div class="">
									<p class="mb-1 font-weight-semibold">
										Total Revenue
									</p>
									<h2 class="mt-2 mb-2 display-6 font-weight-bold"><i class='fa fa-inr'></i>0</h2>
									<span class="mb-0 text-muted"><i class="fa fa-caret-up text-success mr-1"></i> 0% last month</span>
								</div>
								<div class="ml-auto mt-3">
									<span class="pie" data-peity='{ "fill": ["#04cad0", "#e2e1ea"]}'>0/0</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card overflow-hidden">
				<div class="card-body pb-0">
					<div class="h3 text-left mb-1">Net Orders (this week)</div>
					<p class="text-muted text-left mb-4">Find out the progress on order metrics.</p>
					<div class="row text-left">
						<div class="col dash-1">
							<p class="mb-0 font-weight-semibold">Bazaar Orders</p>
							<h2 class="mb-0">0</h2>
						</div>
						<div class="col dash-1">
							<p class="mb-0 font-weight-semibold">Service Orders</p>
							<h2 class="mb-0">0</h2>
						</div>
						<div class="col">
							<p class="mb-0 font-weight-semibold">Cancelled Orders</p>
							<h2 class="mb-0">0</h2>
						</div>
					</div>
					<div class="chart-wrapper ">
						<canvas id="widgetChart1" class="mb-0 p-0 overflow-hidden"></canvas>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card">
				<div class="card-body">
					<h3 class="mb-1">Key Metrics</h3>
					<p class="text-muted mb-4">Find out the optional on order metrics.</p>
					<div class="row mb-5">
						<div class="col-sm-4 dash-1">
							<h2 class="mb-0 text-primary">0%</h2>
							<span class="font-weight-semibold mb-0">Option 1</span>
						</div>
						<div class="col-sm-4 dash-1">
							<h2 class="mb-0 text-secondary">0%</h2>
							<span class="font-weight-semibold mb-0">Option 2</span>
						</div>
						<div class="col-sm-4">
							<h2 class="mb-0 text-danger">0%</h2>
							<span class="font-weight-semibold mb-0">Option 3</span>
						</div>
					</div>
					<div class="chart-wrapper">
						<canvas id="trials" class="chartwidget"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!-- ROW-2 END -->

	<!-- ROW-3 -->

	<!-- ROW-3 END -->


	<!-- CONTAINER END -->


	<!-- SIDE-BAR -->

	<!-- SIDE-BAR CLOSED -->

	@include('inc_admin.footer')