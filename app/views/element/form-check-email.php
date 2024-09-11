<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Thực Tài Khoản</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class='check-email' id='check-email'>
        <div class="verification-container">
            <div class="verification-box">
                <a class="out-login" id="out-check-email">X</a>
                <form action="" method='post' id='check-mail'>
                    <h2>Xác thực tài khoản của bạn</h2>
                    <p>Vui lòng nhập mã xác minh mà chúng tôi đã gửi tới <?php echo $data['email'];?></p>   
                    <div class="code-inputs">
                        <input name='token-1' type="text" maxlength="1">
                        <input name='token-2' type="text" maxlength="1">
                        <input name='token-3' type="text" maxlength="1">
                        <input name='token-4' type="text" maxlength="1">
                        <input name='token-5' type="text" maxlength="1">
                        <input name='token-6' type="text" maxlength="1">
                        <input type="hidden" name='token' value='<?php echo $data['token']; ?>'>
                        <input type="hidden" name='email' value='<?php echo $data['email']; ?>'>
                        <input type="hidden" name='password' value='<?php echo $data['password']; ?>'>
                        <input type="hidden" name='name' value='<?php echo $data['name']; ?>'>
                        <input type="hidden" name='phone' value='<?php echo $data['phone']; ?>'>
                    </div>
                    <button class="resend-button" name="" value="resend_code" type="submit">Gửi lại mã xác minh?</button>
                    <button class='btn-check-email' name="chech_email" value="verify_account" type='submit'>Xác thực tài khoản của bạn</button>
                </form>
                <?php
                    
                ?>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('out-check-email').addEventListener('click', function() {
            document.getElementById('check-email').style.display = 'none';
        });
    </script>
</body>
</html>
<style>
    .out-login{
        color: #000;
        position: absolute;
        right: 15px;
        cursor: pointer;

    }
    .btn-check-email {
        background-color: rgb(1, 148, 243);
        color: #fff;
        padding: 7px 30px;
        border: none;
        width: 100%;
        border-radius: 5px;
    }
    .check-email {
        margin-top: -75px;    
        width: 100%;
        z-index: 999999;
        position: fixed;
        font-family: Arial, sans-serif;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .verification-container {
        position: absolute;
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        width: 24%;
        text-align: center;
    }
    .verification-box h2 {
        margin-bottom: 10px;
        font-size: 18px;
    }
    .verification-box p {
        font-size: 14px;
        color: #555;
        margin-bottom: 20px;
        margin-top: 30px;
    }
    .code-inputs {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }
    .code-inputs input {
        width: 40px;
        height: 40px;
        font-size: 18px;
        text-align: center;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .resend-button, .verify-button, .change-destination-button {
        display: block;
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: none;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
    }
    .resend-button {
        background-color: #f0f0f0;
        color: #333;
    }
    .verify-button {
        background-color: #ccc;
        color: white;
    }
    .change-destination-button {
        background-color: #f0f0f0;
        color: #333;
    }
    .verify-button:disabled {
        background-color: #ccc;
        cursor: not-allowed;
    }
</style>
