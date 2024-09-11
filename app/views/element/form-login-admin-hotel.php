<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - HotelHive TERA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1 class="logo">HotelHive <span class="tera">TERA</span></h1>
            <h2>Chào mừng trở lại!</h2>
            <p>Đăng nhập để quản lý chỗ nghỉ của bạn từ việc kiểm tra đặt phòng đến quản lý tình trạng phòng trống!</p>
            <form method="post" action="">
                <label for="email">Địa chỉ email của bạn</label>
                <input type="email" name='username' id="email" placeholder="Nhập địa chỉ email của bạn ở đây">
                <label for="password">Mật khẩu</label>
                <input type="password" name='password' id="password" placeholder="Nhập mật khẩu của bạn ở đây">
                <a style='text-decoration: none;'href="#" id="togglePassword">Show</a>
                <a href="#" class="forgot-password">Quên mật khẩu?</a>
                <button type="submit" id='btn-login' name='login-admin-hotel'>Đăng nhập</button>

            </form>
            
            <p>Chưa phải là đối tác? <a href="register">Đăng ký tại đây</a></p>
            
        </div>
        
    </div>
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');

        togglePassword.addEventListener('click', function (e) {
            e.preventDefault();
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);

            // Toggle the link text
            this.textContent = type === 'password' ? 'Show' : 'Hide';
        });

        
    </script>
</body>
</html>
<style>
    /* styles.css */

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
    text-align: center;
}

.form-container {
    margin: auto;
    background-color: white;
    color: black;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

.logo {
    font-size: 24px;
    margin-bottom: 10px;
}

.tera {
    color: #005eb8;
}

h2 {
    margin: 10px 0;
}

p {
    color: rgb(104, 113, 118);
    margin: 10px 0;
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
    margin-bottom: 10px;
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

.forgot-password {
    margin-bottom: 10px;
    display: block;
    text-align: right;
    width: 100%;
    color: #005eb8;
    text-decoration: none;
}

.forgot-password:hover {
    text-decoration: underline;
}

footer {
    margin-top: 20px;
}

footer a {
    color: white;
    text-decoration: none;
}

.app-links {
    margin-top: 20px;
}

.app-links a {
    margin: 0 5px;
}

.app-links img {
    width: 120px;
}

</style>