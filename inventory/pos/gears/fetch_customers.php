<?php

    include "../../../cores/inc/config_c.php";    

    $u_set = $_GET['store'];

    $query = "SELECT `u_id`,`f_name`,`l_name` FROM `users_tbl` WHERE `u_set`='$u_set' AND `u_stats`='active'
    AND `u_type`='GRP03'";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die('Could not fetch customers. '.mysqli_error($link));
    }

    $array = mysqli_fetch_all($result,MYSQLI_ASSOC);

    echo '{"data":';
    echo json_encode($array);
    echo '}';

?>