<?php
class hoadon
{
    function insertHoadon($makh)
    {
        $db = new connect();
        $date = new DateTime('now');
        $ngay = $date->format('Y-m-d');
        $query = "insert into hoadon(masohd,makh,ngaydat,tongtien,tinhtrang) values(Null,$makh,'$ngay',0,0)";
        $db->exec($query);
        $select = "select a.masohd from hoadon a order by a.masohd desc limit 1";
        $masohd = $db->getInstance($select);
        return $masohd[0];
    }
    function insertCTHoaDon($masohd, $mahh, $soluongmua, $mausac, $size, $thanhtien)
    {
        $db = new connect();
        $query = "insert into cthoadon(masohd,mahh,soluongmua,mausac,size,thanhtien)
            values ($masohd,$mahh,$soluongmua,'$mausac','$size',$thanhtien)";
        $db->exec($query);
    }
    function updateTongTien($masohd, $makh, $tongtien)
    {
        $db = new connect();
        $query = "UPDATE hoadon
        SET tongtien = (SELECT $tongtien + phiship FROM xacnhan WHERE masohd = $masohd and makh = $makh)
        WHERE masohd = $masohd and makh = $makh;";
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
    function TongTien($masohd)
    {
        $db = new connect();
        $select = "select a.masohd,a.tongtien, b.phiship,b.masohd
            from hoadon a,xacnhan b WHERE a.masohd=b.masohd and a.masohd=$masohd";
        $result = $db->getInstance($select);
        return $result;
    }
    function selectThongTinHoaDon($masohd)
    {
        $db = new connect();

        $select = "select DISTINCT a.tenhh,c.mausac,c.size,b.dongia,c.soluongmua, b.giamgia
            from hanghoa a, cthanghoa b, cthoadon c,sizegiay d
            WHERE a.mahh=b.idhanghoa and c.size=d.size and d.idsize=b.idsize and a.mahh=c.mahh and c.masohd=$masohd";
        $result = $db->getList($select);
        return $result;
    }

    function updateSoLuongTon($mahh, $soluongmua,$size)
    {
        $db = new connect();
        $query = "update cthanghoa set soluongton=soluongton-$soluongmua WHERE idhanghoa=$mahh and idsize=$size";
        $db->exec($query);
    }
    function insertXacNhan($hoten, $sodienthoai, $diachi, $thanhtoan, $phiship,$ghichu)
    {
        $db = new connect();
        $query = "insert into xacnhan(masohd,hoten,sodienthoai,diachi,thanhtoan,ghichu,phiship,tinhtrang)
            values (Null,'$hoten','$sodienthoai','$diachi','$thanhtoan','$ghichu',$phiship,0)";
        $db->exec($query);
    }
    function PhiShip()
    {
        $db = new connect();
        $select = "select * from xacnhan";
        $result = $db->getInstance($select);
        return $result;
    }

}
?>