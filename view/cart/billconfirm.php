<div class="row mb">

    <div class="boxtrai mr">
        <?php
        if (isset($thongbao)) {
            echo '<h2>' . $thongbao . '</h2>';
        }
        if (isset($oneOrder) && is_array($oneOrder)) {
        ?>
            <form action="index.php?act=billconfirm" method="post">
                <div class="row mb">
                    <div class="boxtitle">
                        CẢM ƠN
                    </div>
                    <div class="row boxcontent" style="text-align: center; font-weight: bold;">
                        CẢM ƠN QUÝ KHÁCH ĐÃ ĐẶT HÀNG
                    </div>
                </div>

                <div class="row mb">
                    <div class="boxtitle">
                        THÔNG TIN ĐƠN HÀNG
                    </div>
                    <div class="row boxcontent info_bill">
                        <li>Mã Đơn Hàng: donhang<?php echo $oneOrder['id'] ?></li>
                        <li>Ngày đặt hàng: <?php echo $oneOrder['ngaydathang'] ?></li>
                        <li>Tổng đơn hàng:<?php echo $oneOrder['total'] ?> VNĐ</li>

                        <li>Phương thức: <?php echo get_pttt($oneOrder['order_pttt']) ?></li>

                    </div>
                </div>
                <div class="row mb">
                    <div class="boxtitle">
                        THÔNG TIN ĐẶT HÀNG
                    </div>
                    <div class="row boxcontent billform">
                        <table>
                            <?php

                            ?>
                            <tr>
                                <td>Nguời Đặt Hàng</td>
                                <td><span><?php echo $oneOrder['order_name'] ?></span></td>
                            </tr>
                            <tr>
                                <td>Địa Chỉ</td>
                                <td><span><?php echo $oneOrder['order_address'] ?></span></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><span><?php echo $oneOrder['order_email'] ?></span></td>
                            </tr>
                            <tr>
                                <td>Điện Thoại</td>
                                <td><span><?php echo $oneOrder['order_tel'] ?></span></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row frmcontent">
                    <div class="boxtitle">CHI TIẾT GIỎ HÀNG</div>
                    <div class="row boxcontent cart mb10 frmdsloai">
                        <table>
                            <tr>
                                <th>Hình</th>
                                <th>Sản Phẩm</th>
                                <th>Đơn Giá</th>
                                <th>Số Lượng</th>
                                <th>Thành Tiền</th>


                            </tr>
                            <?php
                            $ids = json_decode($oneOrder['idsp']);
                            if (is_array($ids)) {
                                // print_r($ids);
                                foreach ($ids as $id) {

                                    $item =  loadOnecart($id);

                                    views_one_Cart($item);
                                }
                            }
                            // foreach()
                            // viewsCart($listCart);


                            ?>

                        </table>
                    </div>
                </div>
            </form>
        <?php } else {
            echo '<h1>Bạn chưa đặt hàng!</h1>';
        } ?>
    </div>
    <div class="boxphai">
        <?php include 'view/boxright.php'; ?>

    </div>
</div>