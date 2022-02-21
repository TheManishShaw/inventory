<?php 
include "../../cores/inc/config_c.php";
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
session_start();

$unit_name = mysqli_real_escape_string($link, $_REQUEST['u_name']);
$unit_shortname = mysqli_real_escape_string($link, $_REQUEST['u_shortname']);
$b_id = mysqli_real_escape_string($link, $_REQUEST['b_id']);
$date = date("d/m/Y");
$u_id = $_SESSION["u_id"];

$query = "UPDATE `blog_tbl` SET `blog_title`='$project_name',`blog_data`='$project_overview',`blog_status`='$project_status' WHERE `blog_id` = '$b_id'";
if(mysqli_query($link, $query)){
    echo "ok";
}else{
    echo "err";
}
?>