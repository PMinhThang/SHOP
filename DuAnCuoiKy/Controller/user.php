<?php
$act = "user";
$makh = $_SESSION['makh'];
$user = new user();
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
include_once "./View/user.php";
switch ($act) {

    case 'doimatkhau':
        include_once "./View/user.php";
        break;
    case 'doimatkhau_action':
        if (isset($_POST['doimatkhau'])) {
            $passcu = $_POST['passcu'];
            $passmoi = $_POST['passmoi'];
            $passmoi1 = $_POST['passmoi1'];
            $salfF = "G435#";
            $salfL = "T34a!&";
            $kh = new user();
            $checkmkhau = $kh->getUser($makh);
            if (md5($salfF . $passcu . $salfL) == $checkmkhau['matkhau']) {
                $passmoi = md5($salfF . $passmoi1 . $salfL);
                $kh->DoiMatKhau($makh, $passmoi);
            
                // Sử dụng SweetAlert2 để hiển thị thông báo và chuyển hướng khi đổi mật khẩu thành công
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                echo '<script>
                    Swal.fire({
                        title: "Đổi Mật Khẩu Thành Công",
                        icon: "success",
                        confirmButtonText: "OK",
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "./index.php?action=home";
                        }
                    });
                    </script>';
            } else {
                // Sử dụng SweetAlert2 để hiển thị thông báo và chuyển hướng khi mật khẩu cũ không đúng
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                echo '<script>
                    Swal.fire({
                        title: "Mật Khẩu Cũ Không Đúng",
                        text: "Vui lòng kiểm tra lại mật khẩu cũ.",
                        icon: "error",
                        confirmButtonText: "OK",
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "./index.php?action=user&act=doimatkhau";
                        }
                    });
                    </script>';
            }
        }
        break;

    case "doi_user":
        include_once "./View/user.php";
        break;
    case "doiuser":
        // nhận thông tin
        if (isset($_POST['doi_user'])) {
            $tenkh = $_POST['tenkh'];
            $diachi = $_POST['diachi'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $sodienthoai = $_POST['sodienthoai'];
            $kh = new user();
            $check = $kh->getUser($makh);

            if ($check !== false) {
                $kh->DoiUser($makh, $tenkh, $username, $diachi, $sodienthoai, $email);
            
                // Sử dụng SweetAlert2 để hiển thị thông báo và chuyển hướng khi cập nhật dữ liệu thành công
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                echo '<script>
                    Swal.fire({
                        title: "Cập nhật dữ liệu thành công",
                        icon: "success",
                        confirmButtonText: "OK",
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "./index.php?action=user&act=user";
                        }
                    });
                    </script>';
            } else {
                // Sử dụng SweetAlert2 để hiển thị thông báo và chuyển hướng khi cập nhật dữ liệu không thành công
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                echo '<script>
                    Swal.fire({
                        title: "Cập nhật dữ liệu không thành công",
                        text: "Vui lòng kiểm tra lại thông tin.",
                        icon: "error",
                        confirmButtonText: "OK",
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "./index.php?action=user&act=doi_user";
                        }
                    });
                    </script>';
            }

        }
        break;


}

?>
<head>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
