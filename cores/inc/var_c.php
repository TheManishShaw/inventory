<?php 
$headers = "";
$today = date("d/m/Y");
$headers .= "Organization: ".$sys_title."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: PHP". phpversion() ."\r\n";
$headers .= "Return-Path: Inventory V2 <team@trapo.in>\r\n";
/*
Put Header Variables to send mail
$headers .= "From: ".$af_name." ".$al_name." <tech@ivdata.in>\r\n";
$headers .= "Reply-To: ".$af_name." <".$sys_email.">\r\n";
*/
?>