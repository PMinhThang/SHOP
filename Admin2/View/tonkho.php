<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- SweetAlert CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <!-- SweetAlert JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<div class="col-md-5 col-md-offset-4">
  <h3><b>DANH SÁCH HÀNG HÓA TỒN KHO</b></h3>
</div>
<div class="row col-12">
</div>
<div class="row" style="width:100%">
<div class="row">
  <div class="col-md-12">
    <form action="index.php?action=tonkho&act=timkiemhh" method="post" class="d-flex">
      <input type="text" name="txtsearch" class="form-control mr-2" placeholder="Tìm Kiếm">
      <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </form>
  </div>
</div>


  <table class="table"  style="margin-top:10px;">
    <thead  class="table-dark">
      <tr>
        <th style="width:5%">Mã hàng</th>
        <th style="width:5%">Hình</th>
        <th style="width:20%">Tên hàng</th>
        <th style="width:5%">Mã loại</th>
        <th style="width:5%">Số lượng tồn</th>
        <th style="width:7%">Ngày lập</th>
        <th style="width:5%">Cập Nhật</th>
        <th style="width:5%">Xóa</th>
      </tr>
    </thead>
    <?php
    $ac = 1;
    if (isset($_GET['action'])) {
      if (isset($_GET['act']) && $_GET['act'] == 'tonkho') {
        $ac = 1;
      } elseif (isset($_GET['act']) && $_GET['act'] == 'timkiemhh') {
        $ac = 2;
      }
    }
    ?>
    <tbody>
      <?php
      if ($ac == 1) {
        $hh = new hanghoa();
        $count = $hh->getHangHoa()->rowCount();
        $limit = 12;
        $trang = new page();
        $page = $trang->findPage($count, $limit);
        $start = $trang->findStart($limit);
        $result = $hh->getHangHoaAllTon($start, $limit);
      }
      if ($ac == 2) {
        $hh = new hanghoa();
        $count = $hh->getHangHoa()->rowCount();//14
        if (isset($_POST['txtsearch'])) {
          // Loại bỏ các khoảng trắng ở đầu và cuối chuỗi
          $search = trim($_POST['txtsearch']);

          // Kiểm tra xem người dùng đã nhập gì vào ô tìm kiếm chưa
          
            $tk = $search;
            // Thực hiện tìm kiếm và lưu kết quả vào $result
            $result = $hh->getTimKiem($tk);
            // Kiểm tra xem có kết quả tìm kiếm hay không
            if ($result->rowCount() == 0) { // Nếu không có kết quả
              echo "<p '>Không Tìm Thấy.</p>";
              exit;
            }
          }
        }
      
      while ($set = $result->fetch()):
        ?>
        <tr>
          <td><?php echo $set['mahh']; ?></td>
          <td style="padding:0; text-align:center;"><img src=Content/imagetourdien/<?php echo $set['hinh'] ?> alt=""
              style="width:70px;height:80px;border-radius: 8px;margin: 10px;"></td>
          <td><?php echo $set['tenhh']; ?></td>
          <td><?php echo $set['maloai']; ?></td>
          <td><?php echo $set['soluongton']; ?></td>
          <td><?php echo $set['ngaylap']; ?></td>
          <td><a
              href="index.php?action=hanghoa&act=update_hanghoa&id=<?php echo $set['mahh']; ?>&idsize=<?php echo $set['idsize']; ?>&idmau=<?php echo $set['idmau']; ?>"
              class="btn btn-primary">Cập nhật</a></td>
          <td><a href="index.php?action=hanghoa&act=delete_hanghoa&mahh=<?php echo $set['mahh']; ?>"
              class="btn btn-danger"  onclick="return confirmDelete(event);">Xóa</a></td>
        </tr>
        <?php
      endwhile;
      ?>
    </tbody>
  </table>

</div>
<?php if ($ac == 1) { ?>
  <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
      <?php
      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
      if ($current_page > 1 && $page > 1) {
        echo '<li>
                    <a href="index.php?action=tonkho&page=' . ($current_page - 1) . '" class="page-link"><<</a>
                    </li>';
      }
      for ($i = 1; $i <= $page; $i++) {
        ?>
        <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>"><a
            href="index.php?action=tonkho&page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
        <?php
      }
      if ($current_page < $page && $page > 1) {
        echo '<li>
                    <a href="index.php?action=tonkho&page=' . ($current_page + 1) . '" class="page-link">>></a>
                    </li>';
      }
      ?>
    </ul>
  </nav>
<?php } ?>
<?php
include "View/footer.php";
?>
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
