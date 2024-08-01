<?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
    <div class="col-md-12" style="margin-top:100px">
        <form action="index.php?action=giohang&act=donhang_action" class="login-form" method="post">
            <div class="col-md-7">
                <?php
                $us = new user();
                $kh = $us->selectThongTinKH($makh);
                $hd = new hoadon();
                $uk = $hd->PhiShip();
                $gh = new giohang();
                $tg = $gh->getTong();
                ?>
                <p><b>Xác nhận thông tin giao hàng</b></p>
                <div class="inline-container">
                    <img class="img" width=" 8%;" height="8%;" src="Content/imagetourdien/ak.jpg"
                        style="margin-bottom:10px">
                    <span><?php echo $tenkh, ' (', $kh['email'], ')'; ?></span>
                </div>
                <div>
                    <input type="text" class="form-control" name="hoten" value=" <?php if (isset($tenkh))
                        echo $tenkh; ?>" placeholder="Họ và tên/Full name" required maxlength="100">
                </div>
                <div>
                    <input type="text" class="form-control" name="sodienthoai" value="<?php if (isset($kh['sodienthoai']))
                        echo $kh['sodienthoai']; ?>" placeholder="Số điện thoại/Phone" maxlength="10" required
                        autofocus pattern="0[0-9]{9}">
                </div>
                <div class="form-group">
                    <label class="form-label" style="margin-top:10px">
                        <input type="radio" name="diachi" value="delivery"
                            onchange="enableNumberInput(this);NumberInput(this)">Giao tận nơi/Delivery
                    </label>
                    <div class="cart" id="cart-delivery">
                        <hr>
                        <input type="text" class="form-control" name="diachi" required value="<?php if (isset($kh['diachi']))
                            echo $kh['diachi']; ?>" placeholder="Địa chỉ/Address" maxlength="500">
                    </div>
                    <hr>
                    <label class="form-label" style="margin-bottom:10px;margin-top: 5px">
                        <input type="radio" name="diachi" value="Nhận tại cửa hàng"
                            onchange="enableNumberInput(this);NumberInput(this)">
                        Nhận tại cửa hàng/Pick up in store
                    </label>
                    <div class="cart" id="cart-pickup">
                        <p style="text-align:center;font-family: 'Times New Roman', Times, serif;"><b>Địa chỉ shop:</b> 12
                            Trịnh Đình Thảo, Hoà Thanh, Tân Phú, Thành phố Hồ Chí Minh, Việt Nam
                        </p>
                    </div>

                </div>

                <p>Phí giao hàng/Shipping fee</p>

                <div class="form-group">
                    <div class="cart" id="cart-delivery2">
                        <input type="radio" name="phiship" value="<?php
                        $gh = new giohang();
                        $subTotal = $gh->getSubTotal();
                        if ($subTotal < 1000000) {
                            if (isset($uk['phiship'])) {
                                echo $uk['phiship'] += 80000;
                            } else {
                                echo 0;
                            }

                        } else {
                            echo 0;
                        } ?>">
                        Giao tận nơi: <p><?php
                        if ($subTotal < 1000000) {
                            echo number_format($uk['phiship']) . '<sup><u>đ</u></sup>';

                        } else {
                            echo 'Miễn phí/Free';
                        }
                        ?></p>
                    </div>
                    <div class="cart" id="cart-pickup2">
                        <input type="radio" name="phiship" value="0"
                            placeholder="Vui lòng chọn tỉnh / thành để có danh sách phương thức vận chuyển.">Đến nhận hàng:
                        <p>Miễn phí/Free</p>
                    </div>
                </div>




                <p><b>Phương thức thanh toán/Payment Method</b></p>


                <div class="form-group">
                    <label class="form-label" style="margin-top:10px">
                        <input type="radio" name="thanhtoan" value="bank" onchange="enableNumber(this)"><img class="img"
                            class="label-img" width=" 50px;" height="50px;" src="Content/imagetourdien/bank.png">Chuyển
                        khoản qua ngân hàng
                    </label>
                    <div class="cart-label" id="cart-bank">
                        <hr>
                        <p style="text-align:center;font-family: 'Times New Roman', Times, serif;">Chủ Tài Khoản : <b>Trương
                                Hoài Nam</b><br>
                            STK : <b>19035642614011</b> <br>
                            Ngân hàng <b>Techcombank</b> Quận 2 <br>
                            <u><i> Sau khi chuyển khoản xong bạn vui lòng nhắn tin cho Fanpage KissNote Shop để được xác
                                    nhận đơn
                                    hàng
                                    nhé!</i></u> <br>
                            Link: <b>fb.com/kissnoteshop.vn</b>
                        </p>
                    </div>
                    <hr>
                    <label class="form-label" style="margin-top:5px">
                        <input type="radio" name="thanhtoan" value="momo" onchange="enableNumber(this)"><img class="img"
                            class="label-img" width=" 50px;" height="50px;" src="Content/imagetourdien/momo.png">Ví MoMo
                    </label>
                    <div class="cart-label" id="cart-momo">
                        <hr>
                        <img width=" 49%;" height="50%;" src="Content/imagetourdien/momo1.jpg">
                        <img width=" 49%;" height="50%;" src="Content/imagetourdien/momo2.jpg">
                    </div>
                    <hr>
                    <label class="form-label" style="margin-top:5px;">
                        <input type="radio" name="thanhtoan" value="atm" onchange="enableNumber(this)"><img class="img"
                            class="label-img" width=" 50px;" height="50px;" src="Content/imagetourdien/vnpay.jpg"><span
                            style="float: right;">Thẻ
                            ATM/Visa/Master/JCB/QR Pay qua cổng VNPAY<br><img width=" 100px;" height="25px;"
                                src="Content/imagetourdien/atm.png"></span>
                    </label>
                    <hr>
                    <label class="form-label" style="margin-top:5px;">
                        <input type="radio" name="thanhtoan" value="cod" onchange="enableNumber(this)"><img class="img"
                            class="label-img" width=" 50px;" height="50px;" src="Content/imagetourdien/COD.png">Thanh toán
                        khi giao hàng (COD)
                    </label>
                </div>
                <div class="form-group">
                    <label style="margin-left: 10px;" for="note">Ghi chú:</label><br>
                    <textarea style="margin-left: 9px;" id="note" name="ghichu" rows="4" cols="80"></textarea>
                </div>
                <div>
                    <button type="submit">Hoàn tất đơn hàng/Finish your order</button>
                </div>
                <div style="margin-top:90px;">
                    <hr>
                    <p style="text-align: center;margin-bottom: 30px;">Powered by Haravan</p>
                </div>
            </div>
        </form>
        <div class="col-md-5">
            <div class="cart-item">
                <?php
                foreach ($_SESSION['cart'] as $key => $item) {
                    ?>
                    <div class="product">
                        <div class="col-md-12">
                            <div class="col-md-2">
                                <div style="position: relative; display: inline-block;">
                                    <img class="img" src="Content/imagetourdien/<?php echo $item['hinh']; ?>" alt="Image"
                                        style="vertical-align: middle; width: 65px; height: 85px;">
                                    <span class="soluong"
                                        style=" display: inline-block;position: relative; vertical-align: middle;">
                                        <?php echo $item['soluong']; ?>
                                    </span>
                                </div>

                            </div>
                            <div class="col-md-7">
                                <b>
                                    <div><?php echo $item['tenhh']; ?><br></div>
                                    <div style="color:grey">Size: <?php echo $item['size']; ?>
                                    </div>

                                </b>
                            </div>
                            <div class="col-md-3 centered">
                                <b style="float: right;">
                                    <?php echo number_format($item['thanhtien']); ?>
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
                    <p>Tạm tính/Subtotal</p>
                    <p style="float: right;">
                        <?php
                        $gh = new giohang();
                        $subTotal = $gh->getSubTotal();
                        echo number_format($subTotal); ?>
                        <sup><u>đ</u></sup>
                    </p>
                </div>
                <div class="cart" id="cart-delivery3">
                    <div class="subship">
                        <p>Phí vận chuyển/Shipping fee</p>
                        <p>
                            <?php
                            if ($subTotal < 1000000) {
                                echo number_format(80000) . '<sup><u>đ</u></sup>';
                            } else {
                                echo 'Miễn phí/Free';
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <div class="cart" id="cart-pickup3">
                    <div class="subship">
                        <p>Phí vận chuyển/Shipping fee</p>
                        <p>
                            <?php
                            echo 'Miễn phí/Free';
                            ?>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="sub">
                    <b>Tổng cộng/Total</b>
                    <div class="cart" id="cart-delivery4">
                        <b style="float: inline-end;color:black;font-size:20px">
                            <?php
                            $gh = new giohang();
                            $subTotal = $gh->getSubTotal();
                            if ($subTotal < 1000000) {
                                echo number_format($subTotal += 80000) . '<sup><u>đ</u></sup>';
                            } else {
                                echo number_format($subTotal) . '<sup><u>đ</u></sup>';
                            }
                            ?>
                        </b>
                    </div>
                    <div class="cart" id="cart-pickup1">
                        <b style="float: inline-end;color:black;font-size:20px">
                            <?php
                            $gh = new giohang();
                            $subTotal = $gh->getSubTotal();
                            echo number_format($subTotal) . '<sup><u>đ</u></sup>';
                            ?>
                        </b>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else {
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
} ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    function enableNumberInput(radio) {
        var value = radio.value.trim(); // Lấy giá trị của radio button và loại bỏ khoảng trắng ở đầu và cuối
        var cartDivs = document.querySelectorAll('.cart');

        // Ẩn tất cả các phần tử cart
        cartDivs.forEach(function (div) {
            div.style.display = 'none';
        });

        // Hiển thị phần tử cart tương ứng với radio button được chọn
        if (value === 'delivery') {
            document.getElementById('cart-delivery').style.display = 'block';
            document.getElementById('cart-delivery2').style.display = 'block';
            document.getElementById('cart-delivery3').style.display = 'block';
            document.getElementById('cart-delivery4').style.display = 'block';
        } else if (value === 'Nhận tại cửa hàng') {
            document.getElementById('cart-pickup').style.display = 'block';
            document.getElementById('cart-pickup2').style.display = 'block';
            document.getElementById('cart-pickup1').style.display = 'block';
            document.getElementById('cart-pickup3').style.display = 'block';
        }


        if (radio.value === 'delivery') {
            document.getElementById('cart-delivery2').querySelector('input[type="radio"]').checked = true;
        } else if (radio.value === 'pickup') {
            document.getElementById('cart-pickup2').querySelector('input[type="radio"]').checked = true;
        }
    }

    function enableNumber(radio) {
        var value = radio.value;
        var cartDivs = document.querySelectorAll('.cart-label');

        // Ẩn tất cả các phần tử cart
        for (var i = 0; i < cartDivs.length; i++) {
            cartDivs[i].style.display = 'none';
        } if (value === 'bank') {
            document.getElementById('cart-bank').style.display = 'block';
        }
        else if (value === 'momo') {
            document.getElementById('cart-momo').style.display = 'block';
        }
        else if (value === 'atm') {
            document.getElementById('cart-atm').style.display = 'block';
        }
    }
    // JavaScript để chọn hai input đầu tiên khi trang tải
    window.onload = function () {
        // Chọn radio button đầu tiên trong nhóm 'diachi'
        var diachiRadios = document.getElementsByName('diachi');
        if (diachiRadios.length > 0) {
            diachiRadios[0].checked = true;
            enableNumberInput(diachiRadios[0]);
        }

        // Chọn radio button cuối cùng trong nhóm 'thanhtoan'
        var thanhtoanRadios = document.getElementsByName('thanhtoan');
        if (thanhtoanRadios.length > 0) {
            thanhtoanRadios[0].checked = true;
            enableNumber(thanhtoanRadios[0]);
        }

        // Hiển thị giỏ hàng tương ứng với radio button được chọn
        enableNumberInput(diachiRadios[0]);
        enableNumber(thanhtoanRadios[0]);
    };

    function NumberInput(radio) {
        // Lấy tên của radio button được chọn
        var selectedValue = radio.value;

        // Tìm các radio button cần điều chỉnh trong phần phí vận chuyển
        var phishipRadioButtons = document.getElementsByName("phiship");

        // Duyệt qua các radio button phí vận chuyển và chọn hoặc bỏ chọn tùy thuộc vào lựa chọn
        for (var i = 0; i < phishipRadioButtons.length; i++) {
            if (selectedValue === "delivery") {
                if (phishipRadioButtons[i].value !== "0") {
                    phishipRadioButtons[i].checked = true;
                }
            } else if (selectedValue === "Nhận tại cửa hàng") {
                if (phishipRadioButtons[i].value === "0") {
                    phishipRadioButtons[i].checked = true;
                }
            }
        }
    }


</script>
<style>
    .cart-item,
    .img,
    .form-group,
    .form-select {
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
    }

    .form-select {
        width: 32.94%;
        height: 40px;
    }

    .product {
        display: flex;
        /* Sử dụng flexbox để tạo bố cục */
    }

    .sub {
        padding: 5px 30px;
        color: grey;
        display: flex;
        justify-content: space-between;
        align-items: center;

    }

    .subship {
        padding: 5px 30px;
        color: grey;
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

    .cart,
    .cart-label {
        display: none;
    }

    .centered {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    .soluong {
        color: white;
        background: grey;
        width: 20px;
        height: 20px;
        text-align: center;
        border-radius: 50%;
        margin-top: -70px;
        margin-left: -70px;
    }



    .inline-container {
        display: flex;
        color: grey;
    }

    .inline-container img,
    .form-label img,
    .form-label input {
        margin-right: 10px;
        /* Khoảng cách giữa hình ảnh và văn bản */
    }

    .label-img,
    .form-label input {
        margin-left: 10px;
    }

    .form-control {
        color: grey;
        font-size: medium;
        height: 40px;
        border-radius: 8px;
    }

    .form-label {
        color: grey;
    }

    .form-group hr {
        width: 150%;
        margin-left: -50px;
    }

    .cart p {
        text-align: center;
    }

    button {
        background-color: orange;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        transition: all 0.3s ease;
        float: inline-end;
        margin-top: 15px;
        width: 45%;
        height: 55px;
    }

    button:hover {
        background-color: lightsalmon;
    }

    .col-md-7 p {
        font-family: 'Times New Roman', Times, serif;
        text-align: left;
        font-weight: bold;
    }

    .form-group #cart-delivery2 input,
    .form-group #cart-pickup2 input {
        margin: 16px;
        margin-right: 10px;
        margin-left: 10px;
    }

    .form-group #cart-delivery2,
    .form-group #cart-pickup2 {
        color: grey;
        font-weight: bold;
    }

    .form-group #cart-delivery2 p,
    .form-group #cart-pickup2 p {
        margin: 10px;
        margin-right: 10px;
        margin-left: 10px;
        float: right;
        color: grey;
        font-weight: bold;
    }
</style>
<?php
include_once "View/footer.php";
?>