<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    // setting the advance payment data
    if (isset($_POST['transaction_type'])) {
        $transaction_type = $_POST['transaction_type'];
        $credit_id = 'CRD_'.rand(100000,999999);
        $transaction_tbl = '_tblsales';
        $borrower = $_POST['customerName'];
        $lender = 'Store';
        $second_party_tbl = 'users_tbl';
        $due_date = DateTime::createFromFormat('d-m-Y',$_POST['due_date']);
        $due_date = date("Y-m-d H:i:s",$due_date->getTimestamp());
        $advance_payment = 0;
        if (isset($_POST['advance_payment'])) {
            $advance_payment = $_POST['advance_payment'];   // amount payed as advance
        }
    }

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
    if (isset($transaction_type)) {
        if ($transaction_type == 'credit') {
            $payment_status = 'Credit';
        } else {
            $payment_status = 'Advance';
        }
    }

    $amount = $grandTotal;
    if (isset($_POST['amount'])) {
        $amount = htmlspecialchars($_POST['amount'][0]);
    }

    $payment_method = '';
    if (!isset($transaction_type)){
        $payment_method = htmlspecialchars($_POST['payment_method0']);
    }
    
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
    if (isset($transaction_type) && $transaction_type == 'credit') {
        $amountPaid = 0;
    }
    $product_quantity = $productData->productQuantity;
    $product_tax = $productData->productTax;
    $product_subtotal = $productData->productSubtotal;
    $productIds = $productData->productIds;
    $productCode = $productData->productCode;
    $product_name = $productData->productName;

    // Data that will give details of individual items in the transaction.
    $productData = array("productIds"=>$productIds,"productCode"=>$productCode,"productName"=>$product_name,
                        "productQuantity"=>$product_quantity,"productTax"=>$product_tax,
                        "productSubtotal"=>$product_subtotal
                    );
                    
    // Collecting data to make generating invoice easier
    $invoiceData = array("sale_id"=>$sale_id,"providerName"=>$u_set,"customer"=>$customer,"tax"=>$total_tax,
                            "amountPaid"=>$amountPaid,"paymentMethod"=>array("main_payment"=>$payment_method,
                            "split_payment"=>$split_payment_method),
                            "payment"=>array("main_payment"=>$amount,"split_payment"=>$split_amount),
                            "discount"=>$total_discount,"grandtotal"=>$grandTotal,"transaction_type"=>"Debit", 
                            "transaction_id"=>$sale_id,"products"=>$productData,
                        );

    // Changing transaction_type and transaction_id in case the transaction is of type 'credit' or 'advance'
    if (isset($transaction_type)) {
        $invoiceData['transaction_type'] = $transaction_type;
        $invoiceData['transaction_id'] = $credit_id;
    }

    $date = date('Y-m-d H:i:s');

    $link->begin_transaction();
    try {

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
        if (isset($transaction_type)) {
            $query = " INSERT INTO `credit_tbl` (`credit_id`,`store`,`borrower`,`lender`,`transaction_id`,`transaction_tbl`,
            `second_party_id`,`second_party_table`,`transaction_type`,`total_amount`,`amount_paid`,`due_date`,`created_at`)
            VALUES ('$credit_id','$u_set','$borrower','$lender','$sale_id','$transaction_tbl',
            '$customer','$second_party_tbl','$transaction_type','$grandTotal','$advance_payment','$due_date','$date');";
            $result = mysqli_query($link,$query);
            if (!$result) {
                die('Could not add record to credit table. '.mysqli_error($link));
            }
        }
        
        $link->commit();
    } catch (Exception $e) {
        $link->rollback();
        throw $e;
    }

    $query = "INSERT INTO `_tblsales_details` (`sale_id`,`product_id`,`net_tax`,`total_amount`,`quantity`,
    `u_set`,`status`,`created_at`) VALUES ('$sale_id',?,?,?,?,'$u_set','active','$date');";

    $stmt = mysqli_prepare($link,$query);
    mysqli_stmt_bind_param($stmt,'ssss',$id,$tax,$subtotal,$quantity);

    for($i = 0; $i < count($productIds); $i++) {
        $id = $productIds[$i];
        $tax= $product_tax[$i];
        $subtotal= $product_subtotal[$i];
        $quantity= $product_quantity[$i];
        if(!mysqli_stmt_execute($stmt)){
            die('Could not make sale details. '.mysqli_error($link));
        }
        if (!isset($transaction_type) || $transaction_type != 'advance')
            decreaseStock($productIds[$i],$product_quantity[$i]);
    }
    mysqli_stmt_close($stmt);
    if (isset($transaction_type)) {
        die('{"sale_id":"'.$sale_id.'","transaction_id":"'.$credit_id.'","transaction_type":"'.$transaction_type.'"}');
    }
    die('{"sale_id":"'.$sale_id.'","transaction_id":"'.$sale_id.'","transaction_type":"debit"}');

?>