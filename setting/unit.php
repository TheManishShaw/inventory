<?php
   include "../cores/inc/config_c.php";
   include "../cores/inc/functions_c.php";
   include "../cores/inc/auth_c.php";
   include "../cores/inc/var_c.php";
   $db_handle = new DBController();
   $query = "SELECT * FROM `_tblunits`";
   $faq = $db_handle->runQuery($query);
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Unit – <?php echo $sys_title ?></title>
      <?php include "../cores/inc/header_c.php" ?>
   </head>
   <body id="kt_body" class="aside-enabled">
      <div class="d-flex flex-column flex-root">
         <div class="page d-flex flex-row flex-column-fluid">
            <div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
               <?php include "../cores/inc/nav_c.php" ?>									
            </div>
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
               <?php include "../cores/inc/top_c.php" ?>
               <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                  <div id="kt_content_container" class="container-fluid">
                     <div class="">
                        <div class="card-body pt-0">
                           <table id="kt_datatable_example_5" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
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
                                       <a class="btn btn-icon btn-active-light-danger w-30px h-30px openPopup" href="javascript:void(0);" onclick="modal_show()" data-href="modal/delete.php" data-name="Delete" data-kt-permissions-table-filter="delete_row" data-bs-toggle="tooltip" title="Delete Item">
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
                     </div>
                  </div>
               </div>
               <?php include "../cores/inc/copy_c.php" ?>				
            </div>
         </div>
         <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <span class="svg-icon">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
                  <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
               </svg>
            </span>
         </div>
      </div>
   </body>
   <?php include "../cores/inc/footer_c.php" ?>
</html>