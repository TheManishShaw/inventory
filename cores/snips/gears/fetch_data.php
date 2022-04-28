<?php

    include "../../inc/config_c.php";
    include "../../inc/var_c.php";
    include "../../inc/functions_c.php";
    include "../../inc/auth_c.php";

    $uset = $_SESSION['u_set'];

    $query = "SELECT `date`, `total_amount`,`created_at` FROM `_tblsales` WHERE `uset`='$uset' AND `status`='active'";
    $saleResult = mysqli_query($link,$query);
    if (!$saleResult) {
        die("Could not fetch sale result. ".mysqli_error($link));
    }

    $saleArray = mysqli_fetch_all($saleResult,MYSQLI_ASSOC);

    $query = "SELECT `date`,`total_amount` FROM `_tblpurchase` WHERE `uset` = '$uset' AND `status`='active'";
    $purchaseResult = mysqli_query($link,$query);
    if (!$purchaseResult) {
        die("Could not fetch purchase result. ".mysqli_error($link));
    }

    $purchaseArray = mysqli_fetch_all($purchaseResult,MYSQLI_ASSOC);

    $startingDate = date("Y-m-01");
    $endingDate = date("Y-m-31");

    $query = "SELECT Day(`date`) AS `day`,SUM(`total_amount`) AS `sales` FROM `_tblsales` WHERE 
    `status`='active' AND `uset`='$uset' AND `date`>= '$startingDate' AND `date`<'$endingDate' GROUP BY 
    Day(`date`) ORDER BY `date`";
    $monthlySaleResult = mysqli_query($link,$query);
    if (!$monthlySaleResult) {
        die("Could not fetch monthly sales. ".mysqli_error($link));
    }

    $monthlySale = mysqli_fetch_all($monthlySaleResult,MYSQLI_ASSOC);
    
    $query = "SELECT SUM(`quantity`) as `orders` FROM `_tblsales_details` WHERE `u_set`='$uset' AND `status`='active'";
    $orderResult = mysqli_query($link,$query);
    if (!$orderResult) {
        die("Could not fetch order details. ".mysqli_error($link));
    }

    $orderArray = mysqli_fetch_row($orderResult);

    echo '{"sale":';
    echo json_encode($saleArray);
    echo ',"purchase":';
    echo json_encode($purchaseArray);
    echo ',"monthlySale":';
    echo json_encode($monthlySale);
    echo ',"order":';
    echo json_encode($orderArray);
    echo '}';

?>