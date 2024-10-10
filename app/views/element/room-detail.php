<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deluxe Twin Room</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .detail-room {
            z-index: 99999999999999999999999;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .image-gallery {
            flex: 1;
            padding: 20px;
        }
        .image-gallery img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            height: 373px;
        }
        .thumbnail-detail-room {
            display: flex;
            
            margin-top: 10px;
        }
        .thumbnail-detail-room img {
            width: 18%;
            height: auto;
            border-radius: 8px;
            cursor: pointer;
            margin-left:5px;
        }
        .details {
            position: relative;
            flex: 1;
            padding: 20px;
        }
        .details h1 {
            margin-top: 0;
            font-weight: bold;
        }
        .details .info {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
        }
        .details .info div {
            width: 48%;
        }
        .details .price {
            font-size: 24px;
            color: #ff4500;
            margin: 10px 0;
            font-weight: bold;
        }
        .details .select-room {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }
        .out-room-detail{
            position: absolute;
            right: 0;
            top: 0;
            padding: 10px;
            cursor: pointer;
        }
        .background-room-detial{
            top:0;
            bottom:0;
            left:0;
            background-color: rgb(39, 46, 52);
            opacity: 0.4;
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 99999999999999999999999;
        }
    </style>
</head>
<body>
    <div class='background-room-detial' id='background-room-detial'></div>
    <div class="detail-room" id='detail-room'>
        <div class="image-gallery">
            
                <?php 
                
                    $img=$this->getImgFolder("hotel/".$data['hotel'][0]['hotel_id']."/".$_POST['room_name']."");
                    if(count($img)>0){
                        echo "<img id='main-image' src='../hotel/".$data['hotel'][0]['hotel_id']."/".$_POST['room_name']."/".$img[0]."' alt='Deluxe Twin Room'>
                        <div class='thumbnail-detail-room'>";
                        $dem=0;
                        for($i=0;$i<count($img);$i++)
                        {
                            $dem=$dem+1;
                            
                            echo "<img src='../hotel/".$data['hotel'][0]['hotel_id']."/".$_POST['room_name']."/".$img[$i]."' alt='Thumbnail ".$dem."' onclick=\"changeImage('../hotel/".$data['hotel'][0]['hotel_id']."/".$_POST['room_name']."/".$img[$i]."')\">";

                        }
                    }
                    else{
                        echo "<div class='thumbnail-detail-room'>";
                        echo "<h5>Không có ảnh</h5>";
                    }
                    
                ?>
                
            </div>
        </div>
        <div class="details">
            <a class="out-room-detail" id="out-room-detail">X</a>
           
            <h1><?php echo $_POST['room_name'];?></h1>
            <div class="info">
                <div>
                    <p><strong>Thông tin phòng</strong></p>
                    <p><?php echo $_POST['room_width'];?> m²</p>
                    <p><?php echo $_POST['quantity_client'];?> khách</p>
                </div>
                <div>
                    <p><strong>Tính năng phòng</strong></p>
                    <p><?php echo $_POST['type_bed'];?></p>
                    <p><?php echo number_format($_POST['taxes_and_fees'], 0, ',', '.');?> VND thuế và phí</p>
                    <p>Có tổng số <?php echo $_POST['number_rooms'];?> phòng</p>
                </div>
            </div>
            <div class="info">
                <div>
                    <p><strong>Giới thiệu</strong></p>
                    <p><?php echo $_POST['information'];?></p>
                </div>
                
            </div>
            <p class="price"><?php echo number_format($_POST['price_night'], 0, ',', '.');?> VND / phòng / đêm</p>
            <form action='Booking'>
                <?php
                echo "
                <input type='hidden' name='date_in' value='".$_POST['date_in']."'> 
                <input type='hidden' name='number-night' value='".$_POST['number-night']."'> 
                <input type='hidden' name='hotel' value='".$_POST['hotel']."'> 
                <input type='hidden' name='id_room' value='".$_POST['id_room']."'>
                ";
                ?>
                <button class="select-room">Thêm lựa chọn phòng</button>
            </form>
            
        </div>
    </div>

    <script>
        function changeImage(src) {
            document.getElementById('main-image').src = src;
        }
        
        document.getElementById('out-room-detail').addEventListener('click', function() {
            document.getElementById('background-room-detial').style.display = 'none';
            document.getElementById('detail-room').style.display = 'none';
            
        });
    </script>
</body>
</html>
