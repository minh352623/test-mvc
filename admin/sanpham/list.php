<div class="row">
    <div class="row frmtitle">
        <h1>DANH SÁCH LOẠI HÀNG</h1>
    </div>
    <form action="index.php?act=listsp" method="post" class="form_filter">
        <input type="text" name="keyword">
        <select name="iddm" id="">
            <option value="0">Tất cả danh mục</option>
            <?php
            foreach ($listDanhMuc as $item) {

                echo '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
            }
            ?>
        </select>
        <input type="submit" name="filter" value='Tìm kiếm'>
    </form>
    <div class="row frmcontent">
        <div class="row mb10 frmdsloai">
            <table>

                <tr>
                    <th></th>
                    <th>MÃ SẢN PHẨM</th>
                    <TH style="width:30%;height:100px;">HÌNH</TH>
                    <th>TÊN SẢN PHẨM</th>
                    <TH>GIÁ</TH>
                    <TH>LƯỢT XEM</TH>
                    <th></th>
                </tr>
                <?php
                if (!empty($listSanPham)) {

                    foreach ($listSanPham as $item) {
                        $img = '../upload/' . $item['image'];
                        if (is_file($img)) {
                            $hinh = '<img  src="' . $img . '">';
                        }
                        $sua = 'index.php?act=suasp&id=' . $item['id'];
                        $xoa = 'index.php?act=xoasp&id=' . $item['id'];

                        echo '<tr>
                        <td><input type="checkbox" name="" id="" /></td>
                        <td>' . $item['id'] . '</td>
                        <td class="admin_hinh">' . $hinh . '</td>
                        <td>' . $item['name'] . '</td>
                        <td>' . $item['price'] . '</td>
                        <td>' . $item['view'] . '</td>

                        <td>
                            <a href="' . $sua . '"><input type="button" value="Sửa" /></a>
                            <a href="' . $xoa . '"><input type="button" value="Xóa" /></a>
                        </td>
                    </tr>';
                    }
                }

                ?>
            </table>
        </div>
        <div class="row mb10">
            <input type="button" value="Chọn tất cả" />
            <input type="button" value="Bỏ chọn tất cả" />
            <input type="button" value="Xóa các mục đã chọn" />
            <a href="index.php?act=addsp"><input type="button" value="Nhập thêm" /></a>
        </div>
    </div>
</div>