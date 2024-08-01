<?php
    class mau{
        function getMau() {
            $db = new connect();
            $select = "select * from mausac where trangthai=0";
            $result = $db->getList($select);
            return $result;
        }
        
        function insertMau($mausac) {
            $db = new connect();
            $query = "insert into mausac(Idmau, mausac,trangthai) values (NULL, '$mausac',0)";
            $result = $db->exec($query);
            return $result;
        }
        function delMau($id) {
            $db = new connect();
            $query = "update mausac set trangthai = 1 where Idmau=$id";
            $result = $db->exec($query);
            return $result;
        }
    }

?>