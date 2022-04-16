<?php
include "../../../cores/inc/config_c.php";
include "../../../cores/inc/var_c.php";
include "../../../cores/inc/functions_c.php";
include "../../../cores/inc/auth_c.php";

$sale_id = $_GET['sale_id'];
$query = "SELECT `invoice_data` FROM `_tblsales` WHERE `sale_id`='$sale_id'";
$result = mysqli_query($link, $query);
if (!$result) {
    die('Could not fetch Invoice data. ' . mysqli_error($link));
}
$invoiceData = mysqli_fetch_assoc($result);
$invoiceData = json_decode($invoiceData['invoice_data']);
$customerId = $invoiceData->customer;
$taxPercent = $invoiceData->products->productTax;
$discount = $invoiceData->discount;
$total = $invoiceData->grandtotal;
$payment_method = $invoiceData->paymentMethod->main_payment;
$payment_method1 = $invoiceData->paymentMethod->split_payment;
$halfPayment = $invoiceData->payment->main_payment;
$halfPayment1 = $invoiceData->payment->split_payment;
$amountPaid = $invoiceData->amountPaid;

$uset = $_SESSION['u_set'];

$query = "SELECT concat(`f_name`,' ',`l_name`) AS `name`,`u_set` FROM `users_tbl` WHERE `u_id` = '$customerId'";
$sql = mysqli_query($link, $query);
if (!$sql) {
    die("Couldn't fetch customer name " . mysqli_error($link));
}
$row = mysqli_fetch_assoc($sql);

$query2 = "SELECT * FROM `users_tbl` WHERE `u_id` = '$customerId'";
$sql2 = mysqli_query($link, $query2);
if (!$sql2) {
    die("Couldn't fetch Customer details " . mysqli_error($link));
}
$row2 = mysqli_fetch_assoc($sql2);

$query3 = "SELECT * FROM `uset_tbl` WHERE `uset_id`='$uset'";
$sql3 = mysqli_query($link, $query3);
if (!$sql3) {
    die('Could not fetch store. ' . mysqli_error($link));
}
$row3 = mysqli_fetch_assoc($sql3);

foreach ($invoiceData->products->productIds as $item) {
    $query = "SELECT (SELECT `name` FROM `category_tbl` WHERE `category_tbl`.`cat_id`=`_tblproducts`.`category_id`)
     AS category FROM _tblproducts WHERE `_tblproducts`.`id`='$item'";
    $sql = mysqli_query($link, $query);
    if (!$sql) {
        echo "Failed to get category. " . mysqli_error($link);
    } else {
        $cat_row = mysqli_fetch_assoc($sql);
        $category[] = $cat_row['category'];
    }
}

?>
<html>

<head>
    <title>INVOICE - Sale <?php echo $sale_id; ?></title>
    <?php include "../../../cores/inc/header_c.php"; ?>
    <link rel="stylesheet" href="invoice.css">
    <style>
        .receipt .sheet {
            width: 120mm;
            height: 100mm
        }

        ;

        hr {
            border-top: 2px solid black;
        }

        p strong {
            font-size: 12px !important;
        }
    </style>
</head>

<body style="background-color: white;">
    <div class="container">

        <div class="row">

            <div id="print" class="col-sm-5 sheet">

                <h6 class="text-right">Date : <?php echo date("Y-m-d"); ?></h6>

                <center id="">
                    <div class="logo">
                        <img src="../../../data/store_img/<?php echo $row3["uset_image"]; ?>" style="width:100px; height:100px;" />
                    </div>

                    <div class="">
                        <h2><?php echo $row3['uset_name']; ?></h2>
                    </div>
                </center>
                <div class="col-sm-8 mt-2">
                    <h6>Customer : <?php echo $row["name"]; ?></h6>
                    <?php if ($customerId != 1) { ?>
                        <h6>Phone : <?php echo $row2["tel_no"]; ?></h6>
                        <h6>Email : <?php echo $row2["email_id"]; ?></h6>
                        <?php
                        if ($row2['address'] != "") {
                        ?>
                            <h6>Address : <?php echo $row2["address"]; ?></h6>
                    <?php
                        }
                        if ($row2['business_name'] != "") {
                            echo "<h6>Business Name : " . $row2['business_name'] . "</h6>";
                        }
                        if ($row2['gst_num'] != "") {
                            echo "<h6>GST Number : " . $row2['gst_num'] . "</h6>";
                        }
                    } ?>
                </div>

                <table style="margin-bottom:0;" class=" col-sm-12 mt-3">
                    <thead style="width: 60mm;">
                        <tr class="ligth">
                            <th scope="col">Product</th>
                            <th class=" " scope="col">Qty</th>
                            <th class=" " scope="col">Subtotal</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($invoiceData->products->productIds); $i++) {
                            echo '<tr>
                  <td >' . $invoiceData->products->productName[$i] . ' - ' . $category[$i] . '</td>
                  <td class="">' . $invoiceData->products->productQuantity[$i] . '</td>
                   <td class="">' . $invoiceData->products->productSubtotal[$i] . '</td>
                </tr>';
                        }
                        ?>
                        <tr>
                            <hr>
                        </tr>
                        <tr>
                            <th></th>
                            <th>GST</th>
                            <td class="">Inclusive</td>
                        </tr>
                        <tr>
                            <th></th>
                            <th>Discount</th>
                            <td class=""><?php echo $discount; ?></td>

                        </tr>
                        <tr>
                            <th>Amount Paid</th>
                            <th><?php
                                if ($payment_method != 'upi') {
                                    echo ucfirst($payment_method);
                                } else {
                                    echo strtoupper($payment_method);
                                }
                                ?></th>
                            <?php
                            if ($halfPayment == "") {
                            ?>
                                <td class=""><?php echo $amountPaid; ?></td>
                            <?php
                            } else {
                            ?>
                                <td class=""><?php echo $halfPayment; ?></td>
                            <?php }
                            ?>
                        </tr>
                        <?php
                        if ($payment_method1 != "") {
                        ?>
                            <tr>
                                <th>Amount Paid</th>
                                <th><?php
                                    if ($payment_method1 != 'upi') {
                                        echo ucfirst($payment_method1);
                                    } else {
                                        echo strtoupper($payment_method1);
                                    }
                                    ?></th>
                                <td class=""><?php echo $halfPayment1; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <table class="col-sm-12 bg-light mt-3">
                    <tbody>
                        <tr>
                            <th class="col-sm-6 p-2 w-75 m-3">Grand Total</th>
                            <th class=" w-25  ">INR <?php echo $total; ?></th>
                        </tr>
                    </tbody>
                </table>
                <div class="m-2 pt-3 text-center">
                    <img class="barcode" alt="product_barcode" src="barcode.php?codetype=code128&size=40&text=<?php echo $sale_id ?>&print=true$color" />
                    <h3><?php echo $sale_id; ?></h3>
                    <!--  ----------- put the barcode code here----------->
                </div>
                <div class="m-2 text-center">
                    <p class="p-0 my-1"><strong>Thanks for buying!</strong></p>
                    <p class="p-0 my-1"><strong>Contact Us!</strong></p>
                    <p class="p-0 my-1"><strong>Email: <?php echo $row3['uset_email']; ?></strong></p>
                    <p class="p-0 my-1"><strong>Phone No: <?php echo $row3['uset_phone']; ?></strong></p>
                    <p class="p-0 my-1"><strong>Address: <?php echo $row3['uset_address']; ?></strong></p>
                    <?php
                    if ($row3['uset_gst_no'] != "") {
                        echo '<p class="p-0 m-0"><strong>GST Number: ' . $row3['uset_gst_no'] . '</strong></p>';
                    }
                    ?>
                </div>

                <div class="col-sm-12 text-center" id="print-button">
                    <button class="btn btn-secondary " onclick="display()"><i class="fas fa-print"></i>
                        Print
                    </button>
                </div>
            </div>

        </div> <!-- end col 1 -->

    </div>

    </div>
    <!-- end main content-->

    <!-- END layout-wrapper -->
    <?php include "../../../cores/inc/footer_c.php"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script>
        function display() {

            $("#print-button").html('');
            // Print Page
            window.print();
            $("#print-button").html(`<button class="btn btn-secondary " onclick="display()"><i class="fas fa-print"></i>
                        Print
                    </button>`);
        }
    </script>
</body>

</html>