<?php
include_once "./View/anhdong.php";
?>

<section id="examples" class="text-center" style="margin-top:-20px">
    </br>
    </br>

    <!-- Heading -->
    <div class="col-md-12">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-8 text-right">
                    <u><i>
                            <h3 class="product_name text-left">One Piece</h3>
                        </i></u>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <select class="form-control" id="mySelect"
                    style="width:180px;position: relative; left: 67%;font-size: medium; height: 40px;">
                    <option value="index.php?action=phanloai&act=op">Tất cả</option>
                    <option value="index.php?action=phanloai&act=op1">Đơn giá tăng dần</option>
                    <option value="index.php?action=phanloai&act=op2">Đơn giá giảm dần</option>
                    <option value="index.php?action=phanloai&act=op3">Sắp xếp A - Z</option>
                </select>
            </div>
        </div>
    </div>
    <?php
    $ac = 1;
    if (isset($_GET['action'])) {
        if (isset($_GET['act']) && $_GET['act'] == 'op') {
            $ac = 1;
        } elseif (isset($_GET['act']) && $_GET['act'] == 'op1') {
            $ac = 2;
        } elseif (isset($_GET['act']) && $_GET['act'] == 'op2') {
            $ac = 3;
        } elseif (isset($_GET['act']) && $_GET['act'] == 'op3') {
            $ac = 4;
        }
    }
    ?>
    <!-- Product -->
    <div class="row">
        <?php
        if ($ac == 1) {
            $hh = new hanghoa();
            $count = $hh->getOP()->rowCount();//14
            //b2 : giới hạn 1 trang bao nhiêu sản phẩm, tự cho tùy bào thiết kế
            $limit = 8;
            //b3: tính ra số trang dựa trên tổng sản phẩm và limit
            $trang = new page();
            //lấy ra có bao nhiêu trang
            $page = $trang->findPage($count, $limit);//2
            //lấy ra start
            $start = $trang->findStart($limit);//8
        
            $result = $hh->getAOP($start, $limit);
            // $result=$hh->getHangHoaAll();// lấy được 14 sản phẩm *****
        }
        if ($ac == 2) {
            $gg = new locsanpham();
            $result = $gg->getUOP();// phân trang
        }
        if ($ac == 3) {
            $gg = new locsanpham();
            $result = $gg->getDOP();// phân trang
        }
        if ($ac == 4) {
            $gg = new locsanpham();
            $result = $gg->getOPAZ();// phân trang
        }
        while ($set = $result->fetch()):
            ?>

            <!--Grid column-->
            <!-- Product -->
            <?php
            if ($set['trangthai'] == 0) {
                ?>

                <div class="col-lg-3 product_col">
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

                            <div class="product_content clearfix">
                                <div class="product_info">
                                    <div class="product_name text-left"><a><span><?php echo $set['tenhh'] ?></span></a></div>
                                    <div class="product_price text-left">
                                        <?php
                                        if (number_format($set['giamgia']) > 0) {
                                            echo ' <div class="product_price text-left">
                                        <font color="red">' . number_format($set['giamgia']) . '<sup><u>đ</u></sup></font>
                                        <strike>' . number_format($set['dongia']) . '</strike><sup><u>đ</u></sup>
                                        </div>';
                                        } else {
                                            echo '<div class="product_price text-left">' . number_format($set['dongia']) . '<sup><u>đ</u></sup></div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product_name text-left">
                            <h5 style="font-family: 'Times New Roman', Times, serif; display: flex; align-items: center;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <b>Số lượt xem:</b> <?php echo $set['soluotxem']; ?>
                                    </div>
                                    <div class="col-md-6" style="margin-bottom: 20px;">
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
</section>
<?php
if ($ac == 1) {
    ?>
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            if ($current_page > 1 && $page > 1) {
                echo '<li>
                    <a href="index.php?action=phanloai&act=op&page=' . ($current_page - 1) . '" class="page-link">Trước</a>
                    </li>';
            }
            for ($i = 1; $i <= $page; $i++) {
                ?>
                <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                    <a href="index.php?action=phanloai&act=op&page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
                </li>
                <?php
            }
            if ($current_page < $page && $page > 1) {
                echo '<li>
                    <a href="index.php?action=phanloai&act=op&page=' . ($current_page + 1) . '" class="page-link">Sau</a>
                    </li>';
            }
            ?>
        </ul>
    </nav>
    <?php
} ?>
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