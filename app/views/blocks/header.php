<?php
// Bắt đầu session ở đầu file


// Xử lý khi người dùng nhấn nút Đăng xuất
if (isset($_POST['logout'])) {
    session_unset();  // Hủy tất cả các biến session
    session_destroy(); // Hủy phiên

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
}
?>

<head>
    <link rel="stylesheet" href="public/assets/clients/css/style.css">
</head>
<body>
    <?php  include_once "app/controllers/LoginController.php";?>
    <?php  include_once "app/controllers/Register.php";?>

    <?php 
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
            $this->render('layouts/information_user');
        }
    ?>
  
    <nav class="menu-header navbar navbar-expand-lg navbar-light width-80 ">
    <div class="container-fluid ">
    
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse menu" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active logo-web" aria-current="page" href="http://localhost/WebsiteBookingHotel/">HotelHive</a>
            </li>
            
            <li class="nav-item">
            
            <a class="nav-link nav-item-hover" href="http://localhost/WebsiteBookingHotel/AdminHotelController/login">Hợp tác với chúng tôi</a>
            </li>
            
        </ul>
        <div class="right">
            <?php 
                // Kiểm tra nếu người dùng đã đăng nhập, hiển thị tên người dùng
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
                    echo "
                            <form style='margin-bottom:0;' method='get' action='http://localhost/WebsiteBookingHotel/Home/HistoryBooking?'>
                                <button type='submit' style='border:none;' class='username btn btn-outline-success'  id='show-form-info'>".$_SESSION['name']."</button>
                            </form>
                            <form method='post' action='' style='    margin: 0;'>
                                <button name='logout' id='logout' class='btn btn-outline-success' type='submit'>Đăng xuất</button>
                            </form>
                        ";
                } else {
                    echo "<button class='btn-login btn btn-outline-success' id='show-login-form' type='submit' >Đăng nhập</button>
                          <button class='btn btn-outline-success' id='show-register-form' type='submit'>Đăng ký</button>";
                }
            ?> 
        </div>
        </div>
    </div>
    </nav>

    <script>
        document.getElementById('show-login-form').addEventListener('click', function() {
            var loginForm = document.getElementById('login');
            if (loginForm) {
                loginForm.style.display = 'block';
            }
        });

        document.getElementById('show-register-form').addEventListener('click', function() {
            var registerForm = document.getElementById('register');
            if (registerForm) {
                registerForm.style.display = 'block';
            }
        });

        document.getElementById('show-form-info').addEventListener('click', function() {
            var userInfo = document.getElementById('informationUser');
            if (userInfo) {
                userInfo.style.display = 'block';
            }
        });
    </script>
</body>
