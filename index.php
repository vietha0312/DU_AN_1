<?php

include "view/head.php";
include "model/pdo.php";
include "model/sanpham.php";
include "model/loai.php";
include "model/nguoidung.php";
include "model/giohang.php";
include "model/hoadon.php";


// kiểm tra session my cart đã tồn tại là 1 mảng chưa, nếu chưa thì khởi tạo 1 mảng mới
if (!isset($_SESSION['mycart']))
    $_SESSION['mycart'] = [];

//load sản phẩm trang client
$prohome = loadall_pro_home();

//load danh mục trang client
$listcate = loadall_cate();

//load 8 sản phẩm nổi bật
$list_topsp = loadall_pro_noibat();

//load sản phẩm bán chạy
$list_bestsp =  loadall_pro_best();

//Lấy lại mật khẩu


include "view/header.php";

// kiểm tra có act tương ứng với key người dùng click không, nếu có act thì thực hiện các case 
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'product':
            if (isset($_POST['kyw']) && ($_POST['kyw']) != "") {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = " ";
            }
            if (isset($_GET['idcate']) && ($_GET['idcate']) > 0) {
                $idcate = $_GET['idcate'];
            } else {
                $idcate = 0;
            }
            $listpro = loadall_pro($kyw, $idcate);
            $namecate = load_namecate($idcate);
            include "view/sanpham/sanpham.php";
            break;
        case 'prodetail':
            if (isset($_GET['idpro']) && $_GET['idpro'] > 0) {
                $id_pro = $_GET['idpro'];
                $one_pro = loadone_pro($id_pro);
                extract($one_pro);
                $similar_pro = similar_pro($id_pro, $idcate);
                include "view/sanpham/sanphamct.php";

                $seekey = 'post_' . $id_pro;
                error_reporting(0);
                $sessionView = $_SESSION[$seekey];
                error_reporting(E_ALL);
                if (!$sessionView) {
                    $_SESSION[$seekey] = "1";
                    updateview($id_pro);
                } else {
                    break;
                }
            } else {
                include "view/sanpham/sanpham.php";
            }
            break;

            // CONTROLLER ĐĂNG KÝ TÀI KHOẢN:

        case "register":

            break;
            // CONTROLLER ĐĂNG NHẬP TÀI KHOẢN:

        case "login":
            break;
            // đăng xuất tài khoản: 
        case 'logout':

            break;

            //Quên mật khẩu:
            //Form cách thức lấy lại mật khẩu
        case 'mk':

            break;

            //Lấy lại mật khẩu thông qua User_name và Email_user
        case "usermk":
            break;
            // Quên mật khẩu: Lấy lại mật khẩu thông qua mã xác nhận được gửi vào email
        case 'forgotPass':
            break;
            // Quên mật khẩu: Nhập mã xác minh mã được gửi qua Email
        case 'verification':
            include "view/nguoidung/verification.php";
            break;

            // Quên mật khẩu: Tạo mật khẩu mới để đăng nhập
        case 'changePass':
            break;

            // CONTROLLER THÔNG TIN TÀI KHOẢN: 
            // thông tin tài khoản
        case 'myaccount':
            break;


            // CONTROLLER GIỎ HÀNG:   
            // xem giỏ hàng
        case 'viewcart':
            include "view/giohang/viewcart.php";
            break;
        case "edit":
            // $total_price = 0;
            foreach ($_SESSION['mycart'] as $k => $v) {
                if ($_POST["code"] == $k) {
                    if ($_POST["quantity"] == '0') {
                        array_splice($_SESSION['mycart'], $k, 1);
                    } else {
                        $_SESSION['mycart'][$k][4] = $_POST["quantity"];
                        $_SESSION['mycart'][$k][5] = $_SESSION['mycart'][$k][3] * $_SESSION['mycart'][$k][4];
                    }
                }
            }
            break;
            // thêm vào giỏ hàng
        case 'addtocart':

            break;
            // xóa sản phẩm trong giỏ hàng
        case 'removecart':
            if (isset($_GET['idcart'])) {
                $idcart = $_GET['idcart'];
                array_splice($_SESSION['mycart'], $idcart, 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            header('location: index.php?act=viewcart');
            break;
            // tạo bill 
        case 'bill':
            if (isset($_SESSION['errorMessage'])) {
                echo "<script type='text/javascript'>
                        alert('" . $_SESSION['errorMessage'] . "');
                      </script>";
                unset($_SESSION['errorMessage']);
            }
            include "view/giohang/bill.php";
            break;
        case 'pay':
            include "view/qr.php";
            break;

        default:
            include "view/content.php";
            break;
    }
} else {
    include "view/content.php";
}

include "view/footer.php";
