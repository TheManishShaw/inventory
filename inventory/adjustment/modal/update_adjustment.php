<?php
    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";
    include "../../../cores/inc/var_c.php";

    $u_set = $_SESSION['u_set'];
    $chain_id = $_SESSION['chain_id'];
    $adj_id = $_GET['id'];

    $query = "SELECT * FROM `users_tbl` WHERE `u_type`='GRP02' AND `u_set`='$u_set' AND `u_stats`='active'";
    $result = mysqli_query($link,$query);
    if (!$result){
        die('Could not fetch customers. '.mysqli_error($link));
    }
    $query = "SELECT * FROM `_tbladjustment` WHERE `adj_id`='$adj_id'";
    $adjResult = mysqli_query($link,$query);
    if (!$adjResult) {
        die('Could not fetch adjustment. '.mysqli_error($link));
    }
    $adjRow = mysqli_fetch_assoc($adjResult);

    $query = "SELECT `_tbladjustment_details`.`quantity`,`_tbladjustment_details`.`product_id`,`adj_type`,
    `_tblproducts`.`code`,`_tblproducts`.`name`,`stock_tbl`.`stock` FROM 
    `_tbladjustment_details` INNER JOIN `_tblproducts` ON `_tbladjustment_details`.`product_id`=
    `_tblproducts`.`id` LEFT JOIN `stock_tbl` ON `stock_tbl`.`product_id`=`_tbladjustment_details`.`product_id`
    AND `stock_tbl`.`store_id`='$u_set' WHERE `adj_id`='$adj_id' AND 
    `_tbladjustment_details`.`status`='active'";
    $productsResult = mysqli_query($link,$query);
    if (!$productsResult){
        die('Could not fetch adjustment Details. '.mysqli_error($link));
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Adjustment – <?php echo $sys_title ?></title>

    <?php include "../../../cores/inc/header_c.php"; ?>
</head>

<body id="kt_body" class="aside-enabled">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            <div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
                <?php include "../../../cores/inc/nav_c.php" ?>
            </div>
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <?php include "../../../cores/inc/top_c.php" ?>
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <div id="kt_content_container" class="container-fluid">
                        <!--begin::Update Adjustment-->
                        <div class=" card-flush  flex-row-fluid p-6 ">
                            <!--begin::Card header-->
                            <div class="card-header mb-2">
                                <div class="card-title">
                                    <h2>Update Adjustment</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <form data-toggle="validator" action="../gears/update_adjustment.php" method="POST" id="uploadForm" autocomplete="off" enctype="multipart/form-data">
                                <div class="row my-4">
                                    <div class="col-6">
                                        <label class="fw-bolder" for="date">Date</label>
                                        <input type="text" id="date" value="<?php echo date('d-m-Y H:i:s',strtotime($adjRow['date']));?>"
                                         placeholder="Enter Date" class="form-control" name="date">
                                    </div>
                                    <div class="col-6">
                                        <label class="fw-bolder" for="supply">Supplier</label>
                                        <select class="form-control" data-control="select2" id="supplier" data-placeholder="Choose supplier..." name="supplier" required>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $selected = '';
                                                if($adjRow['user_id']==$row['u_id']){
                                                    $selected = "selected";
                                                }
                                                echo '<option value="' . $row['u_id'] . '" '.$selected.'
                                                >' . $row['f_name'] . ' ' . $row['l_name'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <label class="fw-bolder" for="search">Product</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-search fs-4"></i>
                                            </span>
                                            <div class="flex-grow-1">
                                                <select id="products" class="form-select rounded-start-0" 
                                                    data-control="select2" data-placeholder="Choose products by code or name.">
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="search-results" style="height: 180px;" class="list-group overflow-auto d-none">
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-row-dashed mb-4" id="product_list">
                                        <label class="fw-bolder">Order Items</label>
                                        <thead class="table-light">
                                            <tr class="text-center text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                <!-- <th scope="col">ID</th> -->
                                                <th class="px-3">Product</th>
                                                <th scope="col">Stock</th>
                                                <th style="width: 110px;" scope="col">Quantity</th>
                                                <th style="width: 200px;" scope="col">Transfer Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody style="max-height:250px;overflow:auto;">
                                        <?php
                                            while($productsRow = mysqli_fetch_assoc($productsResult)){
                                            ?>
                                            <tr class="text-center product-row" id="product` + item.id + `">
                                                <td class="px-3">
                                                    <p><?php echo $productsRow['name'];?></p>
                                                    <span class="badge badge-success"><?php echo $productsRow['code'];?></span>
                                                    <input type="text" name="product_id[]" value="<?php echo $productsRow['product_id'];?>" hidden/>
                                                </td>
                                                <td class="product-stock"><?php echo $productsRow['stock'];?></td>
                                                <td>
                                                    <div class="position-relative w-md-100px" data-kt-dialer="true" data-kt-dialer-min="1" data-kt-dialer-max="50000" data-kt-dialer-step="1" data-kt-dialer-prefix="" data-kt-dialer-decimals="0">
                                                    <!--begin::Decrease control-->
                                                    <button type="button" class="btn btn-decrease btn-quantity btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                                        <span class="svg-icon svg-icon-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                                                <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                    <!--end::Decrease control-->
                                                    <!--begin::Input control-->
                                                    <input type="text" class="form-control form-control-solid product-quantity border-0 ps-12"
                                                     placeholder="Amount" name="quantity[]" value="<?php echo $productsRow['quantity'];?>" />
                                                     <input type="text" name="old_quantity[]" value="<?php echo $productsRow['quantity'];?>" hidden>
                                                    <!--end::Input control-->
                                                    <!--begin::Increase control-->
                                                    <button type="button" class="btn btn-increase btn-quantity btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                                        <span class="svg-icon svg-icon-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                    <!--end::Increase control-->
                                                    </div>
                                                </td>
                                                <td>
                                                    <select class="form-select" name="transfer_type[]" data-control="select2"
                                                    data-placeholder="Choose transfer type.">
                                                        <option></option>
                                                        <option value="borrow" 
                                                        <?php if($productsRow['adj_type']=='borrow') echo "selected";?>>Borrow</option>
                                                        <option value="lend"
                                                        <?php if($productsRow['adj_type']=='lend') echo "selected";?>>Lend</option>
                                                    </select>
                                                    <input type="text" name="old_transfer[]" value="<?php echo $productsRow['adj_type'];?>" hidden />
                                                </td>
                                                <td>
                                                    <a title="Delete" data-id='<?php echo $productsRow['product_id'];?>' class="item-remove"><i class="fas fa-times-circle fs-2 text-danger"></i></a>
                                                </td>
                                            </tr>                            
                                            <?php
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- <div id="split-amount-div" class="row"></div> -->
                                <div class="row">
                                    <div class="col-12">
                                        <label for="email">Notes</label>
                                        <textarea type="textarea" class="form-control" rows="3"
                                         id="notes" name="notes"><?php echo $adjRow['notes'];?></textarea>
                                    </div>
                                </div>
                                <button type="submit" name="pursubmit" class="btn btn-success mt-3">Submit</button>
                                <input type="text" name="adj_id" value="<?php echo $adj_id;?>" hidden/>
                            </form>
                            <!--end::Card body-->
                        </div>

                    </div>
                </div>
                <?php include "../../../cores/inc/copy_c.php" ?>
            </div>
        </div>
    </div>
    <?php include "../../../cores/inc/footer_c.php" ?>
    <script>
        $('#date').flatpickr({
            enableTime: true,
            dateFormat: 'd-m-Y H:i:s',
            minDate: "today"
        });

        $.ajax({
            url: "../gears/product_fetch.php",
            dataType: 'html'
        }).done(function(data) {
            let products = JSON.parse(data).data;
            products.forEach(function(item) {
                $('#products').append(`
                    <option value='` + JSON.stringify(item) + `'>` + item.name + ` - ` + item.cat_name + ` - ` + item.code + `</option>
                `);
            });
        }).fail(function(e) {
            console.log(e.responseText);
        });

        var productsAdded = [];

        function addProduct(item) {
            if (item.stock == null) {
                item.stock = 0;
            }
            if (productsAdded.indexOf(item.id) == -1) {
                productsAdded.push(item.id);
                $('tbody').append(`
                <tr class="text-center product-row" id="product` + item.id + `">
                    <td class="px-3">
                        <p>` + item.name + `</p>
                        <span class="badge badge-success">` + item.code + `</span>
                        <input type="text" name="product_id[]" value="`+item.id+`" hidden/>
                    </td>
                    <td class="product-stock">` + item.stock + `</td>
                    <td>
                        <div class="position-relative w-md-100px" data-kt-dialer="true" data-kt-dialer-min="1" data-kt-dialer-max="50000" data-kt-dialer-step="1" data-kt-dialer-prefix="" data-kt-dialer-decimals="0">
                        <!--begin::Decrease control-->
                        <button type="button" class="btn btn-decrease btn-quantity btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0" data-kt-dialer-control="decrease">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                    <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </button>
                        <!--end::Decrease control-->
                        <!--begin::Input control-->
                        <input type="text" class="form-control form-control-solid product-quantity border-0 ps-12" placeholder="Amount" name="quantity[]" value="1" />
                        <!--end::Input control-->
                        <!--begin::Increase control-->
                        <button type="button" class="btn btn-increase btn-quantity btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </button>
                        <!--end::Increase control-->
                        </div>
                    </td>
                    <td>
                        <select class="form-select" name="transfer_type[]" data-control="select2"
                         data-placeholder="Choose transfer type.">
                            <option></option>
                            <option value="borrow">Borrow</option>
                            <option value="lend">Lend</option>
                        </select>
                    </td>
                    <td>
                        <a title="Delete" data-id='` + item.id + `' class="item-remove"><i class="fas fa-times-circle fs-2 text-danger"></i></a>
                    </td>
                </tr>
                `);
                $('[name="transfer_type[]"]').select2({
                    minimumResultsForSearch: Infinity
                });

            } else {
                Swal.fire(
                    'Item Already added!',
                    'You can increase the quantity of the product.',
                    'warning'
                );
            }
        }

        $('#products').on('change', function() {
            addProduct(JSON.parse(this.value));
            $('#products').val(null);
        });

        $('table').on('click', '.btn-quantity', function() {
            let quantity = $(this).siblings('.product-quantity').val();
            if ($(this).hasClass('btn-increase')) {
                quantity++;
            } else if ($(this).hasClass('btn-decrease')) {
                if (quantity > 1) {
                    quantity--;
                }
            }
            $(this).siblings('.product-quantity').val(quantity);
        });

        $('table').on('input', ".product-quantity", function() {
            let quantity = this.value;
            this.value = this.value.replace(/[^0-9]/, '');
            if (this.value == '') {
                this.value = 1;
                quantity = 1;
            }
        });

        $('table').on('click', '.item-remove', function() {
            $(this).closest('tr').remove();
            let id = this.getAttribute('data-id');
            productsAdded.splice(productsAdded.indexOf(id), 1);
        });

        $(function(){
            let products = Array.from(document.querySelectorAll('.item-remove'));
            products.forEach(function(item){
                productsAdded.push(item.getAttribute('data-id'));
            });
        });

    </script>
</body>

</html>