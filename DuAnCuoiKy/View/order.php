<body>

<div class="super_container" >
	
	<!-- Header -->

	
	<!-- Menu -->

	
	<!-- Home -->

	

	<!-- Checkout -->

	<div class="checkout">
		<div class="container" style="margin-top:60px;">
			<div class="row">
      <?php
            if(!isset($_SESSION['makh'])):
            echo '<script> alert("ban phai dang nhap");</script>';
            echo '<meta  http-equiv="refresh" content="0;url=../index.php?action=dangnhap"/>';
            ?>
            <?php
            else:
            ?>
                <form action="" method="post">
                  <table class="table table-bordered" border="0">
                  <?php
                    if(isset($_SESSION['masohd']))
                    {
                      $masohd=$_SESSION['masohd'];
                      $hd=new hoadon();
                      $kh=$hd->ThongTinKH($masohd);
                      $tenkh=$kh['tenkh'];
                      $ngay=$kh['ngaydat'];
                      $dc=$kh['diachi'];
                      $sodt=$kh['sodienthoai'];
					  $email=$kh['email'];

                    
                    
                  ?>
				<!-- Billing Details -->
				<div class="col-lg-6">
					<div class="billing">
						<div class="checkout_title">Thông tin khách hàng</div>
						<div class="checkout_form_container">
							<form action="#" id="checkout_form">
								<input type="text" class="checkout_input" placeholder="Tên khách hàng: <?php echo $tenkh;?>" required="required">
								<input type="text" class="checkout_input" placeholder="Mã số hóa đơn: <?php echo $masohd;?>" required="required">
								<input type="text" class="checkout_input" placeholder="Ngày: <?php echo $ngay;?>"required="required">
								<input type="text" class="checkout_input" placeholder="Email: <?php echo $email;?>" required="required">
								<input type="text" class="checkout_input" placeholder="Địa chỉ: <?php echo $dc;?>" required="required">
               	<input type="text" class="checkout_input" placeholder="Số điện thoại: <?php echo $sodt;?>" required="required">
							</form>
						</div>
					</div>
				</div>

				<!-- Cart Details -->
    


      
          <div class="col-lg-6">
          
            <div class="cart_details">
              <div class="checkout_title">Hóa đơn</div>
              <div class="cart_total">
                <ul>
                  <li class="d-flex flex-row align-items-center justify-content-start">
                    <div class="cart_total_title">Tên hàng hóa</div>
                    <div class="cart_total_price ml-auto">size</div>
                    <div class="cart_total_price ml-auto">màu</div>
                    <div class="cart_total_price ml-auto">SL</div>
                    <div class="cart_total_price ml-auto">Đơn giá</div>
                  </li>
          <?php
            $j=0;
            $sp=$hd->selectThongTinHoaDon($masohd);
            while($set=$sp->fetch()):
              $j++;
          ?>
                  <li class="d-flex flex-row align-items-center justify-content-start">
                    <div class="cart_total_title"><?php echo $set['tenhh'];?></div>
                    <div class="cart_total_price ml-auto"><?php echo $set['size'];?></div>
                    <div class="art_total_price ml-auto"> <?php echo $set['mausac'];?>  </div>
                    
                    <div class="cart_total_price ml-auto"><?php echo $set['soluongmua'];?> </div>
                    <div class="cart_total_price ml-auto"><?php echo number_format($set['dongia']);?></div>
                    </li>
					<?php
						  endwhile;
						?>
				  <li class="d-flex flex-row align-items-center justify-content-start">
                    <div class="cart_total_title">Tổng tiền:</div>
                    <div class="cart_total_price ml-auto"><?php
                      $gh=new giohang();
                      echo $gh->getSubTotal();
                    
                    ?>
                      </div></div>
                  </li>
                  
                </ul>
              </div>
              
            </div>
          </div>
              </from>
          <?php
                    }
          endif;
          ?>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col text-center">
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
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/checkout_custom.js"></script>
</body>