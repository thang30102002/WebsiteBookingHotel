<?php




class RoomModel
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

	//lấy toàn bộ phòng của 1 khách sạn
	public function getAllRoomsHotel($hotel_id)         
    {
        // Truy vấn để lấy tất cả khách sạn trong thành phố được chỉ định
        $sql = "SELECT * FROM rooms WHERE hotel_id = ?";

        // Sử dụng truy vấn chuẩn bị trước
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $hotel_id);
        $stmt->execute();

        // Chuyển đổi kết quả thành mảng kết hợp
        $rooms = [];
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $rooms[] = $row;
        }
        return $rooms;
    }
    //lấy toàn bộ phòng trong hệ thống
	public function getAllRooms()
    {
        // Truy vấn để lấy tất cả người dùng
        $sql = "SELECT * FROM rooms";
        $result = $this->db->query($sql);
        
        // Chuyển đổi kết quả thành mảng kết hợp
        $rooms = [];
        while ($row = $result->fetch_assoc()) {
            $rooms[] = $row;
        }
        return $rooms;
    }


	public function getQuantityRoom($hotel_id){
		// Truy vấn để lấy tất cả khách sạn trong thành phố được chỉ định
        $sql = "SELECT * FROM rooms WHERE hotel_id = ?";

        // Sử dụng truy vấn chuẩn bị trước
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $hotel_id);
        $stmt->execute();

        // Chuyển đổi kết quả thành mảng kết hợp
        $quantity=0;
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $quantity=$quantity+1;
        }
        return $quantity;
	}
	

	public function getRoomDetail($roomId)
	{
		// Truy vấn để lấy tất cả người dùng
        $sql = "SELECT * FROM rooms where room_id=?";
        // Sử dụng truy vấn chuẩn bị trước
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $roomId);
        $stmt->execute();

        // Chuyển đổi kết quả thành mảng kết hợp
        $room=[];
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $room=$row;
        }
        return $room;
	}
	public function __destruct() {
        // Đóng kết nối trong hàm destructor
        $this->db->close();
    }
    //lấy thông tin  khách sạn theo id_room
    public function getDetailHotelForIdRoom($Room_id){
		// Truy vấn để lấy tất cả khách sạn trong thành phố được chỉ định
        $sql = "SELECT  hotel.*
        FROM rooms
        JOIN hotel ON rooms.hotel_id = hotel.hotel_id
        WHERE rooms.room_id = ?";

        // Sử dụng truy vấn chuẩn bị trước
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $Room_id);
        $stmt->execute();

  
        // Chuyển đổi kết quả thành mảng kết hợp
        $hotels = [];
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $hotel[] = $row;
        }
        return $hotel;
	}
    //trả về số lượng phòng đã được đặt trong thời gian hiện tại
    public function getNumberRoomBookinged($Room_id){
		// Truy vấn để lấy tất cả khách sạn trong thành phố được chỉ định
        $sql = "SELECT * FROM booking WHERE check_out_date>CURDATE()  and room_id=?;";

        // Sử dụng truy vấn chuẩn bị trước
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $Room_id);
        $stmt->execute();

  
        // Chuyển đổi kết quả thành mảng kết hợp
        $number = 0;
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $number=$number+1;
        }
        return $number;
	}
    //trả về tất cả các phòng thuộc khách sạn theo admin_hotel_id
    public function getRoomsForAdmin_hotel_id($admin_hotel_id){
		// Truy vấn để lấy tất cả khách sạn trong thành phố được chỉ định
        $sql = "SELECT r.*
        FROM rooms r
        JOIN hotel h ON r.hotel_id = h.hotel_id
        WHERE h.admin_hotel_id = ?;";

        // Sử dụng truy vấn chuẩn bị trước
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $admin_hotel_id);
        $stmt->execute();

  
        // Chuyển đổi kết quả thành mảng kết hợp
        $rooms = [];
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $rooms[]=$row;
        }
        return $rooms;
	}
    //thêm phòng
    public function addRoom($hotel_id,$room_name,$information,$quantity_client,$price_night,$room_width,$type_bed,$taxes,$number_room,$number_day_cance){
		$sql = "INSERT INTO rooms (hotel_id,room_name,information,quantity_client,price_night,room_width,type_bed,taxes_and_fees,number_rooms,number_day_cancel) VALUES (?, ?, ?, ?,?, ?, ?, ?,?,?)";
        $stmt = $this->db->prepare($sql);

        // Kiểm tra xem prepare có thành công không
        if ($stmt) {
            // Bắt đầu gán giá trị cho các tham số
            $stmt->bind_param("issiiisiii", $hotel_id,$room_name,$information,$quantity_client,$price_night,$room_width,$type_bed,$taxes,$number_room,$number_day_cance);

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
    //thay đổi thông tin phòng
    public function editRoom($room_id,$room_name,$information,$quantity_client,$price_night,$room_width,$type_bed,$taxes,$number_room,$number_day_cance){
		$sql = "UPDATE rooms
        SET room_name = ?, information = ?, quantity_client=?, price_night=?,room_width=?,type_bed=?,taxes_and_fees=?,number_rooms=?,number_day_cancel=?
        WHERE room_id=?;
        ";
        $stmt = $this->db->prepare($sql);

        // Kiểm tra xem prepare có thành công không
        if ($stmt) {
            // Bắt đầu gán giá trị cho các tham số
            $stmt->bind_param("ssiiisiiii", $room_name,$information,$quantity_client,$price_night,$room_width,$type_bed,$taxes,$number_room,$number_day_cance,$room_id);

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
    //Xoá bản ghi room
    public function deleteRoom($room_id){
		$sql = "DELETE FROM rooms
        WHERE room_id = ?;";
        $stmt = $this->db->prepare($sql);

        // Kiểm tra xem prepare có thành công không
        if ($stmt) {
            // Bắt đầu gán giá trị cho các tham số
            $stmt->bind_param("i", $room_id);

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