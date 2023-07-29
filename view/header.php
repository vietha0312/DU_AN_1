<!-- Begin JB's Header Area -->
<?php
$count = countcart();
$total_amount = total_amount();

?>

<header>
    <!-- Begin Header Top Area -->
    <div class="header-top_area" style="background-color: #444444;">
        <div class="container">
            <div class="row">
                <!-- Begin Header Information Area -->
                <div class="col-lg-3 col-md-6 col-sm-4">
                    <div class="header-info_area">
                        <span class="text-light">Chào mừng đến với PhoneShop!</span>
                    </div>
                </div>
                <!-- Header Information Area End Here -->
                <!-- Begin Header Top Right Area -->
                <div class="col-lg-9 col-md-6 col-sm-8">
                    <div class="ht-right">
                        <div class="ht-menu">
                            <ul class="hmenu">
                                <!-- <li>
                                    <a href="index.php?act=account"><i class="fa-solid fa-user"></i>Tài khoản</a>
                                </li> -->
                                <div class="dropdown">
                                    <?php if (!isset($_SESSION['user'])) { ?>
                                        <a href="#" class="dropbtn"><i class="fa-solid fa-user"></i> Tài khoản</a>
                                    <?php  } else { ?>
                                        <a href="#" class="dropbtn">
                                            <?php if (isset($_SESSION['user']['img_user']) && $_SESSION['user']['img_user'] != '') { ?>
                                                <img src="uploads/<?= $_SESSION['user']['img_user'] ?>" style="width: 20px; height: 20px; border-radius: 100%;">
                                            <?php } else { ?>
                                                <i class="fa-solid fa-user"></i>
                                            <?php } ?>
                                            <?= $_SESSION['user']['full_name'] ?></a>
                                    <?php } ?>
                                    <div class="dropdown-content">
                                        <?php if (!isset($_SESSION['user'])) { ?>
                                            <a href="index.php?act=login"><i class="fa-solid fa-right-to-bracket"></i> Đăng nhập</a>
                                        <?php } else if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 1) { ?>
                                            <a href="./admin/index.php">Vào trang Admin <i class="fa-solid fa-gears"></i></a>
                                            <a href="index.php?act=myaccount">Thông tin tài khoản <i class="fa-solid fa-circle-info"></i></a>
                                            <a href="index.php?act=logout" onclick="return confirm('Bạn chắc chắc muốn đăng xuất tài khoản?')">Đăng xuất <i class="fa-solid fa-right-from-bracket"></i></a>
                                    </div>
                                <?php } else { ?>
                                    <a href="index.php?act=myaccount">Thông tin tài khoản <i class="fa-solid fa-circle-info"></i></a>
                                    <a href="index.php?act=logout" onclick="return confirm('Bạn chắc chắc muốn đăng xuất tài khoản?')">Đăng xuất <i class="fa-solid fa-right-from-bracket"></i></a>
                                </div>
                            <?php } ?>

                        </div>

                        <!-- Begin Currency Area -->

                        <!-- Currency Area End Here -->
                        <!-- Begin Language Area -->

                        <!-- Language Area End Here -->
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Header Top Right Area End Here -->
        </div>
    </div>
    </div>
    <!-- Header Top Area End Here -->
    <!-- Begin Header Middle Area -->
    <div class="header-middle_area">
        <div class="container">
            <div class="row">
                <!-- Begin Header Middle Logo Area -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-6 order-1 order-lg-1 order-sm-1">
                    <div class="hm-logo">
                        <a href="index.php">
                            <img src="./src/image/shop/logo_shop.png" alt="shopphone" width="65%" />
                        </a>
                    </div>
                </div>
                <!-- Header Middle Logo Area End Here -->
                <!-- Begin Header Middle Menu Area -->
                <div class="col-lg-6 position-static order-lg-2 d-none d-lg-block">
                    <div class="hm-menu">
                        <nav>
                            <ul>
                                <li class="dropdown-holder">
                                    <a href="index.php">Trang chủ</a>
                                    <!-- Begin Header Middle Dropdwon Area -->

                                    <!-- Header Middle Dropdwon Area End Here -->
                                </li>
                                <li>
                                    <a href="index.php?act=product">Sản phẩm<i class="fa-solid fa-chevron-down"></i></a>
                                    <!-- Begin Header Middle Dropdwon Area -->
                                    <ul class="hm-dropdown">
                                        <?php
                                        foreach ($listcate as $cate) {
                                            extract($cate);
                                            $linkpro = "index.php?act=product&idcate=" . $id_cate;
                                            echo ' <li>
                                                    <a href="' . $linkpro . '">' . $name_cate . '<i class="fa fa-chevron-down"></i></a>
                                                   </li>';
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <li>
                                    <a href="index.php?act=introduce">Giới thiệu</a>
                                </li>
                                <li>
                                    <a href="index.php?act=contact">Liên hệ</a>
                                </li>
                                <li>
                                    <a href="index.php?act=question">Hỏi đáp</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-6 col-6 order-1 order-lg-3 order-sm-1">
                    <div class="hm-minicart_area">
                        <ul>
                            <li>
                                <a href="index.php?act=viewcart">
                                    <div class="minicart-icon">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span class="item-count"><?= $count ?></span>
                                    </div>
                                    <div class="minicart-text"><span>Giỏ hàng</span></div>
                                    <div class="item_total"><span><?= number_format($total_amount) ?>₫</span></div>
                                </a>
                                <ul class="minicart-body">
                                    <?php if (empty($_SESSION['mycart'])) {
                                        $emptypro = "Bạn chưa thêm sản phẩm nào vào giỏ hàng !";  ?>
                                        <div class="mt-5">
                                            <p class="text-danger fw-bold" style="font-size: 15px;"><?= $emptypro ?></p>
                                        </div>

                                        <?php } else {
                                        foreach ($_SESSION['mycart'] as $cart) {  ?>
                                            <li class="minicart-item_area">
                                                <div class="minicart-single_item">
                                                    <div class="minicart-img">
                                                        <a href="index.php?act=prodetail&idpro=<?= $cart[0] ?>">
                                                            <img src="admin/uploads/<?= $cart[2] ?>" alt="UltraPhone Product" width="50px" ; />
                                                        </a>
                                                        <span class="product-quantity"><?= $cart[4] ?>x</span>
                                                    </div>
                                                    <div class="minicart-content">
                                                        <div class="product-name">
                                                            <h6>
                                                                <a href="index.php?act=prodetail&idpro=<?= $cart[0] ?>">
                                                                    <?= $cart[1] ?>
                                                                </a>
                                                            </h6>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="new-price"> <?= number_format($cart[3]) ?>₫</span>
                                                        </div>
                                                        <!-- <div class="attributes_content">
                                                    <span>Dimension: 40x60cm</span>
                                                </div> -->
                                                    </div>
                                                </div>
                                            </li>
                                    <?php }
                                    }  ?>
                                    <li>

                                        <div class="price_content">
                                            <div class="cart-subtotals">
                                                <div class="cart-total subtotal-list">
                                                    <span class="label">Tổng tiền</span>
                                                    <span class="value"><?= number_format($total_amount) ?>₫</span>
                                                </div>
                                            </div>
                                            <div class="minicart-button">
                                                <a class="jb-btn jb-btn_fullwidth" href="index.php?act=viewcart">Xem giỏ hàng</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- Begin JB's Offcanvas Area -->
                    <a href="#" class="menu-btn color--white">
                        <i class="fa fa-bars"></i>
                    </a>
                    <!-- JB's Offcanvas Area End Here -->
                </div>
                <!-- Header Middle Minicart Area End Here -->
            </div>
        </div>
    </div>

    <!-- Begin Header Bottom Area -->
    <div class="header-bottom_area d-none d-lg-block">
        <div class="container">
            <div class="row">
                <!-- Begin JB's Category Menu Area -->
                <div class="col-lg-3 col-md-4">
                    <div class="category-menu category-menu-hidden">
                        <div class="category-heading">
                            <h2 class="categories-toggle">
                                <span>Hiển thị theo loại</span>
                            </h2>
                        </div>

                        <!-- Show danh sách danh mục -->
                        <div id="cate-toggle" class="category-menu-list">
                            <ul>
                                <?php
                                foreach ($listcate as $cate) {
                                    extract($cate);
                                    $linkpro = "index.php?act=product&idcate=" . $id_cate;
                                    echo '<li class="right-menu">
                                    <a href="' . $linkpro . '">' . $name_cate . '</a>
                                </li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- JB's Category Menu Area End Here -->

                <!-- Begin Header Search Area -->
                <div class="col-xl-7 col-lg-6 col-md-5">
                    <div class="header-search_area">
                        <form action="index.php?act=product" method="post" class="header-search_box">
                            <!-- Thêm menu drop-down cho danh mục -->


                            <input class="jb-search_input" name="kyw" type="text" placeholder="Nhập từ khóa tìm kiếm ..." required />
                            <div class="form-group">
                                <select class="nice-select select-search-category" name="idcate">
                                    <option value="">Tất cả danh mục</option>
                                    <?php
                                    foreach ($listcate as $cate) {
                                        extract($cate);
                                        echo '<option value="' . $id_cate . '">' . $name_cate . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <button class="jb-search_btn" name="btn_search" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <!-- Header Search Area End Herer -->

                <!-- Begin Header Contact Information Area -->
                <div class="col-xl-2 col-lg-3 col-md-3">
                    <div class="contact-info">
                        <a href="tel://+84335099885"><i class="fa fa-phone-volume"></i> +84 334623400</a>
                    </div>
                </div>
                <!-- Header Contact Information Area End Here -->
            </div>
        </div>
    </div>

</header>
<style>
    /* Add this CSS to style the header area */
    header {
        background-color: #0099FF;
        color: #F0DE36;
    }

    /* Style for the navigation links in the header */
    .hmenu li a,
    .hm-dropdown li a,
    .hm-menu li a,
    .hmenu li a:hover,
    .hm-dropdown li a:hover,
    .hm-menu li a:hover {
        color: #F0DE36;
    }

    /* Style for the search input box */
    .jb-search_input {
        background-color: #222;
        color: #000;
        border: 1px solid #fff;
    }

    /* Style for the search button */
    .jb-search_btn {}

    /* Style for the cart icon and item count in the header */
    .minicart-icon i,
    .item-count {
        color: #F0DE36;
    }

    /* Style for the cart total amount in the header */
    .item_total span {
        color: #fff;
    }

    /* Style for the category menu in the header */
    .category-menu .category-heading span,
    .right-menu a {
        color: #F0DE36;
    }

    /* Style for the dropdown menu items in the header */
    .category-menu-list ul li a,
    .dropdown-content a {
        color: #F0DE36;
        /* Change this to your desired color for dropdown menu items */
    }

    /* Style for the links in the header top right area */
    .ht-menu a,
    .ht-menu a:hover {
        color: #fff;
    }

    /* Optional: Style for the header contact information */
    .contact-info a {
        color: #fff;
    }
</style>