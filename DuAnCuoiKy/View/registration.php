<div class="container" style="margin-top:100px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title text-center">Đăng ký thành viên</h4>
                </div>
                <div class="card-body">
                    <form action="index.php?action=dangky&act=dangky_action" method="post" class="form">
                        <div class="form-group">
                            <label for="txttenkh">Tên Khách Hàng:</label>
                            <input class="form-control" name="txttenkh" placeholder="Nhập tên khách hàng" required="" autofocus="" type="text">
                        </div>
                        <div class="form-group">
                            <label for="txtdiachi">Địa chỉ:</label>
                            <input class="form-control" name="txtdiachi" placeholder="Nhập địa chỉ khách hàng" required="" autofocus="" type="text">
                        </div>
                        <div class="form-group">
                            <label for="txtsodt">Số Điện Thoại:</label>
                            <input class="form-control" name="txtsodt" placeholder="Nhập số điện thoại khách hàng" required="" autofocus="" type="text">
                        </div>
                        <div class="form-group">
                            <label for="txtusername">Tên Đăng Nhập:</label>
                            <input class="form-control" name="txtusername" placeholder="Nhập tên đăng nhập" required="" type="text">
                        </div>
                        <div class="form-group">
                            <label for="txtemail">Email:</label>
                            <input class="form-control" name="txtemail" placeholder="Nhập email" required="" type="email">
                        </div>
                        <div class="form-group">
                            <label for="txtpass">Mật khẩu:</label>
                            <input class="form-control" name="txtpass" placeholder="Nhập mật khẩu" required="" type="password">
                        </div>
                        <div class="form-group">
                            <label for="retypepassword">Nhập lại mật khẩu:</label>
                            <input class="form-control" name="retypepassword" placeholder="Nhập lại mật khẩu" required="" type="password">
                        </div>
                        <button class="btn btn-primary btn-block" type="submit" name="submit">Đăng ký</button>
                    </form>
                </div>
                <div class="card-footer text-muted text-center">
                    <p>Đã có tài khoản? <a href="index.php?action=dangnhap">Đăng nhập ngay!</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
