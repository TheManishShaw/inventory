<?php

    include "../../../../cores/inc/config_c.php";
    include "../../../../cores/inc/var_c.php";
    include "../../../../cores/inc/functions_c.php";
    include "../../../../cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];

    $id = htmlspecialchars($_POST['id']);
    $brand = htmlspecialchars($_POST['brand']);
    $cat_name = htmlspecialchars($_POST['cat_name']);

    $id = mysqli_real_escape_string($link, $id);
    $brand = mysqli_real_escape_string($link, $brand);
    $cat_name = mysqli_real_escape_string($link, $cat_name);
    
    $date = date("Y-m-d H:i:s");
    $status = "active";

    $query = "UPDATE `category_tbl` SET `cat_brand`='$brand', `cat_name`='$cat_name',`updated_at`='$date'
    WHERE `cat_id`='$id'";
    $result = mysqli_query($link,$query);

    if (!$result) {
        die("Could not create unit. ".mysqli_error($link));
    }

?>