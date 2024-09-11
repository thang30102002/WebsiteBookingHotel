<?php
    $this->render('blocks/header');
?>
<head>
    <link rel="stylesheet" href="public/assets/clients/css/search.css">
    <link href="public/assets/clients/icon/fontawesome/css/fontawesome.css" rel="stylesheet" />
    <link href="public/assets/clients/icon/fontawesome/css/brands.css" rel="stylesheet" />
    <link href="public/assets/clients/icon/fontawesome/css/solid.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <script>
        $('.price_from').val(<?php echo $data['price_min']['price_min'];?>);
        $('.price_to').val(<?php echo $data['price_max']['price_min'];?>);
        $( function() {
            $( "#slider-range" ).slider({
            range: true,
            min: <?php echo $data['price_min']['price_min'];?>,
            max: <?php echo $data['price_max']['price_min'];?>,
            values: [ 0, 100000000 ],
            slide: function( event, ui ) {
                $( "#amount" ).val( "VND " + ui.values[ 0 ].toLocaleString('vi-VN', {style : 'currency', currency : 'VND'}) + " - VND " + ui.values[ 1 ].toLocaleString('vi-VN', {style : 'currency', currency : 'VND'}) );
                $('.price_from').val(ui.values[0]);
                $('.price_to').val(ui.values[1]);
            }
            });
            $( "#amount" ).val( "VND " + $( "#slider-range" ).slider( "values", 0 ) +
            " - VND " + $( "#slider-range" ).slider( "values", 1 ) );
            
        } );
    </script>
</head>
<body>
    <div class="title-limit">
                <span><i class="fas fa-map-marker-alt"></i><?php echo $_GET['address'];?></span>
                <span>Ngày nhận phòng: <?php echo date('d', strtotime($_GET['date_in'])) . ' tháng ' . date('n', strtotime($_GET['date_in'])) . ', ' . date('Y', strtotime($_GET['date_in']));?>, <?php echo $_GET['number-night']?> đêm</span>                
                <span><?php echo $_GET['quantity_adult']?> người lớn, <?php echo $_GET['quantity_childel']?> Trẻ em, <?php echo $_GET['quantity_room']?> phòng</span>
                <?php 
                    if(isset($_GET['from'])&& $_GET['from']!="")
                    {
                        echo "<span>Giá: ".number_format($_GET['from'], 0, ',', '.')." VND - ".number_format($_GET['to'], 0, ',', '.')." VND</span>";
                    }
                ?>
            </div>
    <div class="search-hotel">
        
        <div class="side-bar">
            <div class="download-app">
                <img src="https://ik.imagekit.io/tvlk/image/imageResource/2023/06/14/1686722012720-860ee29e30608815f3cc5d6271a3288c.jpeg?tr=q-75" alt="">
                <p>Tại sao phải đặt giá cao <br>Trong khi có giá thấp hơn <br>Tải app để nhận nhiều ưu đãi</p>
            </div>
            <form action="" method="get">
                <div class="filter-price">
                    <p class="filter-title">Phạm vi giá</p>
                    <p class="filter-note">1 phòng, 1 đêm</p>
                    <p>
                        <input type="text" id="amount" readonly="" style="border:0; color:rgba(1,148,243,1.00); font-weight:bold; font-size:13px;width:100%;">
                    </p>
                    <input type="hidden" class="price_from" name="from">
                    <input type="hidden" class="price_to" name="to">
                    <input type="hidden" class="city" name="address" value="<?php echo $_GET['address'];?>">
                    <div id="slider-range"></div>
                    <button class="btn-click-filter-price">Lọc</button>
                    <input type="hidden" name="date_in" value="<?php echo $_GET['date_in'];?>">
                    <input type="hidden" name="quantity_adult" value="<?php echo $_GET['quantity_adult'];?>">
                    <input type="hidden" name="quantity_childel" value="<?php echo $_GET['quantity_childel'];?>">
                    <input type="hidden" name="quantity_room" value="<?php echo $_GET['quantity_room'];?>">
                    <input type="hidden" name="number-night" value="<?php echo $_GET['number-night'];?>">
                    
                </div>
            </form>
            <!-- <div class="filter-star filter-price">
                <p class="filter-title">Hạng sao</p>
                <form>
                    <input type="checkbox" id="star-1" name="star-1" value="star-1">
                    <label for="star-1"> <img src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/e/e4cb5ddfa3d1399bc496ee6b6539a5a7.svg" alt=""></label><br>
                    <input type="checkbox" id="star-2" name="star-2" value="star-2">
                    <label for="star-2"> <img src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/e/e4cb5ddfa3d1399bc496ee6b6539a5a7.svg" alt=""><img src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/e/e4cb5ddfa3d1399bc496ee6b6539a5a7.svg" alt=""></label><br>
                    <input type="checkbox" id="star-3" name="star-3" value="star-3">
                    <label for="star-3"> <img src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/e/e4cb5ddfa3d1399bc496ee6b6539a5a7.svg" alt=""><img src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/e/e4cb5ddfa3d1399bc496ee6b6539a5a7.svg" alt=""><img src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/e/e4cb5ddfa3d1399bc496ee6b6539a5a7.svg" alt=""></label><br/>
                    <input type="checkbox" id="star-4" name="star-4" value="star-4">
                    <label for="star-4"> <img src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/e/e4cb5ddfa3d1399bc496ee6b6539a5a7.svg" alt=""><img src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/e/e4cb5ddfa3d1399bc496ee6b6539a5a7.svg" alt=""><img src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/e/e4cb5ddfa3d1399bc496ee6b6539a5a7.svg" alt=""><img src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/e/e4cb5ddfa3d1399bc496ee6b6539a5a7.svg" alt=""></label><br>
                    <input type="checkbox" id="star-5" name="star-5" value="star-5">
                    <label for="star-5"> <img src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/e/e4cb5ddfa3d1399bc496ee6b6539a5a7.svg" alt=""><img src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/e/e4cb5ddfa3d1399bc496ee6b6539a5a7.svg" alt=""><img src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/e/e4cb5ddfa3d1399bc496ee6b6539a5a7.svg" alt=""><img src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/e/e4cb5ddfa3d1399bc496ee6b6539a5a7.svg" alt=""><img src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/e/e4cb5ddfa3d1399bc496ee6b6539a5a7.svg" alt=""></label><br>
                </form>
            </div> -->
            <!-- <div class="filter-utilities filter-price">
                <p class="filter-title">Tiện ích</p>
                <form>
                    <input type="checkbox" id="wifi" name="wifi" value="wifi">
                    <label for="wifi"> WiFi</label><br>
                    <input type="checkbox" id="ho-boi" name="ho-boi" value="ho-boi">
                    <label for="ho-boi"> Hồ bơi</label><br>
                    <input type="checkbox" id="cho-dau-xe" name="cho-dau-xe" value="cho-dau-xe">
                    <label for="cho-dau-xe"> Chỗ đậu xe</label><br>
                    <input type="checkbox" id="nha-hang" name="nha-hang" value="nha-hang">
                    <label for="nha-hang"> Nhà hàng</label><br>
                    <input type="checkbox" id="phong-hop" name="phong-hop" value="phong-hop">
                    <label for="phong-hop"> Phòng họp</label><br>
                </form>
                
            </div> -->
        </div>
        <div class="main-search">
            <div class="why-price-chip">
                <img src="https://ik.imagekit.io/tvlk/image/imageResource/2022/08/10/1660100914472-6b499e802cfd9dc828713c044fe1d36d.png?tr=h-24,q-75,w-24" alt="">
                <span>Sao phải trả nhiều hơn khi luôn có giá rẻ hơn trên App - Click dấu "?" bên phải để tải ngay ứng dụng Hotel Hive và đặt khách sạn rẻ hơn!</span>
            </div>
            <p class="how-many-hotel">Tìm thấy <?php $number_hotel=count($data['city']);
                                                        if($number_hotel==0)
                                                        {echo count($data['name_hotel']);}
                                                        else{echo $number_hotel;}?> cơ sở lưu trú tại <?php echo $_GET['address'];?></p>
            <div class="list-hotel">
                <!-- hotel -->
                 <?php
                    
                    $number_hotel_name=count($data['name_hotel']);
                    for($i=0;$i<$number_hotel_name;$i++)
                    {
                        $stars_html = ""; // Chuỗi HTML cho số sao
                        $price_default=number_format($data['name_hotel'][$i]["default_price"]);
                        $price_min=number_format($data['name_hotel'][$i]["price_min"]);
                        // Tạo chuỗi HTML cho số sao
                        for ($x = 0; $x < $data['name_hotel'][$i]["number_star"]; $x++) {
                            $stars_html .= "<img src='https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/e/e4cb5ddfa3d1399bc496ee6b6539a5a7.svg' alt=''>";
                        }
                        echo "<div class='hotel'>
                                
                                    <div class='img-hotel'>
                                        <img src='https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20061391-326893946a4dfa8dbc7b7773b17503cb.png?_src=imagekit&tr=fo-auto,h-145,q-40,w-300' alt=''>
                                    </div>
                                    <div class='information-hotel'>
                                        <div class='name-hotel'><span>".$data['name_hotel'][$i]["hotel_name"]."</span></div>
                                        <div class='star-number'>
                                            <img src='https://ik.imagekit.io/tvlk/image/imageResource/2023/03/28/1679986877455-c9fba4a49268f20248a89a0b68c86973.png?tr=h-12,q-75,w-12' alt=''>
                                            <span>Khách sạn</span>
                                            <div class='star'>
                                                ".$stars_html."
                                            </div>
                                        </div>
                                        <div class='address-hotel'><i class='fas fa-map-marker-alt'></i><span>".$data['name_hotel'][$i]["address"]."</span></div> 
                                    </div>
                                    <div class='hotel-price'>
                                        <div class='default-price'><span>".$price_default."</span></div>
                                        <div class='discount-price'><span>".$price_min." VND</span></div>
                                        <p>Chưa bao gồm thuế và phí</p>
                                        <form action='DetailHotel' method='get'>
                                            <input type='hidden' name='id' value='".$data['name_hotel'][$i]["hotel_id"]."'> 
                                            <input type='hidden' name='date_in' value='".$_GET['date_in']."'> 
                                            <input type='hidden' name='number-night' value='".$_GET['number-night']."'> 
                                            <button  type='submit'>Chọn phòng</button>
                                        </form>
                                    </div>
                                
                            </div>";
                    }




                    $number_hotel_city=count($data['city']);
                    for($i=0;$i<$number_hotel_city;$i++)
                    {
                        $stars_html = ""; // Chuỗi HTML cho số sao
                        $price_default=number_format($data['city'][$i]["default_price"]);
                        $price_min=number_format($data['city'][$i]["price_min"]);
                        // Tạo chuỗi HTML cho số sao
                        for ($x = 0; $x < $data['city'][$i]["number_star"]; $x++) {
                            $stars_html .= "<img src='https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/e/e4cb5ddfa3d1399bc496ee6b6539a5a7.svg' alt=''>";
                        }
                        echo "<div class='hotel'>
                                
                                    <div class='img-hotel'>
                                        <img src='https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20061391-326893946a4dfa8dbc7b7773b17503cb.png?_src=imagekit&tr=fo-auto,h-145,q-40,w-300' alt=''>
                                    </div>
                                    <div class='information-hotel'>
                                        <div class='name-hotel'><span>".$data['city'][$i]["hotel_name"]."</span></div>
                                        <div class='star-number'>
                                            <img src='https://ik.imagekit.io/tvlk/image/imageResource/2023/03/28/1679986877455-c9fba4a49268f20248a89a0b68c86973.png?tr=h-12,q-75,w-12' alt=''>
                                            <span>Khách sạn</span>
                                            <div class='star'>
                                                ".$stars_html."
                                            </div>
                                        </div>
                                        <div class='address-hotel'><i class='fas fa-map-marker-alt'></i><span>".$data['city'][$i]["address"]."</span></div> 
                                    </div>
                                    <div class='hotel-price'>
                                        <div class='default-price'><span>".$price_default."</span></div>
                                        <div class='discount-price'><span>".$price_min." VND</span></div>
                                        <p>Chưa bao gồm thuế và phí</p>
                                        <form action='DetailHotel' method='get'>
                                             <input type='hidden' name='id' value='".$data['city'][$i]["hotel_id"]."'> 
                                             <input type='hidden' name='date_in' value='".$_GET['date_in']."'> 
                                            <input type='hidden' name='number-night' value='".$_GET['number-night']."'> 
                                            <button  type='submit'>Chọn phòng</button>
                                        </form>
                                    </div>
                                
                            </div>";
                    }
                    
                ?>
                
                <!-- ------------ --> 
            </div>
        </div>
    </div>
</body>
<script>
        function viewRoom(roomId) {
            window.location.href = "DetailHotel.php?id=" + roomId;
        }
</script>
<?php
    $this->render('blocks/footer');
?>