<?php
 include "View/headder.php";
?>
   <div class="col-md-12" style="margin-top:50px;">
  <div class="card">
    <div class="card-header bg-info text-white">
      QUẢN LÝ LOẠI HÀNG
    </div>
    <div class="card-body">
      <form action="index.php?action=loai&act=loai_action" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="file">Chọn hình ảnh:</label>
          <input type="file" name="file" id="file" class="form-control-file">
        </div>
        <div class="form-group">
          <label for="namecata">Tên danh mục:</label>
          <input type="text" name="namecata" id="namecata" class="form-control">
        </div>
        <div class="form-group">
          <label for="menu">Menu số:</label>
          <input type="text" name="menu" id="menu" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Lưu</button>
          <a href="#" class="btn btn-danger">Danh sách</a>
        </div>
      </form>
    </div>
  </div>
</div>


      <?php
 include "View/footer.php";
?>