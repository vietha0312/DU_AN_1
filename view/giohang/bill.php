 <!-- phần active trang đang được hiển thị-->
 <div class="breadcrumb-area">
     <div class="container">
         <div class="breadcrumb-content">
             <ul>
                 <li><a href="index.php">Trang chủ</a></li>
                 <li class="active">Đặt hàng</li>
             </ul>
         </div>
     </div>
 </div>
 <!--end phần active trang đang được hiển thị-->
 <article class="mt-3 container-sm">
     <!-- thông tin đặt hàng -->
     <form action="index.php?act=billconfirm" method="post">
         <?php if (isset($_SESSION['user'])) {
                extract($_SESSION['user']); ?>
             <div class="card">
                 <div class="card-header cart text-primary fw-bold">Thông tin đặt hàng</div>
                 <div class="card-body">
                     <div class="wrap-infocart mar-t5">
                         <span>Tài khoản người dùng: </span>
                         <input name="user_name" type="text" class="ip-cart ml-60 font-weight-bolder" value="<?= $user_name ?>" disabled />
                     </div>
                     <div class="wrap-infocart mar-t5">
                         <span>Họ tên người đặt: </span>
                         <input name="full_name" type="text" class="ip-cart ml-91" placeholder="Nhập họ tên người nhận" value="<?= $full_name ?>" required />
                     </div>
                     <div class="wrap-infocart mar-t5">
                         <span>Địa chỉ: </span>
                         <input name="address" type="text" class="ip-cart ml-158" placeholder="Nhập địa chỉ nhận hàng" value="<?= $address ?>" required />
                     </div>
                     <div class="wrap-infocart mar-t5">
                         <span>Email: </span>
                         <input name="email" type="email" class="ip-cart ml-166" placeholder="Nhập email người nhận" value="<?= $email_user ?>" required />
                     </div>
                     <div class="wrap-infocart mar-t5">
                         <span>Điện thoại: </span>
                         <input name="phone" type="text" class="ip-cart ml-134" placeholder="Nhập số điện thoại người nhận" value="<?= $phone_user ?>" required />
                     </div>
                     <?php if (isset($_COOKIE['error'])) : ?>
                         <p class="font-weight-bold text-success">
                             <?= $_COOKIE['error'] ?>
                         </p>
                     <?php endif ?>
                 </div>
             </div>
             <!-- phương thức thanh toán -->
             <div class="card mt-4 mb-4">
                 <div class="card-header cart text-primary fw-bold">Phương thức thanh toán</div>
                 <div class="card-body">
                     <div class="payment-option">
                         <input class="form-check-input" type="radio" name="payment" id="inlineRadio1" value="1" checked>
                         <label for="inlineRadio1">Thanh toán khi nhận hàng</label>
                     </div>
                     <div class="payment-option">
                         <input class="form-check-input" type="radio" name="payment" id="inlineRadio2" value="2">
                         <label class="form-check-label" for="inlineRadio2">Chuyển khoản ngân hàng</label>
                     </div>
                     <div class="payment-option">
                         <input class="form-check-input" type="radio" name="payment" id="inlineRadio3" value="3">
                         <label class="form-check-label" for="inlineRadio3">Thanh toán qua Momo</label>
                     </div>
                 </div>
             </div>

         <?php } else { ?>
             <div class="mt-3 mb-3">
                 <nav class="navbar">
                     <p class="m-0 p-0 text-danger fw-bold navbar-brand">Bạn chưa đăng nhập. Hãy đăng nhập tài khoản để tiến hành đặt hàng!</p>
                     <a href="index.php?act=login" class="btn btn-secondary my-2 my-sm-0"><i class="fa-solid fa-right-to-bracket"></i> Đăng nhập</a>
                 </nav>
             </div>
         <?php } ?>
         <!-- Begin JB's Cart Area -->
         <div class="card jb-cart-area">
             <div class="container">
                 <div class="row">
                     <div class="col-12">
                         <!-- <form action="index.php?act=bill" method="post"> -->
                         <div class="table-content table-responsive">
                             <?php viewcart(0); ?>
                             <div class="wrap-btn-order mt-4">
                                 <input type="submit" name="orderconfirm" value="Xác nhận đặt hàng" class="btn btn-outline-primary">
                             </div>
     </form>
     </div>
     </div>
     </div>
     </div>
     <!-- JB's Cart Area End Here -->
     </form>
 </article>
 <style>
     /* Style for the card containing the "Thông tin đặt hàng" section */
     .card {
         margin-bottom: 20px;
         border: 1px solid #ccc;
         border-radius: 5px;
         box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
     }

     /* Style for the card header */
     .card-header {
         background-color: #007bff;
         color: #fff;
         padding: 10px;
         font-weight: bold;
     }

     /* Style for the card body */
     .card-body {
         padding: 20px;
     }

     /* Style for the input fields in "Thông tin đặt hàng" */
     .wrap-infocart {
         display: flex;
         align-items: center;
         margin-bottom: 15px;
     }

     .wrap-infocart span {
         width: 180px;
         font-weight: bold;
     }

     .ip-cart {
         flex: 1;
         padding: 10px;
         border: 1px solid #ccc;
         border-radius: 5px;
     }

     /* Style for the success message */
     .text-success {
         color: #28a745;
         font-weight: bold;
         margin-top: 10px;
     }

     .payment-option {
         margin-bottom: 10px;
     }

     .payment-option label {
         cursor: pointer;
         display: inline-block;
         padding-left: 30px;
         position: relative;
     }

     .payment-option input[type="radio"] {
         position: absolute;
         opacity: 0;
         cursor: pointer;
     }

     /* Create custom radio button appearance */
     .payment-option label:before {
         content: '';
         position: absolute;
         left: 0;
         top: 1px;
         width: 20px;
         height: 20px;
         border: 2px solid #007bff;
         border-radius: 50%;
     }

     /* Style the custom radio button when selected */
     .payment-option input[type="radio"]:checked+label:before {
         background-color: #007bff;
     }

     /* Optional: Add some hover effect */
     .payment-option label:hover:before {
         border-color: #0056b3;
     }
 </style>