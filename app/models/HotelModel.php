<?php




class HotelsModel
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

	
	public function getAllHotelsAddress($city)
    {
        // Truy vấn để lấy tất cả khách sạn trong thành phố được chỉ định
        $sql = "SELECT * FROM hotel WHERE city = ? and status=1";

        // Sử dụng truy vấn chuẩn bị trước
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $city);
        $stmt->execute();

        // Chuyển đổi kết quả thành mảng kết hợp
        $hotels = [];
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $hotels[] = $row;
        }
        return $hotels;
    }

	public function getAllHotels()
    {
        // Truy vấn để lấy tất cả người dùng
        $sql = "SELECT * FROM hotel";
        $result = $this->db->query($sql);
        
        // Chuyển đổi kết quả thành mảng kết hợp
        $hotels = [];
        while ($row = $result->fetch_assoc()) {
            $hotels[] = $row;
        }
        return $hotels;
    }

    //Truy van thong tin khac san tuong ung voi ten
    public function getHotel($hotelName)
    {
        // Truy vấn để lấy tất cả khách sạn trong thành phố được chỉ định
        $sql = "SELECT * FROM hotel WHERE hotel_name = ?";

        // Sử dụng truy vấn chuẩn bị trước
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $hotelName);
        $stmt->execute();

        // Chuyển đổi kết quả thành mảng kết hợp
        $hotels = [];
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $hotels[] = $row;
        }
        return $hotels;
    }

    //Truy van ten tat ca khach san
    public function getAllNameHotels()
    {
        // Truy vấn để lấy tất cả người dùng
        $sql = "SELECT hotel_name FROM hotel";
        $result = $this->db->query($sql);
        
        // Chuyển đổi kết quả thành mảng kết hợp
        $hotels = [];
        while ($row = $result->fetch_assoc()) {
            $hotels[] = $row;
        }
        return $hotels;
    }
    
    //TRuy van tat ca thanh phố
    public function getAllCity()
    {
        $sql = "SELECT DISTINCT  city FROM hotel";
        $result = $this->db->query($sql);
        
        // Chuyển đổi kết quả thành mảng kết hợp
        $citys = [];
        while ($row = $result->fetch_assoc()) {
            $citys[] = $row;
        }
        return $citys;
    }


	public function getQuantityHotel(){
		// Truy vấn để lấy tất cả người dùng
        $sql = "SELECT * FROM hotel";
        $result = $this->db->query($sql);
		$quantity=0;
		while ($row = $result->fetch_assoc()) {
            $quantity=$quantity+1;
        }
        return $quantity;
	}
	

	public function getHotelDetail($hotelID)
	{
		// Truy vấn để lấy tất cả khách sạn trong thành phố được chỉ định
        $sql = "SELECT * FROM hotel WHERE hotel_id = ?";

        // Sử dụng truy vấn chuẩn bị trước
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $hotelID);
        $stmt->execute();

        // Chuyển đổi kết quả thành mảng kết hợp
        $hotel = [];
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $hotel[] = $row;
        }

        return $hotel;
	}
	public function __destruct() {
        // Đóng kết nối trong hàm destructor
        $this->db->close();
    }

    //Trả về giá nhỏ nhất trong tất cả các khách sạn trong thành phố
    
    public function getPriceMin($city)
    {
        // Truy vấn để lấy tất cả khách sạn trong thành phố được chỉ định
        $sql = "SELECT price_min FROM hotel WHERE city = ? and status=1";

        // Sử dụng truy vấn chuẩn bị trước
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $city);
        $stmt->execute();

        // Chuyển đổi kết quả thành mảng kết hợp
        $prices = [];
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $prices[] = $row;
        }
        
        
        $price_min=$prices[0];
        for($i=1;$i<count($prices);$i++)
        {
            if($prices[$i]<$price_min)
            {
                $price_min=$prices[$i];
            }
        }
        return $price_min;
    }
        //Trả về giá lớn nhất trong tất cả các khách sạn trong thành phố
        public function getPriceMax($city)
        {
            // Truy vấn để lấy tất cả khách sạn trong thành phố được chỉ định
            $sql = "SELECT price_min FROM hotel WHERE city = ? and status=1";

            // Sử dụng truy vấn chuẩn bị trước
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('s', $city);
            $stmt->execute();

            // Chuyển đổi kết quả thành mảng kết hợp
            $prices = [];
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $prices[] = $row;
            }
            
            
            $price_max=$prices[0];
            for($i=1;$i<count($prices);$i++)
            {
                if($prices[$i]>$price_max)
                {
                    $price_max=$prices[$i];
                }
            }
            return $price_max;
            }

            //TRả về các khách sạn có giá trị trong đoạn
            public function getPriceFromTo($city, $minPrice, $maxPrice)
            {
                // Chuẩn bị câu truy vấn để lấy tất cả khách sạn trong thành phố được chỉ định và có giá trong khoảng từ minPrice đến maxPrice
                $sql = "SELECT * FROM hotel WHERE city = ? AND price_min >= ? AND price_min <= ?";
                
                // Sử dụng truy vấn chuẩn bị
                $stmt = $this->db->prepare($sql);
                $stmt->bind_param('sii', $city, $minPrice, $maxPrice);
                $stmt->execute();
                
                // Lấy kết quả
                $result = $stmt->get_result();
                
                // Chuyển đổi kết quả thành mảng kết hợp
                $hotels = [];
                while ($row = $result->fetch_assoc()) {
                    $hotels[] = $row;
                }
                
                // Trả về mảng các khách sạn tìm thấy
                return $hotels;
            }
            //TRả về danh sách các id tiện ích của 1 khách sạn
            public function getIdUtilities($hotel_id)
            {
                // Truy vấn để lấy tất cả khách sạn trong thành phố được chỉ định
                $sql = "SELECT utilities_id FROM hotel_utilities WHERE hotel_id =?";

                // Sử dụng truy vấn chuẩn bị trước
                $stmt = $this->db->prepare($sql);
                $stmt->bind_param('s', $hotel_id);
                $stmt->execute();

                $data1=[];
                // Chuyển đổi kết quả thành mảng kết hợp
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) {
                    $data1[] = $row;
                }
                return $data1;
                }

            //TRả về danh sách các id tiện ích của 1 khách sạn
            public function getHotelUtilities($hotel_id)
            {
                // Truy vấn để lấy tất cả khách sạn trong thành phố được chỉ định
                $sql = "SELECT u.name,u.icon
                FROM hotel_utilities hu
                JOIN utilities u ON hu.utilities_id = u.id
                WHERE hu.hotel_id = ?;";

                // Sử dụng truy vấn chuẩn bị trước
                $stmt = $this->db->prepare($sql);
                $stmt->bind_param('s', $hotel_id);
                $stmt->execute();

                $data1=[];
                // Chuyển đổi kết quả thành mảng kết hợp
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) {
                    $data1[] = $row;
                }
                return $data1;
            }

            //thêm khách sạn
            public function AddHotel($hotel_name,$hotel_number_phone,$city,$address,$number_star,$price_min,$default_price,$information,$admin_hotel_id){
                $sql = "INSERT INTO hotel (hotel_name,hotel_number_phone,city,address,number_star,price_min,default_price,information,admin_hotel_id) VALUES (?, ?, ?, ?,?, ?, ?, ?,?)";
                $stmt = $this->db->prepare($sql);

                // Kiểm tra xem prepare có thành công không
                if ($stmt) {
                    // Bắt đầu gán giá trị cho các tham số
                    $stmt->bind_param("ssssiiisi", $hotel_name,$hotel_number_phone,$city,$address,$number_star,$price_min,$default_price,$information,$admin_hotel_id);

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
            //trả về khách sạn tường ứng với admin_hotel_id
            public function getHotelForAdminHotel($admin_hotel_id)
            {
                // Truy vấn để lấy tất cả khách sạn trong thành phố được chỉ định
                $sql = "SELECT * FROM `hotel` WHERE admin_hotel_id=?";

                // Sử dụng truy vấn chuẩn bị trước
                $stmt = $this->db->prepare($sql);
                $stmt->bind_param('i', $admin_hotel_id);
                $stmt->execute();

                // Chuyển đổi kết quả thành mảng kết hợp
                $hotels = [];
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) {
                    $hotels[] = $row;
                }
                return $hotels;
            }
            //thay đổi thôgnn tin kháh sạn
            public function UpdateHotel($hotel_name,$hotel_number_phone,$city,$address,$number_star,$price_min,$default_price,$information,$hotel_id) {
                // Câu lệnh SQL UPDATE sử dụng dấu = trong điều kiện WHERE
                $sql = "UPDATE hotel
                        SET hotel_name = ?, hotel_number_phone = ?, city = ?, address = ?, number_star=?, price_min = ?, default_price = ?, information = ?
                        WHERE hotel_id = ?";
                
                // Chuẩn bị câu lệnh SQL
                $stmt = $this->db->prepare($sql);
                
                // Kiểm tra xem prepare có thành công không
                if ($stmt) {
                    // Bắt đầu gán giá trị cho các tham số
                    $stmt->bind_param("ssssiiisi", $hotel_name,$hotel_number_phone,$city,$address,$number_star,$price_min,$default_price,$information,$hotel_id);
                    
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

            //Truy van thong tin khac san tuong ung voi IdAdminHotel
            public function getidHotel($id_admin_hotel)
            {
                // Truy vấn để lấy tất cả khách sạn theo id của admin
                $sql = "SELECT hotel_id FROM hotel WHERE admin_hotel_id=?";

                // Sử dụng truy vấn chuẩn bị trước
                $stmt = $this->db->prepare($sql);
                if ($stmt === false) {
                    // Xử lý lỗi nếu không thể chuẩn bị truy vấn
                    throw new Exception('Could not prepare statement: ' . $this->db->error);
                }

                // Bind tham số với kiểu integer
                $stmt->bind_param('i', $id_admin_hotel);
                
                // Thực thi truy vấn
                $stmt->execute();

                // Lấy kết quả
                $result = $stmt->get_result();
                if ($result === false) {
                    // Xử lý lỗi nếu truy vấn không trả về kết quả
                    throw new Exception('Could not get result set: ' . $stmt->error);
                }

                // Chuyển đổi kết quả thành mảng kết hợp
                $row = $result->fetch_assoc();

                // Đóng statement
                $stmt->close();

                return $row;
            }
            //update status hotel
            public function UpdateStatusHotel($status,$hotel_id) {
                // Câu lệnh SQL UPDATE sử dụng dấu = trong điều kiện WHERE
                $sql = "UPDATE hotel
                        SET status=?
                        WHERE hotel_id = ?";
                
                // Chuẩn bị câu lệnh SQL
                $stmt = $this->db->prepare($sql);
                
                // Kiểm tra xem prepare có thành công không
                if ($stmt) {
                    // Bắt đầu gán giá trị cho các tham số
                    $stmt->bind_param("ii", $status,$hotel_id);
                    
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