<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $id = $_GET['id'];
    $u_set = $_SESSION['u_set'];

    $query = "SELECT `discount_type`,`discount` FROM `stock_tbl` WHERE `product_id` = '$id' AND `store_id`='$u_set'";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die("Could not fetch product details. ".mysqli_error($link));
    }
    $row = mysqli_fetch_assoc($result);

?>
<form id="discount-form">
    <div class="form-group fv-row">
        <label>Discount Type</label>
        <select name="discount_type" class="form-control mb-3">
            <option value="percent" <?php if ($row['discount_type']=='percent') echo 'selected';?>>Percent</option>
            <option value="fixed" <?php if ($row['discount_type']=='fixed') echo 'selected';?>>Fixed</option>
        </select>
    </div>
    <div class="form-group fv-row">
        <label for="discount">Discount</label>
        <input type="text" name="discount" class="form-control" id="discount" 
        placeholder="Enter discount" value="<?php echo $row['discount']; ?>" />
    </div>
    <input type="text" name="id" value="<?php echo $id; ?>" hidden />
    <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
</form>

<script>
    function submitForm(formData){                
        $.ajax({
            type:'POST',
            url: "gears/edit_product.php",
            data: formData,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false
        }).done(function (data) {
            Swal.fire(
                'Success',
                'Discount updated successfully!',
                'success'
            );
            let product = JSON.parse(data).data;
            updateDiscount(product.product_id,product.discount_type,product.discount);

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
            let formData = new FormData($('#discount-form')[0]);
            if (validator) {
                validator.validate().then(function(status) {
                    if (status == "Valid") {
                        submitForm(formData);
                    }
                });
            }
        });
    });

    var form = document.querySelector("#discount-form");

    var validator = FormValidation.formValidation(
        form,
        {
            fields: {
                discount_type: {
                    validators: {
                        notEmpty: {
                            message: "Please select an option."
                        }
                    }
                },
                discount: {
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

    $('#discount').on('input',function(){
        this.value = this.value.replace(/[^0-9.]/,'');
    });
</script>