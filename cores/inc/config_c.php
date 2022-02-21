
 <?php 
//Database Variables
$db_name="inventory";
$db_user="root";
$db_host="localhost";
$db_pass="";
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
//System Variables
$sys_link = "http://localhost/testing/inventory";
$sys_name = "Inventory";
$sys_title = "Trapo Inventory With POS";
$sys_fav = "data/sys/logo_mins.png";
$sys_session = "trapo_session";
$sys_email = "no-reply@traderg.in";
$sys_bccemail = "team@traderg.in";
$sys_logo = "assets/media/logos/light_logo.png";
$sys_dark_logo = "assets/media/logos/dark_logo.png";
$sys_bgimage = "data/sys/bg.jpg";
$sys_defmsub = $sys_name;
$sys_nameabbr = "ST.";
$sys_signup = "enabled";
$sys_login = "enabled";
$mob_check = "enabled";
$email_check = "disabled";
$sys_phone = "8777807321";
$sys_smsapi = urlencode('fX3Ht8k51/k-Jp301nq415xrruTKOCEKgUGXzynpuW');
$sys_smssender = urlencode('GARIND');
$sys_smsverifyorg = "TraderG";
date_default_timezone_set("Asia/Kolkata");
$date = date("d/m/Y");
$def_utype = "GRP00";
$def_ustats = "active";
?>