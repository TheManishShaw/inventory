<?php

    include "../../../../cores/inc/config_c.php";
    include "../../../../cores/inc/var_c.php";
    include "../../../../cores/inc/functions_c.php";
    include "../../../../cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];
    $chain_id = $_SESSION['chain_id'];

    $query = "CALL `fetch_active_products`('$u_set','$chain_id')";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die("Could not fetch product. ".mysqli_error($link));
    }

    $products= mysqli_fetch_all($result,MYSQLI_ASSOC);

    $query = "SELECT * FROM `_tblreturn_reason` WHERE `return_type` = 'purchase' AND `status` = 'active' AND 
    `uset` = '$u_set'";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die("Coudl not fetch return reason. ".mysqli_error($link));
    }

    $reasons = mysqli_fetch_all($result,MYSQLI_ASSOC);

    echo '{"products":';
    echo json_encode($products);
    echo ',"reasons":';
    echo json_encode($reasons);
    echo "}";

?>