<?php include_once "header.php" ?>
<?php include_once "nav.php" ?>
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>

<div id="main-wrapper">
    <?php
    if (is_array($one_bill)) {
        extract($one_bill);
    }
    ?>
    <div class="page-wrapper">

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Form Basic</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Library</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>



        <div class="">
            <div class="">
                <div class="card">
                    <div>
                        <h3 class="alert alert-success">Chi tiết đơn hàng PHVPH-<?= $id_bill ?></h3>
                    </div>
                    <div class="card bg-light text-dark mb-4 mt-3">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Mã hóa đơn</th>
                                    <td>PHVH-<?= $id_bill ?></td>
                                </tr>
                                <tr>
                                    <th>Người đặt</th>
                                    <td><span class="fw-bold"><?= $user_name ?></span></td>
                                </tr>
                                <tr>
                                    <th>Họ tên</th>
                                    <td><?= $full_name ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?= $email ?></td>
                                </tr>
                                <tr>
                                    <th>Địa chỉ nhận hàng</th>
                                    <td><?= $address ?></td>
                                </tr>
                                <tr>
                                    <th>Số điện thoại</th>
                                    <td>0<?= $phone ?></td>
                                </tr>
                                <tr>
                                    <th>Ngày đặt</th>
                                    <td><?= $order_date ?></td>
                                </tr>
                                <tr>
                                    <th>Thành tiền</th>
                                    <td><span class="text-dark font-weight-bold"><?= number_format($total_amount) ?>₫</span></td>
                                </tr>
                                <tr>
                                    <th>Phương thức thanh toán</th>
                                    <td>
                                        <span class="text-primary fw-bold">
                                            <?php
                                            if ($payment == 1) {
                                                echo "Thanh toán khi nhận hàng";
                                            } else if ($payment == 2) {
                                                echo "Chuyển khoản ngân hàng";
                                            } else if ($payment == 3) {
                                                echo "Thanh toán online";
                                            } else {
                                                echo "Không tìm thấy phương thức thanh toán";
                                            }
                                            ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Trạng thái đơn hàng</th>
                                    <td>
                                        <span class="text-warning fw-bold">
                                            <?php
                                            if ($status == 0) {
                                                echo "Đơn hàng mới";
                                            } else if ($status == 1) {
                                                echo "Đang xử lý";
                                            } else if ($status == 2) {
                                                echo "Đang giao hàng";
                                            } else if ($status == 3) {
                                                echo "Đã giao hàng";
                                            } else if ($status == 4) {
                                                echo "Đã hủy";
                                            } else {
                                                echo "Lỗi trạng thái";
                                            }
                                            ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Trạng thái thanh toán</th>
                                    <td>
                                        <?php
                                        if ($status_pay == 0) {
                                            echo '<span class="text-danger">Chưa thanh toán</span>';
                                        } else if ($status_pay == 1) {
                                            echo '<span class="text-success">Đã thanh toán</span>';
                                        } else {
                                            echo "Không tìm thấy phương thức thanh toán";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="table-content table-responsive mt-3 mb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="jb-product-thumbnail">Hình ảnh</th>
                                    <th class="cart-product-name">Sản phẩm</th>
                                    <th class="jb-product-price">Đơn giá</th>
                                    <th class="jb-product-quantity">Số lượng</th>
                                    <th class="jb-product-subtotal">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $id = $_GET['idbill'];
                                $bill = load_cart_all($id);
                                // var_dump($bill);
                                foreach ($bill as $value) {
                                ?>
                                    <tr>
                                        <td class="jb-product-thumbnail"><img src="../admin/uploads/<?= $value['img_pro'] ?>" alt="Ultraphone Product" width="80px"></img></td>
                                        <td class="jb-product-name">
                                            <?= $value['name_pro'] ?>
                                        </td>
                                        <td class="jb-product-price"><span class="amount">
                                                <?= number_format($value['price_pro']) ?>₫
                                            </span></td>
                                        <td class="quantity">
                                            <?= $value['quantity'] ?>
                                        </td>
                                        <td class="product-subtotal"><span class="amount">
                                                <?= number_format($value['total_amount']) ?>₫
                                            </span></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="btn-function">
                        <a href="index.php?act=listbill" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Quay lại
                            danh sách</a>
                    </div>
                </div>

            </div>


        </div>

        <footer class="footer text-center">
            All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
        </footer>

    </div>

</div>




<?php include_once "footer.php" ?>
<style>
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 10px;
        border: 1px solid #ddd;
    }

    .table th {
        background-color: #f2f2f2;
        color: #333;
        font-weight: bold;
        text-align: left;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table tbody tr:nth-child(odd) {
        background-color: #fff;
    }

    .text-primary {
        color: #007bff;
    }

    .text-danger {
        color: #dc3545;
    }

    .text-warning {
        color: #ffc107;
    }

    .text-success {
        color: #28a745;
    }

    .text-dark {
        color: #343a40;
    }

    .font-weight-bold {
        font-weight: bold;
    }

    .fw-bold {
        font-weight: bold;
    }
</style>


<?php include_once "footer.php" ?>