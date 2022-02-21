<?php
   include "cores/inc/config_c.php";
   include "cores/inc/functions_c.php";
   include "cores/inc/auth_c.php";
   include "cores/inc/var_c.php";
   $db_handle = new DBController();
   $query = "SELECT * FROM `_tblunits`";
   $faq = $db_handle->runQuery($query);
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
               <div class="card card-flush  flex-row-fluid p-6 ">
												<!--begin::Card header-->
												<div class="card-header">
													<div class="card-title">
														<h2>Order #14534</h2>
													</div>
												</div>
												<!--end::Card header-->
												<!--begin::Card body-->
												<div class="card-body pt-0">
													<div class="table-responsive">
														<!--begin::Table-->
														<table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
															<!--begin::Table head-->
															<thead>
																<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
																	<th class="min-w-175px">Product</th>
																	<th class="min-w-100px text-end">SKU</th>
																	<th class="min-w-70px text-end">Qty</th>
																	<th class="min-w-100px text-end">Unit Price</th>
                                                   <th class="min-w-100px text-end">Unit Price</th>
                                                   <th class="min-w-100px text-end">Unit Price</th>
																	<th class="min-w-100px text-end">Total</th>
																</tr>
															</thead>
															<!--end::Table head-->
															<!--begin::Table body-->
															<tbody class="fw-bold text-gray-600">
																<!--begin::Products-->
																<tr>
																	<!--begin::Product-->
																	<td>
																		<div class="d-flex align-items-center">
																			<!--begin::Thumbnail-->
																			<a href="/good/dark/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
																				<span class="symbol-label" style="background-image:url(/good/assets/media//stock/ecommerce/1.gif);"></span>
																			</a>
																			<!--end::Thumbnail-->
																			<!--begin::Title-->
																			<div class="ms-5">
																				<a href="/good/dark/apps/ecommerce/catalog/edit-product.html" class="fw-bolder text-gray-600 text-hover-primary">Product 1</a>
																				<div class="fs-7 text-muted">Delivery Date: 19/02/2022</div>
																			</div>
																			<!--end::Title-->
																		</div>
																	</td>
																	<!--end::Product-->
																	<!--begin::SKU-->
																	<td class="text-end">04813007</td>
                                                   <td class="text-end">04813007</td>
                                                   <td class="text-end">04813007</td>
																	<!--end::SKU-->
																	<!--begin::Quantity-->
																	<td class="text-end">2</td>
																	<!--end::Quantity-->
																	<!--begin::Price-->
																	<td class="text-end">$120.00</td>
																	<!--end::Price-->
																	<!--begin::Total-->
																	<td class="text-end">$240.00</td>
																	<!--end::Total-->
																</tr>
																<tr>
																	<!--begin::Product-->
																	<td>
																		<div class="d-flex align-items-center">
																			<!--begin::Thumbnail-->
																			<a href="/good/dark/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
																				<span class="symbol-label" style="background-image:url(/good/assets/media//stock/ecommerce/100.gif);"></span>
																			</a>
																			<!--end::Thumbnail-->
																			<!--begin::Title-->
																			<div class="ms-5">
																				<a href="/good/dark/apps/ecommerce/catalog/edit-product.html" class="fw-bolder text-gray-600 text-hover-primary">Footwear</a>
																				<div class="fs-7 text-muted">Delivery Date: 19/02/2022</div>
																			</div>
																			<!--end::Title-->
																		</div>
																	</td>
																	<!--end::Product-->
																	<!--begin::SKU-->
																	<td class="text-end">02560001</td>
																	<!--end::SKU-->
																	<!--begin::Quantity-->
																	<td class="text-end">1</td>
																	<!--end::Quantity-->
																	<!--begin::Price-->
																	<td class="text-end">$24.00</td>
																	<!--end::Price-->
																	<!--begin::Total-->
																	<td class="text-end">$24.00</td>
																	<!--end::Total-->
																</tr>
																<!--end::Products-->
																<!--begin::Subtotal-->
																<tr>
																	<td colspan="6" class="text-end">Subtotal</td>
																	<td class="text-end">$264.00</td>
																</tr>
																<!--end::Subtotal-->
																<!--begin::VAT-->
																<tr>
																	<td colspan="6" class="text-end">VAT (0%)</td>
																	<td class="text-end">$0.00</td>
																</tr>
																<!--end::VAT-->
																<!--begin::Shipping-->
																<tr>
																	<td colspan="6" class="text-end">Shipping Rate</td>
																	<td class="text-end">$5.00</td>
																</tr>
																<!--end::Shipping-->
																<!--begin::Grand total-->
																<tr>
																	<td colspan="6" class="fs-3 text-dark text-end">Grand Total</td>
																	<td class="text-dark fs-3 fw-boldest text-end">$269.00</td>
																</tr>
																<!--end::Grand total-->
															</tbody>
															<!--end::Table head-->
														</table>
														<!--end::Table-->
													</div>
												</div>
												<!--end::Card body-->
											</div>
																	
					</div>
					</div>
					<?php include "cores/inc/copy_c.php" ?>
				</div>
			</div>
		</div>		
	</body>
	<?php include "cores/inc/footer_c.php" ?>
</html>