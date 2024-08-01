<?php
if (isset($_GET['id'])) {
  $mahh = $_GET['id'];
  $idsize = $_GET['idsize'];

  // truy vấn thông tin của id
  $hh = new hanghoa();
  $kq = $hh->getHangHoaID($mahh,$idsize);
  $tenhh = $kq['tenhh'];
  $ngay = $kq['ngaylap'];
  $gia = $kq['dongia'];
  $soluongton = $kq['soluongton'];
  $giamgia = $kq['giamgia'];
  $hinh = $kq['hinh'];
  $maloai = $kq['maloai'];
  // $idsize=$kq['idsize'];
  //6
  // $dacbiet=$kq['dacbiet'];
  // $slx=$kq['soluotxem'];
  // $ngaylap=$kq['ngaylap'];
  $mota = $kq['mota'];
}
?>
<script src="https://cdn.tiny.cloud/1/z09z16kc7smqafqpl0wyfr7hlmffm0blar3gg3u5kce9jonv/tinymce/5/tinymce.min.js"
  referrerpolicy="origin"></script>
<?php
$ac = 1;
if (isset($_GET['action'])) {
  if (isset($_GET['act']) && $_GET['act'] == 'insert_hanghoa') {
    $ac = 1;
    echo "<h1 class='text-center mt-5'>THÊM MẶT HÀNG</h1>";
  } else {
    $ac = 2;
    echo "<h1 class='text-center mt-5'>SỬA MẶT HÀNG</h1>";
  }
}
?>

<div class="col-md-12">
  <button onclick="goBack()" class="btn btn-secondary">Quay lại</button>
  <?php
  if ($ac == 1) {
    echo '<form action="index.php?action=hanghoa&act=insert_action" method="post" enctype="multipart/form-data">';
  }
  if ($ac == 2) {
    echo '<form action="index.php?action=hanghoa&act=update_action" method="post" enctype="multipart/form-data">';
  }
  ?>
  <table class="table table-hover" style="border: 0px;">

    <?php
    if ($ac == 2):
      ?>
      <tr>
        <td>Mã hàng</td>
        <td> <input type="text" class="form-control" name="mahh" value="<?php if (isset($mahh))
          echo $mahh; ?>" readonly />
        </td>
      </tr>
    <?php endif; ?>
    <?php
    if ($ac == 1):
      ?>
      <tr>
        <td>Tên hàng</td>
        <td><input type="text" class="form-control" name="tenhh" required value="<?php if (isset($tenhh))
          echo $tenhh; ?>" maxlength="100px"></td>
      </tr>



      <tr>
        <td>Mã loại</td>
        <td>
          <select name="maloai" class="form-control" required style="width:150px;">

            <?php
            $selectloai = -1;
            if (isset($maloai) && $maloai != -1) {
              $selectloai = $maloai;//6
            }
            $loai = new loai();
            $result = $loai->getLoai();
            while ($set = $result->fetch()):
              ?>
              <option value="<?php echo $set['maloai'] ?>" <?php if ($selectloai == $set['maloai'])
                   echo 'selected'; ?>>
                <?php echo $set['tenloai']; ?>
              </option>
              <?php
            endwhile;
            ?>
          </select>
        </td>
      </tr>
    <?php endif; ?>
    <tr>
      <td>Giá </td>
      <td><input type="text" class="form-control" required value="<?php if (isset($gia))
        echo $gia; ?>" name="dongia">
      </td>
    </tr>
    <tr>
      <td>Giảm giá</td>
      <td><input type="number" class="form-control" required value="<?php if (isset($giamgia))
        echo $giamgia; ?>" name="giamgia">

    </tr>
    <td>Hình ảnh</td>
    <td>
      <input type="file" class="form-control" onchange="previewImage(this)" name="image">
      <img id="preview" src="Content/imagetourdien/<?php echo $hinh; ?>" alt="Preview"
        style="max-width: 100px; max-height: 100px;">
      <input type="text" class="form-control" readonly hidden value="<?php if (isset($hinh))
        echo $hinh; ?>" name="image1">

    </td>

    </tr>
    <?php if ($ac === 1) { ?>
      <tr>
        <td>Size</td>
        <td>

          <?php
          $selectsize = -1;
          if (isset($idsize) && $idsize != -1) {
            $selectsize = $idsize;//6
          }
          $size = new size();
          $result = $size->getSize();
          while ($set = $result->fetch()):
            ?>
        <tr>
          <td><input type="checkbox" name="size[]" value="<?php echo $set['Idsize'] ?>" onchange="enableNumberInput(this)"
              <?php if ($selectsize == $set['Idsize'])
                echo 'checked'; ?>> <?php echo $set['size']; ?></input></td>
          <td><input type="number" name="soluongton[]" class="form-control" id="" required value="<?php if (isset($soluongton))
            echo $soluongton; ?>" required class="form-control" placeholder="Số lượng" disabled></td>
        </tr>

        <?php
          endwhile;
          ?>

      </td>
      </tr>
    <?php }
    if ($ac === 2) { ?>
      <tr>
        <td>Size</td>
        <td>
          <?php
          $selectsize = -1;
          if (isset($idsize) && $idsize != -1) {
            $selectsize = $idsize; //6
          }
          $size = new size();
          $result = $size->getSize();
          while ($set = $result->fetch()) {
            // Kiểm tra nếu size này không được chọn
            if ($selectsize != $set['Idsize']) {
              continue; // Bỏ qua size này và chuyển đến size tiếp theo trong vòng lặp
            }
            ?>
        <tr>
          <td>
            <input type="checkbox" name="size[]" value="<?php echo $set['Idsize'] ?>" onchange="enableNumberInput(this)"
              <?php if ($selectsize == $set['Idsize'])
                echo 'checked'; ?>> <?php echo $set['size']; ?>
          </td>
          <td>
            <input type="number" name="soluong[]" class="form-control" required value="<?php echo $soluongton; ?>" required
              class="form-control" placeholder="Số lượng">
          </td>
        </tr>
        <?php
          }
          ?>
      </td>
      </tr>
    <?php } ?>
    <!-- nếu thêm sản phẩm thì phải có số lượng, hình ảnh, size -->
    <?php
    if ($ac === 1):
      ?>
      <tr>
        <td>Ngày lập</td>
        <td><input type="date" class="form-control" name="ngaylap" id="ngaylap" value="<?php echo $ngaylap; ?>"
            maxlength="100px"></td>
      </tr>
      <tr>
        <td>Studio</td>
        <td>

          <select name="mau" class="form-control" style="width:150px;">
            <?php
            $selectmau = -1;
            if (isset($idmau) && $idmau != -1) {
              $selectmau = $idmau;//6
            }
            $mau = new mau();
            $result = $mau->getMau();
            while ($set = $result->fetch()):
              ?>
              <option name="mau[]" value="<?php echo $set['Idmau'] ?>" <?php if ($selectmau == $set['Idmau'])
                   echo 'selected'; ?>><?php echo $set['mausac']; ?></option>
              <?php
            endwhile;
            ?>
          </select>
        </td>

      </tr>
    <?php endif; ?>
    <!-- kết thúc số lượng -->
    <?php
    if ($ac == 1):
      ?>
      <tr>
        <td>Mô tả</td>
        <td><textarea id="textarea" class="form-control" name="mota"><?php echo isset($mota) ? $mota : ''; ?></textarea>
        </td>
      </tr>
    <?php endif; ?>
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

  // Lấy ngày hiện tại
  var ngayHienTai = new Date().toISOString().slice(0, 10);

  // Đặt ngày hiện tại là giá trị mặc định cho trường nhập
  document.getElementById("ngaylap").value = ngayHienTai;

  // Hàm xem trước hình ảnh
  function previewImage(input) {
    var preview = document.getElementById('preview');
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        preview.src = e.target.result;
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
  function goBack() {
    window.history.back();
  }
  tinymce.init({
    selector: '#textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    height: 500,
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
  });
</script>