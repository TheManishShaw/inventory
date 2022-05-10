<?php

    include "../../../../cores/inc/config_c.php";
    include "../../../../cores/inc/var_c.php";
    include "../../../../cores/inc/functions_c.php";
    include "../../../../cores/inc/auth_c.php";

    $id = $_POST['id'];

    $u_set = $_SESSION['u_set'];

    $unit_name = htmlspecialchars($_POST['u_name']);
    $unit_shortname = htmlspecialchars($_POST['u_shortname']);
    $operator = htmlspecialchars($_POST['operator']);
    $operator_value = htmlspecialchars($_POST['operator_value']);

    $unit_name = mysqli_real_escape_string($link, $unit_name);
    $unit_shortname = mysqli_real_escape_string($link, $unit_shortname);
    $date = date("Y-m-d");

    $query = "UPDATE `_tblunits` SET `name`='$unit_name', `ShortName`='$unit_shortname', `operator`='$operator',
     `operator_value`='$operator_value', `updated_at`='$date' WHERE `id`='$id'";
    $result = mysqli_query($link,$query);

    if (!$result) {
        die("Could not create unit. ".mysqli_error($link));
    }

?>