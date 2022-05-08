<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $u_id = $_SESSION['u_id'];

    $query = "UPDATE `users_tbl` SET `u_store_stats` = 'done' WHERE `u_id`='$u_id'";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die('Could not update user table. '.mysqli_error($link));
    }

?>