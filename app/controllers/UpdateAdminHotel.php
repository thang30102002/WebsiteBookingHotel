<?php
    class UpdateAdminHotel extends Controller {
       
            
        public function index() {
            $this->model_user = $this->model('AdminHotel');
            $this->UpdateAdminHotel= new AdminHotel;
            $this-> DeltailUser= new AdminHotel;
            
            
            $this->UpdateAdminHotel->UpdateAdminHotel($_POST['admin_hotel_id'], $_POST['email'], $_POST['number_phone'], $_POST['password'], $_POST['surname'],$_POST['name']);
                header("Location: home");
                session_destroy();
                exit(); // Đảm bảo không có mã HTML hoặc mã PHP tiếp sau header
            
            }

            
        
        
        
    }

  
?>




