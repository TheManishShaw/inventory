<?php

    include "../../../../cores/inc/config_c.php";
    include "../../../../cores/inc/var_c.php";
    include "../../../../cores/inc/functions_c.php";
    include "../../../../cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];

    $query = "SELECT * FROM `users_tbl` WHERE `u_type`='GRP03' AND `u_stats`='active' AND `u_set`='$u_set'";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die("Could not fetch customers. ".mysqli_error($link));
    }

    $array = mysqli_fetch_all($result,MYSQLI_ASSOC);

    echo '{"data":';
    echo json_encode($array);
    echo '}';

?>