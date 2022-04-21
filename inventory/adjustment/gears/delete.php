<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $idlist = $_POST['id_list'];
    $idArray = explode(",",$idlist);
    var_dump($idArray);

    $date = date("Y-m-d H:i:s");

    foreach($idArray as $id){
        echo $query = "UPDATE `_tbladjustment` SET `status`='purged', `deleted_at`='$date' WHERE `adj_id`='$id'";
        $result = mysqli_query($link,$query);
        if (!$result) {
            die("Could not delete adjustment. ".mysqli_error($link));
        }
        
        echo $query = "UPDATE `_tbladjustment_details` SET `status`='purged', `deleted_at`='$date' WHERE 
        `adj_id`='$id' AND `status`!='updated'";
        $result = mysqli_query($link,$query);
        if (!$result){
            die("Could not delete adjustment details. ".mysqli_error($link));
        }

        $query = "SELECT `product_id`,`adj_type`,`quantity` FROM `_tbladjustment_details` WHERE `adj_id`='$id' AND `status`='purged'";
        $result = mysqli_query($link,$query);
        if (!$result){
            die('Could not fetch product id. '.mysqli_error($link));
        }
        $products = mysqli_fetch_all($result,MYSQLI_ASSOC);

        foreach($products as $item){
            if($item['adj_type']=="lend") {
                increaseStock($item['product_id'],$item['quantity']);
            } else {
                decreaseStock($item['product_id'],$item['quantity']);
            }
            if (!mysqli_query($link,$query)){
                die("Could not update stock. Please run stock updation script manually. ".mysqli_error($link));
            }
        }

    }

?>