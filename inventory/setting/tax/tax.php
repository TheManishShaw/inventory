<?php
   include "../../../cores/inc/config_c.php";
   include "../../../cores/inc/functions_c.php";
   include "../../../cores/inc/auth_c.php";
   include "../../../cores/inc/var_c.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tax List – <?php echo $sys_title ?></title>

    <?php include "../../../cores/inc/header_c.php" ?>
</head>

<body id="kt_body" class="aside-enabled">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            <div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside"
                data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
                data-kt-drawer-toggle="#kt_aside_mobile_toggle">
                <?php include "../../../cores/inc/nav_c.php" ?>
            </div>
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <?php include "../../../cores/inc/top_c.php" ?>
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <div id="kt_content_container" class="container-fluid">
                        <div class="pt-10">
                            <h1 class="anchor fw-bolder mb-5">Tax List</h1>
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-5">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <input type="text" data-kt-docs-table-filter="search"
                                        class="form-control form-control-solid w-250px ps-15"
                                        placeholder="Search Tax" />
                                </div>
                                <!--end::Search-->

                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" id="btn-div" data-kt-docs-table-toolbar="base">
                                    <!-- begin:: Add Tax -->
                                    <a href="javascript:void(0);" onclick="modal_show()"
                                        data-href="modal/create_tax.php" data-name="Add Tax"
                                        class=" openPopup btn btn-primary float-end"><i class="fa fa-plus"></i> Add Tax</a>
                                    <!-- end:: Add Tax -->
                                </div>
                                <!--end::Toolbar-->

                            </div>

                            <div class="my-5">
                                <table id="tax-tbl1" class="table table-striped gy-5 gs-7 border rounded">
                                    <thead>
                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                            <th class="w-10px pe-2">
                                                <div
                                                    class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                    <input class="form-check-input" type="checkbox"
                                                    id="checkbox0" />
                                                </div>
                                            </th>
                                            <th class="min-w-125px">ID</th>
                                            <th class="min-w-125px">Tax Name</th>
                                            <th class="min-w-125px">Tax Percentage</th>
                                            <th class="text-end min-w-100px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Block-->
                        </div>
                    </div>
                </div>
                <?php include "../../../cores/inc/copy_c.php" ?>
            </div>
        </div>
    </div>
    <?php include "../../../cores/inc/footer_c.php" ?>
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
                    document.querySelector("#btn-div").innerHTML = `<a href="javascript:void(0);" onclick="modal_show()"
                                        data-href="modal/create_tax.php" data-name="Add Tax"
                                        class="openPopup btn btn-primary float-end"><i class="fa fa-plus"></i> Add Tax</a>`;
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
            $('#tax-tbl').on( 'draw.dt',   function () { 
                checkboxes = Array.from(document.querySelectorAll("input[type='checkbox']"));
                checkboxes.forEach(function(item){eventListenerAdder(item)});
                document.querySelector("#checkbox0").checked = false;
                if(document.querySelector("#delete-unit")){
                    document.querySelector("#btn-div").innerHTML = `<!-- begin:: Add Tax -->
                                    <a href="javascript:void(0);" onclick="modal_show()"
                                    data-href="modal/create_tax.php" data-name="Add Tax"
                                    class=" openPopup btn btn-primary float-end"><i class="fa fa-plus"></i> Add Tax</a>
                                    <!-- end:: Add Tax -->`;
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
            var table = $("#tax-tbl1").DataTable({
                "ajax": "gears/tax_fetch.php",
                "deferRender": true,
                "columns": [
                    {"data": "tax_id",
                        "render": function(data,type,row) {
                            return `<div
                                        class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                            data-kt-check-target="#kt_datatable_example_1 .form-check-input"
                                            value="1" id="checkbox`+row.tax_id+`" />
                                    </div>`;
                        }
                    },
                    {"data":"tax_id"},
                    {"data": "tax_name"},
                    {"data": "tax_percent"},
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
                                        data-href="modal/update_tax.php?id=`+row.tax_id+`" data-name="Update Store">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="javascript:void(0);" class="menu-link px-3 delete-action" delete-id="`+row.tax_id+`" 
                                        data-kt-customer-table-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="javascript:void(0);" class="menu-link px-3 default-action" default-id="`+row.tax_id+`" 
                                        data-kt-customer-table-filter="default">Set Default</a>
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

        // Function for searching in datatable.
        function handleSearchDatatable() {
            const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
            filterSearch.addEventListener('keyup', function (e) {
                $('#tax-tbl').DataTable().search(e.target.value).draw();
            });
        }

        function reloadDatatable() {
            $('#tax-tbl').DataTable().ajax.reload();
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

        $('body').on('click','.default-action',function(e){
            e.preventDefault();
            let id = $(this).attr('default-id');
            Swal.fire({
                html: `Are you sure you want to set this as your default tax?`,
                icon: 'question',
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                customClass: {
                    confirmButton: "btn btn-info",
                    cancelButton: "btn btn-secondary"
                }
            }).then((result)=> {
                if(result.isConfirmed) {
                    $.post("gears/default.php",{"id":id})
                    .done(function(data) {
                        Swal.fire(
                            'Updated!',
                            'Your default tax has been updated!',
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