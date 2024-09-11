<?php
// start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



class LoginAdminHotel {
    public $adminhotel;
    public function __construct(){
        require_once _DIR_ROOT.'/app/models/AdminHotel.php';
        $this->adminhotel= new AdminHotel();
    }
    public function index() {
        $users=$this->adminhotel->getAllAdminHotel();
        $quantity=$this->adminhotel->getQuantityAdminHotel();
        if(isset($_POST['login-admin-hotel'])) {
            // Kiểm tra nếu người dùng đã gửi form đăng nhập
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $check=0;
                // Kiểm tra thông tin đăng nhập
                $username = $_POST['username'];
                $password = $_POST['password'];

                // Thực hiện kiểm tra thông tin đăng nhập (có thể dùng Model để kiểm tra)
                for($i=0; $i<$quantity;$i++){
                    if($username === $users[$i]['email'] && $password === $users[$i]['password'])
                    {
                        $check=1;
                        $email=$users[$i]['email'];
                        $id=$users[$i]['admin_hotel_id'];
                        $numberphone=$users[$i]['number_phone'];
                        $password=$users[$i]['password'];
                        $surname=$users[$i]['surname'];
                        $name=$users[$i]['name'];
                    }
                }
                if ($check==1) {
                    // Đăng nhập thành công, tạo session và chuyển hướng đến trang chính
                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $email;
                    $_SESSION['admin_hotel_id'] = $id;
                    $_SESSION['number_phone'] = $numberphone;
                    $_SESSION['password'] = $password;
                    $_SESSION['surname']=$surname;
                    $_SESSION['name'] = $name;

                    header("Location: AdminHotelController");
                    
                    exit();
                } else {                  
                    echo "<p id='error-check' style='  display:none  ;text-align: center;color: red;padding: 10;'>Tài khoản hoặc mật khẩu không đúng, xin vui lòng nhập lại!</p>";
                }
            }
        }
        

        // Hiển thị form đăng nhập
        include('app/views/element/form-login-admin-hotel.php');
    }

}

// Tạo một instance của LoginController và gọi phương thức login()

?>
