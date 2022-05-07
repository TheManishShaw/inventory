<?php
    include '../../cores/inc/config_c.php';
    include '../../cores/inc/var_c.php';
    include '../../cores/inc/functions_c.php';
    include '../../cores/inc/auth_c.php';

    $u_set = $_SESSION['u_set'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>POS – <?php echo $sys_title; ?></title>
    <?php include '../../cores/inc/header_c.php'; ?>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="aside-enabled" style="margin-left:10px">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <div class="row border ">
            <div class=" mt-2">
                <div class=" float-start d-flex justify-content-start">
                    <a class="w-100 text-center" href="<?php echo $sys_link ?>">
                        <?php if($uset_pic != ''){
                        ?>
                            <img alt="Logo" src="<?php echo $sys_link?>/data/store_img/<?php echo $uset_pic ?>" class="h-50px ms-3" />
                        <?php
                        } else {?>
                        <img alt="Logo" src="<?php echo $sys_link?>/<?php echo $sys_dark_logo ?>" class="h-35px" />
                        <?php } ?>
                    </a>
                </div>
                <div class=" float-end d-flex justify-content-end">
                    <a href="#" onclick="productFetch($('#store-select').val())" class="btn btn-primary" style="margin-left:10px">All </a>
                    <div>
                        <a href="#" class="btn btn-primary" data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-start"
                        style=" margin-left:10px">Category</a>
                        <div class="menu menu-sub menu-sub-dropdown w-50 p-1" style="overflow:auto;max-height:400px;"
                        data-kt-menu="true">
                            <div class="d-flex w-100">
                                <div class="dropdown-item d-flex row" id="filters-cat" ></div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="#" class="btn btn-primary" style="margin-left:10px"
                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start">Brand</a>
                        <div class="menu menu-sub menu-sub-dropdown w-50 p-1" 
                        style="overflow:auto;max-height:400px;" data-kt-menu="true">
                            <div class="d-flex w-100">
                                <div class="dropdown-item d-flex row" id="filters-brand"></div>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-danger" style="margin-left:10px" onclick="resetPage()">Reset</a>
                    <a class="btn" onclick="fullscreen();"> <i class="fas fa-expand fs-2x"></i></a>
                    <div class="d-lg-block d-none" style="margin-top:6px;margin-left:0px;margin-right:10px;font-size:20px;position: auto;font-weight:400px;" id="time">
                        <span id="hours">00</span>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                </div>
            </div>
        </div>
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class=" flex-row-fluid mt-2" id="">
                <div class="content d-flex flex-column flex-column-fluid" id="">
                    <!--begin::Container-->
                    <div class="row" style="margin-left: 0px;margin-right:0px;">
                        <!--begin::Col-->
                        <div class="col-xl-5 col-md-5">
                            <?php if ($u_type == 'GRP00') { ?>
                                <select class="form-select form-select-solid mb-3" data-control="select2" data-placeholder="Select a store" id="store-select">
                                    <option></option>
                                </select>
                            <?php } else { ?>
                                <input id="store-select" value="<?php echo $u_set ?>" hidden />
                            <?php } ?>
                            <div class="d-flex align-items-center flex-stack" style="margin-bottom:20px;">
                                <!--begin::Select-->
                                <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select a customer" id="customer-select">
                                    <option value='walkIn' selected>Walk-in customer</option>
                                </select>
                                <!--end::Select-->
                                <a id="add-customer-btn" href="javascript:void(0);" data-name="Add customer" class="openPopup btn btn-icon border-0 btn-custom flex-shrink-0" data-bs-toggle="modal" data-bs-toggle="tooltip" title="Add User">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                    <span class="svg-icon svg-icon-2hx">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
                                            <rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                            </div>
                            <div class="border" id="kt_chat_messenger " style="border-radius:10px;">
                                <div class="" id="kt_chat_messenger_body h-200px">
                                    <div  class="scroll-y " data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_chat_messenger_body" data-kt-scroll-offset="-2px">
                                        <!--begin::Card-->

                                        <table class="table table-row-bordered">
                                            <thead class="">
                                                <tr class="fw-bold fs-4 bg-secondary text-white border-bottom border-gray-200">
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Subtotal</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="pos-table" class="h-300px">
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end::Messages-->
                                </div>
                                <!--end::Card body-->
                                <!--begin::Card footer-->
                                <div class="card-footer pt-4" id="kt_chat_messenger_footer">
                                    <div class="mb-3">
                                        <p style="margin-bottom:auto;" id="grand-total" 
                                        class="bg-primary text-center text-white p-2">Grand total: ₹<span>0.00</span></p>
                                    </div>
                                    <div class="d-flex flex-stack">
                                        <!--begin::Actions-->
                                        <div class="d-flex align-items-center me-2">
                                            <button class="btn btn-danger" onclick="clearCart()" id="cart-reset" type="button" data-bs-toggle="tooltip" title="Cancel Order"><i class="f fa-xmark"></i> Cancel</button>
                                        </div>
                                        <!--end::Actions-->
                                        <!--begin::Send-->
                                        <button data-href='javascript:void(0);' type="button" class="openPopup btn btn-primary"
                                        data-name="Create Payment" id="bill-now" disabled> <i class="fa fa-receipt"></i> Bill Now</button>
                                        <!--end::Send-->
                                        <audio src="../../data/beep.wav" id="beep" hidden></audio>
                                        <!-- <a href="" id="invoice" type="button" target="_blank" hidden>Invoice</a> -->
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Card footer-->
                            </div>
                        </div>
                        <!--begin::Col-->

                        <div class="col-xl-7 col-md-7">
                            <!-- Progress enabled state -->
                            <div class="header-search me-4 mb-3">
                                <!--begin::Menu- wrapper-->
                                <!--begin::Search-->
                                <div id="kt_header_search" width="100%" class="d-flex align-items-center" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-menu-trigger="auto" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                                    <!--begin::Form-->
                                    <form data-kt-search-element="form" class="w-100 position-relative" autocomplete="off">
                                        <input type="hidden" />
                                        <span class="svg-icon svg-icon-3 search-icon position-absolute top-50 translate-middle-y ms-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M21.7 18.9L18.6 15.8C17.9 16.9 16.9 17.9 15.8 18.6L18.9 21.7C19.3 22.1 19.9 22.1 20.3 21.7L21.7 20.3C22.1 19.9 22.1 19.3 21.7 18.9Z" fill="black" />
                                                <path opacity="0.3" d="M11 20C6 20 2 16 2 11C2 6 6 2 11 2C16 2 20 6 20 11C20 16 16 20 11 20ZM11 4C7.1 4 4 7.1 4 11C4 14.9 7.1 18 11 18C14.9 18 18 14.9 18 11C18 7.1 14.9 4 11 4ZM8 11C8 9.3 9.3 8 11 8C11.6 8 12 7.6 12 7C12 6.4 11.6 6 11 6C8.2 6 6 8.2 6 11C6 11.6 6.4 12 7 12C7.6 12 8 11.6 8 11Z" fill="black" />
                                            </svg>
                                        </span>
                                        <input type="text" class="form-control bg-transparent ps-12" id="search-bar" oninput="search()" placeholder="Search" />
                                    </form>
                                </div>
                            </div>
                            <div class="page-title d-flex flex-column me-5 mb-2">
                                <h1 class="d-flex flex-column text-dark fw-bold fs-5 mb-0">Brands</h1>
                            </div>

                            <div id="brand-slider" class="row d-flex flex-nowrap hover-scroll-x h-90px">
                            </div>
                            <div class="page-title d-flex flex-column me-5 mb-2">
                                <h1 class="d-flex flex-column text-dark fw-bold fs-5 mb-0">All Products</h1>
                                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-4 pt-1" id="category-slider">
                                </ul>
                            </div>
                            <div class="">
                                <div>
                                    <div id="products-div" class="row">
                                    </div>
                                </div>
                                <!--end::List-->
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                </div>
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
        <!-- start::Invoice modal -->
        <div class="modal fade" id="invoice-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered mw-900px">			
				<div class="modal-content" style="width:500px; height:600px; margin:auto;">				
					<div class="modal-header">					
						<h1 class="fw-bolder modal-title" id="iframe-title"></h1>						
						<div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">						
							<span class="svg-icon svg-icon-2x">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
								</svg>
							</span>				
						</div>					
					</div>				
					<iframe class="iframe-body py-lg-10 px-lg-10" src="" height="100%" id="iframe_body">
                    </iframe>
				</div>			
			</div>
        </div>
        <!-- <iframe class="iframe-body modal fade py-lg-10 px-lg-10" src="" height="300px" width="600px" id="iframe_body">
        </iframe> -->
        <!-- end::Invoice modal -->
    </div>
    <!--end::Scrolltop-->

    <?php include '../../cores/inc/footer_c.php'; ?>
    <script>
        // function for changing the target url of invoice iframe
        function showInvoice(dataURL,dataNAME){
            document.getElementById("iframe-title").innerHTML = dataNAME;
            document.querySelector('#iframe_body').src = dataURL;
            $('#invoice-modal').modal({show:true});
            $('#invoice-modal').modal('show');
        }

        function search() {
            var input, filter, container, products, a, i, txtValue;
            input = document.querySelector("#search-bar");
            filter = input.value.toUpperCase();
            container = document.querySelector("#products-div");
            products = Array.from(container.querySelectorAll(".product-card"));
            for (i = 0; i < products.length; i++) {
                item = products[i];
                txtValue = item.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    products[i].parentElement.style.display = "";
                } else {
                    products[i].parentElement.style.display = "none";
                }
            }
        }

        function storeFetch() {
            if ($('#store-select').hasClass('form-select')) {
                $.ajax({
                    url: "gears/fetch_store.php",
                    dataType: "html"
                }).done(function(data) {
                    var stores = JSON.parse(data).data;
                    if (stores.length > 0) {
                        stores.forEach(function(item) {
                            $("#store-select").append("<option class='store' value='" + item.uset_id + "'>" + item.uset_name + "</option>");
                        });
                    }
                }).fail(function(e) {
                    e.responseText; 
                });
            }
        }

        function customerFetch(store) {
            let visibility = document.querySelector("#store-select").hidden;
            if (visibility == true) {
                let store = $("#store-select").val();
            }
            $.ajax({
                url: "gears/fetch_customers.php?store=" + store,
                dataType: "html"
            }).done(function(data) {
                let customers = JSON.parse(data).data;
                if (customers.length == 0) {
                    $("#customer-select").html("<option value='walkIn' selected>Walk-in customer</option>");
                    $("#customer-select").append("<option disabled>No customers yet. Add some!</option>");
                } else if (customers.length > 0) {
                    $("#customer-select").html("<option value='walkIn'>Walk-in customer</option>");
                    customers.forEach(function(item) {
                        $("#customer-select").append("<option value='" + item.u_id + "'>" + item.f_name + ' ' + item.l_name + "</option>");
                    });
                }
            }).fail(function(e) {
                console.log(e.responseText)
            });
        }

        // function for selecting the recently added customer. Works using the name of the customer, so may give wrong results.
        function customerSelect(customer) {
            let customers = Array.from(document.querySelector('#customer-select').options);
            customers.forEach(item => {
                if (item.value == Number(customer)) {
                    item.selected = true;
                    $("#customer-select").trigger('change'); // reflects the change in select2 select box
                }
            });
            paymentData();
        }

        function filteredProducts(store,brand,cat){
            $.ajax({
                url: "gears/fetch_filtered_products.php?store="+store+"&brand="+brand+"&cat="+cat,
                dataType: "html"
            }).done(function(data) {
                let products = JSON.parse(data).data;
                if (products.length > 0) {
                    $('#products-div').html('');
                    products.forEach(item => {
                        $('#products-div').append(`
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 mb-1">
                                <div class="card card-bordered ribbon ribbon-top product-card ribbon-vertical">
                                <div class="ribbon-label bg-danger">
                                    ` + item.quantity + `
                                </div>
                                <img class="card-img-top" width="100px" onclick='addProduct(` + JSON.stringify(item) + `)'
                                height="120px" src="../../data/product_img/` + item.image + `" alt="` + item.name + `">                                              
                                <div class="card-body p-2 ">
                                <div class=" float-end">
                                    <h6 class="badge badge-primary">Price:` + item.price + `</h6>
                                </div>
                                    <h6>` + item.name + `</h6>
                                    <p>` + item.category_name + `</p>
                                </div>
                                </div>
                            </div>
                        `);
                    });
                } else {
                    $('#products-div').html(`No products available.`);
                }
            }).fail(function(e) {
                console.log(e.responseText);
            });
        }

        function productFetch(store) {
            $.ajax({
                url: "gears/product_fetch.php?store=" + store,
                dataType: 'html'
            }).done(function(data) {
                let products = JSON.parse(data).data;
                if (products.length > 0) {
                    $('#products-div').html('');
                    products.forEach(item => {
                        $('#products-div').append(`
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 mb-1">
                                <div class="card card-bordered ribbon ribbon-top product-card ribbon-vertical">
                                <div class="ribbon-label bg-danger">
                                    ` + item.quantity + `
                                </div>
                                <img class="card-img-top" width="100px" onclick='addProduct(` + JSON.stringify(item) + `)'
                                height="120px" src="../../data/product_img/` + item.image + `" alt="` + item.name + `">                                              
                                <div class="card-body p-2 ">
                                <div class=" float-end">
                                    <h6 class="badge badge-primary">Price:` + item.price + `</h6>
                                </div>
                                    <h6>` + item.name + `</h6>
                                    <p>` + item.category_name + `</p>
                                </div>
                                </div>
                            </div>
                        `);
                    });
                } else {
                    $('#products-div').html(`No products available.`);
                }
            }).fail(function(e) {
                console.log(e.responseText);
            });
        }

        function fetchFilters() {
            let storeId = $("#store-select").val();
            $.ajax({
                url: "gears/fetch_filters.php?store=" + storeId,
                dataType: 'html',
            }).done(function(data) {
                let cat = JSON.parse(data).category;
                if (cat.length > 0) {
                    $("#category-slider").html("");
                    cat.forEach(item => {
                    if (item.quantity > 0) {
                        $("#category-slider").append(`
                            <li class="breadcrumb-item">
                            <a href="#" class="badge badge-light filter-cat mb-1"
                            data-cat-id="`+item.cat_id+`">` + item.cat_name + `
                            <span class="badge badge-circle badge-secondary" style="padding:2px!important;">
                            ` + item.quantity + `</span></a>									
                            </li>
                        `);
                    }
                    $("#filters-cat").append(`<div class="col-sm-5 m-3">
                            <input class="filter-cat form-check-input" type="radio" value="`+ item.cat_id +`"
                            data-cat-id="`+item.cat_id+`" name="filter" id="cat-`+ item.cat_id +`"/>
                            <label class="form-check-label" for="cat-`+item.cat_id+`">` + item.cat_name +`</label>
                        </div>`);
                    })
                } else {
                    $("#category-slider").html("No Categories Yet. Add some categories!");
                }

                let brand = JSON.parse(data).brand;
                if (brand.length > 0) {
                    $("#brand-slider").html("");
                    brand.forEach(item => {
                        if (item.quantity > 0){
                            $("#brand-slider").append(`
                            <div class="col-lg-3 col-md-3 col-sm-6 col-6 mb-2">
                                <div class="card filter-brand bg-primary" data-brand-id="`+item.id+`">                                                                        
                                    <div class="card-body p-3 d-flex">
                                        <img class="float-start" style="height:55px; width:55px; border-radius:50%;" src="../../data/brand_img/` + item.image + `" 
                                        width="30px" alt="">
                                        <h5 class="ms-4 text-white">` + item.name + `<span class="ms-3 badge badge-square badge-white">`+item.quantity+`</span> </h5>
                                    </div>
                                 </div>
                            </div>
                            `);
                        }
                        $("#filters-brand").append(`<div class="col-sm-5 m-3">
                            <input class="filter-brand form-check-input" type="radio" value="`+ item.id +`" 
                            data-brand-id="`+item.id+`" name="filter" id="brand-`+ item.id +`"/>
                            <label class="form-check-label" for="brand-`+item.id+`">` + item.name +`</label>
                        </div>`);
                    });
                } else {
                    $("#brand-slider").html("No Brands Yet. Add some brands!");
                }
            });
        }

        var productsAdded = [];

        function addProduct(element) {
            if (productsAdded.indexOf(element.id) == -1){
                productsAdded.push(element.id);
                let tax = 0,
                    subtotal = 0;;
                if (element.tax_method == 'Inclusive') {
                    tax = element.price - (element.price * 100 / (Number(element.tax) + 100));
                    subtotal = element.price;
                } else {
                    tax = Number(element.price) * Number(element.tax) / 100;
                    subtotal = Number(element.price) + tax;
                }
                $('#pos-table').prepend(`
                <tr class="products" style="height:80px !important;min-height:80px;">
                    <td><span class="product-name">` + element.name + `</span>
                        <span class="product-id" hidden>`+element.id+`</span>
                        <span class="product-stock" hidden>`+element.quantity+`</span>
                        <span class="product-code" hidden>`+element.code+`</span>
                    </td>
                    <td class="product-price">` + element.price + `</td>
                    <td>
                        <!--begin::Dialer-->
                        <div class="position-relative w-md-100px" data-kt-dialer="true" data-kt-dialer-min="1" data-kt-dialer-max="50000" data-kt-dialer-step="1" data-kt-dialer-prefix="" data-kt-dialer-decimals="0">
                            <!--begin::Decrease control-->
                            <button type="button" class="btn btn-icon btn-decrease btn-active-color-gray-700
                            position-absolute translate-middle-y top-50 start-0">
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
                            <input type="text" class="form-control quantity-input form-control-solid border-0 ps-12" placeholder="Amount" value="1" />
                            <!--end::Input control-->
                            <!--begin::Increase control-->
                            <button type="button" class="btn btn-icon btn-active-color-gray-700
                            btn-increase position-absolute translate-middle-y top-50 end-0">
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
                    <td>&#8377;<span class="product-subtotal">` + subtotal + `</span>
                    <span class="product-tax" hidden>`+tax+`</span>
                    <span class="product-taxtype" hidden>`+element.tax_method+`</span>
                    <span class="product-single-subtotal" hidden>`+subtotal+`</span>
                    <span class="product-single-tax" hidden>`+tax+`</span></td>
                    <td>
                    <a href="javascript:void(0);" onclick="modal_show()" data-href="modal/edit.php" data-name="Edit Product" class="openPopup btn btn-icon border-0 btn-custom flex-shrink-0 btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-toggle="tooltip" title="Edit Product">
                    <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit">
                    <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen055.svg-->
                            <span class="svg-icon svg-icon-3 svg-icon-light-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="black"/>
                            <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="black"/>
                            <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="black"/>
                            </svg></span>
                            <!--end::Svg Icon-->
                        </a>
                        <button class="btn btn-icon btn-active-light-danger btn-remove w-30px h-30px" data-kt-permissions-table-filter="delete_row" data-bs-toggle="tooltip" title="Delete Item">
                            <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                            </svg>
                            </span>
                        </button>
                    </td>
                </tr>
                `);
                document.querySelector('#beep').play();
                cartTotal();
            } else {
                Swal.fire(
                    'Item already added!',
                    'You may increase the quantity insted!',
                    'warning'
                )
            }
        }

        // calculating the subtotal and tax of each product, on updation of quantity
        function productTotal(element,quantity){
            let tax = $(element).closest('tr').find('.product-single-tax').text();
            let subtotal = $(element).closest('tr').find('.product-single-subtotal').text();
            $(element).closest('tr').find('.product-subtotal').text((subtotal*quantity).toFixed(2));
            $(element).closest('tr').find('.product-tax').text((tax*quantity).toFixed(2));
        }

        function cartTotal(){
            let subtotals = Array.from(document.querySelectorAll(".product-subtotal"));
            let total = 0;
            subtotals.forEach(item=>{
                total += parseFloat(item.innerHTML);
            });
            $("#grand-total").children().html(total.toFixed(2));
            
            if(subtotals.length == 0){
                $("#bill-now").prop("disabled",true);
                $("#bill-now").attr("data-href","javascript:void(0)");
                $("#bill-now").attr("onclick","");
                $("#bill-now").removeClass("openPopup");
            }
            else{
                $("#bill-now").prop("disabled",false);
                $("#bill-now").attr("data-href","modal/create_payment.php");
                $("#bill-now").attr("onclick","modal_show()");
                $("#bill-now").addClass("openPopup");
                paymentData();
            }
        }

        function paymentData(){
            let grandTotal = Number($("#grand-total").children().text());
            let products = Array.from(document.querySelectorAll(".products"));
            let productCount = products.length;
            let productDetails = Array.from(document.querySelectorAll(".products"));
            let ids = [], code = [], name = [], quantity = [], stock=[], price=[],discount=[],tax=[],subtotal=[],totalTax=0,taxMethod=[];
            for(let i=0; i<productDetails.length; i++){
                ids[i] = $(products[i]).find('.product-id').text();
                code[i] = $(products[i]).find(".product-code").text();
                name[i] = $(products[i]).find(".product-name").text();
                quantity[i] = Number($(products[i]).find(".quantity-input").val());
                stock[i] = Number($(products[i]).find(".product-stock").text());
                price[i] = Number($(productDetails[i]).find(".product-price").text());
                // discount[i] = $(productDetails[i]).find(".cart-product-discount").val();
                tax[i] = Number($(productDetails[i]).find(".product-tax").text()).toFixed(2);
                taxMethod[i] = $(productDetails[i]).find('.product-taxtype').text()
                totalTax += Number(tax[i]);
                subtotal[i] = $(products[i]).find('.product-subtotal').text();
            }
            
            const data = {
                productIds: ids,
                productCode: code,
                productName: name,
                productQuantity: quantity,
                productStock: stock,
                productPrice: price,
                productDiscount: discount,
                productTax: tax,
                productTaxMethod: taxMethod,
                productSubtotal: subtotal
            }
            
            // var taxPercent = parseFloat($("#tax").val());
            // if(isNaN(taxPercent)){
            //     taxPercent = 0;
            // }
            // var totalDiscount = parseFloat($("#discount").val());
            // if(isNaN(totalDiscount)){
            //     totalDiscount = 0;
            // }
            // var totalShipping = parseFloat($("#shipping").val());
            // if(isNaN(totalShipping)){
            //     totalShipping = 0;
            // }
            
            var originalAmount = 0;
            products.forEach(function(item){
                originalAmount += parseFloat($(item).text());
            })
            var store = $("#store-select").val();
            var customer = $("#customer-select").val();
            
            var completeData = {
                individualData: data,
                combinedData: {
                    totalTax: totalTax.toFixed(2),
                    storeId: store,
                    customerId: customer,
                    // taxPercentage: taxPercent,
                    // combinedDiscount: totalDiscount,
                    // shipping: totalShipping,
                    untaxedAmount: originalAmount,
                    totalAmount: grandTotal
                }
            }
            
            var dataString = JSON.stringify(completeData);
            $("#bill-now").attr("data-string",dataString);
        }

        function clearCart(){
            $("#pos-table").html("");
            cartTotal();
            productsAdded.splice(0,productsAdded.length);
        }

        function resetPage() {
            clearCart();
            // customerFetch();
            // fetchFilters();
            productFetch($("#store-select").val());
            document.querySelector('#search-bar').value = "";
        }

        storeFetch();
        $(function() {
            productFetch($('#store-select').val());
            fetchFilters();
            customerFetch($('#store-select').val());
            $("body").on('change', '#store-select', function() {
                var storeId = $("option:selected", this).val();
                // currencySelector(storeId);
                customerFetch(storeId);
                productFetch(storeId);
                fetchFilters(storeId);
                // paymentData();
                $("#add-customer-btn").attr("data-href", "modal/add_customer.php?store=" + storeId);
                $("#add-customer-btn").attr("onclick", "modal_show()");
            });

            $('body').on('click','.btn-increase',function() {
                let quantity = Number($(this).siblings('.quantity-input').val());
                let stock = Number($(this).closest('tr').find('.product-stock').text());
                if (quantity < stock) {
                    quantity++;
                    $(this).siblings('.quantity-input').val(quantity);
                    productTotal(this,quantity);
                } else {
                    Swal.fire(
                        'No more stock',
                        'There are only '+ stock + ' units of this product in stock.',
                        'error'
                    );
                }
                cartTotal();
            });

            $('body').on('click','.btn-decrease',function() {
                let quantity = Number($(this).siblings('.quantity-input').val());
                if (quantity > 1) {
                    quantity--;
                    $(this).siblings('.quantity-input').val(quantity);
                    productTotal(this,quantity);
                } else {
                    Swal.fire(
                        'Minimum quantity is 1',
                        'Remove the product from cart',
                        'error'
                    );
                }
                cartTotal();
            });

            $('body').on('input','.quantity-input',function() {
                this.value = Number(this.value.replace(/[^0-9]/,''));
                let stock = Number($(this).closest('tr').find('.product-stock').text());
                let quantity = this.value;
                if (this.value < 1 && this.value !='') {
                    quantity = 1;
                    this.value = quantity;
                    Swal.fire(
                        'Minimum quantity is 1',
                        'Remove the product from cart',
                        'error'
                        );
                } else if (this.value > Number(stock)) {
                    this.value = stock;
                    quantity = stock;
                    Swal.fire(
                        'No more stock',
                        'There are only '+ stock + ' units of this product in stock.',
                        'error'
                    );
                }
                productTotal(this,quantity);
                cartTotal();
            });

            $('body').on('click', '.btn-remove', function() {
                let id = $(this).closest("tr").find(".product-id").text();
                $(this).closest("tr").remove();
                productsAdded.splice(productsAdded.indexOf(id), 1);
                cartTotal();
            });
            $("body").on('click',".filter-cat",function(){
                var storeId = $("#store-select").val();
                filteredProducts(storeId,"",this.getAttribute("data-cat-id"));
            });
            $("body").on('click',".filter-brand",function(){
                var storeId = $("#store-select").val();
                filteredProducts(storeId,this.getAttribute("data-brand-id"),"");
            });
            $('#customer-select').on('change',function(){
                paymentData();
            });

            if ($('#store-select').val()!=''){
                $("#add-customer-btn").attr("data-href", "modal/add_customer.php?store=" + $('#store-select').val());
                $("#add-customer-btn").attr("onclick", "modal_show()");
            }
        });
    </script>
</body>
<!--end::Body-->
</html>