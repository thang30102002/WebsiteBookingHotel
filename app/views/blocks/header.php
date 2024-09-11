

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
            <a class="nav-link active logo-web" aria-current="page" href="index.php">HotelHive</a>
            </li>
            
            <li class="nav-item">
            
            <a class="nav-link nav-item-hover" href="AdminHotelController/login">Hợp tác với chúng tôi</a>
            </li>
            
        </ul>
        <div class="right">
            <?php 
                // Kiểm tra nếu người dùng đã đăng nhập, hiển thị tên người dùng
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
                    
                    echo "
                            <form style='margin-bottom:0;' method='get' action='HistoryBooking'><button type='submit' style='border:none;' class='username btn btn-outline-success'  id='show-form-info'>".$_SESSION['name']."</button></form>
                            <button class='btn btn-outline-success' onclick='logout()' type='submit'>Đăng xuất</button>
                        ";}
                    
                else {
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


        

        

        function logout() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Sau khi đăng xuất thành công, chuyển hướng đến trang đăng nhập
                    window.location.href = "index.php";
                }
            };
            xhttp.open("GET", "app/controllers/Logout.php", true);
            xhttp.send();
        }
       
    </script>
</body>
