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

                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Mã Danh Mục</th>
                                        <th>Hãng điện thoại</th>
                                        <th>Thao tác</th>

                                    </tr>
                                </thead>
                                <tbody>


                                    <?php foreach ($ds_loai as $loai) : ?>
                                        <tr>
                                            <td><?= $loai['id_cate'] ?></td>
                                            <td><?= $loai['name_cate'] ?></td>

                                            <td class="text-center">
                                                <button type="button" class="btn btn-danger margin-5 text-white btn-lg " data-toggle="modal" data-target="#Modal2">
                                                    <i class="mdi mdi-delete-circle"></i><span>Xóa</span>
                                                </button>

                                                <button type="button" class="btn btn-warning btn-lg"> <a href="index.php?act=edit_category&id_cate=<?= $loai['id_cate'] ?>" style="color:aliceblue"><i class="mdi mdi-auto-fix"></i><span>Sửa</span></a></button>

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
                                                        <button type="button" class="btn btn-danger btn-lg"> <a href="index.php?act=delete_cate&id_cate=<?= $loai['id_cate'] ?>" style="color:aliceblue " onclick="showDeleteSuccess()"><span>Chắc chắn rồi</span></a></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Mã Danh Mục</th>
                                        <th>Hãng điện thoại</th>
                                        <th>Thao tác</th>

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
<script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $('#zero_config').DataTable();
</script>


<?php include_once "footer.php" ?>