<?php include_once "header.php" ?>
<?php include_once "nav.php" ?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Tables</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">List Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách sản phẩm</h5>
                        <div class="mb-3">
    <button class="btn btn-primary filter-payment" data-filter="all">All/button>
    <button class="btn btn-success filter-payment" data-filter="paid">Đã thanh toán</button>
    <button class="btn btn-danger filter-payment" data-filter="unpaid">Chưa thanh toán</button>


    
    <button class="btn btn-warning filter-status" data-filter="processing">Đang xử lý</button>
    <button class="btn btn-primary filter-status" data-filter="shipping">Đang giao hàng</button>
    <button class="btn btn-success filter-status" data-filter="delivered">Đã giao hàng</button>
    <button class="btn btn-danger filter-status" data-filter="canceled">Đã hủy</button>
</div>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th scope="col">Người đặt</th>
                                        <th scope="col">Thành tiền</th>
                                        <th scope="col">Phương thức thanh toán</th>
                                        <th scope="col">Trạng thái thanh toán</th>
                                        <th scope="col">Trạng thái đơn hàng</th>
                                        <th scope="col">Ngày đặt</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($listbill as $bill) :
                                        extract($bill);
                                        $user_detail = '' . $bill['user_name'] . '<br>' . $bill['full_name'] . '<br> ' . $bill['email'] . '<br> ' . $bill['address'] . '<br>0' . $bill['phone'] . '<br> </td>';


                                        $is_paid = $bill['status_pay'] == 1;
                                        $filter_class = $is_paid ? 'paid' : 'unpaid';
                                        $order_status = '';
    if ($bill['status'] == 0) {
        $order_status = 'new ';
    } else if ($bill['status'] == 1) {
        $order_status = 'processing';
    } else if ($bill['status'] == 2) {
        $order_status = 'shipping';
    } else if ($bill['status'] == 3) {
        $order_status = 'delivered';
    } else if ($bill['status'] == 4) {
        $order_status = 'canceled';
    }


                                        
                                    ?>
                                        <tr class="filterable <?= $filter_class ?> <?= $order_status ?>">
                                            <td><?= $i ?></td>
                                            <td><?= $bill['full_name'] ?></td>
                                            <td><?= number_format($bill['total_amount']) ?></td>
                                            <td><?php
                                                if ($bill['payment'] == 1) {
                                                    echo "Thanh toán khi nhận hàng";
                                                } else if ($bill['payment'] == 2) {
                                                    echo "Chuyển khoản ngân hàng";
                                                } else if ($bill['payment'] == 3) {
                                                    echo "Thanh toán Online";
                                                } else {
                                                    echo "Không tìm thấy phương thức thanh toán";
                                                }
                                                ?>
                                            </td>
                                            <td><?php
                                                if ($bill['status_pay'] == 0) {
                                                    echo "<span class='badge badge-warning'>Chưa thanh toán</span>";
                                                } else if ($bill['status_pay'] == 1) {
                                                    echo "<span class='badge badge-success'>Đã thanh toán</span>";
                                                } else {
                                                    echo "Không tìm thấy phương thức thanh toán";
                                                }
                                                ?>
                                            </td>
                                            <td><?php
                                                if ($bill['status'] == 0) {
                                                    echo "<span class='badge badge-info'>Đơn hàng mới</span>";
                                                } else if ($bill['status'] == 1) {
                                                    echo "<span class='badge badge-warning'>Đang xử lý</span>";
                                                } else if ($bill['status'] == 2) {
                                                    echo "<span class='badge badge-primary'>Đang giao hàng</span>";
                                                } else if ($bill['status'] == 3) {
                                                    echo "<span class='badge badge-success'>Đã giao hàng</span>";
                                                } else if ($bill['status'] == 4) {
                                                    echo "<span class='badge badge-danger'>Đã hủy</span>";
                                                } else {
                                                    echo "Lỗi trạng thái";
                                                }
                                                ?>
                                            </td>
                                            <td><span class="badge badge-dark"><?= $bill['order_date'] ?></span></td>
                                            <td class="text-center">
                                                <a type="button" href="index.php?act=edit_bill&idbill=<?= $bill['id_bill'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <a href="index.php?act=billdetail&idbill=<?= $bill['id_bill'] ?>" class="btn btn-success"><i class="fa-solid fa-circle-info"></i></a>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th scope="col">Người đặt</th>
                                        <th scope="col">Thành tiền</th>
                                        <th scope="col">Phương thức thanh toán</th>
                                        <th scope="col">Trạng thái thanh toán</th>
                                        <th scope="col">Trạng thái đơn hàng</th>
                                        <th scope="col">Ngày đặt</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="view/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
 
 
    <script src="view/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
    $(document).ready(function() {
        // Filter orders based on payment status
        $('.filter-payment').click(function() {
            const filter = $(this).data('filter');
            if (filter === 'all') {
                $('.filterable').show();
            } else {
                $('.filterable').hide();
                $(`.${filter}`).show();
            }
        });

     
        $('.filter-status').click(function() {
            const filter = $(this).data('filter');
            if (filter === 'all') {
                $('.filterable').show();
            } else {
                $('.filterable').hide();
                $(`.${filter}`).show();
            }
        });

        // DataTable initialization
        $('#zero_config').DataTable();
    });
</script>

<?php include_once "footer.php" ?>