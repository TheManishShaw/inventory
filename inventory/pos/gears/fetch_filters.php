<?php

    include "../../../cores/inc/config_c.php";

    $store_id = $_GET["store"];

    $query1 = "SELECT `cat_id`,`cat_name`,(SELECT COUNT(`_tblproducts`.`name`) FROM `_tblproducts` WHERE 
    `_tblproducts`.`category_id`=`category_tbl`.`cat_id` AND `status`='active' AND `u_set`='$store_id' AND `quantity`>0) AS `quantity` FROM `category_tbl` WHERE 
    `category_tbl`.`status` = 'active' AND `cat_uset` = '$store_id';";
    $sql1 = mysqli_query($link,$query1);
    $query2 = "SELECT `name`,`image`,`id`,`description`,(SELECT COUNT(`_tblproducts`.`name`) FROM 
    `_tblproducts` WHERE `_tblproducts`.`brand_id`=`_brands`.`id` AND `status`='active' AND `u_set`='$store_id' AND `quantity`>0) AS `quantity` FROM `_brands` 
    WHERE `status` = 'active' AND `u_set` = '$store_id'";
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