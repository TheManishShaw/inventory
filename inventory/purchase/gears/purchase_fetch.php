<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];

    $query = "SELECT *,(SELECT SUM(`quantity`) FROM `_tblpurchase_details` WHERE `_tblpurchase_details`.`purchase_id`
    =`_tblpurchase`.`purchase_id`) AS `quantity` FROM `_tblpurchase` WHERE `uset`='$u_set' AND `status` = 'active'";
    $result = mysqli_query($link,$query);
    
    if (!$result) {
        die("Could not fetch product. ".mysqli_error($link));
    }

    $array= mysqli_fetch_all($result,MYSQLI_ASSOC);

    echo '{"data":';
    echo json_encode($array);
    echo "}";

?>