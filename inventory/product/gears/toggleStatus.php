<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];

    $idlist = $_POST['id_list'];
    echo $currentStatus = $_POST['current'];

    $idArray = explode(",",$idlist);

    $status = '';
    if ($currentStatus == 'active') {
        $status = 'inactive';
    } else {
        $status = 'active';
    }

    $date = date("Y-m-d H:i:s");

    foreach($idArray as $id){
        $query = "INSERT INTO `stock_tbl` (`product_id`,`store_id`,`stock`,`status`,`created_at`) 
        VALUES('$id','$u_set','0','$status','".date('Y-m-d H:i:s')."') 
        ON DUPLICATE KEY UPDATE `status`='$status',`updated_at`=VALUES(`created_at`)";
        $result = mysqli_query($link,$query);
        if (!$result) {
            die("Could not delete store. ".mysqli_error($link));
        }
    }

?>