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
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
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
                        <h5 class="card-title">Basic Datatable</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Mã loại</th>
                                        <th>Tên loại</th>
                                        <th>Thao tác</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-lg"> <a href="pages-buttons.html" style="color:aliceblue"><i class="mdi mdi-delete-circle"></i><span>Xóa</span></a></button>

                                            <button type="button" class="btn btn-info btn-lg"> <a href="pages-buttons.html" style="color:aliceblue"><i class="mdi mdi-file-document-box"></i><span>Sửa</span></a></button>
                                        </td>

                                    </tr>


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Mã loại</th>
                                        <th>Tên loại</th>
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