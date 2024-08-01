<header class="row no-gutters fixed-top">
    <style>
        /* CSS tùy chỉnh cho header */
        .header_inner {
            font-family: 'Times New Roman', Times, serif;
            padding: 5px;
            background-color: #f8f9fa;
            /* Màu nền header */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Đổ bóng */
        }

        .logo {

            margin-left: 75px;
            width: auto;
            height: 50px;
            /* Điều chỉnh chiều cao của logo */
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
            color: #333;
            /* Màu chữ cho menu */
            text-decoration: none;
            transition: color 0.3s ease;
            /* Hiệu ứng hover */
        }

        .main_nav ul li a:hover {
            color: Orange;
            /* Màu chữ khi di chuột vào */
        }

        .search_input {
            padding: 10px;
            border: none;
            border-radius: 25px;
            /* Bo tròn ô tìm kiếm */
            background-color: #fff;
            /* Màu nền ô tìm kiếm */
            transition: all 0.3s ease;
            /* Hiệu ứng chuyển đổi */
        }

        .search_input:focus {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Đổ bóng khi ô tìm kiếm được focus */
        }

        .search_button {
            background-color: orange;
            /* Màu nút tìm kiếm */
            border: none;
            border-radius: 25px;
            /* Bo tròn nút tìm kiếm */
            padding: 10px 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            /* Hiệu ứng chuyển đổi */
        }

        .search_button:hover {
            background-color: #d45a00;
            /* Màu nút tìm kiếm khi di chuột vào */
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
            border-radius: 50%;
            /* Hình tròn cho ảnh đại diện */
            margin-right: 5px;

        }

        .avatar p {
            margin: 0;
            font-weight: bold;
            color: #333;
            transition: color 0.3s ease;
            /* Hiệu ứng hover */
        }

        .avatar p:hover {
            color: #6c757d;
            /* Màu chữ khi di chuột vào */
        }

        .dropdown-item a {
            margin: 0;
            font-weight: bold;
            color: black;

        }

        .unhover:hover {
            background-color: unset;
        }

        /* CSS tùy chỉnh cho menu tài khoản */
        .nav-item.dropdown {
            position: relative;
        }

        .dropdown-menu {

            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            float: left;
            min-width: 21rem;
            /* Điều chỉnh chiều rộng của dropdown menu */
            padding: 0.5rem 0;
            margin: 0.125rem 0 0;
            font-size: 16px;
            /* Điều chỉnh cỡ chữ cho menu */
            color: #212529;
            text-align: left;
            list-style: none;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: 0.25rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.175);
        }

        .dropdown-item {

            display: block;
            width: 100%;
            padding: 0.5rem 1rem;
            /* Điều chỉnh khoảng cách giữa các mục */
            clear: both;
            font-weight: 400;
            color: #212529;
            text-align: inherit;
            white-space: nowrap;
            background-color: transparent;
            border: 0;
        }



        .dropdown-menu.show {
            display: block;
        }

        #dropdownC {
            display: none;
            position: absolute;
            left: 85px;
            top: 95%;
        }

        #dropdownC.show {
            display: block;
        }

        .img {
            border: 1px solid #ccc;
            /* Đường viền của khung */
            border-radius: 8px;
            /* Bo tròn góc khung */
            padding: 3px;
            /* Đệm bên trong khung */
            overflow: hidden;
            /* Đảm bảo không có phần tử nào tràn ra ngoài */
            position: relative;
            /* Để định vị chính xác nút xóa */
        }



        .mini-cart {
            display: none;
            /* Ẩn giỏ hàng mini ban đầu */
            position: absolute;
            right: -55px;
            /* Điều chỉnh vị trí của giỏ hàng mini */
            top: 60px;
            /* Điều chỉnh vị trí của giỏ hàng mini */
            width: 400px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 15px;
            z-index: 1000;
            background: #f4f4f4;
        }

        .mini-cart ul {
            list-style: none;
            padding: 0;
            margin: 0;
            max-height: 350px;
            /* Giới hạn chiều cao của danh sách sản phẩm */
            overflow-y: auto;
            /* Thêm thanh cuộn dọc nếu danh sách sản phẩm vượt quá chiều cao */
            background: white;
            margin-top: 15px;
        }

        .mini-cart .cart-total {
            font-weight: bold;
            margin-top: 15px;
            text-align: right;
            background: white;
            height: 40px;
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            font-size: large;
        }

        .mini-cart .btn {
            display: block;
            text-align: center;
            margin-top: 10px;
        }

        .mini-cart h3 {
            background: #d92323;
            color: white;
            height: 50px;
            display: flex;
            align-content: center;
            text-align-last: center;
            flex-wrap: wrap;
            justify-content: center;
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold
        }

        .mini-cart hr {
            margin-top: -1px;
        }

        .delete-hh span {
            background: #787171;
            color: white;
            height: 20px;
            width: 20px;
            position: absolute;
            left: 20%;
            bottom: 82%;
            border-radius: 50%;
            display: flex;
            align-content: space-around;
            justify-content: center;
            flex-wrap: wrap;
        }

        .thoat {
            transform: translate(-50%, -50%);
            color: black;
            font-size: 20px;
            line-height: 1;
        }

        .buta {
            padding: 8px 16px;
            font-size: 14px;
        }

        .giomini {
            background: #f4f4f4;
            display: flex;
            align-content: space-around;
            flex-wrap: wrap;
            font-size: x-large;
            font-weight: bold;
            color: #5a55554d;
            height: 100px;
            justify-content: center;
        }
    </style>
    <section class="col-md-12">
        <div class="header_inner d-flex flex-row align-items-center justify-content-between">
            <nav class="main_nav logo">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <a href="index.php?act=home"
                        style="font-family: 'Gigi', serif;font-size: 40px; margin-top: -6px;">Kissnote</a>
                </ul>
                <!-- <ul>
                    <li><a href="index.php?act=home_action">Trang Chủ</a></li>
                    <li><a href="index.php?action=phanloai&act=op">Trang Chủ</a></li>
                    <li><a href="index.php?action=phanloai&act=aot">Trang Chủ</a></li>
                </ul> -->
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="index.php?action=phanloai&act=gundam">GunDam</a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown" onmouseover="showDropdown()" onmouseout="hideDropdown()">
                        <a class="nav-link dropdown-toggle" id="dropdownId" aria-haspopup="true" aria-expanded="false">
                            FigureAnime</a>
                        <div id="dropdownContent" class="dropdown-menu" aria-labelledby="dropdownId">
                            <?php
                            $loai = new hanghoa();
                            $result = $loai->getLoai();
                            while ($set = $result->fetch()):
                                ?>
                                <h5><a class="dropdown-item"
                                        href="index.php?action=sanpham&act=loai&maloai=<?php echo $set['maloai'] ?>&tenloai=<?php echo $set['tenloai'] ?>"><?php echo $set['tenloai'] ?></a>
                                </h5>
                            <?php endwhile; ?>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="index.php?action=sanpham&act=sanphamkhuyenmai">Sale</a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown" onmouseover="sDropdown()" onmouseout="hDropdown()">
                        <a class="nav-link dropdown-toggle" id="dropdownId" aria-haspopup="true" aria-expanded="false">
                            Thông tin</a>
                        <div id="dropdown" class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="nav-link" style="margin-left:10px;"
                                href="index.php?action=home&act=chinhsach">Chính Sách Mua Hàng</a>
                            <a class="nav-link" style="margin-left:10px;"
                                href="index.php?action=home&act=csdoitra">Chính Sách Đổi Trả</a>
                            <a class="nav-link" style="margin-left:10px;"
                                href="index.php?action=home&act=gioithieu">Giới Thiệu</a>
                            <a class="nav-link" style="margin-left:10px;" href="index.php?action=home&act=lienhe">Liên
                                Hệ</a>
                        </div>

                    </li>
                </ul>
            </nav>
            <nav>
                <div class="search header_search">
                    <form action="index.php?action=sanpham&act=timkiem" method="post">
                        <input style="position: relative;left: -60px; width: 300px;" type="text" name="txtsearch"
                            class="search_input " placeholder="Tìm Kiếm">
                        <button style="left: 140px; width:85px; margin-top:2px;" type="submit" id="search_button"
                            class="search_button"><i style="color:white; position: absolute;top: 2px;left: 34px;"
                                class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
            </nav>
            <div class="shopping">
                <div class="collapse navbar-collapse " id="collapsibleNavbar" style="margin-top:5px;">

                    <nav class="navbar_var">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">


                            <li class="nav-item dropdown">
                                <a href="index.php?action=sanpham&act=sanphamyeuthich">
                                    <a href="index.php?action=sanpham&act=sanphamyeuthich" class="image-container">
                                        <img class="img" src="images/option_3.png" alt=""
                                            style="vertical-align: middle;">
                                        <span class="number"
                                            style=" color: black;background: white;border-radius: 30%;width: 30px;text-align: center;position: absolute;left: 22px;top: 34px; display: inline-block; vertical-align: middle;">
                                            <?php
                                            if (isset($_SESSION['makh'])) {
                                                $makh = $_SESSION['makh'];
                                                $gh = new hanghoa();
                                                $yt = $gh->YeuThich($makh);
                                                $set = $yt->fetch();
                                                echo isset($set["mahh"]) ? $set['mahh'] : 0;
                                            } else {
                                                echo 0;
                                            }
                                            ?>
                                        </span>
                                    </a>
                                </a>
                                <a href="index.php?action=lichsu">
                                    <img class="img" src="images/option_1.png" alt="Lịch Sử">
                                </a>
                                <a>
                                    <img class="img" src="images/option_2.png" alt="Giỏ Hàng"
                                        style="vertical-align: middle;">
                                    <span
                                        style="position: absolute;top: 34px;left: 110px;background: white;border-radius: 30%;width: 30px;text-align: center;color: black;display: inline-block;vertical-align: middle;">
                                        <?php
                                        if (isset($_SESSION['cart'])) {
                                            $gh = new giohang();
                                            echo $gh->getTong();
                                        } else {
                                            echo '0';
                                        }
                                        ?>
                                    </span>
                                </a>
                                <div id="miniCart" class="mini-cart">
                                    <h3>GIỎ HÀNG</h3>
                                    <ul id="cartItems" style="scrollbar-width: none;">
                                        <!-- Danh sách sản phẩm trong giỏ hàng -->
                                        <?php
                                        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                            foreach ($_SESSION['cart'] as $key => $item) {
                                                ?>
                                                <div class="col-md-12">
                                                    <hr>
                                                    <div class="col-md-3">
                                                        <img style="width:80px; height:110px; "
                                                            src="Content/imagetourdien/<?php echo $item['hinh']; ?>">
                                                        <a href="index.php?action=giohang&act=delete_cart&id=<?php echo $key; ?>"
                                                            class="delete-hh" onclick="return confirmDelete(event);">
                                                            <span class="thoat">&times;</span>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <b><?php echo $item['tenhh']; ?></b>
                                                        <br> Size:
                                                        <?php echo $item['size']; ?>
                                                        <br>
                                                        Đơn Giá:
                                                        <?php
                                                        if ($item['giamgia'] > 0) {
                                                            echo number_format($item['giamgia']);

                                                        }
                                                        if ($item['giamgia'] <= 0) {
                                                            echo number_format($item['dongia']);
                                                        }
                                                        ?><sup><u>đ</u></sup><br>
                                                        Số lượng:
                                                        <?php
                                                        if ($item['soluong'] > $item['soluongton']) {
                                                            echo $item['soluongton'];
                                                        } else {
                                                            echo $item['soluong'];
                                                        }
                                                        ?>
                                                        <b style="float: right;">
                                                            <?php echo number_format($item['thanhtien']); ?>
                                                            <sup><u>đ</u></sup>
                                                        </b>

                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </ul>
                                        <div class="cart-total">
                                            Tổng: <span id="cartTotal">
                                                <?php
                                                $gh = new giohang();
                                                $subTotal = $gh->getSubTotal();
                                                echo number_format($subTotal) . '<sup><u>đ</u></sup>';
                                                ?>
                                            </span>
                                        </div>
                                    <?php } else {
                                            echo '<div class="giomini">Giỏ hàng bạn đang trống</div>';
                                        } ?>
                                    <a href="index.php?action=giohang" class="buta btn btn-danger">Xem giỏ hàng</a>
                                </div>
                                <i class="fa-solid fa-user"></i><a href="index.php?action=home&act=home"
                                    id="navbarDropdownMenuLink3" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <div class="avatar">
                                        <?php if (isset($_SESSION['makh'])) { ?>
                                            <p><?php
                                            $makh = $_SESSION['makh'];
                                            $us = new user();
                                            $kh = $us->selectThongTinKH($makh);
                                            $tenkh = $kh['tenkh'];
                                            echo $tenkh; ?></p>
                                        <?php } else { ?>
                                            <br>
                                            <p>Tài Khoản</p>
                                        <?php } ?>
                                    </div>
                                </a>
                                <div class="dropdown-menu" id="dropdownC" aria-labelledby="navbarDropdownMenuLink3">
                                    <nav class="dropdown-item unhover">
                                        <ul>
                                            <?php if (!isset($_SESSION['makh'])) { ?>
                                                <li><a href="index.php?action=dangky">Đăng Ký</a></li>
                                                <br>
                                                <li><a href="index.php?action=dangnhap">Đăng Nhập</a></li>
                                            <?php } else { ?>
                                                <!-- Ẩn liên kết "Đăng Xuất" khi đã đăng nhập -->
                                            <?php } ?>
                                            <?php if (isset($_SESSION['makh'])) { ?>
                                                <li><a href="index.php?action=user"> Thông Tin Khách Hàng</a></li>
                                                <br>
                                                <li><a href="index.php?action=dangnhap&act=dangxuat">Đăng Xuất</a></li>

                                            <?php } ?>
                                        </ul>
                                    </nav>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
</header>
<script>
    function showDropdown() {
        var dropdownContent = document.getElementById("dropdownContent");
        dropdownContent.classList.add("show");
        dropdownContent.style.display = "block";
        dropdownContent.style.position = "absolute";
        dropdownContent.style.left = "0";
        dropdownContent.style.top = "100%";
    }

    function hideDropdown() {
        var dropdownContent = document.getElementById("dropdownContent");
        dropdownContent.classList.remove("show");
        dropdownContent.style.display = "none";
    }


    function sDropdown() {
        var dropdown = document.getElementById("dropdown");
        dropdown.classList.add("show");
        dropdown.style.display = "block";
        dropdown.style.position = "absolute";
        dropdown.style.left = "0";
        dropdown.style.top = "100%";
    }

    function hDropdown() {
        var dropdown = document.getElementById("dropdown");
        dropdown.classList.remove("show");
        dropdown.style.display = "none";
    }


    // Hàm mở hoặc đóng dropdown menu
    function toggleDropdown() {
        var dropdownC = document.getElementById("dropdownC");
        dropdownC.classList.toggle("show");
    }

    // Thêm sự kiện click vào user icon để mở hoặc đóng dropdown menu
    document.getElementById("navbarDropdownMenuLink3").addEventListener("click", toggleDropdown);

    // Thêm sự kiện click vào trang web để đóng dropdown menu nếu người dùng bấm ra ngoài
    document.addEventListener("click", function (event) {
        var dropdownC = document.getElementById("dropdownC");
        var dropdownIcon = document.getElementById("navbarDropdownMenuLink3");

        // Kiểm tra xem phần tử được bấm có nằm trong dropdown menu hoặc icon của nó không
        var isClickInsideDropdown = dropdownC.contains(event.target);
        var isClickOnDropdownIcon = dropdownIcon.contains(event.target);

        // Nếu không phải là bấm vào dropdown menu hoặc icon của nó, đóng menu
        if (!isClickInsideDropdown && !isClickOnDropdownIcon) {
            dropdownC.classList.remove("show");
        }
    });
    document.addEventListener("DOMContentLoaded", function () {
        var cartIcon = document.querySelector(".shopping img[src='images/option_2.png']");
        var miniCart = document.getElementById("miniCart");

        cartIcon.addEventListener("click", function (event) {
            event.stopPropagation(); // Ngăn chặn sự kiện click lan rộng
            miniCart.classList.toggle("show");
        });

        // Đóng giỏ hàng mini khi click ra ngoài
        document.addEventListener("click", function (event) {
            if (!miniCart.contains(event.target) && !cartIcon.contains(event.target)) {
                miniCart.classList.remove("show");
            }
        });
    });
    function confirmDelete(event) {
        event.preventDefault();
        const link = event.currentTarget.href;

        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa?',
            text: "Hành động này không thể hoàn tác!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Vâng, xóa nó!',
            cancelButtonText: 'Hủy bỏ'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
            }
        });

        return false;
    }

</script>