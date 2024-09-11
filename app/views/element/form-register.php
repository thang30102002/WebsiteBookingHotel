

<head>
    <link rel="stylesheet" href="public/assets/clients/css/register.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<div class="register" id="register">
    <div class="background-register"></div>
    <form class="form-register" method="post" >
        <div class="form-group">
            <h2>Đăng ký</h1>
            <a class="out-register" id="out-register">X</a>
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email_register" name="email_register" aria-describedby="emailHelp" placeholder="Ví dụ: yourname@gmail.com" required>
            
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password_register" name="password_register" placeholder="Password" required>
        </div>
        <div class="form-group">
            <label for="name">Họ và tên</label>
            <input type="name" class="form-control" id="name_register" name="name_register" placeholder="Name" required>
        </div>
        <div class="form-group">
            <label for="phone_register">Số điện thoại</label>
            <input type="tel" class="form-control" id="phone_register" name="phone_register" placeholder="Phone" pattern="[0-9]{10}" required>
        </div>
        
        <button type="submit" name="register" onclick="return validateFormLogin()" class="btn btn-primary">Đăng ký</button>
        <small id="emailHelp" class="form-text text-muted"> Bằng cách đăng ký, bạn đồng ý với <span class="color-blu">Điều khoản & Điều kiện</span> của chúng tôi và bạn đã đọc <span class="color-blu">Chính Sách Quyền Riêng Tư</span> của chúng tôi.</small>
    </form>

</div>


<script>
    document.getElementById('out-register').addEventListener('click', function() {
        document.getElementById('register').style.display = 'none';
        
    });

        function validateFormLogin() {
            
                var email = document.getElementById("email_register").value;
                var password_check = document.getElementById("password_register").value;
                var name = document.getElementById("name_register").value;
                var phone = document.getElementById("phone_register").value;
                if (email == "" || password_check == "" || name == "" || phone == "") {
                    alert("Vui lòng nhập đầy đủ thông tin");
                    return false; // Ngăn chặn form được gửi nếu có trường input nào không được nhập
                }
                return true;
            }
</script>
