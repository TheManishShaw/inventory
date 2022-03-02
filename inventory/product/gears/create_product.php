<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];

    $name = htmlspecialchars($_POST['name']);
    $code = htmlspecialchars($_POST['code']);
    $category = htmlspecialchars($_POST['category']);
    $brand = htmlspecialchars($_POST['brand']);
    $bar = htmlspecialchars($_POST['bar']);
    $cost = htmlspecialchars($_POST['cost']);
    $price = htmlspecialchars($_POST['price']);
    $unit = htmlspecialchars($_POST['unit']);
    $taxmethod = htmlspecialchars($_POST['tax']);
    $tax = htmlspecialchars($_POST['sale_tax']);
    $stock_alert = htmlspecialchars($_POST['stock_alert']);
    $description = htmlspecialchars($_POST['descp']);

    $name = mysqli_real_escape_string($link,$name);
    $code = mysqli_real_escape_string($link,$code);
    $category = mysqli_real_escape_string($link,$category);
    $brand = mysqli_real_escape_string($link,$brand);
    $bar = mysqli_real_escape_string($link,$bar);
    $cost = mysqli_real_escape_string($link,$cost);
    $price = mysqli_real_escape_string($link,$price);
    $unit = mysqli_real_escape_string($link,$unit);
    $taxmethod = mysqli_real_escape_string($link,$taxmethod);
    $tax = mysqli_real_escape_string($link,$tax);
    $stock_alert = mysqli_real_escape_string($link,$stock_alert);
    $description = mysqli_real_escape_string($link,$description);

    $image = [];
    if(isset($_FILES['files']) && !empty($_FILES['files']['name'])) {
        for($i = 0; $i < count($_FILES['files']['name']); $i++) {
            $tmp_name = $_FILES['files']['tmp_name'][$i];
            $extn = explode('.',$_FILES['files']['name'][$i]);   // returns an array with extension at 1st position.
            $image[] = 'product'.time()."$i.".$extn[1];
            $folder = "../../../data/product_img/".$image[$i];
            move_uploaded_file($tmp_name,$folder);
        }
    }

    $image = implode(",",$image);
    $date = date("Y-m-d H:i:s");

    $query = "INSERT INTO `_tblproducts` (`u_set`,`code`,`type_barcode`,`name`,`cost`,`price`,`category_id`,`brand_id`,
    `unit_id`,`sale_unit_id`,`purchase_unit_id`,`stock_alert`,`tax`,`tax_method`,`image`,`note`,`quantity`,
    `created_at`,`status`) VALUES ('$u_set','$code','$bar','$name','$cost','$price','$category','$brand','$unit',
    '$unit','$unit','$stock_alert','$tax','$taxmethod','$image','$description',0,'$date','active');";
    $result = mysqli_query($link,$query);
    
    if (!$result) {
        die("Could not create product! ".mysqli_error($link));
    }

?>