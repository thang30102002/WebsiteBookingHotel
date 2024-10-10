<?php
    $this->render('blocks/header');
    $this->render('element/form-notification',$data);
?>
<head>
<link rel="stylesheet" href="../public/assets/clients/css/information-user.css">
    <link rel="stylesheet" href="../public/assets/clients/css/detail_hotel.css">
    <link href="../public/assets/clients/icon/fontawesome/css/fontawesome.css" rel="stylesheet" />
    <link href="../public/assets/clients/icon/fontawesome/css/brands.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../public/assets/clients/icon/fontawesome/css/solid.css" rel="stylesheet" />
    <link rel="stylesheet" href="../public/assets/clients/css/login.css">
    <link rel="stylesheet" href="../public/assets/clients/css/register.css">
    <link rel="stylesheet" href="../public/assets/clients/css/footer.css">
    <link rel="stylesheet" href="../public/assets/clients/css/form-notification.css">
    <link rel="stylesheet" href="../public/assets/clients/css/style.css">
</head>
<body>
   
    <div class="detail-hotel">
        
        <div class="information-hotel">
            <div class="part-1">
                <div class="left-part-1">
                    <h1 class="name-hotel"><?php echo $data['hotel'][0]['hotel_name'];?></h1>
                    <span class="type-hotel">Khách sạn</span>
                    <?php
                        for($i=0;$i<$data['hotel'][0]['number_star'];$i++)
                        {
                            echo "<img src='https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/e/e4cb5ddfa3d1399bc496ee6b6539a5a7.svg' alt=''>";
                        }
                    ?>
                    
                    
                    
                    <p class="address-hotel"><i class="fas fa-map-marker-alt"></i><?php echo $data['hotel'][0]['address'];?></p>
                </div>
                <div class="right-part-1">
                    
                        <span class="title-price">Giá/phòng/đêm từ</span><br>
                        <span class="price"><?php echo number_format($data['hotel'][0]['price_min'], 0, ',', '.');?> VND</span><br>
                        
                    
                </div>
            </div>
            <div class="list-img-hotel" style="display:none;">
                <div class="img-main">
                    <img src="https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20023314-5ed86dd02e4234d1bb6025804fef7200.jpeg?_src=imagekit&tr=c-at_max,h-574,q-40,w-885" alt="">
                </div>
                <div class="list-img">
                    <div class="container">
                        <div class="row row-cols-2">
                            <div class="col"><img src="https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/67757118-3000x2495-FIT_AND_TRIM-42982403ed14c775a205413c940e8dc7.jpeg?_src=imagekit&tr=c-at_max,h-574,q-40,w-885" alt=""></div>
                            <div class="col"><img src="https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/67757118-3000x2495-FIT_AND_TRIM-42982403ed14c775a205413c940e8dc7.jpeg?_src=imagekit&tr=c-at_max,h-574,q-40,w-885" alt=""></div>
                            <div class="col"><img src="https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/67757118-3000x2495-FIT_AND_TRIM-42982403ed14c775a205413c940e8dc7.jpeg?_src=imagekit&tr=c-at_max,h-574,q-40,w-885" alt=""></div>
                            <div class="col"><img src="https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/67757118-3000x2495-FIT_AND_TRIM-42982403ed14c775a205413c940e8dc7.jpeg?_src=imagekit&tr=c-at_max,h-574,q-40,w-885" alt=""></div>
                            <div class="col"><img src="https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/67757118-3000x2495-FIT_AND_TRIM-42982403ed14c775a205413c940e8dc7.jpeg?_src=imagekit&tr=c-at_max,h-574,q-40,w-885" alt=""></div>
                            <div class="col"><img src="https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/67757118-3000x2495-FIT_AND_TRIM-42982403ed14c775a205413c940e8dc7.jpeg?_src=imagekit&tr=c-at_max,h-574,q-40,w-885" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="part-2">
                <div class="number-room-min">
                    <img src="https://ik.imagekit.io/tvlk/image/imageResource/2024/02/22/1708578602806-3e057a06245c36454e919580737d69ba.png?tr=h-24,q-75,w-24" alt="">
                    <span>Dừng khoảng chừng là 2 giây! Chỉ còn <span class="color-blu">5 phòng</span> có giá thấp nhất này!</span>
                </div>
                <div class="information-main">
                    
                        <div class="information" style="padding: 10;position: relative;    background-color: #fff;border-radius: 10px;">
                            
                            <h3>Giới thiệu cơ sở lưu trú</h2>
                            <p><?php echo $data['hotel'][0]['information'];?></p>
                        </div>
                        
                    
                    <div class="information-address utilities">
                        <div class="information">
                            
                            <h3>Tiện ích chính</h2>
                            <div class="container">
                                <div class="row row-cols-2" style="height:auto;">
                                    <?php
                                        
                                        for($i=0;$i<count($data["utilities"]);$i++)
                                        {
                                            echo "<div class='col'>".$data["utilities"][$i]['icon']."".$data["utilities"][$i]['name']." </div>";
                                        }
                                    ?>
                                    
                                   
                                </div>
                            </div>
                        </div>
                        
                        <div class="recomment-user">
                            
                            <h3>Ấn tượng</h3>
                            <p class="number-user-comment">Từ <?php echo count($data['review']);?> của khách hàng đã ở</p>
                            <p>Khách hàng nói gì về kì nghỉ của họ</p>
                            <div class="container">
                                <div class="row row-cols-1">
                                    <?php
                                        
                                        for($i=0;$i<count($data['review']);$i++)
                                        {
                                            echo "<div class='col'><span class='name-user'>".$data['review'][$i]['user_name']."</span><br><span class='conten'>".$data['review'][$i]['coment']."</span></div>";
                                        }
                                    ?>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="recomment">
                        
                    </div>
                </div>
                
            </div>
        </div>
        <div class="list-rooms">
            <h4>Khách sạn <?php echo $data['hotel'][0]['hotel_name'];?> có <?php echo $data['NumberRoom'];?> loại phòng</h4>
            <div class="title"><img src="https://ik.imagekit.io/tvlk/image/imageResource/2020/04/14/1586844222168-9f81c6c60bcffcde668cf46de941aa3c.png?tr=q-75" alt="">Phải đặt phòng trong thời điểm không chắc chắn này? Hãy chọn phòng có thể hủy miễn phí!</div>
            <?php
                for($i=0;$i<$data['NumberRoom'];$i++)
                {
                    $this->Room= new RoomModel;
                    $numberRoomEmpty=$this->Room->getNumberRoomBookinged($data['room'][$i]['room_id']);
                    $numberRoomEmptys=$data['room'][$i]['number_rooms']-$numberRoomEmpty;
                   
                    echo "
                            <div class='room'>
                                <h5>".$data['room'][$i]['room_name']."</h5>
                                <div class='information-room'>
                                    <div class='left'>
                                        <img class='img-room-main' src='https://ik.imagekit.io/tvlk/generic-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20023314-1dd3b52ce5baa32f9a4b15a21224d64b.jpeg?_src=imagekit&tr=c-at_max,fo-auto,h-222,q-40,w-296' alt=''>
                                        <div class='unitity-room'><i class='fas fa-ruler-combined'></i><span>".$data['room'][$i]['room_width']." m2</span></div>
                                        <div class='unitity-room'><i class='fas fa-bed'></i><span>".$data['room'][$i]['type_bed']."</span></div>
                                        <div class='unitity-room'><i class='fas fa-user'></i><i class='fas fa-user'></i><span>Người</span></div>
                                        <div class='unitity-room'><i class='fas fa-times-circle'></i><span>Bạn có thể hủy phòng trước ".$data['room'][$i]['number_day_cancel']." ngày </span></div>
                                    </div>
                                    <div class='right-price-room'>
                                        <table>
                                            <tr class='tr-heder'>
                                                <th>Giá/Phòng/Đêm</th>
                                                <th></th>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    
                                                    <span class='price-room-discound'>".number_format($data['room'][$i]['price_night'], 0, ',', '.')." VND</span><br>
                                                    <span class='thue'>Chưa bao gồm thuế và phí</span>
                                                </td>
                                                <td>
                                                    <form action='Booking'>
                                                        <input type='hidden' name='date_in' value='".$_GET['date_in']."'> 
                                                        <input type='hidden' name='number-night' value='".$_GET['number-night']."'> 
                                                        <input type='hidden' name='hotel' value='".$data['hotel'][0]['hotel_name']."'> 
                                                        <input type='hidden' name='id_room' value='".$data['room'][$i]['room_id']."'>
                                                        <button type='submit' class='btn-select-room'>Chọn</button>
                                                        
                                                        <p class='number-room-empty'>Chỉ còn ". $numberRoomEmptys." phòng</p>
                                                    </form>
                                                </td>
                                                
                                            </tr>
                                            
                                        </table>
                                        <div class='information information-room-content'>
                                            <form method='post'>
                                                <input type='hidden' name='id_room' value='".$data['room'][$i]['room_id']."'>
                                                <input type='hidden' name='number-night' value='".$_GET['number-night']."'> 
                                                <input type='hidden' name='hotel' value='".$data['hotel'][0]['hotel_name']."'> 
                                                <input type='hidden' name='date_in' value='".$_GET['date_in']."'> 
                                                <input type='hidden' name='room_id' value='".$data['room'][$i]['room_id']."'> 
                                                <input type='hidden' name='room_name' value='".$data['room'][$i]['room_name']."'> 
                                                <input type='hidden' name='information' value='".$data['room'][$i]['information']."'> 
                                                <input type='hidden' name='quantity_client' value='".$data['room'][$i]['quantity_client']."'> 
                                                <input type='hidden' name='room_width' value='".$data['room'][$i]['room_width']."'> 
                                                <input type='hidden' name='type_bed' value='".$data['room'][$i]['type_bed']."'> 
                                                <input type='hidden' name='number_rooms' value='".$data['room'][$i]['number_rooms']."'> 
                                                
                                                <input type='hidden' name='taxes_and_fees' value='".$data['room'][$i]['taxes_and_fees']."'> 
                                                <input type='hidden' name='price_night' value='".$data['room'][$i]['price_night']."'> 
                                                
                                                <button id='btn-form-block' name='show-room-detail'>Xem thêm ></button>
                                            </form> 
                                            <h6>Giới thiệu cơ sở lưu trú</h6>
                                            <p>".$data['room'][$i]['information']."</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ";
                    if(isset($_POST['show-room-detail'])) {
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $this->render('element/room-detail',$data);
                        }}    
                }
                
                
            ?>
            
        </div>
        <div class="evaluate-user">
            <h4>Những review khác của du khách về <?php echo $data['hotel'][0]['hotel_name'];?> </h4>
            <div class="list-evaluate">
                <?php
                    for($i=0;$i<$data['NumberReview'];$i++)
                    {
                        // $this->model_detailuser = $this->model('UserModel');
                        // $this->DetailUser= new UserModel;
                        // $user_detail=$this->DetailUser->getUserDetail($_GET["id"]);
                        echo "
                            <div class='evaluate'>
                                <div class='user-name'>
                                    <img style='max-width: 50px;' class='avata-user' src='public/assets/clients/images/avarta/".$data['review'][$i]['avarta']."' alt=''>
                                    <span class='name'>".$data['review'][$i]['user_name']."</span>
                                    
                                </div>
                                <div class='evaluate-content'>
                                    <span class='date'>".$data['review'][$i]['review_date']."</span>
                                    <p>".$data['review'][$i]['coment']."</p>
                                </div>
                            </div>
                        ";
                        
                    }
                ?>
                
            </div>
            <?php
            

            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                echo "<h4>Để lại đánh giá</h4>
                <div class='form-input-evaluate'>
                    <form action='' method='post'>
                        <input class='input-evaluate' type='text' id='coment' name='coment' placeholder='Lời đánh giá..'>
                        <input type='hidden' name='user_id' value='" . htmlspecialchars($_SESSION['id'], ENT_QUOTES, 'UTF-8') . "'>
                        <input type='hidden' name='hotel_id' value='" . htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8') . "'>
                        <input type='hidden' name='rating' value='5'>
                        <input type='hidden' name='review_date' value='" . htmlspecialchars(date('Y-m-d'), ENT_QUOTES, 'UTF-8') . "'>
                        <button style='width: 100%; border: none; padding: 10px; border-radius: 5px; font-weight: bold; color: #fff; background-color: rgb(1, 148, 243);' type='submit' name='addreview' onclick='return validateFormReview()'>Bình luận</button>
                    </form>
                </div>";
                if (isset($_POST['addreview'])) {
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $user_id = htmlspecialchars($_POST['user_id'], ENT_QUOTES, 'UTF-8');
                        $hotel_id = htmlspecialchars($_POST['hotel_id'], ENT_QUOTES, 'UTF-8');
                        
                        $coment = htmlspecialchars($_POST['coment'], ENT_QUOTES, 'UTF-8');
                        $review_date = htmlspecialchars($_POST['review_date'], ENT_QUOTES, 'UTF-8');
    
                        // Initialize the model and call the add review method
                        $model_addreview = $this->model('ReviewModel');
                        $adduser = new ReviewModel;
                        
                        // Add review to database
                        $Add = $adduser->AddReview($user_id, $hotel_id, $coment, $review_date);
                        echo "<script>window.location.href = 'DetailHotel?id=".$_GET['id']."&date_in=".$_GET['date_in']."&number-night=".$_GET['number-night']."&review=success';</script>";
                        $this->render('element/notification/review-success');

                        
                    }
                }
            }


            
            ?>

            
        </div>
        
        <?php
            if(isset($_GET['review'])=='success')
            {
                $this->render('element/notification/review-success');
            }
        ?>
    </div>

    <script>
        document.getElementById('btn-form-block').addEventListener('click', function() {
        document.getElementById('notification').style.display = 'block';
        
    });
    function validateFormReview() {
                var review = document.getElementById("coment").value;
                if (review=="") {
                    alert("Vui lòng nhập đầy đủ thông tin");
                    return false; // Ngăn chặn form được gửi nếu có trường input nào không được nhập
                }
            }

    </script>

</body>
<?php
    $this->render('blocks/footer');
?>