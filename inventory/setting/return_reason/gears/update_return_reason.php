<?php

    include "../../../../cores/inc/config_c.php";
    include "../../../../cores/inc/var_c.php";
    include "../../../../cores/inc/functions_c.php";
    include "../../../../cores/inc/auth_c.php";

    $id = $_POST['id'];

    $type = htmlspecialchars($_POST['type']);
    $reason = htmlspecialchars($_POST['reason']);
    $percent = htmlspecialchars($_POST['percent']);

    $type = mysqli_real_escape_string($link,$type);
    $reason = mysqli_real_escape_string($link,$reason);
    $percent = mysqli_real_escape_string($link,$percent);

    $reason = strtolower($reason);

    $date = date('Y-m-d H:i:s');

    $query = "UPDATE `_tblreturn_reason` SET `return_type`='$type',`return_reason`='$reason',
    `return_percent`='$percent',`updated_at`='$date' WHERE `id`='$id'";
    $result = mysqli_query($link,$query);
    
    if (!$result){
        die("Could not update Return Reason. ".mysqli_error($link));
    }

?>