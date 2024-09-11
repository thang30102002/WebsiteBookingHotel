<?php
    class UpdateUser extends Controller {
       
            
        public function index() {
            $this->model_user = $this->model('UserModel');
            $this->UpdateUser= new UserModel;
            $this-> DeltailUser= new UserModel;
            $data_detail_user=$this->DeltailUser->getUserDetail($_POST['id']);
            
            if($_FILES["fileToUpload"]["name"]=="")
            {
                $this->UpdateUser->UpdateUserNoAvarta($_POST['id'],$_POST['email'],$_POST['password'],$_POST['name'],$_POST['phone']);
                header("Location: home");
                session_destroy();
                exit(); // Đảm bảo không có mã HTML hoặc mã PHP tiếp sau header
            }
            else{
                //Xoá file ảnh lưu trong foder
                
                $file_path = 'public/assets/clients/images/avarta/'.$data_detail_user['avarta'];

                // Kiểm tra xem file tồn tại hay không trước khi xoá
                if (file_exists($file_path)) {
                    // Thực hiện xoá file
                    if (unlink($file_path)) {
                        echo 'Đã xoá file thành công.';
                    } else {
                        echo 'Xảy ra lỗi khi xoá file.';
                    }
                } else {
                    echo 'File không tồn tại.';
                }
                

                //
                $this->UpdateUser->UpdateUser($_POST['id'],$_POST['email'],$_POST['password'],$_POST['name'],$_POST['phone'],$_FILES["fileToUpload"]["name"]);
                $targetDirectory = "public/assets/clients/images/avarta/"; // Thư mục lưu trữ tệp tin tải lên
                $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]); // Đường dẫn đầy đủ của tệp tin trên máy chủ

                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
                    echo "Tệp tin ". basename($_FILES["fileToUpload"]["name"]). " đã được tải lên thành công.";
                    header("Location: home");
                    session_destroy();
                    exit(); // Đảm bảo không có mã HTML hoặc mã PHP tiếp sau header

                } else {
                    echo "Có lỗi khi tải lên tệp tin.";
                }
            }

            
        }
        
        
    }

  
?>




