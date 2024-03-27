<header  class="row no-gutters fixed-top">
    <style>
        /* CSS tùy chỉnh cho header */
.header_inner {
    padding: 20px;
    background-color: #f8f9fa; /* Màu nền header */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Đổ bóng */
}

.logo img {
    width: auto;
    height: 50px; /* Điều chỉnh chiều cao của logo */
}

.main_nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.main_nav ul li {
    display: inline-block;
    margin-right: 20px;
}

.main_nav ul li a {
    color: #333; /* Màu chữ cho menu */
    text-decoration: none;
    transition: color 0.3s ease; /* Hiệu ứng hover */
}

.main_nav ul li a:hover {
    color: #6c757d; /* Màu chữ khi di chuột vào */
}

.search_input {
    padding: 10px;
    border: none;
    border-radius: 25px; /* Bo tròn ô tìm kiếm */
    background-color: #fff; /* Màu nền ô tìm kiếm */
    transition: all 0.3s ease; /* Hiệu ứng chuyển đổi */
}

.search_input:focus {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Đổ bóng khi ô tìm kiếm được focus */
}

.search_button {
    background-color: #ff6700; /* Màu nút tìm kiếm */
    border: none;
    border-radius: 25px; /* Bo tròn nút tìm kiếm */
    padding: 10px 20px;
    cursor: pointer;
    transition: all 0.3s ease; /* Hiệu ứng chuyển đổi */
}

.search_button:hover {
    background-color: #d45a00; /* Màu nút tìm kiếm khi di chuột vào */
}

.shopping img {
    width: 30px;
    height: 30px;
}

.avatar {
    display: flex;
    align-items: center;
}

.avatar img {
    width: 30px;
    height: 30px;
    border-radius: 50%; /* Hình tròn cho ảnh đại diện */
    margin-right: 5px;
}

.avatar p {
    margin: 0;
    font-weight: bold;
    color: #333;
    transition: color 0.3s ease; /* Hiệu ứng hover */
}

.avatar p:hover {
    color: #6c757d; /* Màu chữ khi di chuột vào */
}

    </style>

  <section class="col-12">
    <div class="header_inner d-flex flex-row align-items-center justify-content-between">
        <div class="logo"><a href="#">Kissnote</a></div>
        <nav class="main_nav">
            <ul>
                <li><a href="index.php?act=home_action">Trang Chủ</a></li>
                <?php if(!isset($_SESSION['makh'])) { ?>
                    <li><a href="index.php?action=dangky">Đăng Ký</a></li>
                    <li><a href="index.php?action=dangnhap">Đăng Nhập</a></li>
                <?php } else { ?>
                    <!-- Ẩn liên kết "Đăng Xuất" khi đã đăng nhập -->
                <?php } ?>
                <?php if(isset($_SESSION['makh'])) { ?>
                    <li><a href="index.php?action=dangnhap&act=dangxuat">Đăng Xuất</a></li>
                <?php } ?>
            </ul>
        </nav>
        <div class="search header_search">
                <form action="index.php?action=sanpham&act=timkiem" method="post">
                    <input style="left: 400px; width:400px;"  type="text" name="txtsearch" class="search_input " placeholder="Tìm Kiếm">
                    <button style="left: 300px; width:85px; margin-top:2px;" type="submit" id="search_button" class="search_button">
                       
                    </button>
                </form>
            </div>
        <div class="header_content">
            
            <div class="shopping">
                <a href="index.php?action=giohang">
                    <img src="images/shopping-bag.svg" alt="Giỏ Hàng">
                </a>
                <a href="#">
                    <div class="avatar">
                        <?php if(isset($_SESSION['makh'])) { ?>
                            
                            <p><?php echo $_SESSION['tenkh']; ?></p>
                        <?php } else { ?>
                            <p>Xin chào</p>
                        <?php } ?>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>



</header>
