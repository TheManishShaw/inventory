<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];
    $adj_id = 'ADJ_'.rand(101287,999012);

    $purchaseDate = htmlspecialchars($_POST['date']);
    $supplier = htmlspecialchars($_POST['supplier']);
    $notes = htmlspecialchars($_POST['notes']);

    $purchaseDate = mysqli_real_escape_string($link,$purchaseDate);
    $supplier = mysqli_real_escape_string($link,$supplier);
    $notes = mysqli_real_escape_string($link,$notes);

    $product_quantity = $_POST['quantity'];
    $productIds = $_POST['product_id'];
    $transferType = $_POST['transfer_type'];

    $transferDate = date('Y-m-d H:i:s',strtotime($purchaseDate));

    $date = date('Y-m-d H:i:s');

    $query = "INSERT INTO `_tbladjustment` (`user_id`,`date`,`adj_id`,`uset_id`,`items`,`notes`,`status`,
    `created_at`) VALUES ('$u_id','$transferDate','$adj_id','$u_set','".count($productIds)."','$notes',
    'active','$date');";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die('Could not make adjustment. '.mysqli_error($link));
    }
    for($i = 0; $i < count($productIds); $i++) {
        $query  = "INSERT INTO `_tbladjustment_details` (`adj_id`,`product_id`,`quantity`,`adj_type`,`created_at`) 
        VALUES ('$adj_id','$productIds[$i]','$product_quantity[$i]','$transferType[$i]','$date');";
        $result = mysqli_query($link,$query);
        if (!$result) {
            die('Could not make adjustment details. '.mysqli_error($link));
        }
        // stock updation part
        if($transferType[$i]=="lend") {
            decreaseStock($productIds[$i],$product_quantity[$i]);
        } else {
            increaseStock($productIds[$i],$product_quantity[$i]);
        }
        // stock updation ends
    }

    header("Location: ../index.php");

?>