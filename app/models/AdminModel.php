<?php

class AdminModel
    {
        private $db; // Khai báo biến $db
        public function __construct()
        {
            // Kết nối đến cơ sở dữ liệu
            $this->db = new mysqli('localhost', 'root', '', 'traver');
                    
            // Kiểm tra kết nối
            if ($this->db->connect_error) {
                die("Kết nối đến cơ sở dữ liệu thất bại: " . $this->db->connect_error);
            }
        }

        
        public function getAllAdmin()
        {
            // Truy vấn để lấy tất cả người dùng
            $sql = "SELECT * FROM admin";
            $result = $this->db->query($sql);
            
            // Chuyển đổi kết quả thành mảng kết hợp
            $admin = [];
            while ($row = $result->fetch_assoc()) {
                $admin[] = $row;
            }
            return $admin;
        }
    }

?>