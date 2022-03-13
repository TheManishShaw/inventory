<?php

    include "../../../../cores/inc/config_c.php";

    $id = $_GET['id'];

    $query = "SELECT * FROM `users_tbl` WHERE `u_id`='$id'";
    $result = mysqli_query($link,$query);
    if (!$result){
        die("Could not fetch supplier. ".mysqli_error($link));
    }
    $row = mysqli_fetch_assoc($result);

?>
<form method="POST" id="supplier-form" action="gears/add_suppliers.php">
    <div class="form-row row">
        <div class="col-md-6 mb-3 fv-row">
            <label class="required form-label">First Name</label>
            <input type="text" class="form-control form-control-solid" name="firstname"
            value="<?php echo $row['f_name']; ?>" placeholder="Enter First Name" required>
        </div>
        <div class="col-md-6 mb-3 fv-row">
            <label class="required form-label">Last Name</label>
            <input type="text" class="form-control form-control-solid" name="lastname"
            value="<?php echo $row['l_name']; ?>" placeholder="Enter Last Name" required>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control form-control-solid" name="email"
            value="<?php echo $row['email_id'];?>" placeholder="Enter your Email address">
        </div>
        <div class="col-md-6 mb-3 fv-row">
            <label class="required form-label">Phone</label>
            <input type="text" class="form-control form-control-solid" name="phone"
            value="<?php echo $row['tel_no'];?>" placeholder="Enter your Phone number" required>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Business Name</label>
            <input type="text" class="form-control form-control-solid" name="business_name"
            value="<?php echo $row['business_name'];?>" placeholder="Enter Business Name">
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">GST Number</label>
            <input type="text" class="form-control form-control-solid" name="gst_number"
            value="<?php echo $row['gst_num'];?>" placeholder="Enter GST number">
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Address</label>
            <input type="text" class="form-control form-control-solid" name="address"
            value="<?php echo $row['address'];?>" placeholder="Enter your Address">
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-primary" id="submit" name="submit" value="submit" type="submit">Submit</button>
        <input type="text" name="id" value="<?php echo $id;?>" hidden/>
    </div>
</form>
<script>
    function submitForm(formData){                
        $.ajax({
            type:'POST',
            url: "gears/update_supplier.php",
            data: formData,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false
        }).done(function (data) {
            if (data.trim() == 'number' || data.trim() == 'email') {
                Swal.fire(
                    'Duplicate Value',
                    'This '+data+' is already in use. Try a different '+data+'.',
                    'warning'
                );
                return;
            } else {
                Swal.fire(
                    'Success',
                    'Supplier updated successfully!',
                    'success'
                );
                modal_hide();
                reloadDatatable();
            }
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
            let formData = new FormData($('#supplier-form')[0]);
            if (validator) {
                validator.validate().then(function(status) {
                    if (status == "Valid") {
                        submitForm(formData);
                    }
                });
            }
        });
    });

    var form = document.querySelector("#supplier-form");

    var validator = FormValidation.formValidation(
        form,
        {
            fields: {
                firstname: {
                    validators: {
                        notEmpty: {
                            message: "Text input required."
                        }
                    }
                },
                lastname: {
                    validators: {
                        notEmpty: {
                            message: "Text input is required."
                        }
                    }
                },
                phone: {
                    validators: {
                        notEmpty: {
                            message: "Text input is required."
                        },
                        phone:{
                            country: 'IN',
                            message: 'Enter a valid mobile number.'
                        },
                        stringLength:{
                            min:10,
                            max: 10,
                            message: "Enter a valid 10 digit mobile number. Don't enter country code."
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
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
</script>