<div class="row">
    <div class="row frmtitle">
        <H1>THÊM MỚI SẢN PHẨM</H1>
    </div>
    <div class="row frmcontent">
        <?php if (isset($thongbao) && $thongbao != "") {
            echo '<h2>' . $thongbao . '</h2>';
        }
        ?>
        <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
            <div class="row mb10">
                Danh mục<br>
                <select name="iddm" id="">
                    <?php
                    foreach ($listDanhMuc as $item) {

                        echo '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="row mb10">
                Tên sản phẩm<br>
                <input type="text" required name="tensp">
            </div>
            <div class="row mb10">
                Giá<br>
                <input type="text" required name="giasp">
            </div>
            <div class="row mb10">
                Hình<br>
                <input type="file" required name="hinhsp">
            </div>
            <div class="row mb10">
                Mô tả<br>
                <textarea required name="motasp"></textarea>
            </div>
            <!-- <div class="row mb10">
                Danh mục sản phẩm<br>
                <input type="text" required name="danhmucsp">
            </div> -->
            <div class="row mb10 ">
                <input type="submit" name="themmoi" value="THÊM MỚI">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
            </div>

        </form>
    </div>
</div>
</div>