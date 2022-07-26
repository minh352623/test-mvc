<?php
function add_taikhoan($email, $fullname, $pass)
{
    $sql = "insert into users (email,fullname,password) values ('$email','$fullname','$pass')";
    pdo_execute($sql);
}
function load_one_user($fullName, $pass)
{
    $sql = "select * from users where fullname='" . $fullName . "' and password='" . $pass . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function load_one_user_id($id)
{
    $sql = "select * from users where id='" . $id . "'";
    $user = pdo_query_one($sql);
    return $user;
}
function check_email($email)
{
    $sql = "select * from users where email='" . $email . "'";
    $user = pdo_query_one($sql);
    return $user;
}
function update_tk(
    $id,
    $pass,
    $fullname,
    $email,
    $address,
    $tel
) {


    $sql = 'update users set fullname="' . $fullname . '",email="' . $email . '",password="' . $pass . '",address="' . $address . '",tel="' . $tel . '" where id=' . $id;
    pdo_execute($sql);
}
function loadALLUser()
{
    $sql = "select * from users order by id desc";
    $listUsers = pdo_query($sql);
    return $listUsers;
}
