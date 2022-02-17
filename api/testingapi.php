<?php 
include "../cores/inc/config_c.php";
$sql = "select * from _tblunits";
$res = mysqli_query($link,$sql);
$count = mysqli_num_rows($res);
if($count > 0) {
    header("content-Type: JSON");

    while($row = mysqli_fetch_assoc($res)){
        $arr[]=$row;
    }
    echo json_encode(['data'=>$arr], JSON_PRETTY_PRINT);
}
else{
    echo "No Data found";
}

?>