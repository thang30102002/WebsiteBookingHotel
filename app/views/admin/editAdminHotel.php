<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Chỉnh sửa tài khoản khách sạn</title>
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
	<?php $this->render('admin/header',$data);?>
		<?php $this->render('admin/sidebar');?>
		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<div class="mt-5">
								<h4 class="card-title float-left mt-2">Thông tin tài khoản khách sạn</h4>  </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="card card-table">
							<div class="card-body booking_card">
								<div class="table-responsive">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row formtype">
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input name="email" class="form-control" type="email" value="<?php echo $data["adminHotel"][0]["email"]; ?>">
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Số điện thoại</label>
                                                <input name="number_phone" class="form-control" type="text" value="<?php echo $data["adminHotel"][0]["number_phone"]; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Họ</label>
                                                <input name="surname" class="form-control" type="text" value="<?php echo $data["adminHotel"][0]["surname"]; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Tên</label>
                                                <input name="name"   class="form-control" type="text" value="<?php echo $data["adminHotel"][0]["name"]; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input name="password"   class="form-control" type="text" value="<?php echo $data["adminHotel"][0]["password"]; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Trạng thái</label><br>
                                                <select name="status" id="status">
                                                    <option value="0" <?php echo ($data["hotel"][0]["status"] == 0) ? 'selected' : ''; ?>>Chưa xét duyệt</option>
                                                    <option value="1" <?php echo ($data["hotel"][0]["status"] == 1) ? 'selected' : ''; ?>>Đã xét duyệt</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <button name="edit-admin-hotel" type="submit" class="btn btn-primary buttonedit ml-2">Save</button>
                                    
                                </form>
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
	<script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/plugins/raphael/raphael.min.js"></script>
	<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="../assets/plugins/datatables/datatables.min.js"></script>
	<script src="../assets/js/script.js"></script>
</body>

</html>