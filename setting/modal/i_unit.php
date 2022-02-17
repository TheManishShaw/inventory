<?php 
include "../../cores/inc/config_c.php";
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
session_start();
$project_name = mysqli_real_escape_string($link, $_REQUEST['project_name']);
$project_overview = mysqli_real_escape_string($link, $_REQUEST['project_overview']);
$project_status = mysqli_real_escape_string($link, $_REQUEST['project_status']);

$date = date("d/m/Y");
$u_id = $_SESSION["u_id"];

$query = "INSERT INTO `blog_tbl`(`blog_title`, `blog_data`, `blog_creator`, `blog_status`, `blog_timestamp`) VALUES ('$project_name','$project_overview','$u_id','$project_status','$date')";
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