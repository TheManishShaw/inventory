<?php
   include "../../cores/inc/config_c.php";
   include "../../cores/inc/functions_c.php";
   include "../../cores/inc/auth_c.php";
   include "../../cores/inc/var_c.php";
   $db_handle = new DBController();
   $query = "SELECT * FROM `_tblunits`";
   $faq = $db_handle->runQuery($query);
   ?>
<!DOCTYPE html>
<html lang="en">

<head>
		<title>Unit List – <?php echo $sys_title ?></title>
		
        <?php include "../../cores/inc/header_c.php" ?>
	</head>
	<body id="kt_body" class="aside-enabled">
		<div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid">
				<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">				
					<?php include "../../cores/inc/nav_c.php" ?>				
				</div>
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<?php include "../../cores/inc/top_c.php" ?>
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<div id="kt_content_container" class="container-fluid">
						<div class="pt-10"><a href="javascript:void(0);" onclick="modal_show()" data-href="modal/s_unit.php" data-name="Add Unit" class=" openPopup btn btn-primary float-end"><i class="fa fa-plus"></i> Add Unit</a>
										<h1 class="anchor fw-bolder mb-5">Unit List</h1>
										
										<div class="my-5" id="reload">
                              <table id="kt_datatable_example_5" class="table table-striped gy-5 gs-7 border rounded">
											<thead>
                                 <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">ID</th>
                                    <th class="min-w-125px">Name</th>
                                    <th class="min-w-125px">Short Name</th>
                                    <th class="min-w-125px">Created Date</th>
                                    <th class=" min-w-30px">Actions</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    foreach($faq as $k=>$v) {
                                    ?>
                                 <tr>
                                    <td><?php echo $faq[$k]["id"]; ?></td>
                                    <td><?php echo $faq[$k]["name"]; ?></td>
                                    <td><?php echo $faq[$k]["ShortName"]; ?></td>
                                    <td><?php $my_date = $faq[$k]['created_at'];
                                       echo date( "d M, Y", strtotime(date($my_date)));
                                       ?></td>
                                    <td>
                                    <a href="javascript:void(0);" onclick="modal_show()" data-href="modal/e_unit.php" data-name="Edit Product" class="openPopup btn btn-icon border-0 btn-custom flex-shrink-0 btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-toggle="tooltip" title="Edit Product">
                                          <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit">
                                                <span class="svg-icon svg-icon-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="black"/>
                                                <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="black"/>
                                                <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="black"/>
                                                </svg></span>
                                             </a>
                                    
                                       <a class="btn btn-icon btn-active-light-danger w-30px h-30px " type="button"   data-kt-docs-table-filter="delete_row" data-bs-toggle="tooltip" title="Delete Item">
                                          <span class="svg-icon svg-icon-3">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                                <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                                <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                             </svg>
                                          </span>
                                       </a>
                                    </td>
                                 </tr>
                                 <?php
                                    }
                                    ?>
                                    

                              </tbody>
											</table>

										</div>
										<!--end::Block-->			
						</div>						
					</div>
					</div>
					<?php include "../../cores/inc/copy_c.php" ?>
				</div>
			</div>
		</div>
      <script>
        
        function abcd() {
        $( "#reload" ).load( "re.php" );
        }
          // Delete customer
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = document.querySelectorAll('[data-kt-docs-table-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get customer name
                const customerName = parent.querySelectorAll('td')[1].innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Are you sure you want to delete " + customerName + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {
                        // Simulate delete request -- for demo purpose only
                        Swal.fire({
                            text: "Deleting " + customerName,
                            icon: "info",
                            buttonsStyling: false,
                            showConfirmButton: false,
                            timer: 2000
                        }).then(function () {
                            Swal.fire({
                                text: "You have deleted " + customerName + "!.",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            }).then(function () {
                                // delete row data from server and re-draw datatable
                                dt.draw();
                            });
                        });
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: customerName + " was not deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                });
            })
        });
    }
      </script>		
	</body>
	<?php include "../../cores/inc/footer_c.php" ?>
 
</html>