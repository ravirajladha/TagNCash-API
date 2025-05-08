	<!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				<aside class="app-sidebar left-menu2">
					<div class="app-sidebar__user clearfix">
						<div class="dropdown user-pro-body text-center">
							
							<div class="user-info">
							<div class="user-info">
								<h2><?php if(Session('rexkod_admin_id')){echo Session('rexkod_admin_name');}else {echo Session('rexkod_vendor_name');} ?></h2>
								<span><?php echo strtoupper(Session('rexkod_login_type')); ?></span>
							</div>
							</div>
						
						</div>
					</div>
					<ul class="side-menu">
						
						<li class="slide">
							<a class="side-menu__item  slide-show" href="/admin/index"><i class="side-menu__icon  fe fe-airplay"></i><span class="side-menu__label">Dashboard</span><i class="angle fa fa-angle-right"></i></a>
							
						</li>
                        <li>
							<a class="side-menu__item" href="/admin/from_orders"><i class="side-menu__icon fe fe-box"></i><span class="side-menu__label">From Orders</span></a>
						</li>
						<li>
							<a class="side-menu__item" href="/admin/to_orders"><i class="side-menu__icon fe fe-box"></i><span class="side-menu__label">To Orders</span></a>
						</li>
						<li class="slide">
							<a class="side-menu__item  slide-show" href="/admin/add_delivery"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Add Delivery Agent</span></a>
							
						</li>
                        <li class="slide">
							<a class="side-menu__item  slide-show" href="/admin/delivery"><i class="side-menu__icon fe fe-file"></i><span class="side-menu__label">Delivery Agents</span><i class="angle fa fa-angle-right"></i></a>
						
						</li>
					</ul>
				</aside>