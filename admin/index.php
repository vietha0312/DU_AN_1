<?php
session_start();
require_once "controller/controller.php";




// include "view/list_category.php";

include "model/pdo.php";
include "model/bill.php";
include "model/category.php";
include "model/thongke.php";
include "model/user.php";
include "model/comment.php";
include "model/product.php";



if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case '/':

        case "list_product":



            if (isset($_POST['btn_filter']) && ($_POST['btn_filter'])) {
                $idcate = $_POST['idcate'];
            } else {
                $idcate = 0;
            }
            $ds_loai = loadall_cate();
            $listpro = loadall_pro($idcate);
            render(
                "list_product",
                ['ds_loai' => $ds_loai, 'listpro' => $listpro]
            );




            break;



        case "add_product":


            if (isset($_POST['btn_add']) && ($_POST['btn_add'])) {

                $name_pro = $_POST['name_pro'];
                $price = $_POST['price'];
                $discount = $_POST['discount'];
                $short_des = $_POST['short_des'];
                $detail_des = $_POST['detail_des'];
                $idcate = $_POST['idcate'];
                $img_pro = $_FILES['img_pro']['name'];
                $target_dir = "./uploads/";
                $target_file = $target_dir . basename($_FILES["img_pro"]["name"]);
                $extension = pathinfo($img_pro, PATHINFO_EXTENSION);

                $allowed_extensions = array("jpg", "jpeg", "png", "gif");

                (move_uploaded_file($_FILES["img_pro"]["tmp_name"], $target_file));
                if ($name_pro == null || $price == null || $short_des == null || $idcate == null) {
                    echo '<script>alert("Vui lòng nhập đầy đủ nội dung !")</script>';
                } elseif ($price <= 0) {
                    echo '<script>alert("Giá nhập không đúng !")</script>';
                } elseif (!in_array($extension, $allowed_extensions)) {
                    echo '<script>alert("File ảnh không phù hợp !")</script>';
                } else {
                    add_pro($name_pro, $price, $discount, $img_pro, $short_des, $detail_des, $idcate);
                    echo '<script>alert("Thêm sản phẩm thành công !")</script>';
                }
            }
            $ds_loai = loadall_cate();
            render(
                'add_product',
                ['ds_loai' => $ds_loai]
            );


            break;
        case "delete_product":


            if (isset($_GET['id_pro']) && ($_GET['id_pro']) > 0) {
                $id_pro = $_GET['id_pro'];
                remove_pro($id_pro);
            }
            header('location:index.php?act=list_product');
            break;
        case "edit_product":


            if (isset($_GET['id_pro']) && $_GET['id_pro'] > 0) {
                $id_pro = $_GET['id_pro'];
                $pro = loadone_pro($id_pro);
            }

            $ds_loai = loadall_cate();
            render(
                'update_product',
                ['ds_loai' => $ds_loai, 'pro' => $pro]
            );


            break;
        case "update_product":
            if (isset($_POST['btn_update']) && $_POST['btn_update'] > 0) {
                $id_pro = $_POST['id_pro'];
                $idcate = $_POST['idcate'];
                $name_pro = $_POST['name_pro'];
                $price = $_POST['price'];
                $discount = $_POST['discount'];
                $short_des = $_POST['short_des'];
                $detail_des = $_POST['detail_des'];
                $img_pro = $_FILES['img_pro']['name'];
                $target_dir = "./uploads/";
                $target_file = $target_dir . basename($_FILES["img_pro"]["name"]);
                (move_uploaded_file($_FILES["img_pro"]["tmp_name"], $target_file));
                update_pro($id_pro, $name_pro, $price, $discount, $short_des, $detail_des, $img_pro, $idcate);
                echo '<script>alert("Cập nhật sản phẩm thành công!")</script>';
                header('location:index.php?act=list_product');
            }
            break;


        case "list_category":


            $ds_loai = loadall_cate();
            render(
                'list_category',
                ['ds_loai' => $ds_loai]
            );


            break;

        case "delete_cate":
            if (isset($_GET['id_cate']) && ($_GET['id_cate'] > 0)) {
                $id_cate = $_GET['id_cate'];
                delete_cate($id_cate);
            }
            header('location:index.php?act=list_category');
            break;
    }
} else {
}
