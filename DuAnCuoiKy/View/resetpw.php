<div class="col-md-3"></div>
<div class="col-md-6" id="reset">
  <div class="container">
    <div class="row">
      <div class=" login">
        <form action="index.php?action=forget&act=resetpass" class="login-form" method="post">
          <input type="hidden" name="email" value="">
          <p>Nhập Lại Mật Khẩu Đã Được Cấp</p>
          <input type="text" autocomplete="off" required class="form-control rounded-10px" name='password'>
          <u><i>Lưu ý: Dùng mật khẩu để đăng nhập vào tài khoản</i></u><br><hr>
          <input type="submit" class="vmt btn" name="submit_password">
        </form>
      </div>
    </div>
  </div>
</div>
<div class="col-md-3"></div>
<style>
  #reset {
    margin-top: 100px;
  }
  #reset .container{
    border: 1px solid #ccc;
    /* Đường viền của khung */
    border-radius: 8px;
    /* Bo tròn góc khung */
    padding: 5px;
    /* Đệm bên trong khung */
    overflow: hidden;
    /* Đảm bảo không có phần tử nào tràn ra ngoài */
    position: relative;
    /* Để định vị chính xác nút xóa */
  }
  #reset .form-control{
    font-size: 18px;
  }
  #reset .vmt{
    font-size: 20px;
    background: orange;
    color: white;
  }
  .login{
    position: relative;
    left: 165px;
  }
  .login p{
    text-align: center;
  }
</style>