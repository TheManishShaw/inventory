<?php 
include "cores/inc/config_c.php"; 
include "cores/inc/var_c.php";
include "cores/inc/functions_c.php";
if($sys_signup !== "enabled"){
    header("location: index.php");
    exit;
}
$f_name = "";
$l_name = "";
$email_id = $pass_id = $confirm_pass_id = "";
$email_id_err = $pass_id_err = $confirm_pass_id_err = $tel_err = "";
$tel_no="";
$pass_id="";
$u_type = "";
$u_stats = "";
$error ="";
$u_set = 0;
$data_stamp = date("Y-m-d H:i:s");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["email_id"]))){
        $email_id_err = "Please enter a Email.";
        $error = $error." ".$email_id_err;
    }
    else{
        $sql = "SELECT `email_id` FROM `users_tbl` WHERE `email_id` = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_email_id);
            $param_email_id = trim($_POST["email_id"]);
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_id_err = "This Email ID is already taken. ERR#0001";
                    $error = $error." ".$email_id_err;
                } else{
                    $f_name = trim($_POST["f_name"]);
                    $l_name = trim($_POST["l_name"]);
                    $email_id = trim($_POST["email_id"]);
                    $tel_no = trim($_POST["tel_no"]);
                    $u_type = trim($_POST["u_type"]);
                    $u_stats = trim($_POST["u_stats"]);
                }
            } else{
                //echo "Oops! Something went wrong. Please try again later. ERR#0002";
                $error = $error." "."Email Check Statement Not Processed";
            }
        }
        mysqli_stmt_close($stmt);
    }
    if(empty(trim($_POST["tel_no"]))){
        $tel_no_err = "Please enter a Phone No.";
        $error = $error." ".$tel_no_err;
    }
    else{
        $sql = "SELECT `tel_no` FROM `users_tbl` WHERE `tel_no` = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_email_id);
            $param_email_id = trim($_POST["tel_no"]);
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $tel_no_err = "This Phone No. is already taken. ERR#0003";
                    $error = $error." ".$tel_no_err;
                } else{
                    $f_name = trim($_POST["f_name"]);
                    $l_name = trim($_POST["l_name"]);
                    $email_id = trim($_POST["email_id"]);
                    $tel_no = trim($_POST["tel_no"]);
                    $u_type = trim($_POST["u_type"]);
                    $u_stats = trim($_POST["u_stats"]);   
                }
            } else{
                //echo "Oops! Something went wrong. Please try again later. ERR#0002";
                $error = $error." "."Email Check Statement Not Processed";
            }
        }
        mysqli_stmt_close($stmt);
    }
    if(empty(trim($_POST["pass_id"]))){
        $pass_id_err = "Please enter a password. ERR#0007";
        $error = $error." ".$pass_id_err;
    } elseif(strlen(trim($_POST["pass_id"])) < 8){
        $pass_id_err = "Password must have atleast 8 characters. ERR#0008";
        $error = $error." ".$pass_id_err;
    } else{
        $pass_id = trim($_POST["pass_id"]);
    }
    if(empty(trim($_POST["confirm_pass_id"]))){
        $confirm_pass_id_err = "Please confirm password. ERR#0009"; 
        $error = $error." ".$confirm_pass_id_err;
    } else{
        $confirm_pass_id = trim($_POST["confirm_pass_id"]);
        if(empty($pass_id_err) && ($pass_id != $confirm_pass_id)){
            $confirm_pass_id_err = "Password did not match. ERR#0010";
            $error = $error." ".$confirm_pass_id_err;
        }
    }
    if(empty($email_id_err) && empty($pass_id_err) && empty($confirm_pass_id_err) ){
		$sql = "SELECT `uset_id` FROM `uset_tbl` ORDER BY `uset_id` DESC LIMIT 1";
		if ($result = mysqli_query($link,$sql)){
			$row = mysqli_fetch_assoc($result);
			if ($u_set == null) {
				$u_set = 1;
			} else {
				$u_set = $row['uset_id']+1;
			}
		} else {
			$confirm_pass_id_err = "Could not fetch Store id.";
			$error = $error." ".$confirm_pass_id_err;
		}
        $sql = "INSERT INTO `users_tbl`(`f_name`, `l_name`, `email_id`, `tel_no`, `pass_id`, `u_type`, `u_stats`, `u_set`, `u_timestamp`)  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        if($stmt = mysqli_prepare($link, $sql)){
            $f_name = trim($_POST["f_name"]);
            $l_name = trim($_POST["l_name"]);
            $email_id = trim($_POST["email_id"]);
            $tel_no = trim($_POST["tel_no"]);
            $u_type = trim($_POST["u_type"]);
            $u_stats = trim($_POST["u_stats"]);
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_f_name, $param_l_name, $param_email_id, $param_tel_no, $param_pass_id, $param_u_type, $param_u_stats, $u_set, $param_data_stamp);
            $param_f_name = $f_name;
            $param_l_name = $l_name;
            $param_email_id = $email_id;
            $param_tel_no = $tel_no;
            $param_pass_id = password_hash($pass_id, PASSWORD_DEFAULT);
            $param_u_type = $u_type;
            $param_u_stats = $u_stats;
            $param_data_stamp = $data_stamp;
            if(mysqli_stmt_execute($stmt)){
				mysqli_stmt_close($stmt);
				$sql = "INSERT INTO `uset_tbl` (`uset_id`,`uset_name`,`uset_email`,`uset_phone`,`uset_created_at`) VALUES (?,?,?,?,?)";
				if($stmt = mysqli_prepare($link, $sql)){
					mysqli_stmt_bind_param($stmt, "sssss",$u_set, $param_store_name,$email_id,$tel_no,$data_stamp);
					$param_store_name = $f_name.' '.$l_name;
					mysqli_stmt_execute($stmt);
					header("location: index.php?ref_stats=reg_success");
				} else {
					$error = $error." Could not create store.";
				}
            }
            else{
                //echo "Something went wrong. Please try again later. ERR#0005";
                $error = $error." "."Signup Statement Not Processed ERR#0011";
            }
            mysqli_stmt_close($stmt);
        }else{
        //echo "Something went wrong. Please try again later. ERR#0006";
        $error = $error." "."Signup Prepare Statement Not Processed ERR#0012";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Sign Up – <?php echo $sys_title ?></title>
		<?php include "cores/inc/header_c.php"  ?>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="auth-bg">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-up -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Aside-->
				<div class="d-flex flex-column flex-lg-row-auto bg-primary w-xl-600px positon-xl-relative">
					<!--begin::Wrapper-->
					<div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
						<!--begin::Header-->
						<div class="d-flex flex-row-fluid flex-column text-center p-7 pt-lg-10">
							<!--begin::Logo-->
							<a href="index.php" class="py-9 pt-lg-20">
								<img alt="Logo" src="<?php echo $sys_logo ?>" class="h-50px"  />
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
						<div class="w-lg-600px p-10 p-lg-15 mx-auto">
							<!--begin::Form-->
							<form class="form w-100" novalidate="novalidate" action="" method="POST">
								<!--begin::Heading-->
								<div class="mb-10 text-center">
									<!--begin::Title-->
									<h1 class="text-dark mb-3">Create an Account</h1>
									<!--end::Title-->
									<!--begin::Link-->
									<div class="text-gray-400 fw-bold fs-4">Already have an account? 
									<a href="index.php" class="link-primary fw-bolder">Sign in here</a></div>
									<!--end::Link-->
									<p><?php if(strlen($error) >= 1){?>
									<div class="alert alert-danger"><?php echo $error ?> </div>
									<?php } ?></p>
								</div>
								<!--end::Heading-->
								<!--begin::Action-->
								<!-- <button type="button" class="btn btn-light-primary fw-bolder w-100 mb-10">
								<img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Sign in with Google</button> -->
								<!--end::Action-->
								<!--begin::Separator-->
								<div class="d-flex align-items-center mb-10">
									<div class="border-bottom border-gray-300 mw-50 w-100"></div>
									<span class="fw-bold text-gray-400 fs-7 mx-2">OR</span>
									<div class="border-bottom border-gray-300 mw-50 w-100"></div>
								</div>
								<!--end::Separator-->
								<!--begin::Input group-->
								<div class="row fv-row mb-7">
									<!--begin::Col-->
									<div class="col-xl-6">
										<label class="form-label fw-bolder text-dark fs-6">First Name</label>
										<input class="form-control form-control-lg form-control-solid" type="text" placeholder="Enter First name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" pattern="[a-zA-Z]+" id="f_name" name="f_name" value="<?php if(!empty($_POST["f_name"])){echo $_POST["f_name"];}?>" required autocomplete="off" />
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-xl-6">
										<label class="form-label fw-bolder text-dark fs-6">Last Name</label>
										<input class="form-control form-control-lg form-control-solid" type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" pattern="[a-zA-Z]+" id="l_name" name="l_name" placeholder="Enter Last Name" value="<?php if(!empty($_POST["l_name"])){echo $_POST["l_name"];}?>" required autocomplete="off" />
									</div>
									<!--end::Col-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="fv-row mb-7">
									<label class="form-label fw-bolder text-dark fs-6">Email</label>
									<input class="form-control form-control-lg form-control-solid <?php echo (!empty($email_id_err)) ? 'is-invalid' : ''; ?>" type="email" id="email_id" name="email_id" placeholder="Enter email"  value="<?php if(!empty($_POST["email_id"])){echo $_POST["email_id"];} ?>" required autocomplete="off" />
								</div>
								<div class="fv-row mb-7">
									<label class="form-label fw-bolder text-dark fs-6">Phone</label>
									<input class="form-control form-control-lg form-control-solid <?php echo (!empty($tel_no_err)) ? 'is-invalid' : ''; ?>" type="text" onkeydown="return ( event.ctrlKey || event.altKey 
                                        || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                                        || (95<event.keyCode && event.keyCode<106)
                                        || (event.keyCode==8) || (event.keyCode==9) 
                                        || (event.keyCode>34 && event.keyCode<40) 
                                        || (event.keyCode==46) )"  maxlength="10" minlength="10" id="tel_no" name="tel_no" placeholder="Mobile Number"  value="<?php if(!empty($_POST["tel_no"])){echo $_POST["tel_no"];} ?>" required autocomplete="off" />
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="mb-10 fv-row" data-kt-password-meter="true">
									<!--begin::Wrapper-->
									<div class="mb-1">
										<!--begin::Label-->
										<label class="form-label fw-bolder text-dark fs-6">Password</label>
										<!--end::Label-->
										<!--begin::Input wrapper-->
										<div class="position-relative mb-3">
											<input class="form-control form-control-lg form-control-solid" type="password" placeholder="Password" id="pass_id" name="pass_id" autocomplete="off" />
											<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
												<i class="bi bi-eye-slash fs-2"></i>
												<i class="bi bi-eye fs-2 d-none"></i>
											</span>
										</div>
										<!--end::Input wrapper-->
										<!--begin::Meter-->
										<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
										</div>
										<!--end::Meter-->
									</div>
									<!--end::Wrapper-->
									<!--begin::Hint-->
									<div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
									<!--end::Hint-->
								</div>
								<!--end::Input group=-->
								<!--begin::Input group-->
								<div class="fv-row mb-5">
									<label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
									<input class="form-control form-control-lg form-control-solid" type="password" placeholder="Confirm passsword" id="confirm_pass_id" name="confirm_pass_id" required autocomplete="off" />
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="fv-row mb-10">
									<label class="form-check form-check-custom form-check-inline form-check-solid" required>
										<input class="form-check-input" type="checkbox" name="toc"  required />
										<span class="form-check-label fw-bold text-gray-700 fs-6">I Agree &amp; 
										<a href="#" class="ms-1 link-primary">Terms and conditions</a>.</span>
									</label>
								</div>
								<!--end::Input group-->
								<!--begin::Actions-->
								<div class="text-center">
									<button type="submit"  class="btn btn-lg btn-primary">
										<span class="indicator-label">Submit</span>
										<span class="indicator-progress">Please wait... 
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
								</div>
								<input type="text" id="u_type" name="u_type" value="<?php echo $def_utype?>" required hidden>
                                <input type="text" id="u_stats" name="u_stats" value="<?php echo $def_ustats?>" required hidden>
							</form>
							<!--end::Form-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
						<!--begin::Links-->
				
						<!--end::Links-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-up-->
		</div>
		<?php include "cores/inc/footer_c.php"  ?>
	</body>
	<!--end::Body-->
</html>