<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ví dụ Bootstrap - Quantrimang.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3" style='    position: fixed;
    z-index: 999999999;
    width: 30%;
    right: 5;
    animation: showHideAlert 4s ease forwards;'>
   <div class="alert alert-success alert-dismissible fade show">
     <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Đăng nhập thành công </strong> 
  </div> 
</div>
<style>
    @keyframes showHideAlert {
    0% {
        opacity: 0;
    }
    10% {
        opacity: 1;
    }
    90% {
        opacity: 1;
    }
    100% {
        opacity: 0;
    }
}
</style>
</body>
</html>