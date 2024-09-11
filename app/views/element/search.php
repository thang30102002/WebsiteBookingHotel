<html>
  <head>
    <link href="public/assets/clients/css/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="public/assets/clients/css/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="search_hotel" style="margin-bottom: 50px;">
      <?php 
        $data_search_city=array();
        foreach ($data['city'] as $item) {
          // Duyệt qua từng phần tử trong mảng con và thêm vào mảng mới
          foreach ($item as $key => $value) {
              $data_search_city[] = $value;
          }
        }
        
        $data_search_name_hotel=array();
        foreach ($data['name_hotel'] as $item) {
          // Duyệt qua từng phần tử trong mảng con và thêm vào mảng mới
          foreach ($item as $key => $value) {
              $data_search_name_hotel[] = $value;
          }
        }
        

        $data_all=array_merge($data_search_city,$data_search_name_hotel);
        //
        //print_r($data_all);
        
      ?>
      
      <form action="Search" method="get" >
        <div class="form-group">
          <label for="exampleInputEmail1">Thành phố, địa điểm hoặc tên khách sạn:</label>
          <div class='form-input'>
            
            <input type="text" class="form-control input-city" id="cityInput" aria-describedby="emailHelp" name="address" placeholder="Nhập địa chỉ hoặc tên khách sạn"><i class="fas fa-map-marker-alt"></i></input>
            
          </div>
          <div class="list-search display-none" id="list-search">
              <p class="title">Thành phố phổ biến</p>
              
              <ul id="myList">
                <?php
                  for($i=0;$i<count($data_search_city);$i++)
                  {

                    echo "
                        <li class='li-search'>
                          
                          ".$data_search_city[$i]."
                        </li>
                    ";
                  }
                ?>
                      <p class="title">Khách sạn phổ biến</p>
                <?php
                  for($i=0;$i<count($data_search_name_hotel);$i++)
                  {

                    echo "
                        <li class='li-search'>
                          
                          ".$data_search_name_hotel[$i]."
                        </li>
                    ";
                  }
                ?>
                
                
              </ul>
            </div>
        
        </div>
        <div class='input-date'>
          <div class="form-group chidel-input-date">
            <label for="exampleInputPassword1">Nhận phòng:</label>
            <input type="date" class="input_date_in form-control" value="<?php echo date('Y-m-d'); ?>" name="date_in" id="input_in_date" aria-describedby="emailHelp">
          </div>
          <div class="form-group margin-left chidel-input-date">
            
            <label for="exampleInputPassword1">Số đêm:</label>
            <select class="custom-select" name="number-night" id="select_number_night" onchange="displayValue()">
              <?php
                for($i=1;$i<=30;$i++){
                  echo "<option value='".$i."'>".$i." đêm</option>";
                }
              ?>
            </select>
          </div>
          <div class='form-group margin-left chidel-input-date'>
            <label for="exampleInputPassword1">Trả phòng:</label>
            <div id="result" name="date_out"></div>
            <input type='hidden' name='date_out' value='' >
            
          </div>
        </div>
        <span>
            Khách và phòng
        </span><br/>
        <div class="form-group form-input-quantity">
          <div class='input-quantity'>
            <label for="quantity_people">Người lớn:</label>
            <input type="number" var="1" value="1" id="quantity_people" name="quantity_adult" min="1" max="30">
          </div>
          <div class='input-quantity'>
            <label for="quantity_childel">Trẻ em:</label>
            <input type="number" var="0" value="0" id="quantity_childel" name="quantity_childel" min="0" max="30">
          </div>
          <div class='input-quantity'>
            <label for="quantity_childel">Phòng:</label>
            <input type="number" var="1" value="1" id="quantity_room" name="quantity_room" min="1" max="30">
          </div>
          <div class='input-quantity'>
            
            <button type="submit" class="btn btn-primary btn-search"><i class="fas fa-search"></i>Tìm phòng</button>
          </div>
        </div>
        <div>
          
        </div>
      
        
      </form>
    </div>

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
</html>