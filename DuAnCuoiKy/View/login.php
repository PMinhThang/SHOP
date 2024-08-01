<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="wrapper " style="margin-top:105px; margin-left:300px">
        <i style="--clr: #00f3fc;"></i>
        <i style="--clr: #ff0790;"></i>
        <i style="--clr: lightgrey"></i>
        <i style="--clr: #37fc00;"></i>
        <div class="login">
            <h2><b>Đăng Nhập</b></h2>

            <form action="index.php?action=dangnhap&act=dangnhap_action" method="post">
                <div class="form-group ">
                    <input type="text" name="txtusername" placeholder="Tên đăng nhập">
                </div>
                <div class="form-group" style="margin-top:10px;">
                    <input type="password" name="txtpassword" placeholder="Nhập mật khẩu" id="input-pass">
                    <p style="position: absolute; top: 23px;right: 18px;color: white;" class="fa-solid fa-eye"
                        id="show-pass"></p>
                </div>
                <button type="submit" style="margin-top:15px;">Đăng Nhập</button>
            </form>

            <div class="links">
                <a href="index.php?action=dangky" style="margin-left:45px;">Đăng ký ngay</a></p>
                <a href="index.php?action=forget" style="margin-right:45px;">Quên mật khẩu</a>
            </div>


        </div>
    </div>


</body>

</html>
<script>
const btnShowPass = document.querySelector("#show-pass");
const inputPass = document.querySelector("#input-pass");

btnShowPass.addEventListener("click", function() {
    btnShowPass.classList.toggle("active");
    if (inputPass.type == "password") {
        inputPass.type = "text";
    } else {
        inputPass.type = "password";
    }
});
</script>
<style>
p::after {
    content: "";
    position: absolute;
    width: 120%;
    height: 2px;
    background-color: white;
    top: 5px;
    left: -1px;
    transform: rotate(-45deg);
    opacity: 0;
    transition: 0.2s;
}

p.active::after {
    opacity: 1;
}

@import url("https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap");


body {

    height: 85vh;
    margin: 0;
    display: grid;
    place-items: center;
    background: #777777;
    font-size: 1.6em;
}

h2,
input,
a {
    color: #fff;

}

.wrapper {
    position: relative;
    width: 550px;
    height: 550px;
    display: grid;
    place-items: center;
    font-family: "Qicksand", sans-serif;
}

.wrapper i {
    position: absolute;
    inset: 0;
    border: 2px solid #fff;
    transition: 0.5s;

    &:nth-child(1) {
        border-radius:
            38% 62% 63% 37% / 41% 44% 56% 59%;
        animation: anim 6s linear infinite;
    }

    &:nth-child(2),
    &:nth-child(3),
    &:nth-child(4) {
        border-radius:
            41% 44% 56% 59% / 38% 62% 63% 37%;
    }

    &:nth-child(2) {
        animation: anim 4s linear infinite;
    }

    &:nth-child(3) {
        animation: anim2 10s linear infinite;
    }

    &:nth-child(4) {
        animation: anim2 8s linear infinite;
    }
}

.wrapper:hover i {
    border: 6px solid var(--clr);
    filter: drop-shadow(0 0 20px var(--clr));
}

@keyframes anim {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }

}

@keyframes anim2 {
    0% {
        transform: rotate(360deg);
    }

    100% {
        transform: rotate(0deg);
    }
}

.login {
    width: 350px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 20px;
    z-index: 2;
}

h2 {
    font-size: 2em;
    margin: 0;
}

input {
    width: 100%;
    border: 2px solid #fff;
    border-radius: 40px;
    padding: 12px 20px;
    box-sizing: border-box;
    background: transparent;
    font-size: 1.2em;
    box-shadow: none;
    outline: none;
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

input::placeholder {
    color: rgba(255, 255, 255, 0.75);
}

.links {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
    box-sizing: border-box;
}

a {
    text-decoration: none;
}
</style>