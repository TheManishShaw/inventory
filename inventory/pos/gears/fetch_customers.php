<?php

    include "../../../cores/inc/config_c.php";    
    include "../../../cores/inc/var_c.php";    
    include "../../../cores/inc/functions_c.php";    
    include "../../../cores/inc/auth_c.php";    

    $u_set = $_GET['store'];
    $chain_id = $_SESSION['chain_id'];

    $query = "SELECT `u_id`,`f_name`,`l_name` FROM `users_tbl` WHERE (`u_set`='$u_set' OR `chain_id`='$chain_id')
     AND `u_stats`='active' AND `u_type`='GRP03'";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die('Could not fetch customers. '.mysqli_error($link));
    }

    $array = mysqli_fetch_all($result,MYSQLI_ASSOC);

    echo '{"data":';
    echo json_encode($array);
    echo '}';

?>