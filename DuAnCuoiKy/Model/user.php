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
    function checkEmail($email)
    {
        $db=new connect();
        $select="select * from khachhang a where a.email='$email'";
        $result=$db->getList($select);
        return $result;
    }
}
?>