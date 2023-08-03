<?php
session_start();
require_once "controller/controller.php";
include "model/pdo.php";
include "model/category.php";
include "model/thongke.php";
include "model/hoadon.php";
include "model/product.php";
include "model/user.php";
include "model/binhluan.php";

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case '/':
        case 'dashboard':
            if (isset($_SESSION['admin'])) {
                render('dashboard');
            } else {
                header("location: index.php?act=login");
            }

            break;
        case "list_product":

            if (isset($_SESSION['admin'])) {

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
            } else {
                header("location: index.php?act=login");
            }

            break;



        case "add_product":

            if (isset($_SESSION['admin'])) {
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

                    $errors = array();

                    if (empty($name_pro) || empty($price) || empty($short_des) || empty($idcate)) {
                        $errors[] = "Vui lòng nhập đầy đủ nội dung!";
                    }


                    if (!is_numeric($price) || $price <= 0) {
                        $errors[] = "Giá nhập không đúng!";
                    }


                    if (!in_array($extension, $allowed_extensions)) {
                        $errors[] = "File ảnh không phù hợp!";
                    }

                    if (empty($errors)) {
                        move_uploaded_file($_FILES["img_pro"]["tmp_name"], $target_file);
                        add_pro($name_pro, $price, $discount, $img_pro, $short_des, $detail_des, $idcate);
                        echo '<script>alert("Thêm sản phẩm thành công!")</script>';
                    } else {
                        foreach ($errors as $error) {
                            echo '<script>alert("' . $error . '")</script>';
                        }
                    }
                }

                $ds_loai = loadall_cate();
                render(
                    'add_product',
                    ['ds_loai' => $ds_loai]
                );
            }
            break;
        case "delete_product":
            if (isset($_SESSION['admin'])) {

                if (isset($_GET['id_pro']) && ($_GET['id_pro']) > 0) {
                    $id_pro = $_GET['id_pro'];
                    remove_pro($id_pro);
                }
            }
            header('location:index.php?act=list_product');
            break;
        case "edit_product":

            if (isset($_SESSION['admin'])) {
                if (isset($_GET['id_pro']) && $_GET['id_pro'] > 0) {
                    $id_pro = $_GET['id_pro'];
                    $pro = loadone_pro($id_pro);
                }


                $ds_loai = loadall_cate();
                render(
                    'update_product',
                    ['ds_loai' => $ds_loai, 'pro' => $pro]
                );
            }
            break;
        case "update_product":
            if (isset($_SESSION['admin'])) {
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

                    $errors = array();


                    if (is_product_name_exists($name_pro)) {
                        $errors[] = "Tên sản phẩm đã tồn tại. Vui lòng chọn tên khác!";
                    }


                    if (empty($name_pro) || empty($price) || empty($short_des) || empty($idcate)) {
                        $errors[] = "Vui lòng nhập đầy đủ nội dung!";
                    }


                    if (!is_numeric($price) || $price <= 0) {
                        $errors[] = "Giá nhập không đúng!";
                    }


                    if (!in_array($extension, $allowed_extensions)) {
                        $errors[] = "File ảnh không phù hợp!";
                    }

                    if (empty($errors)) {

                        move_uploaded_file($_FILES["img_pro"]["tmp_name"], $target_file);


                        add_pro($name_pro, $price, $discount, $img_pro, $short_des, $detail_des, $idcate);
                        echo '<script>alert("Thêm sản phẩm thành công!")</script>';
                    } else {
                        foreach ($errors as $error) {
                            echo '<script>alert("' . $error . '")</script>';
                        }
                    }
                }
            }
            $ds_loai = loadall_cate();
            render(
                'add_product',
                ['ds_loai' => $ds_loai]
            );
            break;


        case "list_category":


            $ds_loai = loadall_cate();
            render(
                'list_category',
                ['ds_loai' => $ds_loai]
            );


            break;

        case "delete_cate":
            if (isset($_SESSION['admin'])) {
                if (isset($_GET['id_cate']) && ($_GET['id_cate'] > 0)) {
                    $id_cate = $_GET['id_cate'];
                    delete_cate($id_cate);
                }
            }
            header('location:index.php?act=list_category');
            break;
        case "add_category":
            if (isset($_SESSION['admin'])) {
                if (isset($_POST['btn_add']) && ($_POST['btn_add'])) {
                    $name_cate = $_POST['name_cate'];

                    $errors = array();


                    if (empty($name_cate)) {
                        $errors[] = "Vui lòng nhập đầy đủ thông tin!";
                    }

                    if (empty($errors)) {
                        add_cate($name_cate);
                        echo '<script>alert("Thêm loại thành công!")</script>';
                        header('location:index.php?act=list_category');
                        exit();
                    } else {
                        foreach ($errors as $error) {
                            echo '<script>alert("' . $error . '")</script>';
                        }
                    }
                }

                render('add_category');
            }

            break;
        case "edit_category":

            if (isset($_SESSION['admin'])) {
                if (isset($_GET['id_cate']) && ($_GET['id_cate'] > 0)) {
                    $id_cate = $_GET['id_cate'];
                    $one_loai = loadone_cate($id_cate);
                }

                render(
                    'update_category',
                    ['one_loai' => $one_loai]
                );
            }
            break;
        case "update_category":
            if (isset($_SESSION['admin'])) {
                if (isset($_POST['btn_update']) && ($_POST['btn_update'])) {
                    $id_cate = $_POST['id_cate'];
                    $name_cate = $_POST['name_cate'];
                    capnhat_cate($id_cate, $name_cate);
                }

                header('location:index.php?act=list_category');
            }
            break;
        case 'chart':
            if (isset($_SESSION['admin'])) {
                $liststatis = loadall_statis();
                render(
                    'chart',
                    ['chart' => $liststatis]
                );
            }
            break;
        case 'list_user':

            if (isset($_SESSION['admin'])) {
                $listuser = loadall_user();
                render(
                    'list_user',
                    ['listuser' => $listuser]
                );
            }

            break;
        case 'edit_user':

            if (isset($_SESSION['admin'])) {
                if (isset($_GET['id_user']) && ($_GET['id_user'] > 0)) {
                    $id_user = $_GET['id_user'];
                    $user = loadone_user($id_user);
                }
                render(
                    'update_user',
                    ['user' => $user]
                );
            }
        case 'update_user':
            if (isset($_POST['btn_update']) && ($_POST['btn_update'])) {
                $id_user = $_POST['id_user'];
                $user_name = $_POST['user_name'];
                $full_name = $_POST['full_name'];
                $email_user = $_POST['email_user'];
                $password = $_POST['password'];
                $role = $_POST['role'];
                update_user($id_user, $user_name, $full_name, $email_user, $password, $role);
                echo '<script>alert("Cập nhật tài khoản thành công!")</script>';
            }
            header('location: index.php?act=list_user');
            break;

        case "delete_user":
            if (isset($_SESSION['admin'])) {
                if (isset($_GET['id_user']) && ($_GET['id_user'] > 0)) {
                    $id_user = $_GET['id_user'];
                    delete_user($id_user);
                }
                header('location:index.php?act=list_user');
            }
            break;
        case 'list_bill':

            if (isset($_SESSION['admin'])) {
                $listbill = loadall_bill(0);
                render(
                    'list_bill',
                    ['listbill' => $listbill]
                );
            }
            break;

        case 'edit_bill':
            if (isset($_SESSION['admin'])) {

                if (isset($_GET['idbill']) && ($_GET['idbill']) > 0) {
                    $idbill = $_GET['idbill'];
                    $one_bill = loadone_bill($idbill);
                }
                render(
                    'update_bill',
                    ['one_bill' => $one_bill]
                );
            }

            break;
        case 'update_bill':
            if (isset($_SESSION['admin'])) {

                if (isset($_POST['btn_update']) && ($_POST['btn_update'])) {
                    $id_bill = $_POST['id_bill'];
                    $status = $_POST['status'];
                    $status_pay = $_POST['status_pay'];

                    $one_bill = loadone_bill($id_bill);

                    if ($one_bill['status'] == 3 || $one_bill['status'] == 4) {
                        echo '<script>alert("Không thể cập nhật trạng thái cho đơn hàng đã giao hoặc đã hủy.")</script>';
                        header('location:index.php?act=list_bill');
                        exit;
                    }

                    // If the order is canceled and already paid, do not update the revenue
                    if ($status == 4 && $status_pay == 1) {
                        update_bill($id_bill, $status, $status_pay, false);
                    } else {
                        update_bill($id_bill, $status, $status_pay);
                    }

                    echo '<script>alert("Cập nhật đơn hàng thành công!")</script>';
                    header('location:index.php?act=list_bill');
                }
            }
            break;








        case 'billdetail':
            if (isset($_SESSION['admin'])) {
                if (isset($_GET['idbill']) && ($_GET['idbill']) > 0) {
                    $idbill = $_GET['idbill'];
                    $one_bill = loadone_bill($idbill);
                }
                render(
                    'bill_detail',
                    ['one_bill' => $one_bill]
                );
            }


            break;
        case 'list_cmt':
            if (isset($_SESSION['admin'])) {

                $listcmt = loadall_cmt();
                render(
                    'list_comment',
                    ['listcmt' => $listcmt]
                );
            }
            break;

        case 'delete_cmt':

            if (isset($_SESSION['admin'])) {
                if (isset($_GET['idcmt']) && ($_GET['idcmt']) > 0) {
                    $id_cmt = $_GET['idcmt'];
                    remove_cmt($id_cmt);
                }

                header('location: index.php?act=list_cmt');
            }
            break;
        case 'logout':
            session_unset();
            header('Location: index.php?act=login');
            break;
        case 'login':
            if (isset($_SESSION['admin'])) {
                header('location: index.php');
            } else {
                if (isset($_POST['btn_login']) && $_POST['btn_login']) {
                    $user_name = $_POST['user_name'];
                    $password = $_POST['password'];
                    if ($user_name == null || $password == null) {
                        echo '<script>alert("Điền đầy đủ thông tin !")</script>';
                    } else {
                        $check = check_user_admin($user_name, $password);
                        if (is_array($check)) {
                            $_SESSION['admin'] = $check;
                            echo '<script>alert("Đăng nhập thành công!")</script>';

                            header('Location: index.php');
                        } else {
                            echo '<script>alert("Tài khoản sai hoặc không tồn tại!")</script>';
                        }
                    }
                }
                render('login');
            }
            break;
    }
} else {
    if (isset($_SESSION['admin'])) {
        render('dashboard');
    } else {
        header("location: index.php?act=login");
    }
}
