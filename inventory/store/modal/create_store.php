<form id="uploadForm" method="POST" action="../gears/create_store.php" enctype="multipart/form-data">
    <div class="fv-row form-group mb-4">
        <label class="form-label required" for="name">Name</label>
        <input type="text" class="form-control" id="name" name="uset_name" placeholder="Enter Store Name"onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" pattern="[a-zA-Z]+"  required>
    </div>
    <div class="fv-row form-group my-4">
        <label class="form-label required" for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone"  placeholder="Enter Store Phone" onkeydown="return ( event.ctrlKey || event.altKey 
																											|| (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
																											|| (95<event.keyCode && event.keyCode<106)
																											|| (event.keyCode==8) || (event.keyCode==9) 
																											|| (event.keyCode>34 && event.keyCode<40) 
																											|| (event.keyCode==46)  || (event.keyCode==190))" required>
    </div>
    <div class="fv-row form-group my-4">
        <label class="form-label required" for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Store Address" required>
    </div>
    <div class="fv-row form-group my-4">
        <label class="form-label required" for="email">Email</label>
        <input type="text" class="form-control" name="email" id="email" placeholder="Enter Store Email" required>
    </div>
    <div class="fv-row form-group my-4">
        <label class="form-label required" for="pincode">Pin Code</label>
        <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Store Pin Code" onkeydown="return ( event.ctrlKey || event.altKey 
																											|| (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
																											|| (95<event.keyCode && event.keyCode<106)
																											|| (event.keyCode==8) || (event.keyCode==9) 
																											|| (event.keyCode>34 && event.keyCode<40) 
																											|| (event.keyCode==46)  || (event.keyCode==190))" required>
    </div>
    <div class="fv-row form-group my-4">
        <label class="form-label required" for="gstno">GST Number</label>
        <input type="text" class="form-control" name="gstno" id="gstno" placeholder="Enter Store GST Number" required>
    </div>
    <div class="fv-row form-group my-4">
        <input type="file" id="image" name="image" required />
        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Please provide a logo image of the store."></i>
    </div>
    
    <button type="submit" name="submit" id="submit" value="upload" class="btn btn-primary">Submit</button>
    <div id="data_response"></div>
</form>
<script>
    function submitForm(formData){                
        $.ajax({
            type:'POST',
            url: "gears/create_store.php",
            data: formData,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false
        }).done(function (data) {
            Swal.fire(
                'Success',
                'Store created successfully!',
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
                uset_name: {
                    validators: {
                        notEmpty: {
                            message: "Text input required."
                        }
                    }
                },
                phone: {
                    validators: {
                        notEmpty: {
                            message: "Phone number required."
                        },
                        stringLength: {
                            min: 10,
                            max: 10,
                            message: "Please enter a 10 digit mobile number."
                        },
                        regexp: {
                            regexp: /[0-9]{10}/,
                            message: "Phone number can only contain digits."
                        }
                    }
                },
                address: {
                    validators: {
                        notEmpty: {
                            message: "Text input required."
                        }
                    }
                },
                email:{
                    validators: {
                        notEmpty: {
                            message: "Please enter a valid email address."
                        },
                        regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: "Please enter a valid email address."
                        }
                    }
                },
                pincode:{
                    validators: {
                        notEmpty: {
                            message: "Pin code required."
                        },
                        stringLength: {
                            min: 6,
                            max: 6,
                            message: "Enter a six digit Pin code."
                        },
                        digits: {
                            message: "Pin code can only contain digits."
                        } 
                    }
                },
                gstno: {
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
</script>