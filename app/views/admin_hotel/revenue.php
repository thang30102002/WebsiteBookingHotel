<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Doanh thu khách sạn</title>
	<link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
	<link rel="stylesheet" href="../assets/css/feathericon.min.css">
	<link rel="stylesheet" href="../assets/plugins/morris/morris.css">
	<link rel="stylesheet" href="../assets/css/style.css"> </head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<body>
	<div class="main-wrapper">
	<?php $this->render('element/header-admin-hotel',$data);?>
		<?php $this->render('element/sidebar-admin');?>
		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<div class="mt-5" style="    position: relative;
    display: flex;">
								<h4 class="card-title float-left mt-2">Doanh thu khách sạn</h4>
                               
                            </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="card card-table">
							<div class="card-body booking_card">
                            <label for="yearSelect">Chọn năm:</label>
                            <select id="yearSelect">
                                <option value=""><?php echo $_GET['year'];?></option>
                                
                                <!-- Sẽ tự động thêm các năm bằng JavaScript -->
                            </select>
                            <p id="result"></p>
                                <canvas id="myChart" width="400" height="200"></canvas>
                                
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
    <script>
        // Thêm danh sách năm từ 2020 đến 2025 vào select
        const endYear  = new Date().getFullYear();
        const startYear = endYear  - 10;  // Ví dụ: từ 10 năm trước

        const selectElement = document.getElementById("yearSelect");

        for (let year = startYear; year <= endYear; year++) {
            let option = document.createElement("option");
            option.value = year;
            option.textContent = year;
            selectElement.appendChild(option);
        }

        // Lắng nghe sự kiện thay đổi (change) của select
        selectElement.addEventListener("change", function() {
            const selectedYear = this.value;
            if (selectedYear) {
                // Hiển thị kết quả (hoặc có thể thực hiện các thao tác lấy dữ liệu)
                document.getElementById("result").textContent = "Dữ liệu cho năm: " + selectedYear;
                // Giá trị mới mà bạn muốn gán
                var newValue = selectedYear;

                // Tạo URL mới với giá trị GET mới
                var currentUrl = window.location.href;
                var newUrl;

                if (currentUrl.includes("?")) {
                    // Nếu URL đã có query string, thêm hoặc cập nhật giá trị
                    newUrl = currentUrl.split("?")[0] + "?year=" + encodeURIComponent(newValue);
                } else {
                    // Nếu URL chưa có query string
                    newUrl = currentUrl + "?year=" + encodeURIComponent(newValue);
                }

                // Chuyển hướng sang URL mới
                window.location.href = newUrl;
                
                // Thực hiện lấy dữ liệu ở đây (giả sử sử dụng fetch hoặc AJAX)
                // fetchDataForYear(selectedYear);  // Ví dụ: Gọi API hoặc thực hiện thao tác khác
            } else {
                document.getElementById("result").textContent = "Vui lòng chọn một năm!";
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar', // Loại biểu đồ: bar (biểu đồ cột)
            data: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'], // Các nhãn trục x
                datasets: [<?php
                    for($i=0;$i<count($data['room']);$i++)
                    {
                        $backgroundColors = [
                            "'rgba(255, 99, 132, 0.5)'", "'rgba(54, 162, 235, 0.5)'", "'rgba(75, 192, 192, 0.5)'",
                            "'rgba(153, 102, 255, 0.5)'", "'rgba(255, 159, 64, 0.5)'", "'rgba(255, 206, 86, 0.5)'",
                            "'rgba(231, 233, 237, 0.5)'", "'rgba(201, 203, 207, 0.5)'", "'rgba(139, 0, 139, 0.5)'",
                            "'rgba(0, 128, 128, 0.5)'", "'rgba(0, 255, 0, 0.5)'", "'rgba(255, 0, 255, 0.5)'"
                        ];
                        $this->Booking= new BookingModel;
                        
                        for($y=1;$y<=12;$y++)
                        {
                            $reve[$y]=$this->Booking->getRevenueRoomMonth($data['room'][$i]['room_id'],$y,$_GET['year']);
                        }
                        
                        echo "{
                            label: '".$data['room'][$i]["room_name"]."',
                            data: [".$reve[1]["total_revenue"].", ".$reve[2]["total_revenue"].", ".$reve[3]["total_revenue"].", ".$reve[4]["total_revenue"].", ".$reve[5]["total_revenue"].", ".$reve[6]["total_revenue"].", ".$reve[7]["total_revenue"].", ".$reve[8]["total_revenue"].", ".$reve[9]["total_revenue"].", ".$reve[10]["total_revenue"].", ".$reve[11]["total_revenue"].", ".$reve[12]["total_revenue"]."], // Dữ liệu booking confirmed
                            backgroundColor: ".$backgroundColors[$i].", // Màu nền cột
                            borderColor: 'rgba(255, 99, 132, 1)', // Màu viền cột
                            borderWidth: 1,
                            yAxisID: 'y', // Liên kết với trục y
                        },";
                    }
                ?> ]
            },
            options: {
                scales: {
                    y: { // Trục y cho booking confirmed
                        beginAtZero: true,
                        position: 'left',
                        title: {
                            display: true,
                            text: 'Doanh thu vnđ'
                        }
                    },
                    
                }
            }
        });
        </script>

	<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="../assets/js/jquery-3.5.1.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="../assets/plugins/datatables/datatables.min.js"></script>
	<script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/plugins/raphael/raphael.min.js"></script>
	<script src="../assets/js/script.js"></script>
    <script>
        function searchTable() {
        const input = document.getElementById('searchInput');
        const filter = input.value.toLowerCase();
        const table = document.getElementById('dataTable');
        const trs = table.getElementsByTagName('tr');

        for (let i = 1; i < trs.length; i++) {
            let showRow = false;
            const tds = trs[i].getElementsByTagName('td');
            for (let j = 0; j < tds.length; j++) {
            if (tds[j].textContent.toLowerCase().includes(filter)) {
                showRow = true;
                break;
            }
            }
            trs[i].style.display = showRow ? '' : 'none';
        }
        }

    </script>
</body>

</html>