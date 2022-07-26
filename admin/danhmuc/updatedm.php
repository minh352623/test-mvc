<?php
if (is_array($dm)) {
    extract($dm);
}
?>
<div class="row">
    <div class="row frmtitle">
        <H1>CẬP NHẬT LOẠI HÀNG HÓA</H1>
    </div>
    <div class="row frmcontent">
        <?php if (isset($thongbao) && $thongbao != "") {
            echo '<h2>' . $thongbao . '</h2>';
        }
        ?>
        <form action="index.php?act=updatedm" method="post">
            <div class="row mb10">
                Mã loại<br>
                <input type="text" name="maloai" disabled>
            </div>
            <div class="row mb10">
                Tên loại<br>
                <input type="text" required name="tenloai" value="<?php echo isset($name) && $name != "" ?  $name : ""; ?>">
            </div>
            <div class="row mb10">
                <input type="hidden" name="id" value="<?php echo isset($id) && $id != "" ?  $id : ""; ?>">
                <input type="submit" name="capnhat" value="CẬP NHẬT">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listdm"><input type="button" value="DANH SÁCH"></a>
            </div>

        </form>
    </div>
</div>
</div>