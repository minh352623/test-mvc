<?php

function add_cart(
    $idUser,
    $idItem,
    $name,
    $price,
    $image,
    $soluong,
    $thanhtien
) {
    $sql = "insert into carts (idUser,id_sp,namesp,pricesp,image,soluong,thanhtien) values ('$idUser','$idItem','$name','$price','$image','$soluong','$thanhtien')";
    pdo_execute($sql);
}
function loadOnecart($id)
{
    $sql = "select * from sanpham where id=" . $id;
    $cart = pdo_query_one($sql);
    return $cart;
}

function loadALLCart($idUser)
{
    $sql = "select * from carts where idUser='" . $idUser . "' order by id desc";

    $listCart  = pdo_query($sql);
    return $listCart;
}
function delete_cart($id)
{
    $sql = "delete from carts where id=" . $id;
    pdo_execute($sql);
}
function viewsCart($listCart)
{
    global $path_img;
    $tongtien = 0;
    if (is_array($listCart)) {

        foreach ($listCart as $item) {

            $xoa = "index.php?act=delcart&id=" . $item['id'];
            $img = $path_img . $item['image'];
            $tongtien += $item['thanhtien'];
            echo '
    <tr>
    <td height="80px"><img src="' . $img . '" height="80px" alt=""></td>
    <td>' . $item['namesp'] . '</td>
    <td>' . $item['pricesp'] . '</td>
    <td>' . $item['soluong'] . '</td>
    <td>' . $item['thanhtien'] . 'VNĐ</td>
    <td><a href="' . $xoa . '"> <input type="button" value="Xóa"></a></td>

</tr>
        ';
        }
    }
}
function views_one_Cart($item)
{
    global $path_img;
    $tongtien = 0;


    $img = $path_img . $item['image'];
    $tongtien += $item['price'];
    echo '
    <tr>
    <td height="80px"><img src="' . $img . '" height="80px" alt=""></td>
    <td>' . $item['name'] . '</td>
    <td>' . $item['price'] . '</td>
    <td>1</td>
    <td>' . $item['price'] . 'VNĐ</td>

</tr>
        ';
}
function sumMoney($id)
{
    $listCart = loadALLCart($id);
    $sum = 0;
    foreach ($listCart as $item) {
        $sum += $item['thanhtien'];
    }
    return $sum;
}
function get_ttdh($n)
{
    switch ($n) {
        case "0":
            $tt = "Đơn chờ duyệt";
            break;
        case "1":
            $tt = "Đơn giao";

            break;
        case "2":
            $tt = "Đã giao";

            break;
        default:
            break;
    }
    return $tt;
}
function get_pttt($n)
{
    switch ($n) {
        case "1":
            $tt = "Trả tiền sau khi nhận hàng";
            break;
        case "2":
            $tt = "Chuyển Khoản Ngân Hàng";

            break;
        case "3":
            $tt = "Thanh Toán Online";

            break;
        default:
            break;
    }
    return $tt;
}
function load_all_thongke()
{
    $sql = "select danhmuc.id,danhmuc.name,count(sanpham.id) as count_sp,min(sanpham.price) as min_price,max(sanpham.price) as max_price,avg(sanpham.price) as avg_price";
    $sql .= " from sanpham inner join danhmuc on danhmuc.id = sanpham.idDm";
    $sql .= " group by danhmuc.id order by danhmuc.id desc";

    $listTk  = pdo_query($sql);
    return $listTk;
}
