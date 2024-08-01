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
                    <h3 class="product_name text-left">Sản phẩm cần tìm</h3>
                </i></u>
        </div>
    </div>

    <!-- Product -->
    <div class="row">
        <?php
        $hh = new hanghoa();
        $count = $hh->getHangHoaAll()->rowCount();//14
        
        //b2 : giới hạn 1 trang bao nhiêu sản phẩm, tự cho tùy bào thiết kế 
        
        if (isset($_POST['txtsearch'])) {
            // Loại bỏ các khoảng trắng ở đầu và cuối chuỗi
            $search = trim($_POST['txtsearch']);

            // Kiểm tra xem người dùng đã nhập gì vào ô tìm kiếm chưa
            
                $tk = $search;
                // Thực hiện tìm kiếm và lưu kết quả vào $result
                $result = $hh->getTimKiem($tk);
                // Kiểm tra xem có kết quả tìm kiếm hay không
                if ($result->rowCount() == 0) { // Nếu không có kết quả
                    echo "<p style='margin-left:495px; margin-top: 25px;'>Không tìm thấy sản phẩm cần tìm</p>";
                    include_once "View/footer.php";

                    exit;
                }
            }
      
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
                                        echo ' <div class="product_price text-left" >
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
        endwhile;
        ?>
    </div>
</section>

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