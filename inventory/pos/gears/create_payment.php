<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $sale_id = 'SL_'.rand(101287,999012);

    $productData = json_decode($_POST['productData']);

    $customer = htmlspecialchars($_POST['customer']);
    if ($customer = 'walkIn') {
        $customer = 1;
    }
    $total_tax = htmlspecialchars($_POST['tax']);
    $total_discount = htmlspecialchars($_POST['discount']);
    $grandTotal = htmlspecialchars($_POST['grandTotal']);
    $discount_type = htmlspecialchars($_POST['discount_type']);
    $payment_status = 'paid';
    $amount = $grandTotal;
    if (isset($_POST['amount'])) {
        $amount = htmlspecialchars($_POST['amount'][0]);
    }
    $payment_method = htmlspecialchars($_POST['payment_method0']);
    $notes = htmlspecialchars($_POST['note']);
    $split_amount = 0;
    if (isset($_POST['amount'][1])) {
        $split_amount = htmlspecialchars($_POST['amount'][1]);
    }
    $split_payment_method = '';
    if (isset($_POST['payment_method1'])) {
        $split_payment_method = htmlspecialchars($_POST['payment_method1']);
    }

    $customer = mysqli_real_escape_string($link,$customer);
    $total_tax = mysqli_real_escape_string($link,$total_tax);
    $total_discount = mysqli_real_escape_string($link,$total_discount);
    $grandTotal = mysqli_real_escape_string($link,$grandTotal);
    $discount_type = mysqli_real_escape_string($link,$discount_type);
    $payment_status = mysqli_real_escape_string($link,$payment_status);
    $amount = mysqli_real_escape_string($link,$amount);
    $payment_method = mysqli_real_escape_string($link,$payment_method);
    $notes = mysqli_real_escape_string($link,$notes);
    $split_amount = mysqli_real_escape_string($link,$split_amount);
    $split_payment_method = mysqli_real_escape_string($link,$split_payment_method);

    $amountPaid=$amount + $split_amount;

    $product_quantity = $productData->productQuantity;
    $product_tax = $productData->productTax;
    $product_subtotal = $productData->productSubtotal;
    $productIds = $productData->productIds;
    $productCode = $productData->productCode;
    $product_name = $productData->productName;

    $productData = array("productIds"=>$productIds,"productCode"=>$productCode,"productName"=>$product_name,
                        "productQuantity"=>$product_quantity,"productTax"=>$product_tax,
                        "productSubtotal"=>$product_subtotal
                    );
    $invoiceData = array("sale_id"=>$sale_id,"providerName"=>$u_set,"customer"=>$customer,"tax"=>$total_tax,
                            "amountPaid"=>$amountPaid,"paymentMethod"=>array("main_payment"=>$payment_method,
                            "split_payment"=>$split_payment_method),
                            "payment"=>array("main_payment"=>$amount,"split_payment"=>$split_amount),
                            "discount"=>$total_discount,"grandtotal"=>$grandTotal,"products"=>$productData
                        );

    $date = date('Y-m-d H:i:s');

    $query = "INSERT INTO `_tblsales` (`user_id`,`date`,`sale_id`,`is_pos`,`client_id`,`uset`,`net_tax`,
    `discount`,`discount_method`,`total_amount`,`paid_amount`,`payment_method`,`payment_status`,`split_amount`,
    `split_payment_method`,`notes`,`invoice_data`,`created_at`,`status`) VALUES ('$u_id','$date','$sale_id',
    1,'$customer','$u_set','$total_tax','$total_discount','$discount_type','$grandTotal','$amount','$payment_method',
    '$payment_status','$split_amount','$split_payment_method','$notes','".json_encode($invoiceData)."',
    '$date','active');";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die('Could not make sale. '.mysqli_error($link));
    }
    for($i = 0; $i < count($productIds); $i++) {
        $query  = "INSERT INTO `_tblsales_details` (`sale_id`,`product_id`,`net_tax`,`total_amount`,`quantity`,
        `u_set`,`status`,`created_at`) VALUES ('$sale_id','$productIds[$i]','$product_tax[$i]','$product_subtotal[$i]',
        '$product_quantity[$i]','$u_set','active','$date');";
        $result = mysqli_query($link,$query);
        if (!$result) {
            die('Could not make sale details. '.mysqli_error($link));
        }
        decreaseStock($productIds[$i],$product_quantity[$i]);
    }

    die($sale_id);

?>