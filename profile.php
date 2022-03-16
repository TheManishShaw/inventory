<?php
include "cores/inc/config_c.php";
include "cores/inc/functions_c.php";
include "cores/inc/auth_c.php";
include "cores/inc/var_c.php";
$db_handle = new DBController();
$sql_profile = "SELECT * FROM `users_tbl` INNER JOIN `uset_tbl` ON `users_tbl`.`u_set`=`uset_tbl`.`uset_id` WHERE `u_id` = '$u_id'";
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
		$store_name = $fetch_profile[$k]["uset_name"];
		$store_email = $fetch_profile[$k]["uset_email"];
		$store_phone = $fetch_profile[$k]["uset_phone"];
		$store_address = $fetch_profile[$k]["uset_address"];
		$store_gst_no = $fetch_profile[$k]["uset_gst_no"];
		$store_image = $fetch_profile[$k]["uset_image"];
		$store_site = $fetch_profile[$k]["uset_site"];
	}
}
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
					<!--begin::Product List-->
					<div class="d-flex flex-column flex-lg-row">
								<div class="flex-md-row-fluid ms-lg-12">
								<form id="kt_account_basic_info_form" class="form">
									<div class=" mb-5 mb-xl-10" id="kt_account_settings_info" data-kt-scroll-offset="{default: 100, md: 125}">
										<!--begin::Card header-->
										<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_basic_info" aria-expanded="true" aria-controls="kt_account_basic_info">
											<!--begin::Card title-->
											<div class="card-title m-0">
												<h3 class="fw-bolder m-0">Basic Info</h3>
											</div>
										</div>
										<div id="kt_account_basic_info" class="collapse show">
												<div class="card-body border-top">
													<div class="row mb-6">
														<label class="col-lg-4 col-form-label fw-bold fs-6">Avatar</label>
														<div class="col-lg-8">
															
															<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/avatars/blank.png)">
															<?php 
																if($u_pic != ""){
																?>
																<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo $sys_link?>/data/user_img/<?php echo $u_pic?>)" alt="profile-image"></div>																
																<?php
																}else{
																?>
																<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo $sys_link?>/data/favicon.ico)" alt="profile-image"></div>
																<?php 
																}
																?>
																
																<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
																	<i class="bi bi-pencil-fill fs-7"></i>
																	<input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
																	<input type="hidden" name="avatar_remove" />
																	<input type="text" name="old_profile_image" value="<?php echo $u_pic;?>" hidden/>
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
															<input type="text" name="website" class="form-control form-control-lg form-control-solid" placeholder="Company website" value="<?php if(!empty($store_site)){ echo $store_site;}else{echo "";}?>" />
														</div>
													</div>																					
													
												</div>
										</div>
									</div>								
									<div class=" mb-5 mb-xl-10" id="kt_account_settings_info" data-kt-scroll-offset="{default: 100, md: 125}">
										<!--begin::Card header-->
										<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_store_info" aria-expanded="true" aria-controls="kt_account_store_info">
											<!--begin::Card title-->
											<div class="card-title m-0">
												<h3 class="fw-bolder m-0">Store Info</h3>
											</div>
										</div>
										<div id="kt_account_store_info" class="collapse show">
												<div class="card-body border-top p-9">
													<div class="row mb-6">
														<label class="col-lg-4 col-form-label fw-bold fs-6">Logo</label>
														<div class="col-lg-8">
															
															<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/avatars/blank.png)">
															<?php 
																if($store_image != ""){
																?>
																<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo $sys_link?>/data/store_img/<?php echo $store_image?>)" alt="store-image"></div>																
																<?php
																}else{
																?>
																<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo $sys_link?>/data/favicon.ico)" alt="store-image"></div>
																<?php 
																}
																?>
																
																<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
																	<i class="bi bi-pencil-fill fs-7"></i>
																	<input type="file" name="store_img" accept=".png, .jpg, .jpeg" />
																	<input type="hidden" name="avatar_remove" />
																	<input type="text" name="old_store_image" value="<?php echo $store_image;?>" hidden/>
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
														<label class="col-lg-4 col-form-label required fw-bold fs-6">Name</label>
														<div class="col-lg-8">
															<div class="row">
																<div class="col-lg-12 fv-row">
																	<input type="text" name="store_name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Store name" value="<?php echo $store_name?>" />
																</div>
															</div>
														</div>
													</div>
													<div class="row mb-6">
														<label class="col-lg-4 col-form-label required fw-bold fs-6">Email</label>
														<div class="col-lg-8 fv-row">
															<input type="text" name="store_email" class="form-control form-control-lg form-control-solid" placeholder="Store email" value="<?php echo $store_email;?>" />
														</div>
													</div>
													<div class="row mb-6">
														<label class="col-lg-4 col-form-label fw-bold fs-6">
															<span class="required">Phone</span>
															<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i>
														</label>
														<div class="col-lg-8 fv-row">
															<input type="tel" name="store_phone" class="form-control form-control-lg form-control-solid" placeholder="Store Phone number" value="<?php echo $store_phone ?>" />
														</div>
													</div>
													<div class="row mb-6">
														<label class="col-lg-4 col-form-label fw-bold fs-6">Address</label>
														<div class="col-lg-8 fv-row">
															<input type="text" name="store_address" class="form-control form-control-lg form-control-solid" placeholder="Store address" value="<?php if(!empty($store_address)){ echo $store_address;}else{echo "";}?>" />
														</div>
													</div>																					
													<div class="row mb-6">
														<label class="col-lg-4 col-form-label fw-bold fs-6">GST Number</label>
														<div class="col-lg-8 fv-row">
															<input type="text" name="store_gst_no" class="form-control form-control-lg form-control-solid" placeholder="Store GST Number" value="<?php if(!empty($store_gst_no)){ echo $store_gst_no;}else{echo "";}?>" />
														</div>
													</div>																					
													
												</div>
												<div class="card-footer d-flex justify-content-center py-6 px-9">												
													<button type="submit" id="submit" class="btn btn-primary">Save Changes</button>
												</div>
											</div>
										</div>								
									</form>
								</div>
							</div>
																	
					</div>
					</div>
					<?php include "cores/inc/copy_c.php" ?>
				</div>
			</div>
		</div>		
	</body>
	<?php include "cores/inc/footer_c.php" ?>
	<script>
			function submitForm(formData){                
				$.ajax({
					type:'POST',
					url: "update_profile.php",
					data: formData,
					enctype: 'multipart/form-data',
					processData: false,
					contentType: false
				}).done(function (data) {
					Swal.fire(
						'Success',
						'Profile updated successfully!',
						'success'
					);
				}).fail(function(e){
					Swal.fire(
						'Error',
						'An error occured. Please try again.',
						'error'
					);
					console.log(e.responseText);
				});
			}
			$(function(){
				document.querySelector("#submit").addEventListener("click",function(e){
					e.preventDefault();
					let formData = new FormData($('form')[0]);
					if (validator) {
						validator.validate().then(function(status) {
							if (status == "Valid") {
								submitForm(formData);
							}
						});
					}
				});
			});

			var form = document.querySelector("form");

			var validator = FormValidation.formValidation(
				form,
				{
					fields: {
						store_phone: {
							validators: {
								notEmpty: {
									message: "Please select an option."
								},
								stringLength: {
									max: 10,
									min: 10,
									message: "Please enter a valid mobile number."
								}
							}
						},
						store_name: {
							validators: {
								notEmpty: {
									message: "Text input is requred."
								}
							}
						},
						store_email: {
							validators: {
								notEmpty: {
									message: "Please enter a valid email address."
								},
								emailAddress: {
									message: "Please enter a valid email adress."
								}
							}
						},
						f_name: {
							validators: {
								notEmpty: {
									message: "Text input required."
								}
							}
						},
						l_name: {
							validators: {
								notEmpty: {
									message: "Text input required."
								}
							}
						},
						phone: {
							validators: {
								notEmpty: {
									message: "Text input required."
								},
								stringLength: {
									min: 10,
									max: 10,
									message: "Please enter a valide mobile number."
								}
							}
						}
					},
					plugins: {
						submitButton: new FormValidation.plugins.SubmitButton(),
						trigger: new FormValidation.plugins.Trigger(),
						bootstrap: new FormValidation.plugins.Bootstrap5({
							rowSelector: ".fv-row"
						})
					}
				}
			);

			$('[name="phone"],[name="store_phone"]').on("input",function(){
				this.value = this.value.replace(/[^0-9]/,'');
			});
		</script>
</html>

