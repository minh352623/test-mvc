<?php
function add_order(
    $name,
    $email,
    $address,
    $tel,
    $ngaydathang,
    $tongbill,
    $pttt,
    $idsp,
    $isUser
) {
    $sql = "insert into orders (order_name,order_address,order_tel,order_email,order_pttt,ngaydathang,total,id_user,idsp) values ('$name','$address','$tel','$email','$pttt','$ngaydathang','$tongbill','$isUser','$idsp')";
    return pdo_execute_lastInsertID($sql);
}
function load_one_order($idOrder)
{
    $sql = "select * from orders where id=" . $idOrder;
    $order = pdo_query_one($sql);
    return $order;
}
function load_all_order($idUser = 0, $filter = "")
{
    $sql = "select * from orders where 1";
    if ($idUser > 0) {

        $sql .= " and id_user=" . $idUser;
    }
    if ($filter != "") {
        $sql .= " and (order_name like '%" . $filter . "%'  or order_email like '%" . $filter . "%' or order_address like '%" . $filter . "%')";
    }
    $sql .= " order by id desc";
    $order = pdo_query($sql);
    return $order;
}

function delete_dh($id)
{
    $sql = "delete from orders where id=" . $id;
    pdo_execute($sql);
}
