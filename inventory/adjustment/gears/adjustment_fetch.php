<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];

    $query = "SELECT `id`,`user_id`,`date`,`adj_id`,( SELECT SUM(`quantity`) FROM `_tbladjustment_details` 
    WHERE `_tbladjustment_details`.`adj_id`=`_tbladjustment`.`adj_id` AND `status`='active') AS `items`,
    `_tbladjustment`.`status`,CONCAT(`users_tbl`.`f_name`,' ',`users_tbl`.`l_name`) AS `supplier_name` 
    FROM `_tbladjustment` INNER JOIN `users_tbl` ON `users_tbl`.`u_id` = `_tbladjustment`.`user_id` WHERE
     `uset_id`='$u_set' AND `_tbladjustment`.`status`='active'";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die("Could not fetch adjustments. ".mysqli_error($link));
    }

    $array = mysqli_fetch_all($result,MYSQLI_ASSOC);

    echo '{"data":';
    echo json_encode($array);
    echo '}';

?>