<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
	<style>
		@import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
		@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
	</style>
	<link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
</head>
<body>
<?php 
            
         
?>
    <div class='background' id='background'></div>
	<div class='form-cancel-booking' id='form-cancel-booking'>
        <a class="out-form-cancel-booking" id="out-form-cancel-booking">X</a>
        <header style='padding:10;' class="site-header" id="header">
            <h1 style='font-size: 20px;' class="site-header__title" data-lead-id="site-header-title">Hủy đơn đặt phòng</h1>
        </header>

        <div class="main-content">
        <i class="fas fa-times"></i>
            <p class="main-content__body" data-lead-id="main-content-body">Bạn có chắc chắn muốn hủy đơn đặt phòng.</p>
        </div>

        <footer style='padding:10;' class="site-footer" id="footer">
            <form  method='post' action="HistoryBooking">
                <input type="hidden" name="id_booking" value="<?php echo $_POST['id_booking'];?>" /> 
                
                <button name='cancel-booking' class='btn-home'>Đồng ý hủy đơn</button>
            </form>
        </footer>
    </div>
    <?php
        if (isset($_POST['cancel-booking'])) {                     
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
                echo "huy thành công";
                $this->deleteBooking = new BookingModel();
                $this->deleteBooking->DeleteBooking($_POST['id_booking']);   
                if (isset($_POST['show-cancel-booking'])) {
                    unset($_POST['show-cancel-booking']);
                }   
            }
            else{
                
                echo "KO hủy dc phòng";
                if (isset($_POST['show-cancel-booking'])) {
                    unset($_POST['show-cancel-booking']);
                }
            }
        
            }
    ?>
    
    <script>
        document.getElementById('out-form-cancel-booking').addEventListener('click', function() {
            document.getElementById('form-cancel-booking').style.display = 'none';
            document.getElementById('background').style.display = 'none';
        
        });
    </script>
</body>
</html>
<style>
    .btn-home{
        background-color: #007bff;
        border: none;
        padding: 15px 35px;
        color: #fff;
        border-radius: 10px;
    }
    .form-cancel-booking{

    position: fixed;
    z-index: 99999999;
    background-color: #fff;
    /* margin: auto; */
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    }
    .h1{
        font-size: 20px;
    
    }
    i{
        font-size: 60px;
    color: red;
    }
    p{
        font-size: 17px;
    }
    .background{
        top: 0;
    bottom: 0;
    left: 0;
    background-color: rgb(39, 46, 52);
    opacity: 0.4;
    position: fixed;
    width: 100%;
    height: 100%;
    z-index: 9999;
    }
    .out-form-cancel-booking{
        position: absolute;
    right: 10;
    padding: 5;
    cursor: pointer;
    }
</style>