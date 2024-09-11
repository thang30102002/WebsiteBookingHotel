<head>
    <link rel="stylesheet" href="public/assets/clients/css/booking.css">
    <link href="public/assets/clients/icon/fontawesome/css/fontawesome.css" rel="stylesheet" />
    <link href="public/assets/clients/icon/fontawesome/css/brands.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="public/assets/clients/icon/fontawesome/css/solid.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<style>
    .date{
        border:none;
    }
    .input-date input{
        border:none;
    }
</style>
<body>
    <?php
        $this->render('blocks/header');
    ?>
    <div class="title-form-contact">
        <h2>Đặt phòng của bạn</h2>
        <h5>Hãy đảm bảo tất cả thông tin chi tiết trên trang này đã chính xác trước khi tiến hành thanh toán.</h5>
    </div>
    <div class='form-booking' style='display: flex;'>
        <form action="Payment" id="payment" style='display: flex;'>
            <div class="form-booking-information">
                <?php
                        $name="";
                        $email="";
                        $phone="";
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
                        $name=$_SESSION['name'];
                        $email=$_SESSION['email'];
                        $phone=$_SESSION['number_phone'];
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
                
                <div class="information-contact form_contact">
                    <h4>Thông tin liên hệ</h4>
                    <p>Hãy điền chính xác tất cả thông tin để đảm bảo bạn nhận được Phiếu xác nhận  đặt phòng (E-voucher) qua email của mình.</p>
                    
                        <div class="form-group">
                            
                            <label for="username_contact">Họ và tên</label>
                            <input type="text" class="form-control" id="username_contact" oninput="checkInput()" name="username_contact" value="<?php echo $name;?>" required>
                            <div class="invalid-feedback">Vui lòng nhập Họ và tên.</div>

                            
                        </div>
                        <div class="form-group">
                            <label for="email_contact">E-mail</label>
                            <input type="email" class="form-control" id="email_contact" oninput="checkInput()" name="email_contact" value="<?php echo $email;?>" required>
                            <div class="invalid-feedback">Vui lòng nhập địa chỉ email hợp lệ.</div>
                        </div>
                        <div class="form-group">
                            <label for="phone_contact">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone_contact" name="phone_contact" value="<?php echo $phone;?>">
                        </div>
                        
                        
                   
                </div>
                <div class="form-request form_contact">
                    <h4>Bạn có yêu cầu nào không?</h4>
                    <p>Khi nhận phòng, khách sạn sẽ thông báo liệu yêu cầu này có được đáp ứng hay không. Một số yêu cầu cần trả thêm phí để sử dụng nhưng bạn hoàn toàn có thể hủy yêu cầu sau đó.</p>
                    
                        <input type="text" class="form-control" id="request" name="request" placeholder="Bạn có yêu cầu gì cho khách sạn...">
                    
                    
                </div>
                <div class="form-price-booking form_contact">
                    <h4>Chi tiết giá</h4>
                
                    <span class='span-thue'>Thuế và phí là các khoản được Hotel Hover chuyển trả cho khách sạn. Mọi thắc mắc về thuế và hóa đơn, vui lòng tham khảo Điều khoản và Điều kiện của Traveloka để được giải đáp</span>
                    <div class="price-room">
                        <p>Giá phòng/1 đêm</p>
                        <span class="span-price"><?php echo number_format($data['rooms']['price_night'], 0, ',', '.');?> VND</span>
                    </div>
                    <div class="price-room">
                        <p id="p_number_night"><?php echo $_GET['number-night'];?> đêm</p>
                        <span class="span-price" id="title_price"><?php echo number_format($data['rooms']['price_night']*$_GET['number-night'], 0, ',', '.');
                                                                            $title_price=$data['rooms']['price_night']+$data['rooms']['taxes_and_fees'];?> VND</span>
                    </div>
                    <div class="price-room">
                        <p>Thuế và phí</p>
                        <span class="span-price"><?php echo number_format($data['rooms']['taxes_and_fees'], 0, ',', '.');
                                                                            $title_price=$data['rooms']['price_night']*$_GET['number-night']+$data['rooms']['taxes_and_fees'];?> VND</span>
                    </div>
                    
                    <div class="tital-price price-room">
                        <h5>Tổng giá</h5>
                        <h5 class="span-price number" id="p_price"><span id="number_price"><?php echo number_format($title_price, 0, ',', '.');?></span> VND</h5>
                    </div>
                    <span  style="    text-align: center;display: block;" class="span-thue"><i class="far fa-clock"></i>Hãy giữ phòng này ngay trước khi nó tăng cao hơn!</span><br>
                    
                    
                    
                    
                </div>
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
                <div class='input-date' style='display: flex;'>
                    <div class="form-group chidel-input-date">
                        <label for="exampleInputPassword1">Nhận phòng:</label>
                        <input type="date" class="input_date_in form-control" value="<?php echo $_GET['date_in']; ?>" name="date_in" id="input_in_date" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group margin-left chidel-input-date">
                        
                        <label for="exampleInputPassword1">Số đêm:</label>
                        <select class="custom-select" name="number_night" id="select_number_night" onchange="displayValue()">
                        <?php
                            echo "<option value='".$_GET['number-night']."'>".$_GET['number-night']." đêm</option>";
                            for($i=1;$i<=30;$i++){
                                
                                if($i!=$_GET['number-night']){
                                    echo "<option value='".$i."'>".$i." đêm</option>";
                                }
                            
                            
                            }
                        ?>
                        </select>
                    </div>
                    <div class='form-group margin-left chidel-input-date'>
                        <label for="exampleInputPassword1">Trả phòng:</label>
                        <div id="result" name="date_out"><?php

                            // Lấy ngày đầu vào từ query string
                            $dateInput = $_GET['date_in']; // Ví dụ: '2024-07-31'

                            // Lấy số ngày cần cộng từ query string
                            $numberOfDays = isset($_GET['number-night']) ? (int)$_GET['number-night'] : 0;

                            // Tạo đối tượng DateTime với ngày đầu vào
                            $date = new DateTime($dateInput);

                            // Cộng số ngày vào ngày đầu vào
                            $date->modify("+$numberOfDays days");

                            // Hiển thị kết quả
                            echo $date->format('Y-m-d');

                            ?></div>

                        
                        
                    </div>
                </div>
                <span class='div-number-user-kid'><i class="fas fa-user"></i>2 khách</span>
                <span class='div-number-user-kid'><i class="fas fa-baby"></i>2 trẻ em</span>
                <span class='div-number-user-kid'><i class="fas fa-bed"></i><?php echo $data['rooms']['type_bed'];?></span>
                <span class='div-number-user-kid'><i class='fas fa-ruler-combined'></i></i><?php echo $data['rooms']['room_width'];?> m2</span>
                </div>
                
                
                
                
            </div>
            <input type="hidden" name='date_in' value='<?php echo $_GET['date_in'];?>'>
            <input type="hidden" name='hotel' value='<?php echo $_GET['hotel'];?>'>
            <input type="hidden" name='id_room' value='<?php echo $_GET['id_room'];?>'>
            
            <button class="btn btn-primary" onclick="submitForm()">Tiếp tục thanh toán</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-dZ6w/JipjVHC9136+VZ2oZrjkgJVjFyfFp2cowp4caqF4NFj5caq2R8Qixtnw3lX" crossorigin="anonymous"></script>
    <script>
        
        function submitForm() {
            var username = document.getElementById("username_contact").value.trim();
            var email = document.getElementById("email_contact").value.trim();

            // Check if required fields are empty
            if (username === "" || email === "") {
                alert("Vui lòng điền đầy đủ thông tin bắt buộc.");
                return false; // Prevent form submission
            }

            // Continue with form submission
            document.getElementById("payment").submit();
        }
        
    </script>
    <script>
                function displayValue() {
                    // Lấy phần tử select
                    var selectElement = document.getElementById("select_number_night");

                    // Lấy giá trị của option đã chọn
                  var number_night = parseInt(selectElement.value); // Chuyển đổi giá trị thành số nguyên

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
                function suggestLocations() {
                    var input = document.getElementById('searchInput').value.toLowerCase(); // Get input value and convert to lowercase
                    var suggestionsDiv = document.getElementById('suggestions');
                    suggestionsDiv.innerHTML = ''; // Clear previous suggestions

                    if (input.length === 0) {
                        return; // If input is empty, do nothing
                    }

                    var matches = cities.filter(function(city) {
                        return city.toLowerCase().startsWith(input); // Filter cities that start with the input
                    });

                    if (matches.length > 0) {
                        matches.forEach(function(match) {
                            var p = document.createElement('p');
                            p.textContent = match;
                            suggestionsDiv.appendChild(p); // Append each match to suggestionsDiv
                        });
                    } else {
                        var p = document.createElement('p');
                        p.textContent = "No matching locations found";
                        suggestionsDiv.appendChild(p); // Display message if no matches found
                    }
                } 

            </script>

            <script src="./src/bootstrap-input-spinner.js"></script>
            <script>
                $("input[type='number']").inputSpinner()
            </script>

            <script>
                    var input = document.getElementById('cityInput');
                    var div = document.getElementById('list-search');
                    

                    

                    input.addEventListener('click', function() {
                      
                      div.classList.remove('display-none');
                      
                    });
                    
            </script>
            <script>
                
                document.getElementById('select_number_night').addEventListener('change', function() {
                var selectedValue = this.value;
                document.getElementById('p_number_night').textContent = selectedValue+" đêm ";
                var titlePrice=<?php echo $data['rooms']['price_night'];?>*selectedValue;
                document.getElementById('title_price').textContent = titlePrice.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }) ;
                var price=titlePrice+<?php echo $data['rooms']['taxes_and_fees'];?>;
                document.getElementById('p_price').textContent = price.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }) ;
               
                
            });
            </script>
            <script>
                // Lấy giá trị của thẻ h5
                var h5Value = document.getElementById('title').textContent;

                // Gán giá trị đó vào thẻ input
                document.getElementById('inputField').value = h5Value;
            </script>


                          <!-- Xử lý sự kiện thanh đổi input search địa chỉ thay đổi -->
                          <script>
                  // Lấy thẻ input và danh sách các mục li
                  const textInput = document.getElementById('cityInput');
                  const listItems = document.querySelectorAll('#myList li');

                  // Thêm sự kiện input cho thẻ input để tìm kiếm
                  textInput.addEventListener('input', function() {
                      // Lấy giá trị của input và chuyển thành chữ thường (lowercase) để so sánh dễ dàng hơn
                      const inputValue = textInput.value.toLowerCase();

                      // Lặp qua từng mục li để ẩn hoặc hiển thị tùy thuộc vào giá trị nhập vào
                      listItems.forEach(item => {
                          const text = item.textContent.toLowerCase();

                          // Nếu mục li chứa giá trị nhập vào, hiển thị; ngược lại ẩn đi
                          if (text.includes(inputValue)) {
                              item.style.display = 'block'; // Hoặc '' để reset lại display theo mặc định
                          } else {
                              item.style.display = 'none';
                          }
                      });
                  });

                  // Thêm sự kiện click cho từng mục <li> để đưa vào input khi click
                  listItems.forEach(item => {
                      item.addEventListener('click', function() {
                          // Lấy nội dung của mục <li> được click
                          const content = this.textContent.trim();

                          // Gán nội dung vào input
                          textInput.value = content;

                          var div = document.getElementById('list-search');
                          div.classList.add('display-none');
                      });
                  });
              </script>
</body>