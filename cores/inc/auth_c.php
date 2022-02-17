<?php
ini_set('session.gc_maxlifetime', 86400);
session_set_cookie_params(86400);
ini_set('session.gc_probability', 0);
ini_set('session.gc_divisor', 100);
session_start();
//Session Variables
$u_id = $_SESSION["u_id"];
$f_name = $_SESSION["f_name"];
$l_name = $_SESSION["l_name"];
$email_id = $_SESSION["email_id"];
$tel_no = $_SESSION["tel_no"];
$u_type = $_SESSION["u_type"];
$u_stats = $_SESSION["u_stats"];
$u_pic = $_SESSION["u_pic"];
$login_ip = $_SESSION["login_ip"];
$auth_token = $_SESSION["auth_token"];
$u_mstats = $_SESSION["m_stats"];
$u_estats = $_SESSION["e_stats"];
$ref_url = $_SERVER['REQUEST_URI'];
if(!isset($_SESSION["$sys_session"]) || $_SESSION["$sys_session"] !== true){
    header("location: ".$sys_link."/index.php?url=".$ref_url."");
    exit;
}
if($mob_check == "enabled"){
if(!isset($_SESSION["$sys_session"]) || $_SESSION["m_stats"] !== "done"){
    header("location: ".$sys_link."/m_verify.php?url=".$ref_url."");
    exit;
}
}
if($email_check == "enabled"){
if(!isset($_SESSION["$sys_session"]) || $_SESSION["e_stats"] !== "done"){
    header("location: ".$sys_link."/e_verify.php");
    exit;
}
}
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$u_id  = $_SESSION["u_id"];
date_default_timezone_set("Asia/Calcutta");
$auth_page = basename($_SERVER['PHP_SELF']);
$auth_stamp = date("d/m/Y h:i:sa");
$current_ip = getUserIP();
$auth_key = authkey("16");
if($login_ip != $current_ip){
    $auth_status = "invalid";
}
else{
    $auth_status = "valid";
}
/* $lock_query = "SELECT COUNT(*) AS `pages`, `pages_tbl`.`title`  FROM `paccess_tbl` INNER JOIN `pages_tbl` ON `pages_tbl`.`id` = `paccess_tbl`.`page_id` WHERE (`pages_tbl`.`data` LIKE '%$auth_page%' AND `paccess_tbl`.`o_uid` LIKE '%$u_id%' AND `paccess_tbl`.`status` = 'active') OR (`pages_tbl`.`alt_data` LIKE '%dash.bx%' AND `paccess_tbl`.`o_uid` LIKE '%$u_id%' AND `paccess_tbl`.`status` = 'active') OR (`pages_tbl`.`data` LIKE '%$auth_page%' AND `paccess_tbl`.`o_utype` LIKE '%$u_type%' AND `paccess_tbl`.`status` = 'active') OR (`pages_tbl`.`alt_data` LIKE '%$auth_page%' AND `paccess_tbl`.`o_utype` LIKE '%$u_type%' AND `paccess_tbl`.`status` = 'active') OR (`pages_tbl`.`alt_data` LIKE '%$auth_page%' AND `paccess_tbl`.`o_utype` LIKE '%GLOBAL%' AND `paccess_tbl`.`status` = 'active') OR (`pages_tbl`.`data` LIKE '%$auth_page%' AND `paccess_tbl`.`o_utype` LIKE '%GLOBAL%' AND `paccess_tbl`.`status` = 'active')";
$lock_rquery = "SELECT COUNT(*) AS `pages` FROM `paccess_tbl` INNER JOIN `pages_tbl` ON `pages_tbl`.`id` = `paccess_tbl`.`page_id` WHERE (`pages_tbl`.`data` LIKE '%$auth_page%' AND `paccess_tbl`.`r_uid` LIKE '%$u_id%' AND `paccess_tbl`.`status` = 'active') OR (`pages_tbl`.`alt_data` LIKE '%$auth_page%' AND `paccess_tbl`.`r_uid` LIKE '%$u_id%' AND `paccess_tbl`.`status` = 'active')";
if(mysqli_query($link, $lock_query)){
    $l_result = mysqli_query($link, $lock_query);
    $l_resultr = mysqli_query($link, $lock_rquery);
    while($row = mysqli_fetch_assoc($l_result)) {
        $p_stats = $row['pages'];
        $p_title = $row['title'];
    }
    while($row = mysqli_fetch_assoc($l_resultr)) {
            $p_statsr = $row['pages'];
    }
}
if($p_stats == "0" || $p_statsr == "1"){
       $auth_status = "restricted";
    }

if($p_stats == "0" || $p_statsr == "1"){
        $restrict = "restrict.php";
        $page = $sys_link."/".$restrict;
        header("location: $page");
    } */
$sql_session = "INSERT INTO `auth_tbl`(`u_id`, `auth_key`, `auth_token`, `auth_page`, `auth_status`, `auth_ip`, `auth_stamp`) VALUES ('$u_id', '$auth_key', '$auth_token', '$auth_page', '$auth_status' , '$current_ip', '$auth_stamp')";
$run_auth = mysqli_query($link, $sql_session);
if($login_ip != $current_ip){
    session_destroy();
    header("location: ".$sys_link."/index.php?error=changeip");
}
?>