<?php

    include "../../inc/config_c.php";
    include "../../inc/var_c.php";
    include "../../inc/functions_c.php";
    include "../../inc/auth_c.php";

    $uset = $_SESSION['u_set'];

    $query = "SELECT `sale_id`,`date`,`total_amount` FROM `_tblsales` WHERE `uset` = '$uset' AND 
    `status`='active' ORDER BY `id` DESC LIMIT 10";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die("Could not fetch recent sales. ".mysqli_error($link));
    }

    $array = mysqli_fetch_all($result,MYSQLI_ASSOC);

    echo '{"data":';
    echo json_encode($array);
    echo '}';

?>