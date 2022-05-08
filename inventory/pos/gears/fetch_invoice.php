<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $uset = $_GET['store'];

    $query = "SELECT `sale_id`,`date` FROM `_tblsales` WHERE `uset`='$uset' AND  `status`='active' ORDER BY 
    `id` DESC LIMIT 10";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die("Could not fetch invoices. ".mysqli_error($link));
    }

    $array = mysqli_fetch_all($result,MYSQLI_ASSOC);

    echo '{"data":';
    echo json_encode($array);
    echo '}'

?>