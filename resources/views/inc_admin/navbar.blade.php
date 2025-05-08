<aside class="app-sidebar left-app">
	<div class="side-tab-body p-0 border-0" id="sidemenu-Tab">
		<div class="first-sidemenu">
			<ul class="resp-tabs-list hor_1">
				<div style="text-align: center; padding: 20px;">
					<a class="header-brand" href="{{ URL::to('/admin/index') }}">
						<img style="width: 75px; height: 75px;" src="{{ URL::to('/assets/images/taglogo2.png') }}" class="header-brand-img mobile-view-logo" alt="AdBrovz">
					</a>
				</div>
				<hr>
				<div style="text-align: center; margin-top: 35px;">
					<a href="{{ URL::to('/admin/all_users') }}" style="text-decoration: none; color: inherit; display: flex; flex-direction: column; align-items: center;">
						<i class="side-menu__icon fe fe-user" style="margin-bottom: 5px;"></i>
						<div style="display: inline-block;">Users</div>
					</a>
				</div>
				<hr>

				<div style="text-align: center; margin-top: 35px;">
					<a href="{{ URL::to('/admin/all_vendors') }}" style="text-decoration: none; color: inherit; display: flex; flex-direction: column; align-items: center;">
						<i class="side-menu__icon fe fe-user" style="margin-bottom: 5px;"></i>
						<div style="display: inline-block;">Vendors</div>
					</a>
				</div>
				<hr>

				<!-- <li data-toggle="tooltip" data-placement="right" title="Promotions" style="margin-top: -20px;">
                    <i class="side-menu__icon fe fe-package"></i>
                    <div class="slider-text">Promotions</div>
                </li> -->

				<div style="text-align: center; margin-top: 35px;">
					<a href="{{ URL::to('/admin/transactions') }}" style="text-decoration: none; color: inherit; display: flex; flex-direction: column; align-items: center;">
						<i class="side-menu__icon fa fa-exchange" style="margin-bottom: 5px;"></i>
						<div style="display: inline-block;">Transactions</div>
					</a>
				</div>
				<hr>
			</ul>

			<!-- <div class="second-sidemenu">
                <div class="resp-tabs-container hor_1">
                    <div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="font-weight-semibold"> Promotions</h4>
                                <ul>
                                    <li>
                                        <a href="{{ URL::to('/admin/all_promotions') }}" class="slide-item">All Promotions</a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::to('/admin/add_promotions') }}" class="slide-item">Add Promotions</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
		</div>
	</div>
</aside>