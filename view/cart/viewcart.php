<div class="row mb ">
    <div class="boxtrai mr">
        <div class="row mb ">
            <div class="boxtitle">GIỎ HÀNG</div>
            <div class="row boxcontent cart mb10 frmdsloai">
                <table>
                    <tr>
                        <th>Hình</th>
                        <th>Sản Phẩm</th>
                        <th>Đơn Giá</th>
                        <th>Số Lượng</th>
                        <th>Thành Tiền</th>
                        <th>Thao Tác</th>


                    </tr>
                    <?php
                    viewsCart($listCart);

                    ?>

                </table>
            </div>
        </div>

        <div class="row mb bill">
            <a href="index.php?act=bill"><input type="submit" value="ĐỒNG Ý ĐẶT HÀNG"></a>

        </div>
    </div>
    <div class="boxphai">
        <?php include 'view/boxright.php'; ?>

    </div>
</div>