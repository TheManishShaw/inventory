<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];

    $query = "SELECT `_tblpurchase`.`id`,`_tblpurchase`.`purchase_id`,`_tblpurchase`.`date`,
    CONCAT(`users_tbl`.`f_name`,' ',`users_tbl`.`l_name`) AS `supplier_name`,
    ( SELECT SUM(`quantity`) FROM `_tblpurchase_details` WHERE `_tblpurchase_details`.`purchase_id`=
    `_tblpurchase`.`purchase_id` AND `status`='active') AS `quantity`,`_tblpurchase`.`total_amount`,
    `_tblpurchase`.`paid_amount`,`_tblpurchase`.`split_amount`,`_tblpurchase`.`net_tax`,
    `_tblpurchase`.`payment_status` FROM `_tblpurchase` INNER JOIN `users_tbl` ON 
    `users_tbl`.`u_id`=`_tblpurchase`.`supplier_id` WHERE `uset`='$u_set' AND 
    `_tblpurchase`.`status` = 'active' ORDER BY `_tblpurchase`.`id` DESC";
    $result = mysqli_query($link,$query);
    
    if (!$result) {
        die("Could not fetch product. ".mysqli_error($link));
    }

    $array= mysqli_fetch_all($result,MYSQLI_ASSOC);

    echo '{"data":';
    echo json_encode($array);
    echo "}";

?>