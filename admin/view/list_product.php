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
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">


                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách sản phẩm</h5>
                        <div class="filter">
                            <form action="./index.php?act=list_product" method="POST">
                                <select name="idcate" class="sel-filter">
                                    <option value="0">Tất cả</option>
                                    <?php
                                    foreach ($ds_loai as $loai) {
                                        extract($loai);
                                        if ($idcate == $id_cate) {
                                            echo '<option value="' . $id_cate . '" selected>' . $name_cate . '</option>';
                                        } else {
                                            echo '<option value="' . $id_cate . '">' . $name_cate . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <input type="submit" value="Lọc" name="btn_filter" class="btn-filter">
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Mã SP</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Giảm giá</th>
                                        <th>Hình ảnh</th>
                                        <th>Mô tả ngắn</th>
                                        <th>Mô tả chi tiết</th>
                                        <th>Lượt xem</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php foreach ($listpro as $pro) : ?>
                                        <tr>
                                            <td><?= $pro['id_pro'] ?></td>
                                            <td><?= $pro['name_pro'] ?></td>
                                            <td><?= number_format($pro['price']) ?></td>
                                            <td><?= $pro['discount'] ?>%</td>
                                            <td><img src="./uploads/<?= $pro['img_pro'] ?>" alt="No photo!" width="50px"></td>
                                            <td><?= $pro['short_des'] ?></td>
                                            <td><?= $pro['detail_des'] ?></td>
                                            <td><?= $pro['view'] ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-danger margin-5 text-white btn-lg mb-2" data-toggle="modal" data-target="#Modal2">
                                                    <i class="mdi mdi-delete-circle"></i><span>Xóa</span>
                                                </button>

                                                <button type="button" class="btn btn-warning btn-lg"> <a href="./index.php?act=edit_product&id_pro=<?= $pro['id_pro'] ?>" style="color:aliceblue"><i class="mdi mdi-auto-fix"></i><span>Sửa</span></a></button>

                                            </td>
                                        </tr>
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
                                                        Bạn đã chắc chắn là xóa chưa? Đừng hối hận
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="uploads/tải xuống.jpg" width="100% ">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal">Chưa chăc chắn</button>
                                                        <button type="button" class="btn btn-danger btn-lg"> <a href="./index.php?act=delete_product&id_pro=<?= $pro['id_pro'] ?>" style="color:aliceblue " onclick="showDeleteSuccess()"><span>Chắc chắn rồi</span></a></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Mã SP</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Giảm giá</th>
                                        <th>Hình ảnh</th>
                                        <th>Mô tả ngắn</th>
                                        <th>Mô tả chi tiết</th>
                                        <th>Lượt xem</th>
                                        <th>Thao Tác</th>
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

    <!-- this page js -->
    <script src="view/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="view/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="view/assets/extra-libs/DataTables/datatables.min.js"></script>
<script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $('#zero_config').DataTable();
</script>


<?php include_once "footer.php" ?>