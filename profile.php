<?php
include "cores/inc/config_c.php";
include "cores/inc/functions_c.php";
include "cores/inc/auth_c.php";
include "cores/inc/var_c.php";
$db_handle = new DBController();
$sql_profile = "SELECT * FROM `users_tbl` WHERE `u_id` = '$u_id'";
$fetch_profile = $db_handle->runQuery($sql_profile);
if (is_array($fetch_profile) || is_object($fetch_profile))
{
    foreach ($fetch_profile as $k => $v){
		$f_name =  $fetch_profile[$k]["f_name"];
		$l_name =  $fetch_profile[$k]["l_name"];
		$tel_no =  $fetch_profile[$k]["tel_no"];
		$email_id =  $fetch_profile[$k]["email_id"];
		$u_type =  $fetch_profile[$k]["u_type"];
		$u_location =  $fetch_profile[$k]["u_location"];
		$u_city =  $fetch_profile[$k]["u_city"];
		$u_stats =  $fetch_profile[$k]["u_stats"];
		$u_pic =  $fetch_profile[$k]["u_pic"];
		$u_timestamp =  $fetch_profile[$k]["u_timestamp"];
	
	}
}
?>>
<!DOCTYPE html>
<html lang="en">

<head>
		<title>Profile - <?php echo $sys_title ?></title>
		
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
						<div id="kt_content_container" class="container-fluid">
							<div class="d-flex flex-column flex-lg-row">
								<div class="flex-md-row-fluid ms-lg-12">
									<div class=" mb-5 mb-xl-10" id="kt_account_settings_info" data-kt-scroll-offset="{default: 100, md: 125}">
										<!--begin::Card header-->
										<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_basic_info" aria-expanded="true" aria-controls="kt_account_basic_info">
											<!--begin::Card title-->
											<div class="card-title m-0">
												<h3 class="fw-bolder m-0">Basic Info</h3>
											</div>
										</div>
										<div id="kt_account_basic_info" class="collapse show">
											<form id="kt_account_basic_info_form" class="form">
												<div class="card-body border-top p-9">
													<div class="row mb-6">
														<label class="col-lg-4 col-form-label fw-bold fs-6">Avatar</label>
														<div class="col-lg-8">
															
															<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/avatars/blank.png)">
															<?php 
																if($u_pic != "avatar-1.png"){
																?>
																<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo $sys_link?>/assets/media/avatars/<?php echo $u_pic?>)" alt="profile-image"></div>																
																<?php
																}else{
																?>
																<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo $sys_link?>/assets/media/avatars/<?php echo $u_pic?>)" alt="profile-image"></div>
																<?php 
																}
																?>
																
																<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
																	<i class="bi bi-pencil-fill fs-7"></i>
																	<input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
																	<input type="hidden" name="avatar_remove" />
																</label>
																<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
																	<i class="bi bi-x fs-2"></i>
																</span>
																<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
																	<i class="bi bi-x fs-2"></i>
																</span>
															</div>
															<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
														</div>
													</div>
													<div class="row mb-6">
														<label class="col-lg-4 col-form-label required fw-bold fs-6">Full Name</label>
														<div class="col-lg-8">
															<div class="row">
																<div class="col-lg-6 fv-row">
																	<input type="text" name="fname" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="First name" value="<?php echo $f_name ?>" />
																</div>
																<div class="col-lg-6 fv-row">
																	<input type="text" name="lname" class="form-control form-control-lg form-control-solid" placeholder="Last name" value="<?php echo $l_name ?>" />
																</div>
															</div>
														</div>
													</div>
													<div class="row mb-6">
														<label class="col-lg-4 col-form-label required fw-bold fs-6">Company</label>
														<div class="col-lg-8 fv-row">
															<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Company name" value="<?php if(!empty($u_set)){ echo $u_set;}else{echo "";}?>" />
														</div>
													</div>
													<div class="row mb-6">
														<label class="col-lg-4 col-form-label fw-bold fs-6">
															<span class="required">Contact Phone</span>
															<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i>
														</label>
														<div class="col-lg-8 fv-row">
															<input type="tel" name="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone number" value="<?php echo $tel_no ?>" />
														</div>
													</div>
													<div class="row mb-6">
														<label class="col-lg-4 col-form-label fw-bold fs-6">Company Site</label>
														<div class="col-lg-8 fv-row">
															<input type="text" name="website" class="form-control form-control-lg form-control-solid" placeholder="Company website" value="<?php if(!empty($u_set)){ echo $u_set;}else{echo "";}?>" />
														</div>
													</div>																					
													
												</div>
												<div class="card-footer d-flex justify-content-center py-6 px-9">												
													<button type="submit" class="btn btn-primary" >Save Changes</button>
												</div>
											</form>
										</div>
									</div>								
								</div>
							</div>				
						</div>
					</div>




                    
					<!--begin::Footer-->
					<?php include "cores/inc/copy_c.php" ?>
					<!--end::Footer-->
				</div>
			</div>
		</div>		
	</body>
	<?php include "cores/inc/footer_c.php" ?>
</html>