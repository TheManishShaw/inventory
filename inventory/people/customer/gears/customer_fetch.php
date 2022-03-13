<?php

    include "../../../../cores/inc/config_c.php";

    $query = "SELECT * FROM `users_tbl` WHERE `u_type`='GRP03' AND `u_stats`='active'";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die("Could not fetch customers. ".mysqli_error($link));
    }

    $array = mysqli_fetch_all($result,MYSQLI_ASSOC);

    echo '{"data":';
    echo json_encode($array);
    echo '}';

?>