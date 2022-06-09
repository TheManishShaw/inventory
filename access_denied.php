<?php
    include "cores/inc/config_c.php";
    include "cores/inc/functions_c.php";
    include "cores/inc/auth_c.php";
    include "cores/inc/var_c.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Access Denied – <?php echo $sys_title ?></title>
    <?php include "cores/inc/header_c.php" ?>
</head>

<body id="kt_body" class="aside-enabled">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            <div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
                <?php include "cores/inc/nav_c.php" ?>
            </div>
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <?php include "cores/inc/top_c.php" ?>
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <div id="kt_content_container" class="container-fluid">
                        <!--begin::Product List-->
                        <div class="d-flex justify-content-center text-center">
                            <div>
                                <img src="assets/media/images/access_denied.jpg" style="height: auto;width:45vw" alt="Access Denied.">
                                <h1 class="mt-3">You don't have permission to access this page.</h1>
                                <p>Please return to dashboard and try creating a store.</p>
                            </div>
                        </div>

                    </div>
                </div>
                <?php include "cores/inc/copy_c.php" ?>
            </div>
        </div>
    </div>
    <?php include "cores/inc/footer_c.php" ?>
</body>

</html>