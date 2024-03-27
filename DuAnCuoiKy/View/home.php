<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="margin-top:100px;">


	<!-- Promo -->



	<!-- New Arrivals -->

	<div class="arrivals" >
		<div class="container" >
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<div class="section_subtitle">only the best</div>
						<div class="section_title">new arrivals</div>
					</div>
				</div>
			</div>
			<div class="row promo_container">

				<!-- Promo Item -->
				<div class="col-lg-6 promo_col">
					<div class="promo_item">
						<div class="promo_image">
							<img src="Content/imagetourdien/26.jpg" alt="">
							<div class="promo_content promo_content_1">
								<div class="promo_title">New</div>
								<div class="promo_subtitle">Sản phẩm mới</div>
							</div>
						</div>
						<div class="promo_link"> <a href="index.php?action=sanpham">Shop Now</a></div>
					</div>
				</div>

				<!-- Promo Item -->
				<div class="col-lg-6 promo_col">
					<div class="promo_item">
						<div class="promo_image">
							<img src="Content/imagetourdien/37.jpg" alt="">
							<div class="promo_content promo_content_2">
								<div class="promo_title">Sale off</div>
								<div class="promo_subtitle">Áo thời trang</div>
							</div>
						</div>
						<div class="promo_link"> <a href="index.php?action=sanpham&act=sanphamkhuyenmai">Shop Now</a></div>
					</div>
				</div>

				<!-- Promo Item -->
				
</br>
</br>



            <section id="examples" class="text-center" >
	</br>
</br>

            <!-- Heading -->
            <div class="row">
                <div class="col-md-8 text-right">
                    <h3 class="product_name ">SẢN PHẨM MỚI NHẤT</h3>
					
                </div>
               


            </div>

				<!-- Product -->
        <div class="row" >
         <?php
         $hh=new hanghoa();
         $result=$hh->getHangHoaNew();
         while($set=$result->fetch()):
         ?>

              <!--Grid column-->
                <div class="col-lg-3 product_col" >
					<a  href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh'];?>">
                        <div class="product">
                            <div class="view overlay z-depth-1-half">
                                <img src="Content\imagetourdien\<?php echo $set['hinh'];?>" class="img-fluid" alt="">
								<div class="promo_link"> <a href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh'];?>">Mua ngay</a></div>
                            <div class="mask rgba-white-slight"></div>
                            </div>
                            <div class="rating rating_4 text-left">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product_content clearfix">
                            <div class="product_info">
                                    <div class="product_name text-left"><a >
                                <span><?php echo $set['tenhh']?></span></br></a></a></div>
                                    <div class="product_price text-left"><?php echo number_format($set['dongia']);?><sup><u>đ</u></sup></br></div>
                                </div>
                                
                            </div>
                            <div class="product_name text-left"><h5><b>Số lượt xem:</b> <?php echo $set['soluotxem'];?> <b>Số lượng tồn:</b> <?php echo $set['soluongton'];?></h5></div>
							
					    </div>
		 			</a>
			    </div>
         <?php
         endwhile;
         ?>
        </div>
		</section>
		<section id="examples" class="text-center">

      <!-- Heading -->
      <div class="row">
	  <div class="col-md-8 text-right">
                    <h3 class="product_name">SẢN PHẨM KHUYẾN MÃI</h3>
                </div>
               

      </div>
      <!--Grid row-->
      <div class="row" >
         <?php
         $hh=new hanghoa();
         $result=$hh->getHangHoaSale();
         while($set=$result->fetch()):
         ?>

              <!--Grid column-->
                <div class="col-lg-3 product_col">
					<a  href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh'];?>">
                        <div class="product">
                            <div class="view overlay z-depth-1-half">
                                <img src="Content\imagetourdien\<?php echo $set['hinh'];?>" class="img-fluid" alt="">
								<div class="promo_link"> <a href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh'];?>">Mua ngay</a></div>
                            <div class="mask rgba-white-slight"></div>
                            </div>
                            <div class="rating rating_4 text-left">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product_content clearfix">
                            <div class="product_info text-left">
                                    <div class="product_name"><a >
                                <span><?php echo $set['tenhh']?></span></br></a></a></div>
                                    <div class="product_price"><strike><?php  echo number_format($set['dongia']); ?></strike><sup><u>đ</u></sup> <font color="red"><?php echo number_format($set['giamgia']); ?><sup><u>đ</u></sup></font></sup></br></div>
                                </div>
                                
                            </div>
                            <div class="product_name text-left"><h5>Số lượt xem: <?php echo $set['soluotxem'];?> Số lượng tồn: <?php echo $set['soluongton'];?></h5></div>
							
					    </div>
		 			</a>
			    </div>
         <?php
         endwhile;
         ?>
        </div>

      <!--Grid row-->

  </section>

				
				

				<!-- Product -->
				
			</div>
		</div>
	</div>

	<!-- Extra -->

	

	<!-- Gallery -->



	<!-- Testimonials -->

	

	<!-- Footer -->

	<footer class="footer ">
		<div class="container  text-center">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="footer_logo"><a href="#">Kissnote</a></div>
					<nav class="footer_nav">
						<ul>
							<li><a href="index.html">home</a></li>
							<li><a href="categories.html">clothes</a></li>
							<li><a href="categories.html">accessories</a></li>
							<li><a href="categories.html">lingerie</a></li>
							<li><a href="contact.html">contact</a></li>
						</ul>
					</nav>
					<div class="footer_social">
						<ul>
							<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-reddit-alien" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						</ul>
					</div>
					<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>