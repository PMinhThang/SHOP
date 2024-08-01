<?php
$act = "hanghoa";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
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
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $hh = new hanghoa();
            // $mahh=$_POST['mahh'];
            $tenhh = $_POST['tenhh'];
            $maloai = $_POST['maloai'];
            $ngaylap = $_POST['ngaylap'];
            $mota = $_POST['mota'];
            // đem vào insert database$_POST['mahh'];
            $check = $hh->insertHangHoa($tenhh, $maloai, $ngaylap, $mota);
            // $hinh=$_POST['hinh'];
            $dongia = $_POST['dongia'];
            $giamgia = $_POST['giamgia'];
            $idmau = $_POST['mau'];
            $soluongton = $_POST['soluongton'];
            $mahh = $hh->getIDNew();
            $idsize = $_POST['size'];
            uploadImage();
            $hinh = $_FILES['image']['name'];
            for ($i = 0; $i < count($idsize); $i++) {
                // Lấy giá trị của size và số lượng tương ứng
                $size = $idsize[$i];
                // $mau = $idmau[$i];
                $soluong = $soluongton[$i];
                // thêm vào bảng
                // $ct = new cthanghoa();
                $hh->insertCTHangHoa($mahh, $idmau, $size, $dongia, $soluong, $hinh, $giamgia);
                // if ($check === false) {
                //     break;
                // }
                // echo '<script>alert("'.$check.'");</script>';
            }
            // $chek=$hh->insertCTHangHoa($mahh,$idmau,$idsize,$dongia,$soluongton,$hinh,$giamgia);
            if ($check !== false) {
                echo '<script>alert("Thêm dữ liệu thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa"/>';
            } else {
                echo '<script>alert("Thêm dữ liệu ko thành công");</script>';
                include_once "./View/edithanghoa.php";
            }
        }
        break;

    case 'delete_hanghoa':
        if (isset($_GET['mahh'])) {
            $mahh = $_GET['mahh'];
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
            // Gọi hàm xóa hàng hóa từ đối tượng hanghoa
            $hh = new hanghoa();
            $check = $hh->deleteHangHoa($mahh);
            if ($check !== false) {
                echo '<script>alert("Xóa dữ liệu thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&page='.$currentPage.'"/>';
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
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $mahh = $_POST['mahh'];
            $dongia = $_POST['dongia'];
            $giamgia = $_POST['giamgia'];
            $soluongton = $_POST['soluong'];
            $idsize = $_POST['size'];

            if (!empty($_FILES['image']['name'])) {
                $check1 = uploadImage();
                $hinh = $_FILES['image']['name'];
            } 
            else {
                $hinh = $_POST['image1'];
            }
            // đem vào insert database$_POST['mahh'];
            $hh = new hanghoa();
            for ($i = 0; $i < count($idsize); $i++) {
                // Lấy giá trị của size và số lượng tương ứng
                $size = $idsize[$i];
                // $mau = $idmau[$i];
                $soluong = $soluongton[$i];
                // thêm vào bảng
                // $ct = new cthanghoa();
                $check = $hh->updateCTHangHoa($mahh, $dongia, $giamgia, $soluong, $hinh, $size);
                // if ($check === false) {
                //     break;
                // }
                // echo '<script>alert("'.$check.'");</script>';
            }
            if ($check !== false) {
                echo '<script>alert("Update liệu thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=hanghoact&id=' . $mahh . '&idmau='.$idmau.'"/>';
            } else {
                echo '<script>alert("Update dữ liệu ko thành công");</script>';
                include_once "./View/edithanghoa.php";
            }

        }
        break;

    case 'insert_hhaction':
        include_once "./View/updatehh.php";
        break;
    case 'insert_hh':
        // nhận thông tin về
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $hh = new hanghoa();
            $dongia = $_POST['dongia'];
            $giamgia = $_POST['giamgia'];
            $idmau = $_POST['mau'];
            $soluongton = $_POST['soluongton'];
            $mahh = $_POST['mahh'];
            $idsize = $_POST['size'];
            uploadImage();
            $hinh = $_FILES['image']['name'];
            for ($i = 0; $i < count($idsize); $i++) {
                // Lấy giá trị của size và số lượng tương ứng
                $size = $idsize[$i];
                // $mau = $idmau[$i];
                $soluong = $soluongton[$i];
                // thêm vào bảng
                // $ct = new cthanghoa();
                $hh->insertCTHangHoa($mahh, $idmau, $size, $dongia, $soluong, $hinh, $giamgia);
                // if ($check === false) {
                //     break;
                // }
                // echo '<script>alert("'.$check.'");</script>';
            }
            // $chek=$hh->insertCTHangHoa($mahh,$idmau,$idsize,$dongia,$soluongton,$hinh,$giamgia);
            if ($check !== false) {
                echo '<script>alert("Thêm dữ liệu thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=hanghoact&id=' . $mahh . '&idmau='.$idmau.'"/>';
            } else {
                echo '<script>alert("Thêm dữ liệu ko thành công");</script>';
                include_once "./View/edithanghoa.php";
            }
        }
        break;


    case 'update_hhaction':
        include_once "./View/updatehh.php";
        break;
    case "update_hh":
        // nhận thông tin
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $mahh = $_POST['mahh'];
            $tenhh = $_POST['tenhh'];
            $maloai = $_POST['maloai'];
            $idmau = $_POST['mau'];
            $maloai = $_POST['maloai'];
            $mota = $_POST['mota'];
            $hh = new hanghoa();
            $check = $hh->updateHangHoa($mahh, $tenhh, $maloai, $mota, $idmau);
            if ($check !== false) {
                echo '<script>alert("Update liệu thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=hanghoa"/>';
            } else {
                echo '<script>alert("Update dữ liệu ko thành công");</script>';
                include_once "./View/edithanghoa.php";
            }

        }
        break;
    case 'timkiemhh':
        // nhaanhj giá trị người dùng gõ tìm kiếm và tìm kiếm trên sản phẩm
        include_once "./View/hanghoa.php";
        break;
    case 'trangthai':
        // nhaanhj giá trị người dùng gõ tìm kiếm và tìm kiếm trên sản phẩm
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $ql = new hanghoa();
            $mahh = $_GET['id'];
            $trangthai = $_POST['trangthai'];
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

            $check = $ql->updateTrangThai($trangthai, $mahh);

            if ($check !== false) {

                echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&page=' . $currentPage . '"/>';
            } else {
                echo '<script>alert("Update dữ liệu ko thành công");</script>';
                include_once "./View/editnhanvien.php";
            }

        }
        break;

    case 'hanghoact':
        // nhaanhj giá trị người dùng gõ tìm kiếm và tìm kiếm trên sản phẩm
        include_once "./View/hanghoact.php";
        break;

    case 'delete_hanghoact':
        if (isset($_GET['idhanghoa'])) {
            $idhanghoa = $_GET['idhanghoa'];
            $idsize = $_GET['idsize'];
            $idmau = $_GET['idmau'];
            // Gọi hàm xóa hàng hóa từ đối tượng hanghoa
            $hh = new hanghoa();
            $check = $hh->deleteHangHoaCT($idhanghoa, $idsize,$idmau);
            if ($check !== false) {
                echo '<script>alert("Xóa dữ liệu thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=hanghoact&id=' . $idhanghoa . '&idmau='.$idmau.'"/>';
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

}

?>