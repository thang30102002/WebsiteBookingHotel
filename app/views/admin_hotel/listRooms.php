<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Danh sách loại phòng</title>
	<link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
	<link rel="stylesheet" href="../assets/css/feathericon.min.css">
	<link rel="stylesheet" href="../assets/plugins/morris/morris.css">
	<link rel="stylesheet" href="../assets/css/style.css"> </head>

<body>
	<div class="main-wrapper">
	<?php $this->render('element/header-admin-hotel',$data);?>
		<?php $this->render('element/sidebar-admin');?>
		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<div class="mt-5">
								<h4 class="card-title float-left mt-2">Danh sách các loại phòng</h4><input style="    position: absolute;
    right: 0;
    border: none;
    padding: 10px;
    border-radius: 10px;
    width: 30%;" type="text" id="searchInput" placeholder="Tìm kiếm..." onkeyup="searchTable()">  </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="card card-table">
							<div class="card-body booking_card">
								<div class="table-responsive">
									<table id="dataTable" class="datatable table table-stripped table table-hover table-center mb-0">
										<thead>
											<tr>
												<th>Room ID</th>											
												<th>Loại phòng</th>
												<th>Số lượng</th>
												
												<th>Số người ở</th>
												<th>Chiều rộng</th>
												<th>Loại giường</th>
												<th>Số ngày có thể huỷ</th>
												<th>Giá 1 đêm</th>
												<th>Thuế và dịch vụ</th>
                                                <th>Giới thiệu</th>
												
											</tr>
										</thead>
										<tbody>
                                            <?php 
                                                for($i=0;$i<count($data['room']);$i++)
                                                {
                                                    echo "
                                                        <tr>
                                                            <td>".$data['room'][$i]['room_id']."</td>											
                                                            <td>".$data['room'][$i]['room_name']."</td>
                                                            <td>".$data['room'][$i]['number_rooms']."</td>
                                                            
                                                            <td>".$data['room'][$i]['quantity_client']."</td>
                                                            <td>".$data['room'][$i]['room_width']."</td>
                                                            <td>".$data['room'][$i]['type_bed']."</td>
                                                            <td>".$data['room'][$i]['number_day_cancel']."</td>
                                                            <td>".$data['room'][$i]['price_night']."</td>
                                                            <td>".$data['room'][$i]['taxes_and_fees']."</td>
                                                            <td>".$data['room'][$i]['information']."</td>
                                                            <td class='text-right'>
                                                                <div class='dropdown dropdown-action'> <a href='#' class='action-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'><i class='fas fa-ellipsis-v ellipse_color'></i></a>
                                                                    <div class='dropdown-menu dropdown-menu-right'> <a class='dropdown-item' href='editRoom?room_id=".$data['room'][$i]['room_id']."'><i class='fas fa-pencil-alt m-r-5'></i> Edit</a> <a class='dropdown-item' href='#' data-toggle='modal' data-target='#delete_asset_".$data['room'][$i]['room_id']."'><i class='fas fa-trash-alt m-r-5'></i> Delete</a> </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <div id='delete_asset_".$data['room'][$i]['room_id']."' class='modal fade delete-modal' role='dialog'>
                                                        <div class='modal-dialog modal-dialog-centered'>
                                                            <div class='modal-content'>
                                                                <div class='modal-body text-center'> <img src='../app/views/admin_dashbaord-_hotel_bootstrap5-main/assets/img/sent.png' alt='' width='50' height='46'>
                                                                    <h3 class='delete_class'>Bạn có đồng ý xoá loại phòng này ?</h3>
                                                                    
                                                                        
                                                                            <div class='m-t-20' style='    display: flex;
                                                                            
                                                                            justify-content: center;
                                                                            align-items: center;'> <a href='#' class='btn btn-white' data-dismiss='modal'>Close</a>
                                                                            <form method='post'>
                                                                                <input type='hidden' name='id_room_delete' value='".$data['room'][$i]['room_id']."'>
																				<input type='hidden' name='name_room_delete' value='".$data['room'][$i]['room_name']."'>
                                                                                <button name ='delete_room' type='submit' class='btn btn-danger'>Delete</button>
                                                                            </form>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        ";
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
	<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="../assets/js/jquery-3.5.1.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/plugins/raphael/raphael.min.js"></script>
	<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="../assets/plugins/datatables/datatables.min.js"></script>
	<script src="../assets/js/script.js"></script>
</body>

</html>