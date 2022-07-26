<?php
session_start();
ob_start();
date_default_timezone_set(
    'Asia/Ho_Chi_Minh'
);
include "model/pdo.php";
include 'model/session.php';
include "model/modelsanpham.php";
include 'model/modeldm.php';
include 'model/taikhoan.php';
include 'model/cart.php';
include 'model/orders.php';
include './global.php';
include "./view/header.php";
if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = [];
}
if (isset($_SESSION['user'])) {
    $infoUser = $_SESSION['user'];
    // print_r($infoUser['id']);
}
$listSpHome = loadListSp_home();
$danhmucList = loadListDm();
$listTop10 = loadListSp_top10();
if (isset($_GET['act']) && $_GET['act']) {
    $act = $_GET['act'];
    switch ($act) {
        case "about":
            include "view/about/about.php";
            break;
        case "contact":
            include "view/contact/contact.php";
            break;
        case "sanphamct":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $sp = loadOneSp($id);
                $sp_cungloai = loadListSp_sp_cungloai($id, $sp['idDm']);
                include "view/chitietsp.php";
            } else {
                include "./view/home.php";
            }
            break;
        case "sanpham":

            if (isset($_POST['search']) && isset($_POST['search'])) {

                if (isset($_POST['keyword']) && $_POST['keyword'] != "") {
                    $keyword = $_POST['keyword'];
                } else {
                    $keyword = "";
                }
            } else {
                $keyword = "";
            }
            if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $listSpDm = loadListSp($keyword, $iddm);
            $nameDm = loadNameDm($iddm);
            include "view/sanpham_danhmuc.php";
            break;
        case "dangki":
            if (isset($_POST['dangky']) && isset($_POST['dangky'])) {
                $email = $_POST['email'];
                $pass = $_POST['password'];
                $fullname = $_POST['fullname'];
                add_taikhoan($email, $fullname, $pass);
                $thongbao = "Đăng ký thành công. Bạn có thể đăng nhập ngay bây giờ.";
            }

            include "./view/taikhoan/dangki.php";
            break;
        case "dangnhap":
            if (isset($_POST['dangnhap']) && isset($_POST['dangnhap'])) {
                $pass = $_POST['pass'];
                $fullname = $_POST['user'];
                $checkUser = load_one_user($fullname, $pass);
                if (is_array($checkUser)) {
                    $_SESSION['user'] = $checkUser;
                    // $thongbao = "Đăng nhập thành công.";    
                    header('Location: index.php');
                } else {
                    $thongbao = "Tài khoản không tồn tại.";
                }
            }

            break;
        case "edit_taikhoan":
            if (isset($_POST['capnhat']) && isset($_POST['capnhat'])) {
                $pass = $_POST['password'];
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];
                update_tk(
                    $id,
                    $pass,
                    $fullname,
                    $email,
                    $address,
                    $tel
                );
                header('Location: index.php?act=edit_taikhoan');
                $_SESSION['thongbao'] = "Cập nhật thành công.";
                $_SESSION['user'] = load_one_user($fullname, $pass);
            }
            include "./view/taikhoan/edit.php";

            break;
        case "quenmk":
            if (isset($_POST['guiemail']) && isset($_POST['guiemail'])) {

                $email = $_POST['email'];

                $checkEmail =  check_email($email);
                if (is_array($checkEmail)) {
                    $thongbao = "Mật khẩu của bạn là: " . $checkEmail['password'];
                } else {
                    $thongbao = "Email này không tồn tại!";
                }
            }
            include "./view/taikhoan/quenmk.php";

            break;
        case "thoat":
            session_unset();
            header("Location: index.php");
            break;
        case "addcart":
            if ((isset($_POST['addtocart'])) && ($_POST['addtocart'])) {
                $idUser = $infoUser['id'];
                $idItem = $_POST['id'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $image = $_POST['image'];
                $soluong = 1;
                $thanhtien = $soluong * $price;
                add_cart(
                    $idUser,
                    $idItem,
                    $name,
                    $price,
                    $image,
                    $soluong,
                    $thanhtien
                );
                // echo "abc";
                // print_r($_POST['addtocart']);

                // unset($_POST['addtocart']);
            }
            $listCart = loadALLCart($infoUser['id']);

            include './view/cart/viewcart.php';
            break;
        case "delcart":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                delete_cart($id);
            }
            $listCart = loadALLCart($infoUser['id']);


            include './view/cart/viewcart.php';

            break;
        case "bill":
            $listCart = loadALLCart($infoUser['id']);


            include './view/cart/bill.php';

            break;
        case "billconfirm":
            if ((isset($_POST['dongydathang'])) && ($_POST['dongydathang'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $pttt = $_POST['pttt'];
                $idsp = [];
                $listCart = loadALLCart($infoUser['id']);
                foreach ($listCart as $item) {
                    array_push($idsp, $item['id_sp']);
                }

                $ngaydathang = date('Y-m-d H:i:s');
                $tongbill = sumMoney($infoUser['id']);
                if (count($idsp) > 0) {

                    $idOrder = add_order(
                        $name,
                        $email,
                        $address,
                        $tel,
                        $ngaydathang,
                        $tongbill,
                        $pttt,
                        json_encode($idsp),
                        $infoUser['id']
                    );
                    $oneOrder = load_one_order($idOrder);
                } else {
                    $thongbao = "Đơn hàng không được rỗng!";
                }
            }
            include './view/cart/billconfirm.php';





            break;
        case "mybill":
            $listBill = load_all_order($infoUser['id'], "");


            include './view/cart/mybill.php';

            break;
        case "donhangct":

            if (isset($_GET['id']) && $_GET['id']) {

                $oneOrder = load_one_order($_GET['id']);
                include './view/cart/billconfirm.php';
            }




            break;
        default:
            include "./view/home.php";
            break;
    }
} else {
    include "./view/home.php";
}
include "./view/footer.php";
