<?php
$act="hanghoa";
if(isset($_GET['act']))
{
    $act=$_GET['act'];
}
switch ($act) {
    case 'hanghoa':
        include_once "./View/hanghoa.php";
        break;
    
    case 'insert_hanghoa':
        include_once "./View/edithanghoa.php";
        break;
    case 'insert_action':
        // nhận thông tin về
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $mahh=$_POST['mahh'];
            $tenhh=$_POST['tenhh'];
            $maloai=$_POST['maloai'];
            $dacbiet=$_POST['dacbiet'];
            $slx=$_POST['slx'];
            $ngaylap=$_POST['ngaylap'];
            $mota=$_POST['mota'];
            // đem vào insert database$_POST['mahh'];
            $hh=new hanghoa();
            $check=$hh->insertHangHoa($tenhh,$maloai,$dacbiet,$slx,$ngaylap,$mota);
            if($check!==false)
            {
                echo '<script>alert("Thêm dữ liệu thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=../index.php?action=hanghoa"/>';
            }
            else
            {
                echo '<script>alert("Thêm dữ liệu ko thành công");</script>';
                include_once "./View/edithanghoa.php";
            }

        }
        break;
    
        case 'delete_hanghoa':
            if(isset($_GET['mahh'])) {
                $mahh = $_GET['mahh'];
                // Gọi hàm xóa hàng hóa từ đối tượng hanghoa
                $hh = new hanghoa();
                $check = $hh->deleteHangHoa($mahh);
                if($check !== false) {
                    echo '<script>alert("Xóa dữ liệu thành công");</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa"/>';
                } else {
                    echo '<script>alert("Xóa dữ liệu không thành công");</script>';
                    // Nếu xóa không thành công, quay lại trang danh sách hàng hóa
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa"/>';
                }
            } else {
                // Nếu không có mã hàng hóa được cung cấp, thông báo lỗi và quay lại trang danh sách hàng hóa
                echo '<script>alert("Không có mã hàng hóa được cung cấp");</script>';
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa"/>';
            }
            break;       

    case 'update_hanghoa':
        include_once "./View/edithanghoa.php";
        break;
    case "update_action":
        // nhận thông tin
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $mahh=$_POST['mahh'];
            $tenhh=$_POST['tenhh'];
            $maloai=$_POST['maloai'];
            $dacbiet=$_POST['dacbiet'];
            $slx=$_POST['slx'];
            $ngaylap=$_POST['ngaylap'];
            $mota=$_POST['mota'];
            // đem vào insert database$_POST['mahh'];
            $hh=new hanghoa();
             $check=$hh->updateHangHoa($mahh,$tenhh,$maloai,$dacbiet,$slx,$ngaylap,$mota);
            if($check!==false)
            {
                echo '<script>alert("Update liệu thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=../index.php?action=hanghoa"/>';
            }
            else
            {
                echo '<script>alert("Update dữ liệu ko thành công");</script>';
                include_once "./View/edithanghoa.php";
            }

        }
        break;
       
        
}

?>