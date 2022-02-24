<?php 
include "../../cores/inc/config_c.php";
$b_id = $_GET["b_id"];
$sql_fetchdemat = "SELECT * FROM `_tblunits` WHERE `id` = '$b_id'";
$result_fetchdemat = mysqli_query($link, $sql_fetchdemat);
if (mysqli_num_rows($result_fetchdemat) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result_fetchdemat)) {
    $u_name = $row["name"];
    $u_shortname = $row["ShortName"];
  
  }
}
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
			url: 'modal/update_unit.php',
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
					$('#uploadForm')[0].reset();
				    $("#submit").prop('disabled', true); // disable button
					$('#uploadStatus').html('<center><img src="<?php echo $sys_link?>/assets/images/loding.gif"></br><span style="color:#28A74B;">Data Submitted Successfully <br/> <a href="#" onClick="window.location.reload();return false;">Close</a> </center> ');
					$('#formbox').html('');
					setTimeout(function(){
                    $('#modal_show').modal('hide')
                    }, 3000);
					
					window. close(); 
				}else if(response !== 'ok'){
					$('#uploadStatus').html('<p style="color:#EA4335;">Data Not Sent.</p>'+ response);
				}
			}
		});
	});
});
</script>      
<div id="uploadStatus"></div>
<div id="formbox">
<form  id="uploadForm" enctype="multipart/form-data" >
<h5 class="mb-3 text-uppercase">Edit Unit</h5>
<div class="mb-10">
    <label  class="required form-label">Name</label>
    <input type="text" class="form-control form-control-solid" name="u_name" id="u_name" value="<?php echo $u_name ?>" placeholder="Enter Unit Name"/>
</div>
<div class="mb-10">
    <label  class="required form-label">Short Name</label>
    <input type="text" class="form-control " name="u_shortname" id="u_shortname" value="<?php echo $u_shortname ?>" placeholder="Enter Short Name"/>
</div>
<input type="text" value="<?php echo $b_id ?>" name="b_id" hidden required>
<button class="btn btn-primary" type="submit">Submit</button>	 
</form>
</div>        
                               