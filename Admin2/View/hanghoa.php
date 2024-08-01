<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- SweetAlert CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <!-- SweetAlert JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<div class="col-md-4 col-md-offset-4" style="margin-top:30px;">
  <h3><b>DANH SÁCH HÀNG HÓA</b></h3>
</div>
<div class="col-md-12">
  <div class="col-md-6" style="margin-bottom: 20px;">
    <a href="index.php?action=hanghoa&act=insert_hanghoa" style="text-decoration: none;">
      <button class="btn btn-success" style="width: 40%; border-radius: 5px;">
        <h4 style="margin: 0;">Thêm sản phẩm</h4>
      </button>
    </a>
  </div>

  <div class="col-md-6">
    <div class="search header_search">
      <form action="index.php?action=hanghoa&act=timkiemhh" method="post" style="display: flex;">
        <input type="text" name="txtsearch" class="search_input form-control" placeholder="Tìm Kiếm"
          style="width: 70%;">
        <button type="submit" id="search_button" class="search_button btn btn-info" style="width: 30%;">
          Tìm kiếm
        </button>
      </form>
    </div>
  </div>

</div>
<?php
if (isset($_GET['id'])) {
  $mahh = $_GET['id'];
  $idmau = $_GET['idmau'];
}
?>
<div class="row">

  <table class="table ">
    <thead class="table-dark">
      <tr width="100%">
        <th width="1%">Mã hàng</th>
        <th width="5%">Hình</th>
        <th width="15%">Tên hàng</th>
        <th width="7%">Mã loại</th>
        <th width="7%">Studio</th>
        <th width="10%">Ngày lập</th>
        <th width="5%">Trạng thái</th>
        <th width="5%">tùy chọn</th>
        <th width="5%">Xóa</th>
        <th width="5%">Cập nhật</th>
      </tr>
    </thead>
    <?php
    $ac = 1;
    if (isset($_GET['action'])) {
      if (isset($_GET['act']) && $_GET['act'] == 'hanghoa') {
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
        $limit = 10;
        $trang = new page();
        $page = $trang->findPage($count, $limit);
        $start = $trang->findStart($limit);
        $result = $hh->getHangHoaAllPage($start, $limit);
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
          <td><?php echo $set['mausac']; ?></td>
          <td><?php echo date('d-m-Y', strtotime($set['ngaylap'])); ?></td>

          <?php if ($set['trangthai'] == 0) { ?>
            <td>
              <form method="post"
                action="index.php?action=hanghoa&act=trangthai&id=<?php echo $set['mahh']; ?>&page=<?php echo isset($_GET['page']) ? $_GET['page'] : 1; ?>">
                <input type="hidden" name="trangthai" value="1">
                <button type="submit" name="confirmPaymentBtn" class="btn btn-success "> <i class="fa fa-eye"><br>Đang
                    hiện</i></button>
              </form>
            </td>
          <?php } else { ?>

            <td>
              <form method="post"
                action="index.php?action=hanghoa&act=trangthai&id=<?php echo $set['mahh']; ?>&page=<?php echo isset($_GET['page']) ? $_GET['page'] : 1; ?>">
                <input type="hidden" name="trangthai" value="0">
                <button type="submit" name="confirmPaymentBtn" class="btn btn-secondary"> <i
                    class="fa fa-eye-slash"><br>Đang ẩn</i></button>
              </form>
            </td>
          <?php } ?>
          <td>
            <a href="index.php?action=hanghoa&act=hanghoact&id=<?php echo $set['mahh']; ?>&id=<?php echo $set['mahh']; ?>"
              class="btn btn-primary"><i class="fa fa-list-ul"><br>Xem chi tiết</i></a>
          </td>
          <td>
            <a href="index.php?action=hanghoa&act=delete_hanghoa&mahh=<?php echo $set['mahh']; ?>&page=<?php echo isset($_GET['page']) ? $_GET['page'] : 1; ?>"
              class="btn btn-danger" onclick="return confirmDelete(event);">
              <i class="fa fa-trash"><br>Xóa</i>
            </a>
          </td>
          <td><a
              href="index.php?action=hanghoa&act=update_hhaction&id=<?php echo $set['mahh']; ?>&idmau=<?php echo $set['idmau']; ?>"
              class="btn btn-warning"><i class="fa fa-pen-square"><br>Cập nhật</i></a></td>
        </tr>
        <?php
      endwhile;
      ?>
    </tbody>
  </table>

</div>
<?php
if ($ac == 1) {
  ?>
  <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
      <?php
      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
      if ($current_page > 1 && $page > 1) {
        echo '<li class="page-item">
                    <a href="index.php?action=hanghoa&page=' . ($current_page - 1) . '" class="page-link text-danger"><<</a>
                  </li>';
      }
      for ($i = 1; $i <= $page; $i++) {
        ?>
        <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
          <a href="index.php?action=hanghoa&page=<?php echo $i; ?>"
            class="page-link <?php echo ($i == $current_page) ? 'bg-dark text-white' : 'text-warning'; ?>"><?php echo $i; ?></a>
        </li>
        <?php
      }
      if ($current_page < $page && $page > 1) {
        echo '<li class="page-item">
                    <a href="index.php?action=hanghoa&page=' . ($current_page + 1) . '" class="page-link text-info">>></a>
                  </li>';
      }
      ?>
    </ul>
  </nav>
<?php } ?>
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
<?php
include "View/footer.php";
?>