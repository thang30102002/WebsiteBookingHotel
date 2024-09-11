<?php




class UserModel
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

	
	public function getAllUser()
	{
		// Truy vấn để lấy tất cả người dùng
        $sql = "SELECT * FROM users";
        $result = $this->db->query($sql);
        
        // Chuyển đổi kết quả thành mảng kết hợp
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return $users;
	}
	public function getQuantityUser(){
		// Truy vấn để lấy tất cả người dùng
        $sql = "SELECT * FROM users";
        $result = $this->db->query($sql);
		$quantity=0;
		while ($row = $result->fetch_assoc()) {
            $quantity=$quantity+1;
        }
        return $quantity;
	}
	//kiểm tra email đã được sử dụng chưa
	public function CheckEmail($email_check) {		
		$check = true;
	
		// Truy vấn để lấy tất cả các email từ bảng users
		$sql = "SELECT email FROM users";
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
	
	//thêm khách hàng
	public function AddUser($email, $password, $name, $phone) {	
			// Nếu $check = true, tức là email chưa tồn tại
	
			// Chuẩn bị câu lệnh SQL để chèn dữ liệu vào bảng users
			$sql = "INSERT INTO users (user_name, password, number_phone, email) VALUES (?, ?, ?, ?)";
			$stmt = $this->db->prepare($sql);
	
			// Kiểm tra xem prepare có thành công không
			if ($stmt) {
				// Bắt đầu gán giá trị cho các tham số
				$stmt->bind_param("ssss", $name, $password, $phone, $email);
	
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
	

	public function getUserDetail($userId)
	{
		// Truy vấn để lấy tất cả khách sạn trong thành phố được chỉ định
        $sql = "SELECT * FROM users WHERE user_id = ?";

        // Sử dụng truy vấn chuẩn bị trước
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $userId);
        $stmt->execute();

        // Chuyển đổi kết quả thành mảng kết hợp
        $user = [];
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $user[] = $row;
        }

        return $user;
	}
	public function __destruct() {
        // Đóng kết nối trong hàm destructor
        $this->db->close();
    }
	public function UpdateUser($user_id, $email, $password, $name, $phone,$avarta) {
		// Câu lệnh SQL UPDATE sử dụng dấu = trong điều kiện WHERE
		$sql = "UPDATE users
				SET email = ?, password = ?, user_name = ?, number_phone = ?, avarta=?
				WHERE user_id = ?";
		
		// Chuẩn bị câu lệnh SQL
		$stmt = $this->db->prepare($sql);
		
		// Kiểm tra xem prepare có thành công không
		if ($stmt) {
			// Bắt đầu gán giá trị cho các tham số
			$stmt->bind_param("sssssi", $email, $password, $name, $phone,$avarta, $user_id);
			
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
	public function UpdateUserNoAvarta($user_id, $email, $password, $name, $phone) {
		// Câu lệnh SQL UPDATE sử dụng dấu = trong điều kiện WHERE
		$sql = "UPDATE users
				SET email = ?, password = ?, user_name = ?, number_phone = ?
				WHERE user_id = ?";
		
		// Chuẩn bị câu lệnh SQL
		$stmt = $this->db->prepare($sql);
		
		// Kiểm tra xem prepare có thành công không
		if ($stmt) {
			// Bắt đầu gán giá trị cho các tham số
			$stmt->bind_param("ssssi", $email, $password, $name, $phone, $user_id);
			
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
	public function getTokenUser($email) {
		// Truy vấn để lấy token từ người dùng có email nhất định
		$sql = "SELECT token FROM users WHERE email=?";
		$stmt = $this->db->prepare($sql);
	
		// Kiểm tra xem prepare có thành công không
		if ($stmt) {
			// Bắt đầu gán giá trị cho các tham số
			$stmt->bind_param("s", $email);
	
			// Thực thi câu lệnh
			$stmt->execute();
	
			// Lấy kết quả của truy vấn
			$result = $stmt->get_result();
	
			// Kiểm tra xem có kết quả trả về hay không
			if ($result->num_rows > 0) {
				// Lấy dòng đầu tiên từ kết quả trả về
				$row = $result->fetch_assoc();
				$token = $row['token']; // Lấy giá trị token từ dòng đầu tiên
			} else {
				$token = null; // Nếu không tìm thấy email, trả về null
			}
	
			// Đóng kết nối
			$stmt->close();
		} else {
			// Xử lý lỗi khi prepare thất bại
			$token = null;
		}
	
		return $token;
	}
	public function editClient($user_id,$user_name,$password,$number_phone,$email){
		$sql = "UPDATE users
        SET user_name = ?, password = ?, number_phone=?, email=?
        WHERE user_id=?;
        ";
        $stmt = $this->db->prepare($sql);

        // Kiểm tra xem prepare có thành công không
        if ($stmt) {
            // Bắt đầu gán giá trị cho các tham số
            $stmt->bind_param("ssssi", $user_name,$password,$number_phone,$email,$user_id);

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
	//Xoá bản ghi user
    public function deleteUser($user_id){
		$sql = "DELETE FROM users
        WHERE user_id = ?;";
        $stmt = $this->db->prepare($sql);

        // Kiểm tra xem prepare có thành công không
        if ($stmt) {
            // Bắt đầu gán giá trị cho các tham số
            $stmt->bind_param("i", $user_id);

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