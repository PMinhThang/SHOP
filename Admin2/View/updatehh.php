<?php
if (isset($_GET['id'])) {
    $mahh = $_GET['id'];
    $idsize = $_GET['idsize'];

    // truy vấn thông tin của id
    $hh = new hanghoa();
    $kq = $hh->getHangHoaID2($mahh);
    $tenhh = $kq['tenhh'];
    $ngay = $kq['ngaylap'];
    $gia = $kq['dongia'];
    $soluongton = $kq['soluongton'];
    $giamgia = $kq['giamgia'];
    $hinh = $kq['hinh'];
    $maloai = $kq['maloai'];
    $idmau = $kq['Idmau'];
    $mausac = $kq['mausac'];
    $mota = $kq['mota'];
}
?>
<script src="https://cdn.tiny.cloud/1/z09z16kc7smqafqpl0wyfr7hlmffm0blar3gg3u5kce9jonv/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
<div class="col-md-12">
    <?php
    $ac = 1;
    if (isset($_GET['action'])) {
        if (isset($_GET['act']) && $_GET['act'] == 'update_hhaction') {
            $ac = 1;
            echo "<h1 class='text-center mt-5'>SỬA SẢN PHẨM</h1>";
        } else {
            $ac = 2;
            echo "<h1 class='text-center mt-5'>THÊM SẢN PHẨM</h1>";
        }
    }
    ?>
    <button onclick="goBack()" class="btn btn-secondary">Quay lại</button>
    <?php if ($ac == 1) { ?>
        <form action="index.php?action=hanghoa&act=update_hh" method="post" enctype="multipart/form-data">

            <table class="table table-hover" style="border: 0px;">
                <tr>
                    <td>Mã hàng</td>
                    <td> <input type="text" class="form-control" name="mahh" value="<?php if (isset($mahh))
                        echo $mahh; ?>" readonly />
                    </td>
                </tr>
                <tr>
                    <td>Tên hàng</td>
                    <td><input type="text" class="form-control" name="tenhh" required value="<?php if (isset($tenhh))
                        echo $tenhh; ?>" maxlength="100px"></td>
                </tr>
                <tr>
                    <td>Mã loại</td>
                    <td>
                        <select name="maloai" class="form-control" style="width:150px;">

                            <?php
                            $selectloai = -1;
                            if (isset($maloai) && $maloai != -1) {
                                $selectloai = $maloai;//6
                            }
                            $loai = new loai();
                            $result = $loai->getLoai();
                            while ($set = $result->fetch()):
                                ?>
                                <option value="<?php echo $set['maloai'] ?>" <?php if ($selectloai == $set['maloai'])
                                       echo 'selected'; ?>>
                                    <?php echo $set['tenloai']; ?>
                                </option>
                                <?php
                            endwhile;
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Studio</td>
                    <td>
                        <select name="mau" class="form-control" style="width:150px;">
                            <?php
                            $selectmau = -1;
                            if (isset($idmau) && $idmau != -1) {
                                $selectmau = $idmau;//6
                            }
                            $mau = new mau();
                            $result = $mau->getMau();
                            while ($set = $result->fetch()):
                                ?>
                                <option name="mau[]" value="<?php echo $set['Idmau'] ?>" <?php if ($selectmau == $set['Idmau'])
                                       echo 'selected'; ?>><?php echo $set['mausac']; ?></option>
                                <?php
                            endwhile;
                            ?>
                        </select>
                    </td>

                </tr>
                <!-- kết thúc số lượng -->
                <tr>
                    <td>Mô tả</td>
                    <td><textarea id="textarea" class="form-control"
                            name="mota"><?php echo isset($mota) ? $mota : ''; ?></textarea>
                    </td>
                </tr>
            </table>
            <input class="btn btn-primary" type="submit" value="submit">
        </form>
    <?php }
    if ($ac == 2) { ?>
        <form action="index.php?action=hanghoa&act=insert_hh" method="post" enctype="multipart/form-data">
            <table class="table table-hover" style="border: 0px;">
                <tr>
                    <td>Mã hàng</td>
                    <td> <input type="text" class="form-control" name="mahh" value="<?php if (isset($mahh))
                        echo $mahh; ?>" readonly />
                    </td>
                </tr>
                <tr>
                    <td>Màu</td>
                    <td>
                        <input type="text" name="" class="form-control" style="width:150px;" value="<?php if (isset($idmau))
                            echo $mausac; ?>" readonly>
                        <!-- Giữ giá trị Id của màu trong một trường ẩn để gửi dữ liệu về -->
                        <input type="hidden" name="mau" value="<?php echo $idmau; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Giá </td>
                    <td><input type="text" class="form-control" required value="<?php if (isset($gia))
                        echo $gia; ?>" name="dongia">
                    </td>
                </tr>
                <tr>
                    <td>Giảm giá</td>
                    <td><input type="number" class="form-control" required value="<?php if (isset($giamgia))
                        echo $giamgia; ?>" name="giamgia">

                </tr>
                <td>Hình ảnh</td>
                <td><input type="file" class="form-control" required onchange="previewImage(this)"
                        value="<?php echo $hinh; ?>" name="image">
                    <img id="preview" src="#" alt="Preview" style="max-width: 100px; max-height: 100px;">
                </td>
                </tr>
                <tr>
                    <td>Size</td>
                    <td>

                        <?php
                        $selectsize = -1;
                        if (isset($idsize) && $idsize != -1) {
                            $selectsize = $idsize;//6
                        }
                        $size = new size();
                        $result = $size->getSizeHH($mahh);
                        while ($set = $result->fetch()):
                            if ($selectsize == $set['Idsize']) {
                                continue; // Bỏ qua size này và chuyển đến size tiếp theo trong vòng lặp
                            }

                            ?>
                    <tr>
                        <td><input type="checkbox" name="size[]" value="<?php echo $set['Idsize'] ?>"
                                onchange="enableNumberInput(this)">
                            <?php echo $set['size']; ?></input></td>
                        <td><input type="number" name="soluongton[]" class="form-control" id="" required value="<?php if (isset($soluongton))
                            echo $soluongton; ?>" required class="form-control" placeholder="Số lượng" disabled>
                        </td>
                    </tr>

                    <?php
                        endwhile;
                        ?>

                </td>
                </tr>
            </table>
            <input class="btn btn-primary" type="submit" value="submit">
        </form>

    <?php } ?>
</div>
<script>
    function enableNumberInput(checkbox) {
        var input = checkbox.parentNode.nextElementSibling.querySelector('input[type="number"]');
        if (checkbox.checked) {
            input.disabled = false;
        } else {
            input.disabled = true;
            input.value = null;
        }
    }
    tinymce.init({
        selector: '#textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        height: 500,
        mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
    });
    function previewImage(input) {
        var preview = document.getElementById('preview');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function goBack() {
        window.history.back();
    }
</script>