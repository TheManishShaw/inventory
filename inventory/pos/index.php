<?php include '../../cores/inc/config_c.php'; ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>POS – <?php echo $sys_title; ?></title>
      <?php include '../../cores/inc/header_c.php'; ?>
   </head>
   <!--end::Head-->
   <!--begin::Body-->
   <body id="kt_body" class="aside-enabled" style="overflow-x: hidden; margin-left:10px">
      <!--begin::Main-->
      <!--begin::Root-->
      <div class="d-flex flex-column flex-root"  >
      <div class="row border ">
      <div class=" mt-2">
         <div class=" float-start d-flex justify-content-start">
         
         </div>
      <div class=" float-end d-flex justify-content-end">
     

         
         <a href="#" class="btn btn-primary" style="margin-left:10px">All </a>
         <a href="#" class="btn btn-primary " style=" margin-left:10px">Category</a>	
         <a href="#" class="btn btn-primary" style="margin-left:10px">Brand</a>	
         <a href="#" class="btn btn-danger" style="margin-left:10px">Reset</a>   
         <a class="btn" onclick="fullscreen();">   <i class="fas fa-expand fs-2x"></i></a>
         <div class="d-lg-block d-none" style="margin-top:6px;margin-left:0px;margin-right:10px;font-size:20px;position: auto;font-weight:400px;" id="time">
             <span id="hours">00</span>        
         </div>
   	</div>
      <div class="d-flex justify-content-center">
      
      
    
     
    </div>         
     
</div>
            </div>
         <!--begin::Page-->
         <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            <!--end::Aside-->
            <!--begin::Wrapper-->
            
            <div class=" flex-row-fluid mt-2" id="">
               <div class="content d-flex flex-column flex-column-fluid" id="">
                  <!--begin::Container-->
                  <div class="row" style="margin-left: 0px;margin-right:0px;">
                     <!--begin::Col-->
                     <div class="col-xl-5 col-md-5" style="overflow:hidden">
                        <div class="d-flex align-items-center flex-stack"style="margin-bottom:20px;">
                           <!--begin::Select-->
                           <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option">
                              <option></option>
                              <option value="1">Option 1</option>
                              <option value="2">Option 2</option>
                          </select>
                           <!--end::Select-->
                           <a href="javascript:void(0);" onclick="modal_show()" data-href="modal/submit.php" data-name="Add Users" class="openPopup btn btn-icon border-0 btn-custom flex-shrink-0" data-bs-toggle="modal" data-bs-toggle="tooltip" title="Add User">
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
                        <di v class="border" id="kt_chat_messenger " style="border-radius:10px;" >
                           <div class="" id="kt_chat_messenger_body h-200px" >
                              <div style="height:500px;" class="scroll-y " data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_chat_messenger_body" data-kt-scroll-offset="-2px">
                                 <!--begin::Card-->
                                 
                                 <table class="table table-row-bordered" >
                                    <thead class="" >
                                       <tr class="fw-bold fs-4 bg-secondary  text-white border-bottom border-gray-200 " >
                                          <th>Product</th>
                                          <th>Price</th>
                                          <th>Quantity</th>
                                          <th>Subtotal</th>
                                          <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          
                                       </tr>
                                      <tr>

                                          <td>Tiger Nixon</td>
                                          <td>34343t</td>
                                          <td>
                                             <!--begin::Dialer-->
                                             <div class="position-relative w-md-100px" data-kt-dialer="true" data-kt-dialer-min="1" data-kt-dialer-max="50000" data-kt-dialer-step="1" data-kt-dialer-prefix="" data-kt-dialer-decimals="0">
                                                <!--begin::Decrease control-->
                                                <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0" data-kt-dialer-control="decrease">
                                                   <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                                   <span class="svg-icon svg-icon-1">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                         <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                                         <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                                      </svg>
                                                   </span>
                                                   <!--end::Svg Icon-->
                                                </button>
                                                <!--end::Decrease control-->
                                                <!--begin::Input control-->
                                                <input type="text" class="form-control form-control-solid border-0 ps-12" data-kt-dialer-control="input" placeholder="Amount" name="manageBudget" value="36" />
                                                <!--end::Input control-->
                                                <!--begin::Increase control-->
                                                <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0" data-kt-dialer-control="increase">
                                                   <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                                   <span class="svg-icon svg-icon-1">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                         <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                                         <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                                         <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                                      </svg>
                                                   </span>
                                                   <!--end::Svg Icon-->
                                                </button>
                                                <!--end::Increase control-->
                                             </div>
                                          </td>
                                          <td>$320,800</td>
                                          <td>
                                          <a href="javascript:void(0);" onclick="modal_show()" data-href="modal/edit.php" data-name="Edit Product" class="openPopup btn btn-icon border-0 btn-custom flex-shrink-0 btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-toggle="tooltip" title="Edit Product">
                                          <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit">
                                          <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen055.svg-->
                                                <span class="svg-icon svg-icon-3 svg-icon-light-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="black"/>
                                                <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="black"/>
                                                <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="black"/>
                                                </svg></span>
                                                <!--end::Svg Icon-->
                                             </a>
                                             <button class="btn btn-icon btn-active-light-danger w-30px h-30px" data-kt-permissions-table-filter="delete_row" data-bs-toggle="tooltip" title="Delete Item">
                                                <span class="svg-icon svg-icon-3 svg-icon-danger">
                                                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                      <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                                      <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                                      <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                                   </svg>
                                                </span>
                                             </button>
                                          </td>
                                        </tr>                                  
                                        <tr>
                                          <td>Tiger Nixon</td>
                                          <td>34343t</td>
                                          <td>
                                             <!--begin::Dialer-->
                                             <div class="position-relative w-md-100px" data-kt-dialer="true" data-kt-dialer-min="1" data-kt-dialer-max="50000" data-kt-dialer-step="1" data-kt-dialer-prefix="" data-kt-dialer-decimals="0">
                                                <!--begin::Decrease control-->
                                                <a type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0" data-kt-dialer-control="decrease">
                                                   <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                                   <span class="svg-icon svg-icon-1">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                         <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                                         <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                                      </svg>
                                                   </span>
                                                   <!--end::Svg Icon-->
                                                </a>
                                                <!--end::Decrease control-->
                                                <!--begin::Input control-->
                                                <input type="text" class="form-control form-control-solid border-0 ps-12" data-kt-dialer-control="input" placeholder="Amount" name="manageBudget"  value="36" />
                                                <!--end::Input control-->
                                                <!--begin::Increase control-->
                                                <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0" data-kt-dialer-control="increase">
                                                   <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                                   <span class="svg-icon svg-icon-1">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                         <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                                         <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                                         <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                                      </svg>
                                                   </span>
                                                   <!--end::Svg Icon-->
                                                </button>
                                                <!--end::Increase control-->
                                             </div>
                                          </td>
                                          <td>$320,800</td>
                                          <td>
                                             <a href="javascript:void(0);" onclick="modal_show()" data-href="modal/edit.php" data-name="Edit Product" class="openPopup btn btn-icon border-0 btn-custom flex-shrink-0 btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-toggle="tooltip" title="Edit Product">
                                                <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen055.svg-->
                                                <span class="svg-icon svg-icon-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="black"/>
                                                <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="black"/>
                                                <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="black"/>
                                                </svg></span>
                                                <!--end::Svg Icon-->
                                             </a>
                                             <button class="btn btn-icon btn-active-light-danger w-30px h-30px" data-kt-permissions-table-filter="delete_row" data-bs-toggle="tooltip" title="Delete Item">
                                                <span class="svg-icon svg-icon-3">
                                                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                      <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                                      <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                                      <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                                   </svg>
                                                </span>
                                             </button>
                                          </td>
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
                                 <button class="btn btn-danger" type="button" data-kt-element="send"  data-bs-toggle="tooltip" title="Cancel Order"> <i class="f fa-xmark"></i> Cancel</button>
                                  
                                   
                                 </div>
                                 <!--end::Actions-->
                                 <!--begin::Send-->
                                
                                 <button class="btn btn-primary" type="button" data-kt-element="send"> <i class="fa fa-receipt"></i> Bill Now</button>
                                 <!--end::Send-->
                              </div>
                              <!--end::Toolbar-->
                           </div>
                           <!--end::Card footer-->
                        </di>
                     </div>
                     <!--begin::Col-->
                    
                     <div class="col-xl-7 col-md-7">
                    <!-- Progress enabled state -->

                        <div class="header-search me-4 mb-3">
										<!--begin::Menu- wrapper-->
										<!--begin::Search-->
										<div id="kt_header_search" width="100%" class="d-flex align-items-center" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-menu-trigger="auto" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
											<!--begin::Form-->
											<form data-kt-search-element="form" class="w-100 position-relative" autocomplete="off">								
												<input type="hidden" />										
												<span class="svg-icon svg-icon-3 search-icon position-absolute top-50 translate-middle-y ms-4">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path d="M21.7 18.9L18.6 15.8C17.9 16.9 16.9 17.9 15.8 18.6L18.9 21.7C19.3 22.1 19.9 22.1 20.3 21.7L21.7 20.3C22.1 19.9 22.1 19.3 21.7 18.9Z" fill="black" />
														<path opacity="0.3" d="M11 20C6 20 2 16 2 11C2 6 6 2 11 2C16 2 20 6 20 11C20 16 16 20 11 20ZM11 4C7.1 4 4 7.1 4 11C4 14.9 7.1 18 11 18C14.9 18 18 14.9 18 11C18 7.1 14.9 4 11 4ZM8 11C8 9.3 9.3 8 11 8C11.6 8 12 7.6 12 7C12 6.4 11.6 6 11 6C8.2 6 6 8.2 6 11C6 11.6 6.4 12 7 12C7.6 12 8 11.6 8 11Z" fill="black" />
													</svg>
												</span>											
												<input type="text" class="form-control bg-transparent ps-12" name="search" value="" placeholder="Search" data-kt-search-element="input" />									
											</form>											
										</div>									
									</div>
                        <div class="page-title d-flex flex-column me-5 mb-2">								
									<h1 class="d-flex flex-column text-dark fw-bold fs-5 mb-0">Category</h1>								
								</div>
                       
                        <div class="row d-flex flex-nowrap hover-scroll-x h-90px">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-6 mb-2">
                           <div class="card bg-primary">                                                                        
                              <div class="card-body  p-3 d-block">
                                 <img class="float-end" src="../../assets/media/avatars/150-6.jpg" width="30px" alt="">
                                 <h4 class="text-white">Testing <span class="badge badge-square badge-white">5</span> </h4>
                                 <p class="text-white">Cake</p>                                        
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-6 mb-2">
                           <div class="card bg-warning">                                                                        
                              <div class="card-body  p-3 d-block">
                                 <img class="float-end" src="../../assets/media/avatars/150-6.jpg" width="30px" alt="">
                                 <h4 class="text-white">Testing <span class="badge badge-square badge-white">5</span> </h4>
                                 <p class="text-white"> Cake</p>                                        
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-6 mb-2">
                           <div class="card bg-success">                                                                        
                              <div class="card-body  p-3 d-block">
                                 <img class="float-end" src="../../assets/media/avatars/150-6.jpg" width="30px" alt="">
                                 <h4 class="text-white">Testing <span class="badge badge-square badge-white">5</span> </h4>
                                 <p class="text-white">Cake</p>                                        
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-6 mb-2">
                           <div class="card bg-primary">                                                                        
                              <div class="card-body  p-3 d-block">
                                 <img class="float-end" src="../../assets/media/avatars/150-6.jpg" width="30px" alt="">
                                 <h4 class="text-white">Testing <span class="badge badge-square badge-white">5</span> </h4>
                                 <p class="text-white">Cake</p>                                        
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-6 mb-2">
                           <div class="card bg-warning">                                                                        
                              <div class="card-body  p-3 d-block">
                                 <img class="float-end" src="../../assets/media/avatars/150-6.jpg" width="30px" alt="">
                                 <h4 class="text-white">Testing <span class="badge badge-square badge-white">5</span> </h4>
                                 <p class="text-white">Cake</p>                                        
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-6 mb-2">
                           <div class="card bg-success">                                                                        
                              <div class="card-body  p-3 d-block">
                                 <img class="float-end" src="../../assets/media/avatars/150-6.jpg" width="30px" alt="">
                                 <h4 class="text-white">Testing <span class="badge badge-square badge-white">5</span> </h4>
                                 <p class="text-white" >Cake</p>                                        
                              </div>
                           </div>
                        </div>
                        </div>
                       
                        
                        <div class="page-title d-flex flex-column me-5 mb-2">								
									<h1 class="d-flex flex-column text-dark fw-bold fs-5 mb-0">All Products</h1>									
									<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-4 pt-1">								
										<li class="breadcrumb-item">
                              <a href="#" class="badge badge-light mb-1">All <span class="badge badge-circle badge-secondary" style="padding:2px!important;">42</span></a>									
										</li>
										<li class="breadcrumb-item">
                                 <a href="#" class="badge badge-light mb-1">Cake <span class="badge badge-circle badge-secondary" style="padding:2px!important;">5</span></a>                              
										</li>	
                              <li class="breadcrumb-item">
                              <a href="#" class="badge badge-light mb-1">All <span class="badge badge-circle badge-secondary" style="padding:2px!important;">42</span></a>									
										</li>
										
									</ul>									
								</div>
                        <div class="">
                           <div >
                              <div class="row scroll-y h-500px">
                               
                                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 mb-1">
                                    <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                       <div class="ribbon-label bg-danger">
                                          60
                                       </div>
                                       <img class="card-img-top" width="100px" height="120px" src="../../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                       <div class="card-body p-2 ">
                                      <div class=" float-end">
                                          <h6 class="badge badge-primary">Price:900</h6>
                                       </div>
                                          <h6>Testing</h6>
                                          <p>Cake</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 mb-1">
                                    <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                       <div class="ribbon-label bg-danger">
                                          60
                                       </div>
                                       <img class="card-img-top" width="100px" height="120px" src="../../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                       <div class="card-body p-2 ">                                      
                                       <div class=" float-end">                                                                    
                                         <h6 class="badge badge-primary">Price:900</h6>
                                          </div>
                                          <h6>Testing</h6>
                                          <p>Cake</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 mb-1">
                                    <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                       <div class="ribbon-label bg-danger">
                                          60
                                       </div>
                                       <img class="card-img-top" width="100px" height="120px" src="../../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                       <div class="card-body p-2 ">
                                      <div class=" float-end">
                                          <h6 class="badge badge-primary">Price:900</h6>
                                       </div>
                                          <h6>Testing</h6>
                                          <p>Cake</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 mb-1">
                                    <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                       <div class="ribbon-label bg-danger">
                                          60
                                       </div>
                                       <img class="card-img-top" width="100px" height="120px" src="../../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                       <div class="card-body p-2 ">                                      
                                       <div class=" float-end">                                                                    
                                         <h6 class="badge badge-primary">Price:900</h6>
                                          </div>
                                          <h6>Testing</h6>
                                          <p>Cake</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 mb-1">
                                    <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                       <div class="ribbon-label bg-danger">
                                          60
                                       </div>
                                       <img class="card-img-top" width="100px" height="120px" src="../../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                       <div class="card-body p-2 ">
                                      <div class=" float-end">
                                          <h6 class="badge badge-primary">Price:900</h6>
                                       </div>
                                          <h6>Testing</h6>
                                          <p>Cake</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 mb-1">
                                    <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                       <div class="ribbon-label bg-danger">
                                          60
                                       </div>
                                       <img class="card-img-top" width="100px" height="120px" src="../../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                       <div class="card-body p-2 ">                                      
                                       <div class=" float-end">                                                                    
                                         <h6 class="badge badge-primary">Price:900</h6>
                                          </div>
                                          <h6>Testing</h6>
                                          <p>Cake</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 mb-1">
                                    <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                       <div class="ribbon-label bg-danger">
                                          60
                                       </div>
                                       <img class="card-img-top" width="100px" height="120px" src="../../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                       <div class="card-body p-2 ">
                                      <div class=" float-end">
                                          <h6 class="badge badge-primary">Price:900</h6>
                                       </div>
                                          <h6>Testing</h6>
                                          <p>Cake</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 mb-1">
                                    <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                       <div class="ribbon-label bg-danger">
                                          60
                                       </div>
                                       <img class="card-img-top" width="100px" height="120px" src="../../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                       <div class="card-body p-2 ">                                      
                                       <div class=" float-end">                                                                    
                                         <h6 class="badge badge-primary">Price:900</h6>
                                          </div>
                                          <h6>Testing</h6>
                                          <p>Cake</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 mb-1">
                                    <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                       <div class="ribbon-label bg-danger">
                                          60
                                       </div>
                                       <img class="card-img-top" width="100px" height="120px" src="../../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                       <div class="card-body p-2 ">
                                      <div class=" float-end">
                                          <h6 class="badge badge-primary">Price:900</h6>
                                       </div>
                                          <h6>Testing</h6>
                                          <p>Cake</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 mb-1">
                                    <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                       <div class="ribbon-label bg-danger">
                                          60
                                       </div>
                                       <img class="card-img-top" width="100px" height="120px" src="../../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                       <div class="card-body p-2 ">                                      
                                       <div class=" float-end">                                                                    
                                         <h6 class="badge badge-primary">Price:900</h6>
                                          </div>
                                          <h6>Testing</h6>
                                          <p>Cake</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 mb-1">
                                    <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                       <div class="ribbon-label bg-danger">
                                          60
                                       </div>
                                       <img class="card-img-top" width="100px" height="120px" src="../../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                       <div class="card-body p-2 ">
                                      <div class=" float-end">
                                          <h6 class="badge badge-primary">Price:900</h6>
                                       </div>
                                          <h6>Testing</h6>
                                          <p>Cake</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 mb-1">
                                    <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                       <div class="ribbon-label bg-danger">
                                          60
                                       </div>
                                       <img class="card-img-top" width="100px" height="120px" src="../../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                       <div class="card-body p-2 ">                                      
                                       <div class=" float-end">                                                                    
                                         <h6 class="badge badge-primary">Price:900</h6>
                                          </div>
                                          <h6>Testing</h6>
                                          <p>Cake</p>
                                       </div>
                                    </div>
                                 </div> 
                                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 mb-1">
                                    <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                       <div class="ribbon-label bg-danger">
                                          60
                                       </div>
                                       <img class="card-img-top" width="100px" height="120px" src="../../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                       <div class="card-body p-2 ">
                                      <div class=" float-end">
                                          <h6 class="badge badge-primary">Price:900</h6>
                                       </div>
                                          <h6>Testing</h6>
                                          <p>Cake</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 mb-1">
                                    <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                       <div class="ribbon-label bg-danger">
                                          60
                                       </div>
                                       <img class="card-img-top" width="100px" height="120px" src="../../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                       <div class="card-body p-2 ">                                      
                                       <div class=" float-end">                                                                    
                                         <h6 class="badge badge-primary">Price:900</h6>
                                          </div>
                                          <h6>Testing</h6>
                                          <p>Cake</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 mb-1">
                                    <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                       <div class="ribbon-label bg-danger">
                                          60
                                       </div>
                                       <img class="card-img-top" width="100px" height="120px" src="../../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                       <div class="card-body p-2 ">
                                      <div class=" float-end">
                                          <h6 class="badge badge-primary">Price:900</h6>
                                       </div>
                                          <h6>Testing</h6>
                                          <p>Cake</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 mb-1">
                                    <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                       <div class="ribbon-label bg-danger">
                                          60
                                       </div>
                                       <img class="card-img-top" width="100px" height="120px" src="../../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                       <div class="card-body p-2 ">                                      
                                       <div class=" float-end">                                                                    
                                         <h6 class="badge badge-primary">Price:900</h6>
                                          </div>
                                          <h6>Testing</h6>
                                          <p>Cake</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 mb-1">
                                    <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                       <div class="ribbon-label bg-danger">
                                          60
                                       </div>
                                       <img class="card-img-top" width="100px" height="120px" src="../../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                       <div class="card-body p-2 ">
                                      <div class=" float-end">
                                          <h6 class="badge badge-primary">Price:900</h6>
                                       </div>
                                          <h6>Testing</h6>
                                          <p>Cake</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 mb-1">
                                    <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                       <div class="ribbon-label bg-danger">
                                          60
                                       </div>
                                       <img class="card-img-top" width="100px" height="120px" src="../../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                       <div class="card-body p-2 ">                                      
                                       <div class=" float-end">                                                                    
                                         <h6 class="badge badge-primary">Price:900</h6>
                                          </div>
                                          <h6>Testing</h6>
                                          <p>Cake</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 mb-1">
                                    <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                       <div class="ribbon-label bg-danger">
                                          60
                                       </div>
                                       <img class="card-img-top" width="100px" height="120px" src="../../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                       <div class="card-body p-2 ">                                      
                                       <div class=" float-end"> 
                                           <h6 class="badge badge-primary">Price:900</h6>
                                       </div>
                                          <h6>Testing</h6>
                                          <p>Cake</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 mb-1">
                                    <div class="card card-bordered ribbon ribbon-top ribbon-vertical">
                                       <div class="ribbon-label bg-danger">
                                          60
                                       </div>
                                       <img class="card-img-top" width="100px" height="120px" src="../../assets/media/avatars/150-6.jpg" alt="Card image cap">                                              
                                       <div class="card-body p-2 ">                                      
                                       <div class=" float-end"> 
                                           <h6 class="badge badge-primary">Price:900</h6>
                                       </div>
                                          <h6>Testing</h6>
                                          <p>Cake</p>
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

   </body>
   <?php include '../../cores/inc/footer_c.php'; ?>
   <!--end::Body-->
</html>