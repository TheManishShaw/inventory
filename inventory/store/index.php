<?php
   include "../../cores/inc/config_c.php";
   include "../../cores/inc/functions_c.php";
   include "../../cores/inc/auth_c.php";
   include "../../cores/inc/var_c.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Store List – <?php echo $sys_title ?></title>

    <?php include "../../cores/inc/header_c.php" ?>
</head>

<body id="kt_body" class="aside-enabled">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            <div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside"
                data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
                data-kt-drawer-toggle="#kt_aside_mobile_toggle">
                <?php include "../../cores/inc/nav_c.php" ?>
            </div>
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <?php include "../../cores/inc/top_c.php" ?>
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <div id="kt_content_container" class="container-fluid">
                        <div class="pt-10">
                            <h1 class="anchor fw-bolder mb-5">Store List</h1>
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-5">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <input type="text" data-kt-docs-table-filter="search"
                                        class="form-control form-control-solid w-250px ps-15"
                                        placeholder="Search Customers" />
                                </div>
                                <!--end::Search-->

                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" id="btn-div" data-kt-docs-table-toolbar="base">
                                    <!-- begin:: Add Store -->
                                    <a href="javascript:void(0);" onclick="modal_show()"
                                    data-href="modal/create_store.php" data-name="Add Store"
                                    class=" openPopup btn btn-primary float-end"><i class="fa fa-plus"></i> Add Store</a>
                                    <!-- end:: Add Store -->
                                </div>
                                <!--end::Toolbar-->

                                <!--begin::Group actions-->
                                <div class="d-flex justify-content-end align-items-center d-none"
                                    data-kt-docs-table-toolbar="selected">
                                    <div class="fw-bolder me-5">
                                        <span class="me-2" data-kt-docs-table-select="selected_count"></span> Selected
                                    </div>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="tooltip"
                                        title="Coming Soon">
                                        Selection Action
                                    </button>
                                </div>
                                <!--end::Group actions-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Datatable-->
                            <table id="store-tbl" class="table align-middle table-row-dashed fs-6 gy-5">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="w-10px pe-2">
                                            <div
                                                class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                <input class="form-check-input" type="checkbox"
                                                 id="checkbox0" />
                                            </div>
                                        </th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Pincode</th>
                                        <th>GST No.</th>
                                        <th class="text-end min-w-100px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-bold">
                                </tbody>
                            </table>
                            <!--end::Datatable-->
                        </div>
                    </div>
                </div>
                <?php include "../../cores/inc/copy_c.php" ?>
            </div>
        </div>
    </div>
    <?php include "../../cores/inc/footer_c.php" ?>
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
                    <a selected-checkboxes="` + selectedCheckboxes +`" class='btn btn-danger' id="delete-unit">Delete</button>`;
                } else if (checking == false && document.querySelector("#delete-unit")) {
                    document.querySelector("#btn-div").innerHTML = `<!-- begin:: Add Store -->
                                    <a href="javascript:void(0);" onclick="modal_show()"
                                    data-href="modal/create_store.php" data-name="Add Store"
                                    class=" openPopup btn btn-primary float-end"><i class="fa fa-plus"></i> Add Store</a>
                                    <!-- end:: Add Store -->`;
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
            $('#store-tbl').on( 'draw.dt',   function () { 
                checkboxes = Array.from(document.querySelectorAll("input[type='checkbox']"));
                checkboxes.forEach(function(item){eventListenerAdder(item)});
                document.querySelector("#checkbox0").checked = false;
                if(document.querySelector("#delete-unit")){
                    document.querySelector("#btn-div").innerHTML = `<!-- begin:: Add Store -->
                                    <a href="javascript:void(0);" onclick="modal_show()"
                                    data-href="modal/create_store.php" data-name="Add Store"
                                    class=" openPopup btn btn-primary float-end"><i class="fa fa-plus"></i> Add Store</a>
                                    <!-- end:: Add Store -->`;
                }
            }).dataTable();

            $("#checkbox0").on("change", function () {
                $.each(checkboxes, function () {
                    $(this).prop("checked", checkboxes[0].checked);
                });
            });
            checkboxes.forEach(function(item){eventListenerAdder(item)});
        }

        $(function(){
        var table = $("#store-tbl").DataTable({
            "ajax": "gears/store_fetch.php",
            "deferRender": false,
            "columns": [
                {"data": "uset_id",
                    "render": function(data,type,row) {
                        return `<div
                                    class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                        data-kt-check-target="#kt_datatable_example_1 .form-check-input"
                                        value="1" id="checkbox`+row.uset_id+`" />
                                </div>`;
                    }
                },
                {"data":"uset_id"},
                {"data": "uset_name"},
                {"data": "uset_email"},
                {"data": "uset_phone"},
                {"data": "uset_address"},
                {"data": "uset_pincode"},
                {"data": "uset_gst_no"},
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
                                     data-href="modal/update_store.php?id=`+row.uset_id+`" data-name="Update Store">Edit</a>
                                </div>
                    			<!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="javascript:void(0);" class="menu-link px-3 delete-action" delete-id="`+row.uset_id+`" 
                                    data-kt-customer-table-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        `;
                    }
                }
            ]
        });
        setTimeout(function(){
            checkboxEvent();
            KTMenu.createInstances();
            },1200);
    });
    function reloadDatatable() {
        $('#store-tbl').DataTable().ajax.reload();
        setTimeout(function(){
            console.log('checkbox');
            checkboxEvent();
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
                $.post("gears/multi_delete.php",{"id_list":ids})
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
                $.post("gears/multi_delete.php",{"id_list":id})
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
    })
    </script>
</body>

</html>