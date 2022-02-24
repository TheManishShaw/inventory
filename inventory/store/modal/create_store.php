<?php 
    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";
?>
<!doctype html>
<html lang="en">

<head>
    <title>Create Store – <?php echo $sys_title;?></title>
    <?php include "../../../cores/inc/header_c.php" ?>
</head>

<body id="kt_body" class="aside-enabled">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column p-0 flex-row-fluid" id="kt_wrapper">
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div id="kt_content_container" class="container-fluid">
                        <form id="uploadForm" method="POST" action="gears/create_store.php" enctype="multipart/form-data">
                        <div class="form-group mb-4">
                           <label class="form-label required" for="name">Name</label>
                           <input type="text" class="form-control" id="name" name="uset_name" placeholder="Enter Store Name" required>
                        </div>
                        <div class="form-group my-4">
                           <label class="form-label required" for="phone">Phone</label>
                           <input type="text" class="form-control" id="phone" name="phone"  placeholder="Enter Store Phone" required>
                        </div>
                         <div class="form-group my-4">
                           <label class="form-label required" for="address">Address</label>
                           <input type="text" class="form-control" id="address" name="address" placeholder="Enter Store Address" required>
                        </div>
                         <div class="form-group my-4">
                           <label class="form-label required" for="email">Email</label>
                           <input type="text" class="form-control" name="email" id="email" placeholder="Enter Store Email" required>
                        </div>
                         <div class="form-group my-4">
                           <label class="form-label required" for="pincode">Pin Code</label>
                           <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Store Pin Code" required>
                        </div>
                         <div class="form-group my-4">
                           <label class="form-label required" for="gstno">GST Number</label>
                           <input type="text" class="form-control" name="gstno" id="gstno" placeholder="Enter Store GST Number" required>
                        </div>
                         <div class="form-group my-4">
                           <input type="file" id="image" name="image" required />
                           <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Please provide a logo image of the store."></i>
                        </div>
                       
                        <button type="submit" name="submit" id="submit" value="upload" class="btn btn-primary">Submit</button>
                        <div id="data_response"></div>
                     </form>
						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
        <?php include "../../../cores/inc/footer_c.php" ?>
        <script>
            function submitForm(form){                
                $.ajax({
                    type:'POST',
                    url: form.attr('action'),
                    data: new FormData(form),
                    processData: false,
                    contentType: false
                }).done(function (data) {
                    console.log(data);
                    document.querySelector('#data_response').innerHTML = `<p class="text-success">Store created successfully.</p>`;
                    setTimeout(function(){
                        parent.modal_hide();    // not working. fix this later.
                    },3000);
                });
            }
            $(function(){
                document.querySelector("#submit").addEventListener("click",function(e){
                    e.preventDefault();
                    submitForm($('form'));
                });
            });
        </script>
	</body>

</html>