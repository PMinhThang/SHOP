<?php
class giohang
{
    // phương thức add hàng
    function addHangHoa($mahh, $mausac, $size, $soluong)
    {
        // còn thiếu hình,ten,gia,thanhtien
        $sanpham = new hanghoa();
        $sp = $sanpham->getHangHoaId2($mahh, $mausac, $size);// trả về 1 dòng, đc fetch rồi nên nó là array
        $tenhh = $sp['tenhh'];
        $dongia = $sp['dongia'];
        $giamgia = $sp['giamgia'];
        if ($giamgia > 0) {
            $total = $soluong * $giamgia;
        } else {
            $total = $soluong * $dongia;
        }
        $soluongton = $sp['soluongton'];
        // lấy ra tên màu
        $mau = $sanpham->getHangHoaMauIdMau($mausac);
        $tenmau = $mau['mausac'];
        $sizes = $sanpham->getHangHoaSizeIdSize($size);
        $tensize = $sizes['size'];
        //lấy hình
        $hinh = $sanpham->getHangHoaHinhMauSize($mahh, $mausac, $size);
        $img = $hinh['hinh'];
        // lấy tên size
        $flag = false;
        // vì giỏ hàng chưa bject, mà object thì có thuộc tính
        //trước khi thêm vào giỏ hàng xem có tồn tại hay chưa
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['mahh'] == $mahh && $item['mausac'] == $tenmau && $item['size'] == $tensize) {
                $flag = true;
                $soluong += $item['soluong'];
                $this->updateHH($key, $soluong);//giohang:updateHH
            }
        }
        if ($flag == false) {
            // tạo đối tượng
            $item = array(
                'mahh' => $mahh,
                'tenhh' => $tenhh,
                'hinh' => $img,
                'giamgia' => $giamgia,
                'dongia' => $dongia,
                'soluongton' => $soluongton,
                'mausac' => $tenmau,
                'size' => $tensize,
                'idsize' => $size,
                'soluong' => $soluong,
                'thanhtien' => $total,
            );
            // đem đối tượng add vào trong giở hàng a[]
            $_SESSION['cart'][] = $item;
        }
        // a[1]= $_SESSION['cart'][1]['dongia']
        // $_SESSION['cart']=array({mahh:22,tenhh:giay cao got,hinh:22.jpg, dongia:500,mausac: mautrang, size:35, sooluong:1thanhtien:500});
        //                         {mahh:24,tenhh:giay cao got,hinh:24.jpg, dongia:500,mausac: mautrang, size:35, sooluong:1thanhtien:500}
        //                         {mahh:24,tenhh:giay cao got,hinh:24a.jpg, dongia:500,mausac: mautrang, size:36x, sooluong:1thanhtien:500}

    }
    // phương thức update Hàng hóa
    function updateHH($index, $soluong)
    {
        if ($soluong <= 0) {
            unset($_SESSION['cart'][$index]);
        } else {

            if ($soluong >= $_SESSION['cart'][$index]['soluongton']) {
                // update là phép gán
                $_SESSION['cart'][$index]['soluong'] = $_SESSION['cart'][$index]['soluongton'];
                if ($_SESSION['cart'][$index]['giamgia'] == 0) {
                    $tiennew = $_SESSION['cart'][$index]['soluong'] * $_SESSION['cart'][$index]['dongia'];
                } else {
                    $tiennew = $_SESSION['cart'][$index]['soluong'] * $_SESSION['cart'][$index]['giamgia'];
                }
                $_SESSION['cart'][$index]['thanhtien'] = $tiennew;
            } else {
                // update là phép gán
                $_SESSION['cart'][$index]['soluong'] = $soluong;
                if ($_SESSION['cart'][$index]['giamgia'] == 0) {
                    $tiennew = $_SESSION['cart'][$index]['soluong'] * $_SESSION['cart'][$index]['dongia'];
                } else {
                    $tiennew = $_SESSION['cart'][$index]['soluong'] * $_SESSION['cart'][$index]['giamgia'];
                }
                $_SESSION['cart'][$index]['thanhtien'] = $tiennew;
            }
        }
    }
    // phương thức tính thành tiền
    function getSubTotal()
    {
        $subtotal = 0;
        foreach ($_SESSION['cart'] as $key => $item) {
            $subtotal += $item['thanhtien'];
        }
        return
            $subtotal;
    }
    function getTong()
    {
        $subtotal = 0;
        foreach ($_SESSION['cart'] as $key => $item) {
            $subtotal += $item['soluong'];
        }
        $subtotal = number_format($subtotal);
        return
            $subtotal;
    }
    
}
?>