<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $store_id = $_GET["store"];
    $chain_id = $_SESSION['chain_id'];

    $query1 = "SELECT `cat_id`,`cat_name`,(SELECT COUNT(`_tblproducts`.`name`) FROM `_tblproducts`
    INNER JOIN `stock_tbl` ON `stock_tbl`.`product_id`=`_tblproducts`.`id` AND 
    `stock_tbl`.`store_id`='$store_id' WHERE `_tblproducts`.`category_id`=`category_tbl`.`cat_id` 
    AND `_tblproducts`.`status`!='purged' AND `stock_tbl`.`status`='active' AND 
    (`u_set`='$store_id' OR `chain_id`='$chain_id') AND `stock`>0) AS `quantity` 
    FROM `category_tbl` WHERE `category_tbl`.`status` = 'active' AND (`cat_uset` = '$store_id' OR `chain_id`='$chain_id');";
    $sql1 = mysqli_query($link,$query1);
    $query2 = "SELECT `name`,`image`,`id`,`description`,(SELECT COUNT(`_tblproducts`.`name`) FROM 
    `_tblproducts` INNER JOIN `stock_tbl` ON `stock_tbl`.`product_id`=`_tblproducts`.`id` AND 
    `stock_tbl`.`store_id`='$store_id' WHERE `_tblproducts`.`brand_id`=`_brands`.`id` AND 
    `_tblproducts`.`status`!='purged' AND `stock_tbl`.`status`='active'
    AND (`u_set`='$store_id' OR `chain_id`='$chain_id') AND `stock`>0) AS `quantity` FROM `_brands` 
    WHERE `status` = 'active' AND (`u_set` = '$store_id' OR `chain_id`='$chain_id')";
    $sql2 = mysqli_query($link,$query2);

    if(!$sql1){
        die("Could not fetch categories. ".mysqli_error($link));
    }

    if(!$sql2){
        die("Could not fetch brands. ".mysqli_error($link));
    }

    $categories = mysqli_fetch_all($sql1,MYSQLI_ASSOC);
    echo '{"category":';
    echo json_encode($categories);

    $brands = mysqli_fetch_all($sql2,MYSQLI_ASSOC);
    echo ',"brand":';
    echo json_encode($brands);
    echo "}";

?>