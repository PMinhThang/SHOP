<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<section class="col-md-12" style="margin-top: 100px;">
    <div class="container">
        <h3 style="text-align: center; margin-top: -20px;">Khách Hàng Mua</h3>
        <?php
            $ls = new qlhoadon();
            $hd = $ls->getThongKeKhachHang();
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
                                        <th style="width: 15%;">Mã khách hàng</th>
                                        <th style="width: 35%;">Tên khách hàng</th>
                                        <th style="width: 15%;">Tổng Tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $j = 1;
                                    while ($set = $hd->fetch()): ?>
                                        <tr>
                                            <td><?php echo $j++; ?></td>
                                            <td><?php echo $set['makh']; ?></td>
                                            <td><?php echo $set['tenkh']; ?></td>
                                            <td><?php echo number_format($set['tongtien']); ?><sup><u>đ</u></sup></td>
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
