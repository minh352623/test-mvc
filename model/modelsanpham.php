<?php
function add_Sp($tensp, $giasp, $motasp, $fileName, $iddm)
{
    $sql = "insert into sanpham (name,price,description,image,idDm) values ('$tensp','$giasp','$motasp','$fileName','$iddm')";
    pdo_execute($sql);
}
function delete_Sp($id)
{
    $sql = "delete from sanpham where id=" . $id;
    pdo_execute($sql);
}
function loadListSp($keyword = "", $iddm = 0)
{
    $sql = "select * from sanpham where 1";
    if ($keyword != "") {
        $sql .= " and name like '%" . $keyword . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and idDm ='" . $iddm . "'";
    }
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadListSp_home()
{
    $sql = "select * from sanpham where 1 order by id desc limit 0,9";

    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadListSp_top10()
{
    $sql = "select * from sanpham where 1 order by view desc limit 0,10";

    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadListSp_sp_cungloai($id, $idDm)
{
    $sql = "select * from sanpham where idDm = '" . $idDm . "' and  id<>" . $id;
    $sp = pdo_query($sql);
    return $sp;
}
function loadOneSp($id)
{
    $sql = "select * from sanpham where id=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}
function updatesp(
    $id,
    $iddm,
    $tensp,
    $giasp,
    $motasp,
    $fileName
) {
    if ($fileName != "") {
        $sql = 'update sanpham set name="' . $tensp . '",price="' . $giasp . '",image="' . $fileName . '",description="' . $motasp . '",idDm="' . $iddm . '" where id=' . $id;
    } else {

        $sql = 'update sanpham set name="' . $tensp . '",price="' . $giasp . '",description="' . $motasp . '",idDm="' . $iddm . '" where id=' . $id;
    }
    pdo_execute($sql);
}
