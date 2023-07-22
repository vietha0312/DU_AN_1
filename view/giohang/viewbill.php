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

     <?php
        if (isset($bill) && is_array($bill)) {
            extract($bill);
        }
        ?>
     <!-- mã đơn hàng -->
     <div class="card mb-4">
         <div class="card-header cart text-primary fw-bold">Thông tin đơn hàng</div>
         <div class="card-body">
             <table class="table table-bordered">
                 <tr>
                     <td>Mã đơn hàng:</td>
                     <td><span class="fw-bold">PHVH-<?= $id_bill ?></span></td>
                 </tr>
                 <tr>
                     <td>Thời gian đặt hàng:</td>
                     <td><span class="fw-bold"><?= $order_date ?></span></td>
                 </tr>
                 <tr>
                     <td>Tổng thành tiền:</td>
                     <td><span class="fw-bold"><?= number_format($total_amount) ?>₫</span></td>
                 </tr>
                 <tr>
                     <td>Trạng thái:</td>
                     <td>
                         <span class="fw-bold">
                             <?php
                                if ($status_pay == 1) {
                                    echo "Đã thanh toán";
                                } else {
                                    echo "Chưa thanh toán";
                                }
                                ?>
                         </span>
                     </td>
                 </tr>
             </table>
         </div>
     </div>

     <!-- thông tin đặt hàng -->
     <form action="index.php?act=billconfirm" method="post">
         <div class="card">
             <div class="card-header cart text-primary fw-bold">Thông tin đặt hàng</div>
             <div class="card-body">
                 <table class="table table-bordered">
                     <tr>
                         <td>Tài khoản người dùng:</td>
                         <td>
                             <input name="user_name" type="text" class="form-control fw-bold" value="<?= $user_name ?>" disabled />
                         </td>
                     </tr>
                     <tr>
                         <td>Họ tên người đặt:</td>
                         <td>
                             <input name="full_name" type="text" class="form-control fw-bold" value="<?= $full_name ?>" readonly />
                         </td>
                     </tr>
                     <tr>
                         <td>Địa chỉ:</td>
                         <td>
                             <input name="address" type="text" class="form-control fw-bold" value="<?= $address ?>" readonly />
                         </td>
                     </tr>
                     <tr>
                         <td>Email:</td>
                         <td>
                             <input name="email" type="email" class="form-control fw-bold" value="<?= $email ?>" readonly />
                         </td>
                     </tr>
                     <tr>
                         <td>Điện thoại:</td>
                         <td>
                             <input name="phone" type="text" class="form-control fw-bold" value="0<?= $phone ?>" readonly />
                         </td>
                     </tr>
                 </table>
             </div>
         </div>
         <!-- phương thức thanh toán -->
         <!-- ... -->
     </form>
     </div>
     </div>
     </div>
     </div>
     <!-- JB's Cart Area End Here -->
     </form>
 </article>
 <style>
     /* Tùy chỉnh màu nền của ô thông tin đơn hàng */
     .card-body {
         background-color: #f5f5f5;
     }

     /* Tùy chỉnh màu chữ và nền của tiêu đề bảng */
     .card-header.cart {
         color: #ffffff;
         background-color: #007bff;
     }

     /* Tùy chỉnh màu nền và viền của bảng */
     .table-bordered {
         border-color: #dddddd;
     }

     /* Tùy chỉnh màu chữ và kích thước chữ của bảng */
     .table-bordered td,
     .table-bordered th {
         color: #333333;
         font-size: 14px;
     }
 </style>