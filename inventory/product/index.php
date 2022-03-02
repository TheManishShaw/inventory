<?php  
	include "../../cores/inc/config_c.php";
	include "../../cores/inc/var_c.php";
	include "../../cores/inc/functions_c.php";
	include "../../cores/inc/auth_c.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
		<title>Products - <?php echo $sys_title ?></title>
		
        <?php include "../../cores/inc/header_c.php" ?>
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
					<?php include "../../cores/inc/nav_c.php" ?>
					<!--end::Aside menu-->					
				</div>
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<?php include "../../cores/inc/top_c.php" ?>
					<!--end::Header-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div id="kt_content_container" class="">
							<!--begin::Layout-->
							<div class="">							
								<!--begin::Content-->
								<div class="flex-lg-row-fluid ms-lg-15">
									<!--begin:::Tabs-->
									<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
										<!--begin:::Tab item-->
										<li class="nav-item">
											<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_customer_view_overview_tab">Active Products</a>
										</li>
										<!--end:::Tab item-->
										<!--begin:::Tab item-->
										<li class="nav-item">
											<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_customer_view_overview_events_and_logs_tab">Inactive Products</a>
										</li>							
										
									</ul>
									<!--end:::Tabs-->
									<!--begin:::Tab content-->
									<div class="tab-content" id="myTabContent">
										<!--begin:::Tab pane-->
										<div class="tab-pane fade show active" id="kt_customer_view_overview_tab" role="tabpanel">
											<!--begin::Card-->
											<div class="pt-4 mb-6 mb-xl-9">
												<!--begin::Card header-->
												<div class="card-header border-0">
													<!--begin::Card title-->
													<div class="card-title">
														<h2>Active Products</h2>
													</div>	
													<div class="d-flex flex-stack mb-5">
														<!--begin::Search-->
														<div class="d-flex align-items-center position-relative my-1">
															<input type="text" data-kt-docs-table-filter="search"
																class="form-control form-control-solid w-250px ps-15"
																placeholder="Search Products" />
														</div>
														<!--end::Search-->

														<!--begin::Toolbar-->
														<div class="d-flex justify-content-end" id="btn-div" data-kt-docs-table-toolbar="base">
															<!-- begin:: Add Brand -->
															<a href="javascript:void(0);" onclick="modal_show()"
																data-href="modal/create.php" data-name="Add Product"
																class=" openPopup btn btn-primary float-end"><i class="fa fa-plus"></i> Add Product</a>
															<!-- end:: Add Brand -->
														</div>
														<!--end::Toolbar-->

													</div>										
													
												</div>
												<!--end::Card header-->
												<!--begin::Card body-->
												<div class="card-body pt-0 pb-5">
                                                <table class="table align-middle table-row-dashed " id="active-product-tbl">
										<!--begin::Table head-->
										<thead>
											<!--begin::Table row-->
											<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
												<th class="w-10px pe-2">
													<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
														<input class="form-check-input" type="checkbox" id="checkbox0" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
													</div>
												</th>
												<th class="min-w-50px">Image</th>
												<th class="min-w-50px">Name</th>
												<th class="min-w-50px">Category</th>
												<th class="min-w-50px">Brand</th>
												<th class="min-w-50px">Cost</th>
                                                <th class="min-w-50px">Price</th>
                                                <th class="min-w-50px">Stock</th>
                                                <th class="min-w-50px">Status</th>
												<th class="text-end min-w-70px">Actions</th>
											</tr>
											<!--end::Table row-->
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody class="fw-bold text-gray-600">
										</tbody>
										<!--end::Table body-->
									</table>
												</div>
												<!--end::Card body-->
											</div>
											<!--end::Card-->
											<!--begin::Card-->
											
											<!--end::Card-->
											<!--begin::Card-->
											
											<!--end::Card-->
											<!--begin::Card-->
											
										</div>
										<!--end:::Tab pane-->
										<!--begin:::Tab pane-->
										<div class="tab-pane fade" id="kt_customer_view_overview_events_and_logs_tab" role="tabpanel">
											<!--begin::Card-->
											<div class=" pt-4 mb-6 mb-xl-9">
												<!--begin::Card header-->
												<div class="card-header border-0">
													<!--begin::Card title-->
													<div class="card-title">
														<h2>Inactive Products</h2>
													</div>
													
												</div>
												<!--end::Card header-->
												<!--begin::Card body-->
												<div class="card-body py-0">
												<table class="table align-middle table-row-dashed fs-6 gy-5" id="inactive-product-tbl">
										<!--begin::Table head-->
										<thead>
											<!--begin::Table row-->
											<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
												<th class="w-10px pe-2">
													<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
														<input class="form-check-input" type="checkbox"/>
													</div>
												</th>
												<th class="min-w-50px">Image</th>
												<th class="min-w-50px">Name</th>
												<th class="min-w-50px">Category</th>
												<th class="min-w-50px">Brand</th>
												<th class="min-w-50px">Cost</th>
                                                <th class="min-w-50px">Stock</th>
                                                <th class="min-w-50px">Status</th>
												<th class="text-end min-w-70px">Actions</th>
											</tr>
											<!--end::Table row-->
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody class="fw-bold text-gray-600">
                                        </tbody>
										<!--end::Table body-->
									</table>	
												</div>
												<!--end::Card body-->
											</div>
											<!--end::Card-->
											<!--begin::Card-->
											
										</div>
										<!--end:::Tab pane-->
										<!--begin:::Tab pane-->
									
									</div>
									<!--end:::Tab content-->
								</div>
								<!--end::Content-->
							</div>
							
						</div>
						<!--end::Container-->
                    </div>
					<!--begin::Footer-->
					<?php include "../../cores/inc/copy_c.php" ?>
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
		
		<?php include "../../cores/inc/footer_c.php" ?>
		<!--end::Body-->
		<script>
        //   function for adding event to checkboxes and selecting them
        function checkboxEvent(){
            var checkboxes = Array.from(document.querySelectorAll("input[type='checkbox']"));
                
            // function showing delete button when checkboxes are cleared
            function checkboxDeleteButton(){
                var selectedCheckboxes = [];
                let idCounter = 0;
                var checking = checkboxes.some(function (item) {
                    if (item.checked == true) {
                        return true;
                    } else {
                        return false;
                    }
                });
                
                checkboxes.forEach(function(item){
                if(item.checked == true){
                    let id = item.getAttribute("id");
                    if (id != null){
                        id = id.replace("checkbox","");
                    }
                    if(id != "" && id != 0){
                        selectedCheckboxes[idCounter] = id;
                        idCounter++;
                    }
                } else{
                        return false;
                    }
                });
                if (checking == true) {
                    document.querySelector("#btn-div").innerHTML = `<div class="fw-bolder d-flex align-items-center me-5">
                        <span class="me-2" data-kt-docs-table-select="selected_count">`+selectedCheckboxes.length+`</span>Selected</div>
					<button selected-checkboxes="` + selectedCheckboxes +`" class='btn btn-danger mx-2' id="delete-unit">Delete</button>
					<button selected-checkboxes="`+ selectedCheckboxes +`" class="btn btn-info mx-2" id='toggle-product'>Mark In-active</button>`;
                } else if (checking == false && document.querySelector("#delete-unit")) {
                    document.querySelector("#btn-div").innerHTML = `<!-- begin:: Add Product -->
                                    <a href="javascript:void(0);" onclick="modal_show()"
                                    data-href="modal/create_product.php" data-name="Add Product"
                                    class=" openPopup btn btn-primary float-end"><i class="fa fa-plus"></i> Add Product</a>
                                    <!-- end:: Add Product -->`;
                }
            } 
            checkboxDeleteButton();
                
            //function for adding event listener to all checkboxes     
            function eventListenerAdder (item) {
                item.addEventListener("change", function () {
                    checkboxDeleteButton();
                });
            }
                    
            //code for attaching event listeners to all checkboxes is datatable redrawn
            $('#active-product-tbl').on( 'draw.dt',   function () { 
                checkboxes = Array.from(document.querySelectorAll("input[type='checkbox']"));
                checkboxes.forEach(function(item){eventListenerAdder(item)});
                document.querySelector("#checkbox0").checked = false;
                if(document.querySelector("#delete-unit")){
                    document.querySelector("#btn-div").innerHTML = `<!-- begin:: Add Product -->
                                    <a href="javascript:void(0);" onclick="modal_show()"
                                    data-href="modal/create_product.php" data-name="Add Product"
                                    class=" openPopup btn btn-primary float-end"><i class="fa fa-plus"></i> Add Product</a>
                                    <!-- end:: Add Product -->`;
                }
            }).dataTable();

            $("#checkbox0").on("change", function () {
                $.each(checkboxes, function () {
                    $(this).prop("checked", checkboxes[0].checked);
                });
            });
            checkboxes.forEach(function(item){eventListenerAdder(item)});
        }

		// Active products table start
        $(function(){
            $("#active-product-tbl").DataTable({
                "ajax": "gears/product_fetch.php",
                "deferRender": true,
                "columns": [
                    {"data": "id",
                        "render": function(data,type,row) {
                            return `<div
                                        class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                            data-kt-check-target="#kt_datatable_example_1 .form-check-input"
                                            value="1" id="checkbox`+row.id+`" />
                                    </div>`;
                        }
                    },
                    {"data": "image",
						"render": function(data,type,row){
							if (data == '') return `<img src="../../data/no-image.png" class="rounded-50" width="50px" height="50px"/>`
							let images = data.split(',');
							return `<img src="../../data/product_img/`+images[0]+`" class="rounded-50" width="50px" height="50px"/>`;
						}
					},
                    {"data": "name"},
                    {"data": "cat_name"},
                    {"data": "brand_name"},
                    {"data": "cost"},
                    {"data": "price"},
                    {"data": "quantity"},
                    {"data": "status",
						"render": function(data,type,row) {
							if (data == 'active') 
								return "Active";
							else 
								return "Inactive";
						}
					},
                    {"data": null}
                ],
                "columnDefs": [
                    {"targets":0,"orderable":false},
                    {
                        "targets":-1,
                        "data": null,
                        "orderable":false,
                        "className":"text-end",
                        "render": function(data,type,row) {
                            return `
                                <a href="#" class="btn btn-sm action-dropdown btn-light btn-active-light-primary" data-kt-menu="true" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions 
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                <span class="svg-icon svg-icon-5 m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon--></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="javascript:void(0);" class="openPopup table-modal menu-link px-3" onclick="modal_show()"
                                        data-href="modal/update_product.php?id=`+row.id+`" data-name="Update Product">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="javascript:void(0);" class="menu-link px-3 text-center text-nowrap toggle-status"
										 product-id="`+row.id+`" 
                                        >Mark In-active</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="javascript:void(0);" class="menu-link px-3 delete-action" delete-id="`+row.id+`" 
                                        data-kt-customer-table-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            `;
                        }
                    }
                ],
                "order": [[1,"desc"]]
            });
            setTimeout(function(){
                checkboxEvent();
                handleSearchDatatable();
                KTMenu.createInstances();
            },1200);
        });
		// Active prducts table ends

		// In-active products table start
		$(function(){
            $("#inactive-product-tbl").DataTable({
                "ajax": "gears/inactive_fetch.php",
                "deferRender": true,
                "columns": [
                    {"data": "id",
                        "render": function(data,type,row) {
                            return `<div
                                        class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                            data-kt-check-target="#kt_datatable_example_1 .form-check-input"
                                            value="1" id="checkbox`+row.id+`" />
                                    </div>`;
                        }
                    },
                    {"data": "image",
						"render": function(data,type,row){
							if (data == '') return `<img src="../../data/no-image.png" class="rounded-50" width="50px" height="50px"/>`
							let images = data.split(',');
							return `<img src="../../data/product_img/`+images[0]+`" class="rounded-50" width="50px" height="50px"/>`;
						}
					},
                    {"data": "name"},
                    {"data": "cat_name"},
                    {"data": "brand_name"},
                    {"data": "cost"},
                    {"data": "price"},
                    {"data": "quantity"},
                    {"data": "status",
						"render": function(data,type,row) {
							if (data == 'active') 
								return "Active";
							else 
								return "Inactive";
						}
					},
                    {"data": null}
                ],
                "columnDefs": [
                    {"targets":0,"orderable":false},
                    {
                        "targets":-1,
                        "data": null,
                        "orderable":false,
                        "className":"text-end",
                        "render": function(data,type,row) {
                            return `
                                <a href="#" class="btn btn-sm action-dropdown btn-light btn-active-light-primary" data-kt-menu="true" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions 
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                <span class="svg-icon svg-icon-5 m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon--></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="javascript:void(0);" class="openPopup table-modal menu-link px-3" onclick="modal_show()"
                                        data-href="modal/update_product.php?id=`+row.id+`" data-name="Update Product">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="javascript:void(0);" class="menu-link px-3 text-center text-nowrap toggle-status"
										 product-id="`+row.id+`" 
                                        >Mark In-active</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="javascript:void(0);" class="menu-link px-3 delete-action" delete-id="`+row.id+`" 
                                        data-kt-customer-table-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            `;
                        }
                    }
                ],
                "order": [[1,"desc"]]
            });
            setTimeout(function(){
                checkboxEvent();
                handleSearchDatatable();
                KTMenu.createInstances();
            },1200);
        });
		// In-active products table ends

        // Function for searching in datatable.
        function handleSearchDatatable() {
            const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
            filterSearch.addEventListener('keyup', function (e) {
                $('#active-product-tbl').DataTable().search(e.target.value).draw();
            });
        }

        function reloadDatatable() {
            $('#active-product-tbl').DataTable().ajax.reload();
            setTimeout(function(){
                checkboxEvent();
                handleSearchDatatable();
                KTMenu.createInstances();
            },2000);
        }

        $('body').on('click','#delete-unit',function(e) {
            e.preventDefault();
            let ids = $(this).attr('selected-checkboxes');
            Swal.fire({
                html: `Are you sure you want to delete these items?`,
                icon: 'warning',
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                customClass: {
                    confirmButton: "btn btn-danger",
                    cancelButton: "btn btn-secondary"
                }
            }).then((result)=> {
                if(result.isConfirmed) {
                    $.post("gears/delete.php",{"id_list":ids})
                    .done(function(data) {
                        Swal.fire(
                            'Deleted!',
                            'Items have been deleted.',
                            'success'
                        );
                        reloadDatatable();
                    }).fail(function() {
                        Swal.fire(
                            'Error',
                            "An error occured, please try again!",
                            'error'
                        );
                    });
                }
            });
        });

        $('body').on('click','#toggle-product',function(e) {
            e.preventDefault();
            let ids = $(this).attr('selected-checkboxes');
            Swal.fire({
                html: `Are you sure you want to mark these items as In-active?`,
                icon: 'warning',
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                customClass: {
                    confirmButton: "btn btn-danger",
                    cancelButton: "btn btn-secondary"
                }
            }).then((result)=> {
                if(result.isConfirmed) {
                    $.post("gears/toggleStatus.php",{"id_list":ids})
                    .done(function(data) {
                        Swal.fire(
                            'Stauts changed!',
                            'Items have been marked In-active.',
                            'success'
                        );
                        reloadDatatable();
                    }).fail(function() {
                        Swal.fire(
                            'Error',
                            "An error occured, please try again!",
                            'error'
                        );
                    });
                }
            });
        });

        $('body').on('click','.delete-action',function(e){
            e.preventDefault();
            let id = $(this).attr('delete-id');
            Swal.fire({
                html: `Are you sure you want to delete this item?`,
                icon: 'warning',
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                customClass: {
                    confirmButton: "btn btn-danger",
                    cancelButton: "btn btn-secondary"
                }
            }).then((result)=> {
                if(result.isConfirmed) {
                    $.post("gears/delete.php",{"id_list":id})
                    .done(function(data) {
                        Swal.fire(
                            'Deleted!',
                            'Item has been deleted.',
                            'success'
                        );
                        reloadDatatable();
                    }).fail(function() {
                        Swal.fire(
                            'Error',
                            "An error occured, please try again!",
                            'error'
                        );
                    });
                }
            });
        });

        $('body').on('click','.toggle-status',function(e){
            e.preventDefault();
            let id = $(this).attr('product-id');
            Swal.fire({
                html: `Are you sure you want to mark this item as In-active?`,
                icon: 'warning',
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                customClass: {
                    confirmButton: "btn btn-danger",
                    cancelButton: "btn btn-secondary"
                }
            }).then((result)=> {
                if(result.isConfirmed) {
                    $.post("gears/toggleStatus.php",{"id_list":id})
                    .done(function(data) {
                        Swal.fire(
                            'Status changed!',
                            'Item has been marked In-active.',
                            'success'
                        );
                        reloadDatatable();
                    }).fail(function() {
                        Swal.fire(
                            'Error',
                            "An error occured, please try again!",
                            'error'
                        );
                    });
                }
            });
        });
    </script>
	</body>
</html>