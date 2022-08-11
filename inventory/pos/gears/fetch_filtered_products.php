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
    $product_array = array_values(array_unique($product_array));
    $array=[];
    $item = null;

    if(!empty($brand_id)){
        $query1 = "SELECT *,(SELECT `cat_name` FROM `category_tbl` WHERE `category_tbl`.`cat_id`=`_tblproducts`.`category_id`)
        AS category_name,(SELECT `name` FROM `_brands` WHERE `_brands`.`id`=`_tblproducts`.`brand_id`) AS 
        brand_name,`stock_tbl`.`stock` AS `quantity`,`stock_tbl`.`discount_type`,`stock_tbl`.`discount` FROM `_tblproducts` 
        LEFT JOIN `stock_tbl` ON `stock_tbl`.`product_id`=`_tblproducts`.`id`  AND 
        `stock_tbl`.`store_id`='$store_id' WHERE `id` = ? AND (`u_set` = '$store_id' OR 
        (`chain_id`='$chain_id' AND `chain_id`!=0)) AND `brand_id` = '$brand_id' AND `_tblproducts`.`status` != 'purged'
        AND `stock_tbl`.`status`='active' AND `stock` > '0'";

        $stmt = mysqli_prepare($link,$query1);
        mysqli_stmt_bind_param($stmt,'i',$item);
        
        foreach($product_array as $item){
            if(!mysqli_stmt_execute($stmt)){
                die("Query Failed. ".mysqli_error($link));
            }

            $sql1 = mysqli_stmt_get_result($stmt);
            while($row = mysqli_fetch_assoc($sql1)) {
                $array[] = $row;
            }
        }
    } else if(!empty($cat_id)) {
        $query1 = "SELECT *,(SELECT `cat_name` FROM `category_tbl` WHERE `category_tbl`.`cat_id`=`_tblproducts`.`category_id`)
        AS category_name,(SELECT `name` FROM `_brands` WHERE `_brands`.`id`=`_tblproducts`.`brand_id`) AS 
        brand_name,`stock_tbl`.`stock` AS `quantity`,`stock_tbl`.`discount_type`,`stock_tbl`.`discount` FROM 
        `_tblproducts` LEFT JOIN `stock_tbl` ON `stock_tbl`.`product_id`=`_tblproducts`.`id` AND 
        `stock_tbl`.`store_id`='$store_id' WHERE `id` = ? AND (`u_set` = '$store_id' OR 
        (`chain_id`='$chain_id' AND `chain_id`!=0)) 
        AND `category_id` = '$cat_id' AND `_tblproducts`.`status` != 'purged' AND 
        `stock_tbl`.`status`='active' AND `stock` > '0'";

        $stmt = mysqli_prepare($link,$query1);
        mysqli_stmt_bind_param($stmt,'s',$item);
        
        for($i = 0; $i < count($product_array); $i++){
            $item = $product_array[$i];
            if(!mysqli_stmt_execute($stmt)){
                die("Query Failed. ".mysqli_error($link));
            }

            $sql1 = mysqli_stmt_get_result($stmt);
            while($row = mysqli_fetch_assoc($sql1)) {
                $array[] = $row;
            }
        }
    }
    mysqli_stmt_close($stmt);

    echo '{"data":';
    echo json_encode($array);
    echo "}";
?>