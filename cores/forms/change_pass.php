
<?php 
include "../inc/config_c.php"; 
include "../inc/var_c.php";
include "../inc/functions_c.php";
include "../inc/auth_c.php";
// Define variables and initialize with empty values
$stats = "";
$error = "";
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
$cr_pass = trim($_POST["cr_pass"]);
$sql998 = "SELECT `pass_id` FROM `users_tbl` WHERE `email_id` = ?";
if($stmt = mysqli_prepare($link, $sql998)){
mysqli_stmt_bind_param($stmt, "s", $param_email_id);
$param_email_id = $_SESSION["email_id"];
if(mysqli_stmt_execute($stmt)){
mysqli_stmt_store_result($stmt);
if(mysqli_stmt_num_rows($stmt) == 1){
mysqli_stmt_bind_result($stmt, $hashed_password);
if(mysqli_stmt_fetch($stmt)){
if(password_verify($cr_pass, $hashed_password)){
// Validate new password
    if(empty(trim($_POST["n_pass"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["n_pass"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["n_pass"]);
    }
    // Validate confirm password
    if(empty(trim($_POST["c_pass"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["c_pass"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql999 = "UPDATE users_tbl SET pass_id = ? WHERE u_id = ?";
        if($stmt = mysqli_prepare($link, $sql999)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_password, $param_u_id);
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_u_id = $_SESSION["u_id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
               //  Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: $sys_link");
                exit();
                $stats = "password_updated";
            } else{
                $error = "Oops! Something went wrong. Please try again later.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }
    // Close connection
    mysqli_close($link);  
                }else{
                    $error = "Current Password Mismatch. #ER009";
                }
            }
        }
        }
        }       
}
?>


						
					
							<strong><span><?php echo $error ?></span></strong>
											<?php
											if($stats == "password_updated"){
											?>
											<strong><span><?php echo $stats ?></span></strong>
											<?php
											}else{
											?>
							<form class="form w-100" action="" method="POST" enctype="multipart/form-data">
								<!--begin::Heading-->
								<div class="text-center mb-10">
									<!--begin::Title-->
									<h1 class="text-dark mb-3">Forgot Password ?</h1>
									
									<!--end::Title-->
									<!--begin::Link-->
									<div class="text-gray-400 fw-bold fs-4">Enter your email to reset your password.</div>
									<!--end::Link-->
								</div>
								<!--begin::Heading-->
								<!--begin::Input group-->
								<div class="fv-row mb-10">
									<label class="form-label fw-bolder text-gray-900 fs-6">Current Password</label>
									<input class="form-control form-control-solid" id="cr_pass" name="cr_pass" placeholder="Enter your current password" required autocomplete="off" />
								</div>
								<div class="fv-row mb-10">
									<label class="form-label fw-bolder text-gray-900 fs-6">New Password</label>
									<input class="form-control form-control-solid" id="n_pass" placeholder="Enter your new password" name="n_pass"  required autocomplete="off" />
								</div>
								<div class="fv-row mb-10">
									<label class="form-label fw-bolder text-gray-900 fs-6">Confirm Password</label>
									<input class="form-control form-control-solid" id="c_pass" placeholder="Enter your confirm password" name="c_pass" required autocomplete="off" />
								</div>
								<!--end::Input group-->
								<!--begin::Actions-->
								<div class="d-flex flex-wrap justify-content-center pb-lg-0">
									<button type="submit" class="btn btn-lg btn-primary fw-bolder me-4">
										<span class="indicator-label">Submit</span>
										<span class="indicator-progress">Please wait... 
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
									
								</div>
								<!--end::Actions-->
							</form>
							<!--end::Form-->
							<?php } ?>
					