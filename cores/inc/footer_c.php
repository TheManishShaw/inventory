
<script>var hostUrl = "<?php echo $sys_link ?>/assets/index.html";</script>

		<script src="<?php echo $sys_link ?>/assets/plugins/global/plugins.bundle.js"></script>
		<script src="<?php echo $sys_link ?>/assets/js/scripts.bundle.js"></script>

		<script src="<?php echo $sys_link ?>/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<script src="<?php echo $sys_link ?>/assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="<?php echo $sys_link ?>/assets/js/custom/documentation/general/datatables/advanced.js"></script>
		<script src="<?php echo $sys_link ?>/assets/js/custom/apps/customers/list/export.js"></script>
		<script src="<?php echo $sys_link ?>/assets/js/custom/apps/customers/list/list.js"></script>
		<script src="<?php echo $sys_link ?>/assets/js/custom/apps/customers/add.js"></script>
		<script src="<?php echo $sys_link ?>/assets/js/custom/modals/offer-a-deal.bundle.js"></script>
		<script src="<?php echo $sys_link ?>/assets/js/custom/widgets.js"></script>
		<script src="<?php echo $sys_link ?>/assets/js/custom/apps/chat/chat.js"></script>
		<script src="<?php echo $sys_link ?>/assets/js/custom/modals/create-project.bundle.js"></script>
		<script src="<?php echo $sys_link ?>/assets/js/custom/modals/upgrade-plan.js"></script>
		<script src="<?php echo $sys_link ?>/assets/js/custom/intro.js"></script>

		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>

		

		<script>
function modal_show() {
    $('#modal_show').modal('show')
}
function modal_hide() {
    $('#modal_show').modal('hide')
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
<script>
         function fullscreen() {
  var isInFullScreen = (document.fullscreenElement && document.fullscreenElement !== null) ||
    (document.webkitFullscreenElement && document.webkitFullscreenElement !== null) ||
    (document.mozFullScreenElement && document.mozFullScreenElement !== null) ||
    (document.msFullscreenElement && document.msFullscreenElement !== null);
  var docElm = document.documentElement;
  if (!isInFullScreen) {
    if (docElm.requestFullscreen) {
      docElm.requestFullscreen();
    } else if (docElm.mozRequestFullScreen) {
      docElm.mozRequestFullScreen();
    } else if (docElm.webkitRequestFullScreen) {
      docElm.webkitRequestFullScreen();
    } else if (docElm.msRequestFullscreen) {
      docElm.msRequestFullscreen();
    }
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    }
  }
}
         function clock() {
    var hours = document.getElementById("hours");
    var minutes = document.getElementById("minutes");
    var seconds = document.getElementById("seconds");
    var phase = document.getElementById("phase");

    var h = new Date().getHours();
    var m = new Date().getMinutes();
    var s = new Date().getSeconds();
    var am = "AM";

    if (h > 12) {
        h = h - 12;
        var am = "PM";
    }

    h = h < 10 ? "0" + h : h;
    m = m < 10 ? "0" + m : m;
    s = s < 10 ? "0" + s : s;

    hours.innerHTML = h + ":" + m + "&nbsp;" + am;
debug: true
}

var interval = setInterval(clock, 100);
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('clock').innerHTML =
        h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}

function checkTime(i) {
    if (i < 10) {
        i = "0" + i
    }; // add zero in front of numbers < 10
    return i;
}

      const button = document.getElementById('kt_docs_sweetalert_html');

button.addEventListener('click', e =>{
    e.preventDefault();

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      });
});
 
   
</script>  	


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