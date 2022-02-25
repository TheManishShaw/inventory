<?php
    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $name = htmlspecialchars($_POST['uset_name']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $email = htmlspecialchars($_POST['email']);
    $pincode = htmlspecialchars($_POST['pincode']);
    $gst = htmlspecialchars($_POST['gstno']);

    $name = mysqli_real_escape_string($link,$name);
    $phone = mysqli_real_escape_string($link,$phone);
    $address = mysqli_real_escape_string($link,$address);
    $email = mysqli_real_escape_string($link,$email);
    $pincode = mysqli_real_escape_string($link,$pincode);
    $gst = mysqli_real_escape_string($link,$gst);

    $tmp_name = $_FILES['image']['tmp_name'];
    $extn = explode('.',$_FILES['image']['name']); // extension of image
    $imageName = time() . "." . $extn[1];
    $folder = "../../../data/store_img/".$imageName;
    
    $date = date("Y-m-d H:i:s");

    echo $query = "INSERT INTO `uset_tbl` (`uset_name`,`uset_email`,`uset_phone`,`uset_address`,`uset_pincode`,`uset_gst_no`,
    `uset_image`,`uset_created_at`) VALUES ('$name','$email','$phone','$address','$pincode','$gst','$imageName','$date');";
    $result = mysqli_query($link,$query);

    if (!$result) {
        die("Query failed. ".mysqli_error($link));
    }

    if(!move_uploaded_file($tmp_name,$folder)){
        echo "Image uploaded succesfully!";
    }
?>