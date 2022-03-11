<?php
    include "../../../../cores/inc/config.php";
    
    $storeId = $_POST["store"];
    
    $query = "SELECT `symbol` FROM `_tblcurrencies` WHERE `u_set` = '$storeId'";
    $sql = mysqli_query($link,$query);
    
    if(!$sql){
        die("Query Failed".mysqli_error($link));
    }
    $currency = mysqli_fetch_assoc($sql);
    
    echo $currency['symbol'];
?>