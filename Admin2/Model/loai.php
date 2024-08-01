<?php
    class loai{
        function getLoai()
        {
            $db=new connect();
            $select="select * from loai where trangthai=0";
            $result=$db->getList($select);
            return $result;
        }
        function insertLoai($tenloai) {
            $db = new connect();
            $query = "insert into loai(maloai, tenloai, idmenu, trangthai) values (NULL, '$tenloai',0,0)";
            $result = $db->exec($query);
            return $result;
        }
        function delLoai($id) {
            $db = new connect();
            $query = "update loai set trangthai = 1 where maloai=$id";
            $result = $db->exec($query);
            return $result;
        }
        function updateLoai($id, $tenloai) {
            $db = new connect();
            $query = "update loai set tenloai = '$tenloai' where maloai=$id";
            $result = $db->exec($query);
            return $result;
        }
        function getLoaiID($id) {
            $db=new connect();
            $select="select * from loai where trangthai=0 and maloai = $id";
            $result=$db->getInstance($select);
            return $result;
        }
        function getTrangThai()
        {
            $db=new connect();
            $select="select * from xacnhan";
            $result=$db->getList($select);
            return $result;
        }
    }
?>