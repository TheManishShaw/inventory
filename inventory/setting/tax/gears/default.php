<?php

    include "../../../../cores/inc/config_c.php";

    $id = $_POST['id'];

    $query = "UPDATE `tax_tbl` SET `default`='no'";
    if(!mysqli_query($link,$query)) {
        die("Could not change default tax. ".mysqli_error($link));
    }

    $query = "UPDATE `tax_tbl` SET `default`='yes' WHERE `tax_id`='$id'";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die("Could not change default tax! ".mysqli_error($link));
    }

?>