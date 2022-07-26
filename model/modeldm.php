<?php
function add_dm($tenloai)
{
    $sql = "insert into danhmuc (name) values ('$tenloai')";
    pdo_execute($sql);
}
function delete_dm($id)
{
    $sql = "delete from danhmuc where id=" . $id;
    pdo_execute($sql);
}
function loadListDm()
{
    $sql = "select * from danhmuc order by id desc";
    $listDanhMuc = pdo_query($sql);
    return $listDanhMuc;
}
function loadNameDm($iddm)
{
    if ($iddm > 0) {

        $sql = "select * from danhmuc where id=" . $iddm;
        $listDanhMuc = pdo_query_one($sql);
        extract($listDanhMuc);
        return $name;
    } else {
        return "";
    }
}
function loadOneDm($id)
{
    $sql = "select * from danhmuc where id=" . $id;
    $dm = pdo_query_one($sql);
    return $dm;
}
function updateDm($tenloai, $id)
{
    $sql = 'update danhmuc set name="' . $tenloai . '" where id=' . $id;
    pdo_execute($sql);
}
