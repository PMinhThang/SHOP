<div class="container" style="margin-top:150px;">
    <div class="row justify-content-center">
        <div class="col-md-6 login-sec">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Quên Mật Khẩu</h3>
                    <form action="index.php?action=forget&act=forget_action" class="login-form" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nhập Email để nhận liên kết đặt lại mật khẩu</label>
                            <input type="text" class="form-control" name="email" placeholder="Email của bạn">
                        </div>
                        <button type="submit" name="submit_email" class="btn btn-primary btn-block">Gửi Liên Kết</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include_once "View/footer.php";
?>