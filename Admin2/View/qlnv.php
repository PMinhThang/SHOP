<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<div class="col-md-4 col-md-offset-4 text-center my-4">
    <h3><b>DANH SÁCH NHÂN VIÊN</b></h3>
</div>
<div class="row col-12 mb-3">
    <a href="index.php?action=qlhoadon&act=insert_nhanvien" class="btn btn-success">
        <i class="fas fa-plus"></i> Thêm nhân viên
    </a>
</div>
<div class="row col-12 mb-3">
    <div class="col-12">
        <form action="index.php?action=qlhoadon&act=timkiemnv" method="post" class="form-inline justify-content-center">
            <input type="text" name="txtsearch" class="form-control mr-2" placeholder="Tìm Kiếm" style="width: 240px;">
            <button type="submit" id="search_button" class="btn btn-primary">
                Tìm kiếm
            </button>
        </form>
    </div>
</div>
<?php if (isset($_SESSION['idnv'])) {
    $idnv = $_SESSION['idnv'];
    $ls = new nhanvien();
    $hd = $ls->getQLNV($idnv);
    if ($hd && $hd->rowCount() > 0) {
        $rowCount = $hd->rowCount(); // Đếm số hàng
        ?>
        <div class="row col-12">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Mã nhân viên</th>
                                <th>Họ tên</th>
                                <th>Địa chỉ</th>
                                <th>Username</th>
                                <th>Mật khẩu</th>
                                <th>Chức vụ</th>
                                <th>Cập Nhật</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ac = 1;
                            if (isset($_GET['action'])) {
                                if (isset($_GET['act']) && $_GET['act'] == 'nhanvien') {
                                    $ac = 1;
                                } elseif (isset($_GET['act']) && $_GET['act'] == 'timkiemnv') {
                                    $ac = 2;
                                }
                            }

                            if ($ac == 1) {
                                $hh = new nhanvien();
                                $result = $hh->getQLNV($idnv);
                            } elseif ($ac == 2) {
                                $hh = new nhanvien();
                                $result = $hh->getQLNV($idnv);
                                if (isset($_POST['txtsearch'])) {
                                    $search = trim($_POST['txtsearch']);

                                    $tk = $search;
                                    $result = $hh->getTimKiemNV($tk, $idnv);
                                    if ($result->rowCount() == 0) {
                                        echo "<p class='text-center text-danger'>Không Tìm Thấy.</p>";
                                        exit;
                                    }

                                }
                            }

                            while ($set = $result->fetch()): ?>
                                <tr>
                                    <td><?php echo $set['idnv']; ?></td>
                                    <td><?php echo $set['hoten']; ?></td>
                                    <td><?php echo $set['dia']; ?></td>
                                    <td><?php echo $set['username']; ?></td>
                                    <td><?php echo $set['matkhau']; ?></td>
                                    <td><?php echo $set['chucvu']; ?></td>
                                    <?php if (isset($_SESSION['idcv']) && $_SESSION['idcv'] == 1) { ?>
                                        <td>
                                            <a href="index.php?action=qlhoadon&act=update_nhanvien&id=<?php echo $set['idnv']; ?>"
                                                class="btn btn-warning btn-sm">Cập nhật</a>
                                        </td>
                                        <td>
                                            <a href="index.php?action=qlhoadon&act=delete_nhanvien&idnv=<?php echo $set['idnv']; ?>"
                                                class="btn btn-danger btn-sm" onclick="return confirmDelete(event);">Xóa</a>
                                        </td>
                                    <?php } else { ?>
                                        <td>Chưa đủ quyền</td>
                                        <td>Chưa đủ quyền</td>
                                    <?php } ?>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php }
} ?>

<?php
include "View/footer.php";
?>

<style>
    .table-responsive {
        margin-top: 20px;
    }

    .thead-dark th {
        background-color: #343a40;
        color: #fff;
    }
</style>
<script type="text/javascript">
    function confirmDelete(event) {
        event.preventDefault();
        const link = event.currentTarget.href;

        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa?',
            text: "Hành động này không thể hoàn tác!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Vâng, xóa nó!',
            cancelButtonText: 'Hủy bỏ'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
            }
        });

        return false;
    }
</script>