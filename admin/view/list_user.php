<?php include_once "header.php" ?>
<?php include_once "nav.php" ?>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Quản lí người dùng</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User</li>
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
                        <h5 class="card-title">Quản lí người dùng</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id người dùng</th>
                                        <th>Tên đăng nhập</th>
                                        <th>Họ và tên</th>
                                        <th>Email</th>
                                        <th>Vai trò</th>
                                        <th>Thao tác</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($listuser as $user) : ?>
                                        <tr>
                                            <td><?= $user['id_user'] ?></td>
                                            <td><?= $user['user_name'] ?></td>
                                            <td><?= $user['full_name'] ?></td>
                                            <td><?= $user['email_user'] ?></td>
                                            <td><?php if ($user['role'] == 1) {
                                                    echo "<span class='badge badge-danger'>Admin</span>";
                                                } else {
                                                    echo "<span class='badge badge-success'>Thành Viên</span>
                                            ";
                                                } ?></td>
                                            <td class="text-center">
                                                <a href="./index.php?act=edit_user&id_user=<?= $user['id_user'] ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                                                <a href="./index.php?act=delete_usser&id_user=<?= $user['id_user'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="fa-solid fa-trash"></i> Xóa</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id người dùng</th>
                                        <th>Tên đăng nhập</th>
                                        <th>Họ và tên</th>
                                        <th>Email</th>
                                        <th>Vai trò</th>
                                        <th>Thao tác</th>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
</div>
<script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $('#zero_config').DataTable();
</script>
<?php include_once "footer.php" ?>