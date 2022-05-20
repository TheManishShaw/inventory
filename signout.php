<?php
include "cores/inc/config_c.php"; 
session_start();
session_destroy();
header("location: index.php");
exit;
?>