<?php




class AdminHotel
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

	
	public function getAllAdminHotel()
	{
		// Truy vấn để lấy tất cả người dùng
        $sql = "SELECT * FROM admin_hotel";
        $result = $this->db->query($sql);
        
        // Chuyển đổi kết quả thành mảng kết hợp
        $admin_hotel = [];
        while ($row = $result->fetch_assoc()) {
            $admin_hotel[] = $row;
        }
        return $admin_hotel;
	}
	public function getQuantityAdminHotel(){
		// Truy vấn để lấy tất cả người dùng
        $sql = "SELECT * FROM admin_hotel";
        $result = $this->db->query($sql);
		$quantity=0;
		while ($row = $result->fetch_assoc()) {
            $quantity=$quantity+1;
        }
        return $quantity;
	}
	// //thêm khách hàng
	public function AddAdminHotel($email,$numberphone,$password,$surname,$name){
		$sql = "INSERT INTO admin_hotel (email, number_phone, password, surname,name) VALUES (?, ?, ?, ?,?)";
		$stmt = $this->db->prepare($sql);

		// Kiểm tra xem prepare có thành công không
		if ($stmt) {
			// Bắt đầu gán giá trị cho các tham số
			$stmt->bind_param("sssss", $email,$numberphone,$password,$surname,$name);

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

	public function UpdateAdminHotel($admin_hotel_id, $email, $number_phone, $password, $surname,$name) {
		// Câu lệnh SQL UPDATE sử dụng dấu = trong điều kiện WHERE
		$sql = "UPDATE admin_hotel
				SET email = ?, number_phone = ?, password = ?, surname = ?, name=?
				WHERE admin_hotel_id = ?";
		
		// Chuẩn bị câu lệnh SQL
		$stmt = $this->db->prepare($sql);
		
		// Kiểm tra xem prepare có thành công không
		if ($stmt) {
			// Bắt đầu gán giá trị cho các tham số
			$stmt->bind_param("sssssi", $email, $number_phone, $password, $surname, $name,$admin_hotel_id);
			
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
	//check email đã đăng ký chưa
	public function CheckEmail($email_check) {		
		$check = true;
	
		// Truy vấn để lấy tất cả các email từ bảng users
		$sql = "SELECT email FROM admin_hotel";
		$result = $this->db->query($sql);
	
		// Kiểm tra nếu có lỗi trong câu truy vấn
		if ($result === false) {
			// Xử lý lỗi nếu cần
			return false;
		}
	
		// Lấy danh sách các email từ kết quả truy vấn
		$emails = [];
		while ($row = $result->fetch_assoc()) {
			$emails[] = $row['email'];  // Lưu ý lấy từ khóa 'email' trong mảng $row
		}
	
		// Kiểm tra xem $email_check có trong mảng $emails không
		if (in_array($email_check, $emails)) {
			$check = false;  // Nếu tồn tại email trong mảng, $check = false
		}
	
		return $check;
	}
	//lấy id theo email
	public function GetIdForEmail($email){
		// Truy vấn để lấy tất cả người dùng
        
        $sql = "SELECT admin_hotel_id FROM `admin_hotel` WHERE email=?";

        // Sử dụng truy vấn chuẩn bị trước
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();

        // Chuyển đổi kết quả thành mảng kết hợp
        $result = $stmt->get_result();
        // Chuyển đổi kết quả thành mảng kết hợp
        
        
        $row = $result->fetch_assoc();
        
        return $row;
		

	}
	public function getAdminHotelDetail($adminHotel)
	{
		// Truy vấn để lấy tất cả khách sạn trong thành phố được chỉ định
        $sql = "SELECT * FROM admin_hotel WHERE admin_hotel_id = ?";

        // Sử dụng truy vấn chuẩn bị trước
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $adminHotel);
        $stmt->execute();

        // Chuyển đổi kết quả thành mảng kết hợp
        $adminHotel = [];
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $adminHotel[] = $row;
        }

        return $adminHotel;
	}
	//Xoá bản ghi adminHotel
    public function deleteAdminHotel($adminHotel_id){
		$sql = "DELETE FROM admin_hotel
        WHERE admin_hotel_id = ?;";
        $stmt = $this->db->prepare($sql);

        // Kiểm tra xem prepare có thành công không
        if ($stmt) {
            // Bắt đầu gán giá trị cho các tham số
            $stmt->bind_param("i", $adminHotel_id);

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