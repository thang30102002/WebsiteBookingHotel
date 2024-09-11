<?php




class ReviewModel
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

	public function AllReview()
    {
        // Truy vấn để lấy tất cả người dùng
        $sql = "SELECT * FROM reviews";
        $result = $this->db->query($sql);
        
        // Chuyển đổi kết quả thành mảng kết hợp
        $reviews = [];
        while ($row = $result->fetch_assoc()) {
            $reviews[] = $row;
        }
        return $reviews;
    }
	public function getAllReview($hotel_id)
    {
       
        $sql = "SELECT *
        FROM reviews r
        JOIN users u ON r.user_id = u.user_id
        WHERE r.hotel_id = ?;";

        // Sử dụng truy vấn chuẩn bị trước
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $hotel_id);
        $stmt->execute();

        // Chuyển đổi kết quả thành mảng kết hợp
        $review = [];
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $review[] = $row;
        }
        return $review;
    }

	


	public function getQuantityReview($hotel_id){
		// Truy vấn để lấy tất cả khách sạn trong thành phố được chỉ định
        $sql = "SELECT * FROM reviews WHERE hotel_id = ?";

        // Sử dụng truy vấn chuẩn bị trước
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $hotel_id);
        $stmt->execute();

        // Chuyển đổi kết quả thành mảng kết hợp
        $quantity = 0;
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $quantity = $quantity+1;
        }
        return $quantity;
	}


    //thêm nhận xét của user
	public function AddReview($user_id,$hotel_id,$coment,$review_date){
		$sql = "INSERT INTO reviews (user_id, hotel_id, coment,review_date) VALUES (?, ?, ?,?)";
		$stmt = $this->db->prepare($sql);

		// Kiểm tra xem prepare có thành công không
		if ($stmt) {
			// Bắt đầu gán giá trị cho các tham số
			$stmt->bind_param("iiss", $user_id,$hotel_id,$coment,$review_date);

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