<?php
    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $store_id = $_GET["store"];
    $cat_id = $_GET["cat"];
    $brand_id = $_GET["brand"];
    $chain_id = $_SESSION['chain_id'];

    $query = "SELECT `product_id` FROM `_tblpurchase_details` WHERE `u_set`='$store_id'";
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
            brand_name,`stock_tbl`.`stock` FROM `_tblproducts` LEFT JOIN `stock_tbl` ON 
            `stock_tbl`.`product_id`=`_tblproducts`.`id`  AND `stock_tbl`.`store_id`='$store_id'
             WHERE `id` = '$item' AND (`u_set` = '$store_id' OR `chain_id`='$chain_id') 
            AND `brand_id` = '$brand_id' AND `status` = 'active' AND `stock` > '0'";
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
            brand_name,`stock_tbl`.`stock` FROM `_tblproducts` LEFT JOIN `stock_tbl` ON 
            `stock_tbl`.`product_id`=`_tblproducts`.`id` AND `stock_tbl`.`store_id`='$store_id'
             WHERE `id` = '$item' AND (`u_set` = '$store_id' OR `chain_id`='$chain_id') 
            AND `category_id` = '$cat_id' AND `status` = 'active' AND `stock` > '0'";
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