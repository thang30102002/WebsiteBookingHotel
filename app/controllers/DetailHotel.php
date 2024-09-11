<?php
    class DetailHotel extends Controller {
        public $data=[];
        
        public $model_detailhotel;
        public $model_detairoom;
        public $model_review;
        public $model_user;
        public $model_addreview;

        public function __construct() {
            $this->model_detailhotel = $this->model('HotelModel');
            $this->model_detairoom = $this->model('RoomModel');
            $this->model_review = $this->model('ReviewModel');
            $this->model_review = $this->model('UserModel');
            
        }

        public function index() {
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

        
        
        
        

       
    }

  
?>




