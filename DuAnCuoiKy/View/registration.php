<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="planet" style="margin-left:250px; margin-bottom:150px; margin-top:170px">
        <div class="satellite"></div>

        <div class="container" style="margin-left:210px; margin-top:-60px; ">
            <h2 style="margin-left: 105px;margin-top:-25px; color:white"><b>Đăng Ký</b></h2>
            <div class="row justify-content-center">

                <div class="col-md-12">

                    <form style="margin-top:25px" action="index.php?action=dangky&act=dangky_action" method="post"
                        class="form">
                        <div style="position: relative; left: 180px;">
                            <div class="form-group " style="    margin-left: -80px; margin-right: 165px;">
                                <label for="txttenkh">Tên Khách Hàng:</label>
                                <input style="border-radius: 20px;font-size: 15px;" class="form-control" name="txttenkh"
                                    placeholder="Nhập tên khách hàng" required="" autofocus="" type="text" maxlength="10">
                            </div>
                            <div class="form-group "
                                style="    margin-right: -90px;margin-left: 170px; margin-top: -67px;">
                                <label for="txtusername">Tên Đăng Nhập:</label>
                                <input style="border-radius: 20px;font-size: 15px;" class="form-control" name="txtusername"
                                    placeholder="Nhập tên đăng nhập" required="" type="text">
                            </div>
                        </div>
                        <div class="form-group"
                            style="margin-left: -80px; margin-right: -90px; position: relative; left: 220px;">
                            <label for="txtdiachi">Địa chỉ:</label>
                            <input style="border-radius: 20px;font-size: 15px;" class="form-control" name="txtdiachi"
                                placeholder="Nhập địa chỉ khách hàng" required="" autofocus="" type="text">
                        </div>
                        <div style="position: relative; left: 240px;">
                            <div class="form-group" style="margin-left: -80px; margin-right: 165px;">
                                <label for="txtsodt">Số Điện Thoại:</label>
                                <input style="border-radius: 20px;font-size: 15px;" class="form-control" name="txtsodt"
                                    placeholder="Nhập số điện thoại"
                                    required autofocus type="text" pattern="0[0-9]{9}">
                            </div>
                            <div class="form-group "
                                style=" margin-right: -90px; margin-left: 170px; margin-top: -67px;">
                                <label for="txtemail">Email:</label>
                                <input style="border-radius: 20px;font-size: 15px;" class="form-control" name="txtemail"
                                    placeholder="Nhập email" required type="email">
                            </div>
                        </div>
                        <div style="position: relative; left: 238px;">
                            <div class="form-group " style="    margin-left: -80px;margin-right: 165px;">
                                <label for="txtpass">Mật khẩu:</label>
                                <input style="border-radius: 20px;font-size: 15px;" class="form-control" name="txtpass"
                                    placeholder="Nhập mật khẩu" required="" type="password" id="input-pass">
                                <i style="position: absolute; top: 34px;right: 10px;color: black;"
                                    class="fa-solid fa-eye" id="show-pass"></i>
                            </div>
                            <div class="form-group "
                                style="    margin-right: -90px;margin-left: 170px; margin-top: -67px;">
                                <label for="retypepassword">Nhập lại mật khẩu:</label>
                                <input style="border-radius: 20px;font-size: 15px;" class="form-control" name="retypepassword"
                                    placeholder="Nhập lại mật khẩu" required="" type="password" id="inputpass">
                                <i style="position: absolute; top: 34px;right: 10px;color: black;"
                                    class="fa-solid fa-eye" id="showpass"></i>
                            </div>
                        </div>
                        <button style="border-radius: 20px; position: relative; left: 111px; margin-top:68px "
                            class="btn btn-dark btn-block" type="submit" name="submit">Đăng ký</button>
                        <p style="color:white;border-radius: 20px;position: relative;left: 453px;margin-top: -22px;">Đã
                            có tài khoản? <a href="index.php?action=dangnhap">Đăng nhập ngay!</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
<script>
    const btnShowPass = document.querySelector("#show-pass");
    const inputPass = document.querySelector("#input-pass");

    btnShowPass.addEventListener("click", function () {
        btnShowPass.classList.toggle("active");
        if (inputPass.type == "password") {
            inputPass.type = "text";
        }
        else {
            inputPass.type = "password";
        }
    });
    const ShowPass = document.querySelector("#showpass");
    const iPass = document.querySelector("#inputpass");

    ShowPass.addEventListener("click", function () {
        ShowPass.classList.toggle("active");
        if (iPass.type == "password") {
            iPass.type = "text";
        }
        else {
            iPass.type = "password";
        }
    });
</script>
<style>
    i::after {
        content: "";
        position: absolute;
        width: 120%;
        height: 2px;
        background-color: #000;
        top: 5px;
        left: -1px;
        transform: rotate(-45deg);
        opacity: 0;
        transition: 0.2s;
    }

    i.active::after {
        opacity: 1;
    }

    body {
        background: #101227;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
        font-size: 12px;
    }

    .container {
        color: white;
    }

    button[type="submit"] {
        width: 100%;
        background:
            linear-gradient(45deg, #ff357a, #fff172);
        border: none;
        cursor: pointer;
        border-radius: 40px;
        padding: 12px 20px;
        box-sizing: border-box;
        font-size: 1.2em;
        box-shadow: none;
        outline: none;
    }

    .planet {
        background-position: -314px -23px;
        width: 30em;
        height: 30em;
        background-image: url("./Content/imagetourdien/ag.jpg");
        border-radius: 50%;
        box-shadow:
            0 0 5em 0 #fed84c80,
            0 0 20em 4em #e8a55233,
            0 0 55em 8em #ff4d4d1a;
        position: relative;
    }

    .satellite,
    .satellite::after {
        content: "";
        position: absolute;
        width: 5em;
        height: 5em;
        border-radius: 50%;
    }

    .satellite {
        background: #ffedd1;
        box-shadow: -2em 0 5em -1em white;
        overflow: hidden;
        transition: 250ms;
        left: 32em;
        transform: rotate(20deg);
        animation: round 5s infinite ease-in-out;
    }

    .satellite::after {
        background: #262938;
        width: 2.5em;
        left: 2.5em;
        box-shadow: 0 0 0.75em 0.95em #262938;
        animation: shadow 5s infinite ease-in-out;
    }

    @keyframes shadow {
        0% {
            width: 2.5em;
            left: 0;
        }

        25% {
            width: 5em;
            left: 0;
        }

        50% {
            width: 2.5em;
            left: 2.5em;
        }

        75% {
            width: 0;
            left: 5em;
        }

        80% {
            left: 0;
            box-shadow: 0 0 0.55em 0.75em #262938;
        }

        100% {
            width: 2.5em;
            left: 0;
        }
    }

    @keyframes round {

        0%,
        100% {
            top: 2em;
            left: -15em;
            box-shadow: -2em 0 5em 0.5em #c6836466;
            z-index: 2;
        }

        25% {
            box-shadow: 0 0 3em 1em #412104b5;
        }

        75% {
            box-shadow: 0 0 3em 1em black;
        }

        48% {
            z-index: 2;
        }

        50% {
            top: 20em;
            left: 40em;
            box-shadow: 2em 0 5em 0.5em #845a4682;
            z-index: -1;
        }

        99% {
            z-index: -1;
        }
    }
</style>