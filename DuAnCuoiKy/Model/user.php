<?php
class user{
    // phương thức kiểm tra user và email có tồn tại hay không
    function checkUser($user,$email)
    {
        $db=new connect();
        $select="select a.username,a.email from khachhang a
        WHERE a.username='$user' or a.email='$email'";
        $result=$db->getList($select);
        return $result;
    }
    // thực hiện insert vào database
    function insertKhachHang($tenkh,$username,$matkhau,$email,$diachi,$sodt){
        $db=new connect();
        $query="INSERT INTO khachhang (makh, tenkh,username,matkhau,email,diachi,sodienthoai)
        VALUES (NULL, '$tenkh', '$username', '$matkhau', '$email', '$diachi', '$sodt')";
        // exec
        $result=$db->exec($query);
        return $result;
    }
    // phương thức đăng nhập
    function logKhachHang($user,$pass)
    {
        $db=new connect();
        $select="select a.makh,a.tenkh,a.username from khachhang a where a.username='$user' and a.matkhau='$pass'";
        $result=$db->getInstance($select);
        return $result;// trả về array
    }
    function selectThongTinKH($makh)
    {
        $db = new connect();
        $select = "select *
            from khachhang where makh=$makh";
        $result = $db->getInstance($select);
        return $result;
    }
    function getUser($makh)
    {
        $db = new connect();
        $select = "select * from khachhang a
        WHERE a.makh='$makh'";
        $result = $db->getInstance($select);
        return $result;
    }
    function DoiMatKhau($makh, $passmoi)
    {
        $db = new connect();
        $query = "update khachhang set matkhau='$passmoi' where makh=$makh";
        $db->exec($query);
    }
    function DoiUser($makh, $tenkh,$username,$diachi,$sodienthoai,$email)
    {
        $db = new connect();
        $query = "update khachhang set tenkh='$tenkh', username='$username', diachi='$diachi', sodienthoai='$sodienthoai', email='$email' where makh=$makh";
        $db->exec($query);
    }
    function checkEmail($email)
    {
        $db = new connect();
        $select = "select * from khachhang a where a.email='$email'";
        $result = $db->getList($select);
        return $result; // trả về array
    }
    
    function updateEmail($email,$matkhau)
    {
        $db = new connect();
        $query = "update khachhang set matkhau='$matkhau' where email='$email'";
        $result=$db->exec($query);
        return $result;
    }
    

}
?>