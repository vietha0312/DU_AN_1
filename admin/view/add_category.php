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
                        <form class="form-horizontal" action="./index.php?act=add_category" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <h4 class="card-title">Add category</h4>

                                <div class="form-group row">
                                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Mã hãng</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Mã loại" disabled>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Tên hãng</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name_cate" class="form-control" placeholder="Điền tên hãng  vào đây" required>
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