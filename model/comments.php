<?php

function add_comment($id_user, $is_sp, $message, $create_at)
{
    $sql = "insert into comment (id_user,id_sp,message,create_at) values ('$id_user','$is_sp','$message','$create_at')";
    pdo_execute($sql);
}

function loadALLComment($idPro)
{
    $sql = "select * from comment where 1";
    if ($idPro > 0) {
        $sql .= " and id_sp='" . $idPro . "' order by id desc";
    } else {
        $sql .= " order by id desc";
    }
    $listComment = pdo_query($sql);
    return $listComment;
}
