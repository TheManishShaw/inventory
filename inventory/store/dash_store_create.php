<?php
    include "../../cores/inc/config_c.php";
    include "../../cores/inc/functions_c.php";
    include "../../cores/inc/auth_c.php";
    include "../../cores/inc/var_c.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard – <?php echo $sys_title ?></title>

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
                        <div class="d-flex flex-column flex-lg-row">
                            
                            <!-- Start content -->
                            <form id="uploadForm" method="POST" class="w-100 mx-20"
                             action="../gears/create_store.php" enctype="multipart/form-data">
                                <div class="pb-10 pb-lg-15">
                                    <!--begin::Title-->
                                    <h1 class="fw-bolder text-dark">Create Store</h1>
                                    <!--end::Title-->
                                </div>
                                <div class="">
                                    <div class="fv-row form-group mb-4">
                                        <label class="form-label required" for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="uset_name" placeholder="Enter Store Name"onkeypress="return (event.charCode > 64 && 
                                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.keyCode==32" pattern="[a-zA-Z ]+"  required>
                                    </div>
                                    <div class="fv-row form-group my-4">
                                        <label class="form-label required" for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"  placeholder="Enter Store Phone" onkeydown="return ( event.ctrlKey || event.altKey 
                                                                                                                                            || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                                                                                                                                            || (95<event.keyCode && event.keyCode<106)
                                                                                                                                            || (event.keyCode==8) || (event.keyCode==9) 
                                                                                                                                            || (event.keyCode>34 && event.keyCode<40) 
                                                                                                                                            || (event.keyCode==46)  || (event.keyCode==190))" required>
                                    </div>
                                    <div class="fv-row form-group my-4">
                                        <label class="form-label required" for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Store Address" required>
                                    </div>
                                    <div class="fv-row form-group my-4">
                                        <label class="form-label required" for="email">Email</label>
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter Store Email" required>
                                    </div>
                                    <div class="fv-row form-group my-4">
                                        <label class="form-label required" for="pincode">Pin Code</label>
                                        <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Store Pin Code" onkeydown="return ( event.ctrlKey || event.altKey 
                                                                                                                                            || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                                                                                                                                            || (95<event.keyCode && event.keyCode<106)
                                                                                                                                            || (event.keyCode==8) || (event.keyCode==9) 
                                                                                                                                            || (event.keyCode>34 && event.keyCode<40) 
                                                                                                                                            || (event.keyCode==46)  || (event.keyCode==190))" required>
                                    </div>
                                    <div class="fv-row form-group my-4">
                                        <label class="form-label required" for="gstno">GST Number</label>
                                        <input type="text" class="form-control" name="gstno" id="gstno" placeholder="Enter Store GST Number" required>
                                    </div>
                                    <label class="form-label">Store logo</label>
                                    <div class="fv-row form-group my-4 text-center">
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-circle" data-kt-image-input="true" style="background-image: url(../../data/no-image.png)">
                                            <!--begin::Image preview wrapper-->
                                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url(../../data/no-image.png)"></div>
                                            <!--end::Image preview wrapper-->

                                            <!--begin::Edit button-->
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                data-kt-image-input-action="change"
                                                data-bs-toggle="tooltip"
                                                data-bs-dismiss="click"
                                                title="Change logo">
                                                <i class="bi bi-pencil-fill fs-7"></i>

                                                <!--begin::Inputs-->
                                                <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="avatar_remove" />
                                                <!--end::Inputs-->
                                            </label>
                                            <!--end::Edit button-->

                                            <!--begin::Cancel button-->
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                data-kt-image-input-action="cancel"
                                                data-bs-toggle="tooltip"
                                                data-bs-dismiss="click"
                                                title="Cancel logo">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Cancel button-->

                                            <!--begin::Remove button-->
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                data-kt-image-input-action="remove"
                                                data-bs-toggle="tooltip"
                                                data-bs-dismiss="click"
                                                title="Remove Logo">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Remove button-->
                                        </div>
                                        <!--end::Image input-->
                                    </div>
                                    
                                </div>
                                <div class="text-end">
                                    <button type="submit" name="submit" id="submit" value="upload" class="btn btn-primary">Submit</button>
                                </div>
                                <div id="data_response"></div>
                                <input type="text" value="<?php echo $_POST['chain_id']; ?>" name="chain_id" hidden />
                            </form>
                            <!-- End content -->
                        </div>
                    </div>
                </div>
                <?php include "../../cores/inc/copy_c.php" ?>
            </div>
        </div>
    </div>
    <?php include "../../cores/inc/footer_c.php" ?>
    <script>
        function submitForm(formData){                
            $.ajax({
                type:'POST',
                url: "gears/create_store.php",
                data: formData,
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false
            }).done(function (data) {
                    Swal.fire({
                        title: "Store created succesfully.",
                        html: "You will be signed out after <b>10</b> seconds.",
                        timer: 10000,
                        timerProgressBar:true,
                        didOpen: () => {
                            const b = Swal.getHtmlContainer().querySelector('b');
                            timerInterval = setInterval(() => {
                            b.textContent = Math.round(Swal.getTimerLeft()/1000)
                            }, 1000);
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                                $.ajax({
                                    type: "POST",
                                    url: "../../signout.php"
                                }).done(function(){
                                    document.location.reload();
                                });
                        },
                        confirmButtonText: 'Sign Out Now'
                    }).then((result)=>{
                        if(result.isConfirmed) {
                            $.ajax({
                                type:'POST',
                                url:"../../signout.php"
                            }).done(function(){
                                document.location.reload();
                            });
                        }
                }).fail(function(e){
                    Swal.fire(
                        'Error',
                        "An error occured. Please try again.",
                        'error'
                    );
                });
            }).fail(function(e){
                Swal.fire(
                    'Error',
                    'An error occured. Please try again.',
                    'error'
                );
                console.log(e.responseText);
            });
        }
        $(function(){
            document.querySelector("#submit").addEventListener("click",function(e){
                e.preventDefault();
                let formData = new FormData($('form')[0]);
                if (validator) {
                    validator.validate().then(function(status) {
                        if (status == "Valid") {
                            submitForm(formData);
                        }
                    });
                }
            });
        });

        var form = document.querySelector("form");

        var validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    uset_name: {
                        validators: {
                            notEmpty: {
                                message: "Text input required."
                            }
                        }
                    },
                    phone: {
                        validators: {
                            notEmpty: {
                                message: "Phone number required."
                            },
                            stringLength: {
                                min: 10,
                                max: 10,
                                message: "Please enter a 10 digit mobile number."
                            },
                            regexp: {
                                regexp: /[0-9]{10}/,
                                message: "Phone number can only contain digits."
                            }
                        }
                    },
                    address: {
                        validators: {
                            notEmpty: {
                                message: "Text input required."
                            }
                        }
                    },
                    email:{
                        validators: {
                            notEmpty: {
                                message: "Please enter a valid email address."
                            },
                            regexp: {
                                regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                                message: "Please enter a valid email address."
                            }
                        }
                    },
                    pincode:{
                        validators: {
                            notEmpty: {
                                message: "Pin code required."
                            },
                            stringLength: {
                                min: 6,
                                max: 6,
                                message: "Enter a six digit Pin code."
                            },
                            digits: {
                                message: "Pin code can only contain digits."
                            } 
                        }
                    },
                    gstno: {
                        validators: {
                            notEmpty: {
                                message: "Text input required."
                            },
                            stringLength: {
                                min:12,
                                max:12,
                                message: "Enter a 12 digit GST number."
                            }
                        }
                    },
                    image: {
                        validators: {
                            notEmpty: {
                                message: "Please select an image."
                            }
                        }
                    }
                },
                plugins: {
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row"
                    })
                }
            }
        );
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    </script>
</body>

</html>