<?php
if (isset($_GET['id'])) {
    $makh = $_GET['id'];
    // truy vấn thông tin của id
    $hh = new user();
    $kq = $hh->getKhachHangID($makh);
    $tenkh = $kq['tenkh'];
    $diachi = $kq['diachi'];
    $username = $kq['username'];
    $matkhau = $kq['matkhau'];
    $email = $kq['email'];
    $sodienthoai = $kq['sodienthoai'];
}
?>

<div class="col-md-8 col-md-offset-2 mt-5">
    <button onclick="goBack()" class="btn btn-secondary">Quay lại</button>
    <?php
    echo '<form action="index.php?action=user&act=updateuser" method="post" enctype="multipart/form-data">';
    ?>

    <table class="table table-hover" style="border: 0px;">
        <tr>
            <td>Mã khách hàng</td>
            <td> <input type="text" class="form-control" name="makh" value="<?php if (isset($makh))
                echo $makh; ?>" readonly /></td>
        </tr>

        <tr>
            <td>Họ tên</td>
            <td><input type="text" class="form-control" required name="tenkh" value="<?php if (isset($tenkh))
                echo $tenkh; ?>" maxlength="100px"></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type="text" class="form-control" required name="username" value="<?php if (isset($username))
                echo $username; ?>" maxlength="100px"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" class="form-control" required name="email" value="<?php if (isset($email))
                echo $email; ?>" maxlength="100px"></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" class="form-control" required name="diachi" value="<?php if (isset($diachi))
                echo $diachi; ?>" maxlength="100px"></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="text" class="form-control" required name="matkhau" value="<?php $hashed_password = $matkhau; // giá trị đã được mã hóa bạn muốn giải mã ngược lại
            $salfF = "G435#";
            $salfL = "T34a!&";
            // Duyệt qua các mật khẩu có thể
            for ($i = 0; $i <= 999999; $i++) {
                $potential_password = md5($salfF . $i . $salfL); // thử mật khẩu có thể
                if ($potential_password === $hashed_password) {
                    echo $i;
                    break;
                }
            } ?>">
            </td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td><input type="text" class="form-control" name="sodienthoai" value="<?php if (isset($sodienthoai))
                echo $sodienthoai; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
            </td>
        </tr>

    </table>
    <input class="btn btn-primary" type="submit" value="submit">
    </form>
</div>
<script>
    function enableNumberInput(checkbox) {
        var input = checkbox.parentNode.nextElementSibling.querySelector('input[type="number"]');
        if (checkbox.checked) {
            input.disabled = false;
        } else {
            input.disabled = true;
            input.value = null;
        }
    }
    function goBack() {
        window.history.back();
    }
</script>