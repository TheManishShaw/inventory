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
    $oldImage = htmlspecialchars($_POST['old_image']);

    $name = mysqli_real_escape_string($link,$name);
    $phone = mysqli_real_escape_string($link,$phone);
    $address = mysqli_real_escape_string($link,$address);
    $email = mysqli_real_escape_string($link,$email);
    $pincode = mysqli_real_escape_string($link,$pincode);
    $gst = mysqli_real_escape_string($link,$gst);
    $oldImage = mysqli_real_escape_string($link,$oldImage);

    $imageName = '';
    if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
        $tmp_name = $_FILES['image']['tmp_name'];
        $extn = explode('.',$_FILES['image']['name']); // extension of image
        $imageName = time() . "." . $extn[1];
        $folder = "../../../data/store_img/".$imageName;
    } else {
        $imageName = $oldImage;
    }

    
    $date = date("Y-m-d H:i:s");

    echo $query = "UPDATE `uset_tbl` SET `uset_name`='$name',`uset_email`='$email',`uset_phone`='$phone',
    `uset_address`='$address',`uset_pincode`='$pincode',`uset_gst_no`='$gst',
    `uset_image`='$imageName',`uset_updated_at`='$date'";
    $result = mysqli_query($link,$query);

    if (!$result) {
        die("Query failed. ".mysqli_error($link));
    }

    if(!move_uploaded_file($tmp_name,$folder)){
        echo "Could not upload image!";
    }
?>