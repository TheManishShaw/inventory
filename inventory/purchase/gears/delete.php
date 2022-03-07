<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $idlist = $_POST['id_list'];
    $idArray = explode(",",$idlist);

    $date = date("Y-m-d H:i:s");

    foreach($idArray as $id){
        $query = "UPDATE `_tblpurchase` SET `status`='purged', `deleted_at`='$date' WHERE `purchase_id`='$id'";
        $result = mysqli_query($link,$query);
        if (!$result) {
            die("Could not delete purchase. ".mysqli_error($link));
        }

        $query = "UPDATE `_tblpurchase_details` SET `status`='purged', `deleted_at`='$date' WHERE 
        `purchase_id`='$id' AND `status`!='updated'";
        $result = mysqli_query($link,$query);
        if (!$result){
            die("Could not delete purchase details. ".mysqli_error($link));
        }

        $query = "SELECT `product_id` FROM `_tblpurchase_details` WHERE `purchase_id`='$id'";
        $result = mysqli_query($link,$query);
        if (!$result){
            die('Could not fetch product id. '.mysqli_error($link));
        }
        $products = mysqli_fetch_all($result,MYSQLI_ASSOC);

        foreach($products as $id) {
            updateStock($id['product_id']);
        }
    }

?>