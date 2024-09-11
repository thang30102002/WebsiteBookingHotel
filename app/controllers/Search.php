<?php
    class Search extends Controller {
        public $data=[];
        public $model_search;
        public $model_hotel;
        public $model_price_min;
        public $model_price_max;
        public $model_all_city;
        public $model_all_city_from_to;

        public function __construct() {
            $this->model_search = $this->model('HotelModel');
            $this->model_hotel = $this->model('HotelModel');
            $this->model_price_min = $this->model('HotelModel');
            $this->model_price_max = $this->model('HotelModel');
            $this->model_all_city = $this->model('HotelModel');
            $this->model_all_city_from_to = $this->model('HotelModel');
        }

        public function index() {
            $this->AllHotel= new HotelsModel;
            $data['city']=$this->AllHotel->getAllHotelsAddress($_GET["address"]);
            $this->Hotel= new HotelsModel;
            $data['name_hotel']=$this->Hotel->getHotel($_GET["address"]);

            $this->AllCity=new HotelsModel;
            $city=$this->AllCity->getAllCity();
           
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
            
            
            
            $this->render('layouts/search',$data);
        }

        
        

       
    }


?>




