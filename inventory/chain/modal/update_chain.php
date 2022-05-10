<?php

    include "../../../cores/inc/config_c.php";

    if(!isset($_GET['id'])) {
        die('No unique id provided. '.mysqli_error($link));
    }
    $id = $_GET['id'];

    $query = "SELECT * FROM `chain_tbl` WHERE `chain_id`='$id'";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die("Could not fetch chain. ".mysqli_error($link));
    }
    $row = mysqli_fetch_assoc($result);

?>
<form id="uploadForm" method="POST" action="../gears/create_chain.php" enctype="multipart/form-data">
    <div class="fv-row form-group mb-4">
        <label class="form-label required" for="name">Name</label>
        <input type="text" class="form-control" id="name" name="chain_name" placeholder="Enter Chain Name"
        value="<?php echo $row['chain_name'] ?>" onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" pattern="[a-zA-Z]+" required>
    </div>
    <div class="fv-row form-group mb-4">
        <label class="form-label required" for="desc">Description</label>
        <textarea class="form-control" name="chain_description" 
        id="desc"rows="4" required><?php echo $row['chain_description'] ?></textarea>
    </div>
    <div class="fv-row form-group my-4">
        <label class="form-label">Store logo</label>
        <div class="fv-row form-group my-4 text-center">
            <!--begin::Image input-->
            <div class="image-input image-input-circle" data-kt-image-input="true" style="background-image: url(../../data/no-image.png)">
                <!--begin::Image preview wrapper-->
                <div class="image-input-wrapper w-125px h-125px" style="background-image: url(../../data/<?php
                    if ($row['chain_logo'] == '') {
                        echo 'no-image.png';
                    } else {
                        echo 'chain_img/'.$row['chain_logo'];
                    }
                ?>)"></div>
                <!--end::Image preview wrapper-->

                <!--begin::Edit button-->
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Change logo">
                    <i class="bi bi-pencil-fill fs-7"></i>

                    <!--begin::Inputs-->
                    <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                    <input type="hidden" name="avatar_remove" />
                    <input type="text" name="old_chain_image" value="<?php echo $row['chain_logo'];?>" hidden/>
                    <!--end::Inputs-->
                </label>
                <!--end::Edit button-->

                <!--begin::Cancel button-->
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Cancel logo">
                    <i class="bi bi-x fs-2"></i>
                </span>
                <!--end::Cancel button-->

            </div>
            <!--end::Image input-->
        </div>
        <input name="id" value="<?php echo $id;?>" hidden />
    </div>

    <button type="submit" name="submit" id="submit" value="upload" class="btn btn-primary">Submit</button>
    <div id="data_response"></div>
</form>
<script>
    function submitForm(formData) {
        $.ajax({
            type: 'POST',
            url: "gears/update_chain.php",
            data: formData,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false
        }).done(function(data) {
            console.log(data)
            Swal.fire(
                'Success',
                'Chain created successfully!',
                'success'
            );
            parent.reloadDatatable();
            modal_hide();
        }).fail(function(e) {
            Swal.fire(
                'Error',
                'An error occured. Please try again.',
                'error'
            );
            console.log(e.responseText);
        });
    }
    $(function() {
        document.querySelector("#submit").addEventListener("click", function(e) {
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
        form, {
            fields: {
                chain_name: {
                    validators: {
                        notEmpty: {
                            message: "Text input required."
                        }
                    }
                },
                chain_description: {
                    validators: {
                        notEmpty: {
                            message: "Text input required."
                        }
                    }
                },
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
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
    KTImageInput.createInstances();
</script>