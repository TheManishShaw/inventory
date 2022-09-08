			 <div class="aside-menu flex-column-fluid">
			     <div class="hover-scroll-overlay-y px-2 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
			         data-kt-scroll-height="auto"
			         data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}"
			         data-kt-scroll-offset="0">

			         <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold"
			             id="#kt_aside_menu" data-kt-menu="true">
			             <div class="menu-item">
			                 <a class="menu-link" href="<?php echo $sys_link ?>/index.php">
			                     <span class="menu-icon">
			                         <span class="svg-icon svg-icon-5">
			                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
			                                 fill="none">
			                                 <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
			                                 <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
			                                     fill="black" />
			                             </svg>
			                         </span>
			                     </span>
			                     <span class="menu-title">Dashboard</span>
			                 </a>
			             </div>
			             <?php if ($u_store_stats == 'done') {?>
			             <!-- products start -->
			             <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
			                 <span class="menu-link">
			                     <span class="menu-icon">
			                         <span class="svg-icon svg-icon-5">
			                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
			                                 fill="none">
			                                 <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
			                                 <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
			                                     fill="black" />
			                             </svg>
			                         </span>
			                     </span>
			                     <span class="menu-title">Products</span>
			                     <span class="menu-arrow"></span>
			                 </span>
			                 <div class="menu-sub menu-sub-accordion menu-active-bg">
			                     <div class="menu-item">
			                         <a class="menu-link" href="<?php echo $sys_link?>/inventory/product/index.php">
			                             <span class="menu-bullet">
			                                 <span class="bullet bullet-dot"></span>
			                             </span>
			                             <span class="menu-title">Active Products</span>
			                         </a>
			                     </div>
			                     <div class="menu-item">
			                         <a class="menu-link" href="<?php echo $sys_link?>/inventory/product/inactive_product.php">
			                             <span class="menu-bullet">
			                                 <span class="bullet bullet-dot"></span>
			                             </span>
			                             <span class="menu-title">In-Active Products</span>
			                         </a>
			                     </div>

			                 </div>
			             </div>
			             <!-- products end -->
			             <!-- sales start -->
			             <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
			                 <span class="menu-link">
			                     <span class="menu-icon">
			                         <span class="svg-icon svg-icon-5">
			                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
			                                 fill="none">
			                                 <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
			                                 <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
			                                     fill="black" />
			                             </svg>
			                         </span>
			                     </span>
			                     <span class="menu-title">Sales</span>
			                     <span class="menu-arrow"></span>
			                 </span>
			                 <div class="menu-sub menu-sub-accordion menu-active-bg">
			                     <div class="menu-item">
			                         <a class="menu-link" href="<?php echo $sys_link?>/inventory/sales/modal/create_sales.php">
			                             <span class="menu-bullet">
			                                 <span class="bullet bullet-dot"></span>
			                             </span>
			                             <span class="menu-title">Create Sales</span>
			                         </a>
			                     </div>
			                     <div class="menu-item">
			                         <a class="menu-link" href="<?php echo $sys_link?>/inventory/sales/index.php">
			                             <span class="menu-bullet">
			                                 <span class="bullet bullet-dot"></span>
			                             </span>
			                             <span class="menu-title"> Sales List</span>
			                         </a>
			                     </div>

			                 </div>
			             </div>
			             <!-- sales end -->
			             <!-- purchase start -->
			             <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
			                 <span class="menu-link">
			                     <span class="menu-icon">
			                         <span class="svg-icon svg-icon-5">
			                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
			                                 fill="none">
			                                 <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
			                                 <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
			                                     fill="black" />
			                             </svg>
			                         </span>
			                     </span>
			                     <span class="menu-title">Purchase</span>
			                     <span class="menu-arrow"></span>
			                 </span>
			                 <div class="menu-sub menu-sub-accordion menu-active-bg">
			                     <div class="menu-item">
			                         <a class="menu-link"
			                             href="<?php echo $sys_link?>/inventory/purchase/modal/create_purchase.php">
			                             <span class="menu-bullet">
			                                 <span class="bullet bullet-dot"></span>
			                             </span>
			                             <span class="menu-title">Create Purchase</span>
			                         </a>
			                     </div>
			                     <div class="menu-item">
			                         <a class="menu-link" href="<?php echo $sys_link?>/inventory/purchase/index.php">
			                             <span class="menu-bullet">
			                                 <span class="bullet bullet-dot"></span>
			                             </span>
			                             <span class="menu-title"> Purchase List</span>
			                         </a>
			                     </div>

			                 </div>
			             </div>
			             <!-- purchase end -->
			             <!-- return start -->
			             <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
			                 <span class="menu-link">
			                     <span class="menu-icon">
			                         <span class="svg-icon svg-icon-5">
			                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
			                                 fill="none">
			                                 <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
			                                 <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
			                                     fill="black" />
			                             </svg>
			                         </span>
			                     </span>
			                     <span class="menu-title">Return</span>
			                     <span class="menu-arrow"></span>
			                 </span>
			                 <div class="menu-sub menu-sub-accordion menu-active-bg">
			                     <div class="menu-item">
			                         <a class="menu-link" href="<?php echo $sys_link?>/inventory/return/sale/index.php">
			                             <span class="menu-bullet">
			                                 <span class="bullet bullet-dot"></span>
			                             </span>
			                             <span class="menu-title">Sale Return</span>
			                         </a>
			                     </div>
			                     <?php if ($_SESSION['chain_id'] != 1) { ?>
			                     <div class="menu-item">
			                         <a class="menu-link" href="<?php echo $sys_link?>/inventory/return/purchase/index.php">
			                             <span class="menu-bullet">
			                                 <span class="bullet bullet-dot"></span>
			                             </span>
			                             <span class="menu-title">Purchase Return</span>
			                         </a>
			                     </div>
			                     <?php } else { ?>
			                     <div class="menu-item">
			                         <a class="menu-link" href="<?php echo $sys_link?>/inventory/return/gvm/index.php">
			                             <span class="menu-bullet">
			                                 <span class="bullet bullet-dot"></span>
			                             </span>
			                             <span class="menu-title">GVM</span>
			                         </a>
			                     </div>
			                     <div class="menu-item">
			                         <a class="menu-link" href="<?php echo $sys_link?>/inventory/return/grm/index.php">
			                             <span class="menu-bullet">
			                                 <span class="bullet bullet-dot"></span>
			                             </span>
			                             <span class="menu-title">GRM</span>
			                         </a>
			                     </div>
			                     <?php } ?>

			                 </div>
			             </div>
			             <!-- return end -->
			             <!-- credit start -->
			             <div class="menu-item menu-accordion">
			                 <a href="<?php echo $sys_link ?>/inventory/credit/index.php" class="menu-link">
			                         <span class="menu-icon">
			                             <span class="svg-icon svg-icon-5">
			                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
			                                     fill="none">
			                                     <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
			                                         fill="black" />
			                                     <path opacity="0.3"
			                                         d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
			                                         fill="black" />
			                                 </svg>
			                             </span>
			                         </span>
			                         <span class="menu-title">Credit</span>
			                     </a>
			             </div>
			             <!-- credit end -->
			             <!-- adjustment start -->
			             <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
			                 <span class="menu-link">
			                     <span class="menu-icon">
			                         <span class="svg-icon svg-icon-5">
			                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
			                                 fill="none">
			                                 <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
			                                 <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
			                                     fill="black" />
			                             </svg>
			                         </span>
			                     </span>
			                     <span class="menu-title">Adjustment</span>
			                     <span class="menu-arrow"></span>
			                 </span>
			                 <div class="menu-sub menu-sub-accordion menu-active-bg">
			                     <div class="menu-item">
			                         <a class="menu-link"
			                             href="<?php echo $sys_link?>/inventory/adjustment/modal/create_adjustment.php">
			                             <span class="menu-bullet">
			                                 <span class="bullet bullet-dot"></span>
			                             </span>
			                             <span class="menu-title">Create Adjustment</span>
			                         </a>
			                     </div>
			                     <div class="menu-item">
			                         <a class="menu-link" href="<?php echo $sys_link?>/inventory/adjustment/index.php">
			                             <span class="menu-bullet">
			                                 <span class="bullet bullet-dot"></span>
			                             </span>
			                             <span class="menu-title">Adjustment List</span>
			                         </a>
			                     </div>

			                 </div>
			             </div>
			             <!-- adjustment end -->
			             <!-- people start -->
			             <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
			                 <span class="menu-link">
			                     <span class="menu-icon">
			                         <span class="svg-icon svg-icon-5">
			                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
			                                 fill="none">
			                                 <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
			                                 <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
			                                     fill="black" />
			                             </svg>
			                         </span>
			                     </span>
			                     <span class="menu-title">People</span>
			                     <span class="menu-arrow"></span>
			                 </span>
			                 <div class="menu-sub menu-sub-accordion menu-active-bg">
			                     <div class="menu-item">
			                         <a class="menu-link" href="<?php echo $sys_link?>/inventory/people/customer/index.php">
			                             <span class="menu-bullet">
			                                 <span class="bullet bullet-dot"></span>
			                             </span>
			                             <span class="menu-title">Customers</span>
			                         </a>
			                     </div>
			                     <div class="menu-item">
			                         <a class="menu-link" href="<?php echo $sys_link?>/inventory/people/supplier/index.php">
			                             <span class="menu-bullet">
			                                 <span class="bullet bullet-dot"></span>
			                             </span>
			                             <span class="menu-title">Suppliers</span>
			                         </a>
			                     </div>

			                 </div>
			             </div>
			             <!-- people end -->
			             <!-- setting start -->
			             <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
			                 <span class="menu-link">
			                     <span class="menu-icon">
			                         <span class="svg-icon svg-icon-5">
			                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
			                                 fill="none">
			                                 <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
			                                 <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
			                                     fill="black" />
			                             </svg>
			                         </span>
			                     </span>
			                     <span class="menu-title">Setting</span>
			                     <span class="menu-arrow"></span>
			                 </span>
			                 <div class="menu-sub menu-sub-accordion menu-active-bg">
			                     <div class="menu-item">
			                         <a class="menu-link" href="<?php echo $sys_link?>/inventory/setting/brand/brand.php">
			                             <span class="menu-bullet">
			                                 <span class="bullet bullet-dot"></span>
			                             </span>
			                             <span class="menu-title">Brand</span>
			                         </a>
			                     </div>
			                     <div class="menu-item">
			                         <a class="menu-link" href="<?php echo $sys_link?>/inventory/setting/category/category.php">
			                             <span class="menu-bullet">
			                                 <span class="bullet bullet-dot"></span>
			                             </span>
			                             <span class="menu-title">Category</span>
			                         </a>
			                     </div>
			                     <div class="menu-item">
			                         <a class="menu-link" href="<?php echo $sys_link?>/inventory/setting/unit/unit.php">
			                             <span class="menu-bullet">
			                                 <span class="bullet bullet-dot"></span>
			                             </span>
			                             <span class="menu-title">Unit</span>
			                         </a>
			                     </div>
			                     <div class="menu-item">
			                         <a class="menu-link" href="<?php echo $sys_link?>/inventory/setting/tax/tax.php">
			                             <span class="menu-bullet">
			                                 <span class="bullet bullet-dot"></span>
			                             </span>
			                             <span class="menu-title">Tax</span>
			                         </a>
			                     </div>
			                     <div class="menu-item">
			                         <a class="menu-link"
			                             href="<?php echo $sys_link?>/inventory/setting/return_reason/index.php">
			                             <span class="menu-bullet">
			                                 <span class="bullet bullet-dot"></span>
			                             </span>
			                             <span class="menu-title">Return Reason</span>
			                         </a>
			                     </div>
			                 </div>
			             </div>
			             <!-- setting end -->
			             <?php if($_SESSION['u_type']=='GRP00' || $_SESSION['u_type']=='GRP01'){?>
			             <!-- store start -->
			             <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
			                 <span class="menu-link">
			                     <span class="menu-icon">
			                         <span class="svg-icon svg-icon-5">
			                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
			                                 fill="none">
			                                 <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
			                                 <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
			                                     fill="black" />
			                             </svg>
			                         </span>
			                     </span>
			                     <span class="menu-title">Store</span>
			                     <span class="menu-arrow"></span>
			                 </span>
			                 <div class="menu-sub menu-sub-accordion menu-active-bg">
			                     <div class="menu-item">
			                         <a class="menu-link" href="<?php echo $sys_link?>/inventory/store/index.php">
			                             <span class="menu-bullet">
			                                 <span class="bullet bullet-dot"></span>
			                             </span>
			                             <span class="menu-title">Store List</span>
			                         </a>
			                     </div>
			                 </div>
			             </div>
			             <!-- store end -->
			             <!-- chain start -->
			             <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
			                 <span class="menu-link">
			                     <span class="menu-icon">
			                         <span class="svg-icon svg-icon-5">
			                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
			                                 fill="none">
			                                 <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
			                                 <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
			                                     fill="black" />
			                             </svg>
			                         </span>
			                     </span>
			                     <span class="menu-title">Chain</span>
			                     <span class="menu-arrow"></span>
			                 </span>
			                 <div class="menu-sub menu-sub-accordion menu-active-bg">
			                     <div class="menu-item">
			                         <a class="menu-link" href="<?php echo $sys_link?>/inventory/chain/index.php">
			                             <span class="menu-bullet">
			                                 <span class="bullet bullet-dot"></span>
			                             </span>
			                             <span class="menu-title">Chain List</span>
			                         </a>
			                     </div>
			                 </div>
			             </div>
			             <!-- chain end -->
			             <?php }?>
			             <?php }?>
			         </div>
			     </div>
			 </div>
			 <div class="aside-footer flex-column-auto pb-5" id="kt_aside_footer">
			     <div class="aside-user">
			         <div class="aside-user d-flex align-items-sm-center justify-content-center py-5">
			             <div class="me-5">
			                 <div class="symbol symbol-40px cursor-pointer"
			                     data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"
			                     data-kt-menu-overflow="true">
			                     <?php 
										if($u_pic != ""){
											?>
			                     <img src="<?php echo $sys_link?>/data/user_img/<?php echo $u_pic?>" alt="user-image">
			                     <?php
										}else{
											?>
			                     <img src="<?php echo $sys_link ?>/data/favicon.ico" alt="user-image">
			                     <?php 
											}
											?>
			                 </div>
			                 <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
			                     data-kt-menu="true">
			                     <div class="menu-item px-3">
			                         <div class="menu-content d-flex align-items-center px-3">
			                             <div class="symbol symbol-50px me-5">
			                                 <?php 
													if($u_pic != ""){
													?>
			                                 <img src="<?php echo $sys_link?>/data/user_img/<?php echo $u_pic?>"
			                                     alt="user-image">
			                                 <?php
													}else{
													?>
			                                 <img src="<?php echo $sys_link ?>/data/favicon.ico" alt="user-image">
			                                 <?php 
													}
													?>

			                             </div>
			                             <div class="d-flex flex-column">
			                                 <div class="fw-bolder d-flex align-items-center fs-5">
			                                     <td><?php echo $f_name ?> <?php echo $l_name?></td>
			                                     <span class="badge badge-light-primary fw-bolder fs-8 px-2 py-1 ms-2">
			                                         <td><?php echo $_SESSION["u_type"]?></td>
			                                     </span>
			                                 </div>
			                                 <a href="#" class="fw-bold text-muted text-hover-primary fs-7">
			                                     <td><?php echo $email_id?></td>

			                                 </a>
			                             </div>
			                         </div>
			                     </div>
			                     <div class="separator my-2"></div>
			                     <div class="menu-item px-5">
			                         <a href="<?php echo $sys_link ?>/profile.php" class="menu-link px-5">My Profile</a>
			                     </div>
			                     <div class="menu-item px-5 my-1">
			                         <a href="javascript:void(0);" onclick="modal_show()"
			                             data-href="<?php echo $sys_link?>/cores/forms/change_pass.php"
			                             class=" openPopup menu-link px-5" data-name="Change Password"
			                             title="Change Password">Change Password</a>
			                     </div>
			                     <div class="menu-item px-5">
			                         <a href="<?php echo $sys_link ?>/signout.php" class="menu-link px-5">Sign Out</a>
			                     </div>

			                 </div>
			             </div>
			             <div class="flex-row-fluid flex-wrap">
			                 <div class="d-flex align-items-center flex-stack">
			                     <div class="me-2">
			                         <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold lh-0"><?php echo $f_name?>
			                             <?php echo $l_name?></a>
			                         <span class="text-gray-400 fw-bold d-block fs-8"><?php echo $u_type?></span>
			                     </div>
			                     <a href="<?php echo $sys_link ?>/signout.php"
			                         class="btn btn-icon btn-active-color-primary me-n4" data-bs-toggle="tooltip"
			                         title="End session and singout">
			                         <span class="svg-icon svg-icon-2 svg-icon-gray-400">
			                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
			                                 fill="none">
			                                 <rect opacity="0.3" width="12" height="2" rx="1"
			                                     transform="matrix(-1 0 0 1 15.5 11)" fill="black" />
			                                 <path
			                                     d="M13.6313 11.6927L11.8756 10.2297C11.4054 9.83785 11.3732 9.12683 11.806 8.69401C12.1957 8.3043 12.8216 8.28591 13.2336 8.65206L16.1592 11.2526C16.6067 11.6504 16.6067 12.3496 16.1592 12.7474L13.2336 15.3479C12.8216 15.7141 12.1957 15.6957 11.806 15.306C11.3732 14.8732 11.4054 14.1621 11.8756 13.7703L13.6313 12.3073C13.8232 12.1474 13.8232 11.8526 13.6313 11.6927Z"
			                                     fill="black" />
			                                 <path
			                                     d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z"
			                                     fill="#C4C4C4" />
			                             </svg>
			                         </span>
			                     </a>
			                 </div>
			             </div>
			         </div>
			     </div>
			 </div>