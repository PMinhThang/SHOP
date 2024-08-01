<div class="col-md-12" style="margin-top:30px;">
  <div class="col-md-4">
        <div class="card-header bg-primary text-center">
           <h4>THÊM STUDIO</h4>
        </div>
        <div class="card-body">
        <form action="index.php?action=hang&act=mau_action" method="post" enctype="multipart/form-data">
              <!-- <div class="form-group">
                <label for="">Mã loại</label>
                <input type="text" readonly name="idloai" placeholder="Không cần nhập mã loại" class="form-control" >
              </div> -->
              <div class="form-group">
                <label for="">Tên Studio</label>
                <input type="text" name="mau" class="form-control">
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary">Thêm</button>
              </div>
          </form>
        </div>
  </div>

  <div class="col-md-8">
    <h1 class="text-center"><b>Danh sách Studio</b></h1>
    <table class="table table-bordered table-striped table-hover">
      <thead class="table-success">
        <tr>
          <th>Mã </th>
          <th>Tên Studio</th>
          <th>Xóa</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $mau = new mau();
          $result = $mau->getMau();
          while ($set=$result->fetch()) :
        ?>
        <tr>
          <td style="vertical-align: middle;"><?php echo $set['Idmau']?></td>
          <td style="vertical-align: middle;"><?php echo $set['mausac']?></td>
          <td style="vertical-align: middle;"><a href="index.php?action=mau&act=delmau&id=<?php echo $set['Idmau'] ?>" type="button" class="btn btn-warning">Xóa</a></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

</div>
      
