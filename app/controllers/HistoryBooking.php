<?php
    class HistoryBooking extends Controller {
        public $data=[];
        public $model_booking;
        public $model_room;

        public function __construct() {
            $this->model_booking = $this->model('BookingModel');  
            $this->model_room = $this->model('RoomModel');  
        }
        public function index() {
            $this->AllBooking= new BookingModel;
            
            $data['Bookings']=$this->AllBooking->getBookingIdUser($_SESSION['id']);
            //$data['Hotel']=$this->DetalHotel->getDetailHotelForIdRoom($_SESSION['id']);
            $this->render('layouts/booking_history_view',$data);    
        }
        
        
    }
?>




