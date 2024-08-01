<?php
class lichsu{
    // phương thức kiểm tra user và email có tồn tại hay không
    
    function LichSu($makh)
    {
        $db = new connect();
        $select = "select distinct a.masohd,d.tenhh,a.ngaydat,a.tongtien,c.tinhtrang
        from hoadon a, cthoadon b, hanghoa d, xacnhan c
        where a.masohd=b.masohd and b.mahh=d.mahh and a.masohd=c.masohd and a.ngaydat >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) and a.makh=$makh group by a.masohd order by a.masohd desc";
        $result = $db->getList($select);
        return $result;
    }
    function getHangHoaCT($masohd){
        $db=new connect();
        $select="SELECT * FROM hoadon a, cthoadon b, hanghoa c, cthanghoa d, xacnhan e, sizegiay f where a.masohd=b.masohd and b.size=f.size and f.idsize=d.idsize and e.masohd=a.masohd and b.mahh=c.mahh and b.mahh=d.idhanghoa and a.masohd=$masohd ORDER BY a.masohd DESC";
        $result=$db->getList($select);
        return $result;//trả về đúng 1 row dạng array(mahh:24,tenhh: giày...)
    }
    
    

}
?>