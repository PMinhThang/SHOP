<?php
$act = "mau";
$mau = new mau();
if (isset ($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'mau':
        include_once "./View/hang.php";
        break;
    
    case "mau_action":
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $flag = false;
            foreach ($_POST as $key => $value) {
                if (empty($value)) {
                    # code...
                    echo "<script>alert('Nhập đầy đủ thông tin')</script>";
                    $flag = false;
                } else {
                    $flag = true;
                }
            }
            if ($flag) {
                // insert vào bảng mau
                $check = $mau->insertMau($_POST['mau']);
                echo "<script>alert('Thêm thành công')</script>";
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=hang"/>';
            }
        }
        break;
    case "delmau":
        if (isset($_GET['id'])) {
            $Idmau = $_GET['id'];
            $delmau = $mau->delMau($Idmau);
            if ($delmau) {
                echo "<script>alert('Bạn vừa xóa 1 mau')</script>";
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=hang"/>';
            } else {
                echo "<script>alert('Lỗi')</script>";
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=hang"/>';
            }
        }
        break;
}
?>