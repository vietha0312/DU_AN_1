<?php
session_start();
ob_start();
include "view/head.php";
include "model/pdo.php";
include "model/sanpham.php";
include "model/loai.php";
include "model/nguoidung.php";
include "model/giohang.php";
include "model/hoadon.php";
include "model/question.php";

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
            if (isset($_POST['btn_register']) && $_POST['btn_register']) {
                $user_name = $_POST['user_name'];
                $full_name = $_POST['full_name'];
                $email_user = $_POST['email_user'];
                $password = $_POST['password'];
                register($user_name, $full_name, $email_user, $password);

                header("Location: index.php?act=login");
                echo '<script>alert("Đăng ký tài khoản thành công! Vui lòng đăng nhập")</script>';
            }
            include "view/nguoidung/register.php";
            break;


        case "login":
            if (isset($_POST['btn_login']) && $_POST['btn_login']) {
                $user_name = $_POST['user_name'];
                $password = $_POST['password'];
                $check_user = check_user($user_name, $password);
                if (is_array($check_user)) {
                    $_SESSION['user'] = $check_user;
                    header('Location: index.php');
                    echo '<script>alert("Đăng nhập thành công!")</script>';
                } else {
                    echo '<script>alert("Tài khoản sai hoặc không tồn tại!")</script>';
                }
            }
            include "view/nguoidung/login.php";
            break;

        case 'logout':
            session_unset();
            header('Location: index.php?act=login');
            break;


        case 'mk':
            include "view/nguoidung/cachthuclaymk.php";
            break;

        case "usermk":
            if (isset($_POST['mk2']) && ($_POST['mk2'])) {
                $name = $_POST['user_name'];
                $email = $_POST['email'];
                $checkuser = check_pass($name, $email);
                if (is_array($checkuser)) {
                    $thongbao = '<p class="text-success"> Mật khẩu của tài khoản "' . $name . '" là: <span class="fw-bold">' . $checkuser['password'] . '</span></p>';
                } else {
                    $thongbao = '<p class="text-danger fw-bold">Tài khoản hoặc Email không tồn tại! Vui lòng kiểm tra lại</p>';
                }
            }
            include "view/nguoidung/laymk2.php";
            break;

        case 'forgotPass':
            if (isset($_POST['btn_forgotPass'])) {
                $error = array();
                $email = $_POST['email'];
                if ($email == "") {
                    $error['email'] = 'Không để trống Email!';
                }
                if (empty($error)) {
                    $result = getUserEmail($email);
                    $code = substr(rand(0, 999999), 0, 6);
                    $title = "Tìm lại mật khẩu của bạn";
                    $content = "<p>Xin chào, chúng tôi đã nhận được yêu cầu đặt lại mật khẩu UltraPhone của bạn.<br>
                                Nhập mã sau đây để đặt lại mật khẩu: <span style='color: black; font-weight: 600'>" . $code . "</span></p>";
                    $mail->sendMail($title, $content, $email);
                    $_SESSION['mail'] = $email;
                    $_SESSION['code'] = $code;
                    header('Location: index.php?act=verification');
                }
            }
            include 'view/nguoidung/forgotpass.php';
            break;
            // Quên mật khẩu: Nhập mã xác minh mã được gửi qua Email
        case 'verification':
            include "view/nguoidung/verification.php";
            break;

            // Quên mật khẩu: Tạo mật khẩu mới để đăng nhập
        case 'changePass':
            if (isset($_POST['btn_changePass'])) {
                $error = array();
                $password = $_POST['newpass'];
                $email = $_SESSION['mail'];
                if ($_POST['repass'] != $_POST['newpass']) {
                    $error['fail'] = 'Nhập lại mật khẩu không khớp !';
                } else {
                    $user = forgetPass($password, $email);
                    //  echo '<script>alert("Đổi mật khẩu thành công! Vui lòng đăng nhập")</script>';
                    header("location: index.php?act=login");
                    $noti_success = "Đổi mật khẩu thành công! Vui lòng đăng nhập để mua hàng và thực hiện các chức năng khác.";
                }
            }
            include "view/nguoidung/changePass.php";
            break;

            // CONTROLLER THÔNG TIN TÀI KHOẢN: 
            // thông tin tài khoản

        case 'myaccount':
            if (isset($_SESSION['user'])) {
                if (isset($_POST['btn_change']) && ($_POST['btn_change'])) {
                    $id_user = $_POST['id_user'];
                    $full_name = $_POST['full_name'];
                    $user_name = $_SESSION['user']['user_name'];
                    $password = $_SESSION['user']['password'];
                    $sex = $_POST['sex'];
                    $email_user = $_POST['email_user'];
                    $address = $_POST['address'];
                    $phone_user = $_POST['phone_user'];
                    $img_user = $_FILES['img_user']['name'];
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["img_user"]["name"]);
                    move_uploaded_file($_FILES["img_user"]["tmp_name"], $target_file);
                    update_user($id_user, $img_user, $full_name, $sex, $email_user, $address, $phone_user);
                    $_SESSION['user'] = check_user($user_name, $password);
                    echo '<script>alert("Thay đổi thông tin thành công!")</script>';
                    // header("location: index.php?act=myaccount");
                }
                if (isset($_POST['btn_pass'])) {
                    $user_name = $_SESSION['user']['user_name'];
                    $password = $_POST['newpass'];
                    if ($password == "") {
                        echo '<script>alert("Không được để trống mật khẩu mới !")</script>';
                    } elseif ($_POST['repass'] != $_POST['newpass']) {
                        echo '<script>alert("Nhập lại mật khẩu không khớp !")</script>';
                    } else {
                        $pass = updatePass($user_name, $password);
                        echo '<script>alert("Đổi mật khẩu thành công !")</script>';
                    }
                }
            } else {
                header("Location: ?act=login");
            }
            $list_mybill = loadall_bill($_SESSION['user']['id_user']);
            include "view/nguoidung/myaccount.php";
            break;

        case 'viewcart':
            include "view/giohang/viewcart.php";
            break;

        case "edit":

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
        case 'addtocart':
            if (isset($_POST['addtocart']) && $_POST['addtocart']) {
                $id_pro = $_POST['id_pro'];
                $name_pro = $_POST['name_pro'];
                $img_pro = $_POST['img_pro'];
                $price = $_POST['price'];
                $check = 0;
                if (isset($_POST['quatity']) && $_POST['quatity'] >= 1) {
                    $quantity = $_POST['quatity'];
                } else {
                    $quantity = 1;
                }
                foreach ($_SESSION['mycart'] as $k => $w) {
                    if ($id_pro == $_SESSION['mycart'][$k][0]) {
                        $sl = $_SESSION['mycart'][$k][4];
                        $_SESSION['mycart'][$k][4] = $sl + $quantity;
                        $_SESSION['mycart'][$k][5] = $_SESSION['mycart'][$k][3] * $_SESSION['mycart'][$k][4];
                        header("location: index.php?act=viewcart");
                        $check = 1;
                    }
                }
                if ($check == 0) {
                    $total = $price * $quantity;
                    $add_pro = [$id_pro, $name_pro, $img_pro, $price, $quantity, $total];
                    array_push($_SESSION['mycart'], $add_pro);
                    header("location: index.php?act=viewcart");
                }
            }
            include "view/giohang/viewcart.php";
            break;


        case 'removecart':
            if (isset($_GET['idcart'])) {
                $idcart = $_GET['idcart'];
                array_splice($_SESSION['mycart'], $idcart, 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            header('location: index.php?act=viewcart');
            break;

        case 'bill':
            if (isset($_SESSION['errorMessage'])) {
                echo "<script type='text/javascript'>
                            alert('" . $_SESSION['errorMessage'] . "');
                          </script>";
                unset($_SESSION['errorMessage']);
            }
            include "view/giohang/bill.php";
            break;

        default:
            include "view/content.php";
            break;
    }
} else {
    include "view/content.php";
}

include "view/footer.php";
ob_end_flush();
