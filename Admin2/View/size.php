
<div class="col-md-12" style="margin-top:30px;">
  <div class="col-md-4">
        <div class="card-header bg-primary text-center">
           <h4>THÊM SIZE</h4>
        </div>
        <div class="card-body">
        <form action="index.php?action=size&act=size_action" method="post" enctype="multipart/form-data">
              <!-- <div class="form-group">
                <label for="">Mã loại</label>
                <input type="text" readonly name="idloai" placeholder="Không cần nhập mã loại" class="form-control" >
              </div> -->
              <div class="form-group">
                <label for="">Tên size</label>
                <input type="text" name="size" class="form-control">
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary">Thêm</button>
              </div>
          </form>
        </div>
  </div>
  <div class="col-md-8" style="width:100%">
    <h1 class="text-center"><b>Danh sách size</b></h1>
    <table class="table table-bordered table-striped table-hover">
      <thead class="table-success">
        <tr>
          <th>Mã size</th>
          <th>Tên size</th>
          <th>Xóa</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $size = new size();
          $result = $size->getSize();
          while ($set=$result->fetch()) :
        ?>
        <tr>
          <td style="vertical-align: middle;"><?php echo $set['Idsize']?></td>
          <td style="vertical-align: middle;"><?php echo $set['size']?></td>
          <td style="vertical-align: middle;"><a href="index.php?action=size&act=delsize&id=<?php echo $set['Idsize'] ?>" type="button" class="btn btn-warning">Xóa</a></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

</div>
      
