<div id="uploadStatus"></div>
<div id="formbox">
<form  id="uploadForm" enctype="multipart/form-data" >
<div class="mb-10">
    <label for="u_name" class="required form-label">Name</label>
    <input type="text" class="form-control form-control-solid" name="u_name" id="u_name" placeholder="Enter Unit Name" onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" pattern="[a-zA-Z]+"  required/>
</div>
<div class="mb-10">
    <label for="u_shortname" class="required form-label">Short Name</label>
    <input type="text" class="form-control form-control-solid" name="u_shortname" id="u_shortname" placeholder="Enter Short Name"onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" pattern="[a-zA-Z]+"  required/>
</div>
<div class="mb-10">
    <label for="operator" class="required form-label">Operator</label>
    <select class="form-control" data-control="select2" name="operator" id="operator"
    required data-placeholder="Choose Operator">
        <option hidden>Choose an operator..</option>
        <option value="+">Addition(+)</option>
        <option value="-">Subtraction(-)</option>
        <option value="*">Multiply(*)</option>
        <option value="/">Divide(/)</option>
    </select>
</div>
<div class="mb-10">
    <label for="operator_value" class="required form-label">Operator Value</label>
    <input type="text" class="form-control form-control-solid" name="operator_value" id="operator_value" placeholder="Enter Operator Value" onkeydown="return ( event.ctrlKey || event.altKey 
																											|| (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
																											|| (95<event.keyCode && event.keyCode<106)
																											|| (event.keyCode==8) || (event.keyCode==9) 
																											|| (event.keyCode>34 && event.keyCode<40) 
																											|| (event.keyCode==46)  || (event.keyCode==190))" required/>
</div>
<button class="btn btn-primary" id="submit" type="submit">Submit</button>	 
</form>
</div>
<script>
    function submitForm(formData){                
        $.ajax({
            type:'POST',
            url: "gears/create_unit.php",
            data: formData,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false
        }).done(function (data) {
            Swal.fire(
                'Success',
                'Unit created successfully!',
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
            submitForm(formData);
        });
    });
</script>