<?php
    class Home extends Controller {
        public $data=[];
        public $model_home;
        public $model_booking;

        public function __construct() {
            $this->model_home = $this->model('HotelModel');
            $this->model_booking = $this->model('BookingModel');
        }

        public function index() {
            $this->AllCity= new HotelsModel;
            $data['city']=$this->AllCity->getAllCity();

            $this->AllNameHotel= new HotelsModel;
            $data['name_hotel']=$this->AllNameHotel->getAllNameHotels();
            $this->render('home/index',$data);
            
            
        }
        public function pageThankyou(){
            $this->render('layouts/page_thank');
            if(isset($_POST['payment'])) {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $room_id = $_POST['room_id'];
                    $check_in = $_POST['check_in'];
                    $check_out = $_POST['check_out'];
                    $total_price=$_POST['total_price'];
                    $note= $_POST['note'];
                    $user_name= $_POST['user_name'];
                    $email= $_POST['email'];
                    $number_phone= $_POST['number_phone_user'];
                    $status= $_POST['status'];
                    $id_user= $_POST['id_user'];   
                    $this->addbooking= new BookingModel();
                    $Add=$this->addbooking->AddBooking($room_id,$check_in,$check_out,$total_price,$note,$user_name,$email,$number_phone,$status,$id_user);
                }
            }
        }

        
    }


?>