<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Danh sách ảnh phòng</title>
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
												<th>Ảnh</th>
												
											</tr>
										</thead>
										<tbody style='border-top:none;'>
                                            <?php 
                                                //print_r($data['fodel']);
                                                for($i=0;$i<count($data['room']);$i++)
                                                {
                                                    $folder = "hotel/" . $data['hotel'][0]['hotel_id'] . "/".$data['room'][$i]['room_name']."";
                                                    $img=$this->getImgFolder($folder);
                                                    $img_string="";
                                                    for($y=0;$y<count($img);$y++)
                                                    {
                                                        $img_string .= "<img style='width:20%;margin-left:10px;' src='../hotel/".$data['hotel'][0]['hotel_id']."/".$data['room'][$i]['room_name']."/".$img[$y]."'><form method='post'><input name='img-delete' type='hidden' value='hotel/".$data['hotel'][0]['hotel_id']."/".$data['room'][$i]['room_name']."/".$img[$y]."'><button name='clear-img-room' type='submit' class='clear-img' style='    height: 5%;
                                                        background-color: #f8f9fa;
                                                        border: none;'>X</button></form>";
                                                    }
                                                    echo "
                                                        <tr>
                                                            <td>".$data['room'][$i]['room_id']."</td>											
                                                            <td>".$data['room'][$i]['room_name']."</td>
                                                            <td style='display:flex;'>".$img_string."
                                                            
                                                            </td>
                                                            <td class='text-right'>
                                                                <form action='' method='post' enctype='multipart/form-data'>
                                                                    Chọn ảnh để tải lên:
                                                                    <input type='file' name='image' id='image'>
                                                                    <input type='hidden' name='img-up' value='hotel/" . $data['hotel'][0]['hotel_id'] . "/".$data['room'][$i]['room_name']."/'>
                                                                    <button type='submit' name='up-img'>Tải ảnh lên</button>
                                                                </form>
                                                        
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