<?php
    if(isset($_SESSION['makh']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        // Giỏ hàng không trống
        $makh = $_SESSION['makh'];
        $hd = new hoadon();
        $sohd = $hd->insertHoaDon($makh);
        $uk = $hd->PhiShip();
        $_SESSION['masohd'] = $sohd;
        $total = 0;
        foreach($_SESSION['cart'] as $key => $item) {
            $hd->insertCTHoaDon($sohd, $item['mahh'], $item['soluong'], $item['mausac'], $item['size'], $item['thanhtien']);
            $hd->updateSoLuongTon($item['mahh'], $item['soluong'],$item['idsize']);
            $total += $item['thanhtien'];
        }
        $hd->updateTongTien($sohd, $makh, $total);
    } else {
        // Giỏ hàng trống, không thực hiện bất kỳ thao tác nào
    }
    include_once "./View/order.php";
    unset($_SESSION['cart']);
?>
