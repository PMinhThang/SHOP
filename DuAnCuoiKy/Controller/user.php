<?php
    $act = "user";  
    $makh = $_SESSION['makh'];
    $user = new user();
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    include_once "./View/user.php";
    switch ($act) {
        case 'update_user':
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $tenkh = $_POST['tenkh'];
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];
                $diachi = $_POST['diachi'];
                $kh=$user->updateUser($makh, $tenkh, $email, $sdt, $diachi);
                echo "<script>alert('Thành công')</script>
                <meta http-equiv='refresh' content='0;url=./index.php?action=user&act=thongtincanhan'/>";
            }
            break;
        case "doimatkhau":
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $mkcu =$_POST['matkhaucu'];
                $mkmoi1 =$_POST['matkhaumoi1'];
                $mkmoi2 =$_POST['matkhaumoi2'];
                $saltF = 'TX024@';
                $kh= $user->getUser($makh);
                if (md5($saltF.$mkcu)==$kh['matkhau']) {
                    if ($mkmoi1===$mkmoi2) {
                        $mkmoi = md5($saltF.$mkmoi1);
                        $user->changePass($makh, $mkmoi);
                        echo "<script>alert('Thành công')</script>
                             <meta http-equiv='refresh' content='0;url=./index.php?action=user&act=thongtincanhan'/>";
                    }
                    else {
                        echo "<script>alert('Mật khẩu nhập lại không trùng khớp')</script>
                        <meta http-equiv='refresh' content='0;url=./index.php?action=user&act=doimatkhau'/>";
                    }
                } else {
                    echo "<script>alert('Mật khẩu cũ không đúng')</script>
                        <meta http-equiv='refresh' content='0;url=./index.php?action=user&act=doimatkhau'/>";
                }
            }
            break;
        case "lsgd":
                include_once "./View/user.php";
            break;
    }

?>