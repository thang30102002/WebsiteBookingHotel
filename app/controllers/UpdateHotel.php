<?php
    class UpdateHotel extends Controller {
       
            
        public function index() {
            $this->model_hotel = $this->model('HotelModel');
            $this->UpdateHotel= new HotelsModel;
            
            
            
            $this->UpdateHotel->UpdateHotel($_POST['hotel_name'],$_POST['hotel_number_phone'],$_POST['city'],$_POST['address'],$_POST['number_star'],$_POST['price_min'],$_POST['default_price'],$_POST['information'],$_POST['number_type_rooms'],$_POST['hotel_id']);
                header("Location: home");
                session_destroy();
                exit(); // Đảm bảo không có mã HTML hoặc mã PHP tiếp sau header
            
            }

            
        
        
        
    }

  
?>




