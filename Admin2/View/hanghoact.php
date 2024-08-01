<div class="container">
    <?php
    $hh = new hanghoa();
    $mahh = $_GET['id'];
    $result = $hh->getHangHoaCT($mahh);
    ?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h3><b>DANH SÁCH HÀNG HÓA</b></h3>
        </div>
        <div class="col-md-6" style="margin-bottom: 20px;">
            <a href="index.php?action=hanghoa&act=insert_hhaction&id=<?php echo $mahh; ?>"
                style="text-decoration: none;">
                <button class="btn btn-success" style="width: 40%; border-radius: 5px;">
                    <h4 style="margin: 0;">Thêm sản phẩm</h4>
                </button>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>Hình</th>
                        <th>Tên hàng</th>
                        <th>Size</th>
                        <th>Đơn giá</th>
                        <th>Giảm giá</th>
                        <th>Số lượng tồn</th>
                        <th>Cập Nhật</th>
                        <th>Xóa</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($set = $result->fetch()): ?>
                        <tr>
                            <td style="padding:0; text-align:center;">
                                <img src="Content/imagetourdien/<?php echo $set['hinh']; ?>"
                                    alt="<?php echo $set['tenhh']; ?>"
                                    style="width:70px;height:80px;border-radius: 8px;margin: 10px;">
                            </td>
                            <td><?php echo $set['tenhh']; ?></td>
                            <td><?php echo $set['size']; ?></td>
                            <td><?php echo number_format($set['dongia']); ?></td>
                            <td><?php echo number_format($set['giamgia']); ?></td>
                            <td><?php echo number_format($set['soluongton']); ?></td>
                            <td>
                                <a href="index.php?action=hanghoa&act=update_hanghoa&id=<?php echo $set['mahh']; ?>&idsize=<?php echo $set['idsize']; ?>"
                                    class="btn btn-primary">Cập nhật</a>
                            </td>
                            <td>
                                <a href="index.php?action=hanghoa&act=delete_hanghoact&idhanghoa=<?php echo $set['idhanghoa']; ?>&idsize=<?php echo $set['idsize']; ?>&idmau=<?php echo $set['idmau']; ?>"
                                    class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include "View/footer.php"; ?>