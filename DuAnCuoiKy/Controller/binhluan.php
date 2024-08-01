
<?php
$act = "binhluan";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'binhluan_action':
        if (isset($_SESSION['makh'])) {
            $bl = new binhluan();
            $makh = $_SESSION['makh'];
            $cmt = $_POST['comment'];
            $masp = $_POST['txtmahh'];
                $bl->insertBinhLuan($makh, $masp, $cmt);
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham&act=sanphamchitiet&id=' . $masp . '"/>';
            }
            break;
    case 'binhluanthich':
        if (isset($_POST['luotthich'])) {
            $bl = new binhluan();
            // $masp = $_POST['txtmahh'];
            $luotthich = $_POST['luotthich'];
            $idcomment = $_POST['idcomment'];
            $masp = $_POST['masp'];
            $bl->updateBinhLuan($idcomment, $luotthich);
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham&act=sanphamchitiet&id=' . $masp . '"/>';
            break;
        } else {
            echo '<script> alert("Thích Thất Bại");</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham&act=sanphamchitiet&id=' . $masp . '"/>';
            break;
        }
    }
?>