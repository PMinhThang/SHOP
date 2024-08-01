<?php
class hanghoa
{
    function getHangHoaNew()
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "select a.mahh,a.tenhh,b.soluongton,a.soluotxem,b.hinh,b.dongia,b.giamgia ,a.trangthai,a.yeuthich
            from hanghoa a,cthanghoa b
            WHERE a.mahh=b.idhanghoa and a.trangthai=0 group by a.mahh ORDER by a.mahh DESC limit 8";
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getList thuộc connect
        $result = $db->getList($select);
        return $result;//lấy đc 8 sản phẩm mới nhất
    }

    function getHangHoaSale()
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "select a.mahh,a.tenhh,a.soluotxem, b.soluongton, b.hinh,b.dongia,c.mausac, b.giamgia ,a.trangthai,a.yeuthich
            from hanghoa a,cthanghoa b, mausac c 
            WHERE a.mahh=b.idhanghoa AND b.idmau=c.idmau and giamgia!=0 and a.trangthai=0 group by a.mahh ORDER by a.mahh DESC limit 8";
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getList thuộc connect
        $result = $db->getList($select);
        return $result;
    }
    function getHangHoaAll()
    {
        // b1: kết nối với database
        $db = new connect();
        //bước 2 cần lấy gì thì truy vấn cái đó
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,c.mausac, b.giamgia ,a.trangthai
            from hanghoa a,cthanghoa b, mausac c 
            WHERE a.mahh=b.idhanghoa AND b.idmau=c.idmau and a.trangthai=0 group by a.mahh ORDER by a.mahh DESC ";
        //b3 ai thực thi câu lệnh select
        $result = $db->getList($select);
        return $result;
    }
    function getHangHoaAllSale()
    {
        // b1: kết nối với database
        $db = new connect();
        //bước 2 cần lấy gì thì truy vấn cái đó
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.soluongton,b.hinh,b.dongia,c.mausac, b.giamgia ,a.trangthai
            from hanghoa a,cthanghoa b, mausac c 
            WHERE a.mahh=b.idhanghoa AND b.idmau=c.idmau and b.giamgia!=0 and a.trangthai=0 group by a.mahh ORDER by a.mahh DESC ";
        //b3 ai thực thi câu lệnh select
        $result = $db->getList($select);
        return $result;
    }
    function getAllSale($start, $limit)
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.soluongton,b.hinh,b.dongia,c.mausac, b.giamgia,a.trangthai,a.yeuthich 
            from hanghoa a,cthanghoa b, mausac c 
            WHERE a.mahh=b.idhanghoa AND b.idmau=c.idmau AND b.giamgia!=0 and a.trangthai=0 group by a.mahh  ORDER by a.mahh DESC limit " . $start . "," . $limit;
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getInstance, maf 2 pt nằmf trong connect
        // class connect, cần tạo ddtuong gọi pt
        $result = $db->getList($select);
        return $result;//lấy đc 14 sản phẩm mới nhất
    }
    // function getCountHangHoaAll(){
    //     // b1: kết nối với database
    //     $db=new connect();
    //     //bước 2 cần lấy gì thì truy vấn cái đó
    //     $select="select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,c.mausac, b.giamgia 
    //     from hanghoa a,cthanghoa b, mausac c 
    //     WHERE a.mahh=b.idhanghoa AND b.idmau=c.idmau and giamgia=0 ORDER by a.mahh DESC ";
    //     //b3 ai thực thi câu lệnh select
    //     $result=$db->getInstrance($select);
    //     return $result[0];
    // }
    function getHangHoaAllPage($start, $limit)
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.soluongton,b.hinh,b.dongia,c.mausac, b.giamgia,a.trangthai,a.yeuthich
            from hanghoa a,cthanghoa b, mausac c 
            WHERE a.mahh=b.idhanghoa AND b.idmau=c.idmau and a.trangthai=0 group by a.mahh ORDER by a.mahh DESC limit " . $start . "," . $limit;
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getInstance, maf 2 pt nằmf trong connect
        // class connect, cần tạo ddtuong gọi pt
        $result = $db->getList($select);
        return $result;//lấy đc 14 sản phẩm mới nhất
    }
    function getHangHoaId2($id, $mausac, $size)
    {
        $db = new connect();
        $select = "select DISTINCT a.mahh,a.tenhh,a.mota,b.dongia, b.giamgia, b.soluongton,a.soluotxem
            from hanghoa a,cthanghoa b
            WHERE a.mahh=b.idhanghoa and b.idmau=$mausac and b.idsize=$size and a.mahh=$id";
        $result = $db->getInstance($select);
        return $result;//trả về đúng 1 row dạng array(mahh:24,tenhh: giày...)
    }
    function getHangHoaId($id)
    {
        $db = new connect();
        $select = "select DISTINCT a.mahh,a.tenhh,a.mota,b.dongia, b.giamgia, b.soluongton,a.soluotxem
            from hanghoa a,cthanghoa b
            WHERE a.mahh=b.idhanghoa and a.mahh=$id";
        $result = $db->getInstance($select);
        $query = "update hanghoa set soluotxem=soluotxem+1 WHERE mahh=$id;";
        $db->exec($query);
        return $result;//trả về đúng 1 row dạng array(mahh:24,tenhh: giày...)
    }
    // phương thức lấy thông tin màu trên một sản phẩm
    function getHangHoaMau($id)
    {
        $db = new connect();
        $select = "select DISTINCT b.idmau,b.mausac
            from cthanghoa a, mausac b
            WHERE a.idmau=b.idmau and a.idhanghoa=$id";
        $result = $db->getList($select);
        return $result;
    }
    function getHangHoaSize($id)
    {
        $db = new connect();
        $select = "select DISTINCT b.Idsize,b.size, a.dongia, a.giamgia,a.soluongton
            from cthanghoa a, sizegiay b
            WHERE a.idsize=b.Idsize and a.idhanghoa=$id";
        $result = $db->getList($select);
        return $result;
    }
    // phương thức để lấy hình của 1 id
    function getHangHoaHinh($id)
    {
        $db = new connect();
        $select = "select DISTINCT a.hinh
            from cthanghoa a
            WHERE a.idhanghoa=$id";
        $result = $db->getList($select);
        return $result;
    }
    // lấy hình đựa vào id,mau,size
    function getHangHoaHinhMauSize($id, $mau, $size)
    {
        $db = new connect();
        $select = "select DISTINCT a.hinh
            from cthanghoa a,mausac b, sizegiay c
            Where a.idmau=b.idmau and a.idsize = c.idsize and a.idhanghoa=$id and b.idmau=$mau and c.idsize=$size";
        $result = $db->getInstance($select);
        return $result;
    }
    // phương thức lấy tên màu thông qua id
    function getHangHoaMauIdMau($idmau)
    {
        $db = new connect();
        $select = "select a.mausac from mausac a 
            where a.idmau=$idmau";
        $result = $db->getInstance($select);
        return $result;
    }
    function getHangHoaSizeIdSize($Idsize)
    {
        $db = new connect();
        $select = "select a.size from sizegiay a 
            where a.Idsize=$Idsize";
        $result = $db->getInstance($select);
        return $result;
    }
    function getSLT()
    {
        $db = new connect();
        $select = "select a.soluongton from cthanghoa a, sizegiay b
            WHERE a.idsize=b.Idsize";
        $result = $db->getList($select);
        return $result;
    }

    public function getTimKiem($timkiem)
    {
        $db = new connect();
        $select = "select DISTINCT a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,b.soluongton,b.giamgia,a.yeuthich
             from hanghoa a,cthanghoa b
             WHERE a.mahh=b.idhanghoa and a.tenhh LIKE '%$timkiem%' group by a.mahh ORDER by a.mahh desc";
        $result = $db->getList($select);
        return $result;
    }


    function getOP()
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "SELECT a.mahh, a.tenhh, a.soluotxem, b.soluongton, b.hinh, b.dongia, c.mausac 
        FROM hanghoa a, cthanghoa b, mausac c 
        WHERE a.mahh = b.idhanghoa AND b.idmau = c.idmau AND a.maloai = '1' group by a.mahh
        ORDER BY a.mahh DESC ";
        //   $select = "SELECT a.mahh, a.tenhh, a.soluotxem, b.soluongton, b.hinh, b.dongia, c.mausac 
        //   FROM hanghoa a, cthanghoa b, mausac c 
        //   WHERE a.mahh = b.idhanghoa AND b.idmau = c.idmau 
        //         AND a.maloai IN ('1', '2', '3') 
        //   ORDER BY a.mahh DESC";

        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getList thuộc connect
        $result = $db->getList($select);
        return $result;//lấy đc 8 sản phẩm mới nhất
    }
    function getAOP($start, $limit)
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.soluongton,b.hinh,b.dongia,c.mausac, b.giamgia,a.trangthai,a.yeuthich
            from hanghoa a,cthanghoa b, mausac c 
            WHERE a.mahh=b.idhanghoa AND b.idmau=c.idmau AND a.trangthai=0 and a.maloai = '1' group by a.mahh  ORDER by a.mahh DESC limit " . $start . "," . $limit;
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getInstance, maf 2 pt nằmf trong connect
        // class connect, cần tạo ddtuong gọi pt
        $result = $db->getList($select);
        return $result;//lấy đc 14 sản phẩm mới nhất
    }

    function getNAR()
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "SELECT a.mahh, a.tenhh, a.soluotxem, b.soluongton, b.hinh, b.dongia, c.mausac 
            FROM hanghoa a, cthanghoa b, mausac c 
            WHERE a.mahh = b.idhanghoa AND b.idmau = c.idmau AND a.maloai = '2' group by a.mahh
            ORDER BY a.mahh DESC ";
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getList thuộc connect
        $result = $db->getList($select);
        return $result;//lấy đc 8 sản phẩm mới nhất
    }
    function getANAR($start, $limit)
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.soluongton,b.hinh,b.dongia,c.mausac, b.giamgia,a.trangthai,a.yeuthich
                from hanghoa a,cthanghoa b, mausac c 
                WHERE a.mahh=b.idhanghoa AND b.idmau=c.idmau AND a.trangthai=0 and a.maloai = '2' group by a.mahh  ORDER by a.mahh DESC limit " . $start . "," . $limit;
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getInstance, maf 2 pt nằmf trong connect
        // class connect, cần tạo ddtuong gọi pt
        $result = $db->getList($select);
        return $result;//lấy đc 14 sản phẩm mới nhất
    }

    function getDB()
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "SELECT a.mahh, a.tenhh, a.soluotxem, b.soluongton, b.hinh, b.dongia, c.mausac 
            FROM hanghoa a, cthanghoa b, mausac c 
            WHERE a.mahh = b.idhanghoa AND b.idmau = c.idmau AND a.maloai = '3' group by a.mahh
            ORDER BY a.mahh DESC ";
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getList thuộc connect
        $result = $db->getList($select);
        return $result;//lấy đc 8 sản phẩm mới nhất
    }
    function getADB($start, $limit)
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.soluongton,b.hinh,b.dongia,c.mausac, b.giamgia,a.trangthai,a.yeuthich
                from hanghoa a,cthanghoa b, mausac c 
                WHERE a.mahh=b.idhanghoa AND b.idmau=c.idmau AND a.trangthai=0 and a.maloai = '3'  group by a.mahh ORDER by a.mahh DESC limit " . $start . "," . $limit;
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getInstance, maf 2 pt nằmf trong connect
        // class connect, cần tạo ddtuong gọi pt
        $result = $db->getList($select);
        return $result;//lấy đc 14 sản phẩm mới nhất
    }

    function getJK()
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "SELECT a.mahh, a.tenhh, a.soluotxem, b.soluongton, b.hinh, b.dongia, c.mausac 
            FROM hanghoa a, cthanghoa b, mausac c 
            WHERE a.mahh = b.idhanghoa AND b.idmau = c.idmau AND a.maloai = '4' group by a.mahh
            ORDER BY a.mahh DESC ";
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getList thuộc connect
        $result = $db->getList($select);
        return $result;//lấy đc 8 sản phẩm mới nhất
    }
    function getAJK($start, $limit)
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.soluongton,b.hinh,b.dongia,c.mausac, b.giamgia,a.trangthai,a.yeuthich
                from hanghoa a,cthanghoa b, mausac c 
                WHERE a.mahh=b.idhanghoa AND b.idmau=c.idmau AND a.trangthai=0 and a.maloai = '4' group by a.mahh  ORDER by a.mahh DESC limit " . $start . "," . $limit;
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getInstance, maf 2 pt nằmf trong connect
        // class connect, cần tạo ddtuong gọi pt
        $result = $db->getList($select);
        return $result;//lấy đc 14 sản phẩm mới nhất
    }

    function getKnY()
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "SELECT a.mahh, a.tenhh, a.soluotxem, b.soluongton, b.hinh, b.dongia, c.mausac 
            FROM hanghoa a, cthanghoa b, mausac c 
            WHERE a.mahh = b.idhanghoa AND b.idmau = c.idmau AND a.maloai = '5' group by a.mahh
            ORDER BY a.mahh DESC ";
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getList thuộc connect
        $result = $db->getList($select);
        return $result;//lấy đc 8 sản phẩm mới nhất
    }
    function getAKnY($start, $limit)
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.soluongton,b.hinh,b.dongia,c.mausac, b.giamgia,a.trangthai,a.yeuthich
                from hanghoa a,cthanghoa b, mausac c 
                WHERE a.mahh=b.idhanghoa AND b.idmau=c.idmau AND a.trangthai=0 and a.maloai = '5' group by a.mahh  ORDER by a.mahh DESC limit " . $start . "," . $limit;
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getInstance, maf 2 pt nằmf trong connect
        // class connect, cần tạo ddtuong gọi pt
        $result = $db->getList($select);
        return $result;//lấy đc 14 sản phẩm mới nhất
    }

    function getAoT()
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "SELECT a.mahh, a.tenhh, a.soluotxem, b.soluongton, b.hinh, b.dongia, c.mausac 
            FROM hanghoa a, cthanghoa b, mausac c 
            WHERE a.mahh = b.idhanghoa AND b.idmau = c.idmau AND a.maloai = '6' group by a.mahh
            ORDER BY a.mahh DESC ";
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getList thuộc connect
        $result = $db->getList($select);
        return $result;//lấy đc 8 sản phẩm mới nhất
    }


    function getAAoT($start, $limit)
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.soluongton,b.hinh,b.dongia,c.mausac, b.giamgia,a.trangthai,a.yeuthich
                from hanghoa a,cthanghoa b, mausac c 
                WHERE a.mahh=b.idhanghoa AND b.idmau=c.idmau AND a.trangthai=0 and a.maloai = '6' group by a.mahh  ORDER by a.mahh DESC limit " . $start . "," . $limit;
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getInstance, maf 2 pt nằmf trong connect
        // class connect, cần tạo ddtuong gọi pt
        $result = $db->getList($select);
        return $result;//lấy đc 14 sản phẩm mới nhất
    }
    function getGen()
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "SELECT a.mahh, a.tenhh, a.soluotxem, b.soluongton, b.hinh, b.dongia, c.mausac
            FROM hanghoa a, cthanghoa b, mausac c 
            WHERE a.mahh = b.idhanghoa AND b.idmau = c.idmau AND a.maloai = '7' group by a.mahh
            ORDER BY a.mahh DESC ";
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getList thuộc connect
        $result = $db->getList($select);
        return $result;//lấy đc 8 sản phẩm mới nhất
    }
    function getAGen($start, $limit)
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.soluongton,b.hinh,b.dongia,c.mausac, b.giamgia,a.trangthai,a.yeuthich
                from hanghoa a,cthanghoa b, mausac c 
                WHERE a.mahh=b.idhanghoa AND b.idmau=c.idmau AND a.trangthai=0 and a.maloai = '7'  group by a.mahh ORDER by a.mahh DESC limit " . $start . "," . $limit;
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getInstance, maf 2 pt nằmf trong connect
        // class connect, cần tạo ddtuong gọi pt
        $result = $db->getList($select);
        return $result;//lấy đc 14 sản phẩm mới nhất
    }

    function getGD()
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "SELECT a.mahh, a.tenhh, a.soluotxem, b.soluongton, b.hinh, b.dongia, c.mausac 
                FROM hanghoa a, cthanghoa b, mausac c 
                WHERE a.mahh = b.idhanghoa AND b.idmau = c.idmau AND a.maloai = '7' group by a.mahh
                ORDER BY a.mahh DESC ";
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getList thuộc connect
        $result = $db->getList($select);
        return $result;//lấy đc 8 sản phẩm mới nhất
    }
    function getAGD($start, $limit)
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.soluongton,b.hinh,b.dongia,c.mausac, b.giamgia,a.trangthai,a.yeuthich
                    from hanghoa a,cthanghoa b, mausac c 
                    WHERE a.mahh=b.idhanghoa AND b.idmau=c.idmau AND a.maloai = '7' AND a.trangthai=0  group by a.mahh ORDER by a.mahh DESC limit " . $start . "," . $limit;
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getInstance, maf 2 pt nằmf trong connect
        // class connect, cần tạo ddtuong gọi pt
        $result = $db->getList($select);
        return $result;//lấy đc 14 sản phẩm mới nhất
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
    function updateYeuThich($yeuthich, $mahh,$makh)
    {
        $db = new connect();
        $query = "UPDATE hanghoa
        SET yeuthich = $yeuthich
        WHERE mahh = $mahh;
        
        UPDATE spthich
        SET yeuthich = $yeuthich
        WHERE mahh = $mahh and makh=$makh;";
        $db->exec($query);
    }
    function insertYeuThich($mahh, $makh, $yeuthich)
    {
        $db = new connect();
        $query = "insert into spthich(mahh, makh, yeuthich) values ($mahh, $makh,$yeuthich)";
        $result = $db->exec($query);
        return $result;
    }
    function deleteYeuThich($mahh, $makh)
    {
        $db = new connect();
        $query = "DELETE FROM spthich WHERE mahh = $mahh and yeuthich=0 and makh=$makh";
        $result = $db->exec($query);
        return $result;
    }
    function getHangHoaYeuThich($makh)
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.soluongton,b.hinh,b.dongia,c.mausac, b.giamgia,a.trangthai,d.yeuthich
            from hanghoa a,cthanghoa b, mausac c,spthich d
            WHERE a.mahh=b.idhanghoa AND b.idmau=c.idmau and a.trangthai=0 and a.mahh=d.mahh and d.makh=$makh  group by a.mahh ORDER by a.mahh DESC ";
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getInstance, maf 2 pt nằmf trong connect
        // class connect, cần tạo ddtuong gọi pt
        $result = $db->getList($select);
        return $result;//lấy đc 14 sản phẩm mới nhất
    }
    function YeuThich($makh)
    {
        $db = new connect();
        $select = "SELECT COUNT(DISTINCT mahh) AS mahh FROM spthich WHERE yeuthich = 1 AND makh = $makh";
        $result = $db->getList($select);
        return $result;
    }
    function XoaYeuThich()
    {
        $db = new connect();
        $select = "update hanghoa set yeuthich=0 ";
        $result = $db->getList($select);
        return $result;
    }
    function getLoai()
    {
        $db = new connect();
        $select = "SELECT * FROM loai where trangthai=0";
        $result = $db->getList($select);
        return $result;
    }
    function getLoaiID($maloai)
    {
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.soluongton,b.hinh,b.dongia,c.mausac, b.giamgia,a.trangthai,a.yeuthich  
        from hanghoa a,cthanghoa b, mausac c ,loai d
        WHERE a.mahh=b.idhanghoa AND b.idmau=c.idmau AND a.trangthai=0 and a.maloai=$maloai group by a.mahh  ";
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getInstance, maf 2 pt nằmf trong connect
        // class connect, cần tạo ddtuong gọi pt
        $result = $db->getList($select);
        return $result;//lấy đc 14 sản phẩm mới nhất
    }
}
?>