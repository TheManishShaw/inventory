<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];
    $sale_id = 'SL_'.rand(101287,999012);

    $saleDate = htmlspecialchars($_POST['date']);
    $customer = htmlspecialchars($_POST['customer']);
    if ($customer == 'walk-in') {
        $customer = 1;
    }
    $total_tax = htmlspecialchars($_POST['total_tax']);
    $total_discount = htmlspecialchars($_POST['total_discount']);
    $grandTotal = htmlspecialchars($_POST['grand_total']);
    $discount_type = htmlspecialchars($_POST['discount_type']);
    $discount = htmlspecialchars($_POST['discount']);
    $payment_status = htmlspecialchars($_POST['payment_status']);
    $amount = htmlspecialchars($_POST['amount']);
    $payment_method = htmlspecialchars($_POST['payment_method']);
    $notes = htmlspecialchars($_POST['notes']);
    $split_amount = 0;
    if (isset($_POST['split_amount'])) {
        $split_amount = htmlspecialchars($_POST['split_amount']);
    }
    $split_payment_method = '';
    if (isset($_POST['split_payment_method'])) {
        $split_payment_method = htmlspecialchars($_POST['split_payment_method']);
    }

    $saleDate = mysqli_real_escape_string($link,$saleDate);
    $customer = mysqli_real_escape_string($link,$customer);
    $total_tax = mysqli_real_escape_string($link,$total_tax);
    $total_discount = mysqli_real_escape_string($link,$total_discount);
    $grandTotal = mysqli_real_escape_string($link,$grandTotal);
    $discount_type = mysqli_real_escape_string($link,$discount_type);
    $discount = mysqli_real_escape_string($link,$discount);
    $payment_status = mysqli_real_escape_string($link,$payment_status);
    $amount = mysqli_real_escape_string($link,$amount);
    $payment_method = mysqli_real_escape_string($link,$payment_method);
    $notes = mysqli_real_escape_string($link,$notes);
    $split_amount = mysqli_real_escape_string($link,$split_amount);
    $split_payment_method = mysqli_real_escape_string($link,$split_payment_method);

    $amountPaid=$amount + $split_amount;

    $product_quantity = $_POST['quantity'];
    $product_tax = $_POST['tax'];
    $product_subtotal = $_POST['subtotal'];
    $productIds = $_POST['product_id'];
    $productCode = $_POST['product_code'];
    $product_name = $_POST['product_name'];

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

    $saleDate = date('Y-m-d H:i:s',strtotime($saleDate));

    $query = "INSERT INTO `_tblsales` (`user_id`,`date`,`sale_id`,`is_pos`,`client_id`,`uset`,`net_tax`,
    `discount`,`discount_method`,`total_amount`,`paid_amount`,`payment_method`,`payment_status`,`split_amount`,
    `split_payment_method`,`notes`,`invoice_data`,`created_at`,`status`) VALUES ('$u_id','$saleDate','$sale_id',
    0,'$customer','$u_set','$total_tax','$discount','$discount_type','$grandTotal','$amount','$payment_method',
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

    header("Location: ../index.php");

?>