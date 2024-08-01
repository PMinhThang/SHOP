<?php
$act = "thongkethang";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'thongkethang':
        include_once "./View/thongkethang.php";
        break;
    case 'thongke_thang':
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $thang_nam = $_POST['thang_nam'];
            if ($thang_nam != '0') {
                list($nam, $thang) = explode('-', $thang_nam);
                $_SESSION['thang'] = $thang;
                $_SESSION['nam'] = $nam;
            } else {
                unset($_SESSION['thang'], $_SESSION['nam']);
            }
            $hh = new hanghoa();
            $thongKeResult = $hh->getThongKeT($thang, $nam);
            echo '<meta http-equiv=refresh content="0;url=./index.php?action=thongkethang"/>';
        }
        break;
    case 'doanhthuthang':
        include_once "./View/doanhthuthang.php";
        break;
    case 'doanhthunam':
        include_once "./View/doanhthunam.php";
        break;
}
?>