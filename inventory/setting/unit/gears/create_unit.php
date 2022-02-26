<?php

    include "../../../../cores/inc/config_c.php";
    include "../../../../cores/inc/var_c.php";
    include "../../../../cores/inc/functions_c.php";
    include "../../../../cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];

    $unit_name = htmlspecialchars($_POST['u_name']);
    $unit_shortname = htmlspecialchars($_POST['u_shortname']);
    $operator = htmlspecialchars($_POST['operator']);
    $operator_value = htmlspecialchars($_POST['operator_value']);

    $unit_name = mysqli_real_escape_string($link, $unit_name);
    $unit_shortname = mysqli_real_escape_string($link, $unit_shortname);
    $operator = mysqli_real_escape_string($link,$operator);
    $operator_value = mysqli_real_escape_string($link,$operator_value);
    
    $date = date("Y-m-d H:i:s");
    $u_id = $_SESSION["u_id"];
    $status = "active";
    $query = "INSERT INTO `_tblunits`(`name`, `ShortName`, `u_set`, `operator`, `operator_value`, `created_at`, `status`) 
    VALUES ('$unit_name','$unit_shortname','$u_set','$operator','$operator_value','$date','$status')";
    $result = mysqli_query($link,$query);

    if (!$result) {
        die("Could not create unit. ".mysqli_error($link));
    }

?>