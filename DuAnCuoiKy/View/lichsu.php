<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<section class="col-md-12" style="margin-top: 100px;">
    <div class="container">
        <h3 style="text-align: center; margin-top: 20px;">LỊCH SỬ MUA HÀNG</h3>
        <?php if (isset($_SESSION['makh'])) {
            $makh = $_SESSION['makh'];
            $ls = new lichsu();
            $hd = $ls->LichSu($makh);
            if ($hd && $hd->rowCount() > 0) {
                $rowCount = $hd->rowCount(); // Đếm số hàng
                ?>
                <div id="kim" class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 7%;">Số thứ tự</th>
                                        <th style="width: 15%;">Ngày Đặt Hàng</th>
                                        <th style="width: 35%;">Tên Hàng Hóa</th>
                                        <th style="width: 15%;">Tổng Tiền</th>
                                        <th style="width: 28%;">Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $j = $rowCount;
                                    while ($set = $hd->fetch()): ?>
                                        <tr>
                                            <td><?php echo $j--; ?></td>
                                            <td><?php echo $set['ngaydat']; ?></td>
                                            <td><?php echo $set['tenhh']; ?></td>
                                            <td><?php echo number_format($set['tongtien']); ?><sup><u>đ</u></sup></td>

                                            <td>
                                                <a href="index.php?action=sanpham&act=chitietlichsu&id=<?php echo $set['masohd']; ?>"
                                                    class="btn btn-primary btn-sm"><b>Xem chi tiết</b></a>

                                                <?php
                                                if ($set['tinhtrang'] == 0) {
                                                    echo '<span class="badge badge-warning">Chưa xác nhận</span>';
                                                }
                                                if ($set['tinhtrang'] == 1) {
                                                    echo '<span class="badge badge-success">Đã xác nhận</span>';
                                                }
                                                if ($set['tinhtrang'] == 2) {
                                                    echo '<span class="badge badge-info ">Đang giao hàng</span>';
                                                }
                                                if ($set['tinhtrang'] == 3) {
                                                    echo '<span class="badge badge-success ">Đã giao hàng xong</span>';
                                                }
                                                if ($set['tinhtrang'] == -1) {
                                                    echo '<span class="badge badge-danger">Đã hủy đơn</span>';
                                                } ?>
                                                <?php if ($set['tinhtrang'] == 0) { ?>
                                                    <form method="post"
                                                        action="index.php?action=lichsu&act=tinhtrang&id=<?php echo $set['masohd']; ?>"
                                                        style="display:inline;">
                                                        <input type="hidden" name="tinhtrang" value="-1">
                                                        <button type="submit" name="confirmPaymentBtn" class="btn btn-danger btn-sm"><b>Hủy đơn hàng</b></button>
                                                    </form>
                                                <?php }
                                                if ($set['tinhtrang'] == -1) { ?>
                                                    <form method="post"
                                                        action="index.php?action=lichsu&act=tinhtrang&id=<?php echo $set['masohd']; ?>"
                                                        style="display:inline;">
                                                        <input type="hidden" name="tinhtrang" value="0">
                                                        <button type="submit" name="confirmPaymentBtn" class="btn btn-warning btn-sm"><b>Thu hồi hủy</b></button>
                                                    </form>
                                                <?php } ?>
                                            </td>
                                        </tr>

                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                echo "<p style='text-align: center; margin-top: 20px;'>Chưa có lịch sử mua hàng.</p>";
            }
        } else {
            echo "<p style='text-align: center; margin-top: 20px;'>Vui lòng đăng nhập để xem lịch sử mua hàng.</p>";
        }
        ?>
    </div>
</section>

<style>
    .table {
        font-size: 16px;
        font-family: 'Times New Roman', Times, serif;
    }

    .table thead th {
        background-color: #f8f9fa;
        color: #333;
        font-weight: 500;
    }

    .table tbody td {
        background-color: #fff;
        color: #333;
    }

    .table tbody tr:nth-child(even) td {
        background-color: #f8f9fa;
    }

    .table-bordered thead th,
    .table-bordered tbody td {
        border: 1px solid #dee2e6;
    }

    .table-bordered tbody tr:last-child td {
        border-bottom: 0;
    }

    .badge {
        padding: 5px 10px;
        font-size: 12px;
        border-radius: 10px;
    }

    .btn-sm {
        font-size: 12px;
        padding: 5px 10px;
    }
</style>
<?php
include_once "View/footer.php";
?>
