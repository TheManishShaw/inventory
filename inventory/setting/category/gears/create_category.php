<?php

    include "../../../../cores/inc/config_c.php";
    include "../../../../cores/inc/var_c.php";
    include "../../../../cores/inc/functions_c.php";
    include "../../../../cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];

    $brand = htmlspecialchars($_POST['brand']);
    $cat_name = htmlspecialchars($_POST['cat_name']);

    $brand = mysqli_real_escape_string($link, $brand);
    $cat_name = mysqli_real_escape_string($link, $cat_name);
    
    $date = date("Y-m-d H:i:s");
    $status = "active";

    $query = "INSERT INTO `category_tbl`(`cat_brand`, `cat_name`, `cat_uset`,`created_at`, `status`) 
    VALUES ('$brand','$cat_name','$u_set','$date','$status')";
    $result = mysqli_query($link,$query);

    if (!$result) {
        die("Could not create unit. ".mysqli_error($link));
    }

?>