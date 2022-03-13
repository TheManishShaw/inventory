<?php

    include "cores/inc/config_c.php";
    include "cores/inc/var_c.php";
    include "cores/inc/functions_c.php";
    include "cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];

    $f_name = htmlspecialchars($_POST['fname']);
    $l_name = htmlspecialchars($_POST['lname']);
    $phone = htmlspecialchars($_POST['phone']);
    $site = htmlspecialchars($_POST['website']);
    $old_profile_image = htmlspecialchars($_POST['old_profile_image']);
    $store_name = htmlspecialchars($_POST['store_name']);
    $store_email = htmlspecialchars($_POST['store_email']);
    $store_phone = htmlspecialchars($_POST['store_phone']);
    $store_address = htmlspecialchars($_POST['store_address']);
    $store_gst_no = htmlspecialchars($_POST['store_gst_no']);
    $old_store_image = htmlspecialchars($_POST['old_store_image']);

    $f_name = mysqli_real_escape_string($link,$f_name);
    $l_name = mysqli_real_escape_string($link,$l_name);
    $phone = mysqli_real_escape_string($link,$phone);
    $site = mysqli_real_escape_string($link,$site);
    $old_profile_image = mysqli_real_escape_string($link,$old_profile_image);
    $store_name = mysqli_real_escape_string($link,$store_name);
    $store_email = mysqli_real_escape_string($link,$store_email);
    $store_phone = mysqli_real_escape_string($link,$store_phone);
    $store_address = mysqli_real_escape_string($link,$store_address);
    $store_gst_no = mysqli_real_escape_string($link,$store_gst_no);
    $old_store_image = mysqli_real_escape_string($link,$old_store_image);

    $user_query = "UPDATE `users_tbl` SET `f_name`=?,`l_name`=?,`tel_no`=?,`u_pic`=? WHERE `u_id`=?";
    $uset_query = "UPDATE `uset_tbl` SET `uset_name`=?,`uset_email`=?,`uset_phone`=?,`uset_address`=?,
    `uset_site`=?,`uset_gst_no`=?,`uset_image`=? WHERE `uset_id`=?";

    $profile_img = '';
    if(isset($_FILES['avatar']) && $_FILES['avatar']['size']!=0){
        $image_temp = $_FILES['avatar']['tmp_name'];
        $extn = explode('.',$_FILES['avatar']['name']); // returns an array with extension at 1st position.
        $profile_img = 'user'.time().".".$extn[1];
        $folder = "data/user_img/".$profile_img;
        move_uploaded_file($image_temp,$folder);
    } else {
        $profile_img = $old_profile_image;
    }

    $store_img = '';
    if(isset($_FILES['store_img']) && $_FILES['store_img']['size']!=0){
        $image_temp = $_FILES['store_img']['tmp_name'];
        $extn = explode('.',$_FILES['store_img']['name']); // returns an array with extension at 1st position.
        $store_img = 'store'.time().".".$extn[1];
        $folder = "data/store_img/".$store_img;
        move_uploaded_file($image_temp,$folder);
    } else {
        $store_img = $old_store_image;
    }

    if($stmt1 = mysqli_prepare($link,$user_query)) {
        mysqli_stmt_bind_param($stmt1,'sssss',$f_name,$l_name,$phone,$profile_img,$u_id);
        if($stmt2 = mysqli_prepare($link,$uset_query)){
            mysqli_stmt_bind_param($stmt2,'ssssssss',$store_name,$store_email,$store_phone,$store_address,$site,$store_gst_no,$store_img,$u_set);
        }
        mysqli_stmt_execute($stmt1);
        mysqli_stmt_execute($stmt2);
    } else {
        die("Could not update user info. ".mysqli_error($link));
    }

?>