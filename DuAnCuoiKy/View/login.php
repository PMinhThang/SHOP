<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="card-title mb-0">Đăng nhập</h4>
                </div>
                <div class="card-body">
                    <form action="index.php?action=dangnhap&act=dangnhap_action" class="login-form" method="post">
                        <div class="form-group">
                            <label for="txtusername">Tên Đăng Nhập</label>
                            <input type="text" class="form-control" name="txtusername" placeholder="Nhập tên đăng nhập">
                        </div>
                        <div class="form-group">
                            <label for="txtpassword">Mật Khẩu</label>
                            <input type="password" class="form-control" name="txtpassword" placeholder="Nhập mật khẩu">
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Đăng Nhập</button>
                    </form>
                </div>
                <div class="card-footer text-muted text-center">
                    <a href="index.php?action=forget">Quên mật khẩu?</a>
                </div>
            </div>
        </div>
    </div>
</div>



