<header class="row no-gutters">
    <!-- nav san pham -->
    <section class="col-12" style="height:40px; width:100%">
        <!-- <div class="col-12"> -->
        <!-- <div class="container"> -->

        <!-- test -->
        <nav class="navbar navbar-expand-sm bg-light navbar-light">
            <div class="container">
                <!-- Brand -->
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=hanghoa"
                            style="font-family: 'Gigi', serif; font-size: 40px; margin-top: -6px;">
                            Kissnote
                        </a>
                    </li>
                </ul>

                <!-- Links -->
                <ul class="navbar-nav col-md-10 list-inline">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=hanghoa">Trang Chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Quản lý
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?action=user">Quản lý người dùng</a>
                            <a class="dropdown-item" href="index.php?action=qlhoadon">Quản lý đơn hàng</a>
                            <a class="dropdown-item" href="index.php?action=qlhoadon&act=nhanvien">Quản lý nhân viên</a>
                            <a class="dropdown-item" href="index.php?action=qlhoadon&act=khachhangchi">Khách hàng chi nhiều</a>
                        </div>
                    </li>
                    <!-- Quản trị Doanh Mục -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Quản Trị Doanh Mục
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?action=loai">Loại Sản Phẩm</a>
                            <a class="dropdown-item" href="index.php?action=size">Size Sản Phẩm</a>
                            <a class="dropdown-item" href="index.php?action=hang">Studio</a>
                    </li>
                    <!-- Thống kê -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="index.php?action=thongke">

                        </a>
                    </li>
                    <!-- Báo cáo -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Thống Kê
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?action=thongke&act=thongkengay">Ngày</a>
                            <a class="dropdown-item" href="index.php?action=thongkethang">Tháng</a>
                            <a class="dropdown-item" href="index.php?action=thongke">Năm</a>
                            <a class="dropdown-item" href="index.php?action=thongke&act=thongkehoanthanh">Hoàn thành</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Thống Kê Doanh Thu
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?action=thongkethang&act=doanhthuthang">Doanh Thu
                                Tháng</a>
                            <a class="dropdown-item" href="index.php?action=thongkethang&act=doanhthunam">Doanh Thu Năm</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=tonkho">Tồn Kho</a>
                    </li>
                    <?php
                    if (isset($_SESSION['admin'])) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=dangnhap&act=dangxuat">Đăng xuất</a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=dangnhap">Đăng nhập</a>
                        </li>
                    <?php }
                    ; ?>
                </ul>
            </div>
        </nav>
        <!-- end test -->
        <!-- </div> -->
        <!-- </div> -->

    </section>



</header>
<!-- dang ky -->