<?php
class qlhoadon
{
    function getQLHD()
    {
        $db = new connect();
        $select = "select * from hoadon a, cthoadon b where a.masohd=b.masohd";
        $result = $db->getList($select);
        return $result;
    }
    function getQLHDAllPage($start, $limit)
    {
        $db = new connect();
        $select = "SELECT * FROM hoadon a, cthoadon b, hanghoa c, xacnhan d where a.masohd=d.masohd and a.masohd=b.masohd and b.mahh=c.mahh  group by a.masohd ORDER BY b.masohd desc LIMIT " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }
    function getHangHoaCT($masohd)
    {
        $db = new connect();
        $select = "SELECT * FROM hoadon a, cthoadon b, hanghoa c, cthanghoa d, xacnhan e, sizegiay f where a.masohd=b.masohd and b.size=f.size and f.idsize=d.idsize and e.masohd=a.masohd and b.mahh=c.mahh and b.mahh=d.idhanghoa and a.masohd=$masohd ORDER BY a.masohd DESC";
        $result = $db->getList($select);
        return $result;//trả về đúng 1 row dạng array(mahh:24,tenhh: giày...)
    }

    function updateTinhTrang($tinhtrang, $masohd)
    {
        $db = new connect();
        $query = "BEGIN;
        UPDATE xacnhan SET tinhtrang = $tinhtrang WHERE masohd = $masohd;
        UPDATE hoadon SET tinhtrang = $tinhtrang WHERE masohd = $masohd;
        COMMIT; ";
        $db->exec($query);
    }
    function ThongTinKH($masohd)
    {
        $db = new connect();
        $select = "select a.masohd,c.email, b.hoten,b.diachi,b.sodienthoai,a.ngaydat, b.masohd,b.ghichu
            from hoadon a,xacnhan b,khachhang c WHERE a.makh=c.makh and a.masohd=b.masohd and  a.masohd=$masohd";
        $result = $db->getInstance($select);
        return $result;
    }

    function getChuaXN()
    {
        $db = new connect();
        $select = "SELECT * FROM hoadon a, cthoadon b, hanghoa c, xacnhan d where a.masohd=d.masohd and a.masohd=b.masohd and b.mahh=c.mahh and d.tinhtrang=0  group by a.masohd ORDER BY a.masohd desc ";
        $result = $db->getList($select);
        return $result;
    }

    function getDaXN()
    {
        $db = new connect();
        $select = "SELECT * FROM hoadon a, cthoadon b, hanghoa c, xacnhan d where a.masohd=d.masohd and a.masohd=b.masohd and b.mahh=c.mahh and d.tinhtrang=1  group by a.masohd ORDER BY b.masohd desc ";
        $result = $db->getList($select);
        return $result;
    }

    function getDaHuy()
    {
        $db = new connect();
        $select = "SELECT * FROM hoadon a, cthoadon b, hanghoa c, xacnhan d where a.masohd=d.masohd and a.masohd=b.masohd and b.mahh=c.mahh and d.tinhtrang=-1  group by a.masohd ORDER BY b.masohd desc ";
        $result = $db->getList($select);
        return $result;
    }
    function getHoanThanh()
    {
        $db = new connect();
        $select = "SELECT * FROM hoadon a, cthoadon b, hanghoa c, xacnhan d where a.masohd=d.masohd and a.masohd=b.masohd and b.mahh=c.mahh and d.tinhtrang=3  group by a.masohd ORDER BY b.masohd desc ";
        $result = $db->getList($select);
        return $result;
    }
    function getDangGiao()
    {
        $db = new connect();
        $select = "SELECT * FROM hoadon a, cthoadon b, hanghoa c, xacnhan d where a.masohd=d.masohd and a.masohd=b.masohd and b.mahh=c.mahh and d.tinhtrang= 2 group by a.masohd ORDER BY b.masohd desc ";
        $result = $db->getList($select);
        return $result;
    }
    function getThongKeKhachHang()
    {
        $db = new connect();
        $query = "SELECT b.tenkh, SUM(a.tongtien) AS tongtien, a.makh
                    FROM hoadon a
                    INNER JOIN khachhang b ON a.makh = b.makh
                    WHERE a.tinhtrang = 3
                    GROUP BY a.makh, b.tenkh
                    ORDER BY tongtien DESC";
        $result = $db->getList($query);
        return $result;
    }

}
?>