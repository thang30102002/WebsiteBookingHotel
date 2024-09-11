<?php
class RegisterAdminHotel extends Controller {
    
    public function index() {
        // Kiểm tra xem request có phải là POST không
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ form
            $email = $_POST['email'];
            $numberphone = $_POST['number-phone'];
            $password = $_POST['password'];
            $surname = $_POST['surname'];
            $name = $_POST['name'];
            
            // Gọi model để thêm admin hotel
            $this->model_addadminhotel = $this->model('AdminHotel');
            $this->addadminhotel = new AdminHotel();
            $Add = $this->addadminhotel->AddAdminHotel($email, $numberphone, $password, $surname, $name);
            
            // Chuyển hướng sau khi thêm thành công
            header("Location: LoginAdminHotel");
            exit(); // Dừng kịch bản để đảm bảo không có mã nào khác được thực thi
        }
        
        // Nếu không phải là POST request, hiển thị form đăng ký
        $this->render('element/form-register-admin-hotel');
    }
}
?>
