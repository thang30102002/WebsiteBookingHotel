<?php
    class Home extends Controller {
        public $data=[];
        public $model_home;
        public $model_booking;
        public $model_detairoom;
        public $model_review;
        public $model_user;
        public $model_addreview;
        public function __construct() {
            $this->model_home = $this->model('HotelModel');
            $this->model_booking = $this->model('BookingModel');
            $this->model_detairoom = $this->model('RoomModel');
            $this->model_review = $this->model('ReviewModel');
            $this->model_review = $this->model('UserModel');
        }

        public function index() {
            $this->AllCity= new HotelsModel;
            $data['city']=$this->AllCity->getAllCity();

            $this->AllNameHotel= new HotelsModel;
            $data['name_hotel']=$this->AllNameHotel->getAllNameHotels();
            $this->render('home/index',$data);
            
            
        }
        public function search(){
            $this->AllHotel= new HotelsModel;
            $data['city']=$this->AllHotel->getAllHotelsAddress($_GET["address"]);
            $this->Hotel= new HotelsModel;
            $data['name_hotel']=$this->Hotel->getHotel($_GET["address"]);

            $this->AllCity=new HotelsModel;
            $city=$this->AllCity->getAllCity();
           
            if(count($data['city'])+count($data['name_hotel'])>0)
            {
                for($i=0;$i<count($city);$i++)
                {
                    if($_GET['address']==$city[$i]['city'])
                    {
                        $this->PriceMin= new HotelsModel;
                        $data['price_min']=$this->PriceMin->getPriceMin($_GET["address"]);

                        $this->PriceMax= new HotelsModel;
                        $data['price_max']=$this->PriceMax->getPriceMax($_GET["address"]);
                    }
                }
                if(isset($_GET['from'])&&$_GET['from']!="")
                {
                    $this->AllHotel= new HotelsModel;
                    $data['city']=$this->AllHotel->getPriceFromTo($_GET["address"],$_GET['from'],$_GET['to']);
                }
            }
            
            
            
            $this->render('layouts/search',$data);
        }
        public function detailHotel(){
            $this->AllHotel= new HotelsModel;
            $data['hotel']=$this->AllHotel->getHotelDetail($_GET["id"]);

            $this->AllRoom= new RoomModel;
            $data['room']=$this->AllRoom->getAllRoomsHotel($_GET["id"]);
            $data['NumberRoom']=$this->AllRoom->getQuantityRoom($_GET["id"]);
            
            
            $this->AllReview= new ReviewModel;
            $data['review']=$this->AllReview->getAllReview($_GET["id"]);
            $data['NumberReview']=$this->AllReview->getQuantityReview($_GET["id"]);

            $this->User= new UserModel;
            $data['user']=$this->User->getUserDetail($_GET["id"]);

            $this->AllUtilities= new HotelsModel;
            $data['utilities']=$this->AllUtilities->getHotelUtilities($_GET["id"]);
            $this->render('layouts/detail_hotel',$data);
        }
        public function booking(){
            $this->AllRoom= new RoomModel;
            $data['rooms']=$this->AllRoom->getRoomDetail($_GET["id_room"]);
            $this->render('layouts/booking_view',$data); 
        }
        public function payment()
        {
            $this->AllRoom= new RoomModel;
            $data['rooms']=$this->AllRoom->getRoomDetail($_GET["id_room"]);
            $this->render('layouts/payment_view',$data); 
        }
        public function historyBooking(){
            $this->AllBooking= new BookingModel;
            
            $data['Bookings']=$this->AllBooking->getBookingIdUser($_SESSION['id']);
            //$data['Hotel']=$this->DetalHotel->getDetailHotelForIdRoom($_SESSION['id']);
            $this->render('layouts/booking_history_view',$data);    
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