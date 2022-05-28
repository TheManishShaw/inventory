<?php
    include "../../../../cores/inc/config_c.php";
    include "../../../../cores/inc/var_c.php";
    include "../../../../cores/inc/functions_c.php";
    include "../../../../cores/inc/auth_c.php";

    $id = $_POST['id'];

    $timestamp= date('Y-m-d H:i:s') ;
    
    $first_name = htmlspecialchars($_POST["firstname"]);
    $last_name = htmlspecialchars($_POST["lastname"]);
    $email = '';
    if (isset($_POST['email'])) {
        $email=htmlspecialchars($_POST['email']);
    }
    $phone = htmlspecialchars($_POST['phone']);
    $business = '';
    if (isset($_POST['business_name'])) {
        $business=htmlspecialchars($_POST['business_name']);
    }
    $gst = '';
    if (isset($_POST['gst_number'])) {
        $gst=htmlspecialchars($_POST['gst_number']);
    }
    $address = '';
    if (isset($_POST['address'])) {
        $address=htmlspecialchars($_POST['address']);
    }
    $u_set = $_SESSION['u_set'];
    
    $first_name= mysqli_real_escape_string($link,$first_name);
    $last_name= mysqli_real_escape_string($link,$last_name);
    $email=mysqli_real_escape_string($link,$email);
    $phone= mysqli_real_escape_string($link,$phone);
    $business= mysqli_real_escape_string($link,$business);
    $gst= mysqli_real_escape_string($link,$gst);
    $address=mysqli_real_escape_string($link,$address);
    $u_set = mysqli_real_escape_string($link,$u_set);
    
    if($email == "")
    {
        $email = "customer". rand('12223','12323') . "@trapo.in";
    }
    $status="active";
    
    $query="UPDATE `users_tbl` SET `f_name`='$first_name',`l_name`='$last_name',`email_id`='$email',
     `tel_no`='$phone', `business_name`='$business',`gst_num`='$gst',`address`='$address' WHERE 
    `u_id`='$id'";
    $result = mysqli_query($link,$query);
    try {
        $result = mysqli_query($link,$query);
        if (!$result) {
            $error = mysqli_error($link);
            if(strstr($error,'Duplicate')){
                if(strstr($error,'tel_no')){
                    die('number');
                } else if (strstr($error, 'email_id')){
                    die("email");
                }
            }
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
        if(strstr($error,'Duplicate')){
            if(strstr($error,'tel_no')){
                die('number');
            } else if (strstr($error, 'email_id')){
                die("email");
            }
        }
    }

?>