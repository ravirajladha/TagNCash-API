	<!-- FOOTER -->
	<footer class="footer">
		<div class="container">
			<div class="row align-items-center flex-row-reverse">
				<div class="col-md-12 col-sm-12 text-center">
					Copyright © 2022 <a href="#">Tag n Cash</a>. All rights reserved. | Powered by Kods
				</div>
			</div>
		</div>
	</footer>
	<!-- FOOTER CLOSED -->
	</div>

	<!-- BACK-TO-TOP -->
	<a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

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

	<!-- SIDE-MENU JS-->
	<script src="/assets_adb/plugins/side-menu/sidemenu.js"></script>

	<!-- SIDEMENU-Responsive-TABS JS-->
	<script src="/assets_adb/plugins/sidemenu-responsive-tabs/js/sidemenu-responsive-tabs.js"></script>
	<script src="/assets_adb/js/side-menu.js"></script>

	<!-- PERFECT SCROLL BAR JS-->
	<script src="/assets_adb/plugins/pscrollbar/perfect-scrollbar.js"></script>
	<script src="/assets_adb/plugins/pscrollbar/pscroll.js"></script>

	<!-- COUNTERS -->
	<script src="/assets_adb/plugins/counters/counterup.min.js"></script>
	<script src="/assets_adb/plugins/counters/waypoints.min.js"></script>
	<script src="/assets_adb/plugins/counters/counters-1.js"></script>

	<!-- SIDEBAR JS -->
	<script src="/assets_adb/plugins/sidebar/sidebar.js"></script>

	<!-- CUSTOM JS-->
	<script src="/assets_adb/js/custom.js"></script>


	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<?php if (!empty(session()->get('success'))) { ?>
		<script type="text/javascript">
			Swal.fire({
				icon: 'success',
				title: '{{ session()->get("success") }}',
				showConfirmButton: false,
				timer: 2000,

			})
		</script>
	<?php }
	session()->forget("success"); ?>


	<?php if (!empty(session()->get('failed'))) { ?>
		<script type="text/javascript">
			Swal.fire({
				icon: 'warning',
				title: '{{ session()->get("failed") }}',
				showConfirmButton: false,
				timer: 2000
			})
		</script>
	<?php }
	session()->forget('failed'); ?>

	</body>

	</html>