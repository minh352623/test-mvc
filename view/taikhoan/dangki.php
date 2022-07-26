<div class="row mb ">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">ĐĂNG KÍ TÀI KHOẢN</div>
            <?php if (isset($thongbao) && $thongbao != "") {
                echo '<h2 class="message_register"><span>' . $thongbao . '</span></h2>';
            } ?>
            <div class="row boxcontent chitiet">
                <form action="index.php?act=dangki" class="form_register" method="post">
                    <div class="group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="email" class="email" placeholder="Email...">
                    </div>
                    <div class="group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" class="password" placeholder="password...">
                    </div>
                    <div class="group">
                        <label for="nameuser">Name User:</label>
                        <input type="text" name="fullname" id="nameuser" class="nameuser" placeholder="nameuser...">
                    </div>
                    <div class="group">
                        <span></span>
                        <div class="group-child">
                            <input type="submit" value="Đăng ký" name="dangky">
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