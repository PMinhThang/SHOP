<?php
    class cthanghoa{
        function insertCTHangHoa($idhanghoa,$idmau, $idsize,$dongia, $soluongton,$hinh,$giamgia)
    {
        $db = new connect();
        $query = "insert into cthanghoa(idhanghoa, idmau, idsize, dongia, soluongton, hinh, giamgia) values ($idhanghoa,$idmau,$idsize,$dongia,$soluongton,'$hinh',$giamgia)";
        $result = $db->exec($query);
        return $result;
    }
    }
?>