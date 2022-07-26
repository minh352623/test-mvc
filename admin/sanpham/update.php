<?php
if (is_array($sp)) {
    extract($sp);
}
$img = '../upload/' . $image;
if (is_file($img)) {
    $hinh = '<img  src="' . $img . '">';
}
?>
<div class="row">
    <div class="row frmtitle">
        <H1>CẬP NHẬT SẢN PHẨM</H1>
    </div>
    <div class="row frmcontent">
        <?php if (isset($thongbao) && $thongbao != "") {
            echo '<h2>' . $thongbao . '</h2>';
        }
        ?>
        <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
            <div class="row mb10">
                Danh mục<br>
                <select name="iddm" id="">
                    <?php
                    foreach ($listDanhMuc as $item) {
                        if ($item['id'] == $idDm)
                            echo '<option selected  value="' . $item['id'] . '">' . $item['name'] . '</option>';
                        else  echo '<option  value="' . $item['id'] . '">' . $item['name'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="row mb10">
                Tên sản phẩm<br>
                <input type="text" value="<?php echo isset($name) && $name != "" ?  $name : ""; ?>" name="tensp">
            </div>
            <div class="row mb10">
                Giá<br>
                <input type="text" value="<?php echo isset($price) && $price != "" ?  $price : ""; ?>" name="giasp">
            </div>
            <div class="row mb10">
                Hình<br>
                <input type="file" value="<?php echo isset($image) && $image != "" ?  $image : ""; ?>" name="hinhsp">
                <?= $hinh ?>
            </div>
            <div class="row mb10">
                Mô tả<br>
                <textarea name="motasp"><?php echo isset($description) && $description != "" ?  $description : ""; ?></textarea>
            </div>

            <div class="row mb10">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="submit" name="capnhat" value="CẬP NHẬT">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
            </div>

        </form>
    </div>
</div>
</div>