<?php
class hoadon
{
    function getNam()
    {
        $db = new connect();
        $select = "SELECT DISTINCT YEAR(ngaydat) AS nam FROM hoadon where tinhtrang=3 ORDER BY nam ASC";
        $result = $db->getList($select);
        return $result;

    }
    function getThang()
    {
        $db = new connect();
        $select = "SELECT DISTINCT YEAR(ngaydat) AS nam, MONTH(ngaydat) AS thang FROM hoadon where tinhtrang=3 ORDER BY nam ASC, thang ASC";
        $result = $db->getList($select);
        return $result;

    }
    function getNgay()
    {
        $db = new connect();
        $select = "SELECT DISTINCT YEAR(ngaydat) AS nam, MONTH(ngaydat) AS thang, DAY(ngaydat) AS ngay
            FROM hoadon where tinhtrang=3
            ORDER BY nam ASC, thang ASC, ngay ASC";
        $result = $db->getList($select);
        return $result;

    }
    function DonHangAll()
    {
        $db = new connect();
        $select = "SELECT COUNT(*) AS masohd FROM hoadon";
        $result = $db->getList($select);
        return $result;
    }
    function DonHangChuaXN()
    {
        $db = new connect();
        $select = "SELECT COUNT(*) AS masohd FROM hoadon where tinhtrang=0";
        $result = $db->getList($select);
        return $result;
    }
    function DonHangDaXN()
    {
        $db = new connect();
        $select = "SELECT COUNT(*) AS masohd FROM hoadon where tinhtrang=1";
        $result = $db->getList($select);
        return $result;
    }
    function DonHangDangGiao()
    {
        $db = new connect();
        $select = "SELECT COUNT(*) AS masohd FROM hoadon where tinhtrang=2";
        $result = $db->getList($select);
        return $result;
    }
}
?>