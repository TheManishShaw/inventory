<?php

    include "../../../cores/inc/config_c.php";

    $transaction_id = $_POST['transaction_id'];
    $transcation_type = $_POST['transaction_type'];
    $date = date('Y-m-d H:i:s');

    if ($transcation_type === 'Credit' || $transcation_type === 'credit') {
        $transcation_type = 'advance';
    } else if ($transcation_type === 'Advance' || $transcation_type === 'advance') {
        $transcation_type = 'credit';
    }

    $query = "UPDATE `credit_tbl`
        SET `transaction_type` = '$transcation_type',
        `updated_at` = '$date'
        WHERE `transaction_id` = '$transaction_id'
    ;";

    $result = mysqli_query($link,$query);
    
    if (!$result) {
        die("Could not change transaction type in credit table. ".mysqli_error($link));
    }

    $transcation_type = ucfirst($transcation_type);
    $query = "UPDATE `_tblsales`
            SET 
                `payment_status`='$transcation_type', 
                `updated_at`='$date'
            WHERE `sale_id`='$transaction_id'
    ;";

    $result = mysqli_query($link,$query);

    if (!$result) {
        die("Could not change transaction type in sales table. ".mysqli_error($link));
    }

    die($transcation_type);

?>