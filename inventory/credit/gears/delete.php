<?php

    include "../../../cores/inc/config_c.php";

    $idlist = $_POST['id_list'];
    $idArray = explode(",",$idlist);

    foreach($idArray as $id){
        // deleting transaction from credit table
        $query = "UPDATE `credit_tbl` SET `status`='purged' WHERE `transaction_id`='$id'";
        $result = mysqli_query($link,$query);
        if (!$result) {
            die("Could not delete credit transaction. ".mysqli_error($link));
        }

        // deleting transaction from sales table
        $query = "UPDATE `_tblsales` SET `status`='purged' WHERE `sale_id`='$id'";
        $result = mysqli_query($link,$query);
        if (!$result) {
            die("Could not delete sale. ".mysqli_error($link));
        }

        // deleting all the sales details records
        $query = "UPDATE `_tblsales_details` SET `status`='purged', `deleted_at`='$date' WHERE 
        `sale_id`='$id' AND `status`!='updated'";
        $result = mysqli_query($link,$query);
        if (!$result){
            die("Could not delete sale details. ".mysqli_error($link));
        }

        // getting the product ids of products in the transaction
        $query = "SELECT `product_id`,`quantity` FROM `_tblsales_details` WHERE `sale_id`='$id' AND `status` = 'purged'";
        $result = mysqli_query($link,$query);
        if (!$result){
            die('Could not fetch product id. '.mysqli_error($link));
        }
        $products = mysqli_fetch_all($result,MYSQLI_ASSOC);

        // increasing stock as the transaction has been reversed
        foreach($products as $item) {
            increaseStock($item['product_id'],$item['quantity']);
        }
    }

?>