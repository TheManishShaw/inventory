<?php

    include "../../../cores/inc/config_c.php";

    $idlist = $_POST['id_list'];
    $idArray = explode(",",$idlist);

    foreach($idArray as $id){
        $query = "UPDATE `credit_tbl` SET `status`='purged' WHERE `transaction_id`='$id'";
        $result = mysqli_query($link,$query);
        if (!$result) {
            die("Could not delete credit transaction. ".mysqli_error($link));
        }

        $query = "UPDATE `_tblsales` SET `status`='purged' WHERE `sale_id`='$id'";
        $result = mysqli_query($link,$query);
        if (!$result) {
            die("Could not delete sale. ".mysqli_error($link));
        }
    }

?>