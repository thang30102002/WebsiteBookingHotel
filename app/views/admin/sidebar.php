<div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
                <ul>
						<li class="active"> <a href="index"><i class="fas fa-tachometer-alt"></i> <span>Bảng điều khiển </span></a> </li>
						<li class="list-divider"></li>
						<li class="submenu"> <a href="#"><i class="fas fa-suitcase"></i> <span> Tài khoản khách hàng </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="manageClient"> Tất cả </a></li>
                                
                                
								
							</ul>
						</li>
						<li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span> Admin khách sạn </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="managerAdminHotel"> Tất cả </a></li>
                                
								
							</ul>
						</li>
						<li class="submenu"> <a href="#"><i class="fas fa-key"></i> <span> Đơn đặt phòng</span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="bookings">Tất cả </a></li>							
								
							</ul>
						</li>
						<li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span> Khách sạn </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="hotels">Tất cả </a></li>
								
							</ul>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
        <script>
            // Lấy tất cả các phần tử có lớp 'submenu'
            let submenus = document.querySelectorAll('.submenu');

            // Lặp qua từng phần tử và gắn sự kiện 'click'
            submenus.forEach(function(menu) {
                menu.addEventListener('click', function() {
                    let submenu = this.querySelector('.submenu_class');
                    
                    // Kiểm tra trạng thái hiển thị của ul và thay đổi tương ứng
                    if (submenu.style.display === "none" || submenu.style.display === "") {
                        submenu.style.display = "block";  // Hiển thị nếu đang ẩn
                    } else {
                        submenu.style.display = "none";  // Ẩn nếu đang hiển thị
                    }
                });
            });


        </script>