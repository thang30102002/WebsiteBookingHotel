<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traveloka Katera Registration</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        
        <div class="main-content">
           
            

            <div class="form-section">
                <h2>Phòng</h2>
                <h3>Phòng 1</h3>
                <form>
                    <div class="form-group">
                        <label for="property-name">Tên phòng </label>
                        <input type="text" id="property-name" placeholder="Tên phòng của khách sạn" required>
                    </div>
                    <div class="form-group">
                        <label for="business-license">Giới thiệu </label>
                        <input type="text" id="business-license" placeholder="Đôi nét giới thiệu về loại phòng" required>
                    </div>
                    <div class="form-group">
                        <label for="license-address">Giá 1 đêm </label>
                        <input type="text" id="license-address" placeholder="Giá 1 đêm ở cho loại phòng" required>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="license-address">Kích cỡ của phòng</label>
                        <input type="text" id="license-address" placeholder="" required>
                    </div>
                    
                    <div class="form-group type-hotel">
                        <label for="property-type">Loại giường </label>
                        <select id="property-type" style='width:50%;'>
                            <option value="1 giường đơn">1 giường đơn</option>
                            <option value="2 giường đơn">2 giường đơn</option>
                            <option value="3 giường đơn">3 giường đơn</option>
                            <option value="1 giường đôi">1 giường đôi</option>
                            <option value="2 giường đôi">2 giường đôi</option>
                            <option value="3 giường đôi">3 giường đôi</option>
                        </select>
                        
                    </div>
                    
                    
                   
                    
                    <div class="form-group">
                        <label for="rooms">Số phòng cho loại này</label>
                        <input type="number" min='1'  style='width:5%;' id="rooms"   required>
                    </div>
                    
                    <button type="submit">Lưu và Tiếp tục để Phần Tiếp theo</button>
                </form>
            </div>
        </div>
    </div>
    <script >
        function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: -34.397, lng: 150.644 },
        zoom: 8
    });
}

document.addEventListener('DOMContentLoaded', function () {
    var script = document.createElement('script');
    script.src = `https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap`;
    script.defer = true;
    document.head.appendChild(script);
});

    </script>
</body>
</html>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    display: flex;
    width: 70%;
    margin: auto;
}

.sidebar {
    width: 250px;
    background-color: #fff;
    border-right: 1px solid #ddd;
    padding: 20px;
}

.sidebar-section {
    margin-bottom: 20px;
    font-size: 18px;
    font-weight: bold;
}

.sidebar-section.active {
    color: #007bff;
}

.main-content {
    flex-grow: 1;
    padding: 20px;
}

.header {
    margin-bottom: 20px;
    font-size: 14px;
    color: #666;
}

.form-section h2 {
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input,
.form-group select {
    width: 70%;
    padding: 8px;
    box-sizing: border-box;
    border-color:rgb(217, 223, 232);
    border-width:1px;
}

.contact-form {
    margin-top: 30px;
}

.contact-form h3 {
    margin-bottom: 20px;
}

button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}






</style>