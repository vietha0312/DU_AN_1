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
                        <h5 class="card-title">Danh sách bình luận</h5>
                       
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    <th>Mã bình luận</th>
                                    <th>Người bình luận</th>
                                    <th>Sản phẩm</th>
                                    <th>Nội dung</th>
                                    <th>Ngày bình luận</th>
                                    <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                   foreach ($listcmt as $cmt) : extract($cmt); ?>
                                          <td><?= $id_cmt ?></td>
                                        <td><?= $user_name ?></td>
                                        <td><?= $name_pro ?></td>
                                        <td><?= $content ?></td>
                                        <td><?= $comment_date ?></td>
                                        <td class="text-center">
                                            <a href="index.php?act=delete_cmt&idcmt=<?= $id_cmt ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fa-solid fa-trash"></i> Xóa</a>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                    <th>Mã bình luận</th>
                                    <th>Người bình luận</th>
                                    <th>Sản phẩm</th>
                                    <th>Nội dung</th>
                                    <th>Ngày bình luận</th>
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