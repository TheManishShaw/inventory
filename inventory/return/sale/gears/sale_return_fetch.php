<?php

    include "../../../../cores/inc/config_c.php";
    include "../../../../cores/inc/var_c.php";
    include "../../../../cores/inc/functions_c.php";
    include "../../../../cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];

    $query = "SELECT `_tblsales_return`.`id`,`_tblsales_return`.`sale_id`,`_tblsales_return`.`date`,
    CONCAT(`users_tbl`.`f_name`,' ',`users_tbl`.`l_name`) AS `customer_name`,
    ( SELECT SUM(`quantity`) FROM `_tblsales_return_details` WHERE `_tblsales_return_details`.`sale_id`=
    `_tblsales_return`.`sale_id` AND `status`='active') AS `quantity`,`_tblsales_return`.`total_amount`,
    `_tblsales_return`.`paid_amount`,`_tblsales_return`.`split_amount`,`_tblsales_return`.`net_tax`,
    `_tblsales_return`.`payment_status` FROM `_tblsales_return` INNER JOIN `users_tbl` ON 
    `users_tbl`.`u_id`=`_tblsales_return`.`client_id` WHERE `uset`='$u_set' AND 
    `_tblsales_return`.`status` = 'active' ORDER BY `_tblsales_return`.`id` DESC";
    $result = mysqli_query($link,$query);

    if (!$result) {
        die("Could not fetch returns. ".mysqli_error($link));
    }

    $array = mysqli_fetch_all($result,MYSQLI_ASSOC);

    echo '{"data":';
    echo json_encode($array);
    echo '}';

?>