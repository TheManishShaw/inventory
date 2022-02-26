<div id="uploadStatus"></div>
<div id="formbox">
<form  id="uploadForm" enctype="multipart/form-data" >
<div class="mb-10">
    <label for="u_name" class="required form-label">Name</label>
    <input type="text" class="form-control form-control-solid" name="u_name" id="u_name" placeholder="Enter Unit Name"/>
</div>
<div class="mb-10">
    <label for="u_shortname" class="required form-label">Short Name</label>
    <input type="text" class="form-control form-control-solid" name="u_shortname" id="u_shortname" placeholder="Enter Short Name"/>
</div>
<div class="mb-10">
    <label for="operator" class="required form-label">Operator</label>
    <select class="form-control" data-control="select2" name="operator" id="operator"
    required data-placeholder="Choose Operator">
        <option hidden>Choose an operator..</option>
        <option value="+">Addition(+)</option>
        <option value="-">Subtraction(-)</option>
        <option value="*">Multiply(*)</option>
        <option value="/">Multiply(/)</option>
    </select>
</div>
<div class="mb-10">
    <label for="operator_value" class="required form-label">Operator Value</label>
    <input type="text" class="form-control form-control-solid" name="operator_value" id="operator_value" placeholder="Enter Operator Value"/>
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
            submitForm(formData);
        });
    });
</script>