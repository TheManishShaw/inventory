<?php

    include "../../../cores/inc/config_c.php";

    $idlist = $_POST['id_list'];
    $currentStatus = $_POST['current'];

    $idArray = explode(",",$idlist);

    $status = '';
    if ($currentStatus == 'active') {
        $status = 'inactive';
    } else {
        $status = 'active';
    }

    $date = date("Y-m-d H:i:s");

    foreach($idArray as $id){
        $query = "UPDATE `_tblproducts` SET `status`='$status', `updated_at`='$date' WHERE `id`='$id'";
        $result = mysqli_query($link,$query);
        if (!$result) {
            die("Could not delete store. ".mysqli_error($link));
        }
    }

?>