<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $query = "SELECT * FROM `uset_tbl` WHERE `uset_status`='active'";
    $result = mysqli_query($link,$query);

    if (!$result) {
        die("Could not fetch store! ".mysqli_error($link));
    }

    $arrray = mysqli_fetch_all($result,MYSQLI_ASSOC);

    echo '{"data":';
    echo json_encode($arrray);
    echo "}";

?>