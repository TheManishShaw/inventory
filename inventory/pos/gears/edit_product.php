<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $product = htmlspecialchars($_POST['id']);
    $discount_type = htmlspecialchars($_POST['discount_type']);
    $discount = htmlspecialchars($_POST['discount']);

    $product = mysqli_real_escape_string($link,$product);
    $discount_type = mysqli_real_escape_string($link,$discount_type);
    $discount = mysqli_real_escape_string($link,$discount);

    $query = "INSERT INTO `stock_tbl` (`product_id`,`store_id`,`stock`,`discount_type`,`discount`,`created_at`) 
    VALUES('$product','".$_SESSION['u_set']."','0','$discount_type','$discount','".date('Y-m-d H:i:s')."') 
    ON DUPLICATE KEY 
    UPDATE `discount_type`='$discount_type',`discount`='$discount',`updated_at`=VALUES(`created_at`)";
    $result = mysqli_query($link,$query);

    if (!$result) {
        die("Could not update discount amount. ".mysqli_error($link));
    }

    echo '{"data":{"product_id":"'.$product.'","discount_type":"'.$discount_type.'","discount":"'.$discount.'"}}';

?>