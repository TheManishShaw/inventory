<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];
    $adj_id = $_POST['adj_id'];

    $purchaseDate = htmlspecialchars($_POST['date']);
    $supplier = htmlspecialchars($_POST['supplier']);
    $notes = htmlspecialchars($_POST['notes']);

    $purchaseDate = mysqli_real_escape_string($link,$purchaseDate);
    $supplier = mysqli_real_escape_string($link,$supplier);
    $notes = mysqli_real_escape_string($link,$notes);

    $product_quantity = $_POST['quantity'];
    $old_quantity = $_POST['old_quantity'];
    $productIds = $_POST['product_id'];
    $transferType = $_POST['transfer_type'];
    $old_transfer = $_POST['old_transfer'];

    $transferDate = date('Y-m-d H:i:s',strtotime($purchaseDate));

    $date = date('Y-m-d H:i:s');

    $query = "UPDATE `_tbladjustment` SET `user_id`='$supplier',`items`='".count($productIds)."',`notes`='$notes',
    `updated_at`='$date' WHERE `adj_id`='$adj_id'";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die('Could not update adjustment. '.mysqli_error($link));
    }

    $query = "UPDATE `_tbladjustment_details` SET `status`='updated',`updated_at`='$date' WHERE 
    `adj_id`='$adj_id'";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die("Could not update adjustment details. ".mysqli_error($link));
    }

    for($i = 0; $i < count($productIds); $i++) {
        $query  = "INSERT INTO `_tbladjustment_details` (`adj_id`,`product_id`,`quantity`,`adj_type`,`created_at`) 
        VALUES ('$adj_id','$productIds[$i]','$product_quantity[$i]','$transferType[$i]','$date');";
        $result = mysqli_query($link,$query);
        if (!$result) {
            die('Could not make adjustment details. '.mysqli_error($link));
        }
        // stock updation part
        if(isset($old_quantity[$i]) && $transferType[$i] == $old_transfer[$i]) {
            $product_quantity[$i] -= $old_quantity[$i];
        } else if(isset($old_transfer[$i]) && $transferType[$i] != $old_transfer[$i]){
            $product_quantity[$i] = $old_quantity[$i] + $product_quantity[$i];
        }

        if($transferType[$i]=="lend") {
            decreaseStock($productIds[$i],$product_quantity[$i]);
        } else {
            increaseStock($productIds[$i],$product_quantity[$i]);
        }
        // stock updation ends
    }

    header("Location: ../index.php");

?>