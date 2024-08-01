<?php
// unset($_SESSION['cart']);
// trước khi điều hướng qua View ,
// thì kiểm tra người dùng có giỏ hàng chưa
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();//chữa nhiều hàng, mỗi hàng là 1 object
}

$act = "giohang";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'giohang':
        include_once "./View/cart.php";
        break;
    case 'xacnhan':
        include_once "./View/xacnhan.php";
        break;

    case 'giohang_action':
        // những cái thông tin cần mua
        // nhận được mahh,mausac,size,soluong
        $mahh = 0;
        $mausac = '';
        $size = '';
        $soluong = 0;
        if (isset($_POST['mahh'])) {
            $mahh = $_POST['mahh'];
            $mausac = $_POST['mymausac'];
            $size = $_POST['size'];
            $soluong = $_POST['soluong'];
            //controller yêu cầu modl add thông tin vào trong giở hàng
            $gh = new giohang();
            $gh->addHangHoa($mahh, $mausac, $size, $soluong);
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham"/>';
        }
        break;
    case 'delete_cart':
        // nhận id
        if (isset($_GET['id'])) {
            $vt = $_GET['id'];
            unset($_SESSION['cart'][$vt]);
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';

        }
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        break;
    // case 'delete_carte':
    //     // nhận id
    //     if (isset($_GET['id'])) {
    //         $vt = $_GET['id'];
    //         unset($_SESSION['cart'][$vt]);
    //         echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home&act=home"/>';
    //     }
    //     $_SESSION['cart'] = array_values($_SESSION['cart']);
    //     break;
    case 'delete_cart_all':
        if (isset($_GET['id'])) {
            unset($_SESSION['cart']);
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
        }
        break;
    case 'update_cart':
        // người đung nhận submit chuyển thông tin đến server cụ thể là action
        if (isset($_POST['newqty'])) {
            $newqty = $_POST['newqty'];
            //dò trong newqty cái nào có số lượng khách với số lượng trong giỏ hàng thì update
            foreach ($newqty as $key => $value) {
                if ($_SESSION['cart'][$key]['soluong'] != $value) {
                    $gh = new giohang();
                    $gh->updateHH($key, $value);
                }
            }
        }
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        break;


    case 'donhang_action':
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $hd = new hoadon();
            $hoten = $_POST['hoten'];
            $sodienthoai = $_POST['sodienthoai'];
            $diachi = $_POST['diachi'];
            $thanhtoan = $_POST['thanhtoan'];
            $phiship = $_POST['phiship'];
            $ghichu = $_POST['ghichu'];
            $hd->insertXacNhan($hoten, $sodienthoai, $diachi, $thanhtoan,$phiship,$ghichu);
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=thanhtoan"/>';
        }
        break;
}

?>