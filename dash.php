<?php
	include "cores/inc/config_c.php";
	include "cores/inc/functions_c.php";
	include "cores/inc/auth_c.php";
	include "cores/inc/var_c.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Dashboard – <?php echo $sys_title ?></title>		
        <?php include "cores/inc/header_c.php" ?>
	</head>
	<body id="kt_body" class="aside-enabled">
		<div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid">
				<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">				
					<?php include "cores/inc/nav_c.php" ?>				
				</div>
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<?php include "cores/inc/top_c.php" ?>
					<div class="content d-flex flex-column9 flex-column-fluid" id="kt_content">
						<div id="kt_content_container" class="container-fluid">
							<div class="row g-5 g-xl-8">
								
							
							<?php
								if ($u_store_stats == 'done'){
									include "cores/inc/dash_c.php";
									include "cores/snips/widgets.php";
								} else {
									include "cores/snips/no_store.php";
								}
							?>
								

							</div>				
						</div>						
					</div>
					<?php include "cores/inc/copy_c.php" ?>
				</div>
			</div>
		</div>		
		<?php include "cores/inc/footer_c.php" ?>
		<script>
			var monthlySale;
			var label = [],perDaySale = [];
			$(function(){
				$.ajax({
					url: "cores/snips/gears/fetch_data.php",
					dataType: 'html'
				}).done((data)=>{
					const sale = JSON.parse(data).sale;
					const purchase = JSON.parse(data).purchase;
					let order = 0;
					order = JSON.parse(data).order;
					monthlySale = JSON.parse(data).monthlySale;
					monthlySale.forEach((item)=>{
						label.push(item.day);
						perDaySale.push(Number(item.sales));
					});
					let saleToday = 0,totalSales = 0,totalPurchase = 0;

					let currentTime = Math.round(new Date().getTime()/1000);
					let saleTime;
					
					sale.forEach((item)=>{
						saleTime = Math.round(new Date(item.created_at).getTime()/1000);
						if(currentTime - saleTime < 84000)	// number of seconds in a day
							saleToday += Number(item.total_amount);
						totalSales += Number(item.total_amount);
					});

					purchase.forEach((item)=>{
						totalPurchase += Number(item.total_amount);
					});

					let totalEarning = totalSales - totalPurchase;

					document.querySelector('#today-sale').innerText = saleToday;
					document.querySelector('#total-sales').innerText = totalSales;
					document.querySelector('#total-earnings').innerText = totalEarning;
					document.querySelector('#total-orders').innerText = order;
				}).fail((e)=>{
					console.error(e.responseText);
				});
			});

			$(function(){
				$('#sale-history').DataTable({
					"ajax": "cores/snips/gears/fetch_recent_sales.php",
					"order":[],
					"pageLength":5,
					"columns":[
						{"data":"sale_id"},
						{"data":"total_amount"},
						{"data":"date",
							"render": function(data,type,row){
                            let date = new Date(data);
                            date = date.toLocaleString('en-IN',{
                                day: 'numeric',
                                year: 'numeric',
                                month: 'numeric',
                            });
                            return date;
                        	}
						}
					]
				});
			});

			$(function(){
				setTimeout(function(){
					const context = 'sale-chart';
					const myChart = new Chart(context, {
						type: 'line',
						data: {
							labels: label,
							datasets: [{
								label: 'SALES PER DAY',
								data:perDaySale,
								borderColor:'#936B52'
							}]
						},
						options: {
							scales: {
								y: {
									beginAtZero: true,
									title: {
										text:'SALES'
									},
									display: true,
									align:'center'
								},
								x:{
									title: {
										text:'DAY'
									},
									display:true,
									align:'center'
								}
							}
						}
					});
				},500);

			});
		</script>
	</body>
</html>