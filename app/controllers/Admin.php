<?php
    class Admin extends Controller {
        public $data = [];
        public $model_hotel;
        public $model_room;
        public $model_booking;
        public $model_admin_hotel;
        public $model_review_hotel;
        public $model_utiliti;
        public $model_admin;
        public $model_user;

        public function __construct() {
            $this->model_hotel = $this->model('HotelModel');  
            $this->model_room = $this->model('RoomModel');
            $this->model_admin_hotel = $this->model('AdminHotel'); 
            $this->model_review_hotel = $this->model('ReviewModel'); 
            $this->model_booking = $this->model('BookingModel'); 
            $this->model_utiliti = $this->model('UtilitiesHotelModel'); 
            $this->model_admin = $this->model('AdminModel');  
            $this->model_user = $this->model('UserModel');  
        }
        public function index() {
            if (isset($_SESSION['loginAdminSystem']) && $_SESSION['loginAdminSystem'] === true) {
                $this->Hotels = new HotelsModel;
                $this->Reviews = new ReviewModel;
                $this->Booking = new BookingModel;
                $this->Room = new RoomModel;
                $this->Users = new UserModel;
                
                
                $data['hotel'] = $this->Hotels->getAllHotels();
                $data['review'] = $this->Reviews->AllReview();
                $data['booking'] = $this->Booking->getAllBooking();
                $data['user'] = $this->Users->getAllUser();
                    
                
                
                $this->render('admin/index', $data);
            } else {
                header("Location: login");
                exit();
            }

        }
        public function login() {
            
    
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            
            $this->admin = new AdminModel;
            $admins = $this->admin->getAllAdmin();
            if (isset($_POST['login-admin'])) {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $check = 0;
                    $username = $_POST['username'];
                    $password = $_POST['password'];
    
                    for ($i = 0; $i < count($admins); $i++) {
                        if ($username === $admins[$i]['email'] && $password === $admins[$i]['password']) {
                            $check = 1;
                            $email = $admins[$i]['email'];
                            $id = $admins[$i]['admin_id'];
                            $numberphone = $admins[$i]['number_phone'];
                            $password = $admins[$i]['password'];
                            
                        }
                    }
    
                    if ($check == 1) {
                        
                        $_SESSION['loginAdminSystem'] = true;
                        $_SESSION['emailSystem'] = $email;
                        $_SESSION['admin_id'] = $id;
                        $_SESSION['numberPhoneSystem'] = $numberphone;
                        header("Location: index");
                        exit();
                    } else {
                        $this->error("Đăng nhập không thành công.");
                    }
                }
            }
            
            include('app/views/admin/login.php');
        }

        public function manageClient() {
            if (isset($_SESSION['loginAdminSystem']) && $_SESSION['loginAdminSystem'] === true) {
                $this->Hotels = new HotelsModel;
                $this->Reviews = new ReviewModel;
                $this->Booking = new BookingModel;
                $this->Room = new RoomModel;
                $this->Users = new UserModel;
                
                
                $data['hotel'] = $this->Hotels->getAllHotels();
                $data['review'] = $this->Reviews->AllReview();
                $data['booking'] = $this->Booking->getAllBooking();
                $data['user'] = $this->Users->getAllUser();
                if (isset($_POST['delete_user'])) {
                    $this->deleteUser = new UserModel;
                    
                    $DeleteUser=$this->deleteUser->deleteUser($_POST["id_user_delete"]);
                    $this->success("Xoá thông tin khách hàng thành công.");
                }
                $this->render('admin/manageClient', $data);
            }
            else {
                header("Location: login");
                $data['user'] = $this->Users->getAllUser();
                exit();
            }
        }

        public function editClient() {
            if (isset($_SESSION['loginAdminSystem']) && $_SESSION['loginAdminSystem'] === true) {
                if (isset($_POST['edit-client'])) {
                    $this->Users = new UserModel;
                    
                    $editClient=$this->Users->editClient($_GET['client_id'],$_POST["user_name"],$_POST["password"],$_POST["number_phone"],$_POST["email"]);
                    $this->success("Chỉnh sửa thành công.");
                }
                
                
                $this->Users = new UserModel;
                $this->Hotels = new HotelsModel;
                $data['hotel'] = $this->Hotels->getAllHotels();
                $data['user'] = $this->Users->getUserDetail($_GET['client_id']);
                $this->render('admin/editClient', $data);
            }
            else {
                header("Location: login");
                exit();
            }
        }
        public function managerAdminHotel() {
            if (isset($_SESSION['loginAdminSystem']) && $_SESSION['loginAdminSystem'] === true) {
                if (isset($_POST['delete_adminHotel'])) {
                    $this->adminHotel = new AdminHotel;
                    $deleteAdminHotel=$this->adminHotel->deleteAdminHotel($_POST["id_adminHotel_delete"]);
                    $this->success("Xoá tài khoản thành công.");
                }
                $this->AdminHotel = new AdminHotel;
                $this->Hotels = new HotelsModel;
                $data['hotel'] = $this->Hotels->getAllHotels();
                $data['adminHotel'] = $this->AdminHotel->getAllAdminHotel();
                $this->render('admin/manageAdminHotel', $data);
            }
            else {
                header("Location: login");
                exit();
            }
        }
        public function editAdminHotel() {
            if (isset($_SESSION['loginAdminSystem']) && $_SESSION['loginAdminSystem'] === true) {
                if (isset($_POST['edit-admin-hotel'])) {
                    $this->adminHotel = new AdminHotel;
                    
                    $editAdminHotel=$this->adminHotel->UpdateAdminHotel($_GET["adminHotel_id"], $_POST["email"], $_POST["number_phone"], $_POST["password"], $_POST["surname"],$_POST["name"]);
                    $this->success("Chỉnh sửa thành công.");
                }
                
                
                $this->adminHotel = new AdminHotel;
                $this->Hotels = new HotelsModel;
                $data['hotel'] = $this->Hotels->getAllHotels();
                $data['adminHotel'] = $this->adminHotel->getAdminHotelDetail($_GET['adminHotel_id']);
                $this->render('admin/editAdminHotel', $data);
            }
            else {
                header("Location: login");
                exit();
            }
        }
        public function bookings() {
            
            if (isset($_SESSION['loginAdminSystem']) && $_SESSION['loginAdminSystem'] === true) {
                if (isset($_POST['delete_booking'])) {
                    $this->deletebooking = new BookingModel;
                    $this->deletebooking->DeleteBooking($_POST["id_booking_delete"]);
                    $this->success("Xoá đơn đặt phòng thành công.");
                }
                $this->Booking = new BookingModel;
                $this->Hotels = new HotelsModel;
                $data['hotel'] = $this->Hotels->getAllHotels();
                $data['bookings'] = $this->Booking->getAllBooking();
                $this->render('admin/bookings', $data);
            }
            else {
                header("Location: login");
                exit();
            }
        }
        public function editBooking() {
            if (isset($_SESSION['loginAdminSystem']) && $_SESSION['loginAdminSystem'] === true) {
                if (isset($_POST['edit-booking'])) {
                    $this->editbooking = new BookingModel;                               
                    $editBooking=$this->editbooking->editBooking($_GET["booking_id"],$_POST["user_name"],$_POST["number_phone"],$_POST["email"],$_POST["note"],$_POST["status"]);
                    $this->success("Chỉnh sửa thành công.");
                }
                
                
                $this->booking = new BookingModel;
                $this->Hotels = new HotelsModel;
                $data['hotel'] = $this->Hotels->getAllHotels();
                $data['booking'] = $this->booking->getBookingDetail($_GET['booking_id']);
                $this->render('admin/editBooking', $data);
            }
            else {
                header("Location: login");
                exit();
            }
        }
        public function hotels(){
            if (isset($_SESSION['loginAdminSystem']) && $_SESSION['loginAdminSystem'] === true) {
                $this->Hotels = new HotelsModel;
                $data['hotel'] = $this->Hotels->getAllHotels();
                $this->render('admin/hotels', $data);
            }
            else {
                header("Location: login");
                exit();
            }
        }
        

    }
?>