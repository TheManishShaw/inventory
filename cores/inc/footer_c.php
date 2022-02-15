<!--end::Main-->
<script>var hostUrl = "<?php echo $sys_link ?>/assets/index.html";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="<?php echo $sys_link ?>/assets/plugins/global/plugins.bundle.js"></script>
		<script src="<?php echo $sys_link ?>/assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="<?php echo $sys_link ?>/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="<?php echo $sys_link ?>/assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="<?php echo $sys_link ?>/assets/js/custom/apps/customers/list/export.js"></script>
		<script src="<?php echo $sys_link ?>/assets/js/custom/apps/customers/list/list.js"></script>
		<script src="<?php echo $sys_link ?>/assets/js/custom/apps/customers/add.js"></script>
		<script src="<?php echo $sys_link ?>/assets/js/custom/modals/offer-a-deal.bundle.js"></script>
		<script src="<?php echo $sys_link ?>/assets/js/custom/widgets.js"></script>
		<script src="<?php echo $sys_link ?>/assets/js/custom/apps/chat/chat.js"></script>
		<script src="<?php echo $sys_link ?>/assets/js/custom/modals/create-project.bundle.js"></script>
		<script src="<?php echo $sys_link ?>/assets/js/custom/modals/upgrade-plan.js"></script>
		<script src="<?php echo $sys_link ?>/assets/js/custom/intro.js"></script>
		<!--end::Page Custom Javascript-->
		
		
		







		<!--end::Javascript-->
		<!--Begin::Google Tag Manager (noscript) -->
		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>

		

		<script>
function modal_show() {
    $('#modal_show').modal('show')
}
$(document).ready(function(){
    $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
        var dataNAME = $(this).attr('data-name');
        document.getElementById("modal_title").innerHTML = dataNAME;
        $('.modal-body').load(dataURL,function(){
            $('#modal_show').modal({show:true});
        });
    }); 
});

$(document).ready(function(){
    $('.').on('click',function(){
        var dataURL = $(this).attr('data-href');
        var dataNAME = $(this).attr('data-name');
        document.getElementById("Tickets").innerHTML = dataNAME;
        $('.modal-body').load(dataURL,function(){
            $('#modal_show').modal({show:true});
        });
    }); 
});
</script>
<!-- Modal -->
          <div class="modal fade" id=""  tabindex="-1"  >
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="" ></h5>
                            <a class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-dismiss="modal" href="#"></a>
                        </div>
                        <div class="modal-body" >
                            Loading...
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


			<div class="modal fade" id="modal_show" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"  aria-hidden="true">		
			<div class="modal-dialog modal-dialog-centered mw-900px">			
				<div class="modal-content">				
					<div class="modal-header">					
						<h1 class="fw-bolder modal-title" id="modal_title"></h1>						
						<div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">						
							<span class="svg-icon svg-icon-2x">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
								</svg>
							</span>				
						</div>					
					</div>				
					<div class="modal-body py-lg-10 px-lg-10" id="modal_body">			
				
					</div>		
				</div>			
			</div>
		</div>