<?php
    class nhanvien{
        function getAdmin($user,$pass)
        {
            $db=new connect();
            $select="select idnv,idcv,username,matkhau from nhanvien where username='$user' and matkhau='$pass'";
            $result=$db->getInstance($select);
            return $result;
        }
        function getQLNV($idnv)
    {
            $db=new connect();
            $select="select * from nhanvien a, chucvu b where a.idcv=b.idcv and a.idnv!=$idnv";
            $result=$db->getList($select);
            return $result;
        }
        function updateNV($idnv,$hoten,$dia,$username,$matkhau,$idcv)
        {
            $db=new connect();
            $query="update nhanvien
            set hoten='$hoten',dia='$dia',username='$username',matkhau=$matkhau,idcv=$idcv
            where idnv=$idnv";
            $result=$db->exec($query);
            return $result;
        }
        function deleteNV($idnv)
        {
            $db = new connect();
            $query = "DELETE FROM nhanvien WHERE idnv = '$idnv'";
            $result = $db->exec($query);
            return $result;
        }
        function insertNV($hoten,$dia,$username,$matkhau,$idcv)
        {
            $db=new connect();
            $query="insert into nhanvien(idnv,hoten,dia,username,matkhau,idcv) values (Null,'$hoten','$dia','$username',$matkhau,$idcv)";
            $result=$db->exec($query);
            return $result;
        }
        function getNhanVienID($id)
        {
            $db=new connect();
            $select="select * from nhanvien a, chucvu b where a.idnv=$id";
            $result=$db->getInstance($select);
            return $result;
        }
        public function getTimKiemNV($timkiem, $idnv)
        {
             $db = new connect();
             $select = "select * from nhanvien a,chucvu b where a.idcv=b.idcv and hoten LIKE '%$timkiem%' and a.idnv!=$idnv ORDER by idnv desc";
             $result = $db->getList($select);
             return $result;
        }
        function insertCV($idcv,$chucvu) {
            $db = new connect();
            $query = "insert into chucvu(idcv,chucvu) values ($idcv, '$chucvu')";
            $result = $db->exec($query);
            return $result;
        } 
        function getCV() {
            $db = new connect();
            $select = "select * from chucvu";
            $result = $db->getList($select);
            return $result;
        }
    }
?>