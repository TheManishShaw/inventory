<?php

    include "../../../cores/inc/config_c.php";

    $store_id = $_GET['store'];

    $query = "SELECT `purchase_id` FROM `_tblpurchase` WHERE `uset` = '$store_id' AND `status` = 'active'";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die("Could not get purchases. ".mysqli_error($link));
    }
    if(mysqli_num_rows($result) <= 0){
        die('{"data":[]}');
    }

    $purchaseIds = mysqli_fetch_all($result);

    foreach($purchaseIds as $id){
        $productQuery = "SELECT `product_id` FROM `_tblpurchase_details` WHERE `purchase_id` = '$id[0]'";
        $productResult = mysqli_query($link,$productQuery);
        while($row = mysqli_fetch_assoc($productResult)){
            $product_array[] = $row['product_id'];
        }
    }

    $product_array = array_unique($product_array);

    foreach($product_array as $item){
        // Optimize this query using a prepared statement.
        $query = "SELECT `_tblproducts`.`id`,`_tblproducts`.`name`,`_tblproducts`.`quantity`,
        `_tblproducts`.`image`,`_tblproducts`.`code`,`_tblproducts`.`price`,`_tblproducts`.`tax`,
        `_tblproducts`.`tax_method`,`_tblproducts`.`note`,`category_tbl`.`cat_name` AS category_name,
        `_brands`.`name` AS `brand_name` FROM `_tblproducts` INNER JOIN `_brands` ON 
        `_brands`.`id`=`_tblproducts`.`brand_id` INNER JOIN `category_tbl` ON `category_tbl`.`cat_id`=
        `_tblproducts`.`category_id` WHERE `_tblproducts`.`id` = '$item' AND 
         `_tblproducts`.`u_set` = $store_id AND `_tblproducts`.`status`='active' AND `quantity` > '0'";
        $result = mysqli_query($link,$query);

        if(!$result){
            die("Query Failed".mysqli_error($link));
        }

        // $array = mysqli_fetch_all($result,MYSQLI_ASSOC); // shows only the last result.
        while($row = mysqli_fetch_assoc($result)){
            $array[] = $row;
        }
    }

    echo '{"data":';
    echo json_encode($array);
    echo "}";

?>