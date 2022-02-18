			 
                     <div class="aside-menu flex-column-fluid">
						<div class="hover-scroll-overlay-y px-2 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}" data-kt-scroll-offset="0">						
							<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold" id="#kt_aside_menu" data-kt-menu="true">							
							<?php 							
								$db_handle = new DBController();
								$sql_navc="SELECT `navc_id`, `navc_data`, `navc_name`, `navc_icon`, `navc_type` FROM `navc_tbl` WHERE `navc_tbl`.`navc_grp` LIKE '%$u_type%' AND `navc_tbl`.`navc_status` = 'active' ORDER BY `navc_tbl`.`navc_level` ASC";
								$navc_array = $db_handle->runQuery($sql_navc);
								if ((is_array($navc_array) || is_object($navc_array))){
								foreach($navc_array as $k_navc=>$v_navc) {
								$navc_type = $navc_array[$k_navc]["navc_type"];
								$navc_id = $navc_array[$k_navc]["navc_id"];
								?>
								<div class="menu-item">
								<?php if($navc_type == "no_sub"){?>
								<a href="<?php echo $navc_array[$k_navc]["navc_data"]; ?>" class="menu-link">
									<span class="menu-icon">											
												<span class="svg-icon svg-icon-5">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
														<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
													</svg>
												</span>												
											</span>
									<span class="menu-title"> <?php echo $navc_array[$k_navc]["navc_name"]; ?> </span>
								</a>
								</div>
								<?php }elseif($navc_type == "sub"){?>
								<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon" >
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
													<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
												</svg>
											</span>
											</span>
											<span class="menu-title">
											<?php echo $navc_array[$k_navc]["navc_name"]; ?> 
											</span>											
											<span class="menu-arrow"></span>									
									</span>				
							
									<div class="menu-sub menu-sub-accordion menu-active-bg">																
										<div class="menu-item">						
											<?php
											$sql_navm = "SELECT `navm_data`, `navm_name` FROM `navm_tbl` WHERE `navc_id` = '$navc_id' AND `navm_status` = 'active' AND `navm_grp` LIKE '%$u_type%'";
											$navm_array = $db_handle->runQuery($sql_navm);
											if ((is_array($navm_array) || is_object($navm_array))){
											foreach($navm_array as $k_navm=>$v_navm) {
											?>
											<a class="menu-link" href="<?php echo $sys_link ?>/<?php echo $navm_array[$k_navm]["navm_data"]; ?>">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title"><?php echo $navm_array[$k_navm]["navm_name"]; ?></span>
											</a>									
											<?php 
											}
											}
											?>
						
										</div>
									</div>
								</div>				
							<?php 
								}
							}
							}
							?>
							</div>							
						</div>
					</div>
					<div class="aside-footer flex-column-auto pb-5" id="kt_aside_footer">
						<div class="aside-user">
							<div class="aside-user d-flex align-items-sm-center justify-content-center py-5">
								<div class="me-5">								
									<div class="symbol symbol-40px cursor-pointer" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" data-kt-menu-overflow="true">
									<?php 
													if($u_pic != "150-26.jpg"){
													?>
													<img src="<?php echo $sys_link?>/assets/media/avatars/<?php echo $u_pic?>" alt="user-image">
													<?php
													}else{
													?>
													<img src="<?php echo $sys_link ?>/assets/media/avatars/<?php echo $u_pic ?>" alt="user-image" >
													<?php 
													}
													?>
									
									
									
									</div>
									<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
										<div class="menu-item px-3">
											<div class="menu-content d-flex align-items-center px-3">
												<div class="symbol symbol-50px me-5">
												<?php 
													if($u_pic != "avatar-1.png"){
													?>
													<img src="<?php echo $sys_link?>/assets/media/avatars/<?php echo $u_pic?>" alt="user-image">
													<?php
													}else{
													?>
													<img src="<?php echo $sys_link ?>/assets/media/avatars/<?php echo $u_pic ?>" alt="user-image" >
													<?php 
													}
													?>
													
												</div>
												<div class="d-flex flex-column">
													<div class="fw-bolder d-flex align-items-center fs-5"><td><?php echo $f_name ?> <?php echo $l_name?></td>
													<span class="badge badge-light-primary fw-bolder fs-8 px-2 py-1 ms-2"> <td><?php echo $_SESSION["u_type"]?></td></span></div>
													<a href="#" class="fw-bold text-muted text-hover-primary fs-7"><td><?php echo $email_id?></td>
                                                       
                                                       </a>
												</div>
											</div>
										</div>
										<div class="separator my-2"></div>										
										<div class="menu-item px-5">
											<a href="<?php echo $sys_link ?>/profile.php" class="menu-link px-5">My Profile</a>
										</div>										
										<div class="menu-item px-5 my-1">
											<a  href="javascript:void(0);" onclick="modal_show()" data-href="<?php echo $sys_link?>/cores/forms/change_pass.php" class=" openPopup menu-link px-5" data-name="Change Password"   title="Change Password">Change Password</a>
										</div>										
										<div class="menu-item px-5">
											<a href="<?php echo $sys_link ?>/signout.php" class="menu-link px-5">Sign Out</a>
										</div>										
										<!-- <div class="separator my-2"></div> -->
										<!--end::Menu separator-->
										<!--begin::Menu item-->
										<!-- <div class="menu-item px-5">
											<div class="menu-content px-5">
												<label class="form-check form-switch form-check-custom form-check-solid pulse pulse-success" for="kt_user_menu_dark_mode_toggle">
													<input class="form-check-input w-30px h-20px" type="checkbox" value="1" name="mode" id="kt_user_menu_dark_mode_toggle" data-kt-url="/dark/index.php" />
													<span class="pulse-ring ms-n1"></span>
													<span class="form-check-label text-gray-600 fs-7">Dark Mode</span>
												</label>
											</div>
										</div> -->
										<!--end::Menu item-->
									</div>
									<!--end::Menu-->
								</div>
								<!--end::User image-->
								<!--begin::Wrapper-->
								<div class="flex-row-fluid flex-wrap">
									<!--begin::Section-->
									<div class="d-flex align-items-center flex-stack">
										<!--begin::Info-->
										<div class="me-2">
											<!--begin::Username-->
											<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold lh-0"><?php echo $f_name?> <?php echo $l_name?></a>
											<!--end::Username-->
											<!--begin::Description-->
											<span class="text-gray-400 fw-bold d-block fs-8"><?php echo $u_type?></span>
											<!--end::Description-->
										</div>
										<!--end::Info-->
										<!--begin::Action-->
										<a href="signout.php" class="btn btn-icon btn-active-color-primary me-n4" data-bs-toggle="tooltip" title="End session and singout">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr076.svg-->
											<span class="svg-icon svg-icon-2 svg-icon-gray-400">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.3" width="12" height="2" rx="1" transform="matrix(-1 0 0 1 15.5 11)" fill="black" />
													<path d="M13.6313 11.6927L11.8756 10.2297C11.4054 9.83785 11.3732 9.12683 11.806 8.69401C12.1957 8.3043 12.8216 8.28591 13.2336 8.65206L16.1592 11.2526C16.6067 11.6504 16.6067 12.3496 16.1592 12.7474L13.2336 15.3479C12.8216 15.7141 12.1957 15.6957 11.806 15.306C11.3732 14.8732 11.4054 14.1621 11.8756 13.7703L13.6313 12.3073C13.8232 12.1474 13.8232 11.8526 13.6313 11.6927Z" fill="black" />
													<path d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z" fill="#C4C4C4" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</a>
										<!--end::Action-->
									</div>
									<!--end::Section-->
								</div>
								<!--end::Wrapper-->
							</div>
							<!--end::User-->
						</div>
						<!--end::Aside user-->
					</div>
					<!--end::Footer-->


				