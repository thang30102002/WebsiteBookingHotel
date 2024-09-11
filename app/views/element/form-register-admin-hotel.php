
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
            <h2>Tạo tài khoản Tera mới</h2>
            <p>Hãy niêm yết chỗ nghỉ của bạn trên HotelHive và để chúng tôi giúp bạn kết nối với hàng triệu du khách!</p>
            <form method='post' action="">
                <label for="email">Địa chỉ email của bạn</label>
                <input required required type="email" name='email' id="email" placeholder="Nhập địa chỉ email của bạn ở đây">

                <label for="number-phone">Số điện thoại của bạn</label>
                <input required required type="text" name='number-phone' id="number-phone" placeholder="Nhập số điện thoại của bạn ở đây">

                <label for="surname">Họ</label>
                <input required required type="text" name='surname' id="surname" placeholder="Nhập họ của bạn ở đây">
                <label for="name">Tên</label>
                <input required required type="text" name='name' id="name" placeholder="Nhập tên của bạn ở đây">
                
                <label for="password">Mật khẩu</label>
                <input required required type="password" name='password' id="password" placeholder="Nhập mật khẩu của bạn ở đây">
                <a style='text-decoration: none;'href="#" id="togglePassword">Show</a>
                <button name="register-admin-hotel" onclick="return validateFormLogin()" type="submit">Kế tiếp</button>
            </form>
            <p>Bạn có sẵn sàng để tạo một tài khoản? <a href="login">Đăng nhập tại đây</a></p>
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

</style>
