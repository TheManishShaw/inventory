
<?php 
include "cores/inc/config_c.php"; 
include "cores/inc/var_c.php";
include "cores/inc/functions_c.php";
session_start();
if(!isset($_SESSION["m_otp"])){
$otp = rand(1001,9999);
$_SESSION["m_otp"] = $otp;
}else{
    $otp = $_SESSION["m_otp"];
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $r_otp = $_POST["otp"];
    if($r_otp == $otp){
        $_SESSION["m_stats"] = "done";
        $u_id = $_SESSION["u_id"];
        $sql = "UPDATE `users_tbl` SET `u_mstats` = 'done' WHERE `users_tbl`.`u_id` = '$u_id'";
        mysqli_query($link, $sql);
        header("location: dash.php");
        exit;
    }
}
$phone = $_SESSION["tel_no"];
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2?authorization=BEWToPFXi3kewLfgMnDCmSbcJx59j4Oda1sQ7uRVN0lYGrZ6vtmdLUIDuvcYoe53iXkpSrPHfatJjWCA&variables_values=$otp&route=otp&numbers=".urlencode($phone),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
   "cache-control: no-cache"
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<title>OTP Verify - <?php echo $sys_title ?></title>
        <?php include "cores/inc/header_c.php"  ?>
	</head>
	<body id="kt_body" class="auth-bg">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Password reset -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Aside-->
				<div class="d-flex flex-column flex-lg-row-auto bg-primary w-xl-600px positon-xl-relative">
					<!--begin::Wrapper-->
					<div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
						<!--begin::Header-->
						<div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
							<!--begin::Logo-->
							<a href="index.php" class="py-9 pt-lg-20">
								<img alt="Logo" src="<?php echo $sys_logo ?>" class="h-50px" />
							</a>
							<!--end::Logo-->
							<!--begin::Title-->
							<h1 class="fw-bolder text-white fs-2qx pb-5 pb-md-10">Welcome to <?php echo $sys_name ?></h1>
							<!--end::Title-->
							<!--begin::Description-->
							<p class="fw-bold fs-2 text-white">Plan your blog post by choosing a topic creating 
							<br />an outline and checking facts</p>
							<!--end::Description-->
						</div>
						<!--end::Header-->
						<!--begin::Illustration-->
						<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url(../../assets/media/illustrations/sketchy-1/2.png)"></div>
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
							
								<!--begin::Heading-->
								<div class="text-center mb-10">
									<!--begin::Title-->
									<h1 class="text-dark mb-3">OTP Verification ?</h1>
									
									<!--end::Title-->
									<!--begin::Link-->
									<div class="text-gray-400 fw-bold fs-4">OTP send to your register mobile no.

                                    <?php if(!empty($error) && strlen($error) >= 1){?>
									<div class="alert alert-danger"><?php echo $error ?></div>
									<?php } ?></p>
                                    </div>
									<!--end::Link-->
								</div>
                                <form class="form w-100" action="" method="POST" enctype="multipart/form-data">
								<div class="fv-row mb-10">
									<label class="form-label fw-bolder text-gray-900 fs-6">Enter OTP</label>
									<input class="form-control form-control-solid"  id="otp" name="otp" placeholder="Enter OTP" autocomplete="off" />
								</div>
								
								<div class="d-flex flex-wrap justify-content-center pb-lg-0">
									<button type="submit" id="kt_password_reset_submit" class="btn btn-lg btn-primary fw-bolder me-4">
										<span class="indicator-label">Submit</span>
										<span class="indicator-progress">Please wait... 
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
									
								</div>
								<!--end::Actions-->
							</form>
							
						</div>
						<!--end::Wrapper-->
					</div>
					
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Password reset-->
		</div>
		<?php include "cores/inc/footer_c.php" ?>
	</body>
	</html>