<?php

    include "../../../../cores/inc/config_c.php";
    include "../../../../cores/inc/var_c.php";
    include "../../../../cores/inc/functions_c.php";
    include "../../../../cores/inc/auth_c.php";

    $id = $_GET['id'];

    $u_set = $_SESSION['u_set'];
    $query = "SELECT * FROM `_brands` WHERE `u_set`='$u_set' AND `status`='active'";
    $result = mysqli_query($link,$query);

    $query = "SELECT * FROM `category_tbl` WHERE `cat_id`='$id'";
    $category_result = mysqli_query($link,$query);
    $category = mysqli_fetch_assoc($category_result);

?>
<div id="uploadStatus"></div>
<div id="formbox">
    <form id="uploadForm" method="POST" enctype="multipart/form-data" >
        <div class="fv-row mb-10">
            <label for="brand" class="required form-label">Brand Name</label>
            <select class="form-control" data-control="select2"
            name="brand" id="brand" required>
            <?php
                while($row = mysqli_fetch_assoc($result)) {
                    $selected = "";
                    if($category['cat_brand'] == $row['id']) {
                        $selected = "selected";
                    }
                    echo "<option value='".$row['id']."' $selected>".$row['name']."</option>";
                }
            ?>
            </select>
        </div>
        <div class="fv-row mb-10">
            <label for="cat_name" class="required form-label">Category Name</label>
            <input type="text" class="form-control form-control-solid" name="cat_name"
             id="cat_name" value="<?php echo $category['cat_name'];?>" placeholder="Enter Category Name"/>
        </div>
        <input name="id" value="<?php echo $id;?>" hidden/>
        <button class="btn btn-primary" id="submit" type="submit">Submit</button>	 
    </form>
</div>
<script>
    function submitForm(formData){                
        $.ajax({
            type:'POST',
            url: "gears/update_category.php",
            data: formData,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false
        }).done(function (data) {
            Swal.fire(
                'Success',
                'Category updated successfully!',
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
                brand: {
                    validators: {
                        notEmpty: {
                            message: "Please select an option."
                        }
                    }
                },
                cat_name: {
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
</script>