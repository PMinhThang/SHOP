<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<div class="col-md-12" style="text-align: center;margin-top:100px">
    <h3><b>CHI TIẾT ĐƠN HÀNG</b></h3>
</div>
<?php
$hh = new lichsu();
$masohd = $_GET['id'];
$result = $hh->getHangHoaCT($masohd);
?>
<div class="col-md-12">
    <div class="cart-item apk ">

        <div class="col-md-7" style="padding: unset;">
            <?php
            foreach ($result as $key => $item) {
                ?>
                <div class="product" style="background: lightpink;">
                    <div class="col-md-12">
                        <div class="col-md-2">
                            <div style="position: relative; display: inline-block;">
                                <img class="img" src="Content/imagetourdien/<?php echo $item['hinh']; ?>" alt="Image"
                                    style="vertical-align: middle; width: 100px; height: 120px;">
                                <span class="soluong"
                                    style=" display: inline-block;position: relative; vertical-align: middle;">
                                    <?php echo $item['soluongmua']; ?>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <b>
                                <div><?php echo $item['tenhh']; ?><br></div>
                                <div style="color:grey">Size: <?php echo $item['size']; ?>
                                </div>
                                <div style="color:grey">Studio: <?php echo $item['mausac']; ?>
                                </div>
                            </b>
                        </div>
                        <div class="col-md-3 centered">
                            <b style="float: inline-end;">
                                <?php if ($item['giamgia'] > 0) {
                                    echo number_format($item['giamgia']);
                                } else {
                                    echo number_format($item['dongia']);
                                } ?>
                                <sup><u>đ</u></sup>
                            </b>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            <hr>
            <div class="subship">
                <p>Tạm tính:</p>
                <p style="float: inline-end;">
                    <?php
                    $hh = new lichsu();
                    $result = $hh->getHangHoaCT($masohd);
                    $total = 0;

                    foreach ($result as $key => $item) {
                        if (isset($item['thanhtien'])) {
                            $total += $item['thanhtien'];
                        }
                    }
                    echo number_format($total);
                    ?>
                    <sup><u>đ</u></sup>
                </p>
            </div>

            <div class="subship">
                <p>Phí ship:</p>
                <p style="float: inline-end;"> <?php echo number_format($item['phiship']); ?> <sup><u>đ</u></sup></p>
            </div>

            <hr>
            <div class="sub">
                <b>Tổng cộng:</b>

                <b style="float: inline-end;color:black;font-size:20px">
                    <?php echo number_format($item['tongtien']); ?><sup><u>đ</u></sup>
                </b>

            </div>

        </div>
        <div class="col-md-5">
            <?php
            if (isset($_GET['id'])) {

                $hd = new hoadon();
                $kh = $hd->ThongTinKH($masohd);
                $hoten = $kh['hoten'];
                $ngay = $kh['ngaydat'];
                $dc = $kh['diachi'];
                $sodt = $kh['sodienthoai'];
                $email = $kh['email'];
                $ghichu = $kh['ghichu'];
                ?>
                <!-- Billing Details -->
                <div class="col-md-12">

                    <?php if ($item['tinhtrang'] >= 0) { ?>
                        <p style="text-align: center;font-size:20px;margin-top:-10px"><b>Trạng thái đơn hàng:</b></p>
                        <div class="order-status">
                            <div class="step active">
                                <div class="icon"><i class="fas fa-clock"></i></div>
                                <div class="text">Đang chờ xử lý</div>
                            </div>
                            <div class="step">
                                <div class="text">Đang vận chuyển</div>
                                <div class="icon" style="position: relative;top: 10px;"><i class="fas fa-truck"></i></div>

                            </div>
                            <div class="step">
                                <div class="icon"><i class="fas fa-box-open"></i></div>
                                <div class="text">Đang giao hàng</div>
                            </div>
                            <div class="step">
                                <div class="text">Hoàn thành</div>
                                <div class="icon"><i class="fas fa-check"></i></div>

                            </div>
                        </div>
                        <br>
                        <?php
                        // Ngày đặt hàng
                        $ngay_dat_hang = strtotime($ngay);

                        // Số tháng dự kiến giao hàng (3-5 tháng)
                        $so_ngaymin = 21;
                        $so_ngaymax = 28;

                        // Tính ngày dự kiến giao hàng
                        $ngaymin = strtotime("+$so_ngaymin days", $ngay_dat_hang);
                        $ngaymax = strtotime("+$so_ngaymax days", $ngay_dat_hang);

                        // Định dạng lại ngày dưới dạng yyyy-mm-dd
                        $ngaymin_format = date('d/m/Y', $ngaymin);
                        $ngaymax_format = date('d/m/Y', $ngaymax);
                        if ($item['tinhtrang'] != 3) {
                            echo "<b>Thời gian giao hàng từ:</b> Ngày $ngaymin_format &#x27F6; $ngaymax_format";
                        }
                        ?>
                    <?php } else {
                        echo ' <p style="text-align: center;font-size:20px;margin-top:-10px"><b>Trạng thái đơn hàng:</b></p></b><u><i>Đơn hàng đã bị hủy</i></u>';
                    } ?>
                </div>


                <div class="col-md-12">
                    <p style="text-align: center;font-size:20px;margin-top:10px"><b>Thông tin khách hàng</b></p>
                </div>
                <div class="col-md-12 ak">
                    <p><b>Họ và tên:</b> <?php echo $hoten; ?></p>
                    <p><b>Mã số hóa đơn:</b> <?php echo $masohd; ?></p>
                    <p><b>Ngày đặt:</b> <?php echo $ngay; ?></p>
                    <p><b>Số điện thoại:</b> <?php echo $sodt; ?></p>
                    <p><b>Email:</b><?php echo $email; ?></p>
                    <p><b>Địa chỉ:</b> <?php echo $dc; ?></p>
                </div>

                <div class="col-md-12 ak">
                    <hr>
                    <p><b>Phương thức thanh toán:</b> <?php
                    if ($item['thanhtoan'] == 'bank') {
                        echo 'Thanh toán qua ngân hàng';
                    }
                    if ($item['thanhtoan'] == 'atm') {
                        echo 'Thanh toán qua VNPay';
                    }
                    if ($item['thanhtoan'] == 'momo') {
                        echo 'Thanh toán qua MoMo';
                    }
                    if ($item['thanhtoan'] == 'cod') {
                        echo 'Thanh toán khi nhận hàng';
                    }
                    ?></p>
                    <hr>
                </div>
                <div class="col-md-12 oe">
                    <p style="font-size:17px;"><b><u>Ghi chú:</u></b><?php echo $ghichu ?></p>
                </div>


            <?php } ?>
        </div>
    </div>
</div>
<?php
include "View/footer.php";
?>
<style>
    .col-md-12 .apk p {
        font-family: 'Times New Roman', Times, serif;
    }

    .cart-item,
    .imge {
        border: 1px solid #ccc;
        /* Đường viền của khung */
        border-radius: 8px;
        /* Bo tròn góc khung */
        padding: 5px;
        /* Đệm bên trong khung */
        overflow: hidden;
        /* Đảm bảo không có phần tử nào tràn ra ngoài */
        position: relative;
        /* Để định vị chính xác nút xóa */
        background: aliceblue;
    }

    .product {
        display: flex;
        /* Sử dụng flexbox để tạo bố cục */
    }

    .sub {
        padding: 5px 30px;
        color: #5b5b5b;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .subship {
        padding: 5px 30px;
        color: #5b5b5b;
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 25px;
    }

    .subship p {
        font-size: 13px;
        margin-bottom: 0px;
        font-family: 'Times New Roman', Times, serif;
    }

    .centered {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        left: 4%;
    }

    .soluong {
        color: white;
        background: grey;
        width: 20px;
        height: 20px;
        text-align: center;
        border-radius: 50%;
        margin-top: -105px;
        margin-left: -105px;
    }

    .ak p b {
        float: inline-start;
    }

    .ak p {
        text-align: right;
    }

    .order-status {
        display: flex;
        justify-content: space-between;
        width: 100%;
        max-width: 600px;
        position: relative;
    }

    .step {
        text-align: center;
        flex: 1;
        position: relative;
    }

    .step .icon {
        background-color: #ccc;
        color: #fff;
        width: 40px;
        height: 40px;
        line-height: 40px;
        border-radius: 50%;
        margin: 0 auto 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        z-index: 2;
        position: relative;
    }

    .step .text {
        color: #888;
    }

    .step.active .icon {
        background-color: #4CAF50;
    }

    .step.active .text {
        color: #4CAF50;
    }

    .step::before,
    .step::after {
        content: '';
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 50%;
        height: 2px;
        background-color: #ccc;
        z-index: 0;
    }

    .step::before {
        left: -50%;
    }

    .step::after {
        right: -50%;
    }

    .step:first-child::before {
        display: none;
    }

    .step:last-child::after {
        display: none;
    }

    /* Adjust icon position for steps with text on the right */
    .step .icon.right {
        order: 2;
    }

    /* Adjust text position for steps with text on the right */
    .step .text.right {
        order: 1;
        margin-right: 10px;
    }

    /* Adjust icon position for steps with text on the left */
    .step .icon.left {
        order: 1;
    }

    /* Adjust text position for steps with text on the left */
    .step .text.left {
        order: 2;
        margin-left: 10px;
    }

    .oe {
        background-color: #fee3e8;
        border: 1px solid #fdd0d8;
        padding: 10px 15px;
        margin: 10px 0;
        text-align: left;
    }

    .ak hr {
        border: 1px solid black;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const steps = document.querySelectorAll('.step');

        // Example: Set the current step based on the real order status
        const currentStep = <?php
        if ($item['tinhtrang'] == 0) {
            echo 1;
        }
        if ($item['tinhtrang'] == 1) {
            echo 2;
        }
        if ($item['tinhtrang'] == 2) {
            echo 3;
        }
        if ($item['tinhtrang'] == 3) {
            echo 4;
        }
        ?>;

        for (let i = 0; i < currentStep; i++) {
            steps[i].classList.add('active');
        }
    });
</script>