<?php
    include "../../../../cores/inc/config_c.php";
    include "../../../../cores/inc/var_c.php";
    include "../../../../cores/inc/functions_c.php";
    include "../../../../cores/inc/auth_c.php";

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
    $chain_id = $_SESSION['chain_id'];
    
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

    // write queries to check for email and phone.
    
    $status="active";
    
    $query="INSERT INTO `users_tbl` (`f_name`,`l_name`,`email_id`, `tel_no`,`u_type`, `business_name`,
    `gst_num`,`address`,`u_set`,`chain_id`,`u_stats`,`u_timestamp`) VALUES('$first_name','$last_name','$email','$phone'
    ,'GRP03','$business','$gst','$address','$u_set','$chain_id','$status','$timestamp')";
    // try {
        $result = mysqli_query($link,$query);
        if (!$result) {
            die("Could not create customer. ".mysqli_error($link));
        }
    // } catch (Exception $e) {
    //     if ($e->getMessage()) {
    //         $error = $e->getMessage();
    //         if(strstr($error,'Duplicate')){
    //             if(strstr($error,'tel_no')){
    //                 die('number');
    //             } else if (strstr($error, 'email_id')){
    //                 die("email");
    //             }
    //         }
    //     }
    // }
?>