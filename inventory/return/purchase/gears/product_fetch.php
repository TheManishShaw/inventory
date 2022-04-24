<?php

    include "../../../../cores/inc/config_c.php";
    include "../../../../cores/inc/var_c.php";
    include "../../../../cores/inc/functions_c.php";
    include "../../../../cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];

    $query = "SELECT `_tblproducts`.`id`,`code`,`_tblproducts`.`tax`,`_tblproducts`.`tax_method`,
    `_tblproducts`.`name`,`cost`,`price`,`category_tbl`.`cat_name`,
    `_brands`.`name` AS `brand_name`,`quantity`,`_tblproducts`.`image`,`_tblproducts`.`status` FROM 
    `_tblproducts` INNER JOIN `category_tbl` ON `category_tbl`.`cat_id`=`_tblproducts`.`category_id` 
    INNER JOIN `_brands` ON `_brands`.`id` = `_tblproducts`.`brand_id` WHERE `_tblproducts`.`u_set`='$u_set' 
    AND `_tblproducts`.`status`='active'";
    $result = mysqli_query($link,$query);
    
    if (!$result) {
        die("Could not fetch product. ".mysqli_error($link));
    }

    $products= mysqli_fetch_all($result,MYSQLI_ASSOC);

    $query = "SELECT * FROM `_tblreturn_reason` WHERE `return_type` = 'purchase' AND `status` = 'active' AND 
    `uset` = '$u_set'";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die("Coudl not fetch return reason. ".mysqli_error($link));
    }

    $reasons = mysqli_fetch_all($result,MYSQLI_ASSOC);

    echo '{"products":';
    echo json_encode($products);
    echo ',"reasons":';
    echo json_encode($reasons);
    echo "}";

?>