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
    }
} else {
}
