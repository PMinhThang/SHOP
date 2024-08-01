<div class="col-md-12" style="margin-top:30px;">
  <div class="col-md-4">
        <div class="card-header bg-primary text-center">
           <h4>THÊM LOẠI</h4>
        </div>
        <div class="card-body">
          <?php
            if (isset($_GET['act'])&& $_GET['act']=='update') {
              echo '<form action="index.php?action=loai&act=update_action" method="post" enctype="multipart/form-data">';
            } else {
              echo '<form action="index.php?action=loai&act=loai_action" method="post" enctype="multipart/form-data">';
            }
          ?>
        
              <!-- <div class="form-group">
                <label for="">Mã loại</label>
                <input type="text" readonly name="maloai" placeholder="Không cần nhập mã loại" class="form-control" >
              </div> -->
              <div class="form-group">
                <label for="">Tên loại</label>
                <input type="text" name="tenloai" class="form-control" value="<?php if (isset($_GET['act'])&& $_GET['act']=='update'){
                  echo $_SESSION['tenloai'] ;
                } ?>">
              </div>
              <?php
                if (isset($_GET['act'])&& $_GET['act']=='update') {
                  echo '<div class="form-group">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>';
                } else {
                  echo '<div class="form-group">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>';
                }
              ?>
              
              
          </form>
        </div>
  </div>
  <div class="col-md-8">
    <h1 class="text-center"><b>Danh sách loại</b></h1>
    <?php
       if (isset($_GET['act'])&& $_GET['act']=='update') {
        echo '<a href="index.php?action=loai" type="button" class="btn btn-primary">Thêm 1 Loại</a>';
      }
    ?>
    
    <table class="table table-bordered table-striped table-hover">
      <thead class="table-success">
        <tr>
          <th>Mã loại</th>
          <th>Tên loại</th>
          <th>Xóa</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $loai = new loai();
          $result = $loai->getLoai();
          while ($set=$result->fetch()) :
        ?>
        <tr>
          <td><?php echo $set['maloai']?></td>
          <td><?php echo $set['tenloai']?></td>
          <td>
            <a href="index.php?action=loai&act=update&id=<?php echo $set['maloai'] ?>" type="button" class="btn btn-primary">Chỉnh sửa</a>
            <a href="index.php?action=loai&act=delloai&id=<?php echo $set['maloai'] ?>" type="button" class="btn btn-warning">Xóa</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

</div>
      
