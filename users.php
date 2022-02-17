<?php
include "cores/inc/config_c.php";
include "cores/inc/functions_c.php";
include "cores/inc/auth_c.php";
include "cores/inc/var_c.php";
$db_handle = new DBController();
$query = "SELECT * FROM `users_tbl`";
$faq = $db_handle->runQuery($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
		<title>Users List – <?php echo $sys_title ?></title>
		
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
						<div id="kt_content_container" class="container-fluid">
							<!--begin::Row-->

                            <div class="">
								<!--begin::Card header-->
								<div class="card-header border-0 pt-6">
									<!--begin::Card title-->
									<div class="card-title">
										<!--begin::Search-->
										<div class="d-flex align-items-center position-relative my-1">
											<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
											<span class="svg-icon svg-icon-1 position-absolute ms-6">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
													<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
											<input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Customers" />
										</div>
									
									</div>
									<div class="card-toolbar">
									
										<div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">									
											<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">Add Customer</button>
										
										</div>
										<div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
											<div class="fw-bolder me-5">
											<span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
											<button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
										</div>
									</div>
								</div>
								<div class="card-body pt-0">
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
										<!--begin::Table head-->
										<thead>
											<!--begin::Table row-->
											<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
												<th class="w-10px pe-2">
													<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
														<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
													</div>
												</th>                                                
												<th class="min-w-125px">Customer Name</th>
												<th class="min-w-125px">Email</th>
												<th class="min-w-125px">Phone</th>
                                                <th class="min-w-125px">Role</th>
                                                <th class="min-w-125px"> Status</th>
												<th class="min-w-125px">Created Date</th>
												<th class="text-end min-w-70px">Actions</th>
											</tr>
										</thead>
										<tbody class="fw-bold text-gray-600">
                                        <?php
												foreach($faq as $k=>$v) {
												?>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="1" />
                                                            </div>
                                                        </td>                                                        
                                                        <td><?php echo $faq[$k]["f_name"]; ?> <?php echo $faq[$k]["l_name"]; ?></td>
                                                        <td><?php echo $faq[$k]["email_id"]; ?></td>
                                                        <td><?php echo $faq[$k]["tel_no"]; ?></td>
                                                        <td><?php echo $faq[$k]["u_type"]; ?></td>
                                                        <td><?php echo $faq[$k]["u_stats"]; ?></td>
                                                       
                                                        <td><?php echo $faq[$k]["u_timestamp"]; ?></td>
                                                        <td><a href="javascript:void(0);" onclick="modal_show()" data-href="cores/mods/v_user.php?v_id=<?php echo $faq[$k]["u_id"]; ?>" data-name="View User" class="openPopup btn btn-warning">View</a></td>
                                                    </tr>
												<?php
												}
												?>
											
										</tbody>
										<!--end::Table body-->
									</table>
									<!--end::Table-->
								</div>
								<!--end::Card body-->
							</div>
						</div>
						
					</div>
					<?php include "cores/inc/copy_c.php" ?>
				
				</div>
				
			</div>
		
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