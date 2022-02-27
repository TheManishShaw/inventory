<?php

    include "../../../../cores/inc/config_c.php";
    include "../../../../cores/inc/var_c.php";
    include "../../../../cores/inc/functions_c.php";
    include "../../../../cores/inc/auth_c.php";

    $u_set = $_SESSION['u_set'];

    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);

    $name = mysqli_real_escape_string($link, $name);
    $description = mysqli_real_escape_string($link, $description);

    $tmp_name = $_FILES['image']['tmp_name'];
    $extn = explode('.',$_FILES['image']['name']);  // returns an array with extension at 1st position
    $imageName = time().".".$extn[1];
    $folder = "../../../../data/brand_img/".$imageName;
    
    $date = date("Y-m-d H:i:s");
    $status = "active";

    $query = "INSERT INTO `_brands`(`name`, `description`, `image`, `u_set`,`created_at`, `status`) 
    VALUES ('$name','$description','$imageName','$u_set','$date','$status')";
    $result = mysqli_query($link,$query);

    if (!$result) {
        die("Could not create unit. ".mysqli_error($link));
    }

    if(!move_uploaded_file($tmp_name,$folder)){
        echo "Could not upload image!";
    }

?>