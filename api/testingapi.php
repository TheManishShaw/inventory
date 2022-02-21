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

<?php 
//Database Variables
header("Content-Type: application/json; charset=UTF-8");
$db_name="tt";
$db_user="root";
$db_host="localhost";
$db_pass="";
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$sql_1 = "select * from _tblunits";
$result = mysqli_query($link, $sql_1) or die("Error in Selecting " . mysqli_error($link));
while($row =mysqli_fetch_assoc($result))
    {
		unset($dbprimary);
        unset($dbsecondary);
		$cat_id = $row["ecid"];
		$sql_2 = "SELECT cwi_img FROM categrory_wise_images WHERE cwi_cate_id = '$cat_id'";
		$result_2 = mysqli_query($link, $sql_2) or die("Error in Selecting " . mysqli_error($link));
		while($row2 =mysqli_fetch_assoc($result_2))
        {
            $dbsecondary[] = $row2;
        }
		$dbprimary[] = $row;
		$combine['cat_data'] = $dbprimary;
		if(isset($dbsecondary)){
		$combine['img_data'] = $dbsecondary;
		}
		$final_data[] = $combine;
	}
	$p['data'] = $final_data ;
echo json_encode($p);
?>