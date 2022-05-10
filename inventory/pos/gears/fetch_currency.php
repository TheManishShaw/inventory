<?php
    include "../../../../cores/inc/config_c.php";
    include "../../../../cores/inc/var_c.php";
    include "../../../../cores/inc/functions_c.php";
    include "../../../../cores/inc/auth_c.php";
    
    $storeId = $_POST["store"];
    $chain_id = $_SESSION["chain_id"];
    
    $query = "SELECT `symbol` FROM `_tblcurrencies` WHERE (`u_set` = '$storeId' OR `chain_id`=')";
    $sql = mysqli_query($link,$query);
    
    if(!$sql){
        die("Query Failed".mysqli_error($link));
    }
    $currency = mysqli_fetch_assoc($sql);
    
    echo $currency['symbol'];
?>