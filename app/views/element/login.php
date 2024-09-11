

<head>
    <link rel="stylesheet" href="public/assets/clients/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<div class="login" id="login">
    <div class="background-login"></div>
    <form class="form-login" method="post" action="">
        <div class="form-group">
            <h2>Đăng nhập</h1>
            <a class="out-login" id="out-login">X</a>
            <label for="username">Email</label>
            <input type="email" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Ví dụ: yourname@gmail.com" required>
            
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        
        <button type="submit" name="login" class="btn btn-primary">Đăng nhập</button>
        <small id="emailHelp" class="form-text text-muted"> Bằng cách đăng ký, bạn đồng ý với <span class="color-blu">Điều khoản & Điều kiện</span> của chúng tôi và bạn đã đọc <span class="color-blu">Chính Sách Quyền Riêng Tư</span> của chúng tôi.</small>
    </form>

</div>

<script>
    document.getElementById('out-login').addEventListener('click', function() {
        document.getElementById('login').style.display = 'none';
        
    });
</script>
