<?php
function add_cate($name_cate)
{
    $sql = "INSERT INTO category (name_cate) VALUES ('$name_cate')";
    pdo_execute($sql);
}
function loadall_cate()
{
    $sql = "SELECT * FROM category ORDER BY id_cate DESC";
    $ds_loai = pdo_query($sql);
    return $ds_loai;
}
function loadone_cate($id_cate)
{
    $sql = "SELECT * FROM category WHERE id_cate =" . $id_cate;
    $one_loai = pdo_query_one($sql);
    return $one_loai;
}
function capnhat_cate($id_cate, $name_cate)
{
    $sql = "UPDATE category SET name_cate = '$name_cate' WHERE id_cate=" . $id_cate;
    pdo_execute($sql);
}
function delete_cate($id_cate)
{
    $sql = "DELETE FROM category WHERE id_cate=" . $id_cate;
    pdo_execute($sql);
}
