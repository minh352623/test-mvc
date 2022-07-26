<?php
include '../model/pdo.php';
include './header.php';
include '../model/modeldm.php';
include '../model/modelsanpham.php';
include '../model/taikhoan.php';
include '../model/comments.php';
include '../model/cart.php';
include '../model/orders.php';
//controller

if (isset($_GET['act'])) {
    $act = $_GET['act'];


    switch ($act) {
            //controller danh muc
        case "adddm":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                if ($tenloai != "") {

                    add_dm($tenloai);
                    $thongbao = "Thêm thành công!";
                } else {
                    $thongbao = "Thêm thất bại. Dữ liệu không được rỗng";
                }
            }

            include './danhmuc/add.php';
            break;

        case "listdm":
            $listDanhMuc = loadListDm();
            include './danhmuc/list.php';
            break;
        case "xoadm":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                delete_dm($id);
            }
            $listDanhMuc = loadListDm();

            include './danhmuc/list.php';
            break;
        case 'suadm':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $dm = loadOneDm($id);
            }
            include './danhmuc/updatedm.php';
            break;

        case "updatedm":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $tenloai = $_POST['tenloai'];
                if ($tenloai != "") {

                    updateDm($tenloai, $id);
                    $thongbao = "Cập nhật thành công!";
                } else {
                    $thongbao = "Thêm thất bại. Dữ liệu không được rỗng";
                }
            }
            $listDanhMuc = loadListDm();

            include './danhmuc/list.php';
            break;

            //controller sp
        case "addsp":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $iddm = $_POST['iddm'];

                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $motasp = $_POST['motasp'];
                $fileName = $_FILES['hinhsp']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinhsp"]["name"]);
                if (move_uploaded_file($_FILES["hinhsp"]["tmp_name"], $target_file)) {
                    // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }

                $listDanhMuc = loadListDm();

                add_Sp($tensp, $giasp, $motasp, $fileName, $iddm);
                $thongbao = "Thêm thành công!";
            }
            $listDanhMuc = loadListDm();

            include './sanpham/add.php';
            break;

        case "listsp":
            if (isset($_POST['filter']) && ($_POST['filter'])) {
                $keyword = $_POST['keyword'];
                $iddm = $_POST['iddm'];
            } else {
                $keyword = "";
                $iddm = 0;
            }
            $listDanhMuc = loadListDm();

            $listSanPham = loadListSp($keyword, $iddm);
            include './sanpham/list.php';
            break;
        case "xoasp":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                delete_Sp($id);
            }
            $listSanPham = loadListSp();

            include './sanpham/list.php';
            break;
        case 'suasp':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $sp = loadOneSp($id);
            }
            $listDanhMuc = loadListDm();

            include './sanpham/update.php';
            break;

        case "updatesp":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];

                $iddm = $_POST['iddm'];

                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $motasp = $_POST['motasp'];
                $fileName = $_FILES['hinhsp']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinhsp"]["name"]);
                if (move_uploaded_file($_FILES["hinhsp"]["tmp_name"], $target_file)) {
                    // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }

                updatesp(
                    $id,
                    $iddm,
                    $tensp,
                    $giasp,
                    $motasp,
                    $fileName
                );
                $thongbao = "Cập nhật thành công!";
                $thongbao = "Thêm thất bại. Dữ liệu không được rỗng";
            }
            $listDanhMuc = loadListDm();
            $listSanPham = loadListSp();

            include './sanpham/list.php';
            break;
        case 'dskh':
            $listUsers  = loadALLUser();

            include './users/lists.php';
            break;
        case 'dsbl':
            $listComments  = loadALLComment(0);

            include './comment/lists.php';
            break;
        case 'bill':
            if (isset($_POST['filter']) && ($_POST['filter'])) {
                $filter = $_POST['keyword'];
            } else {
                $filter = "";
            }
            $listbill = load_all_order(0, $filter);
            include './bill/lists.php';
            break;
        case "xoadh":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                delete_dh($id);
            }
            $listbill = load_all_order(0, "");
            include './bill/lists.php';
            break;
        case "thongke":

            $listtk = load_all_thongke();
            include './thongke/lists.php';
            break;
        case "bieudo":

            $listtk = load_all_thongke();
            include './thongke/bieudo.php';
            break;
        default:
            $listtk = load_all_thongke();

            include './home.php';

            break;
    }
} else {
    $listtk = load_all_thongke();

    include './home.php';
}


include './footer.php';
