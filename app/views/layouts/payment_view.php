<head>
    <link rel="stylesheet" href="public/assets/clients/css/booking.css">
    <link rel="stylesheet" href="public/assets/clients/css/payment.css">
    <link href="public/assets/clients/icon/fontawesome/css/fontawesome.css" rel="stylesheet" />
    <link href="public/assets/clients/icon/fontawesome/css/brands.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="public/assets/clients/icon/fontawesome/css/solid.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <?php
        $this->render('blocks/header');
    ?>
    <div class="title-form-contact">
        <h2>Bạn muốn thanh toán thế nào?</h2>
        <h5>Vui lòng chuyển khoản đến.</h5>
    </div>
    <div class='form-booking'>
        <div class="form-booking-information form-payment">
            <?php
                    $name="";
                    $email="";
                    $phone="";
                    $id_user=0;
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
                    $name=$_SESSION['name'];
                    $email=$_SESSION['email'];
                    $phone=$_SESSION['number_phone'];
                    $id_user=$_SESSION['id'];
                    echo "<div class='greeting-user'>
                    <div class='information-user'>
                        <img src='https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg' alt=''>
                        <p>Chào mừng ".$name."! Tận hưởng các đặc quyền sau bằng cách hoàn thành đặt phòng này:</p>
                    </div>
                    <div class='service'>
                        <div class='service-client diz'>
                            <img src='https://ik.imagekit.io/tvlk/image/imageResource/2023/10/30/1698673782564-64da5698ac769b2b00b1062664b6e729.svg?tr=fo-auto,h-32,q-75,w-28' alt=''>
                            <div class='service-content'>
                                <h6>Dịch vụ khách hàng 24/7</h6>
                                <p>Nhân viên chăm sóc khách hàng sẽ luôn có mặt khi bạn cần.</p>
                            </div>
                        </div>
                        <div class='accumulate-coins diz'>
                            <img src='https://ik.imagekit.io/tvlk/image/imageResource/2023/10/30/1698673791701-e8d17dda6b0c0110b108b820e302d252.svg?tr=fo-auto,h-32,q-75,w-28' alt=''>
                                <div class='service-content'>
                                    <h6>Tích xu</h6>
                                    <p>Tích xu để trở thành thành viên ưu tiên và tận hưởng nhiều quyền lợi hơn.</p>
                                </div>
                        </div>
                    </div>
                </div>";
                }
            ?>
            <div class='div-payment-bank'>
                <div class='bank-name'>
                    <span>Vietcombank</span>
                    <img src="https://ik.imagekit.io/tvlk/image/imageResource/2024/03/21/1711013313327-aef6775a405c8b2ee15cf9fe9fa89626.png?tr=h-28,q-75" alt="">
                </div>
                <div class='information-payment'>
                    <div class='info-payment-left'>
                        <p>Số tài khoản:</p>
                        <p>Chủ tài khoản:</p>
                        <p>Nội dung thanh toán:</p>
                        <p>Số tiền chuyển khoản:</p>
                    </div>
                    <div class='info-payment-right'>
                        <p>0071001088218</p>
                        <p>CTY TNHH HOTEL HOVER VIỆT NAM</p>
                        <p>Thanh toán đặt chỗ 1156100622</p>
                        <p><?php echo number_format($data['rooms']['price_night']*$_GET['number_night']+$data['rooms']['taxes_and_fees'], 0, ',', '.');?> VND</p>
                    </div>
                </div>
            </div>
            <h4>Đã hoàn tất thanh toán của bạn?</h4>
            <h5>Sau khi xác nhận thanh toán của bạn, chúng tôi sẽ gửi vé điện tử và biên nhận qua email.</h5>
            <form action="Home/pageThankyou" method="post" id="payment">
                <input type="hidden" name="room_id" value="<?php echo $_GET['id_room'];?>">
                <input type="hidden" name="check_in" value="<?php echo $_GET['date_in'];?>">
                <input type="hidden" name="check_out" value="<?php

                                    // Lấy ngày đầu vào từ query string
                                    $dateInput = $_GET['date_in']; // Ví dụ: '2024-07-31'

                                    // Lấy số ngày cần cộng từ query string
                                    $numberOfDays = isset($_GET['number_night']) ? (int)$_GET['number_night'] : 0;

                                    // Tạo đối tượng DateTime với ngày đầu vào
                                    $date = new DateTime($dateInput);

                                    // Cộng số ngày vào ngày đầu vào
                                    $date->modify("+$numberOfDays days");

                                    // Hiển thị kết quả
                                    echo $date->format('Y-m-d');

                                    ?>">
                <input type="hidden" name="total_price" value="<?php echo $data['rooms']['price_night']*$_GET['number_night']+$data['rooms']['taxes_and_fees'];?>">
                <input type="hidden" name="note" value="<?php echo $_GET['request'];?>">
                <input type="hidden" name="user_name" value="<?php echo $_GET['username_contact'];?>">
                <input type="hidden" name="email" value="<?php echo $_GET['email_contact'];?>">
                <input type="hidden" name="number_phone_user" value="<?php echo $_GET['phone_contact'];?>">
                <input type="hidden" name="status" value="3">
                <input type="hidden" name="id_user" value="<?php echo $id_user;?>">
                <button class="btn-payment" name="payment" type="submit" >Vâng tôi đã thanh toán</button>
            </form>
            
        </div>
        <div class="form-booking-room form_contact">
            <div class="div-background"></div>
            <span class="name-hotel"><?php echo $data['rooms']['room_name'];?></span>
            <span style='margin: 0;color: rgb(1, 148, 243);font-size: 12px;' class="name-hotel"><i class="fas fa-hotel"></i>    <?php echo $_GET['hotel'];?></span>
            <div class="number-star">
                <img src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/e/e4cb5ddfa3d1399bc496ee6b6539a5a7.svg" alt="">
                <img src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/e/e4cb5ddfa3d1399bc496ee6b6539a5a7.svg" alt="">
                <img src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/e/e4cb5ddfa3d1399bc496ee6b6539a5a7.svg" alt="">
            </div>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img class="d-block w-100" src="https://ik.imagekit.io/tvlk/apr-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7nw/hotel/asset/20062926-f9ffc0feda83a89940985a4b27776055.jpeg?_src=imagekit&tr=f-jpg,h-150,pr-true,q-100,w-375" alt="First slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="https://ik.imagekit.io/tvlk/generic-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7nw/hotel/asset/20062926-286bcaae9c627526c05987f5644f348d.jpeg?_src=imagekit&tr=f-jpg,h-150,pr-true,q-100,w-375" alt="Second slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="https://ik.imagekit.io/tvlk/generic-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7nw/hotel/asset/20062926-0b455bf398e1281c72a91eca469ab0fe.jpeg?_src=imagekit&tr=f-jpg,h-150,pr-true,q-100,w-375" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
            <div class="in-out-room">
                <div class="check-in div-all ">
                    <span>Nhận phòng</span><br>
                    <span><?php echo $_GET['date_in'];?></span>
                </div>
                <div class='number-night '>
                    <span><?php echo $_GET['number_night'];?> đêm</span>
                </div>
                <div class="check-out div-all ">
                    <span>Trả phòng</span><br>
                    <span><?php

                        // Lấy ngày đầu vào từ query string
                        $dateInput = $_GET['date_in']; // Ví dụ: '2024-07-31'

                        // Lấy số ngày cần cộng từ query string
                        $numberOfDays = isset($_GET['number_night']) ? (int)$_GET['number_night'] : 0;

                        // Tạo đối tượng DateTime với ngày đầu vào
                        $date = new DateTime($dateInput);

                        // Cộng số ngày vào ngày đầu vào
                        $date->modify("+$numberOfDays days");

                        // Hiển thị kết quả
                        echo $date->format('Y-m-d');

                        ?>
</span>
                </div>
            </div>
            <span class='div-number-user-kid'><i class="fas fa-user"></i>2 khách</span>
            <span class='div-number-user-kid'><i class="fas fa-baby"></i>2 trẻ em</span>
            <span class='div-number-user-kid'><i class="fas fa-bed"></i><?php echo $data['rooms']['type_bed'];?></span>
            <span class='div-number-user-kid'><i class='fas fa-ruler-combined'></i></i><?php echo $data['rooms']['room_width'];?> m2</span>
            <h4 class='h4-form-payment'>Yêu cầu đặc biệt</h4>
            <span class='div-number-user-kid'><?php echo $_GET['request'];?></span>
            <h4 class='h4-form-payment'>Chi tiết người liên lạc</h4>
            <span class='div-number-user-kid'><?php echo $_GET['username_contact'];?></span>
            <span class='div-number-user-kid'><?php echo $_GET['phone_contact'];?></span>
            <span class='div-number-user-kid'><?php echo $_GET['email_contact'];?></span>
            </div>
            
            
        </div>
    </div>
    <script>
        function displayValue() {
                    

                    // Lấy giá trị của option đã chọn
                  var number_night = parseInt(<?php echo $_GET['number-night'];?>.value); // Chuyển đổi giá trị thành số nguyên

                    // lấy ngày đặt phòng
                    var inputDateValue = document.getElementById("input_in_date").value;

                  var inputDate = new Date(inputDateValue); // Chuyển đổi giá trị thành đối tượng Date

                    // Hiển thị giá trị
                    inputDate.setDate(inputDate.getDate() + number_night);
                  var days = ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'];
                  var formattedDate_2 =   days[inputDate.getDay()] +" , " + ("0" + inputDate.getDate()).slice(-2) + " thg "+  ("0" + (inputDate.getMonth() + 1)).slice(-2) +" "+inputDate.getFullYear()
                  //console.log("Giá trị đã chọn: " + formattedDate_2);
                  document.getElementById("result").innerText = formattedDate_2;
                 
                }
    </script>
</body>