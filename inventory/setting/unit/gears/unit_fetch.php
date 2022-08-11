<?php

    include "../../../../cores/inc/config_c.php";
    include "../../../../cores/inc/var_c.php";
    include "../../../../cores/inc/functions_c.php";
    include "../../../../cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];
    $chain_id = $_SESSION['chain_id'];

    $query = "SELECT * FROM `_tblunits` WHERE (`u_set`='$u_set' OR (`chain_id`='$chain_id' AND `chain_id`!=0)) AND `status`='active'";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die("Could not fetch units. ".mysqli_error($link));
    }

    $array = mysqli_fetch_all($result,MYSQLI_ASSOC);

    echo '{"data":';
    echo json_encode($array);
    echo "}";

?>