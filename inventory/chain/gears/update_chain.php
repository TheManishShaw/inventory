<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $id = htmlspecialchars($_POST['id']);
    $chain_name = htmlspecialchars($_POST['chain_name']);
    $chain_desc = htmlspecialchars($_POST['chain_description']);
    $old_image = htmlspecialchars($_POST['old_chain_image']);
    
    $id = mysqli_real_escape_string($link,$id);
    $chain_name = mysqli_real_escape_string($link,$chain_name);
    $chain_desc = mysqli_real_escape_string($link,$chain_desc);
    $old_image = mysqli_real_escape_string($link,$old_image);

    $imageName = '';
    if (isset($_FILES['image']) && $_FILES['image']['size']!=0) {
        $tmp_name = $_FILES['image']['tmp_name'];
        $extn = explode('.',$_FILES['image']['name']); // returns an array with extension at 1st position
        $imageName = time() . "." . $extn[1];
        $folder = "../../../data/chain_img/".$imageName;
        move_uploaded_file($tmp_name,$folder);
    } else {
        $imageName = $old_image;
    }

    $date = date("Y-m-d H:i:s");

    $query = "UPDATE `chain_tbl` SET `chain_name`='$chain_name',`chain_description`='$chain_desc',
    `chain_logo`='$imageName',`updated_at`='$date' WHERE `chain_id`='$id'";
    if(!mysqli_query($link,$query)) {
        die("Could not create chain. ".mysqli_error($link));
    }

?>