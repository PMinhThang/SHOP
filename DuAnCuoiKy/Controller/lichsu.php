<?php
    $act = "lichsu";  
    $makh= $_SESSION['makh'];
    $lichsu = new lichsu();
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    
    switch ($act) {
        case'lichsu':
            include_once "./View/lichsu.php";
            break;
        case 'tinhtrang':
            // nhaanhj giá trị người dùng gõ tìm kiếm và tìm kiếm trên sản phẩm
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $hh = new hanghoa();
                $masohd = $_GET['id'];
                $tinhtrang = $_POST['tinhtrang'];
    
                $check = $hh->updateTinhTrang($tinhtrang, $masohd);
    
                if ($check !== false) {
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=lichsu&id='.$masohd.'"/>';
                } else {
                    echo '<script>alert("Update dữ liệu ko thành công");</script>';
                    include_once "./View/editnhanvien.php";
                }
    
            }
            break;
    }
?>