<style>
    /* CSS tùy chỉnh */
    .table-responsive {
        font-family: 'Times New Roman', Times, serif;
        margin-top: 100px;
        padding: 50px;
    }

    .btn {
        padding: 8px 16px;
        font-size: 14px;
    }

    .delete-button {
        display: inline-block;
        position: relative;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        /* Tạo hình tròn */
        background-color: lightgrey;
        /* Độ trong suốt */
        overflow: hidden;
        /* Ẩn phần dư thừa */
        position: relative;
        left: 97%;
        bottom: 95px;
    }

    .close {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: black;
        /* Màu của dấu x */
        font-size: 20px;
        line-height: 1;
        cursor: pointer;
    }

    .ob {
        border: 1px solid #cbcbff;
        background: #baf7ee80;
        padding: 15px;
        max-width: 100%;
        text-align: left;

    }

    .oe {
        background-color: #fee3e8;
        border: 1px solid #fdd0d8;
        color: #d20909;
        font-size: 13px;
        padding: 10px 15px;
        margin: 10px 0;
        text-align: left;
    }

    .cart-item {
        border: 1px solid #ccc;
        /* Đường viền của khung */
        border-radius: 8px;
        /* Bo tròn góc khung */
        padding: 10px;
        /* Đệm bên trong khung */
        margin-bottom: 15px;
        /* Khoảng cách giữa các mục */
        overflow: hidden;
        /* Đảm bảo không có phần tử nào tràn ra ngoài */
        position: relative;
        /* Để định vị chính xác nút xóa */
    }

    .product {
        display: flex;
        /* Sử dụng flexbox để tạo bố cục */
    }

    .quantity-container {
        position: absolute;
    }

    .quantity-container button {
        width: 30px;
        height: 24px;
        color: white;
    }

    .quantity-container input {
        width: 60px;
        text-align: center;
    }

    .buttonb {
        border-radius: 0 30px 30px 0;
        border: none;

    }

    .buttona {
        border-radius: 30px 0 0 30px;
        border: none;
    }
</style>

<head>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<div class="table-responsive" style="margin-top:50px;">
    <?php
    // khi nào hiển thị, khi giỏ hàng tồn tại và có hàng
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        ?>
        <form action="index.php?action=giohang&act=update_cart" method="post" id="cart-form">

            <div class="col-md-12">
                <h3 style="color: black; text-align:left;font-family: 'Times New Roman', Times, serif;font-weight:bold">Giỏ
                    hàng
                </h3>
                <hr>
            </div>
            <div class="col-md-8">

                <p style="color: black; text-align:left;font-family: 'Times New Roman', Times, serif;">Bạn đang có
                    <b>
                        <span>
                            <?php
                            if (isset($_SESSION['cart'])) {
                                $gh = new giohang();
                                echo $gh->getTong();
                            } else {
                                echo '0';
                            }
                            ?>
                        </span>sản phẩm </b> trong giỏ hàng

                </p>
                <div class="cart-item">
                    <?php
                    foreach ($_SESSION['cart'] as $key => $item) {
                        ?>
                        <div class="product">
                            <div class="col-md-2">
                                <img width="100%" height="100%" src="Content/imagetourdien/<?php echo $item['hinh']; ?>">
                            </div>
                            <div class="col-md-10">
                                <b>
                                    <?php echo $item['tenhh']; ?><br>
                                    Studio: <?php echo $item['mausac']; ?><br> Size: <?php echo $item['size']; ?>
                                    <br>
                                    Đơn Giá:
                                    <b style="font-size: large;color: #2689a9;">
                                        <?php
                                        if ($item['giamgia'] > 0) {
                                            echo number_format($item['giamgia']);

                                        }
                                        if ($item['giamgia'] <= 0) {
                                            echo number_format($item['dongia']);
                                        }

                                        ?><sup><u>đ</u></sup>
                                    </b> <br>
                                    <div class="quantity-container">
                                        <button type="button" class="buttona btn-info"
                                            onclick="thayDoiSoLuong(this, -1)">&#x2212;</button>
                                        <input type="text" name="newqty[]" onchange="kiemTraSoLuong(this);submitForm()" value="<?php
                                        if ($item['soluong'] > $item['soluongton']) {
                                            echo $item['soluongton'];
                                        } else {
                                            echo $item['soluong'];
                                        }
                                        ?>" />
                                        <button type="button" class="buttonb btn-info"
                                            onclick="thayDoiSoLuong(this, 1)">&#x2b;</button>
                                    </div>


                                    <b style="float: right;font-size: large;">
                                        <?php echo number_format($item['thanhtien']); ?>
                                        <sup><u>đ</u></sup>
                                    </b>
                                </b>


                                <a href="index.php?action=giohang&act=delete_cart&id=<?php echo $key; ?>" class="delete-button"
                                    onclick="return confirmDelete(event);">
                                    <span class="close">&times;</span>
                                </a>

                            </div>
                        </div>
                        <hr>
                        <?php
                    }
                    ?>

                    <a style="float: inline-end;margin-bottom: 10px"
                        href="index.php?action=giohang&act=delete_cart_all&id=<?php echo $key; ?>"><button type="button"
                            class="btn btn-danger">Xóa tất cả</button></a>
                </div>
            </div>
            <div class="col-md-4">
                <h3 style="color: black;font-family: 'Times New Roman', Times, serif;font-weight: bold;">Thông tin đơn hàng
                </h3>

                <b style="font-size: large;">Tổng Tiền:</b>
                <b style="float: inline-end;color: red;font-size: large;">
                    <?php
                    $gh = new giohang();
                    $subTotal = $gh->getSubTotal();
                    echo number_format($subTotal) . '<sup><u>đ</u></sup>';
                    ?>
                </b>
                <br>
                <hr>
                <li>Phí vận chuyển sẽ được tính ở trang thanh toán.</li>
                <li>Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</li>
                <?php
                if ($subTotal < 100000) { ?>
                    <div class="oe">
                        Giỏ hàng của bạn hiện chưa đạt mức tối thiểu để thanh toán.
                    </div>
                    <a href="index.php?action=giohang&act=xacnhan" onclick="return false"><button type="button"
                            class="btn btn-secondary" style="margin-bottom: 10px;margin-top: 10px;width:100%">Thanh
                            toán</button></a>
                <?php } else { ?>

                    <a href="index.php?action=giohang&act=xacnhan" onclick="return checkLogin() ;"><button type="button"
                            class="btn btn-danger" style="margin-bottom: 10px;margin-top: 10px;width:100%">Thanh
                            toán</button></a>
                <?php } ?>
                <div class="ob">
                    <b>Chính sách mua hàng</b>
                    <br>
                    <li>Hiện chúng tôi chỉ áp dụng thanh toán với đơn hàng có giá trị tối thiểu <b>100.000₫</b> trở lên.
                    </li>
                    <li>Nếu bạn đặt đơn hàng với giá từ
                        <b><?php echo number_format(1000000) . ' <sup><u>đ</u></sup>'; ?></b>
                        trở lên thì sẽ được <b>Free Ship</b> trên toàn quốc.
                    </li>
                </div>
            </div>
        </form>
        <?php
    } else { ?>
        <form action="index.php?action=giohang&act=update_cart" method="post" id="cart-form">

            <div class="col-md-12">
                <h3 style="color: black; text-align:left;font-family: 'Times New Roman', Times, serif;font-weight:bold">Giỏ
                    hàng
                </h3>
                <hr>
            </div>
            <div class="col-md-8">

                <h3 style="color: grey; text-align:left;font-family: 'Times New Roman', Times, serif;">Giỏ hàng bạn đang
                    trống</h3>

            </div>
            <div class="col-md-4">
                <h3 style="color: black;font-family: 'Times New Roman', Times, serif;font-weight: bold;">Thông tin đơn hàng
                </h3>

                <b style="font-size: large;">Tổng Tiền:</b>
                <b style=" float: inline-end;color: red;font-size: large;">
                    <?php
                    $gh = new giohang();
                    echo $gh->getSubTotal() . ' <sup><u>đ</u></sup>'; ?>
                </b>
                <br>
                <hr>
                <li>Phí vận chuyển sẽ được tính ở trang thanh toán.</li>
                <li>Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</li>
                <div class="oe">
                    Giỏ hàng của bạn hiện chưa đạt mức tối thiểu để thanh toán.
                </div>
                <a href="index.php?action=thanhtoan" onclick="return false"><button type="button" class="btn btn-secondary"
                        style="margin-bottom: 10px;width:100%">Thanh
                        toán</button></a>

                <div class="ob">
                    <b>Chính sách mua hàng</b>
                    <br>
                    <li>Hiện chúng tôi chỉ áp dụng thanh toán với đơn hàng có giá trị tối thiểu <b>100.000₫</b> trở lên.
                    </li>
                    <li>Nếu bạn đặt đơn hàng với giá từ
                        <b><?php echo number_format(1000000) . ' <sup><u>đ</u></sup>'; ?></b>
                        trở lên thì sẽ được <b>Free Ship</b> trên toàn quốc.
                    </li>
                </div>
            </div>
        </form>

        <?php
    }
    ?>
</div>
</div>

<script type="text/javascript">
    // Kiểm tra đăng nhập trước khi mua hàng
    function checkLogin() {
        var loggedIn = <?php echo isset($_SESSION['makh']) ? 'true' : 'false'; ?>;
        if (!loggedIn) {
            Swal.fire({
                title: 'Chưa đăng nhập!',
                text: 'Vui lòng đăng nhập để mua hàng.',
                icon: 'warning',
                confirmButtonText: 'Đăng nhập'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "index.php?action=dangnhap"; // Chuyển hướng về trang đăng nhập
                }
            });
            return false; // Ngăn chặn hành động mua hàng
        }
        return true;
    }
    function submitForm() {
        var form = document.getElementById('cart-form');
        form.submit();
    }

    function thayDoiSoLuong(button, thayDoi) {
        var input = button.parentElement.querySelector('input[type="text"]');
        var giaTriHienTai = parseInt(input.value) || 0;
        var giaTriMoi = giaTriHienTai + thayDoi;

        // Kiểm tra số lượng hợp lệ nếu cần
        if (giaTriMoi >= 0) {
            input.value = giaTriMoi;
            kiemTraSoLuong(input)
            submitForm();
        }
    }
    function kiemTraSoLuong(input) {
        // Thực hiện logic kiểm tra số lượng ở đây
        // Ví dụ: kiểm tra nếu số lượng không vượt quá tồn kho
        var giaTriHienTai = parseInt(input.value) || 0;
        if (giaTriHienTai < 0) {
            input.value = 0;
        }
        var quantity = input.value
            .trim(); // Lấy giá trị nhập vào và loại bỏ các ký tự không cần thiết từ đầu và cuối
        var decimalRegex = /^\d+$/; // Biểu thức chính quy kiểm tra số nguyên

        if (!decimalRegex.test(
            quantity)) { // Kiểm tra xem giá trị nhập vào có chứa số thập phân hay không
            alert("Vui lòng nhập một số nguyên.");
            input.value = <?php echo $item['soluong'] ?>; // Xóa giá trị nhập vào nếu có số thập phân
            return;
        }
    }

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

    // Xác nhận mua hàng thành công
</script>
<?php
include_once "View/footer.php";
?>