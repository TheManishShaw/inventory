<?php
//Fetch User IP
function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }
    $ip  = $_SERVER['REMOTE_ADDR'];
    return $ip;
}

//Generate Random String
function authkey($length) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

//Window Opener Reloader
function windowopener_reloader(){
?>
    <script>
        parent.cusframeout();
        parent.location_reload();
    </script>
<?php
}
class DBController {
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
	    global $db_host,$db_user,$db_pass,$db_name;
		$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
	function executeUpdate($query) {
        $result = mysqli_query($this->conn,$query);        
		return $result;		
    }
}

// functions for updating the stock of one product at a time.
function increaseStock($product,$stock){ // $product is the id of the product.
    global $link;
    $query = "INSERT INTO `stock_tbl` (`product_id`,`store_id`,`stock`,`created_at`) 
    VALUES('$product','".$_SESSION['u_set']."','$stock','".date('Y-m-d H:i:s')."') ON DUPLICATE KEY 
    UPDATE `stock`=`stock`+$stock,`updated_at`=VALUES(`created_at`)";
    if (!mysqli_query($link,$query)){
        die("Could not update stock. ".mysqli_error($link));
    }
}

function decreaseStock($product,$stock){
    global $link;
    $query = "INSERT INTO `stock_tbl` (`product_id`,`store_id`,`stock`,`created_at`) 
    VALUES('$product','".$_SESSION['u_set']."','$stock','".date('Y-m-d H:i:s')."') ON DUPLICATE KEY 
    UPDATE `stock`=`stock`-$stock,`updated_at`=VALUES(`created_at`)";
    if (!mysqli_query($link,$query)){
        die("Could not update stock. ".mysqli_error($link));
    }
}

?>