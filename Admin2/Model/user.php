<?php
class user{
    function getUser()
    {
        $db=new connect();
        $select="select * from khachhang";
        $result=$db->getList($select);
        return $result;
    }
    function getUserAllPage($start, $limit)
    {
        $db = new connect();
        $select = "SELECT * FROM khachhang ORDER BY makh DESC LIMIT $start, $limit";
        $result = $db->getList($select);
        return $result;
    }
    
    function deleteUser($makh)
    {
        $db = new connect();
        $query = "DELETE FROM khachhang WHERE makh = '$makh'";
        $result = $db->exec($query);
        return $result;
    }
    function getKhachHangID($id)
        {
            $db=new connect();
            $select="select * from khachhang where makh=$id";
            $result=$db->getInstance($select);
            return $result;
        }
    function updateKH($makh,$tenkh,$diachi,$username,$matkhau,$email,$sodienthoai)
    {
        $db=new connect();
        $query="update khachhang
        set tenkh='$tenkh',diachi='$diachi',username='$username',matkhau='$matkhau', email='$email', sodienthoai='$sodienthoai'
        where makh=$makh";
        $result=$db->exec($query);
        return $result;
    }
    public function getTimKiemKH($timkiem)
    {
         $db = new connect();
         $select = "select * from khachhang where tenkh LIKE '%$timkiem%' ORDER by makh desc";
         $result = $db->getList($select);
         return $result;
    }
}
?>