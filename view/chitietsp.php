<div class="row mb ">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">CHI TIẾT SẢN PHẨM</div>
            <div class="row boxcontent chitiet">
                <?php
                extract($sp);
                $img = $path_img . $image;
                echo '<h2>' . $name . '</h2>';
                echo '<div class="ct_img"><img src="' . $img . '"></div>';
                echo '<p>' . $description . '</p>';
                ?>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#comment").load("view/comments/commentForm.php", {
                    idpro: <?= $id ?>
                });

                //khai báo id để khi vào form bình luân có thể sử dụng dc

            });
        </script>
        <div class="row" id="comment">

        </div>
        <div class="row mb">
            <div class="boxtitle">SẢN PHẨM CÙNG LOẠI</div>
            <div class="row boxcontent">
                <ul>
                    <?php
                    // echo '<pre>';
                    // print_r($sp_cungloai);
                    if (!empty($sp_cungloai)) {

                        foreach ($sp_cungloai as $item) {
                            $link = 'index.php?act=sanphamct&id=' . $item['id'];
                            echo '<li><a href="' . $link . '">' . $item['name'] . '</a></li>';
                        }
                    } else {
                        echo "<h2>Không có sản phẩm cùng loại.</h2>";
                    }
                    ?>
                </ul>

            </div>
        </div>
    </div>
    <div class="boxphai">
        <?php include 'boxright.php'; ?>
    </div>
</div>