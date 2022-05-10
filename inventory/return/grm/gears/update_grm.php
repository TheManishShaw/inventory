<?php

    include "../../../../cores/inc/config_c.php";
    include "../../../../cores/inc/var_c.php";
    include "../../../../cores/inc/functions_c.php";
    include "../../../../cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];
    
    $purchase_id = htmlspecialchars($_POST['purchase_id']);
    $purchaseDate = htmlspecialchars($_POST['date']);
    $supplier = htmlspecialchars($_POST['supplier']);
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

    $purchase_id = mysqli_real_escape_string($link,$purchase_id);
    $purchaseDate = mysqli_real_escape_string($link,$purchaseDate);
    $supplier = mysqli_real_escape_string($link,$supplier);
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
    $return_reason = $_POST['return_reason'];
    $return_percent = $_POST['return_percent'];
    $absolute_tax = $_POST['absolute_tax'];

    $purchaseDate = date('Y-m-d H:i:s',strtotime($purchaseDate));

    $date = date('Y-m-d H:i:s');

    $query = "UPDATE `_tblpurchase_return` SET `user_id`='$u_id',`date`='$purchaseDate',`supplier_id`='$supplier',
    `uset`='$u_set',`net_tax`='$total_tax',`discount`='$discount',`discount_method`='$discount_type',
    `total_amount`='$grandTotal',`paid_amount`='$amount',`payment_method`='$payment_method',
    `payment_status`='$payment_status',`split_amount`='$split_amount',
    `split_payment_method`='$split_payment_method',`notes`='$notes',`updated_at`='$date' 
    WHERE `purchase_id`='$purchase_id'";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die('Could not make purchase return. '.mysqli_error($link));
    }

    $query = "UPDATE `_tblpurchase_return_details` SET `status`='updated',`updated_at`='$date' WHERE 
    `purchase_id`='$purchase_id'";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die("Could not update purchase return details. ".mysqli_error($link));
    }

    for($i = 0; $i < count($productIds); $i++) {
        $query  = "INSERT INTO `_tblpurchase_return_details` (`purchase_id`,`product_id`,`net_tax`,`total_amount`,`quantity`,
        `return_reason`,`absolute_tax`,`return_percent`,`u_set`,`status`,`created_at`) VALUES ('$purchase_id','$productIds[$i]'
        ,'$product_tax[$i]','$product_subtotal[$i]','$product_quantity[$i]','$return_reason[$i]','$absolute_tax[$i]',
        $return_percent[$i],'$u_set','active','$date');";
        $result = mysqli_query($link,$query);
        if (!$result) {
            die('Could not make purchase return details. '.mysqli_error($link));
        }

        if(isset($old_quantity[$i]) && $old_quantity[$i]<$product_quantity[$i]){
            decreaseStock($productIds[$i],$product_quantity[$i] - $old_quantity[$i]);
        } else if (isset($old_quantity[$i]) && $old_quantity[$i] > $product_quantity[$i]){
            increaseStock($productIds[$i],$old_quantity[$i] - $product_quantity[$i]);
        } else if (isset($old_quantity[$i]) && $old_quantity[$i] == $product_quantity[$i]) {
           increaseStock($productIds[$i],0);    // doesn't matter if we increase or decrease, quantity will remain same.
        } else {
            decreaseStock($productIds[$i],$product_quantity[$i]);
        }
    }

    header("Location: ../index.php");

?>