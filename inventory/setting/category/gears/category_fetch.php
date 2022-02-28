<?php

    include "../../../../cores/inc/config_c.php";
    include "../../../../cores/inc/var_c.php";
    include "../../../../cores/inc/functions_c.php";
    include "../../../../cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];

    $query = "SELECT `cat_id`,`_brands`.`name` AS `brand`,`cat_name` FROM `category_tbl` INNER JOIN `_brands` 
    ON `category_tbl`.`cat_brand`=`_brands`.`id` WHERE `cat_uset`='$u_set' AND `category_tbl`.`status`='active'";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die("Could not fetch taxes. ".mysqli_error($link));
    }

    $array = mysqli_fetch_all($result,MYSQLI_ASSOC);

    echo '{"data":';
    echo json_encode($array);
    echo "}";

?>