<?php
// Mảng chứa danh sách các thành phố
$cities = [
    "Hà Nội",
    "Hồ Chí Minh",
    "Đà Nẵng",
    "Huế",
    "Hải Phòng",
    "Cần Thơ",
    "Nha Trang",
    "Vũng Tàu",
    "Đà Lạt",
    "Phan Thiết"
    // Thêm các thành phố khác vào đây
];

// Xử lý yêu cầu từ phía người dùng
if (isset($_GET['q'])) {
    $query = $_GET['q'];
    $matchedCities = [];

    // Tìm kiếm các thành phố có tên gần giống với từ khóa
    foreach ($cities as $city) {
        // Sử dụng hàm strpos để tìm kiếm
        if (strpos(strtolower($city), strtolower($query)) !== false) {
            $matchedCities[] = $city;
        }
    }

    // Trả về kết quả dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($matchedCities);
    exit; // Kết thúc kịch bản sau khi trả về JSON
}
?>
