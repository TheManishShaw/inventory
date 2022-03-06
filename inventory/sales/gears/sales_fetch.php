<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];

    $query = "SELECT *,(SELECT SUM(`quantity`) FROM `_tblsales_details` WHERE 
    `_tblsales_details`.`sale_id`=`_tblsales`.`sale_id`) AS `quantity` FROM `_tblsales` WHERE `uset`='$u_set' 
    AND `status`='active'";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die('Could not fetch sales. '.mysqli_error($link));
    }

    $array = mysqli_fetch_all($result,MYSQLI_ASSOC);

    echo '{"data":';
    echo json_encode($array);
    echo "}";
    
?>