<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    class Email{
        public function sendEmail($emailFrom){
            
            
            require 'PHPMailer/src/Exception.php';
            require 'PHPMailer/src/PHPMailer.php';
            require 'PHPMailer/src/SMTP.php';

            // Khởi tạo đối tượng PHPMailer
            $mail = new PHPMailer(true);

            try {
                $token=rand(100000,999999);
                // Cấu hình để sử dụng SMTP
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Thiết lập SMTP server của bạn
                $mail->SMTPAuth = true;
                $mail->Username = 'thangnguyen30102002@gmail.com'; // Địa chỉ email để đăng nhập SMTP
                $mail->Password = 'wcicsjfcjuwicbnl'; // Mật khẩu email để đăng nhập SMTP
                $mail->SMTPSecure = 'ssl'; // Phương thức bảo mật, có thể là 'ssl' hoặc 'tls'
                $mail->Port = 465; // Cổng SMTP, thường là 587 hoặc 465

                // Thiết lập thông tin người gửi và địa chỉ email của bạn
                $mail->setFrom($emailFrom, 'Your Name');
                $mail->addAddress($emailFrom, 'Recipient Name');

                // Đường dẫn tới tệp mẫu email (nếu có)
                //$mail->addAttachment('/path/to/file.pdf');

                // Thiết lập nội dung email
                $mail->isHTML(true); // Thiết lập email dưới dạng HTML
                $mail->Subject = 'Xác nhận tài khoản HotelHive'; // Chủ đề của email
                $mail->Body = 'Mã xác nhận email của bạn là '.$token; // Nội dung email

                // Gửi email
                $mail->send();
                

            } catch (Exception $e) {
                // echo "Gửi email không thành công. Lỗi: {$mail->ErrorInfo}";
            }
            return $token;
        }
    }
?>
