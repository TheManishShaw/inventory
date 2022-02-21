<?php 
include "../../cores/inc/config_c.php";

?>
<script>
$(document).ready(function(){
	// File upload via Ajax
	$("#uploadForm").on('submit', function(e){
		e.preventDefault();
		$.ajax({
			xhr: function() {
				var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress", function(evt) {
					if (evt.lengthComputable) {
						var percentComplete = Math.round((evt.loaded / evt.total) * 100);
						$(".progress-bar").width(percentComplete + '%');
						$(".progress-bar").html(percentComplete+'%');
					}
			   }, false);
			   return xhr;
			},
			type: 'POST',
			url: 'modal/i_unit.php',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function(){
				$(".progress-bar").width('0%');
				$("#formbox").prop('hidden', true);
			
			},
			error:function(){
				$('#uploadStatus').html('<p style="color:#EA4335;">Insert Data Failed.</p>');
				$("#formbox").prop('hidden', false);
			},
			success: function(response){
				if(response == 'ok'){
					$('#uploadStatus').html('<p style="color:#EA4335;">Data Not Sent.</p>'+ response);
				
				}else if(response !== 'ok'){
					abcd();
					modal_hide(); 
					$('#kt_datatable_example_5').DataTable().reload();
					Swal.fire({
					text: "Data Submission Successfully!",
					icon: "success",
					buttonsStyling: false,
					confirmButtonText: "Ok, got it!",
					customClass: {
						confirmButton: "btn btn-primary"
					}
				});
					
				}
			}
		});
	});
});
</script>
<div id="uploadStatus"></div>
<div id="formbox">
<form  id="uploadForm" enctype="multipart/form-data" >
<div class="mb-10">
    <label for="exampleFormControlInput1" class="required form-label">Name</label>
    <input type="text" class="form-control form-control-solid" name="u_name" id="u_name" placeholder="Enter Unit Name"/>
</div>
<div class="mb-10">
    <label for="exampleFormControlInput1" class="required form-label">Short Name</label>
    <input type="text" class="form-control form-control-solid" name="u_shortname" id="u_shortname" placeholder="Enter Short Name"/>
</div>
<button class="btn btn-primary" type="submit">Submit</button>	 
</form>
</div>