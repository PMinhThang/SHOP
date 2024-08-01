<?php
    // include_once "./View/home.php";


    $act = 'home';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'home':
        include_once "./View/home.php";
        break;
    case 'lienhe':
        include_once "./View/lienhe.php";
        break;
    case 'chinhsach':
        include_once "./View/chinhsach.php";
        break;
    case 'csdoitra':
        include_once "./View/csdoitra.php";
        break;
    case 'ktimthay':
        include_once "./View/ktimthay.php";
        break;
    case 'gioithieu':
        include_once "./View/gioithieu.php";
        break;

   
            
            
        }
?>