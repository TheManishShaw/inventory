<?php

    include "../../../../cores/inc/config_c.php";
    include "../../../../cores/inc/var_c.php";
    include "../../../../cores/inc/functions_c.php";
    include "../../../../cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];

    $id = htmlspecialchars($_POST['id']);
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $oldImage = htmlspecialchars($_POST['old_image']);

    $id = mysqli_real_escape_string($link, $id);
    $name = mysqli_real_escape_string($link, $name);
    $description = mysqli_real_escape_string($link, $description);
    $oldImage = mysqli_real_escape_string($link, $oldImage);

    $imageName = '';
    if (isset($_FILES['image']) && !empty($_FILES['image']['name'])){
        $tmp_name = $_FILES['image']['tmp_name'];
        $extn = explode('.',$_FILES['image']['name']);  // returns an array with extension at 1st position
        $imageName = time().".".$extn[1];
        $folder = "../../../../data/brand_img/".$imageName;
    } else {
        $imageName = $oldImage;
    }
    
    $date = date("Y-m-d H:i:s");
    $status = "active";

    $query = "UPDATE `_brands` SET `name`='$name', `description`='$description', `image`='$imageName'
    ,`updated_at`='$date' WHERE `id` = '$id'";
    $result = mysqli_query($link,$query);

    if (!$result) {
        die("Could not create unit. ".mysqli_error($link));
    }

    if(!move_uploaded_file($tmp_name,$folder)){
        echo "Could not upload image!";
    }

?>