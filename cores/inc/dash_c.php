<?php
$db_handle = new DBController();
$sql_dash = "SELECT `dash_data`,`dash_name` FROM `dash_tbl` WHERE `dash_grp` LIKE '%$u_type%' AND `dash_status` = 'active'";
$dash_array =  $db_handle->runQuery($sql_dash);
if ((is_array($dash_array) || is_object($dash_array))){
    foreach($dash_array as $k_dash=>$v_dash) {
        include $dash_array[$k_dash]["dash_data"];
    }
}
?>