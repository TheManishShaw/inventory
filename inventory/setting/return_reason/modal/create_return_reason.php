<div id="uploadStatus"></div>
<div id="formbox">
<form  id="uploadForm" enctype="multipart/form-data" >
<div class="fv-row mb-10">
    <label for="type" class="required form-label">Return Type</label>
    <select class="form-select" data-control="select2" name="type" id="type"
    required data-placeholder="Select Return Type">
        <option value="" hidden>Choose an option</option>
        <option value="sale">Sale Return</option>
        <option value="purchase">Purchase Return</option>
    </select>
</div>
<div class="fv-row mb-10">
    <label for="reason" class="required form-label">Return Reason</label>
    <input type="text" class="form-control form-control-solid" name="reason" id="reason" placeholder="Enter Return Reason"/>
</div>
<div class="fv-row mb-10">
    <label for="percent" class="required form-label">Return Percent</label>
    <input type="text" class="form-control form-control-solid" name="percent" id="percent" placeholder="Enter Return Percent"/>
</div>
<button class="btn btn-primary" id="submit" type="submit">Submit</button>	 
</form>
</div>
<script>
    function submitForm(formData){                
        $.ajax({
            type:'POST',
            url: "gears/create_return_reason.php",
            data: formData,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false
        }).done(function (data) {
            Swal.fire(
                'Success',
                'Return Reason created successfully!',
                'success'
            );
            parent.reloadDatatable();
            modal_hide();
        }).fail(function(e){
            Swal.fire(
                'Error',
                'An error occured. Please try again.',
                'error'
            );
            console.log(e.responseText);
        });
    }
    $(function(){
        document.querySelector("#submit").addEventListener("click",function(e){
            e.preventDefault();
            let formData = new FormData($('form')[0]);
            if (validator) {
                validator.validate().then(function(status) {
                    if (status == "Valid") {
                        submitForm(formData);
                    }
                });
            }
        });
    });

    var form = document.querySelector("form");

    var validator = FormValidation.formValidation(
        form,
        {
            fields: {
                type: {
                    validators: {
                        notEmpty: {
                            message: "Please select an option."
                        }
                    }
                },
                percent: {
                    validators: {
                        notEmpty: {
                            message: "Text input is required."
                        },
                        numeric: {
                            message: "Numeric value is required."
                        }
                    }
                },
                reason: {
                    validators: {
                        notEmpty: {
                            message: "Numeric value is required."
                        }
                    }
                }
            },
            plugins: {
                submitButton: new FormValidation.plugins.SubmitButton(),
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: ".fv-row"
                })
            }
        }
    );
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    $('[name="percent"]').on('input',function(e){
        e.preventDefault();
        this.value = this.value.replace(/[^0-9]/,'');
    });

    $('[data-control="select2"]').select2({
        dropdownParent: $('#modal_show'),
        minimumResultsForSearch: Infinity
    });
</script>