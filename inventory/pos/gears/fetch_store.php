<?php

    include "../../../cores/inc/config_c.php";

    $query = "SELECT `uset_id`,`uset_name` FROM `uset_tbl` WHERE `uset_status` = 'active'";
    $sql = mysqli_query($link,$query);

    if(!$sql){
        die("Query Failed".$mysqli_error($link));
    }

    $array = mysqli_fetch_all($sql,MYSQLI_ASSOC);

    echo '{"data":';
    echo json_encode($array);
    echo "}";

?>