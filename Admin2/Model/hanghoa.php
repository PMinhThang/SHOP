<?php
class hanghoa
{
    function getHangHoa()
    {
        $db = new connect();
        $select = "select * from hanghoa";
        $result = $db->getList($select);
        return $result;
    }
    public function getTimKiem($timkiem)
    {
        $db = new connect();
        $select = "select a.*,b.*,c.idsize,c.size, d.Idmau,d.mausac from hanghoa a, cthanghoa b, sizegiay c,mausac d where a.mahh=b.idhanghoa and b.idmau=d.Idmau and b.idsize=c.Idsize and a.tenhh LIKE '%$timkiem%' group by a.mahh ORDER by a.mahh desc";
        $result = $db->getList($select);
        return $result;
    }
    function insertHangHoa($tenhh, $maloai, $ngaylap, $mota)
    {
        $db = new connect();
        $query = "insert into hanghoa(mahh,tenhh,maloai,soluotxem,ngaylap,mota,trangthai,yeuthich) values (Null,'$tenhh',$maloai,0,'$ngaylap','$mota',0,0)";
        $result = $db->exec($query);
        return $result;
    }
    function insertCTHangHoa($idhanghoa, $idmau, $idsize, $dongia, $soluongton, $hinh, $giamgia)
    {
        $db = new connect();
        $query = "insert into cthanghoa(idhanghoa, idmau, idsize, dongia, soluongton, hinh, giamgia) values ($idhanghoa,$idmau,$idsize,$dongia,$soluongton,'$hinh',$giamgia)";
        $result = $db->exec($query);
        return $result;
    }
    // phương thức lấy thông tin 1 món hàng
    function getHangHoaID($id,$idsize)
    {
        $db = new connect();
        $select = "select * from hanghoa a, cthanghoa b where mahh=$id and a.mahh=b.idhanghoa and b.idsize=$idsize";
        $result = $db->getInstance($select);
        return $result;
    }
    function getHangHoaID2($id)
    {
        $db = new connect();
        $select = "select * from hanghoa a, cthanghoa b, mausac c where mahh=$id and b.idmau=c.Idmau and a.mahh=b.idhanghoa";
        $result = $db->getInstance($select);
        return $result;
    }
    // phương thức update
    function updateCTHangHoa($mahh,$dongia, $giamgia, $soluongton, $hinh, $idsize)
    {
        $db = new connect();
        $query = "update cthanghoa b
        set b.dongia=$dongia , b.giamgia=$giamgia, b.soluongton=$soluongton,b.hinh='$hinh'
        where b.idhanghoa=$mahh  and b.idsize=$idsize";
        $result = $db->exec($query);
        return $result;
    }
    function updateHangHoa($mahh, $tenhh, $maloai, $mota,$idmau)
    {
        $db = new connect();
        $query = "update hanghoa a, cthanghoa b
        set a.tenhh='$tenhh',a.maloai=$maloai,a.mota='$mota',b.idmau=$idmau
        where a.mahh=$mahh and a.mahh=b.idhanghoa";
        $result = $db->exec($query);
        return $result;
    }
    function deleteHangHoa($mahh)
    {
        $db = new connect();
        $query = "DELETE hanghoa, cthanghoa 
                  FROM hanghoa 
                  LEFT JOIN cthanghoa ON hanghoa.mahh = cthanghoa.idhanghoa 
                  WHERE hanghoa.mahh = $mahh";
        $result = $db->exec($query);
        return $result;
    }


    function getMau()
    {
        $db = new connect();
        $select = "select * from mausac";
        $result = $db->getList($select);
        return $result;
    }
    function getSize()
    {
        $db = new connect();
        $select = "select * from sizegiay";
        $result = $db->getList($select);
        return $result;
    }
    // thống kê
    function getThongKe($nam = null) {
        $db = new connect();
        $condition = "";

        if ($nam) {
            $condition = "AND YEAR(c.ngaydat) = $nam and c.tinhtrang=3";
        }

        $query = "SELECT b.tenhh, SUM(a.soluongmua) AS soluong,YEAR(c.ngaydat) AS nam
                  FROM cthoadon a, hanghoa b, hoadon c
                  WHERE a.mahh = b.mahh AND a.masohd = c.masohd AND c.tinhtrang = 3 $condition
                  GROUP BY b.tenhh
                  ORDER BY c.ngaydat";
        $result = $db->getList($query);
        return $result;
    }
    function getThongKeNam($nam = null) {
        $db = new connect();
        $condition = "";

        if ($nam) {
            $condition = "AND YEAR(c.ngaydat) = $nam and c.tinhtrang=3";
        }

        $query = "SELECT b.tenhh, SUM(a.soluongmua) AS soluong, YEAR(c.ngaydat) AS nam
                  FROM cthoadon a, hanghoa b, hoadon c
                  WHERE a.mahh = b.mahh AND a.masohd = c.masohd AND c.tinhtrang = 3 $condition
                  GROUP BY YEAR(c.ngaydat)
                  ORDER BY YEAR(c.ngaydat)";
        $result = $db->getList($query);
        return $result;
    }


    function getThongKeT($nam = null, $thang = null) {
        $db = new connect();
        $condition = "";

        if ($nam && $thang) {
            $condition = "AND YEAR(c.ngaydat) = $nam AND MONTH(c.ngaydat) = $thang and c.tinhtrang=3";
        }

        $query = "SELECT b.tenhh, SUM(a.soluongmua) AS soluong, c.ngaydat
                  FROM cthoadon a, hanghoa b, hoadon c
                  WHERE a.mahh = b.mahh AND a.masohd = c.masohd AND c.tinhtrang = 3 $condition
                  GROUP BY b.tenhh
                  ORDER BY c.ngaydat";
        $result = $db->getList($query);
        return $result;
    }
    function getThongKeThang($nam = null, $thang = null) {
        $db = new connect();
        $condition = "";

        if ($nam && $thang) {
            $condition = "AND YEAR(c.ngaydat) = $nam AND MONTH(c.ngaydat) = $thang";
        } elseif ($nam) {
            $condition = "AND YEAR(c.ngaydat) = $nam";
        }

        $query = "SELECT b.tenhh, SUM(a.soluongmua) AS soluong, DATE_FORMAT(c.ngaydat, '%m/%Y') AS thang
                  FROM cthoadon a, hanghoa b, hoadon c
                  WHERE a.mahh = b.mahh AND a.masohd = c.masohd AND c.tinhtrang = 3 $condition
                  GROUP BY YEAR(c.ngaydat), MONTH(c.ngaydat)
                  ORDER BY YEAR(c.ngaydat), MONTH(c.ngaydat)";
        $result = $db->getList($query);
        return $result;
    }
    

    // function getThongKeN($nam = 0, $thang = 0, $ngay = 0)
    // {
    //     $db = new connect();
    //     $condition = "";
    //     if ($nam == 0) {
    //         $select = "SELECT b.tenhh,sum(a.soluongmua)as soluong FROM cthoadon a,hanghoa b,hoadon c WHERE a.mahh=b.mahh and a.masohd=c.masohd and c.tinhtrang=3 GROUP by b.tenhh";
    //     } else {
    //         $select = "SELECT b.tenhh, SUM(a.soluongmua) AS soluong, c.ngaydat
    //             FROM cthoadon a, hanghoa b, hoadon c
    //             WHERE a.mahh = b.mahh AND a.masohd = c.masohd AND YEAR(c.ngaydat) = '$nam' AND MONTH(c.ngaydat) = '$thang' AND DAY(c.ngaydat) = '$ngay' and c.tinhtrang=3
    //             GROUP BY b.tenhh";
    //     }
    //     $result = $db->getList($select);
    //     return $result;
    // }
    function getThongKeN($nam = null, $thang = null, $ngay = null) {
        $db = new connect();
        $condition = "";

        if ($nam && $thang && $ngay) {
            $condition = "AND YEAR(c.ngaydat) = $nam AND MONTH(c.ngaydat) = $thang AND DAY(c.ngaydat) = $ngay and c.tinhtrang=3";
        }

        $query = "SELECT b.tenhh, SUM(a.soluongmua) AS soluong, c.ngaydat
                  FROM cthoadon a, hanghoa b, hoadon c
                  WHERE a.mahh = b.mahh AND a.masohd = c.masohd AND c.tinhtrang = 3 $condition
                  GROUP BY b.tenhh
                  ORDER BY c.ngaydat";
        $result = $db->getList($query);
        return $result;
    }
    function getThongKeNgay($nam = null, $thang = null, $ngay = null) {
        $db = new connect();
        $condition = "";
    
        if ($nam && $thang && $ngay) {
            $condition = "AND YEAR(c.ngaydat) = $nam AND MONTH(c.ngaydat) = $thang AND DAY(c.ngaydat) = $ngay";
        } elseif ($nam && $thang) {
            $condition = "AND YEAR(c.ngaydat) = $nam AND MONTH(c.ngaydat) = $thang";
        } elseif ($nam) {
            $condition = "AND YEAR(c.ngaydat) = $nam";
        }
    
        $query = "SELECT b.tenhh, SUM(a.soluongmua) AS soluong, c.ngaydat
                  FROM cthoadon a, hanghoa b, hoadon c
                  WHERE a.mahh = b.mahh AND a.masohd = c.masohd AND c.tinhtrang = 3 $condition
                  GROUP BY c.ngaydat
                  ORDER BY c.ngaydat";
        $result = $db->getList($query);
        return $result;
    }
    function getThongKeDH() {
        $db = new connect();
        $query = "SELECT COUNT(c.masohd) AS soluong,c.tinhtrang
                  FROM hoadon c
                  WHERE c.tinhtrang IN (-1, 3)
                  GROUP BY c.tinhtrang
                  ORDER BY c.tinhtrang";
        $result = $db->getList($query);
        return $result;
    }
    function getThongKeDoanhThu($nam = null, $thang = null) {
        $db = new connect();
        $condition = "";

        if ($nam && $thang) {
            $condition = "AND YEAR(c.ngaydat) = $nam AND MONTH(c.ngaydat) = $thang";
        } elseif ($nam) {
            $condition = "AND YEAR(c.ngaydat) = $nam";
        }

        $query = "SELECT b.tenhh, SUM(c.tongtien) AS soluong, DATE_FORMAT(c.ngaydat, '%m/%Y') AS thang
                  FROM cthoadon a, hanghoa b, hoadon c
                  WHERE a.mahh = b.mahh AND a.masohd = c.masohd AND c.tinhtrang = 3 $condition
                  GROUP BY YEAR(c.ngaydat), MONTH(c.ngaydat)
                  ORDER BY YEAR(c.ngaydat), MONTH(c.ngaydat)";
        $result = $db->getList($query);
        return $result;
    }
    function getDoanhThuNam($nam = null) {
        $db = new connect();
        $condition = "";

        if ($nam) {
            $condition = "AND YEAR(c.ngaydat) = $nam and c.tinhtrang=3";
        }

        $query = "SELECT b.tenhh, SUM(c.tongtien) AS soluong, YEAR(c.ngaydat) AS nam
                  FROM cthoadon a, hanghoa b, hoadon c
                  WHERE a.mahh = b.mahh AND a.masohd = c.masohd AND c.tinhtrang = 3 $condition
                  GROUP BY YEAR(c.ngaydat)
                  ORDER BY YEAR(c.ngaydat)";
        $result = $db->getList($query);
        return $result;
    }
    function getHangHoaAllPage($start, $limit)
    {
        $db = new connect();
        $select = "select a.*,b.*,c.idsize,c.size, d.Idmau,d.mausac from hanghoa a, cthanghoa b, sizegiay c, mausac d where a.mahh=b.idhanghoa and d.Idmau=b.idmau and b.idsize=c.Idsize group by a.mahh ORDER by a.mahh DESC limit " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }
    function getIDNew()
    {
        $db = new connect();
        $select = "SELECT mahh
            FROM hanghoa
            ORDER BY mahh DESC
            LIMIT 1;
            ";
        $result = $db->getInstance($select);
        return $result[0];
    }
    function getHangHoaAllTon($start, $limit)
    {
        $db = new connect();
        $select = "select * from hanghoa a, cthanghoa b where a.mahh=b.idhanghoa and b.soluongton>0 ORDER by a.mahh DESC limit " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }
    function updateTrangThai($trangthai,$mahh)
    {
        $db = new connect();
        $query = "update hanghoa set trangthai=$trangthai WHERE mahh=$mahh;";
        $db->exec($query);
    }
    function getHangHoaCT($mahh){
        $db=new connect();
        $select = "select a.*,b.*,c.Idsize,c.size,d.Idmau,d.mausac from hanghoa a, cthanghoa b, sizegiay c,mausac d where a.mahh=b.idhanghoa and d.Idmau=b.idmau and b.idsize=c.Idsize and a.mahh=$mahh ORDER by a.mahh DESC";
        $result=$db->getList($select); 
        return $result;//trả về đúng 1 row dạng array(mahh:24,tenhh: giày...)
    }
    function deleteHangHoaCT($idhanghoa,$idsize,$idmau)
    {
        $db = new connect();
        $query = "DELETE FROM cthanghoa WHERE idhanghoa = $idhanghoa AND idsize = $idsize and idmau=$idmau";
        $result = $db->exec($query);
        return $result;
    }

}
?>