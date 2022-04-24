<?php

    include "../../../../cores/inc/config_c.php";
    include "../../../../cores/inc/var_c.php";
    include "../../../../cores/inc/functions_c.php";
    include "../../../../cores/inc/auth_c.php";

    $uset = $_SESSION['u_set'];

    $type = htmlspecialchars($_POST['type']);
    $reason = htmlspecialchars($_POST['reason']);
    $percent = htmlspecialchars($_POST['percent']);

    $type = mysqli_real_escape_string($link,$type);
    $reason = mysqli_real_escape_string($link,$reason);
    $percent = mysqli_real_escape_string($link,$percent);

    $reason = strtolower($reason);

    $date = date('Y-m-d H:i:s');

    $query = "INSERT INTO `_tblreturn_reason` (`user_id`,`uset`,`return_type`,`return_reason`,`return_percent`
    ,`status`,`created_at`) VALUES ('$u_id','$uset','$type','$reason','$percent','active','$date');";
    $result = mysqli_query($link,$query);
    
    if (!$result){
        die("Could not make Return Reason. ".mysqli_error($link));
    }

?>