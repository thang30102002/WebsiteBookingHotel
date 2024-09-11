<?php




class UtilitiesHotelModel
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

	
	public function AddUtiliti($idHotel,$idUtiliti) {	
        
        $sql = "INSERT INTO hotel_utilities (hotel_id, utilities_id) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);

        // Kiểm tra xem prepare có thành công không
        if ($stmt) {
            // Bắt đầu gán giá trị cho các tham số
            $stmt->bind_param("ii", $idHotel, $idUtiliti);

            // Thực thi câu lệnh
            $stmt->execute();

            // Kiểm tra xem có bị lỗi không
            if ($stmt->errno) {
                // Xử lý lỗi ở đây (nếu cần)
            }

            // Đóng kết nối
            $stmt->close();
        } else {
            // Xử lý lỗi khi prepare thất bại
        }

    }
	
	

	
}

?>