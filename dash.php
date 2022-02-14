<?php  include "cores/inc/config_c.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
		<title>Dashboard – <?php echo $sys_title ?></title>
		
        <?php include "cores/inc/header_c.php" ?>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="aside-enabled">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
					<!--end::Aside toolbar-->
					<?php include "cores/inc/nav_c.php" ?>
					<!--end::Aside menu-->					
				</div>
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<?php include "cores/inc/top_c.php" ?>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div id="kt_content_container" class="container-xxl">
							<!--begin::Row-->







							<div class="row g-5 g-xl-8">							
								<!--begin::Col-->
								<div class="col-xl-12">
									<!--begin::Widget 1-->
									<div class="card bgi-position-y-bottom bgi-position-x-end bgi-no-repeat bgi-size-cover min-h-250px card-xl-stretch mb-5 mb-xl-8 bg-gray-200 border-0" style="background-position: 100% 100%;background-size: 500px auto;background-image:url('assets/media/misc/city.png')">
										<!--begin::Body-->
										<div class="card-body d-flex flex-column justify-content-center ps-lg-15">
											<!--begin::Title-->
											<h3 class="text-gray-800 fs-2qx fw-boldest line-height-lg mb-4 mb-lg-8">Trapo Inventory 
											<br />is a Inventory management System</h3>
											<!--end::Title-->
											<!--begin::Action-->
											<div class="m-0">
												<a href='#' class="btn btn-dark fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Boost Store</a>
											</div>
											<!--begin::Action-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::Widget 1-->
								</div>
								<!--end::Col-->
							</div>	
							
							






						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<?php include "cores/inc/copy_c.php" ?>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Scrolltop-->		
	</body><?php include "cores/inc/footer_c.php" ?>
	<!--end::Body-->
</html>