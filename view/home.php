<div class="row mb ">
    <div class="boxtrai mr">
        <div class="row">
            <div class="banner">
                <!-- <img src="images/banner.jpg" alt=""> -->
                <!-- Slideshow container -->
                <div class="slideshow-container">

                    <!-- Full-width images with number and caption text -->
                    <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <img src="view/images/banner11.jpg" style="width:100%">
                        <div class="text">Caption Text</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img src="view/images/banner22.jpg" style="width:100%">
                        <div class="text">Caption Two</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <img src="view/images/banner33.jpg" style="width:100%">
                        <div class="text">Caption Three</div>
                    </div>

                    <!-- Next and previous buttons -->
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <br>

                <!-- The dots/circles -->
                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $i = 0;
            foreach ($listSpHome as $item) {
                $linksp = 'index.php?act=sanphamct&id=' . $item['id'];
                if ($i == 2 || $i == 5 || $i == 8) {
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
    <div class="boxphai">
        <?php include 'boxright.php'; ?>
    </div>
</div>