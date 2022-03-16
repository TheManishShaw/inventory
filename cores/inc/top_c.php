
							<!--begin::Header-->
							<div id="kt_header"  class="header align-items-stretch">
						<div class="header-brand">
							<a class="w-100 text-center" href="<?php echo $sys_link ?>">
								<?php if($uset_pic != ''){
								?>
									<img alt="Logo" src="<?php echo $sys_link?>/data/store_img/<?php echo $uset_pic ?>" class="h-40px" />
								<?php
								} else {?>
								<img alt="Logo" src="<?php echo $sys_link?>/<?php echo $sys_dark_logo ?>" class="h-35px" />
								<?php } ?>
							</a>
							<div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
								<div class="btn btn-icon btn-active-color-primary w-30px h-30px" id="kt_aside_mobile_toggle">
									<span class="svg-icon svg-icon-1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
											<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
										</svg>
									</span>
								</div>
							</div>
						</div>
						<div class="toolbar">
							<div class="container-fluid py-6 py-lg-0 d-flex flex-column flex-sm-row align-items-lg-stretch justify-content-sm-between">
							
								<div class="page-title d-flex flex-column me-5">
									<h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0"></h1>
								</div>
								<div class="d-flex align-items-center overflow-auto pt-3 pt-sm-0">
									
									<div class="d-flex">
									
										<div class="d-flex align-items-center me-4">
											<a href="<?php echo $sys_link ?>/inventory/pos/index.php" id="kt_drawer_chat_toggle" class="btn btn-primary btn-active-light" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
												
											POS</a>
										</div>										
									</div>
								</div>
							</div>
						</div>
					</div>
