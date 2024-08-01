<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Khách Hàng</title>
    <!-- Bootstrap CSS -->

    <!-- Font Awesome -->

    <style>
        /* CSS tùy chỉnh */
        .super_container,
        h3 {
            padding: 20px;
            font-family: 'Times New Roman', Times, serif;
        }

        .login-block {
            margin: auto;
            max-width: 600px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .login-block h3 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .login-block .form-control {
            border-radius: 25px;
        }

        .login-block .doithongtin {
            background-color: #ff6700;
            color: #fff;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .login-block .doithongtin:hover {
            background-color: #d45a00;
        }

        button {
            background-color: #ff6700;
            color: #fff;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: #d45a00;
        }

        p::after {
            content: "";
            position: absolute;
            width: 120%;
            height: 1.5px;
            background-color: #000;
            top: 6.5px;
            left: -1px;
            transform: rotate(-45deg);
            opacity: 0;
            transition: 0.2s;
        }

        p.active::after {
            opacity: 1;
        }
        .form-control{
            font-size: medium;
        }
    </style>
</head>

<body>
    <?php
    $ac = 1;
    if (isset($_GET['action'])) {
        if (isset($_GET['act']) && $_GET['act'] == 'user') {
            $ac = 1;
        }
        if (isset($_GET['act']) && $_GET['act'] == 'doimatkhau') {
            $ac = 2;
        }
        if (isset($_GET['act']) && $_GET['act'] == 'doi_user') {
            $ac = 3;
        }
    }
    ?>
    <div class="super_container">
        <?php if ($ac == 2) { ?>
            <section class="login-block" style="margin-top:100px;">
                <div class="container">
                    <h3>THAY ĐỔI MẬT KHẨU</h3>
                    <div class="row">
                        <div class="col-md-12 login-sec">
                            <form action="index.php?action=user&act=doimatkhau_action" class="login-form" method="post"
                                onsubmit="return check()">
                                <div class="form-group">
                                    <label for="passcu" class="text-uppercase">Mật Khẩu Cũ</label>
                                    <input type="password" class="form-control" id="passcu" name="passcu"
                                        placeholder="Nhập Mật Khẩu Cũ">
                                    <p style="position: absolute; top: 37px;right: 18px;color: black;"
                                        class="fa-solid fa-eye" id="show-passcu"></p>
                                </div>
                                <div class="form-group">
                                    <label for="passmoi" class="text-uppercase">Mật Khẩu Mới</label>
                                    <input type="password" class="form-control" id="passmoi" name="passmoi"
                                        placeholder="Nhập Mật Khẩu Mới">
                                    <p style="position: absolute; top: 37px;right: 18px;color: black;"
                                        class="fa-solid fa-eye" id="show-passmoi"></p>
                                </div>
                                <div class="form-group">
                                    <label for="passmoi1" class="text-uppercase">Nhập Lại Mật Khẩu Mới</label>
                                    <input type="password" class="form-control" id="passmoi1" name="passmoi1"
                                        placeholder="Nhập Lại Mật Khẩu Mới">
                                    <p style="position: absolute; top: 37px;right: 18px;color: black;"
                                        class="fa-solid fa-eye" id="show-passmoi1"></p>
                                </div>
                                <div class="form-group" style="text-align:center;">
                                    <input style="background:orange;width: 45%;" type="submit" name="doimatkhau"
                                        class="doithongtin" value="Đổi Mật Khẩu">
                                    <button type="button" onclick="redirectTo('index.php?action=user&act=user')"
                                        style="margin-top:15px;background:orange;width: 30%;">Thông tin</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>
        <?php if ($ac == 1) { ?>
            <section class="col-md-12" style="margin-top:100px;">

                <div class="container ">
                    <h3 style="text-align: center;">THÔNG TIN KHÁCH HÀNG</h3>
                    <?php if (isset($_SESSION['makh'])) {
                        $makh = $_SESSION['makh'];
                        $us = new user();
                        $kh = $us->selectThongTinKH($makh);
                        $tenkh = $kh['tenkh'];
                        $username = $kh['username'];
                        $email = $kh['email'];
                        $dc = $kh['diachi'];
                        $sodt = $kh['sodienthoai'];
                        ?>
                        <form>

                            <div class="row" style="margin-top:25px;">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="text-black" for="fname">Tên Khách Hàng</label>
                                        <input type="text" class="form-control" id="fname" value="<?php echo $tenkh ?>"
                                            disabled>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black" for="lname">Tên Đăng Nhập</label>
                                        <input type="text" class="form-control" id="lname" value="<?php echo $username ?>"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-black" for="fname">Email</label>
                                        <input type="text" class="form-control" id="fname" value="<?php echo $email ?>"
                                            disabled>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black" for="lname">Số Điện Thoại</label>
                                        <input type="text" class="form-control" id="lname" value="<?php echo $sodt ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-black" for="email">Địa Chỉ</label>
                                <input type="email" class="form-control" id="email" value="<?php echo $dc ?>" disabled>
                            </div>
                            <div class="forrm-group">
                                <button type="button" onclick="redirectTo('index.php?action=user&act=doimatkhau')"
                                    style="margin-top:15px; background:orange;position: relative;left: 25%;width: 25%;">Đổi mật
                                    khẩu</button>
                                <button type="button" onclick="redirectTo('index.php?action=user&act=doi_user')"
                                    style="margin-top:15px; background:orange;position: relative;left: 25%;width: 25%;">Đổi
                                    thông tin</button>
                            </div>

                        </form>

                        <?php
                    }
                    ?>

                </div>

            </section>
        <?php } ?>
        <?php if ($ac == 3) { ?>
            <section class="login-block" style="margin-top:100px;">
                <div class="container">
                    <h3>THAY ĐỔI THÔNG TIN</h3>
                    <div class="row">
                        <div class="col-md-12 login-sec">
                            <?php if (isset($_SESSION['makh'])) {
                                $makh = $_SESSION['makh'];
                                $us = new user();
                                $kh = $us->selectThongTinKH($makh);
                                $tenkh = $kh['tenkh'];
                                $username = $kh['username'];
                                $email = $kh['email'];
                                $dc = $kh['diachi'];
                                $sodt = $kh['sodienthoai'];
                                ?>
                                <form action="index.php?action=user&act=doiuser" class="login-form" method="post"
                                    onsubmit="return validateForm()">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tenkh" class="text-uppercase">Tên khách hàng</label>
                                                <input type="text" class="form-control" id="tenkh" name="tenkh" value="<?php if (isset($tenkh))
                                                    echo $tenkh; ?> " maxlength="10">
                                                     
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="text-uppercase">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="<?php if (isset($email))
                                                    echo $email; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="username" class="text-uppercase">Tên đăng nhập</label>
                                                <input type="text" class="form-control" id="username" name="username" value="<?php if (isset($username))
                                                    echo $username; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="sodienthoai" class="text-uppercase">Số điện thoại</label>
                                                <input type="phone" class="form-control" id="sodienthoai" name="sodienthoai" required autofocus type="text" pattern="0[0-9]{9}"
                                                    value="<?php if (isset($sodt))
                                                        echo $sodt; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="diachi" class="text-uppercase">Địa chỉ</label>
                                                <input type="text" class="form-control" id="diachi" name="diachi" value="<?php if (isset($dc))
                                                    echo $dc; ?>">
                                            </div>
                                            <div class="form-group" style="text-align:center;">
                                                <input style="background:orange;width: 45%;" type="submit" name="doi_user"
                                                    class="doithongtin" value="Đổi Thông Tin">
                                                <button type="button" onclick="redirectTo('index.php?action=user&act=user')"
                                                    style="margin-top:15px;background:orange;width: 30%;">Thông tin</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>

        <?php } ?>

    </div>

</body>

</html>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function check() {
            var passcu = document.getElementById("passcu");
            var newpass = document.getElementById("passmoi");
            var newpass1 = document.getElementById("passmoi1");
            if (passcu.value === "") {
                alert("Bạn Chưa Nhập Mật Khẩu Cũ");
                return false;
            }
            if (newpass.value === "") {
                alert("Bạn Chưa Nhập Mật Khẩu Mới");
                return false;
            }
            if (newpass1.value === "") {
                alert("Bạn Chưa Nhập Lại Mật Khẩu Mới");
                return false;
            }
            if (newpass.value != newpass1.value) {
                alert("Mật Khẩu Nhập Lại Không Giống");
                return false;
            }
        }
        function redirectTo(url) {
            window.location.href = url; // Chuyển hướng đến URL được chỉ định
        }
        const btnShowPass = document.querySelector("#show-passcu");
        const inputPass = document.querySelector("#passcu");
        const btnShowPassMoi = document.querySelector("#show-passmoi");
        const inputPassMoi = document.querySelector("#passmoi");
        const btnShowPassMoi1 = document.querySelector("#show-passmoi1");
        const inputPassMoi1 = document.querySelector("#passmoi1");
        btnShowPass.addEventListener("click", function () {
            btnShowPass.classList.toggle("active");
            if (inputPass.type == "password") {
                inputPass.type = "text";
            } else {
                inputPass.type = "password";
            }
        });
        btnShowPassMoi.addEventListener("click", function () {
            btnShowPassMoi.classList.toggle("active");
            if (inputPassMoi.type == "password") {
                inputPassMoi.type = "text";
            } else {
                inputPassMoi.type = "password";
            }
        });
        btnShowPassMoi1.addEventListener("click", function () {
            btnShowPassMoi1.classList.toggle("active");
            if (inputPassMoi1.type == "password") {
                inputPassMoi1.type = "text";
            } else {
                inputPassMoi1.type = "password";
            }
        });
        function validateForm() {
            var tenkh = document.getElementById("tenkh").value;
            var email = document.getElementById("email").value;
            var username = document.getElementById("username").value;
            var sodienthoai = document.getElementById("sodienthoai").value;
            var diachi = document.getElementById("diachi").value;

            if (tenkh.trim() == "" || email.trim() == "" || username.trim() == "" || sodienthoai.trim() == "" || diachi.trim() == "") {
                alert("Vui lòng nhập đầy đủ thông tin.");
                return false;
            }
            return true;
        }
        

    </script>
<?php
include_once "View/footer.php";
?>