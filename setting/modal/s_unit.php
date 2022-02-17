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
			url: 'modal/insert_blog.php',
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