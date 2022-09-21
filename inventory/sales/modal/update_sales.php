<?php
    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";
    include "../../../cores/inc/var_c.php";

    $u_set = $_SESSION['u_set'];
    $sale_id = $_GET['id'];

    $query = "SELECT * FROM `users_tbl` WHERE `u_type`='GRP03' AND `u_set`='$u_set' AND `u_stats`='active'";
    $result = mysqli_query($link,$query);
    if (!$result){
        die('Could not fetch customers. '.mysqli_error($link));
    }

    $query = "SELECT * FROM  `_tblsales` WHERE `sale_id`='$sale_id'";
    $saleResult = mysqli_query($link,$query);
    if (!$saleResult) {
        die("Could not fetch sale. ".mysqli_error($link));
    }
    $saleRow = mysqli_fetch_assoc($saleResult);

    $query = "SELECT `_tblsales_details`.`quantity`,`_tblsales_details`.`product_id`,`net_tax`,
    `total_amount`,`_tblproducts`.`code`,`_tblproducts`.`name`,`_tblproducts`.`price`,
    `stock_tbl`.`stock` FROM `_tblsales_details` INNER JOIN `_tblproducts` ON 
    `_tblsales_details`.`product_id`=`_tblproducts`.`id` LEFT JOIN `stock_tbl` ON 
    `_tblsales_details`.`product_id`=`stock_tbl`.`product_id` AND `stock_tbl`.`store_id`='$u_set'
     WHERE `sale_id`='$sale_id' AND `_tblsales_details`.`status`='active'";
    $productResult = mysqli_query($link,$query);
    if (!$productResult) {
        die("Could not fetch Sales Details. ".mysqli_error($link));
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Sales – <?php echo $sys_title ?></title>

    <?php include "../../../cores/inc/header_c.php";?>
</head>

<body id="kt_body" class="aside-enabled">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            <div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside"
                data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
                data-kt-drawer-toggle="#kt_aside_mobile_toggle">
                <?php include "../../../cores/inc/nav_c.php" ?>
            </div>
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <?php include "../../../cores/inc/top_c.php" ?>
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <div id="kt_content_container" class="container-fluid">
                        <!--begin::Update Sales-->
                        <div class=" card-flush  flex-row-fluid">
                            <!--begin::Card header-->
                            <div class="">
                                <div class="card-title">
                                    <h2>Update Sales</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <form data-toggle="validator" action="../gears/update_sales.php" method="POST" id="uploadForm"
                                autocomplete="off" enctype="multipart/form-data">
                                <div class="row my-4">
                                    <div class="col-6">   
                                        <input type="text" name="sale_id" value="<?php echo $sale_id;?>" hidden/>
                                        <label class="fw-bolder" for="date">Date</label>
                                        <input type="text" id="date" value="<?php echo date('d-m-Y H:i:s',strtotime($saleRow['date']));?>"
                                        placeholder="Enter Date" class="form-control" name="date" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label class="fw-bolder" for="supply">Customer</label>
                                        <select class="form-control" data-control="select2" id="customer"
                                         data-placeholder="Choose customer..." name="customer" required>
                                        <option value="walk-in">Walk-in Customer</option>
                                        <?php
                                            while($row = mysqli_fetch_assoc($result)){
                                                $selected = '';
                                                if ($row['u_id']==$saleRow['client_id']) {
                                                    $selected = 'selected';
                                                }
                                                echo '<option value="'.$row['u_id'].'" '.$selected.'
                                                >'.$row['f_name'].' '.$row['l_name'].'</option>';
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <label class="fw-bolder" for="search">Product</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-search fs-4"></i>
                                            </span>
                                            <div class="flex-grow-1">
                                                <select id="products" class="form-select rounded-start-0" 
                                                    data-control="select2" data-placeholder="Choose products by code or name.">
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="search-results" style="height: 180px;" class="list-group overflow-auto d-none">
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-row-dashed mb-4" id="product_list">
                                        <label class="fw-bolder">Order Items</label>
                                    <thead class="table-light">
                                        <tr class="text-center text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                            <!-- <th scope="col">ID</th> -->
                                            <th class="px-3">Product</th>
                                            <th scope="col">Net unit Price</th>
                                            <th scope="col">Stock</th>
                                            <th style="width: 110px;" scope="col">Quantity</th>
                                            <!-- <th scope="col">Discount</th> -->
                                            <th scope="col">GST</th>
                                            <th scope="col">Subtotal</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody style="max-height:250px;overflow:auto;">
                                    <?php
                                        while($productsRow = mysqli_fetch_assoc($productResult)){
                                            ?>
                                            <tr class="text-center product-row" id="product<?php echo $productsRow['product_id'];?>">
                                                <td class="px-3"><p><?php echo $productsRow['name'];?></p><span class="badge badge-success"><?php echo $productsRow['code'];?></span>
                                                <input name="product_id[]" value="<?php echo $productsRow['product_id'];?>" hidden/>
                                                <input name="product_code[]" value="<?php echo $productsRow['code'];?>" hidden/>
                                                <input name="product_name[]" value="<?php echo $productsRow['name'];?>" hidden/>
                                                </td>
                                                <td class="product-price"><?php echo $productsRow['price'];?></td>
                                                <td class="product-stock"><?php echo $productsRow['stock'];?></td>
                                                <td>
                                                    <div class="position-relative w-md-100px" data-kt-dialer="true" data-kt-dialer-min="1" data-kt-dialer-max="50000" data-kt-dialer-step="1" data-kt-dialer-prefix="" data-kt-dialer-decimals="0">
                                                    <!--begin::Decrease control-->
                                                    <button type="button" class="btn btn-decrease btn-quantity btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                                        <span class="svg-icon svg-icon-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                                                <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                    <!--end::Decrease control-->
                                                    <!--begin::Input control-->
                                                    <input type="text" class="form-control form-control-solid product-quantity border-0 ps-12" placeholder="Amount" 
                                                    name="quantity[]" value="<?php echo $productsRow['quantity'];?>" />
                                                    <input type="text" name="old_quantity[]" value="<?php echo $productsRow['quantity']; ?>" hidden />
                                                    <!--end::Input control-->
                                                    <!--begin::Increase control-->
                                                    <button type="button" class="btn btn-increase btn-quantity btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                                        <span class="svg-icon svg-icon-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                    <!--end::Increase control-->
                                                    </div>
                                                </td>
                                                <td><span class="product-tax"><?php echo $productsRow['net_tax'];?></span>
                                                    <input class="product-tax-input" name="tax[]" 
                                                    value="<?php echo $productsRow['net_tax'];?>" hidden/>
                                                    <input class="product-tax-single" 
                                                    value="<?php echo $productsRow['net_tax']/$productsRow['quantity'];?>" hidden/>
                                                </td>
                                                <td><span class="product-subtotal">
                                                    <?php
                                                        echo $productsRow['total_amount'];
                                                    ?>
                                                    </span>
                                                    <input class="product-subtotal-input" name="subtotal[]" value="<?php
                                                    echo $productsRow['total_amount'];?>" hidden/>
                                                    <input class="product-subtotal-single" 
                                                    value="<?php echo $productsRow['total_amount']/$productsRow['quantity'];?>" hidden/>
                                                </td>
                                                <td>
                                                    <a title="Delete" data-id="<?php echo $productsRow['product_id'];?>" class="item-remove"><i class="fas fa-times-circle fs-2 text-danger"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                    </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div style="height: auto; float: right; padding: 10px;">
                                            <div class="px-2" style="background-color: #f5f5f5;">
                                                <div class="input-group">
                                                    <label class="mt-1 pl-1" for="order_tax_disp"
                                                        style="width: 100px;">GST :</label>
                                                    <input class="text-end" id="tax_disp" readonly value="<?php echo $saleRow['net_tax']; ?>"
                                                    style="width: 150px; background-color: #f5f5f5; border: none"/>
                                                    <input type="number" name="total_tax" id="total_tax"
                                                     value="<?php echo $saleRow['net_tax'];?>" readonly hidden/>
                                                    <i class="fas fa-rupee-sign mt-2"></i>
                                                </div>
                                            </div>
                                            <div class="px-2 input-group">
                                                <label class="mt-1 pl-1" for="discount_disp" style="width: 100px;">Discount
                                                    :</label>
                                                    <?php
                                                        if ($saleRow['discount_method']=='percent') {
                                                            $discount = $saleRow['total_amount'] * $saleRow['discount'] / 100;
                                                        } else {
                                                            $discount = $saleRow['discount'];
                                                        }
                                                    ?>
                                                    <input class="text-end" id="discount_disp" style="width: 150px; border: none;"
                                                    value="<?php echo $discount; ?>" readonly disabled/>
                                                <input type="number" class="text-end" name="total_discount"
                                                 id="total_discount" value="<?php echo $discount;?>" readonly hidden/>
                                                <i class="fas fa-rupee-sign mt-2"></i>
                                            </div>
                                            <div class="px-2 input-group" style="background-color: #f5f5f5;">
                                                <label class="mt-1 pl-1" for="grand_total" style="width: 100px;"><b>Grand
                                                        Total :</b></label>
                                                <input class="text-end" style="width: 150px; background-color: #f5f5f5; border: none"
                                                value="<?php echo $saleRow['total_amount'];?>" readonly id="grandtotal_disp"/>
                                                <input type="number" name="grand_total" id="grand_total" 
                                                value="<?php echo $saleRow['total_amount'];?>" readonly hidden/>
                                                <i class="fas fa-rupee-sign mt-2"></i>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                
                                    <div class="col-md-3">
                                    <label>Discount</label>
                                    <div class="input-group">
                                        <select class="form-control" id="discount-select" name="discount_type">
                                            <option class="form-control" value="fixed" 
                                            <?php if($saleRow['discount_method']=='fixed') echo 'selected'; ?>>Fixed</option>
                                            <option class="form-control" value="percent"
                                            <?php if($saleRow['discount_method']=='percent') echo 'selected'; ?>>Percent</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                <label>Discount Amount</label>
                                <div role="group" class="input-group">
                                    <input type="text" class="form-control" id="discount" name="discount" 
                                    value="<?php echo $saleRow['discount'];?>" required>
                                    <a class="btn bg-primary"><i class="fas text-white fa-rupee-sign"></i></a>
                                </div>
                                </div>
                            <div class="col-md-4 mb-2">
                                <label for="validationCustom02">Payment Status</label>

                                <select class="form-control mb-3" name="payment_status">

                                <option value="paid" 
                                <?php if($saleRow['payment_status']=='paid') echo 'selected';?>>Paid</option>
                                <!--<option value="2">Partial</option>-->
                                <option value="pending" 
                                <?php if($saleRow['payment_status']=='pending') echo 'selected';?>>Pending</option>
                                </select>
                            </div>

                                </div><br>

                            <div class="row">
                            <div class="col-md-4 mb-2">
                                <label for="validationCustom02">Amount</label>
                                <div role="group" class="input-group">
                                <input type="text" class="form-control" data-regex="[^0-9.]"
                                 value="<?php echo $saleRow['paid_amount'];?>" name="amount" id='amount-input'>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Payment Choice</label>
                                <div class="form-group" id="payment-choice">
                                <div class="ml-2 btn-group" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                                        <?php
                                            $active = '';
                                            $checked = '';
                                            if ($saleRow['payment_method']=='cash') {
                                                $active = 'active';
                                                $checked = 'checked';
                                            }
                                        ?>
                                        <label class="btn btn-outline-success <?php echo $active?>" data-kt-button="true">
                                            <input class="btn-check" type="radio" name="payment_method" id="cash" value="cash"
                                             autocomplete="off" checked="<?php echo $checked;?>"> Cash
                                        </label>
                                        <?php
                                            $active = '';
                                            $checked = '';
                                            if ($saleRow['payment_method']=='card') {
                                                $active = 'active';
                                                $checked = 'checked';
                                            }
                                        ?>
                                        <label class="btn btn-outline-primary <?php echo $active;?>" data-kt-button="true">
                                            <input class="btn-check" type="radio" name="payment_method" id="card" value="card"
                                            <?php echo $checked;?> autocomplete="off"> Card
                                        </label>
                                        <?php
                                            $active = '';
                                            $checked = '';
                                            if ($saleRow['payment_method']=='upi') {
                                                $active = 'active';
                                                $checked = 'checked';
                                            }
                                        ?>
                                        <label class="btn btn-outline-info <?php echo $active;?>" data-kt-button="true">
                                            <input class="btn-check" type="radio" name="payment_method" id="upi" value="upi" 
                                            <?php echo $checked;?> autocomplete="off"> UPI
                                        </label>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-1 d-flex align-items-end">
                            <?php if ($saleRow['split_payment_method']==''){?>
                                <button type="button" id="split" class="btn btn-primary mb-3">Split</button>
                                <?php } else {?>
                                    <button type="button" id="split-remove" class="btn btn-danger mb-3">
                                        <i class="fas fa-trash fs-2 ms-1"></i>
                                    </button>
                                <?php
                                    }?>
                            </div>
                                </div>
                                <div id="split-amount-div" class="row">
                                <?php
                                        if ($saleRow['split_payment_method']!=''){
                                            ?>
                                                <div class="col-md-4 mb-2">
                                                    <label for="validationCustom02">Amount</label>
                                                    <div role="group">
                                                    <input type="text" class="form-control"
                                                    value="<?php echo $saleRow['split_amount'];?>" disabled id="split-input">
                                                    <input type="text" value="<?php echo $saleRow['split_amount'];?>"
                                                     class="form-control" name="split_amount" hidden id="split-input-hidden">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Payment Choice</label>
                                                    <div class="form-group">
                                                        <div class="ml-2 btn-group" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                                                            <?php
                                                                $active = '';
                                                                $checked = '';
                                                                if ($saleRow['split_payment_method']=='cash') {
                                                                    $active = 'active';
                                                                    $checked = 'checked';
                                                                }
                                                            ?>
                                                            <label class="btn btn-outline-success <?php echo $active;?>" data-kt-button="true">
                                                                <input class="btn-check" type="radio" name="split_payment_method" value="cash"
                                                                <?php echo $checked;?> autocomplete="off"> Cash
                                                            </label>
                                                            <?php
                                                                $active = '';
                                                                $checked = '';
                                                                if ($saleRow['split_payment_method']=='card') {
                                                                    $active = 'active';
                                                                    $checked = 'checked';
                                                                }
                                                            ?>
                                                            <label class="btn btn-outline-primary <?php echo $active;?>" data-kt-button="true">
                                                                <input class="btn-check" type="radio" name="split_payment_method" value="card" 
                                                                <?php echo $checked;?> autocomplete="off"> Card
                                                            </label>
                                                            <?php
                                                                $active = '';
                                                                $checked = '';
                                                                if ($saleRow['split_payment_method']=='upi') {
                                                                    $active = 'active';
                                                                    $checked = 'checked';
                                                                }
                                                            ?>
                                                            <label class="btn btn-outline-info <?php echo $active;?>" data-kt-button="true">
                                                                <input class="btn-check" type="radio" name="split_payment_method" value="upi" 
                                                                <?php echo $checked;?> autocomplete="off" checked> UPI
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                    ?>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="email">Notes</label>
                                        <textarea type="textarea" class="form-control" 
                                        rows="5" id="notes" name="notes"><?php echo $saleRow['notes'];?></textarea>
                                    </div>
                                </div>
                                <button type="submit" name="pursubmit" class="btn btn-success mt-3">Submit</button>
                            </form>
                            <!--end::Card body-->
                        </div>

                    </div>
                </div>
                <?php include "../../../cores/inc/copy_c.php" ?>
            </div>
        </div>
    </div>
	<?php include "../../../cores/inc/footer_c.php" ?>
    <script>
        $.ajax({
            url: "../gears/product_fetch.php",
            dataType: 'html'
        }).done(function(data) {
            let products = JSON.parse(data).data;
            products.forEach(function(item) {
                $('#products').append(`
                    <option value='` + JSON.stringify(item) + `'>` + item.name + ` - ` + item.cat_name + ` - ` + item.code + `</option>
                `);
            });
        }).fail(function(e) {
            console.log(e.responseText);
        });

        var productsAdded = [];         // An array to contain id of all the products added.
        function addProduct(item){
            if (item.stock == null) {
                item.stock = 0;
            }
            let tax = 0;
            let subtotal = 0;
            if (item.tax_method == "Inclusive") {
                tax = (item.price - (Number(item.price)*100)/(100+Number(item.tax))).toFixed(2);
                subtotal = Number(item.price).toFixed(2)
            } else if (item.tax_method == "Exclusive") {
                tax = (item.price * item.tax / 100).toFixed(2);
                subtotal = (Number(item.price) + Number(tax)).toFixed(2);
            }
            if (productsAdded.indexOf(item.id)==-1){
                productsAdded.push(item.id);
                $('tbody').append(`
                <tr class="text-center product-row" id="product`+item.id+`">
                    <td class="px-3"><p>`+item.name+`</p><span class="badge badge-success">`+item.code+`</span>
                    <input name="product_id[]" value="`+item.id+`" hidden/>
                    <input name="product_code[]" value="`+item.code+`" hidden/>
                    <input name="product_name[]" value="`+item.name+`" hidden/>
                    </td>
                    <td class="product-price">`+item.price+`</td>
                    <td class="product-stock">`+item.stock+`</td>
                    <td>
                        <div class="position-relative w-md-100px" data-kt-dialer="true" data-kt-dialer-min="1" data-kt-dialer-max="50000" data-kt-dialer-step="1" data-kt-dialer-prefix="" data-kt-dialer-decimals="0">
                        <!--begin::Decrease control-->
                        <button type="button" class="btn btn-decrease btn-quantity btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0" data-kt-dialer-control="decrease">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                    <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </button>
                        <!--end::Decrease control-->
                        <!--begin::Input control-->
                        <input type="text" class="form-control form-control-solid product-quantity border-0 ps-12" placeholder="Amount" name="quantity[]" value="1" />
                        <!--end::Input control-->
                        <!--begin::Increase control-->
                        <button type="button" class="btn btn-increase btn-quantity btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </button>
                        <!--end::Increase control-->
                        </div>
                    </td>
                    <td><span class="product-tax">`+tax+`</span>
                        <input class="product-tax-input" name="tax[]" value="`+tax+`" hidden/>
                        <input class="product-tax-single" value="`+tax+`" hidden/>
                    </td>
                    <td><span class="product-subtotal">`+
                        subtotal+`</span>
                        <input class="product-subtotal-input" name="subtotal[]" value="`+subtotal+`" hidden/>
                        <input class="product-subtotal-single" value="`+subtotal+`" hidden/>
                    </td>
                    <td>
                        <a title="Delete" data-id="`+item.id+`" class="item-remove"><i class="fas fa-times-circle fs-2 text-danger"></i></a>
                    </td>
                </tr>
                `);
            } else {
                Swal.fire(
                    'Item Already added!',
                    'You can increase the quantity of the product.',
                    'warning'
                );
            }
            cartTotal();
        }
        
        $('#products').on('change', function() {
            addProduct(JSON.parse(this.value));
            $('#products').val(null);
        });

        function cartTotal(){
            let totalAmount = 0, totalTax = 0;
            let discount = document.querySelector('#discount').value;
            let products = Array.from(document.querySelectorAll('.product-row'));
            products.forEach(function(item){
                totalAmount += Number($(item).find('.product-subtotal-input').val());
                totalTax += Number($(item).find('.product-tax-input').val());
            });
            
            if ($('#discount-select').val() == 'fixed') {
                document.querySelector('#total_discount').value = Number(discount).toFixed(2);
                document.querySelector('#discount_disp').value = Number(discount).toFixed(2);
            } else if ($('#discount-select').val() == 'percent') {
                discount = (totalAmount * Number(discount) / 100).toFixed(2)
                document.querySelector('#total_discount').value = Number(discount);
                document.querySelector('#discount_disp').value = Number(discount);
            }
            totalAmount = totalAmount - discount;
            document.querySelector('#grand_total').value = (totalAmount).toFixed(2);
            document.querySelector('#grandtotal_disp').value = (totalAmount).toFixed(2);
            document.querySelector('#total_tax').value = (totalTax).toFixed(2);
            document.querySelector('#tax_disp').value = (totalTax).toFixed(2);
        }


        $('#search-products').on('input',function(){
            if (this.value == ''){
                document.querySelector('#search-results').classList.add('d-none');
            } else {
                document.querySelector('#search-results').classList.remove('d-none');
                search();
            }
        });

        $('table').on('click','.btn-quantity',function(){
            let quantity = $(this).siblings('.product-quantity').val();
            let tax = $(this).closest('tr').find('.product-tax-single').val();
            let subtotal = $(this).closest('tr').find('.product-subtotal-single').val();
            let stock = $(this).closest('tr').find('.product-stock').text();

            if ($(this).hasClass('btn-increase')) {
                if (Number(quantity) < Number(stock)){
                    quantity++;
                }
            } else if ($(this).hasClass('btn-decrease')) {
                if (quantity > 1){
                    quantity--;
                }
            }
            $(this).siblings('.product-quantity').val(quantity);
            tax = (tax * quantity).toFixed(2);
            subtotal = (subtotal*quantity).toFixed(2);

            $(this).closest("tr").find('.product-subtotal').text(subtotal);
            $(this).closest("tr").find('.product-subtotal-input').val(subtotal);

            $(this).closest("tr").find('.product-tax').text(tax);
            $(this).closest("tr").find('.product-tax-input').val(tax);

            cartTotal();
        });

        $('table').on('input',".product-quantity",function(){
            let quantity = this.value;
            console.log(quantity);
            this.value = this.value.replace(/[^0-9]/,'');
            if (this.value == ''){
                this.value = 1;
                quantity = 1;
            }
            let tax = $(this).closest('tr').find('.product-tax-single').val();
            let subtotal = $(this).closest('tr').find('.product-subtotal-single').val();
            let stock = $(this).closest('tr').find('.product-stock').text();

            tax = (tax * quantity).toFixed(2);
            subtotal = (subtotal*quantity).toFixed(2);

            $(this).closest("tr").find('.product-subtotal').text(subtotal);
            $(this).closest("tr").find('.product-subtotal-input').val(subtotal);

            $(this).closest("tr").find('.product-tax').text(tax);
            $(this).closest("tr").find('.product-tax-input').val(tax);

            cartTotal();
        });

        $('table').on('click','.item-remove',function(){
            $(this).closest('tr').remove();
            cartTotal();
            let id = this.getAttribute('data-id');
            productsAdded.splice(productsAdded.indexOf(id),1);
        });

        $("body").on('click','#split',function(){
            $("#split-amount-div").append(`<div class="col-md-4 mb-2">
                                    <label for="validationCustom02">Amount</label>

                                    <div role="group">
                                    <input type="text" class="form-control" disabled id="split-input">
                                    <input type="text" class="form-control" name="split_amount" hidden id="split-input-hidden">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Payment Choice</label>
                                    <div class="form-group">
                                        <div class="ml-2 btn-group" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                                            <label class="btn btn-outline-success" data-kt-button="true">
                                                <input class="btn-check" type="radio" name="split_payment_method" value="cash" autocomplete="off"> Cash
                                            </label>
                                            <label class="btn btn-outline-primary" data-kt-button="true">
                                                <input class="btn-check" type="radio" name="split_payment_method" value="card" autocomplete="off"> Card
                                            </label>
                                            <label class="btn btn-outline-info active" data-kt-button="true">
                                                <input class="btn-check" type="radio" name="split_payment_method" value="upi" autocomplete="off" checked> UPI
                                            </label>
                                        </div>
                                    </div>
                                </div>`);
                                
            $("#split").closest('.col-md-1').append(`<button type="button" class="btn btn-danger mb-3" id="split-remove"><i class="fas fa-times fs-2 ms-1"></i></button>`);
            $("#split").remove();
        });

        $("body").on('click','#split-remove',function(){
        $("#split-amount-div").html("");
            $("#split-remove").closest('.col-md-1').append(`<button type="button" id="split" class="btn btn-primary mb-3">Split</button>`);
            $("#split-remove").remove();
            $('#amount-input').val($('#grandtotal_disp').val());
        });

        document.querySelector('#amount-input').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
            if($("#split-input")){
                var grandTotal = $("#grand_total").val();
                var amount = this.value;
                $("#split-input").val(Number(grandTotal-amount).toFixed(2));
                $("#split-input-hidden").val(Number(grandTotal-amount).toFixed(2));
            }
        });

        $('body').on('change','[name="split_payment_method"]',function(){
            if (this.checked) {
                let checkboxes = Array.from(document.querySelectorAll(['[name="split_payment_method"]']));
                checkboxes.forEach(function(item){
                    if ($(item).closest('label').hasClass('active')) {
                        $(item).closest('label').removeClass('active');
                    }
                });
                this.parentElement.classList.add('active');
            }
        });

        $('#discount').on('input',function(){
            this.value = this.value.replace(/[^0-9.]/,'');
            cartTotal();
        });

        document.querySelector('#discount-select').addEventListener('change',function(){
            cartTotal();
        });

        // code for entering the id of products loaded from server side, to the productsAdded array.
        $(function(){
            let products = Array.from(document.querySelectorAll('.item-remove'));
            products.forEach(function(item){
                productsAdded.push(item.getAttribute('data-id'));
            });
        });
    </script>
</body>
</html>