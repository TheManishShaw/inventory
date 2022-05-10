<form id="uploadForm" method="POST" action="../gears/create_chain.php" enctype="multipart/form-data">
    <div class="fv-row form-group mb-4">
        <label class="form-label required" for="name">Name</label>
        <input type="text" class="form-control" id="name" name="chain_name" placeholder="Enter Chain Name" onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" pattern="[a-zA-Z]+" required>
    </div>
    <div class="fv-row form-group mb-4">
        <label class="form-label required" for="desc">Description</label>
        <textarea class="form-control" name="chain_description" id="desc"rows="4" required></textarea>
    </div>
    <div class="fv-row form-group my-4">
        <label class="form-label">Store logo</label>
        <div class="fv-row form-group my-4 text-center">
            <!--begin::Image input-->
            <div class="image-input image-input-circle" data-kt-image-input="true" style="background-image: url(../../data/no-image.png)">
                <!--begin::Image preview wrapper-->
                <div class="image-input-wrapper w-125px h-125px" style="background-image: url(../../data/no-image.png)"></div>
                <!--end::Image preview wrapper-->

                <!--begin::Edit button-->
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Change logo">
                    <i class="bi bi-pencil-fill fs-7"></i>

                    <!--begin::Inputs-->
                    <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                    <input type="hidden" name="avatar_remove" />
                    <!--end::Inputs-->
                </label>
                <!--end::Edit button-->

                <!--begin::Cancel button-->
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Cancel logo">
                    <i class="bi bi-x fs-2"></i>
                </span>
                <!--end::Cancel button-->

                <!--begin::Remove button-->
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Remove Logo">
                    <i class="bi bi-x fs-2"></i>
                </span>
                <!--end::Remove button-->
            </div>
            <!--end::Image input-->
        </div>
    </div>

    <button type="submit" name="submit" id="submit" value="upload" class="btn btn-primary">Submit</button>
    <div id="data_response"></div>
</form>
<script>
    function submitForm(formData) {
        $.ajax({
            type: 'POST',
            url: "gears/create_chain.php",
            data: formData,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false
        }).done(function(data) {
            console.log(data)
            Swal.fire(
                'Success',
                'Chain created successfully!',
                'success'
            );
            parent.reloadDatatable();
            modal_hide();
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
        document.querySelector("#submit").addEventListener("click", function(e) {
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
        form, {
            fields: {
                chain_name: {
                    validators: {
                        notEmpty: {
                            message: "Text input required."
                        }
                    }
                },
                chain_description: {
                    validators: {
                        notEmpty: {
                            message: "Text input required."
                        }
                    }
                },
                image: {
                    validators: {
                        notEmpty: {
                            message: "Please select an image."
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
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
    KTImageInput.createInstances();
</script>