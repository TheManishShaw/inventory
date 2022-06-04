<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $store_id = $_GET['store'];
    $chain_id = $_SESSION['chain_id'];

    $query = "SELECT `purchase_id` FROM `_tblpurchase` WHERE `uset` = '$store_id' AND `status` = 'active'";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die("Could not get purchases. ".mysqli_error($link));
    }
    if(mysqli_num_rows($result) <= 0){
        die('{"data":[]}');
    }

    $purchaseIds = mysqli_fetch_all($result);

    $productQuery = "SELECT `product_id` FROM `_tblpurchase_details` WHERE `purchase_id` = ?";
    $stmt = mysqli_prepare($link,$productQuery);
    mysqli_stmt_bind_param($stmt,'s',$id);
    foreach($purchaseIds as $record){
        $id = $record[0];
        mysqli_stmt_execute($stmt);
        $productResult = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($productResult)){
            $product_array[] = $row['product_id'];
        }
    }

    mysqli_stmt_close($stmt);

    $product_array = array_unique($product_array);

    $query = "SELECT `_tblproducts`.`id`,`_tblproducts`.`name`,`stock_tbl`.`stock` AS `quantity`,
        `stock_tbl`.`discount_type`,`stock_tbl`.`discount`,
        `_tblproducts`.`image`,`_tblproducts`.`code`,`_tblproducts`.`price`,`_tblproducts`.`tax`,
        `_tblproducts`.`tax_method`,`_tblproducts`.`note`,`category_tbl`.`cat_name` AS category_name,
        `_brands`.`name` AS `brand_name` FROM `_tblproducts` INNER JOIN `_brands` ON 
        `_brands`.`id`=`_tblproducts`.`brand_id` INNER JOIN `category_tbl` ON `category_tbl`.`cat_id`=
        `_tblproducts`.`category_id` LEFT JOIN `stock_tbl` ON `stock_tbl`.`product_id`=`_tblproducts`.`id`
        AND `stock_tbl`.`store_id`='$store_id' WHERE `_tblproducts`.`id` = ? AND 
         (`_tblproducts`.`u_set` = $store_id OR `_tblproducts`.`chain_id`) AND 
         `_tblproducts`.`status`!='purged' AND `stock_tbl`.`status`='active' AND `stock` > '0'";

    $stmt = mysqli_prepare($link,$query);
    mysqli_stmt_bind_param($stmt,'s',$item);
     
    foreach($product_array as $item){
        if(!mysqli_stmt_execute($stmt)) {
            die("Query Failed".mysqli_error($link));
        }

        $result = mysqli_stmt_get_result($stmt);

        // $array = mysqli_fetch_all($result,MYSQLI_ASSOC); // shows only the last result.
        while($row = mysqli_fetch_assoc($result)){
            $array[] = $row;
        }
    }
    
    mysqli_stmt_close($stmt);

    echo '{"data":';
    echo json_encode($array);
    echo "}";

?>