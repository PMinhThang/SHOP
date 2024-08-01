<?php
include_once "./View/anhdong.php";
?>
<section id="examples" class="text-center" style="margin-top:-20px">
    </br>
    </br>

    <!-- Heading -->
    <div class="row">
        <div class="col-md-8 text-right">
            <u><i>
                    <h3 class="product_name text-left">GunDam</h3>
                </i></u>
        </div>
    </div>

    <!-- Product -->
    <div class="row">
        <?php
        $hh = new hanghoa();
        $count = $hh->getGD()->rowCount();//14
        //b2 : giới hạn 1 trang bao nhiêu sản phẩm, tự cho tùy bào thiết kế
        $limit = 8;
        //b3: tính ra số trang dựa trên tổng sản phẩm và limit
        $trang = new page();
        //lấy ra có bao nhiêu trang
        $page = $trang->findPage($count, $limit);//2
        //lấy ra start
        $start = $trang->findStart($limit);//8
        
        $result = $hh->getAGD($start, $limit);
        while ($set = $result->fetch()):
            ?>

            <!--Grid column-->
            <!-- Product -->
            <div class="col-lg-3 product_col">
                <a href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh']; ?>">
                    <div class="product">
                        <div class="view overlay z-depth-1-half">
                            <img style="border-radius: 55px 55px 0 0;width:1000px;height:350px;"
                                src="Content\imagetourdien\<?php echo $set['hinh']; ?>" class="img-fluid" alt="">
                            <div class="promo_link" style="border-radius: 0 0 55px 55px;"> <a
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
                                        echo ' <div class="product_price text-left" >
                                        <font color="red">' . number_format($set['giamgia']) . '<sup><u>đ</u></sup></font>
                                        <strike>' . number_format($set['dongia']) . '</strike><sup><u>đ</u></sup>
                                        </div>';
                                    } else {
                                        echo '<div class="product_price text-left" >' . number_format($set['dongia']) . '<sup><u>đ</u></sup></div>';
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
        endwhile;
        ?>
    </div>
</section>
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <?php
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        if ($current_page > 1 && $page > 1) {
            echo '<li>
                    <a href="index.php?action=phanloai&act=gundam&page=' . ($current_page - 1) . '" class="page-link">Trước</a>
                    </li>';
        }
        for ($i = 1; $i <= $page; $i++) {
            ?>
            <li class="page-item"><a href="index.php?action=phanloai&act=gundam&page=<?php echo $i; ?>"
                    class="page-link"><?php echo $i; ?></a></li>
            <?php
        }
        if ($current_page < $page && $page > 1) {
            echo '<li>
                    <a href="index.php?action=phanloai&act=gundam&page=' . ($current_page + 1) . '" class="page-link">Sau</a>
                    </li>';
        }
        ?>
    </ul>
</nav>
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