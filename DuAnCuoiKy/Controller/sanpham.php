<?php
//controler gọi view sản phẩm
// include_once "./View/sanpham.php";
$act = "sanpham";
// // controller điều phối đến những view khác thông qua 1 biến
// // biến đó tên là act
if (isset($_GET['act'])) {
    $act = $_GET['act'];//sanphamkhuyenmai
}
switch ($act) {
    case 'sanpham':
        include_once "./View/sanpham.php";
        break;
    case 'sanpham1':
        include_once "./View/sanpham.php";
        break;
    case 'sanpham2':
        include_once "./View/sanpham.php";
        break;
    case 'sanpham3':
        include_once "./View/sanpham.php";
        break;
    case 'loai':
        include_once "./View/sanpham.php";
        break;


    case 'sanphamkhuyenmai':
        include_once "./View/sale.php";
        break;
    case 'sanphamkhuyenmai1':
        include_once "./View/sale.php";
        break;
    case 'sanphamkhuyenmai2':
        include_once "./View/sale.php";
        break;
    case 'sanphamkhuyenmai3':
        include_once "./View/sale.php";
        break;


    case 'sanphamchitiet':
        include_once "./View/sanphamchitiet.php";
        break;
    case 'timkiem':
        // nhaanhj giá trị người dùng gõ tìm kiếm và tìm kiếm trên sản phẩm
        include_once "./View/timkiem.php";
        break;

    case 'a':
        // nhaanhj giá trị người dùng gõ tìm kiếm và tìm kiếm trên sản phẩm
        include_once "./View/a.php";
        break;
    case 'chitietlichsu':
        include_once "./View/chitietlichsu.php";
        break;
    case 'sanphamyeuthich':
        include_once "./View/sanphamyeuthich.php";
        break;

    case 'yeuthich':
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!isset($_SESSION['makh'])) {
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>
                    Swal.fire({
                        icon: "warning",
                        title: "Vui lòng đăng nhập!",
                        text: "Vui lòng đăng nhập trước khi thực hiện thao tác này!",
                        showConfirmButton: true,
                    }).then(function() {
                        window.location.href = "./index.php?action=sanpham&act=sanphamyeuthich";
                    });
                  </script>';
        } else {
            // Nếu đã đăng nhập, tiếp tục xử lý hành động 'yeuthich' như bình thường
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $hh = new hanghoa();
                $mahh = $_GET['id'];
                $yeuthich = $_POST['yeuthich'];
                $makh = $_SESSION['makh'];
                $check = $hh->insertYeuThich($mahh, $makh, $yeuthich);
                $check = $hh->updateYeuThich($yeuthich, $mahh,$makh);
                if ($check !== false) {
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=sanpham&act=sanphamyeuthich"/>';
                }
            }
        }
        break;

    case 'boyeuthich':
        // nhaanhj giá trị người dùng gõ tìm kiếm và tìm kiếm trên sản phẩm
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $hh = new hanghoa();
            $mahh = $_GET['id'];
            $yeuthich = $_POST['yeuthich'];
            $check = $hh->updateYeuThich($yeuthich, $mahh,$makh);
            $check = $hh->deleteYeuThich($mahh,$makh);
            if ($check !== false) {
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=sanpham&act=sanphamyeuthich"/>';
            } else {
                echo '<script>alert("Update dữ liệu ko thành công");</script>';
                include_once "./View/editnhanvien.php";
            }

        }
        break;
}

?>