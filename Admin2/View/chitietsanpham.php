<?php
$hh = new qlhoadon();
$masohd = $_GET['id'];
$result = $hh->getHangHoaCT($masohd);
?>
<div class="col-md-12" style="text-align: center;">
  <h3><b>DANH SÁCH MÃ HÓA ĐƠN (<?php echo $masohd; ?>)</b></h3>
</div>

<div class="col-md-12">
  <div class="cart-item">
    <div class="col-md-6" style="background: burlywood;">
      <?php
      foreach ($result as $key => $item) {
        ?>
        <div class="product" style="margin-top: 10px;">
          <div class="col-md-2">
            <img class="img" width="80px" height="100px" src="Content/imagetourdien/<?php echo $item['hinh']; ?>">
          </div>
          <div class="col-md-7">
            <b>
              <div><?php echo $item['tenhh']; ?><br></div>
              <div style="color:grey">Size: <?php echo $item['size']; ?>
              </div>
              <div style="color:grey">Studio: <?php echo $item['mausac']; ?>
              </div>

            </b>

          </div>
          <div class="col-md-3 centered">
            <b style="float: right;">
              <?php if ($item['giamgia'] > 0) {
                echo $item['soluongmua'] . ' x ' . number_format($item['giamgia']);
              } else {
                echo $item['soluongmua'] . ' x ' . number_format($item['dongia']);
              } ?>
              <sup><u>đ</u></sup>
            </b>
          </div>
        </div>
        <br>
        <?php
      }
      ?>
      <hr>
      <div class="subship">
        <p>Tạm tính:</p>
        <p style="float: right;">
          <?php
          $hh = new qlhoadon();
          $result = $hh->getHangHoaCT($masohd);
          $total = 0;

          foreach ($result as $key => $item) {
            if (isset($item['thanhtien'])) {
              $total += $item['thanhtien'];
            }
          }
          echo number_format($total);
          ?>
          <sup><u>đ</u></sup>
        </p>
      </div>

      <div class="subship">
        <p>Phí ship:</p>
        <p style="float: right;"> <?php echo number_format($item['phiship']); ?> <sup><u>đ</u></sup></p>
      </div>

      <hr>
      <div class="sub">
        <b>Tổng cộng:</b>

        <b style="float: inline-end;color:black;font-size:20px">
          <?php echo number_format($item['tongtien']); ?><sup><u>đ</u></sup>
        </b>

      </div>

    </div>
    <div class="col-md-6">
      <?php
      if (isset($_GET['id'])) {

        $hd = new qlhoadon();
        $kh = $hd->ThongTinKH($masohd);
        $hoten = $kh['hoten'];
        $ngay = $kh['ngaydat'];
        $dc = $kh['diachi'];
        $sodt = $kh['sodienthoai'];
        $email = $kh['email'];
        $ghichu = $kh['ghichu'];
        ?>
        <!-- Billing Details -->

        <div class="col-md-12 afk">
          <p style="text-align: center;"><b>Thông tin khách hàng</b></p>
        </div>
        <div class="col-md-12 ak">
          <p><b>Họ và tên:</b> <?php echo $hoten; ?></p>
          <p><b>Mã số hóa đơn:</b> <?php echo $masohd; ?></p>
          <p><b>Ngày đặt:</b> <?php echo $ngay; ?></p>
          <p><b>Số điện thoại:</b> <?php echo $sodt; ?></p>
          <p><b>Email:</b><?php echo $email; ?></p>
          <p><b>Địa chỉ:</b> <?php echo $dc; ?></p>
        </div>

        <div class="col-md-12 ak">
          <hr>
          <p><b>Phương thức thanh toán:</b> <?php
          if ($item['thanhtoan'] == 'bank') {
            echo 'Thanh toán qua ngân hàng';
          }
          if ($item['thanhtoan'] == 'atm') {
            echo 'Thanh toán qua VNPay';
          }
          if ($item['thanhtoan'] == 'momo') {
            echo 'Thanh toán qua MoMo';
          }
          if ($item['thanhtoan'] == 'cod') {
            echo 'Thanh toán khi nhận hàng';
          }

          ?></p>
          <hr>
        </div>
        <div class="col-md-12 ak">

          <p><b>Trạng thái đơn hàng:</b></p>
          <div class="col-md-4 sut"><b>
              <?php
              if ($item['tinhtrang'] == 0) {
                echo ' Chưa xác nhận';
              }
              if ($item['tinhtrang'] == 1) {
                echo ' Đã xác nhận';
              }
              if ($item['tinhtrang'] == 2) {
                echo ' Đang giao hàng';
              }
              if ($item['tinhtrang'] == -1) {
                echo ' Đã hủy đơn';
              }
              if ($item['tinhtrang'] == 3) {
                echo ' Đã hoàn thành';
              } ?></b>
          </div>

        </div>
        <div class="col-md-12 oe">
          <p style="font-size:17px;margin-top:10px"><b><u>Ghi chú:</u></b><?php echo $ghichu ?></p>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
<?php
include "View/footer.php";
?>
<style>
  .col-md-12 {
    font-family: 'Times New Roman', Times, serif;
  }

  .cart-item,
  .img {
    border: 1px solid #ccc;
    /* Đường viền của khung */
    border-radius: 8px;
    /* Bo tròn góc khung */
    padding: 5px;
    /* Đệm bên trong khung */
    overflow: hidden;
    /* Đảm bảo không có phần tử nào tràn ra ngoài */
    position: relative;
    /* Để định vị chính xác nút xóa */
    background: beige;
  }

  .product {
    display: flex;
    /* Sử dụng flexbox để tạo bố cục */
  }

  .sub {
    padding: 5px 15px;
    color: #5b5b5b;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
  }

  .subship {
    padding: 5px 15px;
    color: #5b5b5b;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 25px;
  }

  .subship p {
    font-size: 13px;
    margin-bottom: 0px;
    font-family: 'Times New Roman', Times, serif;
  }

  .centered {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .soluong {
    color: white;
    background: grey;
    width: 20px;
    height: 20px;
    text-align: center;
    border-radius: 50%;
    margin-top: -85px;
    margin-left: -86px;
  }

  .ak p b {
    float: inline-start;
  }

  .ak p {
    text-align: right;
  }

  .afk {
    font-size: larger;
  }

  .sut {
    text-align: center;
    background: white;
    border-radius: 8px;
    height: 30px;
    float: inline-end;
    position: relative;
    top: -10px;
  }

  .sut b {
    position: relative;
    top: 5px;
  }

  .oe {
    background-color: #fee3e8;
    border: 1px solid #fdd0d8;
    color: #d20909;
    font-size: 13px;
    padding: 10px 15px;
    margin: 10px 0;
    text-align: left;
  }

  .ak hr {
    border: 1px solid black;
  }
</style>