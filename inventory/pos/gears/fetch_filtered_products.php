<?php
    include "../../../cores/inc/config_c.php";

    $store_id = $_GET["store"];
    $cat_id = $_GET["cat"];
    $brand_id = $_GET["brand"];

    $query = "SELECT `product_id` FROM `_tblpurchase_details` WHERE `u_set` = '$store_id'";
    $sql = mysqli_query($link,$query);

    if(!$sql){
        die("Query Failed".mysqli_error($link));
    }

    while($row = mysqli_fetch_assoc($sql)) {
        $product_array[] = $row['product_id'];
    }
    $product_array = array_unique($product_array);
    $array=[];

    if(!empty($brand_id)){
        foreach($product_array as $item){
            $query1 = "SELECT *,(SELECT `cat_name` FROM `category_tbl` WHERE `category_tbl`.`cat_id`=`_tblproducts`.`category_id`)
            AS category_name,(SELECT `name` FROM `_brands` WHERE `_brands`.`id`=`_tblproducts`.`brand_id`) AS 
            brand_name FROM `_tblproducts` WHERE `id` = '$item' AND `u_set` = '$store_id' 
            AND `brand_id` = '$brand_id' AND `status` = 'active' AND `quantity` > '0'";
            $sql1 = mysqli_query($link,$query1);
            if(!$sql1){
                die("Query Failed".mysqli_error($link));
            }

            while($row=mysqli_fetch_assoc($sql1)){
                $array[] = $row;
            }
        }
    } else if(!empty($cat_id)) {
        foreach($product_array as $item){
            $query1 = "SELECT *,(SELECT `cat_name` FROM `category_tbl` WHERE `category_tbl`.`cat_id`=`_tblproducts`.`category_id`)
            AS category_name,(SELECT `name` FROM `_brands` WHERE `_brands`.`id`=`_tblproducts`.`brand_id`) AS 
            brand_name,quantity AS stock FROM `_tblproducts` WHERE `id` = '$item' AND `u_set` = '$store_id' 
            AND `category_id` = '$cat_id' AND `status` = 'active' AND `quantity` > '0'";
            $sql1 = mysqli_query($link,$query1);
            if(!$sql1){
                die("Query Failed".mysqli_error($link));
            }
            while($row=mysqli_fetch_assoc($sql1)){
                $array[] = $row;
            }
        }
    }

    echo '{"data":';
    echo json_encode($array);
    echo "}";
?>