<div class="row">
    <div class="row frmtitle">
        <h1>DANH SÁCH KHÁCH HÀNG</h1>
    </div>
    <div class="row frmcontent">
        <div class="row mb10 frmdsloai">
            <table>
                <tr>
                    <th></th>
                    <th>MÃ KHÁCH HÀNG</th>
                    <th>TÊN KHÁCH HÀNG</th>
                    <th>MẬT KHẨU</th>
                    <th>EMAIL</th>
                    <th>SỐ ĐIỆN THOẠI</th>
                    <th>ĐỊA CHỈ</th>
                    <th>ROLE</th>

                    <th></th>
                </tr>
                <?php
                if (!empty($listUsers)) {

                    foreach ($listUsers as $item) {
                        $sua = 'index.php?act=suatk&id=' . $item['id'];
                        $xoa = 'index.php?act=xoatk&id=' . $item['id'];
                        if ($item['role'] == 1) {
                            $role = "ADMIN";
                        } else {
                            $role = "KHÁCH HÀNG";
                        }
                        echo '<tr>
                        <td><input type="checkbox" name="" id="" /></td>
                        <td>' . $item['id'] . '</td>
                        <td>' . $item['fullname'] . '</td>
                        <td>' . $item['password'] . '</td>
                        <td>' . $item['email'] . '</td>
                        <td>' . $item['tel'] . '</td>
                        <td>' . $item['address'] . '</td>
                        <td>' .  $role . '</td>

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
        <!-- <div class="row mb10">
            <input type="button" value="Chọn tất cả" />
            <input type="button" value="Bỏ chọn tất cả" />
            <input type="button" value="Xóa các mục đã chọn" />
        </div> -->
    </div>
</div>