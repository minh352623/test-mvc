<div class="row mb ">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">SẢN PHẨM - <?php echo '<span style="text-transform: uppercase; font-weight: bold;">' . $nameDm . '</span>' ?></div>
            <div class="row boxcontent">
                <?php
                $i = 0;
                foreach ($listSpDm as $item) {
                    $linksp = 'index.php?act=sanphamct&id=' . $item['id'];
                    if ($i == 2 || $i == 5 || $i == 8 || $i == 11) {
                        $mr = "";
                    } else {
                        $mr = "mr";
                    }
                    $img = $path_img . $item['image'];

                    echo '
                    <div class="boxsp ' . $mr . '">
                    <div class="row img"><a href="' . $linksp . '"><img src="' . $img . '" alt=""></a></div>
                    <div class="price_name">
                    <div>
                    <p>$' . $item['price'] . '</p>
                    <a href="' . $linksp . '">' . $item['name'] . '</a>
                    </div>

                    ';
                    if (isset($_SESSION['user'])) {

                        echo
                        '<div class="row addtocart mb10">
                    <form method="post" action="index.php?act=addcart">
                    <input type="hidden" name="id" value="' . $item['id'] . '">
                    <input type="hidden" name="name" value="' . $item['name'] . '">
                    <input type="hidden" name="image" value="' . $item['image'] . '">
                    <input type="hidden" name="price" value="' . $item['price'] . '">
                    <input type="submit" name="addtocart" value="Thêm vào giỏ hàng">
    
                    </form>
                    </div>
                     ';
                    }


                    echo '</div></div>';
                    $i++;
                }
                ?>
            </div>
        </div>


    </div>
    <div class="boxphai">
        <?php include 'boxright.php'; ?>
    </div>
</div>