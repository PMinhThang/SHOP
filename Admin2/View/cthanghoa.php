<?php
 include "View/headder.php";
?>
<div class="col-md-12">
    <div class="card">
      <h5 class="card-header bg-info text-white">QUẢN LÝ HÀNG HÓA</h5>
      <div class="card-body">
        <form action="index.php?action=cthanghoa&act=cthanghoa_action" method="post" enctype="multipart/form-data">
          <div class="form-group row">
            <label for="mahh" class="col-sm-4 col-form-label">Mã hàng hóa:</label>
            <div class="col-sm-8">
              <select name="mahh" id="mahh" class="form-control">
                <?php
                  $hh=new hanghoa();
                  $hang=$hh->getHangHoa();
                  while($set=$hang->fetch()):
                ?>
                <option value="<?php echo $set['mahh'];?>"><?php echo $set['tenhh'];?></option>
                <?php
                  endwhile;
                ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="mamau" class="col-sm-4 col-form-label">Màu sắc:</label>
            <div class="col-sm-8">
              <select name="mamau" id="mamau" class="form-control">
                <?php
                  $hh=new hanghoa();
                  $hang=$hh->getMau();
                  while($set=$hang->fetch()):
                ?>
                <option value="<?php echo $set['Idmau'];?>"><?php echo $set['mausac'];?></option>
                <?php
                  endwhile;
                ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="masize" class="col-sm-4 col-form-label">Size:</label>
            <div class="col-sm-8">
              <select name="masize" id="masize" class="form-control">
                <?php
                  $hh=new hanghoa();
                  $hang=$hh->getSize();
                  while($set=$hang->fetch()):
                ?>
                <option value="<?php echo $set['Idsize'];?>"><?php echo $set['size'];?></option>
                <?php
                  endwhile;
                ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="dongia" class="col-sm-4 col-form-label">Đơn giá:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="dongia" id="dongia">
            </div>
          </div>
          <div class="form-group row">
            <label for="slt" class="col-sm-4 col-form-label">Số lượng tồn:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="slt" id="slt">
            </div>
          </div>
          <div class="form-group row">
            <label for="image" class="col-sm-4 col-form-label">Hình:</label>
            <div class="col-sm-8">
              <div class="custom-file">
                <input type="file" name="image" id="fileupload" class="custom-file-input">
                <label class="custom-file-label" for="fileupload">Chọn file...</label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="giamgia" class="col-sm-4 col-form-label">Giảm giá:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="giamgia" id="giamgia">
            </div>
          </div>
          <div class="form-group row justify-content-center">
            <div class="col-sm-6">
              <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php
 include "View/footer.php";
?>
