<?php
$act="dangnhap";
if(isset($_GET['act']))
{
    $act=$_GET['act'];
}
switch ($act) {
    case 'dangnhap':
        include_once "./View/login.php";
        break;
    
    case 'dangnhap_action':
         //gửi thông tin đăng nhập qua đây
         $user='';
         $pass='';
        if(isset($_POST['txtusername']) && isset($_POST['txtpassword']))
        {
            $user=$_POST['txtusername'];
            $pass=$_POST['txtpassword'];
            $salfF="G435#";
            $salfL="T34a!&";
            $passnew=md5($salfF.$pass.$salfL);
            //controller yêu cầu kiểm tra xem có người này hay không?
            $kh=new user();
            $logkh=$kh->logKhachHang($user,$passnew);
            if ($logkh) {
                // nếu đăng nhập thành công thì lưu thông tin vào trong session
                $_SESSION['makh'] = $logkh['makh'];
                $_SESSION['tenkh'] = $logkh['tenkh'];
            
                // Sử dụng SweetAlert2 để hiển thị thông báo và chuyển hướng
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                echo '<script>
                    Swal.fire({
                        title: "Đăng nhập thành công!",
                        icon: "success",
                        confirmButtonText: "OK",
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "./index.php?action=home";
                        }
                    });
                    </script>';
            }
            else {
                // Sử dụng SweetAlert2 để hiển thị thông báo và chuyển hướng khi đăng nhập không thành công
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                echo '<script>
                    Swal.fire({
                        title: "Đăng nhập không thành công",
                        text: "Vui lòng kiểm tra lại thông tin đăng nhập.",
                        icon: "error",
                        confirmButtonText: "OK",
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "./index.php?action=dangnhap";
                        }
                    });
                    </script>';
            }
        }
        break;
        case 'dangxuat':
            unset($_SESSION['makh']);
            unset($_SESSION['tenkh']);
            unset($_SESSION["cart"]);
            $gh = new hanghoa();
            $gh->XoaYeuThich();

            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
            break;
}
    
?>
<head>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>