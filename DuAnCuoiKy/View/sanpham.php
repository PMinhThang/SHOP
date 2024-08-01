<!-- end số lượt xem san phẩm -->
<!-- sản phẩm-->

<?php
include_once "./View/anhdong.php";
?>

<!--Section: Examples-->
<section id="examples" class="text-center" style="font-family: 'Times New Roman', Times, serif; ">
    <?php
    $ac = 1;
    if (isset($_GET['action'])) {
        if (isset($_GET['act']) && $_GET['act'] == 'sanpham') {
            $ac = 1;
        } elseif (isset($_GET['act']) && $_GET['act'] == 'sanpham1') {
            $ac = 2;
        } elseif (isset($_GET['act']) && $_GET['act'] == 'sanpham2') {
            $ac = 3;
        } elseif (isset($_GET['act']) && $_GET['act'] == 'sanpham3') {
            $ac = 4;
        } elseif (isset($_GET['act']) && $_GET['act'] == 'loai') {
            $ac = 5;
        }
    }
    ?>
    <!-- Heading -->
    <div class="col-md-12">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-8 text-right">
                    <?php
                    $loai = new hanghoa();
                    $result = $loai->getLoai();
                    if (!isset($_GET['maloai'])){
                        echo '<h3 class="product_name text-left"><u><i>Tất cả sản phẩm</i></u></h3>';
                    }else{
                        while ($set = $result->fetch()):
                            if ($_GET['maloai'] == $set['maloai']) {
                                echo '<h3 class="product_name text-left"><u><i>'.$set['tenloai'].'</i></u></h3>';
                            }
                        endwhile; 
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
        if ($ac != 5) {
            ?>
            <div class="col-md-6">
                <div class="row">
                    <select class="form-control" id="mySelect"
                        style="width:180px;position: relative; left: 67%;font-size: medium; height: 40px;">
                        <option value="index.php?action=sanpham&act=sanpham">Tất cả</option>
                        <option value="index.php?action=sanpham&act=sanpham1">Đơn giá tăng dần</option>
                        <option value="index.php?action=sanpham&act=sanpham2">Đơn giá giảm dần</option>
                        <option value="index.php?action=sanpham&act=sanpham3">Sắp xếp A - Z</option>
                    </select>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <!-- Product -->
    <div class="row">
        <?php
        $hh = new hanghoa();
        //b1 :xác định trang mình đang phân trang có bao nhieu sản phẩm
        //cách 1: dùng count
        // $count=$hh->getCountHangHoaAll();14
        // cách 2:
        $count = $hh->getHangHoaAll()->rowCount();//14
        
        //b2 : giới hạn 1 trang bao nhiêu sản phẩm, tự cho tùy bào thiết kế
        $limit = 20;
        //b3: tính ra số trang dựa trên tổng sản phẩm và limit
        $trang = new page();
        //lấy ra có bao nhiêu trang
        $page = $trang->findPage($count, $limit);//2
        //lấy ra start
        $start = $trang->findStart($limit);//8
        if ($ac == 1) {
            $result = $hh->getHangHoaAllPage($start, $limit);
            // $result=$hh->getHangHoaAll();// lấy được 14 sản phẩm *****
        }
        if ($ac == 2) {
            $gg = new locsanpham();
            $result = $gg->getAllU($start, $limit);// phân trang
        }
        if ($ac == 3) {
            $gg = new locsanpham();
            $result = $gg->getAllD($start, $limit);// phân trang
        }
        if ($ac == 4) {
            $gg = new locsanpham();
            $result = $gg->getAllAZ($start, $limit);// phân trang
        }
        if ($ac == 5) {
            $gg = new hanghoa();
            $result = $gg->getLoaiID($_GET['maloai']);// phân trang
        }


        while ($set = $result->fetch()):
            ?>

            <!--Grid column-->

            <?php
            if ($set['trangthai'] == 0) {
                ?>
                <div class="col-lg-3 col-md-4 mb-3 text-left">
                    <a href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh']; ?>">
                        <div class="product">
                            <div class="view overlay z-depth-1-half">
                                <img style="border-radius: 55px 55px 0 0;width:1000px;height:350px;"
                                    src="Content\imagetourdien\<?php echo $set['hinh']; ?>" class="img-fluid" alt="">
                                <div style="border-radius: 0 0 55px 55px;" class="promo_link"> <a
                                        href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh']; ?>">Mua
                                        ngay</a></div>
                                <div class="mask rgba-white-slight"></div>
                            </div>
                            <a href="">
                                <div class="product_name">
                                    <a><span><?php echo $set['tenhh'] ?></span></a>
                                </div>
                            </a>

                        </div>

                        <?php

                        if (number_format($set['giamgia']) > 0) {
                            echo ' <div class="product_price text-left" >
                             <font color="red">' . number_format($set['giamgia']) . '<sup><u>đ</u></sup></font>
                            <strike>' . number_format($set['dongia']) . '</strike><sup><u>đ</u></sup>
                           </div>';
                        } else {
                            echo '<div class="product_price text-left">' . number_format($set['dongia']) . '<sup><u>đ</u></sup></div>';
                        }

                        ?>
                        <div class="product_name text-left">
                            <h5 style="font-family: 'Times New Roman', Times, serif; display: flex; align-items: center;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <b>Số lượt xem:</b> <?php echo $set['soluotxem']; ?>
                                    </div>
                                    <div class="col-md-6" style="margin-bottom:20px;">
                                        <?php if ($set['yeuthich'] == 0) { ?>
                                            <form method="post"
                                                action="index.php?action=sanpham&act=yeuthich&id=<?php echo $set['mahh']; ?>"
                                                style="margin-left: 10px;">
                                                <input type="hidden" name="yeuthich" value="1">
                                                <button type="submit" name="likeBtn" class="btn btn-like">
                                                    <i class="fa fa-heart"></i> Thích
                                                </button>
                                            </form>
                                        <?php } else { ?>
                                            <form method="post"
                                                action="index.php?action=sanpham&act=boyeuthich&id=<?php echo $set['mahh']; ?>"
                                                style="margin-left: 10px;">
                                                <input type="hidden" name="yeuthich" value="0">
                                                <button type="submit" name="unlikeBtn" class="btn btn-unlike">
                                                    <i class="fa fa-heart"></i> Bỏ thích
                                                </button>
                                            </form>
                                        <?php } ?>
                                    </div>
                                </div>
                            </h5>
                        </div>
                    </a>
                </div>

                <?php
            }
            ?>

            <?php
        endwhile;
        ?>

    </div>

    <!--Grid row-->

</section>


<!-- end sản phẩm mới nhất -->



<div class="col-lg-12 text-center">
    <!-- phân trang -->
    <ul class="pagination">
        <?php
        // nút lùi, khi nào lùi, khi trang hiện nó lớn hơn 1 và tổng số trang >1
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        if ($current_page > 1 && $page > 1) {

            if ($ac == 1) {
                echo '<li><a href="index.php?action=sanpham&act=sanpham&page=' . ($current_page - 1) . '" aria-label="Trang trước">
                <span aria-hidden="true">&laquo;</span></a></li>';
            }
            if ($ac == 2) {
                echo '<li><a href="index.php?action=sanpham&act=sanpham1&page=' . ($current_page - 1) . '" aria-label="Trang trước">
                <span aria-hidden="true">&laquo;</span></a></li>';
            }
            if ($ac == 3) {
                echo '<li><a href="index.php?action=sanpham&act=sanpham2&page=' . ($current_page - 1) . '" aria-label="Trang trước">
                <span aria-hidden="true">&laquo;</span></a></li>';
            }
            if ($ac == 4) {
                echo '<li><a href="index.php?action=sanpham&act=sanpham3&page=' . ($current_page - 1) . '" aria-label="Trang trước">
                <span aria-hidden="true">&laquo;</span></a></li>';
            }

        }
        for ($i = 1; $i <= $page; $i++) {

            if ($ac == 1) {
                echo '<li class="' . ($current_page == $i ? 'active' : '') . '"><a href="index.php?action=sanpham&act=sanpham&page=' . $i . '">' . $i . '</a></li>';
            }
            if ($ac == 2) {
                echo '<li class="' . ($current_page == $i ? 'active' : '') . '"><a href="index.php?action=sanpham&act=sanpham1&page=' . $i . '">' . $i . '</a></li>';
            }
            if ($ac == 3) {
                echo '<li class="' . ($current_page == $i ? 'active' : '') . '"><a href="index.php?action=sanpham&act=sanpham2&page=' . $i . '">' . $i . '</a></li>';
            }
            if ($ac == 4) {
                echo '<li class="' . ($current_page == $i ? 'active' : '') . '"><a href="index.php?action=sanpham&act=sanpham3&page=' . $i . '">' . $i . '</a></li>';
            }



        }
        //nút next, next cho tới khi nhỏ thơn tổng số trang và tổng trang lớn hon 1
        if ($current_page < $page && $page > 1) {

            if ($ac == 1) {
                echo '<li><a href="index.php?action=sanpham&act=sanpham&page=' . ($current_page + 1) . '" aria-label="Trang sau"><span aria-hidden="true">&raquo;</span></a></li>';
            }
            if ($ac == 2) {
                echo '<li><a href="index.php?action=sanpham&act=sanpham1&page=' . ($current_page + 1) . '" aria-label="Trang sau"><span aria-hidden="true">&raquo;</span></a></li>';
            }
            if ($ac == 3) {
                echo '<li><a href="index.php?action=sanpham&act=sanpham2&page=' . ($current_page + 1) . '" aria-label="Trang sau"><span aria-hidden="true">&raquo;</span></a></li>';
            }
            if ($ac == 4) {
                echo '<li><a href="index.php?action=sanpham&act=sanpham3&page=' . ($current_page + 1) . '" aria-label="Trang sau"><span aria-hidden="true">&raquo;</span></a></li>';
            }



        }
        ?>
    </ul>
</div>


<script>
    // Lấy phần tử select
    var selectElement = document.getElementById("mySelect");

    // Xác định tên của trạng thái trong localStorage
    var selectStateName = "mySelectState";

    // Lấy trạng thái đã lưu từ localStorage (nếu có)
    var savedState = localStorage.getItem(selectStateName);

    // Khôi phục trạng thái của phần tử select từ localStorage (nếu có)
    if (savedState) {
        selectElement.value = savedState;
    }

    // Thêm sự kiện onchange cho phần tử select
    selectElement.onchange = function () {
        // Lấy giá trị của tùy chọn đã chọn
        var selectedOption = this.options[this.selectedIndex].value;

        // Lưu trạng thái của phần tử select vào localStorage
        localStorage.setItem(selectStateName, selectedOption);

        // Chuyển hướng sang trang mới với giá trị đã chọn
        window.location.href = selectedOption;
    };
</script>
<style>
    .btn-like {
        background-color: #ff6c1773;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 13px;
        margin: -15px 26.5px;
        transition-duration: 0.4s;
        cursor: pointer;
        border-radius: 12px;
    }

    .btn-like i {
        color: white;
    }

    .btn-like:hover {
        background-color: grey;
        color: white;
    }

    .btn-unlike {
        background-color: orange;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 13px;
        margin: -15px 12.5px;
        transition-duration: 0.4s;
        cursor: pointer;
        border-radius: 12px;
    }

    .btn-unlike i {
        color: red;
    }

    .btn-unlike:hover {
        background-color: grey;
        color: white;
    }

    .product_name {
        font-family: 'Times New Roman', Times, serif;
    }

    .product_name h5 {
        margin: 0;
    }
</style>
<?php
include_once "View/footer.php";
?>