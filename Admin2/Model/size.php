<?php
    class size{
        function getSize() {
            $db = new connect();
            $select = "select * from sizegiay where trangthai=0";
            $result = $db->getList($select);
            return $result;
        }

        function insertSize($size) {
            $db = new connect();
            $query = "insert into sizegiay(Idsize,size,trangthai) values (NULL, '$size',0)";
            $result = $db->exec($query);
            return $result;
        }
       
        function delSize($id) {
            $db = new connect();
            $query = "update sizegiay set trangthai = 1 where Idsize=$id";
            $result = $db->exec($query);
            return $result;
        }
        function getSizeHH($mahh)
    {
        $db = new connect();
        $select = "SELECT DISTINCT sizegiay.Idsize, sizegiay.size
        FROM sizegiay
        LEFT JOIN cthanghoa ON cthanghoa.idsize = sizegiay.Idsize AND cthanghoa.idhanghoa = $mahh
        WHERE cthanghoa.idsize IS NULL and trangthai=0";
        $result = $db->getList($select);
        return $result;
    }
    }

?>