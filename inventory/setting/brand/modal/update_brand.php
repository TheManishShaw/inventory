<?php

    include "../../../../cores/inc/config_c.php";
    include "../../../../cores/inc/var_c.php";
    include "../../../../cores/inc/functions_c.php";
    include "../../../../cores/inc/auth_c.php";

    $id = $_GET['id'];

    $query = "SELECT * FROM `_brands` WHERE `id`='$id'";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die('Could not fetch brand. '.mysqli_error($link));
    }

    $row = mysqli_fetch_assoc($result);

?>
<div id="formbox">
    <form id="uploadForm" method="POST" enctype="multipart/form-data" >
        <div class="fv-row mb-10">
            <label for="name" class="required form-label">Brand Name</label>
            <input type="text" class="form-control form-control-solid" name="name" 
            value="<?php echo $row['name'];?>" id="name" placeholder="Enter Brand Name"/>
        </div>
        <div class="fv-row mb-10">
            <label for="description" class="required form-label">Brand Description</label>
            <textarea name="description" id="description" cols="30" rows="5"
            placeholder="Enter Brand Description" class="form-control form-control-solid"><?php echo $row['description'];?></textarea>
        </div>
        <div class="form-group text-center my-4">
            <!--begin::Image input-->
            <div class="image-input image-input-circle" data-kt-image-input="true" style="background-image: url(../../../data/no-image.png)">
                <!--begin::Image preview wrapper-->
                <?php if ($row['image']=='') { ?>
                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url(../../../data/no-image.png"></div>
                <?php } else { ?>
                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url(../../../data/brand_img/<?php echo $row['image'];?>)"></div>
                <?php } ?>
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
                    <input type="text" name="old_image" value="<?php echo $row['image'];?>" hidden/>
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
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Please provide a logo image of the brand."></i>
        </div>
        <button class="btn btn-primary" id="submit" type="submit">Submit</button>	 
        <input type="text" name="id" value="<?php echo $id;?>" hidden/>
    </form>
</div>
<script>
    function submitForm(formData){                
        $.ajax({
            type:'POST',
            url: "gears/update_brand.php",
            data: formData,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false
        }).done(function (data) {
            Swal.fire(
                'Success',
                'Brand updated successfully!',
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
                name: {
                    validators: {
                        notEmpty: {
                            message: "Text input required."
                        }
                    }
                },
                description: {
                    validators: {
                        notEmpty: {
                            message: "Text input is requred."
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

    KTImageInput.createInstances();
</script>