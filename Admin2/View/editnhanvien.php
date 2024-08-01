<?php
if (isset($_GET['id'])) {
  $idnv = $_GET['id'];
  // truy vấn thông tin của id
  $hh = new nhanvien();
  $kq = $hh->getNhanVienID($idnv);
  $hoten = $kq['hoten'];
  $dia = $kq['dia'];
  $username = $kq['username'];
  $matkhau = $kq['matkhau'];
  $idcv = $kq['idcv'];
  $chucvu = $kq['chucvu'];
}
?>
<?php
$ac = 1;
if (isset($_GET['action'])) {
  if (isset($_GET['act']) && $_GET['act'] == 'insert_nhanvien') {
    $ac = 1;
    echo "<h1 class='text-center mt-5'>THÊM NV</h1>";
  } else {
    $ac = 2;
    echo "<h1 class='text-center col-md-12'>SỬA NV</h1>";
  }
}
?>
<div class="row col-md-8 col-md-offset-4 mt-8">
<button onclick="goBack()" class="btn btn-secondary" style="height:35px">Quay lại</button>
  <?php
  if ($ac == 1) {
    echo '<form action="index.php?action=qlhoadon&act=insert_NV" method="post" enctype="multipart/form-data">';
  } else {
    echo '<form action="index.php?action=qlhoadon&act=update_NV" method="post" enctype="multipart/form-data">';
  }
  ?>

  <table class="table table-hover" style="border: 0px;">
  
    <tr>
      <td>Mã nhân viên</td>
      <td> <input type="text" class="form-control" name="idnv" value="<?php if (isset($idnv))
        echo $idnv; ?>" readonly />
      </td>
    </tr>

    <tr>
      <td>Họ tên</td>
      <td><input type="text" class="form-control" required name="hoten" value="<?php if (isset($hoten))
        echo $hoten; ?>" maxlength="100px"></td>
    </tr>
    <tr>
      <td>Địa chỉ</td>
      <td><input type="text" class="form-control" required name="dia" value="<?php if (isset($dia))
        echo $dia; ?>" maxlength="100px"></td>
    </tr>
    <tr>
      <td>Username</td>
      <td><input type="text" class="form-control" required name="username" value="<?php if (isset($username))
        echo $username; ?>" maxlength="100px"></td>
    </tr>
    <tr>
      <td>Mật khẩu</td>
      <td><input type="text" class="form-control" required name="matkhau" value="<?php if (isset($matkhau))
        echo $matkhau; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
      </td>
    </tr>
    <tr>
      <td>Chức vụ</td>
      <td>
        <select name="idcv" class="form-control">
          <?php
          $selectchucvu = -1;
          if (isset($idcv) && $idcv != -1) {
            $selectchucvu = $idcv;//6
          }
          $chucvu= new nhanvien();
          $result = $chucvu->getCV();
          while ($set = $result->fetch()):
            ?>
            <option name="chucvu[]" value="<?php echo $set['idcv'] ?>" <?php if ($selectchucvu == $set['idcv'])
                 echo 'selected'; ?>><?php echo $set['chucvu']; ?></option>
            <?php
          endwhile;
          ?>
        </select>
      </td>

    </tr>
   

  </table>
  <input class="btn btn-primary" type="submit" value="submit">
  </form>
</div>
<script>
  function enableNumberInput(checkbox) {
    var input = checkbox.parentNode.nextElementSibling.querySelector('input[type="number"]');
    if (checkbox.checked) {
      input.disabled = false;
    } else {
      input.disabled = true;
      input.value = null;
    }
  }
  function goBack() {
      window.history.back();
    }
</script>