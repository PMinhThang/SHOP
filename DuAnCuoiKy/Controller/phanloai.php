<?php
//controler gọi view sản phẩm
// include_once "./View/sanpham.php";
$act = "phanloai";
// // controller điều phối đến những view khác thông qua 1 biến
// // biến đó tên là act
if (isset($_GET['act'])) {
    $act = $_GET['act'];//sanphamkhuyenmai
}
switch ($act) {
    case 'gundam':
        include_once "./View/figure/gundam.php";
        break;

}
?>