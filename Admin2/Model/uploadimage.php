<?php
function uploadImage()
{
    // Đường dẫn thư mục đích 1
    $target_dir1 = "Content/imagetourdien/";

    // Đường dẫn thư mục đích 2
    $target_dir2 = "C:/xampp/htdocs/php1/PHP2/PhanMinhThắng_501220709/DuAnCuoiKy/Content/imagetourdien/";

    // Lấy tên file tải lên
    $file_name = basename($_FILES['image']['name']);

    // Đường dẫn file đích 1
    $target_file1 = $target_dir1 . $file_name;

    // Đường dẫn file đích 2
    $target_file2 = $target_dir2 . $file_name;

    // Cần kiểm tra xem file đã được tải lên thành công hay không trước khi tiến hành di chuyển
    $upload = 1;

    // Kiểm tra file có đúng là hình ảnh không
    $check = getimagesize($_FILES['image']['tmp_name']);
    if($check === false) {
        echo '<script>alert("File tải lên không phải là hình ảnh.");</script>';
        $upload = 0;
    }

    // Kiểm tra kích thước file
    if ($_FILES['image']['size'] > 1000000) {
        echo '<script>alert("File tải lên vượt quá dung lượng cho phép.");</script>';
        $upload = 0;
    }

    // Kiểm tra phần mở rộng của file
    $imageFileType = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
    if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
        echo '<script>alert("Chỉ chấp nhận các file hình ảnh có phần mở rộng JPG, JPEG, PNG, GIF.");</script>';
        $upload = 0;
    }

    // Tiến hành upload nếu tất cả các điều kiện đều đúng
    if ($upload == 1) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file1) &&
            copy($target_file1, $target_file2)) {
            echo '<script>alert("Upload hình thành công.");</script>';
        } else {
            echo '<script>alert("Upload hình không thành công.");</script>';
        }
    }
}


?>