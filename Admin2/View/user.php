<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- SweetAlert CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <!-- SweetAlert JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<div class="col-md-4 col-md-offset-4 text-center my-4">
  <h3><b>DANH SÁCH KHÁCH HÀNG</b></h3>
</div>

<div class="row col-12 mb-3">
  <div class="col-12">
    <form action="index.php?action=user&act=timkiemkh" method="post" class="form-inline justify-content-center">
      <input type="text" name="txtsearch" class="form-control mr-2" placeholder="Tìm Kiếm" style="width: 240px;">
      <button type="submit" id="search_button" class="btn btn-primary">
        Tìm kiếm
      </button>
    </form>
  </div>
</div>

<div class="row col-12">
  <div class="col-12">
    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead class="thead-dark">
          <tr>
            <th>Mã khách hàng</th>
            <th>Tên khách hàng</th>
            <th>Username</th>
            <th>Mật khẩu</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Cập nhật</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $ac = 1;
          if (isset($_GET['action'])) {
            if (isset($_GET['act']) && $_GET['act'] == 'user') {
              $ac = 1;
            } elseif (isset($_GET['act']) && $_GET['act'] == 'timkiemkh') {
              $ac = 2;
            }
          }

          if ($ac == 1) {
            $hh = new user();
            $count = $hh->getUser()->rowCount();
            $limit = 10;
            $trang = new page();
            $page = $trang->findPage($count, $limit);
            $start = $trang->findStart($limit);
            $result = $hh->getUserAllPage($start, $limit);
          } elseif ($ac == 2) {
            $hh = new user();
            $result = $hh->getUser();
            if (isset($_POST['txtsearch'])) {
              $search = trim($_POST['txtsearch']);
                $tk = $search;
                $result = $hh->getTimKiemKH($tk);
                if ($result->rowCount() == 0) {
                  echo "<p class='text-center text-danger'>Không Tìm Thấy.</p>";
                  exit;
                }
              }
            }
          $salfF = "G435#";
          $salfL = "T34a!&";
          while ($set = $result->fetch()): ?>
            <tr>
              <td><?php echo $set['makh']; ?></td>
              <td><?php echo $set['tenkh']; ?></td>
              <td><?php echo $set['username']; ?></td>
              <td>
                <?php $hashed_password = $set['matkhau']; // giá trị đã được mã hóa bạn muốn giải mã ngược lại
                  $salfF = "G435#";
                  $salfL = "T34a!&";

                  // Duyệt qua các mật khẩu có thể
                  for ($i = 0; $i <= 999999; $i++) {
                    $potential_password = md5($salfF . $i . $salfL); // thử mật khẩu có thể
                    if ($potential_password === $hashed_password) {
                      echo $i;
                      break;
                    }
                  } ?>
              </td>
              <td><?php echo $set['email']; ?></td>
              <td><?php echo $set['diachi']; ?></td>
              <td><?php echo $set['sodienthoai']; ?></td>
              <td><a href="index.php?action=user&act=update_user&id=<?php echo $set['makh']; ?>"
                  class="btn btn-warning btn-sm">Cập nhật</a></td>
              <td><a href="index.php?action=user&act=delete_user&makh=<?php echo $set['makh']; ?>"
                  class="btn btn-danger btn-sm" onclick="return confirmDelete(event);">Xóa</a></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php if ($ac == 1) { ?>
  <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
      <?php
      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
      if ($current_page > 1 && $page > 1) {
        echo '<li>
                    <a href="index.php?action=user&page=' . ($current_page - 1) . '" class="page-link"><<</a>
                    </li>';
      }
      for ($i = 1; $i <= $page; $i++) {
        ?>
        <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>"><a
            href="index.php?action=user&page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
        <?php
      }
      if ($current_page < $page && $page > 1) {
        echo '<li>
                    <a href="index.php?action=user&page=' . ($current_page + 1) . '" class="page-link">>></a>
                    </li>';
      }
      ?>
    </ul>
  </nav>
<?php } ?>

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