  <!-- quảng cáo -->
  <?php
  include "quangcao.php";
  ?>
  <!-- end quảng cáo -->
  <?php
  // phân trang
    $hh=new hanghoa();
    //b1 :xác định trang mình đang phân trang có bao nhieu sản phẩm
    //cách 1: dùng count
    // $count=$hh->getCountHangHoaAll();14
    // cách 2:
    $count=$hh->getHangHoaAll()->rowCount();//14
    //b2 : giới hạn 1 trang bao nhiêu sản phẩm, tự cho tùy bào thiết kế
    $limit=8;
    //b3: tính ra số trang dựa trên tổng sản phẩm và limit
    $trang=new page();
    //lấy ra có bao nhiêu trang
    $page=$trang->findPage($count,$limit);//2
    //lấy ra start
    $start=$trang->findStart($limit);//8


  ?>
  
  <!-- end số lượt xem san phẩm -->
  <!-- sản phẩm-->
 <?php
$ac = 1;
if (isset($_GET['action'])) {
    if (isset($_GET['act']) && $_GET['act'] == 'sanphamkhuyenmai') {
        $ac = 2;
    }
    elseif(isset($_GET['act']) && $_GET['act'] == 'timkiem'){
        $ac=3;
    }
    elseif(isset($_GET['act']) && $_GET['act'] == 'sanpham')
    {
        $ac = 1;
    }
}
 ?>

  <!--Section: Examples-->
  <section id="examples" class="text-center">

      <!-- Heading -->
      <div class="row">
          <div class="col-lg-12 text-center">
             <?php
                if($ac==1)
                {
                    echo '<h3  class="product_price" >TẤT CẢ SẢN PHẨM </h3>';
                }
                if($ac==2)
                {
                    echo '<h3  class="product_price">TẤT CẢ SẢN PHẨM SALE</h3>';
                }
                if($ac==3)
                {
                    echo '<h3  class="product_price">TẤT CẢ SẢN PHẨM TÌM KIẾM </h3>';
                }
             ?>
          </div>

      </div>
      <!--Grid row-->
      <div class="row">
        <?php
            $hh= new hanghoa();
            if($ac==1)
            {
                // $result=$hh->getHangHoaAll();// lấy được 14 sản phẩm *****
                $result=$hh->getHangHoaAllPage($start,$limit);// phân trang
            }
            if($ac==2)
            {
                $result=$hh->getHangHoaAllSale();// lấy được 8 sản phẩm
            }
            if ($ac == 3) {
                if(isset($_POST['txtsearch']))
                {
                    if($_POST['txtsearch'] == "")
                    {
                        echo '<script> alert("Chưa Nhập Giá Trị Tìm Kiếm");</script>';
                        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
                    }
                    if($_POST['txtsearch'] !== "")
                    {
                        $tk=$_POST['txtsearch'];
                    // đem giá trị này đi tìm kiếm
                    $result=$hh->getTimKiem($tk);
                    }
                }
            }
            while($set=$result->fetch()):
        ?>
         
              <!--Grid column-->
              <a >
              <div class="col-lg-3 col-md-4 mb-3 text-left">

                  <div class="view overlay z-depth-1-half">
                      <img src="Content\imagetourdien\<?php echo $set['hinh'];?>" class="img-fluid" alt="">
                      <div class="promo_link"> <a href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh'];?>">Mua ngay</a></div>
                      <div class="mask rgba-white-slight"></div>
                  </div>
                  <a href="">
                  <div class="product_name"><a>
                                <span><?php echo $set['tenhh']?></span></br></a></a></div>
                  <?php
                    if($ac==1){
                    echo ' <h5 class="product_price" >' .number_format($set['dongia']).'<sup><u>đ</u></sup></br>
                    </h5>';
                    }
                    if($ac==2){
                    echo ' <h5 class="product_price">
                    <font color="red">'. number_format($set['giamgia']).'<sup><u>đ</u></sup></font>
                    <strike>' .number_format($set['dongia']). '</strike><sup><u>đ</u></sup>
                  </h5>'    ;
                    }
                  ?>
                  
                 
                                <h5>Số lượt xem: <?php echo $set['soluotxem'];?> Số lượng tồn: <?php echo $set['soluongton'];?></h5>

              </div>
                </a>
            <?php
            endwhile;
            ?>
          
      </div>

      <!--Grid row-->

  </section>
 
  
  <!-- end sản phẩm mới nhất -->
  
 
  <div class="col-lg-12 text-center">
    <!-- phân trang -->
				<ul class="pagination">
                <?php
                // nút lùi, khi nào lùi, khi trang hiện nó lớn hơn 1 và tổng số trang >1
                $current_page=isset($_GET['page'])?$_GET['page']:1;
                if($current_page>1 && $page>1)
                {
                    echo '<li ><a href="index.php?action=sanpham&page='.($current_page-1).'">Prev</a></li>';
                }
                    for($i=1;$i<=$page;$i++){
                    ?>    
                
				    <li ><a href="index.php?action=sanpham&page=<?php echo $i;?>"><?php echo $i; ?></a></li>
				   <?php
                    }
                    //nút next, next cho tới khi nhỏ thơn tổng số trang và tổng trang lớn hon 1
                    if($current_page<$page && $page>1)
                {
                    echo '<li ><a href="index.php?action=sanpham&page='.($current_page+1).'">Next</a></li>';
                }
                   ?>
				</ul>
</div>