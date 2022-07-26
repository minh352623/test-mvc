<div class="row">
    <div class="row frmtitle mb10">
        <h1>DANH SÁCH ĐƠN HÀNG</h1>
    </div>
    <form action="index.php?act=bill" method="post" class="form_filter">
        <input type="text" name="keyword">

        <input type="submit" name="filter" value='Tìm kiếm'>
    </form>
    <div class="row frmcontent">
        <div class="row mb10 frmdsloai">
            <table>
                <tr>
                    <th></th>
                    <th>MÃ ĐƠN HÀNG</th>
                    <th>KHÁCH HÀNG</th>
                    <th>SỐ LƯỢNG HÀNG</th>
                    <th>GÁ TRỊ ĐƠN HÀNG</th>
                    <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                    <TH>THAO TÁC</TH>

                </tr>
                <?php
                if (!empty($listbill)) {

                    foreach ($listbill as $item) {

                        $sua = 'index.php?act=suadh&id=' . $item['id'];
                        $xoa = 'index.php?act=xoadh&id=' . $item['id'];
                        $kh = 'Tên: ' . $item['order_name'] . '<br/><br/> Địa chỉ: ' . $item['order_address'] . '<br/><br/>Email: ' . $item['order_email'] . '<br/><br/>Số điện thoại: ' . $item['order_tel'] . '';
                        $ttdh = get_ttdh($item['order_status']);
                        echo '<tr>
                        <td><input type="checkbox" name="" id="" /></td>
                        <td>dohang' . $item['id'] . '</td>
                        <td>' . $kh . '</td>
                        <td>' . count(json_decode($item['idsp'])) . '</td>
                        <td>' . $item['total'] . '</td>
                        <td>' . $ttdh . '</td>

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