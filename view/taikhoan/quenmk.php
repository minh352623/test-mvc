<div class="row mb ">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">QUÊN MẬT KHẨU</div>
            <?php if (isset($thongbao) && $thongbao != "") {
                echo '<h2 class="message_register"><span>' . $thongbao . '</span></h2>';
            } ?>
            <div class="row boxcontent chitiet">
                <form action="index.php?act=quenmk" class="form_register" method="post">
                    <div class="group">
                        <label for="email">Nhập lại Email:</label>
                        <input type="text" name="email" id="email" class="email" placeholder="Email...">
                    </div>

                    <div class="group">
                        <span></span>
                        <div class="group-child">
                            <input type="submit" value="Gửi" name="guiemail">
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