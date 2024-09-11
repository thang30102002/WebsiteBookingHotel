<?php
    class Payment extends Controller {
        public $data=[];
        public $model_detailroom;
        public $model_booking;

        public function __construct() {
            $this->model_detailroom = $this->model('RoomModel');  
            $this->model_booking = $this->model('BookingModel');  
        }
        
        public function index() {
            $this->AllRoom= new RoomModel;
            $data['rooms']=$this->AllRoom->getRoomDetail($_GET["id_room"]);
            $this->render('layouts/payment_view',$data); 
            
            
        }
    }
?>




