<?php
class locsanpham
{   

    function getAllU($start, $limit)
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "SELECT a.mahh, a.tenhh, a.soluotxem, b.soluongton, b.hinh, b.dongia, c.mausac, b.giamgia ,a.trangthai ,a.yeuthich
        FROM hanghoa a, cthanghoa b, mausac c 
        WHERE a.mahh = b.idhanghoa AND b.idmau = c.idmau  AND a.trangthai=0
        GROUP BY a.mahh  
        ORDER BY 
            CASE
                WHEN b.giamgia > 0 THEN b.giamgia
                ELSE b.dongia
            END ASC limit " . $start . "," . $limit;
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getInstance, maf 2 pt nằmf trong connect
        // class connect, cần tạo ddtuong gọi pt
        $result = $db->getList($select);
        return $result;//lấy đc 14 sản phẩm mới nhất
    }
    function getAllD($start, $limit)
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "SELECT a.mahh, a.tenhh, a.soluotxem, b.soluongton, b.hinh, b.dongia, c.mausac, b.giamgia,a.trangthai,a.yeuthich 
        FROM hanghoa a, cthanghoa b, mausac c 
        WHERE a.mahh = b.idhanghoa AND b.idmau = c.idmau  AND a.trangthai=0
        GROUP BY a.mahh  
        ORDER BY 
            CASE
                WHEN b.giamgia > 0 THEN b.giamgia
                ELSE b.dongia
            END DESC limit " . $start . "," . $limit;
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getInstance, maf 2 pt nằmf trong connect
        // class connect, cần tạo ddtuong gọi pt
        $result = $db->getList($select);
        return $result;//lấy đc 14 sản phẩm mới nhất
    }
    function getAllAZ($start, $limit)
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.soluongton,b.hinh,b.dongia,c.mausac, b.giamgia,a.trangthai,a.yeuthich 
        from hanghoa a,cthanghoa b, mausac c 
        WHERE a.mahh=b.idhanghoa AND b.idmau=c.idmau AND a.trangthai=0 group by a.mahh ORDER by a.tenhh ASC limit " . $start . "," . $limit;
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getInstance, maf 2 pt nằmf trong connect
        // class connect, cần tạo ddtuong gọi pt
        $result = $db->getList($select);
        return $result;//lấy đc 14 sản phẩm mới nhất
    }

    function getSaleU($start, $limit)
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "SELECT a.mahh, a.tenhh, a.soluotxem, b.soluongton, b.hinh, b.dongia, c.mausac, b.giamgia,a.trangthai,a.yeuthich  
        FROM hanghoa a, cthanghoa b, mausac c 
        WHERE a.mahh = b.idhanghoa AND b.idmau = c.idmau  AND b.giamgia!=0 AND a.trangthai=0
        GROUP BY a.mahh  
        ORDER BY b.giamgia ASC limit ". $start . "," . $limit;
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getInstance, maf 2 pt nằmf trong connect
        // class connect, cần tạo ddtuong gọi pt
        $result = $db->getList($select);
        return $result;//lấy đc 14 sản phẩm mới nhất
    }
    function getSaleD($start, $limit)
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "SELECT a.mahh, a.tenhh, a.soluotxem, b.soluongton, b.hinh, b.dongia, c.mausac, b.giamgia,a.trangthai,a.yeuthich  
        FROM hanghoa a, cthanghoa b, mausac c 
        WHERE a.mahh = b.idhanghoa AND b.idmau = c.idmau  AND b.giamgia!=0 AND a.trangthai=0
        GROUP BY a.mahh  
        ORDER BY b.giamgia DESC limit ". $start . "," . $limit;
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getInstance, maf 2 pt nằmf trong connect
        // class connect, cần tạo ddtuong gọi pt
        $result = $db->getList($select);
        return $result;//lấy đc 14 sản phẩm mới nhất
    }
    function getSaleAZ($start, $limit)
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.soluongton,b.hinh,b.dongia,c.mausac, b.giamgia,a.trangthai,a.yeuthich  
        from hanghoa a,cthanghoa b, mausac c 
        WHERE a.mahh=b.idhanghoa AND b.idmau=c.idmau AND b.giamgia!=0 AND a.trangthai=0 group by a.mahh ORDER by a.tenhh ASC limit ". $start . "," . $limit;
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getInstance, maf 2 pt nằmf trong connect
        // class connect, cần tạo ddtuong gọi pt
        $result = $db->getList($select);
        return $result;//lấy đc 14 sản phẩm mới nhất
    }
  
    function getUGen()
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "SELECT a.mahh, a.tenhh, a.soluotxem, b.soluongton, b.hinh, b.dongia, c.mausac, b.giamgia,a.trangthai,a.yeuthich
            FROM hanghoa a, cthanghoa b, mausac c 
            WHERE a.mahh = b.idhanghoa AND b.idmau = c.idmau AND a.maloai = '7' AND a.trangthai=0
            GROUP BY a.mahh  
            ORDER BY 
                CASE
                    WHEN b.giamgia > 0 THEN b.giamgia
                    ELSE b.dongia
                END ASC ";
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getInstance, maf 2 pt nằmf trong connect
        // class connect, cần tạo ddtuong gọi pt
        $result = $db->getList($select);
        return $result;//lấy đc 14 sản phẩm mới nhất
    }
    function getDGen()
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "SELECT a.mahh, a.tenhh, a.soluotxem, b.soluongton, b.hinh, b.dongia, c.mausac, b.giamgia,a.trangthai,a.yeuthich
        FROM hanghoa a, cthanghoa b, mausac c 
        WHERE a.mahh = b.idhanghoa AND b.idmau = c.idmau AND a.maloai = '7' AND a.trangthai=0
        GROUP BY a.mahh  
        ORDER BY 
            CASE
                WHEN b.giamgia > 0 THEN b.giamgia
                ELSE b.dongia
            END DESC ";
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getInstance, maf 2 pt nằmf trong connect
        // class connect, cần tạo ddtuong gọi pt
        $result = $db->getList($select);
        return $result;//lấy đc 14 sản phẩm mới nhất
    }
    function getGenAZ()
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.soluongton,b.hinh,b.dongia,c.mausac, b.giamgia,a.trangthai,a.yeuthich
                from hanghoa a,cthanghoa b, mausac c 
                WHERE a.mahh=b.idhanghoa AND b.idmau=c.idmau AND a.maloai = '7' AND a.trangthai=0 group by a.mahh  ORDER by a.tenhh ASC ";
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getInstance, maf 2 pt nằmf trong connect
        // class connect, cần tạo ddtuong gọi pt
        $result = $db->getList($select);
        return $result;//lấy đc 14 sản phẩm mới nhất
    }
}
?>