<?php
$act = "hoadon";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'hoadon':
        include_once "./View/qlhoadon.php";
        break;
    case 'hoadon1':
        include_once "./View/qlhoadon.php";
        break;
    case 'hoadon2':
        include_once "./View/qlhoadon.php";
        break;
    case 'hoadon3':
        include_once "./View/qlhoadon.php";
        break;
    case 'hoadon4':
        include_once "./View/qlhoadon.php";
        break;
    case 'hoadon5':
        include_once "./View/qlhoadon.php";
        break;
    case 'khachhangchi':
        include_once "./View/khachhanguu.php";
        break;
    case 'nhanvien':
        include_once "./View/qlnv.php";
        break;
    case 'insert_nhanvien':
        include_once "./View/editnhanvien.php";
        break;
    case 'insert_NV':
        // nhận thông tin về
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $hh = new nhanvien();
            $idnv = $_POST['idnv'];
            $hoten = $_POST['hoten'];
            $dia = $_POST['dia'];
            $username = $_POST['username'];
            $matkhau = $_POST['matkhau'];
            $idcv = $_POST['idcv'];
            // đem vào insert database$_POST['mahh'];
            $check = $hh->insertNV($hoten, $dia, $username, $matkhau, $idcv);

            // $chek=$hh->insertCTHangHoa($mahh,$idmau,$idsize,$dongia,$soluongton,$hinh,$giamgia);
            if ($check !== false) {
                echo '<script>alert("Thêm dữ liệu thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=qlhoadon&act=nhanvien"/>';
            } else {
                echo '<script>alert("Thêm dữ liệu ko thành công");</script>';
                include_once "./View/editnhanvien.php";
            }
        }
        break;

    case 'delete_nhanvien':
        if (isset($_GET['idnv'])) {
            $idnv = $_GET['idnv'];
            // Gọi hàm xóa hàng hóa từ đối tượng hanghoa
            $hh = new nhanvien();
            $check = $hh->deleteNV($idnv);
            if ($check !== false) {
                echo '<script>alert("Xóa dữ liệu thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=qlhoadon&act=nhanvien"/>';
            } else {
                echo '<script>alert("Xóa dữ liệu không thành công");</script>';
                // Nếu xóa không thành công, quay lại trang danh sách hàng hóa
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=qlhoadon&act=nhanvien"/>';
            }
        }
        break;

    case 'update_nhanvien':
        include_once "./View/editnhanvien.php";
        break;
    case "update_NV":
        // nhận thông tin
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $idnv = $_POST['idnv'];
            $hoten = $_POST['hoten'];
            $dia = $_POST['dia'];
            $username = $_POST['username'];
            $matkhau = $_POST['matkhau'];
            $idcv = $_POST['idcv'];
            // đem vào insert database$_POST['idnv'];
            $hh = new nhanvien();
            $check = $hh->updateNV($idnv, $hoten, $dia, $username, $matkhau, $idcv);

            if ($check !== false) {
                echo '<script>alert("Update liệu thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=qlhoadon&act=nhanvien"/>';
            } else {
                echo '<script>alert("Update dữ liệu ko thành công");</script>';
                include_once "./View/editnhanvien.php";
            }

        }
        break;
    case 'chitietsanpham':
        // nhaanhj giá trị người dùng gõ tìm kiếm và tìm kiếm trên sản phẩm
        include_once "./View/chitietsanpham.php";
        break;

    case 'timkiemnv':
        // nhaanhj giá trị người dùng gõ tìm kiếm và tìm kiếm trên sản phẩm
        include_once "./View/qlnv.php";
        break;
    case 'tinhtrang':
        // nhaanhj giá trị người dùng gõ tìm kiếm và tìm kiếm trên sản phẩm
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $ql = new qlhoadon();
            $masohd = $_GET['id'];
            $tinhtrang = $_POST['tinhtrang'];

            $check = $ql->updateTinhTrang($tinhtrang, $masohd);

            if ($check !== false) {
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=qlhoadon&a=' . $tinhtrang . '"/>';
            } else {
                echo '<script>alert("Update dữ liệu ko thành công");</script>';
                include_once "./View/editnhanvien.php";
            }

        }
}

?>