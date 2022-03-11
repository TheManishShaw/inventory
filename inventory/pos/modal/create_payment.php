<div class="container-fluid">

    <div class="row">

        <form method="POST" id="payment-form" class="row" action="gears/payment_backend.php">
                <div class="col-sm-12 col-md-6">

                <div class="form">
                    <div class="form-row row">
                        <div class="col-sm-4 mb-3">
                            <label>Discount</label>
                            <div role="group" class="input-group input-group-solid">
                                <select id="discount-select" name="discount_type" class="form-control card-product-type" data-control="select2">
                                    <option class="form-control cart-product-type-options" value="fixed">Fixed</option>
                                    <option class="form-control cart-product-type-options" value="percent">Percent</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-8 mb-3">
                            <label>Discount Amount</label>
                            <div role="group" class="input-group input-group-solid">
                                <input type="text" id="discount" class="form-control cart-product-discount" value="0">
                                <div class="input-group-append">
                                    <div class="input-group-text">&#8377;</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label>Payment Choice</label>
                        <div class="form-group" id="payment-choice">
                            <div class="ml-2 btn-group" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                                <label class="btn btn-outline-success active" data-kt-button="true">
                                    <input class="btn-check" data-target="tr0" type="radio" name="payment_method0" id="cash0" value="cash" autocomplete="off" checked> Cash
                                </label>
                                <label class="btn btn-outline-primary" data-kt-button="true">
                                    <input class="btn-check" data-target="tr0" type="radio" name="payment_method0" id="card0" value="card" autocomplete="off"> Card
                                </label>
                                <label class="btn btn-outline-info" data-kt-button="true">
                                    <input class="btn-check" data-target="tr0" type="radio" name="payment_method0" id="upi0" value="upi" autocomplete="off"> UPI
                                </label>
                            </div>
                        </div>
                        <button type="button" id="split" class="btn btn-primary mt-2 mb-2">Split</button>
                    </div>
                    <div id="split-amount-div"></div>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1">Note</label>
                        <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
                <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>

                <!-- ------  trial end pay now----------->
        </div> <!-- end col 1 -->

        <div class="col-12 col-md-6 pt-2">

            <div style="margin-bottom:0;" class=" blur-shadow card mt-2 p-3">
                <table style="margin-bottom:0;" class="table ">
                    <thead>
                        <tr class="ligth">
                            <th scope="col">Total Products</th>
                            <th class="text-right" scope="col">
                                <p class="badge m-0 bg-primary" id="items-count"></p>
                            </th>
                            <input type="text" id="items-count-input" name="productCount" value="" hidden />

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">GST</th>
                            <td class="text-right">Inclusive</td>
                            <input type="text" id="create-payment-tax" name="tax" value="" hidden />
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <td class="text-right">&#8377;<span id="discount-td">0</span></td>
                            <input type="text" name="discount" id="discount-td-input" value="0" hidden />
                        </tr>
                        <tr class="payment-method-tr payment-method-tr0">
                            <th>Cash</th>
                            <td class="text-right">&#8377;<span id="amount-td"></span></td>
                        </tr>
                        <tr id="grand-total-tr">
                            <th>Grand Total</th>
                            <td class="text-right">&#8377;<span id="grandtotal"></span></td>
                            <input type="text" name="grandTotal" id="grandtotal-input" value="" hidden />
                        </tr>
                    </tbody>
                </table>
            </div>
            <input type="text" id="customer-id" name="customer" value="" hidden />
            <input type="text" id="create-payment-store" name="store" value="" hidden />
            <input type="text" id="product-data-input" name="productData" value='' hidden />
            </form>

        </div>

    </div>

</div>
<script>
    //  script to enter data into different components of the page.
    var combinedData = JSON.parse($('#bill-now').attr('data-string')).combinedData;
    var individualData = JSON.parse($('#bill-now').attr('data-string')).individualData;
    document.querySelector('#items-count').innerText = individualData.productCode.length;
    document.querySelector('#items-count-input').value = individualData.productCode.length;
    document.querySelector('#create-payment-tax').value = combinedData.totalTax;
    document.querySelector('#amount-td').innerText = combinedData.totalAmount;
    document.querySelector('#grandtotal').innerText = combinedData.totalAmount;
    document.querySelector('#grandtotal-input').value = combinedData.totalAmount;
    document.querySelector('#customer-id').value = combinedData.customerId;
    document.querySelector('#create-payment-store').value = combinedData.storeId;
    document.querySelector('#product-data-input').value = JSON.stringify(individualData);
</script>
<script>
    function paymentTotal() {
        let discount_type = document.querySelector('#discount-select').value;
        let discountInput = document.querySelector('#discount').value;
        let discount;
        if (discount_type == 'fixed') {
            discount = Number(discountInput).toFixed(2);
        } else if (discount_type == 'percent') {
            discount = Number(discountInput * combinedData.totalAmount / 100).toFixed(2);
        }
        let finalAmount = Number(combinedData.totalAmount - discount).toFixed(2);
        document.querySelector('#discount-td').innerText = discount;
        document.querySelector('#discount-td-input').value = discount;
        document.querySelector('#grandtotal').innerText = finalAmount;
        document.querySelector('#grandtotal-input').value = finalAmount;
        if ($('.payment-method-tr1')) {
            $('.payment-method-tr0').find('span').text(finalAmount);
            $('.payment-method-tr1').find('span').text(0);
            $('#amount0').val(finalAmount);
            $('#amount1').val(0);
            $('#hiddenamount').val(0);
        } else {
            $('.payment-method-tr0').find('span').text(finalAmount);
        }
    }

    $(function() {
        $('body').on('change', '.btn-check', function() {
            if (this.checked) {
                let checkboxes = Array.from(document.querySelectorAll('[name="' + this.name + '"]'));
                checkboxes.forEach(function(item) {
                    if ($(item).closest('label').hasClass('active')) {
                        $(item).closest('label').removeClass('active');
                    }
                });
                this.parentElement.classList.add('active');
                if (this.value == 'upi') {
                    $('.payment-method-' + $(this).attr('data-target')).children('th').text(this.value.toUpperCase());
                } else {
                    $('.payment-method-' + $(this).attr('data-target')).children('th').text(this.value.charAt(0).toUpperCase() + this.value.slice(1));
                }
            }
        });

        document.querySelector('#discount').addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9.]/, '');
            paymentTotal();
        });
        document.querySelector('#discount-select').addEventListener('change', function() {
            paymentTotal();
        });
    });

    var counter = 0;

    function splitAmount() {
        $("#split-amount-div").append(`
            <div class="form-group">
                <button type="button" id="split-remove${counter}" class="btn split-remove btn-danger float-end me-3 mb-3"><i class="fas fa-times la-2x m-0"></i></button>
                <label for="exampleInputPlaceholder">Amount</label>
                <input type="text" class="form-control payment-amount" id="amount${counter}" name="amount[]" placeholder="Enter Amount">
            </div>
            <div class="form-group mt-2">
                <div>
                    <label>Payment Choice</label>
                    <div class="ml-2 btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-success data-kt-button='true'">
                            <input class="payment${counter} payment btn-check" data-target="tr${counter}" type="radio" id="cash${counter}" name="payment_method${counter}" value="cash" autocomplete="off"> Cash
                        </label>
                        <label class="btn btn-outline-primary">
                            <input class="payment${counter} payment btn-check" type="radio" data-target="tr${counter}" id="card${counter}" name="payment_method${counter}" value="card" autocomplete="off"> Card
                        </label>
                        <label class="btn btn-outline-secondary">
                            <input class="payment${counter} payment btn-check" type="radio" data-target="tr${counter}" id="upi${counter}" name="payment_method${counter}" value="upi" autocomplete="off" checked> UPI
                        </label>
                    </div>
                </div>
            </div>`);
        if (counter == 1) {
            $("#split-remove" + counter).remove();
            $('#amount' + counter).prop('disabled', true);
            $('#amount' + counter).after(`<input type="text" class="form-control payment-amount" id="hiddenamount" name="amount[]" placeholder="Enter Amount" hidden>`);
        }

        $("#grand-total-tr").before(`
            <tr class="payment-method-tr payment-method-tr${counter}">
            <th>Cash</th>
            <td class="text-right">&#8377;<span>0</span></td>` +
            `</tr>
        `);
        $('#upi1').parent().addClass('active');
        $('#upi1').prop('checked', true);
    }

    $('form').on('click', '#split', function() {
        if ($(this).prev().prop('id') == 'payment-choice') {
            $(this).prev().parent().remove();
        }
        $(".payment-method-tr").remove();
        while (counter < 2) {
            splitAmount();
            counter++;
        }
        $('#cash0').parent().addClass('active');
        $('#cash0').prop('checked', true);
        $('#upi1').parent().addClass('active');
        $('#upi1').prop('checked', true);
        $('.payment-method-tr1').find('th').text('UPI');
        $(this).remove();
    });

    $("#split-amount-div").on('click', '.split-remove', function() {
        $("#split-amount-div").html("");
        $("#split-amount-div").before(`
            <div>
                <label>Payment Choice</label>
                <div class="form-group" id="payment-choice">
                    <div class="ml-2 btn-group" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                        <label class="btn btn-outline-success active" data-kt-button="true">
                            <input class="btn-check" data-target="tr0" type="radio" name="payment_method0" id="cash0" value="cash" autocomplete="off" checked> Cash
                        </label>
                        <label class="btn btn-outline-primary" data-kt-button="true">
                            <input class="btn-check" type="radio" data-target="tr0" name="payment_method0" id="card0" value="card" autocomplete="off"> Card
                        </label>
                        <label class="btn btn-outline-info" data-kt-button="true">
                            <input class="btn-check" type="radio" data-target="tr0" name="payment_method0" id="upi0" value="upi" autocomplete="off"> UPI
                        </label>
                    </div>
                </div>
                <button type="button" id="split" class="btn btn-primary mt-2 mb-2">Split</button>
            </div>
        `);
        $(".split-remove").remove();
        $(".payment-method-tr1").remove();
        $('.payment-method-tr0').find('span').text($('#grandtotal-input').val());
        counter = 0;
    });

    $('#split-amount-div').on('input', '#amount0', function() {
        this.value = this.value.replace(/[^0-9.]/, '');
        let total = Number(document.querySelector('#grandtotal-input').value);
        let remainingAmount = Number(total-Number(this.value)).toFixed(2);
        $('.payment-method-tr0').find('span').text(this.value);
        document.querySelector('#amount1').value = remainingAmount;
        $('.payment-method-tr1').find('span').text(remainingAmount);
        document.querySelector('#hiddenamount').value = remainingAmount;
    });

    function submitForm(formData) {
        $.ajax({
            type: 'POST',
            url: "gears/create_payment.php",
            data: formData,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false
        }).done(function(data) {
            Swal.fire(
                'Success',
                'Sale completed successfully!',
                'success'
            );
            modal_hide();
            resetPage();
            $('#invoice').attr('href',"modal/invoice.php?sale_id="+data.trim());
            setTimeout(function(){document.querySelector('#invoice').click();},1000);
        }).fail(function(e) {
            Swal.fire(
                'Error',
                'An error occured. Please try again.',
                'error'
            );
            console.log(e.responseText);
        });
    }
    $(function() {
        $("#submit").on("click", function(e) {
            e.preventDefault();
            let formData = new FormData($('#payment-form')[0]);
            submitForm(formData);
        });
    });
</script>