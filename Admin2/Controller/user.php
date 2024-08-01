<?php
$act="user";
if(isset($_GET['act']))
{
    $act=$_GET['act'];
}
switch ($act) {
    case 'user':
        include_once "./View/user.php";
        break;
    
    case 'delete_user':
        if(isset($_GET['makh'])) {
            $makh = $_GET['makh'];
            // Gọi hàm xóa hàng hóa từ đối tượng hanghoa
            $hh = new user();
            $check = $hh->deleteUser($makh);
            if($check !== false) {
                echo '<script>alert("Xóa dữ liệu thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=user"/>';
            } else {
                echo '<script>alert("Xóa dữ liệu không thành công");</script>';
                // Nếu xóa không thành công, quay lại trang danh sách hàng hóa
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=user"/>';
            }
        }
        break;
    case 'update_user':
        include_once "./View/edituser.php";
        break;
    case "updateuser":
        // nhận thông tin
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $makh=$_POST['makh'];
            $tenkh=$_POST['tenkh'];
            $diachi=$_POST['diachi'];
            $username=$_POST['username'];
            $email=$_POST['email'];
            $sodienthoai=$_POST['sodienthoai'];
            $matkhau=$_POST['matkhau'];
            $salfF="G435#";
            $salfL="T34a!&";
            $passnew=md5($salfF.$matkhau.$salfL);
            // đem vào insert database$_POST['makh'];
            $hh=new user();
                $check=$hh->updateKH($makh,$tenkh,$diachi,$username,$passnew,$email,$sodienthoai);
                
            if($check!==false)
            {
                echo '<script>alert("Update liệu thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=user&act=user"/>';
            }
            else
            {
                echo '<script>alert("Update dữ liệu ko thành công");</script>';
                include_once "./View/edituser.php";
            }

        }
        break;
        
    case 'timkiemkh':
        // nhaanhj giá trị người dùng gõ tìm kiếm và tìm kiếm trên sản phẩm
        include_once "./View/user.php";
        break;

   

    }
    
?>