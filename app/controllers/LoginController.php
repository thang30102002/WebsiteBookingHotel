<?php
// start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



class LoginController extends Controller{
    public $userModel;
    public function __construct(){
        require_once _DIR_ROOT.'/app/models/UserModel.php';
        $this->userModel= new UserModel();
    }
    public function login() {
        $users=$this->userModel->getAllUser();
        $quantity=$this->userModel->getQuantityUser();
        if(isset($_POST['login'])) {
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
                        $name=$users[$i]['user_name'];
                        $id=$users[$i]['user_id'];
                        $email=$users[$i]['email'];
                        $number_phone=$users[$i]['number_phone'];
                        $password_user=$users[$i]['password'];
                        $avarta=$users[$i]['avarta'];
                    }
                }
                if ($check==1) {
                    // Đăng nhập thành công, tạo session và chuyển hướng đến trang chính
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['name'] = $name;
                    $_SESSION['id'] = $id;
                    $_SESSION['email'] = $email;
                    $_SESSION['password_user']=$password_user;
                    $_SESSION['number_phone'] = $number_phone;
                    $_SESSION['avarta'] = $avarta;
                    
                    $url = $_SERVER['REQUEST_URI'];
                    
                    $urlArr = array_filter(explode('/',$url));
                    $urlArr = array_values($urlArr);
                    
                    if (!empty(ucfirst($urlArr[2]))) {
                        $a = ucfirst($urlArr[2]);
                        header("Location: $a");
                        exit; // Đảm bảo dừng việc thực thi script sau khi chuyển hướng
                    } else {
                        header("Location: index.php");
                        exit; // Đảm bảo dừng việc thực thi script sau khi chuyển hướng
                    }
                    
                    
                    
                } else {
                    
                    // Đăng nhập thất bại, hiển thị thông báo lỗi0*
                    include('app/views/element/login.php');
                    include('app/views/element/notification/error-login.php');
                    
                
                    

                }
            }
        }
        

        // Hiển thị form đăng nhập
        include('app/views/element/login.php');
    }

}

// Tạo một instance của LoginController và gọi phương thức login()
$loginController = new LoginController();
$loginController->login();
?>
