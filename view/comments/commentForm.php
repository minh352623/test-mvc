<?php
session_start();
date_default_timezone_set(
    'Asia/Ho_Chi_Minh'
);
include '../../model/pdo.php';
include '../../model/comments.php';
include '../../model/taikhoan.php';
$idpro = $_REQUEST['idpro'];
if (isset($_SESSION['user'])) {

    $idUser = $_SESSION['user']['id'];
}
$listComment = loadALLComment($idpro);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>




    <div class="row mb">
        <div class="boxtitle" id="comment_smooth">BÌNH LUẬN</div>
        <div class="boxcontent comment">
            <div>
                <?php
                // echo "bình luận ở đây: " . $idpro;
                foreach ($listComment as $item) {
                    $info_user = load_one_user_id($item['id_user']);
                    echo '<div>';
                    $linkDm = 'index.php?act=sanpham&iddm=' . $item['id'];
                    echo '<span>' . $item['message'] . '</span>';
                    echo '<span class="info_comment">';
                    echo '<span>' . $info_user['fullname'] . '</span>';
                    echo '<span>' . $item['create_at'] . '</span>';
                    echo '</span>';

                    echo '</div>';
                }
                ?>

            </div>
        </div>
        <div class="boxfooter searbox">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="form_search_sp">
                <input type="text" name="message">
                <input type="hidden" name="idpro" value="<?= $idpro ?>">
                <input type="hidden" name="idUser" value="<?= $idUser ?>">

                <input type="submit" class="btn_search" name="comment" value="Bình Luận">
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['comment']) && $_POST['comment']) {
        $idpro = $_POST['idpro'];
        $id_user = $_POST['idUser'];
        $message = $_POST['message'];
        $create_at = date('Y-m-d H:i:s');
        add_comment($id_user, $idpro, $message, $create_at);
        header("Location: " . $_SERVER['HTTP_REFERER'] . "#comment_smooth");
    }

    ?>

</body>

</html>