<head>
    <style>
        .preview-thumbnail .nav-ka {
            margin-bottom: 10px;
        }

        .preview-thumbnail .nav-ha {
            padding: 5px;
            border: 2px solid transparent;
            transition: border-color 0.3s ease;
        }

        .preview-thumbnail .nav-ha:hover {
            border-color: red;
        }

        .preview-thumbnail .nav-ha.active {
            border-color: orange;
        }

        .preview-thumbnail img {
            border-radius: 8px;
        }
    </style>
</head>


<script type="text/javascript">
    function chonsize(c) {
        document.getElementById("size").value = c;
        // Ẩn tất cả các giá
        var tatCaGia = document.querySelectorAll('[id^="gia_"]');
        for (var i = 0; i < tatCaGia.length; i++) {
            tatCaGia[i].style.display = "none";
        }
        // Hiển thị giá tương ứng với idsize được chọn
        var giaMoi = document.getElementById("gia_" + c);
        if (giaMoi) {
            giaMoi.style.display = "block";
        }
        var tatCaButton = document.querySelectorAll('[id^="haha_"]');
        for (var i = 0; i < tatCaButton.length; i++) {
            tatCaButton[i].style.display = "none";
        }
        var Gia = document.getElementById("haha_" + c);
        if (Gia) {
            Gia.style.display = "block";
        }
        var buttons = document.querySelectorAll('.size-button');
        for (var i = 0; i < buttons.length; i++) {
            buttons[i].classList.remove('selected'); // Bỏ tô màu tất cả các nút
            if (buttons[i].value == c) {
                buttons[i].classList.add('selected'); // Tô màu nút được chọn
            }
        }
    }
    window.onload = function () {
        // Lấy tất cả các phần tử có id bắt đầu bằng "gia_"
        var tatCaGia = document.querySelectorAll('[id^="gia_"]');
        if (tatCaGia.length > 0) {
            // Lấy giá trị id của phần tử đầu tiên và tách số phía sau "gia_"
            var idDauTien = tatCaGia[0].id;
            var giaTriDauTien = idDauTien.replace("gia_", "");
            // Gọi hàm chonsize với giá trị đầu tiên tìm được
            chonsize(giaTriDauTien);
        }
    }
    function numberFormat(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function thayDoiAnh(hinh) {
        var hinhChinh = document.getElementById("hinhChinh");
        hinhChinh.src = hinh;
    }

    function kiemTraSize() {
        var selectedSize = document.getElementById("size").value;
        if (selectedSize == 0) {
            Swal.fire({
                title: "Lỗi",
                text: "Vui lòng chọn kích thước trước khi thêm vào giỏ hàng!",
                icon: "error",
                confirmButtonText: "OK",
                allowOutsideClick: false
            });
            return false; // Prevent form submission
        }
        return true; // Allow form submission
    }
</script>

<head>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<section style="margin-top:100px;font-family: 'Times New Roman', Times, serif;">

    <article>

        <!-- <div class="card"> -->
        <div class="container col-12">
            <div class="row">
                <form action="index.php?action=giohang&act=giohang_action" method="post"
                    onsubmit="return kiemTraSize();">

                    <!-- <input type="hidden" name="action" value="giohang&add_cart"/> -->
                    <div class="product">
                        <div class="container">

                            <div class="row ">

                                <!-- Product Image -->
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8 ">
                                            <h3 class="product_name " style="margin-left:20px;">CHI TIẾT SẢN PHẨM</h3>

                                        </div>
                                    </div>
                                    <div class="col-md-6 ">

                                        <div class="tab-content">
                                            <?php
                                            // điều hướng qua view chi tiết, đông thời cũng truyền id
                                            if (isset($_GET['id'])) {
                                                $id = $_GET['id'];
                                                //view đòi hỏi cần có thông tin của sản phẩm mà id=24?model
                                                $hh = new hanghoa();
                                                $sp = $hh->getHangHoaId($id);// array(mahh:24,tenhh: giày...)
                                                $tenhh = $sp['tenhh'];
                                                $mota = $sp['mota'];
                                                $dongia = $sp['dongia'];
                                                $giamgia = $sp['giamgia'];
                                                $soluongton = $sp['soluongton'];
                                                $soluotxem = $sp['soluotxem'];
                                            }
                                            ?>
                                            <?php
                                            $hinh = $hh->getHangHoaHinh($id);
                                            $set = $hinh->fetch();// lấy ra thông tin của dòng đầu
                                            ?>
                                            <div class="active" id="">
                                                <img id="hinhChinh" style="width:540px;height:600px;"
                                                    src="Content/imagetourdien/<?php echo $set['hinh']; ?>">
                                            </div>



                                        </div>
                                        <ul class="preview-thumbnail nav nav-tabs">
                                            <?php
                                            $hinh = $hh->getHangHoaHinh($id);
                                            while ($img = $hinh->fetch()):
                                                ?>
                                                <li class="nav-ka">
                                                    <a class="nav-ha" href="#<?php echo $img['hinh']; ?>" data-toggle="tab">
                                                        <img src="<?php echo 'Content/imagetourdien/' . $img['hinh']; ?>"
                                                            alt="Học thiết kế web bán hàng Online"
                                                            style="width:100px;height:130px;"
                                                            onclick="thayDoiAnh('<?php echo 'Content/imagetourdien/' . $img['hinh']; ?>')">
                                                    </a>
                                                </li>
                                                <?php
                                            endwhile;
                                            ?>
                                        </ul>
                                    </div>

                                    <!-- Product Content -->
                                    <div class="col-md-6">
                                        <input type="hidden" name="mahh" value="<?php echo $id; ?>" />
                                        <h3 class="product-title"> <?php echo $tenhh; ?> </h3>
                                        <h4>
                                            <div id="product_price">
                                                <?php
                                                $sise = $hh->getHangHoaSize($id);
                                                foreach ($sise as $set) {
                                                    $idsize = $set['Idsize'];
                                                    $soluongton = $set['soluongton'];
                                                    $giaMoi = $set['giamgia'] > 0 ? $set['giamgia'] : $set['dongia']; // Giả sử giá mới là 100000
                                                    $color = $set['giamgia'] > 0 ? 'grey' : 'grey';
                                                    $giaba = $set['giamgia'] > 0 ? '<strike>' . number_format($set['dongia']) . '</strike><sup><u>đ</u></sup>' : '';

                                                    if ($soluongton <= 0) {

                                                        echo '<div id="gia_' . $idsize . '" style="display:none;">Giá bán:<span style="color:' . $color . ';font-size:27px;margin-left:10px;">' . number_format($giaMoi) . '<sup><u>đ</u></sup></span><span style="margin-left:10px;color:red">(Sản phẩm này đã hết hàng!)</span></div>';
                                                    } else {
                                                        // Hiển thị giá mặc định khi trang tải
                                                        echo '<div id="gia_' . $idsize . '" style="display:none;">Giá bán:<span style="color:' . $color . ';font-size:27px;margin-left:10px;">' . number_format($giaMoi) . '<sup><u>đ</u></sup></span><span style="margin-left:10px;">' . $giaba . '</span></div>';
                                                    }
                                                }
                                                ?>

                                            </div>


                                            <br>
                                            Studio:
                                            <!-- <select name="mymausac" class="form-control" style="width:150px;"> -->
                                            <?php
                                            $mau = $hh->getHangHoaMau($id);
                                            while ($set = $mau->fetch()):
                                                ?>
                                                <!-- <option value="</option> -->
                                                <input style="margin-left:30px;" name="mymausac" type="hidden"
                                                    value="<?php echo $set['idmau'] ?>">
                                                <a><?php echo $set['mausac']; ?> </a>
                                                <?php
                                            endwhile;
                                            ?>
                                        </h4>

                                        </select>


                                        <br>
                                        <h4>
                                            Số Lượng:
                                            <input
                                                style="border-radius: 10px; height: 35px; text-align: center; padding-left: 13px;"
                                                type="number" id="soluong" name="soluong" min="1" max="10000" value="1"
                                                size="10" required onchange="validateQuantity()" />
                                            <script>
                                                // document.getElementById('soluong').addEventListener('change', function () {
                                                //     var soluong = parseInt(this.value);
                                                //     var soluongton = <?php echo $soluongton; ?>;

                                                //     if (soluong > soluongton) {
                                                //         alert("Số lượng mua vượt quá số lượng tồn!");
                                                //         this.value =
                                                //             soluongton; // Đặt lại số lượng bằng số lượng tồn

                                                //     }
                                                // });
                                                function validateQuantity() {
                                                    const soluongInput = document.getElementById('soluong');
                                                    if (soluongInput.value < 1) {
                                                        soluongInput.value = 1;
                                                    }
                                                }
                                            </script>
                                            <br>
                                            <br>
                                            <input type="hidden" name="size" id="size" value="0" />
                                            Kích Thước:
                                            <?php
                                            $sise = $hh->getHangHoaSize($id);
                                            while ($set = $sise->fetch()):
                                                ?>
                                                <button style="width: 85px;" type="button" name=""
                                                    onclick="chonsize(<?php echo $set['Idsize']; ?>)"
                                                    class="btn btn-default btn-circle default-color size-button"
                                                    value="<?php echo $set['Idsize']; ?>">
                                                    <?php echo $set['size']; ?>
                                                </button>
                                                <script>
                                                    // Lấy tất cả các nút kích thước
                                                    var sizeButtons = document.querySelectorAll(".size-button");

                                                    // Lặp qua từng nút và thêm sự kiện click
                                                    sizeButtons.forEach(function (button) {
                                                        button.addEventListener("click", function () {
                                                            // Loại bỏ lớp "clicked-color" từ tất cả các nút
                                                            sizeButtons.forEach(function (btn) {
                                                                btn.classList.remove("clicked-color");
                                                            });

                                                            // Thêm lớp "clicked-color" cho nút được nhấp vào
                                                            this.classList.add("clicked-color");
                                                        });
                                                    });
                                                </script>
                                                <?php
                                            endwhile;
                                            ?>
                                        </h4>
                                        <div class="action">
                                            <br>

                                            <div class="row">
                                                <div class="col-md-8">
                                                    <?php
                                                    $sise = $hh->getHangHoaSize($id);
                                                    foreach ($sise as $set) {
                                                        $idsize = $set['Idsize'];
                                                        $Gia = $set['soluongton'] <= 0 ? 'onclick="return false"' : '';// Giả sử giá mới là 100000
                                                        $color = $set['soluongton'] <= 0 ? 'grey' : 'orange';
                                                        echo '<div id="haha_' . $idsize . '" style="display:none;"><button style=" width: 107%; border-radius: 15px; font-size:13px;background:' . $color . ';" ' . $Gia . ' class="add-to-cart btn btn-default" type="submit" data-toggle="modal" data-target="#myModal">Thêm vào giỏ hàng </button></div>';
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="https://www.facebook.com/profile.php?id=61559147542294"
                                                        target="_blank">
                                                        <button style="width:100%; border-radius: 15px; font-size:13px;"
                                                            class="like btn btn-default" type="button">
                                                            <span class="fab fa-facebook-messenger"></span> Chat ngay
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="oa col-md-12">
                                            <div class="ob col-md-6">
                                                KissNote chuyên cung cấp mọi loại mô mình chính hãng trên thế giới
                                            </div>
                                            <div class="ob col-md-6">
                                                VUI LÒNG NHẮN TIN ĐỂ ĐƯỢC HỖ TRỢ NHANH NHẤT.
                                            </div>

                                        </div>

                                        <!-- <div style="margin-top:120px">
                                            <h3>
                                                <?php
                                                echo '<div style="font-family: Times New Roman, Times, serif;"><b>Thông tin sản phẩm:</b><br><br> <div  style="position: relative;left: 40px; font-size:20px;">' . ($mota) . '</div><br>
                                                 <div  style="position: relative;left: 40px; font-size:20px;">Số lượt xem: ' . ($soluotxem) . '</div></div>';
                                                ?>
                                            </h3>
                                        </div> -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="oc">
                                                    <h3 style="margin-bottom: 10px;"><b>Mô tả sản phẩm</b></h3>
                                                    <a href="#" id="openCart"><u>Tìm hiểu thêm</u></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- </div> -->

        <!-- bình luận -->
        <div class="container">
            <div class="col-12 d-md-flex">
                <div class="col-6">
                    <?php
                    if (!isset($_SESSION['makh'])):
                        ?>
                        <div class="alert alert-warning" role="alert">
                            Bạn cần đăng nhập để có thể xem và bình luận.
                        </div>
                        <?php
                    else:
                        ?>
                        <div class="comment-section">
                            <form action="index.php?action=binhluan&act=binhluan_action" method="post"
                                onsubmit="return validateForm()">
                                <div class="row">
                                    <input type="hidden" name="txtmahh" value="<?php echo $id; ?>" />
                                    <img src="Content/imagetourdien/people.png" width="50px" height="50px">
                                    <textarea class="input-field" type="text" name="comment" rows="2" cols="56" id="comment"
                                        placeholder="Thêm bình luận"></textarea>
                                    <input type="submit" class="btn btn-primary" id="submitButton" style="float: right;"
                                        value="Bình Luận">
                                </div>
                            </form>

                            <?php
                            $bl = new binhluan();
                            $noidung = $bl->selectBinhLuan($id);
                            $comment_count = $noidung->rowCount();
                            $show_limit = 3; // Số lượng bình luận muốn hiển thị ban đầu
                            $hidden_class = ($comment_count > $show_limit) ? "hidden" : ""; // Ẩn nếu số lượng bình luận vượt quá giới hạn
                            $count = 0; // Biến đếm số lượng bình luận đã hiển thị
                            while ($set = $noidung->fetch()):
                                ?>
                                <div class="col-12 comment <?php echo $hidden_class; ?>">
                                    <div class="row">
                                        <form action="index.php?action=binhluan&act=binhluanthich" method="post">
                                            <div class="row">
                                                <p>
                                                    <?php echo '<img src="Content/imagetourdien/k.jpg" alt="" width="30px" height="30px">' . '<b>' . $set['username'] . '</b>:' . $set['content'] . '<br>' . $set['timebl']; ?>
                                                </p>
                                            </div>

                                            <div class="row">

                                                <input type="hidden" name="masp" value="<?php echo $id; ?>" />
                                                <input type="hidden" name="idcomment" value="<?php echo $set['idcomment'] ?>" />
                                                <input type="hidden" name="luotthich" value="
                                                <?php
                                                if ($set['luotthich'] >= 1) {
                                                    echo $set['luotthich'] - 1;
                                                } else {
                                                    echo $set['luotthich'] + 1;
                                                }
                                                ?>" />
                                                <?php
                                                if ($set['luotthich'] >= 1) {
                                                    echo '<input type="submit" class="btn btn-primary" id="submitButton"
                                                        style="float: right;" value="Bỏ Thích">';
                                                } else {
                                                    echo '<input type="submit" class="btn btn-primary" id="submitButton"
                                                        style="float: right;" value="Thích">';
                                                }
                                                ?>

                                                <!-- <button style="border: none; background: white;" type="submit" id="submitButton"
                                                    value="Thích"><i id="heartIcon" class="fa fa-heart hi"></i></button> -->

                                            </div>
                                            <div class="row" style="left: 160px;bottom: 60px;font-family: system-ui;">
                                                <?php
                                                if ($set['luotthich'] >= 1) {
                                                    echo '<div id="heartIcon" style="color:red;top:4px" class="fa fa-heart hi"></div>' . $set['luotthich'];
                                                } else {
                                                    echo '<div id="heartIcon" style="top:4px" class="fa fa-heart hi"></div>' . $set['luotthich'];
                                                }
                                                ?>
                                            </div>
                                        </form>


                                    </div>

                                </div>
                                <?php
                                $count++;
                            endwhile;
                            ?>
                            <?php if ($comment_count > $show_limit): ?>
                                <div class="row">
                                    <button id="showMoreButton" class="btn btn-primary">Xem thêm</button>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>

        <script>
            // document.getElementById('submitButton').addEventListener('mouseover', function () {
            //     document.getElementById('heartIcon').classList.add('red-heart');
            // });

            // document.getElementById('submitButton').addEventListener('mouseout', function () {
            //     document.getElementById('heartIcon').classList.remove('red-heart');
            // });

            document.addEventListener("DOMContentLoaded", function () {
                document.getElementById("showMoreButton").addEventListener("click", function () {
                    var comments = document.querySelectorAll(".comment.hidden");
                    comments.forEach(function (comment, index) {
                        if (index < 5) {
                            comment.classList.remove("hidden");
                        }
                    });

                    if (document.querySelectorAll(".comment.hidden").length === 0) {
                        document.getElementById("showMoreButton").style.display = "none";
                    }
                });
            });

            function validateForm() {
                var comment = document.getElementById("comment").value;
                if (comment.trim() == "") {
                    Swal.fire({
                        title: "Lỗi",
                        text: "Vui lòng nhập nội dung bình luận",
                        icon: "error",
                        confirmButtonText: "OK",
                        allowOutsideClick: false
                    });
                    return false;
                }
                return true;
            }
        </script>
    </article>



</section>
<?php
include_once "View/footer.php";
?>
<style>
    /* .hi:hover {
        color: red;
    } */
    .size-button.selected {
        background-color: red;
        /* Màu bạn muốn tô cho nút được chọn */
        color: white;
    }

    table tbody td {
        background-color: #fff;
        color: #333;
    }

    table tbody tr:nth-child(even) td {
        background-color: #f8f9fa;
    }

    .table-bordered tbody td {
        border: 1px solid #dee2e6;
    }

    .table-bordered tbody tr:last-child td {
        border-bottom: 0;
    }

    /* Mặc định */
    h4,
    h3 {
        font-family: 'Times New Roman', Times, serif;
    }

    .default-color {
        background-color: orange;
        color: white;
    }

    /* Khi được nhấp vào */
    .clicked-color {
        background-color: silver;
        color: white;
    }

    .ob {
        border-radius: 15px;
        background: rgba(236, 235, 232, 0.65);
        padding: 15px;
        max-width: 49%;
        text-align: center;
        font-weight: bold;

    }

    .oa {
        text-transform: uppercase;
        display: flex;
        justify-content: space-between;
        padding: 10px 0 0 0 !important;
    }

    .oc {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 5px;
        margin-top: 30px;
        max-width: 100%;
    }
</style>

<div id="cartModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <!-- Nơi hiển thị thông tin sản phẩm trong giỏ hàng -->
        <div id="cartItems" class="product-description">
            <!-- Thông tin sản phẩm sẽ được hiển thị ở đây -->
            <?php echo $mota; ?>
        </div>
    </div>
</div>
<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        scrollbar-width: none;
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 60%;
        margin-top: 100px;
    }

    .close {
        color: #aaa;
        font-weight: bold;
        width: 30px;
        height: 30px;
        background: black;
        /* border-radius: 50%; */
        display: flex;
        position: relative;
        align-items: center;
        justify-content: center;
        left: 840px;
    }

    .close:hover,
    .close:focus {
        color: red;
        text-decoration: none;
        cursor: pointer;
    }

    .product-description {
        background-color: #f2f2f2;
        /* Màu nền bạn muốn áp dụng */
        padding: 10px;
        border-radius: 5px;
    }

    #openCart {
        color: black;
    }

    #openCart:hover {
        color: red;
    }
</style>

<script>
    // Khi người dùng nhấp vào "Giỏ Hàng"
    document.getElementById("openCart").addEventListener("click", function () {
        // Hiển thị modal
        document.getElementById("cartModal").style.display = "block";
    });

    // Khi người dùng nhấp vào nút đóng modal
    document.getElementsByClassName("close")[0].addEventListener("click", function () {
        // Ẩn modal
        document.getElementById("cartModal").style.display = "none";
    });

    // Đoạn mã Ajax để tải thông tin sản phẩm từ giỏ hàng và hiển thị nó trong #cartItems
    // Bạn cần thêm mã JavaScript hoặc Ajax để làm điều này

</script>