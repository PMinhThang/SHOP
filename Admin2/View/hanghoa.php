<?php
 include "View/headder.php";
?>
<div  class="col-md-4 col-md-offset-4"><h3 ><b>DANH SÁCH HÀNG HÓA</b></h3></div>
<div class="row col-12">
<a href="index.php?action=hanghoa&act=insert_hanghoa"><h4>Thêm sản phẩm</h4></a>
</div>
<div class="row">
<table class="table">
    <thead>
      <tr class="table-primary">
        <th>Mã hàng</th>
        <th>Tên hàng</th>
        <th>Hình</th>
        <th>Mã loại</th>
        <th>Đặc biệt</th>
        <th>Số lượt xem</th>
        <th>Ngày lập</th>
        <th>Mô tả</th>
        <th>Cập Nhật</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $hh=new hanghoa();
        $count = $hh->getHangHoa()->rowCount();
        $limit=12;
        $trang=new page();
        $page=$trang->findPage($count,$limit);
        $start=$trang->findStart($limit);
        $result = $hh->getHangHoaAllPage($start,$limit);
        while($set=$result->fetch()):
      ?>
      <tr>
        <td><?php echo $set['mahh'];?></td>
        <td><?php echo $set['tenhh'];?></td>
        <td style="padding:0; text-align:center;"><img src=Content/imagetourdien/<?php echo $set['hinh'] ?> alt="" style="width:50px"></td>
        <td><?php echo $set['maloai'];?></td>
        <td><?php echo $set['dacbiet'];?></td>
        <td><?php echo $set['soluotxem'];?></td>
        <td><?php echo $set['ngaylap'];?></td>
        <td><?php echo $set['mota'];?></td>
        <td><a href="index.php?action=hanghoa&act=update_hanghoa&id=<?php echo $set['mahh'];?>" class="btn btn-primary">Cập nhật</a></td>
        <td><a href="index.php?action=hanghoa&act=delete_hanghoa&mahh=<?php echo $set['mahh'];?>" class="btn btn-danger">Xóa</a></td>
      </tr>
     <?php
      endwhile;
     ?>
    </tbody>
  </table>
  <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center" >
              <?php
                $current_page=isset($_GET['page'])?$_GET['page']:1;
                if($current_page>1 && $page>1)
                {
                    echo '<li>
                    <a href="index.php?action=hanghoa&page='.($current_page-1).'" class="page-link">Prev</a>
                    </li>';
                }
                    for($i=1;$i<=$page;$i++){
                    ?>  
                    <li class="page-item"><a href="index.php?action=hanghoa&page=<?php echo $i;?>" class="page-link"><?php echo $i; ?></a></li>
                    <?php
                    }
                    if($current_page<$page && $page>1)
                {
                    echo '<li>
                    <a href="index.php?action=hanghoa&page='.($current_page+1).'" class="page-link">Next</a>
                    </li>';
                }
                   ?>          
            </ul>
          </nav>
</div>

<?php
 include "View/footer.php";
?>