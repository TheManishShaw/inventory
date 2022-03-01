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
        <div class="form-group my-4">
            <input type="file" id="image" name="image" required/>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Please provide a logo image of the brand."></i>
            <img src="../../../data/brand_img/<?php echo $row['image'];?>" width="150px" height="150px" alt="Brand Logo" />
            <input type="text" name="old_image" value="<?php echo $row['image'];?>" hidden/>
            <input type="text" name="id" value="<?php echo $id;?>" hidden/>
        </div>
        <button class="btn btn-primary" id="submit" type="submit">Submit</button>	 
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
</script>