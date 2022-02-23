<?php
include "../cores/inc/config_c.php";
include "../cores/inc/functions_c.php";
include "../cores/inc/auth_c.php";
include "../cores/inc/var_c.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard – <?php echo $sys_title ?></title>

    <?php include "../cores/inc/header_c.php" ?>
</head>

<body id="kt_body" class="aside-enabled">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            <div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside"
                data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
                data-kt-drawer-toggle="#kt_aside_mobile_toggle">
                <?php include "../cores/inc/nav_c.php" ?>
            </div>
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <?php include "../cores/inc/top_c.php" ?>
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <div id="kt_content_container" class="container-fluid">
                        <!--begin::Product List-->
                        <div class="card card-flush  flex-row-fluid p-6 ">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Create Product</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <form data-toggle="validator" action="../insert_product.php" method="POST" id="uploadForm"
                                autocomplete="off" enctype="multipart/form-data">
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name *</label>
                                            <input type="text" class="form-control" placeholder="Enter Name"
                                                data-errors="Please Enter Name." name="name" id="name" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>HSN Code *</label>
                                            <input type="text" class="form-control" placeholder="Enter HSN Code"
                                                data-errors="Please Enter Code." name="code" id="code" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category *</label>
                                            <select name="category" data-control="select2" id="category" data-placeholder="Choose a category"
                                                class="form-control">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Brand *</label>
                                            <select name="brand" id="brand" data-control="select2" class="form-control"
                                                data-style="py-0" data-placeholder="Please Select a Brand" required>
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Barcode Symbology *</label>
                                            <select name="bar" id="bar" class="form-control" data-control="select2"
                                                data-style="py-0" data-errors="Please Select Barcode" required>
                                                <option value="CREM01">CREM01</option>
                                                <option value="UM01">UM01</option>
                                                <option value="SEM01">SEM01</option>
                                                <option value="COF01">COF01</option>
                                                <option value="FUN01">FUN01</option>
                                                <option value="DIS01">DIS01</option>
                                                <option value="NIS01">NIS01</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> Product Cost *</label>
                                            <input type="text" class="form-control" placeholder="Enter Cost"
                                                data-errors="Please Enter Cost." name="cost" id="cost" onkeydown="return ( event.ctrlKey || event.altKey 
																											|| (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
																											|| (95<event.keyCode && event.keyCode<106)
																											|| (event.keyCode==8) || (event.keyCode==9) 
																											|| (event.keyCode>34 && event.keyCode<40) 
																											|| (event.keyCode==46) || (event.keyCode == 190) )" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sales Price *</label>
                                            <input type="text" class="form-control" placeholder="Enter Price"
                                                data-errors="Please Enter Price." name="price" id="price" onkeydown="return ( event.ctrlKey || event.altKey 
																											|| (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
																											|| (95<event.keyCode && event.keyCode<106)
																											|| (event.keyCode==8) || (event.keyCode==9) 
																											|| (event.keyCode>34 && event.keyCode<40) 
																											|| (event.keyCode==46)  || (event.keyCode==190))" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Unit *</label>
                                            <select name="unit" id="unit" class="form-control"
                                                data-style="py-0" data-control="select2">
                                                <option selected disabled>Choose product Unit</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sale Unit *</label>
                                            <select name="sale" id="sale" class="form-control"
                                                data-style="py-0" data-control="select2">
                                                <option selected disabled>Choose Sale Unit</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Purchase Unit *</label>
                                            <select name="purchase" id="purchase" class="form-control"
                                                data-style="py-0" data-control="select2">
                                                <option selected disabled>Choose Purchase Unit</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tax Method *</label>
                                            <select name="tax" id="tax" class="form-control"
                                                data-style="py-0" data-control="select2">
                                                <option value="Exclusive">Exclusive</option>
                                                <option value="Inclusive" selected>Inclusive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>GST *</label>
                                            <select name="sale_tax" id="sale_tax" class="form-control"
                                                data-style="py-0" data-control="select2" data-placeholder="Choose GST">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label>Stock Alert *</label>
                                            <input type="number" name="stock_alert" id="quantity" value="2"
                                                class="form-control" onkeydown="return ( event.ctrlKey || event.altKey 
																											|| (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
																											|| (95<event.keyCode && event.keyCode<106)
																											|| (event.keyCode==8) || (event.keyCode==9) 
																											|| (event.keyCode>34 && event.keyCode<40) 
																											|| (event.keyCode==46) )" placeholder="Enter Quantity" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-5">
                                    <div class="form-group">
                                        <label>Description / Product Details</label>
                                        <textarea name="descp" id="descp" class="form-control" rows="4"></textarea>
                                    </div>
                                </div>
                                <button type="submit" name="submit" id="submit" class="btn btn-primary mr-2">Add
                                    Product</button>
                                <button type="reset" class="btn btn-danger">Reset</button>


                                <div class="col-md-4 mt-4">
                                    <div class="card">
                                        <div class="card-body p-4">
                                            <div class="field" align="left">
                                                <h3>Upload your images</h3>
                                                <input type="file" id="files" name="files[]" multiple />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <!--end::Card body-->
                        </div>

                    </div>
                </div>
                <?php include "../cores/inc/copy_c.php" ?>
            </div>
        </div>
    </div>
</body>
<?php include "../cores/inc/footer_c.php" ?>

</html>