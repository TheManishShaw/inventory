<?php

    include "../../../../cores/inc/config_c.php";
    include "../../../../cores/inc/var_c.php";
    include "../../../../cores/inc/functions_c.php";
    include "../../../../cores/inc/auth_c.php";

    
    $id = htmlspecialchars($_POST['id']);
    $name = htmlspecialchars($_POST['name']);
    $percent = htmlspecialchars($_POST['percent']);
    $default = htmlspecialchars($_POST['default']);

    $id = mysqli_real_escape_string($link,$id);
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

    $query = "UPDATE `tax_tbl` SET `tax_name`='$name', `tax_percent`='$percent', `default`='$default',
    `updated_at`='$date' WHERE `tax_id`='$id'";
    $result = mysqli_query($link,$query);

    if (!$result) {
        die("Could not create unit. ".mysqli_error($link));
    }

?>