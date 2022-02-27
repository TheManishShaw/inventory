<?php

    include "../../../../cores/inc/config_c.php";

    $idlist = $_POST['id_list'];
    $idArray = explode(",",$idlist);

    $date = date("Y-m-d H:i:s");

    foreach($idArray as $id){
        $query = "UPDATE `_brands` SET `status`='purged', `deleted_at`='$date' WHERE `id`='$id'";
        $result = mysqli_query($link,$query);
        if (!$result) {
            die("Could not delete store. ".mysqli_error($link));
        }
    }

?>