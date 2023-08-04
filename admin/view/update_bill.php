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

        <div class="container-fluid">

            <div class="">
                <div class="">
                    <div class="card">
                        <form class="form-horizontal" action="./index.php?act=update_bill" method="post" enctype="multipart/form-data">

                            <div class="card-body">
                                <h4 class="card-title">Update Bill</h4>

                                <div class="form-group row">
                                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Mã hóa đơn</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?= $id_bill ?>" disabled>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Người đặt</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="user_name" class="form-control" value="<?= $user_name ?>" disabled>
                                    </div>


                                </div>
                                <div class="form-group row">
                                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Địa chỉ nhận hàng</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="full_name" class="form-control" value="<?= $address ?>" disabled>
                                    </div>


                                </div>
                                <div class="form-group row">
                                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Ngày đặt</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="email_user" class="form-control" value="<?= $order_date ?>" disabled>
                                    </div>


                                </div>
                                <div class="form-group row">
                                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Thành tiền</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="total_amount" class="form-control" value="<?= number_format($total_amount) ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 text-right control-label col-form-label">Phương thức thanh toán</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="payment" class="form-control" placeholder="Phương thức thanh toán" value="<?php if ($payment == 1) {
                                                                                                                                                echo "Thanh toán khi nhận hàng";
                                                                                                                                            } else if ($payment == 2) {
                                                                                                                                                echo "Chuyển khoản ngân hàng";
                                                                                                                                            } else if ($payment == 3) {
                                                                                                                                                echo "Thanh toán online";
                                                                                                                                            } else {
                                                                                                                                                echo "Không tìm thấy phương thức thanh toán";
                                                                                                                                            }  ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Thanh toán</label>
                                    <div class="col-sm-9">
                                        <select required class="form-control" name="status_pay" id="">
                                            <option value="0" <?= $status_pay == 0 ? "selected" : "" ?>>Chưa thanh toán</option>
                                            <option value="1" <?= $status_pay == 1 ? "selected" : "" ?>>Đã thanh toán</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Trạng thái</label>
                                    <div class="col-sm-9">
                                        <select required class="form-control" name="status" id="">
                                            <option value="0" <?= $status == 0 ? "selected" : "" ?>>Đơn hàng mới</option>
                                            <option value="1" <?= $status == 1 ? "selected" : "" ?>>Đang xử lý</option>
                                            <option value="2" <?= $status == 2 ? "selected" : "" ?>>Đang giao hàng</option>
                                            <option value="3" <?= $status == 3 ? "selected" : "" ?>>Đã giao hàng</option>
                                            <option value="4" <?= $status == 4 ? "selected" : "" ?>>Đã hủy</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="wrap-btn">
                                    <input type="hidden" name="id_bill" value="<?= $id_bill ?>">
                                    <button type="button" class="btn btn-danger margin-5 text-white btn-lg mb-2" data-toggle="modal" data-target="#Modal2">
                                        <i class="mdi mdi-checkbox-marked-outline"></i><span>Xác nhận</span>
                                    </button>
                                    <input type="reset" class="btn btn-warning margin-5 text-white btn-lg mb-2" value="Nhập lại">
                                </div>
                                <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Alert Model</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn cần kiểm tra lại nội dung không
                                            </div>
                                            <div class="modal-body">
                                                <img src="uploads/f9e14634cb6769ae7e9395300b99d327.jpg" width="100% ">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal">Đợi tí nhập lại</button>
                                                <input type="submit" name="btn_update" class="btn btn-danger margin-5 text-white btn-lg " value="Cập nhật">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>

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

    </style>