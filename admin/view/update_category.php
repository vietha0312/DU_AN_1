<?php include_once "header.php" ?>
<?php include_once "nav.php" ?>
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<div id="main-wrapper">

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
            <?php
            if (is_array($one_loai)) {
                extract($one_loai);
            }
            ?>
            <div class="">
                <div class="">
                    <div class="card">
                        <form class="form-horizontal" action="index.php?act=update_category" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <h4 class="card-title">Add category</h4>

                                <div class="form-group row">
                                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Mã hãng</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?= $id_cate ?>" disabled>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Tên hãng</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name_cate" class="form-control" value="<?= $name_cate ?>">
                                    </div>


                                </div>

                                <div class="wrap-btn">
                                    <input type="hidden" name="id_cate" value="<?= $id_cate ?>">
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