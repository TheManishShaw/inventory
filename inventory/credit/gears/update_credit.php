<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];
    
    $sale_id = htmlspecialchars($_POST['transaction_id']);
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
    $amount = 0;
    if (isset($_POST['amount'])) {
        $amount = htmlspecialchars($_POST['amount']);
    }
    $payment_method = '';
    if (isset($_POST['payment_method'])) {
        $payment_method = htmlspecialchars($_POST['payment_method']);
    }
    $notes = htmlspecialchars($_POST['notes']);
    $split_amount = 0;
    if (isset($_POST['split_amount'])) {
        $split_amount = htmlspecialchars($_POST['split_amount']);
    }
    $split_payment_method = '';
    if (isset($_POST['split_payment_method'])) {
        $split_payment_method = htmlspecialchars($_POST['split_payment_method']);
    }

    $sale_id = mysqli_real_escape_string($link,$sale_id);
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

    if ($split_amount == '') {
        $split_amount = 0;
    }
    $amountPaid=$amount + $split_amount;

    $product_quantity = $_POST['quantity'];
    $old_quantity = $_POST['old_quantity'];
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

    $saleDate = date('Y-m-d H:i:s',strtotime($saleDate));

    $date = date('Y-m-d H:i:s');

    $payment_status = $amount == $grandTotal ? 'paid' : ucfirst($payment_status);

    $query = "UPDATE `_tblsales` SET `user_id`='$u_id',`date`='$saleDate',`client_id`='$customer',
    `uset`='$u_set',`net_tax`='$total_tax',`discount`='$discount',`discount_method`='$discount_type',
    `total_amount`='$grandTotal',`paid_amount`='$amount',`payment_method`='$payment_method',
    `payment_status`='$payment_status',`split_amount`='$split_amount',
    `invoice_data`='".json_encode($invoiceData)."',
    `split_payment_method`='$split_payment_method',`notes`='$notes',`updated_at`='$date' 
    WHERE `sale_id`='$sale_id'";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die('Could not make sale. '.mysqli_error($link));
    }

    $credit_status = $amount == $grandTotal ? 'paid' : 'pending';

    $query = "UPDATE `credit_tbl` 
            SET 
                `total_amount` = '$grandTotal',
                `amount_paid` = '$amount',
                `status` = '$credit_status',
                `updated_at` = '$date' 
            WHERE `transaction_id` = '$sale_id';";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die("Could not update credit table. ".mysqli_error($link));
    }

    $query="UPDATE `_tblsales_details` 
            SET 
                `status`='updated',
                `updated_at`='$date' 
            WHERE 
                `sale_id`='$sale_id'";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die("Could not update sale details. ".mysqli_error($link));
    }

    $query  = "INSERT INTO `_tblsales_details` (`sale_id`,`product_id`,`net_tax`,`total_amount`,`quantity`,
    `u_set`,`status`,`created_at`) VALUES ('$sale_id',?,?,?,?,'$u_set','active','$date');";

    $stmt = mysqli_prepare($link,$query);
    mysqli_stmt_bind_param($stmt,'ssss',$id,$tax,$subtotal,$quantity);

    for($i = 0; $i < count($productIds); $i++) {
        $id = $productIds[$i];
        $tax = $product_tax[$i];
        $subtotal = $product_subtotal[$i];
        $quantity = $product_quantity[$i];
        if (!mysqli_stmt_execute($stmt)) {
            die('Could not make sale details. '.mysqli_error($link));
        }

        if(isset($old_quantity[$i]) && $old_quantity[$i]<$product_quantity[$i]){
            decreaseStock($productIds[$i],$product_quantity[$i] - $old_quantity[$i]);
        } else if (isset($old_quantity[$i]) && $old_quantity[$i] > $product_quantity[$i]){
            increaseStock($productIds[$i],$old_quantity[$i] - $product_quantity[$i]);
        } else if (isset($old_quantity[$i]) && $old_quantity[$i] == $product_quantity[$i]) {
           decreaseStock($productIds[$i],0);
        } else {
            decreaseStock($productIds[$i],$product_quantity[$i]);
        }

    }
    mysqli_stmt_close($stmt);

    header("Location: ../index.php");

?>