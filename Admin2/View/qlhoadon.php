<div class="col-md-4 col-md-offset-4 text-center my-4">
  <h3><b>DANH SÁCH HÓA ĐƠN</b></h3>
</div>

<?php if (isset($_GET['id'])) {
  $masohd = $_GET['id'];
}
$gh = new hoadon();
$all = $gh->DonHangAll();
$cxn = $gh->DonHangChuaXN();
$dxn = $gh->DonHangDaXN();
$dg = $gh->DonHangDangGiao();
?>

<div class="row w-100">
  <div class="col-12">
    <div>
      <nav class="main_nav">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item dropdown" onmouseover="showDropdown()" onmouseout="hideDropdown()">
            <a class="nav-link dropdown-toggle" id="dropdownId" aria-haspopup="true" aria-expanded="false">
              Tình Trạng Đơn Hàng</a>
            <div id="dropdownContent" class="dropdown-menu" aria-labelledby="dropdownId" style="display: none;">
              <a href="index.php?action=qlhoadon&act=hoadon" style="display: block; padding: 10px;">Tất cả đơn hàng
                <span class="number">
                  <?php
                  $set = $all->fetch();
                  echo isset($set["masohd"]) ? $set['masohd'] : 0;
                  ?>
                </span>
              </a>
              <a href="index.php?action=qlhoadon&act=hoadon1" style="display: block; padding: 10px;">Chưa xác nhận
                <span class="number">
                  <?php
                  $set = $cxn->fetch();
                  echo isset($set["masohd"]) ? $set['masohd'] : 0;
                  ?>
                </span>
              </a>
              <a href="index.php?action=qlhoadon&act=hoadon2" style="display: block; padding: 10px;">Đã xác nhận
                <span class="number">
                  <?php
                  $set = $dxn->fetch();
                  echo isset($set["masohd"]) ? $set['masohd'] : 0;
                  ?>
                </span>
              </a>
              <a href="index.php?action=qlhoadon&act=hoadon3" style="display: block; padding: 10px;">Đã hủy</a>
              <a href="index.php?action=qlhoadon&act=hoadon4" style="display: block; padding: 10px;">Đang giao
                <span class="number">
                  <?php
                  $set = $dg->fetch();
                  echo isset($set["masohd"]) ? $set['masohd'] : 0;
                  ?>
                </span>
              </a>
              <a href="index.php?action=qlhoadon&act=hoadon5" style="display: block; padding: 10px;">Đã hoàn thành</a>
            </div>
          </li>
        </ul>
      </nav>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead class="thead-dark">
          <?php
          $ac = 1;
          if (isset($_GET['action'])) {
            if (isset($_GET['act']) && $_GET['act'] == 'hoadon') {
              $ac = 1;
            } elseif (isset($_GET['act']) && $_GET['act'] == 'hoadon1') {
              $ac = 2;
            } elseif (isset($_GET['act']) && $_GET['act'] == 'hoadon2') {
              $ac = 3;
            } elseif (isset($_GET['act']) && $_GET['act'] == 'hoadon3') {
              $ac = 4;
            } elseif (isset($_GET['act']) && $_GET['act'] == 'hoadon4') {
              $ac = 5;
            } elseif (isset($_GET['act']) && $_GET['act'] == 'hoadon5') {
              $ac = 6;
            }
          }
          ?>
          <tr>
            <th>Mã hóa đơn</th>
            <th>Tên khách hàng</th>
            <th>Tên sản phẩm</th>
            <th>Ngày đặt</th>
            <th>Thông tin chi tiết</th>
            <th>Trạng thái</th>
            <th>Tổng tiền</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $hh = new qlhoadon();
          if ($ac == 1) {
            $count = $hh->getQLHD()->rowCount();
            $limit = 50;
            $trang = new page();
            $page = $trang->findPage($count, $limit);
            $start = $trang->findStart($limit);
            $result = $hh->getQLHDAllPage($start, $limit);
          }
          if ($ac == 2) {
            $result = $hh->getChuaXN();// phân trang
          }
          if ($ac == 3) {
            $result = $hh->getDaXN();// phân trang
          }
          if ($ac == 4) {
            $result = $hh->getDaHuy();// phân trang
          }
          if ($ac == 6) {
            $result = $hh->getHoanThanh();// phân trang
          }
          if ($ac == 5) {
            $result = $hh->getDangGiao();// phân trang
          }
          while ($set = $result->fetch()):
            ?>
            <tr>
              <td><?php echo $set['masohd']; ?></td>
              <td><?php echo $set['hoten']; ?></td>
              <td><?php echo $set['tenhh']; ?></td>
              <td><?php echo date('d-m-Y', strtotime($set['ngaydat'])); ?></td>
              <td>
                <a href="index.php?action=qlhoadon&act=chitietsanpham&id=<?php echo $set['masohd']; ?>"
                  class="btn btn-info btn-sm">Xem chi tiết</a>
              </td>
              <td>
                <?php if ($set['tinhtrang'] == 0) { ?>
                  <form method="post" action="index.php?action=qlhoadon&act=tinhtrang&id=<?php echo $set['masohd']; ?>"
                    class="d-inline">
                    <input type="hidden" name="tinhtrang" value="1">
                    <button type="submit" name="confirmPaymentBtn" class="btn btn-success btn-sm">Xác nhận</button>
                  </form>
                  <form method="post" action="index.php?action=qlhoadon&act=tinhtrang&id=<?php echo $set['masohd']; ?>"
                    class="d-inline">
                    <input type="hidden" name="tinhtrang" value="-1">
                    <button type="submit" name="confirmPaymentBtn" class="btn btn-danger btn-sm">Hủy đơn</button>
                  </form>
                <?php } elseif ($set['tinhtrang'] == -1) { ?>
                  <form method="post" action="index.php?action=qlhoadon&act=tinhtrang&id=<?php echo $set['masohd']; ?>"
                    class="d-inline">
                    <input type="hidden" name="tinhtrang" value="0">
                    <button type="submit" name="restoreOrderBtn" class="btn btn-warning btn-sm">Thu hồi</button>
                  </form>
                <?php } elseif ($set['tinhtrang'] == 1) { ?>
                  <form method="post" action="index.php?action=qlhoadon&act=tinhtrang&id=<?php echo $set['masohd']; ?>"
                    class="d-inline">
                    <input type="hidden" name="tinhtrang" value="2">
                    <button type="submit" name="confirmPaymentBtn" class="btn btn-primary btn-sm">Xác nhận giao
                      hàng</button>
                  </form>
                <?php } else if ($set['tinhtrang'] == 2) { ?>
                    <span class="badge badge-info" style="padding:11px 7px">Đang giao hàng</span>
                <?php } else { ?>
                    <span class="badge badge-success" style="padding:11px 7px">Đơn hàng hoàn thành</span>
                <?php } ?>
              </td>
              <td><u><b><?php echo number_format($set['tongtien']); ?></b></u><sup><u>đ</u></sup></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php
if ($ac == 1) {
  ?>
  <nav aria-label="Page navigation" class="my-4">
    <ul class="pagination justify-content-center">
      <?php
      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
      if ($current_page > 1 && $page > 1) {
        echo '<li class="page-item"><a href="index.php?action=qlhoadon&page=' . ($current_page - 1) . '" class="page-link">&laquo;</a></li>';
      }
      for ($i = 1; $i <= $page; $i++) {
        echo '<li class="page-item ' . ($i == $current_page ? 'active' : '') . '"><a href="index.php?action=qlhoadon&page=' . $i . '" class="page-link">' . $i . '</a></li>';
      }
      if ($current_page < $page && $page > 1) {
        echo '<li class="page-item"><a href="index.php?action=qlhoadon&page=' . ($current_page + 1) . '" class="page-link">&raquo;</a></li>';
      }
      ?>
    </ul>
  </nav>
<?php } ?>
<?php include "View/footer.php"; ?>

<style>
  .table-responsive {
    margin-top: 20px;
  }

  .thead-dark th {
    background-color: #343a40;
    color: #fff;
  }

  .btn-sm {
    margin-bottom: 5px;
  }

  .main_nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .main_nav ul li {
    display: inline-block;
    margin-right: 20px;
  }

  .main_nav ul li a {
    color: #333;
    /* Màu chữ cho menu */
    text-decoration: none;
    transition: color 0.3s ease;
    /* Hiệu ứng hover */
  }

  .main_nav ul li a:hover {
    color: Orange;
    /* Màu chữ khi di chuột vào */
  }

  .dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    z-index: 1000;
  }

  .dropdown-menu a {
    color: #333;
    text-decoration: none;
    transition: background-color 0.3s ease;
  }

  .dropdown-menu a:hover {
    background-color: #f5f5f5;
  }

  .number {
    color: black;
    text-align: center;
    float: inline-end;
  }
  .badge {
    display: inline-block;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0.25rem;
}

/* Định nghĩa lớp badge-success */
.badge-success {
    color: white;
    background-color: #72498b;
}
</style>
<script>
  function showDropdown() {
    var dropdownContent = document.getElementById("dropdownContent");
    dropdownContent.classList.add("show");
    dropdownContent.style.display = "block";
    dropdownContent.style.position = "absolute";
    dropdownContent.style.left = "0";
    dropdownContent.style.top = "100%";
  }

  function hideDropdown() {
    var dropdownContent = document.getElementById("dropdownContent");
    dropdownContent.classList.remove("show");
    dropdownContent.style.display = "none";
  }
</script>