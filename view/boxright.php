<div class="row mb ">
    <div class="boxtitle">TÀI KHOẢN</div>
    <div class="boxcontent formtaikhoan">
        <?php
        if (isset($_SESSION['user'])) {

        ?>
            <div class="row mb10">
                Xin chào:

                <b> <?php echo $_SESSION['user']['fullname'] ?></b>
            </div>
            <li>
                <a href="index.php?act=addcart">Giỏ hàng của tôi</a>
            </li>
            <li>
                <a href="index.php?act=mybill">Đơn hàng của tôi</a>
            </li>
            <li>
                <a href="index.php?act=quenmk">Quên mật khẩu</a>
            </li>
            <li>
                <a href="index.php?act=edit_taikhoan">Cập nhật thông tin cá nhân</a>
            </li>
            <?php
            if ($_SESSION['user']['role'] == 1) {


            ?>
                <li>
                    <a href="admin/index.php">Đăng nhập admin</a>
                </li>
            <?php } ?>
            <li>
                <a href="index.php?act=thoat">Thoát</a>
            </li>
        <?php
        } else {
        ?>


            <form action="index.php?act=dangnhap" method="post">
                <div class="row mb10">
                    Tên đăng nhập<br>
                    <input type="text" name="user">
                </div>
                <div class="row mb10">
                    Mật khẩu<br>

                    <input type="password" name="pass">
                </div>
                <div class="row mb10">
                    <input type="checkbox" name=""> Ghi nhớ tài khoản?
                </div>
                <div class="row mb10">
                    <input type="submit" name="dangnhap" value="Đăng nhập">
                </div>
            </form>
            <li>
                <a href="#">Quên mật khẩu</a>
            </li>
            <li>
                <a href="index.php?act=dangki">Đăng ký thành viên</a>
            </li>
        <?php } ?>
    </div>
</div>
<div class="row mb">
    <div class="boxtitle">DANH MỤC</div>
    <div class="boxcontent2 menudoc">
        <ul>
            <?php
            foreach ($danhmucList as $item) {
                $linkDm = 'index.php?act=sanpham&iddm=' . $item['id'];
                echo '<li>
                            <a href="' . $linkDm . '">' . $item['name'] . '</a>
                        </li>';
            }
            ?>

        </ul>
    </div>
    <div class="boxfooter searbox">
        <form action="index.php?act=sanpham" method="post" class="form_search_sp">
            <input type="text" name="keyword">
            <input type="submit" class="btn_search" name="search" value="search">
        </form>
    </div>
</div>
<div class="row">
    <div class="boxtitle">TOP 10 YÊU THÍCH</div>
    <div class="row boxcontent">
        <?php

        foreach ($listTop10 as $item) {
            $img = $path_img . $item['image'];
            $link = 'index.php?act=sanphamct&id=' . $item['id'];
            echo '<div class="row mb10 top10">
            <a href="' . $link . '"><img src="' . $img . '" alt=""></a>
            <a href="' . $link . '">' . $item['name'] . '</a>
        </div>';
        }
        ?>

    </div>
</div>