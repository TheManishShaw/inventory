<?php  include "cores/inc/config_c.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
		<title>Error - <?php echo $sys_title ?></title>		
        <?php include "cores/inc/header_c.php" ?>
	</head>
	<body id="kt_body" class="aside-enabled">
		<div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid">
				<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
					<?php include "cores/inc/nav_c.php" ?>
							
				</div>
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<?php include "cores/inc/top_c.php" ?>
			<div id="kt_customer_view_payment_method" class="card-body pt-0">
												
                <div class="d-flex flex-column flex-center flex-column-fluid p-10">
                    <img src="assets/media/illustrations/sketchy-1/18.png" alt="" class="mw-100 mb-10 h-lg-450px" />
                    <h1 class="fw-bold mb-10" style="color: #A3A3C7">Seems there is nothing here</h1>
                    <a href="<?php echo $sys_link ?>/index.php" class="btn btn-primary">Return Home</a>
                </div>						
			</div>
					<?php include "cores/inc/copy_c.php" ?>
				</div>
			</div>
		</div>		
	</body><?php include "cores/inc/footer_c.php" ?>
	<!--end::Body-->
</html>