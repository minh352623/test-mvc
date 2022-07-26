<div class="row mb">
    <div class="boxtrai mr">
        <form action="index.php?act=billconfirm" method="post">

            <div class="row mb">
                <div class="boxtitle">
                    THÔNG TIN ĐẶT HÀNG
                </div>
                <div class="row boxcontent billform">
                    <table>
                        <?php
                        if (isset($_SESSION['user']) && $_SESSION['user']) {
                            $name = $_SESSION['user']['fullname'];
                            $address = $_SESSION['user']['address'];
                            $tel = $_SESSION['user']['tel'];
                            $email = $_SESSION['user']['email'];
                        } else {
                            $name = "";
                            $address = "";
                            $tel = "";
                            $email = "";
                        }

                        ?>
                        <tr>
                            <td>Nguời Đặt Hàng</td>
                            <td><input type="text" name="name" value="<?= $name ?>"></td>
                        </tr>
                        <tr>
                            <td>Địa Chỉ</td>
                            <td><input type=" text" name="address" value="<?= $address ?>"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" value="<?= $email ?>"></td>
                        </tr>
                        <tr>
                            <td>Điện Thoại</td>
                            <td><input type="text" name="tel" value="<?= $tel ?>"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row mb">
                <div class="boxtitle">
                    PHƯƠNG THỨC THANH TOÁN
                </div>
                <div class="row boxcontent">
                    <table>
                        <tr class="parent_pttk">
                            <td class="pttk"><input type="radio" value="1" name="pttt" checked>Trả Tiền Khi Nhận Hàng</td>
                            <td class="pttk"><input type="radio" value="2" name="pttt">Chuyển Khoản Ngân Hàng</td>
                            <td class="pttk"><input type="radio" value="3" name="pttt">Thanh Toán Online</td>

                        </tr>
                    </table>
                </div>
            </div>
            <div class="row frmcontent">
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
                <a href="index.php?act=billconfirm"><input type="submit" name="dongydathang" value="TIẾP TỤC ĐẶT HÀNG"></a>

            </div>
        </form>
    </div>
    <div class="boxphai">
        <?php include 'view/boxright.php'; ?>

    </div>
</div>