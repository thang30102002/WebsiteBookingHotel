<?php
    class Controller{

        //function model lấy dữ liệu từ models
        public function model($model){
            if (file_exists(_DIR_ROOT.'/app/models/'.$model.'.php')){
                require_once _DIR_ROOT.'/app/models/'.$model.'.php';
                if(class_exists($model)){
                    $model= new $model();
                    return $model;
                }
            }
            return false;
        }

        //function render lấy giao diện từ views
        public function render($view,$data=[] ){
            extract($data);
            if (file_exists(_DIR_ROOT.'/app/views/'.$view.'.php')){
                require_once _DIR_ROOT.'/app/views/'.$view.'.php';
            }
        }
          
        public function deleteFolder($folder) {
            // Kiểm tra nếu là một thư mục
            if (is_dir($folder)) {
                // Mở thư mục
                $objects = scandir($folder);
                foreach ($objects as $object) {
                    if ($object != "." && $object != "..") {
                        $path = $folder . DIRECTORY_SEPARATOR . $object;
                        // Nếu là thư mục, gọi đệ quy để xóa
                        if (is_dir($path)) {
                            deleteFolder($path);
                        } else {
                            // Nếu là file, xóa file
                            unlink($path);
                        }
                    }
                }
                // Xóa thư mục sau khi đã xóa hết nội dung
                rmdir($folder);
                echo "Thư mục đã được xóa.";
            } else {
                echo "Thư mục không tồn tại hoặc không phải là một thư mục.";
            }
        }
        public function addFolder($folderPath){
            // Kiểm tra xem thư mục đã tồn tại chưa
            if (!file_exists($folderPath)) {
                // Tạo thư mục mới với quyền 0777 (đọc, ghi, thực thi cho tất cả)
                if (mkdir($folderPath, 0777, true)) {
                    echo "Thư mục đã được tạo thành công!";
                } else {
                    echo "Đã xảy ra lỗi khi tạo thư mục.";
                }
            } else {
                echo "Thư mục đã tồn tại.";
            }
        }
        //lấy các file ảnh trong fodel
        public function getImgFolder($folder){
            

            $img = [];
            $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

            if (is_dir($folder)) {
                $files = scandir($folder);
                foreach ($files as $file) {
                    $file_path = $folder . DIRECTORY_SEPARATOR . $file;
                    // Kiểm tra nếu là file và có phần mở rộng là ảnh
                    if (is_file($file_path)) {
                        $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);
                        if (in_array(strtolower($file_extension), $allowed_extensions)) {
                            $img[] = $file; // Thêm file vào mảng
                        }
                    }
                }
            }
            return $img;

        }
        //lấy các folder con trong folder mẹ
        public function getFolder($folder){
            $parent_folder = $folder;
            $subfolders = [];

            if (is_dir($parent_folder)) {
                $items = scandir($parent_folder);
                foreach ($items as $item) {
                    // Bỏ qua các thư mục đặc biệt "." và ".."
                    if ($item != '.' && $item != '..') {
                        $item_path = $parent_folder . DIRECTORY_SEPARATOR . $item;
                        if (is_dir($item_path)) {
                            $subfolders[] = $item;
                        }
                    }
                }
            }
            return $subfolders;
        }
        //xoá file trong folder
        public function deleteImg($file_path)
        {
            

            if (file_exists($file_path)) {
                if (unlink($file_path)) {
                   // echo "File đã được xóa thành công.";
                   $this->success("Xoá ảnh thành công.");
                } else {
                    //echo "Không thể xóa file.";
                    $this->error("Xoá ảnh không thành công.");
                }
            } else {
                //echo "File không tồn tại.";
            }

        }
        //thêm ảnh vào folder
        public function addImgFolder($target_dir,$name_img)
        {
            // Đường dẫn thư mục để lưu ảnh
            
            
            // Tạo tên file đầy đủ cho file ảnh
            $target_file = $target_dir . basename($name_img);
            $uploadOk = 1;

            // Kiểm tra nếu thư mục chưa tồn tại, tạo mới
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            // Lấy phần mở rộng của file để kiểm tra loại file
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Kiểm tra nếu file ảnh thực sự là ảnh hay không
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if ($check !== false) {
                    //echo "File là một ảnh - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    //echo "File không phải là ảnh.";
                    $uploadOk = 0;
                }
            }

            // Kiểm tra nếu file đã tồn tại
            if (file_exists($target_file)) {
                //echo "Xin lỗi, file đã tồn tại.";
                $this->error("File ảnh đã tồn tại.");
                $uploadOk = 0;
            }

            // Giới hạn kích thước file (ví dụ: 5MB)
            if ($_FILES["image"]["size"] > 5000000) {
                $this->error("File ảnh quá lớn.");
                $uploadOk = 0;
            }

            // Chỉ cho phép các loại file ảnh cụ thể
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                //echo "Chỉ cho phép tải lên các file JPG, JPEG, PNG & GIF.";
                $this->error("Chỉ cho phép tải lên các file JPG, JPEG, PNG & GIF.");
                $uploadOk = 0;
            }

            // Kiểm tra nếu `$uploadOk` bằng 0 thì không tải file lên
            if ($uploadOk == 0) {
                //echo "Xin lỗi, file của bạn không được tải lên.";
                $this->error("Xin lỗi, file của bạn không được tải lên.");
            // Nếu mọi thứ đều đúng, cố gắng tải file lên
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    //echo "File " . htmlspecialchars(basename($name_img)) . " đã được tải lên.";
                    $this->success("Ảnh được tải lên thành công.");
                } else {
                    $this->error("Đã xảy ra lỗi khi tải file ảnh.");
                }
            }
        }
        //thông báo lỗi
        public function success($success)
        {
            echo "<!DOCTYPE html>
            <html lang='en'>
            <head>
              <title>Ví dụ Bootstrap - Quantrimang.com</title>
              <meta charset='utf-8'>
              <meta name='viewport' content='width=device-width, initial-scale=1'>
              <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
              <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'></script>
            </head>
            <body>
            
            <div class='container mt-3' style='    position: fixed;
                z-index: 999999999;
                width: 30%;
                right: 0;
                top:0;
                animation: showHideAlert 4s ease forwards;'>
               <div class='alert alert-success alert-dismissible fade show'>
                 <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                <strong>".$success." </strong>
              </div> 
            </div>
            <style>
                @keyframes showHideAlert {
                0% {
                    opacity: 0;
                }
                10% {
                    opacity: 1;
                }
                90% {
                    opacity: 1;
                }
                100% {
                    opacity: 0;
                }
            }
            </style>
            </body>
            </html>";
        }
        //thông báo thành công
        public function error($error)
        {
            echo "<!DOCTYPE html>
            <html lang='en'>
            <head>
              <title>Ví dụ Bootstrap - Quantrimang.com</title>
              <meta charset='utf-8'>
              <meta name='viewport' content='width=device-width, initial-scale=1'>
              <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
              <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'></script>
            </head>
            <body>
            
            <div class='container mt-3' style='    position: fixed;
                z-index: 999999999;
                width: 30%;
                right: 0;
                top:0;
                animation: showHideAlert 4s ease forwards;'>
               <div class='alert alert-danger alert-dismissible fade show'>
                 <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                <strong>".$error."</strong> 
              </div> 
            </div>
            <style>
                @keyframes showHideAlert {
                0% {
                    opacity: 0;
                }
                10% {
                    opacity: 1;
                }
                90% {
                    opacity: 1;
                }
                100% {
                    opacity: 0;
                }
            }
            </style>
            </body>
            </html>";
        }
    }
?>
