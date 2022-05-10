<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $chain_name = htmlspecialchars($_POST['chain_name']);
    $chain_desc = htmlspecialchars($_POST['chain_description']);
    
    $chain_name = mysqli_real_escape_string($link,$chain_name);
    $chain_desc = mysqli_real_escape_string($link,$chain_desc);

    $tmp_name = $_FILES['image']['tmp_name'];
    $extn = explode('.',$_FILES['image']['name']); // returns an array with extension at 1st position
    $imageName = time() . "." . $extn[1];
    $folder = "../../../data/chain_img/".$imageName;

    $date = date("Y-m-d H:i:s");

    $query = "INSERT INTO `chain_tbl` (`chain_name`,`chain_description`,`chain_logo`,`status`,`created_at`)
    VALUES('$chain_name','$chain_desc','$imageName','active','$date');";
    if(!mysqli_query($link,$query)) {
        die("Could not create chain. ".mysqli_error($link));
    }

    if(!move_uploaded_file($tmp_name,$folder)){
        echo "Could not upload image!";
    }

?>