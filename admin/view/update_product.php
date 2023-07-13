<?php include_once "header.php" ?>
<?php include_once "nav.php" ?>
<?php
if (is_array($pro)) {
    extract($pro);
}
$img_path = './uploads/' . $img_pro;
if (is_file($img_path)) {
    $img_pro = $img_path;
} else {
    $img_pro = 'No photo !';
}
?>
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

        <div class="card">
            <form class="form-horizontal" action="index.php?act=update_product" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <h4 class="card-title">Cập nhật sản phẩm</h4>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Mã sản phẩm</label>
                        <div class="col-sm-9">
                            <input type="text" name="id_pro" class="form-control" placeholder="Mã loại (auto)" value="<?= $id_pro ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Hãng điện thoại</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="idcate" id="exampleFormControlSelect1" required>
                                <option value="0">Chọn loại</option>
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
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Tên sản phẩm</label>
                        <div class="col-sm-9">
                            <input type="text" name="name_pro" class="form-control" placeholder="Điền tên sản phẩm vào đây" value="<?= $name_pro ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Giá tiền</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="number" class="form-control" name="price" placeholder="??.000.000" aria-label="Recipient 's username" aria-describedby="basic-addon2" value="<?= $price ?>">
                                <div class="input-group-append"></div>
                                <span class="input-group-text" id="basic-addon2">VND</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Discount</label>
                        <div class="col-sm-9">
                            <input type="text" name="discount" min="1" max="100" class="form-control" placeholder="Nhập số % từ 1 đến 100" value="<?= $discount ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">File Upload</label>
                        <div class=" col-md-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="validatedCustomFile" name="img_pro" required>
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Mô tả</label>
                        <div class="col-sm-9">
                            <input type="text" name="short_des" class="form-control" placeholder="Mô tả tóm tắt sản phẩm" value="<?= $short_des ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Mô tả chi tiết</label>
                        <div class="col-sm-9">
                            <textarea class="form-control ckeditor" rows="5" required name="detail_des" id="detail_des" placeholder="Mô tả đầy đủ chi tiết sản phẩm"><?= $detail_des ?></textarea>
                        </div>
                    </div>
                    <div class="wrap-btn">

                        <button type="button" class="btn btn-danger margin-5 text-white btn-lg mb-2" data-toggle="modal" data-target="#Modal2">
                            <i class="mdi mdi-delete-circle"></i><span>Xác nhận</span>
                        </button>
                        <input type="reset" class="btn btn-danger margin-5 text-white btn-lg mb-2" value="Nhập lại">
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
                                    <img src="uploads/tải xuống.jpg" width="100% ">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal">Không cần</button>
                                    <input type="submit" name="btn_update" class="btn btn-danger margin-5 text-white btn-lg " value="Cập nhật">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>




</div>




<?php include_once "footer.php" ?>