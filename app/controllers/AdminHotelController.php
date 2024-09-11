<?php
class AdminHotelController extends Controller {
    public $data = [];
    public $token = 999;
    public $model_hotel;
    public $model_room;
    public $model_booking;
    public $model_admin_hotel;
    public $model_review_hotel;
    public $model_utiliti;

    public function __construct() {
        $this->model_hotel = $this->model('HotelModel');  
        $this->model_room = $this->model('RoomModel');
        $this->model_admin_hotel = $this->model('AdminHotel'); 
        $this->model_review_hotel = $this->model('ReviewModel'); 
        $this->model_booking = $this->model('BookingModel'); 
        
        $this->model_utiliti = $this->model('UtilitiesHotelModel'); 
    }

    public function index() {
        
        if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] === true) {
            print_r($_SESSION['admin_hotel_id']);
            $this->DetailHotel = new HotelsModel;
            $this->Reviews = new ReviewModel;
            $this->Booking = new BookingModel;
            $this->Room = new RoomModel;
            
            $data['hotel'] = $this->DetailHotel->getHotelForAdminHotel($_SESSION['admin_hotel_id']);
            $data['review'] = $this->Reviews->getAllReview($data['hotel'][0]['hotel_id']);
            $data['total_price'] = $this->Booking->getTotalPriceIdHotel($_SESSION['admin_hotel_id']);
            $data['room'] = $this->Room->getRoomsForAdmin_hotel_id($_SESSION['admin_hotel_id']);
            
            if (isset($_POST['payment'])) {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $room_id = $_POST['room_id'];
                    $check_in = $_POST['check_in'];
                    $check_out = $_POST['check_out'];
                    $total_price = $_POST['total_price'];
                    $note = $_POST['note'];
                    $user_name = $_POST['user_name'];
                    $email = $_POST['email'];
                    $number_phone = $_POST['number_phone_user'];
                    $status = $_POST['status'];
                    $id_user = $_POST['id_user'];
                    
                    $this->addbooking = new BookingModel();
                    $Add = $this->addbooking->AddBooking($room_id, $check_in, $check_out, $total_price, $note, $user_name, $email, $number_phone, $status, $id_user);
                }
            }
            
            $this->render('admin_hotel/layout_admin_hotel', $data);
        } else {
            header("Location: login");
            exit();
        }
    }
    public function bookings() {
        if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] === true) {
            $this->Booking = new BookingModel;
            $this->Hotel = new HotelsModel;
            $data['hotel'] = $this->Hotel->getHotelForAdminHotel($_SESSION['admin_hotel_id']);
            $data['bookings'] = $this->Booking->getAllBookingForIdHotel($data['hotel'][0]['hotel_id']);
            $this->render('admin_hotel/bookings', $data);
        }
        else {
            header("Location: login");
            exit();
        }
    }
    public function customer() {
        if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] === true) {
            $this->customers = new BookingModel;
            $this->Hotel = new HotelsModel;
            $data['hotel'] = $this->Hotel->getHotelForAdminHotel($_SESSION['admin_hotel_id']);
            $data['bookings'] = $this->customers->getAllCustomersForIdHotel($data['hotel'][0]['hotel_id']);
            $this->render('admin_hotel/customer', $data);
        }
        else {
            header("Location: login");
            exit();
        }
    }
    public function listRooms() {
        if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] === true) {
            if (isset($_POST['delete_room'])) {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $this->Hotel = new HotelsModel;
                    $data['hotel'] = $this->Hotel->getHotelForAdminHotel($_SESSION['admin_hotel_id']);
                    $this->deleteRoom = new RoomModel;
                    $delete = $this->deleteRoom->deleteRoom($_POST['id_room_delete']);
                    $folderPath = "hotel/".$data['hotel'][0]['hotel_id']."/".$_POST['name_room_delete']."";
                    $this->deleteFolder($folderPath);
                    $this->success("Xoá loại phòng thành công.");
                }}
            $this->Room = new RoomModel;
            $this->Hotel = new HotelsModel;
            $data['hotel'] = $this->Hotel->getHotelForAdminHotel($_SESSION['admin_hotel_id']);
            $data['room'] = $this->Room->getAllRoomsHotel($data['hotel'][0]['hotel_id']);
            $this->render('admin_hotel/listRooms', $data);
        }
        else {
            header("Location: login");
            exit();
        }
    }

    public function editRoom() {
        if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] === true) {
           
            if (isset($_POST['edit_room'])) {
                
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    $this->editRoom = new RoomModel;
                    $editroom= $this->editRoom->editRoom($_GET['room_id'],$_POST['room_name'],$_POST['information'],$_POST['quantity_client'],$_POST['price_night'],$_POST['room_width'],$_POST['type_bed'],$_POST['taxe'],$_POST['number_room'],$_POST['number_day_cancel']);
                    $this->success("Chỉnh sửa thành công.");
                }
            }
            $this->Room = new RoomModel;
            $data['room'] = $this->Room->getRoomDetail($_GET['room_id']);
            $this->Hotel = new HotelsModel;
            $data['hotel'] = $this->Hotel->getHotelForAdminHotel($_SESSION['admin_hotel_id']);
            $this->render('admin_hotel/editRoom', $data);
        }
        else {
            header("Location: login");
            exit();
        }
    }
    public function addRoom() {
        if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] === true) {
           
            if (isset($_POST['add_room'])) {
                
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $this->Hotel = new HotelsModel;
                    $data['hotel'] = $this->Hotel->getHotelForAdminHotel($_SESSION['admin_hotel_id']);
                    $this->addRoom = new RoomModel;
                    $addroom= $this->addRoom->addRoom($data['hotel'][0]['hotel_id'],$_POST['room_name'],$_POST['information'],$_POST['quantity_client'],$_POST['price_night'],$_POST['room_width'],$_POST['type_bed'],$_POST['taxe'],$_POST['number_room'],$_POST['number_day_cancel']);
                    
                    //tạo thư mục mới
                    // Đường dẫn của thư mục muốn tạo
                    $folderPath = "hotel/".$data['hotel'][0]['hotel_id']."/".$_POST['room_name']."";
                    $this->addFolder($folderPath);
                    $this->success("Thêm loại phòng thành công.");
                    $_POST = array();
                    
                }
            }
            $this->Hotel = new HotelsModel;
            $data['hotel'] = $this->Hotel->getHotelForAdminHotel($_SESSION['admin_hotel_id']);
            $this->render('admin_hotel/add_room',$data);
        }
        else {
            header("Location: login");
            exit();
        }
    }

    public function imgRoom() {
        if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] === true) {
            if (isset($_POST['clear-img-room'])) {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    $this->deleteImg($_POST['img-delete']);
                }}
            if (isset($_POST['up-img'])) {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    $this->addImgFolder($_POST['img-up'],$_FILES["image"]["name"]);

                }}
            $this->Hotel = new HotelsModel;
            $data['hotel'] = $this->Hotel->getHotelForAdminHotel($_SESSION['admin_hotel_id']);
            $this->Room = new RoomModel;
            
            $data['room'] = $this->Room->getAllRoomsHotel($data['hotel'][0]['hotel_id']);
                       
            $this->render('admin_hotel/imgRoom', $data);
        }
        else {
            header("Location: login");
            exit();
        }
    }

    public function myProfile() {
        if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] === true) {
           
            if (isset($_POST['edit_my_profile'])) {
                
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    $this->editProfile = new AdminHotel;
                    $editprofile= $this->editProfile->UpdateAdminHotel($_SESSION['admin_hotel_id'], $_POST['email'], $_POST['number-phone'], $_POST['password'], $_POST['surname'],$_POST['name']);
                    $this->success("Chỉnh sửa thành công.");
                    $_SESSION['surname']=$_POST['surname'];
                    $_SESSION['email']=$_POST['email'];
                    $_SESSION['number_phone']=$_POST['number-phone'];
                    $_SESSION['password']=$_POST['password'];
                    $_SESSION['name']=$_POST['name'];
                }
            }
            $this->Hotel = new HotelsModel;
            $data['hotel'] = $this->Hotel->getHotelForAdminHotel($_SESSION['admin_hotel_id']);
            $data['email']=$_SESSION['email'];
            $data['number_phone']=$_SESSION['number_phone'];
            $data['password']=$_SESSION['password'];
            $data['surname']=$_SESSION['surname'];
            $data['name']=$_SESSION['name'];
            
            $this->render('admin_hotel/myProfile', $data);
        }
        else {
            header("Location: login");
            exit();
        }
    }

    public function hotelInformation() {
        if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] === true) {
           
            if (isset($_POST['edit_hotel'])) {
                
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $this->Hotel = new HotelsModel;
                    $data['hotel'] = $this->Hotel->getHotelForAdminHotel($_SESSION['admin_hotel_id']);
                    $this->editHotel = new HotelsModel;
                    $edithotel= $this->editHotel->UpdateHotel($_POST['hotel_name'],$_POST['number_phone_hotel'],$_POST['city'],$_POST['address'],$_POST['number_star'],$_POST['price_min'],$_POST['default_price'],$_POST['information_hotel'],$data['hotel'][0]['hotel_id']);
                    $this->success("Chỉnh sửa thông tin khách sạn thành công.");
                }
            }
            $this->Hotel = new HotelsModel;
            $data['hotel'] = $this->Hotel->getHotelForAdminHotel($_SESSION['admin_hotel_id']);
            $this->render('admin_hotel/hotelInformation', $data);
        }
        else {
            header("Location: login");
            exit();
        }
    }

    public function login() {
        if (isset($_SESSION['success_register'])) {
            $this->render('element/notification/register-success');
            unset($_SESSION['success_register']);
        }

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $this->adminhotel = new AdminHotel;
        $users = $this->adminhotel->getAllAdminHotel();
        $quantity = $this->adminhotel->getQuantityAdminHotel();
        
        if (isset($_POST['login-admin-hotel'])) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $check = 0;
                $username = $_POST['username'];
                $password = $_POST['password'];

                for ($i = 0; $i < $quantity; $i++) {
                    if ($username === $users[$i]['email'] && $password === $users[$i]['password']) {
                        $check = 1;
                        $email = $users[$i]['email'];
                        $id = $users[$i]['admin_hotel_id'];
                        $numberphone = $users[$i]['number_phone'];
                        $password = $users[$i]['password'];
                        $surname = $users[$i]['surname'];
                        $name = $users[$i]['name'];
                    }
                }

                if ($check == 1) {
                    
                    $_SESSION['loginadmin'] = true;
                    $_SESSION['email'] = $email;
                    $_SESSION['admin_hotel_id'] = $id;
                    $_SESSION['number_phone'] = $numberphone;
                    $_SESSION['password'] = $password;
                    $_SESSION['surname'] = $surname;
                    $_SESSION['name'] = $name;
                    $this->Hotel = new HotelsModel;
                    $_SESSION['id_hotel']= $this->Hotel->getHotelForAdminHotel($id);
                    
                    header("Location: index");
                    exit();
                } else {
                    include('app/views/element/notification/error-login.php');
                }
            }
        }
        
        include('app/views/element/form-login-admin-hotel.php');
    }

    public function register() {
        if (isset($_SESSION['error_register'])) {
            include('app/views/element/notification/error-register.php');
            unset($_SESSION['error_register']);
        }

        if (isset($_POST['register-admin-hotel'])) {
            $email = $_POST['email'];
            $numberphone = $_POST['number-phone'];
            $password = $_POST['password'];
            $surname = $_POST['surname'];
            $name = $_POST['name'];

            $this->checkadmin = new AdminHotel();
            $checkEmail = $this->checkadmin->CheckEmail($email);

            if ($checkEmail == true) {
                require_once 'core/checkMail/sendmail.php';
                $email_model = new Email();
                $sendEmail = $email_model->sendEmail($email);
                
                $this->token = $sendEmail;
                $this->data['email'] = $email;
                $this->data['token'] = $sendEmail;
                $this->render('element/form-check-email', $this->data);
                
                $_SESSION['email_register'] = $email;
                $_SESSION['numberphone_register'] = $numberphone;
                $_SESSION['password_register'] = $password;
                $_SESSION['surname_register'] = $surname;
                $_SESSION['name_register'] = $name;
                $_SESSION['token'] = $sendEmail;
            } else {
                $_SESSION['error_register'] = 'true';
                header("Location: register");
                exit();
            }
            
            $_POST = [];
        }

        if (isset($_POST['chech_email'])) {
            $token_input = $_POST['token-1'] . $_POST['token-2'] . $_POST['token-3'] . $_POST['token-4'] . $_POST['token-5'] . $_POST['token-6'];

            if ($token_input == $_POST['token']) {
                $this->addadminhotel = new AdminHotel();
                
                if (isset($_SESSION['email_register'])) {
                    $Add = $this->addadminhotel->AddAdminHotel(
                        $_SESSION['email_register'], 
                        $_SESSION['numberphone_register'], 
                        $_SESSION['password_register'], 
                        $_SESSION['surname_register'], 
                        $_SESSION['name_register']
                    );

                    $_SESSION['success_register'] = 'true';
                    header("Location: addHotel");
                    exit();
                }
            } else {
                include('app/views/element/notification/error-check-email.php');
                $this->data['email'] = $_SESSION['email_register'];
                $this->data['token'] = $_SESSION['token'];
                $this->render('element/form-check-email', $this->data);
            }
            
            unset($_POST['chech_email']);
        }

        $this->render('element/form-register-admin-hotel');
    }

    public function addHotel() {
        $this->idAdminHotel = new AdminHotel();
        $id_hotel = $this->idAdminHotel->GetIdForEmail($_SESSION['email_register']);
        
        if (isset($_POST['add_hotel'])) {
            
            $hotel_name = $_POST['name_hotel'];
            $hotel_number_phone = $_POST['number-phone'];
            $city = $_POST['city'];
            $address = $_POST['address'];
            $number_star = $_POST['number_star'];
            $price_min = $_POST['price_min'];
            $default_price = $_POST['price_min'];
            $information = $_POST['information'];
            $admin_hotel_id = $id_hotel['admin_hotel_id'];
            $number_type_rooms = $_POST['number_type_room'];

            $this->addHotel = new HotelsModel();
            $AddHotel = $this->addHotel->AddHotel(
                $hotel_name, 
                $hotel_number_phone, 
                $city, 
                $address, 
                $number_star, 
                $price_min, 
                $default_price, 
                $information, 
                $admin_hotel_id, 
                $number_type_rooms
            );
            $hotel_id = $this->addHotel->getidHotel($admin_hotel_id);
            
            for($i=1;$i<=10;$i++)
            {
                if (isset($_POST[$i])) {
                    $this->addUtiliti = new UtilitiesHotelModel();
                    $AddUtiliti = $this->addUtiliti->AddUtiliti($hotel_id['hotel_id'],$i);
                }
            }

            $_SESSION['addHotel'] = 'true';
            //tạo thư mục mới
            // Đường dẫn của thư mục muốn tạo
            
            $hotel = $this->addHotel->getidHotel($admin_hotel_id);
            $folderPath = "hotel/".$hotel['hotel_id']."";
            $this->addFolder($folderPath);
            header("Location: login");
            exit();
        }
        $this->render('admin_hotel/form_add_hotel');
    }

    
    
    
}
?>
