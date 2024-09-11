<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo tài khoản Tera mới - HotelHive</title>
    <link rel="stylesheet" href="public/assets/clients/css/form-login-admin-hotel.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1 class="logo">HotelHive <span class="tera">TERA</span></h1>
            <h2>Thông tin các loại phòng của khách sạn</h2>
            <p>Hãy niêm yết chỗ nghỉ của bạn trên HotelHive và để chúng tôi giúp bạn kết nối với hàng triệu du khách!</p>
            <form method="post" action="" enctype="multipart/form-data">
                <?php
                    for($i=1; $i<=$_GET['number_rooms']; $i++) {
                        echo "
                        <h3>Phòng $i</h3>
                        <label for='name_room".$i."'>Tên loại phòng</label>
                        <input required type='text' name='name_room".$i."' id='name_room".$i."' placeholder='Nhập tên loại phòng'>
                        
                        <label for='number_client".$i."'>Số lượng người ở</label>
                        <input required type='number' name='number_client".$i."' id='number_client".$i."' placeholder='Nhập số người có thể ở'>
        
                        <label for='room_width".$i."'>Diện tích (m2)</label>
                        <input min='10.0' max='100.0' step='0.1' value='10.0' required type='number' name='room_width".$i."' id='room_width".$i."' placeholder='Diện tích phòng?'>
                        
                        <label for='type_bed".$i."'>Loại giường</label>
                        <input required type='text' name='type_bed".$i."' id='type_bed".$i."' placeholder='Loại giường được sử dụng trong phòng'>
        
                        <label for='information".$i."'>Giới thiệu</label>
                        <input required type='text' name='information".$i."' id='information".$i."' placeholder='Giới thiệu đôi nét về loại phòng'>
        
                        <label for='thue_dich_vu".$i."'>Thuế và phí dịch vụ</label>
                        <input min='10000' max='1000000000' step='1' value='10000' required type='number' name='thue_dich_vu".$i."' id='thue_dich_vu".$i."' placeholder='Tiền thuế và phí dịch vụ'>
        
                        <label for='price_night".$i."'>Giá phòng</label>
                        <input min='10000' max='1000000000' step='1' value='10000' required type='number' name='price_night".$i."' id='price_night".$i."' placeholder='Giá phòng 1 đêm'>
        
                        <label for='number_rooms".$i."'>Số lượng</label>
                        <input min='1' step='1' value='1' required type='number' name='number_rooms".$i."' id='number_rooms".$i."' placeholder=''>
                        
                        <label for='number_day_cancel".$i."'>Số ngày có thể huỷ trước khi check in</label>
                        <input min='0' step='1' value='0' required type='number' name='number_day_cancel".$i."' id='number_day_cancel".$i."' placeholder=''>
                        
                        <div class='input-img'>
                            <label for='img".$i."'>Ảnh về khách sạn</label>
                            <input type='file' name='images".$i."[]' multiple/>
                            
                        </div>
                        ";
                    }
                ?>
                
                <button name="add_rooms" onclick="return validateFormLogin()" type="submit">Kế tiếp</button>
            </form>
            
        </div>
    </div>
    
    
</body>
</html>
<style>
    /* styles.css */
p {
    color: rgb(104, 113, 118);
}
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #005eb8;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: white;
}

.container {
    width: 50%;
    text-align: center;
}

.form-container {
    background-color: white;
    color: black;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    overflow-y: scroll;
    border: 1px solid #ccc;
    height: 800px;
    padding: 20px;
}

.logo {
    font-size: 24px;
    margin-bottom: 10px;
}

.tera {
    color: #005eb8;
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
    text-align: left;
    width: 100%;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    width: 100%;
    background-color: #ff6b00;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #e65c00;
}

.input-img {
    width: 100%;
}

.image-preview {
    position: relative;
    display: inline-block;
    margin: 5px;
}

.image-preview img {
    width: 100px;
    height: 100px;
    margin: 5px;
    object-fit: cover;
    border-radius: 5px;
}

.remove-btn {
    position: absolute;
    top: 0;
    
    background: none;
    color: black;
    font-size: 20px;
    padding: 0;
    cursor: pointer;
    
    right: 10px;
    width: 10%;
}
.remove-btn:hover{
    background: none;
}

</style>