<head>
    
    <link rel="stylesheet" href="public/assets/clients/css/booking.css">
    <link rel="stylesheet" href="public/assets/clients/css/payment.css">
    <link rel="stylesheet" href="public/assets/clients/css/history_booking.css">
    <link href="public/assets/clients/icon/fontawesome/css/fontawesome.css" rel="stylesheet" />
    <link href="public/assets/clients/icon/fontawesome/css/brands.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="public/assets/clients/icon/fontawesome/css/solid.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    
    <?php
        $this->render('blocks/header');
        if (isset($_SESSION['cancel_message'])) {
            if($_SESSION['cancel_message']==1){
                include('app/views/element/notification/cancel-booking-success.php');
                
            }
            else{
                include('app/views/element/notification/error-cancel-booking.php');
                
            }
            unset($_SESSION['cancel_message']); // Thay 'name' bằng tên biến session bạn muốn xóa
        }
        
        
    ?>
    <div class="title-form-contact">
        <h2 style='margin-bottom:50px;'>Thông tin tài khoản</h2>
        
    </div>
    <div class='form-booking form-history-booking' style='display:block;'>
        <?php
                        $name="";
                        $email="";
                        $phone="";
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
                        $name=$_SESSION['name'];
                        $email=$_SESSION['email'];
                        $phone=$_SESSION['number_phone'];
                        echo "<div class='greeting-user'>
                        <div class='information-user'>
                            <img src='https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg' alt=''>
                            <p>Chào mừng ".$name."! Tận hưởng các đặc quyền sau bằng cách hoàn thành đặt phòng này:</p>
                        </div>
                        <div class='service'>
                            <div class='service-client diz'>
                                <img src='https://ik.imagekit.io/tvlk/image/imageResource/2023/10/30/1698673782564-64da5698ac769b2b00b1062664b6e729.svg?tr=fo-auto,h-32,q-75,w-28' alt=''>
                                <div class='service-content'>
                                    <h6>Dịch vụ khách hàng 24/7</h6>
                                    <p>Nhân viên chăm sóc khách hàng sẽ luôn có mặt khi bạn cần.</p>
                                </div>
                            </div>
                            <div class='accumulate-coins diz'>
                                <img src='https://ik.imagekit.io/tvlk/image/imageResource/2023/10/30/1698673791701-e8d17dda6b0c0110b108b820e302d252.svg?tr=fo-auto,h-32,q-75,w-28' alt=''>
                                    <div class='service-content'>
                                        <h6>Tích xu</h6>
                                        <p>Tích xu để trở thành thành viên ưu tiên và tận hưởng nhiều quyền lợi hơn.</p>
                                    </div>
                            </div>
                        </div>
                    </div>";
                    }
                ?>
                <h5>Thông tin tài khoản</h5>
               
                <form method="post" action="UpdateUser" enctype="multipart/form-data" class='information-user-booking' style='background-color: #fff;
    padding: 15;
    border-radius: 10px;'>
                    <!-- <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Ảnh đại diện</label><br>
                        <img style='width:24%;' src="public/assets/clients/images/avarta/<?php //echo $_SESSION['avarta'];?>" alt=""><br>
                        
                        <input  type="file" name="fileToUpload" id="fileToUpload" >
                    </div> -->
                    <!--Avatar-->
                    <div>
                        <div class="d-flex justify-content-center mb-4">
                            <img id="selectedAvatar" src="public/assets/clients/images/avarta/<?php echo $_SESSION['avarta'];?>" 
                            class="rounded-circle" style="width: 200px; height: 200px; object-fit: cover;" alt="example placeholder" />
                        </div>
                        <div class="d-flex justify-content-center">
                            <div data-mdb-ripple-init class="btn btn-primary btn-rounded" style='width:25%; '>
                                <label class="form-label text-white m-1" for="fileToUpload">Thay đổi ảnh đại diện</label>
                                <input type="file" name="fileToUpload"  class="form-control d-none" id="fileToUpload" onchange="displaySelectedImage(event, 'selectedAvatar')" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label style='float: left;' for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name='email' value='<?php echo $_SESSION['email'];?>' aria-describedby="emailHelp">
                        
                    </div>
                    <div class="mb-3">
                        <label style='float: left;' for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name='password' value='<?php echo $_SESSION['password_user'];?>'>
                    </div>
                    <div class="mb-3">
                        <label style='float: left;' for="exampleInputPassword1" class="form-label">Họ tên</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name='name' value='<?php echo $_SESSION['name'];?>'>
                    </div>
                    <div class="mb-3">
                        <label style='float: left;' for="exampleInputPassword1" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name='phone' value='<?php echo $_SESSION['number_phone'];?>'>
                    </div>
                        <input type="hidden" name='id' value='<?php echo $_SESSION['id']?>'>
                    <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
                </form>
                <h5>Danh sách các đơn đặt phòng của bạn</h5>
                
                <div class="card-body" style='    background-color: #fff;
    border-radius: 10px;'>
                    <div class="table-responsive">
                        <table class="table table-hover table-center">
                            <thead>
                                <tr>
                              
                                    <th>ID</th>
                                    <th>Tên khách sạn</th>
                                    <th>Tên loại phòng</th>
                                    <th>Ngày nhận phòng</th>
                                    <th>Ngày trả phòng</th>
                                    <th>Số tiền thanh toán</th>
                                    <th>Ghi chú</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php for($i=0;$i<count($data['Bookings']);$i++)
                                    {
                                        $this->Hotel= new RoomModel;
                                        $hotel=$this->Hotel->getDetailHotelForIdRoom($data['Bookings'][$i]['room_id']);
                                        $this->Room= new RoomModel;
                                        $room=$this->Room->getRoomDetail($data['Bookings'][$i]['room_id']);
                                        $status="";
                                        if($data['Bookings'][$i]['status']==1){
                                            $status="Đặt phòng thành công";
                                        }
                                        else if($data['Bookings'][$i]['status']==2){
                                            $status="Đặt phòng không thành công";
                                        }
                                        else{
                                            $status="Đang kiểm tra";
                                        }
                                        
                                    // Giả sử đây là một phần của vòng lặp
                                    for ($i = 0; $i < count($data['Bookings']); $i++) {
                                        // Khởi tạo đối tượng DateTime cho ngày nhận phòng và ngày hiện tại
                                        $check_in_date = new DateTime($data['Bookings'][$i]['check_in_date']);
                                        $now = new DateTime();

                                        // Tính khoảng cách giữa ngày nhận phòng và ngày hiện tại
                                        $interval = $check_in_date->diff($now);

                                        // Kiểm tra nếu ngày nhận phòng chưa đến
                                        $showCancelButton = ($check_in_date > $now);

                                        // Hiển thị dữ liệu và điều kiện hủy
                                        echo '
                                        <tr>
                                            <td class="text-nowrap">
                                                <div>' . htmlspecialchars($data['Bookings'][$i]['booking_id']) . '</div>
                                            </td>
                                            <td class="text-nowrap">' . htmlspecialchars($hotel[0]['hotel_name']) . '</td>
                                            <td>' . htmlspecialchars($room['room_name']) . '</td>
                                            <td>' . htmlspecialchars($data['Bookings'][$i]['check_in_date']) . '</td>
                                            <td class="text-center">' . htmlspecialchars($data['Bookings'][$i]['check_out_date']) . '</td>
                                            <td class="text-center">' . number_format($data['Bookings'][$i]['total_price'], 2, '.', ',') . ' VNĐ</td>
                                            <td class="text-center">' . htmlspecialchars($data['Bookings'][$i]['note']) . '</td>
                                            <td class="text-center">
                                                <span style="padding:10px; background-color: #007bff;" class="badge badge-pill inv-badge">' . htmlspecialchars($status) . '</span>
                                            </td>
                                            ';

                                        // Nếu ngày nhận phòng chưa đến, hiển thị nút hủy
                                        if ($showCancelButton) {
                                            echo '
                                            <td class="text-center btn-cancel-booking">
                                                <form method="post" >
                                                    <input name="id_booking" type="hidden" value="' . htmlspecialchars($data['Bookings'][$i]['booking_id']) . '">
                                                    <button name="show-cancel-booking" id="btn-cancel-booking" style="border:none; padding:10px; background-color: red;" class="badge badge-pill inv-badge">Hủy đơn đặt phòng</button>
                                                </form>
                                            </td>';
                                        }
                                        
                                        echo '</tr>';
                                    }}

                                    // Xử lý form khi người dùng nhấn nút hủy
                                    if (isset($_POST['show-cancel-booking'])) {
                                        
                                        // $id_booking = htmlspecialchars($_POST['id_booking']);
                                        // $this->render('element/cancel-booking');
                                                            
                                            $this->model_booking = $this->model('BookingModel');
                                            $this->detail_booking = new BookingModel();
                                            $booking = $this->detail_booking->getBookingDetail($_POST['id_booking']);    
                                            
                                
                                            // Khởi tạo đối tượng DateTime cho ngày nhận phòng
                                            $checkIn = new DateTime($booking[0]['check_in_date']);
                                
                                            // Khởi tạo đối tượng DateTime cho ngày hiện tại
                                            $now = new DateTime();
                                
                                            // Tính khoảng cách giữa hai ngày
                                            $interval = $checkIn->diff($now);
                                
                                            // Lấy số ngày từ đối tượng DateInterval
                                            $days = $interval->days;
                                
                                            // Nếu cần biết khoảng cách âm hay dương, có thể kiểm tra thuộc tính 'invert'
                                            if ($interval->invert) {
                                                $days = $days;
                                            }
                                
                                            
                                            $this->model_room = $this->model('RoomModel');
                                            $this->detail_room = new RoomModel();
                                            $room = $this->detail_room->getRoomDetail($booking[0]['room_id']);   
                                            
                                            echo $number_day_cancel=$room['number_day_cancel'];
                                            if($number_day_cancel<=$days){
                                                
                                                $this->deleteBooking = new BookingModel();
                                                $this->deleteBooking->DeleteBooking($_POST['id_booking']);   
                                                if (isset($_POST['show-cancel-booking'])) {
                                                    unset($_POST['show-cancel-booking']);
                                                }  
                                                $_SESSION['cancel_message'] = 1;
                                                
                                                    
                                            }
                                            else{
                                                
                                                
                                                if (isset($_POST['show-cancel-booking'])) {
                                                    unset($_POST['show-cancel-booking']);
                                                    
                                                }
                                                $_SESSION['cancel_message'] = 0;
                                            }
                                         
                                            echo '<meta http-equiv="refresh" content="0">';   
                                    }
                                    
                                ?>
                                
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                
        
    </div>
    <?php
        $this->render('blocks/footer');
    ?>


</body>
<style>
body{
    padding:0;
}
</style>