<?php 
include "cores/inc/config_c.php"; 
include "cores/inc/var_c.php";
include "cores/inc/functions_c.php";
$page = "test.php";
if($sys_login !== "enabled"){
    header("location: error.php");
    exit;
}
$string = $_SERVER['QUERY_STRING'];
$string_check = substr($string,0,3);
$string_checker = "url";
if($string_check == $string_checker){
    $ref_url = substr($string,4,500);
}
else {
    $ref_url = '/dash.php';
}
$str_len = strlen($ref_url);
$fixed_len = 0;
if($str_len == $fixed_len){
    $page = "dash.php";
}
else{
    $page = $sys_link.$ref_url;
    
}
if(!empty($_GET["error"])){
$error = $_GET["error"];
$ref_link = $_GET["error"];
}
if(!empty($_GET["ref_stats"])){
$ref_stats = htmlspecialchars($_GET["ref_stats"]);
}
ini_set('session.gc_maxlifetime', 86400);
ini_set('session.gc_probability', 0);
ini_set('session.gc_divisor', 100);
session_set_cookie_params(86400);
session_start();

if(isset($_SESSION[$sys_session]) && $_SESSION[$sys_session] === true){
    header("location: $page");
    exit;
}
$email_id = $pass_id = "";
$email_id_err = $pass_id_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["email_id"]))){
        $email_id_err = "Please enter email_id. ERR#";
    } else{
        $email_id = trim($_POST["email_id"]);
        }
    if(empty(trim($_POST["pass_id"]))){
        $password_err = "Please enter your password. ERR#";
    } else{
        $password = trim($_POST["pass_id"]);
    }
    if(empty($email_id_err) && empty($password_err)){
        $sql = "SELECT `u_id`, `f_name`, `l_name`, `email_id`, `tel_no`, `pass_id`, `u_type`, `u_stats`, 
		`u_pic`, `u_mstats`, `u_estats`,`u_set`,`uset_image`,`u_store_stats` FROM `users_tbl` WHERE `email_id` = ?";
        if($stmt = mysqli_prepare($link, $sql)){
			
            mysqli_stmt_bind_param($stmt, "s", $param_email_id);
            $param_email_id = $email_id;
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    mysqli_stmt_bind_result($stmt, $u_id, $f_name, $l_name,  $email_id,  $tel_no,  $hashed_password,  $u_type,  $u_stats, $u_pic, $u_mstats, $u_estats,$u_set,$uset_pic,$u_store_stats);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            $_SESSION["$sys_session"] = true;
                            $_SESSION["u_id"] = $u_id;
                            $_SESSION["f_name"] = $f_name;
                            $_SESSION["l_name"] = $l_name;
                            $_SESSION["email_id"] = $email_id;
                            $_SESSION["tel_no"] = $tel_no;
                            $_SESSION["u_type"] = $u_type;
                            $_SESSION["u_stats"] = $u_stats;
                            $_SESSION["u_pic"] = $u_pic;
                            $_SESSION["m_stats"] = $u_mstats;
                            $_SESSION["e_stats"] = $u_estats;
                            $_SESSION["u_set"] = $u_set;
                            $_SESSION["uset_image"] = $uset_pic;
                            $_SESSION["u_store_stats"] = $u_store_stats;
                            $_SESSION["auth_token"] = authkey("32");
                            $_SESSION["login_ip"] = getUserIP();
                            $page = $sys_link.$ref_url;
							date_default_timezone_set('Asia/Kolkata');
							$login_stamp = date("d/m/Y H:i:s");
							$sql_login = "UPDATE `users_tbl` SET `u_lastlogin`= '$login_stamp' WHERE `u_id` = '$u_id'";
							mysqli_query($link, $sql_login);
                            header("location: ".$page."");
                        }
                        else{
                            $password_err = "The password you entered was not valid. ERR#00";
                            $error = $password_err;
                        }
                    }    
                } else{
                    $email_id_err = "No account found with that email_id. ERR#00";
                    $error = $email_id_err;
                }   
            }else{
                echo "Oops! Something went wrong. Please try again later. ERR#00";
                $error = "ERR#00";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<title>Sign In - <?php echo  $sys_title?></title>
		<?php include "cores/inc/header_c.php"  ?>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="auth-bg">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Aside-->
				<div class="d-flex flex-column flex-lg-row-auto bg-primary w-xl-600px positon-xl-relative">
					<!--begin::Wrapper-->
					<div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
						<!--begin::Header-->
						<div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-10">
							<!--begin::Logo-->
							<a href="index.php" class="py-5 pt-lg-20">
								<img alt="Logo" src="<?php echo $sys_logo ?>" class="h-50px" />
							</a>
							<!--end::Logo-->
							<!--begin::Title-->
							<h1 class="fw-bolder text-white fs-2qx pb-5 pb-md-10">Welcome to <?php echo $sys_name ?></h1>
							<!--end::Title-->
							<!--begin::Description-->
							<p class="fw-bold fs-2 text-white">Plan your blog post by choosing a topic creating 
							<br />an outline and checking facts
							
						</p>
							<!--end::Description-->
						</div>
						<!--end::Header-->
						<!--begin::Illustration-->
						<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-200px min-h-lg-450px" style="background-image: url(assets/media/images/banner.svg)"></div>
						<!--end::Illustration-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--begin::Aside-->
				<!--begin::Body-->
				<div class="d-flex flex-column flex-lg-row-fluid py-10">
					<!--begin::Content-->
					<div class="d-flex flex-center flex-column flex-column-fluid">
						<!--begin::Wrapper-->
						<div class="w-lg-500px p-10 p-lg-15 mx-auto">
							<!--begin::Form-->
							<form class="form w-100" action="<?php if(!empty($_GET["url"])){$urls=$_GET["url"]; if(strlen($urls) > 0){?>?url=<?php echo $ref_url ?><?php } }  ?>" method="POST">
								<!--begin::Heading-->
								<div class="text-center mb-10">
									<!--begin::Title-->
									<h1 class="text-dark mb-3">Sign In to <?php echo $sys_name ?></h1>
									<!--end::Title-->
									<!--begin::Link-->
									<div class="text-gray-400 fw-bold fs-4">New Here? 
									<a href="signup.php" class="link-primary fw-bolder">Create an Account</a></div>
									<p><?php if(!empty($ref_stats) && $ref_stats == "reg_success"){?>
									<div class="alert alert-success">You have successfully signed up with <?php echo $sys_title ?></div>
									<?php } ?>
									<?php if(!empty($error) && strlen($error) >= 1){?>
									<div class="alert alert-danger"><?php echo $error ?></div>
									<?php } ?></p>
									<!--end::Link-->
								</div>								
								<div class="fv-row mb-10">								
									<label class="form-label fs-6 fw-bolder text-dark">Email</label>									
									<input class="form-control form-control-lg form-control-solid <?php echo (!empty($email_id_err)) ? 'is-invalid' : ''; ?>" placeholder="demo@example.com" type="text" id="email_id" name="email_id" autocomplete="on" />								
								</div>
								<div class="fv-row mb-10">
									<div class="d-flex flex-stack mb-2">
										<label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
										<a href="password_reset.php" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>										
									</div>
									<input class="form-control form-control-lg form-control-solid" type="password" id="pass_id" name="pass_id" placeholder="Password" autocomplete="off" />
								
								</div>
								<div class="text-center">
									<button type="submit" class="btn btn-lg btn-primary fw-bolder me-3 my-2">
										<span class="indicator-label">Sign In</span>
										<span class="indicator-progress">Please wait... 
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
								</div>
							</form>
						</div>
					</div>
					<div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
						<!--begin::Links-->
						
						<!--end::Links-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<?php include "cores/inc/footer_c.php"  ?>
	</body>
	<!--end::Body-->
</html>