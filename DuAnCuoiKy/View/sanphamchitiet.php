<script type="text/javascript">
    function chonsize(a) {
        document.getElementById("size").value = a;

    }
</script>

<section>
    <div class="row">
        <div class="col-md-12 text-center">
            <br>
            <h3 class="mb-5 font-weight-bold">CHI TIẾT SẢN PHẨM</h3>
        </div>

    </div>
    <article class="col-12">
        <!-- <div class="card"> -->
        <div class="container">
            <div class="row">
                <form action="index.php?action=giohang&act=giohang_action" method="post">
                    
                    <!-- <input type="hidden" name="action" value="giohang&add_cart"/> -->
                    <div class="product">
                        <div class="container">
                           
                            <div class="row ">
                                
                                <!-- Product Image -->
                                <div class="col-md-12">
                                <div class="col-md-7 ">
                                    <div class="tab-content">
                                        <?php
                                        // điều hướng qua view chi tiết, đông thời cũng truyền id
                                        if(isset($_GET['id']))
                                        {
                                            $id=$_GET['id'];
                                            //view đòi hỏi cần có thông tin của sản phẩm mà id=24?model
                                            $hh=new hanghoa();
                                            $sp=$hh->getHangHoaId($id);// array(mahh:24,tenhh: giày...)
                                            $tenhh=$sp['tenhh'];
                                            $mota=$sp['mota'];
                                            $dongia=$sp['dongia'];
                                            $giamgia=$sp['giamgia'];
                                        }
                                        ?>
                                        <?php
                                            $hinh=$hh->getHangHoaHinh($id);
                                            $set=$hinh->fetch();// lấy ra thông tin của dòng đầu
                                        ?>
                                        <div class="tab-pane active" id=""><img src="Content/imagetourdien/<?php echo $set['hinh'];?>" >
                                        </div>
                                    
                                    </div>
                                    <ul class="preview-thumbnail nav nav-tabs">
                                        <?php
                                            while($img=$hinh->fetch()):
                                        ?>
                                        <li class="active"><a href="#<?php echo $img['hinh']; ?>"
                                                data-toggle="tab">
                                                    <img src="<?php echo 'Content/imagetourdien/' . $img['hinh']; ?>"
                                                    alt="Học thiết kế web bán hàng Online"></a>
                                                </li>
                                        <?php
                                            endwhile;
                                        ?>
                                    </ul>
                                </div>

                                <!-- Product Content -->
                                <div class="col-md-5">
                                    <input type="hidden" name="mahh" value="<?php echo $id;?>" />
                                    <h3 class="product-title"> <?php echo $tenhh; ?> </h3>
                                    <div class="product_text">
                                        <?php
                                        echo $mota
                                        ?>
                                        </div>
                                            <?php
                                            if($giamgia>0){
                                                echo '<div class="product_price">Giá bán: '.(number_format($giamgia)) .'đ</div>';

                                            }if($giamgia<=0){
                                                echo '<div class="product_price">Giá bán: '.(number_format($dongia)) .'đ</div>';
                                            }

                                            ?>
                                    
                                    
                                    <h5 class="colors">Màu:
                                        <select name="mymausac" class="form-control" style="width:150px;">
                                        <?php
                                            $mau=$hh->getHangHoaMau($id);
                                            while($set=$mau->fetch()):
                                        ?>
                                        <option value="<?php echo $set['idmau']?>"><?php echo $set['mausac'];?></option>
                                    <?php
                                    endwhile;
                                    ?>
                                        </select><br>
                                    
                                        <input type="hidden" name="size" id="size" value="0" />
                                        Kích Thước:
                                        <?php
                                            $sise=$hh->getHangHoaSize($id);
                                            while($set=$sise->fetch()):
                                            ?>
                                      
                                           
                                            <button type="button"  name="" onclick="chonsize(<?php echo $set['Idsize'];?>)"
                                            class="btn btn-default-hong btn-circle" id="hong"
                                            value="<?php echo $set['Idsize']; ?>">
                                                <?php echo $set['size']; ?>
                                            </button>
                                       
                                    <?php
                                    endwhile;
                                    ?>
                                        </br></br>
                                        Số Lượng:
                                        
                                        <input type="number" id="soluong" name="soluong" min="1" max="100" value="1" size="10" />


                                    </h5>
                                    <div class="action">

                                        <button class="add-to-cart btn btn-default" type="submit" data-toggle="modal" data-target="#myModal">MUA NGAY
                                        </button>

                                        <a href="http://hocwebgiare.com/" target="_blank"> <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button> </a>
                                    </div>
                                  
                                </div>
                                </div>
                            </div>

                           
                        </div>		
	                </div>
                </form>
            </div>
        </div>
        <!-- </div> -->
    </article>


               
                <hr>
            </div>
            <form action="" method="post">
            <div class="row">
              
                    <input type="hidden" name="txtmahh" value="" />
                    <img src="Content/imagetourdien/people.png" width="50px" height="50px"; />
                    <textarea class="input-field" type="text" name="comment" rows="2" cols="70" id="comment" placeholder="Thêm bình luận">  </textarea>
                    <input type="submit" class="btn btn-primary" id="submitButton" style="float: right;" value="Bình Luận" />
                                
            </div>
            
            </form>
            <div class="row">
                <p class="float-left"><b>Các bình luận</b></p>
                <hr>
            </div>
            <div class="row">
               <br/>
            </div>

        </div>
</section>
