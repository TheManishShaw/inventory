<div id="uploadStatus"></div>
<div id="formbox">
    <form id="uploadForm" method="POST" enctype="multipart/form-data" >
        <div class="fv-row mb-10">
            <label for="name" class="required form-label">Brand Name</label>
            <input type="text" class="form-control form-control-solid" name="name" 
            id="name" placeholder="Enter Brand Name"/>
        </div>
        <div class="fv-row mb-10">
            <label for="description" class="required form-label">Brand Description</label>
            <textarea name="description" id="description" cols="30" rows="5" 
            placeholder="Enter Brand Description" class="form-control form-control-solid"></textarea>
        </div>
        <div class="fv-row form-group my-4">
            <input type="file" id="image" name="image" required/>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Please provide a logo image of the brand."></i>
        </div>
        <button class="btn btn-primary" id="submit" type="submit">Submit</button>	 
    </form>
</div>
<script>
    function submitForm(formData){                
        $.ajax({
            type:'POST',
            url: "gears/create_brand.php",
            data: formData,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false
        }).done(function (data) {
            Swal.fire(
                'Success',
                'Brand created successfully!',
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
                description: {
                    validators: {
                        notEmpty: {
                            message: "Text input is requred."
                        }
                    }
                },
                image: {
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
</script>