<?php
    include "../../cores/inc/config_c.php";
    include "../../cores/inc/var_c.php";
    include "../../cores/inc/functions_c.php";
    include "../../cores/inc/auth_c.php";

    $query = "SELECT * FROM `chain_tbl` WHERE `status` = 'active'";
    $result = mysqli_query($link,$query);
    if (!$result) {
        die("Could not fetch chains. ".mysqli_error($link));
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard – <?php echo $sys_title ?></title>

    <?php include "../../cores/inc/header_c.php" ?>
</head>

<body id="kt_body" class="aside-enabled">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            <div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
                <?php include "../../cores/inc/nav_c.php" ?>
            </div>
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <?php include "../../cores/inc/top_c.php" ?>
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <div id="kt_content_container" class="container-fluid">
                        <div class="d-flex flex-column flex-lg-row">
                            <!-- Start content -->
                            <form action="dash_store_create.php" method="POST"
                             class="mx-auto mw-600px w-100 fv-plugins-bootstrap5 fv-plugins-framework" id="kt_create_account_form">
                                <div class="current" data-kt-stepper-element="content">
                                    <!--begin::Wrapper-->
                                    <div class="w-100">
                                        <!--begin::Heading-->
                                        <div class="pb-10 pb-lg-15">
                                            <!--begin::Title-->
                                            <h1 class="fw-bolder text-dark">Select Store Chain</h1>
                                            <!--end::Title-->
                                            <!--begin::Notice-->
                                            <div class="text-gray-400 fw-bold fs-4">
                                                Select a chain to have products and settings imported.
                                            </div>
                                            <!--end::Notice-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Input group-->
                                        <div class="fv-row fv-plugins-icon-container">
                                            <!--begin::Option-->
                                            <?php while($row = mysqli_fetch_assoc($result)) {?>
                                                <input type="radio" class="btn-check" name="chain_id" value="<?php echo $row['chain_id'];?>" id="<?php echo 'chain'.$row['chain_id'];?>">
                                                <label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="<?php echo 'chain'.$row['chain_id'];?>">
                                                    <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                                                    <span class="svg-icon svg-icon-4x me-4">
                                                        <img src="../../data/chain_img/<?php echo $row['chain_logo']; ?>" height="60px" 
                                                        width="60px" alt="<?php echo $row['chain_name'];?>">
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <!--begin::Info-->
                                                    <span class="d-block fw-bold text-start">
                                                        <span class="text-dark fw-bolder d-block fs-3"><?php echo $row['chain_name']; ?></span>
                                                        <span class="text-gray-400 fw-bold fs-5"><?php echo $row['chain_description']; ?></span>
                                                    </span>
                                                    <!--end::Info-->
                                                </label>
                                            <?php } ?>
                                            <!--end::Option-->
                                            <input type="radio" class="btn-check" name="chain_id" value="0" id="no-chain">
                                            <label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="no-chain">
                                                <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                                                <span class="svg-icon svg-icon-4x me-4">
                                                </span>
                                                <!--end::Svg Icon-->
                                                <!--begin::Info-->
                                                <span class="d-block fw-bold text-start">
                                                    <span class="text-dark fw-bolder d-block fs-3">No Chain</span>
                                                    <span class="text-gray-400 fw-bold fs-5">Create a separate standalone store.</span>
                                                </span>
                                                <!--end::Info-->
                                            </label>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Input group-->
                                        <!-- start:Submit button -->
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-lg btn-primary" id="chain-submit" data-kt-stepper-action="next" disabled>Continue 
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                <span class="svg-icon svg-icon-4 ms-1 me-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black"></rect>
                                                        <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                        </div>
                                        <!-- end:Submit button -->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                            </form>
                            <!-- End content -->
                        </div>
                    </div>
                </div>
                <?php include "../../cores/inc/copy_c.php" ?>
            </div>
        </div>
    </div>
    <?php include "../../cores/inc/footer_c.php" ?>
    <script>
        $(function(){
            $('[name="chain_id"]').on('change',function(){
                document.querySelector('#chain-submit').disabled = false;
            });
        });
    </script>
</body>

</html>