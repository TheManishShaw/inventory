<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $query = "SELECT * FROM `chain_tbl` WHERE `status`='active' ORDER BY `chain_id` DESC";
    $result = mysqli_query($link, $query);
    if (!$result) {
        die("Could not fetch Chains. ".mysqli_error($link));
    }

    $array = mysqli_fetch_all($result,MYSQLI_ASSOC);

    echo '{"data":';
    echo json_encode($array);
    echo '}';

?>