<?php
    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $u_id = $_SESSION['u_id'];

    $name = htmlspecialchars($_POST['uset_name']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $email = htmlspecialchars($_POST['email']);
    $pincode = htmlspecialchars($_POST['pincode']);
    $gst = htmlspecialchars($_POST['gstno']);
    $chain_id = htmlspecialchars($_POST['chain_id']);

    $name = mysqli_real_escape_string($link,$name);
    $phone = mysqli_real_escape_string($link,$phone);
    $address = mysqli_real_escape_string($link,$address);
    $email = mysqli_real_escape_string($link,$email);
    $pincode = mysqli_real_escape_string($link,$pincode);
    $gst = mysqli_real_escape_string($link,$gst);
    $chain_id = mysqli_real_escape_string($link,$chain_id);

    $tmp_name = $_FILES['image']['tmp_name'];
    $extn = explode('.',$_FILES['image']['name']); // returns an array with extension at 1st position
    $imageName = time() . "." . $extn[1];
    $folder = "../../../data/store_img/".$imageName;
    
    $date = date("Y-m-d H:i:s");

    $query = "INSERT INTO `uset_tbl` (`uset_name`,`uset_email`,`uset_phone`,`uset_chain`,`uset_address`,`uset_pincode`,`uset_gst_no`,
    `uset_image`,`uset_created_at`) VALUES ('$name','$email','$phone','$chain_id','$address','$pincode','$gst','$imageName','$date');";
    $result = mysqli_query($link,$query);

    if (!$result) {
        die("Query failed. ".mysqli_error($link));
    }

    // query for getting the latest store id
    $query = "SELECT `uset_id`,`uset_chain` FROM `uset_tbl` ORDER BY `uset_id` DESC LIMIT 1";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die("Could not fetch store id. ".mysqli_error($link));
    }
    $store = mysqli_fetch_assoc($result);
    $store_id = $store['uset_id'];
    $chain_id = $store['uset_chain'];

    // query for updating store id and store image in users_tbl
    $query = "UPDATE `users_tbl` SET `u_set`='$store_id',`chain_id`='$chain_id',`uset_image`='$imageName',`u_store_stats`='done' WHERE `u_id`='$u_id'";
    if(!mysqli_query($link,$query)) {
        die("Could not update user store. ".mysqli_error($link));
    }

    if(!move_uploaded_file($tmp_name,$folder)){
        echo "Could not upload image!";
    }
?>