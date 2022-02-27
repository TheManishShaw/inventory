<div id="uploadStatus"></div>
<div id="formbox">
    <form id="uploadForm" method="POST" enctype="multipart/form-data" >
        <div class="mb-10">
            <label for="name" class="required form-label">Brand Name</label>
            <input type="text" class="form-control form-control-solid" name="name" 
            id="name" placeholder="Enter Brand Name"/>
        </div>
        <div class="mb-10">
            <label for="description" class="required form-label">Brand Description</label>
            <textarea name="description" id="description" cols="30" rows="5" 
            placeholder="Enter Brand Description" class="form-control form-control-solid"></textarea>
        </div>
        <div class="form-group my-4">
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
            console.log(data)
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
            submitForm(formData);
        });
    });
</script>