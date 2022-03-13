<?php

    include "../../../../cores/inc/config_c.php";

    $id = $_GET['id'];

    $query = "SELECT * FROM `_tblunits` WHERE `id`='$id'";
    $result = mysqli_query($link,$query);
    if (!$result){
        die("Could not fetch units ".mysqli_error($link));
    }
    $row = mysqli_fetch_assoc($result);

?>
<div id="uploadStatus"></div>
<div id="formbox">
<form  id="uploadForm" enctype="multipart/form-data" >
<div class="fv-row mb-10">
    <label for="u_name" class="required form-label">Name</label>
    <input type="text" class="form-control form-control-solid" name="u_name" onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" pattern="[a-zA-Z]+"  value="<?php echo $row['name'];?>"
     id="u_name" placeholder="Enter Unit Name"/>
</div>
<div class="fv-row mb-10">
    <label for="u_shortname" class="required form-label">Short Name</label>
    <input type="text" class="form-control form-control-solid" name="u_shortname" onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" pattern="[a-zA-Z]+"  value="<?php echo $row['ShortName'];?>"
     id="u_shortname" placeholder="Enter Short Name"/>
</div>
<div class="fv-row mb-10">
    <label for="operator" class="required form-label">Operator</label>
    <select class="form-control" data-control="select2" name="operator" id="operator"
    required data-placeholder="Choose Operator">
        <option hidden>Choose an operator..</option>
        <option value="+" <?php if("+"==$row['operator']) echo "selected";?>>Addition(+)</option>
        <option value="-" <?php if("-"==$row['operator']) echo "selected";?>>Subtraction(-)</option>
        <option value="*" <?php if("*"==$row['operator']) echo "selected";?>>Multiply(*)</option>
        <option value="/" <?php if("/"==$row['operator']) echo "selected";?>>Multiply(/)</option>
    </select>
</div>
<div class="fv-row mb-10">
    <label for="operator_value" class="required form-label">Operator Value</label>
    <input type="text" class="form-control form-control-solid" name="operator_value" onkeydown="return ( event.ctrlKey || event.altKey 
																											|| (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
																											|| (95<event.keyCode && event.keyCode<106)
																											|| (event.keyCode==8) || (event.keyCode==9) 
																											|| (event.keyCode>34 && event.keyCode<40) 
																											|| (event.keyCode==46)  || (event.keyCode==190))" value="<?php echo $row['operator_value']; ?>"
     id="operator_value" placeholder="Enter Operator Value"/>
</div>
<input type="text" name="id" value="<?php echo $id;?>" hidden/>
<button class="btn btn-primary" id="submit" type="submit">Submit</button>	 
</form>
</div>
<script>
    function submitForm(formData){                
        $.ajax({
            type:'POST',
            url: "gears/update_unit.php",
            data: formData,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false
        }).done(function (data) {
            Swal.fire(
                'Success',
                'Unit updated successfully!',
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
                u_name: {
                    validators: {
                        notEmpty: {
                            message: "Text input required."
                        }
                    }
                },
                u_shortname: {
                    validators: {
                        notEmpty: {
                            message: "Text input is requred."
                        }
                    }
                },
                operator: {
                    validators: {
                        notEmpty: {
                            message: "Please choose an option."
                        }
                    }
                },
                operator_value:{
                    validators: {
                        notEmpty: {
                            message: "Please enter a number."
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

    $('[data-control="select2"]').select2({
        dropdownParent: $('#modal_show')
    });
</script>