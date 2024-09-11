<?php




class BookingModel
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

	
	public function getAllBooking()
	{
		// Truy vấn để lấy tất cả người dùng
        $sql = "SELECT * FROM booking";
        $result = $this->db->query($sql);
        
        // Chuyển đổi kết quả thành mảng kết hợp
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return $users;
	}
	
	//thêm booking
	public function AddBooking($room_id,$check_in,$check_out,$total_price,$note,$user_name,$email,$number_phone,$status,$id_user){
		$sql="INSERT INTO booking (room_id, check_in_date, check_out_date,total_price,note,user_name,email,number_phone_user,status,user_id)
		VALUES (?,?,?,?,?,?,?,?,?,?)";
		$stmt = $this->db->prepare($sql);

		// Kiểm tra xem prepare có thành công không
		if ($stmt) {
			// Bắt đầu gán giá trị cho các tham số
			$stmt->bind_param("ississssii", $room_id,$check_in,$check_out,$total_price,$note,$user_name,$email,$number_phone,$status,$id_user);

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
	//lấy danh sách booking theo userID
	public function getBookingIdUser($user_id){
		// Truy vấn để lấy tất cả khách sạn trong thành phố được chỉ định
        $sql = "SELECT * FROM `booking` WHERE user_id =?";

        // Sử dụng truy vấn chuẩn bị trước
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();

        // Chuyển đổi kết quả thành mảng kết hợp
        $result = $stmt->get_result();
        // Chuyển đổi kết quả thành mảng kết hợp
        $Bookings = [];
        while ($row = $result->fetch_assoc()) {
            $Bookings[] = $row;
        }
        return $Bookings;
	}

	public function getBookingDetail($BookingId)
	{
		// Truy vấn để lấy tất cả khách sạn trong thành phố được chỉ định
        $sql = "SELECT * FROM `booking` WHERE booking_id =?";

        // Sử dụng truy vấn chuẩn bị trước
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $BookingId);
        $stmt->execute();

        // Chuyển đổi kết quả thành mảng kết hợp
        $result = $stmt->get_result();
        // Chuyển đổi kết quả thành mảng kết hợp
        $Bookings = [];
        while ($row = $result->fetch_assoc()) {
            $Bookings[] = $row;
        }
        return $Bookings;
	}
	public function __destruct() {
        // Đóng kết nối trong hàm destructor
        $this->db->close();
    }
	//lấy danh sách booking theo hotel
	public function getBookingIdHotel($hotel_id){
		// Truy vấn để lấy tất cả khách sạn trong thành phố được chỉ định
        $sql = "SELECT b.*
		FROM booking b
		INNER JOIN rooms r ON b.room_id = r.room_id
		WHERE r.hotel_id = ?;";

        // Sử dụng truy vấn chuẩn bị trước
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $hotel_id);
        $stmt->execute();

        // Chuyển đổi kết quả thành mảng kết hợp
        $result = $stmt->get_result();
        // Chuyển đổi kết quả thành mảng kết hợp
        $Bookings = [];
        while ($row = $result->fetch_assoc()) {
            $Bookings[] = $row;
        }
        return $Bookings;
	}

	//lấy danh sách tổng đơn đặt phòng của khách sạn
	public function getTotalPriceIdHotel($hotel_id) {
		// Câu lệnh SQL với hàm SUM() để tính tổng giá trị
		$sql = "SELECT SUM(b.total_price) as total_price
				FROM booking b
				JOIN rooms r ON b.room_id = r.room_id
				WHERE r.hotel_id = ?";
	
		// Sử dụng truy vấn chuẩn bị trước
		$stmt = $this->db->prepare($sql);
		$stmt->bind_param('i', $hotel_id);
		$stmt->execute();
	
		// Lấy kết quả
		$result = $stmt->get_result();
		
		// Lấy giá trị tổng giá từ kết quả
		$row = $result->fetch_assoc();
		$TotalPrice = $row['total_price'];
		
		// Nếu không có booking nào, SUM() có thể trả về NULL, thay đổi thành 0 nếu cần
		$TotalPrice = $TotalPrice ?? 0;
		
		return $TotalPrice;
	}
	//trả về doanh thu của room theo room_name
	public function getRevenueRoom($room_name){
		// Truy vấn để lấy tổng doanh thu cho phòng được chỉ định
		$sql = "SELECT b.total_price
				FROM booking b
				JOIN rooms r ON b.room_id = r.room_id
				WHERE r.room_name = ?;";
	
		// Sử dụng truy vấn chuẩn bị trước
		$stmt = $this->db->prepare($sql);
		$stmt->bind_param('s', $room_name);
		$stmt->execute();
	
		// Lấy kết quả
		$result = $stmt->get_result();
		
		// Khởi tạo biến doanh thu
		$Revenue = 0;
	
		// Cộng dồn doanh thu từ các hàng kết quả
		while ($row = $result->fetch_assoc()) {
			$Revenue += $row['total_price'];  // Lấy giá trị cột 'amount'
		}
	
		// Đóng kết nối
		$stmt->close();
	
		return $Revenue;
	}
	public function DeleteBooking($booking_id){
		$sql="DELETE FROM booking
		WHERE booking_id=?;
		";
		$stmt = $this->db->prepare($sql);

		// Kiểm tra xem prepare có thành công không
		if ($stmt) {
			// Bắt đầu gán giá trị cho các tham số
			$stmt->bind_param("i", $booking_id);

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
	//lấy danh sách booking theo id_hotel
	public function getAllBookingForIdHotel($hotel_id) {
		// Câu lệnh SQL với hàm SUM() để tính tổng giá trị
		$sql = "SELECT b.*
		FROM booking b
		JOIN rooms r ON b.room_id = r.room_id
		JOIN hotel h ON r.hotel_id = h.hotel_id
		WHERE h.hotel_id = ?;";
	
		// Sử dụng truy vấn chuẩn bị trước
		$stmt = $this->db->prepare($sql);
		$stmt->bind_param('i', $hotel_id);
		$stmt->execute();
	
		// Lấy kết quả
		$result = $stmt->get_result();
		
		$Bookings = [];
        while ($row = $result->fetch_assoc()) {
            $Bookings[] = $row;
        }
        return $Bookings;
	}

	//lấy danh sách người đặt phòng của khách sạn theo hotel_id
	public function getAllCustomersForIdHotel($hotel_id) {
		// Câu lệnh SQL với hàm SUM() để tính tổng giá trị
		$sql = "SELECT DISTINCT  b.user_name,email,number_phone_user
		FROM booking b
		JOIN rooms r ON b.room_id = r.room_id
		JOIN hotel h ON r.hotel_id = h.hotel_id
		WHERE h.hotel_id = ?
        ;";
	
		// Sử dụng truy vấn chuẩn bị trước
		$stmt = $this->db->prepare($sql);
		$stmt->bind_param('i', $hotel_id);
		$stmt->execute();
	
		// Lấy kết quả
		$result = $stmt->get_result();
		
		$Customes = [];
        while ($row = $result->fetch_assoc()) {
            $Customes[] = $row;
        }
        return $Customes;
	}

	//thay đổi thông tin booking
    public function editBooking($booking_id,$user_name,$number_phone_user,$email,$note,$status){
		$sql = "UPDATE booking
        SET  user_name = ?, number_phone_user=?, email=?,note=?,status=?
        WHERE booking_id=?;
        ";
        $stmt = $this->db->prepare($sql);

        // Kiểm tra xem prepare có thành công không
        if ($stmt) {
            // Bắt đầu gán giá trị cho các tham số
            $stmt->bind_param("ssssii", $user_name,$number_phone_user,$email,$note,$status,$booking_id);

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