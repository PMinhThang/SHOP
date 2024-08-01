<!-- Product -->
<div class="row" style="margin-top:100px">
    <div class="col-md-12">
        <h3 style="color: black; text-align:left;font-family: 'Times New Roman', Times, serif;font-weight:bold">Yêu
            thích
        </h3>
        <hr>
        <?php
        if (isset($_SESSION['makh'])) {
            $makh = $_SESSION['makh'];
            $hh = new hanghoa();
            $result = $hh->getHangHoaYeuThich($makh);
            $favoriteFound = false;
            while ($set = $result->fetch()):
                if ($set["yeuthich"] == 1) {
                    $favoriteFound = true;
                    ?>

                    <div class="col-lg-3 col-md-4 mb-3 text-left">
                        <a href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh']; ?>">
                            <div class="product">
                                <div class="view overlay z-depth-1-half">
                                    <img style="border-radius: 55px 55px 0 0;width:5000px;height:350px;"
                                        src="Content\imagetourdien\<?php echo $set['hinh']; ?>" class="img-fluid" alt="">
                                    <div style="border-radius: 0 0 55px 55px;" class="promo_link"> <a
                                            href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh']; ?>">Mua
                                            ngay</a></div>
                                    <div class="mask rgba-white-slight"></div>
                                </div>
                                <a href="">
                                    <div class="product_name">
                                        <a>
                                            <span><?php echo $set['tenhh'] ?></span></br></a>
                                    </div>
                                </a>

                            </div>

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
                            <div class="product_name text-left">
                                <h5 style="font-family: 'Times New Roman', Times, serif; display: flex; align-items: center;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <b>Số lượt xem:</b> <?php echo $set['soluotxem']; ?>
                                        </div>
                                        <div class="col-md-6" style="margin-top:20px">
                                            <form method="post"
                                                action="index.php?action=sanpham&act=boyeuthich&id=<?php echo $set['mahh']; ?>"
                                                style="margin-left: 10px;">
                                                <input type="hidden" name="yeuthich" value="0">
                                                <button type="submit" name="unlikeBtn" class="btn btn-unlike">
                                                    <i class="fa fa-heart"></i> Bỏ thích
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </h5>
                            </div>
                        </a>
                    </div>


                    <?php
                }

            endwhile;
            ?>
        </div>
        <?php
        if (!$favoriteFound) {
            echo "<p style='text-align: center; margin-top: 20px;'>Chưa có sản phẩm yêu thích.</p>";
        }
        } else {
            echo "<p style='text-align: center; margin-top: 20px;'>Hãy đăng nhập để xem sản phẩm yêu thích.</p>";
        } ?>

</div>
<style>
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