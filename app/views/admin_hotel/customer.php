<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Danh sách khách hàng</title>
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
							<div class="mt-5" style="    position: relative;
    display: flex;">
								<h4 class="card-title float-left mt-2">Danh sách khách hàng</h4>
                                <input style="    position: absolute;
    right: 0;
    border: none;
    padding: 10px;
    border-radius: 10px;
    width: 30%;" type="text" id="searchInput" placeholder="Tìm kiếm..." onkeyup="searchTable()">
                            </div>
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
												<th>STT</th>
												<th>Tên khách hàng</th>
                                                <th>Số điện thoại</th>
                                                <th>Email</th>
												
												
											</tr>
										</thead>
										<tbody>
                                            <!-- -->
                                            <?php
                                                $dem=0;
                                                
                                                for($i=0;$i<count($data['bookings']);$i++)
                                                {
                                                   
                                                    $dem=$dem+1;
                                                    echo "
                                                    <tr>
                                                        <td>".$dem."</td>
                                        
                                                        <td>".$data['bookings'][$i]['user_name']."</td>
                                                        <td>0".$data['bookings'][$i]['number_phone_user']."</td>
                                                        <td>".$data['bookings'][$i]['email']."</td>
                                                        
                                                        
                                                    </tr>
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
			<div id="delete_asset" class="modal fade delete-modal" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body text-center"> <img src="assets/img/sent.png" alt="" width="50" height="46">
							<h3 class="delete_class">Are you sure want to delete this Asset?</h3>
							<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
								<button type="submit" class="btn btn-danger">Delete</button>
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
	<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="../assets/plugins/datatables/datatables.min.js"></script>
	<script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/plugins/raphael/raphael.min.js"></script>
	<script src="../assets/js/script.js"></script>
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