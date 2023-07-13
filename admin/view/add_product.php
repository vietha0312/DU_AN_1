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

            <div class="">
                <div class="">
                    <div class="card">
                        <form class="form-horizontal" action="index.php?act=add_product" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <h4 class="card-title">Personal Info</h4>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Mã sản phẩm</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="id_pro" class="form-control" placeholder="Mã loại (auto)" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Hãng điện thoai</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="idcate" id="exampleFormControlSelect1" required>
                                            <option value="0">Chọn loại</option>
                                            <?php
                                            foreach ($ds_loai as $loai) {
                                                extract($loai);
                                                echo '<option value=' . $id_cate . '>' . $name_cate . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Tên sản phẩm</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name_pro" class="form-control" placeholder="Điền tên sản phẩm vào đây" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Giá tiền</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="price" placeholder="??.000.000" aria-label="Recipient 's username" aria-describedby="basic-addon2">
                                            <div class="input-group-append"></div>
                                            <span class="input-group-text" id="basic-addon2">VND</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Discount</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="discount" min="1" max="100" class="form-control" placeholder="Nhập số % từ 1 đến 100" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email1" class="col-sm-3 text-right control-label col-form-label"">File Upload</label>
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
                                    <input type="text" name="short_des" class="form-control" placeholder="Mô tả tóm tắt sản phẩm" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email1" class="col-sm-3 text-right control-label col-form-label">Mô tả chi tiết</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control ckeditor" rows="5" required name="detail_des" id="detail_des" placeholder="Mô tả đầy đủ chi tiết sản phẩm"></textarea>
                                </div>
                            </div>

                    </div>

                    <div class="wrap-btn">
                        <input type="submit" name="btn_add" class="btn btn-lg btn-block btn-outline-success" id="ts-success" value="Submit">

                    </div>
                    </form>
                    <h3 class="text-success fs-6 mt-3 fw-bolder">
                        <?php
                        if (isset($noticepro) && $noticepro != "") {
                            echo $noticepro;
                        }
                        ?>
                    </h3>
                </div>

            </div>


        </div>

        <footer class="footer text-center">
            All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
        </footer>

    </div>

</div>




<?php include_once "footer.php" ?>