<?php 
include "../../cores/inc/config_c.php";
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
session_start();
$unit_name = mysqli_real_escape_string($link, $_REQUEST['u_name']);
$unit_shortname = mysqli_real_escape_string($link, $_REQUEST['u_shortname']);
$date = date("Y-m-d");
$u_id = $_SESSION["u_id"];
$status = "active";
$query = "INSERT INTO `_tblunits`(`name`, `ShortName`, `u_set`, `created_at`, `status`) VALUES ('$unit_name','$unit_shortname','$u_id','$date','$status')";
if(mysqli_query($link, $query)){
    /*$header = "From: no-reply@ivdata.in \r\n";
    $header .= "Reply-To: care@traderg.in \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: text/html; charset=UTF-8\r\n";
    $msg = file_get_contents("../../../assets/doc/welcome_email.php");
    $msg = str_replace("#F_name#", "$f_name", $msg);
    $msg = str_replace("#l_name#", "$l_name", $msg);
    $msg = str_replace("#date#", "$date", $msg);
    //$email_id = "tech@infovue.in";
    if($status == "approved"){
    mail($email_id,"Kyc Verified",$msg, $header);
    }*/
   
    echo "ok";
}else{
   
    echo "err";
    
}
?>