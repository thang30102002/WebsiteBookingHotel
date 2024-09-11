
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo mới khách sạn</title>
    <link rel="stylesheet" href="public/assets/clients/css/form-login-admin-hotel.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1 class="logo">HotelHive <span class="tera">TERA</span></h1>
            <h2>Thông tin khách sạn của bạn</h2>
            <p>Hãy niêm yết chỗ nghỉ của bạn trên HotelHive và để chúng tôi giúp bạn kết nối với hàng triệu du khách!</p>
            <form method='post' action="">
                <label for="name_hotel">Tên khách sạn</label>
                <input required required type="text" name='name_hotel' id="name_hotel" placeholder="Nhập tên khách sạn của bạn">

                <label for="number-phone">Số điện thoại khách sạn</label>
                <input required required type="phone" name='number-phone' id="number-phone" placeholder="Nhập số điện thoại liên hệ của khách sạn">

                <label for="city">Thành phố</label>
                <input required required type="text" name='city' id="city" placeholder="Khách sạn ở thành phố nào?">
                <label for="address">Địa chỉ</label>
                <input required required type="text" name='address' id="address" placeholder="Địa chỉ khách sạn của bạn ở đâu?">
                
                <label for="number_star">Số sao</label>
                <input min="1" max="10" step="1" value="1" required required type="number" name='number_star' id="number_star" placeholder="Số sao của khách sạn">

                <label for="information">Giới thiệu</label>
                <input required required type="text" name='information' id="information" placeholder="Giới thiệu đôi nét về khách sạn">

                <label for="number_type_room">Khách sạn có bao nhiêu loại phòng</label>
                <input min="1" max="100" step="1" value="1" required required type="number" name='number_type_room' id="number_type_room" placeholder="Khách sạn của bạn có bao nhiêu loại phòng">

                <label for="price_min">Giá phòng 1 đêm thấp nhất</label>
                <input min="100000"  step="1" value="100000" required required type="number" name='price_min' id="price_min" placeholder="Phòng của khách sạn có giá thấp nhất">

                <div class='utilities'>
                    <label for="utilities">Dịch vụ</label>
                    <div class='check_utilities'>
                        <input type="checkbox" id="1" name="1" value="1">
                        <span for="1"> Wifi</span><br>
                    </div>
                    <div class='check_utilities'>
                        <input type="checkbox" id="2" name="2" value="2">
                        <span for="2"> Hồ bơi</span><br>
                    </div>
                    <div class='check_utilities'>
                    <input type="checkbox" id="3" name="3" value="3">
                    <span for="3"> Chỗ đậu xe</span><br>
                    </div>
                    <div class='check_utilities'>
                    <input type="checkbox" id="4" name="4" value="4">
                    <span for="4"> Nhà hàng</span><br>
                    </div>
                    <div class='check_utilities'>
                    <input type="checkbox" id="5" name="5" value="5">
                    <span for="5"> Lễ tân 24H</span><br>
                    </div>
                    <div class='check_utilities'>
                    <input type="checkbox" id="6" name="6" value="6">
                    <span for="6"> Thang máy</span><br>
                    </div>
                    <div class='check_utilities'>
                    <input type="checkbox" id="7" name="7" value="7">
                    <span for="7"> Lối dành cho xe lăn</span><br>
                    </div>
                    <div class='check_utilities'>
                    <input type="checkbox" id="8" name="8" value="8">
                    <span for="8"> Trung tâm thể dục</span><br>
                    </div>
                    <div class='check_utilities'>
                    <input type="checkbox" id="9" name="9" value="9">
                    <span for="9"> Phòng họp</span><br>
                    </div>
                    <div class='check_utilities'>
                    <input type="checkbox" id="10" name="10" value="10">
                    <span for="10"> Đưa đón sân bay</span><br>
                    </div>
                    
                    
                    <br>
                </div>              
                <button name="add_hotel" onclick="return validateFormLogin()" type="submit">Kế tiếp</button>
            </form>
            
        </div>
        
    </div>

</body>


<style>
    /* styles.css */
p{
    color:rgb(104, 113, 118);
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
    width: 30%;
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

footer {
    margin-top: 20px;
}

footer a {
    color: white;
    text-decoration: none;
}
.check_utilities{
    position: relative;
}
.utilities{
    position: relative;
    width: 100%;
    text-align: left;
}
.check_utilities span{
    position: absolute;
    top: 0;
}




</style>
