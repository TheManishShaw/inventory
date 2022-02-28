
<?php
   include "cores/inc/config_c.php";
   include "cores/inc/functions_c.php";
   include "cores/inc/auth_c.php";
   include "cores/inc/var_c.php";
   $db_handle = new DBController();
   $query = "SELECT * FROM `users_tbl`";
   $faq = $db_handle->runQuery($query);
   ?>
<!DOCTYPE html>
<html lang="en">

<head>
		<title>Users List – <?php echo $sys_title ?></title>
		
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
						<div class="pt-10">
							<!-- <a href="#" class="btn btn-primary float-end">Add Users</a> -->
							<h1 class="anchor fw-bolder mb-5">Users List</h1>
										
						<div class="my-5">
							<table id="kt_datatable_example_5" class="table table-striped gy-5 gs-7 border rounded">
								<thead>
									<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
										                                              
									<th class="min-w-125px">Customer Name</th>
									<th class="min-w-125px">Email</th>
									<th class="min-w-125px">Phone</th>
                                    <th class="min-w-125px">Role</th>
                                    <th class="min-w-125px"> Status</th>
									<th class="min-w-125px">Created Date</th>
									<th class="text-end min-w-70px">Actions</th>
								 	</tr>
                              </thead>
                              <tbody>
							  <?php
								foreach($faq as $k=>$v) {
								?>
                                <tr>
                                                                                          
                                    <td><?php echo $faq[$k]["f_name"]; ?> <?php echo $faq[$k]["l_name"]; ?></td>
                                    <td><?php echo $faq[$k]["email_id"]; ?></td>
                                    <td><?php echo $faq[$k]["tel_no"]; ?></td>
                                    <td><?php echo $faq[$k]["u_type"]; ?></td>
                                    <td><?php echo $faq[$k]["u_stats"]; ?></td>
									<td><?php $my_date = $faq[$k]['u_timestamp']; echo date( "d-M-Y", strtotime(date($my_date)));?></td>                                   
                                    <td>
									<a href="javascript:void(0);" onclick="modal_show()" data-href="cores/mods/v_user.php?v_id=<?php echo $faq[$k]["u_id"]; ?>" data-name="View User" class="openPopup btn btn-icon border-0 btn-custom flex-shrink-0 btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-toggle="tooltip" title="View Users">
                                          <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="View User">
                                                <span class="svg-icon svg-icon-3 svg-icon-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="black"/>
                                                <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="black"/>
                                                <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="black"/>
                                                </svg></span>
                                             </a>	
                                </tr>
								<?php
								}
								?>
                              </tbody>
							</table>
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
</html>