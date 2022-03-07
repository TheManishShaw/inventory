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

// A function for updating the stock of one product at a time.
function updateStock($product){ // $product is the id of the product.
    global $link;   // global variable for connecting to database, declared in config_c
    $query = "SELECT SUM(`quantity`) AS `quantity` FROM `_tblpurchase_details` WHERE 
    `product_id`='$product' AND `status`='active'";     // query to get the current purchased quantity
    $result = mysqli_query($link,$query);
    $purchasedQuantity = mysqli_fetch_assoc($result);

    $query = "SELECT SUM(`quantity`) AS `quantity` FROM `_tblsales_details` WHERE 
    `product_id`='$product' AND `status`='active'";     // query to get sold quantity
    $result = mysqli_query($link,$query);
    $soldQuantity = mysqli_fetch_assoc($result);

    $quantity = $purchasedQuantity['quantity'] - $soldQuantity['quantity'];

    // query to update stock.
    $query = "UPDATE `_tblproducts` SET `quantity`='$quantity' WHERE `id`='$product'";
    $result = mysqli_query($link, $query);
    if (!$result) {
        die('Could not update product stock.'.mysqli_error($link));
    }
}

?>