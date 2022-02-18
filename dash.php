<?php
include "cores/inc/config_c.php";
include "cores/inc/functions_c.php";
include "cores/inc/auth_c.php";
include "cores/inc/var_c.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Dashboard – <?php echo $sys_title ?></title>		
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
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<div id="kt_content_container" class="container-fluid">
							<div class="row g-5 g-xl-8">
								
							
							<?php include "cores/inc/dash_c.php" ?>	
							
							
							
								

							</div>				
						</div>						
					</div>
					<?php include "cores/inc/copy_c.php" ?>
				</div>
			</div>
		</div>		
	</body><?php include "cores/inc/footer_c.php" ?>
</html>