<?php

    include "../../../cores/inc/config_c.php";

    if(!isset($_GET['id'])) {
        die('No unique id provided. '.mysqli_error($link));
    }
    $id = $_GET['id'];

    $query = "SELECT * FROM `uset_tbl` WHERE `uset_id`='$id'";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die("Could not fetch store data. ".mysqli_error($link));
    }
    $row = mysqli_fetch_assoc($result);

?>
<form id="uploadForm" method="POST" action="../gears/create_store.php" enctype="multipart/form-data">
    <div class="fv-row form-group mb-4">
        <label class="form-label required" for="name">Name</label>
        <input type="text" class="form-control" id="name" name="uset_name" value="<?php echo $row['uset_name'];?>"
        placeholder="Enter Store Name" required>
    </div>
    <div class="fv-row form-group my-4">
        <label class="form-label required" for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['uset_phone'];?>"
         placeholder="Enter Store Phone" required>
    </div>
    <div class="fv-row form-group my-4">
        <label class="form-label required" for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['uset_address'];?>"
         placeholder="Enter Store Address" required>
    </div>
    <div class="fv-row form-group my-4">
        <label class="form-label required" for="email">Email</label>
        <input type="text" class="form-control" name="email" id="email" value="<?php echo $row['uset_email'];?>" 
        placeholder="Enter Store Email" required>
    </div>
    <div class="fv-row form-group my-4">
        <label class="form-label required" for="pincode">Pin Code</label>
        <input type="text" class="form-control" id="pincode" name="pincode" value="<?php echo $row['uset_pincode'];?>"
         placeholder="Enter Store Pin Code" required>
    </div>
    <div class="fv-row form-group my-4">
        <label class="form-label required" for="gstno">GST Number</label>
        <input type="text" class="form-control" name="gstno" id="gstno" value="<?php echo $row['uset_gst_no'];?>"
         placeholder="Enter Store GST Number" required>
    </div>
    <div class="form-group my-4">
        <input type="file" id="image" accept=".jpg, .jpeg, .png" name="image"/>
        <input type="text" name="old_image" value="<?php echo $row['uset_image'];?>" hidden>
        <img src="../../data/store_img/<?php echo $row['uset_image'];?>" width="150px"
        height="150px" alt="Store logo."/>
        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Please provide a logo image of the store."></i>
    </div>
    
    <button type="submit" name="submit" id="submit" value="upload" class="btn btn-primary">Submit</button>
    <div id="data_response"></div>
</form>
<script>
    function submitForm(formData){                
        $.ajax({
            type:'POST',
            url: "gears/update_store.php",
            data: formData,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false
        }).done(function (data) {
            Swal.fire(
                'Success',
                'Store updated successfully!',
                'success'
            );
            parent.reloadDatatable();
            modal_hide();
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