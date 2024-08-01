<?php
$act = "tonkho";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'tonkho':
        include_once "./View/tonkho.php";
        break;

    case 'timkiemhh':
        // nhaanhj giá trị người dùng gõ tìm kiếm và tìm kiếm trên sản phẩm
        include_once "./View/tonkho.php";
        break;
}
?>