<?php

    include "../../../../cores/inc/config_c.php";
    include "../../../../cores/inc/var_c.php";
    include "../../../../cores/inc/functions_c.php";
    include "../../../../cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];

    $query = "SELECT `_tblpurchase_return`.`id`,`_tblpurchase_return`.`purchase_id`,`_tblpurchase_return`.`date`,
    CONCAT(`users_tbl`.`f_name`,' ',`users_tbl`.`l_name`) AS `supplier_name`,
    ( SELECT SUM(`quantity`) FROM `_tblpurchase_return_details` WHERE `_tblpurchase_return_details`.`purchase_id`=
    `_tblpurchase_return`.`purchase_id` AND `status`='active') AS `quantity`,`_tblpurchase_return`.`total_amount`,
    `_tblpurchase_return`.`paid_amount`,`_tblpurchase_return`.`split_amount`,`_tblpurchase_return`.`net_tax`,
    `_tblpurchase_return`.`payment_status` FROM `_tblpurchase_return` INNER JOIN `users_tbl` ON 
    `users_tbl`.`u_id`=`_tblpurchase_return`.`supplier_id` WHERE `uset`='$u_set' AND 
    `_tblpurchase_return`.`status` = 'active' ORDER BY `_tblpurchase_return`.`id` DESC";
    $result = mysqli_query($link,$query);

    if (!$result) {
        die("Could not fetch returns. ".mysqli_error($link));
    }

    $array = mysqli_fetch_all($result,MYSQLI_ASSOC);

    echo '{"data":';
    echo json_encode($array);
    echo '}';

?>