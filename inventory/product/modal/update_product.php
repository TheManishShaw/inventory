<?php
include "../../../cores/inc/config_c.php";
include "../../../cores/inc/functions_c.php";
include "../../../cores/inc/auth_c.php";
include "../../../cores/inc/var_c.php";

$u_set = $_SESSION['u_set'];

$id = $_GET['id'];

$query = "SELECT * FROM `category_tbl` WHERE `cat_uset`='$u_set' AND `status`='active'";
$cat_result = mysqli_query($link,$query);

$query = "SELECT * FROM `_brands` WHERE `u_set`='$u_set' AND `status`='active'";
$brand_result = mysqli_query($link,$query);

$query = "SELECT * FROM `_tblunits` WHERE `u_set`='$u_set' AND `status`='active'";
$unit_result = mysqli_query($link,$query);

$query = "SELECT * FROM `tax_tbl` WHERE `u_set`='$u_set' AND `status`='active'";
$tax_result = mysqli_query($link,$query);

$query = "SELECT * FROM `_tblproducts` WHERE `id`='$id'";
$product_result = mysqli_query($link,$query);
$product = mysqli_fetch_assoc($product_result);

?>
<form data-toggle="validator" action="gears/create_backend.php" method="POST" id="uploadForm"
    autocomplete="off" enctype="multipart/form-data">
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="form-group fv-row">
                <label class="required form-label">Name </label>
                <input type="text" class="form-control" placeholder="Enter Name" value="<?php echo $product['name'];?>"
                    name="name" id="name" oninput="inputLimiter(this)" data-regex="[^a-zA-Z ]" required>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group fv-row">
                <label class="required form-label">HSN Code </label>
                <input type="text" class="form-control" placeholder="Enter HSN Code"
                    value="<?php echo $product['code'];?>" name="code" id="code" required>
                <div class="help-block with-errors"></div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="form-group fv-row">
                <label class=" form-label"> 
                <span class="required">Category</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Select the product category and if you don't have then create a category first"></i>
                </label>
                <select name="category" data-control="select2" id="category" data-placeholder="Choose a category"
                    class="form-control">
                    <option value=""></option>
                    <?php
                        while($row = mysqli_fetch_assoc($cat_result)) {
                            $selected = '';
                            if ($product['category_id'] == $row['cat_id']) {
                                $selected = 'selected';
                            }
                            echo '<option value="'.$row['cat_id'].'" '.$selected.'>'.$row['cat_name'].'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group fv-row">
                <label class="form-label">
                    <span class="required">Brand</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Select the product brand and if you don't have then create a brand first"></i>
                </label>
                <select name="brand" id="brand" data-control="select2" class="form-control"
                data-style="py-0" data-placeholder="Please Select a Brand" >
                <!-- data-style="py-0" data-placeholder="Please Select a Brand" required> -->
                <option value=""></option>
                <?php
                    while($row = mysqli_fetch_assoc($brand_result)) {
                        $selected = '';
                        if ($product['brand_id'] == $row['id']) {
                            $selected = 'selected';
                        }
                        echo '<option value="'.$row['id'].'" '.$selected.'>'.$row['name'].'</option>';
                    }
                ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="form-group fv-row">
                <label class="required form-label">Barcode Symbology </label>
                <select name="bar" id="bar" class="form-control" data-control="select2"
                    data-style="py-0" data-errors="Please Select Barcode" required>
                    <option value="">Choose a barcode symbology...</option>
                    <option value="CREM01" <?php if ($product['type_barcode'] == 'CREM01') echo 'selected';?>>CREM01</option>
                    <option value="UM01" <?php if ($product['type_barcode'] == 'UM01') echo 'selected';?>>UM01</option>
                    <option value="SEM01" <?php if ($product['type_barcode'] == 'SEM01') echo 'selected';?>>SEM01</option>
                    <option value="COF01" <?php if ($product['type_barcode'] == 'COF01') echo 'selected';?>>COF01</option>
                    <option value="FUN01" <?php if ($product['type_barcode'] == 'FUN01') echo 'selected';?>>FUN01</option>
                    <option value="DIS01" <?php if ($product['type_barcode'] == 'DIS01') echo 'selected';?>>DIS01</option>
                    <option value="NIS01" <?php if ($product['type_barcode'] == 'NIS01') echo 'selected';?>>NIS01</option>
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group fv-row">
                <label class="required form-label"> Product Cost </label>
                <input type="text" class="form-control" placeholder="Enter Cost"
                    data-errors="Please Enter Cost." name="cost" id="cost" value="<?php echo $product['cost'];?>"
                    data-regex="[^0-9.]" oninput="inputLimiter(this)">
                <div class="help-block with-errors"></div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="form-group fv-row">
                <label class="required form-label">Sales Price </label>
                <input type="text" class="form-control" placeholder="Enter Price"
                    data-errors="Please Enter Price." name="price" id="price" value="<?php echo $product['price'];?>"
                    data-regex="[^0-9.]" oninput="inputLimiter(this)">
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group fv-row">
                <label class="required form-label">Product Unit </label>
                <select name="unit" id="unit" class="form-control"
                    data-style="py-0" data-control="select2">
                    <option value="" selected disabled>Choose product Unit</option>
                    <?php
                        while($row = mysqli_fetch_assoc($unit_result)) {
                            $selected = '';
                            if ($product['unit_id'] == $row['id']) {$selected = 'selected';}
                            echo '<option value="'.$row['id'].'" '.$selected.'>'.$row['name'].' ('.$row['ShortName'].')'.'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="form-group fv-row">
                <label class="required form-label">Tax Method </label>
                <select name="tax" id="tax" class="form-control"
                    data-style="py-0" data-control="select2">
                    <option value="Exclusive" <?php if ($product['tax_method']=='Exclusive'){echo 'selected';} ?>>Exclusive</option>
                    <option value="Inclusive" <?php if ($product['tax_method']=='Inclusive'){echo 'selected';} ?>>Inclusive</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group fv-row">
                <label class="required form-label">GST </label>
                <select name="sale_tax" id="sale_tax" class="form-control"
                    data-style="py-0" data-control="select2" data-placeholder="Choose GST">
                    <option value="" hidden>Choose an option...</option>
                    <?php
                        while($row = mysqli_fetch_assoc($tax_result)) {
                            $selected = '';
                            if ($row['tax_percent']==$product['tax']){
                                $selected = 'selected';
                            }
                            echo '<option value="'.$row['tax_percent'].'" '.$selected.'>'.$row['tax_name'].'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-6 mt-4">
            <div class="form-group fv-row">
                <label class="form-label">
                    <span class="required">Stock Alert</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Stock alert is the quantity after which the system will notify you to restock."></i>
            </label>
                <input type="number" name="stock_alert" id="quantity" value="<?php echo $product['stock_alert'];?>"
                    class="form-control" data-regex="[^0-9]" oninput="inputLimiter(this)">
                <div class="help-block with-errors"></div>
            </div>
        </div>
    </div>

    <div class="col-md-12 mb-5">
        <div class="form-group fv-row">
            <label>
                <span>Description / Product Details</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" 
                title="Give a brief description of your product."></i>
            </label>
            <textarea name="descp" id="descp" class="form-control" rows="4"><?php
                echo $product['note'];
            ?></textarea>
        </div>
    </div>
    <div class="col-md-4 my-4">
        <div class="card">
            <div class="card-body p-4">
                <div class="field" align="left">
                    <h3>Upload your images</h3>
                    <input type="file" id="files" name="files[]" multiple />
                </div>
            </div>
        </div>
    </div>
    <input type="text" name="id" value="<?php echo $id;?>" hidden/>

    <button type="submit" name="submit" id="submit" class="btn btn-primary mr-2">Add
        Product</button>
    <button type="reset" class="btn btn-danger">Reset</button>
    
</form>
<script>
    function submitForm(formData){                
        $.ajax({
            type:'POST',
            url: "gears/update_product.php",
            data: formData,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false
        }).done(function (data) {
            console.log(data);
            Swal.fire(
                'Success',
                'Product updated successfully!',
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
                code: {
                    validators: {
                        notEmpty: {
                            message: "Text input required."
                        }
                    }
                },
                category: {
                    validators: {
                        notEmpty: {
                            message: "Please select an option."
                        }
                    }
                },
                brand: {
                    validators: {
                        notEmpty: {
                            message: "Please select an option."
                        }
                    }
                },
                bar: {
                    validators: {
                        notEmpty: {
                            message: "Please select an option."
                        }
                    }
                },
                cost: {
                    validators: {
                        notEmpty: {
                            message: "Numeric input required."
                        },
                        digit: {
                            message: "Please enter numbers only."
                        }
                    }
                },
                price: {
                    validators: {
                        notEmpty: {
                            message: "Numeric input required."
                        },
                        digit: {
                            message: "Please enter numbers only."
                        }
                    }
                },
                unit: {
                    validators: {
                        notEmpty: {
                            message: "Text input required."
                        }
                    }
                },
                sale_tax: {
                    validators: {
                        notEmpty: {
                            message: "Please select an option."
                        }
                    }
                },
                stock_alert: {
                    validators: {
                        notEmpty: {
                            message: "Please enter a number."
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
    function inputLimiter(element) {
        let regex = new RegExp(element.getAttribute('data-regex'));
        element.value = element.value.replace(regex,'');
    }
</script>