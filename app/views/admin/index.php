<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Bảng điều khiển</title>
	<link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="../assets/css/feathericon.min.css">
	<link rel="stylehseet" href="https://cdn.oesmith.co.uk/morris-0.5.1.css">
	<link rel="stylesheet" href="../assets/plugins/morris/morris.css">
	<link rel="stylesheet" href="../assets/css/style.css"> </head>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
	.card-review{
		position: relative;
		display:flex;
	}
	.card-review input{
		position: absolute;
    	right: 0;
		border:none;
	}
	.card-body{
		max-height: 400px;
    	overflow-y: auto;
	}
	
</style>
<body>
	
	<div class="main-wrapper">
		<?php $this->render('element/header-admin-hotel',$data);?>
		<?php $this->render('admin/sidebar');?>
		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12 mt-5">
							<h3 class="page-title mt-3">Hi <?php echo $_SESSION['emailSystem'];?>!</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item active">Bảng điều khiển </li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
										<h3 class="card_widget_header"><?php echo count($data["booking"]);?></h3>
										<h6 class="text-muted">Tổng số đơn đặt phòng</h6> </div>
									<div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus">
									<path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
									<circle cx="8.5" cy="7" r="4"></circle>
									<line x1="20" y1="8" x2="20" y2="14"></line>
									<line x1="23" y1="11" x2="17" y2="11"></line>
									</svg></span> </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header" style="position: relative;">
									<div>
										<h3 class="card_widget_header"><?php echo count($data['hotel']);?></h3>
										<h6 class="text-muted">Khách sạn</h6> 
                                    </div>
                                    <i class="fas fa-hotel" style="position: absolute; right: 0;"></i>
									
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header" style="position: relative;">
									<div>
										<h3 class="card_widget_header"><?php echo count($data['user']);?></h3>
										<h6 class="text-muted">Khách hàng đặt phòng</h6> </div>
                                        
                                        
                                        <i class="fas fa-user" style="position: absolute; right: 0;"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
										<h3 class="card_widget_header"><?php echo count($data['review']);?></h3>
										<h6 class="text-muted">Bình luận</h6> </div>
									<div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe">
									<circle cx="12" cy="12" r="10"></circle>
									<line x1="2" y1="12" x2="22" y2="12"></line>
									<path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
									</path>
									</svg></span> </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-lg-6">
						<div class="card card-chart">
							<div class="card-header">
								<h4 class="card-title">Biểu đồ doanh thu các loại phòng</h4> </div>
								<?php $rooms_name=[];
									  $Revenue=[];
									  for($i=0;$i<count($data['room']);$i++){
										$rooms_name[]=$data['room'][$i]['room_name'];
										$this->bookingModel= new BookingModel;
										$revenue_room=$this->bookingModel->getRevenueRoom($data['room'][$i]['room_name']);
										$Revenue[]=$revenue_room;
									  }
									  
									  
									  
									  
								?>
							<div class="card-body">
								<canvas id="myChart" style='max-width: 600px;max-height: 400px;'></canvas>
			
							</div>
						</div>
					</div>
					<div class="col-md-12 col-lg-6">
						<div class="card card-chart">
							<div class="card-header card-review">
								<h4 class="card-title">Bình luận của khách hàng</h4>
								<input type="text" id="searchInput" placeholder="Tìm kiếm..." onkeyup="searchTable()">
							</div>
								
							<div class="card-body">
								<div class="table-responsive">
										<table id="dataTable" class="datatable table table-stripped table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>STT</th>
													<th>Tên khách hàng</th>
													<th>Số điện thoại</th>
													<th>Email</th>
													<th>Nội dung</th>
													<th>Ngày bình luận</th>
												</tr>
											</thead>
											<tbody>
												
												<?php
													for($i=0;$i<count($data['review']);$i++){
														$dem=$i+1;
														echo "<tr>
																<td>".$dem."</td>
																
																<td>".$data['review'][$i]['user_name']."</td>
																<td>".$data['review'][$i]['number_phone']."</td>
																<td>".$data['review'][$i]['email']."</td>
																<td>".$data['review'][$i]['coment']."</td>
																<td>".$data['review'][$i]['review_date']."</td>
																
															</tr>";
													}
												?>
												
												
											</tbody>
										</table>
									</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="../assets/js/jquery-3.5.1.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/plugins/raphael/raphael.min.js"></script>
	<script src="../assets/plugins/morris/morris.min.js"></script>
	<script src="../assets/js/chart.morris.js"></script>
	<script src="../assets/js/script.js"></script>
	
	
	<script>
		// Chuyển đổi biến PHP sang JavaScript
        const roomsName = <?php echo json_encode($rooms_name); ?>;
        const ctx = document.getElementById('myChart').getContext('2d');
		const data_room=<?php echo json_encode($Revenue);?>;
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: roomsName,
                datasets: [{
                    label: 'Doanh thu',
                    data: data_room, // Dữ liệu dưới dạng số tiền
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
						min: 200000, // Giá trị tối thiểu của trục Y
                        max: 2000000, // Giá trị tối đa của trục Y
                        ticks: {
                            callback: function(value, index, values) {
                                // Định dạng số tiền với ký hiệu tiền tệ (VND, USD, v.v.)
                                return ' VND ' + value.toLocaleString(); // Định dạng với dấu phân cách hàng nghìn
                            }
                        }
                    }
                }
            }
        });
    </script>
	<script>
		function searchTable() {
		const input = document.getElementById('searchInput');
		const filter = input.value.toLowerCase();
		const table = document.getElementById('dataTable');
		const trs = table.getElementsByTagName('tr');

		for (let i = 1; i < trs.length; i++) {
			let showRow = false;
			const tds = trs[i].getElementsByTagName('td');
			for (let j = 0; j < tds.length; j++) {
			if (tds[j].textContent.toLowerCase().includes(filter)) {
				showRow = true;
				break;
			}
			}
			trs[i].style.display = showRow ? '' : 'none';
		}
		}

	</script>
</body>

</html>