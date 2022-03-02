<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];

    $query = "SELECT `_tblproducts`.`id`,`code`,`_tblproducts`.`name`,`cost`,`price`,`category_tbl`.`cat_name`,
    `_brands`.`name` AS `brand_name`,`quantity`,`_tblproducts`.`image`,`_tblproducts`.`status` FROM 
    `_tblproducts` INNER JOIN `category_tbl` ON `category_tbl`.`cat_id`=`_tblproducts`.`category_id` 
    INNER JOIN `_brands` ON `_brands`.`id` = `_tblproducts`.`brand_id` WHERE `_tblproducts`.`u_set`='$u_set' 
    AND `_tblproducts`.`status`='active'";
    $result = mysqli_query($link,$query);
    
    if (!$result) {
        die("Could not fetch product. ".mysqli_error($link));
    }

    $array= mysqli_fetch_all($result,MYSQLI_ASSOC);

    echo '{"data":';
    echo json_encode($array);
    echo "}";

?>