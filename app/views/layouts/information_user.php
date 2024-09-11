




<head>
    <link rel="stylesheet" href="public/assets/clients/css/information-user.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<div class="information-user" id="informationUser">
    <div class="background-information-user"></div>
    <form class="form-information-user" method="post" action="">
        <div class="form-group">
            <h4>Thông tin tài khoản</h4>
            <a class="out-information-user" id="out-information-user">X</a>
            <label for="username">Email</label>
            <input type="email" class="form-control" id="username" name="username" aria-describedby="emailHelp" >
            
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" >
        </div>
        <div class="form-group">
            <label for="name">Họ và tên</label>
            <input type="text" class="form-control" id="name" name="name" >
        </div>
        <div class="form-group">
            <label for="phone">Số di động</label>
            <input type="tel" class="form-control" id="phone" name="phone" >
        </div>
        
        <button type="submit" name="information-user" class="btn btn-primary">Cập nhật</button>
    </form>

</div>

<script>
    document.getElementById('out-information-user').addEventListener('click', function() {
        //document.getElementById('informationUser').style.display = 'none';
        
    });
</script>
