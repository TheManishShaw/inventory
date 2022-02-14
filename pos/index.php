<?php  include "../cores/inc/config_c.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
		<title>POS – <?php echo $sys_title ?></title>
		
        <?php include "../cores/inc/header_c.php" ?>
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
				
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class=" flex-row-fluid" id="">
					<!--begin::Header-->
                    <div id="kt_header"  class="header align-items-stretch">
						<!--begin::Brand-->
						
						<!--end::Brand-->
						<div class="toolbar">
							<!--begin::Toolbar-->
							<div class="container-fluid py-6 py-lg-0 d-flex flex-column flex-sm-row align-items-lg-stretch justify-content-sm-between">
								<!--begin::Page title-->
								<div class="page-title d-flex flex-column me-5">
									<!--begin::Title-->
									<h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">Dashboard</h1>
									<!--end::Title-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 pt-1">
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">
											<a href="index.php" class="text-muted text-hover-primary">Home</a>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-200 w-5px h-2px"></span>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-dark">Dashboard</li>
										<!--end::Item-->
									</ul>
									<!--end::Breadcrumb-->
								</div>
								<!--end::Page title-->
								<!--begin::Action group-->
								<div class="d-flex align-items-center overflow-auto pt-3 pt-sm-0">
									<div class="d-flex">
										<!--begin::Notifications-->
										<div class="d-flex align-items-center me-4">
										
											<a href="#" class="btn btn-icon btn-active-light btn-outline btn-outline-default btn-icon-gray-700 btn-active-icon-primary" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
												
												<span class="svg-icon svg-icon-1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect x="8" y="9" width="3" height="10" rx="1.5" fill="black" />
														<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black" />
														<rect x="18" y="11" width="3" height="8" rx="1.5" fill="black" />
														<rect x="3" y="13" width="3" height="6" rx="1.5" fill="black" />
													</svg>
												</span>
											
											</a>
											
										</div>
										
									</div>
									<!--end::Actions-->
								</div>
								<!--end::Action group-->
							</div>
							<!--end::Toolbar-->
						</div>
					</div>
					<!--end::Header-->
			
                    <div class="content d-flex flex-column flex-column-fluid" id="" style="overflow: hidden;">
						<!--begin::Container-->
                        
                        <div class="row" style="margin-left: 0px;margin-right:0px;">							
							
                                <!--begin::Col-->
								<div class="col-xl-6"> 
                                <div class="d-flex align-items-center flex-stack"style="margin-bottom:20px;">
                                                <!--begin::Select-->
                                                <div class="row">
                                                    <div class="col-lg-12" style="width:650px!important;" >
                                                <select name="currnecy" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select a currency.." class="form-select form-select-solid form-select-lg" >
																<option value="">Select a currency..</option>
																<option data-kt-flag="flags/united-states.svg" value="USD">
																<b>USD</b>&#160;-&#160;USA dollar</option>
																<option data-kt-flag="flags/united-kingdom.svg" value="GBP">
																<b>GBP</b>&#160;-&#160;British pound</option>
																<option data-kt-flag="flags/australia.svg" value="AUD">
																<b>AUD</b>&#160;-&#160;Australian dollar</option>
																<option data-kt-flag="flags/japan.svg" value="JPY">
																<b>JPY</b>&#160;-&#160;Japanese yen</option>
																<option data-kt-flag="flags/sweden.svg" value="SEK">
																<b>SEK</b>&#160;-&#160;Swedish krona</option>
																<option data-kt-flag="flags/canada.svg" value="CAD">
																<b>CAD</b>&#160;-&#160;Canadian dollar</option>
																<option data-kt-flag="flags/switzerland.svg" value="CHF">
																<b>CHF</b>&#160;-&#160;Swiss franc</option>
															</select>
                                                </div>
                                                </div>
                                                <!--end::Select-->
                                                <a href="#" class="btn btn-icon border-0 btn-custom flex-shrink-0" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                    <span class="svg-icon svg-icon-2hx">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
                                                            <rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                            </div>                                
                                <div class="card" id="kt_chat_messenger ">
									
										<div class="card-body" id="kt_chat_messenger_body h-200px">
                                       
											<div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_chat_messenger_body" data-kt-scroll-offset="-2px">
                                            
                                          <!--begin::Card-->
                                          <table class="table">
                                            <thead>
                                                <tr class="fw-bolder fs-6 text-gray-800">
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Age</th>
                                                    <th>Start date</th>
                                                    <th>Salary</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                </tr>
                                                <tr>
                                                    <td>Garrett Winters</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                    <td>63</td>
                                                    <td>2011/07/25</td>
                                                    <td>$170,750</td>
                                                </tr>
                                            </tbody>
                                        </table>

											</div>
											<!--end::Messages-->
										</div>
										<!--end::Card body-->
										<!--begin::Card footer-->
										<div class="card-footer pt-4" id="kt_chat_messenger_footer">
											
											<div class="d-flex flex-stack">
												<!--begin::Actions-->
												<div class="d-flex align-items-center me-2">
													<button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-bs-toggle="tooltip" title="Coming soon">
														<i class="bi bi-paperclip fs-3"></i>
													</button>
													<button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-bs-toggle="tooltip" title="Coming soon">
														<i class="bi bi-upload fs-3"></i>
													</button>
												</div>
												<!--end::Actions-->
												<!--begin::Send-->
												<button class="btn btn-primary" type="button" data-kt-element="send">Send</button>
												<!--end::Send-->
											</div>
											<!--end::Toolbar-->
										</div>
										<!--end::Card footer-->
									</div>
								</div>
                                	<!--begin::Col-->
								<div class="col-xl-6 mb-3">
                                <div class="d-flex"style="margin-bottom:20px;">
                                                <!--begin::Select-->
                                                <div class="row">
                                                    <div class="col-lg-12" style="" >
                                                <select name="currnecy" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select a currency.." class="form-select form-select-solid form-select-lg" >
																<option value="">Select a currency..</option>
																<option data-kt-flag="flags/united-states.svg" value="USD">
																<b>USD</b>&#160;-&#160;USA dollar</option>
																<option data-kt-flag="flags/united-kingdom.svg" value="GBP">
																<b>GBP</b>&#160;-&#160;British pound</option>
																<option data-kt-flag="flags/australia.svg" value="AUD">
																<b>AUD</b>&#160;-&#160;Australian dollar</option>
																<option data-kt-flag="flags/japan.svg" value="JPY">
																<b>JPY</b>&#160;-&#160;Japanese yen</option>
																<option data-kt-flag="flags/sweden.svg" value="SEK">
																<b>SEK</b>&#160;-&#160;Swedish krona</option>
																<option data-kt-flag="flags/canada.svg" value="CAD">
																<b>CAD</b>&#160;-&#160;Canadian dollar</option>
																<option data-kt-flag="flags/switzerland.svg" value="CHF">
																<b>CHF</b>&#160;-&#160;Swiss franc</option>
															</select>
                                                </div>
                                                </div>
                                                <!--end::Select-->
                                                <a href="#" class="btn btn-icon border-0 btn-custom flex-shrink-0" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                    <span class="svg-icon svg-icon-2hx">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
                                                            <rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                                <button class="btn btn-primary"  data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">Category</button>&nbsp;
                                                <button class="btn btn-warning" type="button" data-kt-element="send">Brand</button>
                                                <button class="btn btn-icon btn-color-gray-300 btn-active-color-primary w-auto px-0" >
													<!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
												
												Category</button>
                        <!--begin::Menu 2-->
												<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px" data-kt-menu="true">
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Quick Actions</div>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu separator-->
													<div class="separator mb-3 opacity-75"></div>
													<!--end::Menu separator-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3">New Ticket</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3">New Customer</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
														<!--begin::Menu item-->
														<a href="#" class="menu-link px-3">
															<span class="menu-title">New Group</span>
															<span class="menu-arrow"></span>
														</a>
														<!--end::Menu item-->
														<!--begin::Menu sub-->
														<div class="menu-sub menu-sub-dropdown w-175px py-4">
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3">Admin Group</a>
															</div>
															<!--end::Menu item-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3">Staff Group</a>
															</div>
															<!--end::Menu item-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3">Member Group</a>
															</div>
															<!--end::Menu item-->
														</div>
														<!--end::Menu sub-->
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3">New Contact</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu separator-->
													<div class="separator mt-3 opacity-75"></div>
													<!--end::Menu separator-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<div class="menu-content px-3 py-3">
															<a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
														</div>
													</div>
													<!--end::Menu item-->
												</div>
												<!--end::Menu 2-->
                                            </div> 
								<div class="card card-flush">
                              
									
										
										
											<div class="scroll-y me-n5 pe-5 h-180px h-lg-auto" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_contacts_header" data-kt-scroll-wrappers="#kt_content, #kt_chat_contacts_body" data-kt-scroll-offset="0px">
											
                                            <div class="row">
                                              <div class="col-lg-4 mb-1">
                                              <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                              <div class="ribbon-label bg-danger">
                                                        60
                                                    </div>
                                              <img class="card-img-top" width="100px" height="150px" src="../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                                <div class="card-body ">
                                                
                                                    <h3>Testing</h3>
                                                  <p>Cake</p> 
                                                  <h6 class="badge badge-primary">Price:900</h6>
                                                </div>
                                            </div>
                                              </div>
                                              <div class="col-lg-4 mb-1">
                                              <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                              <div class="ribbon-label bg-danger">
                                                        60
                                                    </div>
                                              <img class="card-img-top" width="100px" height="150px" src="../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                                <div class="card-body ">
                                                
                                                    <h3>Testing</h3>
                                                  <p>Cake</p> 
                                                  <h6 class="badge badge-primary">Price:900</h6>
                                                </div>
                                            </div>
                                              </div>
                                              <div class="col-lg-4 mb-1">
                                              <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                              <div class="ribbon-label bg-danger">
                                                        60
                                                    </div>
                                              <img class="card-img-top" width="100px" height="150px" src="../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                                <div class="card-body ">
                                                
                                                    <h3>Testing</h3>
                                                  <p>Cake</p> 
                                                  <h6 class="badge badge-primary">Price:900</h6>
                                                </div>
                                            </div>
                                              </div>
                                              <div class="col-lg-4">
                                              <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                              <div class="ribbon-label bg-danger">
                                                        60
                                                    </div>
                                              <img class="card-img-top" width="100px" height="150px" src="../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                                <div class="card-body ">
                                                
                                                    <h3>Testing</h3>
                                                  <p>Cake</p> 
                                                  <h6>Price:900</h6>
                                                </div>
                                            </div>
                                              </div>
                                              <div class="col-lg-4">
                                              <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                              <div class="ribbon-label bg-danger">
                                                        60
                                                    </div>
                                              <img class="card-img-top" width="100px" height="150px" src="../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                                <div class="card-body ">
                                                
                                                    <h3>Testing</h3>
                                                  <p>Cake</p> 
                                                  <h6>Price:900</h6>
                                                </div>
                                            </div>
                                              </div>
                                              <div class="col-lg-4">
                                              <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                              <div class="ribbon-label bg-danger">
                                                        60
                                                    </div>
                                              <img class="card-img-top" width="100px" height="150px" src="../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                                <div class="card-body ">
                                                
                                                    <h3>Testing</h3>
                                                  <p>Cake</p> 
                                                  <h6>Price:900</h6>
                                                </div>
                                            </div>
                                              </div>
                                              <div class="col-lg-4">
                                              <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                              <div class="ribbon-label bg-danger">
                                                        60
                                                    </div>
                                              <img class="card-img-top" width="100px" height="150px" src="../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                                <div class="card-body ">
                                                
                                                    <h3>Testing</h3>
                                                  <p>Cake</p> 
                                                  <h6>Price:900</h6>
                                                </div>
                                            </div>
                                              </div>
                                              <div class="col-lg-4">
                                              <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                              <div class="ribbon-label bg-danger">
                                                        60
                                                    </div>
                                              <img class="card-img-top" width="100px" height="150px" src="../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                                <div class="card-body ">
                                                
                                                    <h3>Testing</h3>
                                                  <p>Cake</p> 
                                                  <h6>Price:900</h6>
                                                </div>
                                            </div>
                                              </div>
                                              <div class="col-lg-4">
                                              <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                              <div class="ribbon-label bg-danger">
                                                        60
                                                    </div>
                                              <img class="card-img-top" width="100px" height="150px" src="../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                                <div class="card-body ">
                                                
                                                    <h3>Testing</h3>
                                                  <p>Cake</p> 
                                                  <h6>Price:900</h6>
                                                </div>
                                            </div>
                                              </div>
                                              <div class="col-lg-4">
                                              <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                              <div class="ribbon-label bg-danger">
                                                        60
                                                    </div>
                                              <img class="card-img-top" width="100px" height="150px" src="../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                                <div class="card-body ">
                                                
                                                    <h3>Testing</h3>
                                                  <p>Cake</p> 
                                                  <h6>Price:900</h6>
                                                </div>
                                            </div>
                                              </div>
                                              <div class="col-lg-4">
                                              <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                              <div class="ribbon-label bg-danger">
                                                        60
                                                    </div>
                                              <img class="card-img-top" width="100px" height="150px" src="../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                                <div class="card-body ">
                                                
                                                    <h3>Testing</h3>
                                                  <p>Cake</p> 
                                                  <h6>Price:900</h6>
                                                </div>
                                            </div>
                                              </div>
                                              <div class="col-lg-4">
                                              <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                              <div class="ribbon-label bg-danger">
                                                        60
                                                    </div>
                                              <img class="card-img-top" width="100px" height="150px" src="../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                                <div class="card-body ">
                                                
                                                    <h3>Testing</h3>
                                                  <p>Cake</p> 
                                                  <h6>Price:900</h6>
                                                </div>
                                            </div>
                                              </div>
                                              <div class="col-lg-4">
                                              <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                              <div class="ribbon-label bg-danger">
                                                        60
                                                    </div>
                                              <img class="card-img-top" width="100px" height="150px" src="../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                                <div class="card-body ">
                                                
                                                    <h3>Testing</h3>
                                                  <p>Cake</p> 
                                                  <h6>Price:900</h6>
                                                </div>
                                            </div>
                                              </div>
                                          </div>	
											
											
												
												
											</div>
											<!--end::List-->
										
									</div>
								</div>
								<!--end::Col-->					
                              </div>					
					    </div>        	
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		
		
		<!--end::Scrolltop-->		
	</body><?php include "../cores/inc/footer_c.php" ?>
	<!--end::Body-->
</html>