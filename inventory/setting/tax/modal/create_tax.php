<div id="uploadStatus"></div>
<div id="formbox">
<form  id="uploadForm" enctype="multipart/form-data" >
<div class="fv-row mb-10">
    <label for="name" class="required form-label">Tax Name</label>
    <input type="text" class="form-control form-control-solid" name="name" id="name" placeholder="Enter Tax Name"/>
</div>
<div class="fv-row mb-10">
    <label for="percent" class="required form-label">Tax Percentage</label>
    <input type="text" class="form-control form-control-solid" name="percent" id="percent" placeholder="Enter Tax Percentage"/>
</div>
<div class="fv-row mb-10">
     <label class=" form-label"> 
            <span class="required">Default</span>
				<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Choose yes to make this your default tax option.
    Your default option is used as your preference while adding products."></i>
    </label>

    <select class="form-select" data-control="select2" name="default" id="default"
    required data-placeholder="Is this your default tax?">
        <option value="" hidden>Choose your default tax...</option>
        <option value="yes">YES</option>
        <option value="no">NO</option>
    </select>
</div>
<button class="btn btn-primary" id="submit" type="submit">Submit</button>	 
</form>
</div>
<script>
    function submitForm(formData){                
        $.ajax({
            type:'POST',
            url: "gears/create_tax.php",
            data: formData,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false
        }).done(function (data) {
            Swal.fire(
                'Success',
                'Tax created successfully!',
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
                name: {
                    validators: {
                        notEmpty: {
                            message: "Text input required."
                        }
                    }
                },
                percent: {
                    validators: {
                        notEmpty: {
                            message: "Text input is requred."
                        }
                    }
                },
                default: {
                    validators: {
                        notEmpty: {
                            message: "Please select a file."
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

    $('#name').on('input',function(){
        this.value = this.value.replace(/[^a-zA-Z0-9 ]/,'');
    });

    $('[data-control="select2"]').select2({
        dropdownParent: $('#modal_show'),
        minimumResultsForSearch: Infinity
    });
</script>