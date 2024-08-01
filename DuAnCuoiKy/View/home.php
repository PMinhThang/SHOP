<!DOCTYPE html>
<html lang="en">
<?php
include_once "./View/anhdong.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <!-- New Arrivals -->

    <div class="arrivals">
        <div class="container" style="margin-top:-175px;margin-bottom: -100px;">


            <div class="row promo_container">

                <!-- Promo Item -->
                <div class="col-lg-6 promo_col">
                    <div class="promo_item">
                        <div class="promo_image">
                            <img src="Content/imagetourdien/80.jpg" alt="">
                            <div class="promo_content promo_content_1">
                                <div class="promo_title">ALL</div>
                                <div class="promo_subtitle">Tất cả sản phẩm</div>
                            </div>
                        </div>
                        <div class="promo_link"> <a href="index.php?action=sanpham">Đến ngay</a></div>
                    </div>
                </div>

                <!-- Promo Item -->
                <div class="col-lg-6 promo_col">
                    <div class="promo_item">
                        <div class="promo_image">
                            <img src="Content/imagetourdien/37.jpg" alt="">
                            <div class="promo_content promo_content_2">
                                <div class="promo_title">Sale</div>
                                <div class="promo_subtitle">Sản phẩm khuyến mãi</div>
                            </div>
                        </div>
                        <div class="promo_link"> <a href="index.php?action=sanpham&act=sanphamkhuyenmai">Đến ngay</a>
                        </div>
                    </div>
                </div>

                <!-- Promo Item -->

                </br>
                </br>



                <div class="folder">
                    <div class="tabs">
                        <button class="tab active">
                            <div><span>NEW</span></div>
                        </button>
                        <button class="tab active">
                            <div><span>SALE</span></div>
                        </button>
                    </div>
                    <div class="content">
                        <div class="content__inner">
                            <div class="page">
                                <p>
                                <div class="row">
                                    <div class="col-md-8 text-left">
                                        <h3 class="product_name " style="font-family: 'Times New Roman', Times, serif;">
                                            SẢN PHẨM MỚI NHẤT</h3>
                                    </div>
                                </div>
                                </p>
                                <p>
                                <section id="examples" class="text-center" style="margin-top:-56px;">
                                    </br>
                                    </br>

                                    <!-- Heading -->

                                    <!-- Product -->

                                    <div class="row">
                                        <?php
                                        $hh = new hanghoa();
                                        $result = $hh->getHangHoaNew();
                                        while ($set = $result->fetch()):

                                            ?>

                                            <!--Grid column-->
                                            <!-- Product -->
                                            <div class="col-lg-3 product_col">
                                                <a
                                                    href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh']; ?>">
                                                    <div class="product">

                                                        <div class="view overlay z-depth-1-half">

                                                            <img style="border-radius: 55px 55px 0 0;width:1000px;height:350px;"
                                                                src="Content\imagetourdien\<?php echo $set['hinh']; ?>"
                                                                class="img-fluid" alt="">

                                                            <div style="border-radius: 0 0 55px 55px;" class="promo_link">
                                                                <a
                                                                    href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh']; ?>">Mua
                                                                    ngay</a>
                                                            </div>
                                                            <div class="mask rgba-white-slight"></div>
                                                        </div>

                                                        <div class="product_content clearfix">
                                                            <div class="product_info">
                                                                <div class="product_name text-left">
                                                                    <a><span><?php echo $set['tenhh'] ?></span></a>
                                                                </div>
                                                                <div class="product_price text-left">
                                                                    <?php
                                                                    if (number_format($set['giamgia']) > 0) {
                                                                        echo ' <div class="product_price text-left" style="margin: 0 0 0 10px;">
                                                                        <font color="red" >' . number_format($set['giamgia']) . '<sup><u>đ</u></sup></font>
                                                                        <strike>' . number_format($set['dongia']) . '</strike><sup><u>đ</u></sup>
                                                                        </div>';
                                                                    } else {
                                                                        echo '<div class="product_price text-left" style="margin: 0 0 0 10px;">' . number_format($set['dongia']) . '<sup><u>đ</u></sup></div>';
                                                                    }

                                                                    ?>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="product_name text-left">
                                                            <h5
                                                                style="font-family: 'Times New Roman', Times, serif; display: flex; align-items: center;">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <b>Số lượt xem:</b> <?php echo $set['soluotxem']; ?>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <?php
                                                                         if ($set['yeuthich'] == 0) { ?>
                                                                            <form method="post"
                                                                                action="index.php?action=sanpham&act=yeuthich&id=<?php echo $set['mahh']; ?>"
                                                                                style="margin-left: 10px;">
                                                                                <input type="hidden" name="yeuthich" value="1">
                                                                                <button type="submit" name="likeBtn"
                                                                                    class="btn btn-like">
                                                                                    <i class="fa fa-heart"></i> Thích
                                                                                </button>
                                                                            </form>
                                                                        <?php } else { ?>
                                                                            <form method="post"
                                                                                action="index.php?action=sanpham&act=boyeuthich&id=<?php echo $set['mahh']; ?>"
                                                                                style="margin-left: 10px;">
                                                                                <input type="hidden" name="yeuthich" value="0">
                                                                                <button type="submit" name="unlikeBtn"
                                                                                    class="btn btn-unlike">
                                                                                    <i class="fa fa-heart"></i> Bỏ thích
                                                                                </button>
                                                                            </form>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </h5>
                                                        </div>


                                                    </div>
                                                </a>
                                            </div>

                                            <?php

                                        endwhile;
                                        ?>
                                    </div>
                                </section>
                                </p>
                            </div>
                        </div>
                        <div class="content__inner">
                            <div class="page">
                                <p>
                                <div class="row">
                                    <div class="col-md-8 text-left">
                                        <h3 class="product_name" style="font-family: 'Times New Roman', Times, serif;">
                                            SẢN PHẨM KHUYẾN MÃI</h3>
                                    </div>
                                    
                                </div>
                                </p>
                                <p>
                                <section id="examples" class="text-center">

                                    <!-- Heading -->

                                    <!--Grid row-->
                                    <div class="row">
                                        <?php
                                        $hh = new hanghoa();
                                        $result = $hh->getHangHoaSale();
                                        while ($set = $result->fetch()):
                                            if ($set['trangthai'] == 0) {
                                                ?>

                                                <!--Grid column-->
                                                <div class="col-lg-3 product_col">
                                                    <a
                                                        href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh']; ?>">
                                                        <div class="product">
                                                            <div class="view overlay z-depth-1-half">
                                                                <img style="border-radius: 55px 55px 0 0;width:1000px;height:350px;"
                                                                    src="Content\imagetourdien\<?php echo $set['hinh']; ?>"
                                                                    class="img-fluid" alt="">
                                                                <div style="border-radius: 0 0 55px 55px;" class="promo_link">
                                                                    <a
                                                                        href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh']; ?>">Mua
                                                                        ngay</a>
                                                                </div>
                                                                <div class="mask rgba-white-slight"></div>
                                                            </div>

                                                            <div class="product_content clearfix">
                                                                <div class="product_info text-left">
                                                                    <div class="product_name"><a>
                                                                            <span><?php echo $set['tenhh'] ?></span></br></a>
                                                    </a>
                                                </div>

                                                <div class="product_price" style="margin: 0 0 0 10px;">
                                                    <font color="red">
                                                        <?php echo number_format($set['giamgia']); ?><sup><u>đ</u></sup>
                                                    </font>
                                                    <strike><?php echo number_format($set['dongia']); ?></strike><sup><u>đ</u></sup>

                                                    </sup></br>
                                                </div>
                                            </div>

                                    </div>
                                    <div class="product_name text-left">
                                        <h5
                                            style="font-family: 'Times New Roman', Times, serif; display: flex; align-items: center;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <b>Số lượt xem:</b> <?php echo $set['soluotxem']; ?>
                                                </div>
                                                <div class="col-md-6">
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

                                </div>
                                </a>
                            </div>
                        <?php }
                                        endwhile;
                                        ?>
                    </section>
                </div>

                <!--Grid row-->

                </p>
            </div>
        </div>

    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="plugins/parallax-js-master/parallax.min.js"></script>
    <script src="plugins/colorbox/jquery.colorbox-min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>
<script>
    const $tabs = document.querySelectorAll('.tab');
    const $contents = document.querySelectorAll('.content__inner');
    for (let i = 0; i < $tabs.length; i++) {
        const $tab = $tabs[i];
        $tab.addEventListener(
            'click',
            () => {
                $contents.forEach(($i) => {
                    $i.style.display = 'none';
                });
                $tabs.forEach(($i) => {
                    $i.classList.remove('active');
                });
                $contents[i].style.display = 'block';
                $tab.classList.add('active');
            }
        );
    }
    
</script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Patrick+Hand&family=Yomogi&display=swap');

    * {
        box-sizing: border-box;
        font-family: 'Times New Roman', Times, serif;
    }

    :root {
        --background: #f9d877;
    }

    .folder {
        width: 100%;
        scrollbar-height: none;
    }

    .tab {
        background: var(--background);
        border: 2px solid;
        border-radius: 6px 6px 0 0;
        border-width: 2px 0 0;
        text-transform: uppercase;
        line-height: 0.8;
        display: inline-block;
        margin-left: -35px;
        filter: drop-shadow(0px -3px 2px #0000000d);
        position: relative;
        margin-right: 6rem;
        white-space: nowrap;
        cursor: pointer;
    }

    .tab:focus {
        outline: none;
    }

    .tab:focus span {
        border-bottom: 2px solid;
        border-radius: 0;
    }

    .tab:first-of-type {
        margin-left: 30px;
    }

    .tab div {
        z-index: 10;
        background: var(--background);
        padding: 6px 0;
        position: relative;
    }

    .tab span {
        z-index: 5;
        color: #fff;
        display: inline-block;
        border: 2px solid transparent;
        padding: 6px 15px 6px;
        border-radius: 5px;
        font-size: 140%;
        min-width: 6rem;
    }

    .tab:before,
    .tab:after {
        content: "";
        height: 100%;
        position: absolute;
        background: var(--background);

        width: 60px;
        top: 0px;
    }

    .tab:before {
        right: -16px;
        transform: skew(25deg);

    }

    .tab:after {
        transform: skew(-25deg);
        left: -16px;

    }

    .tab.active {
        z-index: 50;
        position: relative;
    }

    .tab.active span {
        background: white;
        box-shadow: 0 2px 3px #0000001a;
        border-radius: 5px;
        color: black;
    }

    .content {
        border-radius: 10px;
        position: relative;
        width: 100%;
    }

    .content__inner:first-child {
        display: block;
    }

    .content::before {
        content: "";
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        border-radius: inherit;
        z-index: -1;
    }

    .content__inner {
        z-index: 5;
        font-family: "Yomogi", sans-serif;
        font-size: 120%;
        display: none;
        background: var(--background);
        border-radius: inherit;
        padding: 1rem;
        filter: drop-shadow(0px -2px 2px rgba(0, 0, 0, 0.1));
        box-shadow: 0, 0, 0, 1.5px black;
    }

    .page {
        padding: 0.5rem 1.5rem;
        border-radius: 2px;
        min-height: 20rem;
        line-height: 160%;
        background-color: #fff;
        filter: drop-shadow(0px 1px 3px #00000026);

        background-size: 8% 8%, 2px 2px;
    }

    .tabs {
        padding: 2rem 0 0 0;
        width: 100%;
        margin: 0 0.5rem;
        overflow: auto;
        width: calc(100%-1rem);
        white-space: nowrap;
    }

    .tab:nth-of-type(1),
    .content__inner:nth-of-type(1) {
        --background: #fff;
    }

    .tab:nth-of-type(2),
    .content__inner:nth-of-type(2) {
        --background: #fff;
    }


    .tab.active span {
        border: 2px solid;
    }

    .tab:not(.active) {
        border-bottom: 2px solid;
    }

    .tab:not(.active)::before,
    .tab:not(.active)::after {
        box-shadow: 0 1.5px 0 black;
    }

    .content {
        top: -2px;
        left: -2px;
    }




    .btn-like {
        background-color: #ff6c1773;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 13px;
        margin: -15px 15px;
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
        margin: -15px 2px;
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
        font-family: 'Arial', sans-serif;
        padding: 10px;
    }

    .product_name h5 {
        margin: 0;
    }
</style>
<?php
include_once "View/footer.php";
?>