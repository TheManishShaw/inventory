<?php

    include "../../../../cores/inc/config_c.php";
    include "../../../../cores/inc/var_c.php";
    include "../../../../cores/inc/functions_c.php";
    include "../../../../cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];

    $name = htmlspecialchars($_POST['name']);
    $percent = htmlspecialchars($_POST['percent']);
    $default = htmlspecialchars($_POST['default']);

    $name = mysqli_real_escape_string($link,$name);
    $percent = mysqli_real_escape_string($link,$percent);
    $default = mysqli_real_escape_string($link,$default);

    $date = date("Y-m-d H:i:s");
    $status = "active";

    if ($default == 'yes') {
        $query = "UPDATE `tax_tbl` SET `default` = 'no'";
        $result = mysqli_query($link,$query);
        if (!$result) {
            die("Could not create tax. ".mysqli_error($link));
        }
    }

    $query = "INSERT INTO `tax_tbl`(`tax_name`, `tax_percent`, `u_set`, `default`,`created_at`, `status`) 
    VALUES ('$name','$percent','$u_set','$default','$date','$status')";
    $result = mysqli_query($link,$query);

    if (!$result) {
        die("Could not create unit. ".mysqli_error($link));
    }

?>