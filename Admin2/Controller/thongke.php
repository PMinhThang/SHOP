<?php
$act = "thongke";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'thongke':
        include_once "./View/thongke.php";
        break;
    case 'thongke_action':
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $nam = $_POST['nam'];
            if ($nam != '0') {
                list($nam) = explode('-', $nam);
                $_SESSION['nam'] = $nam;
            } else {
                unset($_SESSION['nam']);
            }
            $hh = new hanghoa();
            $thongKeResult = $hh->getThongKe($nam);
            echo '<meta http-equiv=refresh content="0;url=./index.php?action=thongke"/>';
        }
        break;

    case 'thongkengay':
        include_once "./View/thongkengay.php";
        break;
    case 'thongke_ngay':
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $ngay_thang_nam = $_POST['ngay_thang_nam'];
            if ($ngay_thang_nam != '0') {
                list($nam, $thang, $ngay) = explode('-', $ngay_thang_nam);
                $_SESSION['ngay'] = $ngay;
                $_SESSION['thang'] = $thang;
                $_SESSION['nam'] = $nam;
            } else {
                unset($_SESSION['ngay'], $_SESSION['thang'], $_SESSION['nam']);
            }
            $hh = new hanghoa();
            $thongKeResult = $hh->getThongKeN($nam, $thang, $ngay);
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=thongke&act=thongkengay"/>';
        }
        break;
    case 'thongkehoanthanh':
        include_once "./View/thongkehoanthanh.php";
        break;


    // case 'thongke_ngay':
    //     if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //         $nam = $_POST['nam'];
    //         $thang = $_POST['thang'];
    //         $ngay = $_POST['ngay'];
    //         // Lưu vào session
    //         $_SESSION['ngay'] = $ngay;
    //         $_SESSION['thang'] = $thang;
    //         $_SESSION['nam'] = $nam;

    //         $hh = new hanghoa();
    //         $thongKeResult = $hh->getThongKeN($nam, $thang, $ngay);
    //         // Sử dụng nháy kép để PHP hiểu biến trong chuỗi
    //         echo "<meta http-equiv='refresh' content='0;url=./index.php?action=thongke&act=thongkengay&nam=$nam&thang=$thang&ngay=$ngay'/>";
    //     }
    //     break;
}
?>