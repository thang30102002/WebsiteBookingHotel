<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HotelHive Katera Registration</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="sidebar-section active"><button class='btn-sidebar' id='btn-information-hotel'>Thông tin khách sạn</button></div>
            <div class="sidebar-section"><button class='btn-sidebar' id='btn-information-room'>Thông tin các loại phòng</button></div>
            <div class="sidebar-section"><button class='btn-sidebar' id='btn-table-booking'>Thống kê các đơn đặt phòng</button></div>
            <div class="sidebar-section"><button class='btn-sidebar' id='btn-information-account'>Thông tin tài khoản</button></div>
            
        </div>
        <div class="main-content">
            <div class="header">
                <span class="email">Đăng nhập bởi tài khoản: <?php echo $_SESSION['email'] ?> | Số đăng ký: 680022925</span>
            </div>
            <!-- thông tin khách sạn -->
            <div class="form-section information-hotel" id='information-hotel'>
                <h2>Thông tin chung</h2>
                <form action="UpdateHotel" method="post" id="information-hotel">
                   
                    <div class="form-group">
                        <label for="property-name">Tên khách sạn</label>
                        <input type="text" name='hotel_name' value='<?php echo $data['hotel'][0]['hotel_name'];?>' id="property-name" placeholder="Tên khách sạn của bạn" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="license-address">Thành phố </label>
                        <input type="text" name='city' value='<?php echo $data['hotel'][0]['city'];?>' id="license-address" placeholder="Khách sạn bạn ở thành phố nào?" required>
                    </div>
                    <div class="form-group">
                        <label for="property-address">Địa chỉ khách sạn </label>
                        <input type="text" name='address' value='<?php echo $data['hotel'][0]['address'];?>' id="property-address" placeholder="Địa chỉ khách sạn"required>
                        <input type="hidden" name='hotel_id' value='<?php echo $data['hotel'][0]['hotel_id'];?>'>
                    </div>
                    <div class="form-group type-hotel">
                        <label for="property-type">Số sao </label>
                        <select id="property-type" name='number_star' style='width:5%;'>
                            <option value="<?php echo $data['hotel'][0]['number_star'];?>"><?php echo $data['hotel'][0]['number_star'];?></option>
                            <?php for($i=2;$i<7;$i++)
                                    {
                                        if($i!=$data['hotel'][0]['number_star']){
                                            echo "<option value='".$i."'>".$i."</option>";
                                        }
                                    }
                            ?>
                            
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <label for="information">Giới thiệu</label>
                        
                        <textarea style='width: 70%;min-height: 500px;' id="information" name="information"  placeholder="Enter introduction text..."></textarea>
                    </div>
                    
                   
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="tel" id="phone" name='hotel_number_phone' value='<?php echo $data['hotel'][0]['hotel_number_phone'];?>' placeholder="Số điện thoại liên hệ của khách sạn" >
                    </div>
                    <div class="form-group">
                        <label for="phone">Giá phòng thấp nhất</label>
                        <input type="tel" id="phone" name='price_min' value='<?php echo $data['hotel'][0]['price_min'];?>' placeholder="Giá phòng thấp nhất trong khách sạn" >
                    </div>
                    
                    <div class="form-group">
                        <label for="rooms">Số loại phòng </label>
                        <input type="number" min='1' name='number_type_rooms' value='<?php echo $data['hotel'][0]['number_type_rooms'];?>'  style='width:5%;' id="rooms"   required>
                    </div>
                    
                    <button type="submit" name="information">Cập nhật</button>
                </form>
            </div>
            <!-- //////////// -->
            <!-- thông tin tài khoản -->
            <div class="form-section information-account" id='information-account' style='display:none;'>
                <h2>Thông tin tài khoản</h2>
                <form method="post" action="UpdateAdminHotel">
                    <div class="form-group">
                        <label for="property-name">Email </label>
                        <input type="email" name='email' id="property-name" value='<?php echo $_SESSION['email']; ?>' placeholder="email của bạn" required>
                    </div>
                    <div class="form-group">
                        <label for="business-license">Số điện thoại</label>
                        <input type="text" name='number_phone' id="business-license" value='<?php echo $_SESSION['number_phone']; ?>' placeholder="số điện thoại của bạn" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu </label>
                        <input type="password" name='password' id="password" value='<?php echo $_SESSION['password']; ?>' placeholder="" required><br>
                        <a style='text-decoration: none;'href="#" id="togglePassword">Show</a>
                    </div>
                    <div class="form-group">
                        <label for="license-address">Họ </label>
                        <input type="text" name='surname' id="license-address" value='<?php echo $_SESSION['surname']; ?>' placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="property-address">Tên</label>
                        <input type="text" name='name' id="property-address" value='<?php echo $_SESSION['name']; ?>' placeholder=""required>
                        <input type="hidden" name='admin_hotel_id' value='<?php echo $_SESSION['admin_hotel_id']; ?>'>
                    </div>
                    
                    
                    <button type="submit">Cập nhật</button>
                </form>
            </div>
            <!-- ////////////////////// -->
            <!-- thông tin các phòng -->
            <div class="form-section information-rooms" id='information-rooms'>
                <h2>Phòng</h2>
                <?php
                    $this->model_room = $this->model('RoomModel');
                    $this->DetailRoom= new RoomModel;
                    $rooms=$this->DetailRoom->getAllRoomsHotel($data['hotel'][0]['hotel_id']);
                    
                    $dem=1;
                for($i=0;$i<$data['hotel'][0]['number_type_rooms'];$i++)
                {
                    echo "<div class='room'>
                    <h3>Phòng ".$dem."</h3>
                    <form>
                        <div class='form-group'>
                            <label for='property-name'>Tên phòng </label>
                            <input type='text' id='property-name' value='".$rooms[$i]['room_name']."' placeholder='Tên phòng của khách sạn' required>
                        </div>
                        <div class='form-group'>
                            <label for='business-license'>Giới thiệu </label>
                            <input type='text' value='".$rooms[$i]['information']."' id='business-license' placeholder='Đôi nét giới thiệu về loại phòng' required>
                        </div>
                        <div class='form-group'>
                            <label for='license-address'>Giá 1 đêm </label>
                            <input type='text' value='".$rooms[$i]['price_night']."' id='license-address' placeholder='Giá 1 đêm ở cho loại phòng' required>
                        </div>
                        
                        
                        <div class='form-group'>
                            <label for='license-address'>Kích cỡ của phòng m2</label>
                            <input type='text' value='".$rooms[$i]['room_width']."' id='license-address' placeholder='' required>
                        </div>
                        
                        <div class='form-group type-hotel'>
                            <label for='type_bed'>Loại giường </label>
                            <input type='text' value='".$rooms[$i]['type_bed']."' id='type_bed' placeholder='' required>
                            
                        </div>
                        
                        
                    
                        
                        <div class='form-group'>
                            <label for='rooms'>Số phòng cho loại này</label>
                            <input type='number' min='1' value='".$rooms[$i]['number_rooms']."' style='width:5%;' id='rooms'   required>
                        </div>
                        
                        <button type='submit'>Lưu và Tiếp tục để Phần Tiếp theo</button>
                    </form>
                </div>";
                $dem=$dem+1;
                }?>
                
            </div>
            <!-- //////////////// -->
            <div class='table-booking' style='display:none;' id='table-booking'>
                <h2>Bảng các đơn đặt phòng</h2>
                <table style='    width: 100%;
    font-size: 13px;
    text-align: center;' class="table table-bordered">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Loại phòng</th>
                        <th>Tên khách hàng</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Ngày nhận phòng</th>
                        <th>Ngày trả phòng</th>
                        <th>Yêu cầu thêm</th>
                        <th>Giá</th>
                        <th>Trạng thái</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $this->model_booking = $this->model('BookingModel');  
                            $this->Bookings= new BookingModel;
                            $bookings=$this->Bookings->getBookingIdHotel($data['hotel'][0]['hotel_id']);
                            
                            $dem=1;
                            for($i=0;$i<count($bookings);$i++)
                            {
                                echo "
                                <tr>
                                    <td>".$dem."</td>
                                    <td>".$bookings[$i]['room_id']."</td>
                                    <td>".$bookings[$i]['user_name']."</td>
                                    <td>".$bookings[$i]['email']."</td>
                                    <td>".$bookings[$i]['number_phone_user']."</td>
                                    <td>".$bookings[$i]['check_in_date']."</td>
                                    <td>".$bookings[$i]['check_out_date']."</td>
                                    <td>".$bookings[$i]['note']."</td>
                                    <td>".$bookings[$i]['total_price']."</td>
                                    <td>".$bookings[$i]['status']."</td>
                                    
                                </tr>
                                ";
                                $dem=$dem+1;
                            }
                            
                        ?>
                    
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <script >
         document.getElementById("btn-information-room").addEventListener("click", function() {
            var informationHotel = document.getElementById("information-hotel");
            var informationRoom = document.getElementById("information-rooms");
            var informationAccount = document.getElementById("information-account");
            var tableBooking = document.getElementById("table-booking");
            informationAccount.style.display = "none";
            informationHotel.style.display = "none";
            tableBooking.style.display = "none";
            informationRoom.style.display = "block";
        });
        document.getElementById("btn-information-hotel").addEventListener("click", function() {
            var informationHotel = document.getElementById("information-hotel");
            var informationRoom = document.getElementById("information-rooms");
            var informationAccount = document.getElementById("information-account");
            var tableBooking = document.getElementById("table-booking");
            tableBooking.style.display = "none";
            informationAccount.style.display = "none";
            informationHotel.style.display = "block";
            informationRoom.style.display = "none";
        });
        document.getElementById("btn-information-account").addEventListener("click", function() {
            var informationHotel = document.getElementById("information-hotel");
            var informationRoom = document.getElementById("information-rooms");
            var informationAccount = document.getElementById("information-account");
            var tableBooking = document.getElementById("table-booking");
            tableBooking.style.display = "none";
            informationAccount.style.display = "block";
            informationRoom.style.display = "none";
            informationHotel.style.display = "none";
        });
        document.getElementById("btn-table-booking").addEventListener("click", function() {
            var informationHotel = document.getElementById("information-hotel");
            var informationRoom = document.getElementById("information-rooms");
            var informationAccount = document.getElementById("information-account");
            var tableBooking = document.getElementById("table-booking");
            tableBooking.style.display = "block";
            informationAccount.style.display = "none";
            informationRoom.style.display = "none";
            informationHotel.style.display = "none";
        });
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');

        togglePassword.addEventListener('click', function (e) {
            e.preventDefault();
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);

            // Toggle the link text
            this.textContent = type === 'password' ? 'Show' : 'Hide';
        });

    </script>
</body>
</html>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    display: flex;
    width: 70%;
    margin: auto;
}

.sidebar {
    width: 250px;
    background-color: #fff;
    border-right: 1px solid #ddd;
    padding: 20px;
}

.sidebar-section {
    margin-bottom: 20px;
    font-size: 18px;
    font-weight: bold;
}

.sidebar-section.active {
    color: #007bff;
}

.main-content {
    flex-grow: 1;
    padding: 20px;
}

.header {
    margin-bottom: 20px;
    font-size: 14px;
    color: #666;
}

.form-section h2 {
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input,
.form-group select {
    width: 70%;
    padding: 8px;
    box-sizing: border-box;
    border-color:rgb(217, 223, 232);
    border-width:1px;
}

.contact-form {
    margin-top: 30px;
}

.contact-form h3 {
    margin-bottom: 20px;
}

button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}
.information-rooms{
    display:none;
}
.btn-sidebar{
    width: 100%;

}
td,th{
    border: 1px;
    border-style: solid;
    font-size: 13px;
    padding: 10;
    text-align: center;
}







</style>