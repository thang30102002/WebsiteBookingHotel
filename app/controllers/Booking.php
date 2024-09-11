<?php
    class Booking extends Controller {
        public $data=[];
        public $model_detailroom;

        public function __construct() {
            $this->model_detailroom = $this->model('RoomModel');  
        }
        
        public function index() {
            $this->AllRoom= new RoomModel;
            $data['rooms']=$this->AllRoom->getRoomDetail($_GET["id_room"]);
            $this->render('layouts/booking_view',$data); 
        }
    }
?>




