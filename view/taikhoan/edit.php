<div class="row mb ">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">CẬP NHẬT TÀI KHOẢN</div>
            <?php

            if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
                extract($_SESSION['user']);
            }
            if (isset($_SESSION['thongbao']) && $_SESSION['thongbao'] != "") {
                echo '<h2 class="message_register"><span>' . $_SESSION['thongbao'] . '</span></h2>';
                removeSession('thongbao');
            }
            ?>
            <div class="row boxcontent chitiet">
                <form action="index.php?act=edit_taikhoan" class="form_register" method="post">
                    <div class="group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" value="<?= $email ?>" id="email" class="email" placeholder="Email...">
                    </div>
                    <div class="group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" value="<?= $password ?>" id="password" class="password" placeholder="password...">
                    </div>
                    <div class="group">
                        <label for="nameuser">Name User:</label>
                        <input type="text" name="fullname" value="<?= $fullname ?>" id="nameuser" class="nameuser" placeholder="nameuser...">
                    </div>
                    <div class="group">
                        <label for="address">Địa chỉ:</label>
                        <input type="text" name="address" value="<?= $address ?>" id="address" class="address" placeholder="address...">
                    </div>
                    <div class="group">
                        <label for="tel">Điện thoại:</label>
                        <input type="text" name="tel" value="<?= $tel ?>" id="tel" class="tel" placeholder="Số điện thoại...">
                    </div>
                    <div class="group">
                        <span></span>
                        <div class="group-child">
                            <input type="hidden" name="id" value="<?= $id ?>">

                            <input type="submit" value="CẬP NHẬT" name="capnhat">
                            <input type="reset" value="Nhập lại">
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
    <div class="boxphai">
        <?php include 'view/boxright.php'; ?>
    </div>
</div>