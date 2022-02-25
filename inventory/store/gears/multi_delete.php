<?php

    include "../../../cores/inc/config_c.php";

    $idlist = $_POST['id_list'];
    $idArray = explode(",",$idlist);

    foreach($idArray as $id){
        $query = "UPDATE `uset_tbl` SET `uset_status`='purged' WHERE `uset_id`='$id'";
        $result = mysqli_query($link,$query);
        if (!$result) {
            die("Could not delete store. ".mysqli_error($link));
        }
    }

?>